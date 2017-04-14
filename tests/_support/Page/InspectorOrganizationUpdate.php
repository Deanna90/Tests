<?php
namespace Page;

class InspectorOrganizationUpdate
{
    public static function URL($id)       { return "/master-admin/inspector-organization/update?id=$id";}
    public static $Title                  = 'h1';
    
    public static $UpdateButton           = '[type=submit][class*=primary]';
    
    public static $NameField              = '#inspectororganization-name';
    
    public static $StateSelect            = '#inspectororganization-state_id';
    public static $SelectedStateOption    = '#inspectororganization-state_id [selected]';
    public static $StateOption            = '#inspectororganization-state_id option';
    
    public static $StatusSelect           = '#inspectororganization-status';
    public static $SelectedStatusOption   = '#inspectororganization-status [selected]';
    public static $StatusOption           = '#inspectororganization-status option';
    
    public static $NameLabel              = '[for=inspectororganization-name]';
    public static $StateSelectLabel       = '[for=inspectororganization-state_id]';
    public static $StatusSelectLabel      = '[for=inspectororganization-status]';
    public static $NameErrorHelpBlock     = '#inspectororganization-name+.help-block';
    
    public static function selectStateOption($number)  { return "#inspectororganization-state_id option:nth-of-type($number)";}
    public static function selectStatusOption($number) { return "#inspectororganization-status option:nth-of-type($number)";}


}
