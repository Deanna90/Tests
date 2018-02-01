<?php
namespace Page;

class UserView
{
    public static function URL($id)       { return  "/master-admin/user/view?id=$id";}

    public static $Title                  = 'h1';
    
    public static $UpdateDisabledButton   = '.user-form [type=submit]';
    
    public static $EmailDisabledField     = '#user-email';
    public static $FirstNameDisabledField = '#user-first_name';
    public static $LastNameDisabledField  = '#user-last_name';
    public static $PhoneDisabledField     = '#user-phone';
    
    public static $TypeDisabledSelect     = '#user-type';
    public static $SelectedTypeOption     = '#user-type [selected]';
    public static $TypeOption             = '#user-type option';
    
    public static $EmailLabel             = '[for=user-email]';
    public static $FirstNameLabel         = '[for=user-first_name]';
    public static $LastNameLabel          = '[for=user-last_name]';
    public static $PhoneLabel             = '[for=user-phone]';
    
    public static $TypeSelectLabel        = '[for=user-type]';

    //Business user
    public static $StatesHeadTitle          = 'h2+div .panel-heading';
    public static $State                    = 'h2+div li';
    public static $AddStateButton           = 'a[href*=add-state]';
    public static $DeleteStateButton        = 'a[href*=remove-state]';
    public static $StateSelect_AddStateForm = '[name=state_id]';
    public static $AddButton_AddStateForm   = 'button.btn-success';

}
