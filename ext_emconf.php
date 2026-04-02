<?php

declare(strict_types=1);

$EM_CONF[$_EXTKEY] = [
    'title' => 'Education Downloads',
    'description' => 'Download center for the education sector with document type, language, version, validity period, and filtering.',
    'category' => 'plugin',
    'author' => 'Davitec GmbH',
    'author_email' => 'devops@davitec.de',
    'author_company' => 'Davitec GmbH, +Pluswerk Standort Dresden',
    'state' => 'stable',
    'version' => '1.0.5',
    'constraints' => [
        'depends' => ['typo3' => '12.4.0-13.4.99'],
        'conflicts' => [],
        'suggests' => [],
    ],
];
