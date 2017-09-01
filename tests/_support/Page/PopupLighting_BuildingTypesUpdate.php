<?php
namespace Page;

class PopupLighting_BuildingTypesUpdate extends PopupLighting_BuildingTypesList
{
    public static function URL($id)       {  return parent::$URL_UserAccess."/popup-lighting-building-type/update?id=$id";}
    public static $Title                  = 'h1';
    
    public static $BuildingTypeButton   = parent::BuildingTypeButton;
    public static $DeerHourButton       = parent::DeerHourButton;
    public static $FixtureMapButton     = parent::FixtureMapButton;
    
    public static $UpdateButton           = '[type=submit].btn-green';
   
    
    public static $NameField              = '#popuplightingbuildingtype-name';
    
    public static $NameLabel              = '[for=popuplightingbuildingtype-name]';
}