<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Wacon.Csv2html',
            'Html',
            [
                'Import' => 'list'
            ],
            // non-cacheable actions
            [
                'Import' => ''
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    html {
                        iconIdentifier = csv2html-plugin-html
                        title = LLL:EXT:csv2html/Resources/Private/Language/locallang_db.xlf:tx_csv2html_html.name
                        description = LLL:EXT:csv2html/Resources/Private/Language/locallang_db.xlf:tx_csv2html_html.description
                        tt_content_defValues {
                            CType = list
                            list_type = csv2html_html
                        }
                    }
                }
                show = *
            }
       }'
    );
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		
			$iconRegistry->registerIcon(
				'csv2html-plugin-html',
				\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
				['source' => 'EXT:csv2html/Resources/Public/Icons/user_plugin_html.svg']
			);
		
    }
);
