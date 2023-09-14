@extends('admin.admin_master')
@section('content')
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header">
                <div class="header-title">
                   <strong> Edit Q&A</strong>
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
                <form action="{{route('questionupdate')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{$arr->id}}" name="id">

                    <div class="form-group">
                        <label for="term_conditios">Question</label>
                        <textarea name="question" class="form-control" placeholder="question">{{$arr->question}}</textarea>
                        @error('question')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="descr">Answer</label>
                        <textarea name="answer" class="form-control" placeholder="Answer">
                            {{$arr->answer}}
                        </textarea>
                        @error('answer')
                    <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                  
                    <div class="form-group">
                    <a href="{{route('question')}}" class="btn btn-dark">Back</a>
                        <input type="submit" value="Update" class="btn-info btn" class="form-control">
                    </div>
                   
                </form>
            </div>
            </div>  
    </div>
</div> 
@endsection