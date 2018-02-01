<?php
namespace Page;

class ReviewAndSubmit extends \AcceptanceTester
{
    public static $URL                       =  "/user/application/review?just_submit=1";
    public static function URL_BusinessLogin($checklistID)  {    return "/user/application/review?tier_id=$checklistID&just_submit=1";}
    public static function URL_AdminLogin($businessID)      {    return parent::$URL_UserAccess."/business/review?business_id=$businessID&just_submit=1";}
    
    //-----Review & Submit Page-----
    
    public static $SubmitMyApplicationButton = '.input-row button[type=submit]';
//    public static $ReviewTitle                          = 'h2';
    
    public static $CategoriesHead        = '#measures-form>div:first-of-type h3';
    public static $CoreMeasuresHead      = '#measures-form>div:first-of-type h3';
    public static $ElectiveMeasuresHead  = '#measures-form>div:first-of-type h3';
    public static $StatusHead            = '#measures-form>div:first-of-type h3';
    
    public static function Review_GroupLine_ByName($groupName)  { return "//*[@class='registration-table']//tr[contains(td/text(), '$groupName')]/td[1]";}
    public static function Review_SubgroupLine_ByName($name)    { return "//*[@class='registration-table']//tr[contains(td/a/text(), '$name')]/td[1]/a";}
    public static function Review_CoreLine_ByName($name)        { return "//*[@class='registration-table']//tr[contains(td/a/text(), '$name')]/td[2]";}
    public static function Review_ElectiveLine_ByName($name)    { return "//*[@class='registration-table']//tr[contains(td/a/text(), '$name')]/td[3]";}
    public static function Review_StatusLine_ByName($name)      { return "//*[@class='registration-table']//tr[contains(td/a/text(), '$name')]/td[4]/span";}
    //For Weighted State
    public static function Review_PointsLine_ByGroupName($groupName)                  { return "//*[@class='registration-table']//tr[contains(td/text(), '$groupName')]/td[3]";}
    public static function Review_StatusInPointsColumnLine_ByGroupName($subgroupName) { return "//*[@class='registration-table']//tr[contains(td/a/text(), '$subgroupName')]/td[3]/span";}
    
    public static $TotalPointsInfo_ProgressBar       = '.registration-table>thead>tr:nth-of-type(3)>th:nth-of-type(3) p>span';
    public static $TotalPoints_ProgressBar           = '.registration-table>thead>tr:nth-of-type(3)>th:nth-of-type(3) .progress-bar';
    
    public static $TotalCoreMeasuresInfo_ProgressBar = '.registration-table>thead>tr:nth-of-type(3)>th:nth-of-type(2) p>span';
    public static $TotalCoreMeasures_ProgressBar     = '.registration-table>thead>tr:nth-of-type(3)>th:nth-of-type(2) .progress-bar';
    
    const CompleteStatus       = "[@title='Complete']";
    const InProgressStatus     = "[@title='In-progress']";
    const NotStartedStatus     = "[@title='Not-started']";
    const ActionRequiredStatus = "[@title='Not-started']";
    const HelpStatus           = "[@title='Fa fa-question red-flags']";
    
    //Tier Progress Block
    public static $TierProgress_Title                                = '.review-title-block>div:first-of-type>div:first-of-type>div>div:nth-of-type(2) .row>div:first-of-type p';
    public static function TierProgress_TierName($number)               { return ".review-title-block>div:first-of-type>div:first-of-type>div>div:nth-of-type(2) p:nth-of-type(1)";}
    public static function TierProgress_CompletedMeasuresLabel($number) { return ".review-title-block>div:first-of-type>div:first-of-type>div>div:nth-of-type(2) p:nth-of-type(2)";}
    public static function TierProgress_EarnedPointsLabel($number)      { return ".review-title-block>div:first-of-type>div:first-of-type>div>div:nth-of-type(2) p:nth-of-type(4)";}
    public static function TierProgress_CompletedMeasuresInfo($number)  { return ".review-title-block>div:first-of-type>div:first-of-type>div>div:nth-of-type(2) p:nth-of-type(3)";}
    public static function TierProgress_EarnedPointsInfo($number)       { return ".review-title-block>div:first-of-type>div:first-of-type>div>div:nth-of-type(2) p:nth-of-type(5)";}
    public static function TierProgress_CompletedMeasuresCount($number) { return ".review-title-block>div:first-of-type>div:first-of-type>div>div:nth-of-type(2) p:nth-of-type(3)>span";}
    public static function TierProgress_EarnedPointsCount($number)      { return ".review-title-block>div:first-of-type>div:first-of-type>div>div:nth-of-type(2) p:nth-of-type(5)>span";}
    public static $TierProgress_TotalPointsEarnedInfo                = '.review-title-block>div:first-of-type>div:first-of-type>div>div:nth-of-type(2) .row>div:last-of-type>p';
    
    public static $TotalPointsText_RightBlock    = '.flex>div:first-of-type>p:first-of-type';
    public static $TotalPointsCount_RightBlock   = '.flex>div:first-of-type>p:last-of-type';
    public static $TierDescription_RightBlock    = '.flex>div:nth-of-type(2)>p:last-of-type';
}
