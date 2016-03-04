<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Invite;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Activate;
class InviteController extends Controller {

    /**
     *
     * return view with invite form
     *
     */

//    public function __construct() {
//        $this->middleware('auth', ['except' => 'invitesonly']);
//    }

    public function create() {
        return View('invite.create');
    }


    /**
     * post invite form
     *
     * @param Request $request
     */
    public function store(Request $request) {
        $this->validate($request, ['email' => 'required|email|unique:invites,email|unique:users,email']);

        $email = $request->get('email');
        $message = $request->get('message');

        //create new invite
        $inviter = new User();

        $invite = new Invite(['email' => $email]);
        $invite->inviter_id = '1';
//        dd($inviter->id);
        $invite->save();


        $invite->sendInvitation($message);

        //invite was send success
        \Session::flash('status_message', 'Invite has being created and sent to ' .$email);


        return redirect('invite');
    }


    /**
     *
     */
    public function invitesonly() {
        return view('invite.invitesonly');
    }



}