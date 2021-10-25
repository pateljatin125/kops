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


                        <form method="POST" action="{{ route('admin.register') }}">
                            @csrf
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
                                            value="EMP{{ $lastid }}" readonly  autocomplete="employee_code" autofocus>

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

                            <!--<div class="form-group">-->
                            <!--    <label class="small mb-1" for="inputPhone">{{ __('Phone') }}</label>-->
                            <!--    <input id="phone" type="text"-->
                            <!--        class="py-4 form-control @error('phone') is-invalid @enderror" name="phone"-->
                            <!--        value="{{ old('phone') }}" required autocomplete="phone">-->

                            <!--    @error('phone')-->
                            <!--        <span class="invalid-feedback" role="alert">-->
                            <!--            <strong>{{ $message }}</strong>-->
                            <!--        </span>-->
                            <!--    @enderror-->

                            <!--</div>-->



                            <!--<div class="form-group">-->
                            <!--    <label class="small mb-1" for="inputAddress">{{ __('Address') }}</label>-->
                            <!--    <input id="address" type="text"-->
                            <!--        class="py-4 form-control @error('address') is-invalid @enderror" name="address"-->
                            <!--        value="{{ old('addresss') }}" required autocomplete="address">-->

                            <!--    @error('address')-->
                            <!--        <span class="invalid-feedback" role="alert">-->
                            <!--            <strong>{{ $message }}</strong>-->
                            <!--        </span>-->
                            <!--    @enderror-->

                            <!--</div>-->



                            <!--<div class="form-group">-->
                            <!--    <label class="small mb-1" for="inputCompanyname">{{ __('Company Name') }}</label>-->
                            <!--    <input id="company_name" type="text  "-->
                            <!--        class="py-4 form-control @error('company_name') is-invalid @enderror" name="company_name"-->
                            <!--        value="{{ old('company_name') }}" required autocomplete="company_name">-->

                            <!--    @error('company_name')-->
                            <!--        <span class="invalid-feedback" role="alert">-->
                            <!--            <strong>{{ $message }}</strong>-->
                            <!--        </span>-->
                            <!--    @enderror-->

                            <!--</div>-->



                            <!--<div class="form-group">-->
                            <!--    <label class="small mb-1" for="inputIndustry">{{ __('Industry') }}</label>-->
                            <!--    <input id="industry" type="text"-->
                            <!--        class="py-4 form-control @error('industry') is-invalid @enderror" name="industry"-->
                            <!--        value="{{ old('industry') }}" required autocomplete="industry">-->

                            <!--    @error('industry')-->
                            <!--        <span class="invalid-feedback" role="alert">-->
                            <!--            <strong>{{ $message }}</strong>-->
                            <!--        </span>-->
                            <!--    @enderror-->

                            <!--</div>-->


                            <!--<div class="form-group">-->
                            <!--    <label class="small mb-1" for="inputGooglelocation">{{ __('Google Location') }}</label>-->
                            <!--    <input id="google_location" type="text"-->
                            <!--        class="py-4 form-control @error('google_location') is-invalid @enderror" name="google_location"-->
                            <!--        value="{{ old('google_location') }}" required autocomplete="google_location">-->

                            <!--    @error('google_location')-->
                            <!--        <span class="invalid-feedback" role="alert">-->
                            <!--            <strong>{{ $message }}</strong>-->
                            <!--        </span>-->
                            <!--    @enderror-->

                            <!--</div>-->
                            
                            
                            <div class="form-row">
                                <div class="col-md-6">
                                <div class="form-group">
                                <label class="small mb-1" for="inputGooglelocation">{{ __('Select Group') }}</label>
                                <select id="customer_group"
                                    class="form-control @error('customer_group') is-invalid @enderror" name="customer_group">
                                    <option value="">Select Group</option>
                                    @foreach ($admingroups as $admingroup)
                                    <option value="{{ $admingroup->id }}">{{ $admingroup->name }}</option>
                                    @endforeach
                                </select>

                                @error('customer_group')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="small mb-1" for="inputGooglelocation">{{ __('Select Department') }}</label>
                                <select id="department"
                                    class="form-control @error('department') is-invalid @enderror" name="department[]"  multiple>
                                    <option value="">Select Department</option>
                                    @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>

                                @error('customer_group')
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
                                    {{ __('Register') }}
                                </button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
