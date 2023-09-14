@extends('admin.admin_master')
@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header">
                <div class="header-title">
                   <strong> Edit Opportunity</strong>
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
                <form action="{{route('Q&Aupdate')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="term_conditios">Postition</label>
                        <textarea name="title" class="form-control" placeholder="question">{{$arr->title}}</textarea>
                        @error('title')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="descr">Description</label>
                        <textarea name="privacy_policy" class="form-control" placeholder="Description" id="summernote1">
                            {{$arr->descr}}
                        </textarea>
                        @error('privacy_policy')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="img">Thumbnail</label><br>
                       <input type="file" name="img" id="">
                       <input type="hidden" name="id" value="{{$arr->id}}" >
                       <br>
                       <br>

                       <img src="{{asset($arr->thumbnail)}}" alt="" width="80">
                        @error('file')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                    <a href="{{route('Q&A')}}" class="btn btn-dark">Back</a>
                        <input type="submit" value="Update" class="btn-info btn" class="form-control">
                    </div>
                   
                </form>
            </div>
            </div>  
    </div>
</div> 
@endsection