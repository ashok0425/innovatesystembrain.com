@extends('admin.admin_master')
@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header">
                <div class="header-title">
                   <strong> Add new banner</strong>
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
                <form action="{{route('admin.banners.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="thumbnail">Images</label>
                        <input type="file" name="thumbnail" class="form-control">
                        @error('thumbnail')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    {{-- <div class="form-group">
                        <label for="term_conditios">Title</label>
                        <textarea name="title" class="form-control" placeholder="title" ></textarea>
                        @error('title')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div> --}}
                    {{-- <div class="form-group">
                        <label for="privacy_policy">Description</label>
                    <textarea name="privacy_policy" class="form-control" placeholder="Some details " id="summernote2"></textarea>
                        @error('privacy_policy')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div> --}}
                    <div class="form-group">
                    <a href="{{route('admin.banners.index')}}" class="btn btn-dark">Back</a>
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
