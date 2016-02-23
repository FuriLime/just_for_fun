<?php namespace Subscriber;
/**
 * Created by PhpStorm.
 * User: furilime
 * Date: 23.02.16
 * Time: 15:52
 */

use Illuminate\Support\ServiceProvider;
class NewsletterListServiceProvider extends ServiceProvider {
    /**
     * Register binding in IoC container
     */
    public function register()
    {
        $this->app->bind(
            'Subscriber\NewsletterList',
            'Subscriber\Mailchimp\NewsletterList'
        );
    }
}