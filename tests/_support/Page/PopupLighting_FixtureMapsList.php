<?php
namespace Page;

class PopupLighting_FixtureMapsList extends PopupLighting_BuildingTypesList
{
    public static function URL()                  { return parent::$URL_UserAccess."/popup-lighting-fixture-map/index";}
    public static function UrlPageNumber($number) { return parent::$URL_UserAccess."/popup-lighting-fixture-map/index?page=$number"; }
    public static $Title                    = 'h1';
    public static $FixtureMapRow            = 'table[class*=table] tbody>tr';
    public static $SummaryCount             = '.summary>b:last-of-type';
    
    public static $CreateFixtureMapsButton  = '.left-column-buttons>a';
    
    //Left Menu Items
    public static $BuildingTypeButton   = parent::BuildingTypeButton;
    public static $DeerHourButton       = parent::DeerHourButton;
    public static $FixtureMapButton     = parent::FixtureMapButton;
    
   
    public static $IdLinkHead                         = 'table[class*=table] tr>th:first-of-type a';
    public static $ReplacementLightingNameLinkHead    = 'table[class*=table] tr>th:nth-of-type(2) a';
    public static $ReplacementLightingWattageLinkHead = 'table[class*=table] tr>th:nth-of-type(3) a';
    public static $ExistingLightingNameLinkHead       = 'table[class*=table] tr>th:nth-of-type(4) a';
    public static $ExistingLightingWattageLinkHead    = 'table[class*=table] tr>th:nth-of-type(5) a';
    public static $DescriptionLinkHead                = 'table[class*=table] tr>th:nth-of-type(6) a';
    public static $ActionsHead                        = 'table[class*=table] tr>th:nth-of-type(7)';
    
    public static function IdLine($row)                         { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function ReplacementLightingNameLine($row)    { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function ReplacementLightingWattageLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function ExistingLightingNameLine($row)       { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(4)"; }
    public static function ExistingLightingWattageLine($row)    { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(5)"; }
    public static function DescriptionLine($row)                { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(6)"; }
    public static function UpdateButtonLine($row)               { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Update]"; }
    public static function ViewButtonLine($row)                 { return "table[class*=table] tbody>tr:nth-of-type($row) [title=View]"; }
    public static function DeleteButtonLine($row)               { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Delete]"; }

}
