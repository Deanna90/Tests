<?php
namespace Page;

class PopupLighting_DeerHoursCreate extends \AcceptanceTester
{
    public static function URL()           {  return parent::$URL_UserAccess.'/popup-lighting-deer-hour/create';}
    public static $Title                   = 'h1';
    
    public static function BuildingTypeButton()      { return \Page\PopupLighting_BuildingTypesList::BuildingTypeButton;}
    public static function DeerHourButton()          { return \Page\PopupLighting_BuildingTypesList::DeerHourButton;}
    public static function FixtureMapButton()        { return \Page\PopupLighting_BuildingTypesList::FixtureMapButton;}
    
    public static $CreateButton            = '[type=submit][class*=success]';
   
    public static $LightingTypeSelect      = '#popuplightingdeerhour-lighting_type';
    public static $LightingTypeOption      = '#popuplightingdeerhour-lighting_type option';
    
    public static $BuildingTypeSelect      = '#popuplightingdeerhour-building_id';
    public static $BuildingTypeOption      = '#popuplightingdeerhour-building_id option';
    
    public static $BuildingSpaceSelect     = '#popuplightingdeerhour-building_space';
    public static $BuildingSpaceOption     = '#popuplightingdeerhour-building_space option';
    
    public static $HouField                = '#popuplightingdeerhour-hou';
    public static $InteractiveEffectsField = '#popuplightingdeerhour-interactive_effects';
    
    
    public static $HouLabel                 = '[for=popuplightingdeerhour-hou]';
    public static $InteractiveEffectsLabel  = '[for=popuplightingdeerhour-interactive_effects]';
    public static $LightingTypeSelectLabel  = '[for=popuplightingdeerhour-lighting_type]';
    public static $BuildingTypeSelectLabel  = '[for=popuplightingdeerhour-building_id]';
    public static $BuildingSpaceSelectLabel = '[for=popuplightingdeerhour-building_space]';
}
