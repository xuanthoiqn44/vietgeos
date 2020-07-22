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

jimport('mavik.thumb.resizetype.abstract');

/**
 * Fit area
 */
class MavikThumbResizeFit extends MavikThumbResizeType {

    protected function getDefaultDimension(MavikThumbInfo $info, $width, $height)
    {
            if (!$height || $info->original->width/$width > $info->original->height/$height) {
                    $defoultSize = 'w';
            } else {
                    $defoultSize = 'h';
            }
            return $defoultSize;
    }        
}

?>
