@extends('layouts.back_master')
@section('title','Contact')
@section('css')
    <!-- Custom styles for this page -->
    <link href="{{asset('backend')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@stop
@section('main_content') <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0" style="display: inline-block">Contact Mail</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" style="width:100%">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th class="text-center">Subject</th>
                            <th class="text-center">Text</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->subject}}</td>
                                <td>{{$contact->text}}</td>
                                <td>
                                    @if($contact->status == 0) <span class="badge-warning badge">New</span>
                                    @else
                                        <span class="badge-success badge">Seen</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($contact->status == 0)
                                        <a href="{{route('contact.seen',$contact->id)}}" class="btn btn-info btn-sm">Seen</a>
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
