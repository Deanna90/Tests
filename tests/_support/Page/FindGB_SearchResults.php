<?php
namespace Page;

class FindGB_SearchResults
{
    public static $URL       = '/business/search';
    
    public static $Title     = '.find-business-form h2';
    
    public static $FindField               = '#business_name';
    public static $CityOrZipOrAddressField = '#location';
    
    public static $NearMeButton         = '#geo-location';
    public static $SearchButton         = "button[name='do']";

    public static $AllFiltersButton     = '#headingAllFilters>p';
    public static $MoreCategoriesButton = '#headingCollapseMoreCategory>p';
    
    public static function Filter_BusinessType_Filter($type)             { return "//h4/a[text()='$business']";}
    public static function Filter_Subcategories_Filter($subcategory)     { return "//h4/a[text()='$business']";}
    
    public static $Filter_SortBy_BestMatchCheckbox    = "[value='best_match']+label";
    public static $Filter_SortBy_DistanceCheckbox     = "[value='distance']+label";
    public static $Filter_SortBy_HighestRatedCheckbox = "[value='rated']+label";
    
    public static $Filter_Distance_AnyCheckbox      = "[value='500']+label";
    public static $Filter_Distance_5MilesCheckbox   = "[value='5']+label";
    public static $Filter_Distance_10MilesCheckbox  = "[value='10']+label";
    public static $Filter_Distance_25MilesCheckbox  = "[value='25']+label";
    public static $Filter_Distance_50MilesCheckbox  = "[value='50']+label";
    
    public static $Filter_Hours_AnyTimeCheckbox     = "[value='any_time']+label";
    public static $Filter_Hours_OpenNowCheckbox     = "[value='is_open_now']+label";
    public static $Filter_Hours_Open24HoursCheckbox = "[value='is_open_24_hours']+label";
    
    public static $Filter_Days_SundayCheckbox       = "[value='0']+label";
    public static $Filter_Days_MondayCheckbox       = "[value='1']+label";
    public static $Filter_Days_TuesdayCheckbox      = "[value='2']+label";
    public static $Filter_Days_WednesdayCheckbox    = "[value='3']+label";
    public static $Filter_Days_ThursdayCheckbox     = "[value='4']+label";
    public static $Filter_Days_FridayCheckbox       = "[value='5']+label";
    public static $Filter_Days_SaturdayCheckbox     = "[value='6']+label";
    
    public static function BusinessLink_ByBusName($business, $link)             { return "//*[@class='list-view']//p/a[contains(strong/text(), '$business') and contains(@href, '$link')]";}
    public static function BusinessName_ByBusName($business)                    { return "//*[@class='list-view']//p/a[contains(strong/text(), '$business')]";}
    public static function BusinessType_ByBusName($business)                    { return "//*[@class='list-view']//div[contains(p/a/strong/text(), '$business')]/p[2]";}
    public static function Subcategory_ByBusName($business)                     { return "//*[@class='list-view']//div[contains(p/a/strong/text(), '$business')]/p[3]";}
    public static function RatingInfo_ByBusName($business)                      { return "//*[@class='list-view']//div[contains(p/a/strong/text(), '$business')]/p[contains(span/@class, 'glyphicon-star')]";}
    public static function OpeningStatus_ByBusName($business, $status)          { return "//*[@class='list-view']//div[contains(p/a/strong/text(), '$business')]/p[contains(span[2]/text(), '$status')]";}
    public static function GoogleLink_ByBusName($business, $link)               { return "//*[@class='list-view']//div[contains(p/a/strong/text(), '$business')]/p/a[@href='$link']";}
    public static function YelpLink_ByBusName($business, $link)                 { return "//*[@class='list-view']//div[contains(p/a/strong/text(), '$business')]/p/a[@href='$link']";}
    public static function ViewBusinessDetailsLink_ByBusName($business, $link)  { return "//*[@class='list-view']/div[contains(div/div/p/a/strong/text(), '$business')]/div[2]//a[contains(@href, '$link')]";}
    public static function Address_ByBusName($business)                         { return "//*[@class='list-view']//div[contains(div/p/a/strong/text(), '$business')]/div[contains(@class, 'address')]/p[1]";}
    public static function CityStateZipInfo_ByBusName($business)                { return "//*[@class='list-view']//div[contains(div/p/a/strong/text(), '$business')]/div[contains(@class, 'address')]/p[2]";}
    public static function Phone_ByBusName($business)                           { return "//*[@class='list-view']//div[contains(div/p/a/strong/text(), '$business')]/div[contains(@class, 'address')]/p[3]";}
    public static function WebsiteLink_ByBusName($business, $link)              { return "//*[@class='list-view']//div[contains(div/p/a/strong/text(), '$business')]/div[contains(@class, 'address')]/a[@href='https://$link']";}
    public static function CompanyLogo_ByBusName($business)                     { return "//*[@class='list-view']//div[contains(div/p/a/strong/text(), '$business')]//img";}
    
    
}
