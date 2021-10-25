@extends('layouts.app')
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
                     
                    
                    <!-- Breadcomb area Start-->
	<div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="breadcomb-wp">
									<div class="breadcomb-icon">
										<i class="notika-icon notika-windows"></i>
									</div>
									<div class="breadcomb-ctn">
										<h2>Review Requests Sent by You</h2>
										<p>Please have a look at the table below for the request sentt to customers</p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
									<button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="notika-icon notika-sent"></i></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcomb area End-->

    <!-- Notification area Start-->
    <div class="notification-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="notification-inner">
                        <div class="contact-hd notification-hd">

                            <h2>User Profile for {{ $profile->name }}</h2>
                            <p>Please have a look at the information below</p>
                        </div>
                        <div class="notification-demo animate-nt mg-t-20">
                            <h5> Name</h5>
                            <p>{{ $profile->name }}</p>

                            <h5> Phone</h5>
                            <p>{{ $profile->phone }}</p>

                            <h5> Address</h5>
                            <p>{{ $profile->address }}</p>

                            <h5> Company Name</h5>
                            <p>{{ $profile->company_name }}</p>

                            <h5> Industry</h5>
                            <p>{{ $profile->industry }}</p>


                            <h5> Google Review Location</h5>
                            <p>{{ $profile->google_location }}</p>


                            <h5> Email</h5>
                            <p>{{ $profile->email }}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Notification area End-->


    
    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
