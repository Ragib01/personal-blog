@extends('layouts.admin')

@section('title', 'Dashboard')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i> Posts Count
                        </div>
                        <div class="card-block">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Types</th>
                                    <th>Total Post</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Blog</td>
                                    <td>{{$total_blog}}</td>
                                </tr>
                                <tr>
                                    <td>Research</td>
                                    <td>{{$total_research}}</td>
                                </tr>
                                <tr>
                                    <td>Project</td>
                                    <td>{{$total_project}}</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('style')
    <style>
        #DataTables_Table_0_filter label input {
            margin-left: 10px;
        }

        #DataTables_Table_0_length label select {
            margin: 0 10px;
        }
    </style>
@endsection

@section('script')
@endsection