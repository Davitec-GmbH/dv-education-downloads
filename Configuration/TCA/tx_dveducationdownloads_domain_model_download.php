<?php

declare(strict_types=1);

defined('TYPO3') or die();

return [
    'ctrl' => [
        'title' => 'LLL:EXT:dv_education_downloads/Resources/Private/Language/locallang_db.xlf:tx_dveducationdownloads_domain_model_download',
        'label' => 'title', 'label_alt' => 'version,language', 'label_alt_force' => true,
        'tstamp' => 'tstamp', 'crdate' => 'crdate', 'delete' => 'deleted',
        'default_sortby' => 'title ASC',
        'enablecolumns' => ['disabled' => 'hidden', 'starttime' => 'starttime', 'endtime' => 'endtime'],
        'searchFields' => 'title,description',
        'iconIdentifier' => 'ext-dveducationdownloads-download',
        'security' => ['ignorePageTypeRestriction' => true],
    ],
    'types' => ['1' => ['showitem' => '
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            title, description, document_type, file,
        --div--;LLL:EXT:dv_education_downloads/Resources/Private/Language/locallang_db.xlf:tab.metadata,
            language, version, valid_from, valid_until,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
            hidden, starttime, endtime,
    ']],
    'columns' => [
        'title' => ['label' => 'LLL:EXT:dv_education_downloads/Resources/Private/Language/locallang_db.xlf:field.title', 'config' => ['type' => 'input', 'size' => 50, 'max' => 255, 'required' => true]],
        'description' => ['label' => 'LLL:EXT:dv_education_downloads/Resources/Private/Language/locallang_db.xlf:field.description', 'config' => ['type' => 'text', 'rows' => 3]],
        'document_type' => ['label' => 'LLL:EXT:dv_education_downloads/Resources/Private/Language/locallang_db.xlf:field.document_type', 'config' => ['type' => 'select', 'renderType' => 'selectSingle', 'foreign_table' => 'tx_dveducationdownloads_domain_model_documenttype', 'items' => [['label' => '', 'value' => 0]], 'default' => 0]],
        'language' => ['label' => 'LLL:EXT:dv_education_downloads/Resources/Private/Language/locallang_db.xlf:field.language', 'config' => ['type' => 'select', 'renderType' => 'selectSingle', 'items' => [['label' => 'Deutsch', 'value' => 'de'], ['label' => 'English', 'value' => 'en']], 'default' => 'de']],
        'version' => ['label' => 'LLL:EXT:dv_education_downloads/Resources/Private/Language/locallang_db.xlf:field.version', 'config' => ['type' => 'input', 'size' => 20, 'max' => 50]],
        'valid_from' => ['label' => 'LLL:EXT:dv_education_downloads/Resources/Private/Language/locallang_db.xlf:field.valid_from', 'config' => ['type' => 'datetime', 'format' => 'date']],
        'valid_until' => ['label' => 'LLL:EXT:dv_education_downloads/Resources/Private/Language/locallang_db.xlf:field.valid_until', 'config' => ['type' => 'datetime', 'format' => 'date']],
        'file' => ['label' => 'LLL:EXT:dv_education_downloads/Resources/Private/Language/locallang_db.xlf:field.file', 'config' => ['type' => 'file', 'maxitems' => 1, 'required' => true]],
    ],
];
