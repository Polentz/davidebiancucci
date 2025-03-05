<?php

function sendConfirmationMail($site, $formPage) {
    kirby()->email([
        'from' => '',
        'fromName' => $site->title(),
        'to' => (string)$formPage->email(),
        'bcc' => '',
        'template' => 'confirmation',
        'subject' => 'Grazie per il tuo ordine',
        'data' => [

        ] 
    ]);
}

return [
    'debug'  => true,
    'smartypants' => true,
    'panel' => [
        'css' => 'assets/css/panel.css'
    ],
    'date'  => [
        'handler' => 'intl'
    ],
    'email' => [
        'transport' => [
            'type' => 'smtp',
            // 'host' => 'mail.viaindustriae.it',
            // 'port' => 587,
            'security' => true,
            'auth' => true,
            // 'username' => 'info@viaindustriae.it',
            // 'password' => '15!messico',
        ]
    ],
];