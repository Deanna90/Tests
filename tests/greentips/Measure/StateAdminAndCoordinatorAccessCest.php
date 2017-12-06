<?php


class StateAdminAndCoordinatorAccessCest
{
    public $state, $city1, $zip1, $city2, $zip2;
    public $audSubgroup1_Energy;
    public $measure1Desc, $idMeasure1, $measure2Desc, $idMeasure2, $measure3Desc, $idMeasure3, $measure4Desc, $idMeasure4;
    public $measuresDesc_SuccessCreated = [];
    public $program1, $program2;
    public $gt1_program1_2, $gt2_program1, $gt2_program2, $gt3_program2, $gt4_program2, $GT3Update_prog1, $GT3Create_prog1, $GT4Update_prog1;
    public $statuses = ['core', 'core', 'elective', 'elective'];
    public $emailStateAdmin, $emailCoordinator1, $emailCoordinator2, $password;


    public function Help2_1_LoginAsNationalAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    public function Help2_2_CreateState(Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StateMGT");
        $shortName = 'MGT';
        
        $I->CreateState($name, $shortName);
    }
    
    public function Help2_3_SelectDefaultState(AcceptanceTester $I)
    {
        $I->wait(2);
        $I->SelectDefaultState($I, $this->state);
    }
    
    public function Help2_4_CreateAuditSubGroupForEnergyGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $I->wantTo("Create audit subgroups for Energy audit group");
        $name      = $this->audSubgroup1_Energy = $I->GenerateNameOf("EnAudSub1");
        $auditGroup = Page\AuditGroupList::Energy_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->wait(3);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $I->wait(2);
        $this->id_audSubgroup1_Energy = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    public function FewProg2_5_CreateMeasure1forEnergy(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure1Desc = $I->GenerateNameOf("Description1");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::MultipleQuestionAndNumber_QuantitativeSubmeasure;
        $questions      = ['ques1'];
        $answers        = ['a1', 'a2'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $I->canSeeElement(Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function FewProg2_5_CreateMeasure2forEnergy(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure2Desc = $I->GenerateNameOf("Description2");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['que'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure2 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $I->canSeeElement(Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function FewProg2_5_CreateMeasure3forEnergy(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure3Desc = $I->GenerateNameOf("Description3");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['q1'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure3 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $I->canSeeElement(Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function FewProg2_5_CreateMeasure4forEnergy(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure4Desc = $I->GenerateNameOf("Description4");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['111'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure4 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $I->canSeeElement(Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help2_5_1_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city1 = $I->GenerateNameOf("CityMGT1");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip1 = $I->GenerateZipCode();
        $program = $this->program1 = $I->GenerateNameOf("ProgMGT1");
        
        $I->CreateCity($city, $state, $zips);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    public function Help2_5_2_CreateCity2_And_Program2(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city2 = $I->GenerateNameOf("CityMGT2");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip2 = $I->GenerateZipCode();
        $program = $this->program2 = $I->GenerateNameOf("ProgMGT2");
        
        $I->CreateCity($city, $state, $zips);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    //--------------------------Create Checklists-------------------------------
    
    public function Help2_5_9_CreateChecklistForTier2_Program1(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = 'Office / Retail';
        $tier               = '2';
        $descs              = $this->measuresDesc_SuccessCreated;
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statuses);
        $I->reloadPage();
        $I->PublishChecklistStatus();
    }
    
    public function Help2_5_9_CreateChecklistForTier2_Program2(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program2;
        $programDestination = $this->program2;
        $sectorDestination  = 'Office / Retail';
        $tier               = '2';
        $descs              = $this->measuresDesc_SuccessCreated;
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statuses);
        $I->reloadPage();
        $I->PublishChecklistStatus();
    }
    
    //--------------------------Create State Admin------------------------------
    
    public function CreateStateAdminUser(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::stateAdminType;
        $email     = $this->emailStateAdmin = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnam');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password = 'Qq!1111111';
        $phone     = '(675) 455-4333';
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->reloadPage();
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(1);
    }
    
    //--------------------------Create Coordinator------------------------------
    public function CreateCoordinatorUser(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::coordinatorType;
        $email     = $this->emailCoordinator1 = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnam');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = '(675) 455-4333';
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->reloadPage();
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(4);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
    }
    
    public function Help2_1_LogoutAndLoginAsStateAdmin(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->LoginAsUser($this->emailStateAdmin, $this->password, $I, $type = 'state admin');
    }
    
    public function FewProg2_5_6_CheckAllProgramsPresentInProgramSelectOnGreentipCreatePage(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measure1Desc;
        
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(4);
        $I->click(Page\MeasureList::CreateTipButtonLine_ByDescValue($descMeasure));
        $I->wait(3);
        $I->click(\Page\MeasureGreenTipCreate::$ProgramSelect);
        $I->wait(2);
        $I->canSeeElement(\Page\MeasureGreenTipCreate::selectProgramOptionByName($this->program1));
        $I->canSeeElement(\Page\MeasureGreenTipCreate::selectProgramOptionByName($this->program2));
        if($I->getAmount($I, \Page\MeasureGreenTipCreate::$ProgramOption) != 2){
            $I->fail("In Program Select more than created programs for this state");
        }
    }
    
    public function FewProg2_5_7_Measure1_CreateGreenTipWithCreatedProgram1_And_Program2(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measure1Desc;
        $descGT      = $this->gt1_program1_2 = $I->GenerateNameOf("GT1_pr1pr2");
        $programArr  = [$this->program1, $this->program2];
        $program     = "$this->program1, $this->program2";
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure1));
        $I->wait(2);
        $I->CreateMeasureGreenTip($descGT, $programArr);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->amOnPage(\Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure1));
        $I->wait(1);
        $I->canSee($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
        $I->canSee($program, \Page\MeasureGreenTipList::ProgramsLine_ByMeasureDescValue($descMeasure));
    }
    
    public function FewProg2_5_8_Measure2_CreateGreenTipWithCreatedProgram1(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measure2Desc;
        $descGT      = $this->gt2_program1 = $I->GenerateNameOf("GT2_pr1");
        $programArr  = [$this->program1];
        $program     = $this->program1;
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure2));
        $I->wait(1);
        $I->CreateMeasureGreenTip($descGT, $programArr);
        $I->wait(2);
        $I->amOnPage(\Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure2));
        $I->wait(1);
        $I->canSee($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
        $I->canSee($program, \Page\MeasureGreenTipList::ProgramsLine_ByMeasureDescValue($descMeasure));
    }
    
    public function FewProg2_5_8_Measure2_CheckCreateGreenTipWithCreatedProgram2(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measure2Desc;
        $descGT      = $this->gt2_program2 = $I->GenerateNameOf("GT2_pr2");
        $programArr  = [$this->program2];
        $program     = $this->program2;
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure2));
        $I->wait(1);
        $I->CreateMeasureGreenTip($descGT, $programArr);
        $I->wait(2);
        $I->amOnPage(\Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure2));
        $I->wait(1);
        $I->canSee($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
        $I->canSee($program, \Page\MeasureGreenTipList::ProgramsLine_ByMeasureDescValue($descMeasure));
    }
    
    public function FewProg2_5_8_Measure3_CheckCreateGreenTipWithCreatedProgram2(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measure3Desc;
        $descGT      = $this->gt3_program2 = $I->GenerateNameOf("GT3_pr2");
        $programArr  = [$this->program2];
        $program     = $this->program2;
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure3));
        $I->CreateMeasureGreenTip($descGT, $programArr);
        $I->wait(2);
        $I->amOnPage(\Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure3));
        $I->wait(1);
        $I->canSee($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
        $I->canSee($program, \Page\MeasureGreenTipList::ProgramsLine_ByMeasureDescValue($descMeasure));
    }
    
    public function FewProg2_5_8_Measure4_CheckCreateGreenTipWithCreatedProgram2(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measure4Desc;
        $descGT      = $this->gt4_program2 = $I->GenerateNameOf("GT4_pr2");
        $programArr  = [$this->program2];
        $program     = $this->program2;
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure4));
        $I->CreateMeasureGreenTip($descGT, $programArr);
        $I->wait(2);
        $I->amOnPage(\Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure4));
        $I->wait(1);
        $I->canSee($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
        $I->canSee($program, \Page\MeasureGreenTipList::ProgramsLine_ByMeasureDescValue($descMeasure));
    }
    
    public function FewProg2_5_8_Measure4_CheckdUpdateGreenTipForMeasure4(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measure4Desc;
        $descGT      = $this->GT4Update_prog1 = $I->GenerateNameOf("GT4_pr1_adminUpdate");
        $programArr  = [$this->program1];
        $program     = $this->program1;
        
        $I->amOnPage(\Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure4));
        $I->wait(1);
        $I->click(\Page\MeasureGreenTipList::UpdateButtonLine_ByMeasureDescValue($descMeasure));
        $I->wait(1);
        $I->UpdateMeasureGreenTip($descGT, $programArr);
        $I->wait(2);
        $I->amOnPage(\Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure4));
        $I->wait(1);
        $I->canSee($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
        $I->canSee($program, \Page\MeasureGreenTipList::ProgramsLine_ByMeasureDescValue($descMeasure));
        $I->dontSee($this->gt4_program2, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
    }
    
    public function FewProg2_5_8_CheckAllCreatedGreenTipsHaveDeleteButtonsInList(\Step\Acceptance\GreenTipForMeasure $I) {
        $I->amOnPage(\Page\MeasureGreenTipList::URL());
        $I->wait(1);
        $count = $I->getAmount($I, Page\MeasureGreenTipList::$MeasureRow);
        $I->comment("Rows count: $count");
        for($i=1; $i<=$count; $i++){
            $I->canSeeElement(Page\MeasureGreenTipList::DeleteButtonLine($i));
        }
    }
    
    public function FewProg2_5_8_CheckSuccessfulGreenTipDeleting(\Step\Acceptance\GreenTipForMeasure $I) {
        $I->amOnPage(\Page\MeasureGreenTipList::URL());
        $I->wait(2);
        $I->click(Page\MeasureGreenTipList::DeleteButtonLine_ByMeasureDescValue($this->measure4Desc));
        $I->wait(2);
        $I->acceptPopup();
        $I->wait(3);
        $I->amOnPage(\Page\MeasureGreenTipList::URL());
        $I->dontSeeElement(Page\MeasureGreenTipList::MeasureLine_ByMeasureDescValue($this->measure4Desc));
    }
    
    public function FewProg2_5_8_CheckAllCreatedGreenTipsInList(\Step\Acceptance\GreenTipForMeasure $I) {
        $I->amOnPage(\Page\MeasureGreenTipList::URL());
        $I->wait(1);
        $I->canSee($this->gt1_program1_2, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($this->measure1Desc));
        $I->canSee($this->gt2_program1, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($this->measure2Desc));
        $I->canSee($this->gt2_program2, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($this->measure2Desc));
        $I->canSee($this->gt3_program2, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($this->measure3Desc));
        $I->canSee($this->program1.', '.$this->program2, \Page\MeasureGreenTipList::ProgramsLine_ByMeasureDescValue($this->measure1Desc));
        $I->canSee($this->program1, \Page\MeasureGreenTipList::ProgramsLine_ByMeasureDescValue($this->measure2Desc));
        $I->canSee($this->program2, \Page\MeasureGreenTipList::ProgramsLine_ByMeasureDescValue($this->measure2Desc));
        $I->canSee($this->program2, \Page\MeasureGreenTipList::ProgramsLine_ByMeasureDescValue($this->measure3Desc));
    }
    
    public function Help2_1_LogoutAndLoginAsCoordinator(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->LoginAsUser($this->emailCoordinator1, $this->password, $I, $type = 'coordinator');
    }
    
    public function FewProg2_5_8_Measure3_CheckAllCreatedGreenTipsInList_OnlyForProgram1(\Step\Acceptance\GreenTipForMeasure $I) {
        $I->amOnPage(\Page\MeasureGreenTipList::URL());
        $I->wait(1);
        $I->canSee($this->gt1_program1_2, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($this->measure1Desc));
        $I->canSee($this->gt2_program1, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($this->measure2Desc));
        $I->canSee($this->program1.', '.$this->program2, \Page\MeasureGreenTipList::ProgramsLine_ByMeasureDescValue($this->measure1Desc));
        $I->canSee($this->program1, \Page\MeasureGreenTipList::ProgramsLine_ByMeasureDescValue($this->measure2Desc));
        $I->cantSeeElement(Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($this->measure3Desc));
    }
    
    public function FewProg2_5_8_Measure3_CheckAllCreatedGreenTipsInList_OnlyForProgram1e(\Step\Acceptance\GreenTipForMeasure $I) {
        $I->amOnPage(\Page\MeasureGreenTipList::URL());
        $I->wait(1);
        $I->dontSeeElement(\Page\MeasureGreenTipList::UpdateButtonLine_ByMeasureDescValue($this->measure1Desc));
        $I->dontSeeElement(\Page\MeasureGreenTipList::DeleteButtonLine_ByMeasureDescValue($this->measure1Desc));
        $I->canSeeElement(\Page\MeasureGreenTipList::UpdateButtonLine_ByMeasureDescValue($this->measure2Desc));
        $I->canSeeElement(\Page\MeasureGreenTipList::DeleteButtonLine_ByMeasureDescValue($this->measure2Desc));
    }
    
    public function FewProg2_5_8_Measure3_CheckUpdateGreenTipMeasugred(\Step\Acceptance\GreenTipForMeasure $I) {
        $I->amOnPage(\Page\MeasureGreenTipList::URL());
        $I->wait(1);
        $id = $I->grabTextFrom(\Page\MeasureGreenTipList::IdLine_ByMeasureDescValue($this->measure1Desc));
        $I->amOnPage(\Page\MeasureGreenTipUpdate::URL($id));
        $I->wait(1);
        $I->canSeeElement(\Page\MeasureGreenTipUpdate::$ProgramSelect.'[class*=disabled]');
        $I->canSeeElement(\Page\MeasureGreenTipUpdate::$UpdateButton.'[disabled]');
        $I->cantSeeElement(\Page\MeasureGreenTipUpdate::$DescriptionField);
    }
    
    public function FewProg2_5_6_CheckOnlyProgram1OptionPresentInProgramSelectOnGreentipCreatePage(\Step\Acceptance\GreenTipForMeasure $I) {
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure3));
        $I->wait(3);
        $I->click(\Page\MeasureGreenTipCreate::$ProgramSelect);
        $I->wait(3);
        $I->canSeeElement(\Page\MeasureGreenTipCreate::selectProgramOptionByName($this->program1));
        $I->cantSeeElement(\Page\MeasureGreenTipCreate::selectProgramOptionByName($this->program2));
        if($I->getAmount($I, \Page\MeasureGreenTipCreate::$ProgramOption) != 1){
            $I->fail("In Program Select more than created programs for this state");
        }
    }
    
    public function FewProg2_5_8_Measure3_CheckCreateGreenTipWithCreatedProgram1(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measure3Desc;
        $descGT      = $this->GT3Create_prog1 = $I->GenerateNameOf("GT3_Create_Prog1_");
        $programArr  = [$this->program1];
        $program     = $this->program1;
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure3));
        $I->CreateMeasureGreenTip($descGT, $programArr);
        $I->wait(2);
        $I->amOnPage(\Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure3));
        $I->wait(1);
        $I->canSee($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
        $I->canSee($program, \Page\MeasureGreenTipList::ProgramsLine_ByMeasureDescValue($descMeasure));
    }
    
    public function FewProg2_5_8_Measure3_CheckUpdateGreenTipMeasure(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measure3Desc;
        
        $I->amOnPage(\Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure3));
        $I->wait(1);
        $I->click(\Page\MeasureGreenTipList::UpdateButtonLine_ByMeasureDescValue($descMeasure));
        $I->wait(1);
        $I->click(\Page\MeasureGreenTipUpdate::$ProgramSelect);
        $I->cantSeeElement(\Page\MeasureGreenTipUpdate::SelectedProgramOptionByName($this->program2));
    }
    
    public function FewProg2_5_8_Measure3_CheckUpdateGreenTipForMeasure3(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measure3Desc;
        $descGT      = $this->GT3Update_prog1 = $I->GenerateNameOf("GT3_pr1_coordinCreate");
        $programArr  = [$this->program1];
        $program     = $this->program1;
        
        $I->amOnPage(\Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure3));
        $I->wait(1);
        $I->click(\Page\MeasureGreenTipList::UpdateButtonLine_ByMeasureDescValue($descMeasure));
        $I->wait(1);
        $I->UpdateMeasureGreenTip($descGT, $programArr);
        $I->wait(2);
        $I->amOnPage(\Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure3));
        $I->wait(1);
        $I->canSee($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
        $I->canSee($program, \Page\MeasureGreenTipList::ProgramsLine_ByMeasureDescValue($descMeasure));
        $I->cantSee($this->GT3Create_prog1, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
    }
}
