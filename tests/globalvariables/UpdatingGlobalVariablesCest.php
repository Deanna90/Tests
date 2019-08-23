<?php


class UpdatingGlobalVariablesCest
{
    public $state;
    public $audSubgroup1_Energy, $id_audSubgroup1_Energy;
    public $globVariableTitle, $globVariableValue, $globVariableName, $id_globVariable;
    public $Cardboard_Title, $Cardboard_Value, $Cardboard_Name;
    public $Compostable_Title, $Compostable_Value, $Compostable_Name;
    public $Recicled100_Title, $Recicled100_Value, $Recicled100_Name;
    public $password = 'Qq!1111111';
    public $measure1Desc, $idMeasure1, $savingMeas1_Annual_Bus1, $savingMeas1_Daily_Bus1;
    public $measure2Desc, $idMeasure2, $savingMeas2_Annual_Bus1, $savingMeas2_Daily_Bus1;
    public $measure3Desc, $idMeasure3, $savingMeas3_Annual_Bus1, $savingMeas3_Daily_Bus1;
    public $measure4Desc, $idMeasure4, $savingMeas4_Annual_Bus1, $savingMeas4_Daily_Bus1;
    public $measure5Desc, $idMeasure5, $savingMeas5_Annual_EnergySavedArea_Bus1, $savingMeas5_Daily_EnergySavedArea_Bus1,
                                       $savingMeas5_Annual_EnergySavedArea_Bus2, $savingMeas5_Daily_EnergySavedArea_Bus2;
    
    public $measuresDesc_SuccessCreated = [];
    public $city1, $zip1, $program1, $city2, $zip2, $program2, $county;
    public $statusesDefault           = ['not set',  'not set',  'not set', 'not set',  'not set',  'not set',  'not set',  'not set',  'not set',  'not set'];
    public $statusesFirst             = ['core',     'elective', 'core', 'elective',  'core', 'elective',  'core', 'elective',  'core', 'core'];
    public $checklistUrl1, $id_checklist1, $checklistUrl2, $id_checklist2;
    public $employeesCount1, $business1_P1, $id_business1_P1;
    public $employeesCount2, $business1_P2, $id_business1_P2;
    public $business2_P1, $id_business2_P1;
    public $todayDate;
    public $id_cardboardGV                 = '14';
    public $defaultValue_cardboardGV       = '-3.35';
    public $id_compostableGV               = '112';
    public $defaultValue_compostableGV     = '-0.2025';
    public $id_100recyclingGV              = '3';
    public $defaultValue_100recyclingGV    = '-0.062';
    public $id_mixed_recyclingGV           = '9';
    public $defaultValue_mixed_recyclingGV = '-2.86';
    public $id_cardboard_stateV, $id_compostable_P2V, $id_100recycling_stateV, $id_100recycling_P1V, $id_globVariable_stateV, $id_globVariable_P1V, $id_globVariable_P2V;
    
    public function Help_LoginAsNationalAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    public function Help_CreateState(Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StUpdGlobVars");
        $shortName = 'SR';
        
        $I->CreateState($name, $shortName);
    }
    
    public function Help_SelectDefaultState(AcceptanceTester $I)
    {
        $I->wait(2);
        $I->SelectDefaultState($I, $this->state);
    }
    
    //--------------------------Create audit subgroups--------------------------
    
    
    public function Help_CreateAuditSubGroupForEnergyGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name      = $this->audSubgroup1_Energy = $I->GenerateNameOf("EnAudSub1");
        $auditGroup = Page\AuditGroupList::Energy_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
//        $I->wait(3);
        $I->amOnPage(Page\AuditSubgroupList::URL());
//        $I->wait(2);
        $this->id_audSubgroup1_Energy = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    public function CreateGlobalVariable(Step\Acceptance\GlobalVariable $I)
    {
        $title                           = $this->globVariableTitle = $I->GenerateNameOf("GlobVar");
        $name                            = $this->globVariableName = $I->GenerateNameOf("gv_name");
        $value                           = $this->globVariableValue = '2.11';
                
//        $I->wait(1);
        $I->CreateGlobalVariable($title, $name, $value);
        $var = $I->GetGlobalVariableOnPageInList($title);
        $this->id_globVariable = $var['id'];
    }
    
    public function Help_UpdateGlobalVariablesToDefaultValues(\Step\Acceptance\GlobalVariable $I)
    {
        $id_cardboard          = $this->id_cardboardGV;
        $value_cardboard       = $this->defaultValue_cardboardGV;
        $id_compostable        = $this->id_compostableGV;
        $value_compostable     = $this->defaultValue_compostableGV;
        $id_100recycling       = $this->id_100recyclingGV;
        $value_100recycling    = $this->defaultValue_100recyclingGV;
        $id_mixed_recycling    = $this->id_mixed_recyclingGV;
        $value_mixed_recycling = $this->defaultValue_mixed_recyclingGV;
        
        $I->UpdateGlobalVariable($id_cardboard, null, null, $value_cardboard);
//        $I->wait(5);
        $I->waitForElement(\Page\GlobalVariableList::$GlobalVariableRow, 400);
        $I->UpdateGlobalVariable($id_compostable, null, null, $value_compostable);
//        $I->wait(5);
        $I->waitForElement(\Page\GlobalVariableList::$GlobalVariableRow, 400);
        $I->UpdateGlobalVariable($id_100recycling, null, null, $value_100recycling);
//        $I->wait(5);
        $I->waitForElement(\Page\GlobalVariableList::$GlobalVariableRow, 400);
        $I->UpdateGlobalVariable($id_mixed_recycling, null, null, $value_mixed_recycling);
//        $I->wait(5);
        $I->waitForElement(\Page\GlobalVariableList::$GlobalVariableRow, 400);
    }
    
    //------------------------------Create measures-----------------------------
    
    public function CreateMeasure1_Quant_Number(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure1Desc = $I->GenerateNameOf("Description_1 quant Number ");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['question1', 'question2'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
//        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Measure1_AddFormula(\Step\Acceptance\Measure $I) {
        $number    = '1';
        $variable1 = 'question1';
        $variable2 = 'question2';
        $variable3 = $this->globVariableTitle;
        
        $I->amOnPage(Page\MeasureUpdate::URL($this->idMeasure1));
//        $I->wait(4);
        $I->click(Page\MeasureUpdate::$ManageFormulasButton);
        $I->wait(7);
        $I->waitForElement(Page\MeasureFormulasPopup::$PopupForm, 60);
        $I->wait(4);
        $I->click(\Page\MeasureFormulasPopup::$AddSavingAreaButton);
        $I->wait(9);
        $I->selectOption(\Page\MeasureFormulasPopup::$SavingAreaSelect, \Page\SavingAreaList::Therms);
        $I->wait(3);
        $I->click(\Page\MeasureFormulasPopup::$AddButton);
        $I->wait(6);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->click(\Page\MeasureUpdate::$ManageFormulasButton);
        $I->wait(6);
        $I->waitForText("Measure Formulas", 150, \Page\MeasureFormulasPopup::$Title);
        $I->wait(2);
        $I->canSee(\Page\SavingAreaList::Therms, \Page\MeasureFormulasPopup::AreaLine($number));
        $I->click(\Page\MeasureFormulasPopup::EditFormulaButtonLine($number));
        $I->wait(4);
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
        $I->waitPageLoad();
        $I->canSee("$valVariable1+ $valVariable2* $valVariable3", Page\MeasureUpdate::FormulaForSavingArea(\Page\SavingAreaList::Therms));
    }
    
    public function Measure1_AddFormula2(\Step\Acceptance\Measure $I) {
        $number    = '2';
        $variable1 = 'Cardboard';
        $variable2 = 'question2';
        
        $I->amOnPage(Page\MeasureUpdate::URL($this->idMeasure1));
//        $I->wait(4);
        $I->click(Page\MeasureUpdate::$ManageFormulasButton);
        $I->wait(7);
        $I->waitForElement(Page\MeasureFormulasPopup::$PopupForm, 60);
        $I->wait(4);
        $I->click(\Page\MeasureFormulasPopup::$AddSavingAreaButton);
        $I->wait(9);
        $I->selectOption(\Page\MeasureFormulasPopup::$SavingAreaSelect, \Page\SavingAreaList::EnergySaved);
        $I->wait(3);
        $I->click(\Page\MeasureFormulasPopup::$AddButton);
        $I->wait(6);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->click(\Page\MeasureUpdate::$ManageFormulasButton);
        $I->wait(6);
        $I->waitForText("Measure Formulas", 150, \Page\MeasureFormulasPopup::$Title);
        $I->wait(2);
        $I->canSee(\Page\SavingAreaList::EnergySaved, \Page\MeasureFormulasPopup::AreaLine($number));
        $I->click(\Page\MeasureFormulasPopup::EditFormulaButtonLine($number));
        $I->wait(4);
        $valVariable1 = $I->grabAttributeFrom(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable1), 'data-val');
        $valVariable2 = $I->grabAttributeFrom(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable2), 'data-val');
        $I->click(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable1));
        $I->click(Page\MeasureFormulasPopup::MultiplyToolLinkLine($number));
        $I->click(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable2));
        $I->canSeeInField(Page\MeasureFormulasPopup::FormulaFieldLine($number), "$valVariable1* $valVariable2");
        $I->click(Page\MeasureFormulasPopup::SaveFormulaButtonLine($number));
        $I->wait(3);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee("$valVariable1* $valVariable2", Page\MeasureUpdate::FormulaForSavingArea(\Page\SavingAreaList::EnergySaved));
    }
    
    public function CreateMeasure2_Quant_WithoutSubmeasure(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure2Desc = $I->GenerateNameOf("Description_2 quant Without Submeasure ");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::WithoutSubmeasures_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
//        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure2 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Measure2_AddFormulaForThermsArea_Area1(\Step\Acceptance\Measure $I) {
        $number    = '1';
        $variable1 = $this->globVariableTitle;
        $variable2 = '100% recycled content paper';
        
        $I->amOnPage(Page\MeasureUpdate::URL($this->idMeasure2));
//        $I->wait(4);
        //--------------------------Therms Area---------------------------------
        $I->click(Page\MeasureUpdate::$ManageFormulasButton);
        $I->wait(7);
        $I->waitForText("Measure Formulas", 150, \Page\MeasureFormulasPopup::$Title);
//        $I->canSeeElement(\Page\MeasureFormulasPopup::$PopupForm);
        $I->wait(4);
        $I->click(\Page\MeasureFormulasPopup::$AddSavingAreaButton);
        $I->wait(9);
        $I->selectOption(\Page\MeasureFormulasPopup::$SavingAreaSelect, \Page\SavingAreaList::Therms);
        $I->wait(3);
        $I->click(\Page\MeasureFormulasPopup::$AddButton);
        $I->wait(6);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->click(\Page\MeasureUpdate::$ManageFormulasButton);
        $I->wait(6);
        $I->waitForText("Measure Formulas", 150, \Page\MeasureFormulasPopup::$Title);
        $I->wait(2);
        $I->canSee(\Page\SavingAreaList::Therms, \Page\MeasureFormulasPopup::AreaLine($number));
        $I->click(\Page\MeasureFormulasPopup::EditFormulaButtonLine($number));
        $I->wait(5);
        $valVariable1 = $I->grabAttributeFrom(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable1), 'data-val');
        $valVariable2 = $I->grabAttributeFrom(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable2), 'data-val');
        $I->click(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable1));
        $I->click(Page\MeasureFormulasPopup::DivideToolLinkLine($number));
        $I->click(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable2));
        $I->canSeeInField(Page\MeasureFormulasPopup::FormulaFieldLine($number), "$valVariable1/ $valVariable2");
        $I->click(Page\MeasureFormulasPopup::SaveFormulaButtonLine($number));
        $I->wait(5);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee("$valVariable1/ $valVariable2", Page\MeasureUpdate::FormulaForSavingArea(\Page\SavingAreaList::Therms));
    }
    
    
    public function Measure2_AddFormulaForEnergySaved_Area2(\Step\Acceptance\Measure $I) {
        $number    = '2';
        $variable1 = 'Compostables CO2 Conversation';
        
        $I->amOnPage(Page\MeasureUpdate::URL($this->idMeasure2));
//        $I->wait(4);
        //-----------------------Energy Saved Area------------------------------
        $I->click(Page\MeasureUpdate::$ManageFormulasButton);
        $I->wait(7);
        $I->waitForText("Measure Formulas", 150, \Page\MeasureFormulasPopup::$Title);
//        $I->canSeeElement(\Page\MeasureFormulasPopup::$PopupForm);
        $I->wait(4);
        $I->click(\Page\MeasureFormulasPopup::$AddSavingAreaButton);
        $I->wait(9);
        $I->selectOption(\Page\MeasureFormulasPopup::$SavingAreaSelect, \Page\SavingAreaList::EnergySaved);
        $I->wait(3);
        $I->click(\Page\MeasureFormulasPopup::$AddButton);
        $I->wait(6);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->click(\Page\MeasureUpdate::$ManageFormulasButton);
        $I->wait(6);
        $I->waitForText("Measure Formulas", 150, \Page\MeasureFormulasPopup::$Title);
        $I->wait(2);
        $I->canSee(\Page\SavingAreaList::EnergySaved, \Page\MeasureFormulasPopup::AreaLine($number));
        $I->click(\Page\MeasureFormulasPopup::EditFormulaButtonLine($number));
        $I->wait(5);
        $valVariable1 = $I->grabAttributeFrom(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable1), 'data-val');
        $I->click(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable1));
        $I->canSeeInField(Page\MeasureFormulasPopup::FormulaFieldLine($number), "$valVariable1");
        $I->click(Page\MeasureFormulasPopup::SaveFormulaButtonLine($number));
        $I->wait(3);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee("$valVariable1", Page\MeasureUpdate::FormulaForSavingArea(\Page\SavingAreaList::EnergySaved));
    }
    
    public function Measure2_AddFormulaForFuelSaved_Area3(\Step\Acceptance\Measure $I) {
        $number    = '3';
        $variable1 = 'Employees number';
        $variable2 = 'Compostables CO2 Conversation';
        
        $I->amOnPage(Page\MeasureUpdate::URL($this->idMeasure2));
//        $I->wait(4);
        //------------------------Fuel Saved Area-------------------------------
        $I->click(Page\MeasureUpdate::$ManageFormulasButton);
        $I->wait(7);
        $I->waitForText("Measure Formulas", 150, \Page\MeasureFormulasPopup::$Title);
//        $I->canSeeElement(\Page\MeasureFormulasPopup::$PopupForm);
        $I->wait(4);
        $I->click(\Page\MeasureFormulasPopup::$AddSavingAreaButton);
        $I->wait(9);
        $I->selectOption(\Page\MeasureFormulasPopup::$SavingAreaSelect, \Page\SavingAreaList::FuelSaved);
        $I->wait(3);
        $I->click(\Page\MeasureFormulasPopup::$AddButton);
        $I->wait(6);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->click(\Page\MeasureUpdate::$ManageFormulasButton);
        $I->wait(6);
        $I->waitForText("Measure Formulas", 150, \Page\MeasureFormulasPopup::$Title);
        $I->wait(2);
        $I->canSee(\Page\SavingAreaList::FuelSaved, \Page\MeasureFormulasPopup::AreaLine($number));
        $I->click(\Page\MeasureFormulasPopup::EditFormulaButtonLine($number));
        $I->wait(5);
        $valVariable1 = $I->grabAttributeFrom(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable1), 'data-val');
        $valVariable2 = $I->grabAttributeFrom(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable2), 'data-val');
        $I->click(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable1));
        $I->click(Page\MeasureFormulasPopup::PlusToolLinkLine($number));
        $I->click(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable2));
        $I->canSeeInField(Page\MeasureFormulasPopup::FormulaFieldLine($number), "$valVariable1+ $valVariable2");
        $I->click(Page\MeasureFormulasPopup::SaveFormulaButtonLine($number));
        $I->wait(5);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee("$valVariable1+ $valVariable2", Page\MeasureUpdate::FormulaForSavingArea(\Page\SavingAreaList::FuelSaved));
    }
    
    public function Measure2_AddFormulaForGreenhouseSaved_Area4(\Step\Acceptance\Measure $I) {
        $number    = '4';
        $variable1 = 'Cardboard';
        
        $I->amOnPage(Page\MeasureUpdate::URL($this->idMeasure2));
//        $I->wait(4);
        //-----------------------Energy Saved Area------------------------------
        $I->click(Page\MeasureUpdate::$ManageFormulasButton);
        $I->wait(7);
        $I->waitForText("Measure Formulas", 150, \Page\MeasureFormulasPopup::$Title);
//        $I->canSeeElement(\Page\MeasureFormulasPopup::$PopupForm);
        $I->wait(4);
        $I->click(\Page\MeasureFormulasPopup::$AddSavingAreaButton);
        $I->wait(9);
        $I->selectOption(\Page\MeasureFormulasPopup::$SavingAreaSelect, \Page\SavingAreaList::GreenhouseGasEmissionsSaved);
        $I->wait(3);
        $I->click(\Page\MeasureFormulasPopup::$AddButton);
        $I->wait(6);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->click(\Page\MeasureUpdate::$ManageFormulasButton);
        $I->wait(6);
        $I->waitForText("Measure Formulas", 150, \Page\MeasureFormulasPopup::$Title);
        $I->wait(2);
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved, \Page\MeasureFormulasPopup::AreaLine($number));
        $I->click(\Page\MeasureFormulasPopup::EditFormulaButtonLine($number));
        $I->wait(5);
        $valVariable1 = $I->grabAttributeFrom(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable1), 'data-val');
        $I->click(Page\MeasureFormulasPopup::VariableOptToolLinkLine_ByVariableName($number, $variable1));
        $I->canSeeInField(Page\MeasureFormulasPopup::FormulaFieldLine($number), "$valVariable1");
        $I->click(Page\MeasureFormulasPopup::SaveFormulaButtonLine($number));
        $I->wait(3);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSee("$valVariable1", Page\MeasureUpdate::FormulaForSavingArea(\Page\SavingAreaList::GreenhouseGasEmissionsSaved));
    }
    
    public function CreateMeasure3_Quant_MultipleQuestionAndNumberSubmeasure(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure3Desc = $I->GenerateNameOf("Description_3 quant Multiple Quest & Number Submeasure ");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::MultipleQuestionAndNumber_QuantitativeSubmeasure;
        $questions      = ['What?', "Where?", "Who?"];
        $answers        = ['Grey', 'Green', 'Red'];
        $reamOrLbs      = ['lbs', 'ream', "ream"];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers, null, null, null, null, null, null, null, null, $reamOrLbs);
//        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure3 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Measure3_AddGlobalVariablesToOptions_MeasureFormula(\Step\Acceptance\Measure $I) {
        $questions      = ['What?', "Where?", "Who?"];
        $answers        = ['Grey', 'Green', 'Red'];
        
        $I->amOnPage(Page\MeasureUpdate::URL($this->idMeasure3));
//        $I->wait(4);
        $I->click(Page\MeasureUpdate::$ManageFormulasButton);
        $I->wait(6);
        $I->waitForText("Measure Formulas", 100, \Page\MeasureFormulasPopup::$Title);
//        $I->canSeeElement(\Page\MeasureFormulasPopup::$PopupForm);
        $I->wait(2);
        $I->selectOption(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[0], $answers[0]), '100% recycled content paper');
        $I->selectOption(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[0], $answers[1]), '100% recycled content paper');
        $I->selectOption(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[0], $answers[2]), '100% recycled content paper');
        $I->selectOption(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[1], $answers[0]), 'Cardboard');
        $I->selectOption(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[1], $answers[1]), 'Cardboard');
        $I->selectOption(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[1], $answers[2]), 'Cardboard');
        $I->selectOption(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[2], $answers[0]), 'Compostables CO2 Conversation');
        $I->selectOption(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[2], $answers[1]), 'Compostables CO2 Conversation');
        $I->selectOption(\Page\MeasureFormulasPopup::GlobalVariableSelectLine_ByQuestionAndNumber($questions[2], $answers[2]), 'Compostables CO2 Conversation');
        $I->click(Page\MeasureFormulasPopup::$SaveButton);
        $I->wait(5);
    }
    
    public function CreateMeasure4_Quant_WasteDiversionPopup(\Step\Acceptance\Measure $I) {
        $desc            = $this->measure4Desc = $I->GenerateNameOf("Description_4 quant Waste Diversion Popup Submeasure ");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'yes';
        $submeasureType  = \Step\Acceptance\Measure::PopupWasteDivertion_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(1);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure4 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function CreateMeasure5_Quant_WasteDiversionPopup(\Step\Acceptance\Measure $I) {
        $desc            = $this->measure5Desc = $I->GenerateNameOf("Description_5 quant Waste Diversion Popup 2 Submeasure ");
        $auditGroup      = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup   = $this->audSubgroup1_Energy;
        $quantitative    = 'yes';
        $submeasureType  = \Step\Acceptance\Measure::PopupWasteDivertion_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(1);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->canSee(Page\MeasureList::CreateTipButtonName, Page\MeasureList::CreateTipButtonLine_ByDescValue($desc)); 
        $this->idMeasure5 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    //-------------------------------Create county------------------------------
    
    public function Help_CreateCounty(\Step\Acceptance\County $I) {
        $name    = $this->county = $I->GenerateNameOf("County");
        $state   = $this->state;
        
        $I->CreateCounty($name, $state);
    }
    
    //--------------------------Create city and program-------------------------
    
    public function Help_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city1 = $I->GenerateNameOf("CityUpVar1");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip1 = $I->GenerateZipCode();
        $program = $this->program1 = $I->GenerateNameOf("ProgUpVar1");
        $county  = $this->county;
        
        $I->CreateCity($city, $state, $zips, $county);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    //--------------------------Create city and program-------------------------
    
    public function Help_CreateCity2_And_Program2(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city2 = $I->GenerateNameOf("CityUpVar2");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip2 = $I->GenerateZipCode();
        $program = $this->program2 = $I->GenerateNameOf("ProgUpVar2");
        $county  = $this->county;
        
        $I->CreateCity($city, $state, $zips, $county);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    //----------------------------Create checklist------------------------------
    
//    public function Help_CreateChecklistForTier2_Program1(\Step\Acceptance\Checklist $I) {
//        $sourceProgram      = $this->program1;
//        $programDestination = $this->program1;
//        $sectorDestination  = 'Office / Retail';
//        $tier               = '2';
//        $descs              = $this->measuresDesc_SuccessCreated;
//        
//        $this->id_checklist1 = $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
//        $I->ManageChecklist($descs, $this->statusesFirst);
//        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_checklist1));
//        $I->PublishChecklistStatus($this->id_checklist1);
//    }
//    
//    public function Help_CreateChecklistForTier2_Program2(\Step\Acceptance\Checklist $I) {
//        $sourceProgram      = $this->program2;
//        $programDestination = $this->program2;
//        $sectorDestination  = 'Office / Retail';
//        $tier               = '2';
//        $descs              = $this->measuresDesc_SuccessCreated;
//        
//        $this->id_checklist2 = $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
//        $I->ManageChecklist($descs, $this->statusesFirst);
//        $I->amOnPage(Page\ChecklistManage::URL_VersionTab($this->id_checklist2));
//        $I->PublishChecklistStatus($this->id_checklist2);
//    }
//    
    //----------------------Create Sector Checklist Tier2-----------------------
    
    public function SectorChecklistCreate(\Step\Acceptance\SectorChecklist $I)
    {
        $number           = '2';
        $sector           = \Page\SectorList::DefaultSectorOfficeRetail;
               
        $I->CreateSectorChecklist($number, $sector);
        $I->ManageSectorChecklist($this->measuresDesc_SuccessCreated, $this->statusesFirst);
        $I->PublishSectorChecklistStatus();
    }
    
    public function ActivateSectorForPrograms(\Step\Acceptance\Checklist $I) {
        $program1           = $this->program1;
        $program2           = $this->program2;
        $sector             = \Page\SectorList::DefaultSectorOfficeRetail;
        
        $I->amOnPage(\Page\SectorsManage::URL());
        $I->selectOption(\Page\SectorsManage::$FilterBySectorSelect, $sector);
        $I->click(\Page\SectorsManage::$FilterButton);
        $I->wait(2);
        $I->waitPageLoad();
        $I->cantSeeElement(\Page\SectorsManage::ToggleButtonLine_ByNameValue($program1, $sector));
        $I->cantSeeElement(\Page\SectorsManage::ToggleButtonLine_ByNameValue($program2, $sector));
        $I->wait(1);
        $I->amOnPage(Page\ChecklistList::URL());
        $I->canSeeElement(\Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($program1, $sector, 'Tier 2'));
        $I->canSeeElement(\Page\ChecklistList::VersionStatus_ByProg_Sect_Tier_Line($program2, $sector, 'Tier 2'));
    }
    
    public function Help_LogOut(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function Business1_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email1 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password = 'Qq!1111111';
        $busName          = $this->business1_P1 = $I->GenerateNameOf("busnam1_P1");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip1;
        $city             = $this->city1;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = $this->employeesCount1 ='121';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(13);
    }
    
    public function Business1_CompleteMeasure1(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
        $value1   = '10';
        $value2   = '15';
                
//        $I->wait(1);
        $I->comment("Complete Measure1 and save.");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(4);
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
        $I->wait(2);
        $I->waitPageLoad();
    }
    
    public function Business1_CompleteMeasure2(AcceptanceTester $I) {
        $measDesc = $this->measure2Desc;
                
//        $I->wait(1);
        $I->comment("Complete Measure2 and save.");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(4);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure2]"], $style = 'visibility');
        $I->wait(3);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
    }
    
    public function Business1_CompleteMeasure3(AcceptanceTester $I) {
        $measDesc = $this->measure3Desc;
        $value1   = '5';
        $value2   = '6';
        $value3   = '1';
        $option1  = 'Green';
        $option2  = 'Red';
        $option3  = 'Green';
                
//        $I->wait(1);
        $I->comment("Complete Measure3 and save.");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(4);
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
        $I->wait(2);
        $I->waitPageLoad();
    }
    
    public function Business1_CompleteMeasure4(AcceptanceTester $I) {
        $measDesc = $this->measure4Desc;
        $before   = 'before';
        $after    = 'after';
        
//        $I->wait(1);
        $I->comment("Complete Measure4 fand save.");
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(4);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure4]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(2);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(3);
        $I->makeElementVisible(["[data-measure_id=$this->idMeasure4]"], $style = 'visibility');
        $I->wait(3);
        $I->selectOption(\Page\RegistrationStarted::SubmeasureToggleButton_3Items_ByMeasureDesc($measDesc, '1'), 'yes');
        $I->wait(3);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(2);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure4]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(2);
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
        $I->selectOption(\Page\RegistrationStarted::WasteDiversionPopup_CommoditySelect('2', $before), 'Mixed Recycling');
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::WasteDiversionPopup_ContainerTypeSelect('2', $before), 'WHEELIE BIN');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::WasteDiversionPopup_ContainersField('2', $before), '4');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::WasteDiversionPopup_CollectionPerWeekField('2', $before), '9');
        $I->wait(1);
        
        $I->click(\Page\RegistrationStarted::$WasteDiversionPopup_AfterGBTab);
        $I->wait(2);
        
        $I->selectOption(\Page\RegistrationStarted::WasteDiversionPopup_ContainerTypeSelect('1', $after), 'CARRY BIN');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::WasteDiversionPopup_ContainersField('1', $after), '4');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::WasteDiversionPopup_CollectionPerWeekField('1', $after), '10');
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::WasteDiversionPopup_CompactedToggleButton('1', $after));
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::WasteDiversionPopup_ContainerTypeSelect('2', $after), 'DUMPSTER');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::WasteDiversionPopup_ContainersField('2', $after), '6');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::WasteDiversionPopup_CollectionPerWeekField('2', $after), '5');
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::WasteDiversionPopup_CompactedToggleButton('2', $after));
        $I->wait(1);
        
        $I->click(\Page\RegistrationStarted::WasteDiversionPopup_SaveChangesButton($after));
        $I->wait(2);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
    }
    
    public function Business1_CompleteMeasure5_Yes_NAonSubmeasure(AcceptanceTester $I) {
        $measDesc = $this->measure5Desc;
        $paper    = '15';
        $bottles  = '26';
        $compost  = '16';
        
//        $I->wait(1);
        $I->comment("Complete Measure5 fand save.");
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure5]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(2);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(3);
        $I->click(Page\RegistrationStarted::SubmeasureLink_ByMeasureDesc($measDesc, '1'));
        $I->wait(15);
        $I->executeJS('$(".modal.in [name=all_paper_percent]").val("15");'); 
        $I->wait(2);
        $I->executeJS('$(".modal.in [name=bottles_cans_percent]").val("26");'); 
        $I->wait(2);
        $I->executeJS('$(".modal.in [name=compost_percent]").val("16");'); 
        $I->wait(2);
        $I->click(\Page\RegistrationStarted::$WasteDiversionPopup_NO_SaveButton);
        $I->wait(3);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
    }
    
    public function Help_LogOut2(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(1);
        $I->LogIn_TRUEorFALSE($I);
//        $I->wait(2);
        $I->Logout($I);
    }
    
    public function Help_Business2Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email2 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business1_P2 = $I->GenerateNameOf("busnam1_P2");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip2;
        $city             = $this->city2;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = $this->employeesCount2 = '121';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(12);
    }
    
    public function Business2_CompleteMeasure1(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
        $value1   = '10';
        $value2   = '15';
                
//        $I->wait(1);
        $I->comment("Complete Measure1 and save.");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(4);
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
        $I->wait(2);
        $I->waitPageLoad();
    }
    
    public function Business2_CompleteMeasure2(AcceptanceTester $I) {
        $measDesc = $this->measure2Desc;
                
//        $I->wait(1);
        $I->comment("Complete Measure2 and save.");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(4);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure2]"], $style = 'visibility');
        $I->wait(3);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
    }
    
    public function Business2_CompleteMeasure3(AcceptanceTester $I) {
        $measDesc = $this->measure3Desc;
        $value1   = '5';
        $value2   = '6';
        $value3   = '1';
        $option1  = 'Green';
        $option2  = 'Red';
        $option3  = 'Grey';
                
//        $I->wait(1);
        $I->comment("Complete Measure3 and save.");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(4);
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
        $I->wait(2);
        $I->waitPageLoad();
    }
    
    public function Business2_CompleteMeasure4(AcceptanceTester $I) {
        $measDesc = $this->measure4Desc;
        $before   = 'before';
        $after    = 'after';
        
//        $I->wait(1);
        $I->comment("Complete Measure4 fand save.");
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(4);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure4]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(2);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(3);
        $I->makeElementVisible(["[data-measure_id=$this->idMeasure4]"], $style = 'visibility');
        $I->wait(3);
        $I->selectOption(\Page\RegistrationStarted::SubmeasureToggleButton_3Items_ByMeasureDesc($measDesc, '1'), 'yes');
        $I->wait(3);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(2);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(6);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure4]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(2);
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
        $I->selectOption(\Page\RegistrationStarted::WasteDiversionPopup_CommoditySelect('2', $before), 'Mixed Recycling');
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::WasteDiversionPopup_ContainerTypeSelect('2', $before), 'WHEELIE BIN');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::WasteDiversionPopup_ContainersField('2', $before), '4');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::WasteDiversionPopup_CollectionPerWeekField('2', $before), '9');
        $I->wait(1);
        
        $I->click(\Page\RegistrationStarted::$WasteDiversionPopup_AfterGBTab);
        $I->wait(2);
        
        $I->selectOption(\Page\RegistrationStarted::WasteDiversionPopup_ContainerTypeSelect('1', $after), 'CARRY BIN');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::WasteDiversionPopup_ContainersField('1', $after), '4');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::WasteDiversionPopup_CollectionPerWeekField('1', $after), '10');
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::WasteDiversionPopup_CompactedToggleButton('1', $after));
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::WasteDiversionPopup_ContainerTypeSelect('2', $after), 'DUMPSTER');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::WasteDiversionPopup_ContainersField('2', $after), '6');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::WasteDiversionPopup_CollectionPerWeekField('2', $after), '5');
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::WasteDiversionPopup_CompactedToggleButton('2', $after));
        $I->wait(1);
        
        $I->click(\Page\RegistrationStarted::WasteDiversionPopup_SaveChangesButton($after));
        $I->wait(2);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
    }
    
    public function Business2_CompleteMeasure5_Yes_NAonSubmeasure(AcceptanceTester $I) {
        $measDesc = $this->measure5Desc;
        $paper    = '15';
        $bottles  = '26';
        $compost  = '16';
        
//        $I->wait(1);
        $I->comment("Complete Measure5 fand save.");
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure5]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(2);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(3);
        $I->click(Page\RegistrationStarted::SubmeasureLink_ByMeasureDesc($measDesc, '1'));
        $I->wait(15);
        $I->executeJS('$(".modal.in [name=all_paper_percent]").val("15");'); 
        $I->wait(2);
        $I->executeJS('$(".modal.in [name=bottles_cans_percent]").val("26");'); 
        $I->wait(2);
        $I->executeJS('$(".modal.in [name=compost_percent]").val("16");'); 
        $I->wait(2);
        $I->click(\Page\RegistrationStarted::$WasteDiversionPopup_NO_SaveButton);
        $I->wait(3);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
    }
    
    public function Help_LogOut1(AcceptanceTester $I) {
        $I->reloadPage();
        $I->waitPageLoad();
        $I->LogIn_TRUEorFALSE($I);
//        $I->wait(2);
        $I->Logout($I);
//        $I->wait(1);
        $I->LoginAsAdmin($I);
    }
    
    public function GetBusiness1ID(AcceptanceTester $I) {
        $url1 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business1_P1), 'href');
        $I->comment("Url1: $url1");
        $u1 = explode('=', $url1);
        $this->id_business1_P1 = $u1[1];
        $I->comment("Business1 id: $this->id_business1_P1.");
    }
    
    public function GetBusiness2ID(AcceptanceTester $I) {
        $url2 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business1_P2), 'href');
        $I->comment("Url2: $url2");
        $u2 = explode('=', $url2);
        $this->id_business1_P2 = $u2[1];
        $I->comment("Business2 id: $this->id_business1_P2.");
    }
    
    public function Check_Measure1_Savings_Business1(AcceptanceTester $I) {
        $measDesc           = $this->measure1Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::EnergySaved.":\nannual: -50.25 kWh\ndaily: -0.137671232877 kWh", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: 41.65 therms of natural gas per year\ndaily: 0.114109589041 therms of natural gas per year", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure2_Savings_Business1(AcceptanceTester $I) {
        $measDesc           = $this->measure2Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved.":\nannual: -3.35 lbs of CO2\ndaily: -0.00917808219178 lbs of CO2", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::EnergySaved.":\nannual: -0.2025 kWh\ndaily: -0.000554794520548 kWh", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::FuelSaved.":\nannual: 120.7975 gallons of fuel\ndaily: 0.330952054795 gallons of fuel", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: -34.0322580645 therms of natural gas per year\ndaily: -0.0932390631905 therms of natural gas per year", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure3_Savings_Business1(AcceptanceTester $I) {
        $measDesc           = $this->measure3Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved.":\nannual: -101.8225 lbs of CO2\ndaily: -0.278965753425 lbs of CO2", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure4_Savings_Business1(AcceptanceTester $I) {
        $measDesc           = $this->measure4Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: 1327927.08058 lbs of waste\ndaily: 3638.15638516 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure5_Savings_Business1(AcceptanceTester $I) {
        $measDesc           = $this->measure5Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: -1537.29655324 lbs of waste\ndaily: -4.21177137874 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure1_Savings_Business2(AcceptanceTester $I) {
        $measDesc           = $this->measure1Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P2, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::EnergySaved.":\nannual: -50.25 kWh\ndaily: -0.137671232877 kWh", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: 41.65 therms of natural gas per year\ndaily: 0.114109589041 therms of natural gas per year", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure2_Savings_Business2(AcceptanceTester $I) {
        $measDesc           = $this->measure2Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P2, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved.":\nannual: -3.35 lbs of CO2\ndaily: -0.00917808219178 lbs of CO2", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::EnergySaved.":\nannual: -0.2025 kWh\ndaily: -0.000554794520548 kWh", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::FuelSaved.":\nannual: 120.7975 gallons of fuel\ndaily: 0.330952054795 gallons of fuel", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: -34.0322580645 therms of natural gas per year\ndaily: -0.0932390631905 therms of natural gas per year", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure3_Savings_Business2(AcceptanceTester $I) {
        $measDesc           = $this->measure3Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P2, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved.":\nannual: -101.8225 lbs of CO2\ndaily: -0.278965753425 lbs of CO2", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure4_Savings_Business2(AcceptanceTester $I) {
        $measDesc           = $this->measure4Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P2, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: 1327927.08058 lbs of waste\ndaily: 3638.15638516 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure5_Savings_Business2(AcceptanceTester $I) {
        $measDesc           = $this->measure5Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P2, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: -1537.29655324 lbs of waste\ndaily: -4.21177137874 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Cardboard_UpdateGlobalVariable(\Step\Acceptance\GlobalVariable $I)
    {
        $id_cardboard          = $this->id_cardboardGV;
        $value_cardboard       = '3.35';
        
        $I->UpdateGlobalVariable($id_cardboard, null, null, $value_cardboard);
//        $I->wait(5);
        $I->waitForElement(\Page\GlobalVariableList::$GlobalVariableRow, 150);
    }
    
    public function Compostable_UpdateGlobalVariable(\Step\Acceptance\GlobalVariable $I)
    {
        $id_cardboard          = $this->id_compostableGV;
        $value_cardboard       = '1';
        
        $I->UpdateGlobalVariable($id_cardboard, null, null, $value_cardboard);
//        $I->wait(5);
        $I->waitForElement(\Page\GlobalVariableList::$GlobalVariableRow, 150);
    }
    
    public function Check_Measure1_Savings_Business1_AfterGVUpdating1(AcceptanceTester $I) {
        $measDesc           = $this->measure1Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::EnergySaved.":\nannual: 50.25 kWh\ndaily: 0.137671232877 kWh", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: 41.65 therms of natural gas per year\ndaily: 0.114109589041 therms of natural gas per year", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure2_Savings_Business1_AfterGVUpdating1(AcceptanceTester $I) {
        $measDesc           = $this->measure2Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved.":\nannual: 3.35 lbs of CO2\ndaily: 0.00917808219178 lbs of CO2", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::EnergySaved.":\nannual: 1 kWh\ndaily: 0.0027397260274 kWh", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::FuelSaved.":\nannual: 122 gallons of fuel\ndaily: 0.334246575342 gallons of fuel", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: -34.0322580645 therms of natural gas per year\ndaily: -0.0932390631905 therms of natural gas per year", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure3_Savings_Business1_AfterGVUpdating1(AcceptanceTester $I) {
        $measDesc           = $this->measure3Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved.":\nannual: 105.19 lbs of CO2\ndaily: 0.288191780822 lbs of CO2", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure4_Savings_Business1_AfterGVUpdating1(AcceptanceTester $I) {
        $measDesc           = $this->measure4Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: 1327927.08058 lbs of waste\ndaily: 3638.15638516 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure5_Savings_Business1_AfterGVUpdating1(AcceptanceTester $I) {
        $measDesc           = $this->measure5Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: 6995.39083999 lbs of waste\ndaily: 19.1654543561 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure1_Savings_Business2_AfterGVUpdating1(AcceptanceTester $I) {
        $measDesc           = $this->measure1Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P2, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::EnergySaved.":\nannual: 50.25 kWh\ndaily: 0.137671232877 kWh", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: 41.65 therms of natural gas per year\ndaily: 0.114109589041 therms of natural gas per year", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure2_Savings_Business2_AfterGVUpdating1(AcceptanceTester $I) {
        $measDesc           = $this->measure2Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P2, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved.":\nannual: 3.35 lbs of CO2\ndaily: 0.00917808219178 lbs of CO2", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::EnergySaved.":\nannual: 1 kWh\ndaily: 0.0027397260274 kWh", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::FuelSaved.":\nannual: 122 gallons of fuel\ndaily: 0.334246575342 gallons of fuel", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: -34.0322580645 therms of natural gas per year\ndaily: -0.0932390631905 therms of natural gas per year", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure3_Savings_Business2_AfterGVUpdating1(AcceptanceTester $I) {
        $measDesc           = $this->measure3Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P2, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved.":\nannual: 105.19 lbs of CO2\ndaily: 0.288191780822 lbs of CO2", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure4_Savings_Business2_AfterGVUpdating1(AcceptanceTester $I) {
        $measDesc           = $this->measure4Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P2, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: 1327927.08058 lbs of waste\ndaily: 3638.15638516 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure5_Savings_Business2_AfterGVUpdating1(AcceptanceTester $I) {
        $measDesc           = $this->measure5Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P2, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: 6995.39083999 lbs of waste\ndaily: 19.1654543561 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Cardboard_GlobalVariableOverride_ForState(\Step\Acceptance\GlobalVariable $I)
    {
        $value            = '2';
        $targetType       = 'State';
        $targetId         = $this->state;
                
//        $I->wait(1);
        $I->amOnPage(\Page\GlobalVariableUpdate::URL($this->id_cardboardGV));
//        $I->wait(2);
        $I->click(\Page\GlobalVariableUpdate::$OverrideButton);
        $I->wait(5);
        $I->OverrideGlobalVariable(null, null, $value, $targetType, $targetId);
//        $I->wait(5);
        $this->id_cardboard_stateV = $I->GetGlobalVariableIdFromUrl($I);
    }
    
    public function Recycling100_GlobalVariableOverride_ForProgram1(\Step\Acceptance\GlobalVariable $I)
    {
        $value            = '8';
        $targetType       = 'Program';
        $targetId         = $this->program1;
                
//        $I->wait(1);
        $I->amOnPage(\Page\GlobalVariableUpdate::URL($this->id_100recyclingGV));
//        $I->wait(2);
        $I->click(\Page\GlobalVariableUpdate::$OverrideButton);
        $I->wait(5);
        $I->OverrideGlobalVariable(null, null, $value, $targetType, $targetId);
//        $I->wait(5);
        $this->id_100recycling_P1V = $I->GetGlobalVariableIdFromUrl($I);
    }
    
    public function Recycling100_GlobalVariableOverride_ForState(\Step\Acceptance\GlobalVariable $I)
    {
        $value            = '0.33';
        $targetType       = 'State';
        $targetId         = $this->state;
                
//        $I->wait(1);
        $I->amOnPage(\Page\GlobalVariableUpdate::URL($this->id_100recyclingGV));
//        $I->wait(2);
        $I->click(\Page\GlobalVariableUpdate::$OverrideButton);
        $I->wait(5);
        $I->OverrideGlobalVariable(null, null, $value, $targetType, $targetId);
//        $I->wait(5);
        $this->id_100recycling_stateV = $I->GetGlobalVariableIdFromUrl($I);
    }
    
    public function Compostable_GlobalVariableOverride_ForProgram2(\Step\Acceptance\GlobalVariable $I)
    {
        $value            = '11';
        $targetType       = 'Program';
        $targetId         = $this->program2;
                
//        $I->wait(1);
        $I->amOnPage(\Page\GlobalVariableUpdate::URL($this->id_compostableGV));
//        $I->wait(2);
        $I->click(\Page\GlobalVariableUpdate::$OverrideButton);
        $I->wait(5);
        $I->OverrideGlobalVariable(null, null, $value, $targetType, $targetId);
//        $I->wait(5);
        $this->id_compostable_P2V = $I->GetGlobalVariableIdFromUrl($I);
    }
    
    public function NewVariable_GlobalVariableOverride_ForState(\Step\Acceptance\GlobalVariable $I)
    {
        $value            = '0.1';
        $targetType       = 'State';
        $targetId         = $this->state;
                
//        $I->wait(1);
        $I->amOnPage(\Page\GlobalVariableUpdate::URL($this->id_globVariable));
//        $I->wait(2);
        $I->click(\Page\GlobalVariableUpdate::$OverrideButton);
        $I->wait(5);
        $I->OverrideGlobalVariable(null, null, $value, $targetType, $targetId);
//        $I->wait(5);
        $this->id_globVariable_stateV = $I->GetGlobalVariableIdFromUrl($I);
    }
    
    public function NewVariable_GlobalVariableOverride_ForProgram1(\Step\Acceptance\GlobalVariable $I)
    {
        $value            = '-3';
        $targetType       = 'Program';
        $targetId         = $this->program1;
                
//        $I->wait(1);
        $I->amOnPage(\Page\GlobalVariableUpdate::URL($this->id_globVariable));
//        $I->wait(2);
        $I->click(\Page\GlobalVariableUpdate::$OverrideButton);
        $I->wait(5);
        $I->OverrideGlobalVariable(null, null, $value, $targetType, $targetId);
//        $I->wait(5);
        $this->id_globVariable_P1V = $I->GetGlobalVariableIdFromUrl($I);
    }
    
    public function NewVariable_GlobalVariableOverride_ForProgram2(\Step\Acceptance\GlobalVariable $I)
    {
        $value            = '-0.2';
        $targetType       = 'Program';
        $targetId         = $this->program2;
                
//        $I->wait(1);
        $I->amOnPage(\Page\GlobalVariableUpdate::URL($this->id_globVariable));
//        $I->wait(2);
        $I->click(\Page\GlobalVariableUpdate::$OverrideButton);
        $I->wait(5);
        $I->OverrideGlobalVariable(null, null, $value, $targetType, $targetId);
//        $I->wait(5);
        $this->id_globVariable_P2V = $I->GetGlobalVariableIdFromUrl($I);
    }
    
    public function Check_Measure1_Savings_Business1_AfterGVUpdating2(AcceptanceTester $I) {
        $measDesc           = $this->measure1Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::EnergySaved.":\nannual: 30 kWh\ndaily: 0.0821917808219 kWh", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: -35 therms of natural gas per year\ndaily: -0.0958904109589 therms of natural gas per year", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure2_Savings_Business1_AfterGVUpdating2(AcceptanceTester $I) {
        $measDesc           = $this->measure2Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved.":\nannual: 2 lbs of CO2\ndaily: 0.00547945205479 lbs of CO2", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::EnergySaved.":\nannual: 1 kWh\ndaily: 0.0027397260274 kWh", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::FuelSaved.":\nannual: 122 gallons of fuel\ndaily: 0.334246575342 gallons of fuel", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: -0.375 therms of natural gas per year\ndaily: -0.00102739726027 therms of natural gas per year", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure3_Savings_Business1_AfterGVUpdating2(AcceptanceTester $I) {
        $measDesc           = $this->measure3Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved.":\nannual: 105 lbs of CO2\ndaily: 0.287671232877 lbs of CO2", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure4_Savings_Business1_AfterGVUpdating2(AcceptanceTester $I) {
        $measDesc           = $this->measure4Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: 1327927.08058 lbs of waste\ndaily: 3638.15638516 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure5_Savings_Business1_AfterGVUpdating2(AcceptanceTester $I) {
        $measDesc           = $this->measure5Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: 6995.39083999 lbs of waste\ndaily: 19.1654543561 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure1_Savings_Business2_AfterGVUpdating2(AcceptanceTester $I) {
        $measDesc           = $this->measure1Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P2, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::EnergySaved.":\nannual: 30 kWh\ndaily: 0.0821917808219 kWh", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: 7 therms of natural gas per year\ndaily: 0.0191780821918 therms of natural gas per year", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure2_Savings_Business2_AfterGVUpdating2(AcceptanceTester $I) {
        $measDesc           = $this->measure2Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P2, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved.":\nannual: 2 lbs of CO2\ndaily: 0.00547945205479 lbs of CO2", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::EnergySaved.":\nannual: 11 kWh\ndaily: 0.0301369863014 kWh", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::FuelSaved.":\nannual: 132 gallons of fuel\ndaily: 0.361643835616 gallons of fuel", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: -0.606060606061 therms of natural gas per year\ndaily: -0.0016604400166 therms of natural gas per year", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure3_Savings_Business2_AfterGVUpdating2(AcceptanceTester $I) {
        $measDesc           = $this->measure3Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P2, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved.":\nannual: 116.65 lbs of CO2\ndaily: 0.319589041096 lbs of CO2", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure4_Savings_Business2_AfterGVUpdating2(AcceptanceTester $I) {
        $measDesc           = $this->measure4Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P2, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: 1327927.08058 lbs of waste\ndaily: 3638.15638516 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure5_Savings_Business2_AfterGVUpdating2(AcceptanceTester $I) {
        $measDesc           = $this->measure5Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P2, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: 77953.29016 lbs of waste\ndaily: 213.570657973 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Cardboard_SV_UpdateOverriddedVariable(\Step\Acceptance\GlobalVariable $I)
    {
        $id_cardboard          = $this->id_cardboard_stateV;
        $value_cardboard       = '10';
        
        $I->UpdateGlobalVariable($id_cardboard, null, null, $value_cardboard);
//        $I->wait(5);
        $I->waitForElement(\Page\GlobalVariableList::$GlobalVariableRow, 150);
    }
    
    public function Compostable_P2V_UpdateOverriddedVariable(\Step\Acceptance\GlobalVariable $I)
    {
        $id_cardboard          = $this->id_compostable_P2V;
        $value_cardboard       = '3';
        
        $I->UpdateGlobalVariable($id_cardboard, null, null, $value_cardboard);
//        $I->wait(5);
        $I->waitForElement(\Page\GlobalVariableList::$GlobalVariableRow, 150);
    }
    
    public function New_SV_UpdateOverriddedVariable(\Step\Acceptance\GlobalVariable $I)
    {
        $id_cardboard          = $this->id_globVariable_stateV;
        $value_cardboard       = '-4';
        
        $I->UpdateGlobalVariable($id_cardboard, null, null, $value_cardboard);
//        $I->wait(5);
        $I->waitForElement(\Page\GlobalVariableList::$GlobalVariableRow, 150);
    }
    
    public function Help_LogOut3(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(1);
        $I->LogIn_TRUEorFALSE($I);
//        $I->wait(2);
        $I->Logout($I);
    }
    
    public function Help_Business3Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
        $busName          = $this->business2_P1 = $I->GenerateNameOf("busnam2_P1");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip1;
        $city             = $this->city1;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = $this->employeesCount2 = '121';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(12);
    }
    
    public function Business3_CompleteMeasure1(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
        $value1   = '10';
        $value2   = '15';
                
//        $I->wait(1);
        $I->comment("Complete Measure1 and save.");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(4);
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
        $I->wait(2);
        $I->waitPageLoad();
    }
    
    public function Business3_CompleteMeasure2(AcceptanceTester $I) {
        $measDesc = $this->measure2Desc;
                
//        $I->wait(1);
        $I->comment("Complete Measure2 and save.");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(4);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure2]"], $style = 'visibility');
        $I->wait(3);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
    }
    
    public function Business3_CompleteMeasure3(AcceptanceTester $I) {
        $measDesc = $this->measure3Desc;
        $value1   = '5';
        $value2   = '6';
        $value3   = '1';
        $option1  = 'Green';
        $option2  = 'Red';
        $option3  = 'Grey';
                
//        $I->wait(1);
        $I->comment("Complete Measure3 and save.");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(4);
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
        $I->wait(2);
        $I->waitPageLoad();
    }
    
    public function Business3_CompleteMeasure4(AcceptanceTester $I) {
        $measDesc = $this->measure4Desc;
        $before   = 'before';
        $after    = 'after';
        
//        $I->wait(1);
        $I->comment("Complete Measure4 fand save.");
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(4);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure4]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(2);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(3);
        $I->makeElementVisible(["[data-measure_id=$this->idMeasure4]"], $style = 'visibility');
        $I->wait(3);
        $I->selectOption(\Page\RegistrationStarted::SubmeasureToggleButton_3Items_ByMeasureDesc($measDesc, '1'), 'yes');
        $I->wait(3);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(2);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->waitPageLoad();
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure4]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(2);
        $I->click(Page\RegistrationStarted::SubmeasureLink_ByMeasureDesc($measDesc, '1'));
        $I->wait(15);
        
        $I->selectOption(\Page\RegistrationStarted::WasteDiversionPopup_CommoditySelect('1', $before), 'Cardboard');
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::WasteDiversionPopup_ContainerTypeSelect('1', $before), 'CARRY BIN');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::WasteDiversionPopup_ContainersField('1', $before), '6');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::WasteDiversionPopup_CollectionPerWeekField('1', $before), '10');
        $I->wait(1);
        
        $I->click(\Page\RegistrationStarted::$WasteDiversionPopup_AfterGBTab);
        $I->wait(2);
        
        $I->selectOption(\Page\RegistrationStarted::WasteDiversionPopup_ContainerTypeSelect('1', $after), 'CARRY BIN');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::WasteDiversionPopup_ContainersField('1', $after), '6');
        $I->wait(1);
        $I->fillField(\Page\RegistrationStarted::WasteDiversionPopup_CollectionPerWeekField('1', $after), '10');
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::WasteDiversionPopup_CompactedToggleButton('1', $after));
        $I->wait(1);
        
        $I->click(\Page\RegistrationStarted::WasteDiversionPopup_SaveChangesButton($after));
        $I->wait(2);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
    }
    
    public function Business3_CompleteMeasure5_Yes_NAonSubmeasure(AcceptanceTester $I) {
        $measDesc = $this->measure5Desc;
        $paper    = '15';
        $bottles  = '26';
        $compost  = '16';
        
//        $I->wait(1);
        $I->comment("Complete Measure5 fand save.");
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure5]"], $style = 'visibility');
        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(2);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(3);
        $I->click(Page\RegistrationStarted::SubmeasureLink_ByMeasureDesc($measDesc, '1'));
        $I->wait(15);
        $I->executeJS('$(".modal.in [name=all_paper_percent]").val("15");'); 
        $I->wait(2);
        $I->executeJS('$(".modal.in [name=bottles_cans_percent]").val("26");'); 
        $I->wait(2);
        $I->executeJS('$(".modal.in [name=compost_percent]").val("16");'); 
        $I->wait(2);
        $I->click(\Page\RegistrationStarted::$WasteDiversionPopup_NO_SaveButton);
        $I->wait(3);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
    }
    
    public function Help_LogOut4(AcceptanceTester $I) {
        $I->reloadPage();
        $I->waitPageLoad();
        $I->LogIn_TRUEorFALSE($I);
//        $I->wait(2);
        $I->Logout($I);
//        $I->wait(1);
        $I->LoginAsAdmin($I);
    }
    
    public function GetBusiness3ID(AcceptanceTester $I) {
        $url2 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business2_P1), 'href');
        $I->comment("Url2: $url2");
        $u2 = explode('=', $url2);
        $this->id_business2_P1 = $u2[1];
        $I->comment("Business3 id: $this->id_business2_P1.");
    }
    
    public function Check_Measure1_Savings_Business1_AfterGVUpdating3(AcceptanceTester $I) {
        $measDesc           = $this->measure1Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::EnergySaved.":\nannual: 150 kWh\ndaily: 0.41095890411 kWh", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: -35 therms of natural gas per year\ndaily: -0.0958904109589 therms of natural gas per year", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure2_Savings_Business1_AfterGVUpdating3(AcceptanceTester $I) {
        $measDesc           = $this->measure2Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved.":\nannual: 10 lbs of CO2\ndaily: 0.027397260274 lbs of CO2", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::EnergySaved.":\nannual: 1 kWh\ndaily: 0.0027397260274 kWh", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::FuelSaved.":\nannual: 122 gallons of fuel\ndaily: 0.334246575342 gallons of fuel", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: -0.375 therms of natural gas per year\ndaily: -0.00102739726027 therms of natural gas per year", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure3_Savings_Business1_AfterGVUpdating3(AcceptanceTester $I) {
        $measDesc           = $this->measure3Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved.":\nannual: 345 lbs of CO2\ndaily: 0.945205479452 lbs of CO2", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure4_Savings_Business1_AfterGVUpdating3(AcceptanceTester $I) {
        $measDesc           = $this->measure4Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: 1327927.08058 lbs of waste\ndaily: 3638.15638516 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure5_Savings_Business1_AfterGVUpdating3(AcceptanceTester $I) {
        $measDesc           = $this->measure5Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: 6995.39083999 lbs of waste\ndaily: 19.1654543561 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure1_Savings_Business2_AfterGVUpdating3(AcceptanceTester $I) {
        $measDesc           = $this->measure1Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P2, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::EnergySaved.":\nannual: 150 kWh\ndaily: 0.41095890411 kWh", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: 7 therms of natural gas per year\ndaily: 0.0191780821918 therms of natural gas per year", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure2_Savings_Business2_AfterGVUpdating3(AcceptanceTester $I) {
        $measDesc           = $this->measure2Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P2, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved.":\nannual: 10 lbs of CO2\ndaily: 0.027397260274 lbs of CO2", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::EnergySaved.":\nannual: 3 kWh\ndaily: 0.00821917808219 kWh", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::FuelSaved.":\nannual: 124 gallons of fuel\ndaily: 0.339726027397 gallons of fuel", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: -0.606060606061 therms of natural gas per year\ndaily: -0.0016604400166 therms of natural gas per year", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure3_Savings_Business2_AfterGVUpdating3(AcceptanceTester $I) {
        $measDesc           = $this->measure3Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P2, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved.":\nannual: 316.65 lbs of CO2\ndaily: 0.867534246575 lbs of CO2", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure4_Savings_Business2_AfterGVUpdating3(AcceptanceTester $I) {
        $measDesc           = $this->measure4Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P2, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: 1327927.08058 lbs of waste\ndaily: 3638.15638516 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure5_Savings_Business2_AfterGVUpdating3(AcceptanceTester $I) {
        $measDesc           = $this->measure5Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P2, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: 21186.970704 lbs of waste\ndaily: 58.0464950794 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure1_Savings_Business3_AfterGVUpdating3(AcceptanceTester $I) {
        $measDesc           = $this->measure1Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business2_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::EnergySaved.":\nannual: 150 kWh\ndaily: 0.41095890411 kWh", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: -35 therms of natural gas per year\ndaily: -0.0958904109589 therms of natural gas per year", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure2_Savings_Business3_AfterGVUpdating3(AcceptanceTester $I) {
        $measDesc           = $this->measure2Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business2_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved.":\nannual: 10 lbs of CO2\ndaily: 0.027397260274 lbs of CO2", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::EnergySaved.":\nannual: 1 kWh\ndaily: 0.0027397260274 kWh", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::FuelSaved.":\nannual: 122 gallons of fuel\ndaily: 0.334246575342 gallons of fuel", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: -0.375 therms of natural gas per year\ndaily: -0.00102739726027 therms of natural gas per year", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure3_Savings_Business3_AfterGVUpdating3(AcceptanceTester $I) {
        $measDesc           = $this->measure3Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business2_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved.":\nannual: 345 lbs of CO2\ndaily: 0.945205479452 lbs of CO2", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure4_Savings_Business3_AfterGVUpdating3(AcceptanceTester $I) {
        $measDesc           = $this->measure4Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business2_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: 550273.152 lbs of waste\ndaily: 1507.59767671 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure5_Savings_Business3_AfterGVUpdating3(AcceptanceTester $I) {
        $measDesc           = $this->measure5Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business2_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: 6995.39083999 lbs of waste\ndaily: 19.1654543561 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function New_GV_ErrorAppears_DeletingOfGlobalVariable_Overrided(Step\Acceptance\GlobalVariable $I) {
        $I->amOnPage(Page\GlobalVariableList::URL());
//        $I->wait(1);
        $countInList1 = $I->grabValueFrom(Page\GlobalVariableList::$SummaryCount);
        $I->comment("Count of variables before deleting: $countInList1");
        $var = $I->GetGlobalVariableOnPageInList($this->globVariableTitle);
        $row = $var['row'];
        $I->click(Page\GlobalVariableList::DeleteButtonLine($row));
        $I->wait(2);
        $I->acceptPopup();
        $I->wait(2);
        $I->canSeeElement(".sweet-alert.visible");
        $I->canSee('Global Variable was overriden. Please, remove overrides first!', ".sweet-alert.visible h2");
        $I->click(".sweet-alert.visible button");
        $I->wait(2);
        $countInList2 = $I->grabValueFrom(Page\GlobalVariableList::$SummaryCount);
        $I->comment("Count of variables after deleting: $countInList2");
        $I->assertEquals($countInList1, $countInList2);
    }
    
    public function New_P1V_DeletingOfProgramVariable(Step\Acceptance\GlobalVariable $I) {
        $I->amOnPage(Page\GlobalVariableList::URL());
//        $I->wait(1);
        $countInList1 = $I->grabValueFrom(Page\GlobalVariableList::$SummaryCount);
        $I->comment("Count of variables before deleting: $countInList1");
        $var = $I->GetGlobalVariableOnPageInList($this->globVariableTitle, 'Program', $this->program1);
        $row = $var['row'];
        $I->click(Page\GlobalVariableList::DeleteButtonLine($row));
        $I->wait(2);
        $I->acceptPopup();
        $I->wait(2);
        $I->canSeeElement(".sweet-alert.visible");
        $I->canSee('Global Variable was deleted.', ".sweet-alert.visible h2");
        $I->click(".sweet-alert.visible button");
        $I->wait(2);
        $countInList2 = $countInList1-1;
        $I->canSee($countInList2, Page\GlobalVariableList::$SummaryCount);
    }
    
    public function Recycling100_SV_DeletingOfStateVariable(Step\Acceptance\GlobalVariable $I) {
        $I->amOnPage(Page\GlobalVariableList::URL());
//        $I->wait(1);
        $countInList1 = $I->grabValueFrom(Page\GlobalVariableList::$SummaryCount);
        $I->comment("Count of variables before deleting: $countInList1");
        $var = $I->GetGlobalVariableOnPageInList($this->Recicled100_Title, 'State', $this->state);
        $row = $var['row'];
        $I->click(Page\GlobalVariableList::DeleteButtonLine($row));
        $I->wait(2);
        $I->acceptPopup();
        $I->wait(2);
        $I->canSeeElement(".sweet-alert.visible");
        $I->canSee('Global Variable was deleted.', ".sweet-alert.visible h2");
        $I->click(".sweet-alert.visible button");
        $I->wait(2);
        $countInList2 = $countInList1-1;
        $I->canSee($countInList2, Page\GlobalVariableList::$SummaryCount);
    }
    
    public function Compostable_P2V_DeletingOfProgramVariable(Step\Acceptance\GlobalVariable $I) {
        $I->amOnPage(Page\GlobalVariableList::URL());
//        $I->wait(1);
        $countInList1 = $I->grabValueFrom(Page\GlobalVariableList::$SummaryCount);
        $I->comment("Count of variables before deleting: $countInList1");
        $var = $I->GetGlobalVariableOnPageInList($this->Compostable_Title, 'Program', $this->program2);
        $row = $var['row'];
        $I->click(Page\GlobalVariableList::DeleteButtonLine($row));
        $I->wait(2);
        $I->acceptPopup();
        $I->wait(2);
        $I->canSeeElement(".sweet-alert.visible");
        $I->canSee('Global Variable was deleted.', ".sweet-alert.visible h2");
        $I->click(".sweet-alert.visible button");
        $I->wait(2);
        $countInList2 = $countInList1-1;
        $I->canSee($countInList2, Page\GlobalVariableList::$SummaryCount);
    }
    
    public function Check_Measure1_Savings_Business1_AfterGVUpdating4_DeletingGV(AcceptanceTester $I) {
        $measDesc           = $this->measure1Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::EnergySaved.":\nannual: 150 kWh\ndaily: 0.41095890411 kWh", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: -50 therms of natural gas per year\ndaily: -0.13698630137 therms of natural gas per year", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure2_Savings_Business1_AfterGVUpdating4_DeletingGV(AcceptanceTester $I) {
        $measDesc           = $this->measure2Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved.":\nannual: 10 lbs of CO2\ndaily: 0.027397260274 lbs of CO2", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::EnergySaved.":\nannual: 1 kWh\ndaily: 0.0027397260274 kWh", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::FuelSaved.":\nannual: 122 gallons of fuel\ndaily: 0.334246575342 gallons of fuel", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: -0.5 therms of natural gas per year\ndaily: -0.0013698630137 therms of natural gas per year", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure3_Savings_Business1_AfterGVUpdating4_DeletingGV(AcceptanceTester $I) {
        $measDesc           = $this->measure3Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved.":\nannual: 345 lbs of CO2\ndaily: 0.945205479452 lbs of CO2", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure4_Savings_Business1_AfterGVUpdating4_DeletingGV(AcceptanceTester $I) {
        $measDesc           = $this->measure4Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: 1327927.08058 lbs of waste\ndaily: 3638.15638516 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure5_Savings_Business1_AfterGVUpdating4_DeletingGV(AcceptanceTester $I) {
        $measDesc           = $this->measure5Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: 6995.39083999 lbs of waste\ndaily: 19.1654543561 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure1_Savings_Business2_AfterGVUpdating4_DeletingGV(AcceptanceTester $I) {
        $measDesc           = $this->measure1Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P2, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::EnergySaved.":\nannual: 150 kWh\ndaily: 0.41095890411 kWh", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: 7 therms of natural gas per year\ndaily: 0.0191780821918 therms of natural gas per year", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure2_Savings_Business2_AfterGVUpdating4_DeletingGV(AcceptanceTester $I) {
        $measDesc           = $this->measure2Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P2, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved.":\nannual: 10 lbs of CO2\ndaily: 0.027397260274 lbs of CO2", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::EnergySaved.":\nannual: 1 kWh\ndaily: 0.0027397260274 kWh", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::FuelSaved.":\nannual: 122 gallons of fuel\ndaily: 0.334246575342 gallons of fuel", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: 3.22580645161 therms of natural gas per year\ndaily: 0.00883782589483 therms of natural gas per year", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure3_Savings_Business2_AfterGVUpdating4(AcceptanceTester $I) {
        $measDesc           = $this->measure3Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P2, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved.":\nannual: 304.69 lbs of CO2\ndaily: 0.834767123288 lbs of CO2", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure4_Savings_Business2_AfterGVUpdating4(AcceptanceTester $I) {
        $measDesc           = $this->measure4Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P2, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: 1327927.08058 lbs of waste\ndaily: 3638.15638516 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure5_Savings_Business2_AfterGVUpdating4(AcceptanceTester $I) {
        $measDesc           = $this->measure5Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business1_P2, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: 21186.970704 lbs of waste\ndaily: 58.0464950794 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure1_Savings_Business3_AfterGVUpdating4(AcceptanceTester $I) {
        $measDesc           = $this->measure1Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business2_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::EnergySaved.":\nannual: 150 kWh\ndaily: 0.41095890411 kWh", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: -50 therms of natural gas per year\ndaily: -0.13698630137 therms of natural gas per year", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure2_Savings_Business3_AfterGVUpdating4(AcceptanceTester $I) {
        $measDesc           = $this->measure2Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business2_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved.":\nannual: 10 lbs of CO2\ndaily: 0.027397260274 lbs of CO2", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::EnergySaved.":\nannual: 1 kWh\ndaily: 0.0027397260274 kWh", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::FuelSaved.":\nannual: 122 gallons of fuel\ndaily: 0.334246575342 gallons of fuel", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->canSee(\Page\SavingAreaList::Therms.":\nannual: -0.5 therms of natural gas per year\ndaily: -0.0013698630137 therms of natural gas per year", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure3_Savings_Business3_AfterGVUpdating4(AcceptanceTester $I) {
        $measDesc           = $this->measure3Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business2_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure3']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::GreenhouseGasEmissionsSaved.":\nannual: 345 lbs of CO2\ndaily: 0.945205479452 lbs of CO2", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure4_Savings_Business3_AfterGVUpdating4(AcceptanceTester $I) {
        $measDesc           = $this->measure4Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business2_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure4']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: 550273.152 lbs of waste\ndaily: 1507.59767671 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
    public function Check_Measure5_Savings_Business3_AfterGVUpdating4(AcceptanceTester $I) {
        $measDesc           = $this->measure5Desc;
        
//        $I->wait(2);
        $I->amOnPage(\Page\BusinessChecklistView::URL_AuditGroupInChecklist($this->id_business2_P1, $this->id_audSubgroup1_Energy));
//        $I->wait(3);
        $I->scrollTo("[data-measure-id='$this->idMeasure5']");
        $I->wait(1);
        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
        $I->comment("Savings: $saving");
        $I->canSee(\Page\SavingAreaList::SolidWasteDiverted.":\nannual: 6995.39083999 lbs of waste\ndaily: 19.1654543561 lbs of waste", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
    }
    
//    public function After_UpdateGlobalVariablesToDefaultValues(\Step\Acceptance\GlobalVariable $I)
//    {
//        $id_cardboard          = $this->id_cardboardGV;
//        $value_cardboard       = $this->defaultValue_cardboardGV;
//        $id_compostable        = $this->id_compostableGV;
//        $value_compostable     = $this->defaultValue_compostableGV;
//        $id_100recycling       = $this->id_100recyclingGV;
//        $value_100recycling    = $this->defaultValue_100recyclingGV;
//        $id_mixed_recycling    = $this->id_mixed_recyclingGV;
//        $value_mixed_recycling = $this->defaultValue_mixed_recyclingGV;
//        
//        $I->UpdateGlobalVariable($id_cardboard, null, null, $value_cardboard);
//        $I->wait(5);
//        $I->waitForElement(\Page\GlobalVariableList::$GlobalVariableRow, 150);
//        $I->UpdateGlobalVariable($id_compostable, null, null, $value_compostable);
//        $I->wait(5);
//        $I->waitForElement(\Page\GlobalVariableList::$GlobalVariableRow, 150);
//        $I->UpdateGlobalVariable($id_100recycling, null, null, $value_100recycling);
//        $I->wait(5);
//        $I->waitForElement(\Page\GlobalVariableList::$GlobalVariableRow, 150);
//        $I->UpdateGlobalVariable($id_mixed_recycling, null, null, $value_mixed_recycling);
//        $I->wait(5);
//        $I->waitForElement(\Page\GlobalVariableList::$GlobalVariableRow, 150);
//    }
}
