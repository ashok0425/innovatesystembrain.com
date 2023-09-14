@extends('admin.admin_master')
@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header">
                <div class="header-title">
                   <strong> Add Project</strong>
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
                <form action="{{route('storeproject')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{-- <div class="form-group">
                        <label for="proto">Protfolio type</label>
                        <br>
                        <select name="proto" id="" class="form-control">
<option value="">Select Protfolio type</option>
<option value="1">Website</option>
<option value="2">Application</option>
<option value="3">Software</option>


                        </select>
                        @error('proto')

                    <span class="text-danger">{{$message}}</span>                          
                        @enderror
                    </div> --}}
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail</label>
                        <input type="file" name="thumbnail" class="form-control">
                        @error('thumbnail')
                    <span class="text-danger">{{$message}}</span>                          
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="term_conditios">Name</label>
                        <input name="name" class="form-control" placeholder="company name" type="text"/>
                        
                        @error('name')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="term_conditios">Title</label>
                        <input name="title" class="form-control" placeholder="company name" type="text"/>
                        @error('title')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                     <div class="form-group">
                        <label for="developed">website Links</label>
                    <input name="link" class="form-control" placeholder="website links" type="url"/>
                        @error('link')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="developed">Description</label>
                    <textarea name="description" class="form-control" placeholder="website links" id="summernote1"></textarea>
                        @error('description')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                    <a href="{{route('project')}}" class="btn btn-dark">Back</a>
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