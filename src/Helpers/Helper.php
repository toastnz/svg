<?php

namespace Toast\SilverstripeSVG\Helpers;

use SilverStripe\Core\Config\Config;
use SilverStripe\ORM\FieldType\DBField;
use SilverStripe\ORM\FieldType\DBHTMLText;

class Helper 
{
    static function renderSVG($el, $fileName)
    {
        // get base_path from config
        $folderPath = Config::inst()->get('Page', 'svg_base_path');
        $extension = '.svg';
        $baseFilePath = BASE_PATH . $folderPath . $fileName . $extension;

         if (!file_exists( $baseFilePath )) {
             return false;
         }
         $out = new \DOMDocument();
         $out->load($baseFilePath);
 
         if (!is_object($out) || !is_object($out->documentElement)) {
             return false;
         }
 
         $root = $out->documentElement;
         
         foreach ($out->getElementsByTagName('svg') as $element) {
             if ($el->id) {
                 $element->setAttribute('id', $el->id);
             } else {
                 if ($element->hasAttribute('id')) {
                     $element->removeAttribute('id');
                 }
             }
         }
 
         $out->normalizeDocument();
         
         $html = DBField::create_field(DBHTMLText::class, $out->saveHTML());
 
         return $html;
    }
}