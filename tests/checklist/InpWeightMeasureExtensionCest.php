<?php

class InpWeightMeasureExtensionCest
{
    public $state;
    public $audSubgroup1_Energy, $id_audSubgroup1_Energy;
    public $audSubgroup1_SolidWaste, $id_audSubgroup1_SolidWaste;
    public $emailStateAdmin, $emailCoordinator;
    public $password = 'Qq!1111111';
    public $idStateAdmin, $idCoordinator;
    public $measure1Desc, $idMeasure1, $pointsMeas1 = "1";
    public $measure2Desc, $idMeasure2, $pointsMeas2 = "2";
    public $measure3Desc, $idMeasure3, $pointsMeas3 = "3";
    public $measure4Desc, $idMeasure4, $pointsMeas4 = "4";
    public $measure5Desc, $idMeasure5, $pointsMeas5 = "5";
    public $measure6Desc, $idMeasure6, $pointsMeas6 = "6";
    public $measure7Desc, $idMeasure7, $pointsMeas7 = "7";
    public $measure8Desc, $idMeasure8, $pointsMeas8 = "8";
    public $measure9Desc, $idMeasure9, $pointsMeas9 = "9";
    public $measuresDesc_SuccessCreated = [], $points = '10', $completePoints = '0', $coreCount = '1', $completeCoreMeasures = '0';
    public $city1, $zip1, $program1, $county;
    public $statuses    = ['core', 'elective', 'not set', 'core', 'elective', 'not set', 'core', 'elective', 'not set'];
    public $statuses1   = ['core', 'core', 'core', 'elective', 'core', 'elective', 'core', 'not set', 'core'];
    public $statuses1_ExtenSaved   = ['Default', 'Default', 'Default', 'Large Landscape', 'Large Landscape', 'Default', 'Large Building', 'Default', 'Default'];
    public $statuses_Error2   = ['core', 'not set', 'not set', 'elective', 'core', 'elective', 'not set', 'not set', 'not set'];
    public $extensions  = ['Default', 'Default', 'Default', 'Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Building', 'Large Building', 'Large Building'];
    public $extensions1 = ['Large Building', 'Large Landscape', 'Default', 'Default', 'Large Landscape', 'Large Landscape', 'Default', 'Large Building', 'Large Building'];
    public $extensions1_Saved = ['Large Building', 'Large Landscape', 'Default', 'Default', 'Large Landscape', 'Default', 'Default', 'Large Building', 'Default'];
    public $extensions_Error1 = ['Large Building', 'Large Building', 'Default', 'Default', 'Default', 'Large Building', 'Large Building', 'Large Building', 'Large Building'];
    public $extensions_Error1_Saved = ['Large Building', 'Large Building', 'Default', 'Default', 'Default', 'Default', 'Large Building', 'Large Building', 'Default'];
    public $extensions_Error2 = ['Default', 'Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Building', 'Large Building', 'Large Building'];
    public $extensions_Error2_Saved = ['Default', 'Large Landscape', 'Default', 'Large Landscape', 'Large Landscape', 'Default', 'Large Building', 'Large Building', 'Default'];
    public $extensions_Error3 = ['Default', 'Large Building', 'Default', 'Large Building', 'Large Building', 'Large Landscape', 'Large Building', 'Large Building', 'Large Building'];
    public $extensions_Error3_Saved = ['Default', 'Large Building', 'Default', 'Large Building', 'Large Building', 'Default', 'Large Building', 'Large Building', 'Default'];
    public $checklistUrl, $id_checklist;
    public $business_NAanswers, $bus_busSquire_NAanswers  = '45678', $bus_landSquire_NAanswers  = '5666';
    public $business1_LB,       $bus1_busSquire_LB        = '30000', $bus1_landSquire_LB        = '999';
    public $business2_LL,       $bus2_busSquire_LL        = '29999', $bus2_landSquire_LL        = '1000';
    public $business3_LB_LL,    $bus3_busSquire_LB_LL     = '30001', $bus3_landSquire_LB_LL     = '1001'; 
    public $business4_Default,  $bus4_busSquire_Default   = '17500', $bus4_landSquire_Default   = '500';
    public $totalEarnedText       = "Total points earned across all tiers";
    public $measuresText          = " required measures";
    public $pointsText            = " points";
    public $measuresCompletedText = " measures completed";
    public $pointsEarnedText      = " points earned";

    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */

    public function Help_LoginAsNationalAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateState(Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StExtentInpWeight");
        $shortName = 'EIW';
        $weighted  = 'Input';
        
        $I->CreateState($name, $shortName, $weighted);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_SelectDefaultState(AcceptanceTester $I)
    {
        $I->wait(2);
        $I->SelectDefaultState($I, $this->state);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateAuditSubGroupForEnergyGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup1_Energy = $I->GenerateNameOf("EnAudSub1");
        $auditGroup = Page\AuditGroupList::Energy_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->wait(3);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $I->wait(2);
        $this->id_audSubgroup1_Energy = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateAuditSubGroupsForSolidWasteGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name      = $this->audSubgroup1_SolidWaste = $I->GenerateNameOf("SolWasAudSub1");
        $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->wait(3);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $I->wait(2);
        $this->id_audSubgroup1_SolidWaste = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    //---------------------------Create State Admin-----------------------------
    
    /**
     * @group stateadmin
     */
    
    public function CreateStateAdmin_ForCreatedState(\Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::stateAdminType;
        $email     = $this->emailStateAdmin = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnam');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(4);
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(3);
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(2);
        $stateAdmin = $I->GetUserOnPageInList($email, $userType);
        $this->idStateAdmin = $stateAdmin['id'];
    }
    
    //--------------------------------------------------------------------------Login As State Admin------------------------------------------------------------------------------------
    
    /**
     * @group stateadmin
     */
    
    public function LogOut_And_LogInAsStateAdmin(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->emailStateAdmin, $this->password, $I, 'state admin');
        $I->wait(2);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure1_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure1Desc = $I->GenerateNameOf("Description_1_");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['question1', 'question2'];
        $points         = $this->pointsMeas1;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, $points);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(5);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure2_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure2Desc = $I->GenerateNameOf("Description_2_");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['q1'];
        $points         = $this->pointsMeas2;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, $points);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(5);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure2 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure3_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure3Desc = $I->GenerateNameOf("Description_3_");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['q1'];
        $points         = $this->pointsMeas3;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, $points);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(5);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure3 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure4_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure4Desc = $I->GenerateNameOf("Description_4_");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['q'];
        $points         = $this->pointsMeas4;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, $points);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(5);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure4 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure5_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure5Desc = $I->GenerateNameOf("Description_5_");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['q1'];
        $points         = $this->pointsMeas5;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, $points);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(5);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure5 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure6_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure6Desc = $I->GenerateNameOf("Description_6_");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['q'];
        $points         = $this->pointsMeas6;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, $points);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(5);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure6 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure7_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure7Desc = $I->GenerateNameOf("Description_7_");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['op1', 'op2'];
        $points         = $this->pointsMeas7;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, $points);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(5);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure7 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure8_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure8Desc = $I->GenerateNameOf("Description_8_");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['1'];
        $points         = $this->pointsMeas8;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, $points);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(5);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure8 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure9_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure9Desc = $I->GenerateNameOf("Description_9_");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['opt1'];
        $points         = $this->pointsMeas9;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, $points);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(5);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure9 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    //-------------------------------Create county------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateCounty(\Step\Acceptance\County $I) {
        $name    = $this->county = $I->GenerateNameOf("County");
        $state   = $this->state;
        
        $I->CreateCounty($name, $state);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city1 = $I->GenerateNameOf("CityEIW1");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip1 = $I->GenerateZipCode();
        $program = $this->program1 = $I->GenerateNameOf("ProgEIW1");
        
        $I->CreateCity($city, $state, $zips, $this->county);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    //----------------------------Create Coordinator----------------------------
    
    /**
     * @group coordinator
     */
    
    public function CreateCoordinatorUser_ForProgram2(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::coordinatorType;
        $email     = $this->emailCoordinator = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnam');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone, null, $showInfo = 'off');
        $I->wait(1);
        $I->reloadPage();
        $I->wait(6);
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(3);
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(6);
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(2);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(3);
        $coordinator = $I->GetUserOnPageInList($email, $userType);
        $this->idCoordinator = $coordinator['id'];
    }
    
    /**
     * @group coordinator
     */
    
    public function LogOut_And_LogInAsCoordinator(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->emailCoordinator, $this->password, $I, 'coordinator');
        $I->wait(4);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Create_Checklist1_ForTier2_ForExtensionUpdatingTest(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = 'Office / Retail';
        $tier               = '2';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        
        $I->click(Page\ChecklistManage::$ManageMeasuresTab);
        $I->wait(3);
        $I->ManageChecklist($descs, $this->statuses, $this->extensions);
        $this->checklistUrl = $I->grabFromCurrentUrl();
        $I->comment("Url1: $this->checklistUrl");
        $u1 = explode('=', $this->checklistUrl);
        $urlEnd = $u1[1];
        $u2 = explode('&', $urlEnd);
        $this->id_checklist = $u2[0];
        $I->comment("Checklist1 (For Extensions Updating Test) id: $this->id_checklist");
        $I->reloadPage();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function UpdateDefineTotalsValuesForChecklist1(\Step\Acceptance\Checklist $I) {
        $points_Default = '3';
        $points_LB      = '18';
        $points_LL      = '12';
        $points_LL_LB   = '27';
        
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->UpdateChecklistPoints($points_Default, $points_LB, $points_LL, $points_LL_LB);
        $I->wait(2);
        $I->CheckSavedChecklistPoints($points_Default, $points_LB, $points_LL, $points_LL_LB);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeExtensionStatusesInChecklist1_CheckCorrectDefineTotalsValuesAfterExtensionsUpdating(\Step\Acceptance\Checklist $I) {
        $points_Default = '3';
        $points_LB      = '18';
        $points_LL      = '12';
        $points_LL_LB   = '27';
        
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->selectOption(\Page\ChecklistManage::$Filter_ByStatusSelect, "View All");
        $I->wait(3);
        $I->ManageChecklist($this->measuresDesc_SuccessCreated, $this->statuses, $this->extensions1);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        $I->comment("                                             ");
        $I->canSee('Core', \Page\ChecklistManage::$IncludedMeasuresForm_CoreTitle);
        $I->canSee('Default:', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultCoreLabel);
        $I->canSee('Lg Building:', \Page\ChecklistManage::$IncludedMeasuresForm_LBCoreLabel);
        $I->canSee('Lg Landscape:', \Page\ChecklistManage::$IncludedMeasuresForm_LLCoreLabel);
        $I->canSee('Lg Building + Lg Landscape:', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLCoreLabel);
        
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultCoreValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LBCoreValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LLCoreValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLCoreValue);
        
        $I->comment("                                             ");
        $I->canSee('Elective', \Page\ChecklistManage::$IncludedMeasuresForm_ElectiveTitle);
        $I->canSee('Default:', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveLabel);
        $I->canSee('Lg Building:', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveLabel);
        $I->canSee('Lg Landscape:', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveLabel);
        $I->canSee('Lg Building + Lg Landscape:', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveLabel);
        
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveValue);
        
        $I->comment("---Points:---");
        $I->canSee('Core', \Page\ChecklistManage::$IncludedPointsForm_CoreTitle);
        $I->canSee('Default:', \Page\ChecklistManage::$IncludedPointsForm_DefaultCoreLabel);
        $I->canSee('Large Building:', \Page\ChecklistManage::$IncludedPointsForm_LBCoreLabel);
        $I->canSee('Large Landscape:', \Page\ChecklistManage::$IncludedPointsForm_LLCoreLabel);
        $I->canSee('Lg Building + Lg Landscape:', \Page\ChecklistManage::$IncludedPointsForm_LB_LLCoreLabel);
        
        $I->canSee('11', \Page\ChecklistManage::$IncludedPointsForm_DefaultCoreValue);
        $I->canSee('12', \Page\ChecklistManage::$IncludedPointsForm_LBCoreValue);
        $I->canSee('11', \Page\ChecklistManage::$IncludedPointsForm_LLCoreValue);
        $I->canSee('12', \Page\ChecklistManage::$IncludedPointsForm_LB_LLCoreValue);
        
        $I->canSee('Elective', \Page\ChecklistManage::$IncludedPointsForm_ElectiveTitle);
        $I->canSee('Default:', \Page\ChecklistManage::$IncludedPointsForm_DefaultElectiveLabel);
        $I->canSee('Large Building:', \Page\ChecklistManage::$IncludedPointsForm_LBElectiveLabel);
        $I->canSee('Large Landscape:', \Page\ChecklistManage::$IncludedPointsForm_LLElectiveLabel);
        $I->canSee('Lg Building + Lg Landscape:', \Page\ChecklistManage::$IncludedPointsForm_LB_LLElectiveLabel);
        
        $I->canSee('0', \Page\ChecklistManage::$IncludedPointsForm_DefaultElectiveValue);
        $I->canSee('8', \Page\ChecklistManage::$IncludedPointsForm_LBElectiveValue);
        $I->canSee('7', \Page\ChecklistManage::$IncludedPointsForm_LLElectiveValue);
        $I->canSee('15', \Page\ChecklistManage::$IncludedPointsForm_LB_LLElectiveValue);
        $I->wait(1);
        
        $I->CheckSavedChecklistPoints($points_Default, $points_LB, $points_LL, $points_LL_LB);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeExtensionStatusesInChecklist1_CheckError(\Step\Acceptance\Checklist $I) {
        $points_Default = '3';
        $points_LB      = '18';
        $points_LL      = '12';
        $points_LL_LB   = '27';
        
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->selectOption(\Page\ChecklistManage::$Filter_ByStatusSelect, "View All");
        $I->wait(3);
        $I->ManageChecklist($this->measuresDesc_SuccessCreated, $this->statuses, $this->extensions_Error1);
        $I->wait(4);
        $I->canSee("Checklist was not updated! You can't change measures.");
        $I->click(".confirm");
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses, $this->extensions1_Saved);
        $I->wait(1);
        
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->selectOption(\Page\ChecklistManage::$Filter_ByStatusSelect, "View All");
        $I->wait(3);
        $I->ManageChecklist($this->measuresDesc_SuccessCreated, $this->statuses, $this->extensions_Error2);
        $I->wait(4);
        $I->canSee("Checklist was not updated! You can't change measures.");
        $I->click(".confirm");
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses, $this->extensions1_Saved);
        $I->wait(1);
        
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->selectOption(\Page\ChecklistManage::$Filter_ByStatusSelect, "View All");
        $I->wait(3);
        $I->ManageChecklist($this->measuresDesc_SuccessCreated, $this->statuses, $this->extensions_Error3);
        $I->wait(4);
        $I->canSee("Checklist was not updated! You can't change measures.");
        $I->click(".confirm");
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses, $this->extensions1_Saved);
        $I->wait(1);
        
        $I->comment("                                             ");
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultCoreValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LBCoreValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LLCoreValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLCoreValue);
        
        $I->comment("                                             ");
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveValue);
        
        $I->comment("---Points:---");
        $I->canSee('11', \Page\ChecklistManage::$IncludedPointsForm_DefaultCoreValue);
        $I->canSee('12', \Page\ChecklistManage::$IncludedPointsForm_LBCoreValue);
        $I->canSee('11', \Page\ChecklistManage::$IncludedPointsForm_LLCoreValue);
        $I->canSee('12', \Page\ChecklistManage::$IncludedPointsForm_LB_LLCoreValue);
        
        $I->canSee('0', \Page\ChecklistManage::$IncludedPointsForm_DefaultElectiveValue);
        $I->canSee('8', \Page\ChecklistManage::$IncludedPointsForm_LBElectiveValue);
        $I->canSee('7', \Page\ChecklistManage::$IncludedPointsForm_LLElectiveValue);
        $I->canSee('15', \Page\ChecklistManage::$IncludedPointsForm_LB_LLElectiveValue);
        $I->wait(1);
        
        $I->CheckSavedChecklistPoints($points_Default, $points_LB, $points_LL, $points_LL_LB);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangePointsAtFirstAndNextChangeExtensionStatusesInChecklist1_CheckSavingValues(\Step\Acceptance\Checklist $I) {
        $points_Default_1 = '3';
        $points_LB_1      = '18';
        $points_LL_1      = '9';
        $points_LL_LB_1   = '27';
        
        $points_Default_2 = '1';
        $points_LB_2      = '16';
        $points_LL_2      = '9';
        $points_LL_LB_2   = '27';
        
        $points_Default_3 = '1';
        $points_LB_3      = '16';
        $points_LL_3      = '1';
        $points_LL_LB_3   = '27';
        
    // $extensions_Error1 = ['Large Building', 'Large Building', 'Default', 'Default', 'Default',  'Large Building', 'Large Building', 'Large Building', 'Large Building'];
    // $statuses          = ['core',           'elective',       'not set', 'core',    'elective', 'not set',        'core',           'elective',       'not set'];
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->UpdateChecklistPoints($points_Default = null, $points_LB = null, $points_LL_1, $points_LL_LB = null);
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->selectOption(\Page\ChecklistManage::$Filter_ByStatusSelect, "View All");
        $I->wait(3);
        $I->ManageChecklist($this->measuresDesc_SuccessCreated, $this->statuses, $this->extensions_Error1);
        $I->wait(4);
        $I->cantSee("Checklist was not updated! You can't change measures.");
        $I->wait(2);
        $I->reloadPage();
        $I->wait(3);
        $I->selectOption(\Page\ChecklistManage::$Filter_ByStatusSelect, "View All");
        $I->wait(3);
        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses, $this->extensions_Error1_Saved);
        $I->wait(1);
        $I->CheckSavedChecklistPoints($points_Default_1, $points_LB_1, $points_LL_1, $points_LL_LB_1);
        $I->comment("                                             ");
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultCoreValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LBCoreValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LLCoreValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLCoreValue);
        
        $I->comment("                                             ");
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveValue);
        
        $I->comment("---Points:---");
        $I->canSee('4', \Page\ChecklistManage::$IncludedPointsForm_DefaultCoreValue);
        $I->canSee('12', \Page\ChecklistManage::$IncludedPointsForm_LBCoreValue);
        $I->canSee('4', \Page\ChecklistManage::$IncludedPointsForm_LLCoreValue);
        $I->canSee('12', \Page\ChecklistManage::$IncludedPointsForm_LB_LLCoreValue);
        
        $I->canSee('5', \Page\ChecklistManage::$IncludedPointsForm_DefaultElectiveValue);
        $I->canSee('15', \Page\ChecklistManage::$IncludedPointsForm_LBElectiveValue);
        $I->canSee('5', \Page\ChecklistManage::$IncludedPointsForm_LLElectiveValue);
        $I->canSee('15', \Page\ChecklistManage::$IncludedPointsForm_LB_LLElectiveValue);
        $I->wait(1);
        
    // $extensions_Error2 = ['Default', 'Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Building', 'Large Building', 'Large Building'];
    // $statuses          = ['core',    'elective',        'not set',         'core',            'elective',        'not set',         'core',           'elective',       'not set'];
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->selectOption(\Page\ChecklistManage::$Filter_ByStatusSelect, "View All");
        $I->wait(3);
        $I->ManageChecklist($this->measuresDesc_SuccessCreated, $this->statuses, $this->extensions_Error2);
        $I->wait(4);
        $I->canSee("Checklist was not updated! You can't change measures.");
        $I->wait(2);
        
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->UpdateChecklistPoints($points_Default_2, $points_LB_2, $points_LL = null, $points_LL_LB = null);
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->selectOption(\Page\ChecklistManage::$Filter_ByStatusSelect, "View All");
        $I->wait(3);
        $I->ManageChecklist($this->measuresDesc_SuccessCreated, $this->statuses, $this->extensions_Error2);
        $I->wait(4);
        $I->cantSee("Checklist was not updated! You can't change measures.");
        $I->wait(2);
        $I->reloadPage();
        $I->wait(3);
        $I->selectOption(\Page\ChecklistManage::$Filter_ByStatusSelect, "View All");
        $I->wait(3);
        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses, $this->extensions_Error2_Saved);
        $I->wait(1);
        $I->CheckSavedChecklistPoints($points_Default_2, $points_LB_2, $points_LL_2, $points_LL_LB_2);
        $I->comment("                                             ");
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultCoreValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LBCoreValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LLCoreValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLCoreValue);
        
        $I->comment("                                             ");
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveValue);
        
        $I->comment("---Points:---");
        $I->canSee('1', \Page\ChecklistManage::$IncludedPointsForm_DefaultCoreValue);
        $I->canSee('8', \Page\ChecklistManage::$IncludedPointsForm_LBCoreValue);
        $I->canSee('5', \Page\ChecklistManage::$IncludedPointsForm_LLCoreValue);
        $I->canSee('12', \Page\ChecklistManage::$IncludedPointsForm_LB_LLCoreValue);
        
        $I->canSee('0', \Page\ChecklistManage::$IncludedPointsForm_DefaultElectiveValue);
        $I->canSee('8', \Page\ChecklistManage::$IncludedPointsForm_LBElectiveValue);
        $I->canSee('7', \Page\ChecklistManage::$IncludedPointsForm_LLElectiveValue);
        $I->canSee('15', \Page\ChecklistManage::$IncludedPointsForm_LB_LLElectiveValue);
        $I->wait(1);
        
        // $extensions_Error3 = ['Default', 'Large Building', 'Default', 'Large Building', 'Large Building', 'Large Landscape', 'Large Building', 'Large Building', 'Large Building'];
        // $statuses          = ['core',    'elective',       'not set', 'core',           'elective',       'not set',         'core',           'elective',       'not set'];
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->selectOption(\Page\ChecklistManage::$Filter_ByStatusSelect, "View All");
        $I->wait(3);
        $I->ManageChecklist($this->measuresDesc_SuccessCreated, $this->statuses, $this->extensions_Error3);
        $I->wait(4);
        $I->canSee("Checklist was not updated! You can't change measures.");
        $I->wait(2);
        
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->UpdateChecklistPoints($points_Default = null, $points_LB = null, $points_LL_3, $points_LL_LB = null);
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->selectOption(\Page\ChecklistManage::$Filter_ByStatusSelect, "View All");
        $I->wait(3);
        $I->ManageChecklist($this->measuresDesc_SuccessCreated, $this->statuses, $this->extensions_Error3);
        $I->wait(4);
        $I->cantSee("Checklist was not updated! You can't change measures.");
        $I->wait(2);
        $I->reloadPage();
        $I->wait(3);
        $I->selectOption(\Page\ChecklistManage::$Filter_ByStatusSelect, "View All");
        $I->wait(3);
        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses, $this->extensions_Error3_Saved);
        $I->wait(1);
        $I->CheckSavedChecklistPoints($points_Default_3, $points_LB_3, $points_LL_3, $points_LL_LB_3);
        $I->comment("                                             ");
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultCoreValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LBCoreValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LLCoreValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLCoreValue);
        
        $I->comment("                                             ");
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveValue);
        
        $I->comment("---Points:---");
        $I->canSee('1', \Page\ChecklistManage::$IncludedPointsForm_DefaultCoreValue);
        $I->canSee('12', \Page\ChecklistManage::$IncludedPointsForm_LBCoreValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedPointsForm_LLCoreValue);
        $I->canSee('12', \Page\ChecklistManage::$IncludedPointsForm_LB_LLCoreValue);
        
        $I->canSee('0', \Page\ChecklistManage::$IncludedPointsForm_DefaultElectiveValue);
        $I->canSee('15', \Page\ChecklistManage::$IncludedPointsForm_LBElectiveValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedPointsForm_LLElectiveValue);
        $I->canSee('15', \Page\ChecklistManage::$IncludedPointsForm_LB_LLElectiveValue);
        $I->wait(1);        
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    //For Test Statuses Updating
    public function Create_Checklist2_ForTier2_ForStatusesUpdatingTest(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = 'Office / Retail';
        $tier               = '2';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->wait(3);
        $I->click(Page\ChecklistManage::$ManageMeasuresTab);
        $I->wait(2);
        $I->ManageChecklist($descs, $this->statuses, $this->extensions);
        $this->checklistUrl = $I->grabFromCurrentUrl();
        $I->comment("Url1: $this->checklistUrl");
        $u1 = explode('=', $this->checklistUrl);
        $urlEnd = $u1[1];
        $u2 = explode('&', $urlEnd);
        $this->id_checklist = $u2[0];
        $I->comment("Checklist2 (For Statuses Updating Test) id: $this->id_checklist");
        $I->reloadPage();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function UpdateDefineTotalsValuesForChecklist2(\Step\Acceptance\Checklist $I) {
        $points_Default = '3';
        $points_LB      = '18';
        $points_LL      = '12';
        $points_LL_LB   = '27';
        
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->UpdateChecklistPoints($points_Default, $points_LB, $points_LL, $points_LL_LB);
        $I->wait(1);
        $I->CheckSavedChecklistPoints($points_Default, $points_LB, $points_LL, $points_LL_LB);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeStatusesInChecklist2_CheckCorrectDefineTotalsValuesAfterStatusesUpdating(\Step\Acceptance\Checklist $I) {
        $points_Default1 = '21'; $coreD = "15";     $elecD = "6";
        $points_LB1      = '28'; $coreLB = "22";    $elecLB = "6";
        $points_LL1      = '30'; $coreLL = "20";    $elecLL = "10";
        $points_LL_LB1   = '37'; $coreLB_LL = "27"; $elecLB_LL = "10";
        
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->selectOption(\Page\ChecklistManage::$Filter_ByStatusSelect, "View All");
        $I->wait(3);
        $I->ManageChecklist($this->measuresDesc_SuccessCreated, $this->statuses1);
        $I->wait(3);
        $I->reloadPage();
        $I->wait(2);
        $I->comment("                                             ");
        $I->canSee('4', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultCoreValue);
        $I->canSee('5', \Page\ChecklistManage::$IncludedMeasuresForm_LBCoreValue);
        $I->canSee('5', \Page\ChecklistManage::$IncludedMeasuresForm_LLCoreValue);
        $I->canSee('6', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLCoreValue);
        
        $I->comment("                                             ");
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveValue);
        
        $I->comment("---Points:---");
        $I->canSee($coreD, \Page\ChecklistManage::$IncludedPointsForm_DefaultCoreValue);
        $I->canSee($coreLB, \Page\ChecklistManage::$IncludedPointsForm_LBCoreValue);
        $I->canSee($coreLL, \Page\ChecklistManage::$IncludedPointsForm_LLCoreValue);
        $I->canSee($coreLB_LL, \Page\ChecklistManage::$IncludedPointsForm_LB_LLCoreValue);
        
        $I->canSee($elecD, \Page\ChecklistManage::$IncludedPointsForm_DefaultElectiveValue);
        $I->canSee($elecLB, \Page\ChecklistManage::$IncludedPointsForm_LBElectiveValue);
        $I->canSee($elecLL, \Page\ChecklistManage::$IncludedPointsForm_LLElectiveValue);
        $I->canSee($elecLB_LL, \Page\ChecklistManage::$IncludedPointsForm_LB_LLElectiveValue);
        $I->wait(1);        
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeStatusesInChecklist2_CheckError(\Step\Acceptance\Checklist $I) {
        $points_Default = '3';
        $points_LB      = '18';
        $points_LL      = '12';
        $points_LL_LB   = '27';
        
        $points_Default_Upd = '1';
        $points_LB_Upd      = '1';
        $points_LL_Upd      = '12';
        $points_LL_LB_Upd   = '12';
        
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->selectOption(\Page\ChecklistManage::$Filter_ByStatusSelect, "View All");
        $I->wait(3);
        $I->ManageChecklist($this->measuresDesc_SuccessCreated, $this->statuses_Error2);
        $I->wait(4);
        $I->canSee("Checklist was not updated! You can't change measures.");
        $I->click(".confirm");
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses1, $this->statuses1_ExtenSaved);
        $I->wait(1);
        
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->UpdateChecklistPoints($points_Default_Upd, $points_LB_Upd, $points_LL1 = null, $points_LL_LB_Upd);
        $I->wait(3);
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->selectOption(\Page\ChecklistManage::$Filter_ByStatusSelect, "View All");
        $I->wait(2);
        $I->ManageChecklist($this->measuresDesc_SuccessCreated, $this->statuses_Error2);
        $I->wait(4);
        $I->reloadPage();
        $I->wait(2);
        
        $I->comment("                                             ");
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultCoreValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LBCoreValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LLCoreValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLCoreValue);
        
        $I->comment("                                             ");
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveValue);
        
        $I->comment("---Points:---");
        $I->canSee('1', \Page\ChecklistManage::$IncludedPointsForm_DefaultCoreValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedPointsForm_LBCoreValue);
        $I->canSee('6', \Page\ChecklistManage::$IncludedPointsForm_LLCoreValue);
        $I->canSee('6', \Page\ChecklistManage::$IncludedPointsForm_LB_LLCoreValue);
        
        $I->canSee('6', \Page\ChecklistManage::$IncludedPointsForm_DefaultElectiveValue);
        $I->canSee('6', \Page\ChecklistManage::$IncludedPointsForm_LBElectiveValue);
        $I->canSee('10', \Page\ChecklistManage::$IncludedPointsForm_LLElectiveValue);
        $I->canSee('10', \Page\ChecklistManage::$IncludedPointsForm_LB_LLElectiveValue);
        $I->wait(1);
        
        $I->CheckSavedChecklistPoints($points_Default_Upd, $points_LB_Upd, $points_LL_Upd, $points_LL_LB_Upd);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_Create_Checklist3_ForTier2_CheckDefaultPointValues(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = 'Office / Retail';
        $tier               = '2';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->comment("------------------------------------------------------");
        $I->comment("---------------Checklist For Main Tests---------------");
        $I->comment("------------------------------------------------------");
        $I->wait(3);
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->wait(5);
        
        $I->comment("                                             ");
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultCoreValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_LBCoreValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_LLCoreValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLCoreValue);
        
        $I->comment("                                             ");
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveValue);
        
        $I->comment("---Points:---");
        $I->canSee('0', \Page\ChecklistManage::$IncludedPointsForm_DefaultCoreValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedPointsForm_LBCoreValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedPointsForm_LLCoreValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedPointsForm_LB_LLCoreValue);
        
        $I->canSee('0', \Page\ChecklistManage::$IncludedPointsForm_DefaultElectiveValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedPointsForm_LBElectiveValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedPointsForm_LLElectiveValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedPointsForm_LB_LLElectiveValue);
        $I->wait(1);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$PointsTab);
        $I->wait(4);
        $I->comment("-----DEFAULT TAB-----");
        $I->canSeeInField(\Page\ChecklistManage::$RequiredPointsField, '');
        $I->fillField(\Page\ChecklistManage::$RequiredPointsField, '3');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(4);
        $I->canSee("Points was not updated!");
        $I->click(".confirm");
        $I->wait(4);
        $I->canSee("You don`t have assigned measures to $this->state state.", \Page\ChecklistManage::$Error_RequiredPoints);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LBTab_DefineTotalTab);
        $I->wait(4);
        $I->comment("-----LARGE BUILDING TAB-----");
        $I->canSeeInField(\Page\ChecklistManage::$RequiredPointsField, '');
        $I->fillField(\Page\ChecklistManage::$RequiredPointsField, '3');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(4);
        $I->canSee("Points was not updated!");
        $I->click(".confirm");
        $I->wait(4);
        $I->canSee("You don`t have assigned measures to $this->state state.", \Page\ChecklistManage::$Error_RequiredPoints);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LLTab_DefineTotalTab);
        $I->wait(4);
        $I->comment("-----LARGE LANDSCAPE TAB-----");
        $I->canSeeInField(\Page\ChecklistManage::$RequiredPointsField, '');
        $I->fillField(\Page\ChecklistManage::$RequiredPointsField, '3');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(4);
        $I->canSee("Points was not updated!");
        $I->click(".confirm");
        $I->wait(4);
        $I->canSee("You don`t have assigned measures to $this->state state.", \Page\ChecklistManage::$Error_RequiredPoints);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LB_LLTab_DefineTotalTab);
        $I->wait(4);
        $I->comment("-----LARGE BUILDING+LARGE LANDSCAPE TAB-----");
        $I->canSeeInField(\Page\ChecklistManage::$RequiredPointsField, '');
        $I->fillField(\Page\ChecklistManage::$RequiredPointsField, '3');
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(4);
        $I->canSee("Points was not updated!");
        $I->click(".confirm");
        $I->wait(4);
        $I->canSee("You don`t have assigned measures to $this->state state.", \Page\ChecklistManage::$Error_RequiredPoints);
        
        $I->click(Page\ChecklistManage::$ManageMeasuresTab);
        $I->wait(4);
        $I->ManageChecklist($descs, $this->statuses, $this->extensions);
        $this->checklistUrl = $I->grabFromCurrentUrl();
        $I->comment("Url1: $this->checklistUrl");
        $u1 = explode('=', $this->checklistUrl);
        $urlEnd = $u1[1];
        $u2 = explode('&', $urlEnd);
        $this->id_checklist = $u2[0];
        $I->comment("Checklist id: $this->id_checklist");
        $I->reloadPage();
        $I->PublishChecklistStatus();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckLeftColumnAndPointsDefaultValues_OnManageChecklist_BeforeChecklistUpdate(Step\Acceptance\Checklist $I) {
        $points_Default = '';
        $points_LB      = '';
        $points_LL      = '';
        $points_LL_LB   = '';
        
        $I->amOnPage($this->checklistUrl);
        $I->wait(2);
        
        $I->comment("                                             ");
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultCoreValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LBCoreValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LLCoreValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLCoreValue);
        $I->comment("                                             ");
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveValue);
        
        $I->comment("---Points:---");
        $I->canSee('1', \Page\ChecklistManage::$IncludedPointsForm_DefaultCoreValue);
        $I->canSee('8', \Page\ChecklistManage::$IncludedPointsForm_LBCoreValue);
        $I->canSee('5', \Page\ChecklistManage::$IncludedPointsForm_LLCoreValue);
        $I->canSee('12', \Page\ChecklistManage::$IncludedPointsForm_LB_LLCoreValue);
        $I->comment("                                             ");
        $I->canSee('2', \Page\ChecklistManage::$IncludedPointsForm_DefaultElectiveValue);
        $I->canSee('10', \Page\ChecklistManage::$IncludedPointsForm_LBElectiveValue);
        $I->canSee('7', \Page\ChecklistManage::$IncludedPointsForm_LLElectiveValue);
        $I->canSee('15', \Page\ChecklistManage::$IncludedPointsForm_LB_LLElectiveValue);
        $I->wait(1);
        
        $I->CheckSavedChecklistPoints($points_Default, $points_LB, $points_LL, $points_LL_LB);
        
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckThatMoreThanCountOfElectiveMeasures_CANTBeSave_InEnabledElectiveField(AcceptanceTester $I) {
        $max_points_Default = '3';
        $max_points_LB      = '18';
        $max_points_LL      = '12';
        $max_points_LL_LB   = '27';
        
        $points_Default_input = $max_points_Default + 1;
        $points_LB_input      = $max_points_LB + 1;
        $points_LL_input      = $max_points_LL + 1;
        $points_LL_LB_input   = $max_points_LL_LB + 1;
        
        $I->amOnPage($this->checklistUrl);
        $I->wait(4);
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$PointsTab);
        $I->wait(4);
        $I->comment("-----DEFAULT TAB-----");
        $I->canSeeInField(\Page\ChecklistManage::$RequiredPointsField, '');
        $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $points_Default_input);
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(4);
        $I->canSee("Points was not updated!");
        $I->click(".confirm");
        $I->wait(4);
        $I->canSee("Total amount of complete points is greater that sum of points of all measures related to $this->state state. Maximum amount of point is $max_points_Default.", \Page\ChecklistManage::$Error_RequiredPoints);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LBTab_DefineTotalTab);
        $I->wait(4);
        $I->comment("-----LARGE BUILDING TAB-----");
        $I->canSeeInField(\Page\ChecklistManage::$RequiredPointsField, '');
        $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $points_LB_input);
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(4);
        $I->canSee("Points was not updated!");
        $I->click(".confirm");
        $I->wait(4);
        $I->canSee("Total amount of complete points is greater that sum of points of all measures related to $this->state state. Maximum amount of point is $max_points_LB.", \Page\ChecklistManage::$Error_RequiredPoints);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LLTab_DefineTotalTab);
        $I->wait(4);
        $I->comment("-----LARGE LANDSCAPE TAB-----");
        $I->canSeeInField(\Page\ChecklistManage::$RequiredPointsField, '');
        $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $points_LL_input);
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(4);
        $I->canSee("Points was not updated!");
        $I->click(".confirm");
        $I->wait(4);
        $I->canSee("Total amount of complete points is greater that sum of points of all measures related to $this->state state. Maximum amount of point is $max_points_LL.", \Page\ChecklistManage::$Error_RequiredPoints);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LB_LLTab_DefineTotalTab);
        $I->wait(4);
        $I->comment("-----LARGE BUILDING+LARGE LANDSCAPE TAB-----");
        $I->canSeeInField(\Page\ChecklistManage::$RequiredPointsField, '');
        $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $points_LL_LB_input);
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(4);
        $I->canSee("Points was not updated!");
        $I->click(".confirm");
        $I->wait(4);
        $I->canSee("Total amount of complete points is greater that sum of points of all measures related to $this->state state. Maximum amount of point is $max_points_LL_LB.", \Page\ChecklistManage::$Error_RequiredPoints);
        
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckSavingPointValues(Step\Acceptance\Checklist $I) {
        $points_Default = '3';
        $points_LB      = '10';
        $points_LL      = '0';
        $points_LL_LB   = '19';
        
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->UpdateChecklistPoints($points_Default, $points_LB, $points_LL, $points_LL_LB);
        $I->wait(4);
        $I->amOnPage($this->checklistUrl);
        $I->wait(3);
        $I->CheckSavedChecklistPoints($points_Default, $points_LB, $points_LL, $points_LL_LB);
    }
    
    //--------------------------------------------------------------------------Default Extension On Checklist Preview-------------------------------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckDefaultMeasures_Present_Default_CoreAndElective_OnChecklistPreview(AcceptanceTester $I) {
        $I->amOnPage(Page\ChecklistPreview::URL($this->id_checklist, $this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->canSee("0 Tier 2 measures completed. A minimum of 1 Tier 2 measures are required.", \Page\ChecklistPreview::$TotalMeasuresInfo_ProgressBar);
        $I->canSee("0 of 1 required measures completed", \Page\ChecklistPreview::$CoreProgressBarInfo);
        $I->cantSeeElement(\Page\ChecklistPreview::$ElectiveProgressBarInfo);
        $I->cantSeeElement(\Page\ChecklistPreview::$InfoAboutCountToCompleteElectiveMeasures);
        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure1Desc));
        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure2Desc));
        $I->canSee("$this->pointsMeas1 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure1Desc));
        $I->canSee("$this->pointsMeas2 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure2Desc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckDefaultMeasures_Absent_LB_LL_LBAndLL_NotSet_OnChecklistPreview(AcceptanceTester $I) {
        $I->amOnPage(Page\ChecklistPreview::URL($this->id_checklist, $this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure3Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure4Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure5Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure6Desc));
        $I->cantSeeElement(\Page\ChecklistPreview::$LeftMenu_SolidWasteGroupButton);
    }
    
    //--------------------------------------------------------------------------Default Extension On Print Checklist-------------------------------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckDefaultMeasures_Present_Default_CoreAndElective_OnPrintChecklist(AcceptanceTester $I) {
        $I->amOnPage(Page\ChecklistPrint::URl($this->id_checklist, $this->bus4_busSquire_Default, $this->bus4_landSquire_Default));
        $I->wait(3);
        $I->pressKey('#print-preview .cancel', \WebDriverKeys::ESCAPE);
        $I->wait(3);
        $I->canSee("GreenBiz Tracker", \Page\ChecklistPrint::$Title);
        $I->canSee("Office / Retail - Tier 2", \Page\ChecklistPrint::$SectorAndTierTitle);
        $I->canSeeElement(\Page\ChecklistPrint::$EnergyGroupTitle);
        $I->canSee('Core measures', \Page\ChecklistPrint::CoreMeasuresTitle('Energy'));
        $I->canSeeElement(\Page\ChecklistPrint::Core_MeasureDescription_ByDesc('Energy', $this->measure1Desc));
        $I->canSeeElement(\Page\ChecklistPrint::AnswersCheckboxImage_ByMeasureDesc($this->measure1Desc)."[@src=".\Page\ChecklistPrint::AnswersImage_NotChecked."]");
        $I->canSeeElement(\Page\ChecklistPrint::HelpCheckboxImage_ByMeasureDesc($this->measure1Desc)."[@src=".\Page\ChecklistPrint::HelpImage_NotChecked."]");
        $I->canSee('question2', \Page\ChecklistPrint::Submeasure_ByMeasureDesc($this->measure1Desc, '1'));
        $I->canSee('question1', \Page\ChecklistPrint::Submeasure_ByMeasureDesc($this->measure1Desc, '2'));
        $I->canSeeElement(\Page\ChecklistPrint::SubmeasureField_ByMeasureDesc($this->measure1Desc, '1'));
        $I->canSeeElement(\Page\ChecklistPrint::SubmeasureField_ByMeasureDesc($this->measure1Desc, '2'));
        $I->canSee('Elective measures', \Page\ChecklistPrint::ElectiveMeasuresTitle('Energy'));
        $I->canSeeElement(\Page\ChecklistPrint::Elective_MeasureDescription_ByDesc('Energy', $this->measure2Desc));
        $I->canSeeElement(\Page\ChecklistPrint::AnswersCheckboxImage_ByMeasureDesc($this->measure2Desc)."[@src=".\Page\ChecklistPrint::AnswersImage_NotChecked."]");
        $I->canSeeElement(\Page\ChecklistPrint::HelpCheckboxImage_ByMeasureDesc($this->measure2Desc)."[@src=".\Page\ChecklistPrint::HelpImage_NotChecked."]");
        $I->canSee('q1', \Page\ChecklistPrint::Submeasure_ByMeasureDesc($this->measure2Desc, '1'));
        $I->canSeeElement(\Page\ChecklistPrint::SubmeasureField_ByMeasureDesc($this->measure2Desc, '1'));
        $I->canSeeElement(\Page\ChecklistPrint::$OtherGreenThingsField);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckDefaultMeasures_Absent_LB_LL_LBAndLL_NotSet_OnPrintChecklist(AcceptanceTester $I) {
        $I->amOnPage(Page\ChecklistPrint::URl($this->id_checklist, $this->bus4_busSquire_Default, $this->bus4_landSquire_Default));
        $I->wait(3);
        $I->pressKey('#print-preview .cancel', \Facebook\WebDriver\WebDriverKeys::ESCAPE);
        $I->wait(3);
        $I->cantSeeElement(\Page\ChecklistPrint::MeasureDescription_ByDesc($this->measure3Desc));
        $I->cantSeeElement(\Page\ChecklistPrint::MeasureDescription_ByDesc($this->measure4Desc));
        $I->cantSeeElement(\Page\ChecklistPrint::MeasureDescription_ByDesc($this->measure5Desc));
        $I->cantSeeElement(\Page\ChecklistPrint::MeasureDescription_ByDesc($this->measure6Desc));
        $I->cantSeeElement(\Page\ChecklistPrint::$SolidWasteGroupTitle);
    }
    
    //--------------------------------------------------------------------------LB Extension On Checklist Preview------------------------------------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
//    public function CheckLBMeasures_Present_Default_LB_LbAndLL_CoreAndElective_OnChecklistPreview(AcceptanceTester $I) {
//        $I->amOnPage(Page\ChecklistPreview::URL($this->id_checklist, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
//        $I->waitForElement(\Page\ChecklistPreview::$ExtensionSelect);
//        $I->selectOption(\Page\ChecklistPreview::$ExtensionSelect, "Large Building");
//        $I->wait(3);
//        $I->canSee("0 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\ChecklistPreview::$TotalMeasuresInfo_ProgressBar);
//        $I->canSee("0 of 1 required measures completed", \Page\ChecklistPreview::$CoreProgressBarInfo);
//        $I->cantSeeElement(\Page\ChecklistPreview::$ElectiveProgressBarInfo);
//        $I->cantSeeElement(\Page\ChecklistPreview::$InfoAboutCountToCompleteElectiveMeasures);
//        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure1Desc));
//        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure2Desc));
//        $I->canSee("$this->pointsMeas1 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure1Desc));
//        $I->canSee("$this->pointsMeas2 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure2Desc));
//        $I->wait(1);
//        $I->click(\Page\ChecklistPreview::$LeftMenu_SolidWasteGroupButton);
//        $I->wait(2);
//        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_SolidWaste));
//        $I->wait(2);
//        $I->canSee("0 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\ChecklistPreview::$TotalMeasuresInfo_ProgressBar);
//        $I->canSee("0 of 1 required measures completed", \Page\ChecklistPreview::$CoreProgressBarInfo);
//        $I->cantSeeElement(\Page\ChecklistPreview::$ElectiveProgressBarInfo);
//        $I->cantSeeElement(\Page\ChecklistPreview::$InfoAboutCountToCompleteElectiveMeasures);
//        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure7Desc));
//        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure8Desc));
//        $I->canSee("$this->pointsMeas7 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure7Desc));
//        $I->canSee("$this->pointsMeas8 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure8Desc));
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function CheckLBMeasures_Absent_LL_NotSet_OnChecklistPreview(AcceptanceTester $I) {
//        $I->amOnPage(Page\ChecklistPreview::URL($this->id_checklist, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
//        $I->waitForElement(\Page\ChecklistPreview::$ExtensionSelect);
//        $I->selectOption(\Page\ChecklistPreview::$ExtensionSelect, "Large Building");
//        $I->wait(3);
//        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure3Desc));
//        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure4Desc));
//        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure5Desc));
//        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure6Desc));
//        $I->wait(1);
//        $I->amOnPage(Page\ChecklistPreview::URL($this->id_checklist, $this->id_audSubgroup1_SolidWaste));
//        $I->wait(3);
//        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure9Desc));
////        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure12Desc));
//    }
//    
//    //--------------------------------------------------------------------------LL Extension On Checklist Preview------------------------------------------------------------
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function CheckLLMeasures_Present_Default_LL_LbAndLL_CoreAndElective_OnChecklistPreview(AcceptanceTester $I) {
//        $I->amOnPage(Page\ChecklistPreview::URL($this->id_checklist, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
//        $I->waitForElement(\Page\ChecklistPreview::$ExtensionSelect);
//        $I->selectOption(\Page\ChecklistPreview::$ExtensionSelect, "Large Landscape");
//        $I->wait(3);
//        $I->canSee("0 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\ChecklistPreview::$TotalMeasuresInfo_ProgressBar);
//        $I->canSee("0 of 2 required measures completed", \Page\ChecklistPreview::$CoreProgressBarInfo);
//        $I->cantSeeElement(\Page\ChecklistPreview::$ElectiveProgressBarInfo);
//        $I->cantSeeElement(\Page\ChecklistPreview::$InfoAboutCountToCompleteElectiveMeasures);
//        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure1Desc));
//        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure2Desc));
//        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure4Desc));
//        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure5Desc));
//        $I->canSee("$this->pointsMeas1 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure1Desc));
//        $I->canSee("$this->pointsMeas2 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure2Desc));
//        $I->canSee("$this->pointsMeas4 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure4Desc));
//        $I->canSee("$this->pointsMeas5 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure5Desc));
//        $I->wait(1);
//        $I->cantSeeElement(\Page\ChecklistPreview::$LeftMenu_SolidWasteGroupButton);
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function CheckLLMeasures_Absent_LB_NotSet_OnChecklistPreview(AcceptanceTester $I) {
//        $I->amOnPage(Page\ChecklistPreview::URL($this->id_checklist, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
//        $I->waitForElement(\Page\ChecklistPreview::$ExtensionSelect);
//        $I->selectOption(\Page\ChecklistPreview::$ExtensionSelect, "Large Landscape");
//        $I->wait(3);
//        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure3Desc));
//        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure6Desc));
//    }
//    
//    //--------------------------------------------------------------------------LB+LL Extension On Checklist Preview------------------------------------------------------------
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function CheckLBAndLLMeasures_Present_AllCoreAndElective_OnChecklistPreview(AcceptanceTester $I) {
//        $I->amOnPage(Page\ChecklistPreview::URL($this->id_checklist, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
//        $I->waitForElement(\Page\ChecklistPreview::$ExtensionSelect);
//        $I->selectOption(\Page\ChecklistPreview::$ExtensionSelect, "Lg Building + Lg Landscape");
//        $I->wait(2);
//        $I->canSee("0 Tier 2 measures completed. A minimum of 3 Tier 2 measures are required.", \Page\ChecklistPreview::$TotalMeasuresInfo_ProgressBar);
//        $I->canSee("0 of 2 required measures completed", \Page\ChecklistPreview::$CoreProgressBarInfo);
//        $I->cantSeeElement(\Page\ChecklistPreview::$ElectiveProgressBarInfo);
//        $I->cantSeeElement(\Page\ChecklistPreview::$InfoAboutCountToCompleteElectiveMeasures);
//        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure1Desc));
//        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure2Desc));
//        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure4Desc));
//        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure5Desc));
//        $I->canSee("$this->pointsMeas1 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure1Desc));
//        $I->canSee("$this->pointsMeas2 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure2Desc));
//        $I->canSee("$this->pointsMeas4 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure4Desc));
//        $I->canSee("$this->pointsMeas5 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure5Desc));
//        $I->wait(1);
//        $I->click(\Page\ChecklistPreview::$LeftMenu_SolidWasteGroupButton);
//        $I->wait(2);
//        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_SolidWaste));
//        $I->wait(2);
//        $I->canSee("0 Tier 2 measures completed. A minimum of 3 Tier 2 measures are required.", \Page\ChecklistPreview::$TotalMeasuresInfo_ProgressBar);
//        $I->canSee("0 of 1 required measures completed", \Page\ChecklistPreview::$CoreProgressBarInfo);
//        $I->cantSeeElement(\Page\ChecklistPreview::$ElectiveProgressBarInfo);
//        $I->cantSeeElement(\Page\ChecklistPreview::$InfoAboutCountToCompleteElectiveMeasures);
//        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure7Desc));
//        $I->canSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure8Desc));
//        $I->canSee("$this->pointsMeas7 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure7Desc));
//        $I->canSee("$this->pointsMeas8 Points", \Page\ChecklistPreview::MeasurePoints_ByDesc($this->measure8Desc));
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function CheckLBAndLLMeasures_Absent_AllNotSet_OnChecklistPreview(AcceptanceTester $I) {
//        $I->amOnPage(Page\ChecklistPreview::URL($this->id_checklist, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
//        $I->waitForElement(\Page\ChecklistPreview::$ExtensionSelect);
//        $I->selectOption(\Page\ChecklistPreview::$ExtensionSelect, "Lg Building + Lg Landscape");
//        $I->wait(2);
//        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure3Desc));
//        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure6Desc));
//        $I->wait(1);
//        $I->click(\Page\ChecklistPreview::$LeftMenu_SolidWasteGroupButton);
//        $I->wait(2);
//        $I->click(\Page\ChecklistPreview::LeftMenu_Subgroup_ByName($this->audSubgroup1_SolidWaste));
//        $I->wait(2);
//        $I->cantSeeElement(\Page\ChecklistPreview::MeasureDescription_ByDesc($this->measure9Desc));
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function Help_LogOut(AcceptanceTester $I) {
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(1);
//        $I->Logout($I);
//    }
//    
//    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//    //--------------------------------------------------------------------------Business registration for check N/A answers---------------------------------------------------------
//    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function BusinessRegister_Check_NA_answers(Step\Acceptance\Business $I)
//    {
//        $firstName        = $I->GenerateNameOf("firnam");
//        $lastName         = $I->GenerateNameOf("lasnam");
//        $phoneNumber      = $I->GeneratePhoneNumber();
//        $email            = $I->GenerateEmail();
//        $password         = $confirmPassword = 'Qq!1111111';
//        $busName          = $this->business_NAanswers = $I->GenerateNameOf("bus_NA");
//        $busPhone         = $I->GeneratePhoneNumber();
//        $address          = $I->GenerateNameOf("addr");
//        $zip              = $this->zip1;
//        $city             = $this->city1;
//        $website          = 'fgfh.fh';
//        $busType          = 'Office / Retail';
//        $employees        = '455';
//        $busFootage       = $this->bus_busSquire_NAanswers;
//        $landscapeFootage = $this->bus_landSquire_NAanswers;
//        
//        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
//                $employees, $busFootage, $landscapeFootage);
//        $I->wait(9);
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function NA_CompleteMeasure1_Yes_Answer(AcceptanceTester $I) {
//        $measDesc = $this->measure1Desc;
//        $value1   = '10';
//        $value2   = '20';
//                
//        $I->wait(1);
//        $I->comment("Complete Measure1 for NA business: $this->business_NAanswers");
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(2);
//        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
//        $I->wait(2);
//        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
//        $I->wait(1);
//        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
//        $I->wait(1);
//        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
//        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
//        $I->wait(1);
//        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(1);
//        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(3);
//        $I->canSee("1 Tier 2 measures completed. A minimum of 3 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 33%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 50%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 34%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 50%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSee("1 of 2 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
//        $I->cantSeeElement(\Page\RegistrationStarted::$ElectiveProgressBarInfo);
////        $I->cantSeeElement(\Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
//        $I->canSee("1 of 3 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
//        $I->canSee("1 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
//        $I->canSee("Total Points Earned: 1", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
//        $I->canSee("1", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function NA_CompleteMeasure8_NA_Answer(AcceptanceTester $I) {
//        $measDesc = $this->measure8Desc;
//                
//        $I->wait(1);
//        $I->comment("Complete Measure8 for NA business: $this->business_NAanswers");
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
//        $I->wait(2);
//        $I->makeElementVisible(["[data-measure-id=$this->idMeasure8]"], $style = 'visibility');
//        $I->wait(2);
//        $I->scrollTo("[data-measure-id='$this->idMeasure8']");
//        $I->wait(1);
//        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'na');
//        $I->wait(1);
//        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(1);
//        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(3);
//        $readonly = $I->grabAttributeFrom(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), 'readonly');
//        $I->assertEquals('true', $readonly);
//        $I->canSee("1 Tier 2 measures completed. A minimum of 3 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 33%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 0%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 34%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 50%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSee("0 of 1 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
//        $I->cantSeeElement(\Page\RegistrationStarted::$ElectiveProgressBarInfo);
////        $I->cantSeeElement(\Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
//        $I->canSee("1 of 3 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
//        $I->canSee("1 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
//        $I->canSee("Total Points Earned: 1", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
//        $I->canSee("1", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function NA_CompleteMeasure7_NA_Answer(AcceptanceTester $I) {
//        $measDesc = $this->measure7Desc;
//                
//        $I->wait(1);
//        $I->comment("Complete Measure7 for NA business: $this->business_NAanswers");
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
//        $I->wait(2);
//        $I->makeElementVisible(["[data-measure-id=$this->idMeasure7]"], $style = 'visibility');
//        $I->wait(2);
//        $I->scrollTo("[data-measure-id='$this->idMeasure7']");
//        $I->wait(1);
//        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'na');
//        $I->wait(1);
//        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(1);
//        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(3);
//        $readonly = $I->grabAttributeFrom(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), 'readonly');
//        $I->assertEquals('true', $readonly);
//        $readonly = $I->grabAttributeFrom(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'), 'readonly');
//        $I->assertEquals('true', $readonly);
//        $I->canSee("2 Tier 2 measures completed. A minimum of 3 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 66%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 100%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 67%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 50%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 100%;']);
//        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$CoreProgressBarInfo);
//        $I->cantSeeElement(\Page\RegistrationStarted::$ElectiveProgressBarInfo);
////        $I->cantSeeElement(\Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
//        $I->canSee("2 of 3 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
//        $I->canSee("1 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
//        $I->canSee("Total Points Earned: 1", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
//        $I->canSee("1", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function NA_CompleteMeasure5_Yes_Answer(AcceptanceTester $I) {
//        $measDesc = $this->measure5Desc;
//        $value1   = '11';
//                
//        $I->wait(1);
//        $I->comment("Complete Measure5 for NA business: $this->business_NAanswers");
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(2);
//        $I->makeElementVisible(["[data-measure-id=$this->idMeasure5]"], $style = 'visibility');
//        $I->wait(2);
//        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
//        $I->wait(1);
//        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
//        $I->wait(1);
//        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
//        $I->wait(1);
//        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(1);
//        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(3);
//        $I->canSee("2 Tier 2 measures completed. A minimum of 3 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 66%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 50%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 67%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 50%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 100%;']);
//        $I->canSee("1 of 2 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
//        $I->cantSeeElement(\Page\RegistrationStarted::$ElectiveProgressBarInfo);
////        $I->cantSeeElement(\Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
//        $I->canSee("2 of 3 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
//        $I->canSee("6 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
//        $I->canSee("Total Points Earned: 6", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
//        $I->canSee("6", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function NA_CompleteMeasure4_NA_Answer(AcceptanceTester $I) {
//        $measDesc = $this->measure4Desc;
//                
//        $I->wait(1);
//        $I->comment("Complete Measure4 for NA business: $this->business_NAanswers");
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(2);
//        $I->makeElementVisible(["[data-measure-id=$this->idMeasure4]"], $style = 'visibility');
//        $I->wait(2);
//        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
//        $I->wait(1);
//        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'na');
//        $I->wait(1);
//        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(1);
//        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(3);
//        $readonly = $I->grabAttributeFrom(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), 'readonly');
//        $I->assertEquals('true', $readonly);
//        $I->canSee("3 Tier 2 measures completed. A minimum of 3 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 100%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 100%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 100%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 100%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 100%;']);
//        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$CoreProgressBarInfo);
//        $I->cantSeeElement(\Page\RegistrationStarted::$ElectiveProgressBarInfo);
////        $I->cantSeeElement(\Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
//        $I->canSee("3 of 3 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
//        $I->canSee("6 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
//        $I->canSee("Total Points Earned: 6", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
//        $I->canSee("6", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function CheckOnReviewPage_AfterComplitingMeasures_NA(AcceptanceTester $I) {
//        $I->wait(1);
//        $I->comment("After Compliting Measures - Check on Review Page - NA LB&LL");
//        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist));
//        $I->wait(2);
//        $I->canSee("3 Tier 2 measures completed. A minimum of 3 Tier 2 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
//        $I->canSee("6 Tier 2 points earned. A minimum of 19 Tier 2 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
//        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 100%;']);
//        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 32%;']);
//        $I->canSee("3 of 3 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
//        $I->canSee("6 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
//        $I->canSee("2 /2", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
//        $I->canSee("6", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
//        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
//        $I->canSee("1 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
//        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
//        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
//        $I->canSee("6", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function Help_LogOutFromBusinessNA(AcceptanceTester $I){
//        $I->LogIn_TRUEorFALSE($I);
//        $I->Logout($I);
//        $I->wait(1);
//    }
//    
//    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//    //--------------------------------------------------------------------------LB business registration----------------------------------------------------------------------------
//    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function LargeBusiness_Business1Registration(Step\Acceptance\Business $I)
//    {
//        $firstName        = $I->GenerateNameOf("firnam");
//        $lastName         = $I->GenerateNameOf("lasnam");
//        $phoneNumber      = $I->GeneratePhoneNumber();
//        $email            = $I->GenerateEmail();
//        $password         = $confirmPassword = 'Qq!1111111';
//        $busName          = $this->business1_LB = $I->GenerateNameOf("bus1_LB");
//        $busPhone         = $I->GeneratePhoneNumber();
//        $address          = $I->GenerateNameOf("addr");
//        $zip              = $this->zip1;
//        $city             = $this->city1;
//        $website          = 'fgfh.fh';
//        $busType          = 'Office / Retail';
//        $employees        = '455';
//        $busFootage       = $this->bus1_busSquire_LB;
//        $landscapeFootage = $this->bus1_landSquire_LB;
//        
//        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
//                $employees, $busFootage, $landscapeFootage);
//        $I->wait(9);
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function CheckMeasuresPresent_LB_LBAndLL_Default_CoreAndElective(AcceptanceTester $I) {
//        $I->wait(1);
//        $I->comment("Check that LB, LB&LL, Default measures with core&elective status are present in business checklist");
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(2);
//        $I->canSee("0 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 0%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSee("0 of 1 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
//        $I->cantSeeElement(\Page\RegistrationStarted::$ElectiveProgressBarInfo);
////        $I->cantSeeElement(\Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
//        $I->canSee("0 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
//        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure1Desc));
//        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure2Desc));
//        $I->canSee("$this->pointsMeas1 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure1Desc));
//        $I->canSee("$this->pointsMeas2 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure2Desc));
//        
//        
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
//        $I->wait(2);
//        $I->canSee("0 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 0%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSee("0 of 1 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
//        $I->cantSeeElement(\Page\RegistrationStarted::$ElectiveProgressBarInfo);
////        $I->cantSeeElement(\Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
//        $I->canSee("0 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
//        $I->canSee("0 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
//        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure7Desc));
//        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure8Desc));
//        $I->canSee("$this->pointsMeas7 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure7Desc));
//        $I->canSee("$this->pointsMeas8 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure8Desc));
//        
//        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
//        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_SolidWasteGroupButton);
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function CheckMeasuresAbsent_LL_NotSet(AcceptanceTester $I) {
//        $I->wait(1);
//        $I->comment("Check that LL measures and measures with not set status are absent in business checklist");
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(2);
//        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure3Desc));
//        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure4Desc));
//        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure5Desc));
//        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure6Desc));
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
//        $I->wait(2);
//        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure9Desc));
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function CheckOnReviewPage_LB(AcceptanceTester $I) {
//        $I->wait(1);
//        $I->comment("Check on Review Page - LB");
//        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist));
//        $I->wait(2);
//        $I->canSee("0 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
//        $I->canSee("0 Tier 2 points earned. A minimum of 10 Tier 2 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
//        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSee("0 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
//        $I->canSee("0 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
//        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
//        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
//        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::NotStartedStatus);
//        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
//        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
//        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::NotStartedStatus);
//        $I->canSee("0", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function LB_CompleteMeasure1(AcceptanceTester $I) {
//        $measDesc = $this->measure1Desc;
//        $value1   = '10';
//        $value2   = '20';
//                
//        $I->wait(1);
//        $I->comment("Complete Measure1 for LB business: $this->business1_LB");
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(2);
//        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
//        $I->wait(2);
//        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
//        $I->wait(1);
//        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
//        $I->wait(1);
//        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
//        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
//        $I->wait(1);
//        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(1);
//        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(3);
//        $I->canSee("1 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 50%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 100%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 50%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 100%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$CoreProgressBarInfo);
//        $I->cantSeeElement(\Page\RegistrationStarted::$ElectiveProgressBarInfo);
////        $I->cantSeeElement(\Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
//        $I->canSee("1 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
//        $I->canSee("1 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
//        $I->canSee("Total Points Earned: 1", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
//        $I->canSee("1", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function LB_CompleteMeasure8(AcceptanceTester $I) {
//        $measDesc = $this->measure8Desc;
//        $value1   = '88';
//                
//        $I->wait(1);
//        $I->comment("Complete Measure8 for LB business: $this->business1_LB");
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
//        $I->wait(2);
//        $I->makeElementVisible(["[data-measure-id=$this->idMeasure8]"], $style = 'visibility');
//        $I->wait(2);
//        $I->scrollTo("[data-measure-id='$this->idMeasure8']");
//        $I->wait(1);
//        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
//        $I->wait(1);
//        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
//        $I->wait(1);
//        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(1);
//        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(3);
//        $I->canSee("1 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 50%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 0%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 50%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 100%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSee("0 of 1 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
//        $I->cantSeeElement(\Page\RegistrationStarted::$ElectiveProgressBarInfo);
////        $I->cantSeeElement(\Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
//        $I->canSee("1 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
//        $I->canSee("9 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
//        $I->canSee("Total Points Earned: 9", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
//        $I->canSee("9", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function CheckOnReviewPage_AfterComplitingMeasures_LB(AcceptanceTester $I) {
//        $I->wait(1);
//        $I->comment("After Compliting Measures - Check on Review Page - LB");
//        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist));
//        $I->wait(2);
//        $I->canSee("1 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
//        $I->canSee("9 Tier 2 points earned. A minimum of 10 Tier 2 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
//        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 50%;']);
//        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 90%;']);
//        $I->canSee("1 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
//        $I->canSee("9 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
//        $I->canSee("1 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
//        $I->canSee("1", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
//        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
//        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
//        $I->canSee("8", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
//        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::InProgressStatus);
//        $I->canSee("9", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function Help_LogOutFromBusiness1(AcceptanceTester $I){
//        $I->LogIn_TRUEorFALSE($I);
//        $I->Logout($I);
//        $I->wait(1);
//    }
//    
//    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//    //--------------------------------------------------------------------------LL business registration----------------------------------------------------------------------------
//    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function LargeLandscape_Business2Registration(Step\Acceptance\Business $I)
//    {
//        $firstName        = $I->GenerateNameOf("firnam");
//        $lastName         = $I->GenerateNameOf("lasnam");
//        $phoneNumber      = $I->GeneratePhoneNumber();
//        $email            = $I->GenerateEmail();
//        $password         = $confirmPassword = 'Qq!1111111';
//        $busName          = $this->business2_LL = $I->GenerateNameOf("bus2_LL");
//        $busPhone         = $I->GeneratePhoneNumber();
//        $address          = $I->GenerateNameOf("addr");;
//        $zip              = $this->zip1;
//        $city             = $this->city1;
//        $website          = 'fgfh.fh';
//        $busType          = 'Office / Retail';
//        $employees        = '455';
//        $busFootage       = $this->bus2_busSquire_LL;
//        $landscapeFootage = $this->bus2_landSquire_LL;
//        
//        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
//                $employees, $busFootage, $landscapeFootage);
//        $I->wait(9);
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function CheckMeasuresPresent_LL_LBAndLL_Default_CoreAndElective(AcceptanceTester $I) {
//        $I->wait(1);
//        $I->comment("Check that LL, LB&LL, Default measures with core&elective status are present in business checklist");
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(2);
//        $I->canSee("0 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 0%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSee("0 of 2 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
//        $I->cantSeeElement(\Page\RegistrationStarted::$ElectiveProgressBarInfo);
////        $I->cantSeeElement(\Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
//        $I->canSee("0 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
//        $I->canSee("0 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
//        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure1Desc));
//        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure2Desc));
//        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure4Desc));
//        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure5Desc));
//        $I->canSee("$this->pointsMeas1 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure1Desc));
//        $I->canSee("$this->pointsMeas2 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure2Desc));
//        $I->canSee("$this->pointsMeas4 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure4Desc));
//        $I->canSee("$this->pointsMeas5 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure5Desc));
//        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
//        $I->cantSeeElement(\Page\ChecklistPreview::$LeftMenu_SolidWasteGroupButton);
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function CheckMeasuresAbsent_LB_NotSet(AcceptanceTester $I) {
//        $I->wait(1);
//        $I->comment("Check that LB measures and measures with not set status are absent in business checklist");
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(2);
//        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure3Desc));
//        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure6Desc));
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function CheckOnReviewPage_LL(AcceptanceTester $I) {
//        $I->wait(1);
//        $I->comment("Check on Review Page - LL");
//        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist));
//        $I->wait(2);
//        $I->canSee("0 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
//        $I->canSee("0 Tier 2 points earned. A minimum of 0 Tier 2 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
//        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 100%;']);
//        $I->canSee("0 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
//        $I->canSee("0 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
//        $I->canSee("0 /2", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
//        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
//        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::NotStartedStatus);
//        $I->canSee("0", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
//        $I->cantSeeElement(Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function LL_CompleteMeasure1(AcceptanceTester $I) {
//        $measDesc = $this->measure1Desc;
//        $value1   = '34';
//        $value2   = '22';
//                
//        $I->wait(1);
//        $I->comment("Complete Measure1 for LL business: $this->business2_LL");
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(2);
//        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
//        $I->wait(2);
//        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
//        $I->wait(1);
//        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
//        $I->wait(1);
//        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
//        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
//        $I->wait(1);
//        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(1);
//        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(3);
//        $I->canSee("1 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 50%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 50%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 50%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 50%;']);
//        $I->canSee("1 of 2 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
//        $I->cantSeeElement(\Page\RegistrationStarted::$ElectiveProgressBarInfo);
////        $I->cantSeeElement(\Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
//        $I->canSee("1 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
//        $I->canSee("1 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
//        $I->canSee("Total Points Earned: 1", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
//        $I->canSee("1", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function LL_CompleteMeasure2(AcceptanceTester $I) {
//        $measDesc = $this->measure2Desc;
//        $value1   = '5';
//                
//        $I->wait(1);
//        $I->comment("Complete Measure8 for LL business: $this->business2_LL");
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(2);
//        $I->makeElementVisible(["[data-measure-id=$this->idMeasure2]"], $style = 'visibility');
//        $I->wait(2);
//        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
//        $I->wait(1);
//        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
//        $I->wait(1);
//        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
//        $I->wait(1);
//        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(1);
//        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(3);
//        $I->canSee("1 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 50%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 50%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 50%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 50%;']);
//        $I->canSee("1 of 2 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
//        $I->cantSeeElement(\Page\RegistrationStarted::$ElectiveProgressBarInfo);
////        $I->cantSeeElement(\Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
//        $I->canSee("1 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
//        $I->canSee("3 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
//        $I->canSee("Total Points Earned: 3", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
//        $I->canSee("3", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function CheckOnReviewPage_AfterComplitingMeasures_LL(AcceptanceTester $I) {
//        $I->wait(1);
//        $I->comment("After Compliting Measures - Check on Review Page - LL");
//        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist));
//        $I->wait(2);
//        $I->canSee("1 Tier 2 measures completed. A minimum of 2 Tier 2 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
//        $I->canSee("3 Tier 2 points earned. A minimum of 0 Tier 2 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
//        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 50%;']);
//        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 100%;']);
//        $I->canSee("1 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
//        $I->canSee("3 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
//        $I->canSee("1 /2", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
//        $I->canSee("3", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
//        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::InProgressStatus);
//        $I->canSee("3", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
//        $I->cantSeeElement(Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function Help_LogOutFromBusiness2(AcceptanceTester $I){
//        $I->LogIn_TRUEorFALSE($I);
//        $I->Logout($I);
//        $I->wait(1);
//    }
//    
//    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//    //--------------------------------------------------------------------------LB&LL business registration-------------------------------------------------------------------------
//    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function LargeBusinessAndLargeLandscape_BusinessRegistration(Step\Acceptance\Business $I)
//    {
//        $firstName        = $I->GenerateNameOf("firnam");
//        $lastName         = $I->GenerateNameOf("lasnam");
//        $phoneNumber      = $I->GeneratePhoneNumber();
//        $email            = $I->GenerateEmail();
//        $password         = $confirmPassword = 'Qq!1111111';
//        $busName          = $this->business3_LB_LL = $I->GenerateNameOf("bus3_LB_LL");
//        $busPhone         = $I->GeneratePhoneNumber();
//        $address          = $I->GenerateNameOf("addr");;
//        $zip              = $this->zip1;
//        $city             = $this->city1;
//        $website          = 'fgfh.fh';
//        $busType          = 'Office / Retail';
//        $employees        = '455';
//        $busFootage       = $this->bus3_busSquire_LB_LL;
//        $landscapeFootage = $this->bus3_landSquire_LB_LL;
//        
//        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
//                $employees, $busFootage, $landscapeFootage);
//        $I->wait(9);
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function CheckMeasuresPresent_LL_LB_LBAndLL_Default_CoreAndElective(AcceptanceTester $I) {
//        $I->wait(1);
//        $I->comment("Check that LL, LB, LB&LL, Default measures with core&elective status are present in business checklist");
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(2);
//        $I->canSee("0 Tier 2 measures completed. A minimum of 3 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 0%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSee("0 of 2 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
//        $I->cantSeeElement(\Page\RegistrationStarted::$ElectiveProgressBarInfo);
////        $I->cantSeeElement(\Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
//        $I->canSee("0 of 3 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
//        $I->canSee("0 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
//        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure1Desc));
//        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure2Desc));
//        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure4Desc));
//        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure5Desc));
//        $I->canSee("$this->pointsMeas1 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure1Desc));
//        $I->canSee("$this->pointsMeas2 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure2Desc));
//        $I->canSee("$this->pointsMeas4 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure4Desc));
//        $I->canSee("$this->pointsMeas5 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure5Desc));
//        
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
//        $I->wait(2);
//        $I->canSee("0 Tier 2 measures completed. A minimum of 3 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 0%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSee("0 of 1 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
//        $I->cantSeeElement(\Page\RegistrationStarted::$ElectiveProgressBarInfo);
////        $I->cantSeeElement(\Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
//        $I->canSee("0 of 3 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
//        $I->canSee("0 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
//        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure7Desc));
//        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure8Desc));
//        $I->canSee("$this->pointsMeas7 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure7Desc));
//        $I->canSee("$this->pointsMeas8 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure8Desc));
//        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
//        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_SolidWasteGroupButton);
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function CheckMeasuresAbsent_NotSet(AcceptanceTester $I) {
//        $I->wait(1);
//        $I->comment("Check that measures with not set status are absent in business checklist");
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(2);
//        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure3Desc));
//        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure6Desc));
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
//        $I->wait(2);
//        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure9Desc));
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function CheckOnReviewPage_LB_LL(AcceptanceTester $I) {
//        $I->wait(1);
//        $I->comment("Check on Review Page - LB&LL");
//        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist));
//        $I->wait(2);
//        $I->canSee("0 Tier 2 measures completed. A minimum of 3 Tier 2 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
//        $I->canSee("0 Tier 2 points earned. A minimum of 19 Tier 2 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
//        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSee("0 of 3 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
//        $I->canSee("0 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
//        $I->canSee("0 /2", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
//        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
//        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::NotStartedStatus);
//        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
//        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
//        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::NotStartedStatus);
//        $I->canSee("0", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function LB_LL_CompleteMeasure1(AcceptanceTester $I) {
//        $measDesc = $this->measure1Desc;
//        $value1   = '4';
//        $value2   = '2';
//                
//        $I->wait(1);
//        $I->comment("Complete Measure1 for LB&LL business: $this->business3_LB_LL");
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(2);
//        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
//        $I->wait(2);
//        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
//        $I->wait(1);
//        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
//        $I->wait(1);
//        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
//        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
//        $I->wait(1);
//        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(1);
//        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(3);
//        $I->canSee("1 Tier 2 measures completed. A minimum of 3 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 33%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 50%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 34%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 50%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSee("1 of 2 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
//        $I->cantSeeElement(\Page\RegistrationStarted::$ElectiveProgressBarInfo);
////        $I->cantSeeElement(\Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
//        $I->canSee("1 of 3 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
//        $I->canSee("1 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
//        $I->canSee("Total Points Earned: 1", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
//        $I->canSee("1", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function LB_LL_CompleteMeasure2(AcceptanceTester $I) {
//        $measDesc = $this->measure2Desc;
//        $value1   = '77';
//                
//        $I->wait(1);
//        $I->comment("Complete Measure8 for LB&LL business: $this->business3_LB_LL");
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(2);
//        $I->makeElementVisible(["[data-measure-id=$this->idMeasure2]"], $style = 'visibility');
//        $I->wait(2);
//        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
//        $I->wait(1);
//        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
//        $I->wait(1);
//        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
//        $I->wait(1);
//        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(1);
//        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(3);
//        $I->canSee("1 Tier 2 measures completed. A minimum of 3 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 33%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 50%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 34%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 50%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSee("1 of 2 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
//        $I->cantSeeElement(\Page\RegistrationStarted::$ElectiveProgressBarInfo);
////        $I->cantSeeElement(\Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
//        $I->canSee("1 of 3 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
//        $I->canSee("3 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
//        $I->canSee("Total Points Earned: 3", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
//        $I->canSee("3", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function CheckOnReviewPage_AfterComplitingMeasures_LB_LL(AcceptanceTester $I) {
//        $I->wait(1);
//        $I->comment("After Compliting Measures - Check on Review Page - LB&LL");
//        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist));
//        $I->wait(2);
//        $I->canSee("1 Tier 2 measures completed. A minimum of 3 Tier 2 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
//        $I->canSee("3 Tier 2 points earned. A minimum of 19 Tier 2 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
//        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 33%;']);
//        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 16%;']);
//        $I->canSee("1 of 3 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
//        $I->canSee("3 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
//        $I->canSee("1 /2", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
//        $I->canSee("3", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
//        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::InProgressStatus);
//        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
//        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
//        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::NotStartedStatus);
//        $I->canSee("3", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function Help_LogOutFromBusiness3(AcceptanceTester $I){
//        $I->LogIn_TRUEorFALSE($I);
//        $I->Logout($I);
//        $I->wait(1);
//    }
//    
//    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//    //--------------------------------------------------------------------------Default business registration-----------------------------------------------------------------------
//    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function Default_Business4Registration(Step\Acceptance\Business $I)
//    {
//        $firstName        = $I->GenerateNameOf("firnam");
//        $lastName         = $I->GenerateNameOf("lasnam");
//        $phoneNumber      = $I->GeneratePhoneNumber();
//        $email            = $I->GenerateEmail();
//        $password         = $confirmPassword = 'Qq!1111111';
//        $busName          = $this->business4_Default = $I->GenerateNameOf("bus4_Def");
//        $busPhone         = $I->GeneratePhoneNumber();
//        $address          = $I->GenerateNameOf("addr");
//        $zip              = $this->zip1;
//        $city             = $this->city1;
//        $website          = 'fgfh.fh';
//        $busType          = 'Office / Retail';
//        $employees        = '455';
//        $busFootage       = $this->bus4_busSquire_Default;
//        $landscapeFootage = $this->bus4_landSquire_Default;
//        
//        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
//                $employees, $busFootage, $landscapeFootage);
//        $I->wait(9);
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function CheckMeasuresPresent_Default_CoreAndElective(AcceptanceTester $I) {
//        $I->wait(1);
//        $I->comment("Check that Default measures with core&elective status are present in business checklist");
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(2);
//        $I->canSee("0 Tier 2 measures completed. A minimum of 1 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 0%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSee("0 of 1 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
//        $I->cantSeeElement(\Page\RegistrationStarted::$ElectiveProgressBarInfo);
////        $I->cantSeeElement(\Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
//        $I->canSee("0 of 1 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
//        $I->canSee("0 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
//        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure1Desc));
//        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure2Desc));
//        $I->canSee("$this->pointsMeas1 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure1Desc));
//        $I->canSee("$this->pointsMeas2 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure2Desc));
//        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function CheckMeasuresAbsent_LL_LB_LBAndLL_NotSet(AcceptanceTester $I) {
//        $I->wait(1);
//        $I->comment("Check that LL, LB, LB&LL measures and measures with not set status are absent in business checklist");
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(2);
//        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure3Desc));
//        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure4Desc));
//        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure5Desc));
//        $I->cantSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure6Desc));
//        $I->cantSeeElement(Page\RegistrationStarted::$LeftMenu_SolidWasteGroupButton);
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function CheckOnReviewPage_Default(AcceptanceTester $I) {
//        $I->wait(1);
//        $I->comment("Check on Review Page - Default");
//        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist));
//        $I->wait(2);
//        $I->canSee("0 Tier 2 measures completed. A minimum of 1 Tier 2 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
//        $I->canSee("0 Tier 2 points earned. A minimum of 3 Tier 2 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
//        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 0%;']);
//        $I->canSee("0 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
//        $I->canSee("0 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
//        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
//        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
//        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::NotStartedStatus);
//        $I->canSee("0", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
//        $I->cantSeeElement(Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function Default_CompleteMeasure1(AcceptanceTester $I) {
//        $measDesc = $this->measure1Desc;
//        $value1   = '66';
//        $value2   = '33';
//                
//        $I->wait(1);
//        $I->comment("Complete Measure1 for Default business: $this->business4_Default");
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(2);
//        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
//        $I->wait(2);
//        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
//        $I->wait(1);
//        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
//        $I->wait(1);
//        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
//        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
//        $I->wait(1);
//        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(1);
//        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(3);
//        $I->canSee("1 Tier 2 measures completed. A minimum of 1 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 100%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 100%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 100%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 100%;']);
//        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$CoreProgressBarInfo);
//        $I->cantSeeElement(\Page\RegistrationStarted::$ElectiveProgressBarInfo);
////        $I->cantSeeElement(\Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
//        $I->canSee("1 of 1 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
//        $I->canSee("1 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
//        $I->canSee("Total Points Earned: 1", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
//        $I->canSee("1", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function Default_CompleteMeasure2(AcceptanceTester $I) {
//        $measDesc = $this->measure2Desc;
//        $value1   = '2';
//                
//        $I->wait(1);
//        $I->comment("Complete Measure8 for Default business: $this->business4_Default");
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(2);
//        $I->makeElementVisible(["[data-measure-id=$this->idMeasure2]"], $style = 'visibility');
//        $I->wait(2);
//        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
//        $I->wait(1);
//        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
//        $I->wait(1);
//        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
//        $I->wait(1);
//        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(1);
//        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(3);
//        $I->canSee("1 Tier 2 measures completed. A minimum of 1 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
//        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 100%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 100%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 100%;']);
//        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 100%;']);
//        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$CoreProgressBarInfo);
//        $I->cantSeeElement(\Page\RegistrationStarted::$ElectiveProgressBarInfo);
////        $I->cantSeeElement(\Page\RegistrationStarted::$InfoAboutCountToCompleteElectiveMeasures);
//        $I->canSee("1 of 1 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
//        $I->canSee("3 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
//        $I->canSee("Total Points Earned: 3", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
//        $I->canSee("3", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function CheckOnReviewPage_AfterComplitingMeasures_Default(AcceptanceTester $I) {
//        $I->wait(1);
//        $I->comment("After Compliting Measures - Check on Review Page - Default");
//        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist));
//        $I->wait(2);
//        $I->canSee("1 Tier 2 measures completed. A minimum of 1 Tier 2 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
//        $I->canSee("3 Tier 2 points earned. A minimum of 3 Tier 2 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
//        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 100%;']);
//        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 100%;']);
//        $I->canSee("1 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
//        $I->canSee("3 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
//        $I->canSee("1 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
//        $I->canSee("3", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
//        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
//        $I->canSee("3", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
//        $I->cantSeeElement(Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
//    }
//    
//    /**
//     * @group admin
//     * @group stateadmin
//     * @group coordinator
//     */
//    
//    public function Help_LogOutFromBusiness4(AcceptanceTester $I){
//        $I->LogIn_TRUEorFALSE($I);
//        $I->Logout($I);
//        $I->wait(1);
//    }
}
