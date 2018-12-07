<?php

namespace BucklesHusky\ElementalBase\Extensions;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;

class BaseElemetExt extends DataExtension {
    
    private static $controller_template = 'ElementHolder';
    
    public function updateCMSFields(\SilverStripe\Forms\FieldList $fields) {
        $fields = parent::updateCMSFields($fields);
    }
}
