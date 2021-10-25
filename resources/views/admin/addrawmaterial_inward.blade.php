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
                    

                    <!--for the enteries of this week-->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            MATERIAL RECEIVED  <span style="float:right;"></span>
                        </div>
                        
                        
                        
                            
                            
                            
                            
                            
                            

                        <div class="card-body">
                            <form method="POST" action="#" id="addrminward">
                                                    @csrf
                                                    
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="Productqty">{{ __('Date') }}</label>
                                                                <input id="adddate" type="date"
                                                                    class="py-4 form-control @error('adddate') is-invalid @enderror" name="adddate"
                                                                    value="{{ old('adddate') }}" autocomplete="adddate" autofocus>
                        
                                                                @error('adddate')
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
                                                                <label class="small mb-1" for="Productcode">{{ __('Item Code') }}</label>
                                        
                                        <select class="itemsselect form-control name="code" id="code">
                                              @foreach ($items as $item)
                                                <option value="{{ $item->code }}" proid="{{ $item->id }}">{{ $item->code }}</option>
                                              @endforeach
                                        </select>             
                                                                
                                                                
                        
                                                                @error('code')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="productName">{{ __('Item Name') }}</label>
                                         <select class="itemsselect form-control name="product_name" id="product_name">
                                              @foreach ($items as $item)
                                                <option procode="{{ $item->code }}" value="{{ $item->id }}" >{{ $item->name }}</option>
                                              @endforeach
                                            </select>
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
                                                                <label class="small mb-1" for="productType">{{ __('Item Type') }}</label>
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
                                                        
                                                        <!--<div class="col-md-6">-->
                                                        <!--    <div class="form-group">-->
                                                        <!--        <label class="small mb-1" for="productPrice">{{ __('Item Price') }}</label>-->
                                                        <!--        <input id="price" type="text"-->
                                                        <!--            class="py-4 form-control @error('price') is-invalid @enderror" name="price"-->
                                                        <!--            value="{{ old('price') }}" autocomplete="price" autofocus>-->
                        
                                                        <!--        @error('price')-->
                                                        <!--            <span class="invalid-feedback" role="alert">-->
                                                        <!--                <strong>{{ $message }}</strong>-->
                                                        <!--            </span>-->
                                                        <!--        @enderror-->
                        
                        
                                                        <!--    </div>-->
                                                        <!--</div>-->
                                                    
                                                        <div class="col-md-6">
                                                            <label class="small mb-1" for="Productqty">{{ __('UNIT') }}</label>
                                                            <select id="weight_dimension" class="form-control"><option value="pcs">PCS</option><option value="kg">KG</option></select>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <div class="form-row">
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="Productqty">Request By</label>
                                        
                                        
                                        <select class="form-control" name="request_by" id="request_by">
                                              @foreach ($departments as $department)
                                                <option value="{{ $department->id }}" >{{ $department->name }}</option>
                                              @endforeach
                                        </select>
                                            
                                            
                        
                                                                @error('requestby')
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
                                                                <label class="small mb-1" for="Productqty">{{ __('Voucher Number') }}</label>
                                                                <input id="voucher_slip" type="text"
                                                                    class="py-4 form-control @error('voucher_slip') is-invalid @enderror" name="voucher_slip"
                                                                    value="{{ old('voucher_slip') }}" autocomplete="voucher_slip" autofocus>
                        
                                                                @error('vouchernumber')
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
                    </div>
                    <!--enteries for this week ends-->
                </div>
            </div>
        </div>
    </div>
</div>


@endsection