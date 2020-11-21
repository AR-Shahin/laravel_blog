@extends('layouts.back_master')
@section('title','Update Post')
@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline">Update Post</h3>
                    <a href="{{route('post.index')}}" class="btn btn-info" style="float: right;">Back</a>
                </div>
                <div class="card-body">
                    <form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">Title : </label>
                                    <input type="text" class="form-control" name="title" placeholder="Post title" value="{{$post->title}}"><span class="text-danger">{{($errors->has('title')) ? ($errors->first('title')) : ' '}}</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">Category : </label>
                                    <select name="cat_id" id="" class="form-control" value="{{old('cat_id')}}">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $cat)
                                            <option value="{{$cat->id}}" {{$post->category_id == $cat->id ? 'selected' : ''}}>{{$cat->title}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{($errors->has('cat_id')) ? ($errors->first('cat_id')) : ' '}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Short Description : </label>
                                    <textarea name="short_des" id="" cols="30" rows="3" class="form-control" value="">{{$post->short_des}}</textarea>
                                    <span class="text-danger">{{($errors->has('short_des')) ? ($errors->first('short_des')) : ' '}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Long Description : </label>
                                    <textarea name="long_des" id="" cols="30" rows="8" class="form-control" value="">{{$post->long_des}}</textarea>
                                    <span class="text-danger">{{($errors->has('long_des')) ? ($errors->first('long_des')) : ' '}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">Main Image : </label>
                                    <input type="file" class="form-control" name="main_image" value="{{old('main_image')}}"><span class="text-danger">{{($errors->has('main_image')) ? ($errors->first('main_image')) : ' '}}</span>
                                    <img src="{{asset($post->image)}}" alt="" width="80px">
                                    <input
                                            type="hidden" value="{{$post->image}}" name="old_main_image">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">View Image : </label>
                                    <input type="file" class="form-control" name="view_image" value="{{old('view_image')}}"><span class="text-danger">{{($errors->has('view_image')) ? ($errors->first('view_image')) : ' '}}</span><img src="{{asset($post->view_image)}}" alt="" width="80px"><input
                                            type="hidden" value="{{$post->view_image}}" name="old_view_image">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">Tags</label>
                                    <input type="text" class="form-control" name="tags" placeholder="Tags" value="{{$tags}}">
                                    <span class="text-danger">{{($errors->has('tags')) ? ($errors->first('tags')) : ' '}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <button class="btn btn-success btn-block"><i class="fa fa-edit"></i> Update Post</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop