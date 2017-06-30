<?php
namespace Page;

class ResourceCreate extends \AcceptanceTester
{
    public static function URL()          {  return parent::$URL_UserAccess.'/resource/create';}
    public static $Title                  = 'h1';
    
    public static $CreateButton           = '[type=submit][class*=success]';
    
    public static $TitleField             = '#resource-title';
    public static $ShortDescriptionField  = '#resource-short_description';
    public static $ContentField           = '#resource-content';
    public static $AttachmentTitleField   = '#resource-attachment_title';
    
    public static $AttachmentUpload       = '#resource-attachment';
    
    public static $GeneralAuditGroupCheckbox             = '#aud_idx_0';
    public static $EnergyAuditGroupCheckbox              = '#aud_idx_1';
    public static $PollutionPreventionAuditGroupCheckbox = '#aud_idx_2';
    public static $SolidWasteAuditGroupCheckbox          = '#aud_idx_3';
    public static $TransportationAuditGroupCheckbox      = '#aud_idx_4';
    public static $WastewaterAuditGroupCheckbox          = '#aud_idx_5';
    public static $WaterAuditGroupCheckbox               = '#aud_idx_6';
   
    public static $FactsheetsAndInformationCheckbox      = '#topic_idx_0';
    public static $GeneralInformationCheckbox            = '#topic_idx_1';
    public static $GreenBusinessInNewsCheckbox           = '#topic_idx_2';
    public static $PromotionAndEventsCheckbox            = '#topic_idx_3';
    public static $StepByStepsCheckbox                   = '#topic_idx_4';
    public static $TemplatesCheckbox                     = '#topic_idx_5';
    
    public static $TitleLabel                            = '[for=resource-title]';
    public static $ShortDescriptionLabel                 = '[for=resource-short_description]';
    public static $ContentLabel                          = '[for=resource-content]';
    public static $AttachmentTitleLabel                  = '[for=resource-attachment_title]';
    public static $AttachmentUploadLabel                 = '[for=resource-attachment]';
    
    public static $GeneralAuditGroupCheckboxLabel             = '#aud_idx_0+label';
    public static $EnergyAuditGroupCheckboxLabel              = '#aud_idx_1+label';
    public static $PollutionPreventionAuditGroupCheckboxLabel = '#aud_idx_2+label';
    public static $SolidWasteAuditGroupCheckboxLabel          = '#aud_idx_3+label';
    public static $TransportationAuditGroupCheckboxLabel      = '#aud_idx_4+label';
    public static $WastewaterAuditGroupCheckboxLabel          = '#aud_idx_5+label';
    public static $WaterAuditGroupCheckboxLabel               = '#aud_idx_6+label';
   
    public static $FactsheetsAndInformationCheckboxLabel      = '#topic_idx_0+label';
    public static $GeneralInformationCheckboxLabel            = '#topic_idx_1+label';
    public static $GreenBusinessInNewsCheckboxLabel           = '#topic_idx_2+label';
    public static $PromotionAndEventsCheckboxLabel            = '#topic_idx_3+label';
    public static $StepByStepsCheckboxLabel                   = '#topic_idx_4+label';
    public static $TemplatesCheckboxLabel                     = '#topic_idx_5+label';



}
