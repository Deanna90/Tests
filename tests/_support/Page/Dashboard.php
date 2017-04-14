<?php
namespace Page;

class Dashboard extends \AcceptanceTester
{
    public static function URL()  { return parent::$URL_UserAccess.'/default/index';}

    
    public static function BusinessLink_ByBusName($business) { return "//h4/a[text()='$business']";}

}
