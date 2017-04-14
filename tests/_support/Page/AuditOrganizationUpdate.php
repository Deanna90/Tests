<?php
namespace Page;

class AuditOrganizationUpdate
{
    public static function URL($id)       { return "master-admin/audit-organization/update?id=$id";}
    public static $Title                  = 'h1';
    
    public static $CreateButton           = '[type=submit][class*=primary]';
    
    public static $NameField              = '#auditorganization-name';
    
    public static $StateSelect            = '#auditorganization-state_id';
    public static $SelectedStateOption    = '#auditorganization-state_id [selected]';
    public static $StateOption            = '#auditorganization-state_id option';
    
    public static $StatusSelect           = '#auditorganization-status';
    public static $SelectedStatusOption   = '#auditorganization-status [selected]';
    public static $StatusOption           = '#auditorganization-status option';
    
    public static $NameLabel              = '[for=auditorganization-name]';
    public static $StateSelectLabel       = '[for=auditorganization-state_id]';
    public static $StatusSelectLabel      = '[for=auditorganization-status]';
    public static $NameErrorHelpBlock     = '#auditorganization-name+.help-block';
    
    public static function selectStateOption($number)  { return "#auditorganization-state_id option:nth-of-type($number)";}
    public static function selectStatusOption($number) { return "#auditorganization-status option:nth-of-type($number)";}


}
