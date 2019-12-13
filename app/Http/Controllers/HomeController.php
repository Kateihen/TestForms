<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Feedback;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		$user = Auth::user();

		if ($user->authorizeRole('manager')) {
			return view('manager');
		}
		return view('home');
	}

	public function store(Request $request)
	{

		$attributes = $this->validateFeedback($request);

		$att_file = \Request::file('attached_file');		
		$extension = $att_file->guessExtension();
		Storage::disk('public')
			->put($att_file->getFilename().'.'.$extension, File::get($att_file));

		$feedback = new Feedback();

		$feedback->topic = $attributes['topic'];
		$feedback->message = $attributes['message'];
		$feedback->user_id = Auth::user()->id;
		$feedback->mime = $att_file->getClientMimeType();
		$feedback->original_filename = $att_file->getClientOriginalName();
		$feedback->filename = $att_file->getFilename().'.'.$extension;

		$feedback->save();
		echo 1;
	}

	public function validateFeedback(Request $request)
	{
		return \request()->validate([
			'topic' => ['required', 'min:3', 'max:255'],
			'message' => ['required', 'min:10']
		]);
	}
}
