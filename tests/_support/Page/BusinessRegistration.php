<?php
namespace Page;

class BusinessRegistration
{
    public static $URL                    = '/business/registration';
    public static $Title                  = 'h1';
    
    public static $SubmitButton           = '[type=submit]';
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
    public static $NumberOfEmployeesField      = '#business-employees_number';
    public static $BusinessSquareFootageField  = '#business-business_square_footage';
    public static $LandscapeSquareFootageField = '#business-landscape_square_footage';
    
    public static $CitySelect                  = '#cities';
    public static $StateSelect                 = '#business-state_name';
    public static $BusinessTypeSelect          = '#business-sector_id';
    
    public static $ContactInfoBlockTitle             = '[for=state-name]';
    public static $BusinessInfoBlockTitle            = '[for=state-short_name]';
    public static $AboutTheBusinessBlockTitle        = '[for=state-is_weighted]';
    public static $BusinessrequiredPermitsBlockTitle = '#state-name+.help-block';


}
