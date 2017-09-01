<?php
namespace Page;

class MeasureFormulasPopup
{
    public static $PopupForm           = '.modal-content';
    public static $Title               = 'h2';
    public static $AddSavingAreaButton = '#in_popup_popup_link_0';
    public static $ReorderButton       = '.reorder-button';
    public static $SaveOrderButton     = '.modal-content .btn-primary';
    public static $ClosePopupButton    = '.close';
    public static $SavingAreaSelect    = '[name=saving_area_id]';
    public static $AddButton           = '.modal-content .btn-primary';
    
    public static function AreaLine($number)                   { return ".formulas-list>div:nth-of-type($number) h4";}
    public static function EditFormulaButtonLine($number)      { return ".formulas-list>div:nth-of-type($number) .collapse-button";}
    public static function RemoveFormulaButtonLine($number)    { return ".formulas-list>div:nth-of-type($number) .remove-button";}
    public static function ValidateFormulaButtonLine($number)  { return ".formulas-list>div:nth-of-type($number) .validate-button";}
    public static function SaveFormulaButtonLine($number)      { return ".formulas-list>div:nth-of-type($number) .save-button";}
    
    public static function FormulaFieldLine($number)           { return ".formulas-list>div:nth-of-type($number) [name=formula]";}

    public static function PlusToolLinkLine($number)           { return ".formulas-list>div:nth-of-type($number) [title=plus]";}
    public static function MinusToolLinkLine($number)          { return ".formulas-list>div:nth-of-type($number) [title=minus]";}
    public static function MultiplyToolLinkLine($number)       { return ".formulas-list>div:nth-of-type($number) [title=multiply]";}
    public static function DivideToolLinkLine($number)         { return ".formulas-list>div:nth-of-type($number) [title=divide]";}
    public static function OpenBracketToolLinkLine($number)    { return ".formulas-list>div:nth-of-type($number) [title='open bracket']";}
    public static function CloseBracketToolLinkLine($number)   { return ".formulas-list>div:nth-of-type($number) [title='close bracket]";}
    
    public static function VariableToolLinkLine($title)           { return ".formulas-list>div:nth-of-type($number) [title=$title]";}
    public static function VariableOptToolLinkLine($number, $opt) { return ".formulas-list>div:nth-of-type($number) ul>div:nth-of-type($opt)";}
    
    public static function GlobalVariableSelectLine_ByQuestionAndNumber($question, $number)  { return "//*[@class='formulas-list']/form/div[contains(div[1]/text(), '$question') and contains(div[2]/text(), '$number')]//select";}
    public static function GlobalVariableOptionLine_ByQuestionAndNumber($question, $number)  { return "//*[@class='formulas-list']/form/div[contains(div[1]/text(), '$question') and contains(div[2]/text(), '$number')]//select/option";}

    public static $SaveButton         = '#popup .success button';
    }
