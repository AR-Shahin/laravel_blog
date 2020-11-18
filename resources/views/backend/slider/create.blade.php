@extends('layouts.back_master')
@section('title','Create Slider ')
@section('main_content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-12 col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline">Add New Slider</h3>
                    <a href="{{route('slider.index')}}" class="btn btn-info text-light" style="float: right;"><i class="fa fa-angle-double-left"></i> Back</a>

                </div>
                <div class="card-body">
                    <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Heading : </label>
                            <input type="text" class="form-control @error('heading') is-invalid @enderror" name="heading" placeholder="Slider heading" value="{{old('heading')}}">
                            <span class="text-danger">{{($errors->has('heading'))? ($errors->first('heading')) : ''}}</span>
                        </div>
                        <div class="form-group">
                            <label for="">Image : </label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                            <span class="text-danger">{{($errors->has('image'))? ($errors->first('image')) : ''}}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-block btn-success"><i class="fa fa-plus"></i> Add New Slider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop


