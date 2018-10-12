@extends('layouts.app2')

@section('title', 'Gallery')


@section('content')
    <section class="body-content page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div class="text-center">
                    <ul class="portfolio-filter">
                        <li class="active"><a href="#" data-filter="*"> All</a>
                        </li>
                        @foreach($categories as $category)
                        <li><a href="#" data-filter=".cat{{$category->id}}">{{$category->title}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="portfolio col-3 portfolio-gallery gutter ">
                    @foreach($images as $image)
                    <div class="portfolio-item cat{{ $image->galleryCategory->id}}">

                        <div class="thumb">
                            <img src="{{ url('uploads/images/gallery-image/' . $image->image) }}" alt="image">
                            <div class="portfolio-hover">

                                <div class="action-btn">
                                    <a href="{{ url('uploads/images/gallery-image/' . $image->image) }}" class="popup-gallery" title="Title 1"> <i class="icon-basic_magnifier"></i>
                                    </a>
                                </div>

                                <div class="portfolio-description">
                                    <h4><a href="{{ url('uploads/images/gallery-image/' . $image->image) }}" class="popup-gallery2" title="Title 1">{{$image->title}}</a></h4>
                                    <p><a href="#">category</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach

                </div>


            </div>
        </div>
    </div>
    </section>
@endsection