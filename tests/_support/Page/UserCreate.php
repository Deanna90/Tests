<?php
namespace Page;

class UserCreate extends \AcceptanceTester
{
    const coordinatorType = '5';
    const stateAdminType  = '6';
    const inspectorType   = '3';
    const auditorType     = '7';
    
    public static function URL($type)       { return parent::$URL_UserAccess."/user/create?type=$type";}

    public static $Title                  = 'h1';
    
    public static $CreateButton           = '[type=submit][class*=success]';
    
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
}
