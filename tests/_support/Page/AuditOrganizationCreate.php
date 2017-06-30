<?php
namespace Page;

class AuditOrganizationCreate extends \AcceptanceTester
{
    public static function URL()          {  return parent::$URL_UserAccess.'/audit-organization/create';}
    public static $Title                  = 'h1';
    
    public static $CreateButton           = '[type=submit][class*=success]';
    
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


}
