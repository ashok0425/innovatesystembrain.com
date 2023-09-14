@extends('admin.admin_master')
@section('content')
    <div class="row">
        <div class="col-md-12 ">
            <div class="w-25 mr-auto">
                @include('message.message')
            </div>
            <div class="card px-2 py-3">
                <a href="{{ route('admin.testimonials.create') }}" class="btn btn-md btn-primary w-25 my-3 ml-auto">Add Testimonial member
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

                        @foreach ($testimonials as $testimonial)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td style="max-width: 200px;">{{ strip_tags($testimonial->name) }}</td>
                                <td><img src="{{ asset($testimonial->thumbnail) }}" alt="{{ $testimonial->thumbnail }}" width="100">
                                </td>
                                <td style="max-width: 200px;">{{ strip_tags($testimonial->position) }}</td>
                                <td>
                                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn-sm btn btn-info">Edit</a>
                                    <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="post">
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
