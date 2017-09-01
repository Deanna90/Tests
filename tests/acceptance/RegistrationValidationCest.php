<?php

class RegistrationValidationCest
{
    public $state, $city, $zips, $program, $audSubgroup1_Energy, $business1, $business2, $business3, $busId1, $busId2, $busId3;
    public $measure1Desc, $measure2Desc, $measure3Desc, $measure4Desc, $measure5Desc;
    public $idMeasure1, $idMeasure2, $idMeasure3, $idMeasure4, $idMeasure5;
    public $measuresDesc_SuccessCreated;
    public $todayDate = [];
    public $statuses = ['core', 'elective', 'elective', 'core', 'elective'];
    
    public $defaultPassword                = "Qq!1111111";
    
    public $requiredErrorEmail             = "Email cannot be blank.";
    public $validationErrorEmail           = "Email is not a valid email address.";
    public $alreadyCreatedErrorEmail       = "This email address has already been taken.";
    public $requiredErrorFirstName         = "First Name cannot be blank.";
    public $validationErrorFirstName       = "First Name should contain at most 255 characters.";
    public $requiredErrorLastName          = "Last Name cannot be blank.";
    public $validationErrorLastName        = "Last Name should contain at most 255 characters.";
    public $requiredErrorPassword          = "Password cannot be blank.";
    public $requiredErrorConfirmPassword   = "Confirm Password cannot be blank.";
    public $validationErrorConfirmPassword = "Password and Confirm password don't match";
    public $requiredErrorPhone             = "Phone cannot be blank.";
    public $validationErrorPhone           = "A phone number should contain 10 digit.";
    public $requiredErrorBusinessName      = "Name cannot be blank.";
    public $validationErrorBusinessName    = "Name should contain at most 255 characters.";
    public $requiredErrorStreetAddress     = "Street Address cannot be blank.";
    public $validationErrorStreetAddress   = "Street Address should contain at most 255 characters.";
    
    public $phoneNumber_alreadyCreated, $firstName_alreadyCreated, $lastName_alreadyCreated, $businessName_alreadyCreated, $businessPhone_alreadyCreated, 
            $streetAddress_alreadyCreated, $email_alreadyCreated, $website_alreadyCreated;
    //-------------------------------------------------------------------------------------
    //-----------------------------------------HELP----------------------------------------
    //-------------------------------------------------------------------------------------
    
    /**
     * @group email
     */
    
    public function Help2_1_LoginAsNationalAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    /**
     * @group email
     */
    
    public function Help2_2_CreateState(Step\Acceptance\State $I)
    {
        $name = $this->state = $I->GenerateNameOf("StRegValid");
        $shortName = 'RV';
        
        $I->CreateState($name, $shortName);
    }
    
    /**
     * @group email
     */
    
    public function Help2_3_SelectDefaultState(AcceptanceTester $I)
    {
        $I->wait(2);
        $I->SelectDefaultState($I, $this->state);
    }
    
    /**
     * @group email
     */
    
    public function Help2_4_CreateAuditSubGroupForEnergyGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup1_Energy = $I->GenerateNameOf("EnAudSub1");
        $auditGroup = Page\AuditGroupList::Energy_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->wait(3);
    }
    
    /**
     * @group email
     */
    
    public function Help2_4_CreateAuditSubGroupsForSolidWasteGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name       = $this->audSubgroup1_SolidWaste = $I->GenerateNameOf("SolWasAudSub1");
        $auditGroup = Page\AuditGroupList::SolidWaste_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->wait(3);
    }
    
    /**
     * @group email
     */
    
    public function Help1_7_CreateMeasure1_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure1Desc = $I->GenerateNameOf("Description1");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['q1'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group email
     */
    
    public function Help1_7_CreateMeasure2_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure2Desc = $I->GenerateNameOf("Description2");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['1111'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure2 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group email
     */
    
    public function Help1_7_CreateMeasure3_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure3Desc = $I->GenerateNameOf("Description3");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['2', '3'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure3 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group email
     */
    
    public function Help1_7_CreateMeasure4_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure4Desc = $I->GenerateNameOf("Description4");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['a1'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure4 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group email
     */
    
    public function Help1_7_CreateMeasure5_Number_Quant(\Step\Acceptance\Measure $I) {
        $desc           = $this->measure5Desc = $I->GenerateNameOf("Description5");
        $auditGroup     = \Page\AuditGroupList::Energy_AuditGroup;
        $auditSubgroup  = $this->audSubgroup1_Energy;
        $quantitative   = 'yes';
        $submeasureType = \Step\Acceptance\Measure::Number_QuantitativeSubmeasure;
        $questions      = ['ques1'];
        
        $I->CreateMeasure($desc, $auditGroup, $auditSubgroup, $quantitative, $submeasureType, $questions);
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(3);
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure5 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    /**
     * @group email
     */
    
    public function Help1_6_3_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city = $I->GenerateNameOf("CityNR1");
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zips = $I->GenerateZipCode();
        $program = $this->program = $I->GenerateNameOf("ProgNR1");
        
        $I->CreateCity($city, $state, $zips);
        $Y->CreateProgram($program, $state, $cityArr);
    }
    
    /**
     * @group email
     */
    
    public function Help1_15_CreateChecklistForTier3(\Step\Acceptance\Checklist $I) {
        $sourceProgram      = $this->program;
        $programDestination = $this->program;
        $sectorDestination  = \Page\SectorList::DefaultSectorOfficeRetail;
        $tier               = '3';
        $descs              = $this->measuresDesc_SuccessCreated;
        
        $I->CreateChecklist($sourceProgram, $programDestination, $sectorDestination, $tier);
        $I->ManageChecklist($descs, $this->statuses);
        $I->reloadPage();
        $I->PublishChecklistStatus();
    }
    
    /**
     * @group email
     */
    
    public function Help1_16_LogOut(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->wait(1);
        $I->Logout($I);
    }
    
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------TESTS----------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    //--------------------------------------------------------------------------
    //--------------------------First Name Validation---------------------------
    //--------------------------------------------------------------------------
    
    public function FirstName_Required(Step\Acceptance\Business $I)
    {
        $firstName        = '';
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus1_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(2);
        $I->canSeeFieldIsRequired($I, \Page\BusinessRegistration::$FirstNameField);
        $I->canSee($this->requiredErrorFirstName, \Page\BusinessRegistration::$Error_FirstName);
    }
    
    public function Help1_16_LogOut1(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function FirstName_1Symbol_Valid(Step\Acceptance\Business $I)
    {
        $firstName        = 'T';
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus2_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(6);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
    }
    
    public function Help1_16_LogOut2(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function FirstName_128Symbols_Valid(Step\Acceptance\Business $I)
    {
        $firstName        = 'First namme 128 symbols first namme 128 symbols first namme 128 symbols first namme 128 symbols first namme 128 symbols first namme 128 symbols first nam';
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus3_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(6);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
    }
    
    public function Help1_16_LogOut3(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function FirstName_255Symbols_Valid(Step\Acceptance\Business $I)
    {
        $firstName        = 'First namme 255 symbols first namme 255 symbols first namme 255 symbols first namme 255 symbols first namme 255 symbols first namme 255 symbols first namme 255 symbols first namme 255 symbols first namme 255 symbols first namme 255 symbols first namme 255';
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus4_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(6);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
    }
    
    public function Help1_16_LogOut4(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function FirstName_256Symbols_Invalid(Step\Acceptance\Business $I)
    {
        $firstName        = 'First namme 256 symbols first namme 256 symbols first namme 256 symbols first namme 256 symbols first namme 256 symbols first namme 256 symbols first namme 256 symbols first namme 256 symbols first namme 256 symbols first namme 256 symbols first namme 2566';
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus5_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(1);
        $I->canSeeFieldIsRequired($I, \Page\BusinessRegistration::$FirstNameField);
        $I->canSee($this->validationErrorFirstName, \Page\BusinessRegistration::$Error_FirstName);
    }
    
    public function Help1_16_LogOut5(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function FirstName_LatinSymbols_Valid(Step\Acceptance\Business $I)
    {
        $firstName        = 'WertyuioPas';
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus6_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(6);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
    }
    
    public function Help1_16_LogOut6(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function FirstName_NumberSymbols_Valid(Step\Acceptance\Business $I)
    {
        $firstName        = '3456';
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus7_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(6);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
    }
    
    public function Help1_16_LogOut7(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function FirstName_PunctuationSymbols_Valid(Step\Acceptance\Business $I)
    {
        $firstName        = 'sD!@#$%^&*()_+=-`{}:"><?/,.;[]';
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus8_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(6);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
    }
    
    public function Help1_16_LogOut8(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    //--------------------------------------------------------------------------
    //---------------------------Last Name Validation---------------------------
    //--------------------------------------------------------------------------
    
    public function LastName_Required(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = '';
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus9_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(2);
        $I->canSeeFieldIsRequired($I, \Page\BusinessRegistration::$LastNameField);
        $I->canSee($this->requiredErrorLastName, \Page\BusinessRegistration::$Error_LastName);
    }
    
    public function LastName_LogOut1(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function LastName_1Symbol_Valid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = 'M';
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus10_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(6);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
    }
    
    public function LastName_LogOut2(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function LastName_128Symbols_Valid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = 'Last namme 128 symbols last namme 128 symbols last namme 128 symbols last namme 128 symbols last namme 128 symbols last namme 128 symbols last nameeeeeee';
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus11_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(6);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
    }
    
    public function LastName_LogOut3(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function LastName_255Symbols_Valid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = 'Last namme 255 symbols last namme 255 symbols last namme 255 symbols last namme 255 symbols last namme 255 symbols last namme 255 symbols last namme 255 symbols last namme 255 symbols last namme 255 symbols last namme 255 symbols last namme 255 last namme';
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus12_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(6);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
    }
    
    public function LastName_LogOut4(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function LastName_256Symbols_Invalid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = 'Last namme 256 symbols last namme 256 symbols last namme 256 symbols last namme 256 symbols last namme 256 symbols last namme 256 symbols last namme 256 symbols last namme 256 symbols last namme 256 symbols last namme 256 symbols last namme 256 last nammee';
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus13_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(1);
        $I->canSeeFieldIsRequired($I, \Page\BusinessRegistration::$LastNameField);
        $I->canSee($this->validationErrorLastName, \Page\BusinessRegistration::$Error_LastName);
    }
    
    public function LastName_LogOut5(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function LastName_LatinSymbols_Valid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = 'WertyuioPas';
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus14_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(6);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
    }
    
    public function LastName_LogOut6(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function LastName_NumberSymbols_Valid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = '3456';
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus15_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(6);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
    }
    
    public function LastName_LogOut7(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function LastName_PunctuationSymbols_Valid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = 'sD!@#$%^&*()_+=-`{}:"><?/,.;[]';
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus16_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(6);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
    }
    
    public function LastName_LogOut8(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    //--------------------------------------------------------------------------
    //---------------------------Phone Number Validation------------------------
    //--------------------------------------------------------------------------
    
    public function PhoneNumber_Required(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = '';
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus9_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(2);
        $I->canSeeInField(Page\BusinessRegistration::$PhoneNumberField, $phoneNumber);
        $I->canSee($this->requiredErrorPhone, \Page\BusinessRegistration::$Error_PhoneNumber);
    }
    
    public function PhoneNumber_LogOut1(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function PhoneNumber_1Symbol_Invalid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = '8';
        $phoneNumber2     = "(8__) ___-____";
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus10_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(2);
        $I->canSeeInField(Page\BusinessRegistration::$PhoneNumberField, $phoneNumber2);
        $I->canSee($this->validationErrorPhone, \Page\BusinessRegistration::$Error_PhoneNumber);
        $I->canSeeInCurrentUrl(Page\BusinessRegistration::$URL);
    }
    
    public function PhoneNumber_LogOut2(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function PhoneNumber_5Symbols_Invalid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = '34765';
        $phoneNumber2     = "(347) 65_-____";
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus11_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(2);
        $I->canSeeInField(Page\BusinessRegistration::$PhoneNumberField, $phoneNumber2);
        $I->canSee($this->validationErrorPhone, \Page\BusinessRegistration::$Error_PhoneNumber);
        $I->canSeeInCurrentUrl(Page\BusinessRegistration::$URL);
    }
    
    public function PhoneNumber_LogOut3(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function PhoneNumber_9Symbols_Invalid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = '232432223';
        $phoneNumber2     = '(232) 432-223_';
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus12_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(2);
        $I->canSeeInField(Page\BusinessRegistration::$PhoneNumberField, $phoneNumber2);
        $I->canSee($this->validationErrorPhone, \Page\BusinessRegistration::$Error_PhoneNumber);
        $I->canSeeInCurrentUrl(Page\BusinessRegistration::$URL);
    }
    
    public function PhoneNumber_LogOut4(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function PhoneNumber_10Symbols_Valid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $this->phoneNumber_alreadyCreated = '2324322239';
        $phoneNumber2     = '(232) 432-2239';
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus13_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(6);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
    }
    
    public function PhoneNumber_LogOut5(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function PhoneNumber_PunctuationAndLatinSymbols_InvalidToInput(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = "'~!@#$%^&&*())_+{}|:<>?,./;'[]\=-`123rwgTgr";
        $phoneNumber2     = "(123) ___-____";
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus14_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(6);
        $I->canSeeInField(Page\BusinessRegistration::$PhoneNumberField, $phoneNumber2);
        $I->canSee($this->validationErrorPhone, \Page\BusinessRegistration::$Error_PhoneNumber);
        $I->canSeeInCurrentUrl(Page\BusinessRegistration::$URL);
    }
    
    public function PhoneNumber_LogOut6(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function PhoneNumber_AlreadyUsedNumber_Valid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $this->phoneNumber_alreadyCreated;
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus15_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(6);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
    }
    
    public function PhoneNumber_LogOut7(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    //--------------------------------------------------------------------------
    //------------------------Email Validation------------------------
    //--------------------------------------------------------------------------
    
    /**
     * @group email
     */
    
    public function Email_Required(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busPhone         = $I->GeneratePhoneNumber();
        $email            = '';
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus9_RV");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(2);
        $I->canSeeInField(Page\BusinessRegistration::$EmailAddressField, $email);
        $I->canSeeFieldIsRequired($I, Page\BusinessRegistration::$EmailAddressField);
        $I->canSee($this->requiredErrorEmail, \Page\BusinessRegistration::$Error_EmailAddress);
        $I->canSeeInCurrentUrl(Page\BusinessRegistration::$URL);
    }
    
    /**
     * @group email
     */
    
    public function Email_LogOut(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    /**
     * @group email
     */
    
    public function Email_InvalidValue1(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busPhone         = $I->GeneratePhoneNumber();
        $email            = 'g';
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus9_RV");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(3);
        $I->canSeeInField(Page\BusinessRegistration::$EmailAddressField, $email);
        $I->canSee($this->validationErrorEmail, \Page\BusinessRegistration::$Error_EmailAddress);
        $I->canSeeInCurrentUrl(Page\BusinessRegistration::$URL);
    }
    
    /**
     * @group email
     */
    
    public function Email_LogOut1(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    /**
     * @group email
     */
    
    public function Email_InvalidValue2(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busPhone         = $I->GeneratePhoneNumber();
        $email            = 'dtttttyyyyy';
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus9_RV");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(3);
        $I->canSeeInField(Page\BusinessRegistration::$EmailAddressField, $email);
        $I->canSee($this->validationErrorEmail, \Page\BusinessRegistration::$Error_EmailAddress);
        $I->canSeeInCurrentUrl(Page\BusinessRegistration::$URL);
    }
    
    /**
     * @group email
     */
    
    public function Email_LogOut2(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    /**
     * @group email
     */
    
    public function Email_InvalidValue3(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busPhone         = $I->GeneratePhoneNumber();
        $email            = 'dfgfg@';
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus9_RV");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(3);
        $I->canSeeInField(Page\BusinessRegistration::$EmailAddressField, $email);
        $I->canSee($this->validationErrorEmail, \Page\BusinessRegistration::$Error_EmailAddress);
        $I->canSeeInCurrentUrl(Page\BusinessRegistration::$URL);
    }
    
    /**
     * @group email
     */
    
    public function Email_LogOut3(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    /**
     * @group email
     */
    
    public function Email_InvalidValue4(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busPhone         = $I->GeneratePhoneNumber();
        $email            = 'de@ff';
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus9_RV");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(3);
        $I->canSeeInField(Page\BusinessRegistration::$EmailAddressField, $email);
        $I->canSee($this->validationErrorEmail, \Page\BusinessRegistration::$Error_EmailAddress);
        $I->canSeeInCurrentUrl(Page\BusinessRegistration::$URL);
    }
    
    /**
     * @group email
     */
    
    public function Email_LogOut4(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    /**
     * @group email
     */
    
    public function Email_InvalidValue5(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busPhone         = $I->GeneratePhoneNumber();
        $email            = 'dgd.ff';
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus9_RV");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(3);
        $I->canSeeInField(Page\BusinessRegistration::$EmailAddressField, $email);
        $I->canSee($this->validationErrorEmail, \Page\BusinessRegistration::$Error_EmailAddress);
        $I->canSeeInCurrentUrl(Page\BusinessRegistration::$URL);
    }
    
    /**
     * @group email
     */
    
    public function Email_LogOut5(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    /**
     * @group email
     */
    
    public function Email_InvalidValue6(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busPhone         = $I->GeneratePhoneNumber();
        $email            = 'fgfg.hh.hh';
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus9_RV");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(3);
        $I->canSeeInField(Page\BusinessRegistration::$EmailAddressField, $email);
        $I->canSee($this->validationErrorEmail, \Page\BusinessRegistration::$Error_EmailAddress);
        $I->canSeeInCurrentUrl(Page\BusinessRegistration::$URL);
    }
    
    /**
     * @group email
     */
    
    public function Email_LogOut6(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    /**
     * @group email
     */
    
    public function Email_InvalidValue7(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busPhone         = $I->GeneratePhoneNumber();
        $email            = 'ddd@dfgdg@dgdg.dg';
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus9_RV");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(3);
        $I->canSeeInField(Page\BusinessRegistration::$EmailAddressField, $email);
        $I->canSee($this->validationErrorEmail, \Page\BusinessRegistration::$Error_EmailAddress);
        $I->canSeeInCurrentUrl(Page\BusinessRegistration::$URL);
    }
    
    /**
     * @group email
     */
    
    public function Email_LogOut7(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    /**
     * @group email
     */
    
    public function Email_InvalidValue8(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busPhone         = $I->GeneratePhoneNumber();
        $email            = '.dfhf@gg';
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus9_RV");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(3);
        $I->canSeeInField(Page\BusinessRegistration::$EmailAddressField, $email);
        $I->canSee($this->validationErrorEmail, \Page\BusinessRegistration::$Error_EmailAddress);
        $I->canSeeInCurrentUrl(Page\BusinessRegistration::$URL);
    }
    
    /**
     * @group email
     */
    
    public function Email_LogOut8(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    /**
     * @group email
     */
    
    public function Email_InvalidValue9(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busPhone         = $I->GeneratePhoneNumber();
        $email            = '@gg.gg';
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus9_RV");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(3);
        $I->canSeeInField(Page\BusinessRegistration::$EmailAddressField, $email);
        $I->canSee($this->validationErrorEmail, \Page\BusinessRegistration::$Error_EmailAddress);
        $I->canSeeInCurrentUrl(Page\BusinessRegistration::$URL);
    }
    
    /**
     * @group email
     */
    
    public function Email_LogOut9(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    /**
     * @group email
     */
    
    public function Email_InvalidValue10(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busPhone         = $I->GeneratePhoneNumber();
        $email            = 'ffg@@ff.fg';
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus9_RV");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(3);
        $I->canSeeInField(Page\BusinessRegistration::$EmailAddressField, $email);
        $I->canSee($this->validationErrorEmail, \Page\BusinessRegistration::$Error_EmailAddress);
        $I->canSeeInCurrentUrl(Page\BusinessRegistration::$URL);
    }
    
    /**
     * @group email
     */
    
    public function Email_LogOut10(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    /**
     * @group email
     */
    
    public function Email_InvalidValue11(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busPhone         = $I->GeneratePhoneNumber();
        $email            = 'sgffh@dgf..gfh';
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus9_RV");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(3);
        $I->canSeeInField(Page\BusinessRegistration::$EmailAddressField, $email);
        $I->canSee($this->validationErrorEmail, \Page\BusinessRegistration::$Error_EmailAddress);
        $I->canSeeInCurrentUrl(Page\BusinessRegistration::$URL);
    }
    
    /**
     * @group email
     */
    
    public function Email_LogOut11(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    /**
     * @group email
     */
    
    public function Email_InvalidValue12(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busPhone         = $I->GeneratePhoneNumber();
        $email            = 'ff@dgeg.--';
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus9_RV");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(3);
        $I->canSeeInField(Page\BusinessRegistration::$EmailAddressField, $email);
        $I->canSee($this->validationErrorEmail, \Page\BusinessRegistration::$Error_EmailAddress);
        $I->canSeeInCurrentUrl(Page\BusinessRegistration::$URL);
    }
    
    /**
     * @group email
     */
    
    public function Email_LogOut12(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    /**
     * @group email
     */
    
    public function Email_InvalidValue13(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busPhone         = $I->GeneratePhoneNumber();
        $email            = 'erty$rt.gg';
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus9_RV");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(3);
        $I->canSeeInField(Page\BusinessRegistration::$EmailAddressField, $email);
        $I->canSee($this->validationErrorEmail, \Page\BusinessRegistration::$Error_EmailAddress);
        $I->canSeeInCurrentUrl(Page\BusinessRegistration::$URL);
    }
    
    /**
     * @group email
     */
    
    public function Email_LogOut13(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    /**
     * @group email
     */
    
    public function Email_InvalidValue14(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busPhone         = $I->GeneratePhoneNumber();
        $email            = 'etg@fgg,ff';
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus9_RV");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(3);
        $I->canSeeInField(Page\BusinessRegistration::$EmailAddressField, $email);
        $I->canSee($this->validationErrorEmail, \Page\BusinessRegistration::$Error_EmailAddress);
        $I->canSeeInCurrentUrl(Page\BusinessRegistration::$URL);
    }
    
    /**
     * @group email
     */
    
    public function Email_LogOut14(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    /**
     * @group email
     */
    
    public function Email_ValidValue1(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busPhone         = $I->GeneratePhoneNumber();
        $email            = $I->GenerateNameOf('yr33@77.414');
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus9_RV");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(8);
        $I->seeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
        $this->email_alreadyCreated = $email;
    }
    
    /**
     * @group email
     */
    
    public function Email_LogOut15(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    /**
     * @group email
     */
    
    public function Email_ValidValue2(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busPhone         = $I->GeneratePhoneNumber();
        $email            = $I->GenerateNameOf('rty.yhnb@pp.');
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus9_RV");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(8);
        $I->seeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
        $this->email_alreadyCreated = $email;
    }
    
    /**
     * @group email
     */
    
    public function Email_LogOut16(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    /**
     * @group email
     */
    
    public function Email_ValidValue3(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busPhone         = $I->GeneratePhoneNumber();
        $email            = $I->GenerateNameOf('Utew@iY.D');
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus9_RV");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(8);
        $I->seeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
        $this->email_alreadyCreated = $email;
    }
    
    /**
     * @group email
     */
    
    public function Email_LogOut17(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    /**
     * @group email
     */
    
    public function Email_ValidValue4(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busPhone         = $I->GeneratePhoneNumber();
        $email            = $I->GenerateNameOf('12@d3tg.8');
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus9_RV");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(8);
        $I->seeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
        $this->email_alreadyCreated = $email;
    }
    
    /**
     * @group email
     */
    
    public function Email_LogOut18(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    /**
     * @group email
     */
    
    public function Email_ValidValue5(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busPhone         = $I->GeneratePhoneNumber();
        $email            = $I->GenerateNameOf('ed-fu_g.iyf@dr.d');
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus9_RV");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(8);
        $I->seeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
        $this->email_alreadyCreated = $email;
    }
    
    /**
     * @group email
     */
    
    public function Email_LogOut19(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    /**
     * @group email
     */
    
    public function Email_ValidValue6(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busPhone         = $I->GeneratePhoneNumber();
        $email            = $I->GenerateNameOf('tgvgdfhhdhsfghhuhdfhfgghfdf@dgrtrerggrdfgdfgdf.taay');
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus9_RV");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(8);
        $I->seeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
        $this->email_alreadyCreated = $email;
    }
    
    /**
     * @group email
     */
    
    public function Email_LogOut20(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    /**
     * @group email
     */
    
    public function Email_ValidValue7(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busPhone         = $I->GeneratePhoneNumber();
        $email            = $I->GenerateNameOf('poi@grf.tt.');
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus9_RV");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(8);
        $I->seeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
        $this->email_alreadyCreated = $email;
    }
    
    /**
     * @group email
     */
    
    public function Email_LogOut21(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    /**
     * @group email
     */
    
    public function Email_InvalidValue15(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busPhone         = $I->GeneratePhoneNumber();
        $email            = $this->email_alreadyCreated;
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus9_RV");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(2);
        $I->canSeeInField(Page\BusinessRegistration::$EmailAddressField, $email);
        $I->canSee($this->alreadyCreatedErrorEmail, \Page\BusinessRegistration::$Error_EmailAddress);
        $I->canSeeInCurrentUrl(Page\BusinessRegistration::$URL);
    }
    
    /**
     * @group email
     */
    
    public function Email_LogOut22(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    //--------------------------------------------------------------------------
    //---------------Password and Confirm Password Validation-------------------
    //--------------------------------------------------------------------------
    
    /**
     * @group password
     */
    
    public function PasswordAndConfirmPassword_CreatePasswordField_Required(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = '';
        $confirmPassword  = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus1_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(2);
        $I->canSeeFieldIsRequired($I, \Page\BusinessRegistration::$CreatePasswordField);
        $I->canSee($this->requiredErrorPassword, \Page\BusinessRegistration::$Error_CreatePassword);
        $I->canSee($this->validationErrorConfirmPassword, \Page\BusinessRegistration::$Error_ConfirmPassword);
        $I->canSeeInCurrentUrl(Page\BusinessRegistration::$URL);
    }
    
    /**
     * @group password
     */
    
    public function PasswordAndConfirmPassword_LogOut1(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    /**
     * @group password
     */
    
    public function PasswordAndConfirmPassword_CreateAndConfirmPasswordFields_Required(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = '';
        $confirmPassword  = '';
        $busName          = $I->GenerateNameOf("bus1_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(2);
        $I->canSeeFieldIsRequired($I, \Page\BusinessRegistration::$CreatePasswordField);
        $I->canSee($this->requiredErrorPassword, \Page\BusinessRegistration::$Error_CreatePassword);
        $I->canSee($this->requiredErrorConfirmPassword, \Page\BusinessRegistration::$Error_ConfirmPassword);
        $I->canSeeInCurrentUrl(Page\BusinessRegistration::$URL);
    }
    
    /**
     * @group password
     */
    
    public function PasswordAndConfirmPassword_LogOut2(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    /**
     * @group password
     */
    
    public function PasswordAndConfirmPassword_ConfirmPasswordField_Required(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $this->defaultPassword;
        $confirmPassword  = '';
        $busName          = $I->GenerateNameOf("bus1_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(2);
        $I->canSeeFieldIsRequired($I, \Page\BusinessRegistration::$ConfirmPasswordField);
        $I->canSee($this->requiredErrorConfirmPassword, \Page\BusinessRegistration::$Error_ConfirmPassword);
        $I->canSeeInCurrentUrl(Page\BusinessRegistration::$URL);
    }
    
    /**
     * @group password
     */
    
    public function PasswordAndConfirmPassword_LogOut3(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    /**
     * @group password
     */
    
    public function PasswordAndConfirmPassword_DifferentValuesValidation(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $this->defaultPassword;
        $confirmPassword  = '1234567890';
        $busName          = $I->GenerateNameOf("bus1_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(2);
        $I->canSee($this->validationErrorConfirmPassword, \Page\BusinessRegistration::$Error_ConfirmPassword);
        $I->canSeeInCurrentUrl(Page\BusinessRegistration::$URL);
    }
    
    /**
     * @group password
     */
    
    public function PasswordAndConfirmPassword_LogOut4(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    /**
     * @group password
     */
    
    public function PasswordAndConfirmPassword_DifferentPartOfValuesValidation(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $this->defaultPassword;
        $confirmPassword  = $this->defaultPassword.'1';
        $busName          = $I->GenerateNameOf("bus1_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(2);
        $I->canSee($this->validationErrorConfirmPassword, \Page\BusinessRegistration::$Error_ConfirmPassword);
        $I->canSeeInCurrentUrl(Page\BusinessRegistration::$URL);
    }
    
    /**
     * @group password
     */
    
    public function PasswordAndConfirmPassword_LogOut5(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    //--------------------------------------------------------------------------
    //------------------------Business Number Validation------------------------
    //--------------------------------------------------------------------------
    
    public function BusinessNumber_Required(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busPhone         = '';
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus9_RV");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(2);
        $I->canSeeInField(Page\BusinessRegistration::$BusinessPhoneField, $busPhone);
        $I->canSee($this->requiredErrorPhone, \Page\BusinessRegistration::$Error_BusinessPhone);
    }
    
    public function BusinessNumber_LogOut1(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function BusinessNumber_1Symbol_Invalid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busPhone         = '8';
        $busPhone2        = "(8__) ___-____";
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus10_RV");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(2);
        $I->canSeeInField(Page\BusinessRegistration::$BusinessPhoneField, $busPhone2);
        $I->canSee($this->validationErrorPhone, \Page\BusinessRegistration::$Error_BusinessPhone);
        $I->canSeeInCurrentUrl(Page\BusinessRegistration::$URL);
    }
    
    public function BusinessNumber_LogOut2(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function BusinessNumber_5Symbols_Invalid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busPhone         = '34765';
        $busPhone2        = "(347) 65_-____";
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus11_RV");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(2);
        $I->canSeeInField(Page\BusinessRegistration::$BusinessPhoneField, $busPhone2);
        $I->canSee($this->validationErrorPhone, \Page\BusinessRegistration::$Error_BusinessPhone);
        $I->canSeeInCurrentUrl(Page\BusinessRegistration::$URL);
    }
    
    public function BusinessNumber_LogOut3(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function BusinessNumber_9Symbols_Invalid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busPhone         = '232432223';
        $busPhone2        = '(232) 432-223_';
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus12_RV");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(2);
        $I->canSeeInField(Page\BusinessRegistration::$BusinessPhoneField, $busPhone2);
        $I->canSee($this->validationErrorPhone, \Page\BusinessRegistration::$Error_BusinessPhone);
        $I->canSeeInCurrentUrl(Page\BusinessRegistration::$URL);
    }
    
    public function BusinessNumber_LogOut4(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function BusinessNumber_10Symbols_Valid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busPhone         = $this->businessPhone_alreadyCreated = '6364622239';
        $busPhone2        = '(636) 462-2239';
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus13_RV");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(6);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
    }
    
    public function BusinessNumber_LogOut5(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function BusinessNumber_PunctuationAndLatinSymbols_InvalidToInput(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busPhone         = "'~!@#$%^&&*())_+{}|:<>?,./;'[]\=-`123rwgTgr";
        $busPhone2        = "(123) ___-____";
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus14_RV");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(6);
        $I->canSeeInField(Page\BusinessRegistration::$BusinessPhoneField, $busPhone2);
        $I->canSee($this->validationErrorPhone, \Page\BusinessRegistration::$Error_BusinessPhone);
        $I->canSeeInCurrentUrl(Page\BusinessRegistration::$URL);
    }
    
    public function BusinessNumber_LogOut6(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function BusinessNumber_AlreadyUsedNumber_Valid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busPhone         = $this->businessPhone_alreadyCreated;
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus15_RV");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(6);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
    }
    
    public function BusinessNumber_LogOut7(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    //--------------------------------------------------------------------------
    //------------------------Business Name Validation--------------------------
    //--------------------------------------------------------------------------
    
    public function BusinessName_Required(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = '';
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(2);
        $I->canSeeFieldIsRequired($I, \Page\BusinessRegistration::$BusinessNameField);
        $I->canSee($this->requiredErrorBusinessName, \Page\BusinessRegistration::$Error_BusinessName);
    }
    
    public function BusinessName_LogOut1(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function BusinessName_1Symbol_Valid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busName          = 'M';
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(6);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
    }
    
    public function BusinessName_LogOut2(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function BusinessName_128Symbols_Valid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busName          = 'Business namme 128 symbols business namme 128 symbols business namme 128 symbols business namme 128 symbols business namme 128 s';
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(6);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
    }
    
    public function BusinessName_LogOut3(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function BusinessName_255Symbols_Valid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busName          = 'Business namme 255 symbols biss 255 syols buess name 255 symbols business namme 255 symbols business namme 255 symbols business namme 255 symbols business namme 255 symbols business namme 255 symbols business namme 255 symbols business namme 255 businesss';
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(6);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
    }
    
    public function BusinessName_LogOut4(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function BusinessName_256Symbols_Invalid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busName          = 'Business namme 256 symbols business namme 256 symbols business namme 256 symbols business namme 256 symbols business namme 256 symbols business namme 256 symbols business namme 256 symbols business namme 256 symbols business namme 256 symbols business namm';
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(2);
        $I->canSeeFieldIsRequired($I, \Page\BusinessRegistration::$BusinessNameField);
        $I->canSee($this->validationErrorBusinessName, \Page\BusinessRegistration::$Error_BusinessName);
    }
    
    public function BusinessName_LogOut5(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function BusinessName_LatinSymbols_Valid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busName          = 'WertyuioPas';
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(6);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
    }
    
    public function BusinessName_LogOut6(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function BusinessName_NumberSymbols_Valid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busName          = '3456';
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(6);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
    }
    
    public function BusinessName_LogOut7(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function BusinessName_PunctuationSymbols_Valid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $busName          = 'sD!@#$%^&*()_+=-`{}:"><?/,.;[]';
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(6);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
    }
    
    public function BusinessName_LogOut8(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    //--------------------------------------------------------------------------
    //------------------------Street Address Validation-------------------------
    //--------------------------------------------------------------------------
    
    public function StreetAddress_Required(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $address          = '';
        $busName          = $I->GenerateNameOf("bus17_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(2);
        $I->canSeeFieldIsRequired($I, \Page\BusinessRegistration::$StreetAddressField);
        $I->canSee($this->requiredErrorStreetAddress, \Page\BusinessRegistration::$Error_StreetAddress);
    }
    
    public function StreetAddress_LogOut1(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function StreetAddress_1Symbol_Valid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $address          = 'M';
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus18_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(6);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
    }
    
    public function StreetAddress_LogOut2(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function StreetAddress_128Symbols_Valid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $address          = 'Street Address 128 symbols Street Address 128 symbols Street Address 128 symbols Street Address 128 symbols Street Address 128 s';
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus19_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(6);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
    }
    
    public function StreetAddress_LogOut3(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function StreetAddress_255Symbols_Valid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $address          = 'Street Address 255 symbols biss 255 syols Street Address 255 symbols Street Address 255 symbols Street Address 255 symbols Street Address 255 symbols Street Address 255 symbols Street Address 255 symbols Street Address 255 symbols Street Address 255 stree';
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus20_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(6);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
    }
    
    public function StreetAddress_LogOut4(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function StreetAddress_256Symbols_Invalid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $address          = 'Street Address 256 symbols Street Address 256 symbols Street Address 256 symbols Street Address 256 symbols Street Address 256 symbols Street Address 256 symbols Street Address 256 symbols Street Address 256 symbols Street Address 256 symbols Street Addres';
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus21_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(2);
        $I->canSeeFieldIsRequired($I, \Page\BusinessRegistration::$StreetAddressField);
        $I->canSee($this->validationErrorStreetAddress, \Page\BusinessRegistration::$Error_StreetAddress);
    }
    
    public function StreetAddress_LogOut5(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function StreetAddress_LatinSymbols_Valid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $address          = 'WertyuioPas';
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus22_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(6);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
    }
    
    public function StreetAddress_LogOut6(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function StreetAddress_NumberSymbols_Valid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $address          = '3456';
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus23_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(6);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
    }
    
    public function StreetAddress_LogOut7(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
    
    public function StreetAddress_PunctuationSymbols_Valid(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $address          = 'sD!@#$%^&*()_+=-`{}:"><?/,.;[]';
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = $this->defaultPassword;
        $busName          = $I->GenerateNameOf("bus24_RV");
        $busPhone         = $I->GeneratePhoneNumber();
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = \Page\SectorList::DefaultSectorOfficeRetail;
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(6);
        $I->canSeeInCurrentUrl(Page\RegistrationStarted::$URL_Started);
    }
    
    public function StreetAddress_LogOut8(AcceptanceTester $I) {
        $I->LogIn_TRUEorFALSE($I);
        $I->wait(1);
        $I->Logout($I);
    }
}
