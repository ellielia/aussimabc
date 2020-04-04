@extends('layouts.admin')

@section('content')
    @php
        $categories = \App\ArticleCategory::all();
    @endphp
    <h3>Write an article</h3>
    <hr>
    Please remember to use the style guide.
    <hr class="my-2"/>
    <form action="{{route('admin.article.publish')}}" method="POST">
        @csrf
        <h3>Metadata</h3>
        <div class="form-group">
            <h5>Title</h5>
            <input name="title" type="text" value="" class="form-control">
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <h5>Category</h5>
                    <select name="category_id" onchange="updateValue()" value="" class="form-control" id="category_id">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <script>
                        function updateValue() {
                            let dropdown = document.getElementById('category_id');
                            dropdown.value = dropdown.selectedIndex;
                        }
                    </script>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <h5>Author</h5>
                    <small>Use <code>&lt;b&gt;text&lt;/b&gt;</code> to bolden names.</small>
                    <input name="author" type="text" value="" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h5>Attribution</h5>
                <small>Use if article sourced externally</small>
                <input name="publication_tag" type="text" value="" class="form-control">
            </div>
            <div class="col">
                <h5>Publication status</h5>
                <div class="form-check">
                    <input onchange="updateCheck()" value="0" name="private" id="private" type="checkbox" checked="" class="form-check-input">
                    <label class="form-check-label">Public</label>
                </div>

                <script>
                    function updateCheck() {
                        let check = document.getElementById('private');
                        if (check.checked == "on") {
                            check.value = 1;
                        } else {
                            check.value = 0;
                        }
                    }
                </script>
            </div>
        </div>
        <hr>
        <h3>Main image</h3>
        <div class="row">
            <div class="col">
                <h5>Image URL</h5>
                <input name="image_url" type="url" value="" class="form-control">
            </div>
            <div class="col">
                <h5>YouTube Video URL</h5>
                <input name="youtube_url" type="url" value="" class="form-control">
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col">
                <h5>Image/video caption</h5>
                <input name="image_video_caption" type="text" value="" class="form-control">
            </div>
        </div>
        <hr/>
        <h3>Article content</h3>
        <h5>Caption</h5>
        <input name="caption" type="text" value="" class="form-control">
        <br/>
        <h5>Key Points</h5>
        <textarea name="key_points" class="form-control" name="key_points" id="keyPoints"></textarea>
        <h5>Main content</h5>
        <textarea name="content" class="form-control" name="content" id="mainContent"></textarea>
        {{--<script>
            var editor = CodeMirror.fromTextArea(document.getElementById('keyPoints'), {
                lineNumbers: true,
                mode: "htmlMixed"
            });
            var editor2 = CodeMirror.fromTextArea(document.getElementById('mainContent'), {
                lineNumbers: true,
                mode: "htmlMixed"
            });
        </script>--}}
        <h5>Topics</h5>
        <input name="topics" type="text" value="" class="form-control">
        <hr>
        <h3>Related articles</h3>
        TBD
        <hr>
        <div>
            <a name="test"></a>
            <input type="submit" href="#test" role="button" id="saveButton" onclick="saveChanges()" class="btn btn-primary"></a>
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


    </script>
@endsection