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
                        {{ session('msg') }}

                    </div>
                @endif
            </div>
            <div class="card px-2 py-3">
                <a href="{{ route('admin.services.create') }}" class="btn btn-md btn-primary w-25 my-3 ml-auto">Add services <i
                        class="fas fa-plus"></i></a>

                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Title</th>
                            <th>Thumbnail</th>
                            <th>Description</th>
                            <th>Operations</th>

                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($services as $service)
                            <tr>
                                <td>{{ $i++ }}</td>

                                <td style="max-width: 200px;">{{ strip_tags($service->title) }}</td>
                                <td><img src="{{ asset($service->thumbnail) }}" alt="{{ $service->thumbnail }}" width="100">
                                </td>
                                <td style="max-width: 200px;">{{ Str::limit(strip_tags($service->descr), 100) }}</td>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('admin.services.edit', $service) }}"
                                        class="btn-sm btn btn-info">Edit</a>
                                    <form action="{{route('admin.services.destroy',$service)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
