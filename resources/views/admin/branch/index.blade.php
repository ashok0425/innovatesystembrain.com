@extends('admin.admin_master')
@section('content')
    <div class="row">
        <div class="col-md-12 ">
            @include('message.message')
            <div class="card px-2 py-3">
                <a href="{{ route('admin.branches.create') }}" class="btn btn-md btn-primary w-25 my-3 ml-auto">Add New Branch <i
                        class="fas fa-plus"></i></a>

                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Branch</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Operations</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($branches as $branch)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td style="max-width: 200px;">{{ $branch->name }}</td>
                                <td style="max-width: 200px;">{{ $branch->address }}</td>
                                <td style="max-width: 200px;">{{ $branch->email }}</td>
                                <td style="max-width: 200px;">{{ $branch->phone }}</td>
                                <td>
                                    <a href="{{ route('admin.branches.edit', $branch) }}" class="btn-sm btn btn-info">Edit</a>
                                    <form action="{{ route('admin.branches.destroy', $branch) }}" method="post">
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
