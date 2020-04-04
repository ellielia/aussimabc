@extends ('layouts.noheader')
<link rel="stylesheet"
      href="https://www.abc.net.au/res/sites/news-projects/elections-results-common-responsive/dev-vic-2018/styles/election-desktop.css">
<style>
    #container_subheader {
        background: #143258 !important
    }
</style>
@section('content')
    @php
        $winningCandidate = \App\ElectionCandidate::whereId($electorate->winning_candidate)->first();
        $winningParty = \App\FederalElectionParty::whereId($electorate->winning_party)->first();
        $tppcandidates = \App\ElectionCandidate::where('electorate_id', $electorate->id)->where('total_votes', '!=', 0)->get();
        $sortedCandidates = \App\ElectionCandidate::where('electorate_id', $electorate->id)->get()->sortByDesc('first_preference_votes');
        $candidates = \App\ElectionCandidate::where('electorate_id', $electorate->id)->get()->sortByDesc('full_name');
    @endphp
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
            <div class="c75l">
                <!-- B modules - start -->
                <div class="section">
                    <div class="election-header-electorate"><h1><strong>Electorate:</strong> <span
                                    class="name">{{$electorate->name}}</span></h1>
                        <div class="electorate-header-nav-links">
                            <ul>
                                <li class="up"><a href="../electorates">Electorates</a></li>
                            </ul>
                        </div>
                    </div>
                    <div id="electorate" class="election-results" data-ref="OnlineElectorateALBE"
                         data-dataset="OnlineElectorateALBE" data-template="electorate"
                         data-sanitiser="OnlineElectorate">
                        <div id="electorate" class="election-results" data-ref="OnlineElectorate"
                             data-dataset="OnlineElectorate" data-template="electorate"
                             data-sanitiser="OnlineElectorate">
                            @if ($winningCandidate)
                            <div class="prediction">
                                <div class="prediction-profile"
                                     style="background-image: url({{$winningCandidate->photo_url}})">
                                    <svg class="ptyred" id="tick" width="20px" height="20px" viewBox="-1 -1 29 29"
                                         version="1.1" xmlns="http://www.w3.org/2000/svg"
                                         xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g>
                                                <circle style="fill: {{$winningParty->hex}}" cx="14" cy="14"
                                                        r="14"></circle>
                                                <path d="M11.8048096,15.3670273 L8.29430575,12.908946 L6,16.1855542 L9.51050386,18.6436354 L9.48590132,18.6787715 L12.7625095,20.9730772 L21.6402809,8.29430575 L18.3636727,6 L11.8048096,15.3670273 Z"
                                                      fill="#fff"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <div class="prediction-text">
                                    <div class="disclaimer">ABC Prediction</div>
                                    <div class="result"><span class="gainretain">{{$electorate->abc_prediction}}</span>
                                    </div>
                                    <div class="candidate">{{$winningCandidate->full_name}}</div>
                                </div>
                                <div class="prediction-data">
                                    <div class="prediction-votes"><strong>VOTES</strong>
                                        <div class="vote-num">
                                            @php
                                                $percentage = $winningCandidate->total_votes / $electorate->counted_votes * 100;
                                                echo(floor($percentage).'%');
                                            @endphp
                                        </div>
                                    </div>
                                    <div class="prediction-swing"><strong>SWING</strong>
                                        <div class="swing-num">+{{$winningCandidate->swing}}
                                            % {{$winningParty->code}}</div>
                                    </div>
                                    <div class="count">
                                        @php
                                            $percentage = $electorate->counted_votes / $electorate->electors * 100;
                                                echo(floor($percentage).'%');
                                        @endphp
                                        Counted. Updated {{$electorate->last_update}}</div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            @else
                                No prediction
                            @endif
                            <div class="afterprefs placeholder">
                                <div class="module afterprefs electable">
                                    <table class="ert-table mod-electorate mod-after-pref">
                                        <thead>
                                        <tr class="ert-row">
                                            <th class="ert-column-heading ert-pref-heading" colspan="2">Preference
                                                Count
                                            </th>
                                            <th class="ert-column-heading ert-votes-heading">Votes</th>
                                            <th class="ert-column-heading ert-swing-heading">Swing</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($tppcandidates as $c)
                                            <tr class="ert-row">
                                                <td class="ert-bar bar"
                                                    style="width: 57.5%; background-color: {{$c->party_hex}}"></td>
                                                <td class="ert-column ert-party"
                                                    style="border-left-color: {{$c->party->hex}}"><span
                                                            class="short"></span>
                                                    <span class="long">{{$c->party->name}}</span></td>
                                                <td class="ert-column ert-candidate"><img src="{{$c->photo_url}}"
                                                                                          alt="Rebekha Sharkie">
                                                    @if ($c->mp)
                                                        {{$c->full_name}}<span
                                                                style="background: lightsteelblue; padding: 3px; color: black">MP</span>
                                                    @else
                                                        {{$c->full_name}}
                                                    @endif
                                                </td>
                                                <td class="ert-column ert-votes">
                                                    <div class="num-cell long">{{number_format($c->total_votes)}}</div>
                                                    <div class="num-cell">
                                                        @php
                                                            $percentage = $c->total_votes / $electorate->counted_votes * 100;
                                                            echo(floor($percentage).'%');
                                                        @endphp
                                                    </div>
                                                    <div class="bar-graph">
                                                        <div class="bar"
                                                             style="width: {{$percentage}}%; background-color: {{$c->party->hex}}"></div>
                                                    </div>
                                                </td>
                                                <td class="ert-column ert-swing">
                                                    <div class="num-cell">{{$c->swing}}%</div>
                                                    @if ($c->swing < 0)

                                                        <div class="swing-graph negative">
                                                            <div class="bar"
                                                                 style="width: {{abs($c->swing)}}%; background-color: {{$c->party->hex}}"></div>
                                                        </div>

                                                        <div class="swing-graph positive ">
                                                            <div class="bar hidden"
                                                                 style="width: {{$c->swing}}%; background-color: {{$c->party->hex}}"></div>
                                                        </div>
                                                    @else
                                                        <div class="swing-graph negative ">
                                                            <div class="bar hidden"
                                                                 style="width: {{abs($c->swing)}}%; background-color: {{$c->party->hex}}"></div>
                                                        </div>

                                                        <div class="swing-graph positive">
                                                            <div class="bar "
                                                                 style="width: {{$c->swing}}%; background-color: {{$c->party->hex}}"></div>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="results-table-group">
                                <div id="summary" class="module votesaccumulated electable results-table">
                                    <table class="ert-table mod-electorate">
                                        <thead>
                                        <tr class="ert-row">
                                            <th class="ert-column-heading ert-pref-heading" colspan="2">First
                                                Preference
                                            </th>
                                            <th class="ert-column-heading ert-votes-heading">Votes</th>
                                            <th class="ert-column-heading ert-swing-heading">Swing</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sortedCandidates as $c)
                                            <tr class="ert-row ptyred" data-party="ALP" data-ballotposition="7">
                                                <td class="ert-bar bar ptyred" style="width: 42.9%; background-color: {{$c->party->hex}}"></td>
                                                <td class="ert-column ert-party ptyred" style="border-left-color: {{$c->party->hex}}" data-tvname="Martin Foley"><span
                                                            class="short">ALP</span> <span class="long">{{$c->party->name}}</span>
                                                </td>
                                                <td class="ert-column ert-candidate">{{$c->full_name}}</td>
                                                <td class="ert-column ert-votes">
                                                    <div class="num-cell long">{{number_format($c->total_votes)}}</div>
                                                    <div class="num-cell">
                                                        @php
                                                            $percentage = $c->total_votes / $electorate->counted_votes * 100;
                                                            echo(floor($percentage).'%');
                                                        @endphp
                                                    </div>
                                                    <div class="bar-graph">
                                                        <div class="bar"
                                                             style="width: {{$percentage}}%; background-color: {{$c->party->hex}}"></div>
                                                    </div>
                                                </td>
                                                <td class="ert-column ert-swing">
                                                    <div class="num-cell">{{$c->swing}}%</div>
                                                    @if ($c->swing < 0)

                                                        <div class="swing-graph negative">
                                                            <div class="bar"
                                                                 style="width: {{abs($c->swing)}}%; background-color: {{$c->party->hex}}"></div>
                                                        </div>

                                                        <div class="swing-graph positive ">
                                                            <div class="bar hidden"
                                                                 style="width: {{$c->swing}}%; background-color: {{$c->party->hex}}"></div>
                                                        </div>
                                                    @else
                                                        <div class="swing-graph negative ">
                                                            <div class="bar hidden"
                                                                 style="width: {{abs($c->swing)}}%; background-color: {{$c->party->hex}}"></div>
                                                        </div>

                                                        <div class="swing-graph positive">
                                                            <div class="bar "
                                                                 style="width: {{$c->swing}}%; background-color: {{$c->party->hex}}"></div>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section">
                    <div class="eg-page eg-electorate article" data-eg-electorate-id="albe">

                        <h1 id="skip-to-content-heading">{{$electorate->name}}</h1>
                        <p class="location">{{$electorate->state_territory}}</p>
                        <p class="margin ptyblack strong"> {{$electorate->held_by}} {{$electorate->held_by_percentage}}%</p>
                        <div class="btn-group">
                            <a class="btn btn-default" href="#candidates">Candidates</a>
                        </div>
                        <h2 id="MP">MP</h2>
                        <p>{!! $electorate->mp_description !!}
                        </p>
                        <h2>Profile</h2>
                        <p>{!! $electorate->profile_description !!}</p>
                        <div id="history">
                            <h2 id="Background">History</h2>
                            <p>{!! $electorate->history_description !!}</p>
                            <h2 id="">Past Election Results</h2>
                            <div>
                                {!! $electorate->past_results_description !!}
                            </div>
                        </div>
                        <div id="polls">
                            <h2>Enrolment</h2>
                            <p>{{$electorate->enrolment_description}}</p>
                        </div>
                        <div id="candidates">
                            <h2>Ballot Paper</h2>
                            <table id="ballotpaper" class="eg-table">
                                <caption>Candidates ({{count($candidates)}})</caption>
                                <thead>
                                <tr>
                                    <th class="candidate">Candidate Name</th>
                                    <th class="party">Party</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($candidates as $c)
                                    <tr>
                                        <td class="candidate">{{$c->full_name}}</td>
                                        <td class="party" style="border-left: 8px solid {{$c->party->hex}}">{{$c->party->name}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <p>Information, pictures and how-to-vote material for candidates can be sent to /u/Lieselta
                            </p>
                            <h2>Summary of How to Vote Recommendations</h2>
                            <p>{{$electorate->htv_card_description}}</p>
                            <p>Copies of how-to-vote material can be found in the candidate profiles below.</p>
                            <h2 id="Candidates">Candidates</h2>
                            @foreach($candidates as $c)
                                <div class="eg-electorate-bio">
                                    <img src="{{$c->photo_url}}" alt="">
                                    <div class="eg-electorate-bio-text">
                                        <h3 id="">{{$c->full_name}}</h3>
                                        <p>{{$c->party->name}}</p>
                                        <p class="bio">{{$c->biography}}</p>
                                        <div class="btn-group">
                                            @if ($c->website_url)
                                                <a class="btn btn-default" href="{{$c->website_url}}">Website</a>
                                            @endif
                                            @if ($c->htv_url)
                                                <a class="btn btn-default" href="{{$c->htv_url}}">How to vote</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <p>Information, pictures and how-to-vote material for candidates can be sent to /u/Lieselta
                            </p>
                        </div>
                    </div>
                </div>
            </div><!-- B modules - end -->
        </div>
    </div>
@endsection