<?php
namespace Step\Acceptance;

class User extends \AcceptanceTester
{
    
    public function CreateUser($userType = null, $email = null, $firstName = null, $lastName = null, $password = null, $confirmPassword = null, 
                                $phone = null, $type = null, $receiveNotificationArray = null, $primaryCoordinator = 'off')
    {
        $I = $this;
        $I->amOnPage(\Page\UserCreate::URL($userType));
//        $I->wait(1);
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
//        if (isset($showInfoForProgramsArray)){
//            for ($i=1, $c= count($showInfoForProgramsArray); $i<=$c; $i++){
//                $k = $i-1;
//                $I->click(\Page\UserCreate::$ShowContactInfoInProgramSelect);
//                $I->wait(3);
//                $I->click(\Page\UserCreate::selectShowContactInfoInProgramOptionByName($showInfoForProgramsArray[$k]));
//            }
//        }
        if (isset($receiveNotificationArray)){
            for ($i=1, $c= count($receiveNotificationArray); $i<=$c; $i++){
                $k = $i-1;
                $I->click(\Page\UserCreate::$ReceiveNotificationsSelect);
                $I->wait(3);
                $I->click(\Page\UserCreate::selectReceiveNotificationsOptionByName($receiveNotificationArray[$k]));
            }
        }
        switch ($primaryCoordinator){
            case 'on':
                $I->click(\Page\UserCreate::$IsPrimaryCoordinatorToggleButton);
                $I->wait(1);
                $I->canSeeElement(\Page\UserCreate::$IsPrimaryCoordinatorInProgramsSelect.'.chosen-disabled');
                break;
            case 'off':
                break;
        }
        $I->click(\Page\UserCreate::$CreateButton);
        $I->wait(2);
        $I->waitPageLoad();
//        $I->wait(15);
    }  
    
    public function AddProgramsToShowInfoDropdownOnUserUpdatePage($showInfoForProgramsArray)
    {
        $I = $this;
        for ($i=1, $c= count($showInfoForProgramsArray); $i<=$c; $i++){
                $k = $i-1;
                $I->click(\Page\UserUpdate::$ShowContactInfoInProgramSelect);
                $I->wait(3);
                $I->click(\Page\UserUpdate::selectShowContactInfoInProgramOptionByName($showInfoForProgramsArray[$k]));
        }
        $I->click(\Page\UserUpdate::$UpdateButton);
        $I->wait(2);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
    }  
        
    public function AddProgramsToIsPrimaryForNextProgramsDropdownOnUserUpdatePage($isPrimaryForProgramsArray)
    {
        $I = $this;
        for ($i=1, $c= count($isPrimaryForProgramsArray); $i<=$c; $i++){
                $k = $i-1;
                $I->click(\Page\UserUpdate::$IsPrimaryCoordinatorInProgramsSelect);
                $I->wait(3);
                $I->click(\Page\UserUpdate::selectIsPrimaryCoordinatorInProgramsOptionByName($isPrimaryForProgramsArray[$k]));
        }
        $I->click(\Page\UserUpdate::$UpdateButton);
        $I->wait(2);
        $I->waitPageLoad();
        $I->reloadPage();
        $I->waitPageLoad();
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
        $I->amOnPage(\Page\UserList::URL($userType).'&sort=-id');
//        $I->wait(1);
        $count = $I->grabTextFrom(\Page\UserList::$SummaryCount);
        $I->comment("Count1 = $count");
        $count = str_replace(",", '', $count);
        $I->comment("Count2 = $count");
        $pageCount = ceil($count/20);
        $I->comment("Page count = $pageCount");
        for($i=1; $i<=$pageCount; $i++){
            $I->amOnPage(\Page\UserList::UrlPageNumber($i, $userType));
//            $I->wait(1);
            $rows = $I->getAmount($I, \Page\UserList::$UserRow);
            $I->comment("Count of rows = $rows");
            for($j=1; $j<=$rows; $j++){
                if($I->grabTextFrom(\Page\UserList::EmailLine($j)) == $email){
                    $I->comment("I find user: $email at row: $j on page: $i");
                    break 2;
                }
            }
        }
        $user['id']   = $I->grabTextFrom(\Page\UserList::IdLine($j));
        $user['page'] = $i;
        $user['row']  = $j;
        return $user;
    }
    
    public function GetUserIDFromUrl($I)
    {
        $I = $this;
        $urlUpdatePage = $I->grabFromCurrentUrl();
        $I->comment("Url: $urlUpdatePage");
        $u = explode('=', $urlUpdatePage);
        $user = $u[1];
        $I->comment("User url: $user.");
        $u = explode('&', $user);
        $userID = $u[0];
        $I->comment("User id: $userID.");
        return $userID;
    }
    
    public function SearchUserByEmailOnPageInList($userType = null, $email =null , $firstName = null, $lastName = null, $status = 'active', $type = null, $createdDate = null)
    {
        $I = $this;
        $I->amOnPage(\Page\UserList::URL($userType));
//        $I->wait(1);
        $I->fillField(\Page\UserList::$ByNameEmailSearchField, $email);
        $I->wait(1);
        $I->pressKey(\Page\UserList::$ByNameEmailSearchField, \WebDriverKeys::ENTER);
        $I->wait(5);
        $I->waitPageLoad();
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
    
    public function CheckValuesOnUserListPage($userType = null, $row, $email =null , $firstName = null, $lastName = null, $status = 'active', $type = null, 
                                $updateButton = 'ignore', $deleteButton = 'ignore', $viewButton = 'ignore', $createdDate = null)
    {
        $I = $this;
        $I->amOnPage(\Page\UserList::URL($type));
//        $I->wait(1);
//        $I->waitForElement(\Page\UserList::$CreateUserButton);
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
        switch ($updateButton){
            case 'present':
                $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
                break;
            case 'absent':
                $I->cantSeeElement(\Page\UserList::UpdateButtonLine($row));
                break;
            case 'ignore':
                break;
        }
        switch ($deleteButton){
            case 'present':
                $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
                break;
            case 'absent':
                $I->cantSeeElement(\Page\UserList::DeleteButtonLine($row));
                break;
            case 'ignore':
                break;
        }
        switch ($viewButton){
            case 'present':
                $I->canSeeElement(\Page\UserList::ViewButtonLine($row));
                break;
            case 'absent':
                $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
                break;
            case 'ignore':
                break;
        }
    }
    
    public function UpdateUser($email = null, $firstName = null, $lastName = null, $password = null, $confirmPassword = null, 
                                $phone = null, $typeSaved = null, $typeTab = null, $state = null, $programsArray = null, $primaryCoordinator = 'ignore', 
                                $isPrimaryForProgramsArray = null, $showInfoForProgramsArray = null, $receiveNotifications = null)
    {
        $I = $this;
        $I->waitPageLoad();
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
        if (isset($typeSaved)){
            $I->canSeeOptionIsSelected(\Page\UserUpdate::$TypeDisabledSelect, $typeSaved);
        }
        if(isset($email) || isset($firstName) || isset($lastName) || isset($password) || isset($confirmPassword) || isset($phone)){
            $I->click(\Page\UserUpdate::$UpdateButton);
            $I->waitPageLoad();
            $I->reloadPage();
            $I->waitPageLoad();
        }
        switch ($typeTab){
            case 'state admin':
                $I->canSeeElement(\Page\UserUpdate::$StateAdminTab);
                $I->click(\Page\UserUpdate::$StateAdminTab);
                $I->wait(1);
                $I->waitPageLoad();
                if(isset($state)){
                    $I->click(\Page\UserUpdate::$AddStateButton);
                    $I->wait(1);
                    $I->waitPageLoad();
                    $I->selectOption(\Page\UserUpdate::$StateSelect_AddStateForm, $state);
                    $I->click(\Page\UserUpdate::$AddButton_AddStateForm);
                    $I->wait(1);
                    $I->waitPageLoad();
                    $I->canSee($state, \Page\UserUpdate::$State);
                }
                break;
            case 'coordinator':
                $I->canSeeElement(\Page\UserUpdate::$CoordinatorTab);
                $I->click(\Page\UserUpdate::$CoordinatorTab);
                $I->wait(1);
                $I->waitPageLoad();
                if(isset($state)){
                    $I->click(\Page\UserUpdate::$AddStateButton);
                    $I->wait(1);
                    $I->waitPageLoad();
                    $I->selectOption(\Page\UserUpdate::$StateSelect_AddStateForm, $state);
                    $I->click(\Page\UserUpdate::$AddButton_AddStateForm);
                    $I->wait(1);
                    $I->waitPageLoad();
                    $I->canSee($state, \Page\UserUpdate::$State);
                }
                if (isset($programsArray)){
                    for ($i=1, $c= count($programsArray); $i<=$c; $i++){
                        $k = $i-1;
                        $I->click(\Page\UserUpdate::$AddProgramButton);
                        $I->wait(1);
                        $I->waitPageLoad();
                        $I->click(\Page\UserUpdate::$ProgramSelect_AddProgramForm);
                        $I->waitPageLoad();
                        $I->selectOption(\Page\UserUpdate::$ProgramSelect_AddProgramForm, $programsArray[$k]);
                        $I->click(\Page\UserUpdate::$AddButton_AddProgramForm);
                        $I->wait(1);
                        $I->waitPageLoad();
                        $I->canSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($programsArray[$k]));
                    }
                }
                switch ($primaryCoordinator){
                    case 'on':
                        $I->click(\Page\UserCreate::$IsPrimaryCoordinatorToggleButton);
                        $I->wait(1);
                        if(isset($isPrimaryForProgramsArray)){
                            for ($i=1, $c= count($isPrimaryForProgramsArray); $i<=$c; $i++){
                                    $k = $i-1;
                                    $I->click(\Page\UserUpdate::$IsPrimaryCoordinatorInProgramsSelect);
                                    $I->wait(3);
                                    $I->click(\Page\UserUpdate::selectIsPrimaryCoordinatorInProgramsOptionByName($isPrimaryForProgramsArray[$k]));
                            }
                        }
                        //$I->canSeeElement(\Page\UserCreate::$IsPrimaryCoordinatorInProgramsSelect.'.chosen-disabled');
                        break;
                    case 'off':
                        break;
                    case 'ignore':
                        break;
                }
                if(isset($showInfoForProgramsArray)){
                            for ($i=1, $c= count($showInfoForProgramsArray); $i<=$c; $i++){
                                    $k = $i-1;
                                    $I->click(\Page\UserUpdate::$ShowContactInfoInProgramSelect);
                                    $I->wait(3);
                                    $I->click(\Page\UserUpdate::selectShowContactInfoInProgramOptionByName($showInfoForProgramsArray[$k]));
                            }
                }
                if(isset($receiveNotifications)){
                            for ($i=1, $c= count($receiveNotifications); $i<=$c; $i++){
                                    $k = $i-1;
                                    $I->click(\Page\UserUpdate::$ReceiveNotificationsSelect);
                                    $I->wait(3);
                                    $I->click(\Page\UserUpdate::selectReceiveNotificationsOptionByName($receiveNotifications[$k]));
                            }
                }
                $I->click(\Page\UserUpdate::$UpdateButton);
                $I->waitPageLoad();
                $I->reloadPage();
                $I->waitPageLoad();
                break;
            case 'auditor':
                $I->canSeeElement(\Page\UserUpdate::$AuditorTab);
                $I->click(\Page\UserUpdate::$AuditorTab);
                $I->wait(1);
                $I->waitPageLoad();
                if(isset($state)){
                    $I->click(\Page\UserUpdate::$AddStateButton);
                    $I->wait(1);
                    $I->waitPageLoad();
                    $I->selectOption(\Page\UserUpdate::$StateSelect_AddStateForm, $state);
                    $I->click(\Page\UserUpdate::$AddButton_AddStateForm);
                    $I->wait(1);
                    $I->waitPageLoad();
                    $I->canSee($state, \Page\UserUpdate::$State);
                }
                if (isset($programsArray)){
                    for ($i=1, $c= count($programsArray); $i<=$c; $i++){
                        $k = $i-1;
                        $I->click(\Page\UserUpdate::$AddProgramButton);
                        $I->wait(1);
                        $I->waitPageLoad();
                        $I->click(\Page\UserUpdate::$ProgramSelect_AddProgramForm);
                        $I->waitPageLoad();
                        $I->selectOption(\Page\UserUpdate::$ProgramSelect_AddProgramForm, $programsArray[$k]);
                        $I->click(\Page\UserUpdate::$AddButton_AddProgramForm);
                        $I->wait(1);
                        $I->waitPageLoad();
                        $I->canSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($programsArray[$k]));
                    }
                }
                break;
            case 'inspector':
                $I->canSeeElement(\Page\UserUpdate::$InspectorTab);
                $I->click(\Page\UserUpdate::$InspectorTab);
                $I->wait(1);
                $I->waitPageLoad();
                if(isset($state)){
                    $I->click(\Page\UserUpdate::$AddStateButton);
                    $I->wait(1);
                    $I->waitPageLoad();
                    $I->selectOption(\Page\UserUpdate::$StateSelect_AddStateForm, $state);
                    $I->click(\Page\UserUpdate::$AddButton_AddStateForm);
                    $I->wait(1);
                    $I->waitPageLoad();
                    $I->canSee($state, \Page\UserUpdate::$State);
                }
                if (isset($programsArray)){
                    for ($i=1, $c= count($programsArray); $i<=$c; $i++){
                        $k = $i-1;
                        $I->click(\Page\UserUpdate::$AddProgramButton);
                        $I->wait(1);
                        $I->waitPageLoad();
                        $I->click(\Page\UserUpdate::$ProgramSelect_AddProgramForm);
                        $I->waitPageLoad();
                        $I->selectOption(\Page\UserUpdate::$ProgramSelect_AddProgramForm, $programsArray[$k]);
                        $I->click(\Page\UserUpdate::$AddButton_AddProgramForm);
                        $I->wait(1);
                        $I->waitPageLoad();
                        $I->canSeeElement(\Page\UserUpdate::ProgramNameLine_ByName($programsArray[$k]));
                    }
                }
                break;
        }
//        $I->click(\Page\UserUpdate::$UpdateButton);
//        $I->waitPageLoad();
    }  
    
    
}