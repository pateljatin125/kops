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
                            ITEMS  <span style="float:right;"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    ADD NEW
                                </a></span>
                        </div>
                        
                        
                        
                        <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New ITEM</h5>
                                        
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                            <form method="POST" action="#" id="additem">
                                                    @csrf
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="Itemcode">{{ __('Item Code') }}</label>
                                                                <input  id="code"  type="text"
                                                                    class="py-4 form-control @error('code') is-invalid @enderror" name="code"
                                                                    value="{{ old('code') }}" autocomplete="code" autofocus>
                        
                                                                @error('code')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="itemName">{{ __('Item Name') }}</label>
                                                                <input id="name" type="text"
                                                                    class="py-4 form-control @error('name') is-invalid @enderror" name="name"
                                                                    value="{{ old('name') }}" autocomplete="name" autofocus>
                        
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
                                                                <label class="small mb-1" for="itemName">{{ __('Item Group') }}</label>
                                        <select name="item_group[]" class="form-control @error('item_group') is-invalid @enderror" id="item_group" multiple>
                                            <option value="">Select Item Group</option>
                                            @foreach( $itemgroups as $itemgroup)
                                             <option value="{{ $itemgroup->id }}"> {{ $itemgroup->group_name }}</option>
                                            @endforeach
                                            
                                        </select>
                        
                                        @error('item_group')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="itemUnit">{{ __('Item Unit') }}</label>
                                        <select id="unit" class="form-control @error('unit') is-invalid @enderror" name="unit" autocomplete="unit" autofocus>
                                            <option value="KG">KG</option>
                                            <option value="PCS">PCS</option>
                                        </select>
                        
                                                                @error('unit')
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
                                                                <label class="small mb-1" for="itemSize">{{ __('Item Size') }}</label>
                                                                <input id="size" type="text"
                                                                    class="py-4 form-control @error('size') is-invalid @enderror" name="size"
                                                                    value="{{ old('size') }}" autocomplete="size" autofocus>
                        
                                                                @error('size')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="itemweight">{{ __('CASTING WT1') }}</label>
                                                                <input id="weight" type="text"
                                                                    class="py-4 form-control @error('weight') is-invalid @enderror" name="weight"
                                                                    value="{{ old('weight') }}" autocomplete="weight" autofocus>
                        
                                                                @error('weight')
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
                                                                <label class="small mb-1" for="itemweight2">{{ __('MACHINING E WT2') }}</label>
                                                                <input id="weight1" type="text"
                                                                    class="py-4 form-control @error('weight2') is-invalid @enderror" name="weight1"
                                                                    value="{{ old('weight2') }}" autocomplete="weight2" autofocus>
                        
                                                                @error('weight2')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="itemweight3">{{ __('FINISHEDWT3') }}</label>
                                                                <input id="weight2" type="text"
                                                                    class="py-4 form-control @error('weight3') is-invalid @enderror" name="weight2"
                                                                    value="{{ old('weight3') }}" autocomplete="weight3" autofocus>
                        
                                                                @error('weight3')
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
                                                                <label class="small mb-1" for="itemNRP">{{ __('Item NICKNAME') }}</label>
                                                                <input id="nickname" type="text"
                                                                    class="py-4 form-control @error('nickname') is-invalid @enderror" name="nickname"
                                                                    value="{{ old('NRP') }}" autocomplete="nickname" autofocus>
                        
                                                                @error('nickname')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    <div class="form-group mt-4 mb-0"> <button type="submit" class="btn btn-primary">
                                                            {{ __('Add ITEM') }}
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
                            <div class="modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="itemModal" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="itemModal">Edit ITEM</h5>
                                        
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                            <form method="POST" action="#" id="edititem">
                                                    @csrf
                                                    <input type="hidden" name="itemId" id="itemId">
                                                    <div class="form-row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="Itemcode">{{ __('Item Code') }}</label>
                                                                <input id="editcode" type="text"
                                                                    class="py-4 form-control @error('code') is-invalid @enderror" name="code"
                                                                    value="{{ old('code') }}" autocomplete="code" autofocus readonly>
                        
                                                                @error('code')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="itemName">{{ __('Item Name') }}</label>
                                                                <input id="editname" type="text"
                                                                    class="py-4 form-control @error('name') is-invalid @enderror" name="name"
                                                                    value="{{ old('name') }}" autocomplete="name" autofocus>
                        
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
                                                                <label class="small mb-1" for="itemName">{{ __('Item Group') }}</label>
                                        <select name="item_group[]" class="form-control @error('item_group') is-invalid @enderror" id="edititem_group" multiple>
                                            <option value="">Select Item Group</option>
                                            @foreach( $itemgroups as $itemgroup)
                                             <option value="{{ $itemgroup->id }}"> {{ $itemgroup->group_name }}</option>
                                            @endforeach
                                            
                                        </select>
                        
                                        @error('item_group')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="itemUnit">{{ __('Item Unit') }}</label>
                                                                <select id="editunit" class="form-control @error('unit') is-invalid @enderror" name="unit" autocomplete="unit" autofocus>
                                            <option value="KG">KG</option>
                                            <option value="PCS">PCS</option>
                                        </select>
                        
                                                                @error('unit')
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
                                                                <label class="small mb-1" for="itemSize">{{ __('Item Size') }}</label>
                                                                <input id="editsize" type="text"
                                                                    class="py-4 form-control @error('size') is-invalid @enderror" name="size"
                                                                    value="{{ old('size') }}" autocomplete="size" autofocus>
                        
                                                                @error('size')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="itemweight">{{ __('CASTING WT1') }}</label>
                                                                <input id="editweight" type="text"
                                                                    class="py-4 form-control @error('weight') is-invalid @enderror" name="weight"
                                                                    value="{{ old('weight') }}" autocomplete="weight" autofocus>
                        
                                                                @error('weight')
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
                                                                <label class="small mb-1" for="itemweight2">{{ __('MACHINING E WT2') }}</label>
                                                                <input id="editweight1" type="text"
                                                                    class="py-4 form-control @error('weigh2t') is-invalid @enderror" name="weight2"
                                                                    value="{{ old('weight2') }}" autocomplete="weight2" autofocus>
                        
                                                                @error('weight2')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="itemweight3">{{ __('FINISHEDWT3') }}</label>
                                                                <input id="editweight2" type="text"
                                                                    class="py-4 form-control @error('weight3') is-invalid @enderror" name="weight3"
                                                                    value="{{ old('weight3') }}" autocomplete="weight3" autofocus>
                        
                                                                @error('weight3')
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
                                                                <label class="small mb-1" for="itemMRP">{{ __('Item NICKNAME') }}</label>
                                                                <input id="editnickname" type="text"
                                                                    class="py-4 form-control @error('editnickname') is-invalid @enderror" name="editnickname"
                                                                    value="{{ old('editnickname') }}" autocomplete="editnickname" autofocus>
                        
                                                                @error('editnickname')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                
                                                    <div class="form-group mt-4 mb-0"> <button type="submit" class="btn btn-primary">
                                                            {{ __('UPDATE ITEM') }}
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
                                            <th>Name</th>
                                            <!--<th>Item Group</th>-->
                                            <th>Unit</th>
                                            <th>Item Size</th>
                                            <th>CASTING WT1</th>
                                            <th>MACHINING E WT2</th>
                                            <th>FINISHEDWT3</th>
                                            <th>Nickname</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <!--<th>Item Group</th>-->
                                            <th>Unit</th>
                                            <th>Item Size</th>
                                            <th>CASTING WT1</th>
                                            <th>MACHINING E WT2</th>
                                            <th>FINISHEDWT3</th>
                                            <th>Nickname</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($items as $item)
                                        <tr id="itemrow#{{ $item->id }}" class="edittrigger">
                                            <td>{{ $item->code }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->unit }}</td>
                                            <td>{{ $item->size }}</td>
                                            <td>{{ $item->weight }}</td>
                                            <td>{{ $item->weight1 }}</td>
                                            <td>{{ $item->weight2 }}</td>
                                            <td>{{ $item->nickname }}</td>
                                            <td><a href="itemdestroy/{{ $item->id }}" class="btn btn-primary" onclick="return confirm('Are you sure?')">Delete</a>
                                        <a style="margin-top:5px;" class="btn btn-primary itemedit" id="Item#{{ $item->id }}">Edit</a></td>
                                        </tr>
                                        @endforeach



                                    </tbody>
                                </table>
                                {{ $items->links() }}
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
