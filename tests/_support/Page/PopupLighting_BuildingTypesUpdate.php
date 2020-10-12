<?php
namespace Page;

class PopupLighting_BuildingTypesUpdate extends \AcceptanceTester 
{
    public static function URL($id)       {  return parent::$URL_UserAccess."/popup-lighting-building-type/update?id=$id";}
    public static $Title                  = 'h1';
    
    public static function BuildingTypeButton()      { return \Page\PopupLighting_BuildingTypesList::BuildingTypeButton;}
    public static function DeerHourButton()          { return \Page\PopupLighting_BuildingTypesList::DeerHourButton;}
    public static function FixtureMapButton()        { return \Page\PopupLighting_BuildingTypesList::FixtureMapButton;}
    
    public static $UpdateButton           = '[type=submit].btn-green';
   
    
    public static $NameField              = '#popuplightingbuildingtype-name';
    
    public static $NameLabel              = '[for=popuplightingbuildingtype-name]';
}
