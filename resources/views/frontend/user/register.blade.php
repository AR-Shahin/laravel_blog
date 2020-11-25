@extends('layouts.front_master')
@section('title','User Register')

@section('main_section')
    <div class="container mt-5 pt-5">
        <div class="row mt-3">
            <div class="col-12 text-center">
                <h2 style="font-family: Arial">Create a new Account.</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-4 mb-4 justify-content-center">
            <div class="col-12 col-md-5">
                <form action="{{route('users.registration')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="name" class="form-control" placeholder="Enter Your Name" name="name">
                        <span class="text-danger">{{($errors->has('name'))? ($errors->first('name')) : ''}}</span>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Enter Your email" name="email">
                        <span class="text-danger">{{($errors->has('email'))? ($errors->first('email')) : ''}}</span>
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control"  name="image">
                        <span class="text-danger">{{($errors->has('image'))? ($errors->first('image')) : ''}}</span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Enter Your Password" name="password">
                        <span class="text-danger">{{($errors->has('password'))? ($errors->first('password')) : ''}}</span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success"><i class="fa fa-user"></i> Create Account</button>
                        <a href="{{route('users.login')}}" class="btn btn-link">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop