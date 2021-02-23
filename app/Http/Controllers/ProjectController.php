<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Project $project
     * @return \Inertia\Response
     */
    public function index(Project $project)
    {
        return Inertia::render('Project/Index', [
            'projects' => auth()->user()->accessibleProjects()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Project $project
     * @return View|\Inertia\Response
     */
    public function create(Project $project)
    {
        return inertia('Project/Create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'notes' => 'min:3'
        ]);

        $project = auth()->user()->projects()->create($attributes);

        return redirect($project->path());
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Project $project
     * @return \Inertia\Response
     */
    public function show(Project $project)
    {
        $this->authorize('update', $project);

        return Inertia::render('Project/Show', [
            'project' => $project,
            'activities' => $project->activity->load('subject', 'user'),
            'project_tasks' => $project->tasks,
            'can' => auth()->user()->can('manage', $project),
            'status' =>  request()->session()->get('error'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Project $project
     * @return \Illuminate\View\View|\Inertia\Response|\Inertia\ResponseFactory
     */
    public function edit(Project $project)
    {
        return inertia('Project/Edit', [
            'project' => $project,
            'status' => request()->session()->get('error')
        ]);
    }


    public function update(Project $project)
    {
        $this->authorize('update', $project);

        $attributes = request()->validate([
            'title' => 'sometimes|required',
            'description' => 'sometimes|required',
            'notes' => 'sometimes'
        ]);

        $project->update($attributes);

        return Redirect::route('projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Project $project
     * * @return \Illuminate\Routing\Redirector
     */
    public function destroy(Project $project)
    {
        $this->authorize('manage', $project);

        $project->delete();

        return Redirect::route('projects.index');
    }
}
