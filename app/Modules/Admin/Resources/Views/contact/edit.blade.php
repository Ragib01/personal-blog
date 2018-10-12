@extends('layouts.admin')

@section('title', 'Contact')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active">Contact</li>
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
                        <strong>Edit Contact</strong>
                    </div>
                    {!! Form::open(['url' => route('admin_contact_update', ['id' => 1]), 'method' => 'post', 'files' => true, 'class' => 'form-horizontal']) !!}

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label text-right" for="title">Address</label>
                            <div class="col-md-9">
                                <input type="text" id="address" name="address" value="{{ old('address') ? old('address') : $contact->address}}" class="form-control" placeholder="your address">
                                @if($errors->first('address'))
                                    <span class="help-block text-danger" style="margin-top: 5px;">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label text-right" for="title">Phone</label>
                            <div class="col-md-9">
                                <input type="text" id="phone" name="phone" value="{{ old('phone') ? old('phone') : $contact->phone}}" class="form-control" placeholder="your phone number">
                                @if($errors->first('phone'))
                                    <span class="help-block text-danger" style="margin-top: 5px;">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label text-right" for="title">Tele Phone</label>
                            <div class="col-md-9">
                                <input type="text" id="tele_phone" name="tele_phone" value="{{ old('tele_phone') ? old('tele_phone') : $contact->tele_phone}}" class="form-control" placeholder="your tele-phone number">
                                @if($errors->first('tele_phone'))
                                    <span class="help-block text-danger" style="margin-top: 5px;">{{ $errors->first('tele_phone') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 form-control-label text-right" for="title">Fax</label>
                            <div class="col-md-9">
                                <input type="text" id="fax" name="fax" value="{{ old('fax') ? old('fax') : $contact->fax}}" class="form-control" placeholder="your fax number">
                                @if($errors->first('fax'))
                                    <span class="help-block text-danger" style="margin-top: 5px;">{{ $errors->first('fax') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2 form-control-label text-right" for="title">E-mail</label>
                            <div class="col-md-9">
                                <input type="text" id="email" name="email" value="{{ old('email') ? old('email') : $contact->email}}" class="form-control" placeholder="your e-mail">
                                @if($errors->first('email'))
                                    <span class="help-block text-danger" style="margin-top: 5px;">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>


                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> Submit</button>
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