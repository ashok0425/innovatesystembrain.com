@extends('admin.admin_master')
@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header">
                <div class="header-title">
                   <strong> Edit Testimonial members</strong>
                   <div class="secondary-header">
                    @include('message.message')
            </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.testimonials.update',$testimonial)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="thumbnail">Images</label>
                        <input type="file" name="thumbnail" class="form-control">
                        <img src="{{asset($testimonial->thumbnail)}}" alt="" height="100">
                        @error('thumbnail')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <input type="hidden" value="{{$testimonial->id}}" name="id">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" required value="{{$testimonial->name}}">

                        @error('name')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="text" class="form-control" name="position" required value="{{$testimonial->position}}">
                        @error('position')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="descr">Description</label>
                    <textarea name="descr" class="form-control" placeholder="Some details " >{!!$testimonial->descr!!}</textarea>
                        @error('descr')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                    <a href="{{route('admin.testimonials.index')}}" class="btn btn-dark">Back</a>
                        <input type="submit" value="Update" class="btn-info btn" class="form-control">
                    </div>
                    <div class="form-group">
                    </div>
                </form>
            </div>
            </div>
    </div>
</div>
@endsection
