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
                            Vendors  <span style="float:right;"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    ADD NEW VENDOR
                                </a></span>
                        </div>
                        
                        
                        
                        <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Vendor</h5>
                                        
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                            <form method="POST" action="#" id="addvendor">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="vendor">{{ __('Vendor Name') }}</label>
                                                                <input id="vendor" type="text"
                                                                    class="py-4 form-control @error('vendor') is-invalid @enderror" name="vendor"
                                                                    value="{{ old('vendor') }}" required autocomplete="vendor" autofocus>
                        
                                                                @error('vendor')
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
                                                                <label class="small mb-1" for="Code">{{ __('Vendor Code') }}</label>
                                                                <input id="vendor_code" type="text"
                                                                    class="py-4 form-control @error('vendor_code') is-invalid @enderror" name="vendor_code"
                                                                    value="VEN{{ $lastid }}"  readonly required autocomplete="vendor_code" autofocus>
                        
                                                                @error('vendor_code')
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
                                                                <label class="small mb-1" for="address">{{ __('Address') }}</label>
                                                                <input id="address" type="text"
                                                                    class="py-4 form-control @error('address') is-invalid @enderror" name="address"
                                                                    value="{{ old('address') }}" required autocomplete="address" autofocus>
                        
                                                                @error('address')
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
                                                                <label class="small mb-1" for="Code">{{ __('Contact 1') }}</label>
                                                                <input id="contact" type="text"
                                                                    class="py-4 form-control @error('contact') is-invalid @enderror" name="contact"
                                                                    value="{{ old('contact') }}"  autocomplete="contact" autofocus>
                        
                                                                @error('contact')
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
                                                                <label class="small mb-1" for="Code">{{ __('Contact 2') }}</label>
                                                                <input id="contact2" type="text"
                                                                    class="py-4 form-control @error('contact2') is-invalid @enderror" name="contact2"
                                                                    value="{{ old('contact2') }}"  autocomplete="contact2" autofocus>
                        
                                                                @error('contact2')
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
                                                                <label class="small mb-1" for="Code">{{ __('Contact 3') }}</label>
                                                                <input id="contact3" type="text"
                                                                    class="py-4 form-control @error('contact3') is-invalid @enderror" name="contact3"
                                                                    value="{{ old('contact3') }}" autocomplete="contact3" autofocus>
                        
                                                                @error('contact3')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                    
                        
                                                    <div class="form-group mt-4 mb-0"> <button type="submit" class="btn btn-primary">
                                                            {{ __('Add Vendor') }}
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
                            <div class="modal fade" id="vendorModal" tabindex="-1" role="dialog" aria-labelledby="vendorModal" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="vendorModal">Edit Vendor</h5>
                                        
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                            <form method="POST" action="#" id="editvendorr">
                                                    @csrf
                                                    <input type="hidden" name="vendorId" id="vendorId">
                                                    
                                                    
                                                    
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="editvendor">{{ __('Vendor Name') }}</label>
                                                                <input id="editvendor" type="text"
                                                                    class="py-4 form-control @error('editvendor') is-invalid @enderror" name="editvendor"
                                                                    value="{{ old('editvendor') }}" required autocomplete="editvendor" autofocus>
                        
                                                                @error('editvendor')
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
                                                                <label class="small mb-1" for="Code">{{ __('Vendor Code') }}</label>
                                                                <input id="editvendor_code" type="text"
                                                                    class="py-4 form-control @error('editvendor_code') is-invalid @enderror" name="editvendor_code"
                                                                    value="{{ old('editvendor_code') }}" required autocomplete="editvendor_code" autofocus>
                        
                                                                @error('editvendor_code')
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
                                                                <label class="small mb-1" for="editaddress">{{ __('Address') }}</label>
                                                                <input id="editaddress" type="text"
                                                                    class="py-4 form-control @error('editaddress') is-invalid @enderror" name="editaddress"
                                                                    value="{{ old('editaddress') }}" required autocomplete="editaddress" autofocus>
                        
                                                                @error('editaddress')
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
                                                                <label class="small mb-1" for="Code">{{ __('Contact 1') }}</label>
                                                                <input id="editcontact" type="text"
                                                                    class="py-4 form-control @error('editcontact') is-invalid @enderror" name="editcontact"
                                                                    value="{{ old('editcontact') }}"  autocomplete="editcontact" autofocus>
                        
                                                                @error('editcontact')
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
                                                                <label class="small mb-1" for="Code">{{ __('Contact 2') }}</label>
                                                                <input id="editcontact2" type="text"
                                                                    class="py-4 form-control @error('editcontact2') is-invalid @enderror" name="editcontact2"
                                                                    value="{{ old('editcontact2') }}"  autocomplete="editcontact2" autofocus>
                        
                                                                @error('editcontact2')
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
                                                                <label class="small mb-1" for="Code">{{ __('Contact 3') }}</label>
                                                                <input id="editcontact3" type="text"
                                                                    class="py-4 form-control @error('editcontact3') is-invalid @enderror" name="editcontact3"
                                                                    value="{{ old('editcontact3') }}" autocomplete="editcontact3" autofocus>
                        
                                                                @error('editcontact3')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                        
                                                    <div class="form-group mt-4 mb-0"> <button type="submit" class="btn btn-primary">
                                                            {{ __('Edit Vendor') }}
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
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Vendor Code</th>
                                            <th>Contact 1</th>
                                            <th>Contact 2</th>
                                            <th>Contact 3</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                             <th>Name</th>
                                            <th>Address</th>
                                            <th>Vendor Code</th>
                                            <th>Contact 1</th>
                                            <th>Contact 2</th>
                                            <th>Contact 3</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($vendors as $vendor)
                                        <tr>
                                            <td>{{ $vendor->name }}</td>
                                            <td>{{ $vendor->address }}</td>
                                            <td>{{ $vendor->vendor_code }}</td>
                                            <td>{{ $vendor->contact }}</td>
                                            <td>{{ $vendor->contact2 }}</td>
                                            <td>{{ $vendor->contact3 }}</td>
                                            
                                            <td><a href="vendordestroy/{{ $vendor->id }}" class="btn btn-primary" onclick="return confirm('Are you sure?')">Delete</a>
                                    <a style="margin-top:5px;" class="btn btn-primary vendoredit" id="vendor#{{ $vendor->id }}">Edit</a></td>
                                        </tr>
                                        @endforeach



                                    </tbody>
                                </table>
                                {{ $vendors->links() }}
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
