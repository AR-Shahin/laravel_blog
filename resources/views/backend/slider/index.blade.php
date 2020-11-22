@extends('layouts.back_master')
@section('title','Slider ')
@section('css')
    <!-- Custom styles for this page -->
    <link href="{{asset('backend')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@stop
@section('main_content')
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline">Manage Sliders</h3>
                    <a href="{{route('slider.create')}}" class="btn btn-info text-light" style="float: right;"><i class="fa fa-plus"></i> Add New Slider</a>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Heading</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tfoot>
                            @php
                                $i=1;
                            @endphp
                            <tr>
                                <th>SL</th>
                                <th>Heading</th>
                                <th>Image</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </tfoot>

                            <tbody>
                            @foreach($sliders as $slider)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$slider->heading}}</td>
                                    <td><img src="{{$slider->image}}" alt="" style="width: 100px;"></td>
                                    <td class="text-center">{!! $slider->status == 1 ? '<span class ="badge badge-success">Active</span>' : '<span class ="badge badge-danger">Inactive</span>' !!}

                                    </td>
                                    <td class="text-right">
                                        @if($slider->status == 1)
                                            <a href="{{route('slider.inactive',['id' =>$slider->id])}}" class="btn btn-warning btn-sm"><i class="fa fa-angle-down"></i> Inactive</a>
                                        @else
                                            <a href="{{route('slider.active',['id' =>$slider->id])}}" class="btn btn-success btn-sm"><i class="fa fa-angle-up"></i> Active</a>
                                        @endif
                                        <a type="button"  data-toggle="modal" data-target="#edit_{{$slider->id}}" class="btn btn-primary btn-sm text-light"><i class="fa fa-edit"></i> Edit</a>
                                        <form  action="{{route('slider.destroy',['slider' => $slider->id])}}" class="d-inline" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" value="{{$slider->image}}" name="img">
                                            <button id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
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

@foreach($sliders as $slider)
    <!-- Modal -->
    <div class="modal fade" id="edit_{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Slider</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('slider.update',['slider' => $slider->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Heading : </label>
                            <input type="text" class="form-control @error('heading') is-invalid @enderror" name="heading" placeholder="Slider heading" value="{{$slider->heading}}">
                            <span class="text-danger">{{($errors->has('heading'))? ($errors->first('heading')) : ''}}</span>
                        </div>
                        <div class="form-group">
                            <label for="">Image : </label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                            <input type="hidden" value="{{$slider->image}}" name="old_image">
                            <span class="text-danger">{{($errors->has('image'))? ($errors->first('image')) : ''}}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-block btn-success"><i class="fa fa-edit"></i> Update Slider</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <img src="{{$slider->image}}" alt="" style="width: 100px;"">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
@endforeach

