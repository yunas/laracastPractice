<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //


    public function home(){
	    return view('welcome',[
			'tasks' => [
						'Go to the market',
						'Go to the store',
						'Go to work',
						'Go to the concert'
					],
	    	'foo' => 'foobar'
	    ]);

    }

 	public function about(){
    	return view('about');
    }

	public function contact(){
    	return view('contact');
    }

}
