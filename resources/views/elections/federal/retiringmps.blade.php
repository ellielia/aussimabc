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
            <iframe src="{{route('elections.federal.partybars', $election->slug)}}" height="180" width="100%">
            </iframe>
            <div class="subcolumns">
                <div class="c751">
                   <div class="section">
                       <div class="eg-page eg-electorate article">
                           <h1>Retiring MPs</h1>
                           @foreach ($mps as $m)
                           <div class="eg-electorate-bio">
                               <details open="open">
                                   <summary>
                                       <h2 id="">{{$m->name}}</h2>
                                       <p> <span class="{{$m->party_hex}}">{{$m->party}}</span></p>
                                   </summary>
                                   <img src="{{$m->photo}}" alt="Louise Asher (Liberal)">
                                   <div class="eg-electorate-bio-text">
                                       <p class="bio">{{$m->bio}}</p>
                                   </div>
                               </details>
                           </div>
                           @endforeach
                       </div>
                   </div>
            </div>
        </div>
    </div>
@endsection