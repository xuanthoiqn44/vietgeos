<?php
/**
 * Library for Joomla for creating thumbnails of images
 * 
 * @package Mavik Thumb
 * @version 1.0
 * @author Vitaliy Marenkov <admin@mavik.com.ua>
 * @copyright 2012 Vitaliy Marenkov
 * @license GNU General Public License version 2 or later; see LICENSE.txt
 */

defined( '_JEXEC' ) or die;

/**
 *  Information about image
 */
class MavikThumbImageInfo {
    var $url = null;
    var $path = null;
    var $width = null;
    var $height = null;
    var $size = null;
    var $type = null;
    var $local = null;
    /**
     * Real width. Only for thumbnail.
     * 
     * @var int 
     */
    var $realWidth = null;
    /**
     * Real height. Only for thumbnail.
     * 
     * @var int 
     */    
    var $realHeight = null;
}
?>
