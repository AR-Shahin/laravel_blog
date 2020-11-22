@extends('layouts.back_master')
@section('title','Register User')
@section('main_content')
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-8">
                    <h3>Add New User</h3>
                    <hr>
                    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label for="nm">Name <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-8">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id = "nm" placeholder="Name" value="{{ old('name')}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-8">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id = "email" placeholder="Email" value="{{ old('email')}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label for="phone">Phone <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-8">
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id = "phone" placeholder="Phone" value="{{ old('phone')}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label for="address">Address <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-8">
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id = "address" placeholder="Address" value="{{ old('address')}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label for="address">Image <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-8">
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id = "address"  value="{{ old('image')}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label for="address">Password <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-8">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id = "address" placeholder="Password" value="{{ old('password')}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label for="address">Role <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-8">
                                    <select name="status" id="" class="form-control  @error('status') is-invalid @enderror">
                                        <option value="">Select Role</option>
                                        <option value="1">Admin</option>
                                        <option value="0">Editor</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success btn-block"><i class="fa fa-plus mr-1"></i> Add New User</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop