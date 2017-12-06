<?php
namespace Step\Acceptance;

class Business extends \AcceptanceTester
{
    public function RegisterBusiness($firstName = null, $lastName = null, $phoneNumber = null, $email = null, $password = null, $confirmPassword = null, 
                                $businessName = null, $businessPhone = null ,$streetAddress = null, $zip = null, $city = null, $website = null, $businessType = null,
                                $employees = null, $businessFootage = null, $landscapeFootage = null, $agree = 'on', $state = null, $aboutActivateValueArray = null, 
                                $permitsActivateArray = null)
    {
        $I = $this;
        $I->amOnPage(\Page\BusinessRegistration::$URL);
        $I->wait(2);
        $I->waitForElement(\Page\BusinessRegistration::$BusinessNameField);
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
            $I->wait(1);
            $I->click(\Page\BusinessRegistration::$CreatePasswordField);
            $I->wait(1);
        }
        if (isset($password)){
            $I->fillField(\Page\BusinessRegistration::$CreatePasswordField, $password);
        }
        if (isset($confirmPassword)){
            $I->fillField(\Page\BusinessRegistration::$ConfirmPasswordField, $confirmPassword);
            $I->wait(1);
            $I->click(\Page\BusinessRegistration::$BusinessNameField);
            $I->wait(1);
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
            $I->wait(5);
            $I->click(\Page\BusinessRegistration::$CitySelect);
            $I->wait(3);
            $I->selectOption(\Page\BusinessRegistration::$CitySelect, $city);
        }
        if (isset($state)){
            $I->seeOptionIsSelected(\Page\BusinessRegistration::$StateSelect, $state);
        }
        if (isset($website)){
            $I->fillField(\Page\BusinessRegistration::$BusinessWebsiteField, $website);
        }
        if (isset($businessType)){
            $I->wait(2);
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
        if (isset($aboutActivateValueArray)){
            $I->scrollTo(\Page\BusinessRegistration::$NumberOfEmployeesField);
            $I->wait(1);
            for ($c= count($aboutActivateValueArray), $i=$c; $i>=1; $i--){
                $k = $i-1;
                $I->makeElementVisible([$aboutActivateValueArray[$k]], $style = 'display');
                $I->wait(3);
                $I->comment("1");
                $I->click($aboutActivateValueArray[$k]);
                $I->wait(1);
            }
        }
        if (isset($permitsActivateArray)){
            $I->scrollTo(\Page\BusinessRegistration::$NumberOfEmployeesField);
            $I->wait(1);
            for ($c= count($permitsActivateArray), $i=$c; $i>=1; $i--){
                $k = $i-1;
                $I->makeElementVisible([$permitsActivateArray[$k]], $style = 'display');
                $I->wait(2);
                $I->comment("1");
                $I->scrollTo($permitsActivateArray[$k]);
                $I->wait(1);
                $I->click($permitsActivateArray[$k]);
                $I->wait(1);
            }
        }
        switch ($agree){
            case 'on':
                $I->scrollTo(\Page\BusinessRegistration::$AgreeLabel);
                $I->wait(1);
                $I->click(\Page\BusinessRegistration::$AgreeLabel);
                $I->wait(1);
                break;
            case 'off':
                break;
            case 'ignore':
                break;
        }
        $I->scrollTo(\Page\BusinessRegistration::$SubmitButton);
        $I->wait(1);
        $I->click(\Page\BusinessRegistration::$SubmitButton);
        $I->wait(2);
    }  
    
//    public function makeElementVisible($el, $css)
//	{
//		$I = $this;
//		foreach ($el as $key) {
//			$I->executeJS('$(\''.$key.'\').attr("style","'.$css.'");');
//		}
//        }       
	
}