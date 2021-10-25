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
                        MATERIAL RECEIVED  <span style="float:right;"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    ADD NEW
                                </a></span>
                        </div>
                        
                       <div class="row">
                            <div class="col-md-12">
                            <form action="{{ route('admin.rawmaterialinward') }}" method="get" id="searchForm">
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
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Material</h5>
                                        
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                            <form method="POST" action="#" id="addrminward">
                                                    @csrf
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="Productcode">{{ __('Item Code') }}</label>
                                                                <input value="PRO{{ $lastid }}" id="code"  type="text" class="py-4 form-control @error('code') is-invalid @enderror" value="{{ old('code') }}" name="code" readonly autocomplete="code" autofocus>
                        
                                                                @error('code')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="productName">{{ __('Product Name') }}</label>
                                                                <input id="product_name" type="text"
                                                                    class="py-4 form-control @error('product_name') is-invalid @enderror" name="product_name"
                                                                    value="{{ old('product_name') }}" autocomplete="product_name" autofocus>
                        
                                                                @error('name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="vendor">{{ __('Vendor') }}</label>
                                                                 <select id="vendor"  name="vendor[]" class="form-control @error('vendor') is-invalid @enderror" value="{{ old('vendor') }}" autocomplete="vendor" autofocus multiple>
                                            @foreach ($vendors as $vendor)
                                            <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                            @endforeach
                                        </select>
                        
                                                                @error('vendor')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="productType">{{ __('Product Type') }}</label>
                                                                <input id="product_type" type="text"
                                                                    class="py-4 form-control @error('product_type') is-invalid @enderror" name="product_type"
                                                                    value="{{ old('product_type') }}" autocomplete="product_type" autofocus>
                        
                                                                @error('product_type')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="productPrice">{{ __('Product Price') }}</label>
                                                                <input id="price" type="text"
                                                                    class="py-4 form-control @error('price') is-invalid @enderror" name="price"
                                                                    value="{{ old('price') }}" autocomplete="price" autofocus>
                        
                                                                @error('price')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="itemWeight">{{ __('Item Weight') }}</label>
                                                                <input id="weight" type="text"
                                                                    class="py-4 form-control @error('weight') is-invalid @enderror" name="weight"
                                                                    value="{{ old('weight') }}" autocomplete="weight" autofocus>
                        
                                                                @error('weight')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                            <select id="weight_dimension"><option value="pcs">PCS</option><option value="kg">KG</option></select>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="Productqty">{{ __('Quantity') }}</label>
                                                                <input id="qty" type="text"
                                                                    class="py-4 form-control @error('qty') is-invalid @enderror" name="qty"
                                                                    value="{{ old('qty') }}" autocomplete="qty" autofocus>
                        
                                                                @error('qty')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                        </div>
                                  
                                  
                                  
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <div class="form-group mt-4 mb-0"> <button type="submit" class="btn btn-primary">
                                                            {{ __('Add Product') }}
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
                            
                            
                            
                            
                            
                            <div style="display:none;" id="modalForEdit">
                                <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="rminwardModal" tabindex="-1" role="dialog" aria-labelledby="rminwardModal" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="rminwardModal">Edit Product</h5>
                                        
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                            <form method="POST" action="#" id="editrminward">
                                                 <input type="hidden" name="rminwardId" id="rminwardId">
                                                    @csrf
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="Productcode">{{ __('Product Code') }}</label>
                                                                <input id="editcode" type="text"
                                                                    class="py-4 form-control @error('editcode') is-invalid @enderror" name="editcode"
                                                                    value="{{ old('code') }}" autocomplete="editcode" autofocus readonly>
                        
                                                                @error('editcode')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="productName">{{ __('Product Name') }}</label>
                                                                <input id="editproduct_name" type="text"
                                                                    class="py-4 form-control @error('editproduct_name') is-invalid @enderror" name="editproduct_name"
                                                                    value="{{ old('editproduct_name') }}" autocomplete="name" autofocus>
                        
                                                                @error('editproduct_name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="vendor">{{ __('Vendor') }}</label>
                                                                 <select id="editvendor"  name="editvendor[]" class="form-control @error('editvendor') is-invalid @enderror" value="{{ old('editvendor') }}" autocomplete="editvendor" autofocus multiple>
                                            @foreach ($vendors as $vendor)
                                            <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                            @endforeach
                                        </select>
                        
                                                                @error('editvendor')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="productType">{{ __('Product Type') }}</label>
                                                                <input id="editproduct_type" type="text"
                                                                    class="py-4 form-control @error('editproduct_type') is-invalid @enderror" name="editproduct_type"
                                                                    value="{{ old('editproduct_type') }}" autocomplete="editproduct_type" autofocus>
                        
                                                                @error('editproduct_type')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="productPrice">{{ __('Product Price') }}</label>
                                                                <input id="editprice" type="text"
                                                                    class="py-4 form-control @error('editprice') is-invalid @enderror" name="editprice"
                                                                    value="{{ old('editprice') }}" autocomplete="editprice" autofocus>
                        
                                                                @error('editprice')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="itemWeight">{{ __('Item Weight') }}</label>
                                                                <input id="editweight" type="text"
                                                                    class="py-4 form-control @error('editweight') is-invalid @enderror" name="editweight"
                                                                    value="{{ old('editweight') }}" autocomplete="editweight" autofocus>
                        
                                                                @error('editweight')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                        <select id="editweight_dimension"><option value="pcs">PCS</option><option value="kg">KG</option></select>
                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="Productqty">{{ __('Quantity') }}</label>
                                                                <input id="editqty" type="text"
                                                                    class="py-4 form-control @error('editqty') is-invalid @enderror" name="editqty"
                                                                    value="{{ old('editqty') }}" autocomplete="editqty" autofocus>
                        
                                                                @error('editqty')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                        </div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <div class="form-group mt-4 mb-0"> <button type="submit" class="btn btn-primary">
                                                            {{ __('Update Product') }}
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
                                <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                           <th>Code</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Weight</th>
                                            <th>Quantity</th>
                                            <th>Vendor</th>
                                            <th>Product Type</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Code</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Weight</th>
                                            <th>Quantity</th>
                                            <th>Vendor</th>
                                            <th>Product Type</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($rminwards as $rminward)
                                        <tr id="$rminward#{{ $rminward->id }}" class="edittrigger">
                                            <td>{{ $rminward->code }}</td>
                                            <td>{{ $rminward->product_name }}</td>
                                            <td>{{ $rminward->price }}</td>
                                            <td>{{ $rminward->weight }} {{ $rminward->weight_dimension }}</td>
                                            <td>{{ $rminward->qty }}</td>
                                            
                                            <td>
                                    <?php
                                    if($rminward->vendor!="") {
                                    if($vendorun = unserialize($rminward->vendor)) {
                                    $Vendorssss = DB::table('vendors')->whereIn('id',$vendorun)->get();
                                        foreach($Vendorssss as $Vendor)
                                        {
                                            echo $Vendor->name,", ";
                                        }
                                    }
                                    }
                                                
                                            ?>
                                                
                                                
                                                </td>
                                            
                                            <td>{{ $rminward->product_type }}</td>
                                            </td>
                                            <td><a href="rminward/{{ $rminward->id }}" class="btn btn-primary" onclick="return confirm('Are you sure?')">Delete</a>
                                        <a style="margin-top:5px;" class="btn btn-primary rminwardedit" id="Rminward#{{ $rminward->id }}">Edit</a></td>
                                        </tr>
                                        @endforeach



                                    </tbody>
                                </table>
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
