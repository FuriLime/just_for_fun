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

		'Facebook' => [
			'client_id'     => '1685286605050549',
			'client_secret' => '7aa94a9144725b0eb4c14eb3f6bb3ed8',
			'scope'         => [],
		],

		'Microsoft' => [
			'client_id'     => $secrets['CUSTOM']['WINDOWS_ID'],
			'client_secret' => $secrets['CUSTOM']['WINDOWS_SECRET'],
			'scope'         => [],
		],

	]

];