@extends('layouts.main')

@section('content')
    <!-- A modules - start -->
    <!-- A modules - end -->
    <div class="page section">

        <div class="subcolumns">
            <div class="c75l">
                <!-- B modules - start -->
                <div class="subcolumns ">
                    <!-- First Half: 66 modules - start -->
                    <div class="c66l">
                        {{-- <a href="/news/australia-votes">
                        <img src="https://cdn.discordapp.com/attachments/422359065209995275/587101693792223244/unknown.png" style="width: 100%;">
                        </a> --}}
                        <div class="inline-content uberlist ng3ts avoid-orphans copyfit-image-ratio dividers default-image-width-160 heading-labels show-teaser-related-doctypes transformed">

                            <div class="section module-body">
                                <ol>
                                <!--doctype-article image-half heading-big image-220w-->
                                @php
                                $articleIterations = 0;
                                @endphp
                                @foreach($articles as $article)
                                    @php
                                    $articleIterations++;
                                    @endphp
                                    <!-- start articles -->
                                        @if ($articleIterations == 1)
                                        <li class="doctype-article image-half heading-big image-220w">
                                            <h3>
                                                <a href="{{route('news.article', ['date' => $article->date, 'article' => $article->slug])}}">{{$article->title}}</a>
                                            </h3>
                                            <a class="image" aria-hidden="true" tabindex="-1"
                                               href="{{route('news.article', ['date' => $article->date, 'article' => $article->slug])}}">
                                                <img alt="" src="{{$article->image_url}}"
                                                     data-src="{{$article->image_url}}" style="opacity: 1;" width="220" height="124">
                                            </a>
                                            <div class="text-container"><p>{{$article->caption}}</p></div>
                                        </li>
                                        @elseif ($articleIterations == 2)
                                        <li class="doctype-article image-full">
                                            <a class="image" aria-hidden="true" tabindex="-1"
                                                href="{{route('news.article', ['date' => $article->date, 'article' => $article->slug])}}">
                                                <img alt="" src="{{$article->image_url}}"
                                                        data-src="{{$article->image_url}}" style="opacity: 1;" width="460" height="259">
                                            </a>
                                            <h3>
                                                <a href="{{route('news.article', ['date' => $article->date, 'article' => $article->slug])}}">{{$article->title}}</a>
                                            </h3>
                                            <div class="text-container"><p>{{$article->caption}}</p></div>
                                        </li>
                                        @else
                                        <li class="doctype-article image-160w">
                                            
                                                <h3>
                                                        <a href="{{route('news.article', ['date' => $article->date, 'article' => $article->slug])}}">{{$article->title}}</a>
                                                    </h3>
                                                <a class="image" aria-hidden="true" tabindex="-1"
                                                    href="{{route('news.article', ['date' => $article->date, 'article' => $article->slug])}}">
                                                    <img alt="" src="{{$article->image_url}}"
                                                            data-src="{{$article->image_url}}" style="opacity: 1;" width="160" height="90">
                                                </a>
                                                <div class="text-container"><p>{{$article->caption}}</p></div>
                                        </li>
                                        @endif
                                    @endforeach
                                </ol>

                            </div>

                            <!-- First Half: 66 modules - end -->
                        </div>
                    </div>
                    <div class="c33r">
                        <div class="inline-content uberlist uberlist-features show-for-national copyfit boxed-card boxed-card-grey teaser-text-small transformed">
                            <div class="section module-heading">
                                <h2>Features</h2>
                            </div>
                            <div class="section module-body">
                                <ol>
                                    @foreach ($features as $f)
                                        <li class="doctype-article" data-image-cmid="8358640" data-cmid="8356008"
                                            data-importance="4" data-first-published="2017-03-18T06:16+1100"
                                            data-last-published="2017-03-18T06:16+1100">
                                            <a href="{{$f->url}}">

                                                <span class="image" aria-hidden="true">
                                                    <img alt="" src="{{$f->image_url}}" data-src="{{$f->image_url}}"
                                                         style="opacity: 1;" width="220" height="124">
                                                </span>
                                                <h3>
                                                    {{$f->text}}
                                                </h3>
                                            </a>
                                        </li>
                                    @endforeach
                                </ol>
                            </div>

                        </div>
                        <!-- Second Half: 33 modules - end -->
                    </div>
                </div>
                <!-- B modules - end -->
            </div>
            <div class="c25r sidebar">
                <!-- Sidebar modules - start -->
                <div class="inline-content uberlist justin more-link copyfit card-box-outer sidebar transformed">

                    <div class="section module-heading">
                        <h2><a href="/news/justin/">Just In</a></h2>
                    </div>
                    <div class="section module-body">
                        <ol>
                            @foreach ($justin as $a)
                                @php
                                    $time = \Carbon\Carbon::create($a->published_at);
                                    $timeago = \Carbon\Carbon::create($a->published_at)->diffForHumans();
                                @endphp
                            <li class="doctype-article" data-last-published="{{$time}}"
                                data-first-published="{{$time}}" >
                                <span class="noprint">{{$timeago}}</span><span class="print">{{$time}}</span>
                                <span>
        <a href="{{route('news.article', ['date' => $a->date, 'article' => $a->slug])}}">{{$a->title}}</a></span>
                            </li>
                            @endforeach
                        </ol>
                        <a class="more-link" href="/news/justin/">More Just In</a></div>

                </div>
                <div class="inline-content uberlist fauxberlist squarethumbs show-social card-box-outer teaser-text-small transformed">
                    <div class="section module-heading">
                        <h2>Popular Now</h2>
                    </div>
                    <div class="section module-body">
                        <ol>
                            @foreach ($popular as $a)
                            <li class="doctype-article trendy trend-soaring" data-cmid="11173362"
                                data-last-published="2019-06-24T22:58:39.000Z"
                                data-first-published="2019-06-24T19:05:55.000Z" data-importance="4"
                                data-image-cmid="11220634">
                                <a href="{{route('news.article', ['date' => $a->date, 'article' => $a->slug])}}">
                                    <span class="image" aria-hidden="true">
                                    <img width="60" height="60" style="opacity: 1;" alt="" src="{{$a->image_url}}"
                                         data-src="{{$a->image_url}}">
                                    </span>
                                    <span class="h3">{{$a->title}}</span>
                                </a>
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
                <style>
                    .card-dark a:link, .card-dark a:visited {
                        text-decoration: none;
                    }

                    .card-dark a:hover {
                        text-decoration: underline;
                    }
                </style>

               {{-- <div class="inline-content uberlist nu body-thumbs show-image-icon-doctypes sidebar body transformed">

                    <div class="section module-heading">
                        <h2><a href="/news/explainers/">News explained</a></h2>
                    </div>
                    <div class="section module-body">
                        <ol data-cmjson="https://www.abc.net.au/news/ajax/8655812/json" data-cmid="8655812">
                            <li class="doctype-article" data-cmid="11240828" data-last-published="2019-06-25T09:47+1000"
                                data-first-published="2019-06-24T17:24+1000" data-importance="4"
                                data-image-cmid="11240794">
    <span>
        <a href="/news/2019-06-24/asean-summit-covers-us-china-rivalry-plastic-pollution-world-cup/11240828">

	<span class="image" aria-hidden="true">

	<img width="70" height="70" alt="" src="" data-src="/news/image/11240794-1x1-100x100.jpg">

	</span>

<span class="title">The leaders of 650 million people met over the weekend — here's what you need to know</span><span
                    class="teaserText"></span></a></span>
                            </li>
                            <li class="doctype-article" data-cmid="11195636" data-last-published="2019-06-23T04:58+1000"
                                data-first-published="2019-06-23T04:58+1000" data-importance="4"
                                data-image-cmid="10865484">
                                <span>
                                    <a href="/news/2019-06-23/united-states-still-the-worlds-only-superpower/11195636">

                                <span class="image" aria-hidden="true">

                                <img width="70" height="70" alt="" src="" data-src="/news/image/10865484-1x1-100x100.jpg">

                                </span>

                                <span class="title">{{$a->title}}</span>
                                        <span class="teaserText"></span>
                                    </a>
                                </span>
                            </li>
                        </ol>
                    </div>

                </div>--}}
                {{--<div class="inline-content uberlist nu body-thumbs show-image-icon-doctypes sidebar body transformed">

                    <div class="section module-heading">
                        <h2><a href="/news/story-streams/">In the news</a></h2>
                    </div>
                    <div class="section module-body">
                        <ol data-cmjson="https://www.abc.net.au/news/ajax/8593118/json" data-cmid="8593118">
                            <li class="doctype-channel" data-cmid="9422496" data-image-cmid="9422666">
    <span>
        <a href="/news/story-streams/banking-royal-commission/">

	<span class="image" aria-hidden="true">

	<img width="70" height="70" alt="" src="" data-src="/news/image/9422666-1x1-100x100.jpg">

	</span>

<span class="title">Banking royal commission</span><span class="teaserText"></span></a></span>
                            </li>
                            <li class="doctype-channel" data-cmid="5514644" data-image-cmid="5488940">
    <span>
        <a href="/news/story-streams/china-power/">

	<span class="image" aria-hidden="true">

	<img width="70" height="70" alt="" src="" data-src="/news/image/5488940-1x1-100x100.jpg">

	</span>

<span class="title">China's inexorable rise as an economic power</span><span class="teaserText"></span></a></span>
                            </li>
                            <li class="doctype-channel" data-cmid="8740876" data-image-cmid="3844430">
    <span>
        <a href="/news/story-streams/murray-darling-basin-plan/">

	<span class="image" aria-hidden="true">

	<img width="70" height="70" alt="" src="" data-src="/news/image/3844430-1x1-100x100.jpg">

	</span>

<span class="title">Murray-Darling Basin Plan</span><span class="teaserText"></span></a></span>
                            </li>
                        </ol>
                    </div>

                </div>--}}
                <div class="section graphic">
                    <a href="http://m.me/abcnews.au?ref=welcomefromABCNewshomepage">
                        <img width="220" height="70" title="Get the headlines to your mobile. NEWS on Messenger."
                             alt="Get the headlines to your mobile. NEWS on Messenger."
                             src="https://web.archive.org/web/20161201094001im_/http://www.abc.net.au/cm/lb/7996774/thumbnail.png">
                    </a>
                </div>
                <div class="news24launcher section">
                    <h2 class="normal"><a href="/news/newschannel/"><img width="172" height="68" alt="ABC News 24"
                                                                         src="https://web.archive.org/web/20161201064707im_/http://www.abc.net.au/cm/lb/5344616/data/news-24-sidebar-launcher-logo-data.jpg"></a>
                    </h2>
                    <p>Around the clock coverage of news events as they break.</p>
                    <a class="abc-news-listen-btn" href="/news/newschannel/"><span title=""
                                                                                   class="abc-icon abc-icon-arrow-right"
                                                                                   data-sheet="arrows"><svg
                                    xmlns="http://www.w3.org/2000/svg"><use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            xlink:href="#sheet-arrows-icon-arrow-right"/></svg></span>
                        Watch Now</a>
                </div>
                <div class="inf-carousel">
                    <div class="inf-car-slides"
                         data-radiostations="/cm/code/5347268/Radio+Stations+List+JSON+v008.js?20190514"><h3
                                class="sr-only">Listen live</h3>
                        <div class="inf-car-arrow inf-prev">&nbsp;</div>
                        <div class="inf-car-arrow inf-next">&nbsp;</div>
                        <div class="previous"><a role="button" aria-label="previous" href="#"></a></div>
                        <div class="next"><a role="button" aria-label="next" href="#"></a></div>
                        <ul role="listbox" style="left: -90px;">
                            <li role="option"><span class="helper"></span> <a
                                        href="//radio.abc.net.au/stations/grandstand/live?play=true" target="_blank"
                                        data-stationtitle="grandstand"><img width="80" height="80"
                                                                            alt="Launch Grandstand. Your home of live sport, news, scores &amp; analysis"
                                                                            src="//www.abc.net.au/res/sites/local/apps/launcher/img/grandstand.png">
                                    <!--[if !IE]><!-->
                                    <div class="logo-overlay">&nbsp;</div><!--<![endif]--></a></li>
                            <li class="selected" role="option"><span class="helper"></span> <a
                                        href="//radio.abc.net.au/stations/local_adelaide/live?play=true" target="_blank"
                                        data-stationtitle="adelaide"><img width="80" height="80"
                                                                          style="width: 100px; height: 100px; display: inline-block;"
                                                                          alt="Launch 891 Adelaide. Your city, your stories. News &amp; sport, talkback &amp; entertainment"
                                                                          src="//www.abc.net.au/res/sites/local/apps/launcher/img/adelaide.png">
                                    <!--[if !IE]><!-->
                                    <div class="logo-overlay" style="width: 100px; height: 100px;">&nbsp;</div>
                                    <!--<![endif]--></a></li>
                            <li role="option"><span class="helper"></span> <a
                                        href="//radio.abc.net.au/stations/news/live?play=true" target="_blank"
                                        data-stationtitle="newsradio"><img width="80" height="80"
                                                                           alt="Launch ABC News Radio. Continuous news, sport &amp; current affairs."
                                                                           src="//www.abc.net.au/res/sites/local/apps/launcher/img/newsradio.png">
                                    <!--[if !IE]><!-->
                                    <div class="logo-overlay">&nbsp;</div><!--<![endif]--></a></li>
                            <li role="option"><span class="helper"></span> <a
                                        href="//radio.abc.net.au/stations/RN/live?play=true" target="_blank"
                                        data-stationtitle="rn"><img width="80" height="80"
                                                                    alt="Launch Radio National. The ideas network. Conversations you should hear every day."
                                                                    src="//www.abc.net.au/res/sites/local/apps/launcher/img/rn.png">
                                    <!--[if !IE]><!-->
                                    <div class="logo-overlay">&nbsp;</div><!--<![endif]--></a></li>
                            <li role="option"><span class="helper"></span> <a
                                        href="//radio.abc.net.au/stations/doublej/live?play=true" target="_blank"
                                        data-stationtitle="doublej"><img width="80" height="80"
                                                                         alt="Launch double j. Playing the best music from your past, present and future"
                                                                         src="//www.abc.net.au/res/sites/local/apps/launcher/img/doublej.png">
                                    <!--[if !IE]><!-->
                                    <div class="logo-overlay">&nbsp;</div><!--<![endif]--></a></li>
                            <li role="option"><span class="helper"></span> <a
                                        href="//radio.abc.net.au/stations/triplej/live?play=true" target="_blank"
                                        data-stationtitle="triplej"><img width="80" height="80"
                                                                         alt="Launch triple j. We love music. New music from your favourite artists"
                                                                         src="//www.abc.net.au/res/sites/local/apps/launcher/img/triplej.png">
                                    <!--[if !IE]><!-->
                                    <div class="logo-overlay">&nbsp;</div><!--<![endif]--></a></li>
                            <li role="option"><span class="helper"></span> <a
                                        href="//radio.abc.net.au/stations/unearthed/live?play=true" target="_blank"
                                        data-stationtitle="unearthed"><img width="80" height="80"
                                                                           alt="Launch triple j unearthed. New Australian music. It's free, it's local and you'll love it"
                                                                           src="//www.abc.net.au/res/sites/local/apps/launcher/img/unearthed.png">
                                    <!--[if !IE]><!-->
                                    <div class="logo-overlay">&nbsp;</div><!--<![endif]--></a></li>
                            <li role="option"><span class="helper"></span> <a
                                        href="//radio.abc.net.au/stations/classic/live?play=true" target="_blank"
                                        data-stationtitle="classic"><img width="80" height="80"
                                                                         alt="Launch Classic FM. Where music lives. Explore the world of classical music"
                                                                         src="//www.abc.net.au/res/sites/local/apps/launcher/img/classic.png">
                                    <!--[if !IE]><!-->
                                    <div class="logo-overlay">&nbsp;</div><!--<![endif]--></a></li>
                            <li role="option"><span class="helper"></span> <a
                                        href="//radio.abc.net.au/stations/classic2/live?play=true" target="_blank"
                                        data-stationtitle="classic2"><img width="80" height="80"
                                                                          alt="Launch Classic 2. Australia's finest musicians<br /> 24/7"
                                                                          src="//www.abc.net.au/res/sites/local/apps/launcher/img/classic2.png">
                                    <!--[if !IE]><!-->
                                    <div class="logo-overlay">&nbsp;</div><!--<![endif]--></a></li>
                            <li role="option"><span class="helper"></span> <a
                                        href="//radio.abc.net.au/stations/country/live?play=true" target="_blank"
                                        data-stationtitle="country"><img width="80" height="80"
                                                                         alt="Launch ABC Country. Distinctively Australian country music"
                                                                         src="//www.abc.net.au/res/sites/local/apps/launcher/img/country.png">
                                    <!--[if !IE]><!-->
                                    <div class="logo-overlay">&nbsp;</div><!--<![endif]--></a></li>
                            <li role="option"><span class="helper"></span> <a
                                        href="//radio.abc.net.au/stations/jazz/live?play=true" target="_blank"
                                        data-stationtitle="jazz"><img width="80" height="80"
                                                                      alt="Launch ABC Jazz. The best in jazz from Australia and around the globe"
                                                                      src="//www.abc.net.au/res/sites/local/apps/launcher/img/jazz.png">
                                    <!--[if !IE]><!-->
                                    <div class="logo-overlay">&nbsp;</div><!--<![endif]--></a></li>
                        </ul>
                    </div>
                    <div class="radio-desc">Your city, your stories. News &amp; sport, talkback &amp; entertainment
                    </div>
                    <div class="radio-lstn">
                        <a title="Launch station adelaide" class="abc-news-listen-btn"
                           href="//radio.abc.net.au/stations/local_adelaide/live?play=true" target="_blank"><span
                                    title="" class="abc-icon abc-icon-arrow-right" data-sheet="arrows"><svg
                                        xmlns="http://www.w3.org/2000/svg"><use
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            xlink:href="#sheet-arrows-icon-arrow-right"/></svg></span> Listen Now</a>
                    </div>
                </div>
                <link href="//www.abc.net.au/res/sites/local/apps/launcher/styles/min/abc.radio.launcher.css?2019-05-10"
                      rel="stylesheet">
                <script src="//www.abc.net.au/res/sites/local/apps/launcher/scripts/min/abc.radio.launcher.js?2019-05-10-1544"></script>
                <script type="text/javascript">
                    $(document).ready(function () {
                        ABC.Radio.infCarousel.init();
                    });
                </script>
                <div class="related">
                    <div class="newsmail-signup card">
                        <h2>News in your inbox</h2>
                        <span class="spiel">Top headlines, analysis, breaking&nbsp;alerts</span>

                        <div class="form main">
                            <form onsubmit="return false;" data-callback="newsmail_mc2015_cb" lpformnum="1">
                                <div class="error-message"></div>
                                <input name="email" class="email" aria-label="Email address" type="email"
                                       placeholder="Email address">
                                <button class="btn btn-primary" type="submit">Sign up</button>
                            </form>
                        </div>
                        <a href="/news/alerts/subscribe/">More info</a>
                    </div>
                </div>
                <div class="connect-with-abc section promo">
                    <h2>Connect with ABC News</h2>
                    <ul>
                        <li>
                            <a title="" href="https://discord.gg/QtDZgQk" target="_self">
                                <span class="valign-helper"></span>
                                <img  height="30"
                                title="ABC on Discord"
                                alt="ABC on Discord"
                                src="https://www.pngkey.com/png/detail/17-179750_discord-icon-discord-logo.png">
                            </a>
                        </li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="section promo">
                    <div class="inner">
                        <h2>


                            <a href="https://about.abc.net.au/how-the-abc-is-run/what-guides-us/abc-editorial-standards/">


                                <span>Editorial Policies</span>

                            </a>
                        </h2>
                        <p><a title=""
                              href="https://about.abc.net.au/how-the-abc-is-run/what-guides-us/abc-editorial-standards/"
                              target="_self">Read about our editorial guiding principles and the enforceable standard
                                our journalists follow.</a></p></div>
                </div>
                <div class="inline-content uberlist uberlist-features border-top teaser-text-small  boxed-card copyfit sidebar transformed">
                    <div class="section module-heading">
                        <h2>Did You Miss?</h2>
                    </div>
                    <div class="section module-body">
                        <ol>
                            @foreach ($didyoumiss as $a)
                            <li class="doctype-article" data-cmid="11209104" data-last-published="2019-06-17T10:19+1000"
                                data-first-published="2019-06-17T04:59+1000" data-importance="4"
                                data-image-cmid="11206272">
                                <a href="{{route('news.article', ['date' => $a->date, 'article' => $a->slug])}}">
                                    <span class="image" aria-hidden="true">
                                        <img width="220" height="124" alt="" src="{{$a->image_url}}" data-src="{{$a->image_url}}">
                                    </span>
                                    <h3>{{$a->title}}</h3>
                                    <p>{{$a->caption}}
                                    </p>
                                </a>
                            </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
                <!-- Sidebar modules - end -->
            </div>
        </div>
    </div>
@endsection