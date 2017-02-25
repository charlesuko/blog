<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class PagesController extends Controller
{
    public function getHome()
    {
        return view('front.pages.home');
    }

    public function getAbout() {
		$first = 'Alex';
		$last = 'Curtis';
		$fullname = $first . " " . $last;
		$email = 'alex@jacurtis.com';
		$data = [];
		$data['email'] = $email;
		$data['fullname'] = $fullname;
		return view('pages.about')->withData($data);
	}
	public function getContact() {
		return view('pages.contact');
	}
}