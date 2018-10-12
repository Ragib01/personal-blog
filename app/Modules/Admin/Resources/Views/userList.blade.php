@extends('layouts.admin')

@section('title', 'UserList')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
@endsection


@section('content')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                @include('inc.notification')
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <i class="fa fa-edit"></i>User List
            </div>
            <div class="card-block">
                <table class="table table-striped table-bordered datatable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Updated At</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $index = 1; ?>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                {{ $index++ }}
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>
                                {{ $user->updated_at->format('d/m/Y') }}
                            </td>
                            <td>
                                @if($user->status == 0)
                                    Deactive
                                @endif
                                @if($user->status == 1)
                                    Active
                                @endif
                            </td>
                            <td>
                                @if($user->status == 1)
                                    <a type="button" class="btn btn-sm btn-danger" href="{{route('admin_user_status_update',['id' =>$user->id])}}" ><i class="fa fa-times" aria-hidden="true"></i>
                                                Dective</a>
                                @endif
                                @if($user->status == 0)
                                    <a type="button" class="btn btn-sm btn-success" href="{{route('admin_user_status_update',['id' =>$user->id])}}" ><i class="fa fa-check-square-o" aria-hidden="true"></i>
                                                Active</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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