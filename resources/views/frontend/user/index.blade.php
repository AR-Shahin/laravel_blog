@extends('layouts.front_master')
@section('title','User Profile')

@section('main_section')
    <div class="container mt-5 pt-5">
        <div class="row mt-3">
            <div class="col-12 text-center">
                <h2 style="font-family: Arial">Hi, <span>{{Auth::user()->name}}</span></h2>
            </div>
        </div>
    </div>
    <div class="container">
     <div class="row">
         <div class="col-12 mt-4">

             <table class="table table-bordered">
                 <tr>
                     <th>Name</th>
                     <td>{{Auth::user()->name}}</td>
                 </tr>
                 <tr>
                     <th>Image</th>
                     <td><img src="{{asset(Auth::user()->image)}}" alt="" width="100px"></td>
                 </tr>
             </table>

                 <a class="dropdown-item" href="{{ route('user.logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
             </a>

             <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
         </div>
     </div>
    </div>

@stop