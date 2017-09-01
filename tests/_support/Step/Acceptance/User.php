<?php
namespace Step\Acceptance;

class User extends \AcceptanceTester
{
    
    public function CreateUser($userType = null, $email = null, $firstName = null, $lastName = null, $password = null, $confirmPassword = null, 
                                $phone = null, $type = null, $showInfo = 'ignore')
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
            $I->canSeeOptionIsSelected(\Page\UserCreate::$TypeDisabledSelect, $type);
        }
        switch ($showInfo){
            case 'on' :
                if($I->grabAttributeFrom(\Page\UserCreate::$ShowContactInfoCheckbox, 'checked') == NULL){
                    $I->click(\Page\UserCreate::$ShowContactInfoCheckboxLabel);
                }
//                $checked = $I->grabAttributeFrom(\Page\UserCreate::$ShowContactInfoCheckbox, 'checked');
                break;
            case 'off' :
                if($I->grabAttributeFrom(\Page\UserCreate::$ShowContactInfoCheckbox, 'checked') == true){
                    $I->click(\Page\UserCreate::$ShowContactInfoCheckboxLabel);
                }
                break;
            case 'ignore' :
                break;
        }
        $I->click(\Page\UserCreate::$CreateButton);
        $I->wait(5);
    }  
    
    public function CheckInFieldsOnUserUpdatePage($email = null, $firstName = null, $lastName = null, $password = null, $confirmPassword = null, 
                                $phone = null, $type = null)
    {
        $I = $this;
        $I->wait(1);
        $I->waitForElement(\Page\UserUpdate::$UpdateButton);
        if (isset($email)){
            $I->canSeeInField(\Page\UserUpdate::$EmailField, $email);
        }
        if (isset($firstName)){
            $I->canSeeInField(\Page\UserUpdate::$FirstNameField, $firstName);
        }
        if (isset($lastName)){
            $I->canSeeInField(\Page\UserUpdate::$LastNameField, $lastName);
        }
        if (isset($password)){
            $I->canSeeInField(\Page\UserUpdate::$PasswordField, $password);
        }
        if (isset($confirmPassword)){
            $I->canSeeInField(\Page\UserUpdate::$ConfirmPasswordField, $confirmPassword);
        }
        if (isset($phone)){
            $I->canSeeInField(\Page\UserUpdate::$PhoneField, $phone);
        }
        if (isset($type)){
            $I->canSeeOptionIsSelected(\Page\UserUpdate::$TypeDisabledSelect, $type);
        }
        switch ($type){
            case 'state admin':
                $I->canSee("States", \Page\UserUpdate::$StatesHeadTitle);
                $I->canSeeElement(\Page\UserUpdate::$AddStateButton);
                $I->cantSee("Programs", \Page\UserUpdate::$ProgramsHeadTitle);
                $I->cantSeeElement(\Page\UserUpdate::$AddProgramButton);
                break;
            case 'coordinator':
                $I->canSee("States", \Page\UserUpdate::$StatesHeadTitle);
                $I->canSeeElement(\Page\UserUpdate::$AddStateButton);
                $I->canSee("Programs", \Page\UserUpdate::$ProgramsHeadTitle);
                $I->canSeeElement(\Page\UserUpdate::$AddProgramButton);
                break;
            case 'auditor':
                $I->canSee("States", \Page\UserUpdate::$StatesHeadTitle);
                $I->canSeeElement(\Page\UserUpdate::$AddStateButton);
                $I->canSee("Programs", \Page\UserUpdate::$ProgramsHeadTitle);
                $I->canSeeElement(\Page\UserUpdate::$AddProgramButton);
                break;
            case 'inspector':
                $I->canSee("States", \Page\UserUpdate::$StatesHeadTitle);
                $I->canSeeElement(\Page\UserUpdate::$AddStateButton);
                $I->canSee("Programs", \Page\UserUpdate::$ProgramsHeadTitle);
                $I->canSeeElement(\Page\UserUpdate::$AddProgramButton);
                break;
        }
    }
    
    public function GetUserOnPageInList($email, $userType = null)
    {
        $I = $this;
        $I->amOnPage(\Page\UserList::URL($userType));
        $I->wait(1);
        $count = $I->grabTextFrom(\Page\UserList::$SummaryCount);
        $pageCount = ceil($count/20);
        $I->comment("Page count = $pageCount");
        for($i=1; $i<=$pageCount; $i++){
            $I->amOnPage(\Page\UserList::UrlPageNumber($i, $userType));
            $I->wait(1);
            $rows = $I->getAmount($I, \Page\UserList::$UserRow);
            $I->comment("Count of rows = $rows");
            for($j=1; $j<=$rows; $j++){
                if($I->grabTextFrom(\Page\UserList::EmailLine($j)) == $email){
                    $I->comment("I find city: $email at row: $j on page: $i");
                    break 2;
                }
            }
        }
        $city['id']   = $I->grabTextFrom(\Page\UserList::IdLine($j));
        $city['page'] = $i;
        $city['row']  = $j;
        return $city;
    }
    
    public function SearchUserByEmailOnPageInList($userType = null, $email =null , $firstName = null, $lastName = null, $status = 'active', $type = null, $createdDate = null)
    {
        $I = $this;
        $I->amOnPage(\Page\UserList::URL($userType));
        $I->wait(1);
        $I->fillField(\Page\UserList::$ByNameEmailSearchField, $email);
        $I->wait(1);
        $I->pressKey(\Page\UserList::$ByNameEmailSearchField, \WebDriverKeys::ENTER);
        $I->wait(3);
        if (isset($email)){
            $I->canSee($email, \Page\UserList::EmailLine(1));
        }
        if (isset($firstName)){
            $I->canSee($firstName, \Page\UserList::FirstNameLine(1));
        }
        if (isset($lastName)){
            $I->canSee($lastName, \Page\UserList::LastNameLine(1));
        }
        if (isset($type)){
            $I->canSee($type, \Page\UserList::TypeLine(1));
        }
        if (isset($createdDate)){
            $I->canSee($createdDate, \Page\UserList::CreatedLine(1));
        }
        if (isset($status)){
            $I->canSee($status, \Page\UserList::StatusLine(1));
        }
    }
    
    public function CheckValuesOnUserListPage($userType = null, $row, $email =null , $firstName = null, $lastName = null, $status = 'active', $type = null, $createdDate = null)
    {
        $I = $this;
        $I->amOnPage(\Page\UserList::URL($type));
        $I->wait(1);
        $I->waitForElement(\Page\UserList::$CreateUserButton);
        if (isset($email)){
            $I->canSee($email, \Page\UserList::EmailLine($row));
        }
        if (isset($firstName)){
            $I->canSee($firstName, \Page\UserList::FirstNameLine($row));
        }
        if (isset($lastName)){
            $I->canSee($lastName, \Page\UserList::LastNameLine($row));
        }
        if (isset($type)){
            $I->canSee($type, \Page\UserList::TypeLine($row));
        }
        if (isset($createdDate)){
            $I->canSee($createdDate, \Page\UserList::CreatedLine($row));
        }
        if (isset($status)){
            $I->canSee($status, \Page\UserList::StatusLine($row));
        }
    }
    
    public function UpdateUser($userType = null, $email = null, $firstName = null, $lastName = null, $password = null, $confirmPassword = null, 
                                $phone = null, $type = null)
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
            $I->canSeeOptionIsSelected(\Page\UserUpdate::$TypeDisabledSelect, $type);
        }
        if (isset($state)){
            
        }
        if (isset($programs)){
            
        }
        $I->click(\Page\UserUpdate::$UpdateButton);
        $I->wait(2);
    }  
}