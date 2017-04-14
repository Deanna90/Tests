<?php
namespace Page;

class RegistrationStarted
{
    public static $URL_Started                = '/user/application/index';

    public static $Title                      = 'h1';
    
    public static $GetStartedButton           = '[type=submit][class*=success]';
    public static $HowToUseThisAppButton      = '#checklist-number [selected]';
    //-----Left Menu-----
    public static $LeftMenu_GetStartedButton               = '.getstarted-group';
    
    public static $LeftMenu_EnergyGroupButton              = '.energy-group';
    public static $LeftMenu_GeneralGroupButton             = '.general-group';
    public static $LeftMenu_PollutionPreventionGroupButton = '.pollution-prevention-group';
    public static $LeftMenu_SolidWasteGroupButton          = '.solid-waste-group';
    public static $LeftMenu_TransportationGroupButton      = '.transportation-group';
    public static $LeftMenu_WastewaterGroupButton          = '.wastewater-group';
    public static $LeftMenu_WaterGroupButton               = '.water-group';
    
    public static function LeftMenu_Subgroup_ByName($subgroup) { return "//*[@class='sub-menu active']//li/a[text()='$subgroup']";}
    public static function LeftMenu_Subgroup($row)             { return ".sub-menu.active li:nth-of-type($row)>a";}
    
    public static $LeftMenu_HowToUseThisAppButton          = '#checklist-number [selected]';
    public static $LeftMenu_PrintApplicationButton         = '#checklist-number option';
    
    public static $RightBlock_NeedToCompleteMeasuresInfo     = '.right-column-block>div:first-of-type h4+p';
    public static $RightBlock_CurrentlyCompletedMeasuresInfo = '.right-column-block>div:first-of-type .large-insert-text';
    
    public static function CoordinatorEmail($row)           { return ".left-column-block>div:nth-of-type(2) ul>li:nth-of-type($row)>a:nth-of-type(1)";}
    public static function CoordinatorPhone($row)           { return ".left-column-block>div:nth-of-type(2) ul>li:nth-of-type($row)>a:nth-of-type(2)";}
    public static function CoordinatorEmail_ByEmail($email) { return "//*[@class='contact-info-list']//li[contains(a[1]/text(), '$email')]/a[1]";}
    public static function CoordinatorPhone_ByEmail($email) { return "//*[@class='contact-info-list']//li[contains(a[1]/text(), '$email')]/a[2]";}
    
    public static function MeasureDescription_ByDesc($desc)      { return "//*[@id='measures-form']//p[contains(text(), '$desc')]";}
    public static function MeasureGreenTip_ByDesc($desc, $grTip) { return "//*[@id='measures-form']//p[contains(text(), '$desc')]/span[@data-original-title='<p>$grTip</p\n>']";}
    public static function MeasureToggleButton_ByDesc($desc)     { return "//*[@id='measures-form']//p[contains(text(), '$desc')]//*[@id='relmeasuretobusiness-answer_type_switch_control']";}
    public static function MeasurePoints_ByDesc($desc)           { return "//*[@id='measures-form']//li/div[contains(p/text(), '$desc')]/span";}
    
    public static function Submeasure_ByMeasureDesc($desc, $row)        { return "//*[@id='measures-form']//li[contains(div/p/text(), '$desc')]//ul/li[$row]/div/span";}
    public static function SubmeasureSelect_ByMeasureDesc($desc, $row)  { return "//*[@id='measures-form']//li[contains(div/p/text(), '$desc')]//ul/li[$row]//select";}
    public static function SubmeasureField_ByMeasureDesc($desc, $row)   { return "//*[@id='measures-form']//li[contains(div/p/text(), '$desc')]//ul/li[$row]//input";}
    public static function SubmeasureToggleButton_2Items_ByMeasureDesc($desc, $row)  { return "//*[@id='measures-form']//li[contains(div/p/text(), '$desc')]//ul/li[$row]//*[@class='switch-control switch-control-2-items']";}
    public static function SubmeasureToggleButton_3Items_ByMeasureDesc($desc, $row)  { return "//*[@id='measures-form']//li[contains(div/p/text(), '$desc')]//ul/li[$row]//*[@class='switch-control switch-control-3-items']";}
    
    public static function AuditGreenTip_ByTipDesc($grTip)              { return "//*[@class='right-column-block']//h4[text()='$grTip']/i";}
    
    public static $CoreProgressBarInfo           = '#measures-form>div:first-of-type .progress-wrapper+span';
    public static $ElectiveProgressBarInfo       = '#measures-form>div:nth-last-of-type(3) .progress-wrapper+span';
    


}
