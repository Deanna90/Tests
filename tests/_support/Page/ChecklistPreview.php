<?php
namespace Page;

class ChecklistPreview extends \AcceptanceTester
{
    public static function URL($tierID, $subGrID) { return parent::$URL_UserAccess."/business/complete-measures?audit_subgroup_id=$subGrID&tier_id=$tierID&preview=1";}
    
    public static $Title                      = 'h1';
   
    public static $ExtensionSelect            = '[name=measure_extensions]';
    
    //-----Left Menu-----
    public static $LeftMenu_BackToChecklistButton          = '.getstarted-group';
    
    public static $LeftMenu_EnergyGroupButton              = '.energy-group';
    public static $LeftMenu_GeneralGroupButton             = '.general-group';
    public static $LeftMenu_PollutionPreventionGroupButton = '.pollution-prevention-group';
    public static $LeftMenu_SolidWasteGroupButton          = '.solid-waste-group';
    public static $LeftMenu_TransportationGroupButton      = '.transportation-group';
    public static $LeftMenu_WastewaterGroupButton          = '.wastewater-group';
    public static $LeftMenu_WaterGroupButton               = '.water-group';
    
    public static function LeftMenu_Subgroup_ByName($subgroup) { return "//*[@class='sub-menu active']//li/a[text()='$subgroup']";}
    public static function LeftMenu_Subgroup($row)             { return ".sub-menu.active li:nth-of-type($row)>a";}
    
    public static $LeftMenu_DeleteApplicationButton        = '#checklist-number [selected]';
    public static $LeftMenu_BusinessLoginButton            = '#checklist-number option';
    public static $LeftMenu_PrintApplicationButton         = '#checklist-number option';
    public static $LeftMenu_NoteToBusinessButton           = '#checklist-number option';
    
    public static $LeftMenu_TierProgressTitle                    = '[class=col-md-3]>div:nth-of-type(2) .row>div:first-of-type p';
    public static function LeftMenu_TierName($row)               { $a = $row + 1; return "[class=col-md-3]>div:nth-of-type(2) .row>div:nth-of-type($a)>p:nth-of-type(1)";}
    public static function LeftMenu_CompletedMeasuresLabel($row) { $a = $row + 1; return "[class=col-md-3]>div:nth-of-type(2) .row>div:nth-of-type($a)>p:nth-of-type(2)";}
    public static function LeftMenu_EarnedPointsLabel($row)      { $a = $row + 1; return "[class=col-md-3]>div:nth-of-type(2) .row>div:nth-of-type($a)>p:nth-of-type(4)";}
    public static function LeftMenu_CompletedMeasuresInfo($row)  { $a = $row + 1; return "[class=col-md-3]>div:nth-of-type(2) .row>div:nth-of-type($a)>p:nth-of-type(3)";}
    public static function LeftMenu_EarnedPointsInfo($row)       { $a = $row + 1; return "[class=col-md-3]>div:nth-of-type(2) .row>div:nth-of-type($a)>p:nth-of-type(5)";}
    public static function LeftMenu_CompletedMeasuresCount($row) { $a = $row + 1; return "[class=col-md-3]>div:nth-of-type(2) .row>div:nth-of-type($a)>p:nth-of-type(3)>span";}
    public static function LeftMenu_EarnedPointsCount($row)      { $a = $row + 1; return "[class=col-md-3]>div:nth-of-type(2) .row>div:nth-of-type($a)>p:nth-of-type(5)>span";}
    public static $LeftMenu_TotalPointsEarnedInfo                = '[class=col-md-3]>div:nth-of-type(2) .row>div:last-of-type>p';
    
    
    public static $TotalPointsBlock              = '.no-padd-left';
    public static $TotalPointsTitle              = '.no-padd-left .p-label';
    public static $TotalPointsInfo_ProgressBar   = '.row>div:nth-of-type(3).info-block p>span';
    
    public static $TotalMeasuresBlock            = '.info-block';
    public static $TotalMeasuresTitle            = '.info-block .p-label';
    public static $TotalMeasuresInfo_ProgressBar = '.row>div:nth-of-type(2).info-block p>span';
    
    public static $TotalPointsText_RightBlock    = '.text-center>div>p:first-of-type';
    public static $TotalPointsCount_RightBlock   = '.text-center>div>p:last-of-type';
    public static $TierDescription_RightBlock    = '.text-center>p';
    
    
    //Checklist Preview
    public static function MeasureDescription_ByDesc($desc)      { return "//*[@id='measures-form']//div[text()[contains(., '$desc')]]";}
//    public static function MeasureGreenTip_ByDesc($desc, $grTip) { return "//*[@id='measures-form']//p[contains(text(), '$desc')]/span[@data-original-title='<p>$grTip</p>\n']";}
    public static function MeasureGreenTip($grTip)               { return "//*[@class='short-articles link-green no-ajax'][contains(h4/text(), 'Measure')]//*[text()='$grTip']";}
    public static function MeasureToggleButton_ByDesc($desc)     { return "//*[@id='measures-form']//div[text()[contains(., '$desc')]]//*[@id='relmeasuretobusiness-answer_type_switch_control']";}
    public static function MeasurePoints_ByDesc($desc)           { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//span[contains(@class, 'margin-0')]";}
    
    public static function Submeasure_ByMeasureDesc($desc, $row)        { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//ul/li[$row]/div/span";}
    public static function SubmeasureSelect_ByMeasureDesc($desc, $row)  { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//ul/li[$row]//select";}
    public static function SubmeasureField_ByMeasureDesc($desc, $row)   { return "//*[@id='measures-form']//div[contains(@class, 'row') and contains(div/div/., '$desc')]//ul/li[$row]//input";}
    public static function SubmeasureToggleButton_2Items_ByMeasureDesc($desc, $row)  { return "//*[@id='measures-form']//li[contains(div/p/text(), '$desc')]//ul/li[$row]//*[@class='switch-control switch-control-2-items']";}
    public static function SubmeasureToggleButton_3Items_ByMeasureDesc($desc, $row)  { return "//*[@id='measures-form']//li[contains(div/p/text(), '$desc')]//ul/li[$row]//*[@class='switch-control switch-control-3-items']";}
    
    public static function AuditGreenTipTitle_ByTipTitle($gtTitle)      { return "//*[contains(@class, 'right-column-block margin-b-150')]//h4[text()='$gtTitle']";}
    public static function AuditGreenTipDesc_ByTipTitle($gtTitle)       { return "//*[contains(@class, 'right-column-block margin-b-150')]//*[contains(h4/text(), '$gtTitle')]/p[2]";}
    
    public static $CoreProgressBarInfo           = '#measures-form>div:nth-of-type(2) .progress-wrapper+span';
    public static $ElectiveProgressBarInfo       = '#measures-form>div:nth-last-of-type(3) .progress-wrapper+span';

    public static $CoreMeasuresTitle             = "//*[@id='measures-form']//div[contains(div/h3/text(), 'Core measures')]";
    public static $ElectiveMeasuresTitle         = "//*[@id='measures-form']//div[contains(div/h3/text(), 'Elective measures')]";
    
    public static $InfoAboutCountToCompleteElectiveMeasures   = "//*[@id='measures-form']//div[contains(h3/text(), 'Elective measures')]/div/p[@class='p-small']";
}
