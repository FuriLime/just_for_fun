<?php
/**
 * Created by PhpStorm.
 * User: furilime
 * Date: 23.02.16
 * Time: 15:45
 */
interface NewsletterList
{
    public function subscribeTo($listName, $email);

    /**
     * Unsubscribe a user from a newsletter list
     *
     * @param $list
     * @param $email
     * @return mixed
     */
    public function unsubscribeFrom($list, $email);
}