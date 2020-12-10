@extends('layouts.front_master')
@section('title','Blog')
@section('main_section')
    <div class="container mt-5 pt-2">
        <div class="row">
            <!-- Latest Posts -->
            <main class="posts-listing col-lg-8">
                <div class="container">
                    <div class="row">
                        <!-- post -->
                        @foreach($posts as $post)
                            <div class="post col-xl-6">
                                <div class="post-thumbnail"><a href="{{route('single.post',$post->slug)}}"><img src="{{asset($post->image)}}" alt="..." class="img-fluid"></a></div>
                                <div class="post-details">
                                    <div class="post-meta d-flex justify-content-between">
                                        <div class="date meta-last">{{$post->created_at->format('d F | Y')}}</div>
                                        <div class="category"><a href="#">{{$post->category->title}}</a></div>
                                    </div><a href="{{route('single.post',$post->slug)}}">
                                        <h3 class="h4">{{$post->title}}</h3></a>
                                    <p class="text-muted">{{$post->short_des}}</p>
                                    <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
                                            <div class="avatar"><img src="{{asset($post->admin->image)}}" alt="..." class="img-fluid"></div>
                                            <div class="title"><span>{{$post->admin->name}}</span></div></a>
                                        <div class="date"><i class="icon-clock"></i> {{($post->created_at->diffForHumans())}}</div>
                                        <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                                    </footer>
                                </div>
                            </div>
                        @endforeach
                        <hr>
                        <div class="d-block justify-content-center">{{$posts->links()}}</div>
                    </div>
                    {{--<!-- Pagination -->--}}
                    {{--<nav aria-label="Page navigation example">--}}
                    {{--<ul class="pagination pagination-template d-flex justify-content-center">--}}
                    {{--<li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-left"></i></a></li>--}}
                    {{--<li class="page-item"><a href="#" class="page-link active">1</a></li>--}}
                    {{--<li class="page-item"><a href="#" class="page-link">2</a></li>--}}
                    {{--<li class="page-item"><a href="#" class="page-link">3</a></li>--}}
                    {{--<li class="page-item"><a href="#" class="page-link"> <i class="fa fa-angle-right"></i></a></li>--}}
                    {{--</ul>--}}
                    {{--</nav>--}}
                </div>
            </main>
            <aside class="col-lg-4">
                <!-- Widget [Search Bar Widget]-->
                <div class="widget search">
                    <header>
                        <h3 class="h6">Search the blog</h3>
                    </header>
                    <form action="{{route('search.post')}}" class="search-form" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="search" placeholder="What are you looking for?" id="search_blog" name="slug" required>
                            <button type="submit" class="submit"><i class="icon-search"></i></button>
                            <div id="post_list" class="mt-2"></div>
                        </div>
                    </form>
                </div>
                <!-- Widget [Latest Posts Widget]        -->
                <div class="widget latest-posts">
                    <header>
                        <h3 class="h6">Latest Posts</h3>
                    </header>
                    <div class="blog-posts">
                        @foreach($Lposts as $post)
                            <a href="{{route('single.post',$post->slug)}}">
                                <div class="item d-flex align-items-center">
                                    <div class="image"><img src="{{asset($post->image)}}" alt="..." class="img-fluid"></div>
                                    <div class="title"><strong>{{$post->title}}</strong>
                                        <div class="d-flex align-items-center">
                                            <div class="views"><i class="icon-eye"></i> {{$post->count}}</div>
                                            <div class="comments"><i class="icon-comment"></i>{{$post->comments->count()}}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                <!-- Widget [Categories Widget]-->
                <div class="widget categories">
                    <header>
                        <h3 class="h6">Categories</h3>
                    </header>
                    @foreach($categories as $cat)
                        <div class="item d-flex justify-content-between"><a href="{{route('cat.post',[$cat->title])}}">{{$cat->title}}</a><span>{{$cat->countTotalPost->count()}}</span></div>
                    @endforeach
                </div>
                <!-- Widget [Tags Cloud Widget]-->
                <div class="widget tags">
                    <header>
                        <h3 class="h6">Tags</h3>
                    </header>
                    <ul class="list-inline">
                        @foreach($tags as $tag)
                            <li class="list-inline-item"><a href="{{route('tag.post',$tag->tag)}}" class="tag">#{{$tag->tag}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </aside>
        </div>
    </div>
@stop