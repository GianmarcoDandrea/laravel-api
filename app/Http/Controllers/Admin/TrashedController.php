<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class TrashedController extends Controller
{
    public function index() {
        $projects = Project::onlyTrashed()->get();
        return view('admin.projects.trashed', compact('projects'));
    }

    public function restore(Project $project) {
        
        $project->restore();
        

        return redirect()->route('admin.projects.trashed');
    }

    public function delete(Project $project) {

        $project->forceDelete();

        return redirect()->route('admin.projects.trashed');
    }
}
