<?php


class AllMeasuresReportsCest
{
    public $state;
    public $audSubgroup1_Energy, $id_audSubgroup1_Energy;
    public $audSubgroup1_SolidWaste, $id_audSubgroup1_SolidWaste;
    public $globVariableTitle, $globVariableValue;
    public $emailStateAdmin, $emailCoordinator;
    public $password = 'Qq!1111111';
    public $idStateAdmin, $idCoordinator;
    public $thermName, $thermCount;
    public $measure1Desc, $idMeasure1, $savingMeas1_Annual_ThermsArea_Bus1, $savingMeas1_Daily_ThermsArea_Bus1,
                                       $savingMeas1_Annual_ThermsArea_Bus2, $savingMeas1_Daily_ThermsArea_Bus2;
    
    public $measure2Desc, $idMeasure2, $savingMeas2_Annual_ThermsArea_Bus1, $savingMeas2_Daily_ThermsArea_Bus1, 
                                       $savingMeas2_Annual_EnergySavedArea_Bus1, $savingMeas2_Daily_EnergySavedArea_Bus1, 
                                       $savingMeas2_Annual_FuelSavedArea_Bus1, $savingMeas2_Daily_FuelSavedArea_Bus1,
                                       $savingMeas2_Annual_ThermsArea_Bus2, $savingMeas2_Daily_ThermsArea_Bus2, 
                                       $savingMeas2_Annual_EnergySavedArea_Bus2, $savingMeas2_Daily_EnergySavedArea_Bus2, 
                                       $savingMeas2_Annual_FuelSavedArea_Bus2, $savingMeas2_Daily_FuelSavedArea_Bus2;
    
    public $measure3Desc, $idMeasure3, $savingMeas3_Annual_GreenhouseGasEmissionsSavedArea_Bus1, $savingMeas3_Daily_GreenhouseGasEmissionsSavedArea_Bus1;
    public $measure4Desc, $idMeasure4, $savingMeas4_Annual_ThermsArea_Bus1, $savingMeas4_Daily_ThermsArea_Bus1;
    public $measure5Desc, $idMeasure5, $savingMeas5_Annual_EnergySavedArea_Bus1, $savingMeas5_Daily_EnergySavedArea_Bus1,
                                       $savingMeas5_Annual_EnergySavedArea_Bus2, $savingMeas5_Daily_EnergySavedArea_Bus2;
    
    public $measure6Desc, $idMeasure6, $savingMeas6_Annual_SolidWasteDivertedArea_Bus1, $savingMeas6_Daily_SolidWasteDivertedArea_Bus1,
                                       $savingMeas6_Annual_SolidWasteDivertedArea_Bus2, $savingMeas6_Daily_SolidWasteDivertedArea_Bus2;
    
    public $measure7Desc, $idMeasure7;
    public $measure8Desc, $idMeasure8;
    public $measure9Desc, $idMeasure9;
    public $measuresDesc_SuccessCreated = [];
    public $city1, $zip1, $program1, $county;
    public $statusesDefault           = ['not set',  'not set',  'not set', 'not set',  'not set',  'not set',  'not set',  'not set',  'not set'];
    public $statuses                  = ['core',     'elective', 'core', 'elective',  'core', 'elective',  'core', 'elective',  'core'];
    public $checklistUrl, $id_checklist;
    public $id_ThermsArea, $id_VOCArea, $id_EnergySavedArea, $id_FuelSavedArea, $id_SolidWasteDivertedArea, $id_GreenhouseGasEmissionsSavedArea;
    public $units_ThermsArea, $units_VOCArea, $units_EnergySavedArea, $units_FuelSavedArea, $units_SolidWasteDivertedArea, $units_GreenhouseGasEmissionsSavedArea;
    public $shortUnits_ThermsArea, $shortUnits_VOCArea, $shortUnits_EnergySavedArea, $shortUnits_FuelSavedArea, $shortUnits_SolidWasteDivertedArea, $shortUnits_GreenhouseGasEmissionsSavedArea;
    public $rateMoney_ThermsArea, $rateMoney_VOCArea, $rateMoney_EnergySavedArea, $rateMoney_FuelSavedArea, $rateMoney_SolidWasteDivertedArea, $rateMoney_GreenhouseGasEmissionsSavedArea;
    public $employeesCount1, $business1, $id_business1;
    public $employeesCount2, $business2, $id_business2;
    public $email1;
    public $todayDate = [];
    public $months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    public $currentYear, $currentMonth, $currentQuarter;

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
        $name = $this->state = $I->GenerateNameOf("StReport");
        $shortName = 'SR';
        
        $I->CreateState($name, $shortName);
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
    
    public function GetThermsValues(\Step\Acceptance\AuditSubGroup $I)
    {
        $I->amOnPage(\Page\PopupThermOptionList::URL());
        $I->wait(2);
        $this->thermName  = $I->grabTextFrom(\Page\PopupThermOptionList::NameLine(2));
        $this->thermCount = $I->grabTextFrom(\Page\PopupThermOptionList::ThermsCountLine(2));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function GetSavingAreasValues(\Step\Acceptance\SavingArea $I)
    {
        $I->amOnPage(\Page\SavingAreaList::URL());
        $I->wait(2);
        $therms = $I->GetSavingAreaOnPageInList(\Page\SavingAreaList::Therms);
        $I->wait(1);
        $voc = $I->GetSavingAreaOnPageInList(\Page\SavingAreaList::VOC);
        $I->wait(1);
        $energy = $I->GetSavingAreaOnPageInList(\Page\SavingAreaList::EnergySaved);
        $I->wait(1);
        $fuel = $I->GetSavingAreaOnPageInList(\Page\SavingAreaList::FuelSaved);
        $I->wait(1);
        $greenhouse = $I->GetSavingAreaOnPageInList(\Page\SavingAreaList::GreenhouseGasEmissionsSaved);
        $I->wait(1);
        $solid = $I->GetSavingAreaOnPageInList(\Page\SavingAreaList::SolidWasteDiverted);
        $I->wait(1);
        $this->id_ThermsArea                      = $therms['id'];
        $this->id_VOCArea                         = $voc['id'];
        $this->id_EnergySavedArea                 = $energy['id'];
        $this->id_FuelSavedArea                   = $fuel['id'];
        $this->id_GreenhouseGasEmissionsSavedArea = $greenhouse['id'];
        $this->id_SolidWasteDivertedArea          = $solid['id'];
        $I->amOnPage(\Page\SavingAreaUpdate::URL($this->id_ThermsArea));
        $I->wait(4);
        $this->rateMoney_ThermsArea = $I->grabValueFrom(\Page\SavingAreaUpdate::$MoneyConversionRateField);
        $this->units_ThermsArea     = $I->grabValueFrom(\Page\SavingAreaUpdate::$UnitsField);
        $I->comment(\Page\SavingAreaList::Therms.":\n Money rate = '$this->rateMoney_ThermsArea'\n Units = '$this->units_ThermsArea'.\n-----------------------------");
        
        $I->amOnPage(\Page\SavingAreaUpdate::URL($this->id_VOCArea));
        $I->wait(4);
        $this->rateMoney_VOCArea = $I->grabValueFrom(\Page\SavingAreaUpdate::$MoneyConversionRateField);
        $this->units_VOCArea     = $I->grabValueFrom(\Page\SavingAreaUpdate::$UnitsField);
        $I->comment(\Page\SavingAreaList::VOC.":\n Money rate = '$this->rateMoney_VOCArea'\n Units = '$this->units_VOCArea'.\n-----------------------------");
        
        $I->amOnPage(\Page\SavingAreaUpdate::URL($this->id_EnergySavedArea));
        $I->wait(4);
        $this->rateMoney_EnergySavedArea = $I->grabValueFrom(\Page\SavingAreaUpdate::$MoneyConversionRateField);
        $this->units_EnergySavedArea     = $I->grabValueFrom(\Page\SavingAreaUpdate::$UnitsField);
        $I->comment(\Page\SavingAreaList::EnergySaved.":\n Money rate = '$this->rateMoney_EnergySavedArea'\n Units = '$this->units_EnergySavedArea'.\n-----------------------------");
        
        $I->amOnPage(\Page\SavingAreaUpdate::URL($this->id_FuelSavedArea));
        $I->wait(4);
        $this->rateMoney_FuelSavedArea = $I->grabValueFrom(\Page\SavingAreaUpdate::$MoneyConversionRateField);
        $this->units_FuelSavedArea     = $I->grabValueFrom(\Page\SavingAreaUpdate::$UnitsField);
        $I->comment(\Page\SavingAreaList::FuelSaved.":\n Money rate = '$this->rateMoney_FuelSavedArea'\n Units = '$this->units_FuelSavedArea'.\n-----------------------------");
    
        $I->amOnPage(\Page\SavingAreaUpdate::URL($this->id_GreenhouseGasEmissionsSavedArea));
        $I->wait(4);
        $this->rateMoney_GreenhouseGasEmissionsSavedArea = $I->grabValueFrom(\Page\SavingAreaUpdate::$MoneyConversionRateField);
        $this->units_GreenhouseGasEmissionsSavedArea     = $I->grabValueFrom(\Page\SavingAreaUpdate::$UnitsField);
        $I->comment(\Page\SavingAreaList::GreenhouseGasEmissionsSaved.":\n Money rate = '$this->rateMoney_GreenhouseGasEmissionsSavedArea'\n Units = '$this->units_GreenhouseGasEmissionsSavedArea'.\n-----------------------------");
        
        $I->amOnPage(\Page\SavingAreaUpdate::URL($this->id_SolidWasteDivertedArea));
        $I->wait(4);
        $this->rateMoney_SolidWasteDivertedArea = $I->grabValueFrom(\Page\SavingAreaUpdate::$MoneyConversionRateField);
        $this->units_SolidWasteDivertedArea     = $I->grabValueFrom(\Page\SavingAreaUpdate::$UnitsField);
        $I->comment(\Page\SavingAreaList::SolidWasteDiverted.":\n Money rate = '$this->rateMoney_SolidWasteDivertedArea'\n Units = '$this->units_SolidWasteDivertedArea'.\n-----------------------------");
        
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
    
    //--------------------------Create audit subgroups--------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateAuditSubGroupForEnergyGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name      = $this->audSubgroup1_Energy = $I->GenerateNameOf("EnAudSub1");
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
        $name       = $this->audSubgroup1_SolidWaste = $I->GenerateNameOf("SolWasAudSub1");
        $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->wait(3);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $I->wait(2);
        $this->id_audSubgroup1_SolidWaste = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function GetGlobalVariableValues(\Step\Acceptance\AuditSubGroup $I)
    {
        $I->amOnPage(\Page\GlobalVariableList::URL());
        $I->wait(2);
        $this->globVariableTitle = $I->grabTextFrom(\Page\GlobalVariableList::TitleLine('1'));
        $this->globVariableValue = $I->grabTextFrom(\Page\GlobalVariableList::ValueLine('1'));
    }
    
    //------------------------------Create measures-----------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure1_Quant_Number(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure1Desc = $I->GenerateNameOf("Description_1 quant Number ");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['question1', 'question2'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $I->wait(1);
        $this->idMeasure1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Measure1_AddFormula(\Step\Acceptance\Measure $I) {
        $number    = '1';
        $variable1 = 'question1';
        $variable2 = 'question2';
        $variable3 = 'Employees number';
        
        $I->amOnPage(Page\MeasureUpdate::URL($this->idMeasure1));
        $I->wait(4);
        $I->click(Page\MeasureUpdate::$ManageFormulasButton);
        $I->wait(7);
        $I->waitForElement(Page\MeasureFormulasPopup::$PopupForm, 30);
//        $I->canSeeElement(\Page\MeasureFormulasPopup::$PopupForm);
        $I->wait(4);
        $I->click(\Page\MeasureFormulasPopup::$AddSavingAreaButton);
        $I->wait(6);
        $I->selectOption(\Page\MeasureFormulasPopup::$SavingAreaSelect, \Page\SavingAreaList::Therms);
        $I->wait(3);
        $I->click(\Page\MeasureFormulasPopup::$AddButton);
        $I->wait(6);
        $I->reloadPage();
        $I->wait(6);
        $I->click(\Page\MeasureUpdate::$ManageFormulasButton);
        $I->wait(6);
        $I->waitForText("Measure Formulas", 30, \Page\MeasureFormulasPopup::$Title);
        $I->wait(2);
        $I->canSee(\Page\SavingAreaList::Therms, \Page\MeasureFormulasPopup::AreaLine($number));
        $I->click(\Page\MeasureFormulasPopup::EditFormulaButtonLine($number));
        $I->wait(2);
        $I->canSeeElement(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable1));
        $I->canSeeElement(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable2));
        $I->canSeeElement(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable3));
        $valVariable1 = $I->grabAttributeFrom(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable1), 'data-val');
        $valVariable2 = $I->grabAttributeFrom(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable2), 'data-val');
        $valVariable3 = $I->grabAttributeFrom(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable3), 'data-val');
        $I->click(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable1));
        $I->click(Page\MeasureFormulasPopup::PlusToolLinkLine($number));
        $I->click(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable2));
        $I->click(Page\MeasureFormulasPopup::MultiplyToolLinkLine($number));
        $I->click(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable3));
        $I->canSeeInField(Page\MeasureFormulasPopup::FormulaFieldLine($number), "$valVariable1+ $valVariable2* $valVariable3");
        $I->click(Page\MeasureFormulasPopup::SaveFormulaButtonLine($number));
        $I->wait(3);
        $I->reloadPage();
        $I->wait(4);
        $I->canSee("$valVariable1+ $valVariable2* $valVariable3", Page\MeasureUpdate::FormulaForSavingArea(\Page\SavingAreaList::Therms));
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
        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $I->wait(1);
        $this->idMeasure2 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Measure2_AddFormulaForThermsArea_Area1(\Step\Acceptance\Measure $I) {
        $number    = '1';
        $variable1 = 'Employees number';
        $variable2 = $this->globVariableTitle;
        
        $I->amOnPage(Page\MeasureUpdate::URL($this->idMeasure2));
        $I->wait(4);
        //--------------------------Therms Area---------------------------------
        $I->click(Page\MeasureUpdate::$ManageFormulasButton);
        $I->wait(7);
        $I->waitForText("Measure Formulas", 30, \Page\MeasureFormulasPopup::$Title);
//        $I->canSeeElement(\Page\MeasureFormulasPopup::$PopupForm);
        $I->wait(4);
        $I->click(\Page\MeasureFormulasPopup::$AddSavingAreaButton);
        $I->wait(6);
        $I->selectOption(\Page\MeasureFormulasPopup::$SavingAreaSelect, \Page\SavingAreaList::Therms);
        $I->wait(3);
        $I->click(\Page\MeasureFormulasPopup::$AddButton);
        $I->wait(6);
        $I->reloadPage();
        $I->wait(6);
        $I->click(\Page\MeasureUpdate::$ManageFormulasButton);
        $I->wait(6);
        $I->waitForText("Measure Formulas", 30, \Page\MeasureFormulasPopup::$Title);
        $I->wait(2);
        $I->canSee(\Page\SavingAreaList::Therms, \Page\MeasureFormulasPopup::AreaLine($number));
        $I->click(\Page\MeasureFormulasPopup::EditFormulaButtonLine($number));
        $I->wait(3);
        $I->canSeeElement(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable1));
        $I->canSeeElement(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable2));
        $valVariable1 = $I->grabAttributeFrom(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable1), 'data-val');
        $valVariable2 = $I->grabAttributeFrom(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable2), 'data-val');
        $I->click(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable1));
        $I->click(Page\MeasureFormulasPopup::MultiplyToolLinkLine($number));
        $I->click(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable2));
        $I->canSeeInField(Page\MeasureFormulasPopup::FormulaFieldLine($number), "$valVariable1* $valVariable2");
        $I->click(Page\MeasureFormulasPopup::SaveFormulaButtonLine($number));
        $I->wait(5);
        $I->reloadPage();
        $I->wait(5);
        $I->canSee("$valVariable1* $valVariable2", Page\MeasureUpdate::FormulaForSavingArea(\Page\SavingAreaList::Therms));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Measure2_AddFormulaForEnergySaved_Area3(\Step\Acceptance\Measure $I) {
        $number    = '2';
        $variable1 = 'Employees number';
        $variable2 = $this->globVariableTitle;
        
        $I->amOnPage(Page\MeasureUpdate::URL($this->idMeasure2));
        $I->wait(4);
        //-----------------------Energy Saved Area------------------------------
        $I->click(Page\MeasureUpdate::$ManageFormulasButton);
        $I->wait(7);
        $I->waitForText("Measure Formulas", 30, \Page\MeasureFormulasPopup::$Title);
//        $I->canSeeElement(\Page\MeasureFormulasPopup::$PopupForm);
        $I->wait(4);
        $I->click(\Page\MeasureFormulasPopup::$AddSavingAreaButton);
        $I->wait(6);
        $I->selectOption(\Page\MeasureFormulasPopup::$SavingAreaSelect, \Page\SavingAreaList::EnergySaved);
        $I->wait(3);
        $I->click(\Page\MeasureFormulasPopup::$AddButton);
        $I->wait(6);
        $I->reloadPage();
        $I->wait(6);
        $I->click(\Page\MeasureUpdate::$ManageFormulasButton);
        $I->wait(6);
        $I->waitForText("Measure Formulas", 30, \Page\MeasureFormulasPopup::$Title);
        $I->wait(2);
        $I->canSee(\Page\SavingAreaList::EnergySaved, \Page\MeasureFormulasPopup::AreaLine($number));
        $I->click(\Page\MeasureFormulasPopup::EditFormulaButtonLine($number));
        $I->wait(2);
        $I->canSeeElement(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable1));
        $I->canSeeElement(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable2));
        $valVariable1 = $I->grabAttributeFrom(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable1), 'data-val');
        $valVariable2 = $I->grabAttributeFrom(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable2), 'data-val');
        $I->click(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable1));
        $I->click(Page\MeasureFormulasPopup::DivideToolLinkLine($number));
        $I->click(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable2));
        $I->canSeeInField(Page\MeasureFormulasPopup::FormulaFieldLine($number), "$valVariable1/ $valVariable2");
        $I->click(Page\MeasureFormulasPopup::SaveFormulaButtonLine($number));
        $I->wait(3);
        $I->reloadPage();
        $I->wait(5);
        $I->canSee("$valVariable1/ $valVariable2", Page\MeasureUpdate::FormulaForSavingArea(\Page\SavingAreaList::EnergySaved));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Measure2_AddFormulaForFuelSaved_Area4(\Step\Acceptance\Measure $I) {
        $number    = '3';
        $variable1 = 'Employees number';
        $variable2 = $this->globVariableTitle;
        
        $I->amOnPage(Page\MeasureUpdate::URL($this->idMeasure2));
        $I->wait(4);
        //------------------------Fuel Saved Area-------------------------------
        $I->click(Page\MeasureUpdate::$ManageFormulasButton);
        $I->wait(7);
        $I->waitForText("Measure Formulas", 30, \Page\MeasureFormulasPopup::$Title);
//        $I->canSeeElement(\Page\MeasureFormulasPopup::$PopupForm);
        $I->wait(4);
        $I->click(\Page\MeasureFormulasPopup::$AddSavingAreaButton);
        $I->wait(6);
        $I->selectOption(\Page\MeasureFormulasPopup::$SavingAreaSelect, \Page\SavingAreaList::FuelSaved);
        $I->wait(3);
        $I->click(\Page\MeasureFormulasPopup::$AddButton);
        $I->wait(6);
        $I->reloadPage();
        $I->wait(6);
        $I->click(\Page\MeasureUpdate::$ManageFormulasButton);
        $I->wait(6);
        $I->waitForText("Measure Formulas", 30, \Page\MeasureFormulasPopup::$Title);
        $I->wait(2);
        $I->canSee(\Page\SavingAreaList::FuelSaved, \Page\MeasureFormulasPopup::AreaLine($number));
        $I->click(\Page\MeasureFormulasPopup::EditFormulaButtonLine($number));
        $I->wait(5);
        $I->canSeeElement(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable1));
        $I->canSeeElement(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable2));
        $valVariable1 = $I->grabAttributeFrom(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable1), 'data-val');
        $valVariable2 = $I->grabAttributeFrom(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable2), 'data-val');
        $I->click(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable1));
        $I->click(Page\MeasureFormulasPopup::PlusToolLinkLine($number));
        $I->click(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable1));
        $I->canSeeInField(Page\MeasureFormulasPopup::FormulaFieldLine($number), "$valVariable1+ $valVariable1");
        $I->click(Page\MeasureFormulasPopup::SaveFormulaButtonLine($number));
        $I->wait(5);
        $I->reloadPage();
        $I->wait(5);
        $I->canSee("$valVariable1+ $valVariable1", Page\MeasureUpdate::FormulaForSavingArea(\Page\SavingAreaList::FuelSaved));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure3_Quant_WithoutSubmeasure(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure3Desc = $I->GenerateNameOf("Description_3 quant Multiple Quest & Number Submeasure ");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::MultipleQuestionAndNumber_QuantitativeSubmeasure;
        $questions      = ['What?', "Where?", "Who?"];
        $answers        = ['Grey', 'Green', 'Red'];
        $reamOrLbs      = ['lbs', 'ream', "ream"];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers, null, null, null, null, null, null, null, null, $reamOrLbs);
        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $I->wait(1);
        $this->idMeasure3 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Measure3_AddGlobalVariablesToOptions_MeasureFormula(\Step\Acceptance\Measure $I) {
        $questions      = ['What?', "Where?", "Who?"];
        $answers        = ['Grey', 'Green', 'Red'];
        
        $I->amOnPage(Page\MeasureUpdate::URL($this->idMeasure3));
        $I->wait(4);
        $I->canSee("You have to select Global Variables for next combination Question and Option", Page\MeasureUpdate::$FormulasAlert_MultipleQuestionAndNumber);
        $I->canSee("$questions[0] - $answers[0]", Page\MeasureUpdate::$FormulasAllertOption_MultipleQuestionAndNumber);
        $I->canSee("$questions[0] - $answers[1]", Page\MeasureUpdate::$FormulasAllertOption_MultipleQuestionAndNumber);
        $I->canSee("$questions[0] - $answers[2]", Page\MeasureUpdate::$FormulasAllertOption_MultipleQuestionAndNumber);
        $I->canSee("$questions[1] - $answers[0]", Page\MeasureUpdate::$FormulasAllertOption_MultipleQuestionAndNumber);
        $I->canSee("$questions[1] - $answers[1]", Page\MeasureUpdate::$FormulasAllertOption_MultipleQuestionAndNumber);
        $I->canSee("$questions[1] - $answers[2]", Page\MeasureUpdate::$FormulasAllertOption_MultipleQuestionAndNumber);
        $I->canSee("$questions[2] - $answers[0]", Page\MeasureUpdate::$FormulasAllertOption_MultipleQuestionAndNumber);
        $I->canSee("$questions[2] - $answers[1]", Page\MeasureUpdate::$FormulasAllertOption_MultipleQuestionAndNumber);
        $I->canSee("$questions[2] - $answers[2]", Page\MeasureUpdate::$FormulasAllertOption_MultipleQuestionAndNumber);
        $I->click(Page\MeasureUpdate::$ManageFormulasButton);
        $I->wait(6);
        $I->waitForText("Measure Formulas", 30, \Page\MeasureFormulasPopup::$Title);
//        $I->canSeeElement(\Page\MeasureFormulasPopup::$PopupForm);
        $I->wait(2);
        $I->canSeeElement(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[0], $answers[0]));
        $I->canSeeElement(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[0], $answers[1]));
        $I->canSeeElement(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[0], $answers[2]));
        $I->canSeeElement(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[1], $answers[0]));
        $I->canSeeElement(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[1], $answers[1]));
        $I->canSeeElement(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[1], $answers[2]));
        $I->canSeeElement(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[2], $answers[0]));
        $I->canSeeElement(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[2], $answers[1]));
        $I->canSeeElement(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[2], $answers[2]));
        $I->canSee($this->globVariableTitle, \Page\MeasureFormulasPopup::GlobalVariableOptionLine_ByQuestionAndNumber($questions[0], $answers[0]));
        $I->canSee($this->globVariableTitle, \Page\MeasureFormulasPopup::GlobalVariableOptionLine_ByQuestionAndNumber($questions[0], $answers[1]));
        $I->canSee($this->globVariableTitle, \Page\MeasureFormulasPopup::GlobalVariableOptionLine_ByQuestionAndNumber($questions[0], $answers[2]));
        $I->canSee($this->globVariableTitle, \Page\MeasureFormulasPopup::GlobalVariableOptionLine_ByQuestionAndNumber($questions[1], $answers[0]));
        $I->canSee($this->globVariableTitle, \Page\MeasureFormulasPopup::GlobalVariableOptionLine_ByQuestionAndNumber($questions[1], $answers[1]));
        $I->canSee($this->globVariableTitle, \Page\MeasureFormulasPopup::GlobalVariableOptionLine_ByQuestionAndNumber($questions[1], $answers[2]));
        $I->selectOption(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[0], $answers[0]), $this->globVariableTitle);
        $I->selectOption(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[0], $answers[1]), $this->globVariableTitle);
        $I->selectOption(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[0], $answers[2]), $this->globVariableTitle);
        $I->selectOption(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[1], $answers[0]), $this->globVariableTitle);
        $I->selectOption(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[2], $answers[0]), $this->globVariableTitle);
        $I->selectOption(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[2], $answers[1]), $this->globVariableTitle);
        $I->selectOption(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[2], $answers[2]), $this->globVariableTitle);
        $I->click(Page\MeasureFormulasPopup::$SaveButton);
        $I->wait(4);
        $I->reloadPage();
        $I->wait(5);
        $I->canSee("You have to select Global Variables for next combination Question and Option", Page\MeasureUpdate::$FormulasAlert_MultipleQuestionAndNumber);
        $I->canSee("$questions[1] - $answers[1]", Page\MeasureUpdate::$FormulasAllertOption_MultipleQuestionAndNumber);
        $I->canSee("$questions[1] - $answers[2]", Page\MeasureUpdate::$FormulasAllertOption_MultipleQuestionAndNumber);
        $I->cantSee("$questions[0] - $answers[0]", Page\MeasureUpdate::$FormulasAllertOption_MultipleQuestionAndNumber);
        $I->cantSee("$questions[0] - $answers[1]", Page\MeasureUpdate::$FormulasAllertOption_MultipleQuestionAndNumber);
        $I->cantSee("$questions[0] - $answers[2]", Page\MeasureUpdate::$FormulasAllertOption_MultipleQuestionAndNumber);
        $I->cantSee("$questions[1] - $answers[0]", Page\MeasureUpdate::$FormulasAllertOption_MultipleQuestionAndNumber);
        $I->cantSee("$questions[2] - $answers[0]", Page\MeasureUpdate::$FormulasAllertOption_MultipleQuestionAndNumber);
        $I->cantSee("$questions[2] - $answers[1]", Page\MeasureUpdate::$FormulasAllertOption_MultipleQuestionAndNumber);
        $I->cantSee("$questions[2] - $answers[2]", Page\MeasureUpdate::$FormulasAllertOption_MultipleQuestionAndNumber);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure4_Quant_ThermsPopup(\Step\Acceptance\Measure $I) {
        $desc            = $this->measure4Desc = $I->GenerateNameOf("Description_4 quant Therms Popup Submeasure ");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'yes';
        $submeasureType  = \Step\Acceptance\Measure::PopupTherms_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton, 15);
        $I->wait(1);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure4 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure5_Quant_LightingPopup(\Step\Acceptance\Measure $I) {
        $desc            = $this->measure5Desc = $I->GenerateNameOf("Description_5 quant Lighting Popup Submeasure ");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'yes';
        $submeasureType  = \Step\Acceptance\Measure::PopupLighting_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton, 15);
        $I->wait(1);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure5 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure6_Quant_WasteDiversionPopup(\Step\Acceptance\Measure $I) {
        $desc            = $this->measure6Desc = $I->GenerateNameOf("Description_6 quant Waste Diversion Popup Submeasure ");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'yes';
        $submeasureType  = \Step\Acceptance\Measure::PopupWasteDivertion_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton, 15);
        $I->wait(1);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure6 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure7_NotQuant_MultipleQuestions(\Step\Acceptance\Measure $I) {
        $desc            = $this->measure7Desc = $I->GenerateNameOf("Description_7 NOTquant Multiple ques ");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::MultipleQuestion_MultipleAnswersSubmeasure;
        $questions       = ['ques1?', 'ques2?', 'ques3?'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton, 15);
        $I->wait(1);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure7 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure8_NotQuant_MultipleQuestionsAndNumber(\Step\Acceptance\Measure $I) {
        $desc            = $this->measure8Desc = $I->GenerateNameOf("Description_8 NOTquant Multiple ques & Number ");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::MultipleQuestionAndNumber_MultipleAnswersSubmeasure;
        $questions       = ['Question?'];
        $answers         = ['Opt1', 'Opt2', 'Opt3'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton, 15);
        $I->wait(1);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure8 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
   
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateMeasure9_NotQuant_WithoutSubmeasures(\Step\Acceptance\Measure $I) {
        $desc            = $this->measure9Desc = $I->GenerateNameOf("Description_9 NOTquant Without Submeasure ");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'no';
        $submeasureType  = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton, 15);
        $I->wait(1);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure9 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
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
        $city    = $this->city1 = $I->GenerateNameOf("CityChCr1");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip1 = $I->GenerateZipCode();
        $program = $this->program1 = $I->GenerateNameOf("ProgChCr1");
        $county  = $this->county;
        
        $I->CreateCity($city, $state, $zips, $county);
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
        $I->wait(2);
    }
    
    //----------------------------Create checklist------------------------------
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateChecklistForTier2(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = 'Office / Retail';
        $tier               = '2';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statuses);
        $this->checklistUrl = $I->grabFromCurrentUrl();
        $I->comment("Url tier2 checklist: $this->checklistUrl");
        $u1 = explode('=', $this->checklistUrl);
        $urlEnd = $u1[1];
        $u2 = explode('&', $urlEnd);
        $this->id_checklist = $u2[0];
        $I->comment("Tier2 checklist id: $this->id_checklist");
        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_checklist));
        $I->PublishChecklistStatus();
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
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_Business1Registration(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email1 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password = 'Qq!1111111';
        $busName          = $this->business1 = $I->GenerateNameOf("busnam");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");;
        $zip              = $this->zip1;
        $city             = $this->city1;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = $this->employeesCount1 = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(15);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CompleteMeasure1(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
        $value1   = '11';
        $value2   = '22';
                
        $I->wait(1);
        $I->comment("Complete Measure1 and save.");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(4);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
        $I->wait(3);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(4);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CompleteMeasure2(AcceptanceTester $I) {
        $measDesc = $this->measure2Desc;
                
        $I->wait(1);
        $I->comment("Complete Measure2 and save.");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(4);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure2]"], $style = 'visibility');
        $I->wait(3);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(4);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CompleteMeasure3(AcceptanceTester $I) {
        $measDesc = $this->measure3Desc;
        $value1   = '1';
        $value2   = '1';
        $value3   = '1';
        $option1  = 'Green';
        $option2  = 'Red';
        $option3  = 'Grey';
                
        $I->wait(1);
        $I->comment("Complete Measure3 and save.");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(4);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure3]"], $style = 'visibility');
        $I->wait(3);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(2);
        $I->selectOption(\Page\RegistrationStarted::SubmeasureSelect_ByMeasureDesc($measDesc, '1'), $option2);
        $I->selectOption(\Page\RegistrationStarted::SubmeasureSelect_ByMeasureDesc($measDesc, '2'), $option1);
        $I->selectOption(\Page\RegistrationStarted::SubmeasureSelect_ByMeasureDesc($measDesc, '3'), $option3);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '3'), $value3);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(4);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CompleteMeasure4(AcceptanceTester $I) {
        $measDesc  = $this->measure4Desc;
        $totalOpt1 = '25';
                
        $I->wait(1);
        $I->comment("Complete Measure4 and save.");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(4);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure4]"], $style = 'visibility');
        $I->wait(3);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->click(Page\RegistrationStarted::SubmeasureToggleButton_2Items_ByMeasureDesc($measDesc, '1'));
        $I->wait(2);
        $I->selectOption(Page\RegistrationStarted::ThermsPopup_OptionSelect_Section2('1'), $this->thermName);
        $I->wait(1);
        $I->fillField(Page\RegistrationStarted::ThermsPopup_TotalEstimatedField_Section2('1'), '25');
        $I->wait(3);
        $I->click(\Page\RegistrationStarted::$ThermsPopup_SaveChangesButton);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(4);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CompleteMeasure5(AcceptanceTester $I) {
        $measDesc = $this->measure5Desc;
                
        $I->wait(1);
        $I->comment("Complete Measure5 and save.");
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(4);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure5]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(4);
        $I->click(Page\RegistrationStarted::SubmeasureToggleButton_2Items_ByMeasureDesc($measDesc, '1'));
        $I->wait(4);
        $I->selectOption(\Page\RegistrationStarted::$LightingPopup_BuildingTypeSelect, 'Hotel');
        $I->wait(3);
        $I->selectOption(\Page\RegistrationStarted::LightingPopup_ReplacementFixtureSelect('1'), '5');
        $I->wait(2);
        $I->fillField(\Page\RegistrationStarted::LightingPopup_ReplacementFixtureQuantityField('1'), '4');
        $I->fillField(\Page\RegistrationStarted::LightingPopup_ExistingFixtureQuantityField('1'), '4');
        $I->wait(3);
        $I->click(Page\RegistrationStarted::$LightingPopup_SaveChangesButton);
        $I->wait(3);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(4);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CompleteMeasure6(AcceptanceTester $I) {
        $measDesc = $this->measure6Desc;
        $before   = 'before';
        $after    = 'after';
        
        $I->wait(1);
        $I->comment("Complete Measure6 fand save.");
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(4);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure6]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure6']");
        $I->wait(2);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(3);
        $I->makeElementVisible(["[data-measure_id=$this->idMeasure6]"], $style = 'visibility');
        $I->wait(3);
        $I->selectOption(\Page\RegistrationStarted::SubmeasureToggleButton_3Items_ByMeasureDesc($measDesc, '1'), 'yes');
        $I->wait(3);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(2);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(6);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure6]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure6']");
        $I->wait(2);
//        $I->click('[Detailed Inputs Form]');
//        $I->click("[Detailed Inputs Form]", "#");
        $I->click(Page\RegistrationStarted::SubmeasureLink_ByMeasureDesc($measDesc, '1'));
        $I->wait(15);
        $I->selectOption(\Page\RegistrationStarted::WasteDiversionPopup_CommoditySelect('1', $before), 'Cardboard');
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::WasteDiversionPopup_ContainerTypeSelect('1', $before), 'CARRY BIN');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::WasteDiversionPopup_ContainersField('1', $before), '4');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::WasteDiversionPopup_CollectionPerWeekField('1', $before), '10');
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$WasteDiversionPopup_AfterGBTab);
        $I->wait(2);
        $I->selectOption(\Page\RegistrationStarted::WasteDiversionPopup_ContainerTypeSelect('1', $after), 'DUMPSTER');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::WasteDiversionPopup_ContainersField('1', $after), '6');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::WasteDiversionPopup_CollectionPerWeekField('1', $after), '5');
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::WasteDiversionPopup_CompactedToggleButton('1', $after));
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::WasteDiversionPopup_SaveChangesButton($after));
        $I->wait(2);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CompleteMeasure7(AcceptanceTester $I) {
        $measDesc = $this->measure7Desc;
        $question1 = 'ques1?';
        $question2 = 'ques2?';
        $question3 = 'ques3?';
                
        $I->wait(1);
        $I->comment("Complete Measure7 and save.");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(4);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure7]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure7']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::SubmeasureToggleButton_2Items_ByMeasureDesc($measDesc, '1'));
        $I->wait(2);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(4);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CompleteMeasure8(AcceptanceTester $I) {
        $measDesc = $this->measure8Desc;
        $value1   = '2';
        $option1  = 'Opt1';
        $option2  = 'Opt2';
        $option3  = 'Opt3';
                
        $I->wait(1);
        $I->comment("Complete Measure8 and save.");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(4);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure8]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure8']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(2);
        $I->selectOption(\Page\RegistrationStarted::SubmeasureSelect_ByMeasureDesc($measDesc, '1'), $option2);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(4);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CompleteMeasure9(AcceptanceTester $I) {
        $measDesc = $this->measure9Desc;
                
        $I->wait(1);
        $I->comment("Complete Measure9 and save.");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(4);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure9]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure9']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(4);
    }
    
    /**
     * @group admin
     */
    
    public function Help_LogOut1(AcceptanceTester $I) {
        $I->reloadPage();
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(2);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsAdmin($I);
    }
    
    /**
     * @group stateadmin
     */
    
    public function LogOut_And_LogInAsStateAdmin2(AcceptanceTester $I)
    {
        $I->reloadPage();
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(2);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->emailStateAdmin, $this->password, $I, 'state admin');
        $I->wait(2);
    }
    
    /**
     * @group coordinator
     */
    
    public function LogOut_And_LogInAsCoordinator2(AcceptanceTester $I)
    {
        $I->reloadPage();
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(2);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->emailCoordinator, $this->password, $I, 'coordinator');
        $I->wait(2);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_GoToBusinessViewPage_GetBusiness1Id(AcceptanceTester $I){
        $I->wait(1);
        $I->SelectDefaultState($I, $this->state);
        $I->wait(1);
        $I->amOnPage(Page\Dashboard::URL());
        $I->wait(2);
        $url1 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business1), 'href');
        $I->comment("Url1: $url1");
        $u1 = explode('=', $url1);
        $this->id_business1 = $u1[1];
        $I->comment("Business1 id: $this->id_business1");
    }
     
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckMeasure1IsCompleted(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
        $this->savingMeas1_Annual_ThermsArea_Bus1 = "5027"; //22+11*455 = 5027; //22 + 11 * $this->employeesCount;
        $this->savingMeas1_Daily_ThermsArea_Bus1  = "13.7726027397"; // round( 5027 /365 ) = 13.7726027397; //round(($this->savingMeas1_Annual_Area1 / 365), 10);
        
        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->click(\Page\BusinessChecklistView::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo(Page\BusinessChecklistView::MeasureDescription_ByDesc($measDesc));
//        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(2);
    }
    
    /**
     * @group admin
     */
    
    public function CheckMeasure1Savings_OnBusinessView(AcceptanceTester $I) {
        $measDesc                       = $this->measure1Desc;
        
        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: $this->savingMeas1_Annual_ThermsArea_Bus1 $this->units_ThermsArea\ndaily: $this->savingMeas1_Daily_ThermsArea_Bus1 $this->units_ThermsArea", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckMeasure2IsCompleted(AcceptanceTester $I) {
        $measDesc = $this->measure2Desc;
        $this->savingMeas2_Annual_ThermsArea_Bus1 = $this->employeesCount1 * $this->globVariableValue;
        $this->savingMeas2_Daily_ThermsArea_Bus1  = round(($this->savingMeas2_Annual_ThermsArea_Bus1 / 365), 12);
        $this->savingMeas2_Annual_EnergySavedArea_Bus1 = round(($this->employeesCount1 / $this->globVariableValue),7);
        $this->savingMeas2_Daily_EnergySavedArea_Bus1  = round((($this->employeesCount1 / $this->globVariableValue) / 365), 10);
        $this->savingMeas2_Annual_FuelSavedArea_Bus1 = "910"; // 455+455 = 910; //$this->employeesCount + $this->employeesCount;
        $this->savingMeas2_Daily_FuelSavedArea_Bus1  = "2.49315068493"; // round( 910 / 365 ) = 2.49315068493; //round(($this->savingMeas2_Annual_Area4 / 365), 11);
        
        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->click(\Page\BusinessChecklistView::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure2]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo(Page\BusinessChecklistView::MeasureDescription_ByDesc($measDesc));
//        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
        $I->wait(2);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(2);
    }
    
    /**
     * @group admin
     */
    
    public function CheckMeasure2Savings_OnBusinessView(AcceptanceTester $I) {
        $measDesc                 = $this->measure2Desc;
        
        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: $this->savingMeas2_Annual_ThermsArea_Bus1 $this->units_ThermsArea\ndaily: $this->savingMeas2_Daily_ThermsArea_Bus1 $this->units_ThermsArea", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::EnergySaved.":\nannual: $this->savingMeas2_Annual_EnergySavedArea_Bus1 $this->units_EnergySavedArea\ndaily: $this->savingMeas2_Daily_EnergySavedArea_Bus1 $this->units_EnergySavedArea", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::FuelSaved.":\nannual: $this->savingMeas2_Annual_FuelSavedArea_Bus1 $this->units_FuelSavedArea\ndaily: $this->savingMeas2_Daily_FuelSavedArea_Bus1 $this->units_FuelSavedArea", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckMeasure3IsCompleted(AcceptanceTester $I) {
        $measDesc = $this->measure3Desc;
        $this->savingMeas3_Annual_GreenhouseGasEmissionsSavedArea_Bus1  = "0.18"; // 1*0.03 + 0 + 5*0.03 = 0.18; 
        $this->savingMeas3_Daily_GreenhouseGasEmissionsSavedArea_Bus1   = "0.000493150684932"; // round( 0.18 /365 ) = 0.000493150684932; 
        
        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->click(\Page\BusinessChecklistView::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure3]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo(Page\BusinessChecklistView::MeasureDescription_ByDesc($measDesc));
//        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(2);
    }
    
    /**
     * @group admin
     */
    
    public function CheckMeasure3Savings_OnBusinessView(AcceptanceTester $I) {
        $measDesc                       = $this->measure3Desc;
        
        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved.":\nannual: $this->savingMeas3_Annual_GreenhouseGasEmissionsSavedArea_Bus1 $this->units_GreenhouseGasEmissionsSavedArea\ndaily: $this->savingMeas3_Daily_GreenhouseGasEmissionsSavedArea_Bus1 $this->units_GreenhouseGasEmissionsSavedArea", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckMeasure4IsCompleted(AcceptanceTester $I) {
        $measDesc = $this->measure4Desc;
        $this->savingMeas4_Annual_ThermsArea_Bus1 = 25 * $this->thermCount; //  
        $this->savingMeas4_Daily_ThermsArea_Bus1  = round(($this->savingMeas4_Annual_ThermsArea_Bus1 / 365),10);; // 
        
        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->click(\Page\BusinessChecklistView::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure4]", ".popup-therm [data-measure-id=$this->idMeasure4]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo(Page\BusinessChecklistView::MeasureDescription_ByDesc($measDesc));
//        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(2);
    }
    
    /**
     * @group admin
     */
    
    public function CheckMeasure4Savings_OnBusinessView(AcceptanceTester $I) {
        $measDesc                            = $this->measure4Desc;
        
        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: $this->savingMeas4_Annual_ThermsArea_Bus1 $this->units_ThermsArea\ndaily: $this->savingMeas4_Daily_ThermsArea_Bus1 $this->units_ThermsArea", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckMeasure5IsCompleted(AcceptanceTester $I) {
        $measDesc = $this->measure5Desc;
        $this->savingMeas5_Annual_EnergySavedArea_Bus1 = "138.880004883"; // 
        $this->savingMeas5_Daily_EnergySavedArea_Bus1  = "0.380493164062"; // 
        
        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->click(\Page\BusinessChecklistView::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure5]", ".popup-therm [data-measure-id=$this->idMeasure5]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo(Page\BusinessChecklistView::MeasureDescription_ByDesc($measDesc));
//        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(2);
    }
    
    /**
     * @group admin
     */
    
    public function CheckMeasure5Savings_OnBusinessView(AcceptanceTester $I) {
        $measDesc                       = $this->measure5Desc;
        
        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::EnergySaved.":\nannual: $this->savingMeas5_Annual_EnergySavedArea_Bus1 $this->units_EnergySavedArea\ndaily: $this->savingMeas5_Daily_EnergySavedArea_Bus1 $this->units_EnergySavedArea", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckMeasure6IsCompleted(AcceptanceTester $I) {
        $measDesc = $this->measure6Desc;
        $this->savingMeas6_Annual_SolidWasteDivertedArea_Bus1 = "562625.63786"; // 
        $this->savingMeas6_Daily_SolidWasteDivertedArea_Bus1  = "1541.44010373"; // 
        
        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->click(\Page\BusinessChecklistView::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure6]", ".popup-therm [data-measure-id=$this->idMeasure6]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo(Page\BusinessChecklistView::MeasureDescription_ByDesc($measDesc));
//        $I->scrollTo("[data-measure-id='$this->idMeasure6']");
        $I->wait(1);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(2);
    }
    
    /**
     * @group admin
     */
    
    public function CheckMeasure6Savings_OnBusinessView(AcceptanceTester $I) {
        $measDesc                                        = $this->measure6Desc;
        
        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: $this->savingMeas6_Annual_SolidWasteDivertedArea_Bus1 $this->units_SolidWasteDivertedArea\ndaily: $this->savingMeas6_Daily_SolidWasteDivertedArea_Bus1 $this->units_SolidWasteDivertedArea", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckMeasure7IsCompleted(AcceptanceTester $I) {
        $measDesc = $this->measure7Desc;
        
        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->click(\Page\BusinessChecklistView::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure7]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo(Page\BusinessChecklistView::MeasureDescription_ByDesc($measDesc));
//        $I->scrollTo("[data-measure-id='$this->idMeasure7']");
        $I->wait(1);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(2);
    }
    
    /**
     * @group admin
     */
    
    public function CheckMeasure7SavingsAbsent_OnBusinessView(AcceptanceTester $I) {
        $measDesc                                        = $this->measure7Desc;
        
        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->cantSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckMeasure8IsCompleted(AcceptanceTester $I) {
        $measDesc = $this->measure8Desc;
        
        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->click(\Page\BusinessChecklistView::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure8]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo(Page\BusinessChecklistView::MeasureDescription_ByDesc($measDesc));
//        $I->scrollTo("[data-measure-id='$this->idMeasure8']");
        $I->wait(1);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(2);
    }
    
    /**
     * @group admin
     */
    
    public function CheckMeasure8SavingsAbsent_OnBusinessView(AcceptanceTester $I) {
        $measDesc                                        = $this->measure8Desc;
        
        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->cantSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckMeasure9IsCompleted(AcceptanceTester $I) {
        $measDesc = $this->measure9Desc;
        
        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->click(\Page\BusinessChecklistView::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure9]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo(Page\BusinessChecklistView::MeasureDescription_ByDesc($measDesc));
//        $I->scrollTo("[data-measure-id='$this->idMeasure9']");
        $I->wait(1);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(2);
    }
    
    /**
     * @group admin
     */
    
    public function CheckMeasure9SavingsAbsent_OnBusinessView(AcceptanceTester $I) {
        $measDesc                                        = $this->measure9Desc;
        
        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->cantSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateReport_BySavingAreas(AcceptanceTester $I) {
        $I->wait(2);
        $I->amOnPage(\Page\ReportCreate::URL());
        $I->wait(2);
        $I->click(Page\ReportCreate::$Individual_RadioLabel);
        $I->wait(5);
        $I->scrollTo(Page\ReportCreate::IndividualOptionLabel($this->state));
        $I->wait(1);
        $I->click(Page\ReportCreate::IndividualOptionLabel($this->state));
        $I->wait(2);
        $I->scrollTo(Page\ReportCreate::$NextStepButton);
        $I->wait(1);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(2);
        $I->waitForElement(Page\ReportCreate::$NextStepButton, 15);
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(2);
        $I->waitForElement(Page\ReportCreate::$NextStepButton, 15);
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(2);
        $I->waitForElement(Page\ReportCreate::$NextStepButton, 15);
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(2);
        $I->waitForElement(Page\ReportCreate::$NextStepButton, 15);
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(2);
        $I->waitForElement(Page\ReportCreate::$NextStepButton, 15);
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(2);
        $I->waitForElement(Page\ReportCreate::$NextStepButton, 15);
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(2);
        $I->waitForElement(Page\ReportCreate::$NextStepButton, 15);
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->canSee('0', Page\ReportResult::$CertifiedBusinessesInfo);
        $I->cantSeeElement(Page\ReportResult::StateInfo_ByName($this->state));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure1));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure2));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure3));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure4));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure5));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure6));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure7));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure8));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure9));
        $I->cantSeeElement(Page\ReportResult::AuditSubGroup_ByName(Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy));
        $I->cantSeeElement(Page\ReportResult::AuditSubGroup_ByName(Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste));
        $I->cantSeeElement(Page\ReportResult::Program_ByName($this->program1));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure1));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure2));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure3));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure4));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure5));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure6));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure7));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure8));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure9));
        
        $I->comment("-----Check on Graphic View Tab:-----");
        $I->click(\Page\ReportResult::$GraphicViewTab);
        $I->wait(1);
        $I->cantSeeElement(\Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::Therms));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::VOC));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::EnergySaved));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::FuelSaved));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::SolidWasteDiverted));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateReport_ByYear(AcceptanceTester $I) {
        date_default_timezone_set("UTC");
        $this->todayDate  = date("m/d/Y");
        $currentYear  = $this->currentYear = date("Y");
        
        $I->wait(2);
        $I->amOnPage(\Page\ReportCreate::URL());
        $I->wait(2);
        $I->click(Page\ReportCreate::$Individual_RadioLabel);
        $I->wait(5);
        $I->scrollTo(Page\ReportCreate::IndividualOptionLabel($this->state));
        $I->wait(1);
        $I->click(Page\ReportCreate::IndividualOptionLabel($this->state));
        $I->wait(2);
        $I->scrollTo(Page\ReportCreate::$NextStepButton);
        $I->wait(1);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->selectOption(Page\ReportCreate::$ReportTypeSelect, "By Year");
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->canSee('0', Page\ReportResult::$CertifiedBusinessesInfo);
        $I->cantSeeElement(Page\ReportResult::StateInfo_ByName($this->state));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure1));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure2));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure3));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure4));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure5));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure6));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure7));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure8));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure9));
        $I->cantSeeElement(Page\ReportResult::AuditSubGroup_ByName(Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy));
        $I->cantSeeElement(Page\ReportResult::AuditSubGroup_ByName(Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste));
        $I->cantSeeElement(Page\ReportResult::Program_ByName($this->program1));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::Therms));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::VOC));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::EnergySaved));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::FuelSaved));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee($currentYear, \Page\ReportResult::TimeRangeHead('1'));
        $I->cantSeeElement(\Page\ReportResult::TimeRangeHead('2'));
        
        $I->comment("-----Check on Graphic View Tab:-----");
        $I->click(\Page\ReportResult::$GraphicViewTab);
        $I->wait(1);
        $I->canSeeElement(\Page\ReportResult::$ChartView);
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::Therms));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::VOC));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::EnergySaved));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::FuelSaved));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::SolidWasteDiverted));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateReport_ByQuarter(AcceptanceTester $I) {
        $currentYear  = $this->currentYear;
        $quarter      = $this->currentQuarter = intval((date('n')+2)/3);
        $I->comment("Current date: $this->todayDate is in $quarter Quarter");
        
        $I->wait(2);
        $I->amOnPage(\Page\ReportCreate::URL());
        $I->wait(2);
        $I->click(Page\ReportCreate::$Individual_RadioLabel);
        $I->wait(5);
        $I->scrollTo(Page\ReportCreate::IndividualOptionLabel($this->state));
        $I->wait(1);
        $I->click(Page\ReportCreate::IndividualOptionLabel($this->state));
        $I->wait(2);
        $I->scrollTo(Page\ReportCreate::$NextStepButton);
        $I->wait(1);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->selectOption(Page\ReportCreate::$ReportTypeSelect, "By Quarter");
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->canSee('0', Page\ReportResult::$CertifiedBusinessesInfo);
        $I->cantSeeElement(Page\ReportResult::StateInfo_ByName($this->state));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure1));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure2));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure3));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure4));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure5));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure6));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure7));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure8));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure9));
        $I->cantSeeElement(Page\ReportResult::AuditSubGroup_ByName(Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy));
        $I->cantSeeElement(Page\ReportResult::AuditSubGroup_ByName(Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste));
        $I->cantSeeElement(Page\ReportResult::Program_ByName($this->program1));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::Therms));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::VOC));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::EnergySaved));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::FuelSaved));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::SolidWasteDiverted));
        for($i=1; $i<=$quarter; $i++){
            $I->canSee("$currentYear Q$i", \Page\ReportResult::TimeRangeHead($i));
        }
        
        $I->comment("-----Check on Graphic View Tab:-----");
        $I->click(\Page\ReportResult::$GraphicViewTab);
        $I->wait(1);
        $I->canSeeElement(\Page\ReportResult::$ChartView);
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::Therms));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::VOC));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::EnergySaved));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::FuelSaved));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::SolidWasteDiverted));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateReport_ByMonth(AcceptanceTester $I) {
        $currentYear  = $this->currentYear;
        $monthNumber  = $this->currentMonth = date('n');
        
        $I->wait(2);
        $I->amOnPage(\Page\ReportCreate::URL());
        $I->wait(2);
        $I->click(Page\ReportCreate::$Individual_RadioLabel);
        $I->wait(5);
        $I->scrollTo(Page\ReportCreate::IndividualOptionLabel($this->state));
        $I->wait(1);
        $I->click(Page\ReportCreate::IndividualOptionLabel($this->state));
        $I->wait(2);
        $I->scrollTo(Page\ReportCreate::$NextStepButton);
        $I->wait(1);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->selectOption(Page\ReportCreate::$ReportTypeSelect, "By Month");
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->canSee('0', Page\ReportResult::$CertifiedBusinessesInfo);
        $I->cantSeeElement(Page\ReportResult::StateInfo_ByName($this->state));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure1));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure2));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure3));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure4));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure5));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure6));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure7));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure8));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure9));
        $I->cantSeeElement(Page\ReportResult::AuditSubGroup_ByName(Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy));
        $I->cantSeeElement(Page\ReportResult::AuditSubGroup_ByName(Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste));
        $I->cantSeeElement(Page\ReportResult::Program_ByName($this->program1));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::Therms));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::VOC));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::EnergySaved));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::FuelSaved));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::SolidWasteDiverted));
        for($i=1; $i<=$monthNumber; $i++){
            $a = $i-1;
            $I->canSee("$currentYear ".$this->months[$a], \Page\ReportResult::TimeRangeHead($i));
        }
        
        $I->comment("-----Check on Graphic View Tab:-----");
        $I->click(\Page\ReportResult::$GraphicViewTab);
        $I->wait(1);
        $I->canSeeElement(\Page\ReportResult::$ChartView);
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::Therms));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::VOC));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::EnergySaved));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::FuelSaved));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::SolidWasteDiverted));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOut2(AcceptanceTester $I) {
        $I->reloadPage();
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(2);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->email1, $this->password, $I, 'user');
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
        $I->wait(5);
        $I->click(".confirm");
        $I->wait(4);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOnMyReportCardPage(AcceptanceTester $I) {
        $I->amOnPage(Page\MyReportCard::$URL_ReportTab);
        $I->wait(2);
        $I->canSee($this->program1, Page\MyReportCard::ProgramLine('1'));
        $I->canSee(\Page\SectorList::DefaultSectorOfficeRetail, Page\MyReportCard::SectorLine('1'));
        $I->canSee($this->todayDate, Page\MyReportCard::EnrollmentDayLine('1'));
        $I->cantSeeElement(Page\MyReportCard::$Row_ReportTable);
        $I->cantSeeElement(Page\MyReportCard::SavingAreaLine(\Page\SavingAreaList::Therms));
        $I->cantSeeElement(Page\MyReportCard::SavingAreaLine(\Page\SavingAreaList::VOC));
        $I->cantSeeElement(Page\MyReportCard::SavingAreaLine(\Page\SavingAreaList::EnergySaved));
        $I->cantSeeElement(Page\MyReportCard::SavingAreaLine(\Page\SavingAreaList::FuelSaved));
        $I->cantSeeElement(Page\MyReportCard::SavingAreaLine(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->cantSeeElement(Page\MyReportCard::SavingAreaLine(\Page\SavingAreaList::SolidWasteDiverted));
        
        $I->comment("-----Check on Visual Scoreboard Tab:-----");
        $I->amOnPage(Page\MyReportCard::$URL_VisualScoreboardTab);
        $I->wait(1);
        $I->cantSeeElement(Page\MyReportCard::SavingAreaBlock(\Page\SavingAreaList::Therms));
        $I->cantSeeElement(Page\MyReportCard::SavingAreaBlock(\Page\SavingAreaList::VOC));
        $I->cantSeeElement(Page\MyReportCard::SavingAreaBlock(\Page\SavingAreaList::EnergySaved));
        $I->cantSeeElement(Page\MyReportCard::SavingAreaBlock(\Page\SavingAreaList::FuelSaved));
        $I->cantSeeElement(Page\MyReportCard::SavingAreaBlock(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->cantSeeElement(Page\MyReportCard::SavingAreaBlock(\Page\SavingAreaList::SolidWasteDiverted));
    }
    
    /**
     * @group admin
     */
    
    public function Help_LogOut3(AcceptanceTester $I) {
        $I->reloadPage();
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(2);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsAdmin($I);
    }
    
    /**
     * @group stateadmin
     */
    
    public function LogOut_And_LogInAsStateAdmin3(AcceptanceTester $I)
    {
        $I->reloadPage();
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(2);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->emailStateAdmin, $this->password, $I, 'state admin');
        $I->wait(2);
    }
    
    /**
     * @group coordinator
     */
    
    public function LogOut_And_LogInAsCoordinator3(AcceptanceTester $I)
    {
        $I->reloadPage();
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(2);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->emailCoordinator, $this->password, $I, 'coordinator');
        $I->wait(2);
    }
    
    /**
     * @group admin
     */
    
    public function CheckSavingsMeasure1_OnBusinessView2(AcceptanceTester $I) {
        $measDesc           = $this->measure1Desc;
        
        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: $this->savingMeas1_Annual_ThermsArea_Bus1 $this->units_ThermsArea\ndaily: $this->savingMeas1_Daily_ThermsArea_Bus1 $this->units_ThermsArea", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateReport2_BySavingAreas(AcceptanceTester $I) {
        $I->wait(2);
        $I->amOnPage(\Page\ReportCreate::URL());
        $I->wait(2);
        $I->click(Page\ReportCreate::$Individual_RadioLabel);
        $I->wait(5);
        $I->scrollTo(Page\ReportCreate::IndividualOptionLabel($this->state));
        $I->wait(1);
        $I->click(Page\ReportCreate::IndividualOptionLabel($this->state));
        $I->wait(2);
        $I->scrollTo(Page\ReportCreate::$NextStepButton);
        $I->wait(1);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->canSee('0', Page\ReportResult::$CertifiedBusinessesInfo);
        $I->cantSeeElement(Page\ReportResult::StateInfo_ByName($this->state));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure1));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure2));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure3));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure4));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure5));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure6));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure7));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure8));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure9));
        $I->cantSeeElement(Page\ReportResult::AuditSubGroup_ByName(Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy));
        $I->cantSeeElement(Page\ReportResult::AuditSubGroup_ByName(Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste));
        $I->cantSeeElement(Page\ReportResult::Program_ByName($this->program1));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure1));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure2));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure3));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure4));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure5));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure6));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure7));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure8));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure9));
        
        $I->comment("-----Check on Graphic View Tab:-----");
        $I->click(\Page\ReportResult::$GraphicViewTab);
        $I->wait(1);
        $I->cantSeeElement(\Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::Therms));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::VOC));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::EnergySaved));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::FuelSaved));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::SolidWasteDiverted));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateReport2_ByYear(AcceptanceTester $I) {
        $I->wait(2);
        $I->amOnPage(\Page\ReportCreate::URL());
        $I->wait(2);
        $I->click(Page\ReportCreate::$Individual_RadioLabel);
        $I->wait(5);
        $I->scrollTo(Page\ReportCreate::IndividualOptionLabel($this->state));
        $I->wait(1);
        $I->click(Page\ReportCreate::IndividualOptionLabel($this->state));
        $I->wait(2);
        $I->scrollTo(Page\ReportCreate::$NextStepButton);
        $I->wait(1);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->selectOption(Page\ReportCreate::$ReportTypeSelect, "By Year");
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->canSee('0', Page\ReportResult::$CertifiedBusinessesInfo);
        $I->cantSeeElement(Page\ReportResult::StateInfo_ByName($this->state));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure1));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure2));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure3));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure4));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure5));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure6));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure7));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure8));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure9));
        
        $I->cantSeeElement(Page\ReportResult::AuditSubGroup_ByName(Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy));
        $I->cantSeeElement(Page\ReportResult::AuditSubGroup_ByName(Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste));
        $I->cantSeeElement(Page\ReportResult::Program_ByName($this->program1));
        
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::Therms));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::VOC));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::EnergySaved));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::FuelSaved));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee($this->currentYear, \Page\ReportResult::TimeRangeHead('1'));
        $I->cantSeeElement(\Page\ReportResult::TimeRangeHead('2'));
        
        $I->comment("-----Check on Graphic View Tab:-----");
        $I->click(\Page\ReportResult::$GraphicViewTab);
        $I->wait(1);
        $I->canSeeElement(\Page\ReportResult::$ChartView);
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::Therms));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::VOC));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::EnergySaved));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::FuelSaved));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::SolidWasteDiverted));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateReport2_ByQuarter(AcceptanceTester $I) {
        $I->wait(2);
        $I->amOnPage(\Page\ReportCreate::URL());
        $I->wait(2);
        $I->click(Page\ReportCreate::$Individual_RadioLabel);
        $I->wait(5);
        $I->scrollTo(Page\ReportCreate::IndividualOptionLabel($this->state));
        $I->wait(1);
        $I->click(Page\ReportCreate::IndividualOptionLabel($this->state));
        $I->wait(2);
        $I->scrollTo(Page\ReportCreate::$NextStepButton);
        $I->wait(1);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->selectOption(Page\ReportCreate::$ReportTypeSelect, "By Quarter");
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->canSee('0', Page\ReportResult::$CertifiedBusinessesInfo);
        $I->cantSeeElement(Page\ReportResult::StateInfo_ByName($this->state));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure1));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure2));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure3));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure4));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure5));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure6));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure7));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure8));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure9));
        $I->cantSeeElement(Page\ReportResult::AuditSubGroup_ByName(Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy));
        $I->cantSeeElement(Page\ReportResult::AuditSubGroup_ByName(Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste));
        $I->cantSeeElement(Page\ReportResult::Program_ByName($this->program1));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::Therms));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::VOC));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::EnergySaved));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::FuelSaved));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::SolidWasteDiverted));
        for($i=1; $i<= $this->currentQuarter; $i++){
            $I->canSee("$this->currentYear Q$i", \Page\ReportResult::TimeRangeHead($i));
        }
        
        $I->comment("-----Check on Graphic View Tab:-----");
        $I->click(\Page\ReportResult::$GraphicViewTab);
        $I->wait(1);
        $I->canSeeElement(\Page\ReportResult::$ChartView);
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::Therms));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::VOC));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::EnergySaved));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::FuelSaved));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::SolidWasteDiverted));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateReport2_ByMonth(AcceptanceTester $I) {
        $I->wait(2);
        $I->amOnPage(\Page\ReportCreate::URL());
        $I->wait(2);
        $I->click(Page\ReportCreate::$Individual_RadioLabel);
        $I->wait(5);
        $I->scrollTo(Page\ReportCreate::IndividualOptionLabel($this->state));
        $I->wait(1);
        $I->click(Page\ReportCreate::IndividualOptionLabel($this->state));
        $I->wait(2);
        $I->scrollTo(Page\ReportCreate::$NextStepButton);
        $I->wait(1);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->selectOption(Page\ReportCreate::$ReportTypeSelect, "By Month");
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->canSee('0', Page\ReportResult::$CertifiedBusinessesInfo);
        $I->cantSeeElement(Page\ReportResult::StateInfo_ByName($this->state));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure1));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure2));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure3));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure4));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure5));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure6));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure7));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure8));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure9));
        $I->cantSeeElement(Page\ReportResult::AuditSubGroup_ByName(Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy));
        $I->cantSeeElement(Page\ReportResult::AuditSubGroup_ByName(Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste));
        $I->cantSeeElement(Page\ReportResult::Program_ByName($this->program1));
        
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::Therms));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::VOC));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::EnergySaved));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::FuelSaved));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::SolidWasteDiverted));
        for($i=1; $i<= $this->currentMonth; $i++){
            $a = $i-1;
            $I->canSee("$this->currentYear ".$this->months[$a], \Page\ReportResult::TimeRangeHead($i));
        }
        
        $I->comment("-----Check on Graphic View Tab:-----");
        $I->click(\Page\ReportResult::$GraphicViewTab);
        $I->wait(1);
        $I->canSeeElement(\Page\ReportResult::$ChartView);
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::Therms));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::VOC));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::EnergySaved));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::FuelSaved));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::SolidWasteDiverted));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeBusiness1StatusToRecognized(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::RecognizedStatus;
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->id_business1));
        $I->wait(2);
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(4);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateReport3_BySavingAreas(Step\Acceptance\Report $I) {
        $savingMeas1_Therms                       = number_format(round($this->savingMeas1_Daily_ThermsArea_Bus1));
        $savingMeas2_Therms                       = number_format(round($this->savingMeas2_Daily_ThermsArea_Bus1));
        $savingMeas2_EnergySaved                  = number_format(round($this->savingMeas2_Daily_EnergySavedArea_Bus1));
        $savingMeas2_FuelSaved                    = number_format(round($this->savingMeas2_Daily_FuelSavedArea_Bus1));
        $savingMeas3_GreenhouseGasEmissionsSaved  = number_format(round($this->savingMeas3_Daily_GreenhouseGasEmissionsSavedArea_Bus1));
        $savingMeas4_Therms                       = number_format(round($this->savingMeas4_Daily_ThermsArea_Bus1));
        $savingMeas5_EnergySaved                  = number_format(round($this->savingMeas5_Daily_EnergySavedArea_Bus1));
        $savingMeas6_SolidWasteDiverted           = number_format(round($this->savingMeas6_Daily_SolidWasteDivertedArea_Bus1));
        
        $areaSum_Therms                      = trim(number_format($this->savingMeas1_Daily_ThermsArea_Bus1 + $this->savingMeas2_Daily_ThermsArea_Bus1 + $this->savingMeas4_Daily_ThermsArea_Bus1));
        $areaSum_EnergySaved                 = trim(number_format($this->savingMeas2_Daily_EnergySavedArea_Bus1 + $this->savingMeas5_Daily_EnergySavedArea_Bus1));
        $areaSum_FuelSaved                   = trim(number_format($this->savingMeas2_Daily_FuelSavedArea_Bus1));
        $areaSum_GreenhouseGasEmissionsSaved = trim(number_format($this->savingMeas3_Daily_GreenhouseGasEmissionsSavedArea_Bus1));
        $areaSum_SolidWasteDiverted          = trim(number_format($this->savingMeas6_Daily_SolidWasteDivertedArea_Bus1));
        
        $moneySave_Therms                      = round(($this->savingMeas1_Daily_ThermsArea_Bus1 + $this->savingMeas2_Daily_ThermsArea_Bus1 + $this->savingMeas4_Daily_ThermsArea_Bus1) * $this->rateMoney_ThermsArea);
        $moneySave_EnergySaved                 = round(($this->savingMeas2_Daily_EnergySavedArea_Bus1 + $this->savingMeas5_Daily_EnergySavedArea_Bus1) * $this->rateMoney_EnergySavedArea);
        $moneySave_FuelSaved                   = round($this->savingMeas2_Daily_FuelSavedArea_Bus1 * $this->rateMoney_FuelSavedArea);
        $moneySave_GreenhouseGasEmissionsSaved = round($this->savingMeas3_Daily_GreenhouseGasEmissionsSavedArea_Bus1 * $this->rateMoney_GreenhouseGasEmissionsSavedArea);
        $moneySave_SolidWasteDiverted          = round($this->savingMeas6_Daily_SolidWasteDivertedArea_Bus1 * $this->rateMoney_SolidWasteDivertedArea);
        
        $I->wait(2);
        $I->amOnPage(\Page\ReportCreate::URL());
        $I->wait(2);
        $I->click(Page\ReportCreate::$Individual_RadioLabel);
        $I->wait(5);
        $I->scrollTo(Page\ReportCreate::IndividualOptionLabel($this->state));
        $I->wait(1);
        $I->click(Page\ReportCreate::IndividualOptionLabel($this->state));
        $I->wait(2);
        $I->scrollTo(Page\ReportCreate::$NextStepButton);
        $I->wait(1);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(2);
        $I->waitForElement(Page\ReportCreate::$NextStepButton, 10);
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(2);
        $I->waitForElement(Page\ReportCreate::$NextStepButton, 10);
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(2);
        $I->waitForElement(Page\ReportCreate::$NextStepButton, 10);
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(2);
        $I->waitForElement(Page\ReportCreate::$NextStepButton, 10);
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(2);
        $I->waitForElement(Page\ReportCreate::$NextStepButton, 10);
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(2);
        $I->waitForElement(Page\ReportCreate::$NextStepButton, 10);
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(2);
        $I->waitForElement(Page\ReportCreate::$NextStepButton, 10);
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->canSee('1', Page\ReportResult::$CertifiedBusinessesInfo);
        $I->canSeeElement(Page\ReportResult::StateInfo_ByName($this->state));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure1));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure2));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure3));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure4));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure5));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure6));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure7));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure8));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure9));
        $I->canSeeElement(Page\ReportResult::AuditSubGroup_ByName(Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy));
        $I->cantSeeElement(Page\ReportResult::AuditSubGroup_ByName(Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste));
        $I->canSeeElement(Page\ReportResult::Program_ByName($this->program1));
        $I->canSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure1));
        $I->canSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure2));
        $I->canSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure3));
        $I->canSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure4));
        $I->canSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure5));
        $I->canSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure6));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure7));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure8));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure9));
        
        $number_ThermsArea = $I->GetSavingAreaNumberInTable(\Page\SavingAreaList::Therms);
        $I->canSee($areaSum_Therms." $this->shortUnits_ThermsArea", Page\ReportResult::SavingResultForMeasure("Total", $number_ThermsArea));
        
        $I->canSee($savingMeas1_Therms." $this->shortUnits_ThermsArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure1, $number_ThermsArea));
        $I->canSee($savingMeas2_Therms." $this->shortUnits_ThermsArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure2, $number_ThermsArea));
        $I->canSee($savingMeas4_Therms." $this->shortUnits_ThermsArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure4, $number_ThermsArea));
        
        $number_EnergySavedArea = $I->GetSavingAreaNumberInTable(\Page\SavingAreaList::EnergySaved);
        $I->canSee($areaSum_EnergySaved." $this->shortUnits_EnergySavedArea", Page\ReportResult::SavingResultForMeasure("Total", $number_EnergySavedArea));
        
        $I->canSee($savingMeas2_EnergySaved." $this->shortUnits_EnergySavedArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure2, $number_EnergySavedArea));
        $I->canSee($savingMeas5_EnergySaved." $this->shortUnits_EnergySavedArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure5, $number_EnergySavedArea));
        
        $number_FuelSavedArea = $I->GetSavingAreaNumberInTable(\Page\SavingAreaList::FuelSaved);
        $I->canSee($areaSum_FuelSaved." $this->shortUnits_FuelSavedArea", Page\ReportResult::SavingResultForMeasure("Total", $number_FuelSavedArea));
        
        $I->canSee($savingMeas2_Daily_FuelSaved." $this->shortUnits_FuelSavedArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure2, $number_FuelSavedArea));
        
        $number_GreenhouseGasEmissionsSaved = $I->GetSavingAreaNumberInTable(\Page\SavingAreaList::GreenhouseGasEmissionsSaved);
        $I->canSee($areaSum_GreenhouseGasEmissionsSaved." $this->shortUnits_GreenhouseGasEmissionsSavedArea", Page\ReportResult::SavingResultForMeasure("Total", $number_GreenhouseGasEmissionsSaved));
        
        $I->canSee($savingMeas3_GreenhouseGasEmissionsSaved." $this->shortUnits_GreenhouseGasEmissionsSavedArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure3, $number_GreenhouseGasEmissionsSaved));
        
        $number_SolidWasteDiverted = $I->GetSavingAreaNumberInTable(\Page\SavingAreaList::SolidWasteDiverted);
        $I->canSee($areaSum_SolidWasteDiverted." $this->shortUnits_SolidWasteDivertedArea", Page\ReportResult::SavingResultForMeasure("Total", $number_SolidWasteDiverted));
        
        $I->canSee($savingMeas6_SolidWasteDiverted." $this->shortUnits_SolidWasteDivertedArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure6, $number_SolidWasteDiverted));
        
        //Graphic View Tab
        $I->comment("-----Check on Graphic View Tab:-----");
        $I->click(\Page\ReportResult::$GraphicViewTab);
        $I->wait(1);
        
        $I->cantSeeElement(\Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::VOC));
        
        $I->canSeeElement(Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::Therms));
        $I->canSee(\Page\SavingAreaList::Therms, Page\ReportResult::SavingAreaBlock_Title(\Page\SavingAreaList::Therms));
        $I->canSee("$areaSum_Therms", Page\ReportResult::SavingAreaBlock_SavedValue(\Page\SavingAreaList::Therms));
        $I->canSee("$$moneySave_Therms", Page\ReportResult::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::Therms));
        
        $I->canSeeElement(Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::EnergySaved));
        $I->canSee(\Page\SavingAreaList::EnergySaved, Page\ReportResult::SavingAreaBlock_Title(\Page\SavingAreaList::EnergySaved));
        $I->canSee("$areaSum_EnergySaved", Page\ReportResult::SavingAreaBlock_SavedValue(\Page\SavingAreaList::EnergySaved));
        $I->canSee("$$moneySave_EnergySaved", Page\ReportResult::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::EnergySaved));
        
        $I->canSeeElement(Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::FuelSaved));
        $I->canSee(\Page\SavingAreaList::FuelSaved, Page\ReportResult::SavingAreaBlock_Title(\Page\SavingAreaList::FuelSaved));
        $I->canSee("$areaSum_FuelSaved", Page\ReportResult::SavingAreaBlock_SavedValue(\Page\SavingAreaList::FuelSaved));
        $I->canSee("$$moneySave_FuelSaved", Page\ReportResult::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::FuelSaved));
        
        $I->canSeeElement(Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved, Page\ReportResult::SavingAreaBlock_Title(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSee("$areaSum_GreenhouseGasEmissionsSaved", Page\ReportResult::SavingAreaBlock_SavedValue(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSee("$$moneySave_GreenhouseGasEmissionsSaved", Page\ReportResult::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        
        $I->canSeeElement(Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted, Page\ReportResult::SavingAreaBlock_Title(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee("$areaSum_SolidWasteDiverted", Page\ReportResult::SavingAreaBlock_SavedValue(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee("$$moneySave_SolidWasteDiverted", Page\ReportResult::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::SolidWasteDiverted));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateReport3_ByYear(Step\Acceptance\Report $I) {
        $areaSum_Therms                      = trim(number_format($this->savingMeas1_Daily_ThermsArea_Bus1 + $this->savingMeas2_Daily_ThermsArea_Bus1 + $this->savingMeas4_Daily_ThermsArea_Bus1));
        $areaSum_EnergySaved                 = trim(number_format($this->savingMeas2_Daily_EnergySavedArea_Bus1 + $this->savingMeas5_Daily_EnergySavedArea_Bus1));
        $areaSum_FuelSaved                   = trim(number_format($this->savingMeas2_Daily_FuelSavedArea_Bus1));
        $areaSum_GreenhouseGasEmissionsSaved = trim(number_format($this->savingMeas3_Daily_GreenhouseGasEmissionsSavedArea_Bus1));
        $areaSum_SolidWasteDiverted          = trim(number_format($this->savingMeas6_Daily_SolidWasteDivertedArea_Bus1));
        
        $moneySave_Therms                      = round(($this->savingMeas1_Daily_ThermsArea_Bus1 + $this->savingMeas2_Daily_ThermsArea_Bus1 + $this->savingMeas4_Daily_ThermsArea_Bus1) * $this->rateMoney_ThermsArea);
        $moneySave_EnergySaved                 = round(($this->savingMeas2_Daily_EnergySavedArea_Bus1 + $this->savingMeas5_Daily_EnergySavedArea_Bus1) * $this->rateMoney_EnergySavedArea);
        $moneySave_FuelSaved                   = round($this->savingMeas2_Daily_FuelSavedArea_Bus1 * $this->rateMoney_FuelSavedArea);
        $moneySave_GreenhouseGasEmissionsSaved = round($this->savingMeas3_Daily_GreenhouseGasEmissionsSavedArea_Bus1 * $this->rateMoney_GreenhouseGasEmissionsSavedArea);
        $moneySave_SolidWasteDiverted          = round($this->savingMeas6_Daily_SolidWasteDivertedArea_Bus1 * $this->rateMoney_SolidWasteDivertedArea);
        
        $I->wait(2);
        $I->amOnPage(\Page\ReportCreate::URL());
        $I->wait(2);
        $I->click(Page\ReportCreate::$Individual_RadioLabel);
        $I->wait(5);
        $I->scrollTo(Page\ReportCreate::IndividualOptionLabel($this->state));
        $I->wait(1);
        $I->click(Page\ReportCreate::IndividualOptionLabel($this->state));
        $I->wait(2);
        $I->scrollTo(Page\ReportCreate::$NextStepButton);
        $I->wait(1);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->selectOption(Page\ReportCreate::$ReportTypeSelect, "By Year");
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->canSee('1', Page\ReportResult::$CertifiedBusinessesInfo);
        $I->canSeeElement(Page\ReportResult::StateInfo_ByName($this->state));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure1));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure2));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure3));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure4));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure5));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure6));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure7));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure8));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure9));
        $I->canSeeElement(Page\ReportResult::AuditSubGroup_ByName(Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy));
        $I->cantSeeElement(Page\ReportResult::AuditSubGroup_ByName(Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste));
        $I->canSeeElement(Page\ReportResult::Program_ByName($this->program1));
        
        $I->canSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::Therms));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::VOC));
        $I->canSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::EnergySaved));
        $I->canSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::FuelSaved));
        $I->canSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::SolidWasteDiverted));
        
        $I->canSee($areaSum_Therms." $this->shortUnits_ThermsArea", Page\ReportResult::SavingResultForTimeRange(\Page\SavingAreaList::Therms, '2'));
        $I->canSee($areaSum_EnergySaved." $this->shortUnits_EnergySavedArea", Page\ReportResult::SavingResultForTimeRange(\Page\SavingAreaList::EnergySaved, '2'));
        $I->canSee($areaSum_FuelSaved." $this->shortUnits_FuelSavedArea", Page\ReportResult::SavingResultForTimeRange(\Page\SavingAreaList::FuelSaved, '2'));
        $I->canSee($areaSum_GreenhouseGasEmissionsSaved." $this->shortUnits_GreenhouseGasEmissionsSavedArea", Page\ReportResult::SavingResultForTimeRange(\Page\SavingAreaList::GreenhouseGasEmissionsSaved, '2'));
        $I->canSee($areaSum_SolidWasteDiverted." $this->shortUnits_SolidWasteDivertedArea", Page\ReportResult::SavingResultForTimeRange(\Page\SavingAreaList::SolidWasteDiverted, '2'));
        
        $I->canSee($this->currentYear, \Page\ReportResult::TimeRangeHead('1'));
        $I->cantSeeElement(\Page\ReportResult::TimeRangeHead('2'));
        
        //Graphic View Tab
        $I->comment("-----Check on Graphic View Tab:-----");
        $I->click(\Page\ReportResult::$GraphicViewTab);
        $I->wait(1);
        $I->canSeeElement(\Page\ReportResult::$ChartView);
        $I->canSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::Therms));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::VOC));
        $I->canSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::EnergySaved));
        $I->canSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::FuelSaved));
        $I->canSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::SolidWasteDiverted));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateReport3_ByQuarter(Step\Acceptance\Report $I) {
        $areaSum_Therms                      = trim(number_format($this->savingMeas1_Daily_ThermsArea_Bus1 + $this->savingMeas2_Daily_ThermsArea_Bus1 + $this->savingMeas4_Daily_ThermsArea_Bus1));
        $areaSum_EnergySaved                 = trim(number_format($this->savingMeas2_Daily_EnergySavedArea_Bus1 + $this->savingMeas5_Daily_EnergySavedArea_Bus1));
        $areaSum_FuelSaved                   = trim(number_format($this->savingMeas2_Daily_FuelSavedArea_Bus1));
        $areaSum_GreenhouseGasEmissionsSaved = trim(number_format($this->savingMeas3_Daily_GreenhouseGasEmissionsSavedArea_Bus1));
        $areaSum_SolidWasteDiverted          = trim(number_format($this->savingMeas6_Daily_SolidWasteDivertedArea_Bus1));
        
        $moneySave_Therms                      = round(($this->savingMeas1_Daily_ThermsArea_Bus1 + $this->savingMeas2_Daily_ThermsArea_Bus1 + $this->savingMeas4_Daily_ThermsArea_Bus1) * $this->rateMoney_ThermsArea);
        $moneySave_EnergySaved                 = round(($this->savingMeas2_Daily_EnergySavedArea_Bus1 + $this->savingMeas5_Daily_EnergySavedArea_Bus1) * $this->rateMoney_EnergySavedArea);
        $moneySave_FuelSaved                   = round($this->savingMeas2_Daily_FuelSavedArea_Bus1 * $this->rateMoney_FuelSavedArea);
        $moneySave_GreenhouseGasEmissionsSaved = round($this->savingMeas3_Daily_GreenhouseGasEmissionsSavedArea_Bus1 * $this->rateMoney_GreenhouseGasEmissionsSavedArea);
        $moneySave_SolidWasteDiverted          = round($this->savingMeas6_Daily_SolidWasteDivertedArea_Bus1 * $this->rateMoney_SolidWasteDivertedArea);
        
        $I->wait(2);
        $I->amOnPage(\Page\ReportCreate::URL());
        $I->wait(2);
        $I->click(Page\ReportCreate::$Individual_RadioLabel);
        $I->wait(5);
        $I->scrollTo(Page\ReportCreate::IndividualOptionLabel($this->state));
        $I->wait(1);
        $I->click(Page\ReportCreate::IndividualOptionLabel($this->state));
        $I->wait(2);
        $I->scrollTo(Page\ReportCreate::$NextStepButton);
        $I->wait(1);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(2);
        $I->waitForElement(Page\ReportCreate::$NextStepButton, 10);
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(2);
        $I->waitForElement(Page\ReportCreate::$NextStepButton, 10);
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(2);
        $I->waitForElement(Page\ReportCreate::$NextStepButton, 10);
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(2);
        $I->waitForElement(Page\ReportCreate::$NextStepButton, 10);
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(2);
        $I->waitForElement(Page\ReportCreate::$NextStepButton, 10);
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(2);
        $I->waitForElement(Page\ReportCreate::$NextStepButton, 10);
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(2);
        $I->waitForElement(Page\ReportCreate::$NextStepButton, 10);
        $I->wait(2);
        $I->selectOption(Page\ReportCreate::$ReportTypeSelect, "By Quarter");
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->canSee('1', Page\ReportResult::$CertifiedBusinessesInfo);
        $I->canSeeElement(Page\ReportResult::StateInfo_ByName($this->state));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure1));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure2));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure3));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure4));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure5));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure6));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure7));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure8));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure9));
        $I->canSeeElement(Page\ReportResult::AuditSubGroup_ByName(Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy));
        $I->cantSeeElement(Page\ReportResult::AuditSubGroup_ByName(Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste));
        $I->canSeeElement(Page\ReportResult::Program_ByName($this->program1));
        
        $I->canSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::Therms));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::VOC));
        $I->canSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::EnergySaved));
        $I->canSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::FuelSaved));
        $I->canSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::SolidWasteDiverted));
        
        for($i=1; $i<= $this->currentQuarter; $i++){
            $I->canSee("$this->currentYear Q$i", \Page\ReportResult::TimeRangeHead($i));
        }
        $num = $this->currentQuarter + 1;
        $I->canSee($areaSum_Therms." $this->shortUnits_ThermsArea", Page\ReportResult::SavingResultForTimeRange(\Page\SavingAreaList::Therms, $num));
        $I->canSee($areaSum_EnergySaved." $this->shortUnits_EnergySavedArea", Page\ReportResult::SavingResultForTimeRange(\Page\SavingAreaList::EnergySaved, $num));
        $I->canSee($areaSum_FuelSaved." $this->shortUnits_FuelSavedArea", Page\ReportResult::SavingResultForTimeRange(\Page\SavingAreaList::FuelSaved, $num));
        $I->canSee($areaSum_GreenhouseGasEmissionsSaved." $this->shortUnits_GreenhouseGasEmissionsSavedArea", Page\ReportResult::SavingResultForTimeRange(\Page\SavingAreaList::GreenhouseGasEmissionsSaved, $num));
        $I->canSee($areaSum_SolidWasteDiverted." $this->shortUnits_SolidWasteDivertedArea", Page\ReportResult::SavingResultForTimeRange(\Page\SavingAreaList::SolidWasteDiverted, $num));
        for($i=1; $i<$this->currentQuarter; $i++){
            $I->canSee("", Page\ReportResult::SavingResultForTimeRange(\Page\SavingAreaList::Therms, $i));
            $I->canSee("", Page\ReportResult::SavingResultForTimeRange(\Page\SavingAreaList::EnergySaved, $i));
            $I->canSee("", Page\ReportResult::SavingResultForTimeRange(\Page\SavingAreaList::FuelSaved, $i));
            $I->canSee("", Page\ReportResult::SavingResultForTimeRange(\Page\SavingAreaList::GreenhouseGasEmissionsSaved, $i));
            $I->canSee("", Page\ReportResult::SavingResultForTimeRange(\Page\SavingAreaList::SolidWasteDiverted, $i));
        }
        
        //Graphic View Tab
        $I->comment("-----Check on Graphic View Tab:-----");
        $I->click(\Page\ReportResult::$GraphicViewTab);
        $I->wait(1);
        $I->canSeeElement(\Page\ReportResult::$ChartView);
        $I->canSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::Therms));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::VOC));
        $I->canSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::EnergySaved));
        $I->canSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::FuelSaved));
        $I->canSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::SolidWasteDiverted));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateReport3_ByMonth(Step\Acceptance\Report $I) {
        $areaSum_Therms                      = trim(number_format($this->savingMeas1_Daily_ThermsArea_Bus1 + $this->savingMeas2_Daily_ThermsArea_Bus1 + $this->savingMeas4_Daily_ThermsArea_Bus1));
        $areaSum_EnergySaved                 = trim(number_format($this->savingMeas2_Daily_EnergySavedArea_Bus1 + $this->savingMeas5_Daily_EnergySavedArea_Bus1));
        $areaSum_FuelSaved                   = trim(number_format($this->savingMeas2_Daily_FuelSavedArea_Bus1));
        $areaSum_GreenhouseGasEmissionsSaved = trim(number_format($this->savingMeas3_Daily_GreenhouseGasEmissionsSavedArea_Bus1));
        $areaSum_SolidWasteDiverted          = trim(number_format($this->savingMeas6_Daily_SolidWasteDivertedArea_Bus1));
        
        
        $I->wait(2);
        $I->amOnPage(\Page\ReportCreate::URL());
        $I->wait(2);
        $I->click(Page\ReportCreate::$Individual_RadioLabel);
        $I->wait(5);
        $I->scrollTo(Page\ReportCreate::IndividualOptionLabel($this->state));
        $I->wait(1);
        $I->click(Page\ReportCreate::IndividualOptionLabel($this->state));
        $I->wait(2);
        $I->scrollTo(Page\ReportCreate::$NextStepButton);
        $I->wait(1);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(2);
        $I->waitForElement(Page\ReportCreate::$NextStepButton, 10);
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(2);
        $I->waitForElement(Page\ReportCreate::$NextStepButton, 10);
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(2);
        $I->waitForElement(Page\ReportCreate::$NextStepButton, 10);
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(2);
        $I->waitForElement(Page\ReportCreate::$NextStepButton, 10);
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(2);
        $I->waitForElement(Page\ReportCreate::$NextStepButton, 10);
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(2);
        $I->waitForElement(Page\ReportCreate::$NextStepButton, 10);
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(2);
        $I->waitForElement(Page\ReportCreate::$NextStepButton, 10);
        $I->wait(2);
        $I->selectOption(Page\ReportCreate::$ReportTypeSelect, "By Month");
        $I->wait(2);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->canSee('1', Page\ReportResult::$CertifiedBusinessesInfo);
        $I->canSeeElement(Page\ReportResult::StateInfo_ByName($this->state));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure1));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure2));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure3));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure4));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure5));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure6));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure7));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure8));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure9));
        $I->canSeeElement(Page\ReportResult::AuditSubGroup_ByName(Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy));
        $I->cantSeeElement(Page\ReportResult::AuditSubGroup_ByName(Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste));
        $I->canSeeElement(Page\ReportResult::Program_ByName($this->program1));
        
        $I->canSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::Therms));
        $I->cantSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::VOC));
        $I->canSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::EnergySaved));
        $I->canSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::FuelSaved));
        $I->canSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSeeElement(Page\ReportResult::SavingAreaLine(\Page\SavingAreaList::SolidWasteDiverted));
        
        for($i=1; $i<= $this->currentMonth; $i++){
            $a = $i-1;
            $I->canSee("$this->currentYear ".$this->months[$a], \Page\ReportResult::TimeRangeHead($i));
        }
        $num = $i;
        $I->canSee($areaSum_Therms." $this->shortUnits_ThermsArea", Page\ReportResult::SavingResultForTimeRange(\Page\SavingAreaList::Therms, $num));
        $I->canSee($areaSum_EnergySaved." $this->shortUnits_EnergySavedArea", Page\ReportResult::SavingResultForTimeRange(\Page\SavingAreaList::EnergySaved, $num));
        $I->canSee($areaSum_FuelSaved." $this->shortUnits_FuelSavedArea", Page\ReportResult::SavingResultForTimeRange(\Page\SavingAreaList::FuelSaved, $num));
        $I->canSee($areaSum_GreenhouseGasEmissionsSaved." $this->shortUnits_GreenhouseGasEmissionsSavedArea", Page\ReportResult::SavingResultForTimeRange(\Page\SavingAreaList::GreenhouseGasEmissionsSaved, $num));
        $I->canSee($areaSum_SolidWasteDiverted." $this->shortUnits_SolidWasteDivertedArea", Page\ReportResult::SavingResultForTimeRange(\Page\SavingAreaList::SolidWasteDiverted, $num));
        for($i=1; $i<$this->currentMonth; $i++){
            $I->canSee("", Page\ReportResult::SavingResultForTimeRange(\Page\SavingAreaList::Therms, $i));
            $I->canSee("", Page\ReportResult::SavingResultForTimeRange(\Page\SavingAreaList::EnergySaved, $i));
            $I->canSee("", Page\ReportResult::SavingResultForTimeRange(\Page\SavingAreaList::FuelSaved, $i));
            $I->canSee("", Page\ReportResult::SavingResultForTimeRange(\Page\SavingAreaList::GreenhouseGasEmissionsSaved, $i));
            $I->canSee("", Page\ReportResult::SavingResultForTimeRange(\Page\SavingAreaList::SolidWasteDiverted, $i));
        }
        //Graphic View Tab
        $I->comment("-----Check on Graphic View Tab:-----");
        $I->click(\Page\ReportResult::$GraphicViewTab);
        $I->wait(1);
        $I->canSeeElement(\Page\ReportResult::$ChartView);
        $I->canSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::Therms));
        $I->cantSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::VOC));
        $I->canSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::EnergySaved));
        $I->canSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::FuelSaved));
        $I->canSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSeeElement(\Page\ReportResult::SavingAreaInChart_ByArea(\Page\SavingAreaList::SolidWasteDiverted));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOut4(AcceptanceTester $I) {
        $I->reloadPage();
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(2);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->email1, $this->password, $I, 'user');
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOnMyReportCardPage2(AcceptanceTester $I) {
        $areaSave_Therms                      = trim(number_format($this->savingMeas1_Daily_ThermsArea_Bus1 + $this->savingMeas2_Daily_ThermsArea_Bus1 + $this->savingMeas4_Daily_ThermsArea_Bus1));
        $areaSave_EnergySaved                 = trim(number_format($this->savingMeas2_Daily_EnergySavedArea_Bus1 + $this->savingMeas5_Daily_EnergySavedArea_Bus1));
        $areaSave_FuelSaved                   = trim(number_format($this->savingMeas2_Daily_FuelSavedArea_Bus1));
        $areaSave_GreenhouseGasEmissionsSaved = trim(number_format($this->savingMeas3_Daily_GreenhouseGasEmissionsSavedArea_Bus1));
        $areaSave_SolidWasteDiverted          = trim(number_format($this->savingMeas6_Daily_SolidWasteDivertedArea_Bus1));
        
        $areaSum_Therms                      = trim(number_format($this->savingMeas1_Annual_ThermsArea_Bus1 + $this->savingMeas2_Annual_ThermsArea_Bus1 + $this->savingMeas4_Annual_ThermsArea_Bus1));
        $areaSum_EnergySaved                 = trim(number_format($this->savingMeas2_Annual_EnergySavedArea_Bus1 + $this->savingMeas5_Annual_EnergySavedArea_Bus1));
        $areaSum_FuelSaved                   = trim(number_format($this->savingMeas2_Annual_FuelSavedArea_Bus1));
        $areaSum_GreenhouseGasEmissionsSaved = trim(number_format($this->savingMeas3_Annual_GreenhouseGasEmissionsSavedArea_Bus1));
        $areaSum_SolidWasteDiverted          = trim(number_format($this->savingMeas6_Annual_SolidWasteDivertedArea_Bus1));
        
        $moneySave_Therms                      = round(($this->savingMeas1_Daily_ThermsArea_Bus1 + $this->savingMeas2_Daily_ThermsArea_Bus1 + $this->savingMeas4_Daily_ThermsArea_Bus1) * $this->rateMoney_ThermsArea);
        $moneySave_EnergySaved                 = round(($this->savingMeas2_Daily_EnergySavedArea_Bus1 + $this->savingMeas5_Daily_EnergySavedArea_Bus1) * $this->rateMoney_EnergySavedArea);
        $moneySave_FuelSaved                   = round($this->savingMeas2_Daily_FuelSavedArea_Bus1 * $this->rateMoney_FuelSavedArea);
        $moneySave_GreenhouseGasEmissionsSaved = round($this->savingMeas3_Daily_GreenhouseGasEmissionsSavedArea_Bus1 * $this->rateMoney_GreenhouseGasEmissionsSavedArea);
        $moneySave_SolidWasteDiverted          = round($this->savingMeas6_Daily_SolidWasteDivertedArea_Bus1 * $this->rateMoney_SolidWasteDivertedArea);
        
        $I->amOnPage(Page\MyReportCard::$URL_ReportTab);
        $I->wait(2);
        $I->canSee($this->program1, Page\MyReportCard::ProgramLine('1'));
        $I->canSee(\Page\SectorList::DefaultSectorOfficeRetail, Page\MyReportCard::SectorLine('1'));
        $I->canSee($this->todayDate, Page\MyReportCard::EnrollmentDayLine('1'));
        //
        $I->canSeeElement(Page\MyReportCard::SavingAreaLine(\Page\SavingAreaList::Therms));
        $I->canSee($areaSum_Therms, Page\MyReportCard::PerYearLine(\Page\SavingAreaList::Therms));
        $I->canSee("$areaSave_Therms $this->units_ThermsArea", Page\MyReportCard::SinceEnrollmentLine(\Page\SavingAreaList::Therms));
        $I->canSee("$$moneySave_Therms", Page\MyReportCard::TotalCostSavingsLine(\Page\SavingAreaList::Therms));
        
        $I->canSeeElement(Page\MyReportCard::SavingAreaLine(\Page\SavingAreaList::EnergySaved));
        $I->canSee($areaSum_EnergySaved, Page\MyReportCard::PerYearLine(\Page\SavingAreaList::EnergySaved));
        $I->canSee("$areaSave_EnergySaved $this->units_EnergySavedArea", Page\MyReportCard::SinceEnrollmentLine(\Page\SavingAreaList::EnergySaved));
        $I->canSee("$$moneySave_EnergySaved", Page\MyReportCard::TotalCostSavingsLine(\Page\SavingAreaList::EnergySaved));
        
        $I->canSeeElement(Page\MyReportCard::SavingAreaLine(\Page\SavingAreaList::FuelSaved));
        $I->canSee($areaSum_FuelSaved, Page\MyReportCard::PerYearLine(\Page\SavingAreaList::FuelSaved));
        $I->canSee("$areaSave_FuelSaved $this->units_FuelSavedArea", Page\MyReportCard::SinceEnrollmentLine(\Page\SavingAreaList::FuelSaved));
        $I->canSee("$$moneySave_FuelSaved", Page\MyReportCard::TotalCostSavingsLine(\Page\SavingAreaList::FuelSaved));
        
        $I->canSeeElement(Page\MyReportCard::SavingAreaLine(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSee($areaSum_GreenhouseGasEmissionsSaved, Page\MyReportCard::PerYearLine(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSee("$areaSave_GreenhouseGasEmissionsSaved $this->units_GreenhouseGasEmissionsSavedArea", Page\MyReportCard::SinceEnrollmentLine(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSee("$$moneySave_GreenhouseGasEmissionsSaved", Page\MyReportCard::TotalCostSavingsLine(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        
        $I->canSeeElement(Page\MyReportCard::SavingAreaLine(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee($areaSum_SolidWasteDiverted, Page\MyReportCard::PerYearLine(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee("$areaSave_SolidWasteDiverted $this->units_SolidWasteDivertedArea", Page\MyReportCard::SinceEnrollmentLine(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee("$$moneySave_SolidWasteDiverted", Page\MyReportCard::TotalCostSavingsLine(\Page\SavingAreaList::SolidWasteDiverted));
        
        $I->amOnPage(Page\MyReportCard::$URL_VisualScoreboardTab);
        $I->wait(2);
        //
        $I->canSeeElement(Page\MyReportCard::SavingAreaBlock(\Page\SavingAreaList::Therms));
        $I->canSee(\Page\SavingAreaList::Therms, Page\MyReportCard::SavingAreaBlock_Title(\Page\SavingAreaList::Therms));
        $I->canSee("$areaSave_Therms", Page\MyReportCard::SavingAreaBlock_SavedValue(\Page\SavingAreaList::Therms));
        $I->canSee("$$moneySave_Therms", Page\MyReportCard::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::Therms));
        
        $I->canSeeElement(Page\MyReportCard::SavingAreaBlock(\Page\SavingAreaList::EnergySaved));
        $I->canSee(\Page\SavingAreaList::EnergySaved, Page\MyReportCard::SavingAreaBlock_Title(\Page\SavingAreaList::EnergySaved));
        $I->canSee("$areaSave_EnergySaved", Page\MyReportCard::SavingAreaBlock_SavedValue(\Page\SavingAreaList::EnergySaved));
        $I->canSee("$$moneySave_EnergySaved", Page\MyReportCard::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::EnergySaved));
        
        $I->canSeeElement(Page\MyReportCard::SavingAreaBlock(\Page\SavingAreaList::FuelSaved));
        $I->canSee(\Page\SavingAreaList::FuelSaved, Page\MyReportCard::SavingAreaBlock_Title(\Page\SavingAreaList::FuelSaved));
        $I->canSee("$areaSave_FuelSaved", Page\MyReportCard::SavingAreaBlock_SavedValue(\Page\SavingAreaList::FuelSaved));
        $I->canSee("$$moneySave_FuelSaved", Page\MyReportCard::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::FuelSaved));
        
        $I->canSeeElement(Page\MyReportCard::SavingAreaBlock(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved, Page\MyReportCard::SavingAreaBlock_Title(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSee("$areaSave_GreenhouseGasEmissionsSaved", Page\MyReportCard::SavingAreaBlock_SavedValue(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSee("$$moneySave_GreenhouseGasEmissionsSaved", Page\MyReportCard::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        
        $I->canSeeElement(Page\MyReportCard::SavingAreaBlock(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted, Page\MyReportCard::SavingAreaBlock_Title(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee("$areaSave_SolidWasteDiverted", Page\MyReportCard::SavingAreaBlock_SavedValue(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee("$$moneySave_SolidWasteDiverted", Page\MyReportCard::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::SolidWasteDiverted));
    }
    
    /**
     * @group admin
     */
    
    public function Help_LogOut6(AcceptanceTester $I) {
        $I->reloadPage();
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(2);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsAdmin($I);
    }
    
    /**
     * @group stateadmin
     */
    
    public function LogOut_And_LogInAsStateAdmin4(AcceptanceTester $I)
    {
        $I->reloadPage();
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(2);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->emailStateAdmin, $this->password, $I, 'state admin');
        $I->wait(2);
    }
    
    /**
     * @group coordinator
     */
    
    public function LogOut_And_LogInAsCoordinator4(AcceptanceTester $I)
    {
        $I->reloadPage();
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(2);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->emailCoordinator, $this->password, $I, 'coordinator');
        $I->wait(2);
    }
    
    /**
     * @group admin
     */
    
    public function Check_Measure1_Savings_OnBusinessViewPage(AcceptanceTester $I) {
        $measDesc           = $this->measure1Desc;
        
        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: $this->savingMeas1_Annual_ThermsArea_Bus1 $this->units_ThermsArea\ndaily: $this->savingMeas1_Daily_ThermsArea_Bus1 $this->units_ThermsArea", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeRecognitionDate(AcceptanceTester $I){
        $Recog            = strtotime("-20 day", strtotime($this->todayDate));
        $recognitionDate  = date("m/d/Y", $Recog);
        
        $I->wait(1);
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->id_business1));
        $I->wait(2);
        $I->fillField(\Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$SaveDateButton_BusinessInfoTab);
        $I->wait(2);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateReport4_BySavingAreas(Step\Acceptance\Report $I) {
        $savingMeas1_Therms                      = number_format(round($this->savingMeas1_Daily_ThermsArea_Bus1 * 21));
        $savingMeas2_Therms                      = number_format(round($this->savingMeas2_Daily_ThermsArea_Bus1 * 21));
        $savingMeas2_EnergySaved                 = number_format(round($this->savingMeas2_Daily_EnergySavedArea_Bus1 * 21));
        $savingMeas2_FuelSaved                   = number_format(round($this->savingMeas2_Daily_FuelSavedArea_Bus1 * 21));
        $savingMeas3_GreenhouseGasEmissionsSaved = number_format(round($this->savingMeas3_Daily_GreenhouseGasEmissionsSavedArea_Bus1 * 21));
        $savingMeas4_Therms                      = number_format(round($this->savingMeas4_Daily_ThermsArea_Bus1 * 21));
        $savingMeas5_EnergySaved                 = number_format(round($this->savingMeas5_Daily_EnergySavedArea_Bus1 * 21));
        $savingMeas6_SolidWasteDiverted          = number_format(round($this->savingMeas6_Daily_SolidWasteDivertedArea_Bus1 * 21));
        
        $saving_Therms                      = number_format(round(($this->savingMeas1_Daily_ThermsArea_Bus1 * 21) + ($this->savingMeas2_Daily_ThermsArea_Bus1 * 21) + ($this->savingMeas4_Daily_ThermsArea_Bus1 * 21)));
        $saving_EnergySaved                 = number_format(round(($this->savingMeas2_Daily_EnergySavedArea_Bus1 * 21) + ($this->savingMeas5_Daily_EnergySavedArea_Bus1 * 21)));
        $saving_FuelSaved                   = number_format(round($this->savingMeas2_Daily_FuelSavedArea_Bus1 * 21));
        $saving_GreenhouseGasEmissionsSaved = number_format(round($this->savingMeas3_Daily_GreenhouseGasEmissionsSavedArea_Bus1 * 21));
        $saving_SolidWasteDiverted          = number_format(round($this->savingMeas6_Daily_SolidWasteDivertedArea_Bus1 * 21));
        
        $moneySave_Therms                      = number_format(round((($this->savingMeas1_Daily_ThermsArea_Bus1 * 21) + ($this->savingMeas2_Daily_ThermsArea_Bus1 * 21) + ($this->savingMeas4_Daily_ThermsArea_Bus1 * 21)) * $this->rateMoney_ThermsArea));
        $moneySave_EnergySaved                 = number_format(round((($this->savingMeas2_Daily_EnergySavedArea_Bus1 * 21) + ($this->savingMeas5_Daily_EnergySavedArea_Bus1 * 21)) * $this->rateMoney_EnergySavedArea));
        $moneySave_FuelSaved                   = number_format(round($this->savingMeas2_Daily_FuelSavedArea_Bus1 * 21 * $this->rateMoney_FuelSavedArea));
        $moneySave_GreenhouseGasEmissionsSaved = number_format(round($this->savingMeas3_Daily_GreenhouseGasEmissionsSavedArea_Bus1 * 21 * $this->rateMoney_GreenhouseGasEmissionsSavedArea));
        $moneySave_SolidWasteDiverted          = number_format(round($this->savingMeas6_Daily_SolidWasteDivertedArea_Bus1 * 21 * $this->rateMoney_SolidWasteDivertedArea));
        
        $I->wait(2);
        $I->amOnPage(\Page\ReportCreate::URL());
        $I->wait(2);
        $I->click(Page\ReportCreate::$Individual_RadioLabel);
        $I->wait(5);
        $I->scrollTo(Page\ReportCreate::IndividualOptionLabel($this->state));
        $I->wait(1);
        $I->click(Page\ReportCreate::IndividualOptionLabel($this->state));
        $I->wait(2);
        $I->scrollTo(Page\ReportCreate::$NextStepButton);
        $I->wait(1);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->canSee('1', Page\ReportResult::$CertifiedBusinessesInfo);
        $I->canSeeElement(Page\ReportResult::StateInfo_ByName($this->state));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure1));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure2));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure3));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure4));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure5));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure6));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure7));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure8));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure9));
        $I->canSeeElement(Page\ReportResult::AuditSubGroup_ByName(Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy));
        $I->cantSeeElement(Page\ReportResult::AuditSubGroup_ByName(Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste));
        $I->canSeeElement(Page\ReportResult::Program_ByName($this->program1));
        
        $I->canSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure1));
        $I->canSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure2));
        $I->canSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure3));
        $I->canSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure4));
        $I->canSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure5));
        $I->canSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure6));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure7));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure8));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure9));
        
        $number_Therms = $I->GetSavingAreaNumberInTable(\Page\SavingAreaList::Therms);
        $I->canSee($saving_Therms." $this->shortUnits_ThermsArea", Page\ReportResult::SavingResultForMeasure("Total", $number_Therms));
        
        $I->canSee($savingMeas1_Therms." $this->shortUnits_ThermsArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure1, $number_Therms));
        $I->canSee($savingMeas2_Therms." $this->shortUnits_ThermsArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure2, $number_Therms));
        $I->canSee($savingMeas4_Therms." $this->shortUnits_ThermsArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure4, $number_Therms));
        
        $number_EnergySaved = $I->GetSavingAreaNumberInTable(\Page\SavingAreaList::EnergySaved);
        $I->canSee($saving_EnergySaved." $this->shortUnits_EnergySavedArea", Page\ReportResult::SavingResultForMeasure("Total", $number_EnergySaved));
        
        $I->canSee($savingMeas2_EnergySaved." $this->shortUnits_EnergySavedArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure2, $number_EnergySaved));
        $I->canSee($savingMeas5_EnergySaved." $this->shortUnits_EnergySavedArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure5, $number_EnergySaved));
        
        $number_FuelSaved = $I->GetSavingAreaNumberInTable(\Page\SavingAreaList::FuelSaved);
        $I->canSee($saving_FuelSaved." $this->shortUnits_FuelSavedArea", Page\ReportResult::SavingResultForMeasure("Total", $number_FuelSaved));
        
        $I->canSee($savingMeas2_FuelSaved." $this->shortUnits_FuelSavedArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure2, $number_FuelSaved));
        
        $number_GreenhouseGasEmissionsSaved = $I->GetSavingAreaNumberInTable(\Page\SavingAreaList::GreenhouseGasEmissionsSaved);
        $I->canSee($saving_GreenhouseGasEmissionsSaved." $this->shortUnits_GreenhouseGasEmissionsSavedArea", Page\ReportResult::SavingResultForMeasure("Total", $number_GreenhouseGasEmissionsSaved));
        
        $I->canSee($savingMeas3_GreenhouseGasEmissionsSaved." $this->shortUnits_GreenhouseGasEmissionsSavedArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure3, $number_GreenhouseGasEmissionsSaved));
        
        $number_SolidWasteDiverted = $I->GetSavingAreaNumberInTable(\Page\SavingAreaList::SolidWasteDiverted);
        $I->canSee($saving_SolidWasteDiverted." $this->shortUnits_SolidWasteDivertedArea", Page\ReportResult::SavingResultForMeasure("Total", $number_SolidWasteDiverted));
        
        $I->canSee($savingMeas6_SolidWasteDiverted." $this->shortUnits_SolidWasteDivertedArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure6, $number_SolidWasteDiverted));
        
        $I->click(\Page\ReportResult::$GraphicViewTab);
        $I->wait(1);
        $I->cantSeeElement(\Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::VOC));
        
        $I->canSeeElement(Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::Therms));
        $I->canSee(\Page\SavingAreaList::Therms, Page\ReportResult::SavingAreaBlock_Title(\Page\SavingAreaList::Therms));
        $I->canSee("$saving_Therms", Page\ReportResult::SavingAreaBlock_SavedValue(\Page\SavingAreaList::Therms));
        $I->canSee("$$moneySave_Therms", Page\ReportResult::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::Therms));
        
        $I->canSeeElement(Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::EnergySaved));
        $I->canSee(\Page\SavingAreaList::EnergySaved, Page\ReportResult::SavingAreaBlock_Title(\Page\SavingAreaList::EnergySaved));
        $I->canSee("$saving_EnergySaved", Page\ReportResult::SavingAreaBlock_SavedValue(\Page\SavingAreaList::EnergySaved));
        $I->canSee("$$moneySave_EnergySaved", Page\ReportResult::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::EnergySaved));
        
        $I->canSeeElement(Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::FuelSaved));
        $I->canSee(\Page\SavingAreaList::FuelSaved, Page\ReportResult::SavingAreaBlock_Title(\Page\SavingAreaList::FuelSaved));
        $I->canSee("$saving_FuelSaved", Page\ReportResult::SavingAreaBlock_SavedValue(\Page\SavingAreaList::FuelSaved));
        $I->canSee("$$moneySave_FuelSaved", Page\ReportResult::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::FuelSaved));
        
        $I->canSeeElement(Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved, Page\ReportResult::SavingAreaBlock_Title(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSee("$saving_GreenhouseGasEmissionsSaved", Page\ReportResult::SavingAreaBlock_SavedValue(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSee("$$moneySave_GreenhouseGasEmissionsSaved", Page\ReportResult::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        
        $I->canSeeElement(Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted, Page\ReportResult::SavingAreaBlock_Title(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee("$saving_SolidWasteDiverted", Page\ReportResult::SavingAreaBlock_SavedValue(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee("$$moneySave_SolidWasteDiverted", Page\ReportResult::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::SolidWasteDiverted));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOut7(AcceptanceTester $I) {
        $I->reloadPage();
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(2);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->email1, $this->password, $I, 'user');
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOnMyReportCardPage3(AcceptanceTester $I) {
        $areaSum_Therms                      = trim(number_format($this->savingMeas1_Annual_ThermsArea_Bus1 + $this->savingMeas2_Annual_ThermsArea_Bus1 + $this->savingMeas4_Annual_ThermsArea_Bus1).' '.$this->units_ThermsArea);
        $areaSum_EnergySaved                 = trim(number_format($this->savingMeas2_Annual_EnergySavedArea_Bus1 + $this->savingMeas5_Annual_EnergySavedArea_Bus1).' '.$this->units_EnergySavedArea);
        $areaSum_FuelSaved                   = trim(number_format($this->savingMeas2_Annual_FuelSavedArea_Bus1).' '.$this->units_FuelSavedArea);
        $areaSum_GreenhouseGasEmissionsSaved = trim(number_format($this->savingMeas3_Annual_GreenhouseGasEmissionsSavedArea_Bus1).' '.$this->units_GreenhouseGasEmissionsSavedArea);
        $areaSum_SolidWasteDiverted          = trim(number_format($this->savingMeas6_Annual_SolidWasteDivertedArea_Bus1).' '.$this->units_SolidWasteDivertedArea);
        
        $saving_Therms                      = number_format(round(($this->savingMeas1_Daily_ThermsArea_Bus1 * 21) + ($this->savingMeas2_Daily_ThermsArea_Bus1 * 21) + ($this->savingMeas4_Daily_ThermsArea_Bus1 * 21)));
        $saving_EnergySaved                 = number_format(round(($this->savingMeas2_Daily_EnergySavedArea_Bus1 * 21) + ($this->savingMeas5_Daily_EnergySavedArea_Bus1 * 21)));
        $saving_FuelSaved                   = number_format(round($this->savingMeas2_Daily_FuelSavedArea_Bus1 * 21));
        $saving_GreenhouseGasEmissionsSaved = number_format(round($this->savingMeas3_Daily_GreenhouseGasEmissionsSavedArea_Bus1 * 21));
        $saving_SolidWasteDiverted          = number_format(round($this->savingMeas6_Daily_SolidWasteDivertedArea_Bus1 * 21));
        
        $moneySave_Therms                      = number_format(round((($this->savingMeas1_Daily_ThermsArea_Bus1 * 21) + ($this->savingMeas2_Daily_ThermsArea_Bus1 * 21) + ($this->savingMeas4_Daily_ThermsArea_Bus1 * 21)) * $this->rateMoney_ThermsArea));
        $moneySave_EnergySaved                 = number_format(round((($this->savingMeas2_Daily_EnergySavedArea_Bus1 * 21)  + ($this->savingMeas5_Daily_EnergySavedArea_Bus1 * 21)) * $this->rateMoney_EnergySavedArea));
        $moneySave_FuelSaved                   = number_format(round($this->savingMeas2_Daily_FuelSavedArea_Bus1 * 21 * $this->rateMoney_FuelSavedArea));
        $moneySave_GreenhouseGasEmissionsSaved = number_format(round($this->savingMeas3_Daily_GreenhouseGasEmissionsSavedArea_Bus1 * 21 * $this->rateMoney_GreenhouseGasEmissionsSavedArea));
        $moneySave_SolidWasteDiverted          = number_format(round($this->savingMeas6_Daily_SolidWasteDivertedArea_Bus1 * 21 * $this->rateMoney_SolidWasteDivertedArea));
        
        $I->amOnPage(Page\MyReportCard::$URL_ReportTab);
        $I->wait(2);
        $I->canSee($this->program1, Page\MyReportCard::ProgramLine('1'));
        $I->canSee(\Page\SectorList::DefaultSectorOfficeRetail, Page\MyReportCard::SectorLine('1'));
        $I->canSee($this->todayDate, Page\MyReportCard::EnrollmentDayLine('1'));
        //
        $I->canSeeElement(Page\MyReportCard::SavingAreaLine(\Page\SavingAreaList::Therms));
        $I->canSee($areaSum_Therms, Page\MyReportCard::PerYearLine(\Page\SavingAreaList::Therms));
        $I->canSee("$saving_Therms $this->units_ThermsArea", Page\MyReportCard::SinceEnrollmentLine(\Page\SavingAreaList::Therms));
        $I->canSee("$$moneySave_Therms", Page\MyReportCard::TotalCostSavingsLine(\Page\SavingAreaList::Therms));
        
        $I->canSeeElement(Page\MyReportCard::SavingAreaLine(\Page\SavingAreaList::EnergySaved));
        $I->canSee($areaSum_EnergySaved, Page\MyReportCard::PerYearLine(\Page\SavingAreaList::EnergySaved));
        $I->canSee("$saving_EnergySaved $this->units_EnergySavedArea", Page\MyReportCard::SinceEnrollmentLine(\Page\SavingAreaList::EnergySaved));
        $I->canSee("$$moneySave_EnergySaved", Page\MyReportCard::TotalCostSavingsLine(\Page\SavingAreaList::EnergySaved));
        
        $I->canSeeElement(Page\MyReportCard::SavingAreaLine(\Page\SavingAreaList::FuelSaved));
        $I->canSee($areaSum_FuelSaved, Page\MyReportCard::PerYearLine(\Page\SavingAreaList::FuelSaved));
        $I->canSee("$saving_FuelSaved $this->units_FuelSavedArea", Page\MyReportCard::SinceEnrollmentLine(\Page\SavingAreaList::FuelSaved));
        $I->canSee("$$moneySave_FuelSaved", Page\MyReportCard::TotalCostSavingsLine(\Page\SavingAreaList::FuelSaved));
        
        $I->canSeeElement(Page\MyReportCard::SavingAreaLine(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSee($areaSum_GreenhouseGasEmissionsSaved, Page\MyReportCard::PerYearLine(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSee("$saving_GreenhouseGasEmissionsSaved $this->units_GreenhouseGasEmissionsSavedArea", Page\MyReportCard::SinceEnrollmentLine(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSee("$$moneySave_GreenhouseGasEmissionsSaved", Page\MyReportCard::TotalCostSavingsLine(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        
        $I->canSeeElement(Page\MyReportCard::SavingAreaLine(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee($areaSum_SolidWasteDiverted, Page\MyReportCard::PerYearLine(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee("$saving_SolidWasteDiverted $this->units_SolidWasteDivertedArea", Page\MyReportCard::SinceEnrollmentLine(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee("$$moneySave_SolidWasteDiverted", Page\MyReportCard::TotalCostSavingsLine(\Page\SavingAreaList::SolidWasteDiverted));
        
        $I->amOnPage(Page\MyReportCard::$URL_VisualScoreboardTab);
        $I->wait(2);
        //
        $I->canSeeElement(Page\MyReportCard::SavingAreaBlock(\Page\SavingAreaList::Therms));
        $I->canSee(\Page\SavingAreaList::Therms, Page\MyReportCard::SavingAreaBlock_Title(\Page\SavingAreaList::Therms));
        $I->canSee("$saving_Therms", Page\MyReportCard::SavingAreaBlock_SavedValue(\Page\SavingAreaList::Therms));
        $I->canSee("$$moneySave_Therms", Page\MyReportCard::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::Therms));
        
        $I->canSeeElement(Page\MyReportCard::SavingAreaBlock(\Page\SavingAreaList::EnergySaved));
        $I->canSee(\Page\SavingAreaList::EnergySaved, Page\MyReportCard::SavingAreaBlock_Title(\Page\SavingAreaList::EnergySaved));
        $I->canSee("$saving_EnergySaved", Page\MyReportCard::SavingAreaBlock_SavedValue(\Page\SavingAreaList::EnergySaved));
        $I->canSee("$$moneySave_EnergySaved", Page\MyReportCard::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::EnergySaved));
        
        $I->canSeeElement(Page\MyReportCard::SavingAreaBlock(\Page\SavingAreaList::FuelSaved));
        $I->canSee(\Page\SavingAreaList::FuelSaved, Page\MyReportCard::SavingAreaBlock_Title(\Page\SavingAreaList::FuelSaved));
        $I->canSee("$saving_FuelSaved", Page\MyReportCard::SavingAreaBlock_SavedValue(\Page\SavingAreaList::FuelSaved));
        $I->canSee("$$moneySave_FuelSaved", Page\MyReportCard::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::FuelSaved));
        
        $I->canSeeElement(Page\MyReportCard::SavingAreaBlock(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved, Page\MyReportCard::SavingAreaBlock_Title(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSee("$saving_GreenhouseGasEmissionsSaved", Page\MyReportCard::SavingAreaBlock_SavedValue(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSee("$$moneySave_GreenhouseGasEmissionsSaved", Page\MyReportCard::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        
        $I->canSeeElement(Page\MyReportCard::SavingAreaBlock(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted, Page\MyReportCard::SavingAreaBlock_Title(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee("$saving_SolidWasteDiverted", Page\MyReportCard::SavingAreaBlock_SavedValue(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee("$$moneySave_SolidWasteDiverted", Page\MyReportCard::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::SolidWasteDiverted));
    }
    
    
    
    
    
    
    /**
     * @group admin
     */
    
    public function Help1_16_LogOut7(AcceptanceTester $I) {
        $I->reloadPage();
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(2);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsAdmin($I);
    }
    
    /**
     * @group stateadmin
     */
    
    public function LogOut_And_LogInAsStateAdmin5(AcceptanceTester $I)
    {
        $I->reloadPage();
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(2);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->emailStateAdmin, $this->password, $I, 'state admin');
        $I->wait(2);
    }
    
    /**
     * @group coordinator
     */
    
    public function LogOut_And_LogInAsCoordinator5(AcceptanceTester $I)
    {
        $I->reloadPage();
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(2);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->emailCoordinator, $this->password, $I, 'coordinator');
        $I->wait(2);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeBusiness1StatusToInProcess(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::InProcessStatus;
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->id_business1));
        $I->wait(2);
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(4);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function SelectPostCheckbox_Measure2_OnBusinessViewPage(AcceptanceTester $I) {
        $measDesc           = $this->measure2Desc;
        
        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1, $this->id_audSubgroup1_Energy));
        $I->wait(2);
        $I->click(Page\BusinessChecklistView::PostCheckboxLabel_ByDesc($measDesc));
        $I->wait(2);
        $I->scrollTo(Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(1);
        $I->click(Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(1);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeBusiness1StatusToRecognized2(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::RecognizedStatus;
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->id_business1));
        $I->wait(2);
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(4);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateReport5_BySavingAreas(Step\Acceptance\Report $I) {
        $savingMeas1_Therms                      = number_format(round($this->savingMeas1_Daily_ThermsArea_Bus1 * 21));
        $savingMeas2_Therms                      = number_format(round($this->savingMeas2_Daily_ThermsArea_Bus1 * 21));
        $savingMeas2_EnergySaved                 = number_format(round($this->savingMeas2_Daily_EnergySavedArea_Bus1 * 21));
        $savingMeas2_FuelSaved                   = number_format(round($this->savingMeas2_Daily_FuelSavedArea_Bus1 * 21));
        $savingMeas3_GreenhouseGasEmissionsSaved = number_format(round($this->savingMeas3_Daily_GreenhouseGasEmissionsSavedArea_Bus1 * 21));
        $savingMeas4_Therms                      = number_format(round($this->savingMeas4_Daily_ThermsArea_Bus1 * 21));
        $savingMeas5_EnergySaved                 = number_format(round($this->savingMeas5_Daily_EnergySavedArea_Bus1 * 21));
        $savingMeas6_SolidWasteDiverted          = number_format(round($this->savingMeas6_Daily_SolidWasteDivertedArea_Bus1 * 21));
        
        $saving_Therms                      = number_format(round(($this->savingMeas1_Daily_ThermsArea_Bus1 * 21) + ($this->savingMeas4_Daily_ThermsArea_Bus1 * 21)));
        $saving_EnergySaved                 = number_format(round($this->savingMeas5_Daily_EnergySavedArea_Bus1 * 21));
        $saving_FuelSaved                   = number_format(round($this->savingMeas2_Daily_FuelSavedArea_Bus1 * 21));
        $saving_GreenhouseGasEmissionsSaved = number_format(round($this->savingMeas3_Daily_GreenhouseGasEmissionsSavedArea_Bus1 * 21));
        $saving_SolidWasteDiverted          = number_format(round($this->savingMeas6_Daily_SolidWasteDivertedArea_Bus1 * 21));
        
        $moneySave_Therms                      = number_format(round((($this->savingMeas1_Daily_ThermsArea_Bus1 * 21) + ($this->savingMeas4_Daily_ThermsArea_Bus1 * 21)) * $this->rateMoney_ThermsArea));
        $moneySave_EnergySaved                 = number_format(round(($this->savingMeas5_Daily_EnergySavedArea_Bus1 * 21) * $this->rateMoney_EnergySavedArea));
        $moneySave_FuelSaved                   = number_format(round($this->savingMeas2_Daily_FuelSavedArea_Bus1 * 21 * $this->rateMoney_FuelSavedArea));
        $moneySave_GreenhouseGasEmissionsSaved = number_format(round($this->savingMeas3_Daily_GreenhouseGasEmissionsSavedArea_Bus1 * 21 * $this->rateMoney_GreenhouseGasEmissionsSavedArea));
        $moneySave_SolidWasteDiverted          = number_format(round($this->savingMeas6_Daily_SolidWasteDivertedArea_Bus1 * 21 * $this->rateMoney_SolidWasteDivertedArea));
        
        $I->wait(2);
        $I->amOnPage(\Page\ReportCreate::URL());
        $I->wait(2);
        $I->click(Page\ReportCreate::$Individual_RadioLabel);
        $I->wait(5);
        $I->scrollTo(Page\ReportCreate::IndividualOptionLabel($this->state));
        $I->wait(1);
        $I->click(Page\ReportCreate::IndividualOptionLabel($this->state));
        $I->wait(2);
        $I->scrollTo(Page\ReportCreate::$NextStepButton);
        $I->wait(1);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->canSee('1', Page\ReportResult::$CertifiedBusinessesInfo);
        $I->canSeeElement(Page\ReportResult::StateInfo_ByName($this->state));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure1));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure2));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure3));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure4));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure5));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure6));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure7));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure8));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure9));
        $I->canSeeElement(Page\ReportResult::AuditSubGroup_ByName(Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy));
        $I->cantSeeElement(Page\ReportResult::AuditSubGroup_ByName(Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste));
        $I->canSeeElement(Page\ReportResult::Program_ByName($this->program1));
        
        $I->canSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure1));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure2));
        $I->canSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure3));
        $I->canSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure4));
        $I->canSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure5));
        $I->canSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure6));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure7));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure8));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure9));
        
        $number_Therms = $I->GetSavingAreaNumberInTable(\Page\SavingAreaList::Therms);
        $I->canSee($saving_Therms." $this->shortUnits_ThermsArea", Page\ReportResult::SavingResultForMeasure("Total", $number_Therms));
        
        $I->canSee($savingMeas1_Therms." $this->shortUnits_ThermsArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure1, $number_Therms));
        $I->cantSee($savingMeas2_Therms." $this->shortUnits_ThermsArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure2, $number_Therms));
        $I->canSee($savingMeas4_Therms." $this->shortUnits_ThermsArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure4, $number_Therms));
        
        $number_EnergySaved = $I->GetSavingAreaNumberInTable(\Page\SavingAreaList::EnergySaved);
        $I->canSee($saving_EnergySaved." $this->shortUnits_EnergySavedArea", Page\ReportResult::SavingResultForMeasure("Total", $number_EnergySaved));
        
        $I->cantSee($savingMeas2_EnergySaved." $this->shortUnits_EnergySavedArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure2, $number_EnergySaved));
        $I->canSee($savingMeas5_EnergySaved." $this->shortUnits_EnergySavedArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure5, $number_EnergySaved));
        
        $number_FuelSaved = $I->GetSavingAreaNumberInTable(\Page\SavingAreaList::FuelSaved);
        $I->canSee($saving_FuelSaved." $this->shortUnits_FuelSavedArea", Page\ReportResult::SavingResultForMeasure("Total", $number_FuelSaved));
        
        $I->cantSee($savingMeas2_FuelSaved." $this->shortUnits_FuelSavedArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure2, $number_FuelSaved));
        
        $number_GreenhouseGasEmissionsSaved = $I->GetSavingAreaNumberInTable(\Page\SavingAreaList::GreenhouseGasEmissionsSaved);
        $I->canSee($saving_GreenhouseGasEmissionsSaved." $this->shortUnits_GreenhouseGasEmissionsSavedArea", Page\ReportResult::SavingResultForMeasure("Total", $number_GreenhouseGasEmissionsSaved));
        
        $I->canSee($savingMeas3_GreenhouseGasEmissionsSaved." $this->shortUnits_GreenhouseGasEmissionsSavedArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure3, $number_GreenhouseGasEmissionsSaved));
        
        $number_SolidWasteDiverted = $I->GetSavingAreaNumberInTable(\Page\SavingAreaList::SolidWasteDiverted);
        $I->canSee($saving_SolidWasteDiverted." $this->shortUnits_SolidWasteDivertedArea", Page\ReportResult::SavingResultForMeasure("Total", $number_SolidWasteDiverted));
        
        $I->canSee($savingMeas6_SolidWasteDiverted." $this->shortUnits_SolidWasteDivertedArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure6, $number_SolidWasteDiverted));
        
        $I->click(\Page\ReportResult::$GraphicViewTab);
        $I->wait(1);
        $I->cantSeeElement(\Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::VOC));
        
        $I->canSeeElement(Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::Therms));
        $I->canSee(\Page\SavingAreaList::Therms, Page\ReportResult::SavingAreaBlock_Title(\Page\SavingAreaList::Therms));
        $I->canSee("$saving_Therms", Page\ReportResult::SavingAreaBlock_SavedValue(\Page\SavingAreaList::Therms));
        $I->canSee("$$moneySave_Therms", Page\ReportResult::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::Therms));
        
        $I->canSeeElement(Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::EnergySaved));
        $I->canSee(\Page\SavingAreaList::EnergySaved, Page\ReportResult::SavingAreaBlock_Title(\Page\SavingAreaList::EnergySaved));
        $I->canSee("$saving_EnergySaved", Page\ReportResult::SavingAreaBlock_SavedValue(\Page\SavingAreaList::EnergySaved));
        $I->canSee("$$moneySave_EnergySaved", Page\ReportResult::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::EnergySaved));
        
        $I->cantSeeElement(Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::FuelSaved));
        $I->cantSee(\Page\SavingAreaList::FuelSaved, Page\ReportResult::SavingAreaBlock_Title(\Page\SavingAreaList::FuelSaved));
        $I->cantSee("$saving_FuelSaved", Page\ReportResult::SavingAreaBlock_SavedValue(\Page\SavingAreaList::FuelSaved));
        $I->cantSee("$$moneySave_FuelSaved", Page\ReportResult::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::FuelSaved));
        
        $I->canSeeElement(Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved, Page\ReportResult::SavingAreaBlock_Title(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSee("$saving_GreenhouseGasEmissionsSaved", Page\ReportResult::SavingAreaBlock_SavedValue(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSee("$$moneySave_GreenhouseGasEmissionsSaved", Page\ReportResult::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        
        $I->canSeeElement(Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted, Page\ReportResult::SavingAreaBlock_Title(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee("$saving_SolidWasteDiverted", Page\ReportResult::SavingAreaBlock_SavedValue(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee("$$moneySave_SolidWasteDiverted", Page\ReportResult::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::SolidWasteDiverted));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOut8(AcceptanceTester $I) {
        $I->reloadPage();
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(2);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->email1, $this->password, $I, 'user');
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOnMyReportCardPage5(AcceptanceTester $I) {
        $areaSum_Therms                      = trim(number_format($this->savingMeas1_Annual_ThermsArea_Bus1 + $this->savingMeas4_Annual_ThermsArea_Bus1).' '.$this->units_ThermsArea);
        $areaSum_EnergySaved                 = trim(number_format($this->savingMeas5_Annual_EnergySavedArea_Bus1).' '.$this->units_EnergySavedArea);
        $areaSum_FuelSaved                   = trim(number_format($this->savingMeas2_Annual_FuelSavedArea_Bus1).' '.$this->units_FuelSavedArea);
        $areaSum_GreenhouseGasEmissionsSaved = trim(number_format($this->savingMeas3_Annual_GreenhouseGasEmissionsSavedArea_Bus1).' '.$this->units_GreenhouseGasEmissionsSavedArea);
        $areaSum_SolidWasteDiverted          = trim(number_format($this->savingMeas6_Annual_SolidWasteDivertedArea_Bus1).' '.$this->units_SolidWasteDivertedArea);
        
        $saving_Therms                      = number_format(round(($this->savingMeas1_Daily_ThermsArea_Bus1 * 21) + ($this->savingMeas4_Daily_ThermsArea_Bus1 * 21)));
        $saving_EnergySaved                 = number_format(round($this->savingMeas5_Daily_EnergySavedArea_Bus1 * 21));
        $saving_FuelSaved                   = number_format(round($this->savingMeas2_Daily_FuelSavedArea_Bus1 * 21));
        $saving_GreenhouseGasEmissionsSaved = number_format(round($this->savingMeas3_Daily_GreenhouseGasEmissionsSavedArea_Bus1 * 21));
        $saving_SolidWasteDiverted          = number_format(round($this->savingMeas6_Daily_SolidWasteDivertedArea_Bus1 * 21));
        
        $moneySave_Therms                      = number_format(round((($this->savingMeas1_Daily_ThermsArea_Bus1 * 21) + ($this->savingMeas4_Daily_ThermsArea_Bus1 * 21)) * $this->rateMoney_ThermsArea));
        $moneySave_EnergySaved                 = number_format(round(($this->savingMeas5_Daily_EnergySavedArea_Bus1 * 21) * $this->rateMoney_EnergySavedArea));
        $moneySave_FuelSaved                   = number_format(round($this->savingMeas2_Daily_FuelSavedArea_Bus1 * 21 * $this->rateMoney_FuelSavedArea));
        $moneySave_GreenhouseGasEmissionsSaved = number_format(round($this->savingMeas3_Daily_GreenhouseGasEmissionsSavedArea_Bus1 * 21 * $this->rateMoney_GreenhouseGasEmissionsSavedArea));
        $moneySave_SolidWasteDiverted          = number_format(round($this->savingMeas6_Daily_SolidWasteDivertedArea_Bus1 * 21 * $this->rateMoney_SolidWasteDivertedArea));
        
        $I->amOnPage(Page\MyReportCard::$URL_ReportTab);
        $I->wait(2);
        $I->canSee($this->program1, Page\MyReportCard::ProgramLine('1'));
        $I->canSee(\Page\SectorList::DefaultSectorOfficeRetail, Page\MyReportCard::SectorLine('1'));
        $I->canSee($this->todayDate, Page\MyReportCard::EnrollmentDayLine('1'));
        //
        $I->canSeeElement(Page\MyReportCard::SavingAreaLine(\Page\SavingAreaList::Therms));
        $I->canSee($areaSum_Therms, Page\MyReportCard::PerYearLine(\Page\SavingAreaList::Therms));
        $I->canSee("$saving_Therms $this->units_ThermsArea", Page\MyReportCard::SinceEnrollmentLine(\Page\SavingAreaList::Therms));
        $I->canSee("$$moneySave_Therms", Page\MyReportCard::TotalCostSavingsLine(\Page\SavingAreaList::Therms));
        
        $I->canSeeElement(Page\MyReportCard::SavingAreaLine(\Page\SavingAreaList::EnergySaved));
        $I->canSee($areaSum_EnergySaved, Page\MyReportCard::PerYearLine(\Page\SavingAreaList::EnergySaved));
        $I->canSee("$saving_EnergySaved $this->units_EnergySavedArea", Page\MyReportCard::SinceEnrollmentLine(\Page\SavingAreaList::EnergySaved));
        $I->canSee("$$moneySave_EnergySaved", Page\MyReportCard::TotalCostSavingsLine(\Page\SavingAreaList::EnergySaved));
        
        $I->cantSeeElement(Page\MyReportCard::SavingAreaLine(\Page\SavingAreaList::FuelSaved));
        $I->cantSee($areaSum_FuelSaved, Page\MyReportCard::PerYearLine(\Page\SavingAreaList::FuelSaved));
        $I->cantSee("$saving_FuelSaved $this->units_FuelSavedArea", Page\MyReportCard::SinceEnrollmentLine(\Page\SavingAreaList::FuelSaved));
        $I->cantSee("$$moneySave_FuelSaved", Page\MyReportCard::TotalCostSavingsLine(\Page\SavingAreaList::FuelSaved));
        
        $I->canSeeElement(Page\MyReportCard::SavingAreaLine(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSee($areaSum_GreenhouseGasEmissionsSaved, Page\MyReportCard::PerYearLine(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSee("$saving_GreenhouseGasEmissionsSaved $this->units_GreenhouseGasEmissionsSavedArea", Page\MyReportCard::SinceEnrollmentLine(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSee("$$moneySave_GreenhouseGasEmissionsSaved", Page\MyReportCard::TotalCostSavingsLine(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        
        $I->canSeeElement(Page\MyReportCard::SavingAreaLine(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee($areaSum_SolidWasteDiverted, Page\MyReportCard::PerYearLine(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee("$saving_SolidWasteDiverted $this->units_SolidWasteDivertedArea", Page\MyReportCard::SinceEnrollmentLine(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee("$$moneySave_SolidWasteDiverted", Page\MyReportCard::TotalCostSavingsLine(\Page\SavingAreaList::SolidWasteDiverted));
        
        $I->amOnPage(Page\MyReportCard::$URL_VisualScoreboardTab);
        $I->wait(2);
        //
        $I->canSeeElement(Page\MyReportCard::SavingAreaBlock(\Page\SavingAreaList::Therms));
        $I->canSee(\Page\SavingAreaList::Therms, Page\MyReportCard::SavingAreaBlock_Title(\Page\SavingAreaList::Therms));
        $I->canSee("$saving_Therms", Page\MyReportCard::SavingAreaBlock_SavedValue(\Page\SavingAreaList::Therms));
        $I->canSee("$$moneySave_Therms", Page\MyReportCard::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::Therms));
        
        $I->canSeeElement(Page\MyReportCard::SavingAreaBlock(\Page\SavingAreaList::EnergySaved));
        $I->canSee(\Page\SavingAreaList::EnergySaved, Page\MyReportCard::SavingAreaBlock_Title(\Page\SavingAreaList::EnergySaved));
        $I->canSee("$saving_EnergySaved", Page\MyReportCard::SavingAreaBlock_SavedValue(\Page\SavingAreaList::EnergySaved));
        $I->canSee("$$moneySave_EnergySaved", Page\MyReportCard::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::EnergySaved));
        
        $I->cantSeeElement(Page\MyReportCard::SavingAreaBlock(\Page\SavingAreaList::FuelSaved));
        $I->cantSee(\Page\SavingAreaList::FuelSaved, Page\MyReportCard::SavingAreaBlock_Title(\Page\SavingAreaList::FuelSaved));
        $I->cantSee("$saving_FuelSaved", Page\MyReportCard::SavingAreaBlock_SavedValue(\Page\SavingAreaList::FuelSaved));
        $I->cantSee("$$moneySave_FuelSaved", Page\MyReportCard::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::FuelSaved));
        
        $I->canSeeElement(Page\MyReportCard::SavingAreaBlock(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved, Page\MyReportCard::SavingAreaBlock_Title(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSee("$saving_GreenhouseGasEmissionsSaved", Page\MyReportCard::SavingAreaBlock_SavedValue(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSee("$$moneySave_GreenhouseGasEmissionsSaved", Page\MyReportCard::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        
        $I->canSeeElement(Page\MyReportCard::SavingAreaBlock(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted, Page\MyReportCard::SavingAreaBlock_Title(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee("$saving_SolidWasteDiverted", Page\MyReportCard::SavingAreaBlock_SavedValue(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee("$$moneySave_SolidWasteDiverted", Page\MyReportCard::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::SolidWasteDiverted));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOut1d(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->Logout($I);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_BusinessRegister(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email2 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password = 'Qq!1111111';
        $busName          = $this->business2 = $I->GenerateNameOf("busnam");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");;
        $zip              = $this->zip1;
        $city             = $this->city1;
        $website          = 'ewegfh.fh';
        $busType          = 'Office / Retail';
        $employees        = $this->employeesCount2 = '120';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(12);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CompleteMeasure1_Business2(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
        $value1   = '100';
        $value2   = '325';
        $this->savingMeas1_Annual_ThermsArea_Bus2 = '12325';//325+100*120 = 12325; //325 + 100 * $this->employeesCount2;
        $this->savingMeas1_Daily_ThermsArea_Bus2 = '33.7671232877'; // round( 12325 /365 ) = 33.7671232877; //round(($this->savingMeas1_Annual_Area1 / 365), 10);
        
        $I->wait(1);
        $I->comment("Complete Measure1 and save.");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
        $I->wait(2);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->fillField(\Page\RegistrationStarted::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(4);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CompleteMeasure2_Business2(AcceptanceTester $I) {
        $measDesc = $this->measure2Desc;
        $this->savingMeas2_Annual_ThermsArea_Bus2 = $this->employeesCount2 * $this->globVariableValue;
        $this->savingMeas2_Daily_ThermsArea_Bus2  = round(($this->savingMeas2_Annual_ThermsArea_Bus2 / 365), 14);
        $this->savingMeas2_Annual_EnergySavedArea_Bus2 = round(($this->employeesCount2 / $this->globVariableValue),7);
        $this->savingMeas2_Daily_EnergySavedArea_Bus2  = round((($this->employeesCount2 / $this->globVariableValue) / 365), 10);
        $this->savingMeas2_Annual_FuelSavedArea_Bus2 = "240"; // 120 + 120 = 240; //$this->employeesCount2 + $this->employeesCount2;
        $this->savingMeas2_Daily_FuelSavedArea_Bus2  = "0.657534246575"; // round( 240 / 365 ) = 0.657534246575; //round(($this->savingMeas2_Annual_Area4 / 365), 11);
        
                
        $I->wait(1);
        $I->comment("Complete Measure2 and save.");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure2]"], $style = 'visibility');
        $I->wait(2);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(4);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CompleteMeasure5_Business2(AcceptanceTester $I) {
        $measDesc = $this->measure5Desc;
        $this->savingMeas5_Annual_EnergySavedArea_Bus2 = "2083.19995117"; // 
        $this->savingMeas5_Daily_EnergySavedArea_Bus2  = "5.7073971265"; // 
                
        $I->wait(1);
        $I->comment("Complete Measure5 and save.");
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure5]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(4);
        $I->click(Page\RegistrationStarted::SubmeasureToggleButton_2Items_ByMeasureDesc($measDesc, '1'));
        $I->wait(2);
        $I->selectOption(\Page\RegistrationStarted::$LightingPopup_BuildingTypeSelect, 'Hotel');
        $I->wait(3);
        $I->selectOption(\Page\RegistrationStarted::LightingPopup_ReplacementFixtureSelect('1'), '2');
        $I->wait(2);
        $I->fillField(\Page\RegistrationStarted::LightingPopup_ReplacementFixtureQuantityField('1'), '15');
        $I->fillField(\Page\RegistrationStarted::LightingPopup_ExistingFixtureQuantityField('1'), '33');
        $I->wait(3);
        $I->click(Page\RegistrationStarted::$LightingPopup_SaveChangesButton);
        $I->wait(3);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(4);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CompleteMeasure6_Business2(AcceptanceTester $I) {
        $measDesc = $this->measure6Desc;
        $before   = 'before';
        $after    = 'after';
        $this->savingMeas6_Annual_SolidWasteDivertedArea_Bus2 = "5709978.14587"; // 
        $this->savingMeas6_Daily_SolidWasteDivertedArea_Bus2  = "15643.7757421"; //
        
        $I->wait(1);
        $I->comment("Complete Measure6 fand save.");
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure6]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure6']");
        $I->wait(2);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(3);
        $I->makeElementVisible(["[data-measure_id=$this->idMeasure6]"], $style = 'visibility');
        $I->wait(3);
        $I->selectOption(\Page\RegistrationStarted::SubmeasureToggleButton_3Items_ByMeasureDesc($measDesc, '1'), 'yes');
        $I->wait(3);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(2);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(6);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure6]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure6']");
        $I->wait(2);
//        $I->click('[Detailed Inputs Form]');
//        $I->click("[Detailed Inputs Form]", "#");
        $I->click(Page\RegistrationStarted::SubmeasureLink_ByMeasureDesc($measDesc, '1'));
        $I->wait(15);
        $I->selectOption(\Page\RegistrationStarted::WasteDiversionPopup_CommoditySelect('1', $before), 'Cardboard');
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::WasteDiversionPopup_ContainerTypeSelect('1', $before), 'CARRY BIN');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::WasteDiversionPopup_ContainersField('1', $before), '7');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::WasteDiversionPopup_CollectionPerWeekField('1', $before), '15');
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$WasteDiversionPopup_AfterGBTab);
        $I->wait(2);
        $I->selectOption(\Page\RegistrationStarted::WasteDiversionPopup_ContainerTypeSelect('1', $after), 'DUMPSTER');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::WasteDiversionPopup_ContainersField('1', $after), '12');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::WasteDiversionPopup_CollectionPerWeekField('1', $after), '22');
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::WasteDiversionPopup_CompactedToggleButton('1', $after));
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::WasteDiversionPopup_SaveChangesButton($after));
        $I->wait(2);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(4);
    }
    
    /**
     * @group admin
     */
    
    public function Help_LogOut9(AcceptanceTester $I) {
        $I->reloadPage();
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(2);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsAdmin($I);
    }
    
    /**
     * @group stateadmin
     */
    
    public function LogOut_And_LogInAsStateAdmin6(AcceptanceTester $I)
    {
        $I->reloadPage();
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(2);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->emailStateAdmin, $this->password, $I, 'state admin');
        $I->wait(2);
    }
    
    /**
     * @group coordinator
     */
    
    public function LogOut_And_LogInAsCoordinator6(AcceptanceTester $I)
    {
        $I->reloadPage();
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(2);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->emailCoordinator, $this->password, $I, 'coordinator');
        $I->wait(2);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_GoToBusinessViewPage_GetBusiness2Id(AcceptanceTester $I){
        $I->wait(1);
        $I->SelectDefaultState($I, $this->state);
        $I->wait(1);
        $I->amOnPage(Page\Dashboard::URL());
        $I->wait(2);
        $url1 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business2), 'href');
        $I->comment("Url1: $url1");
        $u1 = explode('=', $url1);
        $this->id_business2 = $u1[1];
        $I->comment("Business2 id: $this->id_business2");
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeBusiness2StatusToRecognized(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::RecognizedStatus;
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->id_business2));
        $I->wait(2);
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(4);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeRecognitionDate_Business2(AcceptanceTester $I){
        $Recog            = strtotime("-120 day", strtotime($this->todayDate));
        $recognitionDate  = date("m/d/Y", $Recog);
        
        $I->wait(1);
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->id_business2));
        $I->wait(2);
        $I->fillField(\Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$SaveDateButton_BusinessInfoTab);
        $I->wait(2);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CreateReport4_BySavingAreas_(Step\Acceptance\Report $I) {
        $Start            = strtotime("-230 day", strtotime($this->todayDate));
        $startDate        = date("m-d-Y", $Start);
        
        $savingMeas1_Therms                      = number_format(round(($this->savingMeas1_Daily_ThermsArea_Bus1 * 21) + ($this->savingMeas1_Daily_ThermsArea_Bus2 * 121)));
        $savingMeas2_Therms                      = number_format(round($this->savingMeas2_Daily_ThermsArea_Bus2 * 121));
        $savingMeas2_EnergySaved                 = number_format(round($this->savingMeas2_Daily_EnergySavedArea_Bus2 * 121));
        $savingMeas2_FuelSaved                   = number_format(round($this->savingMeas2_Daily_FuelSavedArea_Bus2 * 121));
        $savingMeas3_GreenhouseGasEmissionsSaved = number_format(round($this->savingMeas3_Daily_GreenhouseGasEmissionsSavedArea_Bus1 * 21));
        $savingMeas4_Therms                      = number_format(round($this->savingMeas4_Daily_ThermsArea_Bus1 * 21));
        $savingMeas5_EnergySaved                 = number_format(round(($this->savingMeas5_Daily_EnergySavedArea_Bus1 * 21) + ($this->savingMeas5_Daily_EnergySavedArea_Bus2 * 121)));
        $savingMeas6_SolidWasteDiverted          = number_format(round(($this->savingMeas6_Daily_SolidWasteDivertedArea_Bus1 * 21) + ($this->savingMeas6_Daily_SolidWasteDivertedArea_Bus2 * 121)));
        
        $saving_Therms                      = number_format(round(($this->savingMeas1_Daily_ThermsArea_Bus1 * 21) + ($this->savingMeas4_Daily_ThermsArea_Bus1 * 21) + ($this->savingMeas1_Daily_ThermsArea_Bus2 * 121) + ($this->savingMeas2_Daily_ThermsArea_Bus2 * 121)));
        $saving_EnergySaved                 = number_format(round(($this->savingMeas5_Daily_EnergySavedArea_Bus1 * 21) + ($this->savingMeas2_Daily_EnergySavedArea_Bus2 * 121) + ($this->savingMeas5_Daily_EnergySavedArea_Bus2 * 121)));
        $saving_FuelSaved                   = number_format(round($this->savingMeas2_Daily_FuelSavedArea_Bus2 * 121));
        $saving_GreenhouseGasEmissionsSaved = number_format(round($this->savingMeas3_Daily_GreenhouseGasEmissionsSavedArea_Bus1 * 21));
        $saving_SolidWasteDiverted          = number_format(round($this->savingMeas6_Daily_SolidWasteDivertedArea_Bus1 * 21) + ($this->savingMeas6_Daily_SolidWasteDivertedArea_Bus2 * 121));
        
        $moneySave_Therms                      = number_format(round((($this->savingMeas1_Daily_ThermsArea_Bus1 * 21) + ($this->savingMeas4_Daily_ThermsArea_Bus1 * 21) + ($this->savingMeas1_Daily_ThermsArea_Bus2 * 121) + ($this->savingMeas2_Daily_ThermsArea_Bus2 * 121)) * $this->rateMoney_ThermsArea));
        $moneySave_EnergySaved                 = number_format(round((($this->savingMeas5_Daily_EnergySavedArea_Bus1 * 21) + ($this->savingMeas2_Daily_EnergySavedArea_Bus2 * 121) + ($this->savingMeas5_Daily_EnergySavedArea_Bus2 * 121)) * $this->rateMoney_EnergySavedArea));
        $moneySave_FuelSaved                   = number_format(round($this->savingMeas2_Daily_FuelSavedArea_Bus2 * 121 * $this->rateMoney_FuelSavedArea));
        $moneySave_GreenhouseGasEmissionsSaved = number_format(round($this->savingMeas3_Daily_GreenhouseGasEmissionsSavedArea_Bus1 * 21 * $this->rateMoney_GreenhouseGasEmissionsSavedArea));
        $moneySave_SolidWasteDiverted          = number_format(round((($this->savingMeas6_Daily_SolidWasteDivertedArea_Bus1 * 21)+ ($this->savingMeas6_Daily_SolidWasteDivertedArea_Bus2 * 121)) * $this->rateMoney_SolidWasteDivertedArea));
        
        $I->wait(2);
        $I->amOnPage(\Page\ReportCreate::URL());
        $I->wait(2);
        $I->click(Page\ReportCreate::$Individual_RadioLabel);
        $I->wait(5);
        $I->scrollTo(Page\ReportCreate::IndividualOptionLabel($this->state));
        $I->wait(1);
        $I->click(Page\ReportCreate::IndividualOptionLabel($this->state));
        $I->wait(2);
        $I->scrollTo(Page\ReportCreate::$NextStepButton);
        $I->wait(1);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->fillField(\Page\ReportCreate::$StartDateField, $startDate);
        $I->wait(1);
        $I->click(Page\ReportCreate::$NextStepButton);
        $I->wait(9);
        $I->canSee('2', Page\ReportResult::$CertifiedBusinessesInfo);
        $I->canSeeElement(Page\ReportResult::StateInfo_ByName($this->state));
        $I->canSee($startDate, Page\ReportResult::$DateRangeStartInfo);
        $I->canSee($this->todayDate, Page\ReportResult::$DateRangeEndInfo);
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure1));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure2));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure3));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure4));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure5));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure6));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure7));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure8));
        $I->cantSeeElement(Page\ReportResult::MeasuresInfo_ById($this->idMeasure9));
        $I->canSeeElement(Page\ReportResult::AuditSubGroup_ByName(Page\AuditGroupList::Energy_AuditGroup, $this->audSubgroup1_Energy));
        $I->cantSeeElement(Page\ReportResult::AuditSubGroup_ByName(Page\AuditGroupList::SolidWaste_AuditGroup, $this->audSubgroup1_SolidWaste));
        $I->canSeeElement(Page\ReportResult::Program_ByName($this->program1));
        
        $I->canSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure1));
        $I->canSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure2));
        $I->canSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure3));
        $I->canSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure4));
        $I->canSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure5));
        $I->canSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure6));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure7));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure8));
        $I->cantSeeElement(Page\ReportResult::MeasureIdLine($this->idMeasure9));
        
        $number_Therms = $I->GetSavingAreaNumberInTable(\Page\SavingAreaList::Therms);
        $I->canSee($saving_Therms." $this->shortUnits_ThermsArea", Page\ReportResult::SavingResultForMeasure("Total", $number_Therms));
        
        $I->canSee($savingMeas1_Therms." $this->shortUnits_ThermsArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure1, $number_Therms));
        $I->canSee($savingMeas2_Therms." $this->shortUnits_ThermsArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure2, $number_Therms));
        $I->canSee($savingMeas4_Therms." $this->shortUnits_ThermsArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure4, $number_Therms));
        
        $number_EnergySaved = $I->GetSavingAreaNumberInTable(\Page\SavingAreaList::EnergySaved);
        $I->canSee($saving_EnergySaved." $this->shortUnits_EnergySavedArea", Page\ReportResult::SavingResultForMeasure("Total", $number_EnergySaved));
        
        $I->canSee($savingMeas2_EnergySaved." $this->shortUnits_EnergySavedArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure2, $number_EnergySaved));
        $I->canSee($savingMeas5_EnergySaved." $this->shortUnits_EnergySavedArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure5, $number_EnergySaved));
        
        $number_FuelSaved = $I->GetSavingAreaNumberInTable(\Page\SavingAreaList::FuelSaved);
        $I->canSee($saving_FuelSaved." $this->shortUnits_FuelSavedArea", Page\ReportResult::SavingResultForMeasure("Total", $number_FuelSaved));
        
        $I->canSee($savingMeas2_FuelSaved." $this->shortUnits_FuelSavedArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure2, $number_FuelSaved));
        
        $number_GreenhouseGasEmissionsSaved = $I->GetSavingAreaNumberInTable(\Page\SavingAreaList::GreenhouseGasEmissionsSaved);
        $I->canSee($saving_GreenhouseGasEmissionsSaved." $this->shortUnits_GreenhouseGasEmissionsSavedArea", Page\ReportResult::SavingResultForMeasure("Total", $number_GreenhouseGasEmissionsSaved));
        
        $I->canSee($savingMeas3_GreenhouseGasEmissionsSaved." $this->shortUnits_GreenhouseGasEmissionsSavedArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure3, $number_GreenhouseGasEmissionsSaved));
        
        $number_SolidWasteDiverted = $I->GetSavingAreaNumberInTable(\Page\SavingAreaList::SolidWasteDiverted);
        $I->canSee($saving_SolidWasteDiverted." $this->shortUnits_SolidWasteDivertedArea", Page\ReportResult::SavingResultForMeasure("Total", $number_SolidWasteDiverted));
        
        $I->canSee($savingMeas6_SolidWasteDiverted." $this->shortUnits_SolidWasteDivertedArea", Page\ReportResult::SavingResultForMeasure($this->idMeasure6, $number_SolidWasteDiverted));
        
        $I->click(\Page\ReportResult::$GraphicViewTab);
        $I->wait(1);
        $I->cantSeeElement(\Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::VOC));
        
        $I->canSeeElement(Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::Therms));
        $I->canSee(\Page\SavingAreaList::Therms, Page\ReportResult::SavingAreaBlock_Title(\Page\SavingAreaList::Therms));
        $I->canSee("$saving_Therms", Page\ReportResult::SavingAreaBlock_SavedValue(\Page\SavingAreaList::Therms));
        $I->canSee("$$moneySave_Therms", Page\ReportResult::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::Therms));
        
        $I->canSeeElement(Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::EnergySaved));
        $I->canSee(\Page\SavingAreaList::EnergySaved, Page\ReportResult::SavingAreaBlock_Title(\Page\SavingAreaList::EnergySaved));
        $I->canSee("$saving_EnergySaved", Page\ReportResult::SavingAreaBlock_SavedValue(\Page\SavingAreaList::EnergySaved));
        $I->canSee("$$moneySave_EnergySaved", Page\ReportResult::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::EnergySaved));
        
        $I->canSeeElement(Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::FuelSaved));
        $I->canSee(\Page\SavingAreaList::FuelSaved, Page\ReportResult::SavingAreaBlock_Title(\Page\SavingAreaList::FuelSaved));
        $I->canSee("$saving_FuelSaved", Page\ReportResult::SavingAreaBlock_SavedValue(\Page\SavingAreaList::FuelSaved));
        $I->canSee("$$moneySave_FuelSaved", Page\ReportResult::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::FuelSaved));
        
        $I->canSeeElement(Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved, Page\ReportResult::SavingAreaBlock_Title(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSee("$saving_GreenhouseGasEmissionsSaved", Page\ReportResult::SavingAreaBlock_SavedValue(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->canSee("$$moneySave_GreenhouseGasEmissionsSaved", Page\ReportResult::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        
        $I->canSeeElement(Page\ReportResult::SavingAreaBlock(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted, Page\ReportResult::SavingAreaBlock_Title(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee("$saving_SolidWasteDiverted", Page\ReportResult::SavingAreaBlock_SavedValue(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee("$$moneySave_SolidWasteDiverted", Page\ReportResult::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::SolidWasteDiverted));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOut71(AcceptanceTester $I) {
        $I->reloadPage();
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(2);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsUser($this->email2, $this->password, $I, 'user');
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function SubmitBusiness2_ReviewAndSubmitPage(AcceptanceTester $I) {
        $I->wait(2);
        $I->amOnPage(\Page\ReviewAndSubmit::$URL);
        $I->wait(2);
        $I->scrollTo(Page\ReviewAndSubmit::$SubmitMyApplicationButton);
        $I->wait(1);
        $I->click(Page\ReviewAndSubmit::$SubmitMyApplicationButton);
        $I->wait(5);
        $I->click(".confirm");
        $I->wait(6);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckOnMyReportCardPage3_Business2(AcceptanceTester $I) {
        $areaSum_Therms                      = trim(number_format($this->savingMeas1_Annual_ThermsArea_Bus2 + $this->savingMeas2_Annual_ThermsArea_Bus2).' '.$this->units_ThermsArea);
        $areaSum_EnergySaved                 = trim(number_format($this->savingMeas2_Annual_EnergySavedArea_Bus2 + $this->savingMeas5_Annual_EnergySavedArea_Bus2).' '.$this->units_EnergySavedArea);
        $areaSum_FuelSaved                   = trim(number_format($this->savingMeas2_Annual_FuelSavedArea_Bus2).' '.$this->units_FuelSavedArea);
        $areaSum_SolidWasteDiverted          = trim(number_format($this->savingMeas6_Annual_SolidWasteDivertedArea_Bus2).' '.$this->units_SolidWasteDivertedArea);
        
        $saving_Therms                      = number_format(round(($this->savingMeas1_Daily_ThermsArea_Bus2 * 121) + ($this->savingMeas2_Daily_ThermsArea_Bus2 * 121)));
        $saving_EnergySaved                 = number_format(round(($this->savingMeas2_Daily_EnergySavedArea_Bus2 * 121) + ($this->savingMeas5_Daily_EnergySavedArea_Bus2 * 121)));
        $saving_FuelSaved                   = number_format(round($this->savingMeas2_Daily_FuelSavedArea_Bus2 * 121));
        $saving_SolidWasteDiverted          = number_format(round($this->savingMeas6_Daily_SolidWasteDivertedArea_Bus2 * 121));
        
        $moneySave_Therms                      = number_format(round((($this->savingMeas1_Daily_ThermsArea_Bus2 * 121) + ($this->savingMeas2_Daily_ThermsArea_Bus2 * 121)) * $this->rateMoney_ThermsArea));
        $moneySave_EnergySaved                 = number_format(round((($this->savingMeas2_Daily_EnergySavedArea_Bus2 * 121)  + ($this->savingMeas5_Daily_EnergySavedArea_Bus2 * 121)) * $this->rateMoney_EnergySavedArea));
        $moneySave_FuelSaved                   = number_format(round($this->savingMeas2_Daily_FuelSavedArea_Bus2 * 121 * $this->rateMoney_FuelSavedArea));
        $moneySave_SolidWasteDiverted          = number_format(round($this->savingMeas6_Daily_SolidWasteDivertedArea_Bus2 * 121 * $this->rateMoney_SolidWasteDivertedArea));
        
        $I->amOnPage(Page\MyReportCard::$URL_ReportTab);
        $I->wait(2);
        $I->canSee($this->program1, Page\MyReportCard::ProgramLine('1'));
        $I->canSee(\Page\SectorList::DefaultSectorOfficeRetail, Page\MyReportCard::SectorLine('1'));
        $I->canSee($this->todayDate, Page\MyReportCard::EnrollmentDayLine('1'));
        //
        $I->canSeeElement(Page\MyReportCard::SavingAreaLine(\Page\SavingAreaList::Therms));
        $I->canSee($areaSum_Therms, Page\MyReportCard::PerYearLine(\Page\SavingAreaList::Therms));
        $I->canSee("$saving_Therms $this->units_ThermsArea", Page\MyReportCard::SinceEnrollmentLine(\Page\SavingAreaList::Therms));
        $I->canSee("$$moneySave_Therms", Page\MyReportCard::TotalCostSavingsLine(\Page\SavingAreaList::Therms));
        
        $I->canSeeElement(Page\MyReportCard::SavingAreaLine(\Page\SavingAreaList::EnergySaved));
        $I->canSee($areaSum_EnergySaved, Page\MyReportCard::PerYearLine(\Page\SavingAreaList::EnergySaved));
        $I->canSee("$saving_EnergySaved $this->units_EnergySavedArea", Page\MyReportCard::SinceEnrollmentLine(\Page\SavingAreaList::EnergySaved));
        $I->canSee("$$moneySave_EnergySaved", Page\MyReportCard::TotalCostSavingsLine(\Page\SavingAreaList::EnergySaved));
        
        $I->canSeeElement(Page\MyReportCard::SavingAreaLine(\Page\SavingAreaList::FuelSaved));
        $I->canSee($areaSum_FuelSaved, Page\MyReportCard::PerYearLine(\Page\SavingAreaList::FuelSaved));
        $I->canSee("$saving_FuelSaved $this->units_FuelSavedArea", Page\MyReportCard::SinceEnrollmentLine(\Page\SavingAreaList::FuelSaved));
        $I->canSee("$$moneySave_FuelSaved", Page\MyReportCard::TotalCostSavingsLine(\Page\SavingAreaList::FuelSaved));
        
        $I->cantSeeElement(Page\MyReportCard::SavingAreaLine(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        
        $I->canSeeElement(Page\MyReportCard::SavingAreaLine(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee($areaSum_SolidWasteDiverted, Page\MyReportCard::PerYearLine(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee("$saving_SolidWasteDiverted $this->units_SolidWasteDivertedArea", Page\MyReportCard::SinceEnrollmentLine(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee("$$moneySave_SolidWasteDiverted", Page\MyReportCard::TotalCostSavingsLine(\Page\SavingAreaList::SolidWasteDiverted));
        
        $I->amOnPage(Page\MyReportCard::$URL_VisualScoreboardTab);
        $I->wait(2);
        //
        $I->canSeeElement(Page\MyReportCard::SavingAreaBlock(\Page\SavingAreaList::Therms));
        $I->canSee(\Page\SavingAreaList::Therms, Page\MyReportCard::SavingAreaBlock_Title(\Page\SavingAreaList::Therms));
        $I->canSee("$saving_Therms", Page\MyReportCard::SavingAreaBlock_SavedValue(\Page\SavingAreaList::Therms));
        $I->canSee("$$moneySave_Therms", Page\MyReportCard::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::Therms));
        
        $I->canSeeElement(Page\MyReportCard::SavingAreaBlock(\Page\SavingAreaList::EnergySaved));
        $I->canSee(\Page\SavingAreaList::EnergySaved, Page\MyReportCard::SavingAreaBlock_Title(\Page\SavingAreaList::EnergySaved));
        $I->canSee("$saving_EnergySaved", Page\MyReportCard::SavingAreaBlock_SavedValue(\Page\SavingAreaList::EnergySaved));
        $I->canSee("$$moneySave_EnergySaved", Page\MyReportCard::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::EnergySaved));
        
        $I->canSeeElement(Page\MyReportCard::SavingAreaBlock(\Page\SavingAreaList::FuelSaved));
        $I->canSee(\Page\SavingAreaList::FuelSaved, Page\MyReportCard::SavingAreaBlock_Title(\Page\SavingAreaList::FuelSaved));
        $I->canSee("$saving_FuelSaved", Page\MyReportCard::SavingAreaBlock_SavedValue(\Page\SavingAreaList::FuelSaved));
        $I->canSee("$$moneySave_FuelSaved", Page\MyReportCard::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::FuelSaved));
        
        $I->cantSeeElement(Page\MyReportCard::SavingAreaBlock(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        $I->cantSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved, Page\MyReportCard::SavingAreaBlock_Title(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
        
        $I->canSeeElement(Page\MyReportCard::SavingAreaBlock(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted, Page\MyReportCard::SavingAreaBlock_Title(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee("$saving_SolidWasteDiverted", Page\MyReportCard::SavingAreaBlock_SavedValue(\Page\SavingAreaList::SolidWasteDiverted));
        $I->canSee("$$moneySave_SolidWasteDiverted", Page\MyReportCard::SavingAreaBlock_SavedMoney(\Page\SavingAreaList::SolidWasteDiverted));
    }
    
}
