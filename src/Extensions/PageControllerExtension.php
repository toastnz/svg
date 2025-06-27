<?php

namespace Toast\SilverstripeSVG\Extensions;

use SilverStripe\Core\Config\Config;
use SilverStripe\ORM\FieldType\DBField;
use SilverStripe\ORM\FieldType\DBHTMLText;
use SilverStripe\ORM\DataExtension;

class PageControllerExtension extends DataExtension
{
    public function SVG($fileName)
    {
        // get base_path from config
        $folderPath = Config::inst()->get('Page', 'svg_base_path');
        $basePublicPath = Director::publicFolder();
        $extension = '.svg';
        $baseFilePath = $$basePublicPath . $folderPath . $fileName . $extension;

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
             if ($this->owner->id) {
                 $element->setAttribute('id', $this->owner->id);
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
