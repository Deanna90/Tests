<?php
namespace Page;

class EmailQueue extends \AcceptanceTester
{
    
    public static function URL()   { return parent::$URL_UserAccess."/communication/email-queue";}

    public static $Title                         = 'h1';
    public static $RequestRow                    = 'table[class*=table] tbody>tr';
    public static $SummaryCount                  = '.summary>b:last-of-type';
    public static $EmptyListLabel                = 'tr .empty';

    public static $ExportToExcelButton           = 'a.btn-green-lite';
    public static $ApplyFiltersButton            = 'button.btn-green-outline[type=submit]';
    public static $ClearAllFiltersButton         = 'button.btn-green-outline:not([type])';
    
    public static $FilterTitle                   = 'p:first-of-type.green-title';
    public static $FilterByProgramSelect         = '#dynamicmodel-program_id';
    public static $SelectedFilterByProgramOption = '#dynamicmodel-program_id [selected]';
    public static $FilterByProgramOption         = '#dynamicmodel-program_id option';
    
    public static function filterByProgramSelectOption($number)       { return "#dynamicmodel-program_id option:nth-of-type($number)";}
    
    public static $FilterBySentDateFromField     = '#dynamicmodel-sent_from';
    public static $FilterBySentDateToField       = '#dynamicmodel-sent_to';
    public static $FilterByBusinessNameField     = '#dynamicmodel-business_name';
    
    
    
    public static function ProgramLine($row)            { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function BusinessLine($row)           { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function RecipientNameLine($row)      { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function RecipientEmailLine($row)     { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(4)"; }
    public static function SentLine($row)               { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(5)"; }
    public static function TriggerStringLine($row)      { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(6)"; }
    public static function CreatedLine($row)            { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(7)"; }
    public static function SubjectLine($row)            { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(8)"; }
    public static function ContentLine($row)            { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(9)"; }
    
}
