@extends('admin.admin_master')
@section('content')
    <div class="row">
        <div class="col-md-12 ">
            @include('message.message')
            <div class="card px-2 py-3">
                <a href="{{ route('admin.pages.create') }}" class="btn btn-md btn-primary w-25 my-3 ml-auto">Add New Page <i
                        class="fas fa-plus"></i></a>

                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Thumbnail</th>
                            <th>Title</th>
                            <th>Short Description</th>
                            <th>Operations</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($pages as $page)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ asset($page->thumbnail) }}" alt="{{ $page->thumbnail }}" width="100"></td>
                                <td style="max-width: 200px;">{{ Str::limit(strip_tags($page->title), 50) }}</td>

                                <td style="max-width: 200px;">{{ Str::limit(strip_tags($page->descr), 100) }}</td>
                                <td>
                                    <a href="{{ route('admin.pages.edit', $page) }}" class="btn-sm btn btn-info">Edit</a>
                                    <form action="{{ route('admin.pages.destroy', $page) }}" method="post">
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
