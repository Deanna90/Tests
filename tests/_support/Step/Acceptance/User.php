<?php
namespace Step\Acceptance;

class User extends \AcceptanceTester
{
    
    public function CreateUser($userType = null, $email = null, $firstName = null, $lastName = null, $password = null, $confirmPassword = null, 
                                $phone = null, $status = null ,$type = null)
    {
        $I = $this;
        $I->amOnPage(\Page\UserCreate::URL($userType));
        $I->wait(1);
        $I->waitForElement(\Page\UserCreate::$EmailField);
        if (isset($email)){
            $I->fillField(\Page\UserCreate::$EmailField, $email);
        }
        if (isset($firstName)){
            $I->fillField(\Page\UserCreate::$FirstNameField, $firstName);
        }
        if (isset($lastName)){
            $I->fillField(\Page\UserCreate::$LastNameField, $lastName);
        }
        if (isset($password)){
            $I->fillField(\Page\UserCreate::$PasswordField, $password);
        }
        if (isset($confirmPassword)){
            $I->fillField(\Page\UserCreate::$ConfirmPasswordField, $confirmPassword);
        }
        if (isset($phone)){
            $I->fillField(\Page\UserCreate::$PhoneField, $phone);
        }
        if (isset($type)){
            $I->seeOptionIsSelected(\Page\UserCreate::$TypeDisabledSelect, $type);
        }
        if (isset($status)){
            $I->selectOption(\Page\UserCreate::$StatusSelect, $status);
        }
        
        $I->click(\Page\UserCreate::$CreateButton);
        $I->wait(2);
    }  
    
    public function UpdateUser($userType = null, $email = null, $firstName = null, $lastName = null, $password = null, $confirmPassword = null, 
                                $phone = null, $status = null ,$type = null)
    {
        $I = $this;
        $I->amOnPage(\Page\UserCreate::URL($userType));
        $I->wait(1);
        $I->waitForElement(\Page\UserUpdate::$EmailField);
        if (isset($email)){
            $I->fillField(\Page\UserUpdate::$EmailField, $email);
        }
        if (isset($firstName)){
            $I->fillField(\Page\UserUpdate::$FirstNameField, $firstName);
        }
        if (isset($lastName)){
            $I->fillField(\Page\UserUpdate::$LastNameField, $lastName);
        }
        if (isset($password)){
            $I->fillField(\Page\UserUpdate::$PasswordField, $password);
        }
        if (isset($confirmPassword)){
            $I->fillField(\Page\UserUpdate::$ConfirmPasswordField, $confirmPassword);
        }
        if (isset($phone)){
            $I->fillField(\Page\UserUpdate::$PhoneField, $phone);
        }
        if (isset($type)){
            $I->seeOptionIsSelected(\Page\UserUpdate::$TypeDisabledSelect, $type);
        }
        if (isset($status)){
            $I->selectOption(\Page\UserUpdate::$StatusSelect, $status);
        }
        if (isset($state)){
            
        }
        if (isset($programs)){
            
        }
        $I->click(\Page\UserUpdate::$UpdateButton);
        $I->wait(2);
    }  
}