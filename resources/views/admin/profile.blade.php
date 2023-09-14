@extends('admin.admin_master')
@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <div class="header-title">
                   <strong>Update Profile</strong>
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
            <form action="{{route('saveprofile')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <img src="{{asset(Auth::user()->profile_photo_path)}}" alt="{{Auth::user()->profile_photo_path}}" width="120" height="120" style="border-radius:50%;margin-bottom:10px;">
                    <br>
                    @if (Auth::user()->updated_at)
                           <small class="text-danger"><span class="text-dark">Last updated:</span> {{Auth::user()->updated_at->diffForHumans()}}</small> 
                    @endif
                
<br>
                        <label for="conpassword">Select image</label>
                        <input type="file" name="file" class="form-control" >
                        @error('file')
                        <span class="text-danger">{{$message}}</span>
                            @enderror
                  
                    </div>
                    <div class="form-group">
                        <label for="oldpassword">Username</label>
                    <input type="text" name="username" class="form-control" value="{{Auth::user()->name}}" required>
                     
                    </div>
                    <div class="form-group">
                        <label for="newpassword">Email</label>
                        <input type="email" name="email" class="form-control" value="{{Auth::user()->email}}"  required>
                     
                    </div>  
               
                    <div class="form-group">
                        <input type="submit" value="Update" class="btn-info btn" class="form-control">
                    </div>
                </form>
            </div>
            </div>  
    </div>
</div> 
@endsection