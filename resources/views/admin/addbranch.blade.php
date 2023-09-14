@extends('admin.admin_master')
@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header">
                <div class="header-title">
                   <strong> Add  Porduct</strong>
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
                <form action="{{route('storebranch')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="proto">Name</label>
                        <input type="text" name="name" class="form-control" required>

                     
                        @error('name')

                    <span class="text-danger">{{$message}}</span>                          
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail</label>
                        <input type="file" name="thumbnail" class="form-control" required>
                        @error('thumbnail')
                    <span class="text-danger">{{$message}}</span>                          
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="proto"> Description</label>
                        <textarea  name="post" class="form-control" required id="summernote">
                        </textarea>
                     
                        @error('post')

                    <span class="text-danger">{{$message}}</span>                          
                        @enderror
                    </div>
             
                    
                  

                    <div class="form-group">
                        <label for="proto">Links</label>
                        <input type="text" name="phone" class="form-control" required>

                     
                        @error('phone')

                    <span class="text-danger">{{$message}}</span>                          
                        @enderror
                    </div>
                    
                   
                    <div class="form-group">
                    <a href="{{route('branch')}}" class="btn btn-dark">Back</a>
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