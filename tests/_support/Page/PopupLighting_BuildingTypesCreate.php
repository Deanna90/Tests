<?php
namespace Page;

class PopupLighting_BuildingTypesCreate extends \AcceptanceTester
{
    public static function URL()          {  return parent::$URL_UserAccess.'/popup-lighting-building-type/create';}
    public static $Title                  = 'h1';
    
    public static function BuildingTypeButton()      { return \Page\PopupLighting_BuildingTypesList::BuildingTypeButton;}
    public static function DeerHourButton()          { return \Page\PopupLighting_BuildingTypesList::DeerHourButton;}
    public static function FixtureMapButton()        { return \Page\PopupLighting_BuildingTypesList::FixtureMapButton;}
    
    public static $CreateButton           = '[type=submit][class*=success]';
   
    
    public static $NameField              = '#popuplightingbuildingtype-name';
    
    public static $NameLabel              = '[for=popuplightingbuildingtype-name]';
}
