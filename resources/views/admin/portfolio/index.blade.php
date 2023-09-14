@extends('admin.admin_master')
@section('content')
    <div class="row">
        <div class="col-md-12 ">
            @include('message.message')
            <div class="card px-2 py-3">
                <a href="{{ route('admin.portfolios.create') }}" class="btn btn-md btn-primary w-25 my-3 ml-auto">Add New Portfolio <i
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

                        @foreach ($portfolios as $protfolio)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ asset($protfolio->thumbnail) }}" alt="{{ $protfolio->thumbnail }}" width="100"></td>
                                <td style="max-width: 200px;">{{ Str::limit(strip_tags($protfolio->title), 50) }}</td>

                                <td style="max-width: 200px;">{{ Str::limit(strip_tags($protfolio->descr), 100) }}</td>
                                <td>
                                    <a href="{{ route('admin.portfolios.edit', $protfolio) }}" class="btn-sm btn btn-info">Edit</a>
                                    <form action="{{ route('admin.portfolios.destroy', $protfolio) }}" method="post">
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
