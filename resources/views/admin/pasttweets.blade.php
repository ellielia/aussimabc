@extends('layouts.admin')

@section('content')
    <h3>Past Tweets</h3>
    <hr>
    <table class="table table-hover">
        <thead>
        <th>Handle</th>
        <th>User</th>
        <th>Timestamp</th>
        <th>Content</th>
        <th>Avatar</th>
        </thead>
        <tbody>
        @php
        $pasttweets = \App\Tweet::all()->sortByDesc('id');
        @endphp
        @foreach ($pasttweets as $t)
            <tr>
                <td>@ {{$t->handle}}</td>
                <td>{{$t->user->username}}</td>
                <td>{{$t->timestamp}}</td>
                <td>{{$t->content}}</td>
                <td>
                    <a href="{{$t->avatar}}">Avatar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $('.table').DataTable();
        } );
    </script>
@endsection