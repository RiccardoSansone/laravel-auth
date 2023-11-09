<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderByDesc('id')->paginate(10);
        // $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request ->validate([
            'title'=>'required|unique|max:50|min:4',
            'description'=>'nullable|max:1000|min:3',
            'authors'=>'nullable|max:1000|min:3'
        ]);

        $project = new Project();
        $project->description = $request->description;
        $project->title = $request->title;
        $project->authors = $request->authors;
        $project->save();
        return to_route('project.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        

        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {

        $validated = $request ->validate([
            'title'=>'required|unique|max:50|min:4',
            'description'=>'nullable|max:1000|min:3',
            'authors'=>'nullable|max:1000|min:3'
        ]);

        $data = $request->all();
        $project->update($data);
        return redirect()->route('project.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('project.index')->with('messaggio', 'hai cancellato il il fumetto con successo!');
    }
}
