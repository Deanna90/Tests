<?php
namespace Page;

class UserCreate extends \AcceptanceTester
{
    const coordinatorType = '5';
    const stateAdminType  = '6';
    const inspectorType   = '3';
    const auditorType     = '7';
    const businessType    = '2';
    const allType         = 'all';
    
    public static function URL($type)       { return parent::$URL_UserAccess."/user/create?type=$type";}

    public static $Title                  = 'h2';
    
    public static $CreateButton           = '[type=submit][class*=success]';
    
    public static $ShowContactInfoInProgramNativeSelect = '#user_contact_program_ids';
    public static $ReceiveNotificationsNativeSelect = '#user_notificationtriggerids';
    
    public static $IsPrimaryCoordinatorInProgramsSelect = '#userform_isprimarycoordinatorprogramids_chosen';
    public static $IsPrimaryCoordinatorInProgramsLabel  = '[for=userform_isprimarycoordinatorprogramids_chosen]';
    
    public static $ShowContactInfoInProgramSelect = '#userform_showcontactinfoprogramids_chosen';
    public static $ShowContactInfoInProgramLabel  = '[for=userform_showcontactinfoprogramids_chosen]';
    
    public static $ReceiveNotificationsSelect = '#userform_notificationtriggerids_chosen';
    public static $ReceiveNotificationsLabel  = '[for=userform_notificationtriggerids_chosen]';
    
    public static $IsPrimaryCoordinatorToggleButton   = '#userform-is_primary_switch_control';
    public static function selectShowContactInfoInProgramOption($number)             { return "#userform_showcontactinfoprogramids_chosen>div>ul>li:nth-of-type($number)";}
    public static function selectShowContactInfoInProgramOptionByName($name)         { return "//*[@id='userform_showcontactinfoprogramids_chosen']//*[@class='chosen-results']/li[text()='$name']";}
    public static function SelectedShowContactInfoInProgramOption($number)           { return "#userform_showcontactinfoprogramids_chosen>ul>li.search-choice:nth-of-type($number)";}
    public static function SelectedShowContactInfoInProgramOptionByName($name)       { return "//*[@id='userform_showcontactinfoprogramids_chosen']/ul/li[@class='search-choice']/span[text()='$name']";}
    public static function DeleteSelectedShowContactInfoInProgramOption($number)     { return "#userform_showcontactinfoprogramids_chosen>ul>li.search-choice:nth-of-type($number)>a";}
    public static function DeleteSelectedShowContactInfoInProgramOptionByName($name) { return "//*[@id='userform_showcontactinfoprogramids_chosen']/ul/li[@class='search-choice']/span[text()='$name']";}

    public static function selectReceiveNotificationsOption($number)             { return "#userform_notificationtriggerids_chosen>div>ul>li:nth-of-type($number)";}
    public static function selectReceiveNotificationsOptionByName($name)         { return "//*[@id='userform_notificationtriggerids_chosen']//*[@class='chosen-results']/li[text()='$name']";}
    public static function SelectedReceiveNotificationsOption($number)           { return "#userform_notificationtriggerids_chosen>ul>li.search-choice:nth-of-type($number)";}
    public static function SelectedReceiveNotificationsOptionByName($name)       { return "//*[@id='userform_notificationtriggerids_chosen']/ul/li[@class='search-choice']/span[text()='$name']";}
    public static function DeleteSelectedReceiveNotificationsOption($number)     { return "#userform_notificationtriggerids_chosen>ul>li.search-choice:nth-of-type($number)>a";}
    public static function DeleteSelectedReceiveNotificationsOptionByName($name) { return "//*[@id='userform_notificationtriggerids_chosen']/ul/li[@class='search-choice']/span[text()='$name']";}

    
    public static $EmailField             = '#userform-email';
    public static $FirstNameField         = '#userform-first_name';
    public static $LastNameField          = '#userform-last_name';
    public static $PasswordField          = '#userform-password';
    public static $ConfirmPasswordField   = '#userform-new_password';
    public static $PhoneField             = '#userform-phone';
    
    public static $TypeDisabledSelect     = '#userform-type';
    public static $StatusSelect           = '#userform-status';
    public static $SelectedTypeOption     = '#userform-type [selected]';
    public static $TypeOption             = '#userform-type option';
    public static $SelectedStatusOption   = '#userform-status [selected]';
    public static $StatusOption           = '#userform-status option';
    
    public static $EmailLabel             = '[for=userform-email]';
    public static $FirstNameLabel         = '[for=userform-first_name]';
    public static $LastNameLabel          = '[for=userform-last_name]';
    public static $PasswordLabel          = '[for=userform-password]';
    public static $ConfirmPasswordLabel   = '[for=userform-new_password]';
    public static $PhoneLabel             = '[for=userform-phone]';
    
    public static $TypeSelectLabel        = '[for=userform-type]';
    public static $StatusSelectLabel      = '[for=userform-status]';
    
    public static $EmailErrorHelpBlock             = '#userform-email+.help-block';
    public static $FirstNameErrorHelpBlock         = '#userform-first_name+.help-block';
    public static $LastNameErrorHelpBlock          = '#userform-last_name+.help-block';
    public static $PasswordErrorHelpBlock          = '#userform-password+.help-block';
    public static $ConfirmPasswordErrorHelpBlock   = '#userform-new_password+.help-block';
    public static $PhoneErrorHelpBlock             = '#userform-phone+.help-block';
    
    public static $GeneralTab             = "//a[contains(@href, 'general')][@role='tab']";
    public static $RolesTab               = "//a[contains(@href, 'roles')][@role='tab']";
}
