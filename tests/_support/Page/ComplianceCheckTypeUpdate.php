<?php
namespace Page;

class ComplianceCheckTypeUpdate
{
    public static function URL($id)       { return "/master-admin/compliance-check-type/update?id=$id";}
    public static $Title                  = 'h1';
    
    public static $UpdateButton           = '[type=submit][class*=primary]';
    
    public static $NameField              = '#compliancechecktype-name';
    
    public static $StatusSelect           = '#compliancechecktype-status';
    public static $SelectedStatusOption   = '#compliancechecktype-status [selected]';
    public static $StatusOption           = '#compliancechecktype-status option';
    
    public static $NameLabel              = '[for=compliancechecktype-name]';
    public static $StatusSelectLabel      = '[for=compliancechecktype-status]';
    public static $NameErrorHelpBlock     = '#compliancechecktype-name+.help-block';
    
    public static function selectStatusOption($number) { return "#compliancechecktype-status option:nth-of-type($number)";}


}
