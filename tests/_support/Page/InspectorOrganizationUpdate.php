<?php
namespace Page;

class InspectorOrganizationUpdate
{
    public static function URL($id)       { return "/master-admin/inspector-organization/update?id=$id";}
    public static $Title                  = 'h1';
    
    public static $UpdateButton           = '[type=submit][class*=primary]';
    
    public static $NameField              = '#inspectororganization-name';
    public static $ContactField           = '#inspectororganization-organization_contact';
    public static $TitleField             = '#inspectororganization-title';
    public static $EmailField             = '#inspectororganization-email';
    public static $PhoneField             = '#inspectororganization-phone';
    public static $FaxField               = '#inspectororganization-fax';
    public static $MobileField            = '#inspectororganization-mobile';
    public static $AddressField           = '#inspectororganization-address';
    public static $CityField              = '#inspectororganization-city';
    public static $ZipCodeField           = '#inspectororganization-zip_code';
    
    public static $StateSelect            = '#inspectororganization-state_id';
    public static $SelectedStateOption    = '#inspectororganization-state_id [selected]';
    public static $StateOption            = '#inspectororganization-state_id option';
    
    public static $NameLabel              = '[for=inspectororganization-name]';
    public static $ContactLabel           = '[for=inspectororganization-organization_contact]';
    public static $TitleLabel             = '[for=inspectororganization-title]';
    public static $EmailLabel             = '[for=inspectororganization-email]';
    public static $PhoneLabel             = '[for=inspectororganization-phone]';
    public static $FaxLabel               = '[for=inspectororganization-fax]';
    public static $MobileLabel            = '[for=inspectororganization-mobile]';
    public static $AddressLabel           = '[for=inspectororganization-address]';
    public static $CityLabel              = '[for=inspectororganization-city]';
    public static $ZipCodeLabel           = '[for=inspectororganization-zip_code]';
    public static $StateSelectLabel       = '[for=inspectororganization-state_id]';
    public static $NameErrorHelpBlock     = '#inspectororganization-name+.help-block';
    public static $StateErrorHelpBlock    = '#inspectororganization-state_id+.help-block';
    
    public static function selectStateOption($number)  { return "#inspectororganization-state_id option:nth-of-type($number)";}
    public static function selectStatusOption($number) { return "#inspectororganization-status option:nth-of-type($number)";}

    //-----Members-----
    public static $MembersHeadTitle           = '.title-block>div:nth-of-type(1) .panel-heading';
    public static $AddMemberButton            = 'a[href*=add-user]';
    public static $MemberSelect_AddMemberForm = '[name=user_id]';
    public static $AddButton_AddMemberForm    = 'button.btn-success';
    public static function UserLine_ByName($name)               { return "//li[contains(text(), '$name')]";}
    public static function DeleteUserButtonLine_ByName($name)   { return "//li[contains(text(), '$name')]/a";}
    
    //-----Programs-----
    public static $ProgramsHeadTitle            = '.title-block>div:nth-of-type(2) .panel-heading';
    public static $AddProgramButton             = 'a[href*=add-program]';
    public static $ProgramSelect_AddProgramForm = '[name=related_id]';
    public static $AddButton_AddProgramForm     = 'button.btn-success';
    public static function ProgramNameLine_ByName($name)              { return "//li[contains(text(), '$name')]";}
    public static function DeleteProgramButtonLine_ByName($name)      { return "//li[contains(text(), '$name')]/a";}

    //-----Compliance Check Types-----
    public static $ComplianceCheckTypesHeadTitle                        = '.title-block>div:nth-of-type(3) .panel-heading';
    public static $AddComplianceCheckTypeButton                         = 'a[href*=add-check-type]';
    public static $ComplianceCheckTypeSelect_AddComplianceCheckTypeForm = '[name=check_type_id]';
    public static $AddButton_AddComplianceCheckTypeForm                 = 'button.btn-success';
    public static function ComplianceCheckTypeLine_ByName($name)            { return "//li[contains(text(), '$name')]";}
    public static function DeleteComplianceCheckTypeLine_ByName($name)      { return "//li[contains(text(), '$name')]/a";}

}
