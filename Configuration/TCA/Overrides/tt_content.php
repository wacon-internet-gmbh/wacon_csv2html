<?php

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['csv2html_html'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    // plugin signature: <extension key without underscores> '_' <plugin name in lowercase>
    'csv2html_html',
    // Flexform configuration schema file
    'FILE:EXT:csv2html/Configuration/FlexForms/Import.xml'
);