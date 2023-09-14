@extends('admin.admin_master')
@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header">
                <div class="header-title">
                   <strong> Frontend Seting</strong>
                   <div class="secondary-header">
            @include('message.message')
            </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.update-frontend')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="email">Email</label>
                    <input type="email" name="email" class="form-control"placeholder="Email" value="{{$setting->email }}" id="password">
                        @error('email')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control"placeholder="Phone" value="{{$setting->phone}}" >
                        @error('openingtime')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="openingtime">Address</label>
                    <input type="text" name="openingtime" class="form-control"placeholder="openingtime" value="{{$setting->openingtime}}" id="password">
                        @error('openingtime')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="facebook"><i class="fab fa-facebook"></i> Facebook</label>
                    <input type="text" name="facebook" class="form-control"placeholder="Facebook" value="{{$setting->facebook}}" >
                        @error('facebook')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="twitter"><i class="fab fa-twitter"></i> Twitter</label>
                    <input type="text" name="twitter" class="form-control"placeholder="Twitter" value="{{$setting->twitter}}" >
                        @error('twitter')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="instagram"><i class="fab fa-instagram"></i> Instagram</label>
                    <input type="text" name="instagram" class="form-control"placeholder="Instagram" value="{{$setting->instagram}}">
                        @error('instagram')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="Instagram"><i class="fab fa-pinterest"></i> Pinterest</label>
                    <input type="text" name="youtube" class="form-control"placeholder="Youtube" value="{{$setting->youtube}}">
                        @error('youtube')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>   <div class="form-group">
                        <label for="linkdin"><i class="fab fa-linkedin"></i> Linkdin</label>
                    <input type="text" name="linkdin" class="form-control"placeholder="Instagram" value="{{$setting->linkdin}}">
                        @error('linkdin')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="copyright">&copy; Copyright</label>
                    <input type="text" name="copyright" class="form-control"placeholder="copyright" value="{{$setting->copyright}}">
                        @error('copyright')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{$setting->meta_title}}">
                        @error('meta_title')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="meta_title">Meta Keyword</label>
                    <input type="text" name="meta_keyword" class="form-control" value="{{$setting->meta_keyword}}">
                        @error('meta_title')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                    <input type="text" name="meta_description" class="form-control" value="{{$setting->meta_description}}">
                        @error('meta_description')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                    <input type="text" name="meta_title" class="form-control" value="{{$setting->meta_title}}">
                        @error('meta_title')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="logo">Images</label>
                        <input type="file" name="logo" class="form-control">
                        <br>
                        <img src="{{asset($setting->logo)}}" alt="" height="100">
                        @error('logo')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="fev">Fevicon</label>
                        <input type="file" name="fev" class="form-control">
                        <br>
                        <img src="{{asset($setting->fev)}}" alt="" height="100">
                        @error('fev')
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
