<?php
namespace Page;

class AuditGroupList extends \AcceptanceTester
{
    public static function URL()     { return parent::$URL_UserAccess.'/audit-group/index';}

    const Energy_AuditGroup              = 'Energy';
    const General_AuditGroup             = 'General';
    const PollutionPrevention_AuditGroup = 'Pollution Prevention';
    const SolidWaste_AuditGroup          = 'Solid Waste';
    const Transportation_AuditGroup      = 'Transportation';
    const Wastewater_AuditGroup          = 'Wastewater';
    const Water_AuditGroup               = 'Water';
    const Community_AuditGroup           = 'Community';
    
    public static $Title                         = 'h1';
    public static $AuditGroupRow                 = 'table[class*=table] tbody>tr';
    public static $SummaryCount                  = '.summary>b:last-of-type';
    
   
    public static $IdLinkHead               = 'table[class*=table] tr>th:first-of-type a';
    public static $NameLinkHead             = 'table[class*=table] tr>th:nth-of-type(2) a';
    public static $CreatedLinkHead          = 'table[class*=table] tr>th:nth-of-type(3) a';
    public static $UpdatedLinkHead          = 'table[class*=table] tr>th:nth-of-type(4) a';
    public static $StatusLinkHead           = 'table[class*=table] tr>th:nth-of-type(5) a';
    public static $ActionsHead              = 'table[class*=table] tr>th:nth-of-type(6)';
    
    
    public static function IdLine($row)           { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function NameLine($row)         { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function CreatedLine($row)      { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function UpdatedLine($row)      { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(4)"; }
    public static function StatusLine($row)       { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(5)"; }
    public static function UpdateButtonLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Update]"; }
    public static function DeleteButtonLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Delete]"; }


}
