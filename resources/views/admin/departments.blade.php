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
                            Departments  <span style="float:right;"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    ADD NEW DEPARTMENT
                                </a></span>
                        </div>
                        
                        
                        
                        <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New DEPARTMENT</h5>
                                        
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                            <form method="POST" action="#" id="adddepartment">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="department">{{ __('Department Name') }}</label>
                                                                <input id="department" type="text"
                                                                    class="py-4 form-control @error('department') is-invalid @enderror" name="department"
                                                                    value="{{ old('department') }}" required autocomplete="department" autofocus>
                        
                                                                @error('department')
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
                                                                <label class="small mb-1" for="Code">{{ __('Department Code') }}</label>
                                                                <input id="code" type="text"
                                                                    class="py-4 form-control @error('code') is-invalid @enderror" name="code"
                                                                    value="DEP{{ $lastid }}" readonly required autocomplete="code" autofocus>
                        
                                                                @error('code')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    </div>
                        
                                                    <div class="form-group mt-4 mb-0"> <button type="submit" class="btn btn-primary">
                                                            {{ __('Add Department') }}
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
                            <div class="modal fade" id="departmentModal" tabindex="-1" role="dialog" aria-labelledby="departmentModal" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="departmentModal">Edit DEPARTMENT</h5>
                                        
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                            <form method="POST" action="#" id="editdepartment">
                                                    @csrf
                                                    <input type="hidden" name="departmentId" id="departmentId">
                                                    <div class="form-row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="small mb-1" for="department">{{ __('Department Name') }}</label>
                                                                <input id="editdepartmentname" type="text"
                                                                    class="py-4 form-control @error('department') is-invalid @enderror" name="department"
                                                                    value="{{ old('department') }}" required autocomplete="department" autofocus>
                        
                                                                @error('department')
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
                                                                <label class="small mb-1" for="Code">{{ __('Department Code') }}</label>
                                                                <input id="editcode" type="text"
                                                                    class="py-4 form-control @error('code') is-invalid @enderror" name="code"
                                                                    value="{{ old('code') }}" required autocomplete="code" autofocus>
                        
                                                                @error('code')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                        
                        
                                                            </div>
                                                        </div>
                                                    </div>
                        
                                                    <div class="form-group mt-4 mb-0"> <button type="submit" class="btn btn-primary">
                                                            {{ __('Edit Department') }}
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
                                        @foreach ($departments as $department)
                                        <tr>
                                            <td>{{ $department->code }}</td>
                                            <td>{{ $department->name }}</td>
                                            
                                            <td><a href="departmentdestroy/{{ $department->id }}" class="btn btn-primary" onclick="return confirm('Are you sure?')">Delete</a>
                                    <a style="margin-top:5px;" class="btn btn-primary departmentedit" id="department#{{ $department->id }}">Edit</a></td>
                                        </tr>
                                        @endforeach



                                    </tbody>
                                </table>
                                {{ $departments->links() }}
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
