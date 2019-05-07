<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Project;

class TasksTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    // public function testExample()
    // {
    //     $this->assertTrue(true);
    // }


    /** @test */
    public function a_project_can_have_tasks(){
    	
		$user = factory('App\User')->create();

    	$attributes = [
    		'title' => 'NEW AUTOMATION TESTING - PROJECT',
    		'description' => 'NEW AUTOMATION TESTING - DESCRIPTION'
    	];
    	
    	$project = $user->projects()->create($attributes);
		
		$attributesTasks = [
    		'description' => 'NEW AUTOMATION TESTING - PROJECT TASKS'
    	];

        $project->tasks()->create($attributesTasks);
    	
    	// $this->assertEquals('NEW AUTOMATION TESTING - PROJECT TASKS', $project->tasks);
    	$this->assertDatabaseHas('tasks',$attributesTasks);


    }

}
