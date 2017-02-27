<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Post;
use Mail;
use Session;
class PagesController extends Controller
{
    public function getHome()
    {
        return view('front.pages.home');
    }

    public function getAbout() {
		$first = 'Charles';
		$last = 'Uko';
		$fullname = $first . " " . $last;
		$email = 'charlesuko.com';
		$data = [];
		$data['email'] = $email;
		$data['fullname'] = $fullname;
		return view('pages.about')->withData($data);
	}
	public function getContact() {
		return view('pages.contact');
	}

	public function postContact(Request $request) {
		$this->validate($request, ['email' => 'required|email', 'message'=>'min:10', 'subject'=>'min:3']);

		$data = array (
			'email' => $request->email,
			'subject' => $request->subject,
			'bodyMessage' => $request->message
			);
		Mail::send('emails.contact', $data, function($message) use ($data){
			$message->from($data['email']);
			$message->to('charlesuko@example.com');
			$message->subject($data['subject']);
		});

		Session::flash('success', 'Your email was Sent!');

		return redirect('/');
	}
}