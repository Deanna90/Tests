<?php


class AccessCest
{
    public $state, $program1, $idState1, $idState2;
    public $emailStateAdmin, $emailCoordinator, $emailInspector, $emailAuditor;
    public $password = 'Qq!1111111';
    public $pageNotFoundText = "Page not found";
    public $titleNotFoundText = "Not Found (#404)";

    public function Help1_LogInAsAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    public function Help1_1_CreateState(Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StateAccess");
        $shortName = 'MGT';
        
        $I->CreateState($name, $shortName);
        $state = $I->GetStateOnPageInList($name);
        $this->idState1 = $state['id'];
        $this->idState2 = $I->grabTextFrom(Page\StateList::IdLine('1'));
    }
    
   
    public function Help1_2_SelectDefaultState(AcceptanceTester $I)
    {
        $I->wait(2);
        $I->SelectDefaultState($I, $this->state);
    }
    
    public function Help1_3_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $I->GenerateNameOf("CityAccess");
        $state   = $this->state;
        $zips    = $I->GenerateZipCode();
        $program = $this->program1 = $I->GenerateNameOf("ProgAccess");
        
        $I->CreateCity($city, $state, $zips);
        $Y->CreateProgram($program, $state, $city);
    }
    
    //--------------------------Create State Admin------------------------------
    
    public function Help1_4_CreateStateAdminUser(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::stateAdminType;
        $email     = $this->emailStateAdmin = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnam');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->reloadPage();
        $I->wait(1);
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(2);
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(1);
    }
    
    //--------------------------Create Coordinator------------------------------
    
    public function Help1_5_CreateCoordinatorUser(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::coordinatorType;
        $email     = $this->emailCoordinator = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnam');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->reloadPage();
        $I->wait(1);
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(2);
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(2);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
    }
    
    //---------------------------Create Inspector-------------------------------
    
    public function Help1_6_CreateInspectorUser(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::inspectorType;
        $email     = $this->emailInspector = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnam');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->reloadPage();
        $I->wait(1);
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(2);
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(2);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
    }
    
    //-----------------------------Create Auditor-------------------------------
    
    public function Help1_7_CreateAuditorUser(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::auditorType;
        $email     = $this->emailAuditor = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnam');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->reloadPage();
        $I->wait(1);
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(2);
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(2);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
    }
    
    //--------------------------------State Admin-------------------------------
    //--------------------------------------------------------------------------
    
    public function Help2_LogoutAndLoginAsStateAdmin(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->LoginAsUser($this->emailStateAdmin, $this->password, $I, $type = 'state admin');
    }
    
    public function StateAccess2_1_CheckStatesMenuItemAbsent_ForStateAdmin(AcceptanceTester $I)
    {
        $I->dontSeeElement(Page\MainMenu::selectMenuItemByName("States"));
    }
    
    public function StateAccess2_2_CheckOnlyOneStateSelect_ForStateAdmin(AcceptanceTester $I)
    {
        $I->seeElement(Page\MainMenu::selectMenuItemByName($this->state));
        $countStates = $I->getAmount($I, Page\MainMenu::$StateOption);
        $I->assertEquals('1', $countStates);
    }
    
    public function StateAccess2_3_AccessErrorOnStateCreatePage_ForStateAdmin(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\StateCreate::URL());
        $I->wait(1);
        $I->see($this->pageNotFoundText);
        $I->seeInTitle($this->titleNotFoundText);
        $I->seeElement(Page\MainMenu::$MenuItem);
        $I->dontSeeElement(Page\StateCreate::$NameField);
    }
    
    public function StateAccess2_4_AccessErrorOnStateListPage_ForStateAdmin(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\StateList::URL());
        $I->wait(1);
        $I->see($this->pageNotFoundText);
        $I->seeInTitle($this->titleNotFoundText);
        $I->seeElement(Page\MainMenu::$MenuItem);
        $I->dontSeeElement(Page\StateList::$StateRow);
    }
    
    public function StateAccess2_5_AccessErrorOnCurrentStateUpdatePage_ForStateAdmin(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\StateUpdate::URL($this->idState1));
        $I->wait(1);
        $I->see($this->pageNotFoundText);
        $I->seeInTitle($this->titleNotFoundText);
        $I->seeElement(Page\MainMenu::$MenuItem);
        $I->dontSeeElement(Page\StateUpdate::$NameField);
    }
    
    public function StateAccess2_6_AccessErrorOnAnotherStateUpdatePage_ForStateAdmin(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\StateUpdate::URL($this->idState2));
        $I->wait(1);
        $I->see($this->pageNotFoundText);
        $I->seeInTitle($this->titleNotFoundText);
        $I->seeElement(Page\MainMenu::$MenuItem);
        $I->dontSeeElement(Page\StateUpdate::$NameField);
    }
    
    //--------------------------------Coordinator-------------------------------
    //--------------------------------------------------------------------------
    
    public function Help3_LogoutAndLoginAsCoordinator(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->LoginAsUser($this->emailCoordinator, $this->password, $I, $type = 'coordinator');
    }
    
    public function StateAccess3_1_CheckStatesMenuItemAbsent_ForCoordinator(AcceptanceTester $I)
    {
        $I->dontSeeElement(Page\MainMenu::selectMenuItemByName("States"));
        $I->dontSeeElement(Page\MainMenu::selectMenuItemByName($this->state));
    }
    
    public function StateAccess3_2_CheckProgramMenuItemAbsent_ForCoordinator(AcceptanceTester $I)
    {
        $I->dontSeeElement(Page\MainMenu::selectMenuItemByName($this->program1));
    }
    
    public function StateAccess3_3_AccessErrorOnStateCreatePage_ForCoordinator(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\StateCreate::URL());
        $I->wait(1);
        $I->see($this->pageNotFoundText);
        $I->seeInTitle($this->titleNotFoundText);
        $I->seeElement(Page\MainMenu::$MenuItem);
        $I->dontSeeElement(Page\StateCreate::$NameField);
    }
    
    public function StateAccess3_4_AccessErrorOnStateListPage_ForCoordinator(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\StateList::URL());
        $I->wait(1);
        $I->see($this->pageNotFoundText);
        $I->seeInTitle($this->titleNotFoundText);
        $I->seeElement(Page\MainMenu::$MenuItem);
        $I->dontSeeElement(Page\StateList::$StateRow);
    }
    
    public function StateAccess3_5_AccessErrorOnCurrentStateUpdatePage_ForCoordinator(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\StateUpdate::URL($this->idState1));
        $I->wait(1);
        $I->see($this->pageNotFoundText);
        $I->seeInTitle($this->titleNotFoundText);
        $I->seeElement(Page\MainMenu::$MenuItem);
        $I->dontSeeElement(Page\StateUpdate::$NameField);
    }
    
    public function StateAccess3_6_AccessErrorOnAnotherStateUpdatePage_ForCoordinator(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\StateUpdate::URL($this->idState2));
        $I->wait(1);
        $I->see($this->pageNotFoundText);
        $I->seeInTitle($this->titleNotFoundText);
        $I->seeElement(Page\MainMenu::$MenuItem);
        $I->dontSeeElement(Page\StateUpdate::$NameField);
    }
    
    //---------------------------------Inspector--------------------------------
    //--------------------------------------------------------------------------
    
    public function Help4_LogoutAndLoginAsInspector(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->LoginAsUser($this->emailInspector, $this->password, $I, $type = 'inspector');
    }
    
    public function StateAccess4_1_CheckStatesMenuItemAbsent_ForInspector(AcceptanceTester $I)
    {
        $I->dontSeeElement(Page\MainMenu::selectMenuItemByName("States"));
        $I->dontSeeElement(Page\MainMenu::selectMenuItemByName($this->state));
    }
    
    public function StateAccess4_2_AccessErrorOnStateCreatePage_ForInspector(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\StateCreate::URL());
        $I->wait(1);
        $I->see($this->pageNotFoundText);
        $I->seeInTitle($this->titleNotFoundText);
        $I->dontSeeElement(Page\StateCreate::$NameField);
    }
    
    public function StateAccess4_3_AccessErrorOnStateListPage_ForInspector(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\StateList::URL());
        $I->wait(1);
        $I->see($this->pageNotFoundText);
        $I->seeInTitle($this->titleNotFoundText);
        $I->dontSeeElement(Page\StateList::$StateRow);
    }
    
    public function StateAccess4_4_AccessErrorOnCurrentStateUpdatePage_ForInspector(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\StateUpdate::URL($this->idState1));
        $I->wait(1);
        $I->see($this->pageNotFoundText);
        $I->seeInTitle($this->titleNotFoundText);
        $I->dontSeeElement(Page\StateUpdate::$NameField);
    }
    
    public function StateAccess4_5_AccessErrorOnAnotherStateUpdatePage_ForInspector(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\StateUpdate::URL($this->idState2));
        $I->wait(1);
        $I->see($this->pageNotFoundText);
        $I->seeInTitle($this->titleNotFoundText);
        $I->dontSeeElement(Page\StateUpdate::$NameField);
    }
    
    //---------------------------------Auditor----------------------------------
    //--------------------------------------------------------------------------
    
    public function Help5_LogoutAndLoginAsAuditor(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->LoginAsUser($this->emailAuditor, $this->password, $I, $type = 'auditor');
    }
    
    public function StateAccess5_1_CheckStatesMenuItemAbsent_ForAuditor(AcceptanceTester $I)
    {
        $I->dontSeeElement(Page\MainMenu::selectMenuItemByName("States"));
        $I->dontSeeElement(Page\MainMenu::selectMenuItemByName($this->state));
    }
    
    public function StateAccess5_2_AccessErrorOnStateCreatePage_ForAuditor(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\StateCreate::URL());
        $I->wait(1);
        $I->see($this->pageNotFoundText);
        $I->seeInTitle($this->titleNotFoundText);
        $I->dontSeeElement(Page\StateCreate::$NameField);
    }
    
    public function StateAccess5_3_AccessErrorOnStateListPage_ForAuditor(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\StateList::URL());
        $I->wait(1);
        $I->see($this->pageNotFoundText);
        $I->seeInTitle($this->titleNotFoundText);
        $I->dontSeeElement(Page\StateList::$StateRow);
    }
    
    public function StateAccess5_4_AccessErrorOnCurrentStateUpdatePage_ForAuditor(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\StateUpdate::URL($this->idState1));
        $I->wait(1);
        $I->see($this->pageNotFoundText);
        $I->seeInTitle($this->titleNotFoundText);
        $I->dontSeeElement(Page\StateUpdate::$NameField);
    }
    
    public function StateAccess5_5_AccessErrorOnAnotherStateUpdatePage_ForAuditor(AcceptanceTester $I)
    {
        $I->amOnPage(\Page\StateUpdate::URL($this->idState2));
        $I->wait(1);
        $I->see($this->pageNotFoundText);
        $I->seeInTitle($this->titleNotFoundText);
        $I->dontSeeElement(Page\StateUpdate::$NameField);
    }
}
