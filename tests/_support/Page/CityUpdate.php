<?php
namespace Page;

class CityUpdate
{
    public static function URL($id)       { return "/master-admin/city/update?id=$id";}
    public static $Title                  = 'h1';
    
    public static $UpdateButton           = '[type=submit][class*=primary]';
    
    public static $NameField              = '#city-name';
    public static $ZipsField              = '#city-zips';
    
    public static $StateSelect            = '#city-state_id';
    public static $SelectedStateOption    = '#city-state_id [selected]';
    public static $StateOption            = '#city-state_id option';
    
    public static $NameLabel              = '[for=city-name]';
    public static $ZipsLabel              = '[for=city-zips]';
    public static $StateSelectLabel       = '[for=city-state_id]';
    public static $NameErrorHelpBlock     = '#city-name+.help-block';
    public static $StateErrorHelpBlock    = '#city-state_id+.help-block';
    public static $ZipsErrorHelpBlock     = '#city-zips~.help-block';
    public static $ZipsErrorHintBlock     = '#city-zips~.hint-block';
    
    public static function selectStateOption($number) { return "#city-state_id option:nth-of-type($number)";}


}
