<?php
namespace Page;

class WeightPointsUpdate extends \AcceptanceTester
{
    public static function URL($id)        { return parent::$URL_UserAccess."/measure-weight-points/update?id=$id";}
    
    public static $Title                   = 'h1';
     
    public static $UpdateButton            = '[type=submit].btn-green';
    
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
}
