@extends('layouts.back_master')
@section('title','Post ')
@section('css')
    <!-- Custom styles for this page -->
    <link href="{{asset('backend')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@stop

@section('main_content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline">Manage Post</h3>
                    <a href="{{route('post.create')}}" class="btn btn-info" style="float: right;"><i class="fa fa-plus"></i> Add New Post</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Image</th>
                                <th>View</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->category->title}}</td>
                                    <td>{{$post->admin->name}}</td>
                                    <td><img src="{{asset($post->image)}}" alt="" width="80px"></td>
                                    <td>{{$post->count}}</td>
                                    <td>{!! $post->status == 1? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-warning">Inactive</span>'!!}</td>
                                    <td>{{$post->created_at->diffForHumans()}}</td>
                                    <td>
                                        @if($post->status == 1)
                                            <a href="{{route('post.inactive',$post->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-angle-down"></i></a>
                                            @else
                                            <a href="{{route('post.active',$post->id)}}" class="btn btn-success btn-sm"><i class="fa fa-angle-up"></i></a>
                                            @endif
                                        <a href="{{route('post.show',$post->id)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                        <a href="{{route('post.edit',$post->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        <a id="delete_swal" href="{{route('post.destroy',$post->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Image</th>
                                <th>View</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                            </tfoot>

                            {{--<tbody>--}}
                            {{--@foreach($categories as $category)--}}
                            {{--<tr>--}}
                            {{--<td>{{$i++}}</td>--}}
                            {{--<td>{{$category->title}}</td>--}}
                            {{--<td>--}}
                            {{--<a type="button"  data-toggle="modal" data-target="#edit_{{$category->id}}" class="btn btn-primary btn-sm text-light"><i class="fa fa-edit"></i> Edit</a>--}}
                            {{--<form  action="{{route('category.destroy',$category->id)}}" class="d-inline del_form" method="post">--}}
                            {{--@csrf--}}
                            {{--@method('DELETE')--}}
                            {{--<button id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>--}}
                            {{--</form>--}}
                            {{--</td>--}}
                            {{--</tr>--}}
                            {{--@endforeach--}}
                            {{--</tbody>--}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <!-- Page level plugins -->
    <script src="{{asset('backend')}}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{asset('backend')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('backend')}}/js/demo/datatables-demo.js"></script>

@stop