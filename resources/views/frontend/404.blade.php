@extends('layouts.front_master')
@section('title','Blog')
@section('main_section')
  <div class="container mt-5 pt-5">
      <div class="col-12 my-5 py-5 text-center">
          <h2 class="text-danger">[{{$error}}] - Not avilable post!</h2>
          <a href="{{route('blog')}}" class="btn btn-link">Back</a>
      </div>
  </div>
@stop