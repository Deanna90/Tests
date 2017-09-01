<?php


class RecordsAndNeedsRenewalListCest
{
    public $state, $city, $zips, $program, $audSubgroup1_Energy, $audSubgroup1_SolidWaste, $business1, $business2, $business3, $busId1, $busId2, $busId3;
    public $measure1Desc, $measure2Desc, $measure3Desc, $measure4Desc, $measure5Desc;
    public $idMeasure1, $idMeasure2, $idMeasure3, $idMeasure4, $idMeasure5;
    public $measuresDesc_SuccessCreated;
    public $todayDate = [];
    public $statuses = ['core', 'elective', 'elective', 'core', 'elective'];


    public function Help2_1_LoginAsNationalAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    public function Help2_2_CreateState(Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StRecNeedRen");
        $shortName = 'NR';
        
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
    
    public function Help1_7_CreateMeasure2_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure2Desc = $I->GenerateNameOf("Description2");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['q1'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure2 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help1_7_CreateMeasure3_WasteDivertionPopup_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure3Desc = $I->GenerateNameOf("Description3");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::PopupWasteDivertion_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure3 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help1_7_CreateMeasure4_LightingPopup_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure4Desc = $I->GenerateNameOf("Description4");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::PopupLighting_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure4 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help1_7_CreateMeasure5_ThermsPopup_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure5Desc = $I->GenerateNameOf("Description5");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::PopupTherms_QuantitativeSubmeasure;
        $questions      = ['q1'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure5 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help1_6_3_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city = $I->GenerateNameOf("CityNR1");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zips = $I->GenerateZipCode();
        $program = $this->program = $I->GenerateNameOf("ProgNR1");
        
        $I->CreateCity($city, $state, $zips);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    public function Help1_15_CreateChecklistForTier3(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program;
        $programDestination = $this->program;
        $sectorDestination  = 'Office / Retail';
        $tier               = '3';
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
        $busName          = $this->business1 = $I->GenerateNameOf("bus1_NR");
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
        $I->wait(8);
    }
    
//    public function Help1_18_LogOutFromBusiness1(AcceptanceTester $I){
//        $I->LogIn_TRUEorFALSE($I);
//        $I->Logout($I);
//        $I->wait(1);
//    }
//    
//    public function MeasExtension1_17_Business2_Register(Step\Acceptance\Business $I)
//    {
//        $firstName        = $I->GenerateNameOf("firnam");
//        $lastName         = $I->GenerateNameOf("lasnam");
//        $phoneNumber      = $I->GeneratePhoneNumber();
//        $email            = $I->GenerateEmail();
//        $password         = $confirmPassword = 'Qq!1111111';
//        $busName          = $this->business2 = $I->GenerateNameOf("bus2_NR");
//        $busPhone         = $I->GeneratePhoneNumber();
//        $address          = $I->GenerateNameOf("addr");
//        $zip              = $this->zips;
//        $city             = $this->city;
//        $website          = 'fgfh.fh';
//        $busType          = 'Office / Retail';
//        $employees        = '455';
//        $busFootage       = '234';
//        $landscapeFootage = '666';
//        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
//                $employees, $busFootage, $landscapeFootage);
//        $I->wait(8);
//    }
//    
//    public function Help1_18_LogOutFromBusiness2(AcceptanceTester $I){
//        $I->LogIn_TRUEorFALSE($I);
//        $I->Logout($I);
//        $I->wait(1);
//    }
//    
//    public function MeasExtension1_17_Business3_Register(Step\Acceptance\Business $I)
//    {
//        $firstName        = $I->GenerateNameOf("firnam");
//        $lastName         = $I->GenerateNameOf("lasnam");
//        $phoneNumber      = $I->GeneratePhoneNumber();
//        $email            = $I->GenerateEmail();
//        $password         = $confirmPassword = 'Qq!1111111';
//        $busName          = $this->business3 = $I->GenerateNameOf("bus3_NR");
//        $busPhone         = $I->GeneratePhoneNumber();
//        $address          = $I->GenerateNameOf("addr");
//        $zip              = $this->zips;
//        $city             = $this->city;
//        $website          = 'fgfh.fh';
//        $busType          = 'Office / Retail';
//        $employees        = '455';
//        $busFootage       = '234';
//        $landscapeFootage = '666';
//        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
//                $employees, $busFootage, $landscapeFootage);
//        $I->wait(8);
//    }
    
    public function Help1_18_LogOutFromBusiness3_AndAdminLogin(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsAdmin($I);
    }
    
    public function Help1_18_DashboardHelp(AcceptanceTester $I){
        $I->wait(1);
        $I->amOnPage(\Page\Dashboard::URL());
        $I->wait(2);
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
//        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
//        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $url1 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business1), 'href');
        $I->comment("Url1: $url1");
//        $url2 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business2), 'href');
//        $I->comment("Url2: $url2");
//        $url3 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business3), 'href');
//        $I->comment("Url3: $url3");
        $u1 = explode('=', $url1);
//        $u2 = explode('=', $url2);
//        $u3 = explode('=', $url3);
        $this->busId1 = $u1[1];
//        $this->busId2 = $u2[1];
//        $this->busId3 = $u3[1];
//        $I->comment("Business1 id: $this->busId1. Business2 id: $this->busId2. Business3 id: $this->busId3.");
    }
    
    public function Help1_18_NeedRenewalEmpty(AcceptanceTester $I){
        $I->wait(1);
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->wait(2);
        $I->canSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->cantSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->cantSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business2));
        $I->cantSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business3));
    }
    
    public function Help1_18_ChangeStatusToInProcess(AcceptanceTester $I){
        $status           = \Page\ApplicationDetails::InProcessStatus;
        $recognitionDate  = "(not set)";
        $lastModifiedDate = "(not set)";
        $renewalDate      = "(not set)";
        date_default_timezone_set("UTC");
        $this->todayDate  = date("m/d/Y");
        
        $I->wait(1);
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BisinessInfoTab, $status);
        $I->wait(2);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->wait(2);
        $I->canSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->cantSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->wait(2);
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee($status, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1').' span');
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1').' span');
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, '');
    }
    
    public function Help1_18_ChangeStatusToRecognized(AcceptanceTester $I){
        $status           = \Page\BusinessChecklistView::RecognizedStatus;
        $Renew            = strtotime("+1 year", strtotime($this->todayDate));
        $lastModifiedDate = "(not set)";
        $recognitionDate  = $this->todayDate;
        $renewalDate      = date("m/d/Y", $Renew);
        
        $I->wait(1);
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BisinessInfoTab, $status);
        $I->wait(2);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->wait(2);
        $I->canSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->cantSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->wait(2);
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee($status, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    public function Help1_18_ChangeRecognitionDate1(AcceptanceTester $I){
//        $recognitionDate = '10/25/2016'; //9 month before today
//        $renewalDate     = '10/25/2017';
        
        $Recog            = strtotime("-9 months", strtotime($this->todayDate));
        $Renew            = strtotime("+3 months", strtotime($this->todayDate));
        $lastModifiedDate = "(not set)";
        $recognitionDate  = date("m/d/Y", $Recog);
        $renewalDate      = date("m/d/Y", $Renew);
        
        $I->wait(1);
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->fillField(\Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$SaveDateButton_BusinessInfoTab);
        $I->wait(2);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->wait(2);
        $I->cantSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->canSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->canSee($renewalDate, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->wait(2);
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::RecognizedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    public function Help1_18_ChangeRecognitionDate2(AcceptanceTester $I){
//        $recognitionDate = '10/24/2016'; //9 month+1 day before today
//        $renewalDate     = '10/24/2017';
        $Recog            = strtotime("-9 months -1 day", strtotime($this->todayDate));
        $Renew            = strtotime("+3 months -1 day", strtotime($this->todayDate));
        $lastModifiedDate = "(not set)";
        $recognitionDate  = date("m/d/Y", $Recog);
        $renewalDate      = date("m/d/Y", $Renew);
        
        $I->wait(1);
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->fillField(\Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$SaveDateButton_BusinessInfoTab);
        $I->wait(2);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->wait(2);
        $I->cantSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->canSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->canSee($renewalDate, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->wait(2);
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::RecognizedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    public function Help1_18_ChangeRecognitionDate3(AcceptanceTester $I){
//        $recognitionDate = '10/26/2016'; // (9 month-1 day) before today
//        $renewalDate     = '10/26/2017';
        $Recog            = strtotime("-9 months +1 day", strtotime($this->todayDate));
        $Renew            = strtotime("+3 months +1 day", strtotime($this->todayDate));
        $lastModifiedDate = "(not set)";
        $recognitionDate  = date("m/d/Y", $Recog);
        $renewalDate      = date("m/d/Y", $Renew);
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->fillField(\Page\BusinessChecklistView::$RecognitionDateField_BisinessInfoTab, $recognitionDate);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveDateButton_BisinessInfoTab);
        $I->wait(2);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->wait(2);
        $I->canSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->cantSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->wait(2);
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::RecognizedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    public function Help1_18_ChangeRecognitionDate4(AcceptanceTester $I){
        //        $recognitionDate = '07/25/2016'; // 1 year before today
        //        $renewalDate     = '07/25/2017';
        $Recog            = strtotime("-1 year", strtotime($this->todayDate));
        $lastModifiedDate = "(not set)";
        $recognitionDate  = date("m/d/Y", $Recog);
        $renewalDate      = $this->todayDate;
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->fillField(\Page\BusinessChecklistView::$RecognitionDateField_BisinessInfoTab, $recognitionDate);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveDateButton_BisinessInfoTab);
        $I->wait(2);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->wait(2);
        $I->cantSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->canSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->canSee($renewalDate, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->wait(2);
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::RecognizedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    public function Help1_18_ChangeRecognitionDate5(AcceptanceTester $I){
//        $recognitionDate = '07/25/2015'; //2 years before today
//        $renewalDate     = '07/25/2016';
        $Recog            = strtotime("-2 year", strtotime($this->todayDate));
        $Renew            = strtotime("-1 year", strtotime($this->todayDate));
        $lastModifiedDate = "(not set)";
        $recognitionDate  = date("m/d/Y", $Recog);
        $renewalDate      = date("m/d/Y", $Renew);
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->fillField(\Page\BusinessChecklistView::$RecognitionDateField_BisinessInfoTab, $recognitionDate);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveDateButton_BisinessInfoTab);
        $I->wait(2);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->wait(2);
        $I->canSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->cantSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->wait(2);
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::RecognizedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    public function Help1_18_ChangeRecognitionDate6(AcceptanceTester $I){
//        $recognitionDate = '07/20/2015'; // (2years + 1 day) before today
//        $renewalDate     = '07/20/2016';
        $Recog            = strtotime("-2 year -1 day", strtotime($this->todayDate));
        $Renew            = strtotime("-1 year -1 day", strtotime($this->todayDate));
        $lastModifiedDate = "(not set)";
        $recognitionDate  = date("m/d/Y", $Recog);
        $renewalDate      = date("m/d/Y", $Renew);
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->fillField(\Page\BusinessChecklistView::$RecognitionDateField_BisinessInfoTab, $recognitionDate);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveDateButton_BisinessInfoTab);
        $I->wait(2);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->wait(2);
        $I->canSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->cantSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->wait(2);
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::RecognizedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    public function Help1_18_ChangeRecognitionDate7(AcceptanceTester $I){
//        $recognitionDate = '07/26/2015'; // (2years - 1 day) before today
//        $renewalDate     = '07/26/2016';
        $Recog            = strtotime("-2 years +1 day", strtotime($this->todayDate));
        $Renew            = strtotime("-1 year +1 day", strtotime($this->todayDate));
        $lastModifiedDate = "(not set)";
        $recognitionDate  = date("m/d/Y", $Recog);
        $renewalDate      = date("m/d/Y", $Renew);
        
        $I->wait(1);
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->fillField(\Page\BusinessChecklistView::$RecognitionDateField_BisinessInfoTab, $recognitionDate);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveDateButton_BisinessInfoTab);
        $I->wait(2);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->wait(2);
        $I->cantSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->canSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->canSee($renewalDate, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->wait(2);
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::RecognizedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    public function Help1_18_ChangeStatusToInProcessFromRecognized(AcceptanceTester $I){
        $status           = \Page\ApplicationDetails::InProcessStatus;
        $Recog            = strtotime("-2 years +1 day", strtotime($this->todayDate));
        $Renew            = strtotime("-1 year +1 day", strtotime($this->todayDate));
        $lastModifiedDate = "(not set)";
        $recognitionDate  = date("m/d/Y", $Recog);
        $renewalDate      = date("m/d/Y", $Renew);
        
        $I->wait(1);
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BisinessInfoTab, $status);
        $I->wait(3);
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->wait(2);
        $I->canSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->cantSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->wait(2);
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee($status, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    public function Help1_18_ChangeStatusToRecognizedFromInProcess(AcceptanceTester $I){
        $status           = \Page\ApplicationDetails::RecognizedStatus;
        $Recog            = strtotime("-2 years +1 day", strtotime($this->todayDate));
        $Renew            = strtotime("-1 year +1 day", strtotime($this->todayDate));
        $lastModifiedDate = "(not set)";
        $recognitionDate  = date("m/d/Y", $Recog);
        $renewalDate      = date("m/d/Y", $Renew);
        
        $I->wait(1);
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BisinessInfoTab, $status);
        $I->wait(3);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->wait(2);
        $I->cantSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->canSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->canSee($renewalDate, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->wait(2);
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee($status, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    public function Help1_18_ChangeStatusToInProcessFromRecognized2(AcceptanceTester $I){
        $status           = \Page\ApplicationDetails::InProcessStatus;
        $Recog            = strtotime("-2 years +1 day", strtotime($this->todayDate));
        $Renew            = strtotime("-1 year +1 day", strtotime($this->todayDate));
        $lastModifiedDate = "(not set)";
        $recognitionDate  = date("m/d/Y", $Recog);
        $renewalDate      = date("m/d/Y", $Renew);
        
        $I->wait(1);
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BisinessInfoTab, $status);
        $I->wait(3);
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->wait(2);
        $I->canSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->cantSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->wait(2);
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee($status, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    public function Help1_18_ChangeStatusToRecognizedFromInProcess2(AcceptanceTester $I){
        $status           = \Page\ApplicationDetails::RecognizedStatus;
        $Recog            = strtotime("-2 years +1 day", strtotime($this->todayDate));
        $Renew            = strtotime("-1 year +1 day", strtotime($this->todayDate));
        $lastModifiedDate = "(not set)";
        $recognitionDate  = date("m/d/Y", $Recog);
        $renewalDate      = date("m/d/Y", $Renew);
        
        $I->wait(1);
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BisinessInfoTab, $status);
        $I->wait(3);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->wait(2);
        $I->cantSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->canSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->canSee($renewalDate, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->wait(2);
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee($status, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    public function Help1_18_ChangeStatusToRequiresRenewalFromRecognized2(AcceptanceTester $I){
        $status                 = \Page\ApplicationDetails::RequiresRenewalStatus;
        $Recog                  = strtotime("-2 years +1 day", strtotime($this->todayDate));
        $Renew                  = strtotime("-1 year +1 day", strtotime($this->todayDate));
        $lastModifiedDate       = "(not set)";
        $recognitionDateArchive = date("m/d/Y", $Recog);
        $renewalDateArchive     = date("m/d/Y", $Renew);
        $recognitionDate        = '';
        $recognitionDateRecords = "(not set)";
        $renewalDateRecords     = "(not set)";
        
        $I->wait(1);
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BisinessInfoTab, $status);
        $I->wait(3);
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDateArchive);
        $I->comment("Check on Need Renewal list when new checklist wasn't added");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->wait(2);
        $I->cantSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->canSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->canSee($renewalDateArchive, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab when new checklist wasn't added");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->wait(2);
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::RecognizedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDateArchive, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDateArchive, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->comment("Check on Business Info Tab when new checklist wasn't added");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->canSeeOptionIsSelected(Page\ApplicationDetails::$StatusSelect_BusinessInfoTab, Page\ApplicationDetails::RecognizedStatus);
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDateArchive);
        
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BisinessInfoTab, $status);
        $I->wait(3);
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDateArchive);
        $I->click(Page\ApplicationDetails::$AddNewChecklistButton_BusinessInfoTab);
        $I->wait(2);
        $I->comment("Check on Need Renewal list when new checklist was added");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->wait(2);
        $I->cantSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->canSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->canSee($renewalDateArchive, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab when new checklist was added");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->wait(2);
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::InProcessStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDateRecords, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDateRecords, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('2'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('2'));
        $I->canSee($recognitionDateArchive, Page\ApplicationDetails::RecognitionLine_RecordsTab('2'));
        $I->canSee($renewalDateArchive, Page\ApplicationDetails::RenewalLine_RecordsTab('2'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('2'));
        $I->comment("Check on Business Info Tab when new checklist was added");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->canSeeOptionIsSelected(Page\ApplicationDetails::$StatusSelect_BusinessInfoTab, Page\ApplicationDetails::InProcessStatus);
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    public function Help1_18_ChangeStatusToRecognizedFromInProcess_Recertification(AcceptanceTester $I){
        $status                 = \Page\ApplicationDetails::RecognizedStatus;
        $RecogArchive           = strtotime("-2 years +1 day", strtotime($this->todayDate));
        $RenewArchive           = strtotime("-1 year +1 day", strtotime($this->todayDate));
        $lastModifiedDate       = "(not set)";
        
        $recognitionDateArchive = date("m/d/Y", $RecogArchive);
        $renewalDateArchive     = date("m/d/Y", $RenewArchive);
        
        $RenewDefault           = strtotime("+1 year", strtotime($this->todayDate));
        $recognitionDateDefault = $this->todayDate;
        $renewalDateDefault     = date("m/d/Y", $RenewDefault);
        
        $Recog                  = strtotime("-1 year -6 months", strtotime($this->todayDate));
        $Renew                  = strtotime("-6 months", strtotime($this->todayDate));
        $recognitionDate        = date("m/d/Y", $Recog);
        $renewalDate            = date("m/d/Y", $Renew);
        
        $I->wait(1);
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BisinessInfoTab, $status);
        $I->wait(3);
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDateDefault);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->wait(2);
        $I->canSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->cantSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->wait(2);
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee($status, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDateDefault, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDateDefault, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('2'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('2'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('2'));
        $I->canSee($recognitionDateArchive, Page\ApplicationDetails::RecognitionLine_RecordsTab('2'));
        $I->canSee($renewalDateArchive, Page\ApplicationDetails::RenewalLine_RecordsTab('2'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('2'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDateDefault);
        $I->fillField(\Page\BusinessChecklistView::$RecognitionDateField_BisinessInfoTab, $recognitionDate);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveDateButton_BisinessInfoTab);
        $I->wait(2);
        $I->comment("Check on Need Renewal list after recognition date change");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->wait(2);
        $I->cantSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->canSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->canSee($renewalDate, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab after recognition date change");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->wait(2);
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::RecognizedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('2'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('2'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('2'));
        $I->canSee($recognitionDateArchive, Page\ApplicationDetails::RecognitionLine_RecordsTab('2'));
        $I->canSee($renewalDateArchive, Page\ApplicationDetails::RenewalLine_RecordsTab('2'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('2'));
        $I->comment("Check on Business Info Tab after recognition date change");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    public function ManageNeedRenewalApplicantEmail(Step\Acceptance\Notification $I){
        $subject = "New subjject (need renewal edited)";
        $body    = "Neew body value (need renewal edited)";
        
        $I->wait(1);
        $app = $I->GetApplicantEmailTextOnPageInList(Page\ApplicantEmailTextList::RequiresRenewal_Trigger, 'All');
        $applicantId = $app['id'];
        $I->ManageApplicantEmailText($applicantId, $subject, $body);
    }
    
    public function CheckRenotifyFunctionOnNeedRenewalListPage(AcceptanceTester $I){
        $RecogArchive           = strtotime("-2 years +1 day", strtotime($this->todayDate));
        $RenewArchive           = strtotime("-1 year +1 day", strtotime($this->todayDate));
        $lastModifiedDate       = "(not set)";
        $recognitionDateArchive = date("m/d/Y", $RecogArchive);
        $renewalDateArchive     = date("m/d/Y", $RenewArchive);
        
        $Recog                  = strtotime("-1 year -6 months", strtotime($this->todayDate));
        $Renew                  = strtotime("-6 months", strtotime($this->todayDate));
        $recognitionDate        = date("m/d/Y", $Recog);
        $renewalDate            = date("m/d/Y", $Renew);
        
        $subject                = "New subjject (need renewal edited)";
        $body                   = "Neew body value (need renewal edited)";
        
        $I->wait(1);
        $I->comment("Renotify Business1 on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->wait(2);
        $I->click(\Page\NeedRenewalList::RenotifyButtonLine_ByBusName($this->business1));
        $I->wait(2);
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Communication($this->busId1));
        $I->wait(2);
        $I->canSee($this->business1, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
        $I->canSee('2 seconds ago', Page\ApplicationDetails::SentLine_CommunicationTab('1'));
        $I->click(Page\ApplicationDetails::ViewButtonLine_CommunicationTab('1'));
        $I->wait(2);
        $I->canSee("Inbox - $subject", Page\CommunicationsView::$Title);
        $I->canSee($body, Page\CommunicationsView::PreviousMessage('1'));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->wait(2);
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::RecognizedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('2'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('2'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('2'));
        $I->canSee($recognitionDateArchive, Page\ApplicationDetails::RecognitionLine_RecordsTab('2'));
        $I->canSee($renewalDateArchive, Page\ApplicationDetails::RenewalLine_RecordsTab('2'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('2'));
    }
    
    public function CheckExtend3MonthsFunctionOnNeedRenewalListPage(AcceptanceTester $I){
        $RecogArchive           = strtotime("-2 years +1 day", strtotime($this->todayDate));
        $RenewArchive           = strtotime("-1 year +1 day", strtotime($this->todayDate));
        $lastModifiedDate       = "(not set)";
        $recognitionDateArchive = date("m/d/Y", $RecogArchive);
        $renewalDateArchive     = date("m/d/Y", $RenewArchive);
        
        $Recog                  = strtotime("-1 year -6 months", strtotime($this->todayDate));
        $Renew                  = strtotime("-6 months", strtotime($this->todayDate));
        $recognitionDate        = date("m/d/Y", $Recog);
        $renewalDate            = date("m/d/Y", $Renew);
        
        $RenewPlus3Months       = strtotime("+3 months", strtotime($renewalDate));
        $renewalDatePlus3Months = date("m/d/Y", $RenewPlus3Months);
        
        $RenewPlus6Months       = strtotime("+3 months", strtotime($renewalDatePlus3Months));
        $renewalDatePlus6Months = date("m/d/Y", $RenewPlus6Months);
        
        $RenewPlus9Months       = strtotime("+3 months", strtotime($renewalDatePlus6Months));
        $renewalDatePlus9Months = date("m/d/Y", $RenewPlus9Months);
        
        $I->wait(1);
        $I->comment("1. Extend 3 Months for Business1 on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->wait(3);
        $I->click(\Page\NeedRenewalList::Extend3MonthButtonLine_ByBusName($this->business1));
        $I->wait(4);
        $I->canSee($renewalDatePlus3Months, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->wait(2);
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::RecognizedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDatePlus3Months, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('2'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('2'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('2'));
        $I->canSee($recognitionDateArchive, Page\ApplicationDetails::RecognitionLine_RecordsTab('2'));
        $I->canSee($renewalDateArchive, Page\ApplicationDetails::RenewalLine_RecordsTab('2'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('2'));
        
        $I->wait(1);
        $I->comment("2. Extend 3 Months for Business1 on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->wait(2);
        $I->click(\Page\NeedRenewalList::Extend3MonthButtonLine_ByBusName($this->business1));
        $I->wait(4);
        $I->canSee($renewalDatePlus6Months, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->wait(2);
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::RecognizedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDatePlus6Months, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('2'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('2'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('2'));
        $I->canSee($recognitionDateArchive, Page\ApplicationDetails::RecognitionLine_RecordsTab('2'));
        $I->canSee($renewalDateArchive, Page\ApplicationDetails::RenewalLine_RecordsTab('2'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('2'));
        
        $I->wait(1);
        $I->comment("3. Extend 3 Months for Business1 on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->wait(2);
        $I->click(\Page\NeedRenewalList::Extend3MonthButtonLine_ByBusName($this->business1));
        $I->wait(4);
        $I->comment("Maybe fail here if today is 29-31 day in month. It's okay. Fail on next row:");
        $I->canSee($renewalDatePlus9Months, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->wait(2);
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::RecognizedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDatePlus9Months, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('2'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('2'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('2'));
        $I->canSee($recognitionDateArchive, Page\ApplicationDetails::RecognitionLine_RecordsTab('2'));
        $I->canSee($renewalDateArchive, Page\ApplicationDetails::RenewalLine_RecordsTab('2'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('2'));
    }
    
    public function CheckDecertifyFunctionOnNeedRenewalListPage(AcceptanceTester $I){
        $RecogArchive           = strtotime("-2 years +1 day", strtotime($this->todayDate));
        $RenewArchive           = strtotime("-1 year +1 day", strtotime($this->todayDate));
        $lastModifiedDate       = "(not set)";
        $recognitionDateArchive = date("m/d/Y", $RecogArchive);
        $renewalDateArchive     = date("m/d/Y", $RenewArchive);
        
        $Recog                  = strtotime("-1 year -6 months", strtotime($this->todayDate));
        $Renew                  = strtotime("-6 months", strtotime($this->todayDate));
        $recognitionDate        = date("m/d/Y", $Recog);
        $renewalDate            = date("m/d/Y", $Renew);
        
        $I->amOnPage(Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(1);
        $I->fillField(\Page\BusinessChecklistView::$RecognitionDateField_BisinessInfoTab, $recognitionDate);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveDateButton_BisinessInfoTab);
        $I->wait(2);
        $I->comment("Decertify from Need Renewal list page");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->wait(2);
        $I->click(\Page\NeedRenewalList::DecertifyButtonLine_ByBusName($this->business1));
        $I->wait(4);
        $I->cantSeeElement(Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->canSeeElement(Page\NeedRenewalList::$EmptyListLabel);
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->wait(2);
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::DecertifiedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('2'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('2'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('2'));
        $I->canSee($recognitionDateArchive, Page\ApplicationDetails::RecognitionLine_RecordsTab('2'));
        $I->canSee($renewalDateArchive, Page\ApplicationDetails::RenewalLine_RecordsTab('2'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('2'));
        
        $I->wait(1);
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(2);
        $I->canSeeOptionIsSelected(Page\ApplicationDetails::$StatusSelect_BusinessInfoTab, Page\ApplicationDetails::DecertifiedStatus);
        $I->comment("Check on Dashboard");
        $I->amOnPage(\Page\Dashboard::URL());
        $I->wait(2);
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmisiion_Filter));
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
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recertification_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Disqualified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        $I->click(\Page\Dashboard::FilterItem_ByFilterName(\Page\Dashboard::All_Filter));
        $I->wait(2);
        $I->canSee(\Page\Dashboard::Decertified_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
        $I->cantSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business1));
        $I->cantSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business1));
    }
}