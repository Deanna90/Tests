<?php


class CompletionNotificationsCest
{
    public $state;
    public $audSubgroup1_Energy, $id_audSubgroup1_Energy;
    public $audSubgroup1_SolidWaste, $id_audSubgroup1_SolidWaste, $audSubgroup2_SolidWaste, $id_audSubgroup2_SolidWaste;
    public $audSubgroup1_Pollution, $id_audSubgroup1_Pollution, $audSubgroup2_Pollution, $id_audSubgroup2_Pollution;
    public $audSubgroup1_Water, $id_audSubgroup1_Water;
    public $audSubgroup1_Community, $id_audSubgroup1_Community;
    public $measure1Desc, $idMeasure1;
    public $measure2Desc, $idMeasure2;
    public $measure3Desc, $idMeasure3;
    public $measure4Desc, $idMeasure4;
    public $measure5Desc, $idMeasure5;
    public $measure6Desc, $idMeasure6;
    public $measure7Desc, $idMeasure7;
    public $measure8Desc, $idMeasure8;
    public $measure9Desc, $idMeasure9;
    public $measure10Desc, $idMeasure10;
    public $measure11Desc, $idMeasure11;
    public $measure12Desc, $idMeasure12;
    public $measuresDesc_SuccessCreated = [];
    public $city1, $zip1, $program1, $city2, $zip2, $program2, $city3, $zip3, $program3, $county;
    public $id_program1, $id_program2, $id_program3;
    public $statusesT2 = ['elective', 'elective', 'core',    'core',    'elective', 'elective', 'elective', 'core',    'elective', 'core',    'not set',  'not set'];
    public $statusesT3 = ['not set',  'not set',  'not set', 'not set', 'core',     'not set',  'not set',  'not set', 'not set',  'not set', 'elective', 'core'];
    public $emailStateAdmin, $emailCoordinator;
    public $password = 'Qq!1111111';
    public $idStateAdmin, $idCoordinator;
    public $id_checklist_P1_T2, $id_checklist_P1_T3, $id_checklist_P2_T2, $id_checklist_P2_T3, $id_checklist_P3_T2, $id_checklist_P3_T3;
    public $business1, $business2, $business3, $id_business1, $id_business2, $id_business3;
    public $email_Bus1;
    public $email_Bus2;
    public $email_Bus3;
    public $SL_message_Energy_Water_EMAIL, $SL_message_Community, $SL_message_Solid_EMAIL;
    public $Subject_SL_message_Energy_Water_EMAIL, $Body_SL_message_Energy_Water_EMAIL, $Subject_SL_message_Solid_EMAIL, $Body_SL_message_Solid_EMAIL;
    public $P1L_message_Energy_Solid_Community, $P1L_message_Pollution_EMAIL;
    public $Subject_P1L_message_Pollution_EMAIL, $Body_P1L_message_Pollution_EMAIL;
    public $P2L_message_Solid, $P2L_message_Community_EMAIL, $P2L_message_Water_EMAIL;
    public $Subject_P2L_message_Community_EMAIL, $Body_P2L_message_Community_EMAIL, $Subject_P2L_message_Water_EMAIL, $Body_P2L_message_Water_EMAIL;
    public $P3L_message_Energy_Pollution;
    
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
        $name = $this->state = $I->GenerateNameOf("StComplNotif");
        $shortName = 'CN';
        
        $I->CreateState($name, $shortName);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_SelectDefaultState(AcceptanceTester $I)
    {
        $I->SelectDefaultState($I, $this->state);
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
//        $I->wait(1);
        $I->reloadPage();
        $I->waitPageLoad();
//        $I->wait(4);
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(2);
        $I->waitPageLoad();
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(2);
        $I->waitPageLoad();
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
//        $I->wait(1);
        $I->LoginAsUser($this->emailStateAdmin, $this->password, $I, 'state admin');
//        $I->wait(2);
    }
    
    //--------------------------Create audit subgroups--------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateAuditSubGroup1_ForEnergyGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name      = $this->audSubgroup1_Energy = $I->GenerateNameOf("EnAudSub1");
        $auditGroup = Page\AuditGroupList::Energy_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $this->id_audSubgroup1_Energy = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateAuditSubGroup1_ForSolidWasteGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup1_SolidWaste = $I->GenerateNameOf("SolWasAudSub1");
        $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $this->id_audSubgroup1_SolidWaste = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateAuditSubGroup2_ForSolidWasteGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup2_SolidWaste = $I->GenerateNameOf("SolWasAudSub2");
        $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $this->id_audSubgroup2_SolidWaste = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateAuditSubGroup1_ForPollutionGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup1_Pollution = $I->GenerateNameOf("PolAudSub1");
        $auditGroup = Page\AuditGroupList::PollutionPrevention_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $this->id_audSubgroup1_Pollution = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateAuditSubGroup2_ForPollutionGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup2_Pollution = $I->GenerateNameOf("PolAudSub2");
        $auditGroup = Page\AuditGroupList::PollutionPrevention_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $this->id_audSubgroup2_Pollution = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateAuditSubGroup1_ForWaterGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup1_Water = $I->GenerateNameOf("WatAudSub1");
        $auditGroup = Page\AuditGroupList::Water_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $this->id_audSubgroup1_Water = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateAuditSubGroup1_ForCommunityGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup1_Community = $I->GenerateNameOf("ComAudSub1");
        $auditGroup = Page\AuditGroupList::Community_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $this->id_audSubgroup1_Community = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure1_Quant_WithoutSubmeasure(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure1Desc = $I->GenerateNameOf("Description_1 quant Without Submeasure ");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure2_Quant_WithoutSubmeasure(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure2Desc = $I->GenerateNameOf("Description_2 quant Without Submeasure ");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure2 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure3_Quant_WithoutSubmeasure(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure3Desc = $I->GenerateNameOf("Description_3 quant Without Submeasure ");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure3 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure4_Quant_WithoutSubmeasure(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure4Desc = $I->GenerateNameOf("Description_4 quant Without Submeasure ");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup2_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure4 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure5_Quant_WithoutSubmeasure(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure5Desc = $I->GenerateNameOf("Description_5 quant Without Submeasure ");
        $auditGroup     = \Page\AuditGroupList::PollutionPrevention_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Pollution;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure5 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure6_Quant_WithoutSubmeasure(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure6Desc = $I->GenerateNameOf("Description_6 quant Without Submeasure ");
        $auditGroup     = \Page\AuditGroupList::PollutionPrevention_AuditGroup;
        $auditSubgroup  = $this->audSubgroup2_Pollution;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure6 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure7_Quant_WithoutSubmeasure(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure7Desc = $I->GenerateNameOf("Description_7 quant Without Submeasure ");
        $auditGroup     = \Page\AuditGroupList::Water_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Water;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure7 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure8_Quant_WithoutSubmeasure(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure8Desc = $I->GenerateNameOf("Description_8 quant Without Submeasure ");
        $auditGroup     = \Page\AuditGroupList::Water_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Water;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure8 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure9_Quant_WithoutSubmeasure(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure9Desc = $I->GenerateNameOf("Description_9 quant Without Submeasure ");
        $auditGroup     = \Page\AuditGroupList::Community_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Community;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure9 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure10_Quant_WithoutSubmeasure(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure10Desc = $I->GenerateNameOf("Description_10 quant Without Submeasure ");
        $auditGroup     = \Page\AuditGroupList::Community_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Community;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure10 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure11_Quant_WithoutSubmeasure(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure11Desc = $I->GenerateNameOf("Description_11 quant Without Submeasure ");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure11 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure12_Quant_WithoutSubmeasure(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure12Desc = $I->GenerateNameOf("Description_12 quant Without Submeasure ");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup2_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure12 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    //-------------------------------Create county------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateCounty(\Step\Acceptance\County $I) {
        $name    = $this->county = $I->GenerateNameOf("County");
        $state   = $this->state;
        
        $I->CreateCounty($name, $state);
    }
    
    //--------------------------Create city and program-------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city1 = $I->GenerateNameOf("City1");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip1 = $I->GenerateZipCode();
        $program = $this->program1 = $I->GenerateNameOf("Prog1");
        $county  = $this->county;
        
        $I->CreateCity($city, $state, $zips, $county);
        $Y->CreateProgram($program, $state, $cityArr);
        $prog = $Y->GetProgramOnPageInList($program);
        $this->id_program1 = $prog['id'];
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateCity2_And_Program2(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city2 = $I->GenerateNameOf("City2");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip2 = $I->GenerateZipCode();
        $program = $this->program2 = $I->GenerateNameOf("Prog2");
        $county  = $this->county;
        
        $I->CreateCity($city, $state, $zips, $county);
        $Y->CreateProgram($program, $state, $cityArr);
        $prog = $Y->GetProgramOnPageInList($program);
        $this->id_program2 = $prog['id'];
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateCity3_And_Program3(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city3 = $I->GenerateNameOf("City3");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip3 = $I->GenerateZipCode();
        $program = $this->program3 = $I->GenerateNameOf("Prog3");
        $county  = $this->county;
        
        $I->CreateCity($city, $state, $zips, $county);
        $Y->CreateProgram($program, $state, $cityArr);
        $prog = $Y->GetProgramOnPageInList($program);
        $this->id_program3 = $prog['id'];
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
        $I->waitPageLoad();
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(2);
        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1);
        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
        $I->wait(1);
        $I->waitPageLoad();
        $coordinator = $I->GetUserOnPageInList($email, $userType);
        $this->idCoordinator = $coordinator['id'];
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function SectorChecklistCreate_Tier2(\Step\Acceptance\SectorChecklist $I)
    {
        $number           = '2';
        $sector           = \Page\SectorList::DefaultSectorOfficeRetail;
               
        $I->CreateSectorChecklist($number, $sector);
        $I->ManageSectorChecklist($this->measuresDesc_SuccessCreated, $this->statusesT2);
        $I->UpdateDefineTotalValue($extension = 'def', $auditGroup = \Page\AuditGroupList::Energy_AuditGroup, $subgroup = $this->audSubgroup1_Energy, '1');
        $I->UpdateDefineTotalValue($extension = 'll', $auditGroup = \Page\AuditGroupList::Energy_AuditGroup, $subgroup = $this->audSubgroup1_Energy, '1');
        $I->UpdateDefineTotalValue($extension = 'lb', $auditGroup = \Page\AuditGroupList::Energy_AuditGroup, $subgroup = $this->audSubgroup1_Energy, '1');
        $I->UpdateDefineTotalValue($extension = 'all', $auditGroup = \Page\AuditGroupList::Energy_AuditGroup, $subgroup = $this->audSubgroup1_Energy, '1');
        
        $I->UpdateDefineTotalValue($extension = 'def', $auditGroup = \Page\AuditGroupList::Water_AuditGroup, $subgroup = $this->audSubgroup1_Water, '1');
        $I->UpdateDefineTotalValue($extension = 'll', $auditGroup = \Page\AuditGroupList::Water_AuditGroup, $subgroup = $this->audSubgroup1_Water, '1');
        $I->UpdateDefineTotalValue($extension = 'lb', $auditGroup = \Page\AuditGroupList::Water_AuditGroup, $subgroup = $this->audSubgroup1_Water, '1');
        $I->UpdateDefineTotalValue($extension = 'all', $auditGroup = \Page\AuditGroupList::Water_AuditGroup, $subgroup = $this->audSubgroup1_Water, '1');
        $I->PublishSectorChecklistStatus();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function SectorChecklistCreate_Tier3(\Step\Acceptance\SectorChecklist $I)
    {
        $number           = '3';
        $sector           = \Page\SectorList::DefaultSectorOfficeRetail;
               
        $I->CreateSectorChecklist($number, $sector);
        $I->ManageSectorChecklist($this->measuresDesc_SuccessCreated, $this->statusesT3);
        $I->UpdateDefineTotalValue($extension = 'def', $auditGroup = \Page\AuditGroupList::SolidWaste_AuditGroup, $subgroup = $this->audSubgroup1_SolidWaste, '1');
        $I->UpdateDefineTotalValue($extension = 'll', $auditGroup = \Page\AuditGroupList::SolidWaste_AuditGroup, $subgroup = $this->audSubgroup1_SolidWaste, '1');
        $I->UpdateDefineTotalValue($extension = 'lb', $auditGroup = \Page\AuditGroupList::SolidWaste_AuditGroup, $subgroup = $this->audSubgroup1_SolidWaste, '1');
        $I->UpdateDefineTotalValue($extension = 'all', $auditGroup = \Page\AuditGroupList::SolidWaste_AuditGroup, $subgroup = $this->audSubgroup1_SolidWaste, '1');
        $I->PublishSectorChecklistStatus();
    }
    
    //-------------------------Activate Tier 3----------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Program1_ActivateAndUpdateTier3(\Step\Acceptance\Tier $I) {
        $program    = $this->program1;
        $tier3      = '3';
        $tier3Name  = null;
        $tier3Desc  = null;
        $tier3OptIn = 'yes';
        
        $I->amOnPage(Page\TierManage::URL());
        $I->canSee($program, Page\TierManage::$ProgramOption);
        $I->selectOption(Page\TierManage::$ProgramSelect, $program);
        $I->wait(4);
        $I->waitPageLoad();
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
    
    public function Program2_ActivateAndUpdateTier3(\Step\Acceptance\Tier $I) {
        $program    = $this->program2;
        $tier3      = '3';
        $tier3Name  = null;
        $tier3Desc  = null;
        $tier3OptIn = 'yes';
        
        $I->amOnPage(Page\TierManage::URL());
        $I->canSee($program, Page\TierManage::$ProgramOption);
        $I->selectOption(Page\TierManage::$ProgramSelect, $program);
        $I->wait(4);
        $I->waitPageLoad();
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
    
    public function Program3_ActivateAndUpdateTier3(\Step\Acceptance\Tier $I) {
        $program    = $this->program3;
        $tier3      = '3';
        $tier3Name  = null;
        $tier3Desc  = null;
        $tier3OptIn = 'yes';
        
        $I->amOnPage(Page\TierManage::URL());
        $I->canSee($program, Page\TierManage::$ProgramOption);
        $I->selectOption(Page\TierManage::$ProgramSelect, $program);
        $I->wait(4);
        $I->waitPageLoad();
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
    
    public function GetChecklistIDs_Program1(\Step\Acceptance\Checklist $I) {
        $program = $this->program1;
        $sector  = 'Office / Retail';
        
        $I->amOnPage(Page\ChecklistList::URL());
        $this->id_checklist_P1_T2 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($program, $sector, 'Tier 2'));
        $this->id_checklist_P1_T3 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($program, $sector, 'Tier 3'));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function GetChecklistIDs_Program2(\Step\Acceptance\Checklist $I) {
        $program = $this->program2;
        $sector  = 'Office / Retail';
        
        $I->amOnPage(Page\ChecklistList::URL());
        $this->id_checklist_P2_T2 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($program, $sector, 'Tier 2'));
        $this->id_checklist_P2_T3 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($program, $sector, 'Tier 3'));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function GetChecklistIDs_Program3(\Step\Acceptance\Checklist $I) {
        $program = $this->program3;
        $sector  = 'Office / Retail';
        
        $I->amOnPage(Page\ChecklistList::URL());
        $this->id_checklist_P3_T2 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($program, $sector, 'Tier 2'));
        $this->id_checklist_P3_T3 = $I->grabTextFrom(Page\ChecklistList::Id_ByProg_Sect_Tier_Line($program, $sector, 'Tier 3'));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function StateLevel_CreateCompletionNotification1_Energy_Water_Email(\Step\Acceptance\CompletionNotifications $I) {
        $program = null;
        $this->SL_message_Energy_Water_EMAIL = $message = $I->GenerateNameOf("Message to business State Level--Energy&Water--Email ");
        $auditGroupsArray = [\Page\AuditGroupList::Energy_AuditGroup, \Page\AuditGroupList::Water_AuditGroup];
        $sendEmail = 'yes';
        $this->Subject_SL_message_Energy_Water_EMAIL = $emailSubject = $I->GenerateNameOf("Email subject State Level--Energy&Water--Email ");
        $this->Body_SL_message_Energy_Water_EMAIL = $emailBody = $I->GenerateNameOf("Email body State Level--Energy&Water--Email ");
        
        $I->CreateCompletionNotification($program, $message, $auditGroupsArray, $sendEmail, $emailSubject, $emailBody);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function StateLevel_CreateCompletionNotification2_Community(\Step\Acceptance\CompletionNotifications $I) {
        $program = null;
        $this->SL_message_Community = $message = $I->GenerateNameOf("Message to business State Level--Community ");
        $auditGroupsArray = [\Page\AuditGroupList::Community_AuditGroup];
        $sendEmail = 'no';
        $emailSubject = null;
        $emailBody = null;
        
        $I->CreateCompletionNotification($program, $message, $auditGroupsArray, $sendEmail, $emailSubject, $emailBody);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function StateLevel_CreateCompletionNotification3_Solid_Email(\Step\Acceptance\CompletionNotifications $I) {
        $program = null;
        $this->SL_message_Solid_EMAIL = $message = $I->GenerateNameOf("Message to business State Level--Solid--Email ");
        $auditGroupsArray = [\Page\AuditGroupList::SolidWaste_AuditGroup];
        $sendEmail = 'yes';
        $this->Subject_SL_message_Solid_EMAIL = $emailSubject = $I->GenerateNameOf("Email subject State Level--Solid--Email ");
        $this->Body_SL_message_Solid_EMAIL = $emailBody = $I->GenerateNameOf("Email body State Level--Solid--Email ");
        
        $I->CreateCompletionNotification($program, $message, $auditGroupsArray, $sendEmail, $emailSubject, $emailBody);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Program1Level_CreateCompletionNotification1_Energy_Solid_Community(\Step\Acceptance\CompletionNotifications $I) {
        $program = $this->program1;
        $this->P1L_message_Energy_Solid_Community = $message = $I->GenerateNameOf("Message to business Program1 Level--Energy&Solid&Community ");
        $auditGroupsArray = [\Page\AuditGroupList::Energy_AuditGroup, \Page\AuditGroupList::SolidWaste_AuditGroup, \Page\AuditGroupList::Community_AuditGroup];
        $sendEmail = 'no';
        $emailSubject = null;
        $emailBody = null;
        
        $I->CreateCompletionNotification($program, $message, $auditGroupsArray, $sendEmail, $emailSubject, $emailBody);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Program1Level_CreateCompletionNotification2_Pollution_Email(\Step\Acceptance\CompletionNotifications $I) {
        $program = $this->program1;
        $this->P1L_message_Pollution_EMAIL = $message = $I->GenerateNameOf("Message to business Program1 Level--Pollution--Email ");
        $auditGroupsArray = [\Page\AuditGroupList::PollutionPrevention_AuditGroup];
        $sendEmail = 'yes';
        $this->Subject_P1L_message_Pollution_EMAIL = $emailSubject = $I->GenerateNameOf("Email subject Program1 Level--Pollution--Email ");
        $this->Body_P1L_message_Pollution_EMAIL = $emailBody = $I->GenerateNameOf("Email body Program1 Level--Pollution--Email ");
        
        $I->CreateCompletionNotification($program, $message, $auditGroupsArray, $sendEmail, $emailSubject, $emailBody);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Program2Level_CreateCompletionNotification1_Solid(\Step\Acceptance\CompletionNotifications $I) {
        $program = $this->program2;
        $this->P2L_message_Solid = $message = $I->GenerateNameOf("Message to business Program2 Level--Solid ");
        $auditGroupsArray = [\Page\AuditGroupList::SolidWaste_AuditGroup];
        $sendEmail    = 'no';
        $emailSubject = null;
        $emailBody    = null;
        
        $I->CreateCompletionNotification($program, $message, $auditGroupsArray, $sendEmail, $emailSubject, $emailBody);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Program2Level_CreateCompletionNotification2_Community_Email(\Step\Acceptance\CompletionNotifications $I) {
        $program = $this->program2;
        $this->P2L_message_Community_EMAIL = $message = $I->GenerateNameOf("Message to business Program2 Level--Community--Email ");
        $auditGroupsArray = [\Page\AuditGroupList::Community_AuditGroup];
        $sendEmail = 'yes';
        $this->Subject_P2L_message_Community_EMAIL = $emailSubject = $I->GenerateNameOf("Email subject Program2 Level--Community--Email ");
        $this->Body_P2L_message_Community_EMAIL = $emailBody = $I->GenerateNameOf("Email body Program2 Level--Community--Email ");
        
        $I->CreateCompletionNotification($program, $message, $auditGroupsArray, $sendEmail, $emailSubject, $emailBody);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Program2Level_CreateCompletionNotification3_Water_Email(\Step\Acceptance\CompletionNotifications $I) {
        $program = $this->program2;
        $this->P2L_message_Water_EMAIL = $message = $I->GenerateNameOf("Message to business Program2 Level--Water--Email ");
        $auditGroupsArray = [\Page\AuditGroupList::Water_AuditGroup];
        $sendEmail = 'yes';
        $this->Subject_P2L_message_Water_EMAIL = $emailSubject = $I->GenerateNameOf("Email subject Program2 Level--Water--Email ");
        $this->Body_P2L_message_Water_EMAIL = $emailBody = $I->GenerateNameOf("Email body Program2 Level--Water--Email ");
        
        $I->CreateCompletionNotification($program, $message, $auditGroupsArray, $sendEmail, $emailSubject, $emailBody);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Program3Level_CreateCompletionNotification1_Energy_Pollution(\Step\Acceptance\CompletionNotifications $I) {
        $program = $this->program3;
        $this->P3L_message_Energy_Pollution = $message = $I->GenerateNameOf("Message to business Program3 Level--Energy&Pollution ");
        $auditGroupsArray = [\Page\AuditGroupList::Energy_AuditGroup, \Page\AuditGroupList::PollutionPrevention_AuditGroup];
        $sendEmail = 'no';
        $emailSubject = null;
        $emailBody = null;
        
        $I->CreateCompletionNotification($program, $message, $auditGroupsArray, $sendEmail, $emailSubject, $emailBody);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Program1_EnableNotifications(\Step\Acceptance\CompletionNotifications $I) {
        $program = $this->program1;
        
        $I->amOnPage(\Page\CompletionNotificationsOptInSettings::URL());
        $I->click(\Page\CompletionNotificationsOptInSettings::CompleteAuditGroupToggleButtonLine_ByNameValue($program));
        $I->wait(2);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Program3_EnableNotifications(\Step\Acceptance\CompletionNotifications $I) {
        $program = $this->program3;
        
        $I->amOnPage(\Page\CompletionNotificationsOptInSettings::URL());
        $I->click(\Page\CompletionNotificationsOptInSettings::CompleteAuditGroupToggleButtonLine_ByNameValue($program));
        $I->wait(2);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOut11(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email_Bus1 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business1 = $I->GenerateNameOf("busnam1");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip1;
        $city             = $this->city1;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_Energy_MessageAbsent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->P1L_message_Energy_Solid_Community);
        $I->cantSee($this->SL_message_Energy_Water_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_Solid_MessageAbsent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->P1L_message_Energy_Solid_Community);
        $I->cantSee($this->SL_message_Solid_EMAIL);
        
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_SolidWaste));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->P1L_message_Energy_Solid_Community);
        $I->cantSee($this->SL_message_Solid_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_Solid_MessageAbsent_Tier3(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste)."&tier_id=$this->id_checklist_P1_T3");
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->P1L_message_Energy_Solid_Community);
        $I->cantSee($this->SL_message_Solid_EMAIL);
        
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_SolidWaste)."&tier_id=$this->id_checklist_P1_T3");
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->P1L_message_Energy_Solid_Community);
        $I->cantSee($this->SL_message_Solid_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_Pollution_MessageAbsent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Pollution));
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->P1L_message_Pollution_EMAIL);
        
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_Pollution));
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->P1L_message_Pollution_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_Pollution_MessageAbsent_Tier3(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Pollution)."&tier_id=$this->id_checklist_P1_T3");
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->P1L_message_Pollution_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_Water_MessageAbsent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Water));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->SL_message_Energy_Water_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_Community_MessageAbsent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Community));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->P1L_message_Energy_Solid_Community);
        $I->cantSee($this->SL_message_Community);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_CompleteMeasure1_NA_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
                
        $I->comment("Complete Measure1 for business: $this->business1");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'na');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_Energy_MessagePresent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->P1L_message_Energy_Solid_Community);
        $I->cantSee($this->SL_message_Energy_Water_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Energy_EmailAbsent_Business1_CommunicationTab(\Step\Acceptance\Communication $I){
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $I->cantSee($this->Subject_SL_message_Energy_Water_EMAIL, Page\CommunicationsList::$SubjectColumnRow);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_CompleteMeasure5_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure5Desc;
                
        $I->comment("Complete Measure5 for business: $this->business1");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Pollution));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure5]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_Pollution_MessagePresent1(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Pollution));
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->P1L_message_Pollution_EMAIL);
        
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_Pollution));
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->P1L_message_Pollution_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_Pollution_MessagePresent1_Tier3(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Pollution)."&tier_id=$this->id_checklist_P1_T3");
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->P1L_message_Pollution_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Pollution_EmailPresent_Business1_CommunicationTab(\Step\Acceptance\Communication $I){
        $subject                = $this->Subject_P1L_message_Pollution_EMAIL;
        $body                   = $this->Body_P1L_message_Pollution_EMAIL;
        $sender                 = $this->business1;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $row = $I->GetNotificationRowOnCommunicationListForBusiness($subject);
        $I->canSee($this->program1, Page\CommunicationsList::SenderLine($row));
        $I->canSee($subject, Page\CommunicationsList::SubjectLine($row));
        $I->click(Page\CommunicationsList::ViewButtonLine($row));
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSee("Inbox - $subject", Page\CommunicationsView::$Title);
        $I->canSee($body, Page\CommunicationsView::PreviousMessage('1'));
        $I->canSee($sender, \Page\CommunicationsView::PreviousMessageSender('1'));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_CompleteMeasure6_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure6Desc;
                
        $I->comment("Complete Measure6 for business: $this->business1");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_Pollution));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure6]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure6']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_Pollution_MessagePresent2(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Pollution));
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->P1L_message_Pollution_EMAIL);
        
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_Pollution));
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->P1L_message_Pollution_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Pollution_Only1EmailPresent_Business1_CommunicationTab(\Step\Acceptance\Communication $I){
        $subject                = $this->Subject_P1L_message_Pollution_EMAIL;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $count= $I->GetCountOfSameNotificationOnCommunicationListForBusiness($subject);
        $I->assertEquals('1', $count);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_CompleteMeasure3_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure3Desc;
                
        $I->comment("Complete Measure3 for business: $this->business1");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure3]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_Solid_MessageStillAbsent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->P1L_message_Energy_Solid_Community);
        $I->cantSee($this->SL_message_Solid_EMAIL);
        
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_SolidWaste));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->P1L_message_Energy_Solid_Community);
        $I->cantSee($this->SL_message_Solid_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Solid_EmailAbsent_Business1_CommunicationTab(\Step\Acceptance\Communication $I){
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $I->cantSee($this->Subject_SL_message_Solid_EMAIL, Page\CommunicationsList::$SubjectColumnRow);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_CompleteMeasure4_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure4Desc;
                
        $I->comment("Complete Measure4 for business: $this->business1");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_SolidWaste));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure4]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_Solid_MessagePresent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->P1L_message_Energy_Solid_Community);
        $I->cantSee($this->SL_message_Solid_EMAIL);
        
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_SolidWaste));
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->P1L_message_Energy_Solid_Community);
        $I->cantSee($this->SL_message_Solid_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_Solid_MessageAbsent2_Tier3(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste)."&tier_id=$this->id_checklist_P1_T3");
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->P1L_message_Energy_Solid_Community);
        $I->cantSee($this->SL_message_Solid_EMAIL);
        
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_SolidWaste)."&tier_id=$this->id_checklist_P1_T3");
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->P1L_message_Energy_Solid_Community);
        $I->cantSee($this->SL_message_Solid_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Solid_EmailAbsent2_Business1_CommunicationTab(\Step\Acceptance\Communication $I){
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $I->cantSee($this->Subject_SL_message_Solid_EMAIL, Page\CommunicationsList::$SubjectColumnRow);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_CompleteMeasure8_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure8Desc;
                
        $I->comment("Complete Measure8 for business: $this->business1");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Water));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure8]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure8']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_Water_MessageStillAbsent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Water));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->SL_message_Energy_Water_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Water_EmailAbsent_Business1_CommunicationTab(\Step\Acceptance\Communication $I){
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $I->cantSee($this->Subject_SL_message_Energy_Water_EMAIL, Page\CommunicationsList::$SubjectColumnRow);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_CompleteMeasure7_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure7Desc;
                
        $I->comment("Complete Measure7 for business: $this->business1");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Water));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure7]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure7']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_Water_MessagePresent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Water));
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->SL_message_Energy_Water_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Water_EmailPresent_Business1_CommunicationTab(\Step\Acceptance\Communication $I){
        $subject                = $this->Subject_SL_message_Energy_Water_EMAIL;
        $body                   = $this->Body_SL_message_Energy_Water_EMAIL;
        $sender                 = $this->business1;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $row = $I->GetNotificationRowOnCommunicationListForBusiness($subject);
        $I->canSee($this->program1, Page\CommunicationsList::SenderLine($row));
        $I->canSee($subject, Page\CommunicationsList::SubjectLine($row));
        $I->click(Page\CommunicationsList::ViewButtonLine($row));
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSee("Inbox - $subject", Page\CommunicationsView::$Title);
        $I->canSee($body, Page\CommunicationsView::PreviousMessage('1'));
        $I->canSee($sender, \Page\CommunicationsView::PreviousMessageSender('1'));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_CompleteMeasure9_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure9Desc;
                
        $I->comment("Complete Measure9 for business: $this->business1");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Community));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure9]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure9']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_Community_MessageStillAbsent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Community));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->P1L_message_Energy_Solid_Community);
        $I->cantSee($this->SL_message_Community);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_CompleteMeasure10_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure10Desc;
                
        $I->comment("Complete Measure10 for business: $this->business1");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Community));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure10]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure10']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_Community_MessagePresent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Community)."&tier_id=$this->id_checklist_P1_T2");
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->P1L_message_Energy_Solid_Community);
        $I->cantSee($this->SL_message_Community);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_DeactivateMeasure7_No_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure7Desc;
                
        $I->comment("Complete Measure7 for business: $this->business1");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Water)."&tier_id=$this->id_checklist_P1_T2");
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure7]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure7']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'no');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_Water_CheckMessageWasDisappeared(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Water)."&tier_id=$this->id_checklist_P1_T2");
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->SL_message_Energy_Water_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_AgainActivateMeasure7_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure7Desc;
                
        $I->comment("Complete Measure7 for business: $this->business1");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Water)."&tier_id=$this->id_checklist_P1_T2");
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure7]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure7']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business1_Water_MessageWasAppeared(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Water)."&tier_id=$this->id_checklist_P1_T2");
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->SL_message_Energy_Water_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Water_Only1EmailIsSent_Business1_CommunicationTab(\Step\Acceptance\Communication $I){
        $subject                = $this->Subject_SL_message_Energy_Water_EMAIL;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $count= $I->GetCountOfSameNotificationOnCommunicationListForBusiness($subject);
        $I->assertEquals('1', $count);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOut1(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email_Bus2 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business2 = $I->GenerateNameOf("busnam2");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip2;
        $city             = $this->city2;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_Energy_MessageAbsent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->SL_message_Energy_Water_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_Solid_MessageAbsent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->P2L_message_Solid);
        $I->cantSee($this->SL_message_Solid_EMAIL);
        
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_SolidWaste));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->P2L_message_Solid);
        $I->cantSee($this->SL_message_Solid_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_Pollution_MessageAbsent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Pollution));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_Pollution));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_Water_MessageAbsent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Water));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->P2L_message_Water_EMAIL);
        $I->cantSee($this->SL_message_Energy_Water_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_Community_MessageAbsent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Community));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->P2L_message_Community_EMAIL);
        $I->cantSee($this->SL_message_Community);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_CompleteMeasure1_NA_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
                
        $I->comment("Complete Measure1 for business: $this->business2");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'na');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_CompleteMeasure5_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure5Desc;
                
        $I->comment("Complete Measure5 for business: $this->business2");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Pollution));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure5]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_CompleteMeasure6_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure6Desc;
                
        $I->comment("Complete Measure6 for business: $this->business2");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_Pollution));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure6]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure6']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_CompleteMeasure3_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure3Desc;
                
        $I->comment("Complete Measure3 for business: $this->business2");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure3]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_CompleteMeasure4_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure4Desc;
                
        $I->comment("Complete Measure4 for business: $this->business2");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_SolidWaste));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure4]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_CompleteMeasure8_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure8Desc;
                
        $I->comment("Complete Measure8 for business: $this->business2");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Water));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure8]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure8']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_CompleteMeasure7_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure7Desc;
                
        $I->comment("Complete Measure7 for business: $this->business2");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Water));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure7]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure7']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_CompleteMeasure9_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure9Desc;
                
        $I->comment("Complete Measure9 for business: $this->business2");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Community));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure9]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure9']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_Energy_MessageStillAbsent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->SL_message_Energy_Water_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_Solid_MessageStillAbsent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->P2L_message_Solid);
        $I->cantSee($this->SL_message_Solid_EMAIL);
        
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_SolidWaste));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->P2L_message_Solid);
        $I->cantSee($this->SL_message_Solid_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_Pollution_MessageStillAbsent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Pollution));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_Pollution));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_Water_MessageStillAbsent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Water));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->P2L_message_Water_EMAIL);
        $I->cantSee($this->SL_message_Energy_Water_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_Community_MessageStillAbsent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Community));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->P2L_message_Community_EMAIL);
        $I->cantSee($this->SL_message_Community);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOut2(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    /**
     * @group admin
     * @group coordinator
     */
    
    public function Help_LoginAsNationalAdmin114(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    /**
     * @group stateadmin
     */
    
    public function LogOut_And_LogInAsStateAdmin23(AcceptanceTester $I)
    {
        $I->LoginAsUser($this->emailStateAdmin, $this->password, $I, 'state admin');
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Program2_EnableNotifications(\Step\Acceptance\CompletionNotifications $I) {
        $program = $this->program2;
        
        $I->amOnPage(\Page\CompletionNotificationsOptInSettings::URL());
        $I->click(\Page\CompletionNotificationsOptInSettings::CompleteAuditGroupToggleButtonLine_ByNameValue($program));
        $I->wait(2);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOut12(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LoginAsBusiness2(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LoginAsUser($this->email_Bus2, $this->password, $I, 'user');
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_Energy_MessagePresent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy)."&tier_id=$this->id_checklist_P2_T2");
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->SL_message_Energy_Water_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Energy_EmailAbsent_Business2_CommunicationTab(\Step\Acceptance\Communication $I){
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $I->cantSee($this->Subject_SL_message_Energy_Water_EMAIL, Page\CommunicationsList::$SubjectColumnRow);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_Solid_MessagePresent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste)."&tier_id=$this->id_checklist_P2_T2");
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->P2L_message_Solid);
        $I->cantSee($this->SL_message_Solid_EMAIL);
        
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_SolidWaste)."&tier_id=$this->id_checklist_P2_T2");
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->P2L_message_Solid);
        $I->cantSee($this->SL_message_Solid_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_Solid_MessagePresent_Tier3_(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste)."&tier_id=$this->id_checklist_P2_T3");
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->P2L_message_Solid);
        $I->cantSee($this->SL_message_Solid_EMAIL);
        
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_SolidWaste)."&tier_id=$this->id_checklist_P2_T3");
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->P2L_message_Solid);
        $I->cantSee($this->SL_message_Solid_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Solid_EmailAbsent_Business2_CommunicationTab(\Step\Acceptance\Communication $I){
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $I->cantSee($this->Subject_SL_message_Solid_EMAIL, Page\CommunicationsList::$SubjectColumnRow);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_Pollution_MessageAbsent_(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Pollution)."&tier_id=$this->id_checklist_P2_T2");
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_Pollution)."&tier_id=$this->id_checklist_P2_T2");
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_Pollution_MessageAbsent_Tier3(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Pollution)."&tier_id=$this->id_checklist_P2_T3");
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_Water_MessagePresent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Water)."&tier_id=$this->id_checklist_P2_T2");
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->P2L_message_Water_EMAIL);
        $I->cantSee($this->SL_message_Energy_Water_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Water_EmailAbsent_Business2_CommunicationTab(\Step\Acceptance\Communication $I){
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $I->cantSee($this->Subject_P2L_message_Water_EMAIL, Page\CommunicationsList::$SubjectColumnRow);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_Community_MessageAbsent2(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Community)."&tier_id=$this->id_checklist_P2_T2");
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->P2L_message_Community_EMAIL);
        $I->cantSee($this->SL_message_Community);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_CompleteMeasure10_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure10Desc;
                
        $I->comment("Complete Measure10 for business: $this->business2");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Community));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure10]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure10']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_Community_MessagePresent1(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Community)."&tier_id=$this->id_checklist_P2_T2");
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->P2L_message_Community_EMAIL);
        $I->cantSee($this->SL_message_Community);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Community_EmailAbsent_Business2_CommunicationTab(\Step\Acceptance\Communication $I){
        $subject = $this->Subject_P2L_message_Community_EMAIL;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $I->canSee($subject, Page\CommunicationsList::$SubjectColumnRow);
        $count= $I->GetCountOfSameNotificationOnCommunicationListForBusiness($subject);
        $I->assertEquals('1', $count);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_CompleteMeasure11_Yes_Answer_Tier3(AcceptanceTester $I) {
        $measDesc = $this->measure11Desc;
                
        $I->comment("Complete Measure11 for business: $this->business2");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste)."&tier_id=$this->id_checklist_P2_T3");
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure11]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure11']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_Solid_MessageStillAbsent_Tier3(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->P2L_message_Solid);
        $I->cantSee($this->SL_message_Solid_EMAIL);
        
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_SolidWaste));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->P2L_message_Solid);
        $I->cantSee($this->SL_message_Solid_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_CompleteMeasure12_Yes_Answer_Tier3(AcceptanceTester $I) {
        $measDesc = $this->measure12Desc;
                
        $I->comment("Complete Measure12 for business: $this->business2");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_SolidWaste)."&tier_id=$this->id_checklist_P2_T3");
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure12]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure12']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_Solid_MessagePresent_Tier3(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->P2L_message_Solid);
        $I->cantSee($this->SL_message_Solid_EMAIL);
        
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_SolidWaste));
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->P2L_message_Solid);
        $I->cantSee($this->SL_message_Solid_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_DeactivateMeasure7_No_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure7Desc;
                
        $I->comment("Complete Measure7 for business: $this->business2");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Water)."&tier_id=$this->id_checklist_P2_T2");
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure7]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure7']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'no');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_Water_CheckMessageWasDisappeared(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Water)."&tier_id=$this->id_checklist_P2_T2");
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->P2L_message_Water_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_AgainActivateMeasure7_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure7Desc;
                
        $I->comment("Complete Measure7 for business: $this->business1");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Water)."&tier_id=$this->id_checklist_P2_T2");
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure7]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure7']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_Water_MessageWasAppeared(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Water)."&tier_id=$this->id_checklist_P2_T2");
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->P2L_message_Water_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Water_Only1EmailIsSent_Business2_CommunicationTab(\Step\Acceptance\Communication $I){
        $subject                = $this->Subject_P2L_message_Water_EMAIL;
        $body                   = $this->Body_P2L_message_Water_EMAIL;
        $sender                 = $this->business2;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $count= $I->GetCountOfSameNotificationOnCommunicationListForBusiness($subject);
        $I->assertEquals('1', $count);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOut13(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email_Bus3 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business3 = $I->GenerateNameOf("busnam3");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip3;
        $city             = $this->city3;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_CompleteMeasure1_NA_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
                
        $I->comment("Complete Measure1 for business: $this->business3");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'na');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_Energy_MessagePresent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->P3L_message_Energy_Pollution);
        $I->cantSee($this->SL_message_Energy_Water_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Energy_EmailAbsent_Business3_CommunicationTab(\Step\Acceptance\Communication $I){
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $I->cantSee($this->Subject_SL_message_Energy_Water_EMAIL, Page\CommunicationsList::$SubjectColumnRow);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_CompleteMeasure5_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure5Desc;
                
        $I->comment("Complete Measure5 for business: $this->business3");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Pollution));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure5]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_Pollution_MessagePresent1(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Pollution));
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->P3L_message_Energy_Pollution);
        
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_Pollution));
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->P3L_message_Energy_Pollution);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_Pollution_MessagePresent1_Tier3(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Pollution)."&tier_id=$this->id_checklist_P3_T3");
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->P3L_message_Energy_Pollution);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Pollution_EmailPresent_Business3_CommunicationTab(\Step\Acceptance\Communication $I){
        $subject                = $this->Subject_P1L_message_Pollution_EMAIL;
        $body                   = $this->Body_P1L_message_Pollution_EMAIL;
        $sender                 = $this->business1;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $I->cantSee($this->Subject_P1L_message_Pollution_EMAIL, Page\CommunicationsList::$SubjectColumnRow);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_CompleteMeasure6_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure6Desc;
                
        $I->comment("Complete Measure6 for business: $this->business3");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_Pollution));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure6]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure6']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_Pollution_MessagePresent2(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Pollution));
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->P3L_message_Energy_Pollution);
        
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_Pollution));
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->P3L_message_Energy_Pollution);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_CompleteMeasure3_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure3Desc;
                
        $I->comment("Complete Measure3 for business: $this->business3");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure3]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_Solid_MessageStillAbsent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->SL_message_Solid_EMAIL);
        
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_SolidWaste));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->SL_message_Solid_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Solid_EmailAbsent_Business3_CommunicationTab(\Step\Acceptance\Communication $I){
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $I->cantSee($this->Subject_SL_message_Solid_EMAIL, Page\CommunicationsList::$SubjectColumnRow);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_CompleteMeasure4_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure4Desc;
                
        $I->comment("Complete Measure4 for business: $this->business3");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_SolidWaste));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure4]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_Solid_MessagePresent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->SL_message_Solid_EMAIL);
        
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_SolidWaste));
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->SL_message_Solid_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_Solid_MessageAbsent2_Tier3(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste)."&tier_id=$this->id_checklist_P3_T3");
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->SL_message_Solid_EMAIL);
        
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_SolidWaste)."&tier_id=$this->id_checklist_P3_T3");
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->SL_message_Solid_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Solid_EmailAbsent2_Business3_CommunicationTab(\Step\Acceptance\Communication $I){
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $I->canSee($this->Subject_SL_message_Solid_EMAIL, Page\CommunicationsList::$SubjectColumnRow);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_CompleteMeasure8_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure8Desc;
                
        $I->comment("Complete Measure8 for business: $this->business3");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Water));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure8]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure8']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_Water_MessageStillAbsent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Water));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->SL_message_Energy_Water_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Water_EmailAbsent_Business3_CommunicationTab(\Step\Acceptance\Communication $I){
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $I->cantSee($this->Subject_SL_message_Energy_Water_EMAIL, Page\CommunicationsList::$SubjectColumnRow);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_CompleteMeasure7_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure7Desc;
                
        $I->comment("Complete Measure7 for business: $this->business3");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Water));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure7]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure7']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_Water_MessagePresent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Water));
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->SL_message_Energy_Water_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Water_EmailPresent_Business3_CommunicationTab(\Step\Acceptance\Communication $I){
        $subject                = $this->Subject_SL_message_Energy_Water_EMAIL;
        $body                   = $this->Body_SL_message_Energy_Water_EMAIL;
        $sender                 = $this->business3;
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\CommunicationsList::URL());
        $row = $I->GetNotificationRowOnCommunicationListForBusiness($subject);
        $I->canSee($this->program3, Page\CommunicationsList::SenderLine($row));
        $I->canSee($subject, Page\CommunicationsList::SubjectLine($row));
        $I->click(Page\CommunicationsList::ViewButtonLine($row));
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSee("Inbox - $subject", Page\CommunicationsView::$Title);
        $I->canSee($body, Page\CommunicationsView::PreviousMessage('1'));
        $I->canSee($sender, \Page\CommunicationsView::PreviousMessageSender('1'));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_CompleteMeasure9_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure9Desc;
                
        $I->comment("Complete Measure9 for business: $this->business3");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Community));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure9]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure9']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_Community_MessageStillAbsent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Community));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->SL_message_Community);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_CompleteMeasure10_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure10Desc;
                
        $I->comment("Complete Measure10 for business: $this->business3");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Community));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure10]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure10']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_Community_MessagePresent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Community)."&tier_id=$this->id_checklist_P3_T2");
        $I->canSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->canSee($this->SL_message_Community);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOut3(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    /**
     * @group admin
     * @group coordinator
     */
    
    public function Help_LoginAsNationalAdmin11(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    /**
     * @group stateadmin
     */
    
    public function LogOut_And_LogInAsStateAdmin22(AcceptanceTester $I)
    {
        $I->LoginAsUser($this->emailStateAdmin, $this->password, $I, 'state admin');
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Program3_DisableNotifications(\Step\Acceptance\CompletionNotifications $I) {
        $program = $this->program3;
        
        $I->amOnPage(\Page\CompletionNotificationsOptInSettings::URL());
        $I->makeElementVisible(["[name=opt_in]"], $style = 'visibility');
        $I->wait(2);
        $I->selectOption(\Page\CompletionNotificationsOptInSettings::CompleteAuditGroupToggleButtonSelectLine_ByNameValue($program), 'no');
        $I->wait(3);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOut122(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LoginAsBusiness3(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->LoginAsUser($this->email_Bus3, $this->password, $I, 'user');
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_Energy_MessageAbsent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->SL_message_Energy_Water_EMAIL);
        $I->cantSee($this->P3L_message_Energy_Pollution);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_Solid_MessageAbsent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_SolidWaste));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->SL_message_Solid_EMAIL);
        
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_SolidWaste));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->SL_message_Solid_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_Pollution_MessageAbsent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Pollution));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->P3L_message_Energy_Pollution);
        
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup2_Pollution));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->P3L_message_Energy_Pollution);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_Water_MessageAbsent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Water));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->SL_message_Energy_Water_EMAIL);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_Community_MessageAbsent(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Community));
        $I->cantSeeElement(\Page\RegistrationStarted::$CompletionMessage);
        $I->cantSee($this->SL_message_Community);
    }
    
    /**
     * @group coordinator
     */
    
    public function LogOut_And_LogInAsCoordinator(AcceptanceTester $I)
    {
        $I->Logout($I);
        $I->LoginAsUser($this->emailCoordinator, $this->password, $I, 'coordinator');
    }
    
    /**
     * @group coordinator
     */
    
    public function AccessError_CompletionNotificationsListPage(AcceptanceTester $I)
    {
        $I->amOnPage(Page\CompletionNotificationsManage::URL());
        $I->canSeePageNotFound($I);
    }
    
    /**
     * @group coordinator
     */
    
    public function AccessError_CompletionNotificationsOptInPage(AcceptanceTester $I)
    {
        $I->amOnPage(Page\CompletionNotificationsOptInSettings::URL());
        $I->canSeePageNotFound($I);
    }
}
