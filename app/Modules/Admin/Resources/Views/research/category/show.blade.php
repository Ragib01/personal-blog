@extends('layouts.admin')

@section('title', 'Research')

@section('breadcrumb')
    <ol class="breadcrumb">
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

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Category Details</strong>
                    </div>
                    <div class="card-block">
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label text-right" for="title">Title</label>
                            <div class="col-md-9">
                                {{ $category->title }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label text-right" for="description">Description</label>
                            <div class="col-md-9">
                                <?php echo $category->description ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label  text-right" for="image">Image</label>
                            <div class="col-md-9">
                                <img src="{{ url('uploads/images/research-category/' . $category->image) }}" style="width: 300px; height: 300px" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-9">
                                <a class="btn btn-sm btn-danger" href="{{ route('admin_research_category_index') }}">Go Back</a>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
@endsection

@section('script')
@endsection