<?php

return [
    'kafka_connection' => [
        'bootstrap_server' => env('KAFKA_BOOTSTRAP_SERVER'),
        'security_protocol' => env('KAFKA_SECURITY_PROTOCOL', 'SASL_SSL'),
        'sasl_mechanism' => env('KAFKA_SASL_MECHANISM', 'PLAIN'),
        'sasl_username' => env('KAFKA_SASL_USERNAME'),
        'sasl_password' => env('KAFKA_SASL_PASSWORD'),
        'group_id' => env('KAFKA_GROUP_ID', 'myGroup'),
        'auto_offset_reset' => env('KAFKA_AUTO_OFFSET_RESET', 'earliest')
    ],
];
