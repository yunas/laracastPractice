<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\Project;


class ProjectTasksController extends Controller
{
    //

    public function store(Project $project){
    	request()->validate([
           'description'  => ['required','min:3'],
        ]);

     	$project->addTask(request('description'));

    	return back();

    }

    public function update(Task $task){

        $method = request()->has('completed') ? 'complete': 'incomplete';
        $task->$method();

    	return back();

    }


}
