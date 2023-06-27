<?php

namespace Toast\SilverstripeSVG\Extensions;

use Toast\SilverstripeSVG\Helpers\Helper;
use SilverStripe\ORM\DataExtension;

class BlockExtension extends DataExtension
{
    public function SVG($fileName)
    {
       return Helper::renderSVG($this->owner,$fileName);
    }
}