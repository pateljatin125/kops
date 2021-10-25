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
                    <!--@include('admin.includes.castingManagement')-->
                    

                    <!--for the enteries of this week-->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            <!--CASTING 1 INPUTS REPORT  <span style="float:right;"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">-->
                            <!--        ADD NEW CASTING-->
                            <!--    </a></span>-->
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-md-12">
                            <form action="{{ route('admin.casting') }}" method="get" id="searchForm">
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
                        
                        
                        <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Casting</h5>
                                        
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                            <form method="POST" action="#" id="addcasting">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="item">{{ __('Item') }}</label>
                                                                
                                        <select class="itemselection" name="item" id="item" style="width:100%;" class="py-4 form-control @error('item') is-invalid @enderror">
                                              @foreach ($items as $item)
                                                <option value="{{ $item->id }}" >{{ $item->name }}</option>
                                              @endforeach
                                            </select>
                                            
                                            
                        
                                                                @error('item')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="Code">{{ __('Quantity') }}</label>
                                                                <input id="qty" type="text"
                                                                    class="py-4 form-control @error('qty') is-invalid @enderror" name="qty"
                                                                    value="{{ old('qty') }}" required autocomplete="qty" autofocus>
                        
                                                                @error('qty')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="Code">{{ __('Units') }}</label>
                                                                <input id="remarks" type="text"
                                                                    class="py-4 form-control @error('remarks') is-invalid @enderror" name="remarks"
                                                                    value="{{ old('remarks') }}" required autocomplete="remarks" autofocus>
                        
                                                                @error('remarks')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                        
                                                    <div class="form-group mt-4 mb-0"> <button type="submit" class="btn btn-primary">
                                                            {{ __('Add Casting') }}
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
                            
                            
                            
                            
                            
                            
                            <div id="">
                                  <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="castingModal" tabindex="-1" role="dialog" aria-labelledby="castingModal" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="castingModal">Edit CASTING</h5>
                                        
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                            <form method="POST" action="#" id="editcasting">
                                                    @csrf
                                                    <input type="hidden" name="castingId" id="castingId">
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="edititem">{{ __('ITEM') }}</label>
                                                                <select class="itemselection" name="edititem" id="edititem" style="width:100%;" class="py-4 form-control @error('edititem') is-invalid @enderror">
                                              @foreach ($items as $item)
                                                <option value="{{ $item->id }}" >{{ $item->name }}</option>
                                              @endforeach
                                            </select>
                        
                                                                @error('item')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="Qty">{{ __('Quantity') }}</label>
                                                                <input id="editqty" type="text"
                                                                    class="py-4 form-control @error('qty') is-invalid @enderror" name="qty"
                                                                    value="{{ old('qty') }}" required autocomplete="qty" autofocus>
                        
                                                                @error('qty')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    </div>
                        
                        
                        
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="Remarks">{{ __('Units') }}</label>
                                                                <input id="editremarks" type="text"
                                                                    class="py-4 form-control @error('remarks') is-invalid @enderror" name="remarks"
                                                                    value="{{ old('remarks') }}" required autocomplete="remarks" autofocus>
                        
                                                                @error('remarks')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    </div>
                        
                                                    <div class="form-group mt-4 mb-0"> <button type="submit" class="btn btn-primary">
                                                            {{ __('Edit Casting') }}
                                                        </button></div>
                                            <span id="responseedit"></span>
                                            </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                            </div> 
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTableCasting" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Item</th>
                                            <th>Qty</th>
                                            <th>Units</th>
                                              <th>Create Date</th>
                                            <!--<th>Actions</th>-->
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Item</th>
                                            <th>Qty</th>
                                            <th>Units</th>
                                            <th>Create Date</th>
                                            <!--<th>Actions</th>-->
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $totalQuantity = 0; ?>
                                        @foreach ($castings as $casting)
                                        <tr>
                                            <td>{{ $casting->itemName }}</td>
                                            <?php $totalQuantity += $casting->qty; ?>
                                            <td>{{ $casting->qty }}</td>
                                            <td>{{ $casting->weight_dimension }}</td>
                                            <td>{{ date('d-m-Y', strtotime($casting->created_on)) }}</td>
                                            <!--<td>&nbsp;</td>-->
                                            <!--<td><a href="castingdestroy/{{ $casting->id }}" class="btn btn-primary" onclick="return confirm('Are you sure?')">Delete</a>-->
                                    <!--<a style="margin-top:5px;" class="btn btn-primary castingedit" id="castingt#{{ $casting->id }}">Edit</a></td>-->
                                        </tr>
                                        @endforeach



                                    </tbody>
                                </table>
                                {{ $castings->links() }}
                                
                                <span><b>Total Quantity: <?php echo $totalQuantity;?> Kg/Pcs </b></span>
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

