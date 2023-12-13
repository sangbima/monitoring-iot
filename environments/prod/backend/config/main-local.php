<?php

return [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '',
            'csrfCookie' => [
                'secure' => true,
            ]
        ],
        'user' => [
            'identityCookie' => [
                'secure' => true,
            ],
        ],
        'session' => [
            'cookieParams' => [
                'secure' => true,
            ],
        ],
    ],
];
