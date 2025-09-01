<?php

declare(strict_types=1);

defined('TYPO3') or die();

return [
    'ctrl' => [
        'title' => 'LLL:EXT:dv_education_downloads/Resources/Private/Language/locallang_db.xlf:tx_dveducationdownloads_domain_model_documenttype',
        'label' => 'title', 'tstamp' => 'tstamp', 'crdate' => 'crdate', 'delete' => 'deleted',
        'default_sortby' => 'sorting ASC',
        'enablecolumns' => ['disabled' => 'hidden'],
        'iconIdentifier' => 'ext-dveducationdownloads-type',
        'security' => ['ignorePageTypeRestriction' => true],
    ],
    'types' => ['1' => ['showitem' => 'title, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden']],
    'columns' => [
        'title' => ['label' => 'LLL:EXT:dv_education_downloads/Resources/Private/Language/locallang_db.xlf:field.title', 'config' => ['type' => 'input', 'size' => 50, 'max' => 255, 'required' => true]],
    ],
];
