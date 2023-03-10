<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index(){
        $projects = Project::with(['type','technologies'])->orderBy('id', 'desc')->paginate(10);

        $types = Type::all();

        return response()->json(compact('projects','types'));
    }

    public function show($slug){
        $project = Project::where('slug',$slug)->with(['type','technologies'])->first();

        if($project->cover_image){
            $project->cover_image = url('storage/' . $project->cover_image);
        }else{
            $project->cover_image = url('storage/uploads/placeholder.png');
        }

        return response()->json($project);
    }

    public function getSearch(){
        $string_to_search = $_GET['tosearch'];

        $projects = Project::where('name','like',"%$string_to_search%")->with(['type','technologies'])->get();

        return response()->json($projects);
    }

    public function getByType($id){

        $projects = Project::where('type_id',$id)->with(['type','technologies'])->get();

        return response()->json($projects);
    }
}

