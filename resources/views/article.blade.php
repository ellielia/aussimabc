@extends('layouts.main')

@section('content')
    <!-- A modules - start -->
    <!-- A modules - end -->
    <div class="header subheader">
        <!--endnoindex-->

        <h1 @if ($article->category->bg_url)style="color: white" @endif>{{$article->category->name}}</h1>
        <!--noindex-->
        <ul class="nav">
            <li>
                <a @if ($article->category->bg_url)style="color: white" @endif href="{{route('news.category', $article->category->slug)}}">
                    <span>{{$article->category->description}}</span>
                </a>
            </li>
        </ul>
    </div>
    @if ($article->category->bg_url)
    <style>
        #container_subheader {
            background-image: url({{$article->category->bg_url}}); background-size: cover; background-repeat: repeat;
        }
    </style>
    @endif
    <div class="page section">
        <div class="subcolumns">
            <div class="c75l">
                <!-- B modules - start -->
                <div class="article section">
                    <!--endnoindex-->
                    <h1 id="skip-to-content-heading">{{$article->title}}</h1>
                    <div class="byline">
                        @if ($article->publication_tag)
                        <div class="bylinepromo">
                            <a href="#">{{$article->publication_tag}}</a>
                        </div>
                        @endif
                        By {{$article->author}}
                    </div>
                    <p class="published">
                        <span class="timestamp" ts="{{$article->published_at}}"><span class="noprint">Published {{$article->published_at}}</span><span class="print">{{$article->published_at}}</span></span>
                    </p>
                    <div class="media-wrapper-dl inline-content video full video-16x9"
                         data-uri="coremedia://video/11121512">
                        @if ($article->youtube_url === null)
                        <img style="max-height: 350px; width: 700px;" src="{{$article->image_url}}">
                        @else
                            <iframe style="max-height: 350px; width: 700px;"
                                    src="https://www.youtube.com/embed/{{$article->youtube_url}}">
                            </iframe>
                        @endif
                            <a href="#"
                           class="inline-caption">{!! html_entity_decode($article->image_video_caption) !!}
                        </a>
                    </div>
                    @if (count($article->related) >= 1)
                    <div class="attached-content">
                        @foreach ($article->related as $relatedArticle)
                        <div class="inline-content story left">
                            <a href="{{route('article.view', ['category_id' => $relatedArticle->relation()->category->id, 'article_id' => $relatedArticle->relation()->id])}}"><strong>Related
                                    Story:</strong>
                                {{$relatedArticle->relation()->title}}</a>
                        </div>
                        @endforeach
                    </div>
                    @endif
                    @if ($article->key_points)
                        <div class="inline-content wysiwyg right">
                            <div class="inner">
                                <h2>Key points:</h2>
                                {!! html_entity_decode($article->key_points) !!}
                            </div>
                        </div>
                    @endif

                    {!! html_entity_decode($article->content) !!}

                    <p class="topics">
                        <strong>Topics:</strong>
                        {!! html_entity_decode($article->topics) !!}
                    </p>
                </div>
                <!-- B modules - end -->
            </div>
        </div>
    </div>
@endsection