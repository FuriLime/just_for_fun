<?php

namespace App\Http\Controllers;


use App\Http\Requests;
// use Request;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Weblee\Mandrill\Mail;
use App\User;

class MailController extends Controller
{
    //

    public function emailSend(Request $request){

        $subject = date('Y-m-d H:i:s') . " Subjectline";  // using a time in there to easily now which email was received for testing
        $to_email = 'sergey.ch.ysbm@gmail.com';
        $to_name = 'asdasd';
        $from_email = 'test@eventfellows.org';
        $from_name = 'From Name Here';

        $template_content = array(
            array(
                'name' => 'example name from first array in file',
                'content' => 'example content from first array in file'
            )
        );

        $global_merge_vars = [
            ['name' => 'emailname',             'content' => $to_email],
            ['name' => 'NNAME',                 'content' => 'User reigester without first nickname'],
            ['name' => 'FNAME',                 'content' => 'User reigester without first name'],
            ['name' => 'LNAME',                 'content' => 'User reigester without last name'],
            ['name' => 'LOGINCOUNT',            'content' => 'We not have this data yet'],
            ['name' => 'PASSRESET',             'content' => 'content-PASSRESET'],
            ['name' => 'RESETVALID',            'content' => 'We not have this data yet'],
            ['name' => 'DCREDITS',              'content' => '30'],
            ['name' => 'ECREDITS',              'content' => 'We not have this data yet'],
            ['name' => 'ACCTYPE',               'content' => 'We not have this data yet'],
            ['name' => 'RENEWDATE',             'content' => 'We not have this data yet'],
            ['name' => 'FREETEXT',              'content' => 'content-FREETEXT'],
            ['name' => 'COLOR1',                'content' => '#ee12ab'], // merge value not in mandrill code yet
            // ['name' => 'logo',              'content' => 'https://gallery.mailchimp.com/af80e28befb4c13871210c7c0/images/9db15bbf-b6f3-4fa2-9afe-402ec9b558f6.jpg'],
            ['name' => 'logo',              'content' => 'https://gallery.mailchimp.com/af80e28befb4c13871210c7c0/images/868e7c81-a24b-4468-931e-8d8a5ff5dc92.png'],
        ];
        $message = [
            'html' => '<p>Example HTML content 12345</p>',
            'text' => 'Example text content 56789',
            'subject' => $subject,
            'from_email' => $from_email ,
            'from_name' => $from_name,
            'to' => array(
                array(
                    'email' => $to_email,
                    'name' => $to_name,
                ),
            ),
            'headers' => array('Reply-To' => 'message.reply@twofy.de'),
            'important' => false,
            'track_opens' => null,
            'track_clicks' => null,
            'auto_text' => null,
            'auto_html' => null,
            'inline_css' => null,
            'url_strip_qs' => null,
            'preserve_recipients' => null,
            'view_content_link' => null,
            'tracking_domain' => null,
            'signing_domain' => null,
            'return_path_domain' => null,
            'merge' => true,
            'merge_language' => 'mailchimp',
            'global_merge_vars' => $global_merge_vars,
        ];

        // Quick setup -> Mail should always be pushed to Queue and send as a background job!!!
        \MandrillMail::messages()->sendTemplate('test-template', $template_content, $message);
    }
}
