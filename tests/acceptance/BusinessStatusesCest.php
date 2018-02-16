<?php


class BusinessStatusesCest
{
    public $state, $city, $zips, $county, $program, $audSubgroup1_Energy, $audSubgroup1_SolidWaste, $business1, $business2, $business3, $busId1, $busId2, $busId3;
    public $measure1Desc, $measure2Desc, $measure3Desc, $measure4Desc, $measure5Desc;
    public $idMeasure1, $idMeasure2, $idMeasure3, $idMeasure4, $idMeasure5;
    public $measuresDesc_SuccessCreated;
    public $statuses = ['core', 'elective', 'elective', 'core', 'elective'];


    public function Help2_1_LoginAsNationalAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    public function Help2_2_CreateState(Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StBusStatuses");
        $shortName = 'BS';
        
        $I->CreateState($name, $shortName);
    }
    
    public function Help2_3_SelectDefaultState(AcceptanceTester $I)
    {
        $I->wait(2);
        $I->SelectDefaultState($I, $this->state);
    }
    
    public function Help2_4_CreateAuditSubGroupForEnergyGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name      = $this->audSubgroup1_Energy = $I->GenerateNameOf("EnAudSub1");
        $auditGroup = Page\AuditGroupList::Energy_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->wait(3);
    }
    
    public function Help2_4_CreateAuditSubGroupsForSolidWasteGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup1_SolidWaste = $I->GenerateNameOf("SolWasAudSub1");
        $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->wait(3);
    }
    
    public function Help1_7_CreateMeasure1_MultipleQuesAndNumber_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure1Desc = $I->GenerateNameOf("Description1");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::MultipleQuestionAndNumber_QuantitativeSubmeasure;
        $questions      = ['question1', 'question2'];
        $answers        = ['23'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
//    public function Help1_7_CreateMeasure2_Number_Quant(\Step\Acceptance\Measure $I) {
//        $desc           = $this->measure2Desc = $I->GenerateNameOf("Description2");
//        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
//        $auditSubgroup  = $this->audSubgroup1_Energy;
//        $quantitative   = 'yes';
//        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
//        $questions      = ['q1'];
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(3);
//        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
//        $this->idMeasure2 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
//        $this->measuresDesc_SuccessCreated[] = $desc;
//    }
//    
//    public function Help1_7_CreateMeasure3_WasteDivertionPopup_Quant(\Step\Acceptance\Measure $I) {
//        $desc           = $this->measure3Desc = $I->GenerateNameOf("Description3");
//        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
//        $auditSubgroup  = $this->audSubgroup1_Energy;
//        $quantitative   = 'yes';
//        $submeasureType = \Step\Acceptance\Measure::PopupWasteDivertion_QuantitativeSubmeasure;
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(3);
//        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
//        $this->idMeasure3 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
//        $this->measuresDesc_SuccessCreated[] = $desc;
//    }
//    
//    public function Help1_7_CreateMeasure4_LightingPopup_Quant(\Step\Acceptance\Measure $I) {
//        $desc           = $this->measure4Desc = $I->GenerateNameOf("Description4");
//        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
//        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
//        $quantitative   = 'yes';
//        $submeasureType = \Step\Acceptance\Measure::PopupLighting_QuantitativeSubmeasure;
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(3);
//        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
//        $this->idMeasure4 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
//        $this->measuresDesc_SuccessCreated[] = $desc;
//    }
//    
//    public function Help1_7_CreateMeasure5_ThermsPopup_Quant(\Step\Acceptance\Measure $I) {
//        $desc           = $this->measure5Desc = $I->GenerateNameOf("Description5");
//        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
//        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
//        $quantitative   = 'yes';
//        $submeasureType = \Step\Acceptance\Measure::PopupTherms_QuantitativeSubmeasure;
//        $questions      = ['q1'];
//        
//        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->wait(3);
//        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
//        $this->idMeasure5 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
//        $this->measuresDesc_SuccessCreated[] = $desc;
//    }
    
    //-------------------------------Create county------------------------------
    
    
    public function Help_CreateCounty(\Step\Acceptance\County $I) {
        $name    = $this->county = $I->GenerateNameOf("County");
        $state   = $this->state;
        
        $I->CreateCounty($name, $state);
    }
    
    public function Help1_6_3_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city = $I->GenerateNameOf("CityBS1");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zips = $I->GenerateZipCode();
        $program = $this->program = $I->GenerateNameOf("ProgBS1");
        
        $I->CreateCity($city, $state, $zips, $this->county);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    public function Help1_15_CreateChecklistForTier2(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program;
        $programDestination = $this->program;
        $sectorDestination  = 'Office / Retail';
        $tier               = '2';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statuses);
        $I->reloadPage();
        $I->PublishChecklistStatus();
    }
    
    public function Help1_16_LogOut(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->Logout($I);
    }
    
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------Business register-----------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function MeasExtension1_17_Business1_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business1 = $I->GenerateNameOf("bus1_BS");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(12);
        $I->canSeeInCurrentUrl(\Page\RegistrationStarted::$URL_Started);
    }
    
    public function Help1_18_LogOutFromBusiness1(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->wait(1);
    }
    
    public function MeasExtension1_17_Business2_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business2 = $I->GenerateNameOf("bus2_BS");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(12);
        $I->canSeeInCurrentUrl(\Page\RegistrationStarted::$URL_Started);
    }
    
    public function Help1_18_LogOutFromBusiness2(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->wait(1);
    }
    
    public function MeasExtension1_17_Business3_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business3 = $I->GenerateNameOf("bus3_BS");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(12);
        $I->canSeeInCurrentUrl(\Page\RegistrationStarted::$URL_Started);
    }
    
    public function Help1_18_LogOutFromBusiness3_AndAdminLogin(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsAdmin($I);
    }
    
    public function Help1_18_Dashboard(AcceptanceTester $I){
        $I->wait(1);
        $I->amOnPage(\Page\Dashboard::URL());
        $I->wait(2);
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        $url1 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business1), 'href');
        $I->comment("Url1: $url1");
        $url2 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business2), 'href');
        $I->comment("Url2: $url2");
        $url3 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business3), 'href');
        $I->comment("Url3: $url3");
        $u1 = explode('=', $url1);
        $u2 = explode('=', $url2);
        $u3 = explode('=', $url3);
        $this->busId1 = $u1[1];
        $this->busId2 = $u2[1];
        $this->busId3 = $u3[1];
        $I->comment("Business1 id: $this->busId1. Business2 id: $this->busId2. Business3 id: $this->busId3.");
    }
    
    public function Help1_18_Dashboard1(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::NonresponsiveStatus;
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->cantSee(\Page\BusinessChecklistView::DecertifiedStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(2);
        $I->amOnPage(\Page\Dashboard::URL());
        $I->wait(2);
        $I->cantSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('2', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
    }
    
    public function Help1_18_Dashboard2(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::NotSuitableStatus;
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->cantSee(\Page\BusinessChecklistView::DecertifiedStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(2);
        $I->amOnPage(\Page\Dashboard::URL());
        $I->wait(2);
        $I->cantSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('2', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
    }
    
    public function Help1_18_Dashboard3(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::DisqualifiedStatus;
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->cantSee(\Page\BusinessChecklistView::DecertifiedStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(2);
        $I->amOnPage(\Page\Dashboard::URL());
        $I->wait(2);
        $I->cantSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('2', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
    }
    
    public function Help1_18_Dashboard4(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::InProcessStatus;
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->cantSee(\Page\BusinessChecklistView::DecertifiedStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(2);
        $I->amOnPage(\Page\Dashboard::URL());
        $I->wait(2);
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
    }
    
    public function Help1_18_Dashboard5(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::MovedClosedStatus;
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->cantSee(\Page\BusinessChecklistView::DecertifiedStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(2);
        $I->amOnPage(\Page\Dashboard::URL());
        $I->wait(2);
        $I->cantSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('2', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
    }
    
    public function Help1_18_Dashboard6(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::RequiresRenewalStatus;
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->cantSee(\Page\BusinessChecklistView::DecertifiedStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(2);
        $I->click(\Page\BusinessChecklistView::$AddNewChecklistButton_BusinessInfoTab);
        $I->wait(8);
        $I->amOnPage(\Page\Dashboard::URL());
        $I->wait(2);
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
    }
    
    public function Help1_18_Dashboard7(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::RecognizedStatus;
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->cantSee(\Page\BusinessChecklistView::DecertifiedStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(2);
        $I->amOnPage(\Page\Dashboard::URL());
        $I->wait(2);
        $I->cantSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('2', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
    }
    
    //--------------------------Business was certified--------------------------
    
    public function Help1_18_Dashboard8(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::RequiresRenewalStatus;
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->canSee(\Page\BusinessChecklistView::DecertifiedStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(2);
        $I->click(\Page\BusinessChecklistView::$AddNewChecklistButton_BusinessInfoTab);
        $I->wait(8);
        $I->amOnPage(\Page\Dashboard::URL());
        $I->wait(2);
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
        $I->canSee('1', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
    }
    
    public function Help1_18_Dashboard9(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::DisqualifiedStatus;
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->cantSee(\Page\BusinessChecklistView::DecertifiedStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(2);
        $I->amOnPage(\Page\Dashboard::URL());
        $I->wait(2);
        $I->cantSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('2', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
    }
    
    public function Help1_18_Dashboard10(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::NonresponsiveStatus;
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->cantSee(\Page\BusinessChecklistView::DecertifiedStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(2);
        $I->amOnPage(\Page\Dashboard::URL());
        $I->wait(2);
        $I->cantSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('2', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
    }
    
    public function Help1_18_Dashboard11(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::MovedClosedStatus;
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->cantSee(\Page\BusinessChecklistView::DecertifiedStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(2);
        $I->amOnPage(\Page\Dashboard::URL());
        $I->wait(2);
        $I->cantSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('2', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
    }
    
    //--------------------------Business was certified--------------------------
    
    public function Help1_18_Dashboard12(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::RequiresRenewalStatus;
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->cantSee(\Page\BusinessChecklistView::DecertifiedStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(2);
        $I->click(\Page\BusinessChecklistView::$AddNewChecklistButton_BusinessInfoTab);
        $I->wait(8);
        $I->amOnPage(\Page\Dashboard::URL());
        $I->wait(2);
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
        $I->canSee('1', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
    }
    
    public function Help1_18_Dashboard13(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::NotSuitableStatus;
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->cantSee(\Page\BusinessChecklistView::DecertifiedStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(2);
        $I->amOnPage(\Page\Dashboard::URL());
        $I->wait(2);
        $I->cantSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('2', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
    }
    
    public function Help1_18_Dashboard14(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::InProcessStatus;
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->cantSee(\Page\BusinessChecklistView::DecertifiedStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(2);
        $I->amOnPage(\Page\Dashboard::URL());
        $I->wait(2);
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
        $I->canSee('1', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
    }
    
    public function Help1_18_Dashboard15(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::RecognizedStatus;
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->cantSee(\Page\BusinessChecklistView::DecertifiedStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(2);
        $I->amOnPage(\Page\Dashboard::URL());
        $I->wait(2);
        $I->cantSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('2', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
    }
    
    public function Help1_18_Dashboard16(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::RequiresRenewalStatus;
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->canSee(\Page\BusinessChecklistView::DecertifiedStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(2);
        $I->click(\Page\BusinessChecklistView::$AddNewChecklistButton_BusinessInfoTab);
        $I->wait(8);
        $I->amOnPage(\Page\Dashboard::URL());
        $I->wait(2);
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
        $I->canSee('1', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
    }
    
    public function Help1_18_Dashboard17(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::RecognizedStatus;
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->cantSee(\Page\BusinessChecklistView::DecertifiedStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(2);
        $I->amOnPage(\Page\Dashboard::URL());
        $I->wait(2);
        $I->cantSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('2', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
    }
    
    public function Help1_18_Dashboard18(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::InProcessStatus;
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->canSee(\Page\BusinessChecklistView::DecertifiedStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(2);
        $I->amOnPage(\Page\Dashboard::URL());
        $I->wait(2);
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
        $I->canSee('1', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
    }
    
    public function Help1_18_Dashboard19(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::RecognizedStatus;
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->cantSee(\Page\BusinessChecklistView::DecertifiedStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(2);
        $I->amOnPage(\Page\Dashboard::URL());
        $I->wait(2);
        $I->cantSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('2', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
    }
    
    public function Help1_18_Dashboard20(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::RequiresRenewalStatus;
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->canSee(\Page\BusinessChecklistView::DecertifiedStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(2);
        $I->click(\Page\BusinessChecklistView::$AddNewChecklistButton_BusinessInfoTab);
        $I->wait(8);
        $I->amOnPage(\Page\Dashboard::URL());
        $I->wait(2);
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
        $I->canSee('1', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
    }
    
    public function Help1_18_Dashboard21(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::RequiresRenewalStatus;
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->cantSee(\Page\BusinessChecklistView::DecertifiedStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(2);
        $I->click(\Page\BusinessChecklistView::$AddNewChecklistButton_BusinessInfoTab);
        $I->wait(8);
        $I->amOnPage(\Page\Dashboard::URL());
        $I->wait(2);
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
        $I->canSee('1', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
    }
    
    public function Help1_18_Dashboard22(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::RecognizedStatus;
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->cantSee(\Page\BusinessChecklistView::DecertifiedStatus, \Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab.' option');
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(2);
        $I->amOnPage(\Page\Dashboard::URL());
        $I->wait(2);
        $I->cantSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('2', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
    }
    
    public function Help1_18_Dashboard23(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::DecertifiedStatus;
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(2);
        $I->amOnPage(\Page\Dashboard::URL());
        $I->wait(2);
        $I->cantSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('2', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
    }
    
    public function DeleteBusiness1(AcceptanceTester $I){
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->click(\Page\BusinessChecklistView::$LeftMenu_DeleteApplicationButton);
        $I->wait(3);
        $I->click(".sweet-alert .confirm");
        $I->wait(5);
        $I->canSeeInCurrentUrl(Page\Dashboard::URL());
    }
    
    public function CheckFilterAfterBusiness1Deleting(AcceptanceTester $I){
        $I->wait(1);
        $I->amOnPage(\Page\Dashboard::URL());
        $I->wait(2);
        $I->cantSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->canSee('2', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('2', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
    }
    
    public function DeleteProgram(AcceptanceTester $I){
        $I->amOnPage(\Page\ProgramList::URL());
        $I->wait(2);
        $I->click(Page\ProgramList::DeleteButtonLine('1'));
        $I->wait(3);
        $I->acceptPopup();
        $I->wait(5);
    }
    
    public function CheckFilterAfterProgramDeleting(AcceptanceTester $I){
        $I->wait(1);
        $I->amOnPage(\Page\Dashboard::URL());
        $I->wait(2);
        $I->cantSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $I->cantSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $I->cantSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
    }
}
