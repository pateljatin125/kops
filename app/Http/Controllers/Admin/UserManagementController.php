<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Session;
use Illuminate\Database\QueryException;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        //DB::enableQueryLog();
        $users = DB::table('admins')->paginate(50);
        $lastid = DB::table('admins')->orderBy('id','desc')->first();
        $department_s = DB::table('departments')->get();
        //dd(DB::getQueryLog());
        return view('admin.showusers', ['users' => $users,'departments' => $department_s,'lastid'=>$lastid->id+1]);
    }
    public function createuser()
    {
        $department_s = DB::table('departments')->get();
        $lastid = DB::table('admins')->orderBy('id','desc')->first();
        $admins_group_s = DB::table('admins_group')->get();
        return view('admin.createuser',['departments'=>$department_s,'lastid'=>$lastid->id+1,'admingroups'=>$admins_group_s]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recordCheck = DB::table('admins')->where('employee_code',$request->input('employee_code'))->first();
        if($recordCheck){
          Session::put('success', 'Employee Code already exists!');
          return back();
        }
        else {
            $data['name'] = $request->Input('name');
            $data['email'] = $request->Input('email');
            $data['password'] = Hash::make($request->Input('password'));
            $data['customer_group'] = $request->Input('customer_group');
            $data['employee_code'] = $request->Input('employee_code');
            $data['mobile'] = $request->Input('mobile');
            $data['user_id'] = $request->Input('user_id');
            $data['department'] = serialize($request->Input('department'));
            if($data['customer_group'] == 'admin')
            {
                $data['is_super'] = '1';
            }
            else
            {
                $data['is_super'] = '0';
            }
            
            
            if (!empty($data)) {
                if(DB::table('admins')->insert($data))
                {
                    Session::put('success', 'User created successfully!');
                    return back();
                }
                else
                {
                    Session::put('error', 'Something Wrong happened!');
                    return back();
                }
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    public function loadUserEdit(Request $request)
    {
        $userId = $request->input('userId');
        $userId = explode("#",$userId);
        $user = DB::table('admins')->where('id',$userId[1])->get();
        $department = $user[0]->department;
        $unserialDepartment = array();
        if(unserialize($department))
        {
           $unserialDepartment = unserialize($department); 
        }
        $departments = DB::table('departments')->get();
        $deppartments = '<label class="small mb-1" for="inputGooglelocation">Select Department</label>
        <select id="department" class="form-control @error("department") is-invalid @enderror" name="department[]"  multiple>
        <option value="">Select Department</option>';
         foreach ($departments as $department)
         { 
             $check = "";
             if(in_array($department->id,$unserialDepartment))
             {
                 $check = "selected='true'";
             }
            $deppartments .= '<option value="'.$department->id.'" '.$check.'>'.$department->name.'</option>';
         }
        $deppartments .= '</select>';
        
        $combined_array = array('user_data'=>$user,'departments'=>$deppartments);
        $userData = json_encode($combined_array);
        $userData = str_replace('[','',$userData);
        echo str_replace(']','',$userData);
        die;        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $userId = $request->input('userId');
        $recordCheck = DB::table('admins')->where('employee_code',$request->input('employee_code'))->where('id','!=',$userId)->first();
        if($recordCheck){
          $output = array('success'=>0,'msg'=>"Code already exists!!");
        }
        else {
            $data['name'] = $request->Input('name');
            $data['mobile'] = $request->Input('mobile');
            $data['email'] = $request->Input('email');
            if($request->Input('password')!="")
            {
                $data['password'] = Hash::make($request->Input('password'));
            }
            if($request->Input('customer_group')!="") {
                $data['customer_group'] = $request->Input('customer_group');
                if($data['customer_group'] == 'admin')
                {
                    $data['is_super'] = '1';
                }
                else
                {
                    $data['is_super'] = '0';
                }
            }
            if($request->Input('employee_code')!="") 
            {
                $data['employee_code'] = $request->Input('employee_code');    
            }
            if($request->Input('user_id')!="")
            {
                $data['user_id'] = $request->Input('user_id');   
            }
            if($request->Input('department')!="")
            {
                $data['department'] = serialize($request->Input('department'));    
            }
        
            if (!empty($data)) {
                DB::table('admins')->where('id',$userId)->update($data);
                $output = array('success'=>1,'msg'=>"Successfully Updated!");
            }
            else
            {
                 $output = array('success'=>0,'msg'=>"Something Wrong!");
            }
        }
        echo json_encode($output);
        exit();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('admins')->where('id', $id)->delete();
        return redirect(route('admin.show'));
    }
    public function departments()
    {
        //DB::enableQueryLog();
        //dd(DB::getQueryLog());
        $department_s = DB::table('departments')->paginate(50);
        $lastid = DB::table('departments')->orderBy('id','desc')->first();
        return view('admin.departments', ['departments' => $department_s,'lastid'=>$lastid->id+1]);
    }
     public function storeDepartment(Request $request)
    {
        $recordCheck = DB::table('departments')->where('code',$request->input('code'))->first();
        if($recordCheck){
          $output = array('success'=>0,'msg'=>"Code already exists!!");
        }
        else {
            if(DB::insert('insert into departments (name,code) values (?,?)', [$request->input('department'),$request->input('code')]))
            {
                $output = array('success'=>1,'msg'=>"Record Submitted Successfully!");
            }
            else
            {
                $output = array('success'=>0,'msg'=>"Some Problem with the data!!");
            }
        }
        echo json_encode($output);
        exit();
    }
    
    public function loaddepartmentEdit(Request $request)
    {
        $departmentId = $request->input('departmentId');
        $departmentId = explode("#",$departmentId);
        $department = DB::table('departments')->where('id',$departmentId[1])->get();
        echo $departmentData = trim(json_encode($department), '[]');
        die;
    }
    public function updatedepartment(Request $request)
    {
        $departmentId = $request->input('departmentId');
        $recordCheck = DB::table('departments')->where('code',$request->input('code'))->where('id','!=',$departmentId)->first();
        if($recordCheck){
          $output = array('success'=>0,'msg'=>"Code already exists!!");
        }
        else {
            DB::table('departments')
                  ->where('id', $departmentId)
                  ->update(['name' => $request->input('department'),'code' => $request->input('code')]);
            
            $output = array('success'=>1,'msg'=>"Record Updated Successfully!");
        }
        echo json_encode($output);
        exit();
    }
    
    public function destroydepartment($id)
    {
        DB::table('departments')->where('id', $id)->delete();
        return redirect(route('admin.departments'));
    }
    
    
    
    
   
   
   
   
   //group edit
    public function groups()
    {
        //DB::enableQueryLog();
        //dd(DB::getQueryLog());
        $admins_group_s = DB::table('admins_group')->paginate(50);
        $lastid = DB::table('admins_group')->orderBy('id','desc')->first();
        return view('admin.admingroups', ['admingroups' => $admins_group_s,'lastid'=>$lastid->id+1]);
    }
    public function storeGroup(Request $request)
    {
        $recordCheck = DB::table('admins_group')->where('code',$request->input('code'))->first();
        if($recordCheck){
          $output = array('success'=>0,'msg'=>"Code already exists!!");
        }
        else {
            if(DB::insert('insert into admins_group (name,code) values (?,?)', [$request->input('group'),$request->input('code')]))
            {
                $output = array('success'=>1,'msg'=>"Record Submitted Successfully!");
            }
            else
            {
                $output = array('success'=>0,'msg'=>"Some Problem with the data!!");
            }
        }
        echo json_encode($output);
        exit();
    }
    
    public function loadgroupEdit(Request $request)
    {
        $groupId = $request->input('groupId');
        $groupId = explode("#",$groupId);
        $group = DB::table('admins_group')->where('id',$groupId[1])->get();
        echo $groupData = trim(json_encode($group), '[]');
        die;
    }
    public function updategroup(Request $request)
    {
        $groupId = $request->input('groupId');
        $recordCheck = DB::table('admins_group')->where('code',$request->input('code'))->where('id','!=',$groupId)->first();
        
            DB::table('admins_group')
                  ->where('id', $groupId)
                  ->update(['name' => $request->input('group')]);
            
            $output = array('success'=>1,'msg'=>"Record Updated Successfully!");
        
        echo json_encode($output);
        exit();
    }
    
    public function destroygroup($id)
    {
        DB::table('admins_group')->where('id', $id)->delete();
        return redirect(route('admin.groups'));
    }

   //group edit ends
    
    
    
    public function vendors()
    {
        //DB::enableQueryLog();
        //dd(DB::getQueryLog());
        $vendor_s = DB::table('vendors')->paginate(50);
        $lastid = DB::table('vendors')->orderBy('id','desc')->first();
        return view('admin.vendors', ['vendors' => $vendor_s,'lastid'=>$lastid->id+1]);
    }
     public function storeVendor(Request $request)
    {
        $recordCheck = DB::table('vendors')->where('vendor_code',$request->input('vendor_code'))->first();
        if($recordCheck){
          $output = array('success'=>0,'msg'=>"Code already exists!!");
        }
        else {
            if(DB::insert('insert into vendors (name,address,vendor_code,contact,contact2,contact3) values (?,?,?,?,?,?)', [$request->input('name'),$request->input('address'),$request->input('vendor_code'),$request->input('contact'),$request->input('contact2'),$request->input('contact3')]))
            {
                $output = array('success'=>1,'msg'=>"Record Submitted Successfully!");
            }
            else
            {
                $output = array('success'=>0,'msg'=>"Some Problem with the data!!");
            }
        }
        echo json_encode($output);
        exit();
    }
    
    public function loadvendorEdit(Request $request)
    {
        $vendorId = $request->input('vendorId');
        $vendorId = explode("#",$vendorId);
        $vendor = DB::table('vendors')->where('id',$vendorId[1])->get();
        echo $vendorData = trim(json_encode($vendor), '[]');
        die;
    }
    public function updatevendor(Request $request)
    {
        $vendorId = $request->input('vendorId');
        $recordCheck = DB::table('vendors')->where('vendor_code',$request->input('vendor_code'))->where('id','!=',$vendorId)->first();
        if($recordCheck){
          $output = array('success'=>0,'msg'=>"Code already exists!!");
        }
        else {
            DB::table('vendors')
                  ->where('id', $vendorId)
                  ->update(['name'=>$request->input('name'),'address'=>$request->input('address'),'vendor_code'=>$request->input('vendor_code'),'contact'=>$request->input('contact'),'contact2'=>$request->input('contact2'),'contact3'=>$request->input('contact3')]);
            
            $output = array('success'=>1,'msg'=>"Record Updated Successfully!");
        }
        echo json_encode($output);
        exit();
    }
    
    public function destroyvendor($id)
    {
        DB::table('vendors')->where('id', $id)->delete();
        return redirect(route('admin.vendors'));
    }
    
    
    
}
