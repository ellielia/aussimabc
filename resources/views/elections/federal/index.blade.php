@extends ('layouts.noheader')
<link rel="stylesheet" href="https://www.abc.net.au/res/sites/news/styles/min/abc.news.css">
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
                    <h1>{{$election->caption}}</h1>

                    <div class="inline-content uberlist uberlist-features grid grid-220 clear-3 teaser-text-small show-image-icon-doctypes image-space full transformed">
                        <div class="section module-body">
                            <ol data-cmid="9948500" data-cmjson="https://www.abc.net.au/news/ajax/9948500/json">
                                <li class="doctype-channel" data-image-cmid="9948482" data-cmid="9949194">
                                    <a href="{{route('elections.federal.electorates', $election->slug)}}">
                                        <span class="image" aria-hidden="true">
                                        <img alt="" src="https://www.abc.net.au/news/image/9948482-16x9-220x124.png" data-src="/news/image/9948482-16x9-220x124.jpg"
                                             style="opacity: 1;" width="220" height="124">
                                        </span>
                                        <h3>Electorates</h3>
                                    </a>
                                </li>
                                <li class="doctype-channel" data-image-cmid="9948482" data-cmid="9949194">
                                    <a href="#">
                                        <span class="image" aria-hidden="true">
                                        <img alt="" src="https://www.abc.net.au/news/image/10465450-16x9-220x124.jpg" data-src="/news/image/9948482-16x9-220x124.jpg"
                                             style="opacity: 1;" width="220" height="124">
                                        </span>
                                        <h3>Senate</h3>
                                    </a>
                                </li>
                                <li class="doctype-channel" data-image-cmid="9948482" data-cmid="9949194">
                                    <a href="{{route('elections.federal.candidates', $election->slug)}}">
                                        <span class="image" aria-hidden="true">
                                        <img alt="" src="https://www.abc.net.au/news/image/9948478-16x9-220x124.jpg" data-src="/news/image/9948482-16x9-220x124.jpg"
                                             style="opacity: 1;" width="220" height="124">
                                        </span>
                                        <h3>Candidates</h3>
                                    </a>
                                </li>
                                <li class="doctype-channel" data-image-cmid="9948482" data-cmid="9949194">
                                    <a href="{{route('elections.federal.retiringmps', $election->slug)}}/">
                                        <span class="image" aria-hidden="true">
                                        <img alt="" src="https://www.abc.net.au/news/image/9948488-16x9-220x124.jpg" data-src="/news/image/9948482-16x9-220x124.jpg"
                                             style="opacity: 1;" width="220" height="124">
                                        </span>
                                        <h3>Retiring MPs</h3>
                                    </a>
                                </li>
                               {{-- <li class="doctype-channel" data-image-cmid="9948482" data-cmid="9949194">
                                    <a href="/news/elections/vic-election-2018/guide/electorates/">
                                        <span class="image" aria-hidden="true">
                                        <img alt="" src="https://www.abc.net.au/news/image/9948490-16x9-220x124.jpg" data-src="/news/image/9948482-16x9-220x124.jpg"
                                             style="opacity: 1;" width="220" height="124">
                                        </span>
                                        <h3>Key Seats</h3>
                                    </a>
                                </li>--}}
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection