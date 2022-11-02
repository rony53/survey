@extends('layout.layout')

@section('content')
    <div class="row">

        <div class="col-xl-12 col-lg-11">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">My survey List</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" style="width: 100%">
                        <thead>
                            <tr>

                                <th style="width:20%; ">Q1</th>
                                <th style="width:20%; ">Q2</th>
                                <th style="width:20%; ">Q3</th>
                                <th style="width:20%; ">Q4</th>
                                <th style="width:20%; ">Details</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($myList as $list)
                                <tr>
                                    <td scope="row">{{ $list->q_1 }}</td>
                                    <td>{{ $list->q_2 }}</td>
                                    <td>{{ $list->q_3 }}</td>
                                    <td>{{ $list->q_4 }}</td>
                                    <td>
                                        <a href="{{ route('details', $list->id) }}" class="btn btn-primary btn-icon-split">

                                            <span class="text">Details</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex">
                        {!! $myList->links() !!}
                    </div>

                </div>
            </div>

            <!-- Bar Chart -->


        </div>


    </div>
@endsection


