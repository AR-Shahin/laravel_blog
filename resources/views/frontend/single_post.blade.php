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
                                    <div class="comments meta-last"><i class="icon-comment"></i>12</div>
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
                                    <h3 class="h6">Post Comments<span class="no-of-comments">(3)</span></h3>
                                </header>
                                <div class="comment">
                                    <div class="comment-header d-flex justify-content-between">
                                        <div class="user d-flex align-items-center">
                                            <div class="image"><img src="{{asset('frontend')}}/img/user.svg" alt="..." class="img-fluid rounded-circle"></div>
                                            <div class="title"><strong>Jabi Hernandiz</strong><span class="date">May 2016</span></div>
                                        </div>
                                    </div>
                                    <div class="comment-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                    </div>
                                </div>
                                <div class="comment">
                                    <div class="comment-header d-flex justify-content-between">
                                        <div class="user d-flex align-items-center">
                                            <div class="image"><img src="{{asset('frontend')}}/img/user.svg" alt="..." class="img-fluid rounded-circle"></div>
                                            <div class="title"><strong>Nikolas</strong><span class="date">May 2016</span></div>
                                        </div>
                                    </div>
                                    <div class="comment-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                    </div>
                                </div>
                                <div class="comment">
                                    <div class="comment-header d-flex justify-content-between">
                                        <div class="user d-flex align-items-center">
                                            <div class="image"><img src="{{asset('frontend')}}/img/user.svg" alt="..." class="img-fluid rounded-circle"></div>
                                            <div class="title"><strong>John Doe</strong><span class="date">May 2016</span></div>
                                        </div>
                                    </div>
                                    <div class="comment-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="add-comment">
                                <header>
                                    <h3 class="h6">Leave a reply</h3>
                                </header>
                                <form action="#" class="commenting-form">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <input type="text" name="username" id="username" placeholder="Name" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="email" name="username" id="useremail" placeholder="Email Address (will not be published)" class="form-control">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <textarea name="usercomment" id="usercomment" placeholder="Type your comment" class="form-control"></textarea>
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
                                                <div class="comments"><i class="icon-comment"></i>12</div>
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
                            <a href="#">{{$cat->title}}</a>
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