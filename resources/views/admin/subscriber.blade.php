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
        {{-- <a href="{{route('sendsubscribermail')}}" class="btn btn-md btn-primary w-25 my-3 ml-auto">Send Email <i class="fas fa-envelope"></i></a> --}}

            <table id="table_id" class="display">
                <thead>
                    <tr>
                        <th>S.N</th>

                        <th>Name</th>

                        <th>Email</th>

                        

                        <th>Operations</th>
                    </tr>
                </thead>
                @if (count($arr)>0)

                <tbody>
                    @php
                        $i=1
                    @endphp
                        
@foreach ($arr as $item)
    
                    <tr>
                        <td>{{$i++}}</td>

                        <td style="max-width: 200px;">{!!strip_tags($item->name)!!}</td>
                      
                        <td style="max-width: 200px;">{!!strip_tags($item->email)!!}</td>
                      


                    <td>
                  
                        <a href="{{route('subscriberdelete',['id'=>"$item->id"])}}" class="btn-sm btn btn-danger">Delete</a>
                    </td>
                    </tr>
@endforeach
                  
                </tbody>
                @endif

            </table>
                </div>
            </div>
             
    </div>

@endsection