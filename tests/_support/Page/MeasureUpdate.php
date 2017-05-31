<?php
namespace Page;

class MeasureUpdate extends \AcceptanceTester
{
    public static function URL($id)          { return parent::$URL_UserAccess."/measure/update?id=$id";}
    public static $Title                     = 'h1';
    public static $MeasureInfoBlockTitle     = '.row>div:nth-of-type(1) .panel-heading';
    public static $MeasurePointsBlockTitle   = '.row>div:nth-of-type(2) .panel-heading';
    public static $MeasureFormulasBlockTitle = '.row>div:nth-of-type(3) .panel-heading';
    
    public static $UpdateButton                    = '.measure-update [type=submit]';
    public static $ApproveButton                   = '[name=approve]';
    public static $CloneButton                     = '.success a.btn';
    public static $IsQuantitativeToggleButton      = '#measure-is_quantitative_switch_control';
    public static $HaveMultipleAnswersToggleButton = '#measureform-hasmultiplequestions_switch_control';
    public static $ManageFormulasButton            = '#popup_link_0';
    
    public static $DescriptionField       = '#measure-description';
    public static $PointsField            = '#measure-points';
    
    public static $AuditGroupSelect       = '#measure-audit_group_id';
    public static $AuditSubgroupSelect    = '#subgroups';
    public static $StateDisableSelect     = '#measure-state_id';
    
    
    public static $DescriptionLabel         = '[for=measure-description]';
    public static $PointsLabel              = '[for=measure-points]';
    public static $AuditGroupSelectLabel    = '[for=measure-audit_group_id]';
    public static $AuditSubgroupSelectLabel = '[for=subgroups]';
    public static $StateDisableSelectLabel  = '[for=measure-state_id]';
    
    public static $IsQuantitativeToggleLabel      = '[for=measure-is_quantitative]';
    public static $HaveMultipleAnswersToggleLabel = '[for=measureform-hasmultiplequestions]';
    
    public static $DescriptionErrorHelpBlock      = '#measure-description+.help-block';
    public static $AuditGroupErrorHelpBlock       = '#measure-audit_group_id+.help-block';
    public static $AuditSubgroupErrorHelpBlock    = '#subgroups+.help-block';
    
    ////////////////////////////////Is Quantitative/////////////////////////////
    public static $SubmeasureTypeSelect   = '#measureform-submeasuretype';
    
    public static $SubmeasureType_DefaultOption                   = 'Select submeasure type';
    public static $SubmeasureType_MultipleQuestionAndNumberOption = 'Multiple question + Number';
    public static $SubmeasureType_NumberOption                    = 'Number';
    public static $SubmeasureType_PopupThermsOption               = 'Popup Therms';
    public static $SubmeasureType_PopupLightingOption             = 'Popup Lighting';
    public static $SubmeasureType_PopupWasteDiversionOption       = 'Popup Waste diversion';
    
    public static $SubmeasureTypeSelectLabel   = '[for=measureform-submeasuretype]';
    
    //-----Multiple question + Number Option-----
    public static $AddQuestionButton_MultipleQuestionAndNumber         = '.add-multiple-question[type=button]';
    public static $AddAnswerButton_MultipleQuestionAndNumber           = '[class*=opt] .add-multiple-question';
    
    public static $TotalAnswersRequiredField_MultipleQuestionAndNumber       = '#submeasure-total_required';
    public static $TotalNumberOfAnswersStaticField_MultipleQuestionAndNumber = '.total-number-of-answers';
    
    public static function QuestionField_MultipleQuestionAndNumber($number)        {$a = $number + 1; return ".multiple-questions-and-digit-container>div:nth-of-type($a) input";}
    public static function DeleteQuestionButton_MultipleQuestionAndNumber($number) {$a = $number + 1; return ".multiple-questions-and-digit-container>div:nth-of-type($a) .delete-row";}

    public static function AnswerField_MultipleQuestionAndNumber($number)        {$a = $number; return "[class*=opt]>div:nth-of-type($a) input";}
    public static function DeleteAnswerButton_MultipleQuestionAndNumber($number) {$a = $number; return "[class*=opt]>div:nth-of-type($a) .delete-row";}
    
    //-----Number Option-----
    public static $AddAnswerButton_Number           = 'button.add-multiple-question';
    
    public static function AnswerField_Number($number)        {$a = $number +1; return ".multiple-questions-and-digit-container>div:nth-of-type($a) input";}
    public static function DeleteAnswerButton_Number($number) {$a = $number +1; return ".multiple-questions-and-digit-container>div:nth-of-type($a) .delete-row";}
    
    //-----Popup Therms Option-----
    public static $PopupDescriptionField_PopupTherms           = '#popuptherm-description';
    
    //-----Popup Lighting Option-----
    public static $PopupDescriptionField_PopupLighting         = '#popuplighting-description';
    
    //-----Popup Waste Diversion Option-----
    public static $PopupDescriptionField_PopupWasteDiversion   = '#popupwastediversion-description';
    
    /////////////////////////////Have Multiple Answers//////////////////////////
    public static $AddAnswerButton_MultipleAnswers                 = 'button.add-multiple-question';
    
    public static function AnswerField_MultipleAnswers($number)        {$a = $number +1; return ".multiple-questions-container>div:nth-of-type($a) input";}
    public static function DeleteAnswerButton_MultipleAnswers($number) {$a = $number +1; return ".multiple-questions-container>div:nth-of-type($a) .delete-row";}
    
    public static $TotalAnswersRequiredField_MultipleAnswers       = '#submeasure-total_required';
    public static $TotalNumberOfAnswersStaticField_MultipleAnswers = '.total-number-of-answers';

}
