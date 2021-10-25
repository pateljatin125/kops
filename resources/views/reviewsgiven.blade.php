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
										<h2>Reviews posted by customers</h2>
										<p>Please have a look at the table below for the reviews sentt to customers</p>
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

    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Request Phone</th>
                                        <th>Request Email</th>
                                        <th>Review</th>
                                        <th>Rating</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($reviewsgiven as $reviewsgivenval)
                                    <tr>
                                        <td>{{ $reviewsgivenval->request_phone }}</td>
                                        <td>{{ $reviewsgivenval->request_email }}</td>
                                        <td>{{ $reviewsgivenval->review }}</td>
                                        <td><?php 
                                        if($reviewsgivenval->pattern == "")
                                        {
                                            echo $reviewsgivenval->rating;
                                        }
                                        else{
                                            $arrayFormelements = explode(',',$reviewsgivenval->pattern);
                                            $ratingRow = unserialize( $reviewsgivenval->rating );
                                            foreach($arrayFormelements as $key=>$value)
                                            {
                                                echo $value.": <br><b>". $ratingRow[$key]."</b><br>";
                                            }
                                        }
                                        
                                        ?>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                <th>Request Phone</th>
                                        <th>Request Email</th>
                                        <th>Review</th>
                                        <th>Rating</th>
                                    </tr>
                                </tfoot>
                            </table>
                            {{ $reviewsgiven->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->


    
    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
