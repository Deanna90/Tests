<?php
namespace Page;
use AcceptanceTester;

class PopupLighting_FixtureMapsUpdate extends AcceptanceTester
{
    public static function URL($id)                { return parent::$URL_UserAccess."/popup-lighting-fixture-map/update?id=$id";}
    public static $Title                           = 'h1';
    
    public static function BuildingTypeButton()      { return \Page\PopupLighting_BuildingTypesList::BuildingTypeButton;}
    public static function DeerHourButton()          { return \Page\PopupLighting_BuildingTypesList::DeerHourButton;}
    public static function FixtureMapButton()        { return \Page\PopupLighting_BuildingTypesList::FixtureMapButton;}
    
    public static $UpdateButton                    = '[type=submit].btn-green';
   
    public static $TechnologyTypeSelect            = '#popuplightingfixturemap-technology_type';
    public static $TechnologyTypeOption            = '#popuplightingfixturemap-technology_type option';
    
    public static $ReplacementLightingNameField    = '#popuplightingfixturemap-replacement_lighting_name';
    public static $ReplacementLightingWattageField = '#popuplightingfixturemap-replacement_lighting_wattage';
    public static $ExistingLightingNameField       = '#popuplightingfixturemap-existing_lighting_name';
    public static $ExistingLightingWattageField    = '#popuplightingfixturemap-existing_lighting_wattage';
    public static $DescriptionField                = '#popuplightingfixturemap-description';
    
    public static $ReplacementLightingNameLabel    = '[for=popuplightingfixturemap-replacement_lighting_name]';
    public static $ReplacementLightingWattageLabel = '[for=popuplightingfixturemap-replacement_lighting_wattage]';
    public static $ExistingLightingNameLabel       = '[for=popuplightingfixturemap-existing_lighting_name]';
    public static $ExistingLightingWattageLabel    = '[for=popuplightingfixturemap-existing_lighting_wattage]';
    public static $DescriptionLabel                = '[for=popuplightingfixturemap-description]';
    public static $TechnologyTypeSelectLabel       = '[for=popuplightingfixturemap-technology_type]';
}
