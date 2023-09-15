@extends('admin.admin_master')
@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header">
                <div class="header-title">
                   <strong> Edit Service</strong>
                   <div class="secondary-header">

                    @include('message.message')


            </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.services.update',$service)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                  @method('PATCH')
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail</label>
                        <input type="file" name="thumbnail" class="form-control">
                        <img src="{{asset($service->thumbnail)}}" alt="" height="100">
                        @error('thumbnail')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="cover_image">Cover Image</label>
                        <input type="file" name="cover_image" class="form-control" >
                        <img src="{{asset($service->cover_image)}}" alt="" height="100">
                        @error('cover_image')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <textarea name="title" class="form-control" >{!!$service->title!!}</textarea>
                        @error('title')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div><div class="form-group">
                        <label for="descr">Description</label>
                    <textarea name="descr" class="form-control" placeholder="Blog description" id="summernote1">{!!$service->descr!!}</textarea>
                        @error('descr')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                    <a href="{{route('admin.services.index')}}" class="btn btn-dark">Back</a>
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
