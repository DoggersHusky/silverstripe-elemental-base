<?php

namespace BucklesHusky\ElementalBase\Extensions;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;
use Heyday\ColorPalette\Fields\ColorPaletteField;
use SilverStripe\Forms\CheckboxField;

class BaseElemetExt extends DataExtension {
    
    private static $controller_template = 'ElementHolder';
    
    private static $db= [
        'BackgroundColour' => 'Text',
        'EnableBackgroundColour' => 'Boolean'
    ];
    
    public function updateCMSFields(FieldList $fields) {
        
        $fields->addFieldToTab('Root.Settings', CheckboxField::create('EnableBackgroundColour','Enable Background Colour?'));
        
        $fields->addFieldToTab(
            'Root.Settings',
            ColorPaletteField::create(
                'BackgroundColour',
                'Background Colour',
                array(
                    'White' => '#fff',
                    'Black' => '#000',
                    'Orange' => '#ff6c00',
                    'Green' => '#83c909',
                    'Blue' => '#43adff',
                    'Pink' => '#ff5fa3',
                    'LightOrange' => '#fc9e38',
                    'OffBlue' => '#00b3c1',
                    'Purple' => '#ff276e'
                )
            )
        );
        
    }
}
