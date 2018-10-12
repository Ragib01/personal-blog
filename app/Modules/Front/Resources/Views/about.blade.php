@extends('layouts.app2')

@section('title', 'About')


@section('content')
    <div class="container">
        <div class="row page-content" style="text-align: center;">

            <div class="col-md-12 ">
                <div class="text-center m-bot-100" style="background-color: #E0E0E0;">
    @foreach($about as $about_data)
                    <h3 class="text-uppercase">
                        {{$about_data->title}}
                    </h3>

                    <p>
                        <?php echo $about_data->description ?>
                    </p>

                </div>
            </div>
    @endforeach

        </div>
    </div>
@endsection