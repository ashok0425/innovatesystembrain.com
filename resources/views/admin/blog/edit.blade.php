@extends('admin.admin_master')
@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header">
                <div class="header-title">
                   <strong> Edit Blog Post</strong>
                   <div class="secondary-header">
                    @include('message.message')
            </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.blogs.update',$blog)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail</label>
                        <input type="file" name="thumbnail" class="form-control">
                        <img src="{{asset($blog->thumbnail)}}" alt="{{$blog->thumbnail}}" width="100">
                        @error('thumbnail')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="term_conditios">Title</label>
                        <textarea name="title" class="form-control">{!! $blog->title !!}</textarea>
                        @error('title')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="short_desc">Short Desc</label>
                        <textarea name="short_desc" class="form-control" >{{$blog->short_desc}}</textarea>
                        @error('short_desc')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="descr">Description</label>
                    <textarea name="descr" class="form-control" placeholder="Blog description" id="summernote2">{!! $blog->descr !!}</textarea>
                        @error('privacy_policy')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                    <a href="{{route('admin.blogs.index')}}" class="btn btn-dark">Back</a>
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
