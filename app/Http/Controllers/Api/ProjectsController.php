<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index(){
        $projects = Project::with(['type','technologies'])->paginate(10);
        
        return response()->json(compact('projects'));
    }

    public function show($slug){
        $project = Project::where('slug',$slug)->with(['type','technologies'])->first();

        if($project->cover_image){
            $project->cover_image = url('storage/' . $project->cover_image);
        }else{
            $project->cover_image = url('storage/app/public/uploads/placeholder-image.jpg');
        }

        return response()->json($project);
    }
}

