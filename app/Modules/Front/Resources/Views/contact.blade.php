@extends('layouts.app2')

@section('title', 'contact')


@section('content')
    <!-- Google Map start-->
    <h3 style="text-align: center">Find us in Google Maps</h3>
    <div  id="map" style="width: 100%; height: 400px;"></div>
    <script>
        function initMap() {
            var uluru = {lat:24.2353377, lng: 89.8918372};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 17,
                scrollwheel: false,
                center: uluru
            });
            var marker = new google.maps.Marker({
                position: uluru,
                map: map
            });
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFrrDtOaojSKHs2xOLypXNFMFdnQmqjrs&callback=initMap">
    </script>
    <!--  Google Map End-->
    <div class="page-content">

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                @foreach($contact as $contact_data)
                    <h4 class="text-uppercase">Office Location</h4>

                    <p>{{ $contact_data->address }}</p>
                    <address>
                        <p>Mobile: {{ $contact_data->phone }}</p>
                        <p>Telephone: {{ $contact_data->tele_phone }}</p>
                        <p>Fax: {{ $contact_data->fax }}</p>
                        <p>E-mail: {{ $contact_data->email }}</p>
                    </address>
                @endforeach
                </div>

                <div class="col-md-8">
                    <h4 class="text-uppercase" style="color: #0c5480">have you a question?</h4>
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-md-12">
                                @include('inc.notification')
                            </div>
                        </div>

                <!--    <form class="contact-comments m-top-50" action="" method="post"> -->

                    {!! Form::open(['url' => route('contact_mail_Store'), 'method' => 'post', 'files' => true]) !!}
                    <div class="row">
                        <div class="contact-comments">

                            <div class="col-md-6 form-group">
                                <label>Name *</label>
                                <!-- Name -->
                                <input type="text" name="name" id="name" value="{{ old('name') ? old('name') : ''}}" class=" form-control" maxlength="100" required="">
                                @if($errors->first('name'))
                                    <span class="help-block text-danger" style="margin-top: 5px;">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="col-md-6 form-group">
                                <label>Email *</label>
                                <!-- Email -->
                                <input type="email" name="email" id="email" value="{{ old('email') ? old('email') : ''}}" class=" form-control" maxlength="100" required="">
                                @if($errors->first('email'))
                                    <span class="help-block text-danger" style="margin-top: 5px;">{{ $errors->first('email') }}</span>
                                @endif
                            </div>


                            <div class="form-group col-md-6">
                                <label>Phone</label>
                                <!-- Phone -->
                                <input type="text" name="phone" id="phone" value="{{ old('phone') ? old('phone') : ''}}" class=" form-control" maxlength="100">
                                @if($errors->first('phone'))
                                    <span class="help-block text-danger" style="margin-top: 5px;">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label>Subject *</label>
                                <!-- Subject -->
                                <input type="text" name="subject" id="subject" value="{{ old('subject') ? old('subject') : ''}}" class=" form-control" required>
                                @if($errors->first('subject'))
                                    <span class="help-block text-danger" style="margin-top: 5px;">{{ $errors->first('subject') }}</span>
                                @endif
                            </div>


                            <div class="form-group col-md-12">
                                <label>Message *</label>
                                <!-- Comment -->
                                <textarea name="message" id="message" value="{{ old('message') ? old('message') : ''}}" class="cmnt-text form-control" rows="6" required></textarea>
                                @if($errors->first('message'))
                                    <span class="help-block text-danger" style="margin-top: 5px;">{{ $errors->first('message') }}</span>
                                @endif

                            </div>

                            <!-- Send Button -->
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-sm btn-primary"> Submit</button>
                            </div>
                        </div>

                        </div>

                    {!! Form::close() !!}

                </div>
                </div>
            </div>
        </div>


    </div>
@endsection