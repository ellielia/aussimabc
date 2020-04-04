@extends('layouts.admin')

@section('content')
    <h3>Article: {{$article->title}}</h3>
    <hr>
    <div class="btn-toolbar" role="toolbar">
        <div class="btn-group mr-2" role="group">
            <a role="button" target="_blank" href="{{route('news.article', ['date' => $article->date, 'article' => $article->slug])}}" class="btn btn-sm btn-outline-primary">View public formatted version</a>
            <a role="button" href="{{route('admin.article.json', $article->id)}}" class="btn btn-sm btn-outline-primary">Download as JSON</a>
            <a role="button" href="{{route('admin.article.pdf', $article->id)}}" class="btn btn-sm btn-outline-primary">Download as PDF</a>
        </div>
        <div class="btn-group mr-2" role="group">
            <button type="button" class="btn btn-sm btn-outline-danger">Delete article</button>
        </div>
    </div>
    <i class="fa fa-eye"></i> {{$article->views}} views&nbsp;|&nbsp;
    <i class="fa fa-calendar"></i> Published {{$article->published_at}}&nbsp;|&nbsp;
    <i class="fa fa-pencil-alt"></i> Last edited {{$article->last_edited_at}}
    <hr class="my-2"/>
    <form>
        <h3>Metadata</h3>
        <div class="form-group">
            <h5>Title</h5>
            <input name="title" type="text" value="{{$article->title}}" class="form-control">
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <h5>Category</h5>
                    <select value="{{$article->category->id}}" class="form-control" id="exampleFormControlSelect1">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <h5>Author</h5>
                    <small>Use <code>&lt;b&gt;text&lt;/b&gt;</code> to bolden names.</small>
                    <input name="author" type="text" value="{{$article->author}}" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h5>Attribution</h5>
                <small>Use if article sourced externally</small>
                <input name="publication_tag" type="text" value="{{$article->publication_tag}}" class="form-control">
            </div>
            <div class="col">
                <h5>Publication status</h5>
                <div class="form-check">
                    <input name="private" type="checkbox" checked="{{$article->private}}" class="form-check-input">
                    <label class="form-check-label">Public</label>
                </div>
            </div>
        </div>
        <hr>
        <h3>Main image</h3>
        <div class="row">
            <div class="col">
                <h5>Image URL</h5>
                <input name="image_url" type="url" value="{{$article->image_url}}" class="form-control">
            </div>
            <div class="col">
                <h5>YouTube Video URL</h5>
                <input name="youtube_url" type="url" value="{{$article->youtube_url}}" class="form-control">
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col">
                <h5>Image/video caption</h5>
                <input name="image_video_caption" type="text" value="{{$article->image_video_caption}}" class="form-control">
            </div>
        </div>
        <hr/>
        <h3>Article content</h3>
        <h5>Caption</h5>
        <input name="caption" type="text" value="{{$article->caption}}" class="form-control">
        <br/>
        <h5>Key Points</h5>
        <textarea name="key_points" class="form-control" id="keyPoints">{{$article->key_points}}</textarea>
        <h5>Main content</h5>
        <textarea name="content" class="form-control" id="mainContent">{{$article->content}}</textarea>
        <h5>Topics</h5>
        <input name="topics" type="text" value="{{$article->topics}}" class="form-control">
        <hr>
        <h3>Related articles</h3>
        TBD
        <hr>
        <div>
            <a name="test"></a>
            <a href="#test" role="button" id="saveButton" onclick="saveChanges()" class="btn btn-primary">Save</a>
        </div>
        <br/>
        <div>
            <div id="returnMsg" class="alert invisible">Test</div>
        </div>
    </form>
    <script>
        $(document).ready(function() {
            $('.table').DataTable();
        } );

        function saveChanges() {
            $('#saveButton').addClass('disabled');
            let title = $('input[name=title]').val();
            let category_id = $('#category_id').prop('selectedIndex');
            let caption = $('input[name=caption]').val();
            let author = $('input[name=author]').val();
            let publication_tag = $('input[name=publication_tag]').val();
            let image_url = $('input[name=image_url]').val();
            let youtube_url = $('input[name=youtube_url]').val();
            let image_video_caption = $('input[name=image_video_caption]').val();
            let content = $('textarea[name=content]').val();
            let key_points = $('textarea[name=key_points]').val();
            let topics = $('input[name=topics]').val();
            let private = $('input[name=private]').prop('checked');
            let privateInt = null;
            if (private == 'true') {
                privateInt = 1;
            } else {
                privateInt = 0;
            }
            console.log(private);
            $.ajax({
                type:'POST',
                url:'{{route('admin.article.edit', $article->id)}}',
                data: {
                  title: title,
                  category_id: category_id,
                  caption: caption,
                  author: author,
                  publication_tag: publication_tag,
                  image_url: image_url,
                  youtube_url: youtube_url,
                  image_video_caption: image_video_caption,
                  content: content,
                  key_points: key_points,
                  topics: topics,
                  private: privateInt
                },
                dataType: 'json',
                headers:
                    {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                success:function(data) {
                    $('#saveButton').removeClass('disabled');
                    $('#returnMsg').removeClass('invisible').addClass('alert-success').html(data.msg);
                },
                error: function(xhr, status, error) {
                    $('#saveButton').text('Failed To Save Changes').removeClass('disabled').removeClass('btn-primary').addClass('btn-danger text-white');
                    $('#returnMsg').removeClass('invisible').addClass('alert-danger').html("<b>" + xhr.status + " " + xhr.statusText + "</b><br>" + error);
                }
            });
        }

    </script>
@endsection
