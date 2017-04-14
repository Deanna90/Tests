<?php


class SystemTourCest
{
    public $stateName, $cityName1, $cityName2, $progName, $zip1, $zip2;
    public $audSubgroup1_Energy, $audSubgroup2_Energy, $audSubgroup3_Energy, $audSubgroup4_Energy, $audSubgroup5_Energy;
    public $audSubgroup1_General, $audSubgroup2_General, $audSubgroup3_General, $audSubgroup4_General, $audSubgroup5_General;
    public $audSubgroup1_PollutionPrevention, $audSubgroup2_PollutionPrevention, $audSubgroup3_PollutionPrevention, $audSubgroup4_PollutionPrevention, $audSubgroup5_PollutionPrevention;
    public $audSubgroup1_SolidWaste, $audSubgroup2_SolidWaste, $audSubgroup3_SolidWaste, $audSubgroup4_SolidWaste, $audSubgroup5_SolidWaste;
    public $audSubgroup1_Transportation, $audSubgroup2_Transportation, $audSubgroup3_Transportation, $audSubgroup4_Transportation, $audSubgroup5_Transportation;
    public $audSubgroup1_Wastewater, $audSubgroup2_Wastewater, $audSubgroup3_Wastewater, $audSubgroup4_Wastewater, $audSubgroup5_Wastewater;
    public $audSubgroup1_Water, $audSubgroup2_Water, $audSubgroup3_Water, $audSubgroup4_Water, $audSubgroup5_Water;
    public $measuresDesc_Energy = [];
    public $measuresDesc_Energy_sub1 = [];
    public $measuresDesc_Energy_sub2 = [];
    public $measuresDesc_Energy_sub4 = [];
    public $statuses1 = ['core', 'elective', 'not set', 'core', 'elective', 'elective', 'elective', 'not set', 'core'];
    public $statuses2 = ['elective', 'elective', 'not set', 'elective', 'core', 'core', 'elective', 'elective', 'elective', 'core'];
    public $statuses3 = ['not set', 'core', 'not set', 'core', 'elective', 'elective', 'elective', 'not set', 'core', 'not set', 'core', 'core', 'elective'];
    public $statnew1 = [];
    public $statnew2 = [];
    public $statnew3 = [];
    
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
        $I->seeInCurrentUrl(\Page\StateList::$URL);
    }
    
    public function SelectState(\Step\Acceptance\City $I)
    {
        $I->wantTo("Select default state");
        $state     = $this->stateName;
        $I->SelectDefaultState($I, $state);
    }
    
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
        $I->wantTo("Create city#1 in default state");
        $name       = $this->cityName2 = $I->GenerateNameOf("City2");
        $state      = $this->stateName;
        $this->zip2 = $zips = $I->GenerateZipCode();
        $I->CreateCity($name, $state, $zips);
        $I->wait(2);
    }
    
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
        $name2      = $this->audSubgroup2_General = $I->GenerateNameOf("GenAudSub2");
        $name3      = $this->audSubgroup3_General = $I->GenerateNameOf("GenAudSub3");
        $name4      = $this->audSubgroup4_General = $I->GenerateNameOf("GenAudSub4");
        $name5      = $this->audSubgroup5_General = $I->GenerateNameOf("GenAudSub5");
        $auditGroup = Page\AuditGroupList::General_AuditGroup;
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
    
    public function CreateAuditSubGroupForPollutionPreventionGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $I->wantTo("Create audit subgroups for Pollution Prevention audit group");
        $name1      = $this->audSubgroup1_PollutionPrevention = $I->GenerateNameOf("PolAudSub1");
        $name2      = $this->audSubgroup2_PollutionPrevention = $I->GenerateNameOf("PolAudSub2");
        $name3      = $this->audSubgroup3_PollutionPrevention = $I->GenerateNameOf("PolAudSub3");
        $name4      = $this->audSubgroup4_PollutionPrevention = $I->GenerateNameOf("PolAudSub4");
        $name5      = $this->audSubgroup5_PollutionPrevention = $I->GenerateNameOf("PolAudSub5");
        $auditGroup = Page\AuditGroupList::PollutionPrevention_AuditGroup;
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
    
    public function CreateAuditSubGroupForSolidWasteGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $I->wantTo("Create audit subgroups for Solid Waste audit group");
        $name1      = $this->audSubgroup1_SolidWaste = $I->GenerateNameOf("SolAudSub1");
        $name2      = $this->audSubgroup2_SolidWaste = $I->GenerateNameOf("SolAudSub2");
        $name3      = $this->audSubgroup3_SolidWaste = $I->GenerateNameOf("SolAudSub3");
        $name4      = $this->audSubgroup4_SolidWaste = $I->GenerateNameOf("SolAudSub4");
        $name5      = $this->audSubgroup5_SolidWaste = $I->GenerateNameOf("SolAudSub5");
        $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup;
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
    
    public function CreateAuditSubGroupForTransportationGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $I->wantTo("Create audit subgroups for Transportation audit group");
        $name1      = $this->audSubgroup1_Transportation = $I->GenerateNameOf("TranAudSub1");
        $name2      = $this->audSubgroup2_Transportation = $I->GenerateNameOf("TranAudSub2");
        $name3      = $this->audSubgroup3_Transportation = $I->GenerateNameOf("TranAudSub3");
        $name4      = $this->audSubgroup4_Transportation = $I->GenerateNameOf("TranAudSub4");
        $name5      = $this->audSubgroup5_Transportation = $I->GenerateNameOf("TranAudSub5");
        $auditGroup = Page\AuditGroupList::Transportation_AuditGroup;
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
    
    public function CreateAuditSubGroupForWastewaterGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $I->wantTo("Create audit subgroups for Wastewater audit group");
        $name1      = $this->audSubgroup1_Wastewater = $I->GenerateNameOf("WastAudSub1");
        $name2      = $this->audSubgroup2_Wastewater = $I->GenerateNameOf("WastAudSub2");
        $name3      = $this->audSubgroup3_Wastewater = $I->GenerateNameOf("WastAudSub3");
        $name4      = $this->audSubgroup4_Wastewater = $I->GenerateNameOf("WastAudSub4");
        $name5      = $this->audSubgroup5_Wastewater = $I->GenerateNameOf("WastAudSub5");
        $auditGroup = Page\AuditGroupList::Wastewater_AuditGroup;
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
    
    public function CreateAuditSubGroupForWaterGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $I->wantTo("Create audit subgroups for Water audit group");
        $name1      = $this->audSubgroup1_Water = $I->GenerateNameOf("WatAudSub1");
        $name2      = $this->audSubgroup2_Water = $I->GenerateNameOf("WatAudSub2");
        $name3      = $this->audSubgroup3_Water = $I->GenerateNameOf("WatAudSub3");
        $name4      = $this->audSubgroup4_Water = $I->GenerateNameOf("WatAudSub4");
        $name5      = $this->audSubgroup5_Water = $I->GenerateNameOf("WatAudSub5");
        $auditGroup = Page\AuditGroupList::Water_AuditGroup;
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
    
    
    
    
    
    
    
    
    public function CreateProgram(\Step\Acceptance\Program $I)
    {
        $I->wantTo("Create program#1 in default state");
        $name      = $this->progName = $I->GenerateNameOf("Prog");
        $state     = $this->stateName;
        $city      = [$this->cityName1, $this->cityName2];
        $I->CreateProgram($name, $state, $city);
        $I->wait(2);
    }
    
    //--------------------------------------------------------------------------Creating Measures For Energy Audit Group--------------------------------------------------------------
    
    public function CreateMeasure1forEnergy(\Step\Acceptance\Measure $I) {
        $desc            = $I->GenerateNameOf("Description");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'yes';
        $submeasureType  = \Step\Acceptance\Measure::MultipleQuestionAndNumber_QuantitativeSubmeasure;
        $questions       = ['ques1', 'ques2', 'ques3', 'ques4'];
        $answers         = ['a1', 'a2', 'a3'];
        $requiredAnswers = '2';
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers, $requiredAnswers);
        $I->GoToMeasureUpdatePage($desc);
        $this->measuresDesc_Energy[]    = $desc;
        $this->measuresDesc_Energy_sub1 = $desc;
        $I->CheckSavedValuesOnMeasureUpdatePage($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers, $requiredAnswers, null, null, $quantToggleStatus = 'on');
    }
    
    public function CreateMeasure2forEnergy(\Step\Acceptance\Measure $I) {
        $desc           = $I->GenerateNameOf("Description");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup2_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['question1', 'question2', 'question3', 'question4', 'question5', 'question6', 'question7', 'question8'];
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->GoToMeasureUpdatePage($desc);
        $this->measuresDesc_Energy[] = $desc;
        $this->measuresDesc_Energy_sub2 = $desc;
        $I->CheckSavedValuesOnMeasureUpdatePage($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, null, null, null, $quantToggleStatus = 'on');
    }
    
    public function CreateMeasure3forEnergy(\Step\Acceptance\Measure $I) {
        $desc           = $I->GenerateNameOf("Description");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup4_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::PopupTherms_QuantitativeSubmeasure;
        $popupDesc      = $I->GenerateNameOf('Popup therms description');
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, $popupDesc);
        $I->GoToMeasureUpdatePage($desc);
        $this->measuresDesc_Energy[] = $desc;
        $this->measuresDesc_Energy_sub4 = $desc;
        $I->CheckSavedValuesOnMeasureUpdatePage($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, $popupDesc, null, $quantToggleStatus = 'on');
    }
    
    public function CreateMeasure4forEnergy(\Step\Acceptance\Measure $I) {
        $desc           = $I->GenerateNameOf("Description");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::PopupLighting_QuantitativeSubmeasure;
        $popupDesc      = $I->GenerateNameOf('Lighting popup desc');
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, $popupDesc);
        $I->GoToMeasureUpdatePage($desc);
        $this->measuresDesc_Energy[] = $desc;
        $this->measuresDesc_Energy_sub1 = $desc;
        $I->CheckSavedValuesOnMeasureUpdatePage($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, $popupDesc, null, $quantToggleStatus = 'on');
    }
    
    public function CreateMeasure5forEnergy(\Step\Acceptance\Measure $I) {
        $desc           = $I->GenerateNameOf("Description");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::PopupWasteDivertion_QuantitativeSubmeasure;
        $popupDesc      = $I->GenerateNameOf('Popup Waste Div description');
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, $popupDesc);
        $I->GoToMeasureUpdatePage($desc);
        $this->measuresDesc_Energy[] = $desc;
        $this->measuresDesc_Energy_sub1 = $desc;
        $I->CheckSavedValuesOnMeasureUpdatePage($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, $popupDesc, null, $quantToggleStatus = 'on');
    }
    
    public function CreateMeasure6forEnergy(\Step\Acceptance\Measure $I) {
        $desc            = $I->GenerateNameOf("Description");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::MultipleQuestion_MultipleAnswersSubmeasure;
        $questions       = ['ques1?', 'ques2?', 'ques3?', 'ques4?', 'ques5?'];
        $requiredAnswers = '3';
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, $requiredAnswers);
        $I->GoToMeasureUpdatePage($desc);
        $this->measuresDesc_Energy[] = $desc;
        $this->measuresDesc_Energy_sub1 = $desc;
        $I->CheckSavedValuesOnMeasureUpdatePage($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, null, $requiredAnswers, null, null, $quantToggleStatus = 'off', $multipleAnswerStatus = 'on');
    }
    
    public function CreateMeasure7forEnergy(\Step\Acceptance\Measure $I) {
        $desc            = $I->GenerateNameOf("Description");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::MultipleQuestionAndNumber_MultipleAnswersSubmeasure;
        $questions       = ['What is your favourite color?', "What is your eyes color?", "What is your car color"];
        $answers         = ['Grey', 'Green', 'Red', 'Yellow', 'Brown', 'Black', 'Pink', 'Gold', 'Silver', 'Blue', 'White', 'Orange'];
        $requiredAnswers = '3';
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers, $requiredAnswers);
        $I->GoToMeasureUpdatePage($desc);
        $this->measuresDesc_Energy[] = $desc;
        $this->measuresDesc_Energy_sub1 = $desc;
        $I->CheckSavedValuesOnMeasureUpdatePage($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, $answers, $requiredAnswers, null, null, $quantToggleStatus = 'off', $multipleAnswerStatus = 'on');
    }
    
    public function CreateMeasure8forEnergy(\Step\Acceptance\Measure $I) {
        $desc            = $I->GenerateNameOf("Description");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->GoToMeasureUpdatePage($desc);
        $this->measuresDesc_Energy[] = $desc;
        $this->measuresDesc_Energy_sub1 = $desc;
        $I->CheckSavedValuesOnMeasureUpdatePage($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null, null, $quantToggleStatus = 'off', $multipleAnswerStatus = 'on');
    }
    
    public function CreateMeasure9forEnergy(\Step\Acceptance\Measure $I) {
        $desc           = $I->GenerateNameOf("Description");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup2_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->GoToMeasureUpdatePage($desc);
        $this->measuresDesc_Energy[] = $desc;
        $this->measuresDesc_Energy_sub2 = $desc;
        $I->CheckSavedValuesOnMeasureUpdatePage($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, null, null, $quantToggleStatus = 'on');
    }
    
    //--------------------------------------------------------------------------Create EC----------------------------------------------------------------------------------------------
    
    public function CreateEssentialCriteriaForTier1(\Step\Acceptance\EssentialCriteria $I) {
        $number = '1';
        $descs  = $this->measuresDesc_Energy;
        $I->CreateEssentialCriteria($number);
        $this->statnew1 = $I->ManageEssentialCriteria($descs, $this->statuses1);
    }
    
    public function CreateEssentialCriteriaForTier2(\Step\Acceptance\EssentialCriteria $I) {
        $number   = '2';
        $descs    = $this->measuresDesc_Energy;
        $statuses = $this->statnew1;
        $I->CreateEssentialCriteria($number);
        $I->CheckSavedValuesOnManageEssentialCriteriaPage($descs, $statuses);
    }
    
    public function CreateEssentialCriteriaForTier3(\Step\Acceptance\EssentialCriteria $I) {
        $number = '3';
        $descs  = $this->measuresDesc_Energy;
        $I->CreateEssentialCriteria($number);
        $I->CheckSavedValuesOnManageEssentialCriteriaPage($descs, $this->statnew1);
        $this->statnew2 = $I->ManageEssentialCriteria($descs, $this->statuses2);
    }
    
    public function CreateEssentialCriteriaForTier4(\Step\Acceptance\EssentialCriteria $I) {
        $number = '4';
        $descs  = $this->measuresDesc_Energy;
        $I->CreateEssentialCriteria($number);
        $I->CheckSavedValuesOnManageEssentialCriteriaPage($descs, $this->statnew2);
    }
    
    //--------------------------------------------------------------------------Create Checklist--------------------------------------------------------------------------------------
    
    public function CreateChecklistForTier1(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->progName;
        $programDestination = $this->progName;
        $sectorDestination  = 'Office / Retail';
        $tier               = '1';
        $descs              = $this->measuresDesc_Energy;
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnew1);
        $I->PublishChecklistStatus();
    }
    
    public function CreateChecklistForTier3(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->progName;
        $programDestination = $this->progName;
        $sectorDestination  = 'Office / Retail';
        $tier               = '3';
        $descs              = $this->measuresDesc_Energy;
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statnew2);
        $I->PublishChecklistStatus();
    }
    
    //--------------------------------------------------------------------------Register Business---------------------------------------------------------------------------------------------
    
    public function LogOut(AcceptanceTester $I) {
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
        $busType          = '1';
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(10);
    }
    
    public function CompletAllMeasures(AcceptanceTester $I) {
        $I->click('a.btn-green-lite');
        $I->wait(3);
        $I->click(\Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        for($i=0, $c= count($this->measuresDesc_Energy_sub1); $i<$c; $i++){
            $I->seeElement(\Page\RegistrationStarted::MeasureDescription_ByDesc($this->measuresDesc_Energy_sub1[$i]));
        }
        $I->click(\Page\RegistrationStarted::LeftMenu_Subgroup_ByName($this->audSubgroup2_Energy));
        for($i=0, $c= count($this->measuresDesc_Energy_sub2); $i<$c; $i++){
            $I->seeElement(\Page\RegistrationStarted::MeasureDescription_ByDesc($this->measuresDesc_Energy_sub2[$i]));
        }
        $I->click(\Page\RegistrationStarted::LeftMenu_Subgroup_ByName($this->audSubgroup4_Energy));
        for($i=0, $c= count($this->measuresDesc_Energy_sub4); $i<$c; $i++){
            $I->seeElement(\Page\RegistrationStarted::MeasureDescription_ByDesc($this->measuresDesc_Energy_sub4[$i]));
        }
    }
    
    
}
