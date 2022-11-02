@extends('layout.layout')

@section('content')
    <div class="row">

        <div class="col-xl-12 col-lg-11">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Those User Not attend any survey yet</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" style="width: 100%">
                        <thead>
                            <tr>

                                <th style="width:20%; ">Name</th>
                                <th style="width:20%; ">Email</th>
                                <th style="width:20%; ">Join Date</th>

                            </tr>
                        </thead>

                        <tbody>
                            @foreach($userList as $list)
                                <tr>
                                    <td scope="row">{{ $list->name }}</td>
                                    <td>{{ $list->email  }}</td>
                                    <td>{{ $list->created_at  }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex">
                        {!! $userList->links() !!}
                    </div>

                </div>
            </div>

            <!-- Bar Chart -->


        </div>


    </div>
@endsection


