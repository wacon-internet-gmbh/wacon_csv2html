<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Wacon.WaconCsv2html',
            'Html',
            'CSV to HTML'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('wacon_csv2html', 'Configuration/TypoScript', 'WACON csv2html');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_csv2html_domain_model_import', 'EXT:wacon_csv2html/Resources/Private/Language/locallang_csh_tx_csv2html_domain_model_import.xlf');

    }
);
