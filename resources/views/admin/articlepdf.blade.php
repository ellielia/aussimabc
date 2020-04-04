
    <!-- A modules - start -->
    <!-- A modules - end -->
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
                        <img src="{{$article->image_url}}">
                        <a href="#"
                           class="inline-caption">{!! html_entity_decode($article->image_video_caption) !!}
                        </a>
                    </div>
                    @if ($article->key_points)
                        <div class="inline-content wysiwyg right">
                            <div class="inner">
                                {!! html_entity_decode($article->key_points) !!}
                            </div>
                        </div>
                    @endif

                    {!! html_entity_decode($article->content) !!}

                    <p class="topics">
                        <strong>Topics:</strong>
                        {{$article->topics}}

                    </p>
                </div>
                <!-- B modules - end -->
            </div>
        </div>
    </div>