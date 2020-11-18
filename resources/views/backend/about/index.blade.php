@extends('layouts.back_master')
@section('title','About Us')
@section('main_content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline">About Us</h3>
                    @if($count == 0)
                        <a data-toggle="modal" data-target="#addNew" class="btn btn-info text-light text-right" style="float: right;"><fa class="fa fa-plus"></fa> Add new</a>
                    @endif
                </div>
                <div class="card-body text-center">
                    <table class="table table-bordered">
                        <tr>
                            <th>1</th>
                            <th style="width:70%;" class="text-left">Text</th>
                            <th class="text-right">Actions</th>
                        </tr>
                        @foreach($about as  $abt)
                            <tr>
                                <td>1</td>
                                <td class="text-left">{{$abt->text}}</td>
                                <td class="text-right">
                                    <a data-toggle="modal" data-target="#edit_{{$abt->id}}" class="btn btn-primary text-light "><i class="fa fa-edit"></i> Edit</a>
                                    <a href="{{route('about.destroy',[$abt->id])}}" id="delete_swal" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
<!-- Modal -->
<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title d-inline" id="exampleModalLabel">Add </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('about.store')}}" method="post" >
                    @csrf
                    <div class="form-group">
                        <label for="">Text : </label>

                        <textarea name="text" id="" cols="30" rows="5" class="form-control @error('text') is-invalid @enderror" ></textarea>

                        <span class="text-danger">{{($errors->has('text'))? ($errors->first('text')) : ''}}</span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-block btn-success"><i class="fa fa-edit"></i> Add New</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@foreach($about as  $abt)
    <!-- Modal -->
    <div class="modal fade" id="edit_{{$abt->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title d-inline" id="exampleModalLabel">Edit</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('about-us-update',['id' => $abt->id])}}" method="post" >
                        @csrf
                        <div class="form-group">
                            <label for="">Heading : </label>
                            <textarea name="text" id="" cols="30" rows="5" class="form-control @error('text') is-invalid @enderror" >{{$abt->text}}</textarea>
                            <span class="text-danger">{{($errors->has('text'))? ($errors->first('text')) : ''}}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-block btn-success"><i class="fa fa-edit"></i> Update Slider</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endforeach