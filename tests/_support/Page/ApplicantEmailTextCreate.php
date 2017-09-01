<?php
namespace Page;

class ApplicantEmailTextCreate extends \AcceptanceTester
{
    public static function URL()      {  return parent::$URL_UserAccess.'/notification/create';}
    public static $Title              = 'h2';
    
    public static $SaveButton         = '[action*=create] [type=submit]';
    
    public static $TriggerSelect      = '#notificationtemplate-trigger';
    public static $TriggerOption      = '#notificationtemplate-trigger option';
    
    public static $ProgramSelect      = '#notificationtemplate_program_ids_chosen';
    public static $ProgramOption      = '#notificationtemplate_program_ids_chosen ul>li';
    public static function selectProgramOption($number)    { return "#notificationtemplate_program_ids_chosen>div>ul>li:nth-of-type($number)";}
    public static function selectProgramByName($name)      { return "//*[@id='notificationtemplate_program_ids_chosen']//*[@class='chosen-results']/li[text()='$name']";}
    public static function SelectedProgramOption($number)  { return "#notificationtemplate_program_ids_chosen>ul>li.search-choice:nth-of-type($number)";}
    public static function SelectedProgramByName($name)    { return "//*[@id='notificationtemplate_program_ids_chosen']/ul/li[@class='search-choice']/span[text()='$name']";}

    
    public static $StateSelect        = '#notificationtemplate-state_id';
    public static $StateOption        = '#notificationtemplate-state_id option';
    
    public static $SubjectField       = '#notificationtemplate-subject';
    public static $BodyField          = '#notificationtemplate-body';
    
    
    public static $TriggerSelectLabel = '[for=notificationtemplate-trigger]';
    public static $ProgramSelectLabel = '[for=notificationtemplate-program_ids]';
    public static $StateSelectLabel   = '[for=notificationtemplate-state_id]';
    public static $SubjectLabel       = '[for=notificationtemplate-subject]';
    public static $BodyLabel          = '[for=notificationtemplate-body]';
}
