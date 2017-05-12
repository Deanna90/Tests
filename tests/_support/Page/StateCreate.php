<?php
namespace Page;

class StateCreate extends \AcceptanceTester
{
    public static function URL()           {  return parent::$URL_UserAccess.'/state/create';}
    public static $Title                   = 'h1';
     
    public static $CreateButton            = '[type=submit][class*=success]';
    
    public static $NameField               = '#state-name';
    public static $ShortNameField          = '#state-short_name';
    
    public static $WeightedSelect          = '#state-is_weighted';
    public static $SelectedWeightedOption  = '#state-is_weighted [selected]';
    public static $WeightedOption          = '#state-is_weighted option';
    
    public static $NameLabel               = '[for=state-name]';
    public static $ShortNameLabel          = '[for=state-short_name]';
    public static $ShortNameErrorHelpBlock = '#state-short_name+.help-block';
    public static $WeightedSelectLabel     = '[for=state-is_weighted]';
    public static $NameErrorHelpBlock      = '#state-name+.help-block';
    
    public static function selectWeightedOption($number) { return "#state-is_weighted option:nth-of-type($number)";}


}
