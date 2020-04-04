<!DOCTYPE html>
<!--[if lt IE 7]>
<html lang="en" class="lt-ie9 lt-ie8 lt-ie7">
<![endif]-->
<!--[if IE 7]>
<html lang="en" class="lt-ie9 lt-ie8">
<![endif]-->
<!--[if IE 8]>
<html lang="en" class="lt-ie9">
<![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <title>ABC News (Australian Broadcasting Corporation)</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" />
    <link rel="schema.DCTERMS" href="http://purl.org/dc/terms/" />
    <link rel="schema.iptc" href="urn:newsml:iptc.org:20031010:topicset.iptc-genre:8" />
    <link rel="canonical" data-abc-platform="standard" href="https://www.abc.net.au/news/politics/" />
    <meta name="msapplication-TileImage" content="https://assets.guim.co.uk/images/favicons/023dafadbf5ef53e0865e4baaaa32b3b/windows_tile_144_b.png">
    @if (Request::route() && Request::route()->getName() === "news.article")
        <meta name="author" content="{{$article->author}}">
        <meta name="description" content="{{$article->caption}}">
        <meta name="thumbnail" content="{{$article->image_url}}">
        <meta name="keywords" content="{{$article->topics}}">
        <meta name="news_keywords" content="{{$article->topics}}">
        <meta property="og:url" content="{{route('news.article', ['date' => $article->date, 'article' => $article->slug])}}">
        <meta property="og:image:height" content="700">
        <meta property="og:description" content="{{$article->caption}}">
        <meta property="og:image:width" content="350">
        <meta property="og:image" content="{{$article->image_url}}">
        <meta property="og:type" content="article">
        <meta property="article:section" content="{{$article->category->name}}">
        <meta property="article:published_time" content="{{$article->published_at}}">
        <meta property="og:title" content="{{$article->title}}">
    @endif
    <!--asdd-->
    <!--ssasd-->
    <meta name="ContentId" content="7849224" />
    <meta name="ABC.site" content="ABC News" />
    <meta name="ABC_WCMS_sitesearch_include" content="false" />
    <meta name="twitter:card" content="summary" />
    <meta name="ABC.ContentType" content="CMChannel" />
    <meta name="DC.Publisher.CorporateName" content="Australian Broadcasting Corporation" />
    <meta name="DC.rights" scheme="DCTERMS.URI" content="https://www.abc.net.au/conditions.htm#UseOfContent" />
    <meta name="DC.type" content="Collection" />
    <meta name="DC.creator.CorporateName" content="Australian Broadcasting Corporation" />
    <meta name="DC.format" scheme="DCTERMS.IMT" content="text/html" />
    <meta name="DC.identifier" scheme="DCTERMS.URI" content="{{url("/")}}" />
    <meta property="og:site_name" content="ABC News" />
    <meta name="twitter:site" content="@ABCNews" />
    <meta name="apple-mobile-web-app-title" content="ABC News" />
    <meta property="fb:pages" content="72924719987" />
    <meta property="og:image:height" content="700" />
    <meta property="og:image:width" content="700" />
    <meta property="og:image:type" content="image/jpeg" />
    @if (!empty($data['article']))
        <meta property="og:image" content="{{$article->image_url}}" />
    @else
        <meta property="og:image" content="https://www.abc.net.au/news/linkableblob/8413676/data/abc-news-og-data.jpg" />
    @endif
    <link rel="alternate" data-abc-platform="mobile" media="only screen and (max-width: 640px)" href="https://mobile.abc.net.au/news/politics/" />
    {{--<link media="all" rel="stylesheet" type="text/css" href="https://res.abc.net.au/bundles/2.4.0/styles/abc.bundle.2.4.0.min.css" />

    <!--NOTE--><link rel="stylesheet" type="text/css" href="https://www.abc.net.au/res/sites/news-projects/news-core/1.19.23/desktop.css" />--}}
    <link media="screen, projection" rel="stylesheet" type="text/css" href="https://web.archive.org/web/20170329235928cs_/http://www.abc.net.au/res/bundles/2.0.5/styles/abc.bundle.2.0.5.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://web.archive.org/web/20170329235928cs_/http://www.abc.net.au/res/sites/news/styles/min/abc.news.css?2016-10-31"/>
    <style>
        @font-face {
            font-family:"ProximaNova";
            src:url('http://www.abc.net.au/res/sites/news/fonts/proximanova/proximanova_regular_macroman/Proxima_Nova_Reg-webfont.eot');
            src:url('https://web.archive.org/web/20170318030944im_/http://www.abc.net.au/res/sites/news/fonts/proximanova/proximanova_regular_macroman/Proxima_Nova_Reg-webfont.woff') format('embedded-opentype'),
            url('https://raw.githubusercontent.com/ethereum/ethdev-site/master/public/fonts/Proxima%20Nova%20Reg.woff') format('woff');
            font-weight:normal;
            font-style:normal
        }
        @font-face {
            font-family:"ProximaNova";
            src:url('http://www.abc.net.au/res/sites/news/fonts/proximanova/proximanova_bold_macroman/Proxima_Nova_Bold-webfont.eot');
            src:url('http://www.abc.net.au/res/sites/news/fonts/proximanova/proximanova_bold_macroman/Proxima_Nova_Bold-webfont.eot#iefix') format('embedded-opentype'),
            url('https://raw.githubusercontent.com/ethereum/ethdev-site/master/public/fonts/Proxima%20Nova%20Bold.woff') format('woff');
            font-weight:700;
            font-style:normal
        }
        @font-face {
            font-family:"ProximaNova";
            src:url('http://www.abc.net.au/res/sites/news/fonts/proximanova/proximanova_light_macroman/Proxima_Nova_Light-webfont.eot');
            src:url('http://www.abc.net.au/res/sites/news/fonts/proximanova/proximanova_light_macroman/Proxima_Nova_Light-webfont.eot#iefix') format('embedded-opentype'),
            url('https://raw.githubusercontent.com/ethereum/ethdev-site/master/public/fonts/Proxima%20Nova%20Light.woff') format('woff');
            font-weight:200;
            font-style:normal
        }
        .nav li a {
            text-shadow: none !important;
        }
    </style>

    <link rel="alternate" type="application/rss+xml" title="Just In" href="/news/feed/51120/rss.xml">
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="https://www.abc.net.au/cm/cb/8413652/News+iOS+76x76+2017/data.png" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="https://www.abc.net.au/cm/cb/8413658/News+iOS+120x120+2017/data.png" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="https://www.abc.net.au/cm/cb/8413660/News+iOS+152x152+2017/data.png" />
    <link rel="apple-touch-icon-precomposed" sizes="180x180" href="https://www.abc.net.au/cm/cb/8413674/News+iOS+180x180+2017/data.png" />

    <script type="text/javascript" src="https://www.abc.net.au/res/libraries/jquery/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="https://www.abc.net.au/res/libraries/location/abc.location-1.latest.min.js"></script>
    <script type="text/javascript" src="https://www.abc.net.au/res/bundles/platforms/abc.bundle.platforms-1.0.min.js"></script>
    <script type="text/javascript" src="https://www.abc.net.au/res/sites/news-projects/news-core/1.19.23/desktop.js"></script>
    <script type="text/javascript" src="/cm/code/8724582/abc.news.config-2018-07-11.js" async></script>

    <script>
        window.dataLayer = window.dataLayer || [];
    </script>
    <script>
        window.dataLayer.push({
            'debug': {
                'schemaVersion': '20180315',
            },

            'document': {
                'language': '',
                'canonicalUrl': 'https://www.abc.net.au/news/politics/',
                'contentType': 'channel',
                'uri': 'coremedia://channel/7849224',
                'contentSource': 'coremedia',
                'id': '7849224',

                'pageTitle': 'Politics',

                'title': {

                    'title': 'Politics',

                },

                'siteRoot': {

                    'segment': 'news',

                    'title': 'ABC News',

                },

            },
        })
    </script>
    <script>
        window.dataLayer.push({
            'application': {
                'generatorName': 'WCMS JSP',
                'generatorVersion': '18.10.8.8.0',

                'environment': 'production',

                'wcmsTheme': 'phase1-news',
            }
        })
    </script>
</head>
<body class="platform-standard news">
<!-- Start ABC Bundle Header 2.4.0 (customised - p1) -->
<!--noindex-->
<nav id="abcHeader" class="global" aria-label="ABC Network Navigation" data-resourcebase="https://res.abc.net.au/bundles/2.4.0/" data-scriptsbase="https://res.abc.net.au/bundles/2.4.0/scripts/" data-version="2.4.0">
    {{--<a class="home" href="/" data-mobile="/"><img src="https://res.abc.net.au/bundles/2.4.0/images/logo-abc@2x.png" width="65" height="16" alt="" />ABC Home</a>--}}
    <a class="home" href="/" data-mobile="/"><img src="https://web.archive.org/web/20170228025153im_/http://www.abc.net.au/res/bundles/2.0.5/images/logo-abc@2x.png" width="65" height="16" alt="" />ABC Home</a>
    <div class="sites">
        <a class="controller" href="javascript:;" aria-controls="abcNavSites"><img src="https://res.abc.net.au/bundles/2.4.0/images/icon-menu-grey@1x.gif" data-src="images/icon-menu-grey@1x.gif" data-hover="images/icon-menu-blue@1x.gif" class="icon" alt="" /><span class='text'><span>Open</span> Sites <span>menu</span></span>
        </a>
        <div id="abcNavSites" class="menu" role="menu" aria-expanded="false">
            <ul>
                <li class="odd"><a role="menuitem" href="https://www.abc.net.au/" data-mobile="https://mobile.abc.net.au/">ABC Home</a></li>
                <li><a role="menuitem" href="https://www.abc.net.au/news/" data-mobile="https://mobile.abc.net.au/news/">News</a></li>
                <li class="odd"><a role="menuitem" href="https://iview.abc.net.au" data-mobile="https://iview.abc.net.au">iview</a></li>
                <li><a role="menuitem" href="https://www.abc.net.au/tv/" data-mobile="https://www.abc.net.au/tv/">TV</a></li>
                <li class="odd"><a role="menuitem" href="https://radio.abc.net.au/" data-mobile="https://radio.abc.net.au/">Radio</a></li>
                <li><a role="menuitem" href="https://www.abc.net.au/children/" data-mobile="https://mobile.abc.net.au/children/">Kids</a></li>
                <li class="odd"><a role="menuitem" href="https://shop.abc.net.au/" data-mobile="https://shop.abc.net.au/">Shop</a></li>
                <li><a role="menuitem" class="more" href="https://www.abc.net.au/more/" data-mobile="https://www.abc.net.au/more/">More</a></li>
            </ul>
        </div>
    </div>
    <div class="accounts">
        <!-- Accounts is currently injected due to different URLs --><span data-src="images/icon-user-grey@1x.png" data-hover="images/icon-user-blue@1x.png"></span>
    </div>
    <a class="search" href="https://search.abc.net.au/" data-mobile="https://search.abc.net.au/"><span>Search</span>
        <img src="https://res.abc.net.au/bundles/2.4.0/images/icon-search-grey@1x.png" data-hover="images/icon-search-blue@1x.png" class="icon" alt="" />
    </a>
</nav>
<!--endnoindex-->
<!-- End ABC Bundle Header 2.4.0 (p1) -->
<!--noindex-->
<div class="page_margins">
    @if (\App\Settings::whereId(1)->firstOrFail()->breaking_news_enabled)
    <div class="ticker section noprint lines-2 breaking" id="ticker_content_0">
        <ul>
            <li class="breaking lines-1 show-ticker"><ul>
                    <li style="opacity: 1;"><div class="ticker-type">Breaking news</div>
                        <a href="{{ \App\Settings::whereId(1)->firstOrFail()->breaking_news_href }}" target="_self" title="">{{ \App\Settings::whereId(1)->firstOrFail()->breaking_news_text }}</a></li>
                </ul>
            </li>
        </ul>
    </div>
    @endif
    <div id="header" class="header">
        {{--<div class="brand">
            <a href="/"><img class="print" src="https://www.abc.net.au/cm/lb/8212706/data/news-logo-2017---desktop-print-data.png" alt="ABC News" width="387" height="100" />
                <img class="noprint" src="https://www.abc.net.au/cm/lb/8212704/data/news-logo2017-data.png" alt="ABC News" width="242" height="80" />
            </a>
        </div>--}}
        <div class="brand">
            <a href="/"><img class="print" src="https://web.archive.org/web/20170228025153im_/http://www.abc.net.au/cm/lb/5340830/data/news-logo-data.png" alt="ABC News" width="387" height="100" />
                <img class="noprint" src="https://web.archive.org/web/20170228025153im_/http://www.abc.net.au/cm/lb/5340830/data/news-logo-data.png" alt="ABC News" width="242" height="80" />
            </a>
        </div>
        <a href="/news/australia/" class="location-widget">Australia</a><a href="/news/weather/" class="weather-widget">Weather</a>
    </div>
    <div id="nav" class="nav">
        <ul id="primary-nav">
            <li id="n-news" class="{{Request::is('news') ? 'active' : ''}}"><a href="/">News Home</a></li>
            @php
                $articleCategories = \App\ArticleCategory::all()->sortBy('order');
            @endphp
            @foreach ($articleCategories as $category)
                @if ($category->show_on_nav)
                <li id="n-{{$category->id}}" class="
                @php
                if (Request::is('news/'.$category->slug) || Request::is('news/'.$category->slug.'/*')) {
                    echo('active');
                }
                else {
                    if (Route::currentRouteName() == 'news.article')
                    {
                        if ($article->category_id == $category->id) { echo('active'); }
                    }
                }
                @endphp
                "><a href="{{route('news.category', $category->slug)}}">{{$category->name}}</a></li>
                @endif
            @endforeach
            <li id="n-other" class="
                @php
                if (Request::is('news/other') || Request::is('news/other/*')) {
                    echo('active');
                }
            @endphp
            "><a href="{{route('news.other')}}">Other</a>
            </li>
        </ul>
    </div>
    <main>
        @yield('content')
    </main>
    <!-- C modules - start -->
    <!-- C modules - end -->
    <div id="footer" class="page section">
        <!-- program footer-->
        <div class="subcolumns">
            <div id="sitemap" class="c75l">
                <div class="section">
                    <h2>Site Map</h2>
                </div>
                <div class="subcolumns">
                    <div class="c16l">
                        <div class="section">
                            <h3>Sections</h3>
                            <ul class="nav">
                                <li>
                                    <a href="//">
                                        <span>ABC News</span>
                                    </a>
                                </li>
                                @foreach ($articleCategories as $category)

                                    <li>
                                    <a href="{{route('news.category', $category->slug)}}">
                                        <span>{{$category->name}}</span>
                                    </a>

                                    </li>
                                @endforeach
                                <li>
                                    <a href="{{route('elections.index')}}">
                                        <span>ABC Elections</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="c16l">
                        <div class="section">
                            <h3>Local Weather</h3>
                            <ul class="nav">
                                <li>
                                    <a href="https://www.abc.net.au/sydney/weather/">
                                        <span>Sydney Weather</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.abc.net.au/melbourne/weather/">
                                        <span>Melbourne Weather</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.abc.net.au/adelaide/weather/">
                                        <span>Adelaide Weather</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.abc.net.au/brisbane/weather/">
                                        <span>Brisbane Weather</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.abc.net.au/perth/weather/">
                                        <span>Perth Weather</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.abc.net.au/hobart/weather/">
                                        <span>Hobart Weather</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.abc.net.au/darwin/weather/">
                                        <span>Darwin Weather</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.abc.net.au/canberra/weather/">
                                        <span>Canberra Weather</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="c16l">
                        <div class="section">
                            <h3>Local News</h3>
                            <ul class="nav">
                                <li>
                                    <a href="https://www.abc.net.au/sydney/news/">
                                        <span>Sydney News</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.abc.net.au/melbourne/news/">
                                        <span>Melbourne News</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.abc.net.au/adelaide/news/">
                                        <span>Adelaide News</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.abc.net.au/brisbane/news/">
                                        <span>Brisbane News</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.abc.net.au/perth/news/">
                                        <span>Perth News</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.abc.net.au/hobart/news/">
                                        <span>Hobart News</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.abc.net.au/darwin/news/">
                                        <span>Darwin News</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.abc.net.au/canberra/news/">
                                        <span>Canberra News</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="c16l">
                        <div class="section">
                            <h3>Media</h3>
                            <ul class="nav">
                                <li>
                                    <a href="/news/video/">
                                        <span>Video</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/news/audio/">
                                        <span>Audio</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/news/photos/">
                                        <span>Photos</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="c16l">
                        <div class="section">
                            <h3>Subscribe</h3>
                            <ul class="nav">
                                <li>
                                    <a href="/news/feeds/">
                                        <span>Podcasts</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/news/alerts/">
                                        <span>NewsMail</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="c16l">
                        <div class="section">
                            <h3>Connect</h3>
                            <ul class="nav">
                                <li>
                                    <a href="/news/upload/">
                                        <span>Upload</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/news/contact/">
                                        <span>Contact Us</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- right section-->
            <div class="c25r">
                <div id="fineprint" class="section">
                    <p>
                        <small>This service may include material from Agence France-Presse (AFP), APTN, Reuters, AAP, CNN and the BBC World Service which is copyright and cannot be reproduced.</small>
                    </p>
                    <p>
                        <small>AEDT = Australian Eastern Daylight Savings Time which is 11 hours ahead of GMT (Greenwich Mean Time)</small>
                    </p>
                </div>
            </div>
        </div>
        <div class="platforms">
            <a href="https://mobile.abc.net.au/news/politics/?pfm=sm" class="platform-mobile switch">Change to mobile view</a>
        </div>
    </div>
    <!-- End footer -->
</div>
<!-- Start Webtrends -->
<div class="hide">
</div>
<!-- End Webtrends -->
<!--endnoindex-->
<!--Global footer-->
<!-- Start ABC Bundle Footer 2.4.0 (customised - p1) -->
<!--noindex-->

<div style="padding: 20px; background: black; color: white; font-family: 'ABCSans'; text-align: center;">
    <span>Please note that this is a parody of the ABC website for /r/AustraliaSim. This site is not endorsed by the ABC in any way.</span><br/>
    <b>ALL EVENTS DEPICTED ARE ENTIRELY WORKS OF FICTION. ALL CORRELATION TO REAL WORD EVENTS ARE COINCIDENTAL. THE MAINTAINERS OF THIS SITE TAKE NO RESPONSIBILITY FOR HARM CAUSED BY USE OF THE CONTENT.</b>
</div>
<nav id="abcFooter" class="global" aria-label="ABC Footer Navigation" data-version="2.4.0">
    <ul>
        <li><a href="https://about.abc.net.au/terms-of-use/">Terms of Use</a></li>
        <li><a href="https://about.abc.net.au/abc-privacy-policy/">Privacy Policy</a></li>
        <li><a href="https://about.abc.net.au/accessibility-statement/">Accessibility</a></li>
        <li><a href="https://about.abc.net.au/talk-to-the-abc/">Contact the ABC</a></li>
        <li><a href="/admin">Admin</a></li>
        <li><a href="https://about.abc.net.au/terms-of-use/#UseOfContent">ABC Resources used are &copy; <time>2019</time> ABC</a></li>
        <li>
        </li>
    </ul>
</nav>

<!-- ABC.Bundle Scripts -->
<!-- End ABC.Bundle Scripts -->
<!-- Nielsen Online SiteCensus V6.0 -->
<!-- COPYRIGHT 2010 Nielsen Online -->
<noscript>
    <div><img src="//secure-au.imrworldwide.com/cgi-bin/m?ci=abc-aust&cg=0&cc=1&ts=noscript" width="1" height="1" alt=""></div>
</noscript>
<!-- End Nielsen Online SiteCensus V6.0 -->
<!-- Google Tag Manager -->
<script type="text/javascript">
    // <![CDATA[
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            '//www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-PB2GX');
    // ]]>
</script>
<noscript>
    <iframe src="//www.googletagmanager.com/ns.html?id=GTM-PB2GX" height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager -->
<!-- ABC MyLogin -->
<script type="text/javascript">
    ABC.MyLoginEmbedded.init();
</script>
<!-- End ABC MyLogin -->
<!--endnoindex-->
<!-- End ABC Bundle Footer 2.4.0 (customised - p1) -->
<!--end global footer-->
</body>
</html>
