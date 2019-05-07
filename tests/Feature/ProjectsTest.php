<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectsTest extends TestCase
{

	use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */



    /** @test **/
	public function guests_may_not_create_a_project(){
		// $this->withoutExceptionHandling();
		
    	$this->post('/projects')->assertRedirect('/login');

	}


    /** @test **/
    public function a_user_can_create_a_project(){
    	
    	// $this->withoutExceptionHandling();

    	//Given when I am a user who is logged in
    	$this->actingAs(factory('App\User')->create());


    	// //When I hit the endpoint /store to create a project, while passing the necessary data. 
    	// $title = 'NEW AUTOMATION TESTING - PROJECT';
    	// $description = 'NEW AUTOMATION TESTING - DESCRIPTION';
    	
    	// $this->post('projects',[
    	// 	'title' => $title,
    	// 	'description' => $description,
    	// ]);
    	
    	// //Then there should be a new project
    	// $this->assertDatabaseHas('projects',['title' => $title, 'description' => $description]);


    	$attributes = [
    		'title' => 'NEW AUTOMATION TESTING - PROJECT',
    		'description' => 'NEW AUTOMATION TESTING - DESCRIPTION'
    	];
    	
    	$this->post('/projects',$attributes);
    	
    	$this->assertDatabaseHas('projects',$attributes	);


    }
    
    

    public function testExample()
    {
        // $this->assertTrue(true);
        $response = $this->get('/');
        $response->assertStatus(200);

    }
}
