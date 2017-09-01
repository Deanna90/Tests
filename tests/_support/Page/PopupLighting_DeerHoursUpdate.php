<?php
namespace Page;

class PopupLighting_DeerHoursUpdate extends PopupLighting_BuildingTypesList
{
    public static function URL($id)        { return parent::$URL_UserAccess."/popup-lighting-deer-hour/update?id=$id";}
    public static $Title                   = 'h1';
    
    public static $BuildingTypeButton      = parent::BuildingTypeButton;
    public static $DeerHourButton          = parent::DeerHourButton;
    public static $FixtureMapButton        = parent::FixtureMapButton;
    
    public static $UpdateButton            = '[type=submit].btn-green';
   
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
