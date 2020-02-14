<?php

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['waconcsv2html_html'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    // plugin signature: <extension key without underscores> '_' <plugin name in lowercase>
    'waconcsv2html_html',
    // Flexform configuration schema file
    'FILE:EXT:wacon_csv2html/Configuration/FlexForms/Import.xml'
);