@extends ('layouts.noheader')
<link rel="stylesheet" href="https://www.abc.net.au/res/sites/news-projects/elections-results-common-responsive/dev-vic-2018/styles/election-desktop.css">
<style>
    #container_subheader {
        background: #143258 !important
    }
</style>
@section('content')
    <div class="page_margins">
        <div class="header subheader" style="background: #143258; color: #fff;">
            <!--endnoindex-->

            <h1 style="color:#fff">Federal Election {{$election->month}} {{$election->year}}</h1>
            <!--noindex-->
            <ul class="nav" role="navigation">
                <li>
                    <a href="{{route('elections.federal.index', $election->slug)}}" style="color:#fff">Home</a>
                </li>
                <li>
                    <a href="{{route('elections.federal.electorates', $election->slug)}}" style="color:#fff">Electorates</a>
                </li>
                <li>
                    <a href="#" style="color:#fff">Senate</a>
                </li>
            </ul>
        </div>
        <div class="page section">
            <div class="subcolumns">
                <div class="c751">
                    <div class="eg-page eg-index article">
                        <h1 id="skip-to-content-heading">Electorates A-Z</h1>
                        <table id="electoratestable" class="eg-table">
                            <thead>
                            <tr>
                                <th class="candidate">Electorate</th>
                                <th class="shortnum" colspan="2">Party and Margin</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($electorates as $e)
                            <tr class="odd">
                                <td class="electorate"><a href="{{route('elections.federal.electorate', [$election->slug, $e->slug])}}">{{$e->name}}</a></td>
                                <td class="party">{{$e->held_by}}</td><td class="margin pc">{{$e->held_by_percentage}}%</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection