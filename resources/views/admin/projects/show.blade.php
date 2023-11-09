@extends('layouts.admin')

@section('content')

<h1 class="text-center mt-5">DETAILS OF SINGLE PROJECT</h1>

<div class="table-responsive mt-3">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">TITOLO</th>
                <th scope="col">DESCRIZIONE</th>
                <th scope="col">AUTORI</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td scope="row">{{$project->title}}</td>
                    <td>{{$project->description}}</td>
                    <td>{{$project->authors}}</td>
                </tr>

        </tbody>
    </table>
</div>

@endsection