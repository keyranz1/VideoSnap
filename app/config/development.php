<?php

return [
    'app' => [
        'url' => 'http://localhost:8079',
        'hash' => [
            'algo' => PASSWORD_BCRYPT,
            'cost' => 10
        ]

    ],

    'db' => [
        'driver' => 'mysql',
        'host' => '127.0.0.1',
        'name' => 'slim1',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => ''
    ],
    'auth' => [
        'session' => 'user_id',
        'remember' => 'user_r'
    ],
    'videoauth' => [
      'pathauth' => 'path_id'
    ],

    'mail' => [
        'smtp_auth' => true,
        'smtp_secure' => 'tls',
        'host' => 'smtp.gmail.com',
        'username' => 'sluvideosnap@gmail.com',
        'password' => 'computerproject285',
        'port' => 587,
        'html' => true

    ],

    'twig' => [
            'debug' => true
    ],

    'csrf' => [
        'key' => 'csrf_token'
    ]

];