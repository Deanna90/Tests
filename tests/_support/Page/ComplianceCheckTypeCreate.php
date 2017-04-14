<?php
namespace Page;

class ComplianceCheckTypeCreate
{
    public static $URL                    = '/master-admin/compliance-check-type/create';
    public static $Title                  = 'h1';
    
    public static $CreateButton           = '[type=submit][class*=success]';
    
    public static $NameField              = '#compliancechecktype-name';
    
    public static $StatusSelect           = '#compliancechecktype-status';
    public static $SelectedStatusOption   = '#compliancechecktype-status [selected]';
    public static $StatusOption           = '#compliancechecktype-status option';
    
    public static $NameLabel              = '[for=compliancechecktype-name]';
    public static $StatusSelectLabel      = '[for=compliancechecktype-status]';
    public static $NameErrorHelpBlock     = '#compliancechecktype-name+.help-block';
    
    public static function selectStatusOption($number) { return "#compliancechecktype-status option:nth-of-type($number)";}


}
