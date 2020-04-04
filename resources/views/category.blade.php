@extends('layouts.main')

@section('content')
    <div class="header subheader">
        <!--endnoindex-->

        <h1 @if ($category->bg_url)style="color: white" @endif>{{$category->name}}</h1>
        <!--noindex-->
        <ul class="nav">
            <li>
                <a @if ($category->bg_url)style="color: white" @endif href="{{route('news.category', $category->slug)}}">
                    <span>{{$category->description}}</span>
                </a>
            </li>
        </ul>
    </div>
    @if ($category->bg_url)
    <style>
        #container_subheader {
            background-image: url({{$category->bg_url}}); background-size: cover; background-repeat: repeat;
        }
    </style>
    @endif
    <!-- A modules - start -->
    <!-- A modules - end -->
    <div class="page section">
        <div class="subcolumns">
            <div class="c75l">
                <!-- B modules - start -->
                <div class="subcolumns ">
                    <!-- First Half: 66 modules - start -->
                    <div class="inline-content uberlist ng3ts avoid-orphans copyfit-image-ratio dividers default-image-width-160 heading-labels new-content-check show-teaser-related-doctypes accessible-module-heading">
                        <div class="section module-heading">
                            <h2>{{$category->name}}</h2>
                        </div>

                        <div class="section module-body">
                            <ol>
                                @foreach($articles as $article)
                                <!-- start articles -->
                                    <li class="doctype-article image-half heading-big image-220w">
                                        <h3>
                                            <a href="{{route('news.article', ['date' => $article->date, 'article' => $article->slug])}}">{{$article->title}}</a>
                                        </h3>
                                        <a class="image" aria-hidden="true" tabindex="-1" href="{{route('news.article', ['date' => $article->date, 'article' => $article->slug])}}">
                                            <img alt="" src="{{$article->image_url}}" data-src="{{$article->image_url}}" style="opacity: 1;" width="220" height="124">
                                        </a>
                                        <div class="text-container"><p>{{$article->caption}}</p></div>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                        <!-- First Half: 66 modules - end -->
                    </div>
                </div>
                <!-- B modules - end -->
            </div>
            <div class="c25r sidebar" hidden>
                <!-- Sidebar modules - start -->
                <div class="inline-content uberlist nu body-thumbs show-image-icon-doctypes copyfit sidebar">
                    <div class="section module-heading">
                        <h2><a href="/news/elections/blog/">Antony Green&#039;s Election Blog</a></h2>
                    </div>
                    <div class="section module-body">
                        <li class="doctype-article" data-image-cmid="" data-cmid="10503884" data-importance="0" data-first-published="2018-11-16T10:59+1100" data-last-published="2018-11-16T15:58+1100">
                                       <span>
                                       <a href="/news/2018-11-16/the-best-way-to-vote-in-the-victorian-legislative-council-elect/10503884">How to Vote for the Victorian Legislative Council</a></span>
                            <p>How to vote in the Victorian Legislative Council and keep control of your preferences</p>
                        </li>
                        <li class="doctype-article" data-image-cmid="" data-cmid="10483188" data-importance="0" data-first-published="2018-11-09T21:27+1100" data-last-published="2018-11-09T21:27+1100">
                                       <span>
                                       <a href="/news/2018-11-09/summary-of-candidates-and-parties-contesting-the-2018-victorian/10483188">Candidates by Party for 2018 Victorian Election</a></span>
                            <p>Summary of the candidates and parties contesting the 2018 Victorian election</p>
                        </li>
                        <li class="doctype-article" data-image-cmid="" data-cmid="10446090" data-importance="0" data-first-published="2018-11-05T12:30+1100" data-last-published="2018-11-05T13:44+1100">
                                       <span>
                                       <a href="/news/2018-11-05/why-the-results-in-wentworth-narrowed/10446090">Why the Results in Wentworth Narrowed</a></span>
                            <p>Despite Kerryn Phelps appearing the clear winner of the Wentworth by-election on election night, victory looked less certain twelve hours later after a dramatic narrowing of her lead.</p>
                        </li>
                        </ol>
                    </div>
                </div>
                <div class="inline-content uberlist quote-bubble byline-image avoid-orphans sidebar">
                    <div class="section module-heading">
                        <h2><a href="/news/analysis-and-opinion/">Analysis</a></h2>
                    </div>
                    <div class="section module-body">
                        <ol data-cmid="9054230" data-cmjson="https://www.abc.net.au/news/ajax/9054230/json" data-volume='{"dc": "."}'>
                            <li class="doctype-article" data-image-cmid="8781424" data-cmid="10862568" data-importance="4" data-first-published="2019-03-01T19:20+1100" data-last-published="2019-03-02T07:37+1100">
                                <h3>
                                    <a href="/news/2019-03-01/christopher-pyne-legacy-art-of-politics-annabel-crabb/10862568?section=politics">Pyne&#039;s legacy</a>
                                </h3>
                                <p>Mischievous, literate, garrulous, politically merciless and possessed of a not-insignificant personal charm, Christopher Pyne is a character whose departure will sap the Parliament of significant colour.</p>
                                <p class="byline">
                                    By <a href="/news/annabel-crabb/167108?section=politics" target="_self" title="">Annabel Crabb</a>
                                </p>
                            </li>
                            <li class="doctype-article" data-image-cmid="9605038" data-cmid="10834944" data-importance="4" data-first-published="2019-02-21T18:19+1100" data-last-published="2019-02-21T23:05+1100">
                                <h3>
                                    <a href="/news/2019-02-21/julie-bishop-to-walk-away-from-canberra-as-the-ultimate-survivor/10834944?section=politics">Bishop the ultimate survivor</a>
                                </h3>
                                <p>From China to MH17 to her ill-fated run for the prime ministership, Julie Bishop has outlasted and outperformed most of her contemporaries, all while cutting a quiet but respected figure.</p>
                                <p class="byline">
                                    By <a href="/news/philip-williams/166876?section=politics" target="_self" title="">Philip Williams</a>
                                </p>
                            </li>
                            <li class="doctype-article" data-image-cmid="8365586" data-cmid="10805252" data-importance="4" data-first-published="2019-02-12T22:23+1100" data-last-published="2019-02-13T14:21+1100">
                                <h3>
                                    <a href="/news/2019-02-12/bill-shorten-inflicted-a-historic-humiliation-on-scott-morrison/10805252?section=politics">Shorten&#039;s gamble</a>
                                </h3>
                                <p>Beneath Bill Shorten's legislative victory in the name of humanitarianism lies a gamble that the boats won't start up again. If they do, the Coalition will castigate the Labor leader.</p>
                                <p class="byline">
                                    By <a href="/news/andrew-probyn/8259322?section=politics" target="_self" title="">Andrew Probyn</a>
                                </p>
                            </li>
                            <li class="doctype-article" data-image-cmid="10708528" data-cmid="10805364" data-importance="4" data-first-published="2019-02-13T06:14+1100" data-last-published="2019-02-13T09:57+1100">
                                <h3>
                                    <a href="/news/2019-02-13/analysis-medical-transfers-bill-rhetoric/10805364?section=politics">Walking both sides of the street</a>
                                </h3>
                                <p>While Scott Morrison was indifferent towards the medical evacuation bill, his senior lieutenants claim it threatens to tear at the very fabric of the nation.</p>
                                <p class="byline">
                                    By <a href="/news/matthew-doran/5511636?section=politics" target="_self" title="">Matthew Doran</a>
                                </p>
                            </li>
                            <li class="doctype-article" data-image-cmid="10582626" data-cmid="10807922" data-importance="4" data-first-published="2019-02-13T16:10+1100" data-last-published="2019-02-14T05:39+1100">
                                <h3>
                                    <a href="/news/2019-02-13/asylum-seekers-labor-hefty-political-gamble/10807922?section=politics">Backed into a corner, Morrison has gone nuclear</a>
                                </h3>
                                <p>On this issue Labor has always been on the backfoot — it knows it and under Bill Shorten has been shrewd in carefully avoiding being trapped talking about it. But Morrison's government has problems of its own.</p>
                                <p class="byline">
                                    By <a href="/news/patricia-karvelas/6086082?section=politics" target="_self" title="">Patricia Karvelas</a>
                                </p>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- Sidebar modules - end -->
            </div>
        </div>
    </div>
@endsection