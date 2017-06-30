<?php
namespace Page;

class RegistrationStarted
{
    public static $URL_Started                = '/user/application/index';
    public static $URL_Review                 = '/user/application/review';

    public static $Title                      = 'h2';
    
    public static $RegistrationMenuItem       = 'a.first';
    public static $ApplicationMenuItem        = 'a.second';
    public static $ReviewAndSubmitMenuItem    = 'a.third';
    
    
    public static $SaveButton_Footer          = '.success.save-buttons button[type=submit].btn-green';
    public static $SaveAndNextButton_Footer   = '.success.save-buttons button[name=save_next]';
    public static $PreviousButton_Footer      = '.success.save-buttons>div:first-of-type a.btn-md';
    public static $ReviewButton_Footer        = '.success.save-buttons>div:last-of-type a.btn-md';
    
    public static $TotalPointsBlock                      = '.no-padd-left';
    public static $TotalPointsTitle                      = '.no-padd-left .p-label';
    public static $TotalPointsInfo                       = '.no-padd-left .p-small';
    
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
    public static function LeftMenu_PrintTierButton($row)      { return ".menu~a:nth-of-type($row)";}
    
    public static $RightBlock_NeedToCompleteMeasuresInfo     = '.right-column-block>div:first-of-type h4+p';
    public static $RightBlock_CurrentlyCompletedMeasuresInfo = '.right-column-block>div:first-of-type .large-insert-text';
    
    public static function CoordinatorEmail($row)           { return ".left-column-block>div:nth-of-type(2) ul>li:nth-of-type($row)>a:nth-of-type(2)";}
    public static function CoordinatorPhone($row)           { return ".left-column-block>div:nth-of-type(2) ul>li:nth-of-type($row)>a:nth-of-type(1)";}
    public static function CoordinatorEmail_ByEmail($email) { return "//*[@class='contact-info-list']//li[contains(a[2]/text(), '$email')]/a[2]";}
    public static function CoordinatorPhone_ByEmail($email) { return "//*[@class='contact-info-list']//li[contains(a[2]/text(), '$email')]/a[1]";}
    
    public static function MeasureDescription_ByDesc($desc)      { return "//*[@id='measures-form']//p[contains(text(), '$desc')]";}
//    public static function MeasureGreenTip_ByDesc($desc, $grTip) { return "//*[@id='measures-form']//p[contains(text(), '$desc')]/span[@data-original-title='<p>$grTip</p>\n']";}
    public static function MeasureGreenTip($grTip)               { return "//*[@class='short-articles link-green no-ajax'][contains(h4/text(), 'Measure')]//*[text()='$grTip']";}
    public static function MeasureToggleButton_ByDesc($desc)     { return "//*[@id='measures-form']//div[contains(div/p/text(), '$desc')]//*[@id='relmeasuretobusiness-answer_type_switch_control']";}
    public static function MeasureToggleButton2_ByDesc($desc)    { return "//*[@id='measures-form']//div[contains(div/p/text(), '$desc')]//*[@id='relmeasuretobusiness-answer_type']";}
    public static function MeasurePoints_ByDesc($desc)           { return "//*[@id='measures-form']//li//div[contains(p/text(), '$desc')]/span";}
    
    public static function Submeasure_ByMeasureDesc($desc, $row)        { return "//*[@id='measures-form']//div[contains(div/p/text(), '$desc')]//ul/li[$row]/div/span";}
    public static function SubmeasureSelect_ByMeasureDesc($desc, $row)  { return "//*[@id='measures-form']//div[contains(div/p/text(), '$desc')]//ul/li[$row]//select";}
    public static function SubmeasureField_ByMeasureDesc($desc, $row)   { return "//*[@id='measures-form']//div[contains(div/p/text(), '$desc')]//ul/li[$row]//input";}
    public static function SubmeasureToggleButton_2Items_ByMeasureDesc($desc, $row)  { return "//*[@id='measures-form']//div[contains(div/p/text(), '$desc')]//ul/li[$row]//*[@class='switch-control switch-control-2-items']";}
    public static function SubmeasureToggleButton_3Items_ByMeasureDesc($desc, $row)  { return "//*[@id='measures-form']//div[contains(div/p/text(), '$desc')]//ul/li[$row]//*[@class='switch-control switch-control-3-items']";}
    
    public static function AuditGreenTip_ByTipDesc($grTip)              { return "//*[@class='right-column-block']//h4[text()='$grTip']/i";}
    
    public static $CoreProgressBarInfo           = '#measures-form>div:first-of-type .progress-wrapper+span';
    public static $ElectiveProgressBarInfo       = '#measures-form>div:nth-last-of-type(3) .progress-wrapper+span';
    
    public static $FirstMeasuresTitle            = '#measures-form>div:first-of-type h3';
    public static $SecondMeasuresTitle           = '#measures-form>div:nth-of-type(2) h3';
    
    public static function Core_MeasureDescription_ByDesc($desc)        { return "//*[@id='measures-form']//div[contains(div/h3/text(), 'Core measures')]//p[contains(text(), '$desc')]";}
    public static function Elective_MeasureDescription_ByDesc($desc)    { return "//*[@id='measures-form']//div[contains(div/h3/text(), 'Elective measures')]//p[contains(text(), '$desc')]";}
    
    
    //-----------------------------Therms Popup---------------------------------
    
    const ThermsPopup                                                 = '.modal.fade.in';
    public static $ThermsPopup_TotalEstimatedField_Section1           = '.modal.fade.in .therm-section-1 #total_estimated';
    public static $ThermsPopup_TotalEstimatedLabel_Section1           = '.modal.fade.in .therm-section-1 [for=total_estimated]';
    
    public static function ThermsPopup_OptionSelect_Section2($number)           { $a=$number+1; return ".modal.fade.in .therm-section-2> div:nth-of-type($a) [id*='therm-opt']";}
    public static function ThermsPopup_OptionSelectOption_Section2($number)     { $a=$number+1; return ".modal.fade.in .therm-section-2> div:nth-of-type($a) [id*='therm-opt'] option";}
    public static function ThermsPopup_OptionSelectLabel_Section2($number)      { $a=$number+1; return ".modal.fade.in .therm-section-2> div:nth-of-type($a) [for=qt]";}
    public static function ThermsPopup_TotalEstimatedField_Section2($number)    { $a=$number+1; return ".modal.fade.in .therm-section-2> div:nth-of-type($a) [id*='qt']";}
    public static function ThermsPopup_TotalEstimatedLabel_Section2($number)    { $a=$number+1; return ".modal.fade.in .therm-section-2> div:nth-of-type($a)";}
    public static function ThermsPopup_DeleteOptionButton_Section2($number)     { $a=$number+1; return ".modal.fade.in .therm-section-2> div:nth-of-type($a) [data-action=delete]";}
    
    public static $ThermsPopup_AddOptionButton          = '.modal.fade.in [data-action=add]';
    public static $ThermsPopup_SaveChangesButton        = '.modal.fade.in button[type=submit]';
    public static $ThermsPopup_CloseButton              = '.modal.fade.in .close';
    
    //-----Review & Submit Page-----
    
    public static $SubmitMyApplicationButton            = '.input-row button[type=submit]';
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
}
