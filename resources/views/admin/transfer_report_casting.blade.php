@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-body">
                    <div class="box-body">
                        @if ($message = Session::get('success'))
                        <?php Session::forget('success'); ?>
                        <h5 class="error_success" style="color:red;">{{ $message }}</h5>
                        @endif
                    </div>
                    
                    <!--@include('admin.includes.materialManagement')-->

                    <!--for the enteries of this week-->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            STOCK  <span style="float:right;"></span>
                        </div>
                        
                        
                        
                        <!-- Button trigger modal -->
                            <!-- Modal -->

                        <div class="card-body">
                           <div class="table-responsive">
                <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Units</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Units</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $totalvalue = 0;
                        foreach ($transfersData as $transferData) { ?>
                        <tr id="$transferData#{{ $transferData->id }}" class="edittrigger">
                            <?php
                                $stock_output_id = $transferData->item;
                                $casting_outputs = DB::table('casting_output')->where('id',$stock_output_id)->get();
                                foreach($casting_outputs as $casting_output)
                                {
                                    $realqty = $casting_output->qty;
                                    $itemname = $casting_output->item;
                                }
                                $qty = $realqty - $transferData->qty;
                            ?>
                            <td><?=$itemname;?></td>
                            
                            
                            <td><?=$qty;?></td>
                            <td>kg/pcs</td>
                      
                            
                            
                            
                            
                        </tr>
                        <?php } ?>


                    
                    </tbody>
                </table>
                
                <span><b>Total is: </td><td><?php echo $totalvalue;?></b></span>
            </div>
                        </div>
                    </div>
                    <!--enteries for this week ends-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
