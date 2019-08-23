<?php
namespace Page;

class CompletionNotificationsCreatePopup
{
    public static $Popup             = ".modal.in";
    public static $Title             = ".modal.in h2";
    public static $MessageField      = ".modal.in #completionnotification-message";
    public static $EmailSubjectField = ".modal.in #completionnotification-email_subject";
    public static $EmailBodyField    = ".modal.in #completionnotification-email_body";
    public static $AuditGroupsSelect = '#completionnotification_audit_ids_chosen';
    public static $AuditGroupsOption = '#completionnotification_audit_ids_chosen>div>ul>li';
    public static function selectAuditGroupsOption($number)       { return "#completionnotification_audit_ids_chosen>div>ul>li:nth-of-type($number)";}
    public static function selectAuditGroupsOptionByName($name)   { return "//*[@id='completionnotification_audit_ids_chosen']//*[@class='chosen-results']/li[text()='$name']";}
    public static function SelectedAuditGroupsOption($number)     { return "#completionnotification_audit_ids_chosen>ul>li.search-choice:nth-of-type($number)";}
    public static function SelectedAuditGroupsOptionByName($name) { return "//*[@id='completionnotification_audit_ids_chosen']/ul/li[@class='search-choice']/span[text()='$name']";}
    
    public static $TypeSelect         = 'select#completionnotification-type';
    public static $SelectedTypeOption = 'select#completionnotification-type [selected]';
    public static $TypeOption         = 'select#completionnotification-type option';
    
    public static $PointsField       = '#completionnotification-points';
    
    public static $EmailToggleButton = "#completionnotification-is_enabled_email_sending_switch_control";
    
    public static $SaveButton        = '.modal.in button[type=submit]';
    public static $CloseButton       = '.modal.in .close';

}
