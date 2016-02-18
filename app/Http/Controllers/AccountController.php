<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Lang;

class AccountController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	//public function index($userEmail)
	public function index()
	{
		// get users cabinet by email
		return view('account.home');
	}

}