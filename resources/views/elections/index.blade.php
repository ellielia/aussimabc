@extends ('layouts.main')

@section('content')
    <div class="page section">
        <div class="subcolumns">
            <div class="c75l">
                <!-- B modules - start -->
                <div class="article section placed">
                    <p>Election guides by ABC election analyst David Bevan, results, statistics, news and more.</p>
                </div>
                <div class="article-index section no-transform elections">
                    <ul class="article-index">
                        @foreach ($fedelections as $election)
                            <li>
                                <h3>
                                    <a href="{{route('elections.federal.index', $election->slug)}}">{{$election->month}} {{$election->year}} federal election</a>
                                </h3>
                                <a href="{{route('elections.federal.index', $election->slug)}}" class="thumb">
                                    <img src="{{$election->thumbnail}}"
                                         alt="Australia Votes" title="Australia Votes" width="100" height="67">
                                </a>
                                <p><strong>{{$election->polling_day}}</strong> {{$election->caption}}
                                </p>
                            </li>
                        @endforeach
                        <br/>
                        <h2>By-elections</h2>
                        @foreach ($byelections as $election)
                        <li>
                            <h3>
                                <a href="{{route('elections.byelection.index', $election->slug)}}">{{$election->year}} {{$election->electorate}}
                                    @if ($election->supplementary_election)
                                    supplementary election
                                    @else
                                    by-election
                                    @endif
                                </a>
                            </h3>
                            <a href="{{route('elections.byelection.index', $election->slug)}}" class="thumb">
                                <img src="{{$election->thumbnail}}"
                                     alt="Australia Votes" title="Australia Votes" width="100" height="67">
                            </a>
                            <p><strong>{{$election->polling_day}}</strong> {{$election->caption}}
                            </p>
                        </li>
                        @endforeach
                    </ul>
                </div><!-- B modules - end -->
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