@extends('admin.admin_master')
@section('content')
    <div class="row">
        <div class="col-md-12 ">
            <div class="w-25 mr-auto">
                @include('message.message')
            </div>
            <div class="card px-2 py-3">
                <a href="{{ route('admin.faqs.create') }}" class="btn btn-md btn-primary w-25 my-3 ml-auto">Add Faq
                    <i class="fas fa-plus"></i></a>

                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Question</th>
                            <th>Answer</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($faqs as $faq)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td style="max-width: 200px;">{{ strip_tags($faq->question) }}</td>

                                <td style="max-width: 200px;">{{ strip_tags($faq->answer) }}</td>
                                <td>
                                    <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn-sm btn btn-info">Edit</a>
                                    <form action="{{ route('admin.faqs.destroy', $faq) }}" method="post">
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
