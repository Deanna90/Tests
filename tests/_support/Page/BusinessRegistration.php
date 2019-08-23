<?php
namespace Page;

class BusinessRegistration
{
    public static $URL                    = '/business/registration';
    public static $Title                  = 'h1';
    
    public static $SubmitButton           = '.registration-container [type=submit]';
    public static $AgreeRadioButton       = "[type=hidden][name='Business[agree]']";
    public static $AgreeLabel             = '[for=normalradio-agree_0]';
    
    public static $FirstNameField              = '#user-first_name';
    public static $LastNameField               = '#user-last_name';
    public static $PhoneNumberField            = '#user-phone';
    public static $EmailAddressField           = '#user-email';
    public static $CreatePasswordField         = '#user-password';
    public static $ConfirmPasswordField        = '#user-new_password';
    public static $BusinessNameField           = '#business-name';
    public static $BusinessPhoneField          = '#business-phone';
    public static $StreetAddressField          = '#business-street_address';
    public static $ZipField                    = '#business-zip';
    public static $BusinessWebsiteField        = '#business-website';
    
    //--------------------------City Zip Message Popup--------------------------
    public static $CityZipMessagePopup             = '.sweet-alert.showSweetAlert.visible';
    public static $CityZipMessagePopup_Title       = '.sweet-alert.showSweetAlert.visible h2';
    public static $CityZipMessagePopup_MessageText = '.sweet-alert.showSweetAlert.visible h2+p';
    
//    public static $CityZipMessagePopup_SaveButton                 = '.modal.in .business-size-changed-confirm';
    public static $CityZipMessagePopup_OkButton = '.sweet-alert.showSweetAlert.visible button.confirm';
    
    public static $Error_FirstName              = '#user-first_name+.help-block';
    public static $Error_LastName               = '#user-last_name+.help-block';
    public static $Error_PhoneNumber            = '#user-phone+.help-block';
    public static $Error_EmailAddress           = '#user-email+.help-block';
    public static $Error_CreatePassword         = '#user-password+.help-block';
    public static $Error_ConfirmPassword        = '#user-new_password+.help-block';
    public static $Error_BusinessName           = '#business-name+.help-block';
    public static $Error_BusinessPhone          = '#business-phone+.help-block';
    public static $Error_StreetAddress          = '#business-street_address+.help-block';
    public static $Error_Zip                    = '#business-zip+.help-block';
    public static $Error_BusinessWebsite        = '#business-website+.help-block';
    
    public static $Error_NumberOfEmployees      = '#business-employees_number+.help-block';
    public static $Error_BusinessSquareFootage  = '#business-business_square_footage+.help-block';
    public static $Error_LandscapeSquareFootage = '#business-landscape_square_footage+.help-block';
    
    public static $Error_CitySelect             = '#cities+.help-block';
    public static $Error_StateSelect            = '#business-state_name+.help-block';
    public static $Error_BusinessTypeSelect     = '#business-sector_id+.help-block';
    
    //About the business block
    public static $NumberOfEmployeesField      = '#business-employees_number';
    public static $BusinessSquareFootageField  = '#business-business_square_footage';
    public static $LandscapeSquareFootageField = '#business-landscape_square_footage';
    
    public static function AboutQuestion_Name_ByName($name)                        { return "//*[@class='form-group registration-field'][contains(p/text(), '$name')]";}
    public static function AboutQuestion_AnswerButtonLabel_ByName($name, $answer)  { return "//*[@class='form-group registration-field'][contains(p/text(), '$name')]//div/label[contains(text(), '$answer')]";}
    public static function AboutQuestion_AnswerButton_ByName($name, $answer)       { return "//*[@class='form-group registration-field'][contains(p/text(), '$name')]/div/input[@class='$answer-btn']";}
    
    const AboutQuestion_OwnershipStatus           = 'What is the building ownership status?';
    const OwnBuildingStatus                       = 'Own Building';
    const RentSpaceStatus                         = 'Rent Space';
    const HomeOfficeStatus                        = 'Home Office';
    const AboutQuestion_BusinessLocation          = 'Are there other business locations?';
    const AboutQuestion_HazardousMaterialsOrWaste = 'Are there hazardous materials or waste on site?';
    const AboutQuestion_PoolOrSpa                 = 'Is there a pool or spa on site?';
    const AboutQuestion_EmergencyBackUpGenerator  = 'Is there an Emergency Back-Up Generator on site?';
    
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
    
    public static function Permits_Name_ByName($name)         { return "//*[@class='buttons-group']//label[contains(text(), '$name')]";}
    public static function Permits_ButtonLabel_ByName($name)  { return "//*[@class='buttons-group']//label[contains(text(), '$name')]";}
    
    public static $HowDidYouLearnAboutGBProgramSelect    = '#business-referrer_id';
    
    public static $CitySelect                  = '#cities';
    public static $StateSelect                 = '#business-state_name';
    public static $BusinessTypeSelect          = '#business-sector_id';
    
    public static $CityOption                  = '#cities option';
    public static $StateOption                 = '#business-state_name option';
    public static $BusinessTypeOption          = '#business-sector_id option';
    
    public static function selectCityOption($row)          { return "//*[@id='cities']/option[$row]";}
    public static function selectCityOptionByName($name)   { return "//*[@id='cities']/option[text()='$name']";}
    
    public static $ContactInfoBlockTitle             = '[for=state-name]';
    public static $BusinessInfoBlockTitle            = '[for=state-short_name]';
    public static $AboutTheBusinessBlockTitle        = '[for=state-is_weighted]';
    public static $BusinessRequiredPermitsBlockTitle = '#state-name+.help-block';


}
