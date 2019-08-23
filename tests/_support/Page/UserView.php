<?php
namespace Page;

class UserView
{
    public static function URL($id)       { return  "/master-admin/user/view?id=$id";}

    public static $Title                  = 'h1';
    public static $Breadcrumb_Home        = '.breadcrumb>li:first-of-type a';
    public static $Breadcrumb_UserType    = '.breadcrumb>li:nth-of-type(2) a';
    public static $Breadcrumb_CurrentUser = '.breadcrumb>li:nth-of-type(3)';
    
    public static $BackToListButton       = '.left-column-buttons>a.btn-success';
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

    //State admin user
    public static $StatesHeadTitle          = 'h2+div .panel-heading';
    public static $State                    = 'h2+div li';
    public static $AddStateButton           = 'a[href*=add-state]';

    //Coordinator user
    public static $ProgramsHeadTitle            = '.title-block>div:nth-of-type(2) .panel-heading';
    public static $AddProgramButton             = 'a[href*=add-program]';
    public static function ProgramNameLine_ByName($name)              { return "//li[contains(text(), '$name')]";}
    public static function DeleteProgramButtonLine_ByName($name)      { return "//li[contains(text(), '$name')]/a";}
    
    //Business user
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
}
