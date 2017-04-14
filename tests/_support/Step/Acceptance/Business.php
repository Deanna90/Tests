<?php
namespace Step\Acceptance;

class Business extends \AcceptanceTester
{
    public function RegisterBusiness($firstName = null, $lastName = null, $phoneNumber = null, $email = null, $password = null, $confirmPassword = null, 
                                $businessName = null, $businessPhone = null ,$streetAddress = null, $zip = null, $city = null, $website = null, $businessType = null,
                                $employees = null, $businessFootage = null, $landscapeFootage = null, $agree = 'on', $state = null)
    {
        $I = $this;
        $I->amOnPage(\Page\BusinessRegistration::$URL);
        $I->wait(2);
        $I->waitForElement(\Page\BusinessRegistration::$FirstNameField);
        if (isset($firstName)){
            $I->fillField(\Page\BusinessRegistration::$FirstNameField, $firstName);
        }
        if (isset($lastName)){
            $I->fillField(\Page\BusinessRegistration::$LastNameField, $lastName);
        }
        if (isset($phoneNumber)){
            $I->fillField(\Page\BusinessRegistration::$PhoneNumberField, $phoneNumber);
        }
        if (isset($email)){
            $I->fillField(\Page\BusinessRegistration::$EmailAddressField, $email);
        }
        if (isset($password)){
            $I->fillField(\Page\BusinessRegistration::$CreatePasswordField, $password);
        }
        if (isset($confirmPassword)){
            $I->fillField(\Page\BusinessRegistration::$ConfirmPasswordField, $confirmPassword);
        }
        if (isset($businessName)){
            $I->fillField(\Page\BusinessRegistration::$BusinessNameField, $businessName);
        }
        if (isset($businessPhone)){
            $I->fillField(\Page\BusinessRegistration::$BusinessPhoneField, $businessPhone);
        }
        if (isset($streetAddress)){
            $I->fillField(\Page\BusinessRegistration::$StreetAddressField, $streetAddress);
        }
        if (isset($zip)){
            $I->fillField(\Page\BusinessRegistration::$ZipField, $zip);
        }
        if (isset($city)){
            $I->wait(1);
            $I->click(\Page\BusinessRegistration::$CitySelect);
            $I->wait(2);
            $I->selectOption(\Page\BusinessRegistration::$CitySelect, $city);
        }
        if (isset($state)){
            $I->seeOptionIsSelected(\Page\BusinessRegistration::$StateSelect, $state);
        }
        if (isset($website)){
            $I->fillField(\Page\BusinessRegistration::$BusinessWebsiteField, $website);
        }
        if (isset($businessType)){
            $I->selectOption(\Page\BusinessRegistration::$BusinessTypeSelect, $businessType);
        }
        if (isset($employees)){
            $I->fillField(\Page\BusinessRegistration::$NumberOfEmployeesField, $employees);
        }
        if (isset($businessFootage)){
            $I->fillField(\Page\BusinessRegistration::$BusinessSquareFootageField, $businessFootage);
        }
        if (isset($landscapeFootage)){
            $I->fillField(\Page\BusinessRegistration::$LandscapeSquareFootageField, $landscapeFootage);
        }
        switch ($agree){
            case 'on':
                $I->click(\Page\BusinessRegistration::$AgreeLabel);
                $I->wait(1);
                break;
            case 'off':
                break;
            case 'ignore':
                break;
        }
        $I->click(\Page\BusinessRegistration::$SubmitButton);
        $I->wait(2);
    }  
}