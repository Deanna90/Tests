<?php
namespace Page;

class InspectorOrganizationCreate extends \AcceptanceTester
{
    public static function URL()          {  return parent::$URL_UserAccess.'/inspector-organization/create';}
    public static $Title                  = 'h1';
    
    public static $CreateButton           = '[type=submit][class*=success]';
    
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


}
