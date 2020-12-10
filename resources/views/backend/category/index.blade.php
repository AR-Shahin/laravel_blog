@extends('layouts.back_master')
@section('title','Category ')
@section('css')
    <!-- Custom styles for this page -->
    <link href="{{asset('backend')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@stop
@section('main_content')
    <div class="row no-gutters">
        <div class="col-12 col-sm-12 col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline">Manage Sliders</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            @php
                                $i=1;
                            @endphp
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </tfoot>

                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    @php
                                        $count = App\Post::where('category_id',$category->id)->count()
                                    @endphp
                                    <td>{{$i++}}</td>
                                    <td>{{$category->title}}</td>
                                    <td>
                                        <a type="button"  data-toggle="modal" data-target="#edit_{{$category->id}}" class="btn btn-primary btn-sm text-light"><i class="fa fa-edit"></i> Edit</a>

                                        @if($count == 0)
                                            <form  action="{{route('category.destroy',$category->id)}}" class="d-inline del_form" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline">Add Category</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('category.store')}}" method="post">
                        @csrf
                        <label for="">Title</label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Category Title" id="cat_name">
                            <span class="text-danger">{{($errors->has('title')) ? ($errors->first('title')) : ' '}}</span>
                            <div id="response"></div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-block btn-success"><i class="fa fa-plus"></i> Add Category</button>
                        </div>
                    </form>
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
@foreach($categories as $category)
    <!-- Modal -->
    <div class="modal fade" id="edit_{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('category.update',['category' => $category->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Title : </label>
                            <input type="text" class="form-control @error('heading') is-invalid @enderror" name="title" placeholder="Slider heading" value="{{$category->title}}">
                            <span class="text-danger">{{($errors->has('title'))? ($errors->first('title')) : ''}}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-block btn-success"><i class="fa fa-edit"></i> Update Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach

