<?php
namespace Page;

class SavingAreaCreate extends \AcceptanceTester
{
    public static function URL()          { return parent::$URL_UserAccess."/saving-area/create";}
    public static $Title                  = 'h1';
    
    public static $CreateButton           = '[type=submit][class*=success]';
    
    public static $NameField                        = '#savingarea-name';
    public static $UnitsField                       = '#savingarea-units';
    public static $ShortUnitsField                  = '#savingarea-short_units';
    public static $MoneyConversionRateField         = '#savingarea-money_conversion_rate';
    public static $VisualUnitsField                 = '#savingarea-visual_units';
    public static $VisualUnitsConversionRateField   = '#savingarea-visual_units_conversion_rate';
    public static $VisualNameField                  = '#savingarea-visual_name';
    public static $ChartColorField                  = '#savingarea-chart_color';
    
    public static $ImageFileUpload                  = '#savingarea-imagefile';
    
    public static $StatusSelect                     = '#savingarea-status';
    public static $HasVisualRepresentationSelect    = '#savingarea-has_visual_representation';
    
    //Labels
    public static $NameLabel                        = '[for=savingarea-name]';
    public static $UnitsLabel                       = '[for=savingarea-units]';
    public static $ShortUnitsLabel                  = '[for=savingarea-short_units]';
    public static $MoneyConversionRateLabel         = '[for=savingarea-money_conversion_rate]';
    public static $VisualUnitsLabel                 = '[for=savingarea-visual_units]';
    public static $VisualUnitsConversionRateLabel   = '[for=savingarea-visual_units_conversion_rate]';
    public static $VisualNameLabel                  = '[for=savingarea-visual_name]';
    public static $ChartColorLabel                  = '[for=savingarea-chart_color]';
    
    public static $ImageFileUploadLabel               = '[for=savingarea-imagefile]';
    
    public static $StatusSelectLabel                  = '[for=savingarea-status]';
    public static $HasVisualRepresentationSelectLabel = '[for=savingarea-has_visual_representation]';
    
}
