<?php namespace Subscriber\Mailchimp;


use Subscriber\NewsletterList as NewsletterListInterface;
use Mailchimp;
class NewsletterList implements NewsletterListInterface {
    /**
     * @var Mailchimp
     */
    protected $mailchimp;
    /**
     * @var array
     */
    protected $lists = [
        'lessonSubscribers' => '3b2e9de273'
    ];
    /**
     * @param Mailchimp $mailchimp
     */
    function __construct(Mailchimp $mailchimp)
    {
        $this->mailchimp = $mailchimp;
    }
    /**
     * Subscribe a user to a Mailchimp list
     *
     * @param $listName
     * @param $email
     * @return mixed
     */
    public function subscribeTo($listName, $email)
    {
        return $this->mailchimp->lists->subscribe(
            $this->lists[$listName],
            ['email' => $email],
            null, // merge vars
            'html', // email type
            false, // require double opt in?
            true // update existing customers?
        );
    }
    /**
     * Unsubscribe a user from a Mailchimp list
     *
     * @param $listName
     * @param $email
     * @return mixed
     */
    public function unsubscribeFrom($listName, $email)
    {
        return $this->mailchimp->lists->unsubscribe(
            $this->lists[$listName],
            ['email' => $email],
            false, // delete the member permanently
            false, // send goodbye email?
            false // send unsubscribe notification email?
        );
    }
}