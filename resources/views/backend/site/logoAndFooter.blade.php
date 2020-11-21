@extends('layouts.back_master')
@section('title','Site Identity ')
@section('main_content')
    <div class="card">
        <div class="card-header">
            <h3>Site Identity</h3>
        </div>
        <div class="row card-body">
            <div class="col-12 col-md-8">
                <table class="table table-bordered">
                    <tr>
                        <th>Logo</th>
                        <th>Footer Text</th>
                        <th>Copyright Text</th>
                    </tr>
                    @foreach($siteIdentity as $site)
                        <tr>
                            <td width="20%"><img src="{{asset($site->logo)}}" alt=""></td>
                            <td>{{$site->footer_txt}}</td>
                            <td>{{$site->copyright}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <style>
                .form-control{
                    border-radius: 0px;
                }
            </style>
            @if($count == 0)
                <div class="col-12 col-md-4">
                    <form action="{{route('site.identity')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" class="form-control" name="logo">
                            <span class="text-danger">{{($errors->has('logo')) ? ($errors->first('logo')) : ' '}}</span>
                        </div>
                        <div class="form-group">
                            <textarea name="footer_txt" id="" cols="30" rows="3" class="form-control" placeholder="Footer Text"></textarea>
                            <span class="text-danger">{{($errors->has('footer_txt')) ? ($errors->first('footer_txt')) : ' '}}</span>
                        </div>
                        <div class="form-group">
                            <textarea name="copyright" id="" cols="30" rows="3" class="form-control" placeholder="Copyright Text"></textarea>
                            <span class="text-danger">{{($errors->has('copyright')) ? ($errors->first('copyright')) : ' '}}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-block"><i class="fa fa-add"></i> Save</button>
                        </div>
                    </form>
                </div>
            @else

                <div class="col-12 col-md-4">
                    <form action="{{route('site.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" class="form-control" name="logo">
                            <span class="text-danger">{{($errors->has('logo')) ? ($errors->first('logo')) : ' '}}</span>
                            <input type="hidden" value="{{$site->logo}}" name="old_img">
                            <input type="hidden" value="{{$site->id}}" name="id">
                        </div>
                        <div class="form-group">
                            <textarea name="footer_txt" id="" cols="30" rows="3" class="form-control">{{$site->footer_txt}}</textarea>
                            <span class="text-danger">{{($errors->has('footer_txt')) ? ($errors->first('footer_txt')) : ' '}}</span>
                        </div>
                        <div class="form-group">
                            <textarea name="copyright" id="" cols="30" rows="3" class="form-control" >{{$site->copyright}}</textarea>
                            <span class="text-danger">{{($errors->has('copyright')) ? ($errors->first('copyright')) : ' '}}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-block"><i class="fa fa-add"></i> Update</button>
                        </div>
                    </form>
                </div>
            @endif
        </div>
    </div>
@stop