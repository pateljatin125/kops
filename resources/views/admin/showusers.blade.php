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
                    
                    
                    
                    
                    
                    <div style="display:none;" id="modalForEdit">
                     <!-- Button trigger modal -->
                            <!-- Button trigger modal -->
                        <!-- Modal -->
                        <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                    
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                        <form method="POST" id="edituser" action="#">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="userId" id="userId">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputFirstName">{{ __('Name') }}</label>
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
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmployeeCode">{{ __('Employee Code') }}</label>
                                        <input id="employee_code" type="text"
                                            class="py-4 form-control @error('employee_code') is-invalid @enderror" name="employee_code"
                                            value="{{ old('employee_code') }}"  autocomplete="employee_code" autofocus readonly>

                                        @error('employee_code')
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
                                <label class="small mb-1" for="inputEmailAddress">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email"
                                    class="py-4 form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            </div>
                            
                            <div class="col-md-6">
                                    <div class="form-group">
                                <label class="small mb-1" for="inputUserId">{{ __('User Id') }}</label>
                                <input id="user_id" type="text"
                                    class="py-4 form-control @error('user_id') is-invalid @enderror" name="user_id"
                                    value="{{ old('user_id') }}" autocomplete="user_id">

                                @error('email')
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
                                <label class="small mb-1" for="inputGooglelocation">{{ __('Select Group') }}</label>
                                <select id="customer_group"
                                    class="form-control @error('customer_group') is-invalid @enderror" name="customer_group">
                                    <option value="">Select Group</option>
                                    <option value="admin">Admin</option>
                                    <option value="material_handler">Material Handler</option>
                                    <option value="reporting_manager">Reporting Manager</option>
                                </select>

                                @error('customer_group')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group" id="departmentsFor">
                                

                            </div>
                            </div>
                            
                            </div>




                             <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputPassword">{{ __('Mobile Number') }}</label>
                                        <input id="mobile" type="text"
                                            class="py-4 form-control @error('mobile') is-invalid @enderror"
                                            name="mobile" autocomplete="new-mobile">

                                        @error('mobile')
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
                                        <label class="small mb-1" for="inputPassword">{{ __('Password') }}</label>
                                        <input id="password" type="password"
                                            class="py-4 form-control @error('password') is-invalid @enderror"
                                            name="password" autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1"
                                            for="inputConfirmPassword">{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password" class="py-4 form-control"
                                            name="password_confirmation" autocomplete="new-password">


                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-4 mb-0"> <button type="submit" class="btn btn-primary">
                                    {{ __('UPDATE') }}
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
                    
                    
                    
                    
                    
                    
                    <!--for the enteries of this week-->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Users List
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTableusers" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Employee Code</th>
                                            <th>User Id</th>
                                            <th>Email</th>
                                            <th>Department</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Employee Code</th>
                                            <th>User Id</th>
                                            <th>Email</th>
                                            <th>Department</th>
                                            <th>Actions</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->employee_code }}</td>
                                            <td>{{ $user->user_id }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td><?php $userdepartments = $user->department; 
                                            // $userdepartments = @unserialize($userdepartments);
                                            // if($userdepartments!== false)
                                            // {
                                            //     foreach($userdepartments as $userdepartment)
                                            //     {
                                            //         $result = DB::table('departments')->select('name')->where('id', $userdepartment)->first();
                                            //  echo $result->name."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";}
                                            // }
                                        ?></td>
                                            <td><a href="userdestroy/{{ $user->id }}" class="btn btn-primary" onclick="return confirm('Are you sure?')">Delete</a>
                                    <a style="margin-top:5px;" class="btn btn-primary useredit" id="user#{{ $user->id }}">Edit</a></td>
                                            
                                        </tr>
                                        @endforeach



                                    </tbody>
                                </table>
                                {{ $users->links() }}
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
