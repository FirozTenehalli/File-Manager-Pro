<?php

/**
 * General Helper class has methods that provide general functions and useful tools
 *
 * PHP version 7
 *
 * LICENSE: This source file is subject to version 7.1 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/7_1.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category  General_Helper
 * @package   Helper
 * @author    Original Author <kushal.r@fashalot.com>
 * @author    Another Author <ftennali@katalysttech.com>
 * @copyright 2018-2019 
 * @license   http://www.php.net/license/3_01.txt  PHP License 7.1
 * @version   SVN: 1.1
 * @link      http://fashalot/app/Helper
 * @see       NetOther, Net_Sample::Net_Sample()
 * @since     File available since Release 1.0.1
 */

namespace App\Helpers;
use Exception;

/**
 * General Helper class which having member function and helper classes
 * 
 * @category  General_Helper
 * @package   Helper
 * @author    Original Author <firozrmc@gmail.com>
 * @author    Another Author <firozrmc@gmail.com>
 * @copyright 2018-2019 The Katalysttech Group
 * @license   http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link      http://files-manager-pro/app/Helper
 * */
class GeneralHelper {

    /**
     * Function returns the category of the file
     * 
     * @param \Illuminate\Http\Request $file_extention file extention type
     * 
     * @return String category
     */
    public static function getFileCategory($file_extention) 
    {
        switch($file_extention){
            case 'jpg':
            case 'png':
                return 'image';
            case 'mp4':
                return 'video';
            case 'mp3':
                return 'music';
            case 'pdf':
                return 'documents';
            default:
                return false;
        }
    }
}
