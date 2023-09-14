@extends('admin.admin_master')
@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header">
                <div class="header-title">
                   <strong> Add Testimonial</strong>
                   <div class="secondary-header">
            @include('message.message')

            </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.testimonials.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="thumbnail">Images</label>
                        <input type="file" name="thumbnail" class="form-control">
                        @error('thumbnail')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                       <input type="text" class="form-control" name="name" required>
                        @error('name')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="text" class="form-control" name="position" required>

                        @error('position')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="descr">Description</label>
                    <textarea name="descr" class="form-control" placeholder="Some details " ></textarea>
                        @error('descr')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                    <a href="{{route('admin.testimonials.index')}}" class="btn btn-dark">Back</a>
                        <input type="submit" value="Add" class="btn-info btn" class="form-control">
                    </div>
                    <div class="form-group">
                    </div>
                </form>
            </div>
            </div>
    </div>
</div>
@endsection
