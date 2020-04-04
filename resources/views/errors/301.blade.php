@extends('layouts.main')

@section('content')
    <div class="page section">
        <h1>This page has moved permanently.</h1>
        <br>
        <h2>Error 301</h2>
        <p>The page you are looking for, <b>{{Request::fullUrl()}}</b> has moved permanently.</p>
        <br/>
        <p>Please try to find what you were looking for via the search function on the top navigation bar.</p>
    </div>
@endsection