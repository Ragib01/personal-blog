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
                        <strong>Edit Category</strong>
                    </div>
                    {!! Form::open(['url' => route('admin_research_category_update', ['id' => $category->id]), 'method' => 'post', 'files' => true, 'class' => 'form-horizontal']) !!}
                    <div class="card-block">
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label text-right" for="title">Title</label>
                            <div class="col-md-9">
                                <input type="text" id="title" name="title" value="{{ old('title') ? old('title') : $category->title}}" class="form-control" placeholder="Category Title">
                                @if($errors->first('title'))
                                    <span class="help-block text-danger" style="margin-top: 5px;">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label text-right" for="description">Description</label>
                            <div class="col-md-9">
                                <textarea id="description" name="description" rows="9" class="form-control ckeditor" placeholder="Category Description">
                                    {{ old('description') ? old('description') : $category->description}}
                                </textarea>
                                @if($errors->first('description'))
                                    <span class="help-block text-danger" style="margin-top: 5px;">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label  text-right" for="image">Image</label>
                            <div class="col-md-9">
                                <input type="file" id="image" name="image">
                                <br>
                                @if($errors->first('image'))
                                    <span class="help-block text-danger" style="margin-top: 5px;">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label  text-right" for="image"></label>
                            <div class="col-md-9">
                                <img src="{{ url('uploads/images/research-category/' . $category->image) }}" style="width: 300px; height: 300px" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
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