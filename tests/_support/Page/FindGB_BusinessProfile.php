<?php
namespace Page;

class FindGB_BusinessProfile
{
    
    public static function URL($city, $businessName) { return "/business/details/$city/$businessName";}
    
    public static $Title             = '.company-profile>h2';
    public static $BusinessNameTitle = '.company-profile>div>h2';
    
    public static $BusinessType      = '.no-padd-left>p>strong:nth-of-type(1)';
    public static $BusinessCategory  = '.no-padd-left>p>strong:nth-of-type(2)';

    public static $Rating_OpeningStatus_DistanceInfo        = '.col-md-6>p';
    
    public static $RatingInfo        = '.find-business-form h2';
    public static $OpeningStatus     = '.find-business-form h2';
    public static $DistanceInfo      = '.find-business-form h2';
    
    public static $BusinessLogo      = "img[alt*=logo]";
    public static $BusinessPhoto     = "img[alt*=Photo]";
    
    public static $AboutLabel        = "//h3[text()='About']";
    public static $WhyWereGreenLabel = "//h3[contains(text(), 'Why We')]";
    public static $TestimonialsLabel = "//h3[text()='Testimonials']";
    public static $About             = "//h3[text()='About']/following-sibling::p";
    public static $WhyWereGreen      = "//h3[contains(text(), 'Why We')]/following-sibling::p";
    public static $Testimonials      = "//h3[text()='Testimonials']/following-sibling::p";
    
    public static $Title_ConnectBlock = '.find-business-form h2';
    public static $ContactUsLabel_ConnectBlock     = '.find-business-form h2';
    public static $HoursLabel_ConnectBlock         = '.find-business-form h2';
    
    public static $PhoneNumber_ConnectBlock        = '.col-md-7 table>tbody>tr:nth-of-type(1)>td:nth-of-type(2)>p';
    public static $WebsiteLink_ConnectBlock        = "//*[@class='col-md-7']//table/tbody//span[contains(@class, 'fa-laptop')]/ancestor::tr/td[2]//a";
    public static $Address_ConnectBlock            = "//*[@class='col-md-7']//table/tbody//span[contains(@class, 'fa-map-marker')]/ancestor::tr/td[2]//p";
    public static $GoogleLink_ConnectBlock         = "//*[@class='col-md-7']//table/tbody//span[contains(@class, 'fa-google')]/ancestor::tr/td[2]//a";
    public static $YelpLink_ConnectBlock           = "//*[@class='col-md-7']//table/tbody//span[contains(@class, 'fa-yelp')]/ancestor::tr/td[2]//a";
    
    public static $SundayLabel_ConnectBlock        = "//tr[contains(td/p/span/text(), 'Sun')]/td[2]";
    public static $MondayLabel_ConnectBlock        = "//tr[contains(td/p/span/text(), 'Mon')]/td[2]";
    public static $TuesdayLabel_ConnectBlock       = "//tr[contains(td/p/span/text(), 'Tue')]/td[2]";
    public static $WednesdayLabel_ConnectBlock     = "//tr[contains(td/p/span/text(), 'Wed')]/td[2]";
    public static $ThursdayLabel_ConnectBlock      = "//tr[contains(td/p/span/text(), 'Thu')]/td[2]";
    public static $FridayLabel_ConnectBlock        = "//tr[contains(td/p/span/text(), 'Fri')]/td[2]";
    public static $SaturdayLabel_ConnectBlock      = "//tr[contains(td/p/span/text(), 'Sat')]/td[2]";
    
    public static $SundayHours_ConnectBlock        = "//tr[contains(td/p/span/text(), 'Sun')]/td[2]";
    public static $MondayHours_ConnectBlock        = "//tr[contains(td/p/span/text(), 'Mon')]/td[2]";
    public static $TuesdayHours_ConnectBlock       = "//tr[contains(td/p/span/text(), 'Tue')]/td[2]";
    public static $WednesdayHours_ConnectBlock     = "//tr[contains(td/p/span/text(), 'Wed')]/td[2]";
    public static $ThursdayHours_ConnectBlock      = "//tr[contains(td/p/span/text(), 'Thu')]/td[2]";
    public static $FridayHours_ConnectBlock        = "//tr[contains(td/p/span/text(), 'Fri')]/td[2]";
    public static $SaturdayHours_ConnectBlock      = "//tr[contains(td/p/span/text(), 'Sat')]/td[2]";
    
    public static $OpeningStatus_ConnectBlock      = '.find-business-form p.closed-open';
}
