@extends('layouts.app2')

@section('title', 'Research')

@section('content')
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                @foreach($posts as $post)
                    <!--classic image post-->
                        <div class="blog-classic">
                            <div class="date">
                                {{$post->updated_at->format('d')}}
                                <span>{{$post->updated_at->format('M Y')}}</span>
                            </div>
                            <div class="blog-post">
                                <h4 class="text-uppercase">{{$post->title}}</h4>
                                <ul class="post-meta">
                                    <li><i class="fa fa-folder-open">{{$post->blogCategory}}</i></li>
                                </ul>
                                <p>
                                    <?php

                                    $data = preg_replace("/<img[^>]+\>/i", " ", $post->description);

                                    echo str_limit($data, $limit = 150, $end = '...');

                                    ?>
                                </p>
                                <a href="{{url('research/'.$post->id.'/show')}}" class="btn btn-small btn-dark-solid  "> Continue Reading</a>
                            </div>
                        </div>

                        <!--classic image post-->
                @endforeach


                    <div class="text-center">
                        {{ $posts->links() }}
                    </div>

                </div>

                <div class="col-md-4">

                    <!--most viewed post widget-->
                    <div class="widget">
                        <div class="heading-title-alt text-left heading-border-bottom">
                            <h6 class="text-uppercase">Most viewed</h6>
                        </div>
                        <ul class="widget-latest-post">
                            @foreach($short as $post)
                                <li>
                                    <div class="w-desk">
                                        <a href="{{url('research/'.$post->id.'/show')}}">{{$post->title}}</a>
                                        {{$post->updated_at->format('d M Y')}}
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                    <!--most viewed widget-->

                    <!--follow us widget-->
                    <div class="widget">
                        <div class="heading-title-alt text-left heading-border-bottom">
                            <h6 class="text-uppercase">follow us</h6>
                        </div>
                        <div class="widget-social-link circle">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                    </div>
                    <!--follow us widget-->

                    <!--category widget-->
                    <div class="widget">
                        <div class="heading-title-alt text-left heading-border-bottom">
                            <h6 class="text-uppercase">category</h6>
                        </div>
                        <ul class="widget-category">
                            @foreach($categories as $category)
                                <li><a href="{{url('research/'.$category->id.'/category')}}">{{ $category->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!--category widget-->

                </div>
            </div>
        </div>
    </div>

    <hr/>


    <!--body content end-->

@endsection
