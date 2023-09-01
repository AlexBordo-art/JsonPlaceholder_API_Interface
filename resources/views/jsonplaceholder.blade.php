@extends('layouts')

@section('content')
<div class="container" style="background-color: #ffffff; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
    <h1 class="text-center mt-4">JsonPlaceholder API Interface</h1>

    <div class="row mt-5">
        <!-- Show Posts Button -->
        <div class="col-md-4">
            <form action="{{ url('/show-posts') }}" method="get">
                <button type="submit" class="btn btn-primary btn-block">Show Posts</button>
            </form>
        </div>
        <!-- Show Users Button -->
        <div class="col-md-4">
            <form action="{{ url('/show-users') }}" method="get">
                <button type="submit" class="btn btn-primary btn-block">Show Users</button>
            </form>
        </div>
        <!-- Show Todos Button -->
        <div class="col-md-4">
            <form action="{{ url('/show-todos') }}" method="get">
                <button type="submit" class="btn btn-primary btn-block">Show Todos</button>
            </form>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Create Post Form -->
        <div class="col-md-12">
            <h4>Create Post</h4>
            <form action="{{ url('/create-post') }}" method="post">
                @csrf
                <input type="text" name="title" class="form-control" placeholder="Title" required>
                <textarea name="body" class="form-control mt-2" placeholder="Body" required></textarea>
                <button type="submit" class="btn btn-success mt-2">Create</button>
            </form>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Update Post Form -->
        <div class="col-md-12">
            <h4>Update Post</h4>
            <form action="{{ url('/update-post') }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <input type="number" name="id" class="form-control" placeholder="Post ID" required>
                <input type="text" name="title" class="form-control mt-2" placeholder="New Title" required>
                <textarea name="body" class="form-control mt-2" placeholder="New Body" required></textarea>
                <button type="submit" class="btn btn-warning mt-2">Update</button>
            </form>
        </div>
    </div>

    <div class="row mt-4 mb-4">
        <!-- Delete Post Form -->
        <div class="col-md-12">
            <h4>Delete Post</h4>
            <form action="{{ url('/delete-post') }}" method="post">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <input type="number" name="id" class="form-control" placeholder="Post ID" required>
                <button type="submit" class="btn btn-danger mt-2">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
