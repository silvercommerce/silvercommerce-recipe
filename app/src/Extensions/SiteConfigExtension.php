<?php

namespace App\Extensions;

use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\CheckboxField;

class SiteConfigExtension extends DataExtension
{
    private static $db = [
        'TileBackground' => 'Boolean'
    ];

    private static $has_one = [
        'Logo' => Image::class,
        'Icon' => Image::class,
        'Background' => Image::class
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldsToTab(
            'Root.Main',
            [
                UploadField::create(
                    "Logo",
                    "Site Logo"
                ),
                UploadField::create(
                    "Icon",
                    "Site Icon"
                )->setRightTitle('Used for favicon and touch icons - this must be a .png or .gif')
                ->setAllowedExtensions(['png', 'gif']),
                UploadField::create(
                    "Background",
                    "Site Background"
                ),
                CheckboxField::create("TileBackground")
            ]
        );
    }
}
