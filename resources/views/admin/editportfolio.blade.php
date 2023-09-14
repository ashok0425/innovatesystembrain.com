@extends('admin.admin_master')
@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header">
                <div class="header-title">
                   <strong>Edit Portfolio</strong>
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
                <form action="{{route('updateportfolio')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$port->id}}">
                    {{-- <div class="form-group">
                        <label for="proto">Protfolio type</label>
                        <br>
                        <select name="proto" id="" class="form-control" required>
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
                        <img src="{{asset($port->thumbnail)}}" alt="" height="100">
                        @error('thumbnail')
                    <span class="text-danger">{{$message}}</span>                          
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="term_conditios">Title</label>
                        <textarea name="title" class="form-control" placeholder="company name">
                            {!!$port->title!!}
                        </textarea>
                        @error('title')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div><div class="form-group">
                        <label for="developed">website Links</label>
                    <textarea name="link" class="form-control" placeholder="website links" >
                        {!!$port->descr!!}
                    </textarea>
                        @error('link')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div> --}}
                    <div class="form-group">
                    <a href="{{route('protfolio')}}" class="btn btn-dark">Back</a>
                        <input type="submit" value="update" class="btn-info btn" class="form-control">
                    </div>
                    <div class="form-group">
                    </div>
                </form>
            </div>
            </div>  
    </div>
</div> 
@endsection