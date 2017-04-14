<?php
namespace Page;

class AuditSubgroupCreate extends \AcceptanceTester
{
    public static function URL()        { return parent::$URL_UserAccess.'/audit-sub-group/create';}
    public static $Title                  = 'h1';
    
    public static $CreateButton           = '[type=submit][class*=success]';
    
    public static $NameField              = '#auditsubgroup-name';
    
    public static $AuditGroupSelect         = '#auditsubgroup-audit_group_id';
    public static $SelectedAuditGroupOption = '#auditsubgroup-audit_group_id [selected]';
    public static $AuditGroupOption         = '#auditsubgroup-audit_group_id option';
    
    public static $StateSelect         = '#auditsubgroup-state_id';
    public static $SelectedStateOption = '#auditsubgroup-state_id [selected]';
    public static $StateOption         = '#auditsubgroup-state_id option';
    
    public static $NameLabel             = '[for=state-name]';
    public static $AuditGroupSelectLabel = '[for=state-short_name]';
    public static $StateSelectLabel      = '[for=state-is_weighted]';
    public static $NameErrorHelpBlock    = '#auditsubgroup-name+.help-block';
    
    public static function selectAuditGroupOption($number) { return "#auditsubgroup-audit_group_id option:nth-of-type($number)";}
    public static function selectStateOption($number)      { return "#auditsubgroup-state_id option:nth-of-type($number)";}

}
