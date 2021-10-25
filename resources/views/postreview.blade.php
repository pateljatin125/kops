@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @foreach ($reviewrequest as $reviewrequestval)
        <div class="col-md-8">
            <div class="card">
                <?php $log = DB::table('users')->where('id', $reviewrequestval->request_from)->first(); // or whatever, just get one log 
				$reviewformdata = DB::table('review_form')->where( "designed_by",$reviewrequestval->request_from )->get()->first();
				$formelements = $reviewformdata->formelements;
				$averagestars = $reviewformdata->averagestars;
				?>
				@if($reviewrequestval->review_status == '1')
				    <div class="card-header" style="padding:10px 2px;">Please Write Review For <?php echo $log->company_name;?></div>

                        <div class="card-body">
                            <b>Sorry the link is expired!</b>    
                        </div>
                    </div>
				    
				@else
                <div class="card-header" style="padding:10px 2px;">Please Write Review For <?php echo $log->company_name;?></div>

                <div class="card-body">

                        <div class="alert alert-success" role="alert">
                            <form method="POST" id="submitreviewvalue1" name="submitreviewvalue1" action="{{ route('submitreview') }}">
                                @csrf
                                {{ method_field('POST') }}
                                <input type="hidden" value="{{ $reviewrequestval->request_from }}" name="request_from" id="request_from">
								<input type="hidden" value="{{ $requestId }}" name="requestId" id="requestId">
                                <input type="hidden" value="{{ $log->google_location }}" name="redirectUrl" id="redirectUrl">
                                <input type="hidden" value="{{ $averagestars }}" name="averagestars" id="averagestars">

                                
								@if(!empty($formelements))
								<?php $arrayFormelements = explode(',',$formelements);
								?>

								@foreach($arrayFormelements as $key=>$value)
								<div class="form-example-int">
									<div class="form-group">
										<label>{{ $value }}</label>
										<div class="nk-int-st">
										<input type="range" min="1" max="5" value="20" name="rating[{{ $key }}]" data-rangeslider>
										</div>
									</div>
								</div>

								@endforeach
								@else
								<div class="form-group row">
                                    <label for="rating" class="col-md-4 col-form-label text-md-right">{{ __('How Many Stars') }}</label>

                                    <div class="col-md-6">
                                        <div class="budget-wrap">
                                            	<div class="budget">
                                            		
                                            		<div class="content">
                                            			<input type="range" min="1" max="5" value="20" data-rangeslider>
                                            		</div>
                                            	</div>
                                            </div>
                                    </div>
                                </div>
								@endif
                                <div class="form-group row">
                                    <label for="review" class="col-md-4 col-form-label text-md-right">{{ __('Write Your Review') }}</label>

                                    <div class="col-md-6">
                                        <textarea id="review"  class="form-control @error('review') is-invalid @enderror" name="review" value="{{ old('review') }}" required autocomplete="review" autofocus></textarea>

                                        @error('review')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $review }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            


                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" id="" class="btn btn-primary">
                                            {{ __('SUBMIT YOUR REVIEW') }}
                                        </button>
                                    </div>
                                    <div id="response"></div>
                                </div>

                            </form>
                        </div>

                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
<style>
    *,:after,:before{box-sizing:border-box}
.pull-left{float:left}
.pull-right{float:right}
.clearfix:after,.clearfix:before{content:'';display:table}
.clearfix:after{clear:both;display:block}

.rangeslider,
.rangeslider__fill {
	display:block;
	border-radius:10px;
}

.rangeslider {
	position:relative;
}
.rangeslider:after{
	top:50%;
	left:0;
	right:0;
	content:'';
	width:100%;
	height:5px;
	margin-top:-2.5px;
	border-radius:5px;
	position:absolute;
	background:#212131;
}

.rangeslider--horizontal{
	width:100%;
	height:28px;
}

.rangeslider--vertical{
	width:5px;
	min-height:150px;
	max-height:100%;
}
.rangeslider--disabled{
	filter:progid:DXImageTransform.Microsoft.Alpha(Opacity=40);
	opacity:0.4;
}

.rangeslider__fill{
	position:absolute;
	background:#ff637b;
}
.rangeslider--horizontal .rangeslider__fill{
	top:0;
	height:100%;
}
.rangeslider--vertical .rangeslider__fill{
	bottom:0;
	width:100%;
}

.rangeslider__handle{
	top:50%;
	width:28px;
	height:28px;
	cursor:pointer;
	margin-top:-14px;
	background:white;
	position:absolute;
	background:#ff637b;
	border-radius:50%;
	display:inline-block;
}
.rangeslider__handle:active{
	background:#ff5a7b;
}

.rangeslider__fill,
.rangeslider__handle{
	z-index:1;
}
.rangeslider--horizontal .rangeslider__fill{
	top:50%;
	height:5px;
	margin-top:-2.5px;
}

/* Budget */
.budget-wrap{
	padding:40px;
	background:#292942;
	box-shadow:0 25px 55px 0 rgba(0,0,0,.21),0 16px 28px 0 rgba(0,0,0,.22);
}
.budget-wrap .header .title{
	color:#fff;
	font-size:18px;
	margin-bottom:30px;
}
.budget-wrap .header .title .pull-right{
	color:#ff5a84;
	font-size:24px;
	font-weight:400;
}
.budget-wrap .footer{
	margin-top:30px;
}
.budget-wrap .footer .btn{
	color:inherit;
	padding:12px 24px;
	border-radius:50px;
	display:inline-block;
	text-decoration:none;
}
.budget-wrap .footer .btn.btn-def{
	color:#525263;
}
.budget-wrap .footer .btn.btn-pri{
	color:#eee;
	background:#ff5a84;
}
</style>


@endsection
