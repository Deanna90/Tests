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
    public static function Tier_TierStatus($number)             { $a= $number+1; return ".company-status.short-articles>div:nth-of-type($a) .tier-name>h4";}
    public static function TierNumberIcon_TierStatus($number)   { $a= $number+1; return ".company-status.short-articles>div:nth-of-type($a) .tier-name>span>i:nth-of-type(2)";}
    public static function StatusForTier_TierStatus($number)    { $a= $number+1; return ".company-status.short-articles>div:nth-of-type($a) .tier-status>p";}
    public static function CurrentTierRow_TierStatus($number)   { $a= $number+1; return ".company-status.short-articles>div:nth-of-type($a).active-tier";}
    
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
    
    //Alert about Next Tier
    public static $NextTierAlertBlock                 = '.stick.alert';
    public static $Title_NextTierAlertBlock           = '.stick.alert .title>p';
    public static $Info1_NextTierAlertBlock           = '.stick.alert h3';
    public static $Info2_NextTierAlertBlock           = '.stick.alert h3+p';
    public static $Info3_NextTierAlertBlock           = '.stick.alert h3~p:nth-of-type(2)';
    public static $LearnMoreButton_NextTierAlertBlock = '.stick.alert a';
    
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

    //Tier Overviews
    public static $TiersSelect_TierOverviews               = '#state-id';
    public static $TierStatus_1stTier_TierOverviews        = '.tier-number1 .company-status .status-color';
    public static $TierTitle_1stTier_TierOverviews         = '.tier-number1>p:first-of-type';
    public static $TierDescription_1stTier_TierOverviews   = '.tier-number1 .content';
    public static $TierStatus_2ndTier_TierOverviews        = '.tier-number2 .company-status .status-color';
    public static $TierTitle_2ndTier_TierOverviews         = '.tier-number2>p:first-of-type';
    public static $TierDescription_2ndTier_TierOverviews   = '.tier-number2 .content';
    public static $TierStatus_3rdTier_TierOverviews        = '.tier-number3 .company-status .status-color';
    public static $TierTitle_3rdTier_TierOverviews         = '.tier-number3>p:first-of-type';
    public static $TierDescription_3rdTier_TierOverviews   = '.tier-number3 .content';
    
    public static $Title_BenefitsBlock_TierOverviews                = '.tier-number>p:last-of-type';
    
    public static function Benefit_1stTier_BenefitsBlock_TierOverviews($row)              { return ".tier-number1 .benefit-name>p:nth-of-type($row)"; }
    public static function Benefit_2ndTier_BenefitsBlock_TierOverviews($row)              { return ".tier-number2 .benefit-name>p:nth-of-type($row)"; }
    public static function Benefit_3rdTier_BenefitsBlock_TierOverviews($row)              { return ".tier-number3 .benefit-name>p:nth-of-type($row)"; }
    public static function BenefitOkIcon_1stTier_BenefitsBlock_TierOverviews($row)        { return ".tier-number1 .benefit-name>p:nth-of-type($row)>span.glyphicon-ok-sign"; }
    public static function BenefitOkIcon_2ndTier_BenefitsBlock_TierOverviews($row)        { return ".tier-number2 .benefit-name>p:nth-of-type($row)>span.glyphicon-ok-sign"; }
    public static function BenefitOkIcon_3rdTier_BenefitsBlock_TierOverviews($row)        { return ".tier-number3 .benefit-name>p:nth-of-type($row)>span.glyphicon-ok-sign"; }

}
