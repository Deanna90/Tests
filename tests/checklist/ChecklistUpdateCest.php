<?php


class ChecklistUpdateCest
{
    public $state, $todayDate;
    public $audSubgroup1_Energy;
    public $audSubgroup1_SolidWaste;
    public $measure1Desc, $idMeasure1;
    public $measure2Desc, $idMeasure2;
    public $measure3Desc, $idMeasure3;
    public $measure4Desc, $idMeasure4;
    public $measure5Desc, $idMeasure5;
    public $measure6Desc, $idMeasure6;
    public $measuresDesc_SuccessCreated = [];
    public $city1, $zip1, $program1, $sector1, $county;
    public $city2, $zip2, $program2;
    public $statusesDefault   = ['not set',  'not set',  'not set', 'not set',  'not set',  'not set'];
    public $statuses2         = ['core',     'elective', 'not set', 'not set',  'elective', 'not set'];
    public $statuses3         = ['core',     'core',     'core',    'not set',  'core',     'not set'];
    public $statuses4         = ['elective', 'not set',  'not set', 'not set',  'elective', 'elective'];
    public $statuses5         = ['core',     'elective', 'not set', 'elective', 'elective', 'elective'];
    public $statuses6         = ['elective', 'elective', 'not set', 'not set',  'core',     'core'];
    public $extensionsDefault = ['Default',         'Default',         'Default',         'Default',         'Default',         'Default'];
    public $extensions2       = ['Large Landscape', 'Default',         'Default',         'Default',         'Large Landscape', 'Default'];
    public $extensions3       = ['Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape', 'Large Landscape'];
    public $extensions4       = ['Default',         'Default',         'Default',         'Default',         'Default',         'Default'];
    public $extensions5       = ['Large Building',  'Large Building',  'Large Building',  'Large Building',  'Large Building',  'Large Building'];
    public $extensions6       = ['Default',         'Large Landscape', 'Default',         'Large Landscape', 'Large Building',  'Default'];
    public $checklistUrl1, $checklistUrl2, $checklistUrl3, $checklistUrl4, $checklistUrl5, $checklistUrl6;
    public $id_checklist1, $id_checklist2, $id_checklist3, $id_checklist4, $id_checklist5, $id_checklist6;
    public $business1, $business2, $business3;
    public $busId1, $busId2, $busId3;


    public function Help_LoginAsNationalAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    public function Help_CreateState(Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StCheckCreate");
        $shortName = 'ChCr';
        
        $I->CreateState($name, $shortName);
        date_default_timezone_set("UTC");
        $this->todayDate  = date("m/d/Y");
    }
    
    public function Help_SelectDefaultState(AcceptanceTester $I)
    {
        $I->wait(2);
        $I->SelectDefaultState($I, $this->state);
    }
    
    public function Help_CreateAuditSubGroupForEnergyGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name      = $this->audSubgroup1_Energy = $I->GenerateNameOf("EnAudSub1");
        $auditGroup = Page\AuditGroupList::Energy_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->wait(3);
    }
    
    public function Help_CreateAuditSubGroupsForSolidWasteGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup1_SolidWaste = $I->GenerateNameOf("SolWasAudSub1");
        $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->wait(3);
    }
    
    public function Help_CreateMeasure1(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure1Desc = $I->GenerateNameOf("Description_1");
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
        $this->idMeasure1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help_CreateMeasure2(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure2Desc = $I->GenerateNameOf("Description_2");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::PopupLighting_QuantitativeSubmeasure;
        $questions      = ['q1'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure2 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help_CreateMeasure3(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure3Desc = $I->GenerateNameOf("Description_3");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::PopupTherms_QuantitativeSubmeasure;
        $questions      = ['q1'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure3 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help_CreateMeasure4(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure4Desc = $I->GenerateNameOf("Description_4");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::PopupWasteDivertion_QuantitativeSubmeasure;
        $questions      = ['q'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure4 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help_CreateMeasure5(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure5Desc = $I->GenerateNameOf("Description_5");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::PopupTherms_QuantitativeSubmeasure;
        $questions      = ['q1'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure5 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function Help_CreateMeasure6(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure6Desc = $I->GenerateNameOf("Description_6");
        $auditGroup     = \Page\AuditGroupList::SolidWaste_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_SolidWaste;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::PopupLighting_QuantitativeSubmeasure;
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType);
        $I->wait(3);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure6 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    //-------------------------------Create county------------------------------
    
    
    public function Help_CreateCounty(\Step\Acceptance\County $I) {
        $name    = $this->county = $I->GenerateNameOf("County");
        $state   = $this->state;
        
        $I->CreateCounty($name, $state);
    }
    
    public function Help_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city1 = $I->GenerateNameOf("CityChCr1");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip1 = $I->GenerateZipCode();
        $program = $this->program1 = $I->GenerateNameOf("ProgChCr1");
        
        $I->CreateCity($city, $state, $zips, $this->county);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    public function Help_CreateCity2_And_Program2(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city2 = $I->GenerateNameOf("CityChCr2");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip2 = $I->GenerateZipCode();
        $program = $this->program2 = $I->GenerateNameOf("ProgChCr2");
        
        $I->CreateCity($city, $state, $zips, $this->county);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    //--------------------------------------------------------------------------Create Sectors-----------------------------------------------------------------------------------------
    
    public function CreateSectorForProgram1(\Step\Acceptance\Sector $I)
    {
        $I->wantTo("Create sector#1 for program#1 in default state");
        $name      = $this->sector1 = $I->GenerateNameOf("SecProg1");
        $state     = $this->state;
        $program   = $this->program1;
        
        $I->CreateSector($name, $state, $program);
        $I->wait(2);
    }
    
    //--------------------------------------------------------------------------Create Checklist--------------------------------------------------------------------------------------
    
    //------------------Create Checklists--------------------
    
    public function CreateChecklist_Program1_SD_OfficeRetail(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = \Page\ChecklistCreate::DefaultSourceProgram;
        $programDestination = $this->program1;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '2';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $this->id_checklist1 = $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->cantSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->cantSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        $I->CheckExtensionSelectsForEditingOnManageChecklistPage($descs);
        $I->CheckStatusSelectsForEditingOnManageChecklistPage(null, $descs);
        $I->CheckSavedValuesOnManageChecklistPage($descs, $this->statusesDefault);
        $I->reloadPage();
        $I->PublishChecklistStatus($this->id_checklist1);
    }
    
    public function Help_LogOut(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->Logout($I);
    }
    
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------Business1 register-------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function LargeBusiness_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business1= $I->GenerateNameOf("bus1_LB");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip1;
        $city             = $this->city1;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '123';
        $landscapeFootage = '333';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(5);
        $I->waitForElement(Page\RegistrationStarted::$LeftMenu_GetStartedButton, 100);
    }
    
    public function Help_LogOutFromBusiness1_And_LoginAsAdmin(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsAdmin($I);
    }
    
    public function Get_Business1_Id(Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\Dashboard::URL());
        $I->wait(3);
        $url1 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business1), 'href');
        $I->comment("Url1: $url1");
        $u1 = explode('=', $url1);
        $this->busId1 = $u1[1];
        $I->comment("Business1 id: $this->busId1.");
    }
    
    public function CheckDefaultMeasures_Present_Default_CoreAndElective_OnChecklistPreview(Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist1));
        $I->wait(3);
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, "View All");
        $I->wait(2);
//        $I->CheckExtensionSelectsForEditingOnManageChecklistPage($this->measuresDesc_SuccessCreated);
//        $I->CheckStatusSelectsForEditingOnManageChecklistPage($this->measuresDesc_SuccessCreated);
        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $this->statusesDefault, $this->extensionsDefault);
    }
    
    public function CheckElementsOn_VersionTab_DefineTotalMeasuresNeeded(Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist1));
        $I->wait(3);
        $I->click(Page\ChecklistManage::$VersionHistoryTab);
        $I->wait(2);
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSeeElement(Page\ChecklistManage::$VersionRow);
        $I->canSee('1', Page\ChecklistManage::$SummaryCount);
        $I->canSee('Published', Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->canSee($this->todayDate, Page\ChecklistManage::CreatedLine_VersionHistoryTab('1'));
        $I->canSee($this->todayDate, Page\ChecklistManage::UpdatedLine_VersionHistoryTab('1'));
        $I->canSeeElement(Page\ChecklistManage::EditButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(Page\ChecklistManage::UnPublishButtonLine_VersionHistoryTab('1'));
        $I->canSee($this->id_checklist1, Page\ChecklistManage::IdLine_VersionHistoryTab('1'));
        $I->cantSeeElement(Page\ChecklistManage::PublishButtonLine_VersionHistoryTab('1'));
        $I->cantSeeElement(Page\ChecklistManage::ArchiveButtonLine_VersionHistoryTab('1'));
        
        $I->click(Page\ChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(2);
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSeeElement(Page\ChecklistManage::$SubgroupsHead_DefineTotalTab);
        $I->cantSeeElement(Page\ChecklistManage::$SubgroupRow_DefineTotalTab);
    }
    
    public function CloneChecklist1AndUpdateNewChecklist(Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist1));
        $I->wait(3);
        $I->click(Page\ChecklistManage::$VersionHistoryTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('1'));
        $I->wait(2);
        $I->waitForText("Checklist cloned!");
        $I->click(".confirm");
        $I->wait(1);
        $I->canSeeElement(Page\ChecklistManage::$VersionRow);
        $I->canSee('2', Page\ChecklistManage::$SummaryCount);
        
        $I->canSee('Draft', Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->canSee($this->todayDate, Page\ChecklistManage::CreatedLine_VersionHistoryTab('1'));
        $I->canSee($this->todayDate, Page\ChecklistManage::UpdatedLine_VersionHistoryTab('1'));
        $I->canSeeElement(Page\ChecklistManage::EditButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(Page\ChecklistManage::PublishButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(Page\ChecklistManage::ArchiveButtonLine_VersionHistoryTab('1'));
        $this->id_checklist2 = $I->grabTextFrom(Page\ChecklistManage::IdLine_VersionHistoryTab('1'));
        
        
        $I->canSee('Published', Page\ChecklistManage::StatusLine_VersionHistoryTab('2'));
        $I->canSee($this->todayDate, Page\ChecklistManage::CreatedLine_VersionHistoryTab('2'));
        $I->canSee($this->todayDate, Page\ChecklistManage::UpdatedLine_VersionHistoryTab('2'));
        $I->canSeeElement(Page\ChecklistManage::EditButtonLine_VersionHistoryTab('2'));
        $I->canSeeElement(Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('2'));
        $I->canSeeElement(Page\ChecklistManage::UnPublishButtonLine_VersionHistoryTab('2'));
        $I->canSee($this->id_checklist1, Page\ChecklistManage::IdLine_VersionHistoryTab('2'));
        $I->cantSeeElement(Page\ChecklistManage::PublishButtonLine_VersionHistoryTab('2'));
        $I->cantSeeElement(Page\ChecklistManage::ArchiveButtonLine_VersionHistoryTab('2'));
        
        
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        $I->PublishChecklistStatus($this->id_checklist2);
        $I->wait(4);
        $I->cantSee("Error");
        $I->reloadPage();
        $I->wait(2);
        $I->canSeeInCurrentUrl(\Page\ChecklistManage::URL_VersionTab($this->id_checklist2));
        $I->cantSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->cantSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        $I->click(\Page\ChecklistManage::EditButtonLine_VersionHistoryTab('1'));
        $I->wait(3);
        $I->canSeeInCurrentUrl(\Page\ChecklistManage::URL($this->id_checklist2));
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, "View All");
        $I->wait(2);
        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $this->statusesDefault);
    }
    
    public function ManageChecklist(Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist2));
        $I->wait(3);
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, "View All");
        $I->wait(2);
        $I->ManageChecklist($this->measuresDesc_SuccessCreated, $this->statuses2, $this->extensions2);
        $I->wait(2);
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, "View All");
        $I->wait(2);
        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses2, $this->extensions2);
    }
    
    public function CheckOldChecklist1IsNotAvailableForEdit(Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist1));
        $I->wait(3);
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, "View All");
        $I->wait(2);
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $this->statusesDefault);
    }
    
    public function CheckOldChecklist1_InBusiness1(Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ApplicationDetails::URL_BusinessInfo($this->busId1));
        $I->wait(3);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_ApplicationDetailsButton);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_DeleteApplicationButton);
        $I->canSeeElement(\Page\BusinessChecklistView::$LeftMenu_BusinessLoginButton);
        $I->canSeeElement(\Page\BusinessChecklistView::LeftMenu_PrintSecondTierButton('Tier 2'));
        $I->cantSeeElement(\Page\BusinessChecklistView::$LeftMenu_EnergyGroupButton);
        $I->cantSeeElement(\Page\BusinessChecklistView::$LeftMenu_GeneralGroupButton);
        $I->cantSeeElement(\Page\BusinessChecklistView::$LeftMenu_WaterGroupButton);
        $I->cantSeeElement(\Page\BusinessChecklistView::$LeftMenu_WastewaterGroupButton);
        $I->cantSeeElement(\Page\BusinessChecklistView::$LeftMenu_PollutionPreventionGroupButton);
        $I->cantSeeElement(\Page\BusinessChecklistView::$LeftMenu_SolidWasteGroupButton);
        $I->cantSeeElement(\Page\BusinessChecklistView::$LeftMenu_TransportationGroupButton);
    }
    
    public function Help_LogOuth(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->Logout($I);
    }
    
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------Business2 register-------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function Business2_Register_For_Checklist2(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business2= $I->GenerateNameOf("bus_2_");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zip1;
        $city             = $this->city1;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '123';
        $landscapeFootage = '333';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(5);
        $I->waitForElement(Page\RegistrationStarted::$LeftMenu_GetStartedButton, 100);
    }
    
    public function Help_LogOutFromBusiness2_And_LoginAsAdmin(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->wait(1);
        $I->LoginAsAdmin($I);
    }
    
    public function Get_Business2_Id(Step\Acceptance\Checklist $I) {
        $I->amOnPage(Page\Dashboard::URL());
        $I->wait(3);
        $url2 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business2), 'href');
        $I->comment("Url2: $url2");
        $u2 = explode('=', $url2);
        $this->busId2 = $u2[1];
        $I->comment("Business2 id: $this->busId2.");
    }
    
    public function CheckThatChecklist1IsNotAvailableToEditAfter_Business2Registration(Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist1));
        $I->wait(3);
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, "View All");
        $I->wait(2);
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $this->statusesDefault);
    }
    
    public function CheckThatChecklist2IsNotAvailableToEditAfter_Business2Registration(Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist2));
        $I->wait(3);
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, "View All");
        $I->wait(2);
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses2, $this->extensions2);
    }
    
    public function CheckElementsOn_VersionTab_DefineTotalMeasuresNeeded_TwoChecklistVersions(Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist2));
        $I->wait(3);
        $I->click(Page\ChecklistManage::$VersionHistoryTab);
        $I->wait(2);
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSeeElement(Page\ChecklistManage::$VersionRow);
        $I->canSee('2', Page\ChecklistManage::$SummaryCount);
        $I->canSee('Published', Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->canSee($this->todayDate, Page\ChecklistManage::CreatedLine_VersionHistoryTab('1'));
        $I->canSee($this->todayDate, Page\ChecklistManage::UpdatedLine_VersionHistoryTab('1'));
        $I->canSeeElement(Page\ChecklistManage::EditButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(Page\ChecklistManage::UnPublishButtonLine_VersionHistoryTab('1'));
        $I->canSee($this->id_checklist2, Page\ChecklistManage::IdLine_VersionHistoryTab('1'));
        $I->cantSeeElement(Page\ChecklistManage::PublishButtonLine_VersionHistoryTab('1'));
        $I->cantSeeElement(Page\ChecklistManage::ArchiveButtonLine_VersionHistoryTab('1'));
        
        $I->canSee('Draft', Page\ChecklistManage::StatusLine_VersionHistoryTab('2'));
        $I->canSee($this->todayDate, Page\ChecklistManage::CreatedLine_VersionHistoryTab('2'));
        $I->canSee($this->todayDate, Page\ChecklistManage::UpdatedLine_VersionHistoryTab('2'));
        $I->canSeeElement(Page\ChecklistManage::EditButtonLine_VersionHistoryTab('2'));
        $I->canSeeElement(Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('2'));
        $I->cantSeeElement(Page\ChecklistManage::UnPublishButtonLine_VersionHistoryTab('2'));
        $I->canSee($this->id_checklist1, Page\ChecklistManage::IdLine_VersionHistoryTab('2'));
        $I->canSeeElement(Page\ChecklistManage::PublishButtonLine_VersionHistoryTab('2'));
        $I->canSeeElement(Page\ChecklistManage::ArchiveButtonLine_VersionHistoryTab('2'));
        
        $I->click(Page\ChecklistManage::$DefineTotalMeasuresNeededTab);
        $I->wait(2);
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSeeElement(Page\ChecklistManage::$SubgroupsHead_DefineTotalTab);
        $I->canSeeElement(Page\ChecklistManage::$SubgroupRow_DefineTotalTab);
        $I->canSeeElement(Page\ChecklistManage::SubgroupLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSee('0', Page\ChecklistManage::CoreMeasuresLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSee('1', Page\ChecklistManage::TotalElectiveLine_DefineTotalTab($this->audSubgroup1_Energy));
        $I->canSeeInField(Page\ChecklistManage::CountOfElectiveEnabledMeasuresFieldLine_DefineTotalTab($this->audSubgroup1_Energy), '0');
        $I->canSee('0', Page\ChecklistManage::TotalMeasuresMustCompleteLine_DefineTotalTab($this->audSubgroup1_Energy));
    }
    
    public function CloneChecklist2AndUpdateNewChecklist(Step\Acceptance\Checklist $I) {
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist2));
        $I->wait(3);
        $I->click(Page\ChecklistManage::$VersionHistoryTab);
        $I->wait(2);
        $I->click(Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('1'));
        $I->wait(2);
        $I->waitForText("Checklist cloned!");
        $I->click(".confirm");
        $I->wait(1);
        $I->canSeeElement(Page\ChecklistManage::$VersionRow);
        $I->canSee('3', Page\ChecklistManage::$SummaryCount);
        
        $I->canSee('Draft', Page\ChecklistManage::StatusLine_VersionHistoryTab('1'));
        $I->canSee($this->todayDate, Page\ChecklistManage::CreatedLine_VersionHistoryTab('1'));
        $I->canSee($this->todayDate, Page\ChecklistManage::UpdatedLine_VersionHistoryTab('1'));
        $I->canSeeElement(Page\ChecklistManage::EditButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(Page\ChecklistManage::PublishButtonLine_VersionHistoryTab('1'));
        $I->canSeeElement(Page\ChecklistManage::ArchiveButtonLine_VersionHistoryTab('1'));
        $this->id_checklist3 = $I->grabTextFrom(Page\ChecklistManage::IdLine_VersionHistoryTab('1'));
        
        $I->canSee('Published', Page\ChecklistManage::StatusLine_VersionHistoryTab('2'));
        $I->canSee($this->todayDate, Page\ChecklistManage::CreatedLine_VersionHistoryTab('2'));
        $I->canSee($this->todayDate, Page\ChecklistManage::UpdatedLine_VersionHistoryTab('2'));
        $I->canSeeElement(Page\ChecklistManage::EditButtonLine_VersionHistoryTab('2'));
        $I->canSeeElement(Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('2'));
        $I->canSeeElement(Page\ChecklistManage::UnPublishButtonLine_VersionHistoryTab('2'));
        $I->canSee($this->id_checklist2, Page\ChecklistManage::IdLine_VersionHistoryTab('2'));
        $I->cantSeeElement(Page\ChecklistManage::PublishButtonLine_VersionHistoryTab('2'));
        $I->cantSeeElement(Page\ChecklistManage::ArchiveButtonLine_VersionHistoryTab('2'));
        
        $I->canSee('Draft', Page\ChecklistManage::StatusLine_VersionHistoryTab('3'));
        $I->canSee($this->todayDate, Page\ChecklistManage::CreatedLine_VersionHistoryTab('3'));
        $I->canSee($this->todayDate, Page\ChecklistManage::UpdatedLine_VersionHistoryTab('3'));
        $I->canSeeElement(Page\ChecklistManage::EditButtonLine_VersionHistoryTab('3'));
        $I->canSeeElement(Page\ChecklistManage::CloneButtonLine_VersionHistoryTab('3'));
        $I->canSeeElement(Page\ChecklistManage::PublishButtonLine_VersionHistoryTab('3'));
        $I->canSeeElement(Page\ChecklistManage::ArchiveButtonLine_VersionHistoryTab('3'));
        $I->canSee($this->id_checklist1, Page\ChecklistManage::IdLine_VersionHistoryTab('3'));
        
        $I->canSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->canSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        $I->wait(1);
        $I->canSeeInCurrentUrl(\Page\ChecklistManage::URL_VersionTab($this->id_checklist2));
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist3));
        $I->wait(1);
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, "View All");
        $I->wait(2);
        $I->cantSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->cantSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses2, $this->extensions2);
    }
    
    public function ManageChecklist3(Step\Acceptance\Checklist $I) {
        $extensions3AfterSaving    = ['Large Landscape', 'Large Landscape', 'Large Landscape', 'Default', 'Large Landscape', 'Default'];
        
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist3));
        $I->wait(3);
        $I->ManageChecklist($this->measuresDesc_SuccessCreated, $this->statuses3, $this->extensions3);
        $I->wait(2);
        $I->canSee("Checklist was successfully updated");
        $I->reloadPage();
        $I->wait(2);
        $I->PublishChecklistStatus($this->id_checklist3);
        $I->wait(4);
        $I->cantSee("Error");
        $I->reloadPage();
        $I->wait(1);
        $I->canSeeInCurrentUrl(\Page\ChecklistManage::URL_VersionTab($this->id_checklist3));
        $I->cantSeeElement(Page\ChecklistManage::$OnlyViewModeAlert);
        $I->cantSee(Page\ChecklistManage::OnlyViewModeMessage, Page\ChecklistManage::$OnlyViewModeAlert);
        $I->amOnPage(\Page\ChecklistManage::URL($this->id_checklist3));
        $I->wait(1);
        $I->selectOption(Page\ChecklistManage::$Filter_ByStatusSelect, "View All");
        $I->wait(2);
        $I->CheckSavedValuesOnManageChecklistPage($this->measuresDesc_SuccessCreated, $this->statuses3, $extensions3AfterSaving);
    }
}
