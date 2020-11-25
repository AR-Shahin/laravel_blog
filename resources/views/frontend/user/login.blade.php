@extends('layouts.front_master')
@section('title','User Login')

@section('main_section')
    <div class="container mt-5 pt-5">
        <div class="row mt-3">
            <div class="col-12 text-center">
                <h2 style="font-family: Arial">Log in</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mt-4 mb-4 justify-content-center">
            <div class="col-12 col-md-5">
                <form action="{{route('user.login')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Enter Your email" name="email">
                        <span class="text-danger">{{($errors->has('email'))? ($errors->first('email')) : ''}}</span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Enter Your email" name="password">
                        <span class="text-danger">{{($errors->has('password'))? ($errors->first('password')) : ''}}</span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success"><i class="fa fa-user"></i> Login</button>
                        <a href="{{route('users.registration')}}" class="btn btn-link">You don't have account?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop