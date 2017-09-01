<?php


class CheckThermsPopupCest
{
    public $state, $audSubgroup1_Energy, $measureDesc, $idMeasure, $city1, $program1, $zip1;
    public $option1, $thermsCount1, $option2, $thermsCount2, $option3, $thermsCount3, $option4, $thermsCount4;
    public $total = '0', $totalOpt1 = '4', $totalOpt2 = '1', $totalOpt3 = '8', $totalOpt4 = '2';
    public $totalEstUpd = '44', $totalOpt1Upd = '1', $totalOpt2Upd = '10', $totalOpt3Upd = '3', $totalOpt4Upd = '1';
    public $checklistUrl, $business;
    public $userEmail, $password = "Qq!1111111";


    public function Help1_LogInAsAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    //--------------------------------------------------------------------------Creating Therms Options-----------------------------------------------------------------------------------------
    
    public function ThermCreate3_1_2_CreateThermOption1(\Step\Acceptance\PopupThermOption $I)
    {
        $name        = $this->option1 = $I->GenerateNameOf('theOpt1');
        $thermsCount = $this->thermsCount1 = '2';
        
        $I->CreateThermOption($name, $thermsCount);
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\PopupThermOptionList::URL());
    }
    
    public function ThermCreate3_1_2_CreateThermOption2(\Step\Acceptance\PopupThermOption $I)
    {
        $name        = $this->option2 = $I->GenerateNameOf('theOpt2');
        $thermsCount = $this->thermsCount2 = '10';
        
        $I->CreateThermOption($name, $thermsCount);
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\PopupThermOptionList::URL());
    }
    
    public function ThermCreate3_1_2_CreateThermOption3(\Step\Acceptance\PopupThermOption $I)
    {
        $name        = $this->option3 = $I->GenerateNameOf('theOpt3');
        $thermsCount = $this->thermsCount3 = '1';
        
        $I->CreateThermOption($name, $thermsCount);
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\PopupThermOptionList::URL());
    }
    
    public function ThermCreate3_1_2_CreateThermOption4(\Step\Acceptance\PopupThermOption $I)
    {
        $name        = $this->option4 = $I->GenerateNameOf('theOpt4');
        $thermsCount = $this->thermsCount4 = '2';
        
        $I->CreateThermOption($name, $thermsCount);
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\PopupThermOptionList::URL());
    }
    
    public function Help1_3_CreateState(\Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StTherms");
        $shortName = "sn";
        
        $I->CreateState($name, $shortName);
    }
    
    public function Help1_4_SelectDefaultState(AcceptanceTester $I)
    {
        $I->wait(2);
        $I->SelectDefaultState($I, $this->state);
    }
    
    public function Help1_4_CreateAuditSubGroupForEnergyGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $I->wantTo("Create audit subgroup for Energy audit group");
        $name      = $this->audSubgroup1_Energy = $I->GenerateNameOf("EnAudSub1");
        $auditGroup = Page\AuditGroupList::Energy_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->wait(3);
    }
    
    public function CheckTherms1_8_CreateMeasure_ThermsPopup(\Step\Acceptance\Measure $I) {
        $desc           = $this->measureDesc = $I->GenerateNameOf("Description");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::PopupTherms_QuantitativeSubmeasure;
        $popupDesc      = $I->GenerateNameOf('Popup therms description');
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, null, null, null, $popupDesc);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(2);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $I->seeElement(Page\MeasureList::CreateTipButtonLine_ByDescValue($desc));
        $this->idMeasure = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
    }
    
    public function Help1_6_3_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city1 = $I->GenerateNameOf("CityTherm1");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip1 = $I->GenerateZipCode();
        $program = $this->program1 = $I->GenerateNameOf("ProgTherm1");
        
        $I->CreateCity($city, $state, $zips);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    public function Help1_15_CreateChecklistForTier3(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program1;
        $programDestination = $this->program1;
        $sectorDestination  = 'Office / Retail';
        $tier               = '3';
        $descs              = [$this->measureDesc];
        $status             = ['core'];
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $status);
        $this->checklistUrl = $I->grabFromCurrentUrl();
        $I->reloadPage();
        $I->PublishChecklistStatus();
    }
    
    public function Help1_16_LogOut(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function Help1_17_BusinessRegister(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->userEmail = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password;
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
    }
    
    public function CheckTherms1_17_1_CheckAllElementsPresentInPopup(AcceptanceTester $I) {
        $measDesc = $this->measureDesc;
        
        $I->wait(1);
        $I->amOnPage(\Page\RegistrationStarted::$URL_Started);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
        $I->wait(2);
        $I->click(\Page\RegistrationStarted::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(2);
        $I->seeElement(\Page\RegistrationStarted::Submeasure_ByMeasureDesc($measDesc, '1'));
        $I->click(\Page\RegistrationStarted::Submeasure_ByMeasureDesc($measDesc, '1').'/a');
        $I->wait(2);
        $I->waitForElement(\Page\RegistrationStarted::ThermsPopup);
        $I->wait(1);
//        $I->canSeeElement(\Page\RegistrationStarted::$ThermsPopup_TotalEstimatedField_Section1);
        $I->canSeeElement(\Page\RegistrationStarted::ThermsPopup_TotalEstimatedField_Section2('1'));
        $I->canSeeElement(\Page\RegistrationStarted::ThermsPopup_OptionSelect_Section2('1'));
        $I->canSeeElement(\Page\RegistrationStarted::$ThermsPopup_AddOptionButton);
        $I->canSeeElement(\Page\RegistrationStarted::$ThermsPopup_SaveChangesButton);
//        $I->canSeeInField(\Page\RegistrationStarted::$ThermsPopup_TotalEstimatedField_Section1, '');
        $I->canSeeInField(\Page\RegistrationStarted::ThermsPopup_TotalEstimatedField_Section2('1'), '');
        $I->click(\Page\RegistrationStarted::$ThermsPopup_AddOptionButton);
        $I->wait(1);
        $I->canSeeElement(\Page\RegistrationStarted::ThermsPopup_TotalEstimatedField_Section2('2'));
        $I->canSeeElement(\Page\RegistrationStarted::ThermsPopup_OptionSelect_Section2('2'));
        $I->canSeeElement(\Page\RegistrationStarted::ThermsPopup_DeleteOptionButton_Section2('2'));
        $I->canSeeElement(\Page\RegistrationStarted::$ThermsPopup_AddOptionButton);
        $I->canSeeElement(\Page\RegistrationStarted::$ThermsPopup_SaveChangesButton);
//        $I->canSeeInField(\Page\RegistrationStarted::$ThermsPopup_TotalEstimatedField_Section1, '');
        $I->canSeeInField(\Page\RegistrationStarted::ThermsPopup_TotalEstimatedField_Section2('2'), '');
        $I->canSeeInField(\Page\RegistrationStarted::ThermsPopup_TotalEstimatedField_Section2('1'), '');
        $I->click(\Page\RegistrationStarted::$ThermsPopup_AddOptionButton);
        $I->wait(1);
        $I->canSeeElement(\Page\RegistrationStarted::ThermsPopup_TotalEstimatedField_Section2('3'));
        $I->canSeeElement(\Page\RegistrationStarted::ThermsPopup_OptionSelect_Section2('3'));
        $I->canSeeElement(\Page\RegistrationStarted::ThermsPopup_DeleteOptionButton_Section2('3'));
        $I->canSeeElement(\Page\RegistrationStarted::ThermsPopup_TotalEstimatedField_Section2('2'));
        $I->canSeeElement(\Page\RegistrationStarted::ThermsPopup_OptionSelect_Section2('2'));
        $I->canSeeElement(\Page\RegistrationStarted::ThermsPopup_DeleteOptionButton_Section2('2'));
        $I->canSeeElement(\Page\RegistrationStarted::$ThermsPopup_AddOptionButton);
        $I->canSeeElement(\Page\RegistrationStarted::$ThermsPopup_SaveChangesButton);
//        $I->canSeeInField(\Page\RegistrationStarted::$ThermsPopup_TotalEstimatedField_Section1, '');
        $I->canSeeInField(\Page\RegistrationStarted::ThermsPopup_TotalEstimatedField_Section2('3'), '');
        $I->canSeeInField(\Page\RegistrationStarted::ThermsPopup_TotalEstimatedField_Section2('2'), '');
        $I->canSeeInField(\Page\RegistrationStarted::ThermsPopup_TotalEstimatedField_Section2('1'), '');
    }
    
    public function CheckTherms1_17_2_CheckAllOptionsPresentInSelectsInPopup(AcceptanceTester $I) {
        $measDesc = $this->measureDesc;
        
        $I->wait(1);
        $I->amOnPage(\Page\RegistrationStarted::$URL_Started);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
        $I->wait(2);
        $I->click(\Page\RegistrationStarted::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(2);
        $I->seeElement(\Page\RegistrationStarted::Submeasure_ByMeasureDesc($measDesc, '1'));
        $I->click(\Page\RegistrationStarted::Submeasure_ByMeasureDesc($measDesc, '1').'/a');
        $I->wait(2);
        $I->waitForElement(\Page\RegistrationStarted::ThermsPopup);
        $I->wait(1);
        $I->canSee($this->option1, \Page\RegistrationStarted::ThermsPopup_OptionSelectOption_Section2('1'));
        $I->canSee($this->option2, \Page\RegistrationStarted::ThermsPopup_OptionSelectOption_Section2('1'));
        $I->canSee($this->option3, \Page\RegistrationStarted::ThermsPopup_OptionSelectOption_Section2('1'));
        $I->canSee($this->option4, \Page\RegistrationStarted::ThermsPopup_OptionSelectOption_Section2('1'));
        $I->click(\Page\RegistrationStarted::$ThermsPopup_AddOptionButton);
        $I->wait(1);
        $I->canSee($this->option1, \Page\RegistrationStarted::ThermsPopup_OptionSelectOption_Section2('2'));
        $I->canSee($this->option2, \Page\RegistrationStarted::ThermsPopup_OptionSelectOption_Section2('2'));
        $I->canSee($this->option3, \Page\RegistrationStarted::ThermsPopup_OptionSelectOption_Section2('2'));
        $I->canSee($this->option4, \Page\RegistrationStarted::ThermsPopup_OptionSelectOption_Section2('2'));
        $I->click(\Page\RegistrationStarted::$ThermsPopup_AddOptionButton);
        $I->wait(1);
        $I->canSee($this->option1, \Page\RegistrationStarted::ThermsPopup_OptionSelectOption_Section2('3'));
        $I->canSee($this->option2, \Page\RegistrationStarted::ThermsPopup_OptionSelectOption_Section2('3'));
        $I->canSee($this->option3, \Page\RegistrationStarted::ThermsPopup_OptionSelectOption_Section2('3'));
        $I->canSee($this->option4, \Page\RegistrationStarted::ThermsPopup_OptionSelectOption_Section2('3'));
    }
    
    public function CheckTherms1_17_3_CheckAllOptionsPresentInSelectsInPopup(AcceptanceTester $I) {
        $measDesc = $this->measureDesc;
        $sumTotal = $this->totalOpt1 * $this->thermsCount1;
        
        $I->wait(1);
        $I->amOnPage(\Page\RegistrationStarted::$URL_Started);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
        $I->wait(2);
        $I->click(\Page\RegistrationStarted::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(3);
        $I->seeElement(\Page\RegistrationStarted::Submeasure_ByMeasureDesc($measDesc, '1'));
        $I->click(\Page\RegistrationStarted::Submeasure_ByMeasureDesc($measDesc, '1').'/a');
        $I->wait(2);
        $I->waitForElement(\Page\RegistrationStarted::ThermsPopup);
        $I->wait(2);
        $I->selectOption(\Page\RegistrationStarted::ThermsPopup_OptionSelect_Section2('1'), $this->option1);
        $I->fillField(\Page\RegistrationStarted::ThermsPopup_TotalEstimatedField_Section2('1'), $this->totalOpt1);
        $I->wait(4);
        $I->canSeeInField(\Page\RegistrationStarted::$ThermsPopup_TotalReadonlyField, $sumTotal);
        $I->click(\Page\RegistrationStarted::$ThermsPopup_SaveChangesButton);
        $I->wait(3);
    }
    
    public function Help1_16_LogOut1(AcceptanceTester $I) {
        $I->reloadPage();
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(2);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsAdmin($I);
    }
    
    public function Help1_18_GoToBusinessViewPage(AcceptanceTester $I){
        $I->wait(1);
        $I->SelectDefaultState($I, $this->state);
        $I->wait(1);
        $I->amOnPage(Page\Dashboard::URL());
        $I->wait(2);
        $I->click(Page\Dashboard::BusinessLink_ByBusName($this->business));
        $I->wait(2);
    }
     
    public function MeasTypes1_18_1_CheckGreenTipForMeasure1_Quant_MultipleQuesdAndNumber_OnBusinessView(AcceptanceTester $I) {
        $measDesc = $this->measureDesc;
        $sumTotal = $this->totalOpt1 * $this->thermsCount1;
        
        $I->wait(2);
        $I->waitForElement(\Page\BusinessChecklistView::$LeftMenu_EnergyGroupButton);
        if($I->getAmount($I, \Page\BusinessChecklistView::$LeftMenu_EnergyGroupButton.'.active') == 0) {
            $I->click(\Page\BusinessChecklistView::$LeftMenu_EnergyGroupButton);
        }
        $I->wait(2);
        $I->click(\Page\BusinessChecklistView::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
        $I->wait(2);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure]", ".popup-therm [data-measure-id=$this->idMeasure]"], $style = 'visibility');
        $I->wait(2);
        $I->selectOption(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->wait(2);
        $I->selectOption(\Page\BusinessChecklistView::SubmeasureToggleButton_2Items_ByMeasureDesc($measDesc, '1'), 'yes');
        $I->wait(2);
//        $I->click(\Page\BusinessChecklistView::Submeasure_ByMeasureDesc($measDesc, '1').'/a');
//        $I->wait(2);
        $I->waitForElement(\Page\BusinessChecklistView::ThermsPopup);
//        $I->canSeeInField(\Page\BusinessChecklistView::$ThermsPopup_TotalEstimatedField_Section1, $this->totalEst);
        $I->canSeeInField(\Page\BusinessChecklistView::ThermsPopup_TotalEstimatedField_Section2(1), $this->totalOpt1);
        $I->canSeeInField(\Page\BusinessChecklistView::$ThermsPopup_TotalReadonlyField, $sumTotal);
        $I->click(\Page\BusinessChecklistView::$ThermsPopup_CloseButton);
        $I->wait(3);
        $I->click(Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(2);
    }
    
//    public function MeasTypes1_18_1_CheckGreenTipForMeasure1_Quant_MultipleQduesAndNumber_OnBusinessView(AcceptanceTester $I) {
//        $measDesc = $this->measureDesc;
//        
//        $I->reloadPage();
//        $I->wait(2);
//        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
//        $I->wait(3);
//        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
//        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
//        $I->comment("Savings: $saving");
//        $I->canSee("Therms:\nannual: $this->totalOpt1\ndaily: $this->totalOpt1", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
//    }
//    
//    public function MeasTypes1_18_1_CheckGreenTipForfMeasure1_Quant_MultipleQuesdAndNumber_OnBusinessView(AcceptanceTester $I) {
//        $measDesc = $this->measureDesc;
//        $sumTotal = $this->thermsCount1 * $this->totalOpt1 + $this->thermsCount2 * $this->totalOpt2;
//        
//        $I->reloadPage();
//        $I->wait(2);
//        $I->click(\Page\BusinessChecklistView::Submeasure_ByMeasureDesc($measDesc, '1').'/a');
//        $I->wait(2);
//        $I->canSeeElement(\Page\BusinessChecklistView::ThermsPopup);
////        $I->selectOption(\Page\BusinessChecklistView::ThermsPopup_OptionSelect_Section2('1'), $this->option1);
////        $I->fillField(\Page\BusinessChecklistView::ThermsPopup_TotalEstimatedField_Section2('1'), $this->totalOpt1);
//        $I->click(\Page\BusinessChecklistView::$ThermsPopup_AddOptionButton);
//        $I->wait(1);
//        $I->selectOption(\Page\BusinessChecklistView::ThermsPopup_OptionSelect_Section2('2'), $this->option2);
//        $I->fillField(\Page\BusinessChecklistView::ThermsPopup_TotalEstimatedField_Section2('2'), $this->totalOpt2);
//        $I->wait(2);
//        $I->canSeeInField(\Page\BusinessChecklistView::$ThermsPopup_TotalReadonlyField, $sumTotal);
//        $I->click(\Page\BusinessChecklistView::$ThermsPopup_SaveChangesButton);
//        $I->wait(4);
//    }
//    
//    public function MeasTypes1_18_1_CheckGrveenTipForMeasure1_Quant_MultipleQduesAndNumber_OnBusinessView(AcceptanceTester $I) {
//        $measDesc = $this->measureDesc;
//        $sumTotal = $this->thermsCount1 * $this->totalOpt1 + $this->thermsCount2 * $this->totalOpt2;
//        $daily    = $sumTotal/365;
//        
//        $I->reloadPage();
//        $I->wait(2);
//        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
//        $I->wait(3);
//        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
//        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
//        $I->comment("Savings: $saving");
//        $I->canSee("Therms:\nannual: $sumTotal\ndaily: $daily", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
//    }
//    
//    public function Help1_16_LogOut1AndLoginAsUser(AcceptanceTester $I) {
//        $I->reloadPage();
//        $I->wait(2);
//        $I->Logout($I);
//        $I->wait(1);
//        $I->LoginAsUser($this->userEmail, $this->password, $I, 'user');
//    }
//    
//    public function CheckTherms1_17_1_CheckvAllElementsPresentInPopup(AcceptanceTester $I) {
//        $measDesc = $this->measureDesc;
//        $sumTotal = $this->thermsCount1 * $this->totalOpt1 + $this->thermsCount2 * $this->totalOpt2;
//        
//        $I->wait(1);
//        $I->amOnPage(\Page\RegistrationStarted::$URL_Started);
//        $I->wait(1);
//        $I->click(\Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
//        $I->wait(2);
//        $I->click(\Page\RegistrationStarted::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
//        $I->wait(2);
//        $I->seeElement(\Page\RegistrationStarted::Submeasure_ByMeasureDesc($measDesc, '1'));
//        $I->click(\Page\RegistrationStarted::Submeasure_ByMeasureDesc($measDesc, '1').'/a');
//        $I->wait(2);
//        $I->waitForElement(\Page\RegistrationStarted::ThermsPopup);
//        $I->wait(1);
////        $I->canSeeInField(\Page\RegistrationStarted::$ThermsPopup_TotalEstimatedField_Section1, $this->totalEst);
//        $I->canSeeInField(\Page\RegistrationStarted::ThermsPopup_TotalEstimatedField_Section2('1'), $this->totalOpt1);
//        $I->canSeeInField(\Page\RegistrationStarted::ThermsPopup_TotalEstimatedField_Section2('2'), $this->totalOpt2);
//        $I->canSeeOptionIsSelected(\Page\RegistrationStarted::ThermsPopup_OptionSelect_Section2('1'), $this->option1);
//        $I->canSeeOptionIsSelected(\Page\RegistrationStarted::ThermsPopup_OptionSelect_Section2('2'), $this->option2);
//        $I->canSeeInField(\Page\BusinessChecklistView::$ThermsPopup_TotalReadonlyField, $sumTotal);
//    }
//    
//    public function CheckTherms1_17_3_CheckAllOptifonsPresentInSelectsInPopup(AcceptanceTester $I) {
//        $measDesc = $this->measureDesc;
//        $sumTotal = $this->totalOpt1Upd * $this->thermsCount1 + $this->totalOpt3Upd * $this->thermsCount3 
//                + $this->totalOpt4Upd* $this->thermsCount4 + $this->totalOpt2Upd * $this->thermsCount2;
//        
//        $I->wait(1);
//        $I->amOnPage(\Page\RegistrationStarted::$URL_Started);
//        $I->wait(1);
//        $I->click(\Page\RegistrationStarted::$LeftMenu_EnergyGroupButton);
//        $I->wait(2);
//        $I->click(\Page\RegistrationStarted::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
//        $I->wait(3);
//        $I->seeElement(\Page\RegistrationStarted::Submeasure_ByMeasureDesc($measDesc, '1'));
//        $I->click(\Page\RegistrationStarted::Submeasure_ByMeasureDesc($measDesc, '1').'/a');
//        $I->wait(2);
//        $I->waitForElement(\Page\RegistrationStarted::ThermsPopup);
//        $I->wait(1);
////        $I->fillField(\Page\RegistrationStarted::$ThermsPopup_TotalEstimatedField_Section1, $this->totalEstUpd);
//        $I->fillField(\Page\RegistrationStarted::ThermsPopup_TotalEstimatedField_Section2('1'), $this->totalOpt1Upd);
//        $I->wait(1);
//        $I->selectOption(\Page\RegistrationStarted::ThermsPopup_OptionSelect_Section2('2'), $this->option3);
//        $I->fillField(\Page\RegistrationStarted::ThermsPopup_TotalEstimatedField_Section2('2'), $this->totalOpt3Upd);
//        $I->click(\Page\RegistrationStarted::$ThermsPopup_AddOptionButton);
//        $I->wait(1);
//        $I->selectOption(\Page\RegistrationStarted::ThermsPopup_OptionSelect_Section2('3'), $this->option4);
//        $I->fillField(\Page\RegistrationStarted::ThermsPopup_TotalEstimatedField_Section2('3'), $this->totalOpt4Upd);
//        $I->wait(1);
//        $I->click(\Page\RegistrationStarted::$ThermsPopup_AddOptionButton);
//        $I->wait(1);
//        $I->selectOption(\Page\RegistrationStarted::ThermsPopup_OptionSelect_Section2('4'), $this->option2);
//        $I->fillField(\Page\RegistrationStarted::ThermsPopup_TotalEstimatedField_Section2('4'), $this->totalOpt2Upd);
//        $I->wait(3);
//        $I->canSeeInField(\Page\BusinessChecklistView::$ThermsPopup_TotalReadonlyField, $sumTotal);
//        $I->click(\Page\RegistrationStarted::$ThermsPopup_SaveChangesButton);
//        $I->wait(4);
//    }
//    
//    public function Help1_16_LogOutg1(AcceptanceTester $I) {
//        $I->reloadPage();
//        $I->LogIn_TRUEorFALSE($I);
//        $I->wait(2);
//        $I->Logout($I);
//        $I->wait(1);
//        $I->LoginAsAdmin($I);
//    }
//    
//    public function Help1_18_GoToBugsinessViewPage(AcceptanceTester $I){
//        $I->wait(1);
//        $I->SelectDefaultState($I, $this->state);
//        $I->wait(1);
//        $I->amOnPage(Page\Dashboard::URL());
//        $I->wait(2);
//        $I->click(Page\Dashboard::BusinessLink_ByBusName($this->business));
//        $I->wait(2);
//    }
//     
//    public function MeasTypes1_18_1_CheckGregenTipForMeasure1_Quant_MultipleQuesdAndNumber_OnBusinessView(AcceptanceTester $I) {
//        $measDesc = $this->measureDesc;
//        
//        $I->wait(2);
//        if($I->getAmount($I, \Page\BusinessChecklistView::$LeftMenu_EnergyGroupButton.'.active') == 0) {
//            $I->click(\Page\BusinessChecklistView::$LeftMenu_EnergyGroupButton);
//        }
//        $I->wait(2);
//        $I->click(\Page\BusinessChecklistView::LeftMenu_Subgroup_ByName($this->audSubgroup1_Energy));
//        $I->wait(2);
//        $I->click(\Page\BusinessChecklistView::Submeasure_ByMeasureDesc($measDesc, '1').'/a');
//        $I->wait(2);
//        $I->canSeeElement(\Page\BusinessChecklistView::ThermsPopup);
////        $I->canSeeInField(\Page\BusinessChecklistView::$ThermsPopup_TotalEstimatedField_Section1, $this->totalEstUpd);
//        $I->canSeeInField(\Page\BusinessChecklistView::ThermsPopup_TotalEstimatedField_Section2(1), $this->totalOpt1Upd);
//        $I->canSeeInField(\Page\BusinessChecklistView::ThermsPopup_TotalEstimatedField_Section2(2), $this->totalOpt3Upd);
//        $I->canSeeInField(\Page\BusinessChecklistView::ThermsPopup_TotalEstimatedField_Section2(3), $this->totalOpt4Upd);
//        $I->canSeeInField(\Page\BusinessChecklistView::ThermsPopup_TotalEstimatedField_Section2(4), $this->totalOpt2Upd);
//        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::ThermsPopup_OptionSelect_Section2(1), $this->option1);
//        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::ThermsPopup_OptionSelect_Section2(2), $this->option3);
//        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::ThermsPopup_OptionSelect_Section2(3), $this->option4);
//        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::ThermsPopup_OptionSelect_Section2(4), $this->option2);
//        $I->click(\Page\BusinessChecklistView::$ThermsPopup_CloseButton);
//        $I->wait(4);
//    }
//    
//    public function MeasTypes1_18_1_CheckGrefenTipForMeasure1_Quant_MultipleQduesAndNumber_OnBusinessView(AcceptanceTester $I) {
//        $measDesc = $this->measureDesc;
//        $sumTotal = $this->totalOpt1Upd * $this->thermsCount1 + $this->totalOpt3Upd * $this->thermsCount3 
//                + $this->totalOpt4Upd* $this->thermsCount4 + $this->totalOpt2Upd * $this->thermsCount2;
//        $daily    = $sumTotal/365;
//        
//        $I->reloadPage();
//        $I->wait(2);
//        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
//        $I->wait(3);
//        $I->canSeeElement(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
//        $saving = $I->grabTextFrom(\Page\BusinessChecklistView::Savings_ByDesc($measDesc));
//        $I->comment("Savings: $saving");
//        $I->canSee("Therms:\nannual: $sumTotal\ndaily: $daily", \Page\BusinessChecklistView::Savings_ByDesc($measDesc));
//    }
}
