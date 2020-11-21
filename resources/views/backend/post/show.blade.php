@extends('layouts.back_master')
@section('title','Single Post')
@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline">View Post</h3>
                    <a style="float: right;" href="{{route('post.index')}}" class="btn btn-info btn-sm">Back</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <td>{{$post->title}}</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{$post->category->title}} </td>
                        </tr>
                        <tr>
                            <th>Author</th>
                            <td>shain</td>
                        </tr>
                        <tr>
                            <th>Tags</th>
                            <td>
                                @foreach($post->tags as $tag)
                                    {{$tag->tag}}
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{!! $post->status == 1? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-warning">Inactive</span>'!!}</td>
                        </tr>
                        <tr>
                            <th>Total View</th>
                            <td><i class="fa fa-eye"></i> {{$post->count}}</td>
                        </tr>
                        <tr>
                            <th>Created At</th>
                            <td>{{$post->created_at->diffForHumans()}}</td>
                        </tr>
                        <tr>
                            <th>Short Description</th>
                            <td>{{$post->short_des}}</td>
                        </tr>
                        <tr>
                            <th>Long Description</th>
                            <td>{{$post->long_des}}</td>
                        </tr>
                        <tr>
                            <th>Main Image</th>
                            <td><img src="{{asset($post->image)}}" alt="" ></td>
                        </tr>
                        <tr>
                            <th>View Image</th>
                            <td><img src="{{asset($post->view_image)}}" alt="" ></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop