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
                    @include('admin.includes.materialManagement')
                    <!--for the enteries of this week-->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
TRANSFER MATERIAL
                        </div>
                        
                        
                        
                        
                        <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="showtransferModal" tabindex="-1" role="dialog" aria-labelledby="showtransferModal" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="showtransferModal">All Transfers</h5>
                                        
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body" id="transfersBody">
                                            
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                        
                        
                        
                        
                        
                        
                        <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="transferModal" tabindex="-1" role="dialog" aria-labelledby="transferModal" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="transferModal">Do Transfer</h5>
                                        
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                            <form method="POST" action="#" id="addtransfer" enctype='multipart/form-data'>
                                                <input type="hidden" id="productId" name="productId">
                                                    @csrf
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="Department">{{ __('Request By') }}</label>
                                        <select id="department"  name="department" class="form-control @error('department') is-invalid @enderror" value="{{ old('department') }}" autocomplete="department" autofocus>
                                            @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                            @endforeach
                                        </select>
                        
                                        @error('department')
                                        <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="qty">{{ __('Quantity') }}</label>
                                                                <input id="qty" type="text" name="qty"
                                                                    class="py-4 form-control @error('qty') is-invalid @enderror" name="qty"
                                                                    value="{{ old('qty') }}" autocomplete="qty" autofocus>
                        
                                                                @error('qty')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                        <select id="weight_dimension" class="form-control"><option value="pcs">PCS</option><option value="kg">KG</option></select>
                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="requestby">{{ __('Date') }}</label>
                                                                <input id="adddate" name="adddate" type="date"
                                                                    class="py-4 form-control @error('adddate') is-invalid @enderror" name="adddate"
                                                                    value="{{ old('adddate') }}" autocomplete="adddate" autofocus>
                        
                                                                @error('adddate')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="voucher_slip">{{ __('Voucher Number') }}</label>
                                                                <input id="voucher_slip" type="text" name="voucher_slip"
                                                                    class="py-4 form-control @error('voucher_slip') is-invalid @enderror" name="voucher_slip"
                                                                    value="{{ old('voucher_slip') }}" autocomplete="voucher_slip" autofocus>
                        
                                                                @error('voucher_slip')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <div class="form-group mt-4 mb-0"> <button type="submit" class="btn btn-primary">
                                                            {{ __('Add Transfer') }}
                                                        </button></div>
                                            <span id="response"></span>
                                            </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                             <div class="row">
                            <div class="col-md-12">
                            <form action="{{ route('admin.rawmaterialstock') }}" method="get" id="searchForm">
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
                                            <!--<th>Department</th>-->
                                            <!--<th>Voucher Slip</th>-->
                                             <th>Date</th>
                                             <th>Total</th>
                                            <th>Actions</th>
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
                                            <!--<th>Department</th>-->
                                            <!--<th>Voucher Slip</th>-->
                                            <th>Actions</th>
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
                                            <td>{{ $rminward->item_name }}</td>
                                            <td>{{ $rminward->qty }}</td>
                                            <td>{{ $rminward->price }}</td>
                                            <td>{{ $rminward->weight_dimension }}</td>
                                            <td>{{ date('d-m-Y', strtotime($rminward->created_on)) }}</td>
                                           <td><?php echo $totalvalue += $rminward->price*$rminward->qty;?></td>
                                            <!--<td>{{ $rminward->price }}</td>-->
                                            <!--<td>{{ $rminward->price*$rminward->qty }}</td>-->
                                            
                                            <td>
                                        <a style="margin-top:5px;" class="btn btn-primary addtransfer" id="transfer#{{ $rminward->id }}">Transfer</a>  <a style="margin-top:5px;" class="btn btn-primary transferall" id="transfer#{{ $rminward->id }}">Transfer Detail</a></td>
                                        </tr>
                                        @endforeach



                                    </tbody>
                                </table>
                                 <span><b>Total Quantity: <?php echo $totalQuantity;?> Kg/Pcs </b></span>
                                {{ $rminwards->links() }}
                            </div>
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
