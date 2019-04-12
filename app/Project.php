<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use \App\Mail\ProjectCreated;

class Project extends Model
{
    //
    // protected $guarded = [];



	protected static function boot(){
		parent::boot();
		static::created(function($project){

	        \Mail::to($project->owner->email)->send(
             	new ProjectCreated($project)
                 	// new ProjectCreated()
        	);

		});
	}


    protected $fillable = ['title','description','owner_id'];
    
    public function tasks(){

    	return $this->hasMany(Task::class);
    }


    public function addTask($description){
    	$this->tasks()->create(compact('description'));

    }

    public function owner(){
        return $this->belongsTo(User::class);
    }

}
