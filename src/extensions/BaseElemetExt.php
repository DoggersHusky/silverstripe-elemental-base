<?php

namespace BucklesHusky\ElementalBase\Extensions;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;
use Heyday\ColorPalette\Fields\ColorPaletteField;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\DropdownField;
use SilverStripe\Forms\Tab;
use SilverStripe\Forms\TabSet;
use SilverStripe\Forms\TextField;

class BaseElemetExt extends DataExtension {
    
    private static $controller_template = 'ElementHolder';
    
    private static $db= [
        'BackgroundColour' => 'Text',
        'EnableBackgroundColour' => 'Boolean',
        'BackgroundPosition'=>'Enum("left top,left center,left bottom,right top,right center,right bottom,center top,center center,center bottom","left top")',
        'BackgroundParalax'=>'Boolean',
        'MarginTop' => 'Boolean',
        'MarginBottom' => 'Boolean',
        'AddBorderBottom' => 'Boolean',
        'BorderBottomColour' => 'Text',
        'RemoveBottomPadding' => 'Boolean',
        'RemoveTopPadding' => 'Boolean'
    ];
    
    private static $has_one = [
        'BackgroundImage' => Image::class
    ];
    
    private static $owns = [
        'BackgroundImage'
    ];
    
    public function updateCMSFields(FieldList $fields) {
        
        
        $fields->removeByName('MarginTop');
        $fields->removeByName('MarginBottom');
        $fields->removeByName('RemoveTopPadding');
        $fields->removeByName('RemoveBottomPadding');
        $fields->removeByName('ExtraClass');
        $fields->removeByName('EnableBackgroundColour');
        $fields->removeByName('BackgroundColour');
        $fields->removeByName('BackgroundImage');
        $fields->removeByName('BackgroundPosition');
        $fields->removeByName('BackgroundParalax');
        $fields->removeByName('AddBorderBottom');
        $fields->removeByName('BorderBottomColour');
        
        $fields->addFieldsToTab('Root.Settings', array(
            TabSet::create('SettingsTabs',
                Tab::create('CssClass',
                    TextField::create('ExtraClass','Custom CSS classes')
                ),
                Tab::create('MarginPadding', 
                    CheckboxField::create('MarginTop', 'Add margin to the top of this element?'),
                    CheckboxField::create('MarginBottom', 'Add margin to the bottom of this element?'),
                    CheckboxField::create('RemoveTopPadding', 'Remove top padding?'),
                    CheckboxField::create('RemoveBottomPadding', 'Remove bottom padding?')
                ),
                Tab::create('BackgroundColor', 
                    CheckboxField::create('EnableBackgroundColour','Enable Background Colour?'),
                    ColorPaletteField::create(
                        'BackgroundColour',
                        'Background Colour',
                        array(
                            '#fff' => '#fff',
                            '#000' => '#000',
                            '#ff6c00' => '#ff6c00',
                            '#83c909' => '#83c909',
                            '#43adff' => '#43adff',
                            '#ff5fa3' => '#ff5fa3',
                            '#fc9e38' => '#fc9e38',
                            '#00b3c1' => '#00b3c1',
                            '#ff276e' => '#ff276e'
                        )
                    )
                ),
                Tab::create('BackgroundImage',
                    UploadField::create('BackgroundImage','Background Image'),
                    DropdownField::create('BackgroundPosition', 'Background Position', $this->owner->dbObject('BackgroundPosition')->enumValues(),'left top'),
                    CheckboxField::create('BackgroundParalax','Turn background paralax on?')
                ),
                Tab::create('Border', 
                    CheckboxField::create('AddBorderBottom', 'Add a border to the bottom of this element?'),
                    ColorPaletteField::create(
                        'BorderBottomColour',
                        'Bottom Border Colour',
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
                )
            )
        ));
        
        
    }
}
