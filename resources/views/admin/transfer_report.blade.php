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
                   
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            STOCK  <span style="float:right;"></span>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                            <form action="{{ route('admin.transferreport') }}" method="get" id="searchForm">
                              <div class="form-row">
                                <div class="col-4">
                                  <input type="text" class="form-control" id="daterange" value="" placeholder="Select Date" >
                                </div>
                                 <input type="hidden" name="start_date" id="start_date"> 
                                 <input type="hidden" name="end_date" id="end_date">
                                <div class="col-2">
                                   <input type="submit" value="Serch" class="bg-success form-control">
                                </div>
                                <div class="col-2">    
                                   <input type="button" id="clearSearch" value="Clear" class="bg-info form-control">
                                </div>
                              </div>
                            </form>                                                             
                            </div>
                        </div> 

                        <div class="card-body">
                           <div class="table-responsive">
                             <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                           <th>Code</th>
                                            <th>product_name</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Units</th>                                           
                                             <th>Date</th>
                                             <th>Total</th>                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Code</th>
                                            <th>product Name</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Units</th>
                                             <th>Date</th>
                                             <th>Total qty</th>                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $totalQuantity = 0; 
                                                  $totalvalue = 0;
                                        ?>
                                        @foreach ($rminwards as $rminward)
                                        <tr id="$rminward#{{ $rminward->id }}" class="edittrigger">
                                            <?php $totalQuantity += $rminward->qty; ?>
                                            <td>{{ $rminward->code }}</td>
                                            <td>{{ $rminward->product_name }}</td>
                                            <td>{{ $rminward->qty }}</td>
                                            <td>{{ $rminward->price }}</td>
                                            <td>{{ $rminward->weight_dimension }}</td>
                                            <td>{{ date('d-m-Y', strtotime($rminward->created_on)) }}</td>
                                           <td><?php echo $totalvalue += $rminward->price*$rminward->qty;?></td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                 <span><b>Total Quantity: <?php echo $totalQuantity;?> Kg/Pcs </b></span>
                                {{ $rminwards->links() }}
                            </div>
                <?php /* <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Units</th>
                            <th>Value</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Item Name</th>
                            <th>Quantity</th>
                            <th>Units</th>
                            <th>Value</th>
                            <th>Total</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $totalvalue = 0;
                        foreach ($transfersData as $transferData) { ?>
                        <tr id="$transferData#{{ $transferData->id }}" class="edittrigger">
                            <td><?=$transferData->item_name;?></td>
                            <td><?=$transferData->qty;?></td>
                            <td><?=$transferData->weight_dimension;?></td>
                            <td>
                            <?=$transferData->price;?>
                        
                            <td><?php echo $totalvalue += $transferData->price*$transferData->qty;?></td>
                            
                            
                            
                            
                        </tr>
                        <?php } ?>


                    
                    </tbody>
                </table> -->
                
                <span><b>Total is: </td><td><?php echo $totalvalue;?></b></span>
            </div> /*/?>
                        </div>
                    </div>
                    <!--enteries for this week ends-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Include Required Prerequisites -->
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script> 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />


<script type="text/javascript">

$('input[id="daterange"]').daterangepicker(
{
    autoUpdateInput: false,
    locale: {
      format: 'DD-MM-YYYY'
    },
   locale: {
          cancelLabel: 'Clear'
      }
});

 $('input[id="daterange"]').on('apply.daterangepicker', function(ev, picker) {
    $('#start_date').val(picker.startDate.format('Y-M-D'));
    $('#end_date').val(picker.endDate.format('Y-M-D'));  
    $(this).val(picker.startDate.format('DD-MM-YYYY') + ' - ' + picker.endDate.format('DD-MM-YYYY'));
  });

  $('input[id="daterange"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
      $('#start_date').val('');
      $('#end_date').val(''); 
  });

$("#clearSearch").on("click", function(){
   $('#daterange').val('');
   $('#start_date').val('');
   $('#end_date').val(''); 
   $("#searchForm").submit(); 
});
</script>
@endsection
