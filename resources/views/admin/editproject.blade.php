@extends('admin.admin_master')
@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header">
                <div class="header-title">
                   <strong> Edit Project</strong>
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
                <form action="{{route('updateproject')}}" method="POST" enctype="multipart/form-data">
                    @csrf
               <input type="hidden" name="id" value="{{$project->id}}">
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail</label>
                        <input type="file" name="thumbnail" class="form-control">
                        <img src="{{asset($project->thumbnail)}}" alt="" width="100">
                        @error('thumbnail')
                    <span class="text-danger">{{$message}}</span>                          
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="term_conditios">Name</label>
                        <input name="name" class="form-control" placeholder="company name" type="text" value="{{$project->name}}"/>
                        
                        @error('name')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="term_conditios">Title</label>
                        <input name="title" class="form-control" placeholder="company name" type="text" value="{{$project->title}}"/>
                        @error('title')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                     <div class="form-group">
                        <label for="developed">website Links</label>
                    <input name="link" class="form-control" placeholder="website links" type="url" value="{{$project->link}}"/>
                        @error('link')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="developed">Description</label>
                    <textarea name="description" class="form-control" placeholder="website links" id="summernote1" >{!!$project->descr!!}</textarea>
                        @error('description')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                    <a href="{{route('project')}}" class="btn btn-dark">Back</a>
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