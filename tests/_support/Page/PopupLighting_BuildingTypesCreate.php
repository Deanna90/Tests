<?php
namespace Page;

class PopupLighting_BuildingTypesCreate extends PopupLighting_BuildingTypesList
{
    public static function URL()          {  return parent::$URL_UserAccess.'/popup-lighting-building-type/create';}
    public static $Title                  = 'h1';
    
    public static $BuildingTypeButton   = parent::BuildingTypeButton;
    public static $DeerHourButton       = parent::DeerHourButton;
    public static $FixtureMapButton     = parent::FixtureMapButton;
    
    public static $CreateButton           = '[type=submit][class*=success]';
   
    
    public static $NameField              = '#popuplightingbuildingtype-name';
    
    public static $NameLabel              = '[for=popuplightingbuildingtype-name]';
}
