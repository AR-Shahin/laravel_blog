@extends('layouts.front_master')
@section('title','Contact')

@section('main_section')
    <div class="container mt-5 pt-5">
        <div class="row mt-3">
            <div class="col-12 text-center">
                <h2>Contact With Us</h2>
            </div>
        </div>
    </div>
    <style>
        .form-group{
            margin-bottom:0;
        }
    </style>
    <div class="container">
        <div class="row mt-4 mb-4 card">
            <div class="col-12 col-md-7 card-body">
                <form action="{{route('storeMailFromUsers')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter Your Name" name="name">
                        <span class="text-danger">{{($errors->has('name'))? ($errors->first('name')) : ''}}</span>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Enter Your email" name="email">
                        <span class="text-danger">{{($errors->has('email'))? ($errors->first('email')) : ''}}</span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter Your subject" name="subject">
                        <span class="text-danger">{{($errors->has('subject'))? ($errors->first('subject')) : ''}}</span>
                    </div>

                    <div class="form-group">
                        <textarea name="text" id="" cols="30" rows="10" class="form-control"></textarea>
                        <span class="text-danger">{{($errors->has('text'))? ($errors->first('text')) : ''}}</span>
                    </div>
                    <div class="form-group">
                     <button class="btn btn-info btn-lg"><i class="fa fa-envelope"></i> Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop