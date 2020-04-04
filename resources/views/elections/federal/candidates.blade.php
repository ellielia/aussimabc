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
                        <h1 id="skip-to-content-heading">Candidates A-Z</h1>
                        <table id="candidatestable" class="eg-table">
                            <thead>
                            <tr>
                                <th class="candidate">Candidate</th>
                                <th class="party">Party</th>
                                <th class="electorate" colspan="2">Electorate</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($candidatesList as $c)
                                <tr class="odd">
                                    <td class="candidate">{{$c->full_name}}</td>
                                    <td class="party" style="border-left-color: {{$c->party->hex}}"><span title="ANIMAL JUSTICE PARTY">{{$c->party->name}}</span></td>
                                    <td class="electorate"><a href="{{route('elections.federal.electorate', [$election->slug, $c->electorate->slug])}}">{{$c->electorate->name}}</a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection