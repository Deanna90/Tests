<?php
namespace Page;

class ChecklistPrint extends \AcceptanceTester
{
    public static function URL($tierID, $busSq, $landSq) { return parent::$URL_UserAccess."/checklist/print?id=$tierID&bsf=$busSq&lsf=$landSq";}
    
    public static $Title                      = 'h1';
    public static $SectorAndTierTitle         = 'h1+h3';

    public static $EnergyGroupTitle              = '.print-title .energy-group';
    public static $GeneralGroupTitle             = '.print-title .general-group';
    public static $PollutionPreventionGroupTitle = '.print-title .pollution-prevention-group';
    public static $SolidWasteGroupTitle          = '.print-title .solid-waste-group';
    public static $TransportationGroupTitle      = '.print-title .transportation-group';
    public static $WastewaterGroupTitle          = '.print-title .wastewater-group';
    public static $WaterGroupTitle               = '.print-title .water-group';
    
    public static function CoreMeasuresTitle($groupTitle)      { return "//div[contains(p/span/text(), '$groupTitle')]/following-sibling::div[1]/div[1]/h3";}
    public static function ElectiveMeasuresTitle($groupTitle)  { return "//div[contains(p/span/text(), '$groupTitle')]/following-sibling::div[last()]/div[1]/h3";}
    
    public static function Core_MeasureDescription_ByDesc($groupTitle, $desc)        { return "//div[contains(p/span/text(), '$groupTitle')]/following-sibling::div[1]//p[contains(text(), '$desc')]";}
    public static function Elective_MeasureDescription_ByDesc($groupTitle, $desc)    { return "//div[contains(p/span/text(), '$groupTitle')]/following-sibling::div[last()]//p[contains(text(), '$desc')]";}
    
    public static function MeasureDescription_ByDesc($desc)             { return "//p[contains(text(), '$desc')]";}
    public static function Submeasure_ByMeasureDesc($desc, $row)        { return "//li[contains(div/div/p/text(), '$desc')]//ul/li[$row]/div[2]/span";}
    public static function SubmeasureField_ByMeasureDesc($desc, $row)   { return "//li[contains(div/div/p/text(), '$desc')]//ul/li[$row]/div[2]/input";}
    public static function AnswersCheckboxImage_ByMeasureDesc($desc)    { return "//li[contains(div/div/p/text(), '$desc')]//*[@class='with-out-popup']/img";}
    public static function HelpCheckboxImage_ByMeasureDesc($desc)       { return "//li[contains(div/div/p/text(), '$desc')]//*[@class='with-out-popup']/div//img";}
    
    const AnswersImage_NotChecked      = '/img/print-toggle-icons/blank-3.png';
    const AnswersImage_No              = '/img/print-toggle-icons/no.png';
    const AnswersImage_Yes             = '/img/print-toggle-icons/yes.png';
    const AnswersImage_NA              = '/img/print-toggle-icons/n-a.png';
    const HelpImage_NotChecked         = '/img/print-toggle-icons/help-not-checked.png';
    const HelpImage_Checked            = '/img/print-toggle-icons/help-checked.png';
    
    public static $OtherGreenThingsTitle         = '#main_page_container_print>div:last-of-type .print-title';
    public static $OtherGreenThingsField         = '#main_page_container_print>div:last-of-type .print-title+textarea';
}
