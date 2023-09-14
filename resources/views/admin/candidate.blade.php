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
       

            <table id="table_id" class="display">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Name</th>

                     

                        <th>Email</th>

                        <th>Phone</th>
                        <th>Message</th>
                        <th>Salary</th>



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

                        <td style="max-width: 100px;" >{{strip_tags($item->name)}}</td>

                      
                        <td style="max-width: 200px;">{!!strip_tags($item->email)!!}</td>
                        <td style="max-width: 200px;">{!!strip_tags($item->phone)!!}</td>
                        <td style="max-width: 300px;">{!!strip_tags($item->message)!!}</td>
                        <td style="max-width: 300px;">{!!strip_tags($item->salary)!!}</td>

                    <td>
                  
                        <a href="{{route('candidatedelete',['id'=>"$item->id"])}}" class="btn-sm btn btn-danger">Delete</a>
                        @if ($item->cv!='')
                        <a href="{{asset($item->cv)}}" download="{{$item->name}}"><i class="fas fa-download"></i>Download Cv</a>
                        @else 
                        <br>
<div class="badge bg-info text-white">Intern</div>
                        @endif
                        
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