<?php
namespace Page;

class TierManage extends \AcceptanceTester
{
    public static function URL()               { return parent::$URL_UserAccess.'/tier/manage';}
    public static $Title                       = '/master-admin/tier/manage';
    public static $BlockTitle                  = '/master-admin/tier/manage';
    public static $TierTitle                   = '/master-admin/tier/manage';
    
    public static $ProgramSelect               = '#program-id';
    public static $ProgramOption               = '#program-id option';
    
    public static $Tier1Button_LeftMenu        = '.filter-menu.tier>li:nth-of-type(1) a';
    public static $Tier2Button_LeftMenu        = '.filter-menu.tier>li:nth-of-type(2) a';
    public static $Tier3Button_LeftMenu        = '.filter-menu.tier>li:nth-of-type(3) a';
    public static $Tier4Button_LeftMenu        = '.filter-menu.tier>li:nth-of-type(4) a';
    
    public static $SaveButton                  = 'button.btn-green-lite';
    public static $AddPromotionalBenefitButton = '#popup_link_0';
    
    public static $YesRadioButton_OptIn        = "//tr/td[2]//*[@class='radio-wrapper checkbox-tier']";
    public static $NoRadioButton_OptIn         = "//tr/td[3]//*[@class='radio-wrapper checkbox-tier']";
    public static $YesRadioButtonLabel_OptIn   = '[for=radio-yes2]';
    public static $NoRadioButtonLabel_OptIn    = '[for=radio-no2]';
    
    public static $TierNameField               = '#relprogramtotieropt-alt_name';
    public static $TierDescriptionField        = '#relprogramtotieropt-description';
}
