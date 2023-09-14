@extends('admin.admin_master')
@section('content')
    <div class="row">
        <div class="col-md-12 ">
            @include('message.message')
            <div class="card px-2 py-3">
                <a href="{{ route('admin.blogs.create') }}" class="btn btn-md btn-primary w-25 my-3 ml-auto">Add New blog <i
                        class="fas fa-plus"></i></a>

                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Thumbnail</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Operations</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ asset($blog->thumbnail) }}" alt="{{ $blog->thumbnail }}" width="100"></td>
                                <td style="max-width: 200px;">{{ Str::limit(strip_tags($blog->title), 50) }}</td>

                                <td style="max-width: 200px;">{{ Str::limit(strip_tags($blog->descr), 100) }}</td>
                                <td>
                                    <a href="{{ route('admin.blogs.edit', $blog) }}" class="btn-sm btn btn-info">Edit</a>
                                    <form action="{{ route('admin.blogs.destroy', $blog) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
