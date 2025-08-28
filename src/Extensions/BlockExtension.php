<?php

namespace Toast\SilverstripeSVG\Extensions;

use SilverStripe\Core\Extension;
use Toast\SilverstripeSVG\Helpers\Helper;

class BlockExtension extends Extension
{
    public function SVG($fileName)
    {
       return Helper::renderSVG($this->owner,$fileName);
    }
}
