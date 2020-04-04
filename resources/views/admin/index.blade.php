@extends('layouts.admin')

@section('content')
    <h3>Admin Panel</h3>
    <hr>
    <div class="row">
        <div class="col">
            <h5>Articles
                <div class="float-right">
                    <a href="{{route('admin.article.write')}}" role="button" class="btn btn-sm btn-primary">Write Article</a>
                </div>
            </h5>
            <br class="my-sm-0"/>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <th>Name</th>
                <th>Category</th>
                <th>Views</th>
                </thead>
                <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td>
                            <a href="{{route('admin.article.view', $article->id)}}">{{$article->title}}</a>
                        </td>
                        <td>{{$article->category->name}}</td>
                        <td>{{$article->views}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col">
            <h5>Categories
                <div class="float-right">
                    <a href="#" data-toggle="modal" data-target="#createCategory" role="button" class="btn btn-sm btn-primary">Add</a>
                </div>
            </h5>
            <br class="my-sm-0"/>
            <table class="table table-bordered table-striped table-hover">
                <thead>
                <th>Name</th>
                <th>Description</th>
                <th>Articles</th>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            <a href="#">{{$category->name}}</a>
                        </td>
                        <td>{{$category->description}}</td>
                        <td>{{count($category->articles)}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.table').DataTable();
        } );
    </script>
    <div class="modal fade" id="createCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('admin.category.add')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input required type="text" class="form-control" name="name" placeholder="Politics">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input required type="text" class="form-control" name="description" placeholder="Australian and international politics">
                    </div>
                    <div class="form-group">
                        <label>Background URL</label>
                        <input type="url" class="form-control" name="bg_url" placeholder="https://url.to/your/image/here.png">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="show_on_nav" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Show on nav-bar</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" value="Add category" class="btn btn-primary">
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection