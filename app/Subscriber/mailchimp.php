<?php
/**
 * Created by PhpStorm.
 * User: furilime
 * Date: 23.02.16
 * Time: 14:39
 */


namespace App\Subscriber;

use Mailchimp as ListProvider;
use Illuminate\Http\Request;
use Validator;
use App\User;

class Mailchimp
{

    protected $mailchimp;
    protected $listener;
    protected $listid;

    public function __construct($listener)
    {
        $this->mailchimp = '26dd8bfcf2dab1dfa670441d9e3a611f-us1';
        $this->lsitid = '3b2e9de273';
        $this->listener = $listener;

    }

    public function saveNewSubscriber(array $data)
    {
        return User::create(['email' => $data['email']]);
    }

    protected function validate(Request $request)
    {
        return Validator::make($request->all(), [
            'email' => 'required|email|max:255|unique:users'
        ]);
    }

    public function subscribe(Request $request)
    {

        if ($this->validate($request)->fails()) {
            return $this->listener->subscription_failed('You have already subscribed to our mailing list');
        }

        $subscriberAdded = $this->saveNewSubscriber($request->all());

        if ($subscriberAdded) {
            $addedToProviderList = $this->subscribeToList($request->get('email'));

            if ($addedToProviderList) {
                return $this->listener->subscription_succeed('Thank you for subscribing');
            }
        }


    }

    public function subscribeToList($email)
    {
        try {
            $status = $this->mailchimp->lists->subscribe(
                $this->listid,
                compact('email'),
                null, // merge vars
                'html', // email type
                false, // requires double optin
                false, // update existing members
                true
            );

        } catch (Exception $e) {
            return false;
            // if 214 then already subscribed
            //var_dump($e->getCode());
        }
    }

    public function unsubscribeFromList($email)
    {
        return $this->mailchimp->lists->unsubscribe(
            $this->listid,
            compact('email'),
            false, //delete permanently
            false, //send goodbye emails
            false //send unsubscribe notification email
        );
    }
}