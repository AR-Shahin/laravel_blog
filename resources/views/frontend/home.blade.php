@extends('layouts.front_master')

@section('title','Home')
@section('main_section')

    <!-- Hero Section-->
    <div class="owl-carousel hero_slider">
        @foreach($sliders as $slider)
            <section style="background: url({{asset($slider->image)}}); background-size: cover; background-position: center center" class="hero wow animate__animated animate__fadeInTopLeft">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <h1 class="bg-dark p-3">{{$slider->heading}}</h1><a href="#" class="hero-link">Discover More</a>
                        </div>
                    </div><a href=".intro" class="continue link-scroll"><i class="fa fa-long-arrow-down"></i> Scroll Down</a>
                </div>
            </section>
        @endforeach
    </div>
    <!-- Intro Section-->
    <section class="intro">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="h3">About Us</h2>
                    <p class="text-big">{{($about->text)}}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="featured-posts no-padding-top">
        <div class="container">
            <!-- Post-->
            <?php $i =0; ?>
            @foreach($posts as $post)
                @if($i++ % 2 ==0)
                    <div class="row d-flex align-items-stretch">
                        <div class="text col-lg-7">
                            <div class="text-inner d-flex align-items-center">
                                <div class="content">
                                    <header class="post-header">
                                        <div class="category"><a href="{{route('single.post',$post->slug)}}"></a><a href="">{{$post->category->title}}</a></div><a href="{{route('single.post',['slug' => $post->slug])}}">
                                            <h2 class="h4">{{$post->title}}</h2></a>
                                    </header>
                                    <p>{{$post->short_des}}</p>
                                    <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                                            <div class="avatar"><img src="{{asset($post->admin->image)}}" alt="..." class="img-fluid"></div>
                                            <div class="title"><span>{{($post->admin->name)}}</span></div></a>
                                        <div class="date"><i class="icon-clock"></i> {{($post->created_at->diffForHumans())}}</div>
                                        <div class="comments"><i class="icon-comment"></i>12</div>
                                    </footer>
                                </div>
                            </div>
                        </div>
                        <div class="image col-lg-5"><img src="{{asset($post->image)}}" alt="..."></div>
        </div>
                @else
                    <div class="row d-flex align-items-stretch">
                        <div class="image col-lg-5"><img src="{{asset($post->image)}}" alt="..."></div>
                        <div class="text col-lg-7">
                            <div class="text-inner d-flex align-items-center">
                                <div class="content">
                                    <header class="post-header">
                                        <div class="category"><a href="{{route('single.post',$post->slug)}}">{{$post->category->title}}</a></div><a href="{{route('single.post',$post->slug)}}">
                                            <h2 class="h4">{{$post->title}}</h2></a>
                                    </header>
                                    <p>{{$post->short_des}}</p>
                                    <footer class="post-footer d-flex align-items-center"><a href="{{route('single.post',$post->slug)}}" class="author d-flex align-items-center flex-wrap">
                                            <div class="avatar"><img src="{{asset($post->admin->image)}}" alt="..." class="img-fluid"></div>
                                            <div class="title"><span>{{$post->admin->name}}</span></div></a>
                                        <div class="date"><i class="icon-clock"></i> {{($post->created_at->diffForHumans())}}</div>
                                        <div class="comments"><i class="icon-comment"></i>12</div>
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </div>
            @endif
        @endforeach
        <!-- Post        -->
        </div>
    </section>
    <!-- Divider Section-->
    <section style="background: url({{asset('frontend')}}/img/divider-bg.jpg); background-size: cover; background-position: center bottom" class="divider">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</h2><a href="#" class="hero-link">View More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Posts -->
    <section class="latest-posts">
        <div class="container">
            <header>
                <h2>Latest from the blog</h2>
                <p class="text-big">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </header>
            <div class="row">
                @foreach($Lposts as $post)
                <div class="post col-md-4">
                    <div class="post-thumbnail"><a href="{{route('single.post',$post->slug)}}"><img src="{{asset($post->image)}}" alt="..." class="img-fluid"></a></div>
                    <div class="post-details">
                        <div class="post-meta d-flex justify-content-between">
                            <div class="date">{{$post->created_at->format('d F | Y')}}</div>
                            <div class="category"><a href="{{route('single.post',$post->slug)}}">{{$post->category->title}}</a></div>
                        </div><a href="{{route('single.post',$post->slug)}}">
                            <h3 class="h4">{{$post->title}}</h3></a>
                        <p class="text-muted">{{$post->short_des}}</p>
                    </div>
                </div>
                    @endforeach
            </div>
        </div>
    </section>
    <!-- Newsletter Section-->
    <section class="newsletter no-padding-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Subscribe to Newsletter</h2>
                    <p class="text-big">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
                <div class="col-md-8">
                    <div class="form-holder">
                        <form action="#">
                            <div class="form-group">
                                <input type="email" name="email" id="email" placeholder="Type your email address">
                                <button type="submit" class="submit">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Gallery Section-->
    <section class="gallery no-padding">
        <div class="row">
            <div class="mix col-lg-3 col-md-3 col-sm-6">
                <div class="item"><a href="{{asset('frontend')}}/img/gallery-1.jpg" data-fancybox="gallery" class="image"><img src="{{asset('frontend')}}/img/gallery-1.jpg" alt="..." class="img-fluid">
                        <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
            </div>
            <div class="mix col-lg-3 col-md-3 col-sm-6">
                <div class="item"><a href="{{asset('frontend')}}/img/gallery-2.jpg" data-fancybox="gallery" class="image"><img src="{{asset('frontend')}}/img/gallery-2.jpg" alt="..." class="img-fluid">
                        <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
            </div>
            <div class="mix col-lg-3 col-md-3 col-sm-6">
                <div class="item"><a href="{{asset('frontend')}}/img/gallery-3.jpg" data-fancybox="gallery" class="image"><img src="{{asset('frontend')}}/img/gallery-3.jpg" alt="..." class="img-fluid">
                        <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
            </div>
            <div class="mix col-lg-3 col-md-3 col-sm-6">
                <div class="item"><a href="{{asset('frontend')}}/img/gallery-4.jpg" data-fancybox="gallery" class="image"><img src="{{asset('frontend')}}/img/gallery-4.jpg" alt="..." class="img-fluid">
                        <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
            </div>
        </div>
    </section>
@stop