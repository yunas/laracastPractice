<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use \App\Mail\ProjectCreated;
use \App\Events\ProjectUpdated;

class Project extends Model
{
    //
    // protected $guarded = [];
    protected $fillable = ['title','description','owner_id'];
    protected $dispatchesEvents = [
        'updated' => ProjectUpdated::class

    ];


	protected static function boot(){
		parent::boot();
		static::created(function($project){
        // dump($project);
	        \Mail::to($project->owner->email)->send(
             	new ProjectCreated($project)
                 	// new ProjectCreated()
        	);

		});
	}


    
    
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
