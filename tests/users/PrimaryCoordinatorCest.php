<?php 

class PrimaryCoordinatorCest
{
    public $state;
    public $audSubgroup1_Energy, $id_audSubgroup1_Energy;
    public $audSubgroup1_SolidWaste, $id_audSubgroup1_SolidWaste;
    public $emailPrimaryCoord1_P1, $emailPrimaryCoord2_P1_P2, $emailPrimaryCoord3_P3;
    public $password = 'Qq!1111111';
    public $idPrimaryCoord1_P1, $idPrimaryCoord2_P1_P2, $idPrimaryCoord3_P3;
    public $emailCoord1_P1, $emailCoord2_P1;
    public $emailCoord3_P1_P2, $emailCoord4_P2, $emailCoord5_P1;
    public $emailCoord6_P3, $emailCoord7_WithoutProgs;
    public $idCoord1_P1, $idCoord2_P1;
    public $idCoord3_P1_P2, $idCoord4_P2, $idCoord5_P1;
    public $idCoord6_P3, $idCoord7_WithoutProgs;
    public $city1, $zip1, $program1, $city2, $zip2, $program2, $city3, $zip3, $program3, $county;
    public $statuses            = ['core', 'elective'];
    public $checklistUrl, $id_checklist;
    public $measure1Desc,  $idMeasure1;
    public $measure2Desc, $idMeasure2;
    public $measuresDesc_SuccessCreated = [];
    public $business1, $id_business1, $email1;
    public $business2, $id_business2, $email2;
    public $business3, $id_business3, $email3;
    public $business4, $id_business4, $email4;
    public $SL_message_Energy_EMAIL, $Subject_SL_message_Energy_EMAIL, $Body_SL_message_Energy_EMAIL;


    public function Help_LoginAsNationalAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    public function Help_CreateState(Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StPrimaryCoord");
        $shortName = 'PC';
        
        $I->CreateState($name, $shortName);
    }
    
    
    public function Help_SelectDefaultState(AcceptanceTester $I)
    {
        $I->SelectDefaultState($I, $this->state);
    }
    
    public function Help_CreateAuditSubGroupForEnergyGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name      = $this->audSubgroup1_Energy = $I->GenerateNameOf("EnAudSub1");
        $auditGroup = Page\AuditGroupList::Energy_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $this->id_audSubgroup1_Energy = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
    }
    
    public function CreateMeasure1_Quant_Number(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure1Desc = $I->GenerateNameOf("Description_1 quant Number ");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['question1', 'question2'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    public function CreateMeasure2_Quant_Number(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure2Desc = $I->GenerateNameOf("Description_2 quant Number ");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['ques1'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->waitForElement(\Page\MeasureList::$MeasureRow, 5);
        $this->idMeasure2 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    //-------------------------------Create county------------------------------
    
    public function CreateCounty(\Step\Acceptance\County $I) {
        $name    = $this->county = $I->GenerateNameOf("County");
        $state   = $this->state;
        
        $I->CreateCounty($name, $state);
    }
    
    
    public function Help_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city1 = $I->GenerateNameOf("Cit1_");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zip1 = $I->GenerateZipCode();
        $program = $this->program1 = $I->GenerateNameOf("Prog1_");
        
        $I->CreateCity($city, $state, $zips, $this->county);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    
    public function Help_CreateCity2_And_Program2(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city     = $this->city2 = $I->GenerateNameOf("City2_");
        $cityArr  = [$city];
        $state    = $this->state;
        $zips     = $this->zip2 = $I->GenerateZipCode();
        $program  = $this->program2 = $I->GenerateNameOf("Prog2_");
        
        $I->CreateCity($city, $state, $zips, $this->county);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    public function Help_CreateCity3_And_Program3(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city     = $this->city3 = $I->GenerateNameOf("City3_");
        $cityArr  = [$city];
        $state    = $this->state;
        $zips     = $this->zip3 = $I->GenerateZipCode();
        $program  = $this->program3 = $I->GenerateNameOf("Prog3_");
        
        $I->CreateCity($city, $state, $zips, $this->county);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    public function SectorChecklistCreate_Tier2(\Step\Acceptance\SectorChecklist $I)
    {
        $number           = '2';
        $sector           = \Page\SectorList::DefaultSectorOfficeRetail;
               
        $I->CreateSectorChecklist($number, $sector);
        $I->ManageSectorChecklist($this->measuresDesc_SuccessCreated, $this->statuses);
        $I->PublishSectorChecklistStatus();
    }
    
    public function StateLevel_CreateCompletionNotification_Energy_Email(\Step\Acceptance\CompletionNotifications $I) {
        $program = null;
        $this->SL_message_Energy_EMAIL = $message = $I->GenerateNameOf("Message to business State Level--Energy--Email ");
        $auditGroupsArray = [\Page\AuditGroupList::Energy_AuditGroup];
        $sendEmail = 'yes';
        $this->Subject_SL_message_Energy_EMAIL = $emailSubject = $I->GenerateNameOf("Email subject State Level--Energy--Email ");
        $this->Body_SL_message_Energy_EMAIL = $emailBody = $I->GenerateNameOf("Email body State Level--Energy--Email ");
        
        $I->CreateCompletionNotification($program, $message, $auditGroupsArray, $sendEmail, $emailSubject, $emailBody);
    }
    
    public function Program1_EnableNotifications_Audits(\Step\Acceptance\CompletionNotifications $I) {
        $program = $this->program1;
        
        $I->amOnPage(\Page\CompletionNotificationsOptInSettings::URL());
        $I->click(\Page\CompletionNotificationsOptInSettings::CompleteAuditGroupToggleButtonLine_ByNameValue($program));
        $I->wait(2);
    }
    
    public function Program2_EnableNotifications_Audits(\Step\Acceptance\CompletionNotifications $I) {
        $program = $this->program2;
        
        $I->amOnPage(\Page\CompletionNotificationsOptInSettings::URL());
        $I->click(\Page\CompletionNotificationsOptInSettings::CompleteAuditGroupToggleButtonLine_ByNameValue($program));
        $I->wait(2);
    }
    
    public function Program3_EnableNotifications_Audits(\Step\Acceptance\CompletionNotifications $I) {
        $program = $this->program3;
        
        $I->amOnPage(\Page\CompletionNotificationsOptInSettings::URL());
        $I->click(\Page\CompletionNotificationsOptInSettings::CompleteAuditGroupToggleButtonLine_ByNameValue($program));
        $I->wait(2);
    }
    
    public function Help_LogOut(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->Logout($I);
    }
    
    
    public function Help_BusinessRegister1(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $this->email1 = $I->GenerateEmail();
        $password         = $confirmPassword = $this->password = 'Qq!1111111';
        $busName          = $this->business1 = $I->GenerateNameOf("busnam1 before coordinators will be created ");
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
        $I->wait(4);
        $I->waitPageLoad();
    }
    
    public function Business1_SendHelpNotification(AcceptanceTester $I) {
        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->click(Page\RegistrationStarted::HelpCheckboxLabel_ByDesc($this->measure1Desc));
        $I->wait(1);
        $I->click(Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(2);
        $I->amOnPage(\Page\RegistrationStarted::$URL_Review);
        $I->click(\Page\ReviewAndSubmit::$SendHelpRequestButton);
        $I->wait(10);
    }
    
    public function Business1_CompleteMeasure1_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
        $value1   = '10';
        $value2   = '20';
                
        $I->comment("Complete Measure1 for business: $this->business1");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(100);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
        $I->wait(4);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->selectOption(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->waitPageLoad();
        $I->wait(100);
        $I->waitPageLoad();
        $I->fillField(\Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->fillField(\Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
        $I->wait(1);
        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
    }
    
    public function Business1_CompleteMeasure2_Yes_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure2Desc;
        $value1   = '10';
        $value2   = '20';
                
        $I->comment("Complete Measure1 for business: $this->business1");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->wait(100);
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure2]"], $style = 'visibility');
        $I->wait(4);
        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
        $I->wait(1);
        $I->selectOption(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
        $I->waitPageLoad();
        $I->wait(100);
        $I->waitPageLoad();
        $I->fillField(\Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
        $I->wait(1);
        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
        $I->wait(2);
        $I->waitPageLoad();
    }
    
    public function Business1_SubmitTier(AcceptanceTester $I) {
        $I->amOnPage(\Page\RegistrationStarted::$URL_Review);
        $I->click(\Page\ReviewAndSubmit::$SubmitMyApplicationButton);
        $I->wait(10);
    }
    
    public function Business1_ChangeAddress(AcceptanceTester $I) {
        $I->amOnPage(\Page\CompanyProfile::$URL);
        $I->fillField(Page\CompanyProfile::$AddressField_BusinessProfileTab, "New address");
        $I->wait(1);
        $I->click(\Page\CompanyProfile::$SaveButtonHeader_BusinessProfileTab);
        $I->wait(10);
    }
    
    public function Business1_CheckCoordinatorsOnDashboard(AcceptanceTester $I) {
        $I->amOnPage(\Page\BusinessDashboard::$URL);
        $I->cantSeeElement(\Page\BusinessDashboard::CoordinatorEmail('1'));
    }
    
    public function Help_LogOut1(AcceptanceTester $I) {
        $I->reloadPage();
        $I->waitPageLoad();
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->LoginAsAdmin($I);
    }
    
    //------------------------Create Primary Coordinators-----------------------
    
    public function ShowContactInfoInProgram_OnCreateCoordinatorPage(Step\Acceptance\User $I)
    {
        $userType     = Page\UserCreate::coordinatorType;
        
        
        $I->amOnPage(\Page\UserCreate::URL($userType));
        $I->cantSeeElement(\Page\UserUpdate::$CoordinatorTab);
        $I->cantSeeElement(\Page\UserUpdate::$RolesTab);
        $I->cantSeeElement(Page\UserCreate::$ShowContactInfoInProgramSelect.'.chosen-disabled');
    }
    
    public function CreatePrimaryCoordinatorUser1_For_Program1(Step\Acceptance\User $I)
    {
        $userType     = Page\UserCreate::coordinatorType;
        $email        = $this->emailPrimaryCoord1_P1 = $I->GenerateEmail();
        $firstName    = $I->GenerateNameOf('firnamPC1_P1');
        $lastName     = $I->GenerateNameOf('lastnam');
        $password     = $confirmPassword = $this->password;
        $phone        = $I->GeneratePhoneNumber();
        $receiveNotif = [\Page\ApplicantEmailTextList::BusinessRegistered_Trigger, 'Help notification', 'Completion notification'];
        $primary      = 'on';
        $isPrimaryForProgramsArray = [$this->program1];
        $programsArray = [$this->program1, $this->program2, $this->program3];
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->UpdateUser(null, null, null, null, null, null, null, $typeTab = 'coordinator', $this->state, $programsArray, $primary, $isPrimaryForProgramsArray, null, $receiveNotif);
//        
//        $I->click(Page\UserUpdate::$CoordinatorTab);
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->click(Page\UserUpdate::$AddStateButton);
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
//        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->click(Page\UserUpdate::$AddProgramButton);
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
//        $I->wait(2);
//        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1);
//        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->click(Page\UserUpdate::$AddProgramButton);
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
//        $I->wait(2);
//        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program2);
//        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->click(Page\UserUpdate::$AddProgramButton);
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
//        $I->wait(2);
//        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program3);
//        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->AddProgramsToIsPrimaryForNextProgramsDropdownOnUserUpdatePage($isPrimaryForProgramsArray);
        $coordinator = $I->GetUserOnPageInList($email, $userType);
        $this->idPrimaryCoord1_P1 = $coordinator['id'];
    }
    
    public function CreatePrimaryCoordinatorUser2_For_Program1_Program2(Step\Acceptance\User $I)
    {
        $userType  = Page\UserCreate::coordinatorType;
        $email     = $this->emailPrimaryCoord2_P1_P2 = $I->GenerateEmail();
        $firstName = $I->GenerateNameOf('firnamPC2_P1_P2');
        $lastName  = $I->GenerateNameOf('lastnam');
        $password  = $confirmPassword = $this->password;
        $phone     = $I->GeneratePhoneNumber();
        $primary      = 'on';
        $showInfoForProgramsArray = [$this->program2];
        $isPrimaryForProgramsArray = [$this->program1, $this->program2];
        $programsArray = [$this->program1, $this->program2];
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->UpdateUser(null, null, null, null, null, null, null, $typeTab = 'coordinator', $this->state, $programsArray, $primary, $isPrimaryForProgramsArray, $showInfoForProgramsArray);
        
//        $I->click(Page\UserUpdate::$AddStateButton);
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
//        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->click(Page\UserUpdate::$AddProgramButton);
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
//        $I->wait(2);
//        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program1);
//        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->click(Page\UserUpdate::$AddProgramButton);
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
//        $I->wait(2);
//        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program2);
//        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->AddProgramsToIsPrimaryForNextProgramsDropdownOnUserUpdatePage($isPrimaryForProgramsArray);
//        $I->AddProgramsToShowInfoDropdownOnUserUpdatePage($showInfoForProgramsArray);
        $coordinator = $I->GetUserOnPageInList($email, $userType);
        $this->idPrimaryCoord2_P1_P2 = $coordinator['id'];
    }
    
    public function CreatePrimaryCoordinatorUser3_For_Program3(Step\Acceptance\User $I)
    {
        $userType     = Page\UserCreate::coordinatorType;
        $email        = $this->emailPrimaryCoord3_P3 = $I->GenerateEmail();
        $firstName    = $I->GenerateNameOf('firnamPC3_P3');
        $lastName     = $I->GenerateNameOf('lastnam');
        $password     = $confirmPassword = $this->password;
        $phone        = $I->GeneratePhoneNumber();
        $receiveNotif = [\Page\ApplicantEmailTextList::BusinessHasChangedAddress_Trigger];
        $primary      = 'on';
        $isPrimaryForProgramsArray = [$this->program3];
        $programsArray = [$this->program3];
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->UpdateUser(null, null, null, null, null, null, null, $typeTab = 'coordinator', $this->state, $programsArray, $primary, $isPrimaryForProgramsArray);
        
//        $I->click(Page\UserUpdate::$AddStateButton);
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
//        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->click(Page\UserUpdate::$AddProgramButton);
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
//        $I->wait(2);
//        $I->selectOption(Page\UserUpdate::$ProgramSelect_AddProgramForm, $this->program3);
//        $I->click(Page\UserUpdate::$AddButton_AddProgramForm);
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->AddProgramsToIsPrimaryForNextProgramsDropdownOnUserUpdatePage($isPrimaryForProgramsArray);
        $coordinator = $I->GetUserOnPageInList($email, $userType);
        $this->idPrimaryCoord3_P3 = $coordinator['id'];
    }
    
    public function CreateCoordinatorUser7_WithoutPrograms(Step\Acceptance\User $I)
    {
        $userType     = Page\UserCreate::coordinatorType;
        $email        = $this->emailCoord7_WithoutProgs = $I->GenerateEmail();
        $firstName    = $I->GenerateNameOf('firnamC7_WithoutProgs');
        $lastName     = $I->GenerateNameOf('lastnam');
        $password     = $confirmPassword = $this->password;
        $phone        = $I->GeneratePhoneNumber();
        $receiveNotif = null;
        $primary      = 'off';
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->UpdateUser(null, null, null, null, null, null, null, $typeTab = 'coordinator', $this->state);
//        $I->click(Page\UserUpdate::$AddStateButton);
//        $I->wait(1);
//        $I->waitPageLoad();
//        $I->selectOption(Page\UserUpdate::$StateSelect_AddStateForm, $this->state);
//        $I->click(Page\UserUpdate::$AddButton_AddStateForm);
//        $I->wait(1);
//        $I->waitPageLoad();
        $coordinator = $I->GetUserOnPageInList($email, $userType);
        $this->idCoord7_WithoutProgs = $coordinator['id'];
    }
    
    public function LogOut_And_LogInAsPrimaryCoordinator1_Prog1(AcceptanceTester $I)
    {
        $I->reloadPage();
        $I->Logout($I);
        $I->LoginAsUser($this->emailPrimaryCoord1_P1, $this->password, $I, $type = 'coordinator');
    }
    
    //----------------------------Create Coordinators---------------------------
    
    public function PrimCoord1_ShowContactInfoInProgram_OnCreateCoordinatorPage(Step\Acceptance\User $I)
    {
        $userType     = Page\UserCreate::coordinatorType;
        
        
        $I->amOnPage(\Page\UserCreate::URL($userType));
        $I->cantSeeElement(Page\UserCreate::$ShowContactInfoInProgramSelect);
    }
    
    public function PrimCoord1_PrimaryCoordinatorToggleButton_OnCreateCoordinatorPage(Step\Acceptance\User $I)
    {
        $userType     = Page\UserCreate::coordinatorType;
        
        
        $I->amOnPage(\Page\UserCreate::URL($userType));
        $I->cantSeeElement(Page\UserCreate::$IsPrimaryCoordinatorToggleButton);
    }
    
    public function PrimCoord1_CreateCoordinatorUser1_For_Program1(Step\Acceptance\User $I)
    {
        $userType     = Page\UserCreate::coordinatorType;
        $email        = $this->emailCoord1_P1 = $I->GenerateEmail();
        $firstName    = $I->GenerateNameOf('firnamC1_P1');
        $lastName     = $I->GenerateNameOf('lastnam');
        $password     = $confirmPassword = $this->password;
        $phone        = $I->GeneratePhoneNumber();
//        $receiveNotif = [\Page\ApplicantEmailTextList::BusinessRegistered_Trigger];
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(2);
        $I->click(\Page\UserUpdate::$CoordinatorTab);
        $I->wait(2);
        $I->canSee($this->state, Page\UserUpdate::$State);
        $I->canSeeElement(Page\UserUpdate::ProgramNameLine_ByName($this->program1));
        $coordinator = $I->GetUserOnPageInList($email, $userType);
        $this->idCoord1_P1 = $coordinator['id'];
    }
    
    public function PrimCoord1_PrimaryCoordinatorToggleButton_OnUpdateCoordinatorPage(Step\Acceptance\User $I)
    {
        
        $I->amOnPage(\Page\UserUpdate::URL($this->idCoord1_P1));
        $I->click(\Page\UserUpdate::$CoordinatorTab);
        $I->wait(2);
        $I->canSeeElement(Page\UserUpdate::$IsPrimaryCoordinatorToggleButton.".disabled");
    }
    
    public function PrimCoord1_CantUpdateOnlyNotificationsAndShowContactInfo_UpdateCoordinatorPage(Step\Acceptance\User $I)
    {
        
        $I->amOnPage(\Page\UserUpdate::URL($this->idPrimaryCoord1_P1));
        $I->canSeeElement(\Page\UserUpdate::$EmailField.'[readonly]');
        $I->canSeeElement(\Page\UserUpdate::$FirstNameField.'[readonly]');
        $I->canSeeElement(\Page\UserUpdate::$LastNameField.'[readonly]');
        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::$TypeDisabledSelect);
        $I->canSeeElement(\Page\UserUpdate::$PhoneField.'[readonly]');
        
        $I->click(\Page\UserUpdate::$CoordinatorTab);
        $I->wait(2);
        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::DeleteProgramButtonLine_ByName($this->program1), 'xpath');
        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::DeleteProgramButtonLine_ByName($this->program2), 'xpath');
        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::DeleteProgramButtonLine_ByName($this->program3), 'xpath');
        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::$AddProgramButton);
        
        $I->canSeeElement(Page\UserUpdate::$IsPrimaryCoordinatorToggleButton.".disabled");
        $I->canSeeElement(Page\UserCreate::$ShowContactInfoInProgramSelect.'.chosen-disabled');
        $I->canSeeElement(Page\UserCreate::$ReceiveNotificationsSelect.'.chosen-disabled');
        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::$UpdateButton);
        
        //$receiveNotif = [\Page\ApplicantEmailTextList::BusinessRegistered_Trigger, 'Help notification', 'Completion notification'];
    }
    
    public function PrimCoord1_CantUpdatePrimaryCoordinator2_UpdateCoordinatorPage(Step\Acceptance\User $I)
    {
        $userType     = Page\UserCreate::coordinatorType;
        
        $I->amOnPage(\Page\UserUpdate::URL($this->idPrimaryCoord2_P1_P2));
        $I->wait(2);
//        $I->canSeeInCurrentUrl(Page\UserList::URL($userType));
        $I->canSeeElement(\Page\UserUpdate::$EmailField.'[readonly]');
        $I->canSeeElement(\Page\UserUpdate::$FirstNameField.'[readonly]');
        $I->canSeeElement(\Page\UserUpdate::$LastNameField.'[readonly]');
        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::$TypeDisabledSelect);
        $I->canSeeElement(\Page\UserUpdate::$PhoneField.'[readonly]');
        
        $I->click(\Page\UserUpdate::$CoordinatorTab);
        $I->wait(2);
        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::DeleteProgramButtonLine_ByName($this->program1), 'xpath');
        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::DeleteProgramButtonLine_ByName($this->program2), 'xpath');
        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::$AddProgramButton);
        
        $I->canSeeElement(Page\UserUpdate::$IsPrimaryCoordinatorToggleButton.".disabled");
        $I->canSeeElement(Page\UserCreate::$ShowContactInfoInProgramSelect.'.chosen-disabled');
        $I->canSeeElement(Page\UserCreate::$ReceiveNotificationsSelect.'.chosen-disabled');
        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::$UpdateButton);
    }
    
    public function PrimCoord1_CantUpdatePrimaryCoordinator3_UpdateCoordinatorPage(Step\Acceptance\User $I)
    {
        $userType     = Page\UserCreate::coordinatorType;
        
        $I->amOnPage(\Page\UserUpdate::URL($this->idPrimaryCoord3_P3));
        $I->wait(2);
//        $I->canSeeInCurrentUrl(Page\UserList::URL($userType));
        $I->canSeeElement(\Page\UserUpdate::$EmailField.'[readonly]');
        $I->canSeeElement(\Page\UserUpdate::$FirstNameField.'[readonly]');
        $I->canSeeElement(\Page\UserUpdate::$LastNameField.'[readonly]');
        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::$TypeDisabledSelect);
        $I->canSeeElement(\Page\UserUpdate::$PhoneField.'[readonly]');
        
        $I->click(\Page\UserUpdate::$CoordinatorTab);
        $I->wait(2);
        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::DeleteProgramButtonLine_ByName($this->program3), 'xpath');
        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::$AddProgramButton);
        
        $I->canSeeElement(Page\UserUpdate::$IsPrimaryCoordinatorToggleButton.".disabled");
        $I->canSeeElement(Page\UserCreate::$ShowContactInfoInProgramSelect.'.chosen-disabled');
        $I->canSeeElement(Page\UserCreate::$ReceiveNotificationsSelect.'.chosen-disabled');
        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::$UpdateButton);
    }
    
    public function PrimCoord1_ImpossibleToAddProgram2_OnUpdateCoordinatorPage(Step\Acceptance\User $I)
    {
        
        $I->amOnPage(\Page\UserUpdate::URL($this->idCoord1_P1));
        $I->click(\Page\UserUpdate::$CoordinatorTab);
        $I->wait(2);
        $I->click(Page\UserUpdate::$AddProgramButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->click(Page\UserUpdate::$ProgramSelect_AddProgramForm);
        $I->wait(2);
        $I->cantSee($this->program2, \Page\UserUpdate::$ProgramOption_AddProgramForm);
    }
    
    public function PrimCoord1_CreateCoordinatorUser2_For_Program1(Step\Acceptance\User $I)
    {
        $userType     = Page\UserCreate::coordinatorType;
        $email        = $this->emailCoord2_P1 = $I->GenerateEmail();
        $firstName    = $I->GenerateNameOf('firnamC2_P1');
        $lastName     = $I->GenerateNameOf('lastnam');
        $password     = $confirmPassword = $this->password;
        $phone        = $I->GeneratePhoneNumber();
//        $receiveNotif = [\Page\ApplicantEmailTextList::BusinessRegistered_Trigger];
        $showInfoForProgramsArray = [$this->program1];
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->reloadPage();
        $I->waitPageLoad();
        $I->wait(2);
        $I->click(\Page\UserUpdate::$CoordinatorTab);
        $I->wait(2);
        $I->canSee($this->state, Page\UserUpdate::$State);
        $I->canSeeElement(Page\UserUpdate::ProgramNameLine_ByName($this->program1));
        $I->AddProgramsToShowInfoDropdownOnUserUpdatePage($showInfoForProgramsArray);
        $coordinator = $I->GetUserOnPageInList($email, $userType);
        $this->idCoord2_P1 = $coordinator['id'];
    }
    
    public function LogOut_And_LogInAsPrimaryCoordinator2_Prog1_Prog2(AcceptanceTester $I)
    {
        $I->reloadPage();
        $I->Logout($I);
        $I->LoginAsUser($this->emailPrimaryCoord2_P1_P2, $this->password, $I, $type = 'coordinator');
    }
    
    public function PrimCoord2_CanUpdateOnlyNotificationsAndShowContactInfo_UpdateCoordinatorPage(Step\Acceptance\User $I)
    {
        
        $I->amOnPage(\Page\UserUpdate::URL($this->idPrimaryCoord2_P1_P2));
        $I->canSeeElement(\Page\UserUpdate::$EmailField.'[readonly]');
        $I->canSeeElement(\Page\UserUpdate::$FirstNameField.'[readonly]');
        $I->canSeeElement(\Page\UserUpdate::$LastNameField.'[readonly]');
        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::$TypeDisabledSelect);
        $I->canSeeElement(\Page\UserUpdate::$PhoneField.'[readonly]');
        
        $I->click(\Page\UserUpdate::$CoordinatorTab);
        $I->wait(2);
        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::DeleteProgramButtonLine_ByName($this->program1), 'xpath');
        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::DeleteProgramButtonLine_ByName($this->program2), 'xpath');
        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::$AddProgramButton);
        
        $I->canSeeElement(Page\UserUpdate::$IsPrimaryCoordinatorToggleButton.".disabled");
        $I->cantSeeElement(Page\UserCreate::$ShowContactInfoInProgramSelect.'.chosen-disabled');
        $I->cantSeeElement(Page\UserCreate::$ReceiveNotificationsSelect.'.chosen-disabled');
        $I->cantSeeElementIsDisabled($I, \Page\UserUpdate::$UpdateButton);
        
        //$receiveNotif = [\Page\ApplicantEmailTextList::BusinessRegistered_Trigger, 'Help notification', 'Completion notification'];
    }
    
//    public function PrimCoord2_CantUpdatePrimaryCoordinator1_UpdateCoordinatorPage(Step\Acceptance\User $I)
//    {
//        $userType     = Page\UserCreate::coordinatorType;
//        
//        $I->amOnPage(\Page\UserUpdate::URL($this->idPrimaryCoord1_P1));
//        $I->wait(2);
//        $I->canSeeInCurrentUrl(Page\UserList::URL($userType));
////        $I->canSeeElement(\Page\UserUpdate::$EmailField.'[readonly]');
////        $I->canSeeElement(\Page\UserUpdate::$FirstNameField.'[readonly]');
////        $I->canSeeElement(\Page\UserUpdate::$LastNameField.'[readonly]');
////        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::$TypeDisabledSelect);
////        $I->canSeeElement(\Page\UserUpdate::$PhoneField.'[readonly]');
////        
////        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::DeleteProgramButtonLine_ByName($this->program1), 'xpath');
////        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::$AddProgramButton);
////        
////        $I->canSeeElement(Page\UserUpdate::$IsPrimaryCoordinatorToggleButton.".disabled");
////        $I->canSeeElement(Page\UserCreate::$ShowContactInfoInProgramSelect.'.chosen-disabled');
////        $I->canSeeElement(Page\UserCreate::$ReceiveNotificationsSelect.'.chosen-disabled');
////        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::$UpdateButton);
//    }
//    
//    public function PrimCoord2_CantUpdatePrimaryCoordinator3_UpdateCoordinatorPage(Step\Acceptance\User $I)
//    {
//        $userType     = Page\UserCreate::coordinatorType;
//        
//        $I->amOnPage(\Page\UserUpdate::URL($this->idPrimaryCoord3_P3));
//        $I->wait(2);
//        $I->canSeeInCurrentUrl(Page\UserList::URL($userType));
////        $I->canSeeElement(\Page\UserUpdate::$EmailField.'[readonly]');
////        $I->canSeeElement(\Page\UserUpdate::$FirstNameField.'[readonly]');
////        $I->canSeeElement(\Page\UserUpdate::$LastNameField.'[readonly]');
////        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::$TypeDisabledSelect);
////        $I->canSeeElement(\Page\UserUpdate::$PhoneField.'[readonly]');
////        
////        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::DeleteProgramButtonLine_ByName($this->program1), 'xpath');
////        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::$AddProgramButton);
////        
////        $I->canSeeElement(Page\UserUpdate::$IsPrimaryCoordinatorToggleButton.".disabled");
////        $I->canSeeElement(Page\UserCreate::$ShowContactInfoInProgramSelect.'.chosen-disabled');
////        $I->canSeeElement(Page\UserCreate::$ReceiveNotificationsSelect.'.chosen-disabled');
////        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::$UpdateButton);
//    }
//    
//    //----------------------------Create Coordinators---------------------------
//    
//    public function PrimCoord2_CreateCoordinatorUser3_For_Program1_Program2(Step\Acceptance\User $I)
//    {
//        $userType     = Page\UserCreate::coordinatorType;
//        $email        = $this->emailCoord3_P1_P2 = $I->GenerateEmail();
//        $firstName    = $I->GenerateNameOf('firnamC3_P1_P2');
//        $lastName     = $I->GenerateNameOf('lastnam');
//        $password     = $confirmPassword = $this->password;
//        $phone        = $I->GeneratePhoneNumber();
//        $receiveNotif = [\Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger];
//        $showInfoForProgramsArray = [$this->program1, $this->program2];
//        
//        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
//        $I->reloadPage();
//        $I->waitPageLoad();
//        $I->UpdateUser(null, null, null, null, null, null, null, $typeTab = 'coordinator', null, null, $primaryCoordinator = 'ignore', null, $showInfoForProgramsArray, $receiveNotif);
//        $I->wait(2);
//        $I->click(\Page\UserUpdate::$CoordinatorTab);
//        $I->wait(2);
//        $I->canSee($this->state, Page\UserUpdate::$State);
//        $I->canSeeElement(Page\UserUpdate::ProgramNameLine_ByName($this->program1));
//        $I->canSeeElement(Page\UserUpdate::ProgramNameLine_ByName($this->program2));
////        $I->AddProgramsToShowInfoDropdownOnUserUpdatePage($showInfoForProgramsArray);
//        $coordinator = $I->GetUserOnPageInList($email, $userType);
//        $this->idCoord3_P1_P2 = $coordinator['id'];
//    }
//    
//    public function PrimCoord2_CreateCoordinatorUser4_For_Program2(Step\Acceptance\User $I)
//    {
//        $userType     = Page\UserCreate::coordinatorType;
//        $email        = $this->emailCoord4_P2 = $I->GenerateEmail();
//        $firstName    = $I->GenerateNameOf('firnamC4_P2');
//        $lastName     = $I->GenerateNameOf('lastnam');
//        $password     = $confirmPassword = $this->password;
//        $phone        = $I->GeneratePhoneNumber();
//        $receiveNotif = [\Page\ApplicantEmailTextList::BusinessRegistered_Trigger, \Page\ApplicantEmailTextList::BusinessHasChangedAddress_Trigger, \Page\ApplicantEmailTextList::Month3BeforeCertification_Trigger];
//        
//        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone, null, $receiveNotif);
//        $I->reloadPage();
//        $I->waitPageLoad();
//        $I->wait(2);
//        $I->canSee($this->state, Page\UserUpdate::$State);
//        $I->canSeeElement(Page\UserUpdate::ProgramNameLine_ByName($this->program1));
//        $I->canSeeElement(Page\UserUpdate::ProgramNameLine_ByName($this->program2));
//        $I->click(\Page\UserUpdate::DeleteProgramButtonLine_ByName($this->program1));
//        $I->wait(1);
//        $I->acceptPopup();
//        $I->wait(1);
//        $coordinator = $I->GetUserOnPageInList($email, $userType);
//        $this->idCoord4_P2 = $coordinator['id'];
//    }
//    
//    public function PrimCoord2_CreateCoordinatorUser5_For_Program1(Step\Acceptance\User $I)
//    {
//        $userType     = Page\UserCreate::coordinatorType;
//        $email        = $this->emailCoord5_P1 = $I->GenerateEmail();
//        $firstName    = $I->GenerateNameOf('firnamC5_P1');
//        $lastName     = $I->GenerateNameOf('lastnam');
//        $password     = $confirmPassword = $this->password;
//        $phone        = $I->GeneratePhoneNumber();
//        $receiveNotif = [\Page\ApplicantEmailTextList::BusinessTierSubmission_Trigger];
//        
//        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone, null, $receiveNotif);
//        $I->reloadPage();
//        $I->waitPageLoad();
//        $I->wait(2);
//        $I->canSee($this->state, Page\UserUpdate::$State);
//        $I->canSeeElement(Page\UserUpdate::ProgramNameLine_ByName($this->program1));
//        $I->canSeeElement(Page\UserUpdate::ProgramNameLine_ByName($this->program2));
//        $I->click(\Page\UserUpdate::DeleteProgramButtonLine_ByName($this->program2));
//        $I->wait(1);
//        $I->acceptPopup();
//        $I->wait(1);
//        $coordinator = $I->GetUserOnPageInList($email, $userType);
//        $this->idCoord5_P1 = $coordinator['id'];
//    }
//    
//    public function LogOut_And_LogInAsPrimaryCoordinator3_Prog3(AcceptanceTester $I)
//    {
//        $I->reloadPage();
//        $I->Logout($I);
//        $I->LoginAsUser($this->emailPrimaryCoord3_P3, $this->password, $I, $type = 'coordinator');
//    }
//    
//    public function PrimCoord3_CanUpdateOnlyNotificationsAndShowContactInfo_UpdateCoordinatorPage(Step\Acceptance\User $I)
//    {
//        
//        $I->amOnPage(\Page\UserUpdate::URL($this->idPrimaryCoord3_P3));
//        $I->canSeeElement(\Page\UserUpdate::$EmailField.'[readonly]');
//        $I->canSeeElement(\Page\UserUpdate::$FirstNameField.'[readonly]');
//        $I->canSeeElement(\Page\UserUpdate::$LastNameField.'[readonly]');
//        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::$TypeDisabledSelect);
//        $I->canSeeElement(\Page\UserUpdate::$PhoneField.'[readonly]');
//        
//        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::DeleteProgramButtonLine_ByName($this->program3), 'xpath');
//        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::$AddProgramButton);
//        
//        $I->canSeeElement(Page\UserUpdate::$IsPrimaryCoordinatorToggleButton.".disabled");
//        $I->cantSeeElement(Page\UserCreate::$ShowContactInfoInProgramSelect.'.chosen-disabled');
//        $I->cantSeeElement(Page\UserCreate::$ReceiveNotificationsSelect.'.chosen-disabled');
//        $I->cantSeeElementIsDisabled($I, \Page\UserUpdate::$UpdateButton);
//        
//        //$receiveNotif = [\Page\ApplicantEmailTextList::BusinessRegistered_Trigger, 'Help notification', 'Completion notification'];
//    }
//    
//    public function PrimCoord3_CantUpdatePrimaryCoordinator1_UpdateCoordinatorPage(Step\Acceptance\User $I)
//    {
//        $userType     = Page\UserCreate::coordinatorType;
//        
//        $I->amOnPage(\Page\UserUpdate::URL($this->idPrimaryCoord1_P1));
//        $I->wait(2);
//        $I->canSeeInCurrentUrl(Page\UserList::URL($userType));
////        $I->canSeeElement(\Page\UserUpdate::$EmailField.'[readonly]');
////        $I->canSeeElement(\Page\UserUpdate::$FirstNameField.'[readonly]');
////        $I->canSeeElement(\Page\UserUpdate::$LastNameField.'[readonly]');
////        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::$TypeDisabledSelect);
////        $I->canSeeElement(\Page\UserUpdate::$PhoneField.'[readonly]');
////        
////        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::DeleteProgramButtonLine_ByName($this->program1), 'xpath');
////        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::$AddProgramButton);
////        
////        $I->canSeeElement(Page\UserUpdate::$IsPrimaryCoordinatorToggleButton.".disabled");
////        $I->canSeeElement(Page\UserCreate::$ShowContactInfoInProgramSelect.'.chosen-disabled');
////        $I->canSeeElement(Page\UserCreate::$ReceiveNotificationsSelect.'.chosen-disabled');
////        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::$UpdateButton);
//    }
//    
//    public function PrimCoord3_CantUpdatePrimaryCoordinator2_UpdateCoordinatorPage(Step\Acceptance\User $I)
//    {
//        $userType     = Page\UserCreate::coordinatorType;
//        
//        $I->amOnPage(\Page\UserUpdate::URL($this->idPrimaryCoord2_P1_P2));
//        $I->wait(2);
//        $I->canSeeInCurrentUrl(Page\UserList::URL($userType));
////        $I->canSeeElement(\Page\UserUpdate::$EmailField.'[readonly]');
////        $I->canSeeElement(\Page\UserUpdate::$FirstNameField.'[readonly]');
////        $I->canSeeElement(\Page\UserUpdate::$LastNameField.'[readonly]');
////        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::$TypeDisabledSelect);
////        $I->canSeeElement(\Page\UserUpdate::$PhoneField.'[readonly]');
////        
////        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::DeleteProgramButtonLine_ByName($this->program1), 'xpath');
////        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::$AddProgramButton);
////        
////        $I->canSeeElement(Page\UserUpdate::$IsPrimaryCoordinatorToggleButton.".disabled");
////        $I->canSeeElement(Page\UserCreate::$ShowContactInfoInProgramSelect.'.chosen-disabled');
////        $I->canSeeElement(Page\UserCreate::$ReceiveNotificationsSelect.'.chosen-disabled');
////        $I->canSeeElementIsDisabled($I, \Page\UserUpdate::$UpdateButton);
//    }
//    
//    //----------------------------Create Coordinators---------------------------
//    
//    public function PrimCoord3_CreateCoordinatorUser6_For_Program3(Step\Acceptance\User $I)
//    {
//        $userType     = Page\UserCreate::coordinatorType;
//        $email        = $this->emailCoord6_P3 = $I->GenerateEmail();
//        $firstName    = $I->GenerateNameOf('firnamC6_P3');
//        $lastName     = $I->GenerateNameOf('lastnam');
//        $password     = $confirmPassword = $this->password;
//        $phone        = $I->GeneratePhoneNumber();
////        $receiveNotif = [\Page\ApplicantEmailTextList::BusinessRegistered_Trigger];
//        
//        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone, null);
//        $I->reloadPage();
//        $I->waitPageLoad();
//        $I->wait(2);
//        $I->canSee($this->state, Page\UserUpdate::$State);
//        $I->canSeeElement(Page\UserUpdate::ProgramNameLine_ByName($this->program3));
//        $coordinator = $I->GetUserOnPageInList($email, $userType);
//        $this->idCoord6_P3 = $coordinator['id'];
//    }
//    
//    public function Help_LogOut2(AcceptanceTester $I) {
//        $I->amOnPage(Page\MeasureList::URL());
//        $I->Logout($I);
//    }
//    
//    
//    public function Help_BusinessRegister2(Step\Acceptance\Business $I)
//    {
//        $firstName        = $I->GenerateNameOf("firnam");
//        $lastName         = $I->GenerateNameOf("lasnam");
//        $phoneNumber      = $I->GeneratePhoneNumber();
//        $email            = $this->email2 = $I->GenerateEmail();
//        $password         = $confirmPassword = $this->password;
//        $busName          = $this->business2 = $I->GenerateNameOf("busnam2 coordinators were created ");
//        $busPhone         = $I->GeneratePhoneNumber();
//        $address          = $I->GenerateNameOf("addr");;
//        $zip              = $this->zip1;
//        $city             = $this->city1;
//        $website          = 'fgfh.fh';
//        $busType          = 'Office / Retail';
//        $employees        = '455';
//        $busFootage       = '4566';
//        $landscapeFootage = '12345';
//        
//        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
//                $employees, $busFootage, $landscapeFootage);
//        $I->wait(4);
//        $I->waitPageLoad();
//    }
//    
//    public function Business2_SendHelpNotification(AcceptanceTester $I) {
//        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->click(Page\RegistrationStarted::HelpCheckboxLabel_ByDesc($this->measure1Desc));
//        $I->wait(1);
//        $I->click(Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(2);
//        $I->amOnPage(\Page\RegistrationStarted::$URL_Review);
//        $I->click(\Page\ReviewAndSubmit::$SendHelpRequestButton);
//        $I->wait(10);
//    }
//    
//    public function Business2_CompleteMeasure1_Yes_Answer(AcceptanceTester $I) {
//        $measDesc = $this->measure1Desc;
//        $value1   = '10';
//        $value2   = '20';
//                
//        $I->comment("Complete Measure1 for business: $this->business2");
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
//        $I->wait(2);
//        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
//        $I->wait(1);
//        $I->selectOption(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
//        $I->wait(1);
//        $I->fillField(\Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
//        $I->fillField(\Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
//        $I->wait(1);
//        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
//        $I->wait(1);
//        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
//        $I->wait(2);
//        $I->waitPageLoad();
//    }
//    
//    public function Business2_CompleteMeasure2_Yes_Answer(AcceptanceTester $I) {
//        $measDesc = $this->measure2Desc;
//        $value1   = '10';
//        $value2   = '20';
//                
//        $I->comment("Complete Measure1 for business: $this->business2");
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->makeElementVisible(["[data-measure-id=$this->idMeasure2]"], $style = 'visibility');
//        $I->wait(2);
//        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
//        $I->wait(1);
//        $I->selectOption(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
//        $I->wait(1);
//        $I->fillField(\Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
//        $I->wait(1);
//        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
//        $I->wait(1);
//        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
//        $I->wait(2);
//        $I->waitPageLoad();
//    }
//    
//    public function Business2_SubmitTier(AcceptanceTester $I) {
//        $I->amOnPage(\Page\RegistrationStarted::$URL_Review);
//        $I->click(\Page\ReviewAndSubmit::$SubmitMyApplicationButton);
//        $I->wait(10);
//    }
//    
//    public function Business2_ChangeAddress(AcceptanceTester $I) {
//        $I->amOnPage(\Page\CompanyProfile::$URL);
//        $I->fillField(Page\CompanyProfile::$AddressField_BusinessProfileTab, "New address");
//        $I->wait(1);
//        $I->click(\Page\CompanyProfile::$SaveButtonHeader_BusinessProfileTab);
//        $I->wait(10);
//    }
//    
//    public function Business2_CheckCoordinatorsOnDashboard(AcceptanceTester $I) {
//        $I->amOnPage(\Page\BusinessDashboard::$URL);
//        $I->canSeeElement(\Page\BusinessDashboard::CoordinatorEmail_ByEmail($this->emailCoord2_P1));
//        $I->canSeeElement(\Page\BusinessDashboard::CoordinatorEmail_ByEmail($this->emailCoord3_P1_P2));
//        
//        $I->cantSeeElement(\Page\BusinessDashboard::CoordinatorEmail_ByEmail($this->emailPrimaryCoord1_P1));
//        $I->cantSeeElement(\Page\BusinessDashboard::CoordinatorEmail_ByEmail($this->emailPrimaryCoord2_P1_P2));
//        $I->cantSeeElement(\Page\BusinessDashboard::CoordinatorEmail_ByEmail($this->emailPrimaryCoord3_P3));
//        $I->cantSeeElement(\Page\BusinessDashboard::CoordinatorEmail_ByEmail($this->emailCoord1_P1));
//        $I->cantSeeElement(\Page\BusinessDashboard::CoordinatorEmail_ByEmail($this->emailCoord4_P2));
//        $I->cantSeeElement(\Page\BusinessDashboard::CoordinatorEmail_ByEmail($this->emailCoord5_P1));
//        $I->cantSeeElement(\Page\BusinessDashboard::CoordinatorEmail_ByEmail($this->emailCoord6_P3));
//        $I->cantSeeElement(\Page\BusinessDashboard::CoordinatorEmail_ByEmail($this->emailCoord7_WithoutProgs));
//    }
//    
//    public function Help_LogOut3(AcceptanceTester $I) {
//        $I->reloadPage();
//        $I->waitPageLoad();
//        $I->LogIn_TRUEorFALSE($I);
//        $I->Logout($I);
//    }
//    
//    public function Help_BusinessRegister3(Step\Acceptance\Business $I)
//    {
//        $firstName        = $I->GenerateNameOf("firnam");
//        $lastName         = $I->GenerateNameOf("lasnam");
//        $phoneNumber      = $I->GeneratePhoneNumber();
//        $email            = $this->email3 = $I->GenerateEmail();
//        $password         = $confirmPassword = $this->password;
//        $busName          = $this->business3 = $I->GenerateNameOf("busnam3 coordinators were created ");
//        $busPhone         = $I->GeneratePhoneNumber();
//        $address          = $I->GenerateNameOf("addr");;
//        $zip              = $this->zip2;
//        $city             = $this->city2;
//        $website          = 'fgfh.fh';
//        $busType          = 'Office / Retail';
//        $employees        = '455';
//        $busFootage       = '4566';
//        $landscapeFootage = '12345';
//        
//        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
//                $employees, $busFootage, $landscapeFootage);
//        $I->wait(4);
//        $I->waitPageLoad();
//    }
//    
//    public function Business3_SendHelpNotification(AcceptanceTester $I) {
//        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->click(Page\RegistrationStarted::HelpCheckboxLabel_ByDesc($this->measure1Desc));
//        $I->wait(1);
//        $I->click(Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(2);
//        $I->amOnPage(\Page\RegistrationStarted::$URL_Review);
//        $I->click(\Page\ReviewAndSubmit::$SendHelpRequestButton);
//        $I->wait(10);
//    }
//    
//    public function Business3_CompleteMeasure1_Yes_Answer(AcceptanceTester $I) {
//        $measDesc = $this->measure1Desc;
//        $value1   = '10';
//        $value2   = '20';
//                
//        $I->comment("Complete Measure1 for business: $this->business3");
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
//        $I->wait(2);
//        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
//        $I->wait(1);
//        $I->selectOption(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
//        $I->wait(1);
//        $I->fillField(\Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
//        $I->fillField(\Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
//        $I->wait(1);
//        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
//        $I->wait(1);
//        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
//        $I->wait(2);
//        $I->waitPageLoad();
//    }
//    
//    public function Business3_CompleteMeasure2_Yes_Answer(AcceptanceTester $I) {
//        $measDesc = $this->measure2Desc;
//        $value1   = '10';
//        $value2   = '20';
//                
//        $I->comment("Complete Measure1 for business: $this->business3");
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->makeElementVisible(["[data-measure-id=$this->idMeasure2]"], $style = 'visibility');
//        $I->wait(2);
//        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
//        $I->wait(1);
//        $I->selectOption(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
//        $I->wait(1);
//        $I->fillField(\Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
//        $I->wait(1);
//        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
//        $I->wait(1);
//        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
//        $I->wait(2);
//        $I->waitPageLoad();
//    }
//    
//    public function Business3_SubmitTier(AcceptanceTester $I) {
//        $I->amOnPage(\Page\RegistrationStarted::$URL_Review);
//        $I->click(\Page\ReviewAndSubmit::$SubmitMyApplicationButton);
//        $I->wait(10);
//    }
//    
//    public function Business3_ChangeAddress(AcceptanceTester $I) {
//        $I->amOnPage(\Page\CompanyProfile::$URL);
//        $I->fillField(Page\CompanyProfile::$AddressField_BusinessProfileTab, "New address");
//        $I->wait(1);
//        $I->click(\Page\CompanyProfile::$SaveButtonHeader_BusinessProfileTab);
//        $I->wait(10);
//    }
//    
//    public function Business3_CheckCoordinatorsOnDashboard(AcceptanceTester $I) {
//        $I->amOnPage(\Page\BusinessDashboard::$URL);
//        $I->canSeeElement(\Page\BusinessDashboard::CoordinatorEmail_ByEmail($this->emailPrimaryCoord2_P1_P2));
//        $I->canSeeElement(\Page\BusinessDashboard::CoordinatorEmail_ByEmail($this->emailCoord3_P1_P2));
//        
//        $I->cantSeeElement(\Page\BusinessDashboard::CoordinatorEmail_ByEmail($this->emailPrimaryCoord1_P1));
//        $I->cantSeeElement(\Page\BusinessDashboard::CoordinatorEmail_ByEmail($this->emailPrimaryCoord3_P3));
//        $I->cantSeeElement(\Page\BusinessDashboard::CoordinatorEmail_ByEmail($this->emailCoord1_P1));
//        $I->cantSeeElement(\Page\BusinessDashboard::CoordinatorEmail_ByEmail($this->emailCoord2_P1));
//        $I->cantSeeElement(\Page\BusinessDashboard::CoordinatorEmail_ByEmail($this->emailCoord4_P2));
//        $I->cantSeeElement(\Page\BusinessDashboard::CoordinatorEmail_ByEmail($this->emailCoord5_P1));
//        $I->cantSeeElement(\Page\BusinessDashboard::CoordinatorEmail_ByEmail($this->emailCoord6_P3));
//        $I->cantSeeElement(\Page\BusinessDashboard::CoordinatorEmail_ByEmail($this->emailCoord7_WithoutProgs));
//    }
//    
//    public function Help_LogOut24(AcceptanceTester $I) {
//        $I->reloadPage();
//        $I->waitPageLoad();
//        $I->LogIn_TRUEorFALSE($I);
//        $I->Logout($I);
//    }
//    
//    
//    public function Help_BusinessRegister4(Step\Acceptance\Business $I)
//    {
//        $firstName        = $I->GenerateNameOf("firnam");
//        $lastName         = $I->GenerateNameOf("lasnam");
//        $phoneNumber      = $I->GeneratePhoneNumber();
//        $email            = $this->email4 = $I->GenerateEmail();
//        $password         = $confirmPassword = $this->password;
//        $busName          = $this->business4 = $I->GenerateNameOf("busnam4 coordinators were created ");
//        $busPhone         = $I->GeneratePhoneNumber();
//        $address          = $I->GenerateNameOf("addr");;
//        $zip              = $this->zip3;
//        $city             = $this->city3;
//        $website          = 'fgfh.fh';
//        $busType          = 'Office / Retail';
//        $employees        = '455';
//        $busFootage       = '4566';
//        $landscapeFootage = '12345';
//        
//        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
//                $employees, $busFootage, $landscapeFootage);
//        $I->wait(4);
//        $I->waitPageLoad();
//    }
//    
//    public function Business4_SendHelpNotification(AcceptanceTester $I) {
//        $I->amOnPage(Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->click(Page\RegistrationStarted::HelpCheckboxLabel_ByDesc($this->measure1Desc));
//        $I->wait(1);
//        $I->click(Page\RegistrationStarted::$SaveButton_Footer);
//        $I->wait(2);
//        $I->amOnPage(\Page\RegistrationStarted::$URL_Review);
//        $I->click(\Page\ReviewAndSubmit::$SendHelpRequestButton);
//        $I->wait(10);
//    }
//    
//    public function Business4_CompleteMeasure1_Yes_Answer(AcceptanceTester $I) {
//        $measDesc = $this->measure1Desc;
//        $value1   = '10';
//        $value2   = '20';
//                
//        $I->comment("Complete Measure1 for business: $this->business4");
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
//        $I->wait(2);
//        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
//        $I->wait(1);
//        $I->selectOption(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
//        $I->wait(1);
//        $I->fillField(\Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
//        $I->fillField(\Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($measDesc, '2'), $value2);
//        $I->wait(1);
//        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
//        $I->wait(1);
//        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
//        $I->wait(2);
//        $I->waitPageLoad();
//    }
//    
//    public function Business4_CompleteMeasure2_Yes_Answer(AcceptanceTester $I) {
//        $measDesc = $this->measure2Desc;
//        $value1   = '10';
//        $value2   = '20';
//                
//        $I->comment("Complete Measure1 for business: $this->business4");
//        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
//        $I->makeElementVisible(["[data-measure-id=$this->idMeasure2]"], $style = 'visibility');
//        $I->wait(2);
//        $I->scrollTo("[data-measure-id='$this->idMeasure2']");
//        $I->wait(1);
//        $I->selectOption(\Page\BusinessChecklistView::MeasureToggleButton2_ByDesc($measDesc), 'yes');
//        $I->wait(1);
//        $I->fillField(\Page\BusinessChecklistView::SubmeasureField_ByMeasureDesc($measDesc, '1'), $value1);
//        $I->wait(1);
//        $I->scrollTo(\Page\BusinessChecklistView::$SaveButton_Footer);
//        $I->wait(1);
//        $I->click(\Page\BusinessChecklistView::$SaveButton_Footer);
//        $I->wait(2);
//        $I->waitPageLoad();
//    }
//    
//    public function Business4_SubmitTier(AcceptanceTester $I) {
//        $I->amOnPage(\Page\RegistrationStarted::$URL_Review);
//        $I->click(\Page\ReviewAndSubmit::$SubmitMyApplicationButton);
//        $I->wait(10);
//    }
//    
//    public function Business4_ChangeAddress(AcceptanceTester $I) {
//        $I->amOnPage(\Page\CompanyProfile::$URL);
//        $I->fillField(Page\CompanyProfile::$AddressField_BusinessProfileTab, "New address");
//        $I->wait(1);
//        $I->click(\Page\CompanyProfile::$SaveButtonHeader_BusinessProfileTab);
//        $I->wait(10);
//    }
//    
//    public function Business4_CheckCoordinatorsOnDashboard(AcceptanceTester $I) {
//        $I->amOnPage(\Page\BusinessDashboard::$URL);
//        $I->cantSeeElement(\Page\BusinessDashboard::CoordinatorEmail('1'));
//    }
//    
//    public function Help_LogOut4(AcceptanceTester $I) {
//        $I->reloadPage();
//        $I->waitPageLoad();
//        $I->LogIn_TRUEorFALSE($I);
//        $I->Logout($I);
//        $I->LoginAsAdmin($I);
//    }
//    
//    public function Business1_CheckSentNotifications(AcceptanceTester $I) {
//        $I->amOnPage(\Page\EmailQueue::URL());
//        $I->fillField(\Page\EmailQueue::$FilterByBusinessNameField, 'busnam1');
//        $I->wait(1);
//        $I->click(\Page\EmailQueue::$ApplyFiltersButton);
//        $I->wait(3);
//        $I->waitPageLoad();
//        $I->canSee($this->email1, \Page\EmailQueue::RecipientEmailLine('1'));
//        $I->canSee('(not set)', \Page\EmailQueue::RecipientEmailLine('2'));
//        $I->canSee('(not set)', \Page\EmailQueue::RecipientEmailLine('3'));
//        $I->canSee('(not set)', \Page\EmailQueue::RecipientEmailLine('4'));
//        $I->canSee('(not set)', \Page\EmailQueue::RecipientEmailLine('5'));
//        $I->canSee('(not set)', \Page\EmailQueue::RecipientEmailLine('6'));
//        $I->canSee('(not set)', \Page\EmailQueue::RecipientEmailLine('7'));
//    }
//    
//    public function Business2_CheckSentNotifications(AcceptanceTester $I) {
//        $I->amOnPage(\Page\EmailQueue::URL());
//        $I->fillField(\Page\EmailQueue::$FilterByBusinessNameField, 'busnam2');
//        $I->wait(1);
//        $I->click(\Page\EmailQueue::$ApplyFiltersButton);
//        $I->wait(3);
//        $I->waitPageLoad();
//        $triger1 = $I->grabTextFrom(\Page\EmailQueue::SubjectLine('1'));
//        $triger2 = $I->grabTextFrom(\Page\EmailQueue::SubjectLine('2'));
//        $triger3 = $I->grabTextFrom(\Page\EmailQueue::SubjectLine('3'));
//        $triger4 = $I->grabTextFrom(\Page\EmailQueue::SubjectLine('4'));
//        $triger5 = $I->grabTextFrom(\Page\EmailQueue::SubjectLine('5'));
//        $triger6 = $I->grabTextFrom(\Page\EmailQueue::SubjectLine('6'));
//        $triger7 = $I->grabTextFrom(\Page\EmailQueue::SubjectLine('7'));
//        $triger8 = $I->grabTextFrom(\Page\EmailQueue::SubjectLine('8'));
//        $I->comment("Row1: ---$triger1---");
//        $I->canSee($this->email2, \Page\EmailQueue::RecipientEmailLine('1'));
//        $I->comment("Row2: ---$triger2---");
//        $I->canSee($this->emailPrimaryCoord1_P1, \Page\EmailQueue::RecipientEmailLine('2')); //business is registered
//        $I->comment("Row3: ---$triger3---");
//        $I->canSee($this->emailPrimaryCoord1_P1, \Page\EmailQueue::RecipientEmailLine('3')); //help notification
//        $I->comment("Row4: ---$triger4---");
//        $I->canSee($this->emailPrimaryCoord1_P1, \Page\EmailQueue::RecipientEmailLine('4')); //completion notification
//        $I->comment("Row5: ---$triger5---");
//        $I->canSee($this->emailCoord3_P1_P2, \Page\EmailQueue::RecipientEmailLine('5')); //tier submition
//        $I->comment("Row6: ---$triger6---");
//        $I->canSee($this->emailCoord5_P1, \Page\EmailQueue::RecipientEmailLine('6')); //tier submition
//        $I->comment("Row7: ---$triger7---");
//        $I->canSee($this->emailPrimaryCoord1_P1, \Page\EmailQueue::RecipientEmailLine('7')); //help notification
//        $I->comment("Row8: ---$triger8---");
//        $I->canSee($this->emailCoord2_P1, \Page\EmailQueue::RecipientEmailLine('8')); //business has changed address
//    }
//    
//    public function Business3_CheckSentNotifications(AcceptanceTester $I) {
//        $I->amOnPage(\Page\EmailQueue::URL());
//        $I->fillField(\Page\EmailQueue::$FilterByBusinessNameField, 'busnam3');
//        $I->wait(1);
//        $I->click(\Page\EmailQueue::$ApplyFiltersButton);
//        $I->wait(3);
//        $I->waitPageLoad();
//        $triger1 = $I->grabTextFrom(\Page\EmailQueue::SubjectLine('1'));
//        $triger2 = $I->grabTextFrom(\Page\EmailQueue::SubjectLine('2'));
//        $triger3 = $I->grabTextFrom(\Page\EmailQueue::SubjectLine('3'));
//        $triger4 = $I->grabTextFrom(\Page\EmailQueue::SubjectLine('4'));
//        $triger5 = $I->grabTextFrom(\Page\EmailQueue::SubjectLine('5'));
//        $triger6 = $I->grabTextFrom(\Page\EmailQueue::SubjectLine('6'));
//        $triger7 = $I->grabTextFrom(\Page\EmailQueue::SubjectLine('7'));
//        $triger8 = $I->grabTextFrom(\Page\EmailQueue::SubjectLine('8'));
//        $I->comment("Row1: ---$triger1---");
//        $I->canSee($this->email3, \Page\EmailQueue::RecipientEmailLine('1'));
//        $I->comment("Row2: ---$triger2---");
//        $I->canSee($this->emailPrimaryCoord1_P1, \Page\EmailQueue::RecipientEmailLine('2')); //business is registered
//        $I->comment("Row3: ---$triger3---");
//        $I->canSee($this->emailCoord4_P2, \Page\EmailQueue::RecipientEmailLine('3')); //business is registered
//        $I->comment("Row4: ---$triger4---");
//        $I->canSee($this->emailPrimaryCoord1_P1, \Page\EmailQueue::RecipientEmailLine('4')); //help notification
//        $I->comment("Row5: ---$triger5---");
//        $I->canSee($this->emailPrimaryCoord1_P1, \Page\EmailQueue::RecipientEmailLine('5')); //completion notification
//        $I->comment("Row6: ---$triger6---");
//        $I->canSee($this->emailCoord3_P1_P2, \Page\EmailQueue::RecipientEmailLine('6')); //tier submition
//        $I->comment("Row7: ---$triger7---");
//        $I->canSee($this->emailPrimaryCoord1_P1, \Page\EmailQueue::RecipientEmailLine('7')); //help notification
//        $I->comment("Row8: ---$triger8---");
//        $I->canSee($this->emailCoord4_P2, \Page\EmailQueue::RecipientEmailLine('8')); //business has changed address
//    }
//    
//    public function Business4_CheckSentNotifications(AcceptanceTester $I) {
//        $I->amOnPage(\Page\EmailQueue::URL());
//        $I->fillField(\Page\EmailQueue::$FilterByBusinessNameField, 'busnam4');
//        $I->wait(1);
//        $I->click(\Page\EmailQueue::$ApplyFiltersButton);
//        $I->wait(3);
//        $I->waitPageLoad();
//        $triger1 = $I->grabTextFrom(\Page\EmailQueue::TriggerStringLine('1'));
//        $triger2 = $I->grabTextFrom(\Page\EmailQueue::TriggerStringLine('2'));
//        $triger3 = $I->grabTextFrom(\Page\EmailQueue::TriggerStringLine('3'));
//        $triger4 = $I->grabTextFrom(\Page\EmailQueue::TriggerStringLine('4'));
//        $triger5 = $I->grabTextFrom(\Page\EmailQueue::TriggerStringLine('5'));
//        $triger6 = $I->grabTextFrom(\Page\EmailQueue::TriggerStringLine('6'));
//        $triger7 = $I->grabTextFrom(\Page\EmailQueue::TriggerStringLine('7'));
//        $I->comment("Row1: ---$triger1---");
//        $I->canSee($this->email4, \Page\EmailQueue::RecipientEmailLine('1'));
//        $I->comment("Row2: ---$triger2---");
//        $I->canSee($this->emailPrimaryCoord1_P1, \Page\EmailQueue::RecipientEmailLine('2')); //business is registered
//        $I->comment("Row3: ---$triger3---");
//        $I->canSee($this->emailPrimaryCoord1_P1, \Page\EmailQueue::RecipientEmailLine('3')); //help notification
//        $I->comment("Row4: ---$triger4---");
//        $I->canSee($this->emailPrimaryCoord1_P1, \Page\EmailQueue::RecipientEmailLine('4')); //completion notification
//        $I->comment("Row5: ---$triger5---");
//        $I->canSee($this->emailPrimaryCoord1_P1, \Page\EmailQueue::RecipientEmailLine('5')); //tier submition
//        $I->comment("Row6: ---$triger6---");
//        $I->canSee($this->emailPrimaryCoord1_P1, \Page\EmailQueue::RecipientEmailLine('6')); //help notification
//        $I->comment("Row7: ---$triger7---");
//        $I->canSee($this->emailPrimaryCoord3_P3, \Page\EmailQueue::RecipientEmailLine('7')); //business has changed address
//    }
}
