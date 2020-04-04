@extends('layouts.main')

@section('content')
    <div class="page section">
        <h1>Sorry, page not found.</h1>
        <br>
        <h2>Error 404</h2>
        <p>The page you are looking for, <b>{{Request::fullUrl()}}</b> cannot be found. It might have been removed, had its name changed, or be temporarily unavailable.</p>
        <br/>
        Please try the following:
        <br/>
        <ul>
            <li>If you typed the page address in the Address bar, check the spelling and use of upper-case and lower-case letters.</li>
            <li>Click the Back button on your browser to try another link.</li>
            <li>Go to the ABC Home Page and look for links to the information you want.</li>
            <li>Use the ABC Online search engine.</li>
        </ul>
    </div>
@endsection