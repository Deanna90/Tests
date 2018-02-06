<?php


class ChangingLoginUserForBusinessCest
{
    public $state, $program1, $program2, $idState, $county, $idCity1, $idCity2, $idProg2, $sector1, $sector2, $sector3, $city1, $city2, $zip1, $zip2;
    public $emailStateAdmin1, $emailStateAdmin2, $emailCoordinator1, $emailCoordinator2, $emailInspector, $emailAuditor;
    public $firstName_StateAdmin1, $firstName_StateAdmin2, $firstName_Coordinator1, $firstName_Coordinator2, $firstName_Inspector, $firstName_Auditor;
    public $lastName_StateAdmin1, $lastName_StateAdmin2, $lastName_Coordinator1, $lastName_Coordinator2, $lastName_Inspector, $lastName_Auditor;
    public $idStateAdmin1, $idStateAdmin2, $idCoordinator1, $idCoordinator2, $idInspector, $idAuditor;
    
    //--------------------------------------------------------------------------Login As National Admin------------------------------------------------------------------------------------
    
    public function NationalAdmin1_LogInAsAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
        date_default_timezone_set("UTC");
        $this->todayDate  = date("m/d/Y");
    }
    
    public function NationalAdmin1_1_CreateState(Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StUserAccess");
        $shortName = 'UA';
        
        $I->CreateState($name, $shortName);
        $state = $I->GetStateOnPageInList($name);
        $this->idState = $state['id'];
    }
    
   
    public function NationalAdmin1_2_SelectDefaultState(AcceptanceTester $I)
    {
        $I->wait(2);
        $I->SelectDefaultState($I, $this->state);
    }
    
    //---------------------------Create State Admin1-----------------------------
    
    public function NationalAdmin_CreateStateAdmin1_ForCreatedState(\Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::stateAdminType;
        $email     = $this->emailStateAdmin = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnam');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(5);
        $I->reloadPage();
        $I->wait(6);
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(6);
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(4);
        $stateAdmin = $I->GetUserOnPageInList($email, $userType);
        $this->idStateAdmin = $stateAdmin['id'];
    }
    
    public function NationalAdmin_CreateStateAdmin2_ForCreatedState(\Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::stateAdminType;
        $email     = $this->emailStateAdmin = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnam');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(5);
        $I->reloadPage();
        $I->wait(6);
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(6);
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(4);
        $stateAdmin = $I->GetUserOnPageInList($email, $userType);
        $this->idStateAdmin = $stateAdmin['id'];
    }
    
    public function NationalAdmin1_7_CheckAllUsersListPage1(\Step\Acceptance\User $I)
    {
        $I->amOnPage(\Page\UserList::URL(\Page\UserCreate::allType));
        $I->wait(3);
        $I->canSee('1', Page\UserList::$SummaryCount);
        
        $I->cantSee(USER_EMAIL, \Page\UserList::$EmailRow);
        $I->cantSee('master admin', \Page\UserList::$TypeRow);
        $user1 = $I->GetUserOnPageInList($this->emailStateAdmin, Page\UserCreate::allType);
        $row = $user1['row'];
        $I->canSee($this->emailStateAdmin, \Page\UserList::EmailLine($row));
        $I->canSee($this->firstName_StateAdmin, \Page\UserList::FirstNameLine($row));
        $I->canSee($this->lastName_StateAdmin, \Page\UserList::LastNameLine($row));
        $I->canSee('active', \Page\UserList::StatusLine($row));
        $I->canSee('state admin', \Page\UserList::TypeLine($row));
        $I->canSee($this->todayDate, \Page\UserList::CreatedLine($row));
        $I->canSeeElement(\Page\UserList::UpdateButtonLine($row));
        $I->canSeeElement(\Page\UserList::DeleteButtonLine($row));
        $I->cantSeeElement(\Page\UserList::ViewButtonLine($row));
    }
}
