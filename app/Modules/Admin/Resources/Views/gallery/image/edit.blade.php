@extends('layouts.admin')

@section('title', 'Gallery')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active">Gallery Images</li>
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
                        <strong>Edit</strong>
                    </div>
                    {!! Form::open(['url' => route('admin_gallery_update', ['id' => $image->id]), 'method' => 'post', 'files' => true, 'class' => 'form-horizontal']) !!}
                    <div class="card-block">
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label text-right" for="title">Title</label>
                            <div class="col-md-9">
                                <input type="text" id="title" name="title" value="{{ old('title') ? old('title') : $image->title}}" class="form-control" placeholder="Post Title">
                                @if($errors->first('title'))
                                    <span class="help-block text-danger" style="margin-top: 5px;">{{ $errors->first('title') }}</span>
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
                                <img src="{{ url('uploads/images/gallery-image/' . $image->image) }}" style="width: 300px; height: 300px" alt="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label  text-right" for="category_id">Select Category</label>
                            <div class="col-md-9">
                                <select id="category_id" name="category_id" class="form-control" size="1">
                                    <option value="">Please select</option>
                                    @foreach($categories as $category)
                                        @if($category->id == old('category_id'))
                                            <option value="{{ $category->id }}" selected>{{ $category->title }}</option>
                                        @else
                                            @if($image->category_id == $category->id))
                                            <option value="{{ $category->id }}" selected>{{ $category->title }}</option>
                                            @else
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endif
                                        @endif
                                    @endforeach
                                </select>
                                @if($errors->first('category'))
                                    <span class="help-block text-danger" style="margin-top: 5px;">{{ $errors->first('category') }}</span>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
                                <a class="btn btn-sm btn-danger" href="{{ route('admin_gallery_index') }}">Go Back</a>
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