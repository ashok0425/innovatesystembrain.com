@extends('admin.admin_master')
@section('content')
    <div class="row">
        <div class="col-md-12 ">
            <div class="w-25 mr-auto">
                @include('message.message')
            </div>
            <div class="card px-2 py-3">
                <a href="{{ route('admin.banners.create') }}" class="btn btn-md btn-primary w-25 my-3 ml-auto">Add Banner <i
                        class="fas fa-plus"></i></a>

                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Title</th>
                            <th>Image</th>
                            {{-- <th>Description</th> --}}
                            <th>Operations</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($banners as $banner)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td style="max-width: 200px;">{{ strip_tags($banner->title) }}</td>
                                <td><img src="{{ asset($banner->thumbnail) }}" alt="{{ $banner->thumbnail }}" width="100">
                                </td>
                                {{-- <td style="max-width: 200px;">{!! strip_tags($banner->descr) !!}</td> --}}
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('admin.banners.edit', $banner) }}"
                                        class="btn-sm btn btn-info">Edit</a>
                                    <form action="{{ route('admin.banners.destroy', $banner) }}" method="post">
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
