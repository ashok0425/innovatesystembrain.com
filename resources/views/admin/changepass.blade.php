@extends('admin.admin_master')
@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header">
                <div class="header-title">
                   <strong> Change Password</strong>
                   <div class="secondary-header">
            
                    @if (session('msg'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                <form action="{{route('updatepassword')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="oldpassword">Current password</label>
                        <input type="password" name="current_password" class="form-control" placeholder="current password" id="current_password" required>
                        @error('current_password')
                    <span class="text-danger">{{$message}}</span>                          
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="newpassword">New password</label>
                        <input type="password" name="password" class="form-control"placeholder="new password" id="password" required>
                        @error('password')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>    <div class="form-group">
                        <label for="conpassword">Confirm password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="confirm password" id="password_confirmation" required>
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