@extends('layouts.front_master')
@section('title','Single Post')
@section('main_section')
    <div class="container mt-5">
        <div class="row">
            <!-- Latest Posts -->
            <main class="post blog-post col-lg-8">
                <div class="container">
                    <div class="post-single">
                        <div class="post-thumbnail"><img src="{{asset($post->view_image)}}" alt="..." class="img-fluid"></div>
                        <div class="post-details">
                            <div class="post-meta d-flex justify-content-between">
                                <div class="category"><a href="#">{{$post->category->title}}</a></div>
                            </div>
                            <h1>{{$post->title}}<a href="#"><i class="fa fa-bookmark-o"></i></a></h1>
                            <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="#" class="author d-flex align-items-center flex-wrap">
                                    <div class="avatar"><img src="{{asset($post->admin->image)}}" alt="..." class="img-fluid"></div>
                                    <div class="title"><span>{{$post->admin->name}}</span></div></a>
                                <div class="d-flex align-items-center flex-wrap">
                                    <div class="date"><i class="icon-clock"></i> {{$post->created_at->diffForHumans()}}</div>
                                    <div class="views"><i class="icon-eye"></i> {{$post->count}}</div>
                                    <div class="comments meta-last"><i class="icon-comment"></i>{{$post->comments->count()}}</div>
                                </div>
                            </div>
                            <div class="post-body">
                                <p>{{$post->long_des}}</p>
                            </div>
                            <div class="post-tags">
                                @foreach($post->tags as $tag)
                                    <a href="{{$tag->tag}}" class="tag">{{$tag->tag}}</a>
                                @endforeach
                            </div>
                            <div class="posts-nav d-flex justify-content-between align-items-stretch flex-column flex-md-row"><a href="#" class="prev-post text-left d-flex align-items-center">
                                    <div class="icon prev"><i class="fa fa-angle-left"></i></div>
                                    <div class="text"><strong class="text-primary">Previous Post </strong>
                                        <h6>I Bought a Wedding Dress.</h6>
                                    </div></a><a href="#" class="next-post text-right d-flex align-items-center justify-content-end">
                                    <div class="text"><strong class="text-primary">Next Post </strong>
                                        <h6>I Bought a Wedding Dress.</h6>
                                    </div>
                                    <div class="icon next"><i class="fa fa-angle-right">   </i></div></a></div>
                            <div class="post-comments">
                                <header>
                                    <h3 class="h6">Post Comments<span class="no-of-comments">({{$post->comments->count()}})</span></h3>
                                </header>

                                @foreach($post->comments as $comment)
                                <div class="comment">
                                    <div class="comment-header d-flex justify-content-between">
                                        <div class="user d-flex align-items-center">
                                            <div class="image"><img src="{{asset($comment->user->image)}}" alt="..." class="img-fluid rounded-circle"></div>
                                            <div class="title"><strong>{{$comment->user->name}}</strong><span class="date">{{$comment->created_at->format('F Y')}}</span></div>
                                        </div>
                                    </div>
                                    <div class="comment-body">
                                        <p>{{$comment->comment}}</p>
                                    </div>
                                </div>
                                  @endforeach

                            </div>
                            <div class="add-comment">
                                <header>
                                    <h3 class="h6">Leave a reply</h3>
                                </header>
                                <form action="{{route('store.comment')}}" class="commenting-form" method="post">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <textarea name="comment" id="usercomment" placeholder="Type your comment" class="form-control" required></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-secondary">Submit Comment</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <aside class="col-lg-4">
                <!-- Widget [Latest Posts Widget]        -->
                <div class="widget latest-posts">
                    <header>
                        <h3 class="h6">Related Posts</h3>
                    </header>
                    <div class="blog-posts"><a href="#">
                            @foreach($Rposts as $post)
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
                        <div class="item d-flex justify-content-between">
                            <a href="{{route('cat.post',[$cat->title])}}">{{$cat->title}}</a>
                            <a>{{$cat->countTotalPost->count()}}</a>
                        </div>
                    @endforeach
                </div>
                <!-- Widget [Tags Cloud Widget]-->
                <div class="widget tags">
                    <header>
                        <h3 class="h6">Tags</h3>
                    </header>
                    <ul class="list-inline">
                        @foreach($tags as $tag)
                            <li class="list-inline-item"><a href="{{$tag->tag}}" class="tag">#{{$tag->tag}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </aside>
        </div>
    </div>
@stop