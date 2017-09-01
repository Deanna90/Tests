<?php
namespace Page;

class AuditSubgroupList extends \AcceptanceTester
{
    public static function URL()                  { return parent::$URL_UserAccess.'/audit-sub-group/index';}
    public static function UrlPageNumber($number) { return parent::$URL_UserAccess."/audit-sub-group/index?page=$number"; }
    
    public static $Title                         = 'h1';
    public static $AuditSubgroupRow              = 'table[class*=table] tbody>tr';
    public static $SummaryCount                  = '.summary>b:last-of-type';
    
    public static $LeftMenu_AuditorsButton           = '.filter-menu nav>li:nth-of-type(1) a';
    public static $LeftMenu_AuditOrganizationsButton = '.filter-menu nav>li:nth-of-type(2) a';
    public static $LeftMenu_AuditGroupsButton        = '.filter-menu nav>li:nth-of-type(3) a';
    public static $LeftMenu_AuditSubgroupsButton     = '.filter-menu nav>li:nth-of-type(4) a';
    
    public static $CreateAuditSubgroupButton = '.left-column-block .btn-success';
    
   
    public static $IdLinkHead               = 'table[class*=table] tr>th:first-of-type';
    public static $NameLinkHead             = 'table[class*=table] tr>th:nth-of-type(2) a';
    public static $AuditGroupLinkHead       = 'table[class*=table] tr>th:nth-of-type(3) a';
    public static $StateLinkHead            = 'table[class*=table] tr>th:nth-of-type(4) a';
    public static $CreatedLinkHead          = 'table[class*=table] tr>th:nth-of-type(5) a';
    public static $UpdatedLinkHead          = 'table[class*=table] tr>th:nth-of-type(6) a';
    public static $StatusLinkHead           = 'table[class*=table] tr>th:nth-of-type(7) a';
    public static $ActionsHead              = 'table[class*=table] tr>th:nth-of-type(8)';
    
    
    public static function IdLine($row)           { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function NameLine($row)         { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function AuditGroupLine($row)   { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function StateLine($row)        { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(4)"; }
    public static function CreatedLine($row)      { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(5)"; }
    public static function UpdatedLine($row)      { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(6)"; }
    public static function StatusLine($row)       { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(7)"; }
    public static function UpdateButtonLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Update]"; }
    public static function DeleteButtonLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Delete]"; }

    //By description value
    public static function IdLine_ByNameValue($name)           { return "//table[contains(@class, 'table-striped custom-table')]//tbody/tr[contains(td[2]/text(), '$name')]/td[1]"; }
    public static function NameLine_ByNameValue($name)         { return "//table[contains(@class, 'table-striped custom-table')]//tbody/tr[contains(td[2]/text(), '$name')]/td[2]"; }
    public static function AuditGroupLine_ByNameValue($name)   { return "//table[contains(@class, 'table-striped custom-table')]//tbody/tr[contains(td[2]/text(), '$name')]/td[3]"; }
    public static function StateLine_ByNameValue($name)        { return "//table[contains(@class, 'table-striped custom-table')]//tbody/tr[contains(td[2]/text(), '$name')]/td[4]"; }
    public static function CreatedLine_ByNameValue($name)      { return "//table[contains(@class, 'table-striped custom-table')]//tbody/tr[contains(td[2]/text(), '$name')]/td[5]"; }
    public static function UpdatedLine_ByNameValue($name)      { return "//table[contains(@class, 'table-striped custom-table')]//tbody/tr[contains(td[2]/text(), '$name')]/td[6]"; }
    public static function StatusLine_ByNameValue($name)       { return "//table[contains(@class, 'table-striped custom-table')]//tbody/tr[contains(td[2]/text(), '$name')]/td[7]"; }
    public static function UpdateButtonLine_ByNameValue($name) { return "//table[contains(@class, 'table-striped custom-table')]//tbody/tr[contains(td[2]/text(), '$name')]//a[@title='Update']"; }
    public static function DeleteButtonLine_ByNameValue($name) { return "//table[contains(@class, 'table-striped custom-table')]//tbody/tr[contains(td[2]/text(), '$name')]//a[@title='Delete']"; }
    
}
