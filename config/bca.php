<?php

/**
 * Laravel BCA REST API Config.
 *
 * @author     Pribumi Technology
 * @license    MIT
 * @copyright  (c) 2017, Pribumi Technology
 */
return [

    'default'     => 'main',

    'connections' => [

        'main'        => [
            'corp_id'       => 'your-corp_id',
            'client_id'     => '457a9dba-f844-4ce9-9391-8b9e2b0a5543',
            'client_secret' => 'b8199802-6257-45e2-ae02-b79d4306b588',
            'api_key'       => 'cb8a20b6-50b2-407e-97ae-55df5642005a',
            'secret_key'    => 'edac6735-e0bf-4acd-9cf5-c7647bbc9a37',
            'timezone'      => 'Asia/Jakarta',
            'host'          => 'sandbox.bca.co.id',
            'scheme'        => 'https',
            'development'   => true,
            'options'       => [],
            'port'          => 443,
            'timeout'       => 30,
        ],

        'alternative' => [
            'corp_id'       => 'your-corp_id',
            'client_id'     => 'your-client_id',
            'client_secret' => 'your-client_secret',
            'api_key'       => 'your-api_key',
            'secret_key'    => 'your-secret_key',
            'timezone'      => 'Asia/Jakarta',
            'host'          => 'sandbox.bca.co.id',
            'scheme'        => 'https',
            'development'   => true,
            'options'       => [],
            'port'          => 443,
            'timeout'       => 30,
        ],

    ],

];
