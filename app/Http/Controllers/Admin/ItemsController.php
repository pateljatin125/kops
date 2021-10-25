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

class ItemsController extends Controller
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
        //dd(DB::getQueryLog());
        $item_groups = DB::table('item_groups')->get();
        $lastitemid = DB::table('items')->orderBy('id','desc')->first();
        $item_s = DB::table('items')
        // ->join('item_groups', 'items.item_group', '=', 'item_groups.id')
        //     ->select('items.*', 'item_groups.group_name')
            ->paginate(50);
        return view('admin.items', ['items' => $item_s,'itemgroups'=>$item_groups,'lastItemId'=>$lastitemid->id+1]);
    }
    public function itemgroups()
    {
        //DB::enableQueryLog();
        //dd(DB::getQueryLog());
        $item_groups = DB::table('item_groups')->paginate(50);
        $lastid = DB::table('item_groups')->orderBy('id','desc')->first();
        return view('admin.itemgroups', ['itemgroups' => $item_groups,'lastId'=>$lastid->id+1]);
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
    public function store(Request $request)
    {
        $recordCheck = DB::table('items')->where('code',$request->input('code'))->first();
        if($recordCheck){
          $output = array('success'=>0,'msg'=>"Code already exists!!");
        }
        else {
            if(DB::insert('insert into items (code,name,item_group,unit,size,weight,weight1,weight2,nickname) values (?,?,?,?,?,?,?,?,?)', [$request->input('code'), $request->input('name'), serialize($request->input('item_group')), $request->input('unit'), $request->input('size'),$request->input('weight'),$request->input('weight1'),$request->input('weight2'),$request->input('nickname')]))
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
    
    
    public function storeItemGroup(Request $request)
    {
        $recordCheck = DB::table('item_groups')->where('group_code',$request->input('groupcode'))->first();
        if($recordCheck){
          $output = array('success'=>0,'msg'=>"Code already exists!!");
        }
        else {
            if(DB::insert('insert into item_groups (group_name,group_code) values (?,?)', [$request->input('groupname'),$request->input('groupcode')]))
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
        $itemId = $request->input('itemId');
        $recordCheck = DB::table('items')->where('code',$request->input('code'))->where('id','!=',$itemId)->first();
        if($recordCheck){
          $output = array('success'=>0,'msg'=>"Code already exists!!");
        }
        else {
            DB::table('items')
                  ->where('id', $itemId)
                  ->update(['code' => $request->input('code'),'name' => $request->input('name'),'item_group' => $request->input('item_group'),'unit' => $request->input('unit'),'size' => $request->input('size'),'weight' => $request->input('weight'),'weight1' => $request->input('weight1'),'weight2' => $request->input('weight2'),'nickname' => $request->input('nickname')]);
            
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
        DB::table('items')->where('id', $id)->delete();
        return redirect(route('admin.items'));
    }
    public function destroygroup($id)
    {
        DB::table('item_groups')->where('id', $id)->delete();
        return redirect(route('admin.itemgroups'));
    }
    public function loadItemEdit(Request $request)
    {
        $itemId = $request->input('itemId');
        $itemId = explode("#",$itemId);
        $items = DB::table('items')->where('id',$itemId[1])->get();
        echo $itemData = trim(json_encode($items), '[]');
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
        DB::table('item_groups')
              ->where('id', $itemgroupId)
              ->update(['group_name' => $request->input('groupname'),'group_code' => $request->input('groupcode')]);
        
        $output = array('success'=>1,'msg'=>"Record Updated Successfully!");
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
    
    
    public function relationshipEdit(Request $request)
    {
        $groupId = $request->input('relationshipId');
        $groupId = explode("#",$groupId);
        $groupId = $groupId[1];
        $itemsInGroups = DB::table('item_group_relation')->where('group_id', $groupId)->get();
        $itemsinGroup = array();
        foreach($itemsInGroups as $itemsInGroup)
        {
            $itemsinGroup = unserialize($itemsInGroup->items);
        }
        
        
        $items = DB::table('items')->get();
        ?>
         <div class="table-responsive">
        <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <!--<th>Item Group</th>-->
                    <th>Unit</th>
                    <th>Size</th>
                    <th>Weight</th>
                    
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <!--<th>Item Group</th>-->
                    <th>Unit</th>
                    <th>Size</th>
                    <th>Weight</th>
                    
                </tr>
            </tfoot>
            <tbody>
        <?php
         foreach ($items as $item)
         {
             if(in_array($item->id,$itemsinGroup)) { 
              
              ?>
             
                                        
                                        <tr id="itemrow#<?=$item->id;?>" class="edittrigger">
                                            <td><?=$item->code;?></td>
                                            <td><?=$item->name;?></td>
                                            <td><?=$item->unit;?></td>
                                            <td><?=$item->size;?></td>
                                            <td><?=$item->weight;?></td>
                                        </tr>



                                    
              <?php
              
              
            }
          
         }
         ?>
         </tbody>
                                </table>
                            </div>
                            <?php 
          
            die;
    }
    
    
    
}