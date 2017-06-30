<?php
namespace Page;

class PopupLighting_DeerHoursList extends PopupLighting_BuildingTypesList
{
    public static function URL()                  { return parent::$URL_UserAccess."/popup-lighting-deer-hour/index";}
    public static function UrlPageNumber($number) { return parent::$URL_UserAccess."/popup-lighting-deer-hour/index?page=$number"; }
    public static $Title                    = 'h1';
    public static $DeerHourRow              = 'table[class*=table] tbody>tr';
    public static $SummaryCount             = '.summary>b:last-of-type';
    
    public static $CreateDeerHourButton = '.left-column-buttons>a';
    
    //Left Menu Items
    public static $BuildingTypeButton   = parent::BuildingTypeButton;
    public static $DeerHourButton       = parent::DeerHourButton;
    public static $FixtureMapButton     = parent::FixtureMapButton;
    
   
    public static $IdLinkHead                 = 'table[class*=table] tr>th:first-of-type a';
    public static $TechnologyTypeHead         = 'table[class*=table] tr>th:nth-of-type(2)';
    public static $BuildingTypeLinkHead       = 'table[class*=table] tr>th:nth-of-type(3) a';
    public static $BuildingSpaceLinkHead      = 'table[class*=table] tr>th:nth-of-type(4) a';
    public static $HouLinkHead                = 'table[class*=table] tr>th:nth-of-type(5) a';
    public static $InteractiveEffectsLinkHead = 'table[class*=table] tr>th:nth-of-type(6) a';
    public static $ActionsHead                = 'table[class*=table] tr>th:nth-of-type(7)';
    
    public static function IdLine($row)                 { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function TechnologyTypeLine($row)     { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function BuildingTypeLine($row)       { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function BuildingSpaceLine($row)      { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(4)"; }
    public static function HouLine($row)                { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(5)"; }
    public static function InteractiveEffectsLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(6)"; }
    public static function UpdateButtonLine($row)       { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Update]"; }
    public static function ViewButtonLine($row)         { return "table[class*=table] tbody>tr:nth-of-type($row) [title=View]"; }
    public static function DeleteButtonLine($row)       { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Delete]"; }


}
