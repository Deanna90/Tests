<?php
namespace Page;

class UserUpdate extends \AcceptanceTester
{
    
    public static function URL($id)                { return parent::$URL_UserAccess."/user/update?id=$id";}
    public static function URL_AddStateForm($id, $roleId)   { return parent::$URL_UserAccess."/user/add-state?user_id=$id&role=$roleId";}
    public static function URL_AddProgramForm($id, $roleId) { return parent::$URL_UserAccess."/user/add-program?user_id=$id&role=$roleId";}

    public static $Title                  = 'h1';
    public static $Breadcrumb_Home        = '.breadcrumb>li:first-of-type a';
    public static $Breadcrumb_UserType    = '.breadcrumb>li:nth-of-type(2) a';
    public static $Breadcrumb_CurrentUser = '.breadcrumb>li:nth-of-type(3)';
    
    public static $BackToListButton       = '.left-column-buttons>a.btn-success';
    public static $UpdateButton           = '.user-form [type=submit]';
    
    public static $ShowContactInfoInProgramNativeSelect = '#userform_contact_program_ids';
    public static $ReceiveNotificationsNativeSelect = '#userform_notificationtriggerids';
    
    public static $IsPrimaryCoordinatorInProgramsSelect = '#userform_isprimarycoordinatorprogramids_chosen';
    public static $IsPrimaryCoordinatorInProgramsLabel  = '[for=userform_isprimarycoordinatorprogramids_chosen]';
    
    public static $ShowContactInfoInProgramSelect = '#userform_showcontactinfoprogramids_chosen';
    public static $ShowContactInfoInProgramLabel  = '[for=userform_showcontactinfoprogramids_chosen]';
    
    public static $ReceiveNotificationsSelect = '#userform_notificationtriggerids_chosen';
    public static $ReceiveNotificationsLabel  = '[for=userform_notificationtriggerids_chosen]';
    
    public static $IsPrimaryCoordinatorToggleButton   = '#userform-is_primary_switch_control';
    public static function selectIsPrimaryCoordinatorInProgramsOption($number)             { return "#userform_isprimarycoordinatorprogramids_chosen>div>ul>li:nth-of-type($number)";}
    public static function selectIsPrimaryCoordinatorInProgramsOptionByName($name)         { return "//*[@id='userform_isprimarycoordinatorprogramids_chosen']//*[@class='chosen-results']/li[text()='$name']";}
    public static function SelectedIsPrimaryCoordinatorInProgramsOption($number)           { return "#userform_isprimarycoordinatorprogramids_chosen>ul>li.search-choice:nth-of-type($number)";}
    public static function SelectedIsPrimaryCoordinatorInProgramsOptionByName($name)       { return "//*[@id='userform_isprimarycoordinatorprogramids_chosen']/ul/li[@class='search-choice']/span[text()='$name']";}
    public static function DeleteSelectedIsPrimaryCoordinatorInProgramsOption($number)     { return "#userform_isprimarycoordinatorprogramids_chosen>ul>li.search-choice:nth-of-type($number)>a";}
    public static function DeleteSelectedIsPrimaryCoordinatorInProgramsOptionByName($name) { return "//*[@id='userform_isprimarycoordinatorprogramids_chosen']/ul/li[@class='search-choice']/span[text()='$name']";}

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
    public static $NameErrorHelpBlock     = '#program-name+.help-block';
    public static $CityErrorHelpBlock     = '#program-cities~.help-block';
    public static $CityWarningHelpBlock   = '.alert-warning';

    //-----State Admin-----
    public static $StatesHeadTitle          = 'h2+div .panel-heading';
    public static $State                    = 'h2+div li';
    public static $AddStateButton           = 'a[href*=add-state]';
    public static $DeleteStateButton        = 'a[href*=remove-state]';
    public static $StateSelect_AddStateForm = '[name=state_id]';
    public static $AddButton_AddStateForm   = 'button.btn-success';
    
    //-----Coordinator-----
    public static $ProgramsHeadTitle            = '.title-block>div:nth-of-type(2) .panel-heading';
    public static $AddProgramButton             = 'a[href*=add-program]';
    public static $ProgramSelect_AddProgramForm = '[name=program_id]';
    public static $ProgramOption_AddProgramForm = '[name=program_id] option';
    public static $AddButton_AddProgramForm     = 'button.btn-success';
    public static function ProgramNameLine_ByName($name)              { return "//li[contains(text(), '$name')]";}
    public static function DeleteProgramButtonLine_ByName($name)      { return "//li[contains(text(), '$name')]/a";}
    
    //-----Roles Tab-----
    public static $RolesHeadTitle            = '.title-block>div .panel-heading';
    public static $AddRoleButton             = 'a[href*=add-role]';
    public static $RoleSelect_AddRolePopup   = '.modal.in [name=role]';
    public static $RoleOption_AddRolePopup   = '.modal.in [name=role] option';
    public static $AddButton_AddRolePopup    = '.modal.in button.btn-success';
    public static function RoleNameLine_ByName($name)              { return "//li[contains(text(), '$name')]";}
    public static function DeleteRoleButtonLine_ByName($name)      { return "//li[contains(text(), '$name')]/a";}
    
    //-----Business user-----
    public static $BusinessesHeadTitle          = 'h2+div .panel-heading';
    public static $AssignBusinessButton         = 'a[href*=assign-business]';
    public static function BusinessNameLinkLine_ByName($name)              { return "//li/a[contains(text(), '$name')]";}
    
    public static $AssignBusinessesPopup_Form                = '.modal-content';
    public static $AssignBusinessesPopup_Title               = '.modal-content h2';
    public static $AssignBusinessesPopup_BusinessNameField   = '#filter-name';
    public static $AssignBusinessesPopup_SearchButton        = "button[name='filter[only_search]']";
    
    public static $SummaryCount                              = '.summary>b:last-of-type';
    public static $EmptyListLabel                            = 'tr .empty';
    public static $AssignBusinessesPopup_IdHead              = 'table[class*=table] tr>th:first-of-type';
    public static $AssignBusinessesPopup_NameHead            = 'table[class*=table] tr>th:nth-of-type(1)';
    public static $AssignBusinessesPopup_ActionsHead         = 'table[class*=table] tr>th:nth-of-type(2)';
    public static $AssignBusinessesPopup_BusinessRow         = 'table[class*=table] tbody>tr>td:nth-of-type(2)';
    public static function AssignBusinessesPopup_IdLine_ByName($name)                { return "//table[contains(@class, 'table')]//tbody/tr[contains(td[2]/text(), '$name')]/td[1]";}
    public static function AssignBusinessesPopup_BusinessNameLine_ByName($name)      { return "//table[contains(@class, 'table')]//tbody/tr[contains(td[2]/text(), '$name')]/td[2]";}
    public static function AssignBusinessesPopup_PlusButtonLine_ByName($name)        { return "//table[contains(@class, 'table')]//tbody/tr[contains(td[2]/text(), '$name')]/td[3]/button";}
    public static function AssignBusinessesPopup_YourBusinessMarkLine_ByName($name)  { return "//table[contains(@class, 'table')]//tbody/tr[contains(td[2]/text(), '$name')]/td[3][text()='Your business']";}

    public static $GeneralTab             = "//a[contains(@aria-controls, 'general')][@role='tab']";
    public static $BusinessTab            = "//a[contains(@aria-controls, 'business')][@role='tab']";
    public static $StateAdminTab          = "//a[contains(@aria-controls, 'state-admin')][@role='tab']";
    public static $CoordinatorTab         = "//a[contains(@aria-controls, 'coordinator')][@role='tab']";
    public static $InspectorTab           = "//a[contains(@aria-controls, 'inspector')][@role='tab']";
    public static $AuditorTab             = "//a[contains(@aria-controls, 'auditor')][@role='tab']";
    public static $RolesTab               = "//a[contains(@aria-controls, 'roles')][@role='tab']";
}
