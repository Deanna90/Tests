<?php
namespace Page;

class AuditOrganizationUpdate
{
    public static function URL($id)       { return "master-admin/audit-organization/update?id=$id";}
    public static $Title                  = 'h1';
    
    public static $CreateButton           = '[type=submit][class*=primary]';
    
    public static $NameField              = '#auditorganization-name';
    public static $ContactField           = '#auditorganization-organization_contact';
    public static $TitleField             = '#auditorganization-title';
    public static $EmailField             = '#auditorganization-email';
    public static $PhoneField             = '#auditorganization-phone';
    public static $FaxField               = '#auditorganization-fax';
    public static $MobileField            = '#auditorganization-mobile';
    public static $AddressField           = '#auditorganization-address';
    public static $CityField              = '#auditorganization-city';
    public static $ZipCodeField           = '#auditorganization-zip_code';
    
    public static $StateSelect            = '#auditorganization-state_id';
    public static $SelectedStateOption    = '#auditorganization-state_id [selected]';
    public static $StateOption            = '#auditorganization-state_id option';
    
    public static $NameLabel              = '[for=auditorganization-name]';
    public static $ContactLabel           = '[for=auditorganization-organization_contact]';
    public static $TitleLabel             = '[for=auditorganization-title]';
    public static $EmailLabel             = '[for=auditorganization-email]';
    public static $PhoneLabel             = '[for=auditorganization-phone]';
    public static $FaxLabel               = '[for=auditorganization-fax]';
    public static $MobileLabel            = '[for=auditorganization-mobile]';
    public static $AddressLabel           = '[for=auditorganization-address]';
    public static $CityLabel              = '[for=auditorganization-city]';
    public static $ZipCodeLabel           = '[for=auditorganization-zip_code]';
    public static $StateSelectLabel       = '[for=auditorganization-state_id]';
    public static $NameErrorHelpBlock     = '#auditorganization-name+.help-block';
    public static $StateErrorHelpBlock    = '#auditorganization-state_id+.help-block';
    
    public static function selectStateOption($number)  { return "#auditorganization-state_id option:nth-of-type($number)";}
    public static function selectStatusOption($number) { return "#auditorganization-status option:nth-of-type($number)";}

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

    //-----Audit Groups-----
    public static $AuditGroupsHeadTitle                        = '.title-block>div:nth-of-type(3) .panel-heading';
    public static $AddAuditGroupButton                         = 'a[href*=add-group]';
    public static $AuditGroupSelect_AddAuditGroupForm          = '[name=group_id]';
    public static $AddButton_AddAuditGroupForm                 = 'button.btn-success';
    public static function AuditGroupLine_ByName($name)            { return "//li[contains(text(), '$name')]";}
    public static function DeleteAuditGroupLine_ByName($name)      { return "//li[contains(text(), '$name')]/a";}
}
