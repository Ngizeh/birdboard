<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectInvitationRequest;
use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProjectInvitationsController extends Controller
{
    public function store(Project $project, ProjectInvitationRequest $request)
    {
        $user  = User::where('email' , request('email'))->first();

        $project->invite($user);

        session()->flash('invited', 'You have invited '. $user->email);

        return Redirect::back();
    }
}
