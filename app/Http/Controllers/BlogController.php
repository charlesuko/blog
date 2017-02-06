<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;

class BlogController extends Controller
{
    //
	public function getIndex(){
		$posts = Post::paginate(10);

		return view('blog.index')->withPosts($posts);
	}

    public function getSingle($slug){
    	// fetch form the database based on slug
    	$post = Post::where('slug', '=', $slug)->first();

    	// return the view an dpass int he post object
    	return view('blog.single')->withPost($post);
    }
}
