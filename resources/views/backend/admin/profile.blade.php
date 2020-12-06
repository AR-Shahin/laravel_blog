@extends('layouts.back_master')
@section('title','User Profile')
@section('main_content')
    <div class="row justify-content-center mt-3">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>My Profile</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="text-center">
                            <td colspan="2">
                                <img src="{{asset($admin->image)}}" alt="" class="w-25 rounded-circle">
                            </td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ucwords($admin->name)}}</td>
                        </tr>
                        <tr>
                            <th>Role</th>
                            <td>
                                @if($admin->status == 0)
                                    <span class="badge badge-info">Editor</span>
                                @elseif($admin->status == 1)
                                    <span class="badge badge-success">Admin</span>
                                @elseif($admin->status == 3)
                                    <span class="badge badge-danger">Blocked</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Added By</th>
                            <td>{{$admin->added_by}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$admin->email}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ucwords($admin->address)}}</td>
                        </tr>
                        <tr>
                            <th>Joined Date</th>
                            <td>{{ucwords($admin->created_at->format('d-m-Y'))}}</td>
                        </tr>
                        <tr>
                            <th>Last Profile Updated </th>
                            <td>{{$admin->updated_at->diffForHumans()}}</td>
                        </tr>
                        <tr>
                            <td colspan="2"><a href="{{route('admin.update')}}"  class="btn btn-success btn-block"><i class="fa fa-edit"></i> Update Profile</a></td>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop