<?php
namespace Page;

class ReportCreate extends \AcceptanceTester
{
    public static function URL()          {  return parent::$URL_UserAccess.'/report/configure';}
    public static $Title                  = 'h2';
    public static $CreateTitle            = 'h3';
    
    public static $NextStepButton         = "//button[contains(text(), 'NEXT')]";
    public static $PrevStepButton         = "//button[contains(text(), 'PREV')]";
    public static $CreateButton           = '[type=submit][class*=success]';
    
//    public static $ActiveStep             = 'h3';
//    public static $CreateTitle            = 'h3';
//    public static $CreateTitle            = 'h3';
    
    public static $InstructionsTitle      = 'h3+div>p:first-of-type';
    public static $InstructionsInfo       = 'h3+div>p:last-of-type';
    
    public static $StepTitle              = '.border-bottom>p:first-of-type';
    public static $StepInfo               = '.border-bottom>p:last-of-type';
    public static $All_RadioLabel         = '[for=select_quantity_all]';
    public static $Individual_RadioLabel  = '[for=select_quantity_individual]';
    
    public static function IndividualOptionLabel($name)      { return "//div[contains(@class, 'report-select-individual-options')]//label[text()='$name']";}
    
    public static $ReportTypeSelect       = "[name='config[range_type]']";
    public static $StartDateField         = "[name='config[date_range_start]']";
    public static $EndDateField           = "[name='config[date_range_end]']";
    
    public static $PostEnrollmentImpactsOnlyCheckbox          = "[for='post-only']";
}
