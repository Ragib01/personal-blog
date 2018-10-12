@extends('layouts.app2')

@section('title', 'Blog')

@section('content')
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!--classic image post-->
                    <div class="blog-classic">
                        <div class="blog-post">
                            <h4 class="text-uppercase">{{$post->title}}</h4>
                            <ul class="post-meta">
                                <li><i class="fa fa-calendar"></i>  <a href="#">{{$post->updated_at->format('d M Y')}}</a>
                                <li><i class="fa fa-folder-open"></i>  <a href="{{ url('blog/'.$post->blogCategory->id.'/category') }}">{{$post->blogCategory->title}}</a></li>
                                </li>
                            </ul>

                            <p> <?php echo $post->description ?></p>
                            <div class="m-bot-10">
                                <a href="{{ url('blog/'.$post->id.'/download') }}" class="btn btn-small  btn-theme-color " >Download</a>
                            </div>

                            <div class="clearfix inline-block m-top-50 m-bot-50">
                                <h6 class="text-uppercase">Share this Post </h6>
                                <div class="widget-social-link circle">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-dribbble"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-behance"></i></a>
                                </div>
                            </div>

                            <!--comments discussion section start-->

                            <div class="heading-title-alt text-left heading-border-bottom">
                                <h4 class="text-uppercase">5 Comments</h4>
                            </div>


                            <!--comments discussion section end-->

                            <!--comments  section start-->

                            <div class="heading-title-alt text-left heading-border-bottom">
                                <h4 class="text-uppercase">Leave a Comments</h4>
                            </div>

                            <form method="post" action="#" id="form" role="form" class="blog-comments">

                                <div class="row">

                                    <div class="col-md-6 form-group">
                                        <!-- Name -->
                                        <input type="text" name="name" id="name" class=" form-control" placeholder="Name *" maxlength="100" required="">
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <!-- Email -->
                                        <input type="email" name="email" id="email" class=" form-control" placeholder="Email *" maxlength="100" required="">
                                    </div>


                                    <div class="form-group col-md-12">
                                        <!-- Website -->
                                        <input type="text" name="website" id="website" class=" form-control" placeholder="Website" maxlength="100">
                                    </div>

                                    <!-- Comment -->
                                    <div class="form-group col-md-12">
                                        <textarea name="text" id="text" class=" form-control" rows="6" placeholder="Comment" maxlength="400"></textarea>
                                    </div>

                                    <!-- Send Button -->
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-small btn-dark-solid ">
                                            Send comment
                                        </button>
                                    </div>


                                </div>

                            </form>

                            <!--comments  section end-->

                        </div>
                    </div>
                    <!--classic image post-->

                </div>
                <div class="col-md-4">

                    <!--most viewed post widget-->
                    <div class="widget">
                        <div class="heading-title-alt text-left heading-border-bottom">
                            <h6 class="text-uppercase">Related Post</h6>
                        </div>
                        <ul class="widget-latest-post">
                                @foreach($related as $post)
                                <li>
                                    <div class="w-desk">
                                        <a href="{{url('blog/'.$post->id.'/show')}}">{{ $post->title }}</a>
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
                            <li><a href="{{url('blog/'.$category->id.'/category')}}">{{ $category->title }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!--category widget-->

                </div>
            </div>
        </div>
    </div>

@endsection