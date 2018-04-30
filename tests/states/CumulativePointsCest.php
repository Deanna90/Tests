<?php


class CumulativePointsCest
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
    public $statuses_Tier1   = ['not set', 'elective', 'not set',  'core',    'not set', 'not set', 'not set',  'elective', 'not set'];
    public $statuses_Tier2   = ['core',    'core',     'core',     'not set', 'not set', 'core',    'not set',  'not set',  'elective'];
    public $statuses_Tier3   = ['not set', 'not set',  'elective', 'not set', 'core',    'not set', 'elective', 'core',     'not set'];
    
    public $extensions_Tier1 = ['Default',        'Default',         'Default', 'Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Building', 'Large Building', 'Large Building'];
    public $extensions_Tier2 = ['Large Building', 'Large Landscape', 'Default', 'Default',         'Large Landscape', 'Large Landscape', 'Default',        'Large Building', 'Large Building'];
    public $extensions_Tier3 = ['Large Building', 'Large Landscape', 'Default', 'Default',         'Large Landscape', 'Default',         'Default',        'Large Building', 'Default'];
    
    public $statuses_Tier1_Updated   = ['elective', 'not set', 'core',  'core',    'not set', 'not set', 'core',  'elective', 'not set'];
    public $extensions_Tier1_Updated = ['Default', 'Default', 'Default', 'Default', 'Default', 'Default', 'Default', 'Default', 'Default'];
    
    public $id_checklist_Tier1__1st, $id_checklist_Tier2__1st, $id_checklist_Tier3__1st, $id_checklist_Tier2__2nd, $id_checklist_Tier3__2nd, $id_checklist_Tier1__3rd, 
            $id_checklist_Tier2__3rd, $id_checklist_Tier3__3rd;
    public $email_Bus1_Def, $email_Bus2_Def;
    public $email_Bus3_LL_LB, $email_Bus4_LL_LB;
    public $business_NAanswers, $bus_busSquire_NAanswers  = '45678', $bus_landSquire_NAanswers  = '5666';
    public $business1_LB,       $bus1_busSquire_LB        = '30000', $bus1_landSquire_LB        = '999';
    public $business2_LL,       $bus2_busSquire_LL        = '29999', $bus2_landSquire_LL        = '1000';
    public $business3_LB_LL,    $business4_LB_LL,   $bus3_busSquire_LB_LL     = '30001', $bus3_landSquire_LB_LL     = '1001'; 
    public $business1_Default,  $business2_Default, $bus1_busSquire_Default   = '17500', $bus1_landSquire_Default   = '500';
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
    
    public function Create_Checklist1_ForTier2(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = 'Office / Retail';
        $tier               = '2';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $this->id_checklist_Tier2__1st = $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        
        $I->click(Page\ChecklistManage::$ManageMeasuresTab);
        $I->wait(3);
        $I->ManageChecklist($descs, $this->statuses_Tier2, $this->extensions_Tier2);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckThatMoreThanCountOfElectiveMeasures_CANTBeSave_InEnabledElectiveField_Tier2(AcceptanceTester $I) {
        $max_points_Default = '3';
        $max_points_LB      = '13';
        $max_points_LL      = '11';
        $max_points_LL_LB   = '21';
        
        $points_Default_input = $max_points_Default + 1;
        $points_LB_input      = $max_points_LB + 1;
        $points_LL_input      = $max_points_LL + 1;
        $points_LL_LB_input   = $max_points_LL_LB + 1;
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier2__1st));
        $I->wait(4);
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$PointsTab);
        $I->wait(2);
        $I->waitForElement(".tabs a[href*='def'].active", 150);
        $I->wait(1);
        $I->comment("-----DEFAULT TAB-----");
        $I->canSeeInField(\Page\ChecklistManage::$RequiredPointsField, '0');
        $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $points_Default_input);
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(2);
        $I->waitForText("Points was not updated!", 100);
//        $I->canSee("Points was not updated!");
        $I->click(".confirm");
        $I->wait(4);
        $I->canSee("Total amount of complete points is greater that sum of points of all measures related to $this->state state. Maximum amount of point is $max_points_Default.", \Page\ChecklistManage::$Error_RequiredPoints);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LBTab_DefineTotalTab);
        $I->wait(2);
        $I->waitForElement(".tabs a[href*='lb'].active", 150);
        $I->wait(1);
        $I->comment("-----LARGE BUILDING TAB-----");
        $I->canSeeInField(\Page\ChecklistManage::$RequiredPointsField, '0');
        $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $points_LB_input);
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(2);
        $I->waitForText("Points was not updated!", 100);
        $I->click(".confirm");
        $I->wait(4);
        $I->canSee("Total amount of complete points is greater that sum of points of all measures related to $this->state state. Maximum amount of point is $max_points_LB.", \Page\ChecklistManage::$Error_RequiredPoints);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LLTab_DefineTotalTab);
        $I->wait(2);
        $I->waitForElement(".tabs a[href*='ll'].active", 150);
        $I->wait(1);
        $I->comment("-----LARGE LANDSCAPE TAB-----");
        $I->canSeeInField(\Page\ChecklistManage::$RequiredPointsField, '0');
        $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $points_LL_input);
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(2);
        $I->waitForText("Points was not updated!", 100);
        $I->click(".confirm");
        $I->wait(4);
        $I->canSee("Total amount of complete points is greater that sum of points of all measures related to $this->state state. Maximum amount of point is $max_points_LL.", \Page\ChecklistManage::$Error_RequiredPoints);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LB_LLTab_DefineTotalTab);
        $I->wait(2);
        $I->waitForElement(".tabs a[href*='all'].active", 150);
        $I->wait(1);
        $I->comment("-----LARGE BUILDING+LARGE LANDSCAPE TAB-----");
        $I->canSeeInField(\Page\ChecklistManage::$RequiredPointsField, '0');
        $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $points_LL_LB_input);
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(2);
        $I->waitForText("Points was not updated!", 100);
        $I->click(".confirm");
        $I->wait(4);
        $I->canSee("Total amount of complete points is greater that sum of points of all measures related to $this->state state. Maximum amount of point is $max_points_LL_LB.", \Page\ChecklistManage::$Error_RequiredPoints);
        
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function UpdateDefineTotalsValuesForChecklist1_Tier2(\Step\Acceptance\Checklist $I) {
        $points_Default = '3';
        $points_LB      = '13';
        $points_LL      = '11';
        $points_LL_LB   = '21';
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier2__1st));
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
    
    public function Create_Checklist1_ForTier1(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = 'Office / Retail';
        $tier               = '1';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $this->id_checklist_Tier1__1st = $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        
        $I->click(Page\ChecklistManage::$ManageMeasuresTab);
        $I->wait(3);
        $I->ManageChecklist($descs, $this->statuses_Tier1, $this->extensions_Tier1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckThatMoreThanCountOfElectiveMeasures_CANTBeSave_InEnabledElectiveField_Tier1(AcceptanceTester $I) {
        $max_points_Default = '2';
        $max_points_LB      = '10';
        $max_points_LL      = '6';
        $max_points_LL_LB   = '14';
        
        $points_Default_input = $max_points_Default + 1;
        $points_LB_input      = $max_points_LB + 1;
        $points_LL_input      = $max_points_LL + 1;
        $points_LL_LB_input   = $max_points_LL_LB + 1;
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier1__1st));
        $I->wait(4);
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$PointsTab);
        $I->wait(2);
        $I->waitForElement(".tabs a[href*='def'].active", 150);
        $I->wait(1);
        $I->comment("-----DEFAULT TAB-----");
        $I->canSeeInField(\Page\ChecklistManage::$RequiredPointsField, '0');
        $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $points_Default_input);
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(2);
        $I->waitForText("Points was not updated!", 100);
        $I->click(".confirm");
        $I->wait(4);
        $I->canSee("Total amount of complete points is greater that sum of points of all measures related to $this->state state. Maximum amount of point is $max_points_Default.", \Page\ChecklistManage::$Error_RequiredPoints);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LBTab_DefineTotalTab);
        $I->wait(2);
        $I->waitForElement(".tabs a[href*='lb'].active", 150);
        $I->wait(1);
        $I->comment("-----LARGE BUILDING TAB-----");
        $I->canSeeInField(\Page\ChecklistManage::$RequiredPointsField, '0');
        $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $points_LB_input);
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(2);
        $I->waitForText("Points was not updated!", 100);
        $I->click(".confirm");
        $I->wait(4);
        $I->canSee("Total amount of complete points is greater that sum of points of all measures related to $this->state state. Maximum amount of point is $max_points_LB.", \Page\ChecklistManage::$Error_RequiredPoints);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LLTab_DefineTotalTab);
        $I->wait(2);
        $I->waitForElement(".tabs a[href*='ll'].active", 150);
        $I->wait(1);
        $I->comment("-----LARGE LANDSCAPE TAB-----");
        $I->canSeeInField(\Page\ChecklistManage::$RequiredPointsField, '0');
        $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $points_LL_input);
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(2);
        $I->waitForText("Points was not updated!", 100);
        $I->click(".confirm");
        $I->wait(4);
        $I->canSee("Total amount of complete points is greater that sum of points of all measures related to $this->state state. Maximum amount of point is $max_points_LL.", \Page\ChecklistManage::$Error_RequiredPoints);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LB_LLTab_DefineTotalTab);
        $I->wait(2);
        $I->waitForElement(".tabs a[href*='all'].active", 150);
        $I->wait(1);
        $I->comment("-----LARGE BUILDING+LARGE LANDSCAPE TAB-----");
        $I->canSeeInField(\Page\ChecklistManage::$RequiredPointsField, '0');
        $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $points_LL_LB_input);
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(2);
        $I->waitForText("Points was not updated!", 100);
        $I->click(".confirm");
        $I->wait(4);
        $I->canSee("Total amount of complete points is greater that sum of points of all measures related to $this->state state. Maximum amount of point is $max_points_LL_LB.", \Page\ChecklistManage::$Error_RequiredPoints);
        
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function UpdateDefineTotalsValuesForChecklist1_Tier1(\Step\Acceptance\Checklist $I) {
        $points_Default = '2';
        $points_LB      = '10';
        $points_LL      = '6';
        $points_LL_LB   = '14';
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier1__1st));
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
    
    public function Create_Checklist1_ForTier3(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = 'Office / Retail';
        $tier               = '3';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $this->id_checklist_Tier3__1st = $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        
        $I->click(Page\ChecklistManage::$ManageMeasuresTab);
        $I->wait(3);
        $I->ManageChecklist($descs, $this->statuses_Tier3, $this->extensions_Tier3);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckThatMoreThanCountOfElectiveMeasures_CANTBeSave_InEnabledElectiveField_Tier3(AcceptanceTester $I) {
        $max_points_Default = '10';
        $max_points_LB      = '18';
        $max_points_LL      = '15';
        $max_points_LL_LB   = '23';
        
        $points_Default_input = $max_points_Default + 1;
        $points_LB_input      = $max_points_LB + 1;
        $points_LL_input      = $max_points_LL + 1;
        $points_LL_LB_input   = $max_points_LL_LB + 1;
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier3__1st));
        $I->wait(4);
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$PointsTab);
        $I->wait(2);
        $I->waitForElement(".tabs a[href*='def'].active", 150);
        $I->wait(1);
        $I->comment("-----DEFAULT TAB-----");
        $I->canSeeInField(\Page\ChecklistManage::$RequiredPointsField, '0');
        $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $points_Default_input);
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(2);
        $I->waitForText("Points was not updated!", 100);
        $I->click(".confirm");
        $I->wait(4);
        $I->canSee("Total amount of complete points is greater that sum of points of all measures related to $this->state state. Maximum amount of point is $max_points_Default.", \Page\ChecklistManage::$Error_RequiredPoints);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LBTab_DefineTotalTab);
        $I->wait(2);
        $I->waitForElement(".tabs a[href*='lb'].active", 150);
        $I->wait(1);
        $I->comment("-----LARGE BUILDING TAB-----");
        $I->canSeeInField(\Page\ChecklistManage::$RequiredPointsField, '0');
        $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $points_LB_input);
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(2);
        $I->waitForText("Points was not updated!", 100);
        $I->click(".confirm");
        $I->wait(4);
        $I->canSee("Total amount of complete points is greater that sum of points of all measures related to $this->state state. Maximum amount of point is $max_points_LB.", \Page\ChecklistManage::$Error_RequiredPoints);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LLTab_DefineTotalTab);
        $I->wait(2);
        $I->waitForElement(".tabs a[href*='ll'].active", 150);
        $I->wait(1);
        $I->comment("-----LARGE LANDSCAPE TAB-----");
        $I->canSeeInField(\Page\ChecklistManage::$RequiredPointsField, '0');
        $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $points_LL_input);
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(2);
        $I->waitForText("Points was not updated!", 100);
        $I->click(".confirm");
        $I->wait(4);
        $I->canSee("Total amount of complete points is greater that sum of points of all measures related to $this->state state. Maximum amount of point is $max_points_LL.", \Page\ChecklistManage::$Error_RequiredPoints);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LB_LLTab_DefineTotalTab);
        $I->wait(2);
        $I->waitForElement(".tabs a[href*='all'].active", 150);
        $I->wait(1);
        $I->comment("-----LARGE BUILDING+LARGE LANDSCAPE TAB-----");
        $I->canSeeInField(\Page\ChecklistManage::$RequiredPointsField, '0');
        $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $points_LL_LB_input);
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(2);
        $I->waitForText("Points was not updated!", 100);
        $I->click(".confirm");
        $I->wait(4);
        $I->canSee("Total amount of complete points is greater that sum of points of all measures related to $this->state state. Maximum amount of point is $max_points_LL_LB.", \Page\ChecklistManage::$Error_RequiredPoints);
        
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function UpdateDefineTotalsValuesForChecklist1_Tier3(\Step\Acceptance\Checklist $I) {
        $points_Default = '10';
        $points_LB      = '18';
        $points_LL      = '15';
        $points_LL_LB   = '23';
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier3__1st));
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
    
    public function CheckRequiredPoints_Tier1(\Step\Acceptance\Checklist $I) {
        $points_Default = '2';
        $points_LB      = '10';
        $points_LL      = '6';
        $points_LL_LB   = '14';
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier1__1st));
        $I->wait(3);
        $I->CheckSavedChecklistPoints($points_Default, $points_LB, $points_LL, $points_LL_LB);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckRequiredPoints_Tier2(\Step\Acceptance\Checklist $I) {
        $points_Default = '3';
        $points_LB      = '13';
        $points_LL      = '11';
        $points_LL_LB   = '21';
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier2__1st));
        $I->wait(3);
        $I->CheckSavedChecklistPoints($points_Default, $points_LB, $points_LL, $points_LL_LB);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Publish_Tier2(\Step\Acceptance\Checklist $I) {
        
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier2__1st));
        $I->wait(3);
        $I->PublishChecklistStatus($this->id_checklist_Tier2__1st);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckRequiredPoints2_Tier1(\Step\Acceptance\Checklist $I) {
        $points_Default = '2';
        $points_LB      = '10';
        $points_LL      = '6';
        $points_LL_LB   = '14';
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier1__1st));
        $I->wait(3);
        $I->CheckSavedChecklistPoints($points_Default, $points_LB, $points_LL, $points_LL_LB);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckLeftColumnAndPointsValues_OnManageChecklist_Tier1(Step\Acceptance\Checklist $I) {
        
        $I->comment("                                             ");
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultCoreValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_LBCoreValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LLCoreValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLCoreValue);
        $I->comment("                                             ");
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveValue);
        
        $I->comment("---Points:---");
        $I->canSee('0', \Page\ChecklistManage::$IncludedPointsForm_DefaultCoreValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedPointsForm_LBCoreValue);
        $I->canSee('4', \Page\ChecklistManage::$IncludedPointsForm_LLCoreValue);
        $I->canSee('4', \Page\ChecklistManage::$IncludedPointsForm_LB_LLCoreValue);
        $I->comment("                                             ");
        $I->canSee('2', \Page\ChecklistManage::$IncludedPointsForm_DefaultElectiveValue);
        $I->canSee('10', \Page\ChecklistManage::$IncludedPointsForm_LBElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedPointsForm_LLElectiveValue);
        $I->canSee('10', \Page\ChecklistManage::$IncludedPointsForm_LB_LLElectiveValue);
        $I->wait(1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckRequiredPoints2_Tier2(\Step\Acceptance\Checklist $I) {
        $points_Default = '3';
        $points_LB      = '13';
        $points_LL      = '11';
        $points_LL_LB   = '21';
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier2__1st));
        $I->wait(3);
        $I->CheckSavedChecklistPoints($points_Default, $points_LB, $points_LL, $points_LL_LB);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckLeftColumnAndPointsValues_OnManageChecklist_Tier2(Step\Acceptance\Checklist $I) {
        
        $I->comment("                                             ");
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultCoreValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LBCoreValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LLCoreValue);
        $I->canSee('4', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLCoreValue);
        $I->comment("                                             ");
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveValue);
        
        $I->comment("---Points:---");
        $I->canSee('3', \Page\ChecklistManage::$IncludedPointsForm_DefaultCoreValue);
        $I->canSee('4', \Page\ChecklistManage::$IncludedPointsForm_LBCoreValue);
        $I->canSee('11', \Page\ChecklistManage::$IncludedPointsForm_LLCoreValue);
        $I->canSee('12', \Page\ChecklistManage::$IncludedPointsForm_LB_LLCoreValue);
        $I->comment("                                             ");
        $I->canSee('0', \Page\ChecklistManage::$IncludedPointsForm_DefaultElectiveValue);
        $I->canSee('9', \Page\ChecklistManage::$IncludedPointsForm_LBElectiveValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedPointsForm_LLElectiveValue);
        $I->canSee('9', \Page\ChecklistManage::$IncludedPointsForm_LB_LLElectiveValue);
        $I->wait(1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckRequiredPoints2_Tier3(\Step\Acceptance\Checklist $I) {
//        $points_Default = '10';
//        $points_LB      = '28';
//        $points_LL      = '23';
//        $points_LL_LB   = '41';
        
        $points_Default = '13';
        $points_LB      = '31';
        $points_LL      = '26';
        $points_LL_LB   = '44';
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier3__1st));
        $I->wait(3);
        $I->CheckSavedChecklistPoints($points_Default, $points_LB, $points_LL, $points_LL_LB);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckLeftColumnAndPointsValues_OnManageChecklist_Tier3(Step\Acceptance\Checklist $I) {
        
        $I->comment("                                             ");
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultCoreValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LBCoreValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LLCoreValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLCoreValue);
        $I->comment("                                             ");
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveValue);
        
        $I->comment("---Points:---");
        $I->canSee('0', \Page\ChecklistManage::$IncludedPointsForm_DefaultCoreValue);
        $I->canSee('8', \Page\ChecklistManage::$IncludedPointsForm_LBCoreValue);
        $I->canSee('5', \Page\ChecklistManage::$IncludedPointsForm_LLCoreValue);
        $I->canSee('13', \Page\ChecklistManage::$IncludedPointsForm_LB_LLCoreValue);
        $I->comment("                                             ");
        $I->canSee('10', \Page\ChecklistManage::$IncludedPointsForm_DefaultElectiveValue);
        $I->canSee('10', \Page\ChecklistManage::$IncludedPointsForm_LBElectiveValue);
        $I->canSee('10', \Page\ChecklistManage::$IncludedPointsForm_LLElectiveValue);
        $I->canSee('10', \Page\ChecklistManage::$IncludedPointsForm_LB_LLElectiveValue);
        $I->wait(1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Publish_Tier3_Error(\Step\Acceptance\Checklist $I) {
        
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier3__1st));
        $I->wait(3);
        $I->PublishChecklistStatus($this->id_checklist_Tier3__1st, 1, $endStatus = 'draft');
        $I->wait(2);
        $I->waitForText("Checklist did", 100);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(2);
        $I->canSeeElement(Page\ChecklistManage::PublishButtonLine_VersionHistoryTab(1));
        $I->cantSeeElement(Page\ChecklistManage::UnPublishButtonLine_VersionHistoryTab(1));
        $I->canSee("Draft", Page\ChecklistManage::$StatusTitle);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Coordinator3_11_ActivateAndUpdateTier3(\Step\Acceptance\Tier $I) {
        $program    = $this->program1;
        $tier3      = '3';
        $tier3Name  = "tiername3";
        $tier3Desc  = 'tier desc3';
        $tier3OptIn = 'yes';
        
        $I->amOnPage(Page\TierManage::URL());
        $I->wait(1);
        $I->canSee($program, Page\TierManage::$ProgramOption);
        $I->selectOption(Page\TierManage::$ProgramSelect, $program);
        $I->wait(10);
        $I->canSee('Tier 1', Page\TierManage::$Tier1Button_LeftMenu);
        $I->canSee('Tier 2', Page\TierManage::$Tier2Button_LeftMenu);
        $I->canSee('Tier 3', Page\TierManage::$Tier3Button_LeftMenu);
        $I->ManageTiers($program, null, null, null, null, null, null, null, null, $tier3, $tier3Name, $tier3Desc, $tier3OptIn);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Publish_Tier3_Error_(\Step\Acceptance\Checklist $I) {
        
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier3__1st));
        $I->wait(3);
        $I->PublishChecklistStatus($this->id_checklist_Tier3__1st, 1, $endStatus = 'draft');
        $I->wait(2);
        $I->waitForText("Checklist did", 100);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(2);
        $I->canSeeElement(Page\ChecklistManage::PublishButtonLine_VersionHistoryTab(1));
        $I->cantSeeElement(Page\ChecklistManage::UnPublishButtonLine_VersionHistoryTab(1));
        $I->canSee("Draft", Page\ChecklistManage::$StatusTitle);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckErrorWhenUpdatingPointsToLowThanPointsInTier2(\Step\Acceptance\Checklist $I) {
        $points_Default_input = '2';
        $points_LB_input      = '12';
        $points_LL_input      = '10';
        $points_LL_LB_input   = '20';
        
        $min_points_Default = '3';
        $min_points_LB      = '13';
        $min_points_LL      = '11';
        $min_points_LL_LB   = '21';
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier3__1st));
        $I->wait(4);
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$PointsTab);
        $I->wait(2);
        $I->waitForElement(".tabs a[href*='def'].active", 150);
        $I->wait(1);
        $I->comment("-----DEFAULT TAB-----");
        $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $points_Default_input);
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(2);
        $I->waitForText("Points was not updated!", 100);
        $I->click(".confirm");
        $I->wait(4);
        $I->canSee("Total amount of complete points is less that sum of points of prev tiers. Minimum amount of point is $min_points_Default.", \Page\ChecklistManage::$Error_RequiredPoints);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LBTab_DefineTotalTab);
        $I->wait(2);
        $I->waitForElement(".tabs a[href*='lb'].active", 150);
        $I->wait(1);
        $I->comment("-----LARGE BUILDING TAB-----");
        $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $points_LB_input);
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(2);
        $I->waitForText("Points was not updated!", 100);
        $I->click(".confirm");
        $I->wait(4);
        $I->canSee("Total amount of complete points is less that sum of points of prev tiers. Minimum amount of point is $min_points_LB.", \Page\ChecklistManage::$Error_RequiredPoints);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LLTab_DefineTotalTab);
        $I->wait(2);
        $I->waitForElement(".tabs a[href*='ll'].active", 150);
        $I->wait(1);
        $I->comment("-----LARGE LANDSCAPE TAB-----");
        $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $points_LL_input);
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(2);
        $I->waitForText("Points was not updated!", 100);
        $I->click(".confirm");
        $I->wait(4);
        $I->canSee("Total amount of complete points is less that sum of points of prev tiers. Minimum amount of point is $min_points_LL.", \Page\ChecklistManage::$Error_RequiredPoints);
        
        $I->comment("-----                      -----                       -----");
        $I->click(\Page\ChecklistManage::$LB_LLTab_DefineTotalTab);
        $I->wait(2);
        $I->waitForElement(".tabs a[href*='all'].active", 150);
        $I->wait(1);
        $I->comment("-----LARGE BUILDING+LARGE LANDSCAPE TAB-----");
        $I->fillField(\Page\ChecklistManage::$RequiredPointsField, $points_LL_LB_input);
        $I->click(\Page\ChecklistManage::$SaveButton);
        $I->wait(2);
        $I->waitForText("Points was not updated!", 100);
        $I->click(".confirm");
        $I->wait(4);
        $I->canSee("Total amount of complete points is less that sum of points of prev tiers. Minimum amount of point is $min_points_LL_LB.", \Page\ChecklistManage::$Error_RequiredPoints);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function UpdateDefineTotalsValuesForChecklist1_Tier3_ForSuccessPublishing(\Step\Acceptance\Checklist $I) {
        $points_Default = '10';
        $points_LB      = '28';
        $points_LL      = '23';
        $points_LL_LB   = '41';
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier3__1st));
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
    
    public function Publish_Tier3_Success(\Step\Acceptance\Checklist $I) {
        
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier3__1st));
        $I->wait(3);
        $I->PublishChecklistStatus($this->id_checklist_Tier3__1st);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckRequiredPoints2_Tier1_2(\Step\Acceptance\Checklist $I) {
        $points_Default = '2';
        $points_LB      = '10';
        $points_LL      = '6';
        $points_LL_LB   = '14';
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier1__1st));
        $I->wait(3);
        $I->CheckSavedChecklistPoints($points_Default, $points_LB, $points_LL, $points_LL_LB);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckLeftColumnAndPointsValues_OnManageChecklist_Tier1_2(Step\Acceptance\Checklist $I) {
        
        $I->comment("                                             ");
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultCoreValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_LBCoreValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LLCoreValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLCoreValue);
        $I->comment("                                             ");
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveValue);
        
        $I->comment("---Points:---");
        $I->canSee('0', \Page\ChecklistManage::$IncludedPointsForm_DefaultCoreValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedPointsForm_LBCoreValue);
        $I->canSee('4', \Page\ChecklistManage::$IncludedPointsForm_LLCoreValue);
        $I->canSee('4', \Page\ChecklistManage::$IncludedPointsForm_LB_LLCoreValue);
        $I->comment("                                             ");
        $I->canSee('2', \Page\ChecklistManage::$IncludedPointsForm_DefaultElectiveValue);
        $I->canSee('10', \Page\ChecklistManage::$IncludedPointsForm_LBElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedPointsForm_LLElectiveValue);
        $I->canSee('10', \Page\ChecklistManage::$IncludedPointsForm_LB_LLElectiveValue);
        $I->wait(1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckRequiredPoints2_Tier2_2(\Step\Acceptance\Checklist $I) {
        $points_Default = '3';
        $points_LB      = '13';
        $points_LL      = '11';
        $points_LL_LB   = '21';
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier2__1st));
        $I->wait(3);
        $I->CheckSavedChecklistPoints($points_Default, $points_LB, $points_LL, $points_LL_LB);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckLeftColumnAndPointsValues_OnManageChecklist_Tier2_2(Step\Acceptance\Checklist $I) {
        
        $I->comment("                                             ");
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultCoreValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LBCoreValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LLCoreValue);
        $I->canSee('4', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLCoreValue);
        $I->comment("                                             ");
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveValue);
        
        $I->comment("---Points:---");
        $I->canSee('3', \Page\ChecklistManage::$IncludedPointsForm_DefaultCoreValue);
        $I->canSee('4', \Page\ChecklistManage::$IncludedPointsForm_LBCoreValue);
        $I->canSee('11', \Page\ChecklistManage::$IncludedPointsForm_LLCoreValue);
        $I->canSee('12', \Page\ChecklistManage::$IncludedPointsForm_LB_LLCoreValue);
        $I->comment("                                             ");
        $I->canSee('0', \Page\ChecklistManage::$IncludedPointsForm_DefaultElectiveValue);
        $I->canSee('9', \Page\ChecklistManage::$IncludedPointsForm_LBElectiveValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedPointsForm_LLElectiveValue);
        $I->canSee('9', \Page\ChecklistManage::$IncludedPointsForm_LB_LLElectiveValue);
        $I->wait(1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckRequiredPoints2_Tier3_2(\Step\Acceptance\Checklist $I) {
        $points_Default = '10';
        $points_LB      = '28';
        $points_LL      = '23';
        $points_LL_LB   = '41';
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier3__1st));
        $I->wait(3);
        $I->CheckSavedChecklistPoints($points_Default, $points_LB, $points_LL, $points_LL_LB);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckLeftColumnAndPointsValues_OnManageChecklist_Tier3_2(Step\Acceptance\Checklist $I) {
        
        $I->comment("                                             ");
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultCoreValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LBCoreValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LLCoreValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLCoreValue);
        $I->comment("                                             ");
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveValue);
        
        $I->comment("---Points:---");
        $I->canSee('0', \Page\ChecklistManage::$IncludedPointsForm_DefaultCoreValue);
        $I->canSee('8', \Page\ChecklistManage::$IncludedPointsForm_LBCoreValue);
        $I->canSee('5', \Page\ChecklistManage::$IncludedPointsForm_LLCoreValue);
        $I->canSee('13', \Page\ChecklistManage::$IncludedPointsForm_LB_LLCoreValue);
        $I->comment("                                             ");
        $I->canSee('10', \Page\ChecklistManage::$IncludedPointsForm_DefaultElectiveValue);
        $I->canSee('10', \Page\ChecklistManage::$IncludedPointsForm_LBElectiveValue);
        $I->canSee('10', \Page\ChecklistManage::$IncludedPointsForm_LLElectiveValue);
        $I->canSee('10', \Page\ChecklistManage::$IncludedPointsForm_LB_LLElectiveValue);
        $I->wait(1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOut(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->Logout($I);
    }
    
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------Default business1 registration-----------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Default_Business1Registration_Tier2_Tier3(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email_Bus1_Def = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business1_Default = $I->GenerateNameOf("bus1_Def");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip1;
        $city             = $this->city1;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = $this->bus1_busSquire_Default;
        $landscapeFootage = $this->bus1_landSquire_Default;
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(5);
        $I->waitForElement(Page\RegistrationStarted::$LeftMenu_GetStartedButton, 100);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckMeasuresPresent_Default_CoreAndElective_Tier2(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check that Default measures with core&elective status are present in business checklist");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->canSee("0 Tier 2 measures completed. A minimum of 1 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("0 of 1 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
        //Tier2 in left menu
        $I->canSee("Tier 2 Required Measures", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresLabel('1'));
        $I->canSee("Tier 2 Points", \Page\RegistrationStarted::LeftMenu_EarnedPointsLabel('1'));
        $I->canSee("0 of 1 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("0 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
        //Tier3 in left menu
        $I->canSee("Tiername3 Required Measures", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresLabel('2'));
        $I->canSee("Tiername3 Points", \Page\RegistrationStarted::LeftMenu_EarnedPointsLabel('2'));
        $I->canSee("0 of 0 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
        $I->canSee("0 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('2'));
        //Total in left menu
        $I->canSee("Total Points Earned: 0", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
        //Total 
        $I->canSee("0", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
        //Next Tier Button 
        $I->canSee("READY TO GET TO THE NEXT LEVEL?", Page\RegistrationStarted::$InfoForNextTierButton);
        $I->canSeeElement(Page\RegistrationStarted::$NextTierButton);
        
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure3Desc));
        $I->canSee("$this->pointsMeas3 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure3Desc));
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOnReviewPage_Default_Tier2(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier2__1st));
        $I->wait(2);
        $I->canSee("Tier 2 Review & Submit", \Page\ReviewAndSubmit::$ReviewTitle);
        
        $I->canSee("0 Tier 2 measures completed. A minimum of 1 Tier 2 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("0 Tier 2 points earned. A minimum of 3 Tier 2 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 0%;']);
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("0 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("0 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier3
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("0 of 0 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("0 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::NotStartedStatus);
        //Total
        $I->canSee("0", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
        $I->cantSeeElement(Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->cantSeeElement(Page\ReviewAndSubmit::Review_GroupLine_ByName(Page\AuditGroupList::SolidWaste_AuditGroup));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOnReviewPage_Default_Tier3(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier3__1st));
        $I->wait(2);
        $I->canSee("tiername3 Review & Submit", \Page\ReviewAndSubmit::$ReviewTitle);
        
        $I->canSee("0 tiername3 measures completed. A minimum of 0 tiername3 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("0 tiername3 points earned. A minimum of 10 tiername3 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 0%;']);
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("0 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("0 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier3
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("0 of 0 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("0 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
        
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("0", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Default_CompleteMeasure3(AcceptanceTester $I) {
        $measDesc = $this->measure3Desc;
        $value1   = '66';
                
        $I->wait(1);
        $I->comment("Complete Measure3 for Default business: $this->business1_Default");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure3]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(5);
        $I->canSee("1 Tier 2 measures completed. A minimum of 1 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$CoreProgressBarInfo);
        //Tier2 in left menu
        $I->canSee("1 of 1 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("3 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
        //Tier3 in left menu
        $I->canSee("0 of 0 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
        $I->canSee("3 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('2'));
        //Total in left menu
        $I->canSee("Total Points Earned: 3", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
        //Total 
        $I->canSee("3", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOnReviewPage_Default_Tier2_AfterMeasure3Completed(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier2__1st));
        $I->wait(2);
        $I->canSee("1 Tier 2 measures completed. A minimum of 1 Tier 2 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("3 Tier 2 points earned. A minimum of 3 Tier 2 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 100%;']);
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("1 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("3 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier3
        $I->canSee("Tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("0 of 0 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("3 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        
        $I->canSee("1 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("3", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("3", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
        $I->cantSeeElement(Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->cantSeeElement(Page\ReviewAndSubmit::Review_GroupLine_ByName(Page\AuditGroupList::SolidWaste_AuditGroup));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOnReviewPage_Default_Tier3_AfterMeasure3Completed(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier3__1st));
        $I->wait(2);
        $I->canSee("0 tiername3 measures completed. A minimum of 0 tiername3 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("3 tiername3 points earned. A minimum of 10 tiername3 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 30%;']);
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("1 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("3 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier3
        $I->canSee("Tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("0 of 0 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("3 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
        
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("3", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Default_CompleteMeasure7(AcceptanceTester $I) {
        $measDesc = $this->measure7Desc;
        $value1   = '2';
        $value2   = '1';
                
        $I->wait(1);
        $I->comment("Complete Measure7 for Default business: $this->business1_Default");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste)."&tier_id=$this->id_checklist_Tier3__1st");
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure7]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure7']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(5);
        $I->canSee("0 tiername3 measures completed. A minimum of 0 tiername3 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->cantSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->cantSeeElement(\Page\RegistrationStarted::$ElectiveProgressBarInfo);
        //Tier2 in left menu
        $I->canSee("1 of 1 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("3 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
        //Tier3 in left menu
        $I->canSee("0 of 0 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
        $I->canSee("10 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('2'));
        //Total in left menu
        $I->canSee("Total Points Earned: 10", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
        //Total 
        $I->canSee("10", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOnReviewPage_Default_Tier2_AfterMeasure7Completed(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier2__1st));
        $I->wait(2);
        $I->canSee("1 Tier 2 measures completed. A minimum of 1 Tier 2 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("3 Tier 2 points earned. A minimum of 3 Tier 2 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 100%;']);
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("1 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("3 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier3
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("0 of 0 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("10 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        
        $I->canSee("1 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("3", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("10", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
        $I->cantSeeElement(Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->cantSeeElement(Page\ReviewAndSubmit::Review_GroupLine_ByName(Page\AuditGroupList::SolidWaste_AuditGroup));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOnReviewPage_Default_Tier3_AfterMeasure7Completed(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier3__1st));
        $I->wait(2);
        $I->canSee("0 tiername3 measures completed. A minimum of 0 tiername3 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("10 tiername3 points earned. A minimum of 10 tiername3 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 100%;']);
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("1 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("3 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier3
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("0 of 0 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("10 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
        
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("7", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("10", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOutFromBusiness1(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->wait(1);
    }
    
    
    
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------LL&LB business3 registration-----------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function LL_LB_Business1Registration_Tier2_Tier3(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email_Bus3_LL_LB = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business3_LB_LL = $I->GenerateNameOf("bus3_LL_LB_old_");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip1;
        $city             = $this->city1;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = $this->bus3_busSquire_LB_LL;
        $landscapeFootage = $this->bus3_landSquire_LB_LL;
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(5);
        $I->waitForElement(Page\RegistrationStarted::$LeftMenu_GetStartedButton, 100);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_CheckMeasuresPresent_LL_LB_CoreAndElective_Tier2(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check that Default measures with core&elective status are present in business checklist");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->canSee("0 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("0 of 4 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
        //Tier2 in left menu
        $I->canSee("Tier 2 Required Measures", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresLabel('1'));
        $I->canSee("Tier 2 Points", \Page\RegistrationStarted::LeftMenu_EarnedPointsLabel('1'));
        $I->canSee("0 of 4 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("0 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
        //Tier3 in left menu
        $I->canSee("Tiername3 Required Measures", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresLabel('2'));
        $I->canSee("Tiername3 Points", \Page\RegistrationStarted::LeftMenu_EarnedPointsLabel('2'));
        $I->canSee("0 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
        $I->canSee("0 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('2'));
        //Total in left menu
        $I->canSee("Total Points Earned: 0", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
        //Total 
        $I->canSee("0", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
        //Next Tier Button 
        $I->canSee("READY TO GET TO THE NEXT LEVEL?", Page\RegistrationStarted::$InfoForNextTierButton);
        $I->canSeeElement(Page\RegistrationStarted::$NextTierButton);
        
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure1Desc));
        $I->canSee("$this->pointsMeas1 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure1Desc));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure2Desc));
        $I->canSee("$this->pointsMeas2 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure2Desc));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure3Desc));
        $I->canSee("$this->pointsMeas3 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure3Desc));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure6Desc));
        $I->canSee("$this->pointsMeas6 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure6Desc));
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_CheckOnReviewPage_Default_Tier2(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier2__1st));
        $I->wait(2);
        $I->canSee("Tier 2 Review & Submit", \Page\ReviewAndSubmit::$ReviewTitle);
        
        $I->canSee("0 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("0 Tier 2 points earned. A minimum of 21 Tier 2 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 0%;']);
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("0 of 4 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("0 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier3
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("0 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("0 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        
        $I->canSee("0 /4", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::NotStartedStatus);
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("0", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_CheckOnReviewPage_Default_Tier3(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier3__1st));
        $I->wait(2);
        $I->canSee("tiername3 Review & Submit", \Page\ReviewAndSubmit::$ReviewTitle);
        
        $I->canSee("0 tiername3 measures completed. A minimum of 2 tiername3 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("0 tiername3 points earned. A minimum of 41 tiername3 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 0%;']);
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("0 of 4 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("0 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier3
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("0 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("0 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::NotStartedStatus);
        
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::NotStartedStatus);
        //Total
        $I->canSee("0", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_CompleteMeasure3(AcceptanceTester $I) {
        $measDesc = $this->measure3Desc;
        $value1   = '66';
                
        $I->wait(1);
        $I->comment("Complete Measure3 for Default business: $this->business1_Default");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure3]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(5);
        $I->canSee("1 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 25%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 25%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 25%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 25%;']);
        $I->canSee("1 of 4 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
        //Tier2 in left menu
        $I->canSee("1 of 4 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("3 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
        //Tier3 in left menu
        $I->canSee("0 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
        $I->canSee("0 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('2'));
        //Total in left menu
        $I->canSee("Total Points Earned: 0", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
        //Total 
        $I->canSee("0", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_Default_Tier2_AfterMeasure3Completed(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier2__1st));
        $I->wait(2);
        $I->canSee("1 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("3 Tier 2 points earned. A minimum of 21 Tier 2 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 25%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 15%;']);
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("1 of 4 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("3 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier3
        $I->canSee("Tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("0 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("0 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        
        $I->canSee("1 /4", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("3", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::InProgressStatus);
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
        
        //Total
        $I->canSee("0", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_CheckOnReviewPage_Default_Tier3_AfterMeasure3Completed(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier3__1st));
        $I->wait(2);
        $I->canSee("0 tiername3 measures completed. A minimum of 2 tiername3 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("0 tiername3 points earned. A minimum of 41 tiername3 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 0%;']);
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("1 of 4 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("3 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier3
        $I->canSee("Tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("0 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("0 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::InProgressStatus);
        
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::NotStartedStatus);
        //Total
        $I->canSee("0", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_CompleteMeasure7(AcceptanceTester $I) {
        $measDesc = $this->measure7Desc;
        $value1   = '2';
        $value2   = '1';
                
        $I->wait(1);
        $I->comment("Complete Measure7 for Default business: $this->business3_LB_LL");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste)."&tier_id=$this->id_checklist_Tier3__1st");
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure7]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure7']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(5);
        $I->canSee("0 tiername3 measures completed. A minimum of 2 tiername3 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->cantSeeElement(\Page\RegistrationStarted::$ElectiveProgressBarInfo);
        //Tier2 in left menu
        $I->canSee("1 of 4 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("3 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
        //Tier3 in left menu
        $I->canSee("0 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
        $I->canSee("7 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('2'));
        //Total in left menu
        $I->canSee("Total Points Earned: 0", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
        //Total 
        $I->canSee("0", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_CheckOnReviewPage_Default_Tier2_AfterMeasure7Completed(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier2__1st));
        $I->wait(2);
        $I->canSee("1 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("3 Tier 2 points earned. A minimum of 21 Tier 2 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 25%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 15%;']);
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("1 of 4 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("3 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier3
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("0 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("7 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        
        $I->canSee("1 /4", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("3", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::InProgressStatus);
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("0", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_CheckOnReviewPage_Default_Tier3_AfterMeasure7Completed(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier3__1st));
        $I->wait(2);
        $I->canSee("0 tiername3 measures completed. A minimum of 2 tiername3 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("7 tiername3 points earned. A minimum of 41 tiername3 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 18%;']);
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("1 of 4 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("3 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier3
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("0 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("7 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::InProgressStatus);
        
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("7", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::InProgressStatus);
        //Total
        $I->canSee("0", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOutFromBusiness3(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsAdmin($I);
    }
    
    
    
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ActivateAndUpdateTier1(\Step\Acceptance\Tier $I) {
        $program    = $this->program1;
        $tier1      = '1';
        $tier1Name  = "tiername1";
        $tier1Desc  = 'tier desc1';
        $tier1OptIn = 'yes';
        
        $I->amOnPage(Page\TierManage::URL());
        $I->wait(1);
        $I->canSee($program, Page\TierManage::$ProgramOption);
        $I->selectOption(Page\TierManage::$ProgramSelect, $program);
        $I->wait(10);
        $I->ManageTiers($program, $tier1, $tier1Name, $tier1Desc, $tier1OptIn);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckRequiredPoints2_Tier1_3(\Step\Acceptance\Checklist $I) {
        $points_Default = '2';
        $points_LB      = '10';
        $points_LL      = '6';
        $points_LL_LB   = '14';
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier1__1st));
        $I->wait(3);
        $I->CheckSavedChecklistPoints($points_Default, $points_LB, $points_LL, $points_LL_LB);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckLeftColumnAndPointsValues_OnManageChecklist_Tier1_3(Step\Acceptance\Checklist $I) {
        
        $I->comment("                                             ");
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultCoreValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_LBCoreValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LLCoreValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLCoreValue);
        $I->comment("                                             ");
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveValue);
        
        $I->comment("---Points:---");
        $I->canSee('0', \Page\ChecklistManage::$IncludedPointsForm_DefaultCoreValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedPointsForm_LBCoreValue);
        $I->canSee('4', \Page\ChecklistManage::$IncludedPointsForm_LLCoreValue);
        $I->canSee('4', \Page\ChecklistManage::$IncludedPointsForm_LB_LLCoreValue);
        $I->comment("                                             ");
        $I->canSee('2', \Page\ChecklistManage::$IncludedPointsForm_DefaultElectiveValue);
        $I->canSee('10', \Page\ChecklistManage::$IncludedPointsForm_LBElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedPointsForm_LLElectiveValue);
        $I->canSee('10', \Page\ChecklistManage::$IncludedPointsForm_LB_LLElectiveValue);
        $I->wait(1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckRequiredPoints2_Tier2_3(\Step\Acceptance\Checklist $I) {
        $points_Default = '3';
        $points_LB      = '13';
        $points_LL      = '11';
        $points_LL_LB   = '21';
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier2__1st));
        $I->wait(3);
        $I->CheckSavedChecklistPoints($points_Default, $points_LB, $points_LL, $points_LL_LB);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckLeftColumnAndPointsValues_OnManageChecklist_Tier2_3(Step\Acceptance\Checklist $I) {
        
        $I->comment("                                             ");
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultCoreValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LBCoreValue);
        $I->canSee('3', \Page\ChecklistManage::$IncludedMeasuresForm_LLCoreValue);
        $I->canSee('4', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLCoreValue);
        $I->comment("                                             ");
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveValue);
        
        $I->comment("---Points:---");
        $I->canSee('3', \Page\ChecklistManage::$IncludedPointsForm_DefaultCoreValue);
        $I->canSee('4', \Page\ChecklistManage::$IncludedPointsForm_LBCoreValue);
        $I->canSee('11', \Page\ChecklistManage::$IncludedPointsForm_LLCoreValue);
        $I->canSee('12', \Page\ChecklistManage::$IncludedPointsForm_LB_LLCoreValue);
        $I->comment("                                             ");
        $I->canSee('0', \Page\ChecklistManage::$IncludedPointsForm_DefaultElectiveValue);
        $I->canSee('9', \Page\ChecklistManage::$IncludedPointsForm_LBElectiveValue);
        $I->canSee('0', \Page\ChecklistManage::$IncludedPointsForm_LLElectiveValue);
        $I->canSee('9', \Page\ChecklistManage::$IncludedPointsForm_LB_LLElectiveValue);
        $I->wait(1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckRequiredPoints2_Tier3_3(\Step\Acceptance\Checklist $I) {
        $points_Default = '10';
        $points_LB      = '28';
        $points_LL      = '23';
        $points_LL_LB   = '41';
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier3__1st));
        $I->wait(3);
        $I->CheckSavedChecklistPoints($points_Default, $points_LB, $points_LL, $points_LL_LB);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckLeftColumnAndPointsValues_OnManageChecklist_Tier3_3(Step\Acceptance\Checklist $I) {
        
        $I->comment("                                             ");
        $I->canSee('0', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultCoreValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LBCoreValue);
        $I->canSee('1', \Page\ChecklistManage::$IncludedMeasuresForm_LLCoreValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLCoreValue);
        $I->comment("                                             ");
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_DefaultElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LBElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LLElectiveValue);
        $I->canSee('2', \Page\ChecklistManage::$IncludedMeasuresForm_LB_LLElectiveValue);
        
        $I->comment("---Points:---");
        $I->canSee('0', \Page\ChecklistManage::$IncludedPointsForm_DefaultCoreValue);
        $I->canSee('8', \Page\ChecklistManage::$IncludedPointsForm_LBCoreValue);
        $I->canSee('5', \Page\ChecklistManage::$IncludedPointsForm_LLCoreValue);
        $I->canSee('13', \Page\ChecklistManage::$IncludedPointsForm_LB_LLCoreValue);
        $I->comment("                                             ");
        $I->canSee('10', \Page\ChecklistManage::$IncludedPointsForm_DefaultElectiveValue);
        $I->canSee('10', \Page\ChecklistManage::$IncludedPointsForm_LBElectiveValue);
        $I->canSee('10', \Page\ChecklistManage::$IncludedPointsForm_LLElectiveValue);
        $I->canSee('10', \Page\ChecklistManage::$IncludedPointsForm_LB_LLElectiveValue);
        $I->wait(1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Publish_Tier1_Success(\Step\Acceptance\Checklist $I) {
        
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier1__1st));
        $I->wait(3);
        $I->PublishChecklistStatus($this->id_checklist_Tier1__1st);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckThatChecklistWasUpdated_CheckRequiredPoints_Tier2(\Step\Acceptance\Checklist $I) {
        $points_Default_draft = '5';
        $points_LB_draft      = '23';
        $points_LL_draft      = '17';//11
        $points_LL_LB_draft   = '35';//21
        
        $points_Default_new = '5';
        $points_LB_new      = '23';
        $points_LL_new      = '15';
        $points_LL_LB_new   = '33';
        
        //old checklist - draft
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier2__1st));
        $I->wait(3);
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        $I->CheckSavedChecklistPoints($points_Default_draft, $points_LB_draft, $points_LL_draft, $points_LL_LB_draft);
        $I->amOnPage(\Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier2__1st));
        $I->wait(5);
        $I->canSee('Published', \Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->canSee('Draft', \Page\ChecklistManage::StatusLine_VersionHistoryTab('2'));
        $I->canSee($this->id_checklist_Tier2__1st, \Page\ChecklistManage::IdLine_VersionHistoryTab('2'));
        $this->id_checklist_Tier2__2nd = $I->grabTextFrom(\Page\ChecklistManage::IdLine_VersionHistoryTab('1'));
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier2__2nd));
        $I->wait(3);
        $I->cantSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->CheckSavedChecklistPoints($points_Default_new, $points_LB_new, $points_LL_new, $points_LL_LB_new);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckThatChecklistWasUpdated_CheckRequiredPoints_Tier3(\Step\Acceptance\Checklist $I) {
        $points_Default_draft = '12';
        $points_LB_draft      = '38';
        $points_LL_draft      = '27';//23
        $points_LL_LB_draft   = '53';//41
        
        $points_Default_new = '12';
        $points_LB_new      = '30';
        $points_LL_new      = '27';
        $points_LL_LB_new   = '45';
        
        //old checklist - draft
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier3__1st));
        $I->wait(3);
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        $I->CheckSavedChecklistPoints($points_Default_draft, $points_LB_draft, $points_LL_draft, $points_LL_LB_draft);
        $I->amOnPage(\Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier3__1st));
        $I->wait(5);
        $I->canSee('Published', \Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->canSee('Draft', \Page\ChecklistManage::StatusLine_VersionHistoryTab('2'));
        $I->canSee($this->id_checklist_Tier3__1st, \Page\ChecklistManage::IdLine_VersionHistoryTab('2'));
        $this->id_checklist_Tier3__2nd = $I->grabTextFrom(\Page\ChecklistManage::IdLine_VersionHistoryTab('1'));
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier3__2nd));
        $I->wait(3);
        $I->cantSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->CheckSavedChecklistPoints($points_Default_new, $points_LB_new, $points_LL_new, $points_LL_LB_new);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOut4(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->Logout($I);
    }
    
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------Default business2 registration-----------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Default_Business2Registration_Tier1_Tier2_Tier3(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email_Bus2_Def = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business1_Default = $I->GenerateNameOf("bus2_Def");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip1;
        $city             = $this->city1;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = $this->bus1_busSquire_Default;
        $landscapeFootage = $this->bus1_landSquire_Default;
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(5);
        $I->waitForElement(Page\RegistrationStarted::$LeftMenu_GetStartedButton, 100);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_CheckMeasuresPresent_Default_CoreAndElective_Tier1(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check that Default measures with core&elective status are present in business checklist");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->canSee("0 tiername1 measures completed. A minimum of 0 tiername1 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->cantSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 0%;']);
        //Tier1 in left menu
        $I->canSee("Tiername1 Required Measures", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresLabel('1'));
        $I->canSee("Tiername1 Points", \Page\RegistrationStarted::LeftMenu_EarnedPointsLabel('1'));
        $I->canSee("0 of 0 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("0 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
        //Tier2 in left menu
        $I->canSee("Tier 2 Required Measures", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresLabel('2'));
        $I->canSee("Tier 2 Points", \Page\RegistrationStarted::LeftMenu_EarnedPointsLabel('2'));
        $I->canSee("0 of 1 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
        $I->canSee("0 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('2'));
        //Tier3 in left menu
        $I->canSee("Tiername3 Required Measures", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresLabel('3'));
        $I->canSee("Tiername3 Points", \Page\RegistrationStarted::LeftMenu_EarnedPointsLabel('3'));
        $I->canSee("0 of 0 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("3"));
        $I->canSee("0 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('3'));
        //Total in left menu
        $I->canSee("Total Points Earned: 0", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
        //Total 
        $I->canSee("0", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
        //Next Tier Button 
        $I->canSee("READY TO GET TO THE NEXT LEVEL?", Page\RegistrationStarted::$InfoForNextTierButton);
        $I->canSeeElement(Page\RegistrationStarted::$NextTierButton);
        
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure2Desc));
        $I->canSee("$this->pointsMeas2 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure2Desc));
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_Default_CompleteMeasure2(AcceptanceTester $I) {
        $measDesc = $this->measure2Desc;
        $value1   = '222';
                
        $I->wait(1);
        $I->comment("Complete Measure3 for Default business: $this->business2_Default");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure2]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(5);
        $I->canSee("0 tiername1 measures completed. A minimum of 0 tiername1 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->cantSeeElement(\Page\RegistrationStarted::$CoreProgressBarInfo);
        //Tier1 in left menu
        $I->canSee("0 of 0 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("2 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
        //Tier2 in left menu
        $I->canSee("0 of 1 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
        $I->canSee("2 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('2'));
        //Tier3 in left menu
        $I->canSee("0 of 0 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("3"));
        $I->canSee("2 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('3'));
        //Total in left menu
        $I->canSee("Total Points Earned: 2", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
        //Total 
        $I->canSee("2", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
        $I->canSee("tier desc1", Page\RegistrationStarted::$TierDescription_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_CheckOnReviewPage_Default_Tier1(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier1__1st));
        $I->wait(2);
        $I->canSee("tiername1 Review & Submit", \Page\ReviewAndSubmit::$ReviewTitle);
        
        $I->canSee("0 tiername1 measures completed. A minimum of 0 tiername1 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("2 tiername1 points earned. A minimum of 2 tiername1 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 100%;']);
        //Tier1
        $I->canSee("tiername1 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("tiername1 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("0 of 0 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("2 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("0 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("2 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        //Tier3
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('3'));
        $I->canSee("tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('3'));
        $I->canSee("0 of 0 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('3'));
        $I->canSee("2 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('3'));
        
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("2", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("2", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
        $I->cantSeeElement(Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->cantSeeElement(Page\ReviewAndSubmit::Review_GroupLine_ByName(Page\AuditGroupList::SolidWaste_AuditGroup));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_CheckOnReviewPage_Default_Tier2(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier2__2nd));
        $I->wait(2);
        $I->canSee("Tier 2 Review & Submit", \Page\ReviewAndSubmit::$ReviewTitle);
        
        $I->canSee("0 Tier 2 measures completed. A minimum of 1 Tier 2 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("2 Tier 2 points earned. A minimum of 5 Tier 2 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 40%;']);
        //Tier1
        $I->canSee("tiername1 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("tiername1 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("0 of 0 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("2 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("0 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("2 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        //Tier3
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('3'));
        $I->canSee("tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('3'));
        $I->canSee("0 of 0 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('3'));
        $I->canSee("2 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('3'));
        
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::NotStartedStatus);
        //Total
        $I->canSee("2", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
        $I->cantSeeElement(Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->cantSeeElement(Page\ReviewAndSubmit::Review_GroupLine_ByName(Page\AuditGroupList::SolidWaste_AuditGroup));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_CheckOnReviewPage_Default_Tier3(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier3__2nd));
        $I->wait(2);
        $I->canSee("tiername3 Review & Submit", \Page\ReviewAndSubmit::$ReviewTitle);
        
        $I->canSee("0 tiername3 measures completed. A minimum of 0 tiername3 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("2 tiername3 points earned. A minimum of 12 tiername3 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 17%;']);
        //Tier1
        $I->canSee("tiername1 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("tiername1 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("0 of 0 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("2 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("0 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("2 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        //Tier3
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('3'));
        $I->canSee("tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('3'));
        $I->canSee("0 of 0 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('3'));
        $I->canSee("2 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('3'));
        
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
        
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("2", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_Default_CompleteMeasure3(AcceptanceTester $I) {
        $measDesc = $this->measure3Desc;
        $value1   = '66';
                
        $I->wait(1);
        $I->comment("Complete Measure3 for Default business: $this->business1_Default");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy)."&tier_id=$this->id_checklist_Tier2__2nd");
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure3]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(6);
        $I->canSee("1 Tier 2 measures completed. A minimum of 1 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$CoreProgressBarInfo);
        //Tier1 in left menu
        $I->canSee("0 of 0 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("2 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
        //Tier2 in left menu
        $I->canSee("1 of 1 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
        $I->canSee("5 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('2'));
        //Tier3 in left menu
        $I->canSee("0 of 0 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("3"));
        $I->canSee("5 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('3'));
        //Total in left menu
        $I->canSee("Total Points Earned: 5", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
        //Total 
        $I->canSee("5", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_Default_CompleteMeasure7(AcceptanceTester $I) {
        $measDesc = $this->measure7Desc;
        $value1   = '2';
        $value2   = '1';
                
        $I->wait(1);
        $I->comment("Complete Measure7 for Default business: $this->business1_Default");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste)."&tier_id=$this->id_checklist_Tier3__1st");
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure7]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure7']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(5);
        $I->canSee("0 tiername3 measures completed. A minimum of 0 tiername3 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->cantSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->cantSeeElement(\Page\RegistrationStarted::$ElectiveProgressBarInfo);
        //Tier1 in left menu
        $I->canSee("0 of 0 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("2 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
        //Tier2 in left menu
        $I->canSee("1 of 1 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
        $I->canSee("5 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('2'));
        //Tier3 in left menu
        $I->canSee("0 of 0 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("3"));
        $I->canSee("12 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('3'));
        //Total in left menu
        $I->canSee("Total Points Earned: 12", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
        //Total 
        $I->canSee("12", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_CheckOnReviewPage_Default_Tier1_AfterMeasure7Completed(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier1__1st));
        $I->wait(2);
        $I->canSee("0 tiername1 measures completed. A minimum of 0 tiername1 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("2 tiername1 points earned. A minimum of 2 tiername1 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 100%;']);
        //Tier1
        $I->canSee("tiername1 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("tiername1 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("0 of 0 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("2 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("1 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("5 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        //Tier3
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('3'));
        $I->canSee("tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('3'));
        $I->canSee("0 of 0 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('3'));
        $I->canSee("12 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('3'));
        
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("2", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("12", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
        $I->cantSeeElement(Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->cantSeeElement(Page\ReviewAndSubmit::Review_GroupLine_ByName(Page\AuditGroupList::SolidWaste_AuditGroup));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_CheckOnReviewPage_Default_Tier2_AfterMeasure7Completed(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier2__2nd));
        $I->wait(2);
        $I->canSee("1 Tier 2 measures completed. A minimum of 1 Tier 2 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("5 Tier 2 points earned. A minimum of 5 Tier 2 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 100%;']);
        //Tier1
        $I->canSee("tiername1 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("tiername1 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("0 of 0 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("2 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("1 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("5 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        //Tier3
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('3'));
        $I->canSee("tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('3'));
        $I->canSee("0 of 0 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('3'));
        $I->canSee("12 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('3'));
        
        $I->canSee("1 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("3", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("12", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
        $I->cantSeeElement(Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->cantSeeElement(Page\ReviewAndSubmit::Review_GroupLine_ByName(Page\AuditGroupList::SolidWaste_AuditGroup));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_CheckOnReviewPage_Default_Tier3_AfterMeasure7Completed(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier3__2nd));
        $I->wait(2);
        $I->canSee("0 tiername3 measures completed. A minimum of 0 tiername3 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("12 tiername3 points earned. A minimum of 12 tiername3 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 100%;']);
        //Tier1
        $I->canSee("tiername1 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("tiername1 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("0 of 0 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("2 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("1 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("5 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        //Tier3
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('3'));
        $I->canSee("tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('3'));
        $I->canSee("0 of 0 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('3'));
        $I->canSee("12 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('3'));
        
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
        
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("7", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("12", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOutFromBusiness2(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->wait(1);
    }
    
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------Default business2 registration-----------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function LL_LB_Business4Registration_Tier1_Tier2_Tier3(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email_Bus4_LL_LB = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business4_LB_LL = $I->GenerateNameOf("bus4_LL_LB");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip1;
        $city             = $this->city1;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = $this->bus3_busSquire_LB_LL;
        $landscapeFootage = $this->bus3_landSquire_LB_LL;
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(5);
        $I->waitForElement(Page\RegistrationStarted::$LeftMenu_GetStartedButton, 100);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business4_CheckMeasuresPresent_LL_LB_CoreAndElective_Tier1(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check that Default measures with core&elective status are present in business checklist");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->canSee("0 tiername1 measures completed. A minimum of 1 tiername1 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("0 of 1 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
        //Tier1 in left menu
        $I->canSee("Tiername1 Required Measures", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresLabel('1'));
        $I->canSee("Tiername1 Points", \Page\RegistrationStarted::LeftMenu_EarnedPointsLabel('1'));
        $I->canSee("0 of 1 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("0 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
        //Tier2 in left menu
        $I->canSee("Tier 2 Required Measures", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresLabel('2'));
        $I->canSee("Tier 2 Points", \Page\RegistrationStarted::LeftMenu_EarnedPointsLabel('2'));
        $I->canSee("0 of 4 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
        $I->canSee("0 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('2'));
        //Tier3 in left menu
        $I->canSee("Tiername3 Required Measures", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresLabel('3'));
        $I->canSee("Tiername3 Points", \Page\RegistrationStarted::LeftMenu_EarnedPointsLabel('3'));
        $I->canSee("0 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("3"));
        $I->canSee("0 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('3'));
        //Total in left menu
        $I->canSee("Total Points Earned: 0", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
        //Total 
        $I->canSee("0", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
        //Next Tier Button 
        $I->canSee("READY TO GET TO THE NEXT LEVEL?", Page\RegistrationStarted::$InfoForNextTierButton);
        $I->canSeeElement(Page\RegistrationStarted::$NextTierButton);
        
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure2Desc));
        $I->canSee("$this->pointsMeas2 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure2Desc));
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure4Desc));
        $I->canSee("$this->pointsMeas4 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure4Desc));
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_SolidWasteGroupButton);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business4_LL_LB_CompleteMeasure2(AcceptanceTester $I) {
        $measDesc = $this->measure2Desc;
        $value1   = '222';
                
        $I->wait(1);
        $I->comment("Complete Measure2 for Default business: $this->business4_LB_LL");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure2]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(5);
        $I->canSee("0 tiername1 measures completed. A minimum of 1 tiername1 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("0 of 1 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
        //Tier1 in left menu
        $I->canSee("0 of 1 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("2 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
        //Tier2 in left menu
        $I->canSee("1 of 4 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
        $I->canSee("0 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('2'));
        //Tier3 in left menu
        $I->canSee("0 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("3"));
        $I->canSee("0 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('3'));
        //Total in left menu
        $I->canSee("Total Points Earned: 0", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
        //Total 
        $I->canSee("0", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
        $I->canSee("tier desc1", Page\RegistrationStarted::$TierDescription_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business4_CheckOnReviewPage_LL_LB_Tier1(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier1__1st));
        $I->wait(2);
        $I->canSee("tiername1 Review & Submit", \Page\ReviewAndSubmit::$ReviewTitle);
        
        $I->canSee("0 tiername1 measures completed. A minimum of 1 tiername1 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("2 tiername1 points earned. A minimum of 14 tiername1 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 15%;']);
        //Tier1
        $I->canSee("tiername1 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("tiername1 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("0 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("2 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("1 of 4 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("0 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        //Tier3
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('3'));
        $I->canSee("tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('3'));
        $I->canSee("0 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('3'));
        $I->canSee("0 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('3'));
        
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("2", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::InProgressStatus);
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("0", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business4_CheckOnReviewPage_LL_LB_Tier2(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier2__2nd));
        $I->wait(2);
        $I->canSee("Tier 2 Review & Submit", \Page\ReviewAndSubmit::$ReviewTitle);
        
        $I->canSee("1 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("0 Tier 2 points earned. A minimum of 33 Tier 2 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 25%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 0%;']);
        //Tier1
        $I->canSee("tiername1 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("tiername1 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("0 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("2 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("1 of 4 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("0 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        //Tier3
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('3'));
        $I->canSee("tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('3'));
        $I->canSee("0 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('3'));
        $I->canSee("0 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('3'));
        
        $I->canSee("1 /4", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::InProgressStatus);
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("0", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business4_CheckOnReviewPage_LL_LB_Tier3(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier3__2nd));
        $I->wait(2);
        $I->canSee("tiername3 Review & Submit", \Page\ReviewAndSubmit::$ReviewTitle);
        
        $I->canSee("0 tiername3 measures completed. A minimum of 2 tiername3 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("0 tiername3 points earned. A minimum of 45 tiername3 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 0%;']);
        //Tier1
        $I->canSee("tiername1 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("tiername1 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("0 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("2 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("1 of 4 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("0 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        //Tier3
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('3'));
        $I->canSee("tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('3'));
        $I->canSee("0 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('3'));
        $I->canSee("0 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('3'));
        
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::NotStartedStatus);
        
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::NotStartedStatus);
        //Total
        $I->canSee("0", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business4_LL_LB_CompleteMeasure3(AcceptanceTester $I) {
        $measDesc = $this->measure3Desc;
        $value1   = '66';
                
        $I->wait(1);
        $I->comment("Complete Measure3 for Default business: $this->business4_LB_LL");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy)."&tier_id=$this->id_checklist_Tier2__2nd");
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure3]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(6);
        $I->canSee("2 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSee("2 of 4 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
        //Tier1 in left menu
        $I->canSee("0 of 1 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("2 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
        //Tier2 in left menu
        $I->canSee("2 of 4 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
        $I->canSee("3 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('2'));
        //Tier3 in left menu
        $I->canSee("0 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("3"));
        $I->canSee("0 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('3'));
        //Total in left menu
        $I->canSee("Total Points Earned: 0", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
        //Total 
        $I->canSee("0", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business4_LL_LB_CompleteMeasure7(AcceptanceTester $I) {
        $measDesc = $this->measure7Desc;
        $value1   = '2';
        $value2   = '1';
                
        $I->wait(1);
        $I->comment("Complete Measure7 for Default business: $this->business4_LB_LL");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste)."&tier_id=$this->id_checklist_Tier3__2nd");
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure7]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure7']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(5);
        $I->canSee("0 tiername3 measures completed. A minimum of 2 tiername3 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->cantSeeElement(\Page\RegistrationStarted::$ElectiveProgressBarInfo);
        $I->canSee("0 of 1 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
        //Tier1 in left menu
        $I->canSee("0 of 1 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("2 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
        //Tier2 in left menu
        $I->canSee("2 of 4 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
        $I->canSee("3 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('2'));
        //Tier3 in left menu
        $I->canSee("0 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("3"));
        $I->canSee("7 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('3'));
        //Total in left menu
        $I->canSee("Total Points Earned: 0", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
        //Total 
        $I->canSee("0", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business4_LL_LB_CompleteMeasure8(AcceptanceTester $I) {
        $measDesc = $this->measure8Desc;
        $value1   = '111';
        
        $I->wait(1);
        $I->comment("Complete Measure8 for Default business: $this->business4_LB_LL");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste)."&tier_id=$this->id_checklist_Tier3__2nd");
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure8]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure8']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(5);
        $I->canSee("1 tiername3 measures completed. A minimum of 2 tiername3 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 50%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 100%;']);
        $I->cantSeeElement(\Page\RegistrationStarted::$ElectiveProgressBarInfo);
        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$CoreProgressBarInfo);
        //Tier1 in left menu
        $I->canSee("0 of 1 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("10 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
        //Tier2 in left menu
        $I->canSee("2 of 4 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
        $I->canSee("3 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('2'));
        //Tier3 in left menu
        $I->canSee("1 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("3"));
        $I->canSee("7 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('3'));
        //Total in left menu
        $I->canSee("Total Points Earned: 0", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
        //Total 
        $I->canSee("0", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business4_LL_LB_CompleteMeasure5(AcceptanceTester $I) {
        $measDesc = $this->measure5Desc;
        $value1   = '22';
        
        $I->wait(1);
        $I->comment("Complete Measure5 for Default business: $this->business4_LB_LL");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy)."&tier_id=$this->id_checklist_Tier3__2nd");
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure5]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(5);
        $I->canSee("2 tiername3 measures completed. A minimum of 2 tiername3 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 100%;']);
        $I->cantSeeElement(\Page\RegistrationStarted::$ElectiveProgressBarInfo);
        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$CoreProgressBarInfo);
        //Tier1 in left menu
        $I->canSee("0 of 1 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("10 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
        //Tier2 in left menu
        $I->canSee("2 of 4 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
        $I->canSee("3 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('2'));
        //Tier3 in left menu
        $I->canSee("2 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("3"));
        $I->canSee("12 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('3'));
        //Total in left menu
        $I->canSee("Total Points Earned: 0", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
        //Total 
        $I->canSee("0", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business4_LL_LB_CompleteMeasure4(AcceptanceTester $I) {
        $measDesc = $this->measure4Desc;
        $value1   = '22';
        
        $I->wait(1);
        $I->comment("Complete Measure4 for Default business: $this->business4_LB_LL");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy)."&tier_id=$this->id_checklist_Tier1__1st");
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure4]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(5);
        $I->canSee("1 tiername1 measures completed. A minimum of 1 tiername1 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->cantSeeElement(\Page\RegistrationStarted::$ElectiveProgressBarInfo);
        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$CoreProgressBarInfo);
        //Tier1 in left menu
        $I->canSee("1 of 1 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("14 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
        //Tier2 in left menu
        $I->canSee("2 of 4 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
        $I->canSee("17 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('2'));
        //Tier3 in left menu
        $I->canSee("2 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("3"));
        $I->canSee("26 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('3'));
        //Total in left menu
        $I->canSee("Total Points Earned: 14", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
        //Total 
        $I->canSee("14", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business4_LL_LB_CompleteMeasure6(AcceptanceTester $I) {
        $measDesc = $this->measure6Desc;
        $value1   = '22';
        
        $I->wait(1);
        $I->comment("Complete Measure4 for Default business: $this->business4_LB_LL");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy)."&tier_id=$this->id_checklist_Tier2__2nd");
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure6]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure6']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(5);
        $I->canSee("3 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 75%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 75%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 75%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 75%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("3 of 4 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
        //Tier1 in left menu
        $I->canSee("1 of 1 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("14 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
        //Tier2 in left menu
        $I->canSee("3 of 4 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
        $I->canSee("23 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('2'));
        //Tier3 in left menu
        $I->canSee("2 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("3"));
        $I->canSee("26 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('3'));
        //Total in left menu
        $I->canSee("Total Points Earned: 14", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
        //Total 
        $I->canSee("14", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business4_LL_LB_CompleteMeasure1(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
        $value1   = '22';
        $value2   = '2';
        
        $I->wait(1);
        $I->comment("Complete Measure4 for Default business: $this->business4_LB_LL");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy)."&tier_id=$this->id_checklist_Tier2__2nd");
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(5);
        $I->canSee("4 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$CoreProgressBarInfo);
        //Tier1 in left menu
        $I->canSee("1 of 1 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("14 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
        //Tier2 in left menu
        $I->canSee("4 of 4 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
        $I->canSee("24 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('2'));
        //Tier3 in left menu
        $I->canSee("2 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("3"));
        $I->canSee("26 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('3'));
        //Total in left menu
        $I->canSee("Total Points Earned: 14", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
        //Total 
        $I->canSee("14", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business4_LL_LB_CompleteMeasure9(AcceptanceTester $I) {
        $measDesc = $this->measure9Desc;
        $value1   = '22';
        
        $I->wait(1);
        $I->comment("Complete Measure4 for Default business: $this->business4_LB_LL");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste)."&tier_id=$this->id_checklist_Tier2__2nd");
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure9]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure9']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(5);
        $I->canSee("4 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 100%;']);
        $I->cantSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->cantSeeElement(\Page\RegistrationStarted::$ElectiveProgressBarInfo);
        //Tier1 in left menu
        $I->canSee("1 of 1 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("14 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
        //Tier2 in left menu
        $I->canSee("4 of 4 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
        $I->canSee("33 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('2'));
        //Tier3 in left menu
        $I->canSee("2 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("3"));
        $I->canSee("45 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('3'));
        //Total in left menu
        $I->canSee("Total Points Earned: 45", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
        //Total 
        $I->canSee("45", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business4_LL_LB_DeactivateMeasure4(AcceptanceTester $I) {
        $measDesc = $this->measure4Desc;
        
        $I->wait(1);
        $I->comment("Complete Measure4 for Default business: $this->business4_LB_LL");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy)."&tier_id=$this->id_checklist_Tier1__1st");
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure4]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'no');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(5);
        $I->canSee("0 tiername1 measures completed. A minimum of 1 tiername1 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->cantSeeElement(\Page\RegistrationStarted::$ElectiveProgressBarInfo);
        $I->canSee("0 of 1 required measures completed", \Page\RegistrationStarted::$CoreProgressBarInfo);
        //Tier1 in left menu
        $I->canSee("0 of 1 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("10 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
        //Tier2 in left menu
        $I->canSee("4 of 4 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
        $I->canSee("19 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('2'));
        //Tier3 in left menu
        $I->canSee("2 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("3"));
        $I->canSee("12 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('3'));
        //Total in left menu
        $I->canSee("Total Points Earned: 0", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
        //Total 
        $I->canSee("0", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business4_CheckOnReviewPage_LL_LB_Tier1_AfterDeactivatingMeasure(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier1__1st));
        $I->wait(2);
        $I->canSee("0 tiername1 measures completed. A minimum of 1 tiername1 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("10 tiername1 points earned. A minimum of 14 tiername1 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 72%;']);
        //Tier1
        $I->canSee("tiername1 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("tiername1 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("0 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("10 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("4 of 4 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("19 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        //Tier3
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('3'));
        $I->canSee("tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('3'));
        $I->canSee("2 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('3'));
        $I->canSee("12 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('3'));
        
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("2", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::InProgressStatus);
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("8", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("0", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business4_CheckOnReviewPage_LL_LB_Tier2_AfterDeactivatingMeasure(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier2__2nd));
        $I->wait(2);
        $I->canSee("4 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("19 Tier 2 points earned. A minimum of 33 Tier 2 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 58%;']);
        //Tier1
        $I->canSee("tiername1 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("tiername1 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("0 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("10 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("4 of 4 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("19 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        //Tier3
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('3'));
        $I->canSee("tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('3'));
        $I->canSee("2 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('3'));
        $I->canSee("12 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('3'));
        
        $I->canSee("4 /4", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("10", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("9", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("0", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business4_CheckOnReviewPage_LL_LB_Tier3_AfterDeactivatingMeasure(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier3__2nd));
        $I->wait(2);
        $I->canSee("2 tiername3 measures completed. A minimum of 2 tiername3 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("12 tiername3 points earned. A minimum of 45 tiername3 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 27%;']);
        //Tier1
        $I->canSee("tiername1 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("tiername1 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("0 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("10 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("4 of 4 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("19 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        //Tier3
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('3'));
        $I->canSee("tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('3'));
        $I->canSee("2 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('3'));
        $I->canSee("12 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('3'));
        
        $I->canSee("1 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("5", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
        
        $I->canSee("1 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("7", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("0", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business4_LL_LB_ActivateMeasure4(AcceptanceTester $I) {
        $measDesc = $this->measure4Desc;
        
        $I->wait(1);
        $I->comment("Complete Measure4 for Default business: $this->business4_LB_LL");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy)."&tier_id=$this->id_checklist_Tier1__1st");
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure4]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(5);
        $I->canSee("1 tiername1 measures completed. A minimum of 1 tiername1 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_SolidWasteGroup_ProgressBar, ['style' => 'width: 0%;']);
        $I->cantSeeElement(\Page\RegistrationStarted::$ElectiveProgressBarInfo);
        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$CoreProgressBarInfo);
        //Tier1 in left menu
        $I->canSee("1 of 1 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("14 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
        //Tier2 in left menu
        $I->canSee("4 of 4 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
        $I->canSee("33 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('2'));
        //Tier3 in left menu
        $I->canSee("2 of 2 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("3"));
        $I->canSee("45 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('3'));
        //Total in left menu
        $I->canSee("Total Points Earned: 45", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
        //Total 
        $I->canSee("45", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business4_CheckOnReviewPage_LL_LB_Tier1_AfterCompleting(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier1__1st));
        $I->wait(2);
        $I->canSee("1 tiername1 measures completed. A minimum of 1 tiername1 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("14 tiername1 points earned. A minimum of 14 tiername1 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 100%;']);
        //Tier1
        $I->canSee("tiername1 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("tiername1 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("1 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("14 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("4 of 4 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("33 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        //Tier3
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('3'));
        $I->canSee("tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('3'));
        $I->canSee("2 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('3'));
        $I->canSee("45 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('3'));
        
        $I->canSee("1 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("6", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("8", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("45", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business4_CheckOnReviewPage_LL_LB_Tier2_AfterCompleting(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier2__2nd));
        $I->wait(2);
        $I->canSee("4 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("33 Tier 2 points earned. A minimum of 33 Tier 2 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 100%;']);
        //Tier1
        $I->canSee("tiername1 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("tiername1 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("1 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("14 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("4 of 4 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("33 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        //Tier3
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('3'));
        $I->canSee("tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('3'));
        $I->canSee("2 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('3'));
        $I->canSee("45 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('3'));
        
        $I->canSee("4 /4", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("10", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("9", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("45", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business4_CheckOnReviewPage_LL_LB_Tier3_AfterCompleting(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier3__2nd));
        $I->wait(2);
        $I->canSee("2 tiername3 measures completed. A minimum of 2 tiername3 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("45 tiername3 points earned. A minimum of 45 tiername3 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 100%;']);
        //Tier1
        $I->canSee("tiername1 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("tiername1 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("1 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("14 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("4 of 4 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("33 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        //Tier3
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('3'));
        $I->canSee("tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('3'));
        $I->canSee("2 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('3'));
        $I->canSee("45 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('3'));
        
        $I->canSee("1 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("5", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
        
        $I->canSee("1 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("7", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("45", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOutFromBusiness4(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsAdmin($I);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    //public $statuses_Tier1_Updated   = ['elective', 'not set', 'core',  'core',    'not set', 'not set', 'core',  'elective', 'not set'];
    //public $extensions_Tier1_Updated = ['Default', 'Default', 'Default', 'Default', 'Default', 'Default', 'Default', 'Default', 'Default'];
    
    public function CloneTier1Checklist(\Step\Acceptance\Checklist $I) {
        $points_Default = '23';
        $points_LB      = '23';
        $points_LL      = '23';
        $points_LL_LB_old = '14';
        
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier1__1st));
        $I->wait(3);
        $I->click(Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('1'));
        $I->wait(3);
        $I->reloadPage();
        $I->wait(3);
        $this->id_checklist_Tier1__3rd = $I->grabTextFrom(Page\ChecklistManage::IdLine_VersionHistoryTab('1'));
        $I->canSee($this->id_checklist_Tier1__1st, Page\ChecklistManage::IdLine_VersionHistoryTab('2'));
        $I->PublishChecklistStatus($this->id_checklist_Tier1__3rd);
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier1__3rd));
        $I->wait(3);
        $I->selectOption(\Page\ChecklistManage::$Filter_ByStatusSelect, "View All");
        $I->wait(2);
        $I->ManageChecklist($this->measuresDesc_SuccessCreated, $this->statuses_Tier1_Updated, $this->extensions_Tier1_Updated);
        $I->wait(2);
        $I->canSeeElement(\Page\ChecklistManage::$ChecklistWarningPopup);
        $I->wait(1);
        $I->click(\Page\ChecklistManage::$ChecklistWarningPopup_YesButton);
        $I->wait(10);
        $I->reloadPage();
        $I->wait(2);
        $I->UpdateChecklistPoints($points_Default, $points_LB, $points_LL);
        $I->wait(2);
        $I->CheckSavedChecklistPoints($points_Default, $points_LB, $points_LL, $points_LL_LB_old);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckRequiredPoints_Tier2___(\Step\Acceptance\Checklist $I) {
        $points_Default_draft = '26';
        $points_LB_draft      = '36';
        $points_LL_draft      = '32';
        $points_LL_LB_draft   = '33';
        
        $points_Default = '23';
        $points_LB      = '32';
        $points_LL      = '31';
        $points_LL_LB   = '31';
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier2__2nd));
        $I->wait(3);
        $I->CheckSavedChecklistPoints($points_Default_draft, $points_LB_draft, $points_LL_draft, $points_LL_LB_draft);
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier2__2nd));
        $I->wait(3);
        $I->canSee($this->id_checklist_Tier2__2nd, Page\ChecklistManage::IdLine_VersionHistoryTab('2'));
        $I->canSee($this->id_checklist_Tier2__1st, Page\ChecklistManage::IdLine_VersionHistoryTab('3'));
        $I->canSee('Draft', Page\ChecklistManage::StatusLine_VersionHistoryTab('2'));
        $I->canSee('Draft', Page\ChecklistManage::StatusLine_VersionHistoryTab('3'));
        $I->canSee('Published', Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
        $this->id_checklist_Tier2__3rd = $I->grabTextFrom(Page\ChecklistManage::IdLine_VersionHistoryTab('1'));
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier2__3rd));
        $I->wait(3);
        $I->CheckSavedChecklistPoints($points_Default, $points_LB, $points_LL, $points_LL_LB);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckRequiredPoints_Tier3___(\Step\Acceptance\Checklist $I) {
        $points_Default_draft = '30';
        $points_LB_draft      = '39';
        $points_LL_draft      = '43';
        $points_LL_LB_draft   = '43';
        
        $points_Default = '23';
        $points_LB      = '32';
        $points_LL      = '36';
        $points_LL_LB   = '36';
        
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier3__2nd));
        $I->wait(3);
        $I->CheckSavedChecklistPoints($points_Default_draft, $points_LB_draft, $points_LL_draft, $points_LL_LB_draft);
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_checklist_Tier3__2nd));
        $I->wait(3);
        $I->canSee($this->id_checklist_Tier3__2nd, Page\ChecklistManage::IdLine_VersionHistoryTab('2'));
        $I->canSee($this->id_checklist_Tier3__1st, Page\ChecklistManage::IdLine_VersionHistoryTab('3'));
        $I->canSee('Draft', Page\ChecklistManage::StatusLine_VersionHistoryTab('2'));
        $I->canSee('Draft', Page\ChecklistManage::StatusLine_VersionHistoryTab('3'));
        $I->canSee('Published', Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
        $this->id_checklist_Tier3__3rd = $I->grabTextFrom(Page\ChecklistManage::IdLine_VersionHistoryTab('1'));
        $I->amOnPage(Page\ChecklistManage::URL($this->id_checklist_Tier3__3rd));
        $I->wait(3);
        $I->CheckSavedChecklistPoints($points_Default, $points_LB, $points_LL, $points_LL_LB);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOut__(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->email_Bus1_Def, $this->password, $I, 'user');
    }
    
    
    
    //Check in old businesses
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_CheckOnReviewPage_Default_Tier2(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier2__1st));
        $I->wait(2);
        $I->canSee("1 Tier 2 measures completed. A minimum of 1 Tier 2 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("3 Tier 2 points earned. A minimum of 3 Tier 2 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 100%;']);
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("1 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("3 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier3
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("0 of 0 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("10 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        
        $I->canSee("1 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("3", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("10", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
        $I->cantSeeElement(Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->cantSeeElement(Page\ReviewAndSubmit::Review_GroupLine_ByName(Page\AuditGroupList::SolidWaste_AuditGroup));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_CheckOnReviewPage_Default_Tier3(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier3__1st));
        $I->wait(2);
        $I->canSee("0 tiername3 measures completed. A minimum of 0 tiername3 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("10 tiername3 points earned. A minimum of 10 tiername3 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 100%;']);
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("1 of 1 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("3 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier3
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("0 of 0 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("10 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::CompleteStatus);
        
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("7", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("10", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
  
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function SubmitBusiness1_ReviewAndSubmitPage(AcceptanceTester $I) {
        $I->wait(2);
        $I->amOnPage(\Page\ReviewAndSubmit::$URL);
        $I->wait(2);
        $I->scrollTo(Page\ReviewAndSubmit::$SubmitMyApplicationButton);
        $I->wait(1);
        $I->click(Page\ReviewAndSubmit::$SubmitMyApplicationButton);
        $I->wait(2);
        $I->waitForElement(".confirm", 150);
        $I->wait(1);
        $I->click(".confirm");
        $I->wait(4);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckMeasuresPresent_Default_CoreAndElective_Tier2__(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check that Default measures with core&elective status are present in business checklist");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->canSee("1 Tier 2 measures completed. A minimum of 1 Tier 2 measures are required.", \Page\RegistrationStarted::$TotalMeasuresInfo_ProgressBar);
        $I->canSeeElement(\Page\RegistrationStarted::$TotalCompletedMeasures_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$CoreCompletedProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_GetStarted_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSeeElement(\Page\RegistrationStarted::$LeftMenu_EnergyGroup_ProgressBar, ['style' => 'width: 100%;']);
        $I->canSee("You have completed all measures.", \Page\RegistrationStarted::$CoreProgressBarInfo);
        //Tier2 in left menu
        $I->canSee("Tier 2 Required Measures", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresLabel('1'));
        $I->canSee("Tier 2 Points", \Page\RegistrationStarted::LeftMenu_EarnedPointsLabel('1'));
        $I->canSee("1 of 1 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("1"));
        $I->canSee("3 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('1'));
        //Tier3 in left menu
        $I->canSee("Tiername3 Required Measures", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresLabel('2'));
        $I->canSee("Tiername3 Points", \Page\RegistrationStarted::LeftMenu_EarnedPointsLabel('2'));
        $I->canSee("0 of 0 measures completed", \Page\RegistrationStarted::LeftMenu_CompletedMeasuresInfo("2"));
        $I->canSee("10 points earned", \Page\RegistrationStarted::LeftMenu_EarnedPointsInfo('2'));
        //Total in left menu
        $I->canSee("Total Points Earned: 10", \Page\RegistrationStarted::$LeftMenu_TotalPointsEarnedInfo);
        //Total 
        $I->canSee("10", Page\RegistrationStarted::$TotalPointsCount_RightBlock);
        //Next Tier Button 
        $I->canSee("READY TO GET TO THE NEXT LEVEL?", Page\RegistrationStarted::$InfoForNextTierButton);
        $I->canSeeElement(Page\RegistrationStarted::$NextTierButton);
        
        $I->canSeeElement(Page\RegistrationStarted::MeasureDescription_ByDesc($this->measure3Desc));
        $I->canSee("$this->pointsMeas3 Points", \Page\RegistrationStarted::MeasurePoints_ByDesc($this->measure3Desc));
        $I->canSeeElement(Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_CheckPointsOnTierStatusPage(AcceptanceTester $I) {
        $I->wait(2);
        $I->amOnPage(\Page\MyStatus_TierStatus::$URL);
        $I->wait(2);
        $I->canSee("Tier 2", \Page\MyStatus_TierStatus::TierName_TierPointLevelsBlock('1'));
        $I->canSee("3 Points", \Page\MyStatus_TierStatus::TierPoints_TierPointLevelsBlock('1'));
        $I->canSee("Tiername3", \Page\MyStatus_TierStatus::TierName_TierPointLevelsBlock('2'));
        $I->canSee("10 Points", \Page\MyStatus_TierStatus::TierPoints_TierPointLevelsBlock('2'));
        //Tier level
        $I->canSee("Tier 2", \Page\MyStatus_TierStatus::$TierName);
        $I->canSee("3", \Page\MyStatus_TierStatus::$PointsEarnedCount);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOutFromBusiness1_(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->email_Bus3_LL_LB, $this->password, $I, 'user');
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_CheckOnReviewPage_LL_LB_Tier2__(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier2__1st));
        $I->wait(2);
        $I->canSee("1 Tier 2 measures completed. A minimum of 4 Tier 2 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("3 Tier 2 points earned. A minimum of 21 Tier 2 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 25%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 15%;']);
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("1 of 4 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("3 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier3
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("0 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("7 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        
        $I->canSee("1 /4", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("3", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::InProgressStatus);
        $I->canSee("0 /0", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::CompleteStatus);
        //Total
        $I->canSee("0", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_CheckOnReviewPage_LL_LB_Tier3__(AcceptanceTester $I) {
        $I->wait(1);
        $I->comment("Check on Review Page - Default");
        $I->amOnPage(\Page\ReviewAndSubmit::URL_BusinessLogin($this->id_checklist_Tier3__1st));
        $I->wait(2);
        $I->canSee("0 tiername3 measures completed. A minimum of 2 tiername3 measures are required.", \Page\ReviewAndSubmit::$TotalCoreMeasuresInfo_ProgressBar);
        $I->canSee("7 tiername3 points earned. A minimum of 41 tiername3 points are required.", \Page\ReviewAndSubmit::$TotalPointsInfo_ProgressBar);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalCoreMeasures_ProgressBar, ['style' => 'width: 0%;']);
        $I->canSeeElement(\Page\ReviewAndSubmit::$TotalPoints_ProgressBar, ['style' => 'width: 18%;']);
        //Tier2
        $I->canSee("Tier 2 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('1'));
        $I->canSee("Tier 2 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('1'));
        $I->canSee("1 of 4 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('1'));
        $I->canSee("3 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('1'));
        //Tier3
        $I->canSee("tiername3 Required Measures", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresLabel('2'));
        $I->canSee("tiername3 Points", \Page\ReviewAndSubmit::TierProgress_EarnedPointsLabel('2'));
        $I->canSee("0 of 2 measures completed", \Page\ReviewAndSubmit::TierProgress_CompletedMeasuresInfo('2'));
        $I->canSee("7 points earned", \Page\ReviewAndSubmit::TierProgress_EarnedPointsInfo('2'));
        
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_Energy));
        $I->canSee("0", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::Energy_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_Energy).Page\ReviewAndSubmit::InProgressStatus);
        
        $I->canSee("0 /1", Page\ReviewAndSubmit::Review_CoreLine_ByName($this->audSubgroup1_SolidWaste));
        $I->canSee("7", Page\ReviewAndSubmit::Review_PointsLine_ByGroupName(Page\AuditGroupList::SolidWaste_AuditGroup));
        $I->canSeeElement(Page\ReviewAndSubmit::Review_StatusInPointsColumnLine_ByGroupName($this->audSubgroup1_SolidWaste).Page\ReviewAndSubmit::InProgressStatus);
        //Total
        $I->canSee("0", Page\ReviewAndSubmit::$TotalPointsCount_RightBlock);
    }
}
