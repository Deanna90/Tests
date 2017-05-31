<?php
namespace Page;

class Dashboard extends \AcceptanceTester
{
    public static function URL()  { return parent::$URL_UserAccess.'/default/index';}

    const NoChecklistText           = 'No checklist! Sorry but we don`t have a checklist for business.';
    
    public static function BusinessLink_ByBusName($business)           { return "//h4/a[text()='$business']";}
    public static function MeasuresCompletedInfo_ByBusName($business)  { return "//div[contains(h4/a/text(), '$business')]/div/div[1]/div[1]/div/span";}
    public static function NoChecklistInfo_ByBusName($business)        { return "//div[contains(h4/a/text(), '$business')]/div/div[1]/div[1]/p";}
    public static function StatusOfBusiness_ByBusName($business)       { return "//div[contains(h4/a/text(), '$business')]/div/div[1]/div[1]/div[2]//strong";}
    public static function Date_StatusOfBus_ByBusName($business)       { return "//div[contains(h4/a/text(), '$business')]/div/div[1]/div[1]/div[2]//span/span";}
    public static function TierName_ByBusName($business)               { return "//div[contains(h4/a/text(), '$business')]/div/div[1]/div[1]/div[3]//strong";}
    public static function TierStatus_ByBusName($business)             { return "//div[contains(h4/a/text(), '$business')]/div/div[1]/div[1]/div[3]//div/span";}
    public static function AddressOfBusiness_ByBusName($business)      { return "//h4/a[text()='$business']";}
    public static function SectorOfBusiness_ByBusName($business)       { return "//h4/a[text()='$business']";}
    public static function BusinessType_ByBusName($business)           { return "//h4/a[text()='$business']";}
    public static function BusinessCategory_ByBusName($business)       { return "//h4/a[text()='$business']";}
    public static function StatusOfAudits_ByBusName($business)         { return "//h4/a[text()='$business']";}
    public static function StatusOfApplication_ByBusName($business)    { return "//h4/a[text()='$business']";}
    public static function StatusOfCompliance_ByBusName($business)     { return "//h4/a[text()='$business']";}

}
