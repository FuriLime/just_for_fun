<?php

$secrets = json_decode(file_get_contents($_SERVER['APP_SECRETS']), true);

return [
    /*
    |--------------------------------------------------------------------------
    | API Secret Key
    |--------------------------------------------------------------------------
    |
    | The api secret key to access Mailchimp. If you don't know the API key, find it here:
    | "http://kb.mailchimp.com/accounts/management/about-api-keys#Find-or-Generate-Your-API-Key"
    |
    */

    'apikey' => $secrets['CUSTOM']['MAILCHIMP_SECRET'],

    'listId' => $secrets['CUSTOM']['MAILCHIMP_LIST_ID'],
];