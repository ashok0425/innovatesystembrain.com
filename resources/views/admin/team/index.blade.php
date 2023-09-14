@extends('admin.admin_master')
@section('content')
    <div class="row">
        <div class="col-md-12 ">
            <div class="w-25 mr-auto">
                @include('message.message')
            </div>
            <div class="card px-2 py-3">
                <a href="{{ route('admin.teams.create') }}" class="btn btn-md btn-primary w-25 my-3 ml-auto">Add team member
                    <i class="fas fa-plus"></i></a>

                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Position</th>

                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($teams as $team)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td style="max-width: 200px;">{{ strip_tags($team->name) }}</td>
                                <td><img src="{{ asset($team->thumbnail) }}" alt="{{ $team->thumbnail }}" width="100">
                                </td>
                                <td style="max-width: 200px;">{{ strip_tags($team->position) }}</td>
                                <td>
                                    <a href="{{ route('admin.teams.edit', $team) }}" class="btn-sm btn btn-info">Edit</a>
                                    <form action="{{ route('admin.teams.destroy', $team) }}" method="post">
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
