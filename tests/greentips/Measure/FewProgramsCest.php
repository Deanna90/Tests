<?php


class FewProgramsCest
{
    public $state, $city1, $zip1, $city2, $zip2, $city3, $zip3;
    public $audSubgroup1_Energy;
    public $measure1Desc, $idMeasure;
    public $measuresDesc_SuccessCreated = [];
    public $program1, $program2, $program3;
    public $gt_program1_2, $gt_program3;
    public $statuses = ['core'];
    public $business2, $business3;


    
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
    }
    
    public function FewProg2_5_CreateMeasure1forEnergy(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure1Desc = $I->GenerateNameOf("Description");
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
        $this->idMeasure = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $I->seeElement(Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
        $I->see(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));
    }
    
    public function Help2_5_1_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city1 = $I->GenerateNameOf("CityMGT1");
        $state   = $this->state;
        $zips    = $this->zip1 = $I->GenerateZipCode();
        $program = $this->program1 = $I->GenerateNameOf("ProgMGT1");
        
        $I->CreateCity($city, $state, $zips);
        $Y->CreateProgram($program, $state, $city);
    }
    
    public function Help2_5_2_CreateCity2_And_Program2(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city2 = $I->GenerateNameOf("CityMGT2");
        $state   = $this->state;
        $zips    = $this->zip2 = $I->GenerateZipCode();
        $program = $this->program2 = $I->GenerateNameOf("ProgMGT2");
        
        $I->CreateCity($city, $state, $zips);
        $Y->CreateProgram($program, $state, $city);
    }
    
    public function Help2_5_3_CreateCity3_And_Program3(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city3 = $I->GenerateNameOf("CityMGT3");
        $state   = $this->state;
        $zips    = $this->zip3 = $I->GenerateZipCode();
        $program = $this->program3 = $I->GenerateNameOf("ProgMGT3");
        
        $I->CreateCity($city, $state, $zips);
        $Y->CreateProgram($program, $state, $city);
    }
    
    public function FewProg2_5_4_CheckAbsentCreateGreenTipButtonInGreenTipsListBeforeAnyCreatingTipsNotSelectedMeasure(\Step\Acceptance\GreenTipForMeasure $I) {
        $I->amOnPage(Page\MeasureGreenTipList::URL());
        $I->wait(2);
        $I->dontSeeElement(\Page\MeasureGreenTipList::$CreateGreenTipButton);
    }
    
    public function FewProg2_5_5_CheckPresentCreateGreenTipButtonInGreenTipsListBeforeAnyCreatingTipsWithSelectedMeasure(\Step\Acceptance\GreenTipForMeasure $I) {
        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure));
        $I->wait(2);
        $I->seeElement(\Page\MeasureGreenTipList::$CreateGreenTipButton);
    }
    
    public function FewProg2_5_6_CheckAllProgramsPresentInProgramSelectOnGreentipCreatePage(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measure1Desc;
        
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->click(Page\MeasureList::CreateTipButtonLine_ByDescValue($descMeasure));
        $I->wait(1);
        $I->click(\Page\MeasureGreenTipCreate::$ProgramSelect);
        $I->wait(1);
        $I->seeElement(\Page\MeasureGreenTipCreate::selectProgramOptionByName($this->program1));
        $I->seeElement(\Page\MeasureGreenTipCreate::selectProgramOptionByName($this->program2));
        $I->seeElement(\Page\MeasureGreenTipCreate::selectProgramOptionByName($this->program3));
        if($I->getAmount($I, \Page\MeasureGreenTipCreate::$ProgramOption) != 3){
            $I->fail("In Program Select more than created programs for this state");
        }
    }
    
    public function FewProg2_5_7_Measure_CheckCreateGreenTipWithCreatedProgram1_And_Program2(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measure1Desc;
        $descGT      = $this->gt_program1_2 = $I->GenerateNameOf("GT_pr1pr2");
        $programArr  = [$this->program1, $this->program2];
        $program  = "$this->program1, $this->program2";
        
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->click(Page\MeasureList::CreateTipButtonLine_ByDescValue($descMeasure));
        $I->CreateMeasureGreenTip($descGT, $programArr);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->seeElement(Page\MeasureList::ViewTipButtonLine_ByDescValue($descMeasure));
        $I->see(Page\MeasureList::ViewTipButtonName, Page\MeasureList::ViewTipButtonLine_ByDescValue($descMeasure));
        $I->click(Page\MeasureList::ViewTipButtonLine_ByDescValue($descMeasure));
        $I->wait(2);
        $I->see($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
        $I->see($program, \Page\MeasureGreenTipList::ProgramsLine_ByMeasureDescValue($descMeasure));
    }
    
    public function FewProg2_5_7_1_CheckProgram1_2_OptionAbsentInProgramSelectOnGreentipCreatePage(\Step\Acceptance\GreenTipForMeasure $I) {
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure));
        $I->wait(1);
        $I->click(\Page\MeasureGreenTipCreate::$ProgramSelect);
        $I->wait(1);
        $I->dontSeeElement(\Page\MeasureGreenTipCreate::selectProgramOptionByName($this->program1));
        $I->dontSeeElement(\Page\MeasureGreenTipCreate::selectProgramOptionByName($this->program2));
    }
    
    public function FewProg2_5_8_Measure_CheckCreateGreenTipWithCreatedProgram3(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measure1Desc;
        $descGT      = $this->gt_program3 = $I->GenerateNameOf("GT_pr3");
        $programArr  = [$this->program3];
        $program     = $this->program3;
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure));
        $I->wait(1);
        $I->CreateMeasureGreenTip($descGT, $programArr);
        $I->amOnPage(Page\MeasureGreenTipList::URL());
        $I->wait(2);
        $I->see($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
        $I->see($this->gt_program1_2, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
        $I->see($program, \Page\MeasureGreenTipList::ProgramsLine_ByMeasureDescValue($descMeasure));
    }
    
    //--------------------------Create Checklists-------------------------------
    
    public function Help2_5_9_CreateChecklistForTier3_Program1(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = 'Office / Retail';
        $tier               = '3';
        $descs              = $this->measuresDesc_SuccessCreated;
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statuses);
        $I->reloadPage();
        $I->PublishChecklistStatus();
    }
    
    public function FewProg2_5_9_1_CheckGreenTipForMeasure_OnChecklistPreview_Program1(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
        $grTip    = $this->gt_program1_2;
        
        $I->wait(1);
        $I->click(Page\ChecklistManage::$ManageMeasuresTab);
        $I->wait(1);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_EnergyGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        }
        $I->wait(2);
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(1);
        $I->seeElement(\Page\ChecklistPreview::MeasureGreenTip_ByDesc($measDesc, $grTip));
    }
    
    public function Help2_5_10_CreateChecklistForTier3_Program2(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program2;
        $programDestination = $this->program2;
        $sectorDestination  = 'Office / Retail';
        $tier               = '3';
        $descs              = $this->measuresDesc_SuccessCreated;
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statuses);
        $I->reloadPage();
        $I->PublishChecklistStatus();
    }
    
    public function FewProg2_5_10_1_CheckGreenTipForMeasure_OnChecklistPreview_Program2(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
        $grTip    = $this->gt_program1_2;
        
        $I->wait(1);
        $I->click(Page\ChecklistManage::$ManageMeasuresTab);
        $I->wait(1);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_EnergyGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        }
        $I->wait(2);
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(1);
        $I->seeElement(\Page\ChecklistPreview::MeasureGreenTip_ByDesc($measDesc, $grTip));
    }
    
    public function Help2_5_11_CreateChecklistForTier3_Program3(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program3;
        $programDestination = $this->program3;
        $sectorDestination  = 'Office / Retail';
        $tier               = '3';
        $descs              = $this->measuresDesc_SuccessCreated;
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statuses);
        $I->reloadPage();
        $I->PublishChecklistStatus();
    }
    
    public function FewProg2_5_11_1_CheckGreenTipForMeasure_OnChecklistPreview_Program3(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
        $grTip    = $this->gt_program3;
        
        $I->wait(1);
        $I->click(Page\ChecklistManage::$ManageMeasuresTab);
        $I->wait(1);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_EnergyGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        }
        $I->wait(2);
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(1);
        $I->seeElement(\Page\ChecklistPreview::MeasureGreenTip_ByDesc($measDesc, $grTip));
    }
    
    public function Help2_5_12_LogOut(AcceptanceTester $I) {
        $I->Logout($I);
    }
    
    public function Help2_5_13_BusinessRegisterForProgram2(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business2 = $I->GenerateNameOf("busnam");;
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");;
        $zip              = $this->zip2;
        $city             = $this->city2;
        $website          = 'ffgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(8);
    }
    
    public function FewProg2_5_13_1_CheckGreenTipForMeasure_BusinessChecklist_Program2(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
        $grTip    = $this->gt_program1_2;
        
        $I->wait(1);
        $I->amOnPage(\Page\RegistrationStarted::$URL_Started);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(2);
        $I->seeElement(\Page\RegistrationStarted::MeasureGreenTip_ByDesc($measDesc, $grTip));
    }
    
    public function Help2_5_14_LogOutFromBusiness2(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->wait(1);
    }
    
    public function Help2_5_15_BusinessRegisterForProgram3(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business3 = $I->GenerateNameOf("busnam");;
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");;
        $zip              = $this->zip3;
        $city             = $this->city3;
        $website          = 'ffgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(8);
    }
    
    public function FewProg2_5_15_1_CheckGreenTipForMeasure_BusinessChecklist_Program3(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
        $grTip    = $this->gt_program3;
        
        $I->wait(1);
        $I->amOnPage(\Page\RegistrationStarted::$URL_Started);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(2);
        $I->seeElement(\Page\RegistrationStarted::MeasureGreenTip_ByDesc($measDesc, $grTip));
    }
    
    
    public function Help2_5_16_LogOutFromBusiness_And_LoginAsNationalAdmin(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsAdmin($I);
    }
         
    public function FewProg2_5_16_1_CheckGreenTipForMeasure_OnBusinessView_Program2(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
        $grTip    = $this->gt_program1_2;
        
        $I->wait(1);
        $I->SelectDefaultState($I, $this->state);
        $I->wait(1);
        $I->amOnPage(Page\Dashboard::URL());
        $I->wait(2);
        $I->click(Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->wait(2);
        if($I->getAmount($I, \Page\BusinessChecklistView::$LeftMenu_EnergyGroupButton.'.active') == 0) {
            $I->click(\Page\BusinessChecklistView::$LeftMenu_EnergyGroupButton);
        }
        $I->wait(2);
        $I->click(\Page\BusinessChecklistView::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(2);
        $I->seeElement(\Page\BusinessChecklistView::MeasureGreenTip_ByDesc($measDesc, $grTip));
    }
    
    public function FewProg2_5_16_2_CheckGreenTipForMeasure_OnBusinessView_Program3(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
        $grTip    = $this->gt_program3;
        
        $I->wait(1);
        $I->SelectDefaultState($I, $this->state);
        $I->wait(1);
        $I->amOnPage(Page\Dashboard::URL());
        $I->wait(2);
        $I->click(Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->wait(2);
        if($I->getAmount($I, \Page\BusinessChecklistView::$LeftMenu_EnergyGroupButton.'.active') == 0) {
            $I->click(\Page\BusinessChecklistView::$LeftMenu_EnergyGroupButton);
        }
        $I->wait(2);
        $I->click(\Page\BusinessChecklistView::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(2);
        $I->seeElement(\Page\BusinessChecklistView::MeasureGreenTip_ByDesc($measDesc, $grTip));
    }
}
