<?php
namespace Page;

class EssentialCriteriaList extends \AcceptanceTester
{
    public static function URL()          { return parent::$URL_UserAccess.'/essential-criteria/index';}
    public static $Title                = 'h1';
    public static $ECRow                = 'table[class*=table] tbody>tr';
    
    public static $CreateECButton               = 'a.btn-green-outline';
    public static $ApplyFiltersButton           = 'button.btn-green-outline[type=submit]';
    public static $ClearAllFiltersButton        = 'button.btn-green-outline:not([type])';
    
    public static $FilterTitle                  = 'p:first-of-type.green-title';
    public static $SearchTitle                  = 'p:nth-of-type(3).green-title';
    public static $FilterByStateSelect          = '#state_id';
    public static $FilterByStatusSelect         = '#status';
    
    public static $SearchByMeasureNumberField   = '#dynamicmodel-id';
    
    public static $SelectedFilterByStatusOption = '#status [selected]';
    public static $SelectedFilterByStateOption  = '#state_id [selected]';
    
    public static $FilterByStatusOption         = '#status option';
    public static $FilterByStateOption          = '#state_id option';
    
    public static function filterByStatusSelectOption($number)  { return "#status option:nth-of-type($number)";}
    public static function filterByStateSelectOption($number)   { return "#state_id option:nth-of-type($number)";}
    
    public static $FilterByStatusLabel          = 'p:last-of-type.p-label';
    public static $FilterByStateLabel           = 'p:nth-last-of-type(2).p-label';
    public static $SearchByMeasureNumberLabel   = 'p:nth-of-type(2).p-label';
   
    public static $IdLinkHead                   = 'table[class*=table] tr>th:first-of-type';
    public static $NameHead                     = 'table[class*=table] tr>th:nth-of-type(2) a';
    public static $ActionsHead                  = 'table[class*=table] tr>th:nth-of-type(3) a';
    
    public static function IdLine($row)           { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function NameLine($row)         { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function ManageButtonLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row) a"; }
    
}
