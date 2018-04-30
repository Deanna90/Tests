<?php
namespace Page;

class MyStatus_TierStatus
{
    public static $URL               = "/user/application/tier-status";
    
    public static $TierStatusTab     = '.success.save-buttons button[type=submit].btn-green';

    public static $Title             = '.title-block>h2';
    public static $TierLevelLabel    = '.current-tier>h3';
    public static $TierName          = '.current-tier>h2';
    public static $TierDescription   = '.current-tier>p';
    public static $PointsEarnedInfo  = '.short-articles p';
    public static $PointsEarnedCount = '.short-articles p strong';
    public static $PointsProgressBar = 'h1';
    
    public static $NextTierRequirementButton                      = 'h1';
    
    public static $TierPointLevelsBlock_Title                     = "//div[contains(@class, 'application-info')][1]//h3";
    public static function TierName_TierPointLevelsBlock($row)    {  return "//div[contains(@class, 'application-info')][1]/div/div[$row]/p[1]";}
    public static function TierPoints_TierPointLevelsBlock($row)  {  return "//div[contains(@class, 'application-info')][1]/div/div[$row]/p[2]";}
    
    public static $BenefitsByTierBlock_Title                      = "//div[contains(@class, 'application-info')][2]//h3";
    public static function TierName_BenefitsByTierBlock($row)     {  return "//div[contains(@class, 'application-info')][2]/div/div[$row]/p[1]";}
    public static function Benefit_BenefitsByTierBlock($row)      {  return "//div[contains(@class, 'application-info')][2]/div/div[$row]/p[2]";}
}
