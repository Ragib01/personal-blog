@extends('layouts.app')

@section('title', 'Home')
@section('hero')
<!--hero section-->
<div id="fullscreen-banner" class="parallax text-center vertical-align home-banner">
    <div class="container-mid">
        <div class="container">
            <div class="banner-title light-txt">
                <h1 class="text-uppercase">Think Beyond</h1>
                <h3 class="text-uppercase">Explore Limitless Possibilities</h3>
            </div>
        </div>
    </div>
</div>
<!--hero section-->
@endsection
@section('content')
        <section class="body-content magazine-grid p-top-50">
            <!--breaking news-->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="magazine-latest-news">
                            <div class="container">
                                <div class="breaking">
                                    Breaking News
                                </div>
                                <div class="news-slider">
                                    <ul class="slides">
                                        @foreach($breakings as $breaking)
                                        <li>
                                            <a href="{{ $breaking->url }}" target="_blank">{{ $breaking->title }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--breaking news-->


            <!--feature-->

            <div class="page-content">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-4">

                            <a href="{{ route('blog_index') }}">
                                <div class="featured-item feature-bg-box gray-bg text-center m-bot-0 inline-block radius-less">

                                    <div class="icon">
                                        <i class="fa fa-book"  style="color: #1abc9c;"></i>
                                    </div>
                                    <div class="title text-uppercase">
                                        <h4 style="color: #1abc9c;">Blog</h4>
                                    </div>
                                    <div class="desc">
                                        My all Blog Posts is here.
                                    </div>
                                </div>
                            </a>

                        </div>
                        <div class="col-md-4">

                            <a href="{{ route('project_index') }}">
                                <div class="featured-item feature-bg-box gray-bg text-center m-bot-0 inline-block radius-less">

                                    <div class="icon">
                                        <i class="fa fa-pied-piper-alt" style="color: #1abc9c;"></i>
                                    </div>
                                    <div class="title text-uppercase">
                                        <h4 style="color: #1abc9c;">Project</h4>
                                    </div>
                                    <div class="desc">
                                        My all Project is here.
                                    </div>
                                </div>
                            </a>

                        </div>
                        <div class="col-md-4">

                            <a href="{{ route('research_index') }}">
                                <div class="featured-item feature-bg-box gray-bg text-center m-bot-0 inline-block radius-less">

                                    <div class="icon">
                                        <i class="fa fa-graduation-cap" style="color: #1abc9c;"></i>
                                    </div>
                                    <div class="title text-uppercase">
                                        <h4 style="color: #1abc9c;">Research</h4>
                                    </div>
                                    <div class="desc">
                                        My all Research is here.
                                    </div>
                                </div>
                            </a>

                        </div>

                        </div>
                    </div>
                </div>

            <!--feature-->

            <hr/>

            <!-- most viewed -->
            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-title text-center">
                                <h3 class="text-uppercase" style="color: #0099CC;"> Most Viewed</h3>
                                <p>My popular <b>blog posts</b> is here</p>
                            </div>

                            <div id="g">
                                @foreach($posts as $post)
                                <div class="item col-md-4">
                                    <div class="post-single">
                                        <div class="post-desk">
                                            <h4 class="text-uppercase">
                                                <a href="#">{{$post->title}}</a>
                                            </h4>
                                            <div class="date" style="color: #00A8FF">
                                                {{$post->updated_at->format('d M Y')}}
                                            </div>
                                            <p>
                                                <?php

                                                $data = preg_replace("/<img[^>]+\>/i", " ", $post->description);

                                                echo str_limit($data, $limit = 150, $end = '...');

                                                ?>
                                            </p>
                                            <a href="{{url('blog/'.$post->id.'/show')}}" class="p-read-more">Read More <i class="icon-arrows_slim_right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!-- most viewed -->

        </section>



        <hr/>
        <hr/>


    <!--body content end-->

@endsection
