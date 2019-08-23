<?php
namespace Page;

class TierLandingManage extends \AcceptanceTester
{
    public static function URL()               { return parent::$URL_UserAccess.'/tier/landing';}
    public static $Title                       = 'h3';
    public static $BlockTitle                  = '.title-block h2';
    public static $TierTitle                   = '.application-info h2';
    
    public static $ProgramSelect               = '#program-id';
    public static $ProgramOption               = '#program-id option';
    
    public static $Tier1Button_LeftMenu        = '.filter-menu.tier>li:nth-of-type(1) a';
    public static $Tier2Button_LeftMenu        = '.filter-menu.tier>li:nth-of-type(2) a';
    public static $Tier3Button_LeftMenu        = '.filter-menu.tier>li:nth-of-type(3) a';
    public static function TierButton_LeftMenu_ByRow($row)       { return ".filter-menu.tier>li:nth-of-type($row) a"; }
    public static function TierButton_LeftMenu_ByName($tiername) { return "//*[@class='filter-menu tier']/li//a[contains(text(), '$tiername')]"; }
    
    public static $SaveOrderButton             = 'button.btn-save-sort';
    public static $AddTierLandingButton        = 'h2~a[href*=create-landing]';
    
    public static $AddTierLandingPopup                  = ".modal.in";
    public static $Title_AddTierLandingPopup            = ".modal.in h2";
    public static $TitleField_AddTierLandingPopup       = ".modal.in #tierlanding-title";
    public static $DescriptionField_AddTierLandingPopup = ".modal.in #tierlanding-description";
    public static $BGColorSelect_AddTierLandingPopup    = '.modal.in #tierlanding-bg_color';
    public static $CreateButton_AddTierLandingPopup     = '.modal.in button[type=submit]';
    public static $CloseButton_AddTierLandingPopup      = '.modal.in .close';
    
    public static $GreenColor            = "[@style='background-color: rgba(111, 183, 80, 0.20);']";
    public static $GrayColor             = "[@style='background-color: #f8f8f8']";
    
    public static function Line($row)                { return "#w0>div>div:nth-of-type($row)"; }
    public static function TitleLine($row)           { return "#w0>div>div:nth-of-type($row)>p:nth-of-type(2)"; }
    public static function DescriptionLine($row)     { return "#w0>div>div:nth-of-type($row)>p:nth-of-type(3)"; }
    public static function EditButtonLine($row)      { return "#w0>div>div:nth-of-type($row) a[href*=update]"; }
    public static function DeleteButtonLine($row)    { return "#w0>div>div:nth-of-type($row) a[href*=delete]"; }
    public static function StateIconLine($row)       { return "#w0>div>div:nth-of-type($row)>p .state-icon"; }
    
    public static function Line_ByTitle($title)              { return "//*[@id='w0']/div/div[contains(p[2]/text(), '$title')]"; }
    public static function TitleLine_ByTitle($title)         { return "//*[@id='w0']/div/div/p[2][text()='$title']"; }
    public static function DescriptionLine_ByTitle($title)   { return "//*[@id='w0']/div/div[contains(p[2]/text(), '$title')]/p[3]"; }
    public static function EditButtonLine_ByTitle($title)    { return "//*[@id='w0']/div/div[contains(p[2]/text(), '$title')]//a[contains(@href, 'update')]"; }
    public static function DeleteButtonLine_ByTitle($title)  { return "//*[@id='w0']/div/div[contains(p[2]/text(), '$title')]//a[contains(@href, 'delete')]"; }
    public static function StateIconLine_ByTitle($title)     { return "//*[@id='w0']/div/div[contains(p[2]/text(), '$title')]//span[contains(@class, 'state-icon')]"; }
    
    public static function Line_AvailableItems_ByTitle($title)              { return "//*[@id='w0']/div[contains(@class, 'available-landing-list')]/div[contains(p[2]/text(), '$title')]"; }
    public static function TitleLine_AvailableItems_ByTitle($title)         { return "//*[@id='w0']/div[contains(@class, 'available-landing-list')]/div/p[2][text()='$title']"; }
    public static function DescriptionLine_AvailableItems_ByTitle($title)   { return "//*[@id='w0']/div[contains(@class, 'available-landing-list')]/div[contains(p[2]/text(), '$title')]/p[3]"; }
    public static function EditButtonLine_AvailableItems_ByTitle($title)    { return "//*[@id='w0']/div[contains(@class, 'available-landing-list')]/div[contains(p[2]/text(), '$title')]//a[contains(@href, 'update')]"; }
    public static function DeleteButtonLine_AvailableItems_ByTitle($title)  { return "//*[@id='w0']/div[contains(@class, 'available-landing-list')]/div[contains(p[2]/text(), '$title')]//a[contains(@href, 'delete')]"; }
    public static function StateIconLine_AvailableItems_ByTitle($title)     { return "//*[@id='w0']/div[contains(@class, 'available-landing-list')]/div[contains(p[2]/text(), '$title')]//span[contains(@class, 'state-icon')]"; }
    
    public static function Line_ActiveItems_ByTitle($title)              { return "//*[@id='w0']/div[contains(@class, 'column landing-list')]/div[contains(p[2]/text(), '$title')]"; }
    public static function TitleLine_ActiveItems_ByTitle($title)         { return "//*[@id='w0']/div[contains(@class, 'column landing-list')]/div/p[2][text()='$title']"; }
    public static function DescriptionLine_ActiveItems_ByTitle($title)   { return "//*[@id='w0']/div[contains(@class, 'column landing-list')]/div[contains(p[2]/text(), '$title')]/p[3]"; }
    public static function EditButtonLine_ActiveItems_ByTitle($title)    { return "//*[@id='w0']/div[contains(@class, 'column landing-list')]/div[contains(p[2]/text(), '$title')]//a[contains(@href, 'update')]"; }
    public static function DeleteButtonLine_ActiveItems_ByTitle($title)  { return "//*[@id='w0']/div[contains(@class, 'column landing-list')]/div[contains(p[2]/text(), '$title')]//a[contains(@href, 'delete')]"; }
    public static function StateIconLine_ActiveItems_ByTitle($title)     { return "//*[@id='w0']/div[contains(@class, 'column landing-list')]/div[contains(p[2]/text(), '$title')]//span[contains(@class, 'state-icon')]"; }
    
}
