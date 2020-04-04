<html class="ert-frame" lang="en-AU">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Election Results</title>
    <link rel="stylesheet" href="https://www.abc.net.au/res/sites/news/styles/min/abc.news.css">
</head>
<body>
@php
    $majper = $election->majority / $election->party_bars_cap * 100;
@endphp
<div class="election-results" data-dataset="OnlinePartyGroupTrends" data-sanitiser="OnlinePartyGroupTrends"
     data-template="overall-2pp">
    <div id="ert-results-overview" class="election-results" data-template="overall-2pp"
         data-ref="OnlinePartyGroupTrends" data-sanitiser="OnlinePartyGroupTrends"><a class="ert-overall-link"
                                                                                      target="_top"
                                                                                      href="/news/elections/vic-election-2018/results/">
        <div class="ert-overall-container">
            <div class="ert-overall-meta">
                @php
                    echo(floor($election->counted_votes / $election->electors * 100))."%";
                @endphp
                COUNTED ({{$election->last_update}}).
                <div class="meta-seats">
                    @php
                    $indoubt = \App\Electorate::where('decided', false)->get();
                    echo(count($indoubt));
                    @endphp
                    in doubt. <span class="to-win" style="left: {{$majper}}%">{{$election->majority}} to win</span></div>
            </div>
            <div class="ert-overall-data">
                <div class="ert-overall-party-container">
                    @php
                    $barparties = \App\FederalElectionParty::where('show_on_bars', true)->get();
                    $nobarparties = \App\FederalElectionParty::where('show_on_bars', false)->get();
                    $otherseats = 0;
                    foreach ($nobarparties as $p) {
                        $seats = \App\Electorate::where('winning_party', $p->id)->get();
                        $otherseats = $otherseats + count($seats);
                    }
                    $otherpercent = $otherseats / $election->party_bars_cap * 100;
                     if ($otherpercent < 10) {
                                $otherpercent = 10;
                            }
                    @endphp
                    @foreach ($barparties as $party)
                        @php
                            $seats = \App\Electorate::where('winning_party', $party->id)->get();
                            $percent = count($seats) / $election->party_bars_cap * 100;
                            if ($percent < 10) {
                                //$percent = 10;
                            }
                        @endphp
                    <div class="ert-overall-party">
                        <div class="ert-overall-marker" style="left: {{$majper}}%"></div>
                        <div class="ert-overall-bar ptyblue" style="background-color: {{$party->hex}}; max-width: {{$percent}}%; min-width: {{$percent}}%;">
                            <div class="party">{{$party->code}}</div>
                            <div class="seats">
                                {{count($seats)}}
                            </div>
                        </div>
                        <div class="ert-overall-extra-bar"></div>
                    </div>
                    @endforeach
                    <div class="ert-overall-party">
                        <div class="ert-overall-marker" style="left: {{$majper}}%"></div>
                        <div class="ert-overall-bar ptyblack" style="max-width: {{$otherpercent}}%; min-width: {{$otherpercent}}%;">
                            <div class="party">OTH</div>
                            <div class="seats">
                                {{$otherseats}}
                            </div>
                        </div>
                        <div class="ert-overall-extra-bar"></div>
                    </div>
                </div>
            </div>
        </div>
    </a></div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.6.0/underscore-min.js"></script>
<link rel="stylesheet" href="https://www.abc.net.au/res/sites/news-projects/elections-results-common-responsive/dev-vic-2018/styles/election-desktop.css">
<script src="scripts/date.js"></script>
<script id="config-script" src="https://www.abc.net.au/cm/code/9949282/Settings-v4.js"></script>
<script id="live-script" src="scripts/live.js"></script>

<script>
    if (!window.ABC) window.ABC = {};
    if (!ABC.News) ABC.News = {};

    var qp = location.search.substr(1).split("&") || [];
    var params = {};
    for (var i = 0; i < qp.length; ++i) {
        if (!qp[i]) continue;
        var s = qp[i].split("=");
        params[s[0]] = s[1];
    }

    if (!params.config) throw new Error("No config file specified.");

    var origin = 'https://www.abc.net.au';
    if (document.referrer && document.referrer.indexOf('nucwed') !== -1) {
        origin = 'http://nucwed.aus.aunty.abc.net.au';
    }
    var src = origin + params.config;

    // load the config script, then the live script
    var configScript = document.getElementById("config-script");
    var liveScript = document.getElementById("live-script");
    configScript.onload = function () {
        liveScript.setAttribute("src", "scripts/live.js");
    };
    configScript.setAttribute("src", src);
</script>


</body>
</html>