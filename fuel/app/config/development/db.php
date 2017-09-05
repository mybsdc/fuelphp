<?php
/**
 * The development database settings. These get merged with the global settings.
 */

return array(
	'default' => array(
		'connection'  => array(
			'dsn'        => 'mysql:host=localhost;dbname=fuel',
			'username'   => 'root',
			'password'   => '',
		),
	),

    // redis配置
    'redis' => array(
        'redis' => array(
            'hostname'  => '127.0.0.1',
            'port'      => 6379,
            'timeout'	=> null,
            'database'  => 0,
        ),
    ),
);
