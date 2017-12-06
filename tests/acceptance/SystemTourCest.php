<?php


class SystemTourCest
{
    public $stateName, $cityName1, $cityName2, $cityName3, $progName1, $progName2, $zip1, $zip2, $zip31, $zip32, $sector11, $sector12, $sector21;
    public $audSubgroup1_Energy, $audSubgroup2_Energy, $audSubgroup3_Energy, $audSubgroup4_Energy, $audSubgroup5_Energy;
    public $audSubgroup1_General;
    public $audSubgroup1_PollutionPrevention;
    public $audSubgroup1_SolidWaste;
    public $audSubgroup1_Transportation;
    public $audSubgroup1_Wastewater;
    public $audSubgroup1_Water;
    public $measuresDesc_Energy = [];
    public $measuresDesc_Energy_sub1 = [];
    public $measuresDesc_Energy_sub2 = [];
    public $measuresDesc_Energy_sub4 = [];
    public $statuses1 = ['core', 'elective', 'not set', 'core', 'elective', 'elective', 'elective', 'not set', 'core'];
    public $statuses2 = ['elective', 'elective', 'not set', 'elective', 'core', 'core', 'elective', 'elective', 'elective'];
    public $statuses3 = ['not set', 'core', 'not set', 'core', 'elective', 'elective', 'elective', 'not set', 'core'];
    public $statuses4 = ['elective', 'core', 'elective', 'core', 'elective', 'elective', 'elective', 'not set', 'core'];
    public $statnew1 = [];
    public $statnew2 = [];
    public $statnew3 = [];
    public $measureDesc1, $measureDesc2, $measureDesc3, $measureDesc4, $measureDesc5, $measureDesc6, $measureDesc7, $measureDesc8, $measureDesc9;
    
    public function LogInAsAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    public function CreateState(\Step\Acceptance\State $I)
    {
        $I->wantTo("Create state");
        $name      = $this->stateName = $I->GenerateNameOf("State");
        $shortName = "SN";
        $weighted  = 'yes';
        
        $I->CreateState($name, $shortName, $weighted);
        $I->wait(2);
        $I->seeInCurrentUrl(\Page\StateList::URL());
    }
    
    public function SelectState(\Step\Acceptance\City $I)
    {
        $I->wantTo("Select default state");
        $state     = $this->stateName;
        
        $I->SelectDefaultState($I, $state);
    }
    
    //--------------------------------------------------------------------------Create Cities-----------------------------------------------------------------------------------
    
    public function CreateCity1(\Step\Acceptance\City $I)
    {
        $I->wantTo("Create city#1 in default state");
        $name       = $this->cityName1 = $I->GenerateNameOf("City1");
        $state      = $this->stateName;
        $this->zip1 = $zips = $I->GenerateZipCode();
        
        $I->CreateCity($name, $state, $zips);
        $I->wait(2);
    }
    
    public function CreateCity2(\Step\Acceptance\City $I)
    {
        $I->wantTo("Create city#2 in default state");
        $name       = $this->cityName2 = $I->GenerateNameOf("City2");
        $state      = $this->stateName;
        $this->zip2 = $zips = $I->GenerateZipCode();
        
        $I->CreateCity($name, $state, $zips);
        $I->wait(2);
    }
    
    public function CreateCity3(\Step\Acceptance\City $I)
    {
        $I->wantTo("Create city#3 in default state");
        $name       = $this->cityName3 = $I->GenerateNameOf("City3");
        $state      = $this->stateName;
        $this->zip3 = $zips = $I->GenerateZipCode();
        
        $I->CreateCity($name, $state, $zips);
        $I->wait(2);
    }
    
    //--------------------------------------------------------------------------Create Audit Subgroups----------------------------------------------------------------------------
    
    public function CreateAuditSubGroupForEnergyGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $I->wantTo("Create audit subgroups for Energy audit group");
        $name1      = $this->audSubgroup1_Energy = $I->GenerateNameOf("EnAudSub1");
        $name2      = $this->audSubgroup2_Energy = $I->GenerateNameOf("EnAudSub2");
        $name3      = $this->audSubgroup3_Energy = $I->GenerateNameOf("EnAudSub3");
        $name4      = $this->audSubgroup4_Energy = $I->GenerateNameOf("EnAudSub4");
        $name5      = $this->audSubgroup5_Energy = $I->GenerateNameOf("EnAudSub5");
        $auditGroup = Page\AuditGroupList::Energy_AuditGroup;
        $state      = $this->stateName;
        
        $I->CreateAuditSubgroup($name1, $auditGroup, $state);
        $I->wait(3);
        $I->CreateAuditSubgroup($name2, $auditGroup, $state);
        $I->wait(3);
        $I->CreateAuditSubgroup($name3, $auditGroup, $state);
        $I->wait(3);
        $I->CreateAuditSubgroup($name4, $auditGroup, $state);
        $I->wait(3);
        $I->CreateAuditSubgroup($name5, $auditGroup, $state);
        $I->wait(3);
    }
    
    public function CreateAuditSubGroupForGeneralGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $I->wantTo("Create audit subgroups for General audit group");
        $name1      = $this->audSubgroup1_General = $I->GenerateNameOf("GenAudSub1");
        $auditGroup = Page\AuditGroupList::General_AuditGroup;
        $state      = $this->stateName;
        
        $I->CreateAuditSubgroup($name1, $auditGroup, $state);
        $I->wait(3);
    }
    
    public function CreateAuditSubGroupForPollutionPreventionGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $I->wantTo("Create audit subgroups for Pollution Prevention audit group");
        $name1      = $this->audSubgroup1_PollutionPrevention = $I->GenerateNameOf("PolAudSub1");
        $auditGroup = Page\AuditGroupList::PollutionPrevention_AuditGroup;
        $state      = $this->stateName;
        
        $I->CreateAuditSubgroup($name1, $auditGroup, $state);
        $I->wait(3);
    }
    
    public function CreateAuditSubGroupForSolidWasteGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $I->wantTo("Create audit subgroups for Solid Waste audit group");
        $name1      = $this->audSubgroup1_SolidWaste = $I->GenerateNameOf("SolAudSub1");
        $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup;
        $state      = $this->stateName;
        
        $I->CreateAuditSubgroup($name1, $auditGroup, $state);
        $I->wait(3);
    }
    
    public function CreateAuditSubGroupForTransportationGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $I->wantTo("Create audit subgroups for Transportation audit group");
        $name1      = $this->audSubgroup1_Transportation = $I->GenerateNameOf("TranAudSub1");
        $auditGroup = Page\AuditGroupList::Transportation_AuditGroup;
        $state      = $this->stateName;
        
        $I->CreateAuditSubgroup($name1, $auditGroup, $state);
        $I->wait(3);
    }
    
    public function CreateAuditSubGroupForWastewaterGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $I->wantTo("Create audit subgroups for Wastewater audit group");
        $name1      = $this->audSubgroup1_Wastewater = $I->GenerateNameOf("WastAudSub1");
        $auditGroup = Page\AuditGroupList::Wastewater_AuditGroup;
        $state      = $this->stateName;
        
        $I->CreateAuditSubgroup($name1, $auditGroup, $state);
        $I->wait(3);
    }
    
    public function CreateAuditSubGroupForWaterGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $I->wantTo("Create audit subgroups for Water audit group");
        $name1      = $this->audSubgroup1_Water = $I->GenerateNameOf("WatAudSub1");
        $auditGroup = Page\AuditGroupList::Water_AuditGroup;
        $state      = $this->stateName;
        
        $I->CreateAuditSubgroup($name1, $auditGroup, $state);
        $I->wait(3);
    }
    
    //--------------------------------------------------------------------------Create Programs-----------------------------------------------------------------------------------
    
    public function CreateProgram1(\Step\Acceptance\Program $I)
    {
        $I->wantTo("Create program#1 in default state");
        $name      = $this->progName1 = $I->GenerateNameOf("Prog1");
        $state     = $this->stateName;
        $city      = [$this->cityName1, $this->cityName2];
        
        $I->CreateProgram($name, $state, $city);
        $I->wait(2);
    }
    
    public function CreateProgram2(\Step\Acceptance\Program $I)
    {
        $I->wantTo("Create program#2 in default state");
        $name      = $this->progName2 = $I->GenerateNameOf("Prog2");
        $state     = $this->stateName;
        $city      = [$this->cityName3];
        
        $I->CreateProgram($name, $state, $city);
        $I->wait(2);
    }
    
    //--------------------------------------------------------------------------Create Sectors------------------------------------------------------------------------------------
    
    public function CreateSector1ForProgram1(\Step\Acceptance\Sector $I)
    {
        $I->wantTo("Create sector#1 for program#1 in default state");
        $name      = $this->sector11 = $I->GenerateNameOf("Sec1Prog1");
        $state     = $this->stateName;
        $program   = $this->progName1;
        
        $I->CreateSector($name, $state, $program);
        $I->wait(2);
    }
    
    public function CreateSector2ForProgram1(\Step\Acceptance\Sector $I)
    {
        $I->wantTo("Create sector#2 for program#1 in default state");
        $name      = $this->sector12 = $I->GenerateNameOf("Sec2Prog1");
        $state     = $this->stateName;
        $program   = $this->progName1;
        
        $I->CreateSector($name, $state, $program);
        $I->wait(2);
    }
    
    public function CreateSector1ForProgram2(\Step\Acceptance\Sector $I)
    {
        $I->wantTo("Create sector#1 for program#2 in default state");
        $name      = $this->sector21 = $I->GenerateNameOf("Sec1Prog2");
        $state     = $this->stateName;
        $program   = $this->progName2;
        
        $I->CreateSector($name, $state, $program);
        $I->wait(2);
    }
    
    //--------------------------------------------------------------------------Creating Measures For Energy Audit Group--------------------------------------------------------------
    
    public function CreateMeasure1forEnergy(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc1 = $I->GenerateNameOf("Description_1");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'yes';
        $submeasureType  = \Step\Acceptance\Measure::MultipleQuestionAndNumber_QuantitativeSubmeasure;
        $questions       = ['ques1', 'ques2', 'ques3', 'ques4'];
        $answers         = ['a1', 'a2', 'a3'];
        $requiredAnswers = '2';
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers, $requiredAnswers);
        $I->wait(2);
        $I->GoToMeasureUpdatePage($desc);
        $this->measuresDesc_Energy[]    = $desc;
        $this->measuresDesc_Energy_sub1[] = $desc;
        $I->CheckSavedValuesOnMeasureUpdatePage($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers, $requiredAnswers, null, null, $quantToggleStatus = 'on');
    }
    
    public function CreateMeasure2forEnergy(\Step\Acceptance\Measure $I) {
        $desc           = $this->measureDesc2 = $I->GenerateNameOf("Description_2");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['question1', 'question2', 'question3', 'question4', 'question5', 'question6', 'question7', 'question8'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->wait(2);
        $I->GoToMeasureUpdatePage($desc);
        $this->measuresDesc_Energy[] = $desc;
        $this->measuresDesc_Energy_sub2[] = $desc;
        $I->CheckSavedValuesOnMeasureUpdatePage($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, $quantToggleStatus = 'on');
    }
    
    public function CreateMeasure3forEnergy(\Step\Acceptance\Measure $I) {
        $desc           = $this->measureDesc3 = $I->GenerateNameOf("Description_3");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::PopupTherms_QuantitativeSubmeasure;
        $popupDesc      = $I->GenerateNameOf('Popup therms description');
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, $popupDesc);
        $I->wait(2);
        $I->GoToMeasureUpdatePage($desc);
        $this->measuresDesc_Energy[] = $desc;
        $this->measuresDesc_Energy_sub4[] = $desc;
        $I->CheckSavedValuesOnMeasureUpdatePage($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, $popupDesc, null, $quantToggleStatus = 'on');
    }
    
    public function CreateMeasure4forEnergy(\Step\Acceptance\Measure $I) {
        $desc           = $this->measureDesc4 = $I->GenerateNameOf("Description_4");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::PopupLighting_QuantitativeSubmeasure;
        $popupDesc      = $I->GenerateNameOf('Lighting popup desc');
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, $popupDesc);
        $I->wait(2);
        $I->GoToMeasureUpdatePage($desc);
        $this->measuresDesc_Energy[] = $desc;
        $this->measuresDesc_Energy_sub1[] = $desc;
        $I->CheckSavedValuesOnMeasureUpdatePage($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, $popupDesc, null, $quantToggleStatus = 'on');
    }
    
    public function CreateMeasure5forEnergy(\Step\Acceptance\Measure $I) {
        $desc           = $this->measureDesc5 = $I->GenerateNameOf("Description_5");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::PopupWasteDivertion_QuantitativeSubmeasure;
        $popupDesc      = $I->GenerateNameOf('Popup Waste Div description');
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, $popupDesc);
        $I->wait(2);
        $I->GoToMeasureUpdatePage($desc);
        $this->measuresDesc_Energy[] = $desc;
        $this->measuresDesc_Energy_sub1[] = $desc;
        $I->CheckSavedValuesOnMeasureUpdatePage($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, $popupDesc, null, $quantToggleStatus = 'on');
    }
    
    public function CreateMeasure6forEnergy(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc6 = $I->GenerateNameOf("Description_6");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::MultipleQuestion_MultipleAnswersSubmeasure;
        $questions       = ['ques1?', 'ques2?', 'ques3?', 'ques4?', 'ques5?'];
        $requiredAnswers = '3';
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, $requiredAnswers);
        $I->wait(2);
        $I->GoToMeasureUpdatePage($desc);
        $this->measuresDesc_Energy[] = $desc;
        $this->measuresDesc_Energy_sub1[] = $desc;
        $I->CheckSavedValuesOnMeasureUpdatePage($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, $requiredAnswers, null, null, $quantToggleStatus = 'off', $multipleAnswerStatus = 'on');
    }
    
    public function CreateMeasure7forEnergy(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc7 = $I->GenerateNameOf("Description_7");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup2_Energy;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::MultipleQuestionAndNumber_MultipleAnswersSubmeasure;
        $questions       = ['What is your favourite color?', "What is your eyes color?", "What is your car color"];
        $answers         = ['Grey', 'Green', 'Red', 'Yellow', 'Brown', 'Black', 'Pink', 'Gold', 'Silver', 'Blue', 'White', 'Orange'];
        $requiredAnswers = '3';
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers, $requiredAnswers);
        $I->wait(2);
        $I->GoToMeasureUpdatePage($desc);
        $this->measuresDesc_Energy[] = $desc;
        $this->measuresDesc_Energy_sub1[] = $desc;
        $I->CheckSavedValuesOnMeasureUpdatePage($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, $answers, $requiredAnswers, null, null, $quantToggleStatus = 'off', $multipleAnswerStatus = 'on');
    }
    
    public function CreateMeasure8forEnergy(\Step\Acceptance\Measure $I) {
        $desc            = $this->measureDesc8 = $I->GenerateNameOf("Description_8");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup2_Energy;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->wait(10);
        $I->GoToMeasureUpdatePage($desc);
        $this->measuresDesc_Energy[] = $desc;
        $this->measuresDesc_Energy_sub1[] = $desc;
        $I->CheckSavedValuesOnMeasureUpdatePage($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null, null, $quantToggleStatus = 'off', $multipleAnswerStatus = 'on');
    }
    
    public function CreateMeasure9forEnergy(\Step\Acceptance\Measure $I) {
        $desc           = $this->measureDesc9 = $I->GenerateNameOf("Description_9");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup4_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->wait(10);
        $I->GoToMeasureUpdatePage($desc);
        $this->measuresDesc_Energy[] = $desc;
        $this->measuresDesc_Energy_sub2[] = $desc;
        $I->CheckSavedValuesOnMeasureUpdatePage($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null, null, $quantToggleStatus = 'on');
    }
    
    //--------------------------------------------------------------------------Create EC----------------------------------------------------------------------------------------------
    
    public function CreateEssentialCriteriaForTier1(\Step\Acceptance\EssentialCriteria $I) {
        $number = '1';
        $descs  = $this->measuresDesc_Energy;
        
        $I->CreateEssentialCriteria($number);
        $this->statnew1 = $I->ManageEssentialCriteria($descs, $this->statuses1);
        $I->reloadPage();
        $I->PublishECStatus();
    }
    
    public function CreateEssentialCriteriaForTier2(\Step\Acceptance\EssentialCriteria $I) {
        $number   = '2';
        $descs    = $this->measuresDesc_Energy;
        $statuses = $this->statnew1;
        
        $I->CreateEssentialCriteria($number);
        $I->CheckSavedValuesOnManageEssentialCriteriaPage($descs, $statuses);
        $this->statnew2 = $I->ManageEssentialCriteria($descs, $this->statuses2);
        $I->reloadPage();
        $I->PublishECStatus();
    }
    
    public function CreateEssentialCriteriaForTier3(\Step\Acceptance\EssentialCriteria $I) {
        $number = '3';
        $descs  = $this->measuresDesc_Energy;
        
        $I->CreateEssentialCriteria($number);
        $I->CheckSavedValuesOnManageEssentialCriteriaPage($descs, $this->statnew1);
        $I->reloadPage();
        $I->PublishECStatus();
    }
    
    //--------------------------------------------------------------------------Create Checklist--------------------------------------------------------------------------------------
    
    //------------------Office Retail Tiers For Program 1-----------------------
    
    public function CreateChecklistForTier1_DefaultSector_Program1(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->progName1;
        $programDestination = $this->progName1;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_Energy;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnew1);
        $I->reloadPage();
        $I->PublishChecklistStatus();
    }
    
    public function CreateChecklistForTier2_DefaultSector_Program1(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->progName1;
        $programDestination = $this->progName1;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '2';
        $descs              = $this->measuresDesc_Energy;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnew2);
        $I->reloadPage();
        $I->PublishChecklistStatus();
    }
    
    //-----------------Office Retail Tiers For Program 2------------------------
    
    public function CreateChecklistForTier1_DefaultSector_Program2(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->progName2;
        $programDestination = $this->progName2;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '1';
        $descs              = $this->measuresDesc_Energy;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnew1);
        $I->reloadPage();
        $I->PublishChecklistStatus();
    }
    
    public function CreateChecklistForTier2_DefaultSector_Program2(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->progName2;
        $programDestination = $this->progName2;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '2';
        $descs              = $this->measuresDesc_Energy;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnew2);
        $I->ManageChecklist($descs, $this->statuses3);
        $I->reloadPage();
        $I->PublishChecklistStatus();
    }
    
    //----------------Office Retail Tiers for Program 1-------------------------
    
    public function CreateChecklistForTier1_Sector1_Program1(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->progName1;
        $programDestination = $this->progName1;
        $sectorDestination  = $this->sector11;
        $tier               = '1';
        $descs              = $this->measuresDesc_Energy;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnew1);
        $I->reloadPage();
        $I->PublishChecklistStatus();
    }
    
    public function CreateChecklistForTier2_Sector1_Program1(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->progName1;
        $programDestination = $this->progName1;
        $sectorDestination  = $this->sector11;
        $tier               = '2';
        $descs              = $this->measuresDesc_Energy;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statuses4);
        $I->reloadPage();
        $I->PublishChecklistStatus();
    }
    
    //------------------------Office Retail Tiers-------------------------------
    
    public function CreateChecklistForTier1_Sector2_Program1(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->progName1;
        $programDestination = $this->progName1;
        $sectorDestination  = $this->sector12;
        $tier               = '1';
        $descs              = $this->measuresDesc_Energy;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statuses4);
        $I->reloadPage();
        $I->PublishChecklistStatus();
    }
    
    //--------------------------------------------------------------------------Register Business---------------------------------------------------------------------------------------------
    
    public function LogOut(AcceptanceTester $I) {
        $I->reloadPage();
        $I->wait(2);
        $I->Logout($I);
    }
    
    public function BusinessRegister(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $I->GenerateNameOf("busnam");;
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");;
        $zip              = $this->zip1;
        $city             = $this->cityName1;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(10);
//        $I->canSee('Get started', 'a.btn-green-lite');
    }
    
    //['elective', 'elective', 'not set', 'elective', 'core', 'core', 'elective', 'elective', 'elective'];
    public function CompletAllMeasures(AcceptanceTester $I) {
        $I->wait(1);
        $I->amOnPage(Page\RegistrationStarted::$URL_Started);
        $I->wait(3);
        $I->click(\Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
        $I->wait(2);
        $I->click(\Page\RegistrationStarted::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(2);
        $I->canSeeElement(Page\RegistrationStarted::Elective_MeasureDescription_ByDesc($this->measureDesc1));
        $I->canSeeElement(Page\RegistrationStarted::Elective_MeasureDescription_ByDesc($this->measureDesc2));
        $I->canSeeElement(Page\RegistrationStarted::Elective_MeasureDescription_ByDesc($this->measureDesc4));
        $I->canSeeElement(Page\RegistrationStarted::Core_MeasureDescription_ByDesc($this->measureDesc5));
        $I->canSeeElement(Page\RegistrationStarted::Core_MeasureDescription_ByDesc($this->measureDesc6));
        $I->cantSeeElement(Page\RegistrationStarted::Elective_MeasureDescription_ByDesc($this->measureDesc3));
        $I->cantSeeElement(Page\RegistrationStarted::Core_MeasureDescription_ByDesc($this->measureDesc3));
        $I->click(\Page\RegistrationStarted::LeftMenu_Subgroup_ByName($this->audSubgroup2_Energy));
        $I->wait(2);
        $I->canSeeElement(Page\RegistrationStarted::Elective_MeasureDescription_ByDesc($this->measureDesc7));
        $I->canSeeElement(Page\RegistrationStarted::Elective_MeasureDescription_ByDesc($this->measureDesc8));
        $I->click(\Page\RegistrationStarted::LeftMenu_Subgroup_ByName($this->audSubgroup4_Energy));
        $I->wait(2);
        $I->canSeeElement(Page\RegistrationStarted::Elective_MeasureDescription_ByDesc($this->measureDesc9));
    }
    
    public function LogOutvv(AcceptanceTester $I) {
        $I->reloadPage();
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(2);
        $I->Logout($I);
    }
    
    public function BusinessRegister2(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $I->GenerateNameOf("busnam");;
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");;
        $zip              = $this->zip1;
        $city             = $this->cityName1;
        $website          = 'fgfh.fh';
        $busType          = $this->sector11;
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(10);
//        $I->canSee('Get started', 'a.btn-green-lite');
    }
    //['elective', 'core', 'elective', 'core', 'elective', 'elective', 'elective', 'not set', 'core'];
    public function CompletAllMeasures2(AcceptanceTester $I) {
        $I->wait(1);
        $I->amOnPage(Page\RegistrationStarted::$URL_Started);
        $I->wait(3);
        $I->click(\Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
        $I->wait(2);
        $I->click(\Page\RegistrationStarted::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(2);
        $I->canSeeElement(Page\RegistrationStarted::Elective_MeasureDescription_ByDesc($this->measureDesc1));
        $I->canSeeElement(Page\RegistrationStarted::Core_MeasureDescription_ByDesc($this->measureDesc2));
        $I->canSeeElement(Page\RegistrationStarted::Core_MeasureDescription_ByDesc($this->measureDesc4));
        $I->canSeeElement(Page\RegistrationStarted::Elective_MeasureDescription_ByDesc($this->measureDesc5));
        $I->canSeeElement(Page\RegistrationStarted::Elective_MeasureDescription_ByDesc($this->measureDesc6));
        $I->canSeeElement(Page\RegistrationStarted::Elective_MeasureDescription_ByDesc($this->measureDesc3));
        $I->click(\Page\RegistrationStarted::LeftMenu_Subgroup_ByName($this->audSubgroup2_Energy));
        $I->wait(2);
        $I->canSeeElement(Page\RegistrationStarted::Elective_MeasureDescription_ByDesc($this->measureDesc7));
        $I->cantSeeElement(Page\RegistrationStarted::Elective_MeasureDescription_ByDesc($this->measureDesc8));
        $I->cantSeeElement(Page\RegistrationStarted::Core_MeasureDescription_ByDesc($this->measureDesc8));
        $I->click(\Page\RegistrationStarted::LeftMenu_Subgroup_ByName($this->audSubgroup4_Energy));
        $I->wait(2);
        $I->canSeeElement(Page\RegistrationStarted::Core_MeasureDescription_ByDesc($this->measureDesc9));
    }
    
    
}
