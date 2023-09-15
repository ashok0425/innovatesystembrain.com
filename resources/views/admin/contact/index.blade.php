@extends('admin.admin_master')
@section('content')
    <div class="row">
        <div class="col-md-12 ">
            <div class="w-25 mr-auto">
                @include('message.message')
            </div>
            <div class="card px-2 py-3">

                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>User Info</th>
                            <th>Subject</th>
                            <th>Message</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td style="max-width: 200px;">
                                    {{ $contact->name }}
                                    <br>
                                    {{ $contact->email }}
<br>
                                    {{ $contact->phone }}
                                </td>

                                <td style="max-width: 300px;">{{ $contact->subject }}</td>
                                <td>
                                   {{$contact->message}}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
