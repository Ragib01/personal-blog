@extends('layouts.admin')

@section('title', 'Breaking')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active">Breaking</li>
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
                        <strong>Create New </strong>
                    </div>
                    {!! Form::open(['url' => route('admin_breaking_store'), 'method' => 'post', 'files' => true, 'class' => 'form-horizontal']) !!}
                    <div class="card-block">
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label text-right" for="title">Title</label>
                            <div class="col-md-9">
                                <input type="text" id="title" name="title" value="{{ old('title') ? old('title') : ''}}" class="form-control" placeholder="Post Title">
                                @if($errors->first('title'))
                                    <span class="help-block text-danger" style="margin-top: 5px;">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label text-right" for="title">Url(optional)</label>
                            <div class="col-md-9">
                                <input type="text" id="url" name="url" value="{{ old('url') ? old('url') : ''}}" class="form-control" placeholder="Example https://www.facebook.com/">
                                @if($errors->first('url'))
                                    <span class="help-block text-danger" style="margin-top: 5px;">{{ $errors->first('url') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label  text-right" for="category_id">Select Category</label>
                            <div class="col-md-9">
                                <select id="status" name="status" class="form-control" size="1">
                                    <option value="1">Active</option>

                                        <option value="2">Deactive</option>

                                </select>
                                @if($errors->first('category_id'))
                                    <span class="help-block text-danger" style="margin-top: 5px;">{{ $errors->first('category_id') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
                                <a class="btn btn-sm btn-danger" href="{{ route('admin_breaking_index') }}">Go Back</a>
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