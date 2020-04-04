@extends('layouts.admin')

@section('content')
    <h3>Elections</h3>
    <hr>
    <div class="row">
        <div class="col">
            <h5>Federal
                <div class="float-right">
                    <a href="#" role="button" class="btn btn-sm btn-primary">+</a>
                </div>
            </h5>
            <br class="my-sm-0"/>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <th>Month/Year</th>
                <th>Polling Day</th>
                </thead>
                <tbody>
                @foreach($fed as $f)
                    <tr>
                        <td>
                            <a href="#">{{$f->month}} {{$f->year}}</a>
                        </td>
                        <td>{{$f->polling_day}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col">
            <h5>By-elections
                <div class="float-right">
                    <a href="#" role="button" class="btn btn-sm btn-primary">+</a>
                </div>
            </h5>
            <br class="my-sm-0"/>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <th>Electorate</th>
                <th>Polling Day</th>
                </thead>
                <tbody>
                @foreach($by as $f)
                    <tr>
                        <td>
                            <a href="#">{{$f->electorate}}</a>
                        </td>
                        <td>{{$f->polling_day}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection