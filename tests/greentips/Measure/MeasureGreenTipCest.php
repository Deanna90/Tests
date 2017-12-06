<?php


class MeasureGreenTipCest
{
    public $state, $city1, $zip1;
    public $audSubgroup1_Energy, $audSubgroup2_Energy, $audSubgroup1_General, $audSubgroup2_General;
    public $id_audSubgroup1_Energy, $id_audSubgroup2_Energy, $id_audSubgroup1_General, $id_audSubgroup2_General;
    public $measure1Desc, $measure2Desc, $measure3Desc, $measure4Desc, $measure5Desc, $measure6Desc, $measure7Desc, $measure8Desc, $measure9Desc;
    public $idMeasure1, $idMeasure2, $idMeasure3, $idMeasure4, $idMeasure5, $idMeasure6, $idMeasure7, $idMeasure8, $idMeasure9;
    public $measuresDesc_SuccessCreated = [];
    public $program1;
    public $gt1_program1, $gt2_program1, $gt3_program1, $gt4_program1, $gt5_program1, $gt6_program1, $gt7_program1, $gt8_program1, $gt9_program1;
    public $statuses1 = ['core', 'elective', 'core', 'elective', 'core', 'elective', 'core', 'elective', 'core'];
    public $business, $id_Business;
    public $checklistUrl;
    

    /**
     * @group quantitative
     * @group notquantitative
     */
    public function Help1_1_LoginAsNationalAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    /**
     * @group quantitative
     * @group notquantitative
     */
    public function Help1_2_CreateState(Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StateMGT");
        $shortName = 'MGT';
        
        $I->CreateState($name, $shortName);
    }
    
    /**
     * @group quantitative
     * @group notquantitative
     * @depends Help1_2_CreateState
     */
    public function Help1_3_SelectDefaultState(AcceptanceTester $I)
    {
        $I->wait(2);
        $I->SelectDefaultState($I, $this->state);
    }
    
    /**
     * @group quantitative
     * @group notquantitative
     */
    public function Help1_4_CreateAuditSubGroupForEnergyGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $I->wantTo("Create audit subgroups for Energy audit group");
        $name1      = $this->audSubgroup1_Energy = $I->GenerateNameOf("EnAudSub1");
        $name2      = $this->audSubgroup2_Energy = $I->GenerateNameOf("EnAudSub2");
        $auditGroup = Page\AuditGroupList::Energy_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name1, $auditGroup, $state);
        $I->wait(3);
        $I->CreateAuditSubgroup($name2, $auditGroup, $state);
        $I->wait(3);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $I->wait(2);
        $this->id_audSubgroup1_Energy = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name1));
        $this->id_audSubgroup2_Energy = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name2));
    }
    
    /**
     * @group quantitative
     * @group notquantitative
     */
    public function Help1_5_CreateAuditSubGroupForGeneralGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $I->wantTo("Create audit subgroups for General audit group");
        $name1      = $this->audSubgroup1_General = $I->GenerateNameOf("GenAudSub1");
        $name2      = $this->audSubgroup2_General = $I->GenerateNameOf("GenAudSub2");
        $auditGroup = Page\AuditGroupList::General_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name1, $auditGroup, $state);
        $I->wait(3);
        $I->CreateAuditSubgroup($name2, $auditGroup, $state);
        $I->wait(3);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $I->wait(2);
        $this->id_audSubgroup1_General = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name1));
        $this->id_audSubgroup2_General = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name2));
    }
    
    /**
     * @group quantitative
     */
    public function MeasTypes1_6_CreateMeasure1forEnergy(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure1Desc = $I->GenerateNameOf("Description");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::MultipleQuestionAndNumber_QuantitativeSubmeasure;
        $questions      = ['ques1', 'ques2'];
        $answers        = ['a1', 'a2', 'a3'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSeeElement(Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));
        $this->idMeasure1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_6_CreateMeasure1forEnergy
     */
    public function MeasTypes1_6_1_CheckCreateButtonAppearsWithCorrectHrefOnMeasureListPage(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure1Desc;
        
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));       
        $I->click(Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\MeasureGreenTipCreate::URL($this->idMeasure1));
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_6_CreateMeasure1forEnergy
     */
    public function MeasTypes1_6_2_Measure1_CheckOpenCreateGreenTipPage_And_CheckProgramsAbsentInSelect(\Step\Acceptance\Measure $I) {
        $desc            = $this->measure1Desc;
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure1));
        $I->wait(2);
        $I->canSeeElement(Page\MeasureGreenTipCreate::$ProgramSelect);
        $I->click(Page\MeasureGreenTipCreate::$ProgramSelect);
        $I->dontSeeElement(\Page\MeasureGreenTipCreate::$ProgramOption);
    }
    
    /**
     * @group quantitative
     * @group notquantitative
     */
    public function Help1_6_3_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city1 = $I->GenerateNameOf("CityMGT1");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip1 = $I->GenerateZipCode();
        $program = $this->program1 = $I->GenerateNameOf("ProgMGT1");
        
        $I->CreateCity($city, $state, $zips);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_6_CreateMeasure1forEnergy
     */
    public function MeasTypes1_6_4_Measure1_CheckCreateGreenTipWithCreatedProgram(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measure1Desc;
        $descGT      = $this->gt1_program1 = $I->GenerateNameOf("GT1_pr1");
        $program     = [$this->program1];
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure1));
        $I->wait(2);
        $I->CreateMeasureGreenTip($descGT, $program);
        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure1));
        $I->wait(2);
        $I->canSee($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_6_CreateMeasure1forEnergy
     */
    public function MeasTypes1_6_5_CheckViewButtonAppearsWithCorrectHrefOnMeasureListPage(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure1Desc;
        
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::ViewTipButtonName, Page\MeasureList::ViewTipButtonLine_ByDescValue($desc));       
        $I->click(Page\MeasureList::ViewTipButtonLine_ByDescValue($desc));
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure1));
    }
    
    /**
     * @group quantitative
     */
    public function MeasTypes1_7_CreateMeasure2forEnergy(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure2Desc = $I->GenerateNameOf("Description");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['question1', 'question2'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSeeElement(Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));
        $this->idMeasure2 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_7_CreateMeasure2forEnergy
     */
    public function MeasTypes1_7_1_CheckCreateButtonAppearsWithCorrectHrefOnMeasureListPage(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure2Desc;
        
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));       
        $I->click(Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\MeasureGreenTipCreate::URL($this->idMeasure2));
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_7_CreateMeasure2forEnergy
     */
    public function MeasTypes1_7_2_Measure2_CheckCreateGreenTipWithCreatedProgram(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measure2Desc;
        $descGT      = $this->gt2_program1 = $I->GenerateNameOf("GT2_pr1");
        $program     = [$this->program1];
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure2));
        $I->wait(2);
        $I->CreateMeasureGreenTip($descGT, $program);
        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure2));
        $I->wait(2);
        $I->see($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_7_CreateMeasure2forEnergy
     */
    public function MeasTypes1_7_3_CheckViewButtonAppearsWithCorrectHrefOnMeasureListPage(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure2Desc;
        
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::ViewTipButtonName, Page\MeasureList::ViewTipButtonLine_ByDescValue($desc));       
        $I->click(Page\MeasureList::ViewTipButtonLine_ByDescValue($desc));
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure2));
    }
    
    /**
     * @group quantitative
     */
    public function MeasTypes1_8_CreateMeasure3forEnergy(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure3Desc = $I->GenerateNameOf("Description");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::PopupTherms_QuantitativeSubmeasure;
        $popupDesc      = $I->GenerateNameOf('Popup therms description');
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, $popupDesc);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSeeElement(Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));
        $this->idMeasure3 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_8_CreateMeasure3forEnergy
     */
    public function MeasTypes1_8_1_CheckCreateButtonAppearsWithCorrectHrefOnMeasureListPage(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure3Desc;
        
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));       
        $I->click(Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\MeasureGreenTipCreate::URL($this->idMeasure3));
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_8_CreateMeasure3forEnergy
     */
    public function MeasTypes1_8_2_Measure3_CheckCreateGreenTipWithCreatedProgram(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measure3Desc;
        $descGT      = $this->gt3_program1 = $I->GenerateNameOf("GT3_pr1");
        $program     = [$this->program1];
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure3));
        $I->wait(2);
        $I->CreateMeasureGreenTip($descGT, $program);
        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure3));
        $I->wait(2);
        $I->see($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_8_CreateMeasure3forEnergy
     */
    public function MeasTypes1_8_3_CheckViewButtonAppearsWithCorrectHrefOnMeasureListPage(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure3Desc;
        
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::ViewTipButtonName, Page\MeasureList::ViewTipButtonLine_ByDescValue($desc));       
        $I->click(Page\MeasureList::ViewTipButtonLine_ByDescValue($desc));
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure3));
    }
    
    /**
     * @group quantitative
     */
    public function MeasTypes1_9_CreateMeasure4forEnergy(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure4Desc = $I->GenerateNameOf("Description");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup2_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::PopupLighting_QuantitativeSubmeasure;
        $popupDesc      = $I->GenerateNameOf('Lighting popup desc');
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, $popupDesc);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSeeElement(Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));
        $this->idMeasure4 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_9_CreateMeasure4forEnergy
     */
    public function MeasTypes1_9_1_CheckCreateButtonAppearsWithCorrectHrefOnMeasureListPage(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure4Desc;
        
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));       
        $I->click(Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\MeasureGreenTipCreate::URL($this->idMeasure4));
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_9_CreateMeasure4forEnergy
     */
    public function MeasTypes1_9_2_Measure4_CheckCreateGreenTipWithCreatedProgram(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measure4Desc;
        $descGT      = $this->gt4_program1 = $I->GenerateNameOf("GT4_pr1");
        $program     = [$this->program1];
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure4));
        $I->wait(2);
        $I->CreateMeasureGreenTip($descGT, $program);
        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure4));
        $I->wait(2);
        $I->see($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_9_CreateMeasure4forEnergy
     */
    public function MeasTypes1_9_3_CheckViewButtonAppearsWithCorrectHrefOnMeasureListPage(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure4Desc;
        
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::ViewTipButtonName, Page\MeasureList::ViewTipButtonLine_ByDescValue($desc));       
        $I->click(Page\MeasureList::ViewTipButtonLine_ByDescValue($desc));
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure4));
    }
    
    /**
     * @group quantitative
     */
    public function MeasTypes1_10_CreateMeasure5forEnergy(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure5Desc = $I->GenerateNameOf("Description");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup2_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::PopupWasteDivertion_QuantitativeSubmeasure;
        $popupDesc      = $I->GenerateNameOf('Popup Waste Div description');
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, $popupDesc);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSeeElement(Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));
        $this->idMeasure5 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_10_CreateMeasure5forEnergy
     */
    public function MeasTypes1_10_1_CheckCreateButtonAppearsWithCorrectHrefOnMeasureListPage(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure5Desc;
        
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));       
        $I->click(Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\MeasureGreenTipCreate::URL($this->idMeasure5));
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_10_CreateMeasure5forEnergy
     */
    public function MeasTypes1_10_2_Measure5_CheckCreateGreenTipWithCreatedProgram(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measure5Desc;
        $descGT      = $this->gt5_program1 = $I->GenerateNameOf("GT5_pr1");
        $program     = [$this->program1];
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure5));
        $I->wait(2);
        $I->CreateMeasureGreenTip($descGT, $program);
        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure5));
        $I->wait(2);
        $I->see($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_10_CreateMeasure5forEnergy
     */
    public function MeasTypes1_10_3_CheckViewButtonAppearsWithCorrectHrefOnMeasureListPage(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure5Desc;
        
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::ViewTipButtonName, Page\MeasureList::ViewTipButtonLine_ByDescValue($desc));       
        $I->click(Page\MeasureList::ViewTipButtonLine_ByDescValue($desc));
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure5));
    }
    
    /**
     * @group notquantitative
     */
    public function MeasTypes1_11_CreateMeasure6ForGeneral(\Step\Acceptance\Measure $I) {
        $desc            = $this->measure6Desc = $I->GenerateNameOf("Description");
        $auditGroup      = \Page\AuditGroupList::General_AuditGroup;
        $auditSubgroup   = $this->audSubgroup2_General;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::MultipleQuestion_MultipleAnswersSubmeasure;
        $questions       = ['ques1?', 'ques2?', 'ques3?'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSeeElement(Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));
        $this->idMeasure6 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group notquantitative
     * @depends MeasTypes1_11_CreateMeasure6ForGeneral
     */
    public function MeasTypes1_11_1_CheckCreateButtonAppearsWithCorrectHrefOnMeasureListPage(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure6Desc;
        
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));       
        $I->click(Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));
        $I->wait(3);
        $I->seeInCurrentUrl(\Page\MeasureGreenTipCreate::URL($this->idMeasure6));
    }
    
    /**
     * @group notquantitative
     * @depends MeasTypes1_11_CreateMeasure6ForGeneral
     */
    public function MeasTypes1_11_2_Measure6_CheckCreateGreenTipWithCreatedProgram(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measure6Desc;
        $descGT      = $this->gt6_program1 = $I->GenerateNameOf("GT6_pr1");
        $program     = [$this->program1];
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure6));
        $I->wait(2);
        $I->CreateMeasureGreenTip($descGT, $program);
        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure6));
        $I->wait(2);
        $I->see($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
    }
    
    /**
     * @group notquantitative
     * @depends MeasTypes1_11_CreateMeasure6ForGeneral
     */
    public function MeasTypes1_11_3_CheckViewButtonAppearsWithCorrectHrefOnMeasureListPage(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure6Desc;
        
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::ViewTipButtonName, Page\MeasureList::ViewTipButtonLine_ByDescValue($desc));       
        $I->click(Page\MeasureList::ViewTipButtonLine_ByDescValue($desc));
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure6));
    }
    
    /**
     * @group notquantitative
     */
    public function MeasTypes1_12_CreateMeasure7ForGeneral(\Step\Acceptance\Measure $I) {
        $desc            = $this->measure7Desc = $I->GenerateNameOf("Description");
        $auditGroup      = \Page\AuditGroupList::General_AuditGroup;
        $auditSubgroup   = $this->audSubgroup2_General;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::MultipleQuestionAndNumber_MultipleAnswersSubmeasure;
        $questions       = ['What is your favourite color?'];
        $answers         = ['Grey', 'Green', 'Red'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSeeElement(Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));
        $this->idMeasure7 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group notquantitative
     * @depends MeasTypes1_12_CreateMeasure7ForGeneral
     */
    public function MeasTypes1_12_1_CheckCreateButtonAppearsWithCorrectHrefOnMeasureListPage(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure7Desc;
        
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));       
        $I->click(Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\MeasureGreenTipCreate::URL($this->idMeasure7));
    }
    
    /**
     * @group notquantitative
     * @depends MeasTypes1_12_CreateMeasure7ForGeneral
     */
    public function MeasTypes1_12_2_Measure7_CheckCreateGreenTipWithCreatedProgram(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measure7Desc;
        $descGT      = $this->gt7_program1 = $I->GenerateNameOf("GT7_pr1");
        $program     = [$this->program1];
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure7));
        $I->wait(2);
        $I->CreateMeasureGreenTip($descGT, $program);
        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure7));
        $I->wait(2);
        $I->see($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
    }
    
    /**
     * @group notquantitative
     * @depends MeasTypes1_12_CreateMeasure7ForGeneral
     */
    public function MeasTypes1_12_3_CheckViewButtonAppearsWithCorrectHrefOnMeasureListPage(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure7Desc;
        
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::ViewTipButtonName, Page\MeasureList::ViewTipButtonLine_ByDescValue($desc));       
        $I->click(Page\MeasureList::ViewTipButtonLine_ByDescValue($desc));
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure7));
    }
    
    /**
     * @group notquantitative
     */
    public function MeasTypes1_13_CreateMeasure8ForGeneral(\Step\Acceptance\Measure $I) {
        $desc            = $this->measure8Desc = $I->GenerateNameOf("Description");
        $auditGroup      = \Page\AuditGroupList::General_AuditGroup;
        $auditSubgroup   = $this->audSubgroup2_General;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->wait(6);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSeeElement(Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));
        $this->idMeasure8 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group notquantitative
     * @depends MeasTypes1_13_CreateMeasure8ForGeneral
     */
    public function MeasTypes1_13_1_CheckCreateButtonAppearsWithCorrectHrefOnMeasureListPage(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure8Desc;
        
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));       
        $I->click(Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\MeasureGreenTipCreate::URL($this->idMeasure8));
    }
    
    /**
     * @group notquantitative
     * @depends MeasTypes1_13_CreateMeasure8ForGeneral
     */
    public function MeasTypes1_13_2_Measure8_CheckCreateGreenTipWithCreatedProgram(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measure8Desc;
        $descGT      = $this->gt8_program1 = $I->GenerateNameOf("GT8_pr1");
        $program     = [$this->program1];
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure8));
        $I->wait(2);
        $I->CreateMeasureGreenTip($descGT, $program);
        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure8));
        $I->wait(2);
        $I->see($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
    }
    
    /**
     * @group notquantitative
     * @depends MeasTypes1_13_CreateMeasure8ForGeneral
     */
    public function MeasTypes1_13_3_CheckViewButtonAppearsWithCorrectHrefOnMeasureListPage(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure8Desc;
        
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::ViewTipButtonName, Page\MeasureList::ViewTipButtonLine_ByDescValue($desc));       
        $I->click(Page\MeasureList::ViewTipButtonLine_ByDescValue($desc));
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure8));
    }
    
    /**
     * @group quantitative
     */
    public function MeasTypes1_14_CreateMeasure9ForGeneral(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure9Desc = $I->GenerateNameOf("Description");
        $auditGroup     = \Page\AuditGroupList::General_AuditGroup;
        $auditSubgroup  = $this->audSubgroup2_General;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->wait(6);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSeeElement(Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));
        $this->idMeasure9 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_14_CreateMeasure9ForGeneral
     */
    public function MeasTypes1_14_1_CheckCreateButtonAppearsWithCorrectHrefOnMeasureListPage(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure9Desc;
        
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));       
        $I->click(Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\MeasureGreenTipCreate::URL($this->idMeasure9));
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_14_CreateMeasure9ForGeneral
     */
    public function MeasTypes1_14_2_Measure9_CheckCreateGreenTipWithCreatedProgram(\Step\Acceptance\GreenTipForMeasure $I) {
        $descMeasure = $this->measure9Desc;
        $descGT      = $this->gt9_program1 = $I->GenerateNameOf("GT9_pr1");
        $program     = [$this->program1];
        
        $I->amOnPage(Page\MeasureGreenTipCreate::URL($this->idMeasure9));
        $I->wait(2);
        $I->CreateMeasureGreenTip($descGT, $program);
        $I->amOnPage(Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure9));
        $I->wait(2);
        $I->waitForElement(\Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
        $I->see($descGT, \Page\MeasureGreenTipList::DescriptionLine_ByMeasureDescValue($descMeasure));
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_14_CreateMeasure9ForGeneral
     */
    public function MeasTypes1_14_3_CheckViewButtonAppearsWithCorrectHrefOnMeasureListPage(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure9Desc;
        
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::ViewTipButtonName, Page\MeasureList::ViewTipButtonLine_ByDescValue($desc));       
        $I->click(Page\MeasureList::ViewTipButtonLine_ByDescValue($desc));
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\MeasureGreenTipList::URL_SelectedMeasure($this->idMeasure9));
    }
    
    /**
     * @group quantitative
     */
    public function Help1_15_CreateChecklistForTier2(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = 'Office / Retail';
        $tier               = '2';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statuses1);
        $this->checklistUrl = $I->grabFromCurrentUrl();
        $I->reloadPage();
        $I->PublishChecklistStatus();
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_6_CreateMeasure1forEnergy
     */
    public function MeasTypes1_15_1_CheckGreenTipForMeasure1_Quant_MultipleQuesAndNumber_OnChecklistPreview(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
        $grTip    = $this->gt1_program1;
        
        $I->amOnPage($this->checklistUrl);
        $I->wait(1);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_EnergyGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        }
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(1);
        $I->seeElement(\Page\ChecklistPreview::MeasureGreenTip($grTip));
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_7_CreateMeasure2forEnergy
     */
    public function MeasTypes1_15_2_CheckGreenTipForMeasure2_Quant_Number_OnChecklistPreview(AcceptanceTester $I) {
        $measDesc = $this->measure2Desc;
        $grTip    = $this->gt2_program1;
        
        $I->amOnPage($this->checklistUrl);
        $I->wait(1);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_EnergyGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        }
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(2);
        $I->seeElement(\Page\ChecklistPreview::MeasureGreenTip($grTip));
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_8_CreateMeasure3forEnergy
     */
    public function MeasTypes1_15_3_CheckGreenTipForMeasure3_Quant_PopupTherms_OnChecklistPreview(AcceptanceTester $I) {
        $measDesc = $this->measure3Desc;
        $grTip    = $this->gt3_program1;
        
        $I->amOnPage($this->checklistUrl);
        $I->wait(1);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_EnergyGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        }
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(2);
        $I->seeElement(\Page\ChecklistPreview::MeasureGreenTip($grTip));
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_9_CreateMeasure4forEnergy
     */
    public function MeasTypes1_15_4_CheckGreenTipForMeasure4_Quant_PopupLighting_OnChecklistPreview(AcceptanceTester $I) {
        $measDesc = $this->measure4Desc;
        $grTip    = $this->gt4_program1;
        
        $I->amOnPage($this->checklistUrl);
        $I->wait(1);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_EnergyGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        }
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup2_Energy));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup2_Energy));
        $I->wait(2);
        $I->seeElement(\Page\ChecklistPreview::MeasureGreenTip($grTip));
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_10_CreateMeasure5forEnergy
     */
    public function MeasTypes1_15_5_CheckGreenTipForMeasure5_Quant_PopupWasteDivertion_OnChecklistPreview(AcceptanceTester $I) {
        $measDesc = $this->measure5Desc;
        $grTip    = $this->gt5_program1;
        
        $I->amOnPage($this->checklistUrl);
        $I->wait(1);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_EnergyGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_EnergyGroupButton);
        }
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup2_Energy));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup2_Energy));
        $I->wait(2);
        $I->seeElement(\Page\ChecklistPreview::MeasureGreenTip($grTip));
    }
    
    /**
     * @group notquantitative
     * @depends MeasTypes1_11_CreateMeasure6ForGeneral
     */
    public function MeasTypes1_15_6_CheckGreenTipForMeasure6_NotQuant_MultipleQues_OnChecklistPreview(AcceptanceTester $I) {
        $measDesc = $this->measure6Desc;
        $grTip    = $this->gt6_program1;
        
        $I->amOnPage($this->checklistUrl);
        $I->wait(1);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_GeneralGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_GeneralGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_GeneralGroupButton);
        }
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup2_General));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup2_General));
        $I->wait(2);
        $I->seeElement(\Page\ChecklistPreview::MeasureGreenTip($grTip));
    }
    
    /**
     * @group notquantitative
     * @depends MeasTypes1_12_CreateMeasure7ForGeneral
     */
    public function MeasTypes1_15_7_CheckGreenTipForMeasure7_NotQuant_MultipleQuesAndNumber_OnChecklistPreview(AcceptanceTester $I) {
        $measDesc = $this->measure7Desc;
        $grTip    = $this->gt7_program1;
        
        $I->amOnPage($this->checklistUrl);
        $I->wait(1);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_GeneralGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_GeneralGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_GeneralGroupButton);
        }
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup2_General));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup2_General));
        $I->wait(2);
        $I->seeElement(\Page\ChecklistPreview::MeasureGreenTip($grTip));
    }
    
    /**
     * @group notquantitative
     * @depends MeasTypes1_13_CreateMeasure8ForGeneral
     */
    public function MeasTypes1_15_8_CheckGreenTipForMeasure8_NotQuant_WithoutSubmeasures_OnChecklistPreview(AcceptanceTester $I) {
        $measDesc = $this->measure8Desc;
        $grTip    = $this->gt8_program1;
        
        $I->amOnPage($this->checklistUrl);
        $I->wait(1);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_GeneralGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_GeneralGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_GeneralGroupButton);
        }
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup2_General));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup2_General));
        $I->wait(2);
        $I->seeElement(\Page\ChecklistPreview::MeasureGreenTip($grTip));
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_14_CreateMeasure9ForGeneral
     */
    public function MeasTypes1_15_9_CheckGreenTipForMeasure9_Quant_WithoutSubmeasures_OnChecklistPreview(AcceptanceTester $I) {
        $measDesc = $this->measure9Desc;
        $grTip    = $this->gt9_program1;
        
        $I->amOnPage($this->checklistUrl);
        $I->wait(1);
        $I->click(Page\ChecklistManage::$PreviewButton);
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::$LeftMenu_GeneralGroupButton);
        if($I->getAmount($I, \Page\ChecklistPreview::$LeftMenu_GeneralGroupButton.'.active') == 0) {
            $I->click(\Page\ChecklistPreview::$LeftMenu_GeneralGroupButton);
        }
        $I->wait(2);
        $I->waitForElement(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup2_General));
        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup2_General));
        $I->wait(2);
        $I->seeElement(\Page\ChecklistPreview::MeasureGreenTip($grTip));
    }
    
    /**
     * @group notquantitative
     * @group quantitative
     */
    public function Help1_16_LogOut(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->Logout($I);
    }
    
    /**
     * @group notquantitative
     * @group quantitative
     */
    public function Help1_17_BusinessRegister(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business = $I->GenerateNameOf("busnam");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");;
        $zip              = $this->zip1;
        $city             = $this->city1;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(8);
//        $I->click('a.btn-green-lite');
//        $I->wait(3);
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_6_CreateMeasure1forEnergy
     * @depends Help1_17_BusinessRegister
     */
    public function MeasTypes1_17_1_CheckGreenTipForMeasure1_Quant_MultipleQuesAndNumber(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
        $grTip    = $this->gt1_program1;
        
        $I->wait(1);
        $I->comment("Check value: $grTip for meassure: $measDesc");
//        $I->amOnPage(\Page\RegistrationStarted::$URL_Started);
//        $I->wait(1);
//        $I->waitForElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
//        $I->click(\Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
//        $I->wait(2);
//        $I->waitForElement(\Page\RegistrationStarted::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
//        $I->click(\Page\RegistrationStarted::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->seeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_7_CreateMeasure2forEnergy
     * @depends Help1_17_BusinessRegister
     */
    public function MeasTypes1_17_2_CheckGreenTipForMeasure2_Quant_Number(AcceptanceTester $I) {
        $measDesc = $this->measure2Desc;
        $grTip    = $this->gt2_program1;
        
        $I->wait(1);
        $I->comment("Check value: $grTip for meassure: $measDesc");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->seeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_8_CreateMeasure3forEnergy
     * @depends Help1_17_BusinessRegister
     */
    public function MeasTypes1_17_3_CheckGreenTipForMeasure3_Quant_PopupTherms(AcceptanceTester $I) {
        $measDesc = $this->measure3Desc;
        $grTip    = $this->gt3_program1;
        
        $I->wait(1);
        $I->comment("Check value: $grTip for meassure: $measDesc");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->seeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_9_CreateMeasure4forEnergy
     * @depends Help1_17_BusinessRegister
     */
    public function MeasTypes1_17_4_CheckGreenTipForMeasure4_Quant_PopupLighting(AcceptanceTester $I) {
        $measDesc = $this->measure4Desc;
        $grTip    = $this->gt4_program1;
        
        $I->wait(1);
        $I->comment("Check value: $grTip for meassure: $measDesc");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_Energy));
        $I->wait(2);
        $I->seeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_10_CreateMeasure5forEnergy
     * @depends Help1_17_BusinessRegister
     */
    public function MeasTypes1_17_5_CheckGreenTipForMeasure5_Quant_PopupWasteDivertion(AcceptanceTester $I) {
        $measDesc = $this->measure5Desc;
        $grTip    = $this->gt5_program1;
        
        $I->wait(1);
        $I->comment("Check value: $grTip for meassure: $measDesc");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_Energy));
        $I->wait(2);
        $I->seeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    /**
     * @group notquantitative
     * @depends MeasTypes1_11_CreateMeasure6ForGeneral
     * @depends Help1_17_BusinessRegister
     */
    public function MeasTypes1_17_6_CheckGreenTipForMeasure6_NotQuant_MultipleQues(AcceptanceTester $I) {
        $measDesc = $this->measure6Desc;
        $grTip    = $this->gt6_program1;
        
        $I->wait(1);
        $I->comment("Check value: $grTip for meassure: $measDesc");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_General));
        $I->wait(2);
        $I->seeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    /**
     * @group notquantitative
     * @depends MeasTypes1_12_CreateMeasure7ForGeneral
     * @depends Help1_17_BusinessRegister
     */
    public function MeasTypes1_17_7_CheckGreenTipForMeasure7_NotQuant_MultipleQuesAndNumber(AcceptanceTester $I) {
        $measDesc = $this->measure7Desc;
        $grTip    = $this->gt7_program1;
        
        $I->wait(1);
        $I->comment("Check value: $grTip for meassure: $measDesc");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_General));
        $I->wait(2);
        $I->seeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    /**
     * @group notquantitative
     * @depends MeasTypes1_13_CreateMeasure8ForGeneral
     * @depends Help1_17_BusinessRegister
     */
    public function MeasTypes1_17_8_CheckGreenTipForMeasure8_NotQuant_WithoutSubmeasures(AcceptanceTester $I) {
        $measDesc = $this->measure8Desc;
        $grTip    = $this->gt8_program1;
        
        $I->wait(1);
        $I->comment("Check value: $grTip for meassure: $measDesc");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_General));
        $I->wait(2);
        $I->seeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_14_CreateMeasure9ForGeneral
     * @depends Help1_17_BusinessRegister
     */
    public function MeasTypes1_17_9_CheckGreenTipForMeasure9_Quant_WithoutSubmeasures(AcceptanceTester $I) {
        $measDesc = $this->measure9Desc;
        $grTip    = $this->gt9_program1;
        
        $I->wait(1);
        $I->comment("Check value: $grTip for meassure: $measDesc");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_General));
        $I->wait(2);
        $I->seeElement(\Page\RegistrationStarted::MeasureGreenTip($grTip));
    }
    
    /**
     * @depends Help1_17_BusinessRegister
     */
    public function Help1_18_LogOutFromBusiness_And_LoginAsNationalAdmin(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsAdmin($I);
    }
      
    /**
     * @depends Help1_17_BusinessRegister
     */
    public function Help1_18_GoToBusinessViewPage(AcceptanceTester $I){
        $I->wait(1);
        $I->SelectDefaultState($I, $this->state);
        $I->wait(1);
        $I->amOnPage(Page\Dashboard::URL());
        $I->wait(2);
        $url1 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business), 'href');
        $I->comment("Url1: $url1");
        $u1 = explode('=', $url1);
        $this->id_Business = $u1[1];
        $I->comment("Business1 id: $this->id_Business");
    }
     
    /**
     * @group quantitative
     * @depends MeasTypes1_6_CreateMeasure1forEnergy
     * @depends Help1_17_BusinessRegister
     */
    public function MeasTypes1_18_1_CheckGreenTipForMeasure1_Quant_MultipleQuesAndNumber_OnBusinessView(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
        $grTip    = $this->gt1_program1;
        
        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_Business, $this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->seeElement(\Page\BusinessChecklistView::MeasureGreenTip($grTip));
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_7_CreateMeasure2forEnergy
     * @depends Help1_17_BusinessRegister
     */
    public function MeasTypes1_18_2_CheckGreenTipForMeasure2_Quant_Number_OnBusinessView(AcceptanceTester $I) {
        $measDesc = $this->measure2Desc;
        $grTip    = $this->gt2_program1;
        
        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_Business, $this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->seeElement(\Page\BusinessChecklistView::MeasureGreenTip($grTip));
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_8_CreateMeasure3forEnergy
     * @depends Help1_17_BusinessRegister
     */
    public function MeasTypes1_18_3_CheckGreenTipForMeasure3_Quant_PopupTherms_OnBusinessView(AcceptanceTester $I) {
        $measDesc = $this->measure3Desc;
        $grTip    = $this->gt3_program1;
        
        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_Business, $this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->seeElement(\Page\BusinessChecklistView::MeasureGreenTip($grTip));
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_9_CreateMeasure4forEnergy
     * @depends Help1_17_BusinessRegister
     */
    public function MeasTypes1_18_4_CheckGreenTipForMeasure4_Quant_PopupLighting_OnBusinessView(AcceptanceTester $I) {
        $measDesc = $this->measure4Desc;
        $grTip    = $this->gt4_program1;
        
        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_Business, $this->id_audSubgroup2_Energy));
        $I->wait(2);
        $I->seeElement(\Page\BusinessChecklistView::MeasureGreenTip($grTip));
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_10_CreateMeasure5forEnergy
     * @depends Help1_17_BusinessRegister
     */
    public function MeasTypes1_18_5_CheckGreenTipForMeasure5_Quant_PopupWasteDivertion_OnBusinessView(AcceptanceTester $I) {
        $measDesc = $this->measure5Desc;
        $grTip    = $this->gt5_program1;
        
        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_Business, $this->id_audSubgroup2_Energy));
        $I->wait(2);
        $I->seeElement(\Page\BusinessChecklistView::MeasureGreenTip($grTip));
    }
    
    /**
     * @group notquantitative
     * @depends MeasTypes1_11_CreateMeasure6ForGeneral
     * @depends Help1_17_BusinessRegister
     */
    public function MeasTypes1_18_6_CheckGreenTipForMeasure6_NotQuant_MultipleQues_OnBusinessView(AcceptanceTester $I) {
        $measDesc = $this->measure6Desc;
        $grTip    = $this->gt6_program1;
        
        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_Business, $this->id_audSubgroup2_General));
        $I->wait(2);
        $I->seeElement(\Page\BusinessChecklistView::MeasureGreenTip($grTip));
    }
    
    /**
     * @group notquantitative
     * @depends MeasTypes1_12_CreateMeasure7ForGeneral
     * @depends Help1_17_BusinessRegister
     */
    public function MeasTypes1_18_7_CheckGreenTipForMeasure7_NotQuant_MultipleQuesAndNumber_OnBusinessView(AcceptanceTester $I) {
        $measDesc = $this->measure7Desc;
        $grTip    = $this->gt7_program1;
        
        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_Business, $this->id_audSubgroup2_General));
        $I->wait(2);
        $I->seeElement(\Page\BusinessChecklistView::MeasureGreenTip($grTip));
    }
    
    /**
     * @group notquantitative
     * @depends MeasTypes1_13_CreateMeasure8ForGeneral
     * @depends Help1_17_BusinessRegister
     */
    public function MeasTypes1_18_8_CheckGreenTipForMeasure8_NotQuant_WithoutSubmeasures_OnBusinessView(AcceptanceTester $I) {
        $measDesc = $this->measure8Desc;
        $grTip    = $this->gt8_program1;
        
        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_Business, $this->id_audSubgroup2_General));
        $I->wait(2);
        $I->seeElement(\Page\BusinessChecklistView::MeasureGreenTip($grTip));
    }
    
    /**
     * @group quantitative
     * @depends MeasTypes1_14_CreateMeasure9ForGeneral
     * @depends Help1_17_BusinessRegister
     */
    public function MeasTypes1_18_9_CheckGreenTipForMeasure9_Quant_WithoutSubmeasures_OnBusinessView(AcceptanceTester $I) {
        $measDesc = $this->measure9Desc;
        $grTip    = $this->gt9_program1;
        
        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_Business, $this->id_audSubgroup2_General));
        $I->wait(2);
        $I->seeElement(\Page\BusinessChecklistView::MeasureGreenTip($grTip));
    }
}
