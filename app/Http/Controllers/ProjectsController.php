<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Project;
use \App\User;
use \App\Mail\ProjectCreated;


class ProjectsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index(){
         
         // $projects = Project::all();
        // $projects = Project::where('owner_id',auth()->id())->get();
        // $projects = auth()->user()->projects;

        //TELESCOPE STUFF
        // dump($projects);
        // 
        // cache()->rememberForever('stats',function(){
        //     return ['lessons' => '1300', 'hours' => 100];
        // });


        // $stats = cache()->get('stats');
        // dump($stats);

        // return view('projects.index',compact('projects'));
        return view('projects.index',[

            'projects' => auth()->user()->projects
        ]);
    }

    public function create(){
        return view('projects.create');
    }

    public function store(Project $project){
        $attributes = $this->validateProject();

        $attributes['owner_id'] = auth()->id(); 

        
        $project = Project::create($attributes);



        \Mail::to('qaziyunas@gmail.com')->send(

             new ProjectCreated($project)
                 // new ProjectCreated()
        );


        return redirect('/projects');
    }

    public function show(Project $project){

        // abort_if(\Gate::denies('update', $project), 403);
        // abort_unless(\Gate::allows('update', $project), 403);
        // auth()->user->can('update', $project);
        // auth()->user->cannot('update', $project);
        $this->authorize('update', $project);


        // if (\Gate::denies('update', $project)){
        //     abort(403);
        // }

       return view('projects.show',compact('project'));
    }

    public function edit(Project $project){
       return view('projects.edit',compact('project'));
    }

    public function update(Project $project){

        $attributes = $this->validateProject();


        $project->update(request()->all());
        return redirect('/projects');
    }

    public function destroy(Project $project){
       $project->delete();
       return redirect('/projects');
    }


    protected function validateProject(){
        return request()->validate([
           'title'  => ['required','min:3'],
           'description'  => ['required','min:3'],
        ]);
    }

}