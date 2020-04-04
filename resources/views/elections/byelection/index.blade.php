@extends ('layouts.main')

@section('content')
    <link rel="stylesheet" type="text/css"
          href="https://www.abc.net.au/res/sites/news-projects/elections-results-common-responsive/dev-master/styles/election-desktop.css?5"/>
    <div class="page section">
        <div class="header subheader">
            <!--endnoindex-->
            <h1>{{$election->year}} {{$election->electorate}} 
                @if ($election->supplementary_election)
                supplementary election
                @else
                by-election
                @endif</h1>
            <!--noindex-->
            <ul class="nav">
                <li>

                    <a href="/news/elections/mayo-by-election-2018/">

                        <span>{{$election->year}} {{$election->electorate}} 
                            @if ($election->supplementary_election)
                            supplementary election
                            @else
                            by-election
                            @endif</span>

                    </a>
                </li>
                <li>

                    <a href="{{route('elections.index')}}">

                        <span>Elections</span>

                    </a>
                </li>
            </ul>
        </div>
        <!-- A modules - start -->

        <div class="subcolumns">
            <div class="c75l">
                <!-- B modules - start -->
                <div class="section">
                    <div class="election-results" id="electorate" data-ref="OnlineElectorateMAYO" data-dataset="OnlineElectorateMAYO" data-template="electorate" data-sanitiser="OnlineElectorate">
                        <div id="electorate" class="election-results" data-ref="OnlineElectorate" data-dataset="OnlineElectorate" data-template="electorate" data-sanitiser="OnlineElectorate">
                            <div class="prediction">
                                <div class="prediction-profile" style="background-image: url({{$winning->photo_url}})">
                                    <svg id="tick" width="20px" height="20px" viewBox="-1 -1 29 29" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g>
                                                <circle style="fill: {{$winning->party_hex}}" cx="14" cy="14" r="14"></circle>
                                                <path d="M11.8048096,15.3670273 L8.29430575,12.908946 L6,16.1855542 L9.51050386,18.6436354 L9.48590132,18.6787715 L12.7625095,20.9730772 L21.6402809,8.29430575 L18.3636727,6 L11.8048096,15.3670273 Z" fill="#FFFFFF"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                                <div class="prediction-text">
                                    <div class="disclaimer">ABC Prediction</div>
                                    <div class="result">{{$election->abc_prediction}}</div>
                                    <div class="candidate">{{$winning->full_name}}</div>
                                </div>
                                <div class="prediction-data">
                                    <div class="prediction-votes"><strong>VOTES</strong>
                                        <div class="vote-num">
                                            @php
                                            $percentage = $winning->total_votes / $election->counted_votes * 100;
                                            echo(floor($percentage).'%');
                                            @endphp
                                        </div>
                                    </div>
                                    <div class="prediction-swing"><strong>SWING</strong>
                                        <div class="swing-num">+{{$election->swing}}% {{$election->swing_party}}</div>
                                    </div>
                                    <div class="count">
                                        @php
                                            $percentage = $election->counted_votes / $election->electors * 100;
                                                echo(floor($percentage).'%');
                                        @endphp
                                        Counted. Updated {{$election->last_update}}</div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="afterprefs placeholder">
                                <div class="module afterprefs electable">
                                    <table class="ert-table mod-electorate mod-after-pref">
                                        <thead>
                                        <tr class="ert-row">
                                            <th class="ert-column-heading ert-pref-heading" colspan="2">Preference Count
                                            </th>
                                            <th class="ert-column-heading ert-votes-heading">Votes</th>
                                            <th class="ert-column-heading ert-swing-heading">Swing</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($tppcandidates as $c)
                                        <tr class="ert-row">
                                            <td class="ert-bar bar" style="width: 57.5%; background-color: {{$c->party_hex}}"></td>
                                            <td class="ert-column ert-party" style="border-left-color: {{$c->party_hex}}"><span class="short"></span>
                                                <span class="long">{{$c->party_name}}</span></td>
                                            <td class="ert-column ert-candidate"><img src="{{$c->photo_url}}" alt="Rebekha Sharkie">
                                                @if ($c->mp)
                                                    {{$c->full_name}}<span style="background: lightsteelblue; padding: 3px; color: black">MP</span>
                                                @else
                                                    {{$c->full_name}}
                                                @endif
                                            </td>
                                            <td class="ert-column ert-votes">
                                                <div class="num-cell long">{{number_format($c->total_votes)}}</div>
                                                <div class="num-cell">
                                                    @php
                                                    $percentage = $c->total_votes / ($tppcandidates[0]->total_votes + $tppcandidates[1]->total_votes) * 100;
                                                    echo(floor($percentage).'%');
                                                    @endphp
                                                </div>
                                                <div class="bar-graph">
                                                    <div class="bar" style="width: {{$percentage}}%; background-color: {{$c->party_hex}}"></div>
                                                </div>
                                            </td>
                                            <td class="ert-column ert-swing">
                                                <div class="num-cell">{{$c->swing}}%</div>
                                                @if ($c->swing < 0)

                                                    <div class="swing-graph negative">
                                                        <div class="bar" style="width: {{abs($c->swing)}}%; background-color: {{$c->party_hex}}"></div>
                                                    </div>

                                                    <div class="swing-graph positive ">
                                                        <div class="bar hidden" style="width: {{$c->swing}}%; background-color: {{$c->party_hex}}"></div>
                                                    </div>
                                                @else
                                                    <div class="swing-graph negative ">
                                                        <div class="bar hidden" style="width: {{abs($c->swing)}}%; background-color: {{$c->party_hex}}"></div>
                                                    </div>

                                                    <div class="swing-graph positive">
                                                        <div class="bar " style="width: {{$c->swing}}%; background-color: {{$c->party_hex}}"></div>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="results-table-group">
                                <div id="summary" class="module votesaccumulated electable results-table">
                                    <table class="ert-table mod-electorate">
                                        <thead>
                                        <tr class="ert-row">
                                            <th class="ert-column-heading ert-pref-heading" colspan="2">First Preference
                                            </th>
                                            <th class="ert-column-heading ert-votes-heading">Votes</th>
                                            <th class="ert-column-heading ert-swing-heading">Swing</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sortedCandidates as $c)
                                        <tr class="ert-row" style="border-left-color: {{$c->party_hex}}" data-party="CA" data-ballotposition="5">
                                            <td class="ert-bar bar ptyorange" style="width: 44.0%"></td>
                                            <td class="ert-column ert-party" style="border-left-color: {{$c->party_hex}}" data-tvname="Rebekha Sharkie">
                                                <span class="short">CA</span> <span class="long">{{$c->party_name}}</span>
                                            </td>
                                            <td class="ert-column ert-candidate">{{$c->full_name}}</td>
                                            <td class="ert-column ert-votes">
                                                <div class="num-cell long">{{number_format($c->first_preference_votes)}}</div>
                                                <div class="num-cell">
                                                    @php
                                                        $percentage = $c->first_preference_votes / $election->counted_votes * 100;
                                                        echo(floor($percentage).'%');
                                                    @endphp
                                                </div>
                                                <div class="swing-graph positive">
                                                    <div class="bar ptyorange" style="width: {{$percentage}}%; background-color: {{$c->party_hex}}"></div>
                                                </div>
                                            </td>
                                            <td class="ert-column ert-swing">
                                                <div class="num-cell">{{$c->swing}}%</div>
                                                @if ($c->swing < 0)

                                                    <div class="swing-graph negative">
                                                        <div class="bar" style="width: {{abs($c->swing)}}%; background-color: {{$c->party_hex}}"></div>
                                                    </div>

                                                    <div class="swing-graph positive ">
                                                        <div class="bar hidden" style="width: {{$c->swing}}%; background-color: {{$c->party_hex}}"></div>
                                                    </div>
                                                @else
                                                    <div class="swing-graph negative ">
                                                        <div class="bar hidden" style="width: {{abs($c->swing)}}%; background-color: {{$c->party_hex}}"></div>
                                                    </div>

                                                    <div class="swing-graph positive">
                                                        <div class="bar " style="width: {{$c->swing}}%; background-color: {{$c->party_hex}}"></div>
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
                    <div class="election-results" id="electorate" data-ref="OnlineElectorateMAYO" data-dataset="OnlineElectorateMAYO" data-template="electorate" data-sanitiser="OnlineElectorate"></div>
                </div>
                <div class="section">
                    <div class="eg-page eg-electorate article" data-eg-electorate-id="mayo">
                        <p>{{$election->caption}}</p>
                        <div class="btn-group">
                            <a class="btn btn-default" href="#history">History</a>
                            <a class="btn btn-default" href="#polls">Polls</a>
                            <a class="btn btn-default" href="#candidates">Candidates ({{count($candidates)}}) and how-to-votes</a>
                        </div>
                        <h2 id="">Margin</h2>
                        <p>{!! $election->margin_description !!}
                        </p>
                        <h2 id="MP">Date</h2>
                        <p>{!! $election->date_description !!}</p>
                        <h2 id="MP">MP</h2>
                        <p>{!! $election->mp_description !!}
                        </p>
                        <h2>Profile</h2>
                        <p>{!! $election->profile_description !!}</p>
                        <div id="history">
                            <h2 id="Background">History</h2>
                            <p>{!! $election->history_description !!}</p>
                            <h2 id="">Past Election Results</h2>
                            <div>
                                {!! $election->past_results_description !!}
                            </div>
                        </div>
                        <div id="polls">
                            <h2>Enrolment</h2>
                            <p>{{$election->enrolment_description}}</p>
                            <h2>Opinion Polls</h2>
                            <p>{!!html_entity_decode($election->opinion_polls_description)!!}</p>
                        </div>
                        <div id="candidates">
                            <h2>Ballot Paper</h2>
                            <table id="ballotpaper" class="eg-table">
                                <caption>Candidates ({{count($candidates)}}) in Ballot Paper Order</caption>
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
                                    <td class="party" style="border-left: 8px solid {{$c->party_hex}}">{{$c->party_name}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <p>Information, pictures and how-to-vote material for candidates can be sent to /u/Lieselta
                            </p>
                            <h2>Summary of How to Vote Recommendations</h2>
                            <p>{{$election->htv_card_description}}</p>
                            <p>Copies of how-to-vote material can be found in the candidate profiles below.</p>
                            <h2 id="Candidates">Candidates</h2>
                            @foreach($candidates as $c)
                            <div class="eg-electorate-bio">
                                <img src="{{$c->photo_url}}" alt="">
                                <div class="eg-electorate-bio-text">
                                    <h3 id="">{{$c->full_name}}</h3>
                                    <p>{{$c->party_name}}</p>
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

                        <!--<p>Of the 56 polling places used at the 2015 election, the National Party had a majority on first preference votes in 55, recording above 60% of the vote in 45, 70% in 25 and above 80% of the first preference vote in three polling places.</p>
                            <p>The lowest National first preference vote was 44.5% at Gundagai South Public School, the highest 89.0% at Morongla Creek Public School.</p>-->

                    </div>
                </div>
                <!-- B modules - end -->
            </div>
            <div class="c25r sidebar">
                <!-- Sidebar modules - start -->
                <div class="inline-content uberlist nu body-thumbs show-image-icon-doctypes sidebar body transformed">

                    <div class="section module-body">
                        <div data-cmid="5360080" data-cmjson="https://www.abc.net.au/news/ajax/5360080/json"
                             class="list">
                            <div class="doctype-person item" data-image-cmid="4766388" data-cmid="3496478"
                                 data-importance="0" data-first-published="2011-10-11T12:46+1100"
                                 data-last-published="2019-05-07T08:50+1000">
    <span>
        <a href="/news/elections/antony-green/3496478">

	<span class="image" aria-hidden="true">

	<img alt="" src="https://www.abc.net.au/cm/rimage/8667152-1x1-large.jpg?v=4" data-src="/news/image/4766388-1x1-100x100.jpg"
         style="opacity: 1;" width="70" height="70">

	</span>

<span class="title">David Bevan</span><span
                    class="teaserText">David Bevan is the ABC's Chief Elections Analyst.</span></a></span>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="section promo card ">
                    <div class="inner">
                        <h2>


                            <span>Electoral Commissions</span>


                        </h2>
                        <ul>
                            <li><a href="http://www.aec.gov.au/" target="_self" title="">Australia</a></li>
                            <li><a href="http://www.elections.nsw.gov.au/" target="_self" title="">New South Wales</a>
                            </li>
                            <li><a href="http://www.vec.vic.gov.au/" target="_self" title="">Victoria</a></li>
                            <li><a href="http://www.ecq.qld.gov.au/" target="_self" title="">Queensland</a></li>
                            <li><a href="http://www.waec.wa.gov.au/" target="_self" title="">Western Australia</a></li>
                            <li><a href="https://www.ecsa.sa.gov.au/" target="_self" title="">South Australia</a></li>
                            <li><a href="http://www.electoral.tas.gov.au/" target="_self" title="">Tasmania</a></li>
                            <li><a href="http://www.elections.act.gov.au/" target="_self" title="">Australian Capital
                                    Territory</a></li>
                            <li><a href="http://www.ntec.nt.gov.au/Pages/default.aspx" target="_self" title="">Northern
                                    Territory</a></li>
                        </ul>
                    </div>
                </div>

                <div class="section promo">
                    <div class="inner">
                        <h2>


                            <a href="/news/elections/feedback/">


                                <span>Send your feedback</span>


                            </a>
                        </h2>
                        <p>To make a comment or suggest a change to the election site, please&nbsp;<a
                                    href="/news/elections/feedback/" target="_self" title="">contact us</a>.</p></div>
                </div>
                <!-- Sidebar modules - end -->
            </div>
        </div>
    </div>
@endsection
