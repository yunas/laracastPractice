<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    // protected $guarded = [];

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
