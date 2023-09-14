@extends('admin.admin_master')
@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header">
                <div class="header-title">
                   <strong> Add Portfolio</strong>
                   <div class="secondary-header">
                    @include('message.message')
            </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.portfolios.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail</label>
                        <input type="file" name="thumbnail" class="form-control" required>
                        @error('thumbnail')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>
                        <textarea name="title" class="form-control">{{old('title')}}</textarea>
                        @error('title')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="short_desc">Short Desc</label>
                        <textarea name="short_desc" class="form-control"  >{{old('short_desc')}}</textarea>
                        @error('short_desc')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="descr">Description</label>
                    <textarea name="descr" class="form-control" required placeholder="Blog description" id="summernote2">{{old('descr')}}</textarea>
                        @error('descr')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                    <a href="{{route('admin.portfolios.index')}}" class="btn btn-dark">Back</a>
                        <input type="submit" value="Add" class="btn-info btn" class="form-control" required>
                    </div>
                    <div class="form-group">
                    </div>
                </form>
            </div>
            </div>
    </div>
</div>
@endsection
