@extends('admin.admin_master')
@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header">
                <div class="header-title">
                   <strong> Frontend Setting</strong>
                   <div class="secondary-header">
            
                    @if (session('msg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        {{session('msg')}}

                      </div>
                @endif

            </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('update-extrasetting')}}" method="post" enctype="multipart/form-data">
                    @csrf
                   
                    <div class="form-group">
                        <label for="email">Logo</label>
                    <input type="file" name="logo" class="form-control" value="{{$arr->logo }}">
                    <input type="hidden" value="{{$arr->logo}}" name="hidden_logo">
                    <br>
                    <img src="{{$arr->logo}}" alt="" width="100">
                        @error('logo')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">About Image</label>
                    <input type="file" name="img" class="form-control" value="{{$arr->logo }}">
                    <input type="hidden" value="{{$arr->img}}" name="hidden_img">
                    <br>
                    <img src="{{$arr->testimonial_img}}" alt="" width="100">
                        @error('img')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="term_conditios">About us</label>
                        <textarea name="privacy_policy" class="form-control"  >{{$arr->about_details}}</textarea>
                        @error('privacy_policy')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                   
                    <div class="form-group">
                        <input type="submit" value="Save" class="btn-info btn" class="form-control">
                    </div>
                </form>
            </div>
            </div>  
    </div>
</div> 
@endsection