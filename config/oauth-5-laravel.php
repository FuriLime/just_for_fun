<?php

$secrets = json_decode(file_get_contents($_SERVER['APP_SECRETS']), true);

return [

	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session',

	/**
	 * Consumers
	 */
	'consumers' => [
		'Microsoft' => [
			'client_id'     => $secrets['CUSTOM']['WINDOWS_ID'],
			'client_secret' => $secrets['CUSTOM']['WINDOWS_SECRET'],
			'scope'         => ['basic', 'signin', 'emails', 'work_profile', 'postal_addresses'],
		],

		'Pocket' => [
			'client_id'     => $secrets['CUSTOM']['POCKET_CONSUMER_KEY'],
			'client_secret' => $secrets['CUSTOM']['POCKET_CONSUMER_KEY'],
			'scope'         => [],
		],
	]

];
