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
                            ADMIN GROUPS  <span style="float:right;"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    ADD NEW
                                </a></span>
                        </div>
                        
                        
                        
                        <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New ADMIN GROUP</h5>
                                        
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                            <form method="POST" action="#" id="addadmingroup">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="groupName">{{ __('Group Name') }}</label>
                                                                <input id="groupname" type="text"
                                                                    class="py-4 form-control @error('groupname') is-invalid @enderror" name="groupname"
                                                                    value="{{ old('groupname') }}" required autocomplete="groupname" autofocus>
                        
                                                                @error('groupname')
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
                                                                <label class="small mb-1" for="groupCode">{{ __('Group Code') }}</label>
                                                                <input id="groupcode" type="text"
                                                                    class="py-4 form-control @error('groupcode') is-invalid @enderror" name="groupcode"
                                                                    value="AG{{ $lastid }}" readonly required autocomplete="groupcode" autofocus>
                        
                                                                @error('groupcode')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    </div>
                        
                                                    <div class="form-group mt-4 mb-0"> <button type="submit" class="btn btn-primary">
                                                            {{ __('Add Group') }}
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
                                <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="groupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit ITEM GROUP</h5>
                                        
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                            <form method="POST" action="#" id="editadmingroup">
                                                <input type="hidden" name="groupId" id="groupId">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="groupName">{{ __('Group Name') }}</label>
                                                                <input id="editgroupname" type="text"
                                                                    class="py-4 form-control @error('groupname') is-invalid @enderror" name="groupname"
                                                                    value="{{ old('groupname') }}" required autocomplete="groupname" autofocus>
                        
                                                                @error('groupname')
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
                                                                <label class="small mb-1" for="groupCode">{{ __('Group Code') }}</label>
                                                                <input id="editgroupcode" type="text"
                                                                    class="py-4 form-control @error('groupcode') is-invalid @enderror" name="groupcode"
                                                                    value="{{ old('groupcode') }}" required autocomplete="groupcode" autofocus readonly>
                        
                                                                @error('groupcode')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    </div>
                        
                                                    <div class="form-group mt-4 mb-0"> <button type="submit" class="btn btn-primary">
                                                            {{ __('Edit Group') }}
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
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($admingroups as $admingroup)
                                        <tr>
                                            <td>{{ $admingroup->code }}</td>
                                            <td>{{ $admingroup->name }}</td>
                                
                                        <td><a href="groupdestroy/{{ $admingroup->id }}" class="btn btn-primary" onclick="return confirm('Are you sure?')">Delete</a>
                                    <a style="margin-top:5px;" class="btn btn-primary admingroupedit" id="Admingroup#{{ $admingroup->id }}">Edit</a></td>
                                        </tr>
                                        @endforeach



                                    </tbody>
                                </table>
                                {{ $admingroups->links() }}
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
