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
                            Reviews Given
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                </table>
                                {{ $reviewsgiven->links() }}
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
