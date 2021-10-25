<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
// use Maatwebsite\Excel\Facades\Excel;
use Session;

class RawmaterialController extends Controller
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
    public function rawmaterialinward()
    {
        //DB::enableQueryLog();
        //dd(DB::getQueryLog());
        // if(isset($_GET['start_time'])) {
        //     $start_time = $_GET['start_time'];
        //     $end_time = $_GET['end_time'];
        //     $rminward = $transfersData = DB::table('rawmaterial_inward as ri')
        // ->join('items as ite','ri.product_name','=','ite.id')
        // ->select('ri.*','ite.name as product_name')
        //     ->Where('adddate', ">=",$start_time)->Where('adddate', "<=",$end_time)->paginate(50);
        // }
        // else
        // {
        //   $rminward = DB::table('rawmaterial_inward as ri')
        // ->join('items as ite','ri.product_name','=','ite.id')
        // ->select('ri.*','ite.name as product_name')
        // ->paginate(50);
        // }

        $query = $transfersData = DB::table('rawmaterial_inward as ri')
                  ->join('items as ite','ri.product_name','=','ite.id')
                  ->select('ri.*','ite.name as product_name');
                      if(isset($_GET['start_date']) && !empty($_GET['start_date']) && isset($_GET['end_date']) && !empty($_GET['end_date'])) {
                 $query->whereBetween('ri.adddate', [$_GET['start_date']." 00:00:00", $_GET['end_date']." 23:59:59"]);
             }
        $rminward = $query->paginate(50);
        $lastid = DB::table('rawmaterial_inward')->orderBy('id','desc')->first();
        $vendors = DB::table('vendors')->get();
        return view('admin.rawmaterial_inward', ['rminwards' => $rminward,'vendors'=>$vendors,'lastid'=>$lastid->id+1]);
    }
    public function addrawmaterialinward()
    {
        //DB::enableQueryLog();
        //dd(DB::getQueryLog());
        $rminward = DB::table('rawmaterial_inward')->paginate(50);
        $lastid = DB::table('rawmaterial_inward')->orderBy('id','desc')->first();
        $vendors = DB::table('vendors')->get();
        $departments = DB::table('departments')->get();
        $items = DB::table('items')->get();
        return view('admin.addrawmaterial_inward', ['rminwards' => $rminward,'vendors'=>$vendors,'lastid'=>$lastid->id+1,'items' => $items,'departments'=>$departments]);
    }
    public function rawmaterialstock()
    {
        //DB::enableQueryLog();
        //dd(DB::getQueryLog());
        // $rminward = DB::table('rawmaterial_inward')->paginate(50);


        $query = DB::table('rawmaterial_inward as ri')           
           ->join('items as ite','ri.product_name','=','ite.id');
            if(isset($_GET['start_date']) && !empty($_GET['start_date']) && isset($_GET['end_date']) && !empty($_GET['end_date'])) {
                 $query->whereBetween('ri.created_on', [$_GET['start_date']." 00:00:00", $_GET['end_date']." 23:59:59"]);
             } 
            $rminward= $query->groupBy('ri.product_name')->select('ri.*','ite.name as item_name',DB::raw('sum(ri.qty) as qty'))->paginate(50); 

// echo '<pre>'; print_r($rminward); exit;
        $department_s = DB::table('departments')->get();
        return view('admin.rawmaterial_stock', ['rminwards' => $rminward,'departments' => $department_s]);
    }
    
    public function itemgrouprelation()
    {
        //DB::enableQueryLog();
        //dd(DB::getQueryLog());
        $item_groups = DB::table('item_groups')->paginate(100);
        $items = DB::table('items')->get();
        return view('admin.item_group_relation', ['itemgroups' => $item_groups,'items' => $items]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.practice_test', ['practice_tests' => $practice_tests]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storerminward(Request $request)
    {
            if(DB::insert('insert into rawmaterial_inward (code,qty,product_name,price,weight_dimension,vendor,product_type,adddate,request_by,voucher_number) values (?,?,?,?,?,?,?,?,?,?)', [$request->input('code'),$request->input('qty'), $request->input('product_name'), $request->input('price'),$request->input('weight_dimension'),serialize($request->input('vendor')),$request->input('product_type'),$request->input('adddate'),$request->input('request_by'),$request->input('voucher_slip')]))
            {
                $output = array('success'=>1,'msg'=>"Record Submitted Successfully!");
            }
            else
            {
                $output = array('success'=>0,'msg'=>"Some Problem with the data!!");
            }
        
        echo json_encode($output);
        exit();
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rminwardId = $request->input('rminwardId');
        $recordCheck = DB::table('rawmaterial_inward')->where('code',$request->input('code'))->where('id','!=',$rminwardId)->first();
        if($recordCheck){
          $output = array('success'=>0,'msg'=>"Code already exists!!");
        }
        else {
            DB::table('rawmaterial_inward')
                  ->where('id', $rminwardId)
                  ->update(['code' => $request->input('code'),'qty' => $request->input('qty'),'product_name' => $request->input('product_name'),'price' => $request->input('price'),'weight' => $request->input('weight'),'weight_dimension' => $request->input('weight_dimension'),'vendor' => serialize($request->input('vendor')),'product_type' => $request->input('product_type')]);
            
            $output = array('success'=>1,'msg'=>"Record Updated Successfully!");
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
        DB::table('rawmaterial_inward')->where('id', $id)->delete();
        return redirect(route('admin.rawmaterialinward'));
    }
    public function destroygroup($id)
    {
        DB::table('item_groups')->where('id', $id)->delete();
        return redirect(route('admin.itemgroups'));
    }
    public function loadRminwardEdit(Request $request)
    {
        $rminwardId = $request->input('rminwardId');
        $rminwardId = explode("#",$rminwardId);
        $rminwards = DB::table('rawmaterial_inward')->where('id',$rminwardId[1])->get();
        echo $rminwardData = trim(json_encode($rminwards), '[]');
        die;
    }
    public function loadItemgroupEdit(Request $request)
    {
        $itemgroupId = $request->input('itemgroupId');
        $itemgroupId = explode("#",$itemgroupId);
        $item_groups = DB::table('item_groups')->where('id',$itemgroupId[1])->get();
        echo $itemgroupData = trim(json_encode($item_groups), '[]');
        die;
    }
    public function updateitemgroup(Request $request)
    {
        $itemgroupId = $request->input('itemgroupId');
        $recordCheck = DB::table('item_groups')->where('group_code',$request->input('groupcode'))->where('id','!=',$itemgroupId)->first();
        if($recordCheck){
          $output = array('success'=>0,'msg'=>"Code already exists!!");
        }
        else {
            DB::table('item_groups')
                  ->where('id', $itemgroupId)
                  ->update(['group_name' => $request->input('groupname'),'group_code' => $request->input('groupcode')]);
            
            $output = array('success'=>1,'msg'=>"Record Updated Successfully!");
        }
        echo json_encode($output);
        exit();
    }
    public function itemRelation(Request $request)
    {
        $groupId = $request->input('groupId');
        $groupId = explode("#",$groupId);
        $groupId = $groupId[1];
        $itemValue = serialize($request->input('itemValue'));
        if(DB::table('item_group_relation')->where('group_id', $groupId)->count() > 0)
        {
            DB::table('item_group_relation')
              ->where('group_id', $groupId)
              ->update(['items' => $itemValue ]);
        }
        else
        {
            DB::insert('insert into item_group_relation (group_id,items) values (?,?)', [$groupId, $itemValue]);
        }
        
        
        $output = array('success'=>1,'msg'=>"Record Updated Successfully!");
        echo json_encode($output);
        exit();
    }
    
    
    public function storetransfer(Request $request)
    {
        $productId = $request->input('productId');
        $productId = explode("#",$productId);
        $voucher_slip = $request->input('voucher_slip');
          
        if(DB::insert('insert into stock_manage_transfer (department,qty,inward_id,voucher_slip,request_by) values (?,?,?,?,?)', [$request->input('department'), $request->input('qty'), $productId[1],$voucher_slip, $request->input('request_by')]))
        {
            
            $recordCheck = DB::table('rawmaterial_inward')->where('id',$productId[1])->first();
            $currentQuantity = $recordCheck->qty;
            $quantityNow = $currentQuantity - $request->input('qty');
            
            DB::table('rawmaterial_inward')
                  ->where('id', $productId[1])
                  ->update(['qty' => $quantityNow]);
                  
            $output = array('success'=>1,'msg'=>"Record Submitted Successfully!");
        }
        else
        {
            $output = array('success'=>0,'msg'=>"Some Problem with the data!!");
        }
        
        echo json_encode($output);
        exit();
    }
    
    
    public function transferreport()
    {
        // $transfersData = DB::table('rawmaterial_inward as ri')
        // ->join('items as ite','ri.product_name','=','ite.id')
        // ->select('ri.*','ite.name as item_name',DB::raw('sum(ri.qty) as qty'))
        // ->groupBy('ri.product_name')
        // ->get();

         $query = $transfersData = DB::table('rawmaterial_inward'); 
          if(isset($_GET['start_date']) && !empty($_GET['start_date']) && isset($_GET['end_date']) && !empty($_GET['end_date'])) {
                 $query->whereBetween('created_on', [$_GET['start_date']." 00:00:00", $_GET['end_date']." 23:59:59"]);
             }
        $rminwards = $query->paginate(50);

        return view('admin.transfer_report', ['rminwards' => $rminwards]);
        
        
    }
    public function viewtransfer(Request $request)
    {
        $productId = $request->input('productId');
        $productId = explode("#",$productId);
        $transfersData = DB::table('stock_manage_transfer as smt')
        ->join('departments as dp','dp.id','=','smt.department')
        ->where('smt.inward_id',$productId[1])
        ->select('smt.*','dp.name as departmentname')
        ->get();
        ?>
        <div class="table-responsive">
                <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Quantity</th>
                            <th>Voucher Slip</th>
                            <th>Request By</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Date</th>
                            <th>Quantity</th>
                            <th>Voucher Slip</th>
                            <th>Request By</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($transfersData as $transferData) { ?>
                        <tr id="$transferData#{{ $transferData->id }}" class="edittrigger">
                            <td><?php echo date('d-m-Y',strtotime($transferData->created_on));?></td>
                            <td><?=$transferData->qty;?></td>
                            <td><?=$transferData->voucher_slip;?></td>
                            <td><?=$transferData->departmentname;?></td>
                            
                        </tr>
                        <?php } ?>



                    </tbody>
                </table>
            </div>
        <?php
        
    }
}