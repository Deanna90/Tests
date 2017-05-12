<?php
namespace Page;

class WeightPointsCreate extends \AcceptanceTester
{
    public static function URL_YesOrNo($idState)           {  return parent::$URL_UserAccess."/measure-weight-points/create?state_id=$idState&type=1";}
    public static function URL_Sections($idState)          {  return parent::$URL_UserAccess."/measure-weight-points/create?state_id=$idState&type=2";}
    public static $Title                   = 'h1';
     
    public static $CreateButton            = '[type=submit][class*=success]';
    
    public static $NameField               = '#measureweightpoints-name';
    public static $PointsField             = '#measureweightpoints-points';
    public static $SectionsField           = '#measureweightpoints-sections';
    
    public static $TypeSelect              = '#measureweightpoints-type';
    public static $SelectedTypeOption      = '#measureweightpoints-type [selected]';
    public static $TypeOption              = '#measureweightpoints-type option';
    
    public static $NameLabel               = '[for=measureweightpoints-name]';
    public static $PointsLabel             = '[for=measureweightpoints-points]';
    public static $SectionsLabel           = '[for=measureweightpoints-sections]';
    public static $NameErrorHelpBlock      = '#measureweightpoints-name+.help-block';
    public static $TypeSelectLabel         = '[for=measureweightpoints-type]';
    public static $PointsErrorHelpBlock    = '#measureweightpoints-points+.help-block';
    public static $SectionsErrorHelpBlock  = '#measureweightpoints-sections+.help-block';
    
    public static function selectTypeOption($number) { return "#measureweightpoints-type option:nth-of-type($number)";}

}
