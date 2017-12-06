<?php
namespace Page;

class BusinessDashboard
{
    public static $URL = '/user/dashboard/index';
    
    //My Company Profile
    public static $BusinessName                         = 'p.company-name';
    public static $BusinessLogo                         = '.profile-img img';
    public static $CompleteYourProfileButton            = ".content a[href*='business/profile']";
    //Business Info
    public static $BusinessAddress_BusinessInfo         = "[class='company-status']>span:nth-of-type(1)";
    public static $City_Zip_ShortStateName_BusinessInfo = "[class='company-status']>span:nth-of-type(2)";
    public static $Phone_BusinessInfo                   = "[class='company-status']>span:nth-of-type(3)";
    public static $Website_BusinessInfo                 = "[class='company-status']>span:nth-of-type(4)";
    public static $Sector_BusinessInfo                  = "[class='company-status']>span:nth-of-type(5)";
    public static $BusinessType_BusinessInfo            = ".row>div:first-of-type .content>div:nth-last-of-type(2).short-articles span";
    public static $BusinessCategory_BusinessInfo        = ".row>div:first-of-type .content>div:nth-last-of-type(1).short-articles span";

    //Tier Status 
    public static function Tier_TierStatus($number)             { return ".company-status.short-articles>h4:nth-of-type($number)";}
    public static function TierDescription_TierStatus($number)  { return ".company-status.short-articles>h4:nth-of-type($number)+p+p";}
    public static function StatusForTier_TierStatus($number)    { return ".company-status.short-articles>h4:nth-of-type($number)+p";}
    
    //Contact Information
    public static function CoordinatorName($row)            { return ".contact-info-list>li:nth-of-type($row) a";}
    public static function CoordinatorEmail($row)           { return ".contact-info-list>li:nth-of-type($row) span";}
    public static function CoordinatorPhone($row)           { return ".contact-info-list>li:nth-of-type($row) span";}
    public static function CoordinatorName_ByEmail($email)  { return "//*[@class='contact-info-list']//li[contains(a/span/text(), '$email')]/a";}
    public static function CoordinatorEmail_ByEmail($email) { return "//*[@class='contact-info-list']//li[contains(a/span/text(), '$email')]/a";}
    public static function CoordinatorPhone_ByEmail($email) { return "//*[@class='contact-info-list']//li[contains(a/span/text(), '$email')]/a";}
    
    //Alert
    public static $CheckApplicationLink_Alert   = '.alert .content p>a:nth-of-type(1)';
    public static $ContactUsLink_Alert          = '.alert .content p>a:nth-of-type(2)';
    public static $Text_Alert                   = '.alert .content p';
    
    //Application Status
    public static $Status_ApplicationStatus       = '.content.clear>div:nth-of-type(1) .company-status>p:last-of-type';
    public static $DateOfStatus_ApplicationStatus = '.content.clear>div:nth-of-type(1) .company-status>span';
    public static $Certified_ApplicationStatus    = '.content.clear>div:nth-of-type(2) .company-status>p:last-of-type';
    
    public static $IdHead_Records                = 'table[class*=table] tr>th:first-of-type';
    public static $CreatedHead_Records           = 'table[class*=table] tr>th:nth-of-type(2)';
    public static $LastModifiedHead_Records      = 'table[class*=table] tr>th:nth-of-type(3)';
    public static $StatusHead_RecordsTab_Records = 'table[class*=table] tr>th:nth-of-type(4)';
    public static $RecognitionHead_Records       = 'table[class*=table] tr>th:nth-of-type(5)';
    
    public static function IdLine_Records($row)           { return "table[class*=table] tbody>tr:nth-of-type($row)>td:first-of-type"; }
    public static function CreatedLine_Records($row)      { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
    public static function LastModifiedLine_Records($row) { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(3)"; }
    public static function StatusLine_Records($row)       { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(4)"; }
    public static function RecognitionLine_Records($row)  { return "table[class*=table] tbody>tr:nth-of-type($row)>td:nth-of-type(5)"; }
    
    //Communication
    public static function Subject_Communication($row)    { return ".row>div:last-of-type table:not([class]) tbody>tr:nth-of-type($row)>td:nth-of-type(1)"; }
    public static function Sent_Communication($row)       { return ".row>div:last-of-type table:not([class]) tbody>tr:nth-of-type($row)>td:nth-of-type(2)"; }
}
