@extends('layouts.front_master')
@section('title','Tag wise blog')
@section('main_section')
    <div class="container mt-5 pt-2">
        <div class="row">
            <!-- Latest Posts -->
            <main class="posts-listing col-lg-12">
                <div class="container">
                    <div class="row">
                        <!-- post -->
                        @foreach($posts as $post)
                            <div class="post col-xl-4 mb-3">
                                <div class="post-thumbnail"><a href="{{route('single.post',$post->slug)}}"><img src="{{asset($post->image)}}" alt="..." class="img-fluid"></a></div>
                                <div class="post-details">
                                    <div class="post-meta d-flex justify-content-between">
                                        <div class="date meta-last">{{$post->created_at}}</div>
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
        </div>
    </div>
@stop