@extends('master')

@section('title')
    Inbox
@endsection

@section('content')
    <table>
        <tr>
            <th>#</th>
            <th>Message</th>
            <th>Sender</th>
            <th>Time</th>
        </tr>

        @foreach ($messages as $message)
            <tr>
                <td></td>
                <td>{{$message->message}}</td>
                <td>{{$message->sender->name}}</td>
                <td>{{$message->created_at}}</td>
            </tr>
        @endforeach
    </table>
@endsection
