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
    protected $listId = '1234567890';        // Id of newsletter list

    /**
     * Pull the Mailchimp-instance (including API-key) from the IoC-container.
     */
    public function __construct(Mailchimp $mailchimp)
    {
        $this->mailchimp = $mailchimp;
    }

    /**
     * Access the mailchimp lists API
     */
    public function addEmailToList($email)
    {
        try {
            $this->mailchimp
                ->lists
                ->subscribe(
                    $this->listId,
                    ['email' => $email]
                );
        } catch (\Mailchimp_List_AlreadySubscribed $e) {
            // do something
        } catch (\Mailchimp_Error $e) {
            // do something
        }
    }
}