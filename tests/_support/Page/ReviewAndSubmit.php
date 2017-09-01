<?php
namespace Page;

class ReviewAndSubmit
{
    public static $URL                       =  "/user/application/review?just_submit=1";
    
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
    
    const CompleteStatus       = "[@title='Complete']";
    const InProgressStatus     = "[@title='In-progress']";
    const NotStartedStatus     = "[@title='Not-started']";
    const ActionRequiredStatus = "[@title='Not-started']";
}
