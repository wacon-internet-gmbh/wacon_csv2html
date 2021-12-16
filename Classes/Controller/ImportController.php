<?php
namespace Wacon\WaconCsv2html\Controller;


/***
 *
 * This file is part of the "wacon_csv2html" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 Kerstin Schmitt <info@wacon.de>, WACON Internet GmbH
 *
 ***/
/**
 * ImportController
 */
class ImportController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{


    /**
     * action list
     * 
     * @return void
     */
    public function listAction()
    {

       // $utf8 = true;
        $col_delimiter = ';';
        $text_delimiter = '"';
        $csvcode='utf-8';
        if($this->settings['colDelimiter'])$col_delimiter =$this->settings['colDelimiter'];
        if($this->settings['textDelimiter'])$text_delimiter =$this->settings['textDelimiter'];
        if($this->settings['headerData'])$headerData =$this->settings['headerData'];
        if($this->settings['csvCode'])$csvcode =$this->settings['csvCode'];
        if($this->settings['ownHeader']){
            $ownHeaderData =explode($col_delimiter, $this->settings['ownHeader']);
            $this->view->assign('ownHeaderData', $ownHeaderData);
        }
        if($this->settings['tableClass'])$this->view->assign('tableClass', $this->settings['tableClass']);
        if($this->settings['csvFile']) {

            $resourceFactory = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Resource\\ResourceFactory');
            $csvItems = array();
            $csvItemUids = $this->settings['csvFile'];
           
         
            $csvItemUids = explode(',', $csvItemUids);

            if (!empty($csvItemUids)) {
                $arraySize = sizeof($csvItemUids);
                for ($i = 0; $i < $arraySize; $i++) {

                    $itemUid = $csvItemUids[$i];

                    $fileReference = $resourceFactory->getFileReferenceObject($itemUid);
                    \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($fileReference);
                    //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->settings['csvFile']);
                    $fileArray = $fileReference->getProperties();
                    $file=$fileArray['identifier'];
                    \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($file);
                    array_push($csvItems, $fileArray);
                }
            }
     
            if (($handle = fopen('fileadmin/'.$file, "r")) !== FALSE) {
                $i=0;
                while (($csv_array = fgetcsv ($handle, 0 , $col_delimiter, $text_delimiter)) !== FALSE ) {
                    if($i==0&&$headerData==1)
                        $ownHeaderData = mb_convert_encoding ( $csv_array, 'utf-8',$csvcode);
                            else
                    $imports[] =mb_convert_encoding ( $csv_array, 'utf-8',$csvcode);
                            $i+=1;
                }
            }
        }

//        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($imports);

        $this->view->assign('imports', $imports);
        $this->view->assign('ownHeaderData', $ownHeaderData);
    }
}
