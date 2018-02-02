<?php
namespace Page;

class UserList extends \AcceptanceTester
{
    public static function URL($type)                    { return parent::$URL_UserAccess."/user/index?type=$type";}
    public static function UrlPageNumber($number, $type) { return parent::$URL_UserAccess."/user/index?type=$type&page=$number"; }
    public static $Title                = 'h1';
    public static $UserRow              = 'table[class*=table] tbody>tr';
    public static $SummaryCount         = '.summary>b:last-of-type';
    public static $EmptyListLabel               = 'tr .empty';
    
    //Search
    public static $ByNameEmailSearchField   = '#filter-name';
    
    public static $CoordinatorsManageButton = '.left-column-block>div:nth-of-type(2) a';
    public static $StateAdminsManageButton  = '.left-column-block>div:nth-of-type(3) a';
    public static $InspectorsManageButton   = '.left-column-block>div:nth-of-type(4) a';
    public static $AuditorsManageButton     = '.left-column-block>div:nth-of-type(5) a';
    public static $CreateUserButton         = '.left-column-block .btn-success';
    
   
    public static $IdLinkHead               = 'table[class*=table] tr>th:first-of-type';
    public static $EmailLinkHead            = 'table[class*=table] tr>th:nth-of-type(2) a';
    public static $FirstNameLinkHead        = 'table[class*=table] tr>th:nth-of-type(3) a';
    public static $LastNameLinkHead         = 'table[class*=table] tr>th:nth-of-type(4) a';
    public static $StatusLinkHead           = 'table[class*=table] tr>th:nth-of-type(5) a';
    public static $TypeLinkHead             = 'table[class*=table] tr>th:nth-of-type(6) a';
    public static $CreatedLinkHead          = 'table[class*=table] tr>th:nth-of-type(7) a';
    
    public static $EmailRow                 = 'table[class*=table] tbody>tr>td:nth-of-type(2)';
    public static $TypeRow                  = 'table[class*=table] tbody>tr>td:nth-of-type(6)';
    
    public static function IdLine($row)           { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function EmailLine($row)        { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function FirstNameLine($row)    { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function LastNameLine($row)     { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(4)"; }
    public static function StatusLine($row)       { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(5)"; }
    public static function TypeLine($row)         { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(6)"; }
    public static function CreatedLine($row)      { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(7)"; }
    public static function UpdateButtonLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Update]"; }
    public static function ViewButtonLine($row)   { return "table[class*=table] tbody>tr:nth-of-type($row) [title=View]"; }
    public static function DeleteButtonLine($row) { return "table[class*=table] tbody>tr:nth-of-type($row) [title=Delete]"; }


}
