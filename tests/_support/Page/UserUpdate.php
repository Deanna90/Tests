<?php
namespace Page;

class UserUpdate
{
    
    public static function URL($id)       { return  "/master-admin/user/update?id=$id";}

    public static $Title                  = 'h1';
    
    public static $UpdateButton           = '[type=submit][class*=primary]';
    
    public static $EmailField             = '#user-email';
    public static $FirstNameField         = '#user-first_name';
    public static $LastNameField          = '#user-last_name';
    public static $PasswordField          = '#user-password';
    public static $ConfirmPasswordField   = '#user-new_password';
    public static $PhoneField             = '#user-phone';
    
    public static $TypeDisabledSelect     = '#user-type';
    public static $StatusSelect           = '#user-status';
    public static $SelectedTypeOption     = '#user-type [selected]';
    public static $TypeOption             = '#user-type option';
    public static $SelectedStatusOption   = '#user-status [selected]';
    public static $StatusOption           = '#user-status option';
    
    public static $EmailLabel             = '[for=user-email]';
    public static $FirstNameLabel         = '[for=user-first_name]';
    public static $LastNameLabel          = '[for=user-last_name]';
    public static $PasswordLabel          = '[for=user-password]';
    public static $ConfirmPasswordLabel   = '[for=user-new_password]';
    public static $PhoneLabel             = '[for=user-phone]';
    
    public static $TypeSelectLabel        = '[for=user-type]';
    public static $StatusSelectLabel      = '[for=user-status]';
    public static $NameErrorHelpBlock     = '#program-name+.help-block';
    public static $CityErrorHelpBlock     = '#program-cities~.help-block';
    public static $CityWarningHelpBlock   = '.alert-warning';

    //-----State Admin-----
    public static $StatesHeadTitle          = '.user-form+div .panel-heading';
    public static $AddStateButton           = 'a[href*=add-state]';
    public static $DeleteStateButton        = 'a[href*=remove-state]';
    public static $StateSelect_AddStateForm = '[name=state_id]';
    public static $AddButton_AddStateForm   = 'button.btn-success';
    
    //-----Coordinator-----
    public static $ProgramsHeadTitle            = '.title-block>div:last-of-type .panel-heading';
    public static $AddProgramButton             = 'a[href*=add-program]';
    public static $ProgramSelect_AddProgramForm = '[name=program_id]';
    public static $AddButton_AddProgramForm     = 'button.btn-success';
    public static function ProgramNameLine_ByName($name)              { return "//li[contains(text(), '$name')]";}
    public static function DeleteProgramButtonLine_ByName($name)      { return "//li[contains(text(), '$name')]/a";}
}
