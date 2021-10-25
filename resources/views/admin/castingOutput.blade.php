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
                    @include('admin.includes.castingManagement')




                    <!-- Button trigger modal -->
                            <!-- Modal -->
                    <div class="modal fade" id="showtransferModalcasting" tabindex="-1" role="dialog" aria-labelledby="showtransferModalcasting" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="showtransferModalcasting">All Transfers</h5>
                                
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body" id="transfersBodycasting">
                                    
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                        
                        
                    <!--for the enteries of this week-->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            CASTINGS  <span style="float:right;"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    ADD NEW CASTING
                                </a></span>
                        </div>
                        
                        
                        
                        
                        
                        <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Record</h5>
                                        
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                            <form method="POST" action="#" id="addcastingoutput">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="item">{{ __('Item') }}</label>
                                                                
                                        <input name="item" id="item" class="py-4 form-control @error('item') is-invalid @enderror">
                                              
                                            
                                            
                                            
                        
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
                                                                 <select id="units" class="form-control @error('remarks') is-invalid @enderror" name="units">
                                        <option value="KG">Kg</option>
                                        <option value="PCS">PCS</option>
                                        </select>
                        
                                                                @error('remarks')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                        
                                                    <div class="form-group mt-4 mb-0"> <button type="submit" class="btn btn-primary">
                                                            {{ __('Add Casting Output') }}
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
                            <div class="modal fade" id="castingoutputModal" tabindex="-1" role="dialog" aria-labelledby="castingoutputModal" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="castingoutputModal">Edit CASTING OUTPUT</h5>
                                        
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                            <form method="POST" action="#" id="editcastingoutput">
                                                    @csrf
                                                    <input type="hidden" name="castingoutputId" id="castingoutputId">
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="edititem">{{ __('ITEM') }}</label>
                                                               <input name="edititem" id="edititem" class="py-4 form-control @error('item') is-invalid @enderror">
                        
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
                                                                <select id="editunits" class="form-control @error('editunits') is-invalid @enderror" name="editunits">
                                        <option value="KG">Kg</option>
                                        <option value="PCS">PCS</option>
                                        </select>
                        
                                                                @error('editunits')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    </div>
                        
                                                    <div class="form-group mt-4 mb-0"> <button type="submit" class="btn btn-primary">
                                                            {{ __('Edit Casting Output') }}
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
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Item</th>
                                            <th>Qty</th>
                                            <th>Units</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php $totalQuantity = 0; ?>
                                        @foreach ($castings as $casting)
                                        <tr>
                                            <td>{{ $casting->item }}</td>
                                            <?php $totalQuantity += $casting->qty; ?>
                                            <td>{{ $casting->qty }}</td>
                                            <td>{{ $casting->units }}</td>
                                            
                                            <td><a href="castingdestroy/{{ $casting->id }}" class="btn btn-primary" onclick="return confirm('Are you sure?')">Delete</a>
                                    <a style="margin-top:5px;" class="btn btn-primary castingoutputedit" id="castingt#{{ $casting->id }}">Edit</a>
                                    
                                     <a style="margin-top:5px;" class="btn btn-primary addtransfercasting" id="transfer#{{ $casting->id }}">Transfer</a>
                                     
                                     <a style="margin-top:5px;" class="btn btn-primary transferallcasting" id="transfer#{{ $casting->id }}">Transfer Detail</a>
                                     
                                    </td>
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







<!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="transferModalcasting" tabindex="-1" role="dialog" aria-labelledby="transferModalcasting" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="transferModalcasting">Do Transfer</h5>
                                        
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                            <form method="POST" action="#" id="addtransfercasting" enctype='multipart/form-data'>
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
                                                    
                                                        
                                                    </div>
                                                    
                                                    
                                                    
                                                
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <div class="form-group mt-4 mb-0"> <button type="submit" class="btn btn-primary">
                                                            {{ __('Add Transfer') }}
                                                        </button></div>
                                            <span id="responsecasting"></span>
                                            </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                            
@endsection

