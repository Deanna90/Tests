<?php
namespace Page;

class CompanyProfile
{
    public static $URL                                                = "/user/business/profile";
    
    public static $BusinessName_BusinessProfileTab                    = '.company-profile-info>p:nth-of-type(1)';
    public static $City_BusinessProfileTab                            = '.company-profile-info>p:nth-of-type(2)';
    public static $Zip_BusinessProfileTab                             = '.company-profile-info>p:nth-of-type(3)';
    
    public static $BusinessLogo_SavedImage_BusinessProfileTab         = "#logo_file-img";
    public static $BusinessPhoto_SavedImage_BusinessProfileTab        = "#photo_file-img";
    public static $BusinessLogo_BusinessProfileTab                    = "input[type='file']:nth-of-type(1)";
    public static $BusinessPhoto_BusinessProfileTab                   = "//input[@type='file'][2]";
    
    public static $AddressField_BusinessProfileTab                    = '#businessform-street_address';
    public static $PhoneField_BusinessProfileTab                      = '#businessform-phone';
    public static $FaxField_BusinessProfileTab                        = '#businessform-fax';
    public static $EmailField_BusinessProfileTab                      = '#businessform-email';
    public static $SiteField_BusinessProfileTab                       = '#businessform-website';
    public static $FacebookLinkField_BusinessProfileTab               = '#businessform-social_facebook';
    public static $TwitterLinkField_BusinessProfileTab                = '#businessform-social_twitter';
    public static $LinkedInField_BusinessProfileTab                   = '#businessform-social_linkedin';
    
    public static $GoogleLinkField_BusinessProfileTab                 = '#businessform-google_link';
    public static $YelpLinkField_BusinessProfileTab                   = '#businessform-yelp_link';
    
    public static $SectorSelect_BusinessProfileTab                    = '#businessform-sector_id';
    public static $BusinessTypeSelect_BusinessProfileTab              = '#businessform-category_id';
    public static $BusinessCategorySelect_BusinessProfileTab          = "[name='BusinessForm[sub_category_id]']";
    
    public static $BusinessDescriptionField_BusinessProfileTab        = '#businessform-description';
    public static $DescribeHowBusinessIsGreenField_BusinessProfileTab = '#businessform-how_green';
    public static $TestimonialsField_BusinessProfileTab               = '#businessform-testimonials';
    
    public static $SaveButtonFooter_BusinessProfileTab            = '.form-group>button';
    public static $SaveButtonHeader_BusinessProfileTab            = 'h2+button';
    
    //About the business block
    public static $NumberOfEmployeesField_BusinessProfileTab      = '#businessform-employees_number';
    public static $BusinessSquareFootageField_BusinessProfileTab  = '#businessform-business_square_footage';
    public static $LandscapeSquareFootageField_BusinessProfileTab = '#businessform-landscape_square_footage';
    
    public static function AboutQuestion_Name_ByName_BusinessProfileTab($name)                        { return "//*[@class='form-group registration-field'][contains(p/text(), '$name')]";}
    public static function AboutQuestion_AnswerButtonLabel_ByName_BusinessProfileTab($name, $answer)  { return "//*[@class='form-group registration-field'][contains(p/text(), '$name')]//div/label[contains(text(), '$answer')]";}
    public static function AboutQuestion_AnswerButton_ByName_BusinessProfileTab($name, $answer)       { return "//*[@class='form-group registration-field'][contains(p/text(), '$name')]/div/input[@class='$answer-btn']";}
    
    public static $AboutQuestion_OwnershipStatusQuestion           = 'What is the building ownership status?';
    public static $AboutQuestion_OwnershipStatus_OwnBuilding       = '#normalradio-ownership_status_0';
    public static $AboutQuestion_OwnershipStatus_RentSpace         = '#normalradio-ownership_status_1';
    public static $AboutQuestion_OwnershipStatus_HomeOffice        = '#normalradio-ownership_status_2';
    
    public static $AboutQuestion_BusinessLocationQuestion          = 'What is the building ownership status?';
    public static $AboutQuestion_BusinessLocation_Yes              = '#checkbox-i0';
    public static $AboutQuestion_BusinessLocation_No               = '#checkbox-0-n';
    
    public static $AboutQuestion_HazardousMaterialsOrWasteQuestion = 'What is the building ownership status?';
    public static $AboutQuestion_HazardousMaterialsOrWaste_Yes     = '#checkbox-i1';
    public static $AboutQuestion_HazardousMaterialsOrWaste_No      = '#checkbox-1-n';
    
    public static $AboutQuestion_PoolOrSpaQuestion                 = 'What is the building ownership status?';
    public static $AboutQuestion_PoolOrSpa_Yes                     = '#checkbox-i2';
    public static $AboutQuestion_PoolOrSpa_No                      = '#checkbox-2-n';
    
    public static $AboutQuestion_EmergencyBackUpGeneratorQuestion  = 'What is the building ownership status?';
    public static $AboutQuestion_EmergencyBackUpGenerator_Yes      = '#checkbox-i3';
    public static $AboutQuestion_EmergencyBackUpGenerator_No       = '#checkbox-3-n';
    
    const AboutQuestion_OwnershipStatus           = 'What is the building ownership status?';
    const OwnBuildingStatus                       = 'Own Building';
    const RentSpaceStatus                         = 'Rent Space';
    const HomeOfficeStatus                        = 'Home Office';
    const AboutQuestion_BusinessLocation          = 'Are there other business locations?';
    const AboutQuestion_HazardousMaterialsOrWaste = 'Are there hazardous materials or waste on site?';
    const AboutQuestion_PoolOrSpa                 = 'Is there a pool or spa on site?';
    const AboutQuestion_EmergencyBackUpGenerator  = 'Is there an Emergency Back-Up Generator on site?';
    
    //Permits block
    const Permits_Air                     = 'Air';
    const Permits_HazardousMaterials      = 'Hazardous materials';
    const Permits_HazardousWaste          = 'Hazardous waste';
    const Permits_StormWater              = 'Storm water';
    const Permits_Wastewater              = 'Wastewater';
    const Permits_FoodSafety              = 'Food safety';
    const Permits_FireCode                = 'Fire code';
    const Permits_UndergroundStorageTanks = 'Underground storage tanks';
    const Permits_AboveGroundStorageTanks = 'Above ground storage tanks';
    const Permits_PoolAndSpaSafety        = 'Pool and spa safety';
    const Permits_Other                   = 'Other';

    public static $Permits_AirButton                     = '#checkbox-permits_air';
    public static $Permits_HazardousMaterialsButton      = '#checkbox-permits_hazardous_materials';
    public static $Permits_HazardousWasteButton          = '#checkbox-permits_hazardous_waste';
    public static $Permits_StormWaterButton              = '#checkbox-permits_storm_water';
    public static $Permits_WastewaterButton              = '#checkbox-permits_wastewater';
    public static $Permits_FoodSafetyButton              = '#checkbox-permits_food_safety';
    public static $Permits_FireCodeButton                = '#checkbox-permits_fire_code';
    public static $Permits_UndergroundStorageTanksButton = '#checkbox-permits_fire_under_tanks';
    public static $Permits_AboveGroundStorageTanksButton = '#checkbox-permits_fire_above_tanks';
    public static $Permits_PoolAndSpaSafetyButton        = '#checkboxpermits_pool_safety';
    public static $Permits_OtherButton                   = '#checkboxpermits_other';
    
    public static function Permits_Name_ByName_BusinessProfileTab($name)         { return "//*[@class='buttons-group']//label[contains(text(), '$name')]";}
    public static function Permits_ButtonLabel_ByName_BusinessProfileTab($name)  { return "//*[@class='buttons-group']//label[contains(text(), '$name')]";}
    
    //--------------------------Successfully Saving Popup--------------------------
    public static $SuccessfullySavingPopup                   = '.sweet-alert.visible';
    
    public static $SuccessfullySavingPopup_Text              = '.sweet-alert.visible h2';
   
    public static $SuccessfullySavingPopup_OkButton          = '.sweet-alert.visible button.confirm';
    
}
