@extends('admin.admin_master')
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <div class="w-25 mr-auto">
            @if (session('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                {{session('msg')}}

              </div>
        @endif
        </div>
        <div class="card px-2 py-3">
        <a href="{{route('addproject')}}" class="btn btn-md btn-primary w-25 my-3 ml-auto">Add Protfolio <i class="fas fa-plus"></i></a>

            <table id="table_id" class="display">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Title</th>
                        <th>Thumbnail</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1
                    @endphp
@foreach ($arr as $item)
    
                    <tr>
                        <td>{{$i++}}</td>

                        <td style="max-width: 200px;" >{{strip_tags($item->name)}}</td>
                        <td><img src="{{asset($item->thumbnail)}}" alt="{{$item->thumbnail}}" width="100"></td>
                        
                    <td>
                        <a href="{{route('editproject',['id'=>"$item->id"])}}" class="btn-sm btn btn-info">Edit</a>
                        <a href="{{route('projectdelete',['id'=>"$item->id"])}}" class="btn-sm btn btn-danger">Delete</a></td>
                    </tr>
@endforeach
                  
                </tbody>
            </table>
                </div>
            </div>
             
    </div>

@endsection