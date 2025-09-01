<?php

declare(strict_types=1);

use Davitec\DvEducationDownloads\Controller\DownloadController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

$GLOBALS['TYPO3_CONF_VARS']['FE']['cacheHash']['excludedParameters'] = array_merge(
    $GLOBALS['TYPO3_CONF_VARS']['FE']['cacheHash']['excludedParameters'] ?? [],
    [
        'tx_dveducationdownloads_downloadlist[searchTerm]',
        'tx_dveducationdownloads_downloadlist[documentType]',
        'tx_dveducationdownloads_downloadlist[language]',
        'tx_dveducationdownloads_downloadlist[action]',
        'tx_dveducationdownloads_downloadlist[controller]',
        'tx_dveducationdownloads_downloadlist[__referrer]',
        'tx_dveducationdownloads_downloadlist[__referrer][@extension]',
        'tx_dveducationdownloads_downloadlist[__referrer][@controller]',
        'tx_dveducationdownloads_downloadlist[__referrer][@action]',
        'tx_dveducationdownloads_downloadlist[__referrer][@request]',
        'tx_dveducationdownloads_downloadlist[__trustedProperties]',
    ],
);

ExtensionUtility::configurePlugin(
    'DvEducationDownloads',
    'DownloadList',
    [DownloadController::class => 'list'],
    [DownloadController::class => 'list'],
    ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);
