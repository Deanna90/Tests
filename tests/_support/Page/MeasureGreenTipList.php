<?php
namespace Page;

class MeasureGreenTipList extends \AcceptanceTester
{
    public static function URL()        { return parent::$URL_UserAccess.'/green-tip/index';}
    public static function URL_SelectedMeasure($measureId)  { return parent::$URL_UserAccess."/green-tip/index?measure_id=$measureId";}
    public static $Title                = 'h1';
    public static $MeasureRow           = 'table[class*=table] tbody>tr';
    
    public static $CreateGreenTipButton          = 'a.btn-green-lite';
    public static $ApplyFiltersButton            = 'button.btn-green-outline[type=submit]';
    public static $ClearAllFiltersButton         = 'button.btn-green-outline:not([type])';
    
    public static $FilterTitle                   = 'p:first-of-type.green-title';
    public static $SearchTitle                   = 'p:nth-of-type(3).green-title';
    public static $FilterByProgramSelect         = '#program-id';
    
    public static $SearchByKeywordField          = '#dynamicmodel-description';
    public static $SearchByMeasureNumberField    = '#dynamicmodel-id';
    
    public static $SelectedFilterByProgramOption = '#program-id [selected]';
    
    public static $FilterByProgramOption         = '#program-id option';
    
    public static function filterByProgramSelectOption($number)       { return "#program-id option:nth-of-type($number)";}
    
    public static $FilterByProgramLabel         = 'p:nth-last-of-type(3).p-label';
    public static $SearchByKeywordLabel         = 'p:nth-of-type(2).p-label';
    public static $SearchByMeasureNumberLabel   = 'p:nth-of-type(4).p-label';
    
   
    public static $IdLinkHead                   = 'table[class*=table] tr>th:first-of-type';
    public static $MeasureLinkHead              = 'table[class*=table] tr>th:nth-of-type(2) a';
    public static $DescriptionLinkHead          = 'table[class*=table] tr>th:nth-of-type(3) a';
    public static $ProgramsHead                 = 'table[class*=table] tr>th:nth-of-type(4) a';
    public static $ActionsHead                  = 'table[class*=table] tr>th:nth-of-type(5) a';
    
    public static function IdLine($row)              { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function MeasureLine($row)         { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function DescriptionLine($row)     { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function ProgramsLine($row)        { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(4)"; }
    public static function UpdateButtonLine($row)    { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Update]"; }
    public static function DeleteButtonLine($row)    { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Delete]"; }
    
    //By description value
    public static function IdLine_ByMeasureDescValue($measDesc)              { return "//table[@class='table-striped custom-table']//tbody/tr[contains(td[2]/text(), '$measDesc')]/td[1]"; }
    public static function MeasureLine_ByMeasureDescValue($measDesc)         { return "//table[@class='table-striped custom-table']//tbody/tr[contains(td[2]/text(), '$measDesc')]/td[2]"; }
    public static function DescriptionLine_ByMeasureDescValue($measDesc)     { return "//table[@class='table-striped custom-table']//tbody/tr[contains(td[2]/text(), '$measDesc')]/td[3]"; }
    public static function ProgramsLine_ByMeasureDescValue($measDesc)        { return "//table[@class='table-striped custom-table']//tbody/tr[contains(td[2]/text(), '$measDesc')]/td[4]"; }
    public static function UpdateButtonLine_ByMeasureDescValue($measDesc)    { return "//table[@class='table-striped custom-table']//tbody/tr[contains(td[2]/text(), '$measDesc')]//*[@title='Update']"; }
    public static function DeleteButtonLine_ByMeasureDescValue($measDesc)    { return "//table[@class='table-striped custom-table']//tbody/tr[contains(td[2]/text(), '$measDesc')]//*[@title='Delete']"; }

}
