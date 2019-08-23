<?php
namespace Page;

class NotificationOptInSettings extends \AcceptanceTester
{
    public static function Url()                                          { return parent::$URL_UserAccess."/notification/opt-in"; }
    public static function Url_ProgId_TriggerId($program_id, $trigger_id) { return parent::$URL_UserAccess."/notification/opt-in?filter[program_id]=$program_id&filter[trigger]=$trigger_id&ajax-load=true"; }

    const GettingStartedMessage_TriggerID     = "1";
    const CertificationEmail_TriggerID        = "2";
    const PGERegisterRequest_TriggerID        = "5";
    const AuditorRequest_TriggerID            = "6";
    const InspectorRequest_TriggerID          = "7";
    const Month3BeforeCertification_TriggerID = "9";
    const RequiresRenewal_TriggerID           = "10";
    const PleaseReviewMyChecklist_TriggerID   = "11";
    const BusinessInactive30Days_TriggerID    = "13";
    const BusinessTierSubmission_TriggerID    = "12";
    const AuditComplete_TriggerID             = "14";
    const InspectionComplete_TriggerID        = "15";
    const BusinessRegistered_TriggerID        = "16";
    
    public static $Title                      = '.title-block h2';
    public static $InfoMessage                = '.alert-info';
    public static $TriggerTitle               = '.application-info h2';
    
    public static $YesRadioButton_OptIn       = "//tr/td[2]//*[@class='radio-wrapper checkbox-tier']";
    public static $NoRadioButton_OptIn        = "//tr/td[3]//*[@class='radio-wrapper checkbox-tier']";
    public static $YesRadioButtonLabel_OptIn  = '[for=radio-yes2]';
    public static $NoRadioButtonLabel_OptIn   = '[for=radio-no2]';
    
    public static $SaveButton                 = '.right-column-checklist button[type=submit]';
    
    public static $FilterByProgramLabel       = '#notificationtemplate_program_ids_chosen';
    public static $FilterByProgramSelect      = '#filter-program_id';
    public static $FilterByProgramOption      = '#filter-program_id option';
    public static function filterByProgramSelectOption($number)     { return "#filter-program_id>option:nth-of-type($number)";}
    public static function filterByProgramSelect_ById($program_id)  { return "//*[@id='filter-program_id']/option[@value='$program_id']";}
    public static function filterByProgramSelect_ByName($name)      { return "//*[@id='filter-program_id']/option[text()='$name']";}
    
    public static function SelectedFilterByProgramOption($number)   { return "#filter-program_id>option[selected]";}
    public static function SelectedFilterByProgramById($program_id) { return "//*[@id='filter-program_id']/option[@value='$program_id'][selected]";}
    public static function SelectedFilterByProgramByName($name)     { return "//*[@id='filter-program_id']/option[text()='$name'][selected]";}
    
    public static $FilterByTriggerLabel       = '#notificationtemplate_program_ids_chosen';
    public static $FilterByTriggerSelect      = '#filter-trigger';
    public static $FilterByTriggerOption      = '#filter-trigger option';
    public static function filterByTriggerSelectOption($number)     { return "#filter-trigger>option:nth-of-type($number)";}
    public static function filterByTriggerSelect_ById($trigger_id)  { return "//*[@id='filter-trigger']/option[@value='$trigger_id']";}
    public static function filterByTriggerSelect_ByName($name)      { return "//*[@id='filter-trigger']/option[text()='$name']";}
    
    public static function SelectedFilterByTriggerOption($number)   { return "#filter-trigger>option[selected]";}
    public static function SelectedFilterByTriggerById($trigger_id) { return "//*[@id='filter-trigger']/option[@value='$trigger_id'][selected]";}
    public static function SelectedFilterByTriggerByName($name)     { return "//*[@id='filter-trigger']/option[text()='$name'][selected]";}
    
    }
