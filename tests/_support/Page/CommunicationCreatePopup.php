<?php
namespace Page;

class CommunicationCreatePopup
{
    const SendMessagePopup                                   = '.modal.in';
    public static $SendMessagePopup_SubjectField             = ".modal.in input[id*='-subject']";
    public static $SendMessagePopup_MessageField             = '.modal.in #ck_editor_modal';
    public static $SendMessagePopup_SubjectLabel             = '.modal.in [for=communication-subject]';
    public static $SendMessagePopup_MessageLabel             = '.modal.in [for=ck_editor_modal]';
    
    public static $SendMessagePopup_UserTypeSelect           = '.modal.in #communication-user_type';
    public static $SendMessagePopup_UserTypeLabel            = '.modal.in [for=communication-user_type]';
    public static $SendMessagePopup_UserTypeOption           = '.modal.in #communication-user_type option';
    
    public static $SendMessagePopup_SendButton               = '.modal.in #submit-btn';
    public static $SendMessagePopup_CloseButton              = '.modal.in .close';
    
    public static $AuditGroupSelect                          = '#communication_audit_ids_chosen';
    public static $AuditGroupOption                          = '#communication_audit_ids_chosen>div>ul>li';
    public static function selectAuditGroupOption($number)       { return "#communication_audit_ids_chosen>div>ul>li:nth-of-type($number)";}
    public static function selectAuditGroupOptionByName($name)   { return "//*[@id='communication_audit_ids_chosen']//*[@class='chosen-results']/li[text()='$name']";}
    public static function SelectedAuditGroupOption($number)     { return "#communication_audit_ids_chosen>ul>li.search-choice:nth-of-type($number)";}
    public static function SelectedAuditGroupOptionByName($name) { return "//*[@id='communication_audit_ids_chosen']/ul/li[@class='search-choice']/span[text()='$name']";}
    
    public static $ComplianceCheckSelect                          = '#communication_check_type_ids_chosen';
    public static $ComplianceCheckOption                          = '#communication_check_type_ids_chosen>div>ul>li';
    public static function selectComplianceCheckOption($number)       { return "#communication_check_type_ids_chosen>div>ul>li:nth-of-type($number)";}
    public static function selectComplianceCheckOptionByName($name)   { return "//*[@id='communication_check_type_ids_chosen']//*[@class='chosen-results']/li[text()='$name']";}
    public static function SelectedComplianceCheckOption($number)     { return "#communication_check_type_ids_chosen>ul>li.search-choice:nth-of-type($number)";}
    public static function SelectedComplianceCheckOptionByName($name) { return "//*[@id='communication_check_type_ids_chosen']/ul/li[@class='search-choice']/span[text()='$name']";}
}
