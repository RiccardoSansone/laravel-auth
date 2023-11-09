@extends('layouts.admin')

@section('content')

@if(session('messaggio'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>Congratulazioni!</strong> {{session('messaggio')}}
</div>
@endif

<div class="table-responsive mt-5">
    
    <form class="mx-2" action="{{route("project.create")}}">
        <button class="bg-primary mb-3 border-0p-1 rounded" type="submit">Add new project</button>
    </form>

        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Authors</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td scope="row">{{$project->title}}</td>
                        <td>{{$project->description}}</td>
                        <td>{{$project->authors}}</td>
                        <td class="d-flex">
    
                            <form action="{{route("project.show", [$project->id])}}">
    
                                <button class="bg-success mb-3 border-0 p-1 rounded" type="submit">Details</button>
                            </form>
    
                            <form class="mx-2" action="{{route("project.edit", [$project->id])}}">
    
                                <button class="bg-warning mb-3 border-0 p-1 rounded" type="submit">Update</button>
                            </form>
    
                            <form action="{{route("project.destroy", [$project->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="bg-danger mb-3 border-0 p-1 rounded" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
    
            </tbody>
        </table>
        
    {{$projects->links('pagination::bootstrap-5')}}

</div>
@endsection