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

class ItemactionsController extends Controller
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
        // $castings = DB::table('stock_manage_transfer as smt')
        // ->join('rawmaterial_inward as ri','ri.id','=','smt.inward_id')
        // ->join('items as it','it.id','=','ri.product_name')
        // ->select('smt.*','it.name as itemName','ri.weight_dimension')
        // ->paginate(50);
        


           $query = DB::table('stock_manage_transfer as smt')
            ->join('rawmaterial_inward as ri', function ($join) {
                $join->on('smt.inward_id', '=', 'ri.id');
            })
            ->join('items as it', function ($join) {
                $join->on('ri.product_name', '=', 'it.id');
            });
            if(isset($_GET['start_date']) && !empty($_GET['start_date']) && isset($_GET['end_date']) && !empty($_GET['end_date'])) {
                 $query->whereBetween('smt.created_on', [$_GET['start_date']." 00:00:00", $_GET['end_date']." 23:59:59"]);
             }           
            
            $castings= $query->select('smt.*','it.name as itemName','ri.weight_dimension')->paginate(50); 
            $item_s = DB::table('items')->get();       
        return view('admin.casting', ['items' => $item_s,'castings'=>$castings]);
    }
    
    public function castingoutput()
    {
        //DB::enableQueryLog();
        //dd(DB::getQueryLog());
        $castings = DB::table('casting_output')
        ->select('casting_output.*')
        ->paginate(50);
        $item_s = DB::table('items')->get();
        $departments = DB::table('departments')->get();
        return view('admin.castingOutput', ['castings'=>$castings,'departments'=>$departments]);
    }
   
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            if(DB::insert('insert into casting (item,qty,remarks) values (?,?,?)', [$request->input('item'), $request->input('qty'), $request->input('remarks')]))
            {
                $currentVal = DB::table('items')
                  ->where('id', '=', $request->input('item'))
                  ->first();
                 $currentVal = $currentVal->weight;
                  
              DB::table('items')
              ->where('id', $request->input('item'))
              ->update(['weight' => $currentVal - $request->input('qty')]);
                $output = array('success'=>1,'msg'=>"Record Submitted Successfully!");
            }
            else
            {
                $output = array('success'=>0,'msg'=>"Some Problem with the data!!");
            }
            
        echo json_encode($output);
        exit();
    }
    
    
    
    
    public function storecastingoutput(Request $request)
    {
        
            if(DB::insert('insert into casting_output (item,qty,units) values (?,?,?)', [$request->input('item'), $request->input('qty'), $request->input('units')]))
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
        $castingId = $request->input('castingId');
        DB::table('casting')
              ->where('id', $castingId)
              ->update(['item' => $request->input('item'),'qty' => $request->input('qty'),'remarks' => $request->input('remarks')]);
        
        $output = array('success'=>1,'msg'=>"Record Updated Successfully!");
        echo json_encode($output);
        exit();
    }
    
    public function updatecastingoutput(Request $request)
    {
        $castingoutputId = $request->input('castingoutputId');
        DB::table('casting_output')
              ->where('id', $castingoutputId)
              ->update(['item' => $request->input('item'),'qty' => $request->input('qty'),'units' => $request->input('units')]);
        
        $output = array('success'=>1,'msg'=>"Record Updated Successfully!");
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
        DB::table('casting')->where('id', $id)->delete();
        return redirect(route('admin.casting'));
    }
    public function destroycastingoutput($id)
    {
        DB::table('casting_output')->where('id', $id)->delete();
        return redirect(route('admin.castingOutput'));
    }
  
    public function loadCastingEdit(Request $request)
    {
        $castingId = $request->input('castingId');
        $castingId = explode("#",$castingId);
        $casting = DB::table('casting')->where('id',$castingId[1])->get();
        echo $castingData = trim(json_encode($casting), '[]');
        die;
    }
    
    public function loadCastingOutputEdit(Request $request)
    {
        $castingoutputId = $request->input('castingoutputId');
        $castingoutputId = explode("#",$castingoutputId);
        $castingoutput = DB::table('casting_output')->where('id',$castingoutputId[1])->get();
        echo $castingoutputData = trim(json_encode($castingoutput), '[]');
        die;
    }
    
    
    
    
    public function storetransfercasting(Request $request)
    {
        $productId = $request->input('productId');
        $productId = explode("#",$productId);
        $voucher_slip = $request->input('voucher_slip');
          
        if(DB::insert('insert into stock_manage_transfer_casting (department,qty,stock_output_id,request_by) values (?,?,?,?)', [$request->input('department'), $request->input('qty'), $productId[1],$request->input('request_by')]))
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
    
    
    public function transferreportcasting()
    {
        $transfersData = DB::table('stock_manage_transfer_casting as smt')
        ->select('smt.stock_output_id as item','smt.id',DB::raw('sum(smt.qty) as qty'))
        ->groupBy('smt.stock_output_id')
        ->get();
        return view('admin.transfer_report_casting', ['transfersData' => $transfersData]);
        
        
    }
    public function viewtransfercasting(Request $request)
    {
        $productId = $request->input('productId');
        $productId = explode("#",$productId);
        $transfersData = DB::table('stock_manage_transfer_casting as smt')
        ->join('departments as dp','dp.id','=','smt.department')
        ->where('smt.stock_output_id',$productId[1])
        ->select('smt.*','dp.name as departmentname')
        ->get();
        ?>
        <div class="table-responsive">
                <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Quantity</th>
                            <th>Request By</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Date</th>
                            <th>Quantity</th>
                            <th>Request By</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($transfersData as $transferData) { ?>
                        <tr id="$transferData#{{ $transferData->id }}" class="edittrigger">
                            <td><?php echo date('d-m-Y',strtotime($transferData->created_on));?></td>
                            <td><?=$transferData->qty;?></td>
                            <td><?=$transferData->departmentname;?></td>
                            
                        </tr>
                        <?php } ?>



                    </tbody>
                </table>
            </div>
        <?php
        
    }
    
  
}