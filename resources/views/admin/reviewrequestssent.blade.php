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
                            Review requests sent to customers
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Request From</th>
                                            <th>Request Phone</th>
                                            <th>Address</th>
                                            <th>Request Email</th>
                                            <th>Request Link</th>
                                            <th>Request Time</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Request From</th>
                                            <th>Request Phone</th>
                                            <th>Address</th>
                                            <th>Request Email</th>
                                            <th>Request Link</th>
                                            <th>Request Time</th>
                                            <th>Email</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($reviewrequestssent as $reviewrequestssentVal)
                                        <tr>
                                            <td>{{ $reviewrequestssentVal->request_from }}</td>
                                            <td>{{ $reviewrequestssentVal->request_phone }}</td>
                                            <td>{{ $reviewrequestssentVal->request_email }}</td>
                                            <td>{{ $reviewrequestssentVal->request_link }}</td>
                                            <td>{{ $reviewrequestssentVal->request_at }}</td>
                                        </tr>
                                        @endforeach



                                    </tbody>
                                </table>
                                {{ $reviewrequestssent->links() }}
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
