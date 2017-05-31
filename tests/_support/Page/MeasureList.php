<?php
namespace Page;

class MeasureList extends \AcceptanceTester
{
    public static function URL()        { return parent::$URL_UserAccess.'/measure/index';}
    public static $Title                = 'h1';
    public static $MeasureRow           = 'table[class*=table] tbody>tr';
    
    public static $CreateMeasureButton          = 'a.btn-green-outline';
    public static $ApplyFiltersButton           = 'button.btn-green-outline[type=submit]';
    public static $ClearAllFiltersButton        = 'button.btn-green-outline:not([type])';
    
    public static $FilterTitle                  = 'p:first-of-type.green-title';
    public static $SearchTitle                  = 'p:nth-of-type(3).green-title';
    public static $FilterByStateSelect          = '#state_id';
    public static $FilterByAuditGroupSelect     = '#audit-group-id';
    public static $FilterByAuditSubgroupSelect  = '#audit-sub-group-id';
    public static $FilterByProgramSelect        = '#program-id';
    public static $FilterByQuantitativeSelect   = '#is-quantitative';
    public static $FilterByStatusSelect         = '#status';
    
    public static $SearchByKeywordField         = '#dynamicmodel-description';
    public static $SearchByMeasureNumberField   = '#dynamicmodel-id';
    
    public static $SelectedFilterByStatusOption        = '#status [selected]';
    public static $SelectedFilterByStateOption         = '#state_id [selected]';
    public static $SelectedFilterByAuditGroupOption    = '#audit-group-id [selected]';
    public static $SelectedFilterByAuditSubgroupOption = '#audit-sub-group-id [selected]';
    public static $SelectedFilterByProgramOption       = '#program-id [selected]';
    public static $SelectedFilterByQuantitativeOption  = '#is-quantitative [selected]';
    
    public static $FilterByStatusOption         = '#status option';
    public static $FilterByStateOption          = '#state_id option';
    public static $FilterByAuditGroupOption     = '#audit-group-id option';
    public static $FilterByAuditSubgroupOption  = '#audit-sub-group-id option';
    public static $FilterByProgramOption        = '#program-id option';
    public static $FilterByQuantitativeOption   = '#is-quantitative option';
    
    public static function filterByStatusSelectOption($number)        { return "#status option:nth-of-type($number)";}
    public static function filterByStateSelectOption($number)         { return "#state_id option:nth-of-type($number)";}
    public static function filterByAuditGroupSelectOption($number)    { return "#audit-group-id option:nth-of-type($number)";}
    public static function filterByAuditSubgroupSelectOption($number) { return "#audit-sub-group-id option:nth-of-type($number)";}
    public static function filterByProgramSelectOption($number)       { return "#program-id option:nth-of-type($number)";}
    public static function filterByQuantitativeSelectOption($number)  { return "#is-quantitative option:nth-of-type($number)";}
    
    public static $FilterByStatusLabel          = 'p:last-of-type.p-label';
    public static $FilterByStateLabel           = 'p:nth-last-of-type(6).p-label';
    public static $FilterByAuditGroupLabel      = 'p:nth-last-of-type(5).p-label';
    public static $FilterByAuditSubgroupLabel   = 'p:nth-last-of-type(4).p-label';
    public static $FilterByProgramLabel         = 'p:nth-last-of-type(3).p-label';
    public static $FilterByQuantitativeLabel    = 'p:nth-last-of-type(2).p-label';
    public static $SearchByKeywordLabel         = 'p:nth-of-type(2).p-label';
    public static $SearchByMeasureNumberLabel   = 'p:nth-of-type(4).p-label';
    
   
    public static $IdLinkHead                   = 'table[class*=table] tr>th:first-of-type';
    public static $DescriptionLinkHead          = 'table[class*=table] tr>th:nth-of-type(2) a';
    public static $QuantitativeLinkHead         = 'table[class*=table] tr>th:nth-of-type(3) a';
    public static $StatusHead                   = 'table[class*=table] tr>th:nth-of-type(4) a';
    public static $ActionsHead                  = 'table[class*=table] tr>th:nth-of-type(5) a';
    public static $GreenTipsHead                = 'table[class*=table] tr>th:nth-of-type(6)';
    
    public static function IdLine($row)              { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function DescriptionLine($row)     { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function QuantitativeLine($row)    { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function StatusLine($row)          { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(4)"; }
    public static function UpdateButtonLine($row)    { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Update]"; }
    public static function CreateTipButtonLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-last-of-type>a"; }
    public static function ViewTipButtonLine($row)   { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-last-of-type>a"; }
    
    //By description value
    public static function IdLine_ByDescValue($desc)              { return "//table[@class='table-striped table-hover custom-table']//tbody/tr[contains(td[2]/text(), '$desc')]/td[1]"; }
    public static function DescriptionLine_ByDescValue($desc)     { return "//table[@class='table-striped table-hover custom-table']//tbody/tr[contains(td[2]/text(), '$desc')]/td[2]"; }
    public static function StatusLine_ByDescValue($desc)          { return "//table[@class='table-striped table-hover custom-table']//tbody/tr[contains(td[2]/text(), '$desc')]/td[4]"; }
    public static function UpdateButtonLine_ByDescValue($desc)    { return "//table[@class='table-striped table-hover custom-table']//tbody/tr[contains(td[2]/text(), '$desc')]//a[@title='Update']"; }
    public static function CreateTipButtonLine_ByDescValue($desc) { return "//table[@class='table-striped table-hover custom-table']//tbody/tr[contains(td[2]/text(), '$desc')]/td[6]/a"; }
    public static function ViewTipButtonLine_ByDescValue($desc)   { return "//table[@class='table-striped table-hover custom-table']//tbody/tr[contains(td[2]/text(), '$desc')]/td[6]/a"; }
    
    const ViewTipButtonName   = "View"; 
    const CreateTipButtonName = "Create"; 
}
