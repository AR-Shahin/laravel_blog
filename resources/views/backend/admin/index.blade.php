@extends('layouts.back_master')
@section('title','Users')
@section('css')
    <!-- Custom styles for this page -->
    <link href="{{asset('backend')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@stop
@section('main_content') <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0" style="display: inline-block">Admins</h3>
                <a href="{{ route('admin.create')  }}" class="btn btn-outline-info" style="float: right"><i class="fa fa-plus mr-1"></i> New Admin</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" style="width:100%">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach($admins as $admin)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{ucwords($admin->name)}}</td>
                                <td>{{$admin->email}}</td>
                                <td class="text-center">
                                    @if($admin->status == 0)
                                        <span class="badge badge-info">Editor</span>
                                    @elseif($admin->status == 1)
                                        <span class="badge badge-success">Admin</span>
                                    @elseif($admin->status == 3)
                                        <span class="badge badge-danger">Blocked</span>
                                    @endif
                                </td>
                                <td class="text-right">
                                    @if($admin->id == Auth::user()->id)
                                        <a data-toggle="modal" data-target="#viewModal_{{ $admin->id }}" class="btn btn-sm btn-info text-light">View</a>
                                        <a data-toggle="modal" data-target="#editModal_{{ $admin->id }}" class="btn btn-sm btn-primary text-light">Edit</a>
                                    @else
                                        <a data-toggle="modal" data-target="#viewModal_{{ $admin->id }}" class="btn btn-sm btn-info text-light">View</a>
                                        <a data-toggle="modal" data-target="#editModal_{{ $admin->id }}" class="btn btn-sm btn-primary text-light">Edit</a>
                                        <a id="delete_swal" href="{{ url('admin/delete/'.$admin->id)}}" class="btn btn-sm btn-secondary">Delete</a>
                                        @if($admin->status == 0)
                                            <a href="{{ url('admin/promote/'.$admin->id)}}" class="btn btn-sm btn-success">Promote</a>
                                            <a href="{{ url('admin/block/'.$admin->id)}}" class="btn btn-sm btn-danger">Block</a>
                                        @elseif($admin->status == 1)
                                            <a href="{{ url('admin/demote/'.$admin->id)}}" class="btn btn-sm btn-warning">Demote</a>
                                            <a href="{{ url('admin/block/'.$admin->id)}}" class="btn btn-sm btn-danger">Block</a>
                                        @elseif($admin->status == 3)
                                            <a href="{{ url('admin/unblock/'.$admin->id)}}" class="btn btn-sm btn-success">Unblock</a>
                                        @endif
                                    @endif
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




{{-- Edit modal --}}
@foreach($admins as $admin)
    <div id="editModal_{{$admin->id}}" class="modal fade">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-x-20">
                    <h3>Edit Email</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-20">
                    <form action="{{ url('admin/edit/email').'/'.$admin->id}}" method="POST">
                        @csrf
                        @method('PUT')
                        <label for="">Email : </label>
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $admin->email}}" name="email">
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-pencil-square mr-1"></i> Update Email</button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->
@endforeach

{{-- View modal --}}
@foreach($admins as $admin)
    <div id="viewModal_{{$admin->id}}" class="modal fade">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header pd-x-20">
                    <h3>View Profile</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pd-20">
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
                            <td>{{($admin->created_at)}}</td>
                        </tr>
                        <tr>
                            <th>Last Profile Updated </th>
                            <td>{{$admin->updated_at->diffForHumans()}}</td>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->
@endforeach