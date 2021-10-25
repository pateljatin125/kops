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
										<h2>Build your own review form</h2>
										<p>Please have a look</p>
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
                        <div class="notification-demo animate-nt mg-t-20">
                            <form method="POST" action="{{ route('submitreviewformbuildblocks') }}">
                                @csrf
                            <input type="hidden" value="@if(!empty($reviewformdata->designed_by)) {{ $reviewformdata->designed_by }} @endif" name="designed_by">

                            <div class="form-example-int">
                            <div class="form-group">
                                <label>{{ __('Message to send') }}</label>
                                <div class="nk-int-st">
                                <textarea required="true" class="form-control input-sm"  name="message"> @if(!empty($reviewformdata->message)) {{ $reviewformdata->message }} @endif</textarea>
                                </div>
                            </div>
                        </div>


                        <div class="form-example-int">
                            <div class="form-group">
                                <label>{{ __('Average stars for navigation') }}</label>
                                <div class="nk-int-st">
                                <input type="text" class="form-control input-sm" required="true" name="averagestars" value="@if(!empty($reviewformdata->averagestars)) {{ $reviewformdata->averagestars }} @endif">
                                </div>
                            </div>
                        </div>


                        <div class="form-example-int">
                            <div class="form-group">
                                <label>{{ __('Star rating elements') }}</label>
                                <div class="nk-int-st">
                                <textarea required="true" class="form-control input-sm" name="formelements">@if(!empty($reviewformdata->formelements)) {{ $reviewformdata->formelements }}  @endif</textarea>
                                </div>
                            </div>
                        </div>
                           
                            
                        <div class="form-example-int mg-t-15">
                                    <button type="submit" id="submitrequest" class="btn btn-success notika-btn-success waves-effect">SAVE CHANGES</button>
                                </div>

                            </form>
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
