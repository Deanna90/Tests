<?php
namespace Page;

class LandingForTier extends \AcceptanceTester
{
    public static function URL_BusinessLogin($id_checklist)  { return parent::$URL_UserAccess."/application/info?tier_id=$id_checklist";}
    public static function URL($id_checklist, $id_business)  { return parent::$URL_UserAccess."/business/info?tier_id=$id_checklist&business_id=$id_business";}
    public static function URL_BusLogin()                    { return parent::$URL_UserAccess."/application/info";}
    public static $Title_Welcome                     = '.title-block h3';
    public static $Title_NumberIcon                  = '.title-block span>i:nth-of-type(2)';
    public static $Title_TierInfo                    = '.title-block h3+p';
    
    public static $Title_NumberIcon_1stTier          = '.title-block span.green>i:nth-of-type(2)';
    public static $Title_NumberIcon_2ndTier          = '.title-block span.lite-green>i:nth-of-type(2)';
    public static $Title_NumberIcon_3rdTier          = '.title-block span.water-color>i:nth-of-type(2)';
    public static $Title_TierInfo_1stTier            = '.title-block h3+p.green';
    public static $Title_TierInfo_2ndTier            = '.title-block h3+p.lite-green';
    public static $Title_TierInfo_3rdTier            = '.title-block h3+p.water-color';

    public static $GreenColor            = "[@style='background-color: rgba(111, 183, 80, 0.20);']";
    public static $GrayColor             = "[@style='background-color: #f8f8f8']";
    
    public static function Line($row)                { return "#w1>div:nth-of-type($row)>div"; }
    public static function TitleLine($row)           { return "#w1>div:nth-of-type($row)>div>p:nth-of-type(1)"; }
    public static function DescriptionLine($row)     { return "#w1>div:nth-of-type($row)>div>p:nth-of-type(2)"; }
    
    public static function Line_ByTitle($title)              { return "//*[@id='w1']/div/div[contains(p[1]/text(), '$title')]"; }
    public static function TitleLine_ByTitle($title)         { return "//*[@id='w1']/div/div/p[1][text()='$title']"; }
    public static function DescriptionLine_ByTitle($title)   { return "//*[@id='w1']/div/div[contains(p[1]/text(), '$title')]/p[2]"; }
    
    public static $BenefitsBlock                      = '.benefits';
    public static $Title_BenefitsBlock                = '.short-benefits-title';
    public static $FirstTierTitle_BenefitsBlock       = '.green .benefits-title p';
    public static $SecondTierTitle_BenefitsBlock      = '.lite-green .benefits-title p';
    public static $ThirdTierTitle_BenefitsBlock       = '.water-color .benefits-title p';
    public static $FirstTierNumberIcon_BenefitsBlock  = '.green .benefits-title>span>i:nth-of-type(2)';
    public static $SecondTierNumberIcon_BenefitsBlock = '.lite-green .benefits-title>span>i:nth-of-type(2)';
    public static $ThirdTierNumberIcon_BenefitsBlock  = '.water-color .benefits-title>span>i:nth-of-type(2)';
    
    public static function Benefit_1stTier_BenefitsBlock($row)              { return ".green .benefit-name>p:nth-of-type($row)"; }
    public static function Benefit_2ndTier_BenefitsBlock($row)              { return ".lite-green .benefit-name>p:nth-of-type($row)"; }
    public static function Benefit_3rdTier_BenefitsBlock($row)              { return ".water-color .benefit-name>p:nth-of-type($row)"; }
    public static function BenefitOkIcon_1stTier_BenefitsBlock($row)        { return ".green .benefit-name>p:nth-of-type($row)>span.glyphicon-ok-sign.green"; }
    public static function BenefitOkIcon_2ndTier_BenefitsBlock($row)        { return ".lite-green .benefit-name>p:nth-of-type($row)>span.glyphicon-ok-sign.lite-green"; }
    public static function BenefitOkIcon_3rdTier_BenefitsBlock($row)        { return ".water-color .benefit-name>p:nth-of-type($row)>span.glyphicon-ok-sign.water-color"; }
}
