@extends('layouts.admin')

@section('content')

<h1>Create</h1>
<div class="col-6 mx-auto shadow p-4">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('project.store') }}" method="post">

        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control p-2" name="title" id="title" aria-describedby="helpId" placeholder="write a title" value="{{ old('title') }}">
            <small id="titleHelper" class="form-text text-muted">write a title for ypur project</small>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control p-2" name="description" id="description" aria-describedby="helpId" placeholder="write description" value="{{ old('description') }}">
            <small id="descriptionHelper" class="form-text text-muted">write a description for your project</small>
        </div>

        <div class="mb-3">
            <label for="authors" class="form-label">Authors</label>
            <input type="text" class="form-control p-2" name="authors" id="authors" aria-describedby="help" placeholder="Write authors" value="{{ old('authors') }}">
            <small id="authorsHelper" class="form-text text-muted">write the authors of your project</small>
        </div>


        <button type="submit" class="btn btn-primary 3">Add Project</button>
    </form>
</div>
@endsection