@extends('layouts.admin')

@section('title', 'Research')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active">Research Category</li>
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
                <i class="fa fa-edit"></i> Research Category List
            </div>
            <div class="card-block">
                <div class="row col-md-4">
                    <a href="{{ route('admin_research_category_create') }}">
                        <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Add New </button>
                    </a>
                </div>
                <table class="table table-striped table-bordered datatable">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Updated At</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $index = 1; ?>
                    @foreach($categories as $category)
                        <tr>
                            <td>
                                {{ $index++ }}
                            </td>
                            <td>
                                {{ $category->title }}
                            </td>
                            <td>
                                <img src="{{ url('uploads/images/research-category/' . $category->image) }}" width="130" height="100" alt="images">
                            </td>
                            <td>
                                {{ $category->updated_at->format('d/m/Y') }}
                            </td>
                            <td class="text-center">
                                <a class="btn btn-success" href="{{ route('admin_research_category_show', ['id' => $category->id]) }}">
                                    <i class="fa fa-search-plus "></i>
                                </a>
                                <a class="btn btn-info" href="{{ route('admin_research_category_edit', ['id' => $category->id]) }}">
                                    <i class="fa fa-edit "></i>
                                </a>
                                <a class="btn btn-danger delete" href="javascript:void(0)">
                                    <i class="fa fa-trash-o "></i>
                                </a>
                                <input class="delete_url" type="hidden" value="{{ route('admin_research_category_delete', ['id' => $category->id]) }}">
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
    <script>
        $('.delete').click(function () {

            var url = $(this).next('.delete_url').val();

            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                window.location.href = url;
            })

        });
    </script>
@endsection