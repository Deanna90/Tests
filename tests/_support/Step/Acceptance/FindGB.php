<?php
namespace Step\Acceptance;

class FindGB extends \AcceptanceTester
{

    public function CheckOnBusinessProfile($city, $businessName, $rating_openStatus_distance = null, $openStatus = null, $logo = null, $photo = null, 
                                          $about = null, $whyWereGreen = null, $testimonials = null, $phone = null, $website = null, $fullAddress = null, 
                                          $googleLink = null, $yelpLink = null, $businessType = null, $businessCategory = null)
    {
        $I = $this;
        $I->amOnPage(\Page\FindGB_BusinessProfile::URL($city, $businessName));
        $I->canSee($businessName, \Page\FindGB_BusinessProfile::$BusinessNameTitle);
        if (isset($rating_openStatus_distance)){
            $I->canSee($rating_openStatus_distance, \Page\FindGB_BusinessProfile::$Rating_OpeningStatus_DistanceInfo);
        }
        if (isset($openStatus)){
            $I->canSee($openStatus, \Page\FindGB_BusinessProfile::$OpeningStatus_ConnectBlock);
        }
        if (isset($logo)){
            $I->canSeeElement(\Page\FindGB_BusinessProfile::$BusinessLogo."[src='$logo']");
        }
        if (isset($photo)){
            $I->canSeeElement(\Page\FindGB_BusinessProfile::$BusinessPhoto."[src='$photo']");
        }
        if (isset($about)){
            $I->canSee($about, \Page\FindGB_BusinessProfile::$About);
        }
        if (isset($whyWereGreen)){
            $I->canSee($whyWereGreen, \Page\FindGB_BusinessProfile::$WhyWereGreen);
        }
        if (isset($testimonials)){
            $I->canSee($testimonials, \Page\FindGB_BusinessProfile::$Testimonials);
        }
        if (isset($phone)){
            $I->canSee($phone, \Page\FindGB_BusinessProfile::$PhoneNumber_ConnectBlock);
        }
        if (isset($website)){
            $I->canSee($website, \Page\FindGB_BusinessProfile::$WebsiteLink_ConnectBlock);
        }
        if (isset($fullAddress)){
            $I->canSee($fullAddress, \Page\FindGB_BusinessProfile::$Address_ConnectBlock);
        }
        if (isset($businessType)){
            $I->canSee($businessType, \Page\FindGB_BusinessProfile::$BusinessType);
        }
        if (isset($businessCategory)){
            $I->canSee($businessCategory, \Page\FindGB_BusinessProfile::$BusinessCategory);
        }
        if (isset($googleLink)){
            $I->canSeeElement(\Page\FindGB_BusinessProfile::$GoogleLink_ConnectBlock."[@href='$googleLink']");
        }
        if (isset($yelpLink)){
            $I->canSeeElement(\Page\FindGB_BusinessProfile::$YelpLink_ConnectBlock."[@href='$yelpLink']");
        }
    }  
    
    public function CheckHours_OnBusinessProfile($city, $businessName, $mondayHours = null, $tuesdayHours = null, $wednesdayHours = null, $thursdayHours = null, $fridayHours = null, 
                                        $saturdayHours = null, $sundayHours = null)
    {
        $I = $this;
        $I->amOnPage(\Page\FindGB_BusinessProfile::URL($city, $businessName));
        if (isset($mondayHours)){
            $I->comment("-----Monday-----");
            $hours = $I->grabTextFrom(\Page\FindGB_BusinessProfile::$MondayHours_ConnectBlock);
            $I->comment("Grabed hou: $hours");
            $count = $I->getAmount($I, "tbody>tr:nth-of-type(2) p.business-time");
            $I->comment("Lines count: $count");
            $count--;
            for($i=0; $i<=$count; $i++){
                $a = (2*$i+1);
                $line = $I->grabTextFrom("tbody>tr:nth-of-type(2) p.business-time:nth-of-type($a)");
                $last = substr($line, -2);
                $I->comment("Last 2 symbols: $last");
                if ($last=='PM') {
                    $I->comment("Replace $last");
                    $line = str_replace(array('PM -', '-'), "–", $line);
                    $I->comment("New line: $line");
                    $s[$i] = $line;
                }
                if ($last=='AM') {
                    $I->comment("Replace $last");
                    $line = str_replace(array('AM -', '-'), "–", $line);
                    $I->comment("New line: $line");
                    $s[$i] = $line;
                }
            }
            $hours = implode("\n", $s);
            $hours = str_replace(array(' ', ':00'), "", $hours);
            $I->comment("Trimed hou: $hours");
            $I->assertEquals($mondayHours, $hours);
//            $I->canSee($mondayHours, \Page\FindGB_BusinessProfile::$MondayHours_ConnectBlock);
        }
        if (isset($tuesdayHours)){
            $I->comment("-----Tuesday-----");
            $hours = $I->grabTextFrom(\Page\FindGB_BusinessProfile::$TuesdayHours_ConnectBlock);
            $I->comment("Grabed hou: $hours");
            $count = $I->getAmount($I, "tbody>tr:nth-of-type(3) p.business-time");
            $I->comment("Lines count: $count");
            $count--;
            for($i=0; $i<=$count; $i++){
                $a = (2*$i+1);
                $line = $I->grabTextFrom("tbody>tr:nth-of-type(3) p.business-time:nth-of-type($a)");
                $last = substr($line, -2);
                $I->comment("Last 2 symbols: $last");
                if ($last=='PM') {
                    $I->comment("Replace $last");
                    $line = str_replace(array('PM -', '-'), "–", $line);
                    $I->comment("New line: $line");
                    $s[$i] = $line;
                }
                if ($last=='AM') {
                    $I->comment("Replace $last");
                    $line = str_replace(array('AM -', '-'), "–", $line);
                    $I->comment("New line: $line");
                    $s[$i] = $line;
                }
            }
            $hours = implode("\n", $s);
            $hours = str_replace(array(' ', ':00'), "", $hours);
            $I->comment("Trimed hou: $hours");
            $I->assertEquals($tuesdayHours, $hours);
//            $I->canSee($tuesdayHours, \Page\FindGB_BusinessProfile::$TuesdayHours_ConnectBlock);
        }
        if (isset($wednesdayHours)){
            $I->comment("-----Wednesday-----");
            $hours = $I->grabTextFrom(\Page\FindGB_BusinessProfile::$WednesdayHours_ConnectBlock);
            $I->comment("Grabed hou: $hours");
            $count = $I->getAmount($I, "tbody>tr:nth-of-type(4) p.business-time");
            $I->comment("Lines count: $count");
            $count--;
            for($i=0; $i<=$count; $i++){
                $a = (2*$i+1);
                $line = $I->grabTextFrom("tbody>tr:nth-of-type(4) p.business-time:nth-of-type($a)");
                $last = substr($line, -2);
                $I->comment("Last 2 symbols: $last");
                if ($last=='PM') {
                    $I->comment("Replace $last");
                    $line = str_replace(array('PM -', '-'), "–", $line);
                    $I->comment("New line: $line");
                    $s[$i] = $line;
                }
                if ($last=='AM') {
                    $I->comment("Replace $last");
                    $line = str_replace(array('AM -', '-'), "–", $line);
                    $I->comment("New line: $line");
                    $s[$i] = $line;
                }
            }
            $hours = implode("\n", $s);
            $hours = str_replace(array(' ', ':00'), "", $hours);
            $I->comment("Trimed hou: $hours");
            $I->assertEquals($wednesdayHours, $hours);
//            $I->canSee($wednesdayHours, \Page\FindGB_BusinessProfile::$WednesdayHours_ConnectBlock);
        }
        if (isset($thursdayHours)){
            $I->comment("-----Thursday-----");
            $hours = $I->grabTextFrom(\Page\FindGB_BusinessProfile::$ThursdayHours_ConnectBlock);
            $I->comment("Grabed hou: $hours");
            $count = $I->getAmount($I, "tbody>tr:nth-of-type(5) p.business-time");
            $I->comment("Lines count: $count");
            $count--;
            for($i=0; $i<=$count; $i++){
                $a = (2*$i+1);
                $line = $I->grabTextFrom("tbody>tr:nth-of-type(5) p.business-time:nth-of-type($a)");
                $last = substr($line, -2);
                $I->comment("Last 2 symbols: $last");
                if ($last=='PM') {
                    $I->comment("Replace $last");
                    $line = str_replace(array('PM -', '-'), "–", $line);
                    $I->comment("New line: $line");
                    $s[$i] = $line;
                }
                if ($last=='AM') {
                    $I->comment("Replace $last");
                    $line = str_replace(array('AM -', '-'), "–", $line);
                    $I->comment("New line: $line");
                    $s[$i] = $line;
                }
            }
            $hours = implode("\n", $s);
            $hours = str_replace(array(' ', ':00'), "", $hours);
            $I->comment("Trimed hou: $hours");
            $I->assertEquals($thursdayHours, $hours);
//            $I->canSee($thursdayHours, \Page\FindGB_BusinessProfile::$ThursdayHours_ConnectBlock);
        }
        if (isset($fridayHours)){
            $I->comment("-----Friday-----");
            $hours = $I->grabTextFrom(\Page\FindGB_BusinessProfile::$FridayHours_ConnectBlock);
            $I->comment("Grabed hou: $hours");
            $count = $I->getAmount($I, "tbody>tr:nth-of-type(6) p.business-time");
            $I->comment("Lines count: $count");
            $count--;
            for($i=0; $i<=$count; $i++){
                $a = (2*$i+1);
                $line = $I->grabTextFrom("tbody>tr:nth-of-type(6) p.business-time:nth-of-type($a)");
                $last = substr($line, -2);
                $I->comment("Last 2 symbols: $last");
                if ($last=='PM') {
                    $I->comment("Replace $last");
                    $line = str_replace(array('PM -', '-'), "–", $line);
                    $I->comment("New line: $line");
                    $s[$i] = $line;
                }
                if ($last=='AM') {
                    $I->comment("Replace $last");
                    $line = str_replace(array('AM -', '-'), "–", $line);
                    $I->comment("New line: $line");
                    $s[$i] = $line;
                }
            }
            $hours = implode("\n", $s);
            $hours = str_replace(array(' ', ':00'), "", $hours);
            $I->comment("Trimed hou: $hours");
            $I->assertEquals($fridayHours, $hours);
//            $I->canSee($fridayHours, \Page\FindGB_BusinessProfile::$FridayHours_ConnectBlock);
        }
        if (isset($saturdayHours)){
            $I->comment("-----Saturday-----");
            $hours = $I->grabTextFrom(\Page\FindGB_BusinessProfile::$SaturdayHours_ConnectBlock);
            $I->comment("Grabed hou: $hours");
            $count = $I->getAmount($I, "tbody>tr:nth-of-type(7) p.business-time");
            $I->comment("Lines count: $count");
            $count--;
            for($i=0; $i<=$count; $i++){
                $a = (2*$i+1);
                $line = $I->grabTextFrom("tbody>tr:nth-of-type(7) p.business-time:nth-of-type($a)");
                $last = substr($line, -2);
                $I->comment("Last 2 symbols: $last");
                if ($last=='PM') {
                    $I->comment("Replace $last");
                    $line = str_replace(array('PM -', '-'), "–", $line);
                    $I->comment("New line: $line");
                    $s[$i] = $line;
                }
                if ($last=='AM') {
                    $I->comment("Replace $last");
                    $line = str_replace(array('AM -', '-'), "–", $line);
                    $I->comment("New line: $line");
                    $s[$i] = $line;
                }
            }
            $hours = implode("\n", $s);
            $hours = str_replace(array(' ', ':00'), "", $hours);
            $I->comment("Trimed hou: $hours");
            $I->assertEquals($saturdayHours, $hours);
//            $I->canSee($saturdayHours, \Page\FindGB_BusinessProfile::$SaturdayHours_ConnectBlock);
        }
        if (isset($sundayHours)){
            $I->comment("-----Sunday-----");
            $hours = $I->grabTextFrom(\Page\FindGB_BusinessProfile::$SundayHours_ConnectBlock);
            $I->comment("Grabed hou: $hours");
            $count = $I->getAmount($I, "tbody>tr:nth-of-type(1) p.business-time");
            $I->comment("Lines count: $count");
            $count--;
            for($i=0; $i<=$count; $i++){
                $a = (2*$i+1);
                $line = $I->grabTextFrom("tbody>tr:nth-of-type(1) p.business-time:nth-of-type($a)");
                $last = substr($line, -2);
                $I->comment("Last 2 symbols: $last");
                if ($last=='PM') {
                    $I->comment("Replace $last");
                    $line = str_replace(array('PM -', '-'), "–", $line);
                    $I->comment("New line: $line");
                    $s[$i] = $line;
                }
                if ($last=='AM') {
                    $I->comment("Replace $last");
                    $line = str_replace(array('AM -', '-'), "–", $line);
                    $I->comment("New line: $line");
                    $s[$i] = $line;
                }
            }
            $hours = implode("\n", $s);
            $hours = str_replace(array(' ', ':00'), "", $hours);
            $I->comment("Trimed hou: $hours");
            $I->assertEquals($sundayHours, $hours);
//            $I->canSee($sundayHours, \Page\FindGB_BusinessProfile::$SundayHours_ConnectBlock);
        }
    }  
    
    public function CheckOnBusinessInfo_OnSearchResultsPage($city, $state_zip, $businessName, $rating = null, $openStatus = null, $logo = null, 
                                          $phone = null, $website = null, $address = null, $googleLink = null, $yelpLink = null, $businessType = null, $businessCategory = null)
    {
        $I = $this;
//        $I->canSeeElement(\Page\FindGB_SearchResults::BusinessLink_ByBusName($businessName));
        if (isset($rating)){
            $I->canSee($rating, \Page\FindGB_SearchResults::RatingInfo_ByBusName($businessName));
        }
        if (isset($openStatus)){
            $I->canSeeElement(\Page\FindGB_SearchResults::OpeningStatus_ByBusName($businessName, $openStatus));
        }
        if (isset($logo)){
            $I->canSeeElement(\Page\FindGB_SearchResults::CompanyLogo_ByBusName($businessName)."[@src='$logo']");
        }
        if (isset($businessType)){
            $I->canSee($businessType, \Page\FindGB_SearchResults::BusinessType_ByBusName($businessName));
        }
        if (isset($businessCategory)){
            $I->canSee($businessCategory, \Page\FindGB_SearchResults::Subcategory_ByBusName($businessName));
        }
        if (isset($phone)){
            $I->canSee($phone, \Page\FindGB_SearchResults::Phone_ByBusName($businessName));
        }
        if (isset($website)){
            $I->canSeeElement(\Page\FindGB_SearchResults::WebsiteLink_ByBusName($businessName, $website));
        }
        if (isset($address)){
            $I->canSee($address, \Page\FindGB_SearchResults::Address_ByBusName($businessName));
        }
        if (isset($city)&&isset($state_zip)){
            $I->canSee("$city $state_zip", \Page\FindGB_SearchResults::CityStateZipInfo_ByBusName($businessName));
        }
        if (isset($googleLink)){
            $I->canSeeElement(\Page\FindGB_SearchResults::GoogleLink_ByBusName($businessName, $googleLink));
        }
        if (isset($yelpLink)){
            $I->canSeeElement(\Page\FindGB_SearchResults::YelpLink_ByBusName($businessName, $yelpLink));
        }
        $businessProfileLink = "/business/details/$city/$businessName";
        $I->canSeeElement(\Page\FindGB_SearchResults::BusinessLink_ByBusName($businessName, "/business/details/$city/$businessName"));
        $I->canSeeElement(\Page\FindGB_SearchResults::ViewBusinessDetailsLink_ByBusName($businessName, "/business/details/$city/$businessName"));
    }  
}