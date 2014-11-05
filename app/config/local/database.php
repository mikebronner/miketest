<?php

return array(

	'default' => 'sqlite',
	'connections' => array(

		'mysql' => array(
			'driver'    => 'mysql',
			'host'      => 'localhost',
			'database'  => 'test',
			'username'  => 'homestead',
			'password'  => 'secret',
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => 'test_',
		),
        'sqlite' => array(
            'driver'   => 'sqlite',
            'database' => __DIR__.'/../../database/production.sqlite',
            'prefix'   => '',
        ),
	),
);
