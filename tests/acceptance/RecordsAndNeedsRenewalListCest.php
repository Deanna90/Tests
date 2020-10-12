<?php


class RecordsAndNeedsRenewalListCest
{
    public $state, $city1, $county, $zip1, $program1, $city2, $zip2, $program2, $audSubgroup1_Energy, $audSubgroup1_SolidWaste, $business1, $business2, 
           $business3, $business4, $business5, $busId1, $busId2, $busId3, $busId4, $busId5;
    public $measure1Desc, $measure2Desc, $measure3Desc, $measure4Desc, $measure5Desc;
    public $idMeasure1, $idMeasure2, $idMeasure3, $idMeasure4, $idMeasure5;
    public $measuresDesc_SuccessCreated;
    public $todayDate = [];
    public $statuses = ['core', 'elective', 'elective', 'core', 'elective'];
    public $emailStateAdmin, $emailCoordinator;
    public $password = 'Qq!1111111';
    public $idStateAdmin, $idCoordinator;


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
        $name = $this->state = $I->GenerateNameOf("StRecNeedRen");
        $shortName = 'NR';
        
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
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateMeasure1_MultipleQuesAndNumber_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure1Desc = $I->GenerateNameOf("Description1");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::MultipleQuestionAndNumber_QuantitativeSubmeasure;
        $questions      = ['question1', 'question2'];
        $answers        = ['23'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions, $answers);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
//    public function Help_CreateMeasure2_Number_Quant(\Step\Acceptance\Measure $I) {
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
//    public function Help_CreateMeasure3_WasteDivertionPopup_Quant(\Step\Acceptance\Measure $I) {
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
//    public function Help_CreateMeasure4_LightingPopup_Quant(\Step\Acceptance\Measure $I) {
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
//    public function Help_CreateMeasure5_ThermsPopup_Quant(\Step\Acceptance\Measure $I) {
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
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city1 = $I->GenerateNameOf("CityNR1");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip1 = $I->GenerateZipCode();
        $program = $this->program1 = $I->GenerateNameOf("ProgNR1");
        
        $I->CreateCity($city, $state, $zips, $this->county);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_CreateCity2_And_Program2(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city2 = $I->GenerateNameOf("CityNR2");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip2 = $I->GenerateZipCode();
        $program = $this->program2 = $I->GenerateNameOf("ProgNR2");
        
        $I->CreateCity($city, $state, $zips, $this->county);
        $Y->CreateProgram($program, $state, $cityArr, $cycle = '2 years');
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
        $I->ManageSectorChecklist($this->measuresDesc_SuccessCreated, $this->statuses);
        $I->PublishSectorChecklistStatus();
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
        $I->reloadPage();
        $I->waitPageLoad();
        $I->click(Page\UserUpdate::$AddStateButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
        $I->wait(1);
        $I->waitPageLoad();
        $stateAdmin = $I->GetUserOnPageInList($email, $userType);
        $this->idStateAdmin = $stateAdmin['id'];
    }
    
    //----------------------------Create Coordinator----------------------------
    
    /**
     * @group coordinator
     */
    
    public function CreateCoordinatorUser_ForProgram1(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::coordinatorType;
        $email     = $this->emailCoordinator = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnam');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
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
    
    public function Help_LogOut(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->Logout($I);
    }
    
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------Business register-----------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
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
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business1 = $I->GenerateNameOf("bus1_NR");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip1;
        $city             = $this->city1;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();
    }
    
//    public function Help1_18_LogOutFromBusiness1(AcceptanceTester $I){
//        $I->LogIn_TRUEorFALSE($I);
//        $I->Logout($I);
//        $I->wait(1);
//    }
    
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
//        
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
//        
//        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
//                $employees, $busFootage, $landscapeFootage);
//        $I->wait(8);
//    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOutFromBusiness3_AndAdminLogin(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->LoginAsAdmin($I);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_DashboardHelp(AcceptanceTester $I){
        $I->amOnPage(\Page\Dashboard::URL());
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $url1 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business1), 'href');
        $I->comment("Url1: $url1");
        $u1 = explode('=', $url1);
        $this->busId1 = $u1[1];
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function NeedRenewalListIsEmpty(AcceptanceTester $I){
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->canSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->cantSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->cantSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business2));
        $I->cantSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business3));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeStatusToInProcess(AcceptanceTester $I){
        $status           = \Page\ApplicationDetails::InProcessStatus;
        $recognitionDate  = "(not set)";
        $lastModifiedDate = "(not set)";
        $renewalDate      = "(not set)";
        date_default_timezone_set("UTC");
        $this->todayDate  = date("m/d/Y");
        
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->canSeeOptionIsSelected(\Page\ApplicationDetails::$StatusSelect_BusinessInfoTab, $status);
        //$I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->cantSee(\Page\ApplicationDetails::RequiresRenewalStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        $I->cantSee(\Page\ApplicationDetails::RecertifyStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        $I->wait(2);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->canSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->cantSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee($status, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1').' span');
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1').' span');
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, '');
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckFilterOnDashboard1_ToInProcess(AcceptanceTester $I){
        $I->comment("Check on Dashboard");
        $I->amOnPage(\Page\Dashboard::URL());
        $I->cantSeeElement(\Page\Dashboard::$NeedRenewalBusinessesAlert);
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        
        $I->cantSeeElement(\Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        $I->click(\Page\Dashboard::FilterItem_ByFilterName(\Page\Dashboard::All_Filter));
        $I->wait(2);
        $I->waitForElement("label[data-key=all].active", 60);
        $I->canSee(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
        $I->canSee("(not set)", \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business1));
        $I->cantSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business1));
        $I->cantSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business1));
    }
        
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeStatusToRecognized(AcceptanceTester $I){
        $status           = \Page\BusinessChecklistView::RecognizedStatus;
        $Renew            = strtotime("+1 year", strtotime($this->todayDate));
        $lastModifiedDate = "(not set)";
        $recognitionDate  = $this->todayDate;
        $renewalDate      = date("m/d/Y", $Renew);
        
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(2);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->canSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->cantSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee($status, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckFilterOnDashboard2_ToRecognized(AcceptanceTester $I){
        $recognitionDate  = $this->todayDate;
        
        $I->comment("Check on Dashboard");
        $I->amOnPage(\Page\Dashboard::URL());
        $I->cantSeeElement(\Page\Dashboard::$NeedRenewalBusinessesAlert);
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        $I->click(\Page\Dashboard::FilterItem_ByFilterName(\Page\Dashboard::All_Filter));
        $I->wait(2);
        $I->waitForElement("label[data-key=all].active", 60);
        $I->canSee(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business1));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeRecognitionDate1(AcceptanceTester $I){
//        $recognitionDate = '10/25/2016'; //9 month before today
//        $renewalDate     = '10/25/2017';
        
        $Recog            = strtotime("-9 months", strtotime($this->todayDate));
        $lastModifiedDate = "(not set)";
        $recognitionDate  = date("m/d/Y", $Recog);
        $Renew            = strtotime("+12 months", strtotime($recognitionDate));
        $renewalDate      = date("m/d/Y", $Renew);
        
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        
        $I->cantSee(\Page\ApplicationDetails::RequiresRenewalStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        $I->canSee(\Page\ApplicationDetails::RecertifyStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        
        $I->fillField(\Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$SaveDateButton_BusinessInfoTab);
        $I->wait(2);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->cantSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->canSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->canSee($renewalDate, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::RecognizedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckFilterOnDashboard3_ChangeRecognitionDate1(AcceptanceTester $I){
        $Recog            = strtotime("-9 months", strtotime($this->todayDate));
        $recognitionDate  = date("m/d/Y", $Recog);
        
        $I->comment("Check on Dashboard");
        $I->amOnPage(\Page\Dashboard::URL());
//        $I->canSee("Alert you have 1 companies", \Page\Dashboard::$NeedRenewalBusinessesAlert);
        $I->cantSeeElement(\Page\Dashboard::$NeedRenewalBusinessesAlert);
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("1", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        $I->click(\Page\Dashboard::FilterItem_ByFilterName(\Page\Dashboard::All_Filter));
        $I->wait(2);
        $I->waitForElement("label[data-key=all].active", 60);
        $I->canSee(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business1));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeRecognitionDate2(AcceptanceTester $I){
//        $recognitionDate = '10/24/2016'; //9 month+1 day before today
//        $renewalDate     = '10/24/2017';
        $Recog            = strtotime("-9 months -1 day", strtotime($this->todayDate));
        $Renew            = strtotime("+3 months -1 day", strtotime($this->todayDate));
        $lastModifiedDate = "(not set)";
        $recognitionDate  = date("m/d/Y", $Recog);
        $renewalDate      = date("m/d/Y", $Renew);
        
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        
        $I->cantSee(\Page\ApplicationDetails::RequiresRenewalStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        $I->canSee(\Page\ApplicationDetails::RecertifyStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        
        $I->fillField(\Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$SaveDateButton_BusinessInfoTab);
        $I->wait(2);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->cantSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->canSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->canSee($renewalDate, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::RecognizedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckFilterOnDashboard4_ChangeRecognitionDate2(AcceptanceTester $I){
        $Recog            = strtotime("-9 months -1 day", strtotime($this->todayDate));
        $recognitionDate  = date("m/d/Y", $Recog);
        
        $I->comment("Check on Dashboard");
        $I->amOnPage(\Page\Dashboard::URL());
//        $I->canSee("Alert you have 1 companies", \Page\Dashboard::$NeedRenewalBusinessesAlert);
        $I->cantSeeElement(\Page\Dashboard::$NeedRenewalBusinessesAlert);
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("1", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        $I->click(\Page\Dashboard::FilterItem_ByFilterName(\Page\Dashboard::All_Filter));
        $I->wait(2);
        $I->waitForElement("label[data-key=all].active", 60);
        $I->canSee(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business1));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeRecognitionDate3(AcceptanceTester $I){
//        $recognitionDate = '10/26/2016'; // (9 month-1 day) before today
//        $renewalDate     = '10/26/2017';
        $Recog            = strtotime("-9 months +1 day", strtotime($this->todayDate));
        $Renew            = strtotime("+3 months +1 day", strtotime($this->todayDate));
        $lastModifiedDate = "(not set)";
        $recognitionDate  = date("m/d/Y", $Recog);
        $renewalDate      = date("m/d/Y", $Renew);
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        
        $I->cantSee(\Page\ApplicationDetails::RequiresRenewalStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        $I->canSee(\Page\ApplicationDetails::RecertifyStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        
        $I->fillField(\Page\BusinessChecklistView::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveDateButton_BusinessInfoTab);
        $I->wait(2);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->canSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->cantSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::RecognizedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckFilterOnDashboard5_ChangeRecognitionDate3(AcceptanceTester $I){
        $Recog            = strtotime("-9 months +1 day", strtotime($this->todayDate));
        $recognitionDate  = date("m/d/Y", $Recog);
        
        $I->comment("Check on Dashboard");
        $I->amOnPage(\Page\Dashboard::URL());
        $I->cantSeeElement(\Page\Dashboard::$NeedRenewalBusinessesAlert);
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        $I->click(\Page\Dashboard::FilterItem_ByFilterName(\Page\Dashboard::All_Filter));
        $I->wait(2);
        $I->waitForElement("label[data-key=all].active", 60);
        $I->canSee(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business1));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeRecognitionDate4(AcceptanceTester $I){
        //        $recognitionDate = '07/25/2016'; // 1 year before today
        //        $renewalDate     = '07/25/2017';
        $Recog            = strtotime("-1 year", strtotime($this->todayDate));
        $lastModifiedDate = "(not set)";
        $recognitionDate  = date("m/d/Y", $Recog);
        $renewalDate      = $this->todayDate;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        
        $I->cantSee(\Page\ApplicationDetails::RequiresRenewalStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        $I->canSee(\Page\ApplicationDetails::RecertifyStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        
        $I->fillField(\Page\BusinessChecklistView::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveDateButton_BusinessInfoTab);
        $I->wait(2);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->cantSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->canSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->canSee($renewalDate, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::RecognizedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckFilterOnDashboard6_ChangeRecognitionDate4(AcceptanceTester $I){
        $Recog            = strtotime("-1 year", strtotime($this->todayDate));
        $recognitionDate  = date("m/d/Y", $Recog);
        
        $I->comment("Check on Dashboard");
        $I->amOnPage(\Page\Dashboard::URL());
        $I->cantSeeElement(\Page\Dashboard::$NeedRenewalBusinessesAlert);
//        $I->canSee("Alert you have 1 companies", \Page\Dashboard::$NeedRenewalBusinessesAlert);
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("1", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        $I->click(\Page\Dashboard::FilterItem_ByFilterName(\Page\Dashboard::All_Filter));
        $I->wait(2);
        $I->waitForElement("label[data-key=all].active", 60);
        $I->canSee(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business1));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeRecognitionDate5(AcceptanceTester $I){
//        $recognitionDate = '07/25/2015'; //2 years before today
//        $renewalDate     = '07/25/2016';
        $Recog            = strtotime("-2 year", strtotime($this->todayDate));
        $Renew            = strtotime("-1 year", strtotime($this->todayDate));
        $lastModifiedDate = "(not set)";
        $recognitionDate  = date("m/d/Y", $Recog);
        $renewalDate      = date("m/d/Y", $Renew);
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        
        $I->cantSee(\Page\ApplicationDetails::RequiresRenewalStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        $I->canSee(\Page\ApplicationDetails::RecertifyStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        
        $I->fillField(\Page\BusinessChecklistView::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveDateButton_BusinessInfoTab);
        $I->wait(2);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->cantSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->canSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->canSee($renewalDate, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::RecognizedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckFilterOnDashboard7_ChangeRecognitionDate5(AcceptanceTester $I){
        $Recog            = strtotime("-2 year", strtotime($this->todayDate));
        $recognitionDate  = date("m/d/Y", $Recog);
        
        $I->comment("Check on Dashboard");
        $I->amOnPage(\Page\Dashboard::URL());
        $I->cantSeeElement(\Page\Dashboard::$NeedRenewalBusinessesAlert);
//        $I->canSee("Alert you have 1 companies", \Page\Dashboard::$NeedRenewalBusinessesAlert);
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("1", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        $I->click(\Page\Dashboard::FilterItem_ByFilterName(\Page\Dashboard::All_Filter));
        $I->wait(2);
        $I->waitForElement("label[data-key=all].active", 60);
        $I->wait(2);
        $I->canSee(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business1));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeRecognitionDate6(AcceptanceTester $I){
//        $recognitionDate = '07/20/2015'; // (2years + 1 day) yesterday
//        $renewalDate     = '07/20/2016';
        $Recog            = strtotime("-2 year -1 day", strtotime($this->todayDate));
        $Renew            = strtotime("-1 year -1 day", strtotime($this->todayDate));
        $lastModifiedDate = "(not set)";
        $recognitionDate  = date("m/d/Y", $Recog);
        $renewalDate      = date("m/d/Y", $Renew);
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        
        $I->cantSee(\Page\ApplicationDetails::RequiresRenewalStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        $I->canSee(\Page\ApplicationDetails::RecertifyStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        
        $I->fillField(\Page\BusinessChecklistView::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveDateButton_BusinessInfoTab);
        $I->wait(2);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->cantSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->canSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->canSee($renewalDate, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::RecognizedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckFilterOnDashboard8_ChangeRecognitionDate6(AcceptanceTester $I){
        $Recog            = strtotime("-2 year -1 day", strtotime($this->todayDate));
        $recognitionDate  = date("m/d/Y", $Recog);
        
        $I->comment("Check on Dashboard");
        $I->amOnPage(\Page\Dashboard::URL());
        $I->cantSeeElement(\Page\Dashboard::$NeedRenewalBusinessesAlert);
//        $I->canSee("Alert you have 1 companies", \Page\Dashboard::$NeedRenewalBusinessesAlert);
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("1", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        $I->click(\Page\Dashboard::FilterItem_ByFilterName(\Page\Dashboard::All_Filter));
        $I->wait(2);
        $I->waitForElement("label[data-key=all].active", 60);
        $I->wait(2);
        $I->canSee(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business1));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeRecognitionDate7(AcceptanceTester $I){
//        $recognitionDate = '07/26/2015'; // (2years - 1 day) tomorrow
//        $renewalDate     = '07/26/2016';
        $Recog            = strtotime("-2 years +1 day", strtotime($this->todayDate));
        $Renew            = strtotime("-1 year +1 day", strtotime($this->todayDate));
        $lastModifiedDate = "(not set)";
        $recognitionDate  = date("m/d/Y", $Recog);
        $renewalDate      = date("m/d/Y", $Renew);
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        
        $I->cantSee(\Page\ApplicationDetails::RequiresRenewalStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        $I->canSee(\Page\ApplicationDetails::RecertifyStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        
        $I->fillField(\Page\BusinessChecklistView::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveDateButton_BusinessInfoTab);
        $I->wait(2);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->cantSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->canSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->canSee($renewalDate, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::RecognizedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckFilterOnDashboard9_ChangeRecognitionDate7(AcceptanceTester $I){
        $Recog            = strtotime("-2 years +1 day", strtotime($this->todayDate));
        $recognitionDate  = date("m/d/Y", $Recog);
        
        $I->comment("Check on Dashboard");
        $I->amOnPage(\Page\Dashboard::URL());
        $I->cantSeeElement(\Page\Dashboard::$NeedRenewalBusinessesAlert);
//        $I->canSee("Alert you have 1 companies", \Page\Dashboard::$NeedRenewalBusinessesAlert);
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("1", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        $I->click(\Page\Dashboard::FilterItem_ByFilterName(\Page\Dashboard::All_Filter));
        $I->wait(2);
        $I->waitForElement("label[data-key=all].active", 60);
        $I->wait(2);
        $I->canSee(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business1));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeStatusToInProcessFromRecognized(AcceptanceTester $I){
        $status           = \Page\ApplicationDetails::InProcessStatus;
        $Recog            = strtotime("-2 years +1 day", strtotime($this->todayDate));
        $Renew            = strtotime("-1 year +1 day", strtotime($this->todayDate));
        $lastModifiedDate = "(not set)";
        $recognitionDate  = date("m/d/Y", $Recog);
        $renewalDate      = date("m/d/Y", $Renew);
        
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(5);
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
        
        $I->cantSee(\Page\ApplicationDetails::RequiresRenewalStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        $I->cantSee(\Page\ApplicationDetails::RecertifyStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->canSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->cantSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee($status, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckFilterOnDashboard10_ToInProcessFromRecognized(AcceptanceTester $I){
        $Recog            = strtotime("-2 years +1 day", strtotime($this->todayDate));
        $recognitionDate  = date("m/d/Y", $Recog);
        
        $I->comment("Check on Dashboard");
        $I->amOnPage(\Page\Dashboard::URL());
        $I->cantSeeElement(\Page\Dashboard::$NeedRenewalBusinessesAlert);
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        $I->click(\Page\Dashboard::FilterItem_ByFilterName(\Page\Dashboard::All_Filter));
        $I->wait(2);
        $I->waitForElement("label[data-key=all].active", 60);
        $I->wait(2);
        $I->canSee(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business1));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeStatusToRecognizedFromInProcess(AcceptanceTester $I){
        $status           = \Page\ApplicationDetails::RecognizedStatus;
        $Recog            = strtotime("-2 years +1 day", strtotime($this->todayDate));
        $Renew            = strtotime("-1 year +1 day", strtotime($this->todayDate));
        $lastModifiedDate = "(not set)";
        $recognitionDate  = date("m/d/Y", $Recog);
        $renewalDate      = date("m/d/Y", $Renew);
        
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(5);
        
        $I->cantSee(\Page\ApplicationDetails::RequiresRenewalStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        $I->canSee(\Page\ApplicationDetails::RecertifyStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->cantSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->canSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->canSee($renewalDate, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee($status, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckFilterOnDashboard11_ToRecognizedFromInProcess(AcceptanceTester $I){
        $Recog            = strtotime("-2 years +1 day", strtotime($this->todayDate));
        $recognitionDate  = date("m/d/Y", $Recog);
        
        $I->comment("Check on Dashboard");
        $I->amOnPage(\Page\Dashboard::URL());
        $I->cantSeeElement(\Page\Dashboard::$NeedRenewalBusinessesAlert);
//        $I->canSee("Alert you have 1 companies", \Page\Dashboard::$NeedRenewalBusinessesAlert);
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("1", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        $I->click(\Page\Dashboard::FilterItem_ByFilterName(\Page\Dashboard::All_Filter));
        $I->wait(2);
        $I->waitForElement("label[data-key=all].active", 60);
        $I->wait(2);
        $I->canSee(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business1));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeStatusToInProcessFromRecognized2(AcceptanceTester $I){
        $status           = \Page\ApplicationDetails::InProcessStatus;
        $Recog            = strtotime("-2 years +1 day", strtotime($this->todayDate));
        $Renew            = strtotime("-1 year +1 day", strtotime($this->todayDate));
        $lastModifiedDate = "(not set)";
        $recognitionDate  = date("m/d/Y", $Recog);
        $renewalDate      = date("m/d/Y", $Renew);
        
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(5);
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->canSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->cantSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee($status, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckFilterOnDashboard12_ToInProcessFromRecognized2(AcceptanceTester $I){
        $Recog            = strtotime("-2 years +1 day", strtotime($this->todayDate));
        $recognitionDate  = date("m/d/Y", $Recog);
        
        $I->comment("Check on Dashboard");
        $I->amOnPage(\Page\Dashboard::URL());
        $I->cantSeeElement(\Page\Dashboard::$NeedRenewalBusinessesAlert);
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        $I->click(\Page\Dashboard::FilterItem_ByFilterName(\Page\Dashboard::All_Filter));
        $I->wait(2);
        $I->waitForElement("label[data-key=all].active", 60);
        $I->wait(2);
        $I->canSee(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business1));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeStatusToRecognizedFromInProcess2(AcceptanceTester $I){
        $status           = \Page\ApplicationDetails::RecognizedStatus;
        $Recog            = strtotime("-2 years +1 day", strtotime($this->todayDate));
        $Renew            = strtotime("-1 year +1 day", strtotime($this->todayDate));
        $lastModifiedDate = "(not set)";
        $recognitionDate  = date("m/d/Y", $Recog);
        $renewalDate      = date("m/d/Y", $Renew);
        
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(5);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->cantSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->canSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->canSee($renewalDate, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee($status, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckFilterOnDashboard13_ToRecognizedFromInProcess2(AcceptanceTester $I){
        $Recog            = strtotime("-2 years +1 day", strtotime($this->todayDate));
        $recognitionDate  = date("m/d/Y", $Recog);
        
        $I->comment("Check on Dashboard");
        $I->amOnPage(\Page\Dashboard::URL());
        $I->cantSeeElement(\Page\Dashboard::$NeedRenewalBusinessesAlert);
//        $I->canSee("Alert you have 1 companies", \Page\Dashboard::$NeedRenewalBusinessesAlert);
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("1", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        $I->click(\Page\Dashboard::FilterItem_ByFilterName(\Page\Dashboard::All_Filter));
        $I->wait(2);
        $I->waitForElement("label[data-key=all].active", 60);
        $I->wait(2);
        $I->canSee(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business1));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeStatusToRecertifyFromRecognized2(AcceptanceTester $I){
        $status                 = \Page\ApplicationDetails::RecertifyStatus;
        $Recog                  = strtotime("-2 years +1 day", strtotime($this->todayDate));
        $Renew                  = strtotime("-1 year +1 day", strtotime($this->todayDate));
        $lastModifiedDate       = "(not set)";
        $recognitionDateArchive = date("m/d/Y", $Recog);
        $renewalDateArchive     = date("m/d/Y", $Renew);
        $recognitionDate        = '';
        $recognitionDateRecords = "(not set)";
        $renewalDateRecords     = "(not set)";
        
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        
        $I->cantSee(\Page\ApplicationDetails::RequiresRenewalStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");

        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(5);
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDateArchive);
        $I->comment("Check on Need Renewal list when new checklist wasn't added");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->cantSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->canSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->canSee($renewalDateArchive, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab when new checklist wasn't added");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::RecognizedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDateArchive, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDateArchive, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->comment("Check on Business Info Tab when new checklist wasn't added");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->canSeeOptionIsSelected(Page\ApplicationDetails::$StatusSelect_BusinessInfoTab, Page\ApplicationDetails::RecognizedStatus);
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDateArchive);
        
        $I->cantSee(\Page\ApplicationDetails::RequiresRenewalStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        $I->canSee(\Page\ApplicationDetails::RecertifyStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(3);
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDateArchive);
        $I->click(Page\ApplicationDetails::$AddNewChecklistButton_BusinessInfoTab);
        $I->wait(2);
        $I->comment("Check on Need Renewal list when new checklist was added");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->cantSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->canSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->canSee($renewalDateArchive, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab when new checklist was added");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::RecertifyingStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDateRecords, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDateRecords, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('2'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('2'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('2'));
        $I->canSee($recognitionDateArchive, Page\ApplicationDetails::RecognitionLine_RecordsTab('2'));
        $I->canSee($renewalDateArchive, Page\ApplicationDetails::RenewalLine_RecordsTab('2'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('2'));
        $I->comment("Check on Business Info Tab when new checklist was added");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->canSeeOptionIsSelected(Page\ApplicationDetails::$StatusSelect_BusinessInfoTab, Page\ApplicationDetails::RecertifyingStatus);
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckFilterOnDashboard14_ToRecertifyFromRecognized2(AcceptanceTester $I){
        $I->comment("Check on Dashboard");
        $I->amOnPage(\Page\Dashboard::URL());
        $I->cantSeeElement(\Page\Dashboard::$NeedRenewalBusinessesAlert);
//        $I->canSee("Alert you have 1 companies", \Page\Dashboard::$NeedRenewalBusinessesAlert);
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("1", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recertifying_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        $I->click(\Page\Dashboard::FilterItem_ByFilterName(\Page\Dashboard::All_Filter));
        $I->wait(2);
        $I->waitForElement("label[data-key=all].active", 60);
        $I->wait(2);
        $I->canSee(\Page\Dashboard::Recertifying_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
        $I->canSee("(not set)", \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business1));
        $I->cantSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business1));
        $I->cantSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business1));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeStatusToRecognizedFromInProcess_Recertification(AcceptanceTester $I){
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
        
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        
        $I->cantSee(\Page\ApplicationDetails::RequiresRenewalStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        //$I->cantSee(\Page\ApplicationDetails::RecertifyStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(5);
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDateDefault);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->canSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->cantSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
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
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDateDefault);
        $I->fillField(\Page\BusinessChecklistView::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveDateButton_BusinessInfoTab);
        $I->wait(2);
        $I->comment("Check on Need Renewal list after recognition date change");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->cantSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->canSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->canSee($renewalDate, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab after recognition date change");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
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
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckFilterOnDashboard15_ToRecognizedFromInProcess_Recertification(AcceptanceTester $I){
        $Recog                  = strtotime("-1 year -6 months", strtotime($this->todayDate));
        $recognitionDate        = date("m/d/Y", $Recog);
        
        $I->comment("Check on Dashboard");
        $I->amOnPage(\Page\Dashboard::URL());
        $I->cantSeeElement(\Page\Dashboard::$NeedRenewalBusinessesAlert);
//        $I->canSee("Alert you have 1 companies", \Page\Dashboard::$NeedRenewalBusinessesAlert);
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('1', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("1", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recertifying_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        $I->click(\Page\Dashboard::FilterItem_ByFilterName(\Page\Dashboard::All_Filter));
        $I->wait(2);
        $I->waitForElement("label[data-key=all].active", 60);
        $I->wait(2);
        $I->canSee(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business1));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ManageNeedRenewalApplicantEmail(Step\Acceptance\Notification $I){
        $trigger      = Page\ApplicantEmailTextList::RequiresRenewal_Trigger;
        $programArray = [$this->program1];
        $subject      = "New subjject (need renewal edited)";
        $body         = "Neew body value (need renewal edited)";
        
        $I->CreateApplicantEmailText($subject, $body, $programArray, $trigger);
//        $app = $I->GetApplicantEmailTextOnPageInList(Page\ApplicantEmailTextList::RequiresRenewal_Trigger, 'All');
//        $applicantId = $app['id'];
//        $I->ManageApplicantEmailText($applicantId, $subject, $body);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
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
        
        $I->comment("Renotify Business1 on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->click(\Page\NeedRenewalList::NotifyButtonLine_ByBusName($this->business1));
        $I->wait(5);
        $I->waitForElement(Page\CommunicationCreatePopup::SendMessagePopup, 120);
        $I->wait(1);
        $I->cantSeeElement(Page\CommunicationCreatePopup::$SendMessagePopup_UserTypeSelect);
        $I->canSeeInField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(10);
        $I->waitPageLoad();
        $I->canSee('', Page\NeedRenewalList::ReNotifyDateLine_ByBusName($this->business1));
        $I->canSee('', Page\NeedRenewalList::ExtendedDateLine_ByBusName($this->business1));
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Communication($this->busId1));
        $I->canSee($this->program1, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
        //$I->canSee('3 seconds ago', Page\ApplicationDetails::SentLine_CommunicationTab('1'));
        $I->click(Page\ApplicationDetails::ViewButtonLine_CommunicationTab('1'));
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSee("Inbox - $subject", Page\CommunicationsView::$Title);
        $I->canSee($body, Page\CommunicationsView::PreviousMessage('1'));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
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
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
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
        
        $I->comment("1. Extend 3 Months for Business1 on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->click(\Page\NeedRenewalList::Extend3MonthButtonLine_ByBusName($this->business1));
        $I->wait(5);
        $I->waitPageLoad();
        $I->canSee($renewalDatePlus3Months, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business1));
        $I->canSee('', Page\NeedRenewalList::ReNotifyDateLine_ByBusName($this->business1));
        $I->canSee($this->todayDate, Page\NeedRenewalList::ExtendedDateLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
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
        
        $I->comment("2. Extend 3 Months for Business1 on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->click(\Page\NeedRenewalList::Extend3MonthButtonLine_ByBusName($this->business1));
        $I->wait(5);
        $I->waitPageLoad();
        $I->canSee($renewalDatePlus6Months, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business1));
        $I->canSee('', Page\NeedRenewalList::ReNotifyDateLine_ByBusName($this->business1));
        $I->canSee("$this->todayDate\n$this->todayDate", Page\NeedRenewalList::ExtendedDateLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
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
        
        $I->comment("3. Extend 3 Months for Business1 on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->click(\Page\NeedRenewalList::Extend3MonthButtonLine_ByBusName($this->business1));
        $I->wait(5);
        $I->waitPageLoad();
        $I->comment("Maybe fail here if today is 29-31 day in month. It's okay. Fail on next row:");
        $I->canSee($renewalDatePlus9Months, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business1));
        $I->canSee('', Page\NeedRenewalList::ReNotifyDateLine_ByBusName($this->business1));
        $I->canSee("$this->todayDate\n$this->todayDate\n$this->todayDate", Page\NeedRenewalList::ExtendedDateLine_ByBusName($this->business1));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
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
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckFilterOnDashboard16(AcceptanceTester $I){
        $Recog                  = strtotime("-1 year -6 months", strtotime($this->todayDate));
        $recognitionDate        = date("m/d/Y", $Recog);
        
        $I->comment("Check on Dashboard");
        $I->amOnPage(\Page\Dashboard::URL());
        $I->cantSeeElement(\Page\Dashboard::$NeedRenewalBusinessesAlert);
//        $I->canSee("Alert you have 1 companies", \Page\Dashboard::$NeedRenewalBusinessesAlert);
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('1', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("1", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recertifying_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        $I->click(\Page\Dashboard::FilterItem_ByFilterName(\Page\Dashboard::All_Filter));
        $I->wait(2);
        $I->waitForElement("label[data-key=all].active", 60);
        $I->wait(2);
        $I->canSee(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business1));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
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
        $I->fillField(\Page\BusinessChecklistView::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveDateButton_BusinessInfoTab);
        $I->wait(4);
        $I->comment("Decertify from Need Renewal list page");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->click(\Page\NeedRenewalList::DecertifyButtonLine_ByBusName($this->business1));
        $I->wait(5);
        $I->cantSeeElement(Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business1));
        $I->canSeeElement(Page\NeedRenewalList::$EmptyListLabel);
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId1));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
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
        
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->canSeeOptionIsSelected(Page\ApplicationDetails::$StatusSelect_BusinessInfoTab, Page\ApplicationDetails::DecertifiedStatus);
        $I->comment("Check on Dashboard");
        $I->amOnPage(\Page\Dashboard::URL());
        $I->cantSeeElement(\Page\Dashboard::$NeedRenewalBusinessesAlert);
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recertifying_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        $I->click(\Page\Dashboard::FilterItem_ByFilterName(\Page\Dashboard::All_Filter));
        $I->wait(2);
        $I->waitForElement("label[data-key=all].active", 60);
        $I->wait(2);
        $I->canSee(\Page\Dashboard::Decertified_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business1));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_LogOut111(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->Logout($I);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function MeasExtension1_17_Business2_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business2 = $I->GenerateNameOf("bus2_NR");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip1;
        $city             = $this->city1;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
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
    
    public function Help1_18_LogOutFromBusiness2(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function MeasExtension1_17_Business3_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business3 = $I->GenerateNameOf("bus3_NR");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip2;
        $city             = $this->city2;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
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
    
    public function Help1_18_LogOutFromBusiness3(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function MeasExtension1_17_Business4_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business4 = $I->GenerateNameOf("bus4_NR");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip2;
        $city             = $this->city2;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
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
    
    public function Help1_18_LogOutFromBusiness4(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function MeasExtension1_17_Business5_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business5 = $I->GenerateNameOf("bus5_NR");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip2;
        $city             = $this->city2;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
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
    
    public function Help1_18_LogOutFromBusiness5(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->LoginAsAdmin($I);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_DashboardHelp2(AcceptanceTester $I){
        $I->amOnPage(\Page\Dashboard::URL());
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $url2 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business2), 'href');
        $I->comment("Url2: $url2");
        $u2 = explode('=', $url2);
        $this->busId2 = $u2[1];
//        $I->comment("Business1 id: $this->busId1. Business2 id: $this->busId2. Business3 id: $this->busId3.");
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_DashboardHelp3(AcceptanceTester $I){
        $I->amOnPage(\Page\Dashboard::URL());
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $url2 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business3), 'href');
        $I->comment("Url2: $url2");
        $u2 = explode('=', $url2);
        $this->busId3 = $u2[1];
//        $I->comment("Business1 id: $this->busId1. Business2 id: $this->busId2. Business3 id: $this->busId3.");
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_DashboardHelp4(AcceptanceTester $I){
        $I->amOnPage(\Page\Dashboard::URL());
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business4));
        $url2 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business4), 'href');
        $I->comment("Url2: $url2");
        $u2 = explode('=', $url2);
        $this->busId4 = $u2[1];
//        $I->comment("Business1 id: $this->busId1. Business2 id: $this->busId2. Business3 id: $this->busId3.");
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Help_DashboardHelp5(AcceptanceTester $I){
        $I->amOnPage(\Page\Dashboard::URL());
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business5));
        $url2 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business5), 'href');
        $I->comment("Url2: $url2");
        $u2 = explode('=', $url2);
        $this->busId5 = $u2[1];
//        $I->comment("Business1 id: $this->busId1. Business2 id: $this->busId2. Business3 id: $this->busId3.");
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeStatusToRequiresRenewalFromInProcess_Business2(AcceptanceTester $I){
        $status           = \Page\BusinessChecklistView::RequiresRenewalStatus;
        $lastModifiedDate = $this->todayDate;
        $recognitionDate  = "(not set)";
        $renewalDate      = "(not set)";
        
        $lastModifiedDateArchive = "(not set)";
        $recognitionDateArchive  = "(not set)";
        $renewalDateArchive      = "(not set)";
                
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId2));
        
        $I->cantSee(\Page\ApplicationDetails::RequiresRenewalStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        $I->cantSee(\Page\ApplicationDetails::RecertifyStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        
        $I->click(\Page\BusinessChecklistView::$LeftMenu_GetNewChecklistButton);
        $I->wait(3);
        $I->canSee("Are you sure?");
        $I->canSee("You really want requires new checklist?");
        $I->click(".confirm");
        $I->wait(4);
        $I->waitForElement(".showSweetAlert.visible", 120);
        $I->wait(1);
        $I->cantSee("Send Message");
        $I->cantSee("Create Communication");
        $I->cantSee("Subject");
        $I->cantSeeElement("#communication-subject");
        $I->cantSeeElement("#communication-user_type");
        $I->click(".showSweetAlert.visible .confirm");
        $I->wait(5);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, \Page\BusinessChecklistView::InProcessStatus);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->canSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->cantSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business2));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId2));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::InProcessStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('2'));
        $I->canSee($lastModifiedDateArchive, Page\ApplicationDetails::LastModifiedLine_RecordsTab('2'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('2'));
        $I->canSee($recognitionDateArchive, Page\ApplicationDetails::RecognitionLine_RecordsTab('2'));
        $I->canSee($renewalDateArchive, Page\ApplicationDetails::RenewalLine_RecordsTab('2'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('2'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId2));
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, '');
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckFilterOnDashboard2_RequiresRenewalFromInProcess_Business2(AcceptanceTester $I){
        $recognitionDate  = "(not set)";
        
        $Recog_B1                  = strtotime("-1 year -6 months", strtotime($this->todayDate));
        $recognitionDate_B1        = date("m/d/Y", $Recog_B1);
        
        $I->comment("Check on Dashboard");
        $I->amOnPage(\Page\Dashboard::URL());
        $I->cantSeeElement(\Page\Dashboard::$NeedRenewalBusinessesAlert);
        $I->canSee('5', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('4', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recertifying_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        $I->click(\Page\Dashboard::FilterItem_ByFilterName(\Page\Dashboard::All_Filter));
        $I->wait(2);
        $I->waitForElement("label[data-key=all].active", 60);
        $I->wait(2);
        
        $I->canSee(\Page\Dashboard::Decertified_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
        $I->canSee($recognitionDate_B1, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business1));
        
        $I->canSee(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business2));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business2));
        $I->cantSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business2));
        $I->cantSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business2));
        
        $I->canSee(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business3));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business3));
        $I->cantSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business3));
        $I->cantSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business3));
        
        $I->canSee(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business4));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business4));
        $I->cantSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business4));
        $I->cantSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business4));
        
        $I->canSee(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business5));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business5));
        $I->cantSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business5));
        $I->cantSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business5));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeStatusToRequiresRenewalFromInProcess2_Business2(AcceptanceTester $I){
        $status           = \Page\BusinessChecklistView::RequiresRenewalStatus;
        $lastModifiedDate = $this->todayDate;
        $recognitionDate  = "(not set)";
        $renewalDate      = "(not set)";
        
        $lastModifiedDateArchive2 = $this->todayDate;
        $recognitionDateArchive2  = "(not set)";
        $renewalDateArchive2      = "(not set)";
        
        $lastModifiedDateArchive1 = "(not set)";
        $recognitionDateArchive1  = "(not set)";
        $renewalDateArchive1      = "(not set)";
                
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId2));
        
        $I->cantSee(\Page\ApplicationDetails::RequiresRenewalStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        $I->cantSee(\Page\ApplicationDetails::RecertifyStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        
        $I->click(\Page\BusinessChecklistView::$LeftMenu_GetNewChecklistButton);
        $I->wait(3);
        $I->canSee("Are you sure?");
        $I->canSee("You really want requires new checklist?");
        $I->click(".confirm");
        $I->wait(4);
        $I->waitForElement(".showSweetAlert.visible", 120);
        $I->wait(1);
        $I->cantSee("Send Message");
        $I->cantSee("Create Communication");
        $I->cantSee("Subject");
        $I->cantSeeElement("#communication-subject");
        $I->cantSeeElement("#communication-user_type");
        $I->click(".showSweetAlert.visible .confirm");
        $I->wait(5);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, \Page\BusinessChecklistView::InProcessStatus);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->canSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->cantSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business2));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId2));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::InProcessStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('2'));
        $I->canSee($lastModifiedDateArchive2, Page\ApplicationDetails::LastModifiedLine_RecordsTab('2'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('2'));
        $I->canSee($recognitionDateArchive2, Page\ApplicationDetails::RecognitionLine_RecordsTab('2'));
        $I->canSee($renewalDateArchive2, Page\ApplicationDetails::RenewalLine_RecordsTab('2'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('2'));
        
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('3'));
        $I->canSee($lastModifiedDateArchive1, Page\ApplicationDetails::LastModifiedLine_RecordsTab('3'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('3'));
        $I->canSee($recognitionDateArchive1, Page\ApplicationDetails::RecognitionLine_RecordsTab('3'));
        $I->canSee($renewalDateArchive1, Page\ApplicationDetails::RenewalLine_RecordsTab('3'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('3'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId2));
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, '');
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckFilterOnDashboard2_RequiresRenewalFromInProcess2_Business2(AcceptanceTester $I){
        $recognitionDate  = "(not set)";
        
        $Recog_B1                  = strtotime("-1 year -6 months", strtotime($this->todayDate));
        $recognitionDate_B1        = date("m/d/Y", $Recog_B1);
        
        $I->comment("Check on Dashboard");
        $I->amOnPage(\Page\Dashboard::URL());
        $I->cantSeeElement(\Page\Dashboard::$NeedRenewalBusinessesAlert);
        $I->canSee('5', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('4', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("0", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recertifying_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        $I->click(\Page\Dashboard::FilterItem_ByFilterName(\Page\Dashboard::All_Filter));
        $I->wait(2);
        $I->waitForElement("label[data-key=all].active", 60);
        $I->wait(2);
        
        $I->canSee(\Page\Dashboard::Decertified_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
        $I->canSee($recognitionDate_B1, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business1));
        
        $I->canSee(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business2));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business2));
        $I->cantSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business2));
        $I->cantSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business2));
        
        $I->canSee(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business3));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business3));
        $I->cantSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business3));
        $I->cantSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business3));
        
        $I->canSee(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business4));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business4));
        $I->cantSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business4));
        $I->cantSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business4));
        
        $I->canSee(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business5));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business5));
        $I->cantSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business5));
        $I->cantSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business5));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeStatusToRecognizedFromInProcess_Business2(AcceptanceTester $I){
        $status           = \Page\ApplicationDetails::RecognizedStatus;
        $Recog            = strtotime("-2 years +1 day", strtotime($this->todayDate));
        $Renew            = strtotime("-1 year +1 day", strtotime($this->todayDate));
        $lastModifiedDate = $this->todayDate;
        $recognitionDate  = date("m/d/Y", $Recog);
        $renewalDate      = date("m/d/Y", $Renew);
        
        $lastModifiedDateArchive2 = $this->todayDate;
        $recognitionDateArchive2  = "(not set)";
        $renewalDateArchive2      = "(not set)";
        
        $lastModifiedDateArchive1 = "(not set)";
        $recognitionDateArchive1  = "(not set)";
        $renewalDateArchive1      = "(not set)";
        
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId2));
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(3);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->fillField(\Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$SaveDateButton_BusinessInfoTab);
        $I->wait(4);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->cantSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->canSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business2));
        $I->canSee($renewalDate, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business2));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId2));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee($status, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('2'));
        $I->canSee($lastModifiedDateArchive2, Page\ApplicationDetails::LastModifiedLine_RecordsTab('2'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('2'));
        $I->canSee($recognitionDateArchive2, Page\ApplicationDetails::RecognitionLine_RecordsTab('2'));
        $I->canSee($renewalDateArchive2, Page\ApplicationDetails::RenewalLine_RecordsTab('2'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('2'));
        
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('3'));
        $I->canSee($lastModifiedDateArchive1, Page\ApplicationDetails::LastModifiedLine_RecordsTab('3'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('3'));
        $I->canSee($recognitionDateArchive1, Page\ApplicationDetails::RecognitionLine_RecordsTab('3'));
        $I->canSee($renewalDateArchive1, Page\ApplicationDetails::RenewalLine_RecordsTab('3'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('3'));
        
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId2));
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckFilterOnDashboard2_RecognizedFromInProcess_Business2(AcceptanceTester $I){
        $Recog_B2            = strtotime("-2 years +1 day", strtotime($this->todayDate));
        $recognitionDate_B2  = date("m/d/Y", $Recog_B2);
        
        $Recog_B1                  = strtotime("-1 year -6 months", strtotime($this->todayDate));
        $recognitionDate_B1        = date("m/d/Y", $Recog_B1);
        
        $recognitionDate  = "(not set)";
        
        $I->comment("Check on Dashboard");
        $I->amOnPage(\Page\Dashboard::URL());
        $I->cantSeeElement(\Page\Dashboard::$NeedRenewalBusinessesAlert);
//        $I->canSee("Alert you have 1 companies", \Page\Dashboard::$NeedRenewalBusinessesAlert);
        $I->canSee('5', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("1", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recertifying_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        $I->click(\Page\Dashboard::FilterItem_ByFilterName(\Page\Dashboard::All_Filter));
        $I->wait(2);
        $I->waitForElement("label[data-key=all].active", 60);
        $I->wait(2);
        
        $I->canSee(\Page\Dashboard::Decertified_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
        $I->canSee($recognitionDate_B1, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business1));
        
        $I->canSee(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business2));
        $I->canSee($recognitionDate_B2, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business2));
        $I->canSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business2));
        $I->canSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business2));
        
        $I->canSee(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business3));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business3));
        $I->cantSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business3));
        $I->cantSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business3));
        
        $I->canSee(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business4));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business4));
        $I->cantSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business4));
        $I->cantSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business4));
        
        $I->canSee(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business5));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business5));
        $I->cantSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business5));
        $I->cantSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business5));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeStatusToRequiresRenewalFromRecognized_Business2(AcceptanceTester $I){
        $status           = \Page\BusinessChecklistView::RecertifyStatus;
        $lastModifiedDate = $this->todayDate;
        $recognitionDate  = "(not set)";
        $renewalDate      = "(not set)";
        
        $lastModifiedDateArchive3 = $this->todayDate;
        $Recog3                   = strtotime("-2 years +1 day", strtotime($this->todayDate));
        $Renew3                   = strtotime("-1 year +1 day", strtotime($this->todayDate));
        $recognitionDateArchive3  = date("m/d/Y", $Recog3);
        $renewalDateArchive3      = date("m/d/Y", $Renew3);
        
        $lastModifiedDateArchive2 = $this->todayDate;
        $recognitionDateArchive2  = "(not set)";
        $renewalDateArchive2      = "(not set)";
        
        $lastModifiedDateArchive1 = "(not set)";
        $recognitionDateArchive1  = "(not set)";
        $renewalDateArchive1      = "(not set)";
                
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId2));
        
        $I->cantSee(\Page\ApplicationDetails::RequiresRenewalStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        $I->canSee(\Page\ApplicationDetails::RecertifyStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(2);
        $I->click(\Page\ApplicationDetails::$AddNewChecklistButton_BusinessInfoTab);
        $I->wait(5);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->canSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business2));
        $I->canSee($renewalDateArchive3, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business2));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId2));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::RecertifyingStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('2'));
        $I->canSee($lastModifiedDateArchive3, Page\ApplicationDetails::LastModifiedLine_RecordsTab('2'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('2'));
        $I->canSee($recognitionDateArchive3, Page\ApplicationDetails::RecognitionLine_RecordsTab('2'));
        $I->canSee($renewalDateArchive3, Page\ApplicationDetails::RenewalLine_RecordsTab('2'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('2'));
        
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('3'));
        $I->canSee($lastModifiedDateArchive2, Page\ApplicationDetails::LastModifiedLine_RecordsTab('3'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('3'));
        $I->canSee($recognitionDateArchive2, Page\ApplicationDetails::RecognitionLine_RecordsTab('3'));
        $I->canSee($renewalDateArchive2, Page\ApplicationDetails::RenewalLine_RecordsTab('3'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('3'));
        
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('4'));
        $I->canSee($lastModifiedDateArchive1, Page\ApplicationDetails::LastModifiedLine_RecordsTab('4'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('4'));
        $I->canSee($recognitionDateArchive1, Page\ApplicationDetails::RecognitionLine_RecordsTab('4'));
        $I->canSee($renewalDateArchive1, Page\ApplicationDetails::RenewalLine_RecordsTab('4'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('4'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId2));
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, '');
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckFilterOnDashboard2_RequiresRenewalFromRecognized_Business2(AcceptanceTester $I){
        $recognitionDate  = "(not set)";
        
        $Recog_B1                  = strtotime("-1 year -6 months", strtotime($this->todayDate));
        $recognitionDate_B1        = date("m/d/Y", $Recog_B1);
        
        
        $I->comment("Check on Dashboard");
        $I->amOnPage(\Page\Dashboard::URL());
        $I->cantSeeElement(\Page\Dashboard::$NeedRenewalBusinessesAlert);
//        $I->canSee("Alert you have 1 companies", \Page\Dashboard::$NeedRenewalBusinessesAlert);
        $I->canSee('5', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("1", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recertifying_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        $I->click(\Page\Dashboard::FilterItem_ByFilterName(\Page\Dashboard::All_Filter));
        $I->wait(2);
        
        $I->canSee(\Page\Dashboard::Decertified_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
        $I->canSee($recognitionDate_B1, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business1));
        
        $I->canSee(\Page\Dashboard::Recertifying_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business2));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business2));
        $I->cantSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business2));
        $I->cantSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business2));
        
        $I->canSee(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business3));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business3));
        $I->cantSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business3));
        $I->cantSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business3));
        
        $I->canSee(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business4));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business4));
        $I->cantSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business4));
        $I->cantSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business4));
        
        $I->canSee(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business5));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business5));
        $I->cantSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business5));
        $I->cantSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business5));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeStatusToRequiresRenewal2_Business2(AcceptanceTester $I){
        $status           = \Page\BusinessChecklistView::RequiresRenewalStatus;
        $lastModifiedDate = $this->todayDate;
        $recognitionDate  = "(not set)";
        $renewalDate      = "(not set)";
        
        $lastModifiedDateArchive4 = $this->todayDate;
        $recognitionDateArchive4  = "(not set)";
        $renewalDateArchive4      = "(not set)";
        
        $lastModifiedDateArchive3 = $this->todayDate;
        $Recog3                   = strtotime("-2 years +1 day", strtotime($this->todayDate));
        $Renew3                   = strtotime("-1 year +1 day", strtotime($this->todayDate));
        $recognitionDateArchive3  = date("m/d/Y", $Recog3);;
        $renewalDateArchive3      = date("m/d/Y", $Renew3);
        
        $lastModifiedDateArchive2 = $this->todayDate;
        $recognitionDateArchive2  = "(not set)";
        $renewalDateArchive2      = "(not set)";
        
        $lastModifiedDateArchive1 = "(not set)";
        $recognitionDateArchive1  = "(not set)";
        $renewalDateArchive1      = "(not set)";
                
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId2));
        
        $I->cantSee(\Page\ApplicationDetails::RequiresRenewalStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        //$I->canSee(\Page\ApplicationDetails::RecertifyStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        
        $I->click(\Page\BusinessChecklistView::$LeftMenu_GetNewChecklistButton);
        $I->wait(3);
        $I->canSee("Are you sure?");
        $I->canSee("You really want requires new checklist?");
        $I->click(".confirm");
        $I->wait(4);
        $I->waitForElement(".showSweetAlert.visible", 120);
        $I->wait(1);
        $I->cantSee("Send Message");
        $I->cantSee("Create Communication");
        $I->cantSee("Subject");
        $I->cantSeeElement("#communication-subject");
        $I->cantSeeElement("#communication-user_type");
        $I->click(".showSweetAlert.visible .confirm");
        $I->wait(5);
        $I->canSeeOptionIsSelected(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, \Page\BusinessChecklistView::RecertifyingStatus);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->canSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business2));
        $I->canSee($renewalDateArchive3, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business2));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId2));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::RecertifyingStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('2'));
        $I->canSee($lastModifiedDateArchive4, Page\ApplicationDetails::LastModifiedLine_RecordsTab('2'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('2'));
        $I->canSee($recognitionDateArchive4, Page\ApplicationDetails::RecognitionLine_RecordsTab('2'));
        $I->canSee($renewalDateArchive4, Page\ApplicationDetails::RenewalLine_RecordsTab('2'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('2'));
        
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('3'));
        $I->canSee($lastModifiedDateArchive3, Page\ApplicationDetails::LastModifiedLine_RecordsTab('3'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('3'));
        $I->canSee($recognitionDateArchive3, Page\ApplicationDetails::RecognitionLine_RecordsTab('3'));
        $I->canSee($renewalDateArchive3, Page\ApplicationDetails::RenewalLine_RecordsTab('3'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('3'));
        
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('4'));
        $I->canSee($lastModifiedDateArchive2, Page\ApplicationDetails::LastModifiedLine_RecordsTab('4'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('4'));
        $I->canSee($recognitionDateArchive2, Page\ApplicationDetails::RecognitionLine_RecordsTab('4'));
        $I->canSee($renewalDateArchive2, Page\ApplicationDetails::RenewalLine_RecordsTab('4'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('4'));
        
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('5'));
        $I->canSee($lastModifiedDateArchive1, Page\ApplicationDetails::LastModifiedLine_RecordsTab('5'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('5'));
        $I->canSee($recognitionDateArchive1, Page\ApplicationDetails::RecognitionLine_RecordsTab('5'));
        $I->canSee($renewalDateArchive1, Page\ApplicationDetails::RenewalLine_RecordsTab('5'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('5'));
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId2));
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, '');
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckFilterOnDashboard2_RequiresRenewal2_Business2(AcceptanceTester $I){
        $recognitionDate  = "(not set)";
        
        $Recog_B1                  = strtotime("-1 year -6 months", strtotime($this->todayDate));
        $recognitionDate_B1        = date("m/d/Y", $Recog_B1);
        
        
        $I->comment("Check on Dashboard");
        $I->amOnPage(\Page\Dashboard::URL());
        $I->cantSeeElement(\Page\Dashboard::$NeedRenewalBusinessesAlert);
//        $I->canSee("Alert you have 1 companies", \Page\Dashboard::$NeedRenewalBusinessesAlert);
        $I->canSee('5', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("1", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recertifying_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        $I->click(\Page\Dashboard::FilterItem_ByFilterName(\Page\Dashboard::All_Filter));
        $I->wait(2);
        $I->waitForElement("label[data-key=all].active", 60);
        $I->wait(2);
        
        $I->canSee(\Page\Dashboard::Decertified_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
        $I->canSee($recognitionDate_B1, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business1));
        
        $I->canSee(\Page\Dashboard::Recertifying_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business2));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business2));
        $I->cantSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business2));
        $I->cantSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business2));
        
        $I->canSee(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business3));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business3));
        $I->cantSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business3));
        $I->cantSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business3));
        
        $I->canSee(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business4));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business4));
        $I->cantSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business4));
        $I->cantSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business4));
        
        $I->canSee(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business5));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business5));
        $I->cantSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business5));
        $I->cantSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business5));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeStatusToRecognizedFromInProcess_Business3(AcceptanceTester $I){
        $status           = \Page\ApplicationDetails::RecognizedStatus;
        $Recog            = strtotime("-2 years -3 months", strtotime($this->todayDate));
        $Renew            = strtotime("-3 months", strtotime($this->todayDate));
        $lastModifiedDate = "(not set)";
        $recognitionDate  = date("m/d/Y", $Recog);
        $renewalDate      = date("m/d/Y", $Renew);
        
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId3));
        
        $I->cantSee(\Page\ApplicationDetails::RequiresRenewalStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        $I->cantSee(\Page\ApplicationDetails::RecertifyStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(3);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->fillField(\Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$SaveDateButton_BusinessInfoTab);
        $I->wait(4);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->cantSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->canSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business3));
        $I->canSee($renewalDate, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business3));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId3));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee($status, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId3));
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeStatusToRecognizedFromInProcess_Business4(AcceptanceTester $I){
        $status           = \Page\ApplicationDetails::RecognizedStatus;
        $Recog            = strtotime("-2 years", strtotime($this->todayDate));
        $Renew            = strtotime($this->todayDate);
        $lastModifiedDate = "(not set)";
        $recognitionDate  = date("m/d/Y", $Recog);
        $renewalDate      = date("m/d/Y", $Renew);
        
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId4));
        
        $I->cantSee(\Page\ApplicationDetails::RequiresRenewalStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        $I->cantSee(\Page\ApplicationDetails::RecertifyStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(4);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->fillField(\Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$SaveDateButton_BusinessInfoTab);
        $I->wait(4);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->cantSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->canSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business4));
        $I->canSee($renewalDate, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business4));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId4));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee($status, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId4));
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function ChangeStatusToRecognizedFromInProcess_Business5(AcceptanceTester $I){
        $status           = \Page\ApplicationDetails::RecognizedStatus;
        $Recog            = strtotime("-4 years", strtotime($this->todayDate));
        $Renew            = strtotime("-2 years", strtotime($this->todayDate));
        $lastModifiedDate = "(not set)";
        $recognitionDate  = date("m/d/Y", $Recog);
        $renewalDate      = date("m/d/Y", $Renew);
        
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId5));
        
        $I->cantSee(\Page\ApplicationDetails::RequiresRenewalStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        $I->cantSee(\Page\ApplicationDetails::RecertifyStatus, \Page\ApplicationDetails::$StatusSelect_BusinessInfoTab." option");
        
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(4);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->fillField(\Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
        $I->wait(1);
        $I->click(\Page\ApplicationDetails::$SaveDateButton_BusinessInfoTab);
        $I->wait(4);
        $I->comment("Check on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->cantSeeElement(\Page\NeedRenewalList::$EmptyListLabel);
        $I->canSeeElement(\Page\NeedRenewalList::CompanyNameLine_ByBusName($this->business5));
        $I->canSee($renewalDate, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business5));
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId5));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($lastModifiedDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee($status, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        
        $I->comment("Check on Business Info Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId5));
        $I->canSeeInField(Page\ApplicationDetails::$RecognitionDateField_BusinessInfoTab, $recognitionDate);
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function CheckFilterOnDashboard2_AfterChangingStatuses(AcceptanceTester $I){
        $recognitionDate  = "(not set)";
        
        $Recog_B1            = strtotime("-1 year -6 months", strtotime($this->todayDate));
        $recognitionDate_B1  = date("m/d/Y", $Recog_B1);
        
        $Recog_B3            = strtotime("-2 years -3 months", strtotime($this->todayDate));
        $recognitionDate_B3  = date("m/d/Y", $Recog_B3);
        
        $Recog_B4            = strtotime("-2 years", strtotime($this->todayDate));
        $recognitionDate_B4  = date("m/d/Y", $Recog_B4);
        
        $Recog_B5            = strtotime("-4 years", strtotime($this->todayDate));
        $recognitionDate_B5  = date("m/d/Y", $Recog_B5);
        
        $I->comment("Check on Dashboard");
        $I->amOnPage(\Page\Dashboard::URL());
        $I->cantSeeElement(\Page\Dashboard::$NeedRenewalBusinessesAlert);
//        $I->canSee("Alert you have 4 companies", \Page\Dashboard::$NeedRenewalBusinessesAlert);
        $I->canSee('5', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::All_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ChecklistSubmission3_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::PhoneConsult_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::SiteVisit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Audit_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::ComplianceCheck_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::InProcess_Filter, \Page\Dashboard::Tier3_Filter));
        
        $I->canSee('3', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Recertification_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier1_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier2_Filter));
        $I->canSee('0', \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::Tier3_Filter));
        $I->canSee("4", \Page\Dashboard::FilterSubItemCount_ByFilterName(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::PendingRenewals_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Recertifying_Filter));
        
        $I->canSee('1', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Decertified_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::Nonresponsive_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::MovedClosed_Filter));
        
        $I->canSee('0', \Page\Dashboard::FilterItemCount_ByFilterName(\Page\Dashboard::NotSuitable_Filter));
        $I->click(\Page\Dashboard::FilterItem_ByFilterName(\Page\Dashboard::All_Filter));
        $I->wait(2);
        $I->waitForElement("label[data-key=all].active", 60);
        $I->wait(2);
        
        $I->canSee(\Page\Dashboard::Decertified_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business1));
        $I->canSee($recognitionDate_B1, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business1));
        $I->canSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business1));
        
        $I->canSee(\Page\Dashboard::Recertifying_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business2));
        $I->canSee($recognitionDate, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business2));
        $I->cantSeeElement(\Page\Dashboard::CertificationDate_ByBusName($this->business2));
        $I->cantSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business2));
        
        $I->canSee(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business3));
        $I->canSee($recognitionDate_B3, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business3));
        $I->canSee($recognitionDate_B3, \Page\Dashboard::CertificationDate_ByBusName($this->business3));
        $I->canSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business3));
        
        $I->canSee(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business4));
        $I->canSee($recognitionDate_B4, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business4));
        $I->canSee($recognitionDate_B4, \Page\Dashboard::CertificationDate_ByBusName($this->business4));
        $I->canSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business4));
        
        $I->canSee(\Page\Dashboard::Recognized_Filter, \Page\Dashboard::StatusOfBusiness_ByBusName($this->business5));
        $I->canSee($recognitionDate_B5, \Page\Dashboard::Date_StatusOfBus_ByBusName($this->business5));
        $I->canSee($recognitionDate_B5, \Page\Dashboard::CertificationDate_ByBusName($this->business5));
        $I->canSeeElement(\Page\Dashboard::CertificationDateLabel_ByBusName($this->business5));
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business2_CheckRenotifyAndExtendedFunctionOnNeedRenewalListPage(AcceptanceTester $I){
        $recognitionDate        = "(not set)";
        $renewalDate            = "(not set)";
        
        $subject                = "New subjject (need renewal edited)";
        
        $lastModifiedDateArchive4 = $this->todayDate;
        $recognitionDateArchive4  = "(not set)";
        $renewalDateArchive4      = "(not set)";
        
        $lastModifiedDateArchive3 = $this->todayDate;
        $Recog3                   = strtotime("-2 years +1 day", strtotime($this->todayDate));
        $Renew3                   = strtotime("-1 year +1 day", strtotime($this->todayDate));
        $recognitionDateArchive3  = date("m/d/Y", $Recog3);
        $renewalDateArchive3      = date("m/d/Y", $Renew3);
        
        $lastModifiedDateArchive2 = $this->todayDate;
        $recognitionDateArchive2  = "(not set)";
        $renewalDateArchive2      = "(not set)";
        
        $lastModifiedDateArchive1 = "(not set)";
        $recognitionDateArchive1  = "(not set)";
        $renewalDateArchive1      = "(not set)";
        
        $I->comment("Renotify Business2 on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->canSee($renewalDateArchive3, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business2));
        
        $I->click(\Page\NeedRenewalList::NotifyButtonLine_ByBusName($this->business2));
        $I->wait(5);
        $I->waitForElement(Page\CommunicationCreatePopup::SendMessagePopup, 120);
        $I->wait(1);
        $I->cantSeeElement(Page\CommunicationCreatePopup::$SendMessagePopup_UserTypeSelect);
        $I->canSeeInField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(13);
        $I->canSee('', Page\NeedRenewalList::ReNotifyDateLine_ByBusName($this->business2));
        $I->canSee('', Page\NeedRenewalList::ExtendedDateLine_ByBusName($this->business2));
        $I->canSee($renewalDateArchive3, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business2));
        
        $I->click(\Page\NeedRenewalList::RenotifyButtonLine_ByBusName($this->business2));
        $I->wait(5);
        $I->waitForElement(Page\CommunicationCreatePopup::SendMessagePopup, 120);
        $I->wait(1);
        $I->cantSeeElement(Page\CommunicationCreatePopup::$SendMessagePopup_UserTypeSelect);
        $I->canSeeInField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(13);
        $I->canSee("$this->todayDate", Page\NeedRenewalList::ReNotifyDateLine_ByBusName($this->business2));
        $I->canSee('', Page\NeedRenewalList::ExtendedDateLine_ByBusName($this->business2));
        $I->comment("-----");
        $I->canSee($renewalDateArchive3, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business2));
        
        $I->click(\Page\NeedRenewalList::Extend3MonthButtonLine_ByBusName($this->business2));
        $I->wait(4);
        $I->canSee("$this->todayDate", Page\NeedRenewalList::ReNotifyDateLine_ByBusName($this->business2));
        $I->canSee("$this->todayDate", Page\NeedRenewalList::ExtendedDateLine_ByBusName($this->business2));
        $I->comment("-----");
        $I->comment("Previous Expiration Date: $renewalDateArchive3");
        $Renew3                   = strtotime("+3 months", strtotime($renewalDateArchive3));
        $I->comment("-----");
        $renewalDateArchive3      = date("m/d/Y", $Renew3);
        $I->comment("-----");
        $I->comment("Extend + 3 months(1): $renewalDateArchive3");
        $I->comment("-----");
        $I->canSee($renewalDateArchive3, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business2));
        
        $I->click(\Page\NeedRenewalList::RenotifyButtonLine_ByBusName($this->business2));
        $I->wait(5);
        $I->waitForElement(Page\CommunicationCreatePopup::SendMessagePopup, 120);
        $I->wait(1);
        $I->cantSeeElement(Page\CommunicationCreatePopup::$SendMessagePopup_UserTypeSelect);
        $I->canSeeInField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(13);
        $I->canSee("$this->todayDate\n$this->todayDate", Page\NeedRenewalList::ReNotifyDateLine_ByBusName($this->business2));
        $I->canSee("$this->todayDate", Page\NeedRenewalList::ExtendedDateLine_ByBusName($this->business2));
        
        $I->click(\Page\NeedRenewalList::Extend3MonthButtonLine_ByBusName($this->business2));
        $I->wait(4);
        $I->canSee("$this->todayDate\n$this->todayDate", Page\NeedRenewalList::ReNotifyDateLine_ByBusName($this->business2));
        $I->canSee("$this->todayDate\n$this->todayDate", Page\NeedRenewalList::ExtendedDateLine_ByBusName($this->business2));
        $I->comment("-----");
        $I->comment("Previous Expiration Date: $renewalDateArchive3");
        $Renew3                   = strtotime("+3 months", strtotime($renewalDateArchive3));
        $I->comment("-----");
        $renewalDateArchive3      = date("m/d/Y", $Renew3);
        $I->comment("-----");
        $I->comment("Extend + 3 months(2): $renewalDateArchive3");
        $I->comment("-----");
        $I->canSee($renewalDateArchive3, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business2));
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Communication($this->busId2));
        $I->canSee($this->program1, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
        
        $I->canSee($this->program1, Page\ApplicationDetails::SenderLine_CommunicationTab('2'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('2'));
        
        $I->canSee($this->program1, Page\ApplicationDetails::SenderLine_CommunicationTab('3'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('3'));
        
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId2));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee($this->todayDate, Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::RecertifyingStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        
        
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('2'));
        $I->canSee($lastModifiedDateArchive4, Page\ApplicationDetails::LastModifiedLine_RecordsTab('2'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('2'));
        $I->canSee($recognitionDateArchive4, Page\ApplicationDetails::RecognitionLine_RecordsTab('2'));
        $I->canSee($renewalDateArchive4, Page\ApplicationDetails::RenewalLine_RecordsTab('2'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('2'));
        
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('3'));
        $I->canSee($lastModifiedDateArchive3, Page\ApplicationDetails::LastModifiedLine_RecordsTab('3'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('3'));
        $I->canSee($recognitionDateArchive3, Page\ApplicationDetails::RecognitionLine_RecordsTab('3'));
        $I->canSee($renewalDateArchive3, Page\ApplicationDetails::RenewalLine_RecordsTab('3'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('3'));
        
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('4'));
        $I->canSee($lastModifiedDateArchive2, Page\ApplicationDetails::LastModifiedLine_RecordsTab('4'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('4'));
        $I->canSee($recognitionDateArchive2, Page\ApplicationDetails::RecognitionLine_RecordsTab('4'));
        $I->canSee($renewalDateArchive2, Page\ApplicationDetails::RenewalLine_RecordsTab('4'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('4'));
        
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('5'));
        $I->canSee($lastModifiedDateArchive1, Page\ApplicationDetails::LastModifiedLine_RecordsTab('5'));
        $I->canSee(Page\ApplicationDetails::ArchivedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('5'));
        $I->canSee($recognitionDateArchive1, Page\ApplicationDetails::RecognitionLine_RecordsTab('5'));
        $I->canSee($renewalDateArchive1, Page\ApplicationDetails::RenewalLine_RecordsTab('5'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('5'));
        
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business3_CheckExtendedFunctionOnNeedRenewalListPage(AcceptanceTester $I){
//        $recognitionDate        = "(not set)";
//        $renewalDate            = "(not set)";
        
        $subject                = "New subjject (need renewal edited)";
        
        $Recog            = strtotime("-2 years -3 months", strtotime($this->todayDate));
        $Renew            = strtotime("-3 months", strtotime($this->todayDate));
        $recognitionDate  = date("m/d/Y", $Recog);
        $renewalDate      = date("m/d/Y", $Renew);
        
        $I->comment("Extend 3 month to Business3 on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->canSee($renewalDate, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business3));
        $I->canSee('', Page\NeedRenewalList::ReNotifyDateLine_ByBusName($this->business3));
        $I->canSee('', Page\NeedRenewalList::ExtendedDateLine_ByBusName($this->business3));
        
        $I->click(\Page\NeedRenewalList::Extend3MonthButtonLine_ByBusName($this->business3));
        $I->wait(4);
        $I->canSee("", Page\NeedRenewalList::ReNotifyDateLine_ByBusName($this->business3));
        $I->canSee("$this->todayDate", Page\NeedRenewalList::ExtendedDateLine_ByBusName($this->business3));
        $I->comment("-----");
        $I->comment("Previous Expiration Date: $renewalDate");
        $Renew                   = strtotime("+3 months", strtotime($renewalDate));
        $I->comment("-----");
        $renewalDate      = date("m/d/Y", $Renew);
        $I->comment("-----");
        $I->comment("Extend + 3 months(1): $renewalDate");
        $I->comment("-----");
        $I->canSee($renewalDate, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business3));
        
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId3));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee("(not set)", Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::RecognizedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        
    }
    
    /**
     * @group admin
     * @group stateadmin
     * @group coordinator
     */
    
    public function Business4_CheckRenotifyFunctionOnNeedRenewalListPage(AcceptanceTester $I){
//        $recognitionDate        = "(not set)";
//        $renewalDate            = "(not set)";
        
        $subject          = "Requires renewal";
        
        $Recog            = strtotime("-2 years", strtotime($this->todayDate));
        $Renew            = strtotime($this->todayDate);
        $recognitionDate  = date("m/d/Y", $Recog);
        $renewalDate      = date("m/d/Y", $Renew);
        
        $I->comment("Renotify Business4 on Need Renewal list");
        $I->amOnPage(\Page\NeedRenewalList::URL());
        $I->canSee($renewalDate, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business4));
        $I->canSee('', Page\NeedRenewalList::ReNotifyDateLine_ByBusName($this->business4));
        $I->canSee('', Page\NeedRenewalList::ExtendedDateLine_ByBusName($this->business4));
        
        $I->click(\Page\NeedRenewalList::NotifyButtonLine_ByBusName($this->business4));
        $I->wait(5);
        $I->waitForElement(Page\CommunicationCreatePopup::SendMessagePopup, 120);
        $I->wait(1);
        $I->cantSeeElement(Page\CommunicationCreatePopup::$SendMessagePopup_UserTypeSelect);
        $I->canSeeInField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(13);
        $I->canSee("", Page\NeedRenewalList::ReNotifyDateLine_ByBusName($this->business4));
        $I->canSee("", Page\NeedRenewalList::ExtendedDateLine_ByBusName($this->business4));
        $I->canSee($renewalDate, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business4));
        $I->click(\Page\NeedRenewalList::RenotifyButtonLine_ByBusName($this->business4));
        $I->wait(5);
        $I->waitForElement(Page\CommunicationCreatePopup::SendMessagePopup, 120);
        $I->wait(1);
        $I->cantSeeElement(Page\CommunicationCreatePopup::$SendMessagePopup_UserTypeSelect);
        $I->canSeeInField(Page\CommunicationCreatePopup::$SendMessagePopup_SubjectField, $subject);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_SendButton);
        $I->wait(13);
        $I->canSee("$this->todayDate", Page\NeedRenewalList::ReNotifyDateLine_ByBusName($this->business4));
        $I->canSee("", Page\NeedRenewalList::ExtendedDateLine_ByBusName($this->business4));
        $I->canSee($renewalDate, Page\NeedRenewalList::ExpirationDateLine_ByBusName($this->business4));
        
        $I->comment("Check on Communication Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Communication($this->busId4));
        $I->canSee($this->program2, Page\ApplicationDetails::SenderLine_CommunicationTab('1'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('1'));
        
        $I->canSee($this->program2, Page\ApplicationDetails::SenderLine_CommunicationTab('2'));
        $I->canSee($subject, Page\ApplicationDetails::SubjectLine_CommunicationTab('2'));
        
        
        $I->comment("Check on Records Tab");
        $I->amOnPage(\Page\ApplicationDetails::URL_Records($this->busId4));
        $I->canSee($this->todayDate, Page\ApplicationDetails::CreatedLine_RecordsTab('1'));
        $I->canSee("(not set)", Page\ApplicationDetails::LastModifiedLine_RecordsTab('1'));
        $I->canSee(Page\ApplicationDetails::RecognizedStatus, Page\ApplicationDetails::StatusLine_RecordsTab('1'));
        $I->canSee($recognitionDate, Page\ApplicationDetails::RecognitionLine_RecordsTab('1'));
        $I->canSee($renewalDate, Page\ApplicationDetails::RenewalLine_RecordsTab('1'));
        $I->canSeeElement(Page\ApplicationDetails::ViewButtonLine_RecordsTab('1'));
        
    }
}
