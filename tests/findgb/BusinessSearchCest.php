<?php


class BusinessSearchCest
{
    public $state, $city, $zips, $county, $program, $audSubgroup1_Energy, $id_audSubgroup1_Energy;
    public $business1, $business2, $business3, $business4, $business5, $business6, $busId1, $busId2, $busId3, $busId4, $busId5, $busId6;
    public $bus2_phone, $bus2_address, $bus2_website, $bus2_googleLink, $bus2_about, $bus2_whyWereGreen, $bus2_testimonials, $bus2_rating, $bus2_openStatus, $bus2_logo, 
           $bus2_photo, $bus2_MondayHours, $bus2_TuesdayHours, $bus2_WednesdayHours, $bus2_ThursdayHours, $bus2_FridayHours, $bus2_SaturdayHours, $bus2_SundayHours;
    public $bus3_phone, $bus3_address, $bus3_website, $bus3_googleLink, $bus3_about, $bus3_whyWereGreen, $bus3_testimonials, $bus3_rating, 
           $bus3_openStatus, $bus3_logo, $bus3_photo;
    public $bus4_phone, $bus4_address, $bus4_website, $bus4_googleLink, $bus4_about, $bus4_whyWereGreen, $bus4_testimonials, $bus4_rating, 
           $bus4_openStatus, $bus4_logo, $bus4_photo, $bus4_MondayHours, $bus4_TuesdayHours, $bus4_WednesdayHours, $bus4_ThursdayHours, $bus4_FridayHours, $bus4_SaturdayHours, $bus4_SundayHours;
    public $bus5_phone, $bus5_address, $bus5_website, $bus5_googleLink, $bus5_yelpLink, $bus5_about, $bus5_whyWereGreen, $bus5_testimonials, $bus5_rating, 
           $bus5_openStatus, $bus5_logo, $bus5_photo, $bus5_MondayHours, $bus5_TuesdayHours, $bus5_WednesdayHours, $bus5_ThursdayHours, $bus5_FridayHours, $bus5_SaturdayHours, $bus5_SundayHours;
    public $bus6_phone, $bus6_address, $bus6_website, $bus6_googleLink, $bus6_yelpLink, $bus6_about, $bus6_whyWereGreen, $bus6_testimonials, $bus6_rating, 
           $bus6_openStatus, $bus6_logo, $bus6_photo;
    public $measure1Desc;
    public $idMeasure1;
    public $measuresDesc_SuccessCreated;
    public $statuses = ['core'];


    public function Help2_1_LoginAsNationalAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    public function Help2_2_CreateState(Step\Acceptance\State $I)
    {
//        $name = $this->state = $I->GenerateNameOf("StFindGB");
        $name = $this->state = 'Oregon';
        $shortName = 'OR';
        
        $st = $I->GetStateOnPageInList($name);
        $present = $st['found'];
        $I->comment("State present: $present");
        if($present == 'No') {
            $I->CreateState($name, $shortName);
        }
    }
    
    public function Help2_3_SelectDefaultState(AcceptanceTester $I)
    {
        $I->SelectDefaultState($I, $this->state);
    }
    
    public function Help2_4_CreateAuditSubGroupForEnergyGroup(\Step\Acceptance\AuditSubGroup $I)
    {
        $name      = $this->audSubgroup1_Energy = $I->GenerateNameOf("EnAudSub1");
        $auditGroup = Page\AuditGroupList::Energy_AuditGroup;
        $state      = $this->state;
        
        $I->CreateAuditSubgroup($name, $auditGroup, $state);
        $I->amOnPage(Page\AuditSubgroupList::URL());
        $this->id_audSubgroup1_Energy = $I->grabTextFrom(Page\AuditSubgroupList::IdLine_ByNameValue($name));
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
        $I->waitForElement(\Page\MeasureList::$CreateMeasureButton);
        $this->idMeasure1 = $I->grabTextFrom(Page\MeasureList::IdLine_ByDescValue($desc));
        $this->measuresDesc_SuccessCreated[] = $desc;
    }
    
    //-------------------------------Create county------------------------------
    
    
    public function Help_CreateCounty(\Step\Acceptance\County $I) {
        $name    = $this->county = $I->GenerateNameOf("County");
        $state   = $this->state;
        
        $I->CreateCounty($name, $state);
    }
    
    public function Help1_6_3_CreateCity1_And_Program1(\Step\Acceptance\City $I, Step\Acceptance\Program $Y) {
        $city    = $this->city = 'Portland';
        $cityArr = [$city];
        $state   = $this->state;
        $zips    = $this->zips = '97209';
        $program = $this->program = $I->GenerateNameOf("ProgBS1");
        
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
    
    public function Help1_16_LogOut(AcceptanceTester $I) {
        $I->amOnPage(Page\MeasureList::URL());
        $I->Logout($I);
    }
    
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //--------------------------------------------------------------------------Business register-----------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    public function Business1_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business1 = $I->GenerateNameOf("Bus1FGB");
        $busPhone         = $I->GeneratePhoneNumber();
        $address          = '1624 NW Glisan St';
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad(); 
        $I->canSeeInCurrentUrl(\Page\LandingForTier::URL_BusLogin());
    }
    
    public function Help1_18_LogOutFromBusiness1(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    public function Business2_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business2 = $I->GenerateNameOf("Bus2FGB");
        $busPhone         = $this->bus2_phone = $I->GeneratePhoneNumber();
        $address          = $this->bus2_address = '1844 SW Morrison Street';
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = $this->bus2_website = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();       
        $I->canSeeInCurrentUrl(\Page\LandingForTier::URL_BusLogin());
    }
    
    public function Business2_CompleteMeasure1_NA_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
                
        $I->comment("Complete Measure1 for business: $this->business2");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'na');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    public function Business2_AddGoogleLink(AcceptanceTester $I) {
        $googleLink = $this->bus2_googleLink = 'https://goo.gl/maps/mRp9fEjTDs1GBM4a9';
        
        $I->amOnPage(\Page\CompanyProfile::$URL);
        $I->fillField(Page\CompanyProfile::$GoogleLinkField_BusinessProfileTab, $googleLink);
        $I->click(Page\CompanyProfile::$SaveButtonFooter_BusinessProfileTab);
        $I->wait(2);
        $I->waitPageLoad();
        $I->cantSee('Error');
        $I->cantSee('Warning');
        $I->cantSee('PHP');
        $I->cantSee('Database');
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeInField(Page\CompanyProfile::$GoogleLinkField_BusinessProfileTab, $googleLink);
    }
    
    public function Business2_Add_About_WhyWeGoGreen_Testimonials_Info(AcceptanceTester $I) {
        $about = $this->bus2_about = $I->GenerateNameOf("About field text");
        $whyWeAreGreen = $this->bus2_whyWereGreen = $I->GenerateNameOf("Why we're green field text");
        $testimonials = $this->bus2_testimonials = $I->GenerateNameOf("Testimonials field text");
        
        $I->amOnPage(\Page\CompanyProfile::$URL);
        $I->fillField(Page\CompanyProfile::$BusinessDescriptionField_BusinessProfileTab, $about);
        $I->fillField(Page\CompanyProfile::$DescribeHowBusinessIsGreenField_BusinessProfileTab, $whyWeAreGreen);
        $I->fillField(Page\CompanyProfile::$TestimonialsField_BusinessProfileTab, $testimonials);
        $I->click(Page\CompanyProfile::$SaveButtonFooter_BusinessProfileTab);
        $I->wait(2);
        $I->waitPageLoad();
        $I->cantSee('Error');
        $I->cantSee('Warning');
        $I->cantSee('PHP');
        $I->cantSee('Database');
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeInField(Page\CompanyProfile::$BusinessDescriptionField_BusinessProfileTab, $about);
        $I->canSeeInField(Page\CompanyProfile::$DescribeHowBusinessIsGreenField_BusinessProfileTab, $whyWeAreGreen);
        $I->canSeeInField(Page\CompanyProfile::$TestimonialsField_BusinessProfileTab, $testimonials);
    }
    
    public function Business2_Add_BusinessLogo_BusinessPhoto(AcceptanceTester $I) {
        $I->amOnPage(\Page\CompanyProfile::$URL);
        $I->attachFile(\Page\CompanyProfile::$BusinessLogo_BusinessProfileTab, 'image1.jpg');
        $I->wait(3);
        $I->click(Page\CompanyProfile::$SaveButtonFooter_BusinessProfileTab);
        $I->wait(2);
        $I->waitPageLoad();
        $I->amOnPage(\Page\CompanyProfile::$URL);
        $I->attachFile(\Page\CompanyProfile::$BusinessPhoto_BusinessProfileTab, 'image2.png');
        $I->wait(3);
        $I->click(Page\CompanyProfile::$SaveButtonFooter_BusinessProfileTab);
        $I->wait(2);
        $I->waitPageLoad();
        $I->cantSee('Error');
        $I->cantSee('Warning');
        $I->cantSee('PHP');
        $I->cantSee('Database');
        $bus2_logo = $I->grabAttributeFrom(\Page\CompanyProfile::$BusinessLogo_SavedImage_BusinessProfileTab, 'src');
        $bus2_photo = $I->grabAttributeFrom(\Page\CompanyProfile::$BusinessPhoto_SavedImage_BusinessProfileTab, 'src');
        $I->comment("$bus2_logo");
        $I->comment("$bus2_photo");
        $I->comment("-----------");
        $this->bus2_logo = str_replace('/user/business/view-logo', "/business/view-file", $bus2_logo);
        $this->bus2_photo = str_replace('/user/business/view-logo', "/business/view-file", $bus2_photo);
        $I->comment("$this->bus2_logo");
        $I->comment("$this->bus2_photo");
    }
    
    public function Help1_18_LogOutFromBusiness2(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->wait(1);
    }
    
    public function Business3_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business3 = $I->GenerateNameOf("Bus3FGB");
        $busPhone         = $this->bus3_phone = $I->GeneratePhoneNumber();
        $address          = '1927 SW Jefferson';
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = $this->bus3_website = 'qafgfhd.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad(); 
        $I->canSeeInCurrentUrl(\Page\LandingForTier::URL_BusLogin());
    }
    
    public function Business3_CompleteMeasure1_NA_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
                
        $I->comment("Complete Measure1 for business: $this->business2");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'na');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    public function Business3_AddAddress(AcceptanceTester $I) {
        $address = $this->bus3_address = '1320 NW 19th Ave';
        
        $I->amOnPage(\Page\CompanyProfile::$URL);
        $I->fillField(Page\CompanyProfile::$AddressField_BusinessProfileTab, $address);
        $I->click(Page\CompanyProfile::$SaveButtonFooter_BusinessProfileTab);
        $I->wait(2);
        $I->waitPageLoad();
        $I->cantSee('Error');
        $I->cantSee('Warning');
        $I->cantSee('PHP');
        $I->cantSee('Database');
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeInField(Page\CompanyProfile::$AddressField_BusinessProfileTab, $address);
    }
   
    public function Business3_Add_About_Testimonials_Info(AcceptanceTester $I) {
        $about = $this->bus3_about = $I->GenerateNameOf("About field text");
        $testimonials = $this->bus3_testimonials = $I->GenerateNameOf("Testimonials field text");
        
        $I->amOnPage(\Page\CompanyProfile::$URL);
        $I->fillField(Page\CompanyProfile::$BusinessDescriptionField_BusinessProfileTab, $about);
//        $I->fillField(Page\CompanyProfile::$DescribeHowBusinessIsGreenField_BusinessProfileTab, $whyWeAreGreen);
        $I->fillField(Page\CompanyProfile::$TestimonialsField_BusinessProfileTab, $testimonials);
        $I->click(Page\CompanyProfile::$SaveButtonFooter_BusinessProfileTab);
        $I->wait(2);
        $I->waitPageLoad();
        $I->cantSee('Error');
        $I->cantSee('Warning');
        $I->cantSee('PHP');
        $I->cantSee('Database');
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeInField(Page\CompanyProfile::$BusinessDescriptionField_BusinessProfileTab, $about);
        $I->canSeeInField(Page\CompanyProfile::$TestimonialsField_BusinessProfileTab, $testimonials);
    }
    
    public function Business3_Add_BusinessLogo_BusinessPhoto(AcceptanceTester $I) {
        $I->amOnPage(\Page\CompanyProfile::$URL);
        $I->attachFile(\Page\CompanyProfile::$BusinessPhoto_BusinessProfileTab, 'image2.png');
        $I->wait(3);
        $I->click(Page\CompanyProfile::$SaveButtonFooter_BusinessProfileTab);
        $I->wait(2);
        $I->waitPageLoad();
        $I->cantSee('Error');
        $I->cantSee('Warning');
        $I->cantSee('PHP');
        $I->cantSee('Database');
        $bus3_photo = $I->grabAttributeFrom(\Page\CompanyProfile::$BusinessPhoto_SavedImage_BusinessProfileTab, 'src');
        $I->comment("$bus3_photo");
        $I->comment("-----------");
        $this->bus3_photo = str_replace('/user/business/view-logo', "/business/view-file", $bus3_photo);
        $I->comment("$this->bus3_photo");
    }
    
    public function Help1_18_LogOutFromBusiness3_AndAdminLogin(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    public function Business4_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business4 = $I->GenerateNameOf("Bus4FGB");
        $busPhone         = $this->bus4_phone = $I->GeneratePhoneNumber();
        $address          = $I->GenerateNameOf("addr");
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = $this->bus4_website = 'eee.ee';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();       
        $I->canSeeInCurrentUrl(\Page\LandingForTier::URL_BusLogin());
    }
    
    public function Business4_CompleteMeasure1_NA_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
                
        $I->comment("Complete Measure1 for business: $this->business4");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'na');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    public function Business4_AddGoogleLink(AcceptanceTester $I) {
        $googleLink = $this->bus4_googleLink = 'https://goo.gl/maps/yubUhcH7smNhrufn8';
        
        $I->amOnPage(\Page\CompanyProfile::$URL);
        $I->fillField(Page\CompanyProfile::$GoogleLinkField_BusinessProfileTab, $googleLink);
        $I->click(Page\CompanyProfile::$SaveButtonFooter_BusinessProfileTab);
        $I->wait(2);
        $I->waitPageLoad();
        $I->cantSee('Error');
        $I->cantSee('Warning');
        $I->cantSee('PHP');
        $I->cantSee('Database');
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeInField(Page\CompanyProfile::$GoogleLinkField_BusinessProfileTab, $googleLink);
    }
    
    public function Business4_AddAddress(AcceptanceTester $I) {
        $address = $this->bus4_address = '1201 SW 12th Ave';
        
        $I->amOnPage(\Page\CompanyProfile::$URL);
        $I->fillField(Page\CompanyProfile::$AddressField_BusinessProfileTab, $address);
        $I->click(Page\CompanyProfile::$SaveButtonFooter_BusinessProfileTab);
        $I->wait(2);
        $I->waitPageLoad();
        $I->cantSee('Error');
        $I->cantSee('Warning');
        $I->cantSee('PHP');
        $I->cantSee('Database');
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeInField(Page\CompanyProfile::$AddressField_BusinessProfileTab, $address);
    }
    
    public function Business4_Add_WhyWeGoGreen_Testimonials_Info(AcceptanceTester $I) {
        $whyWeAreGreen = $this->bus4_whyWereGreen = $I->GenerateNameOf("Why we're green field text");
        $testimonials = $this->bus4_testimonials = $I->GenerateNameOf("Testimonials field text");
        
        $I->amOnPage(\Page\CompanyProfile::$URL);
//        $I->fillField(Page\CompanyProfile::$BusinessDescriptionField_BusinessProfileTab, $about);
        $I->fillField(Page\CompanyProfile::$DescribeHowBusinessIsGreenField_BusinessProfileTab, $whyWeAreGreen);
        $I->fillField(Page\CompanyProfile::$TestimonialsField_BusinessProfileTab, $testimonials);
        $I->click(Page\CompanyProfile::$SaveButtonFooter_BusinessProfileTab);
        $I->wait(2);
        $I->waitPageLoad();
        $I->cantSee('Error');
        $I->cantSee('Warning');
        $I->cantSee('PHP');
        $I->cantSee('Database');
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeInField(Page\CompanyProfile::$DescribeHowBusinessIsGreenField_BusinessProfileTab, $whyWeAreGreen);
        $I->canSeeInField(Page\CompanyProfile::$TestimonialsField_BusinessProfileTab, $testimonials);
    }
    
    public function Business4_Add_BusinessLogo_BusinessLogo(AcceptanceTester $I) {
        $I->amOnPage(\Page\CompanyProfile::$URL);
        $I->attachFile(\Page\CompanyProfile::$BusinessLogo_BusinessProfileTab, 'image3.gif');
        $I->wait(3);
        $I->click(Page\CompanyProfile::$SaveButtonFooter_BusinessProfileTab);
        $I->wait(2);
        $I->waitPageLoad();
        $I->cantSee('Error');
        $I->cantSee('Warning');
        $I->cantSee('PHP');
        $I->cantSee('Database');
        $bus4_logo = $I->grabAttributeFrom(\Page\CompanyProfile::$BusinessLogo_SavedImage_BusinessProfileTab, 'src');
        $I->comment("$bus4_logo");
        $I->comment("-----------");
        $this->bus4_logo = str_replace('/user/business/view-logo', "/business/view-file", $bus4_logo);
        $I->comment("$this->bus4_logo");
    }
    
    public function Help1_18_LogOutFromBusiness4_AndAdminLogin(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    public function Business5_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business5 = $I->GenerateNameOf("Bus5FGB");
        $busPhone         = $this->bus5_phone = $I->GeneratePhoneNumber();
        $address          = '';
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = $this->bus5_website = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();       
        $I->canSeeInCurrentUrl(\Page\LandingForTier::URL_BusLogin());
    }
    
    public function Business5_CompleteMeasure1_NA_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
                
        $I->comment("Complete Measure1 for business: $this->business5");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'na');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    public function Business5_AddGoogleLink(AcceptanceTester $I) {
        $googleLink = $this->bus5_googleLink = 'https://goo.gl/maps/N2TTGtPE6uQZniC66';
        $yelpLink   = $this->bus5_yelpLink = 'https://www.yelp.com/biz/paymaster-lounge-portland';
        
        $I->amOnPage(\Page\CompanyProfile::$URL);
        $I->fillField(Page\CompanyProfile::$GoogleLinkField_BusinessProfileTab, $googleLink);
        $I->fillField(Page\CompanyProfile::$YelpLinkField_BusinessProfileTab, $yelpLink);
        $I->click(Page\CompanyProfile::$SaveButtonFooter_BusinessProfileTab);
        $I->wait(2);
        $I->waitPageLoad();
        $I->cantSee('Error');
        $I->cantSee('Warning');
        $I->cantSee('PHP');
        $I->cantSee('Database');
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeInField(Page\CompanyProfile::$GoogleLinkField_BusinessProfileTab, $googleLink);
        $I->canSeeInField(Page\CompanyProfile::$YelpLinkField_BusinessProfileTab, $yelpLink);
    }
    
    public function Business5_Add_About_WhyWeGoGreen_Info(AcceptanceTester $I) {
        $about         = $this->bus5_about = $I->GenerateNameOf("About field text");
        $whyWeAreGreen = $this->bus5_whyWereGreen = $I->GenerateNameOf("Why we're green field text");
        
        $I->amOnPage(\Page\CompanyProfile::$URL);
        $I->fillField(Page\CompanyProfile::$BusinessDescriptionField_BusinessProfileTab, $about);
        $I->fillField(Page\CompanyProfile::$DescribeHowBusinessIsGreenField_BusinessProfileTab, $whyWeAreGreen);
//        $I->fillField(Page\CompanyProfile::$TestimonialsField_BusinessProfileTab, $testimonials);
        $I->click(Page\CompanyProfile::$SaveButtonFooter_BusinessProfileTab);
        $I->wait(2);
        $I->waitPageLoad();
        $I->cantSee('Error');
        $I->cantSee('Warning');
        $I->cantSee('PHP');
        $I->cantSee('Database');
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeInField(Page\CompanyProfile::$BusinessDescriptionField_BusinessProfileTab, $about);
        $I->canSeeInField(Page\CompanyProfile::$DescribeHowBusinessIsGreenField_BusinessProfileTab, $whyWeAreGreen);
    }
    
    public function Help1_18_LogOutFromBusiness5_AndAdminLogin(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
    }
    
    public function Business6_Register(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");
        $phoneNumber      = $I->GeneratePhoneNumber();
        $email            = $I->GenerateEmail();
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $this->business6 = $I->GenerateNameOf("Bus6FGB");
        $busPhone         = $this->bus6_phone = $I->GeneratePhoneNumber();
        $address          = $this->bus6_address = '2327 NW Kearney Street';
        $zip              = $this->zips;
        $city             = $this->city;
        $website          = $this->bus6_website = 'fgfh.fh';
        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '234';
        $landscapeFootage = '666';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(4);
        $I->waitPageLoad();       
        $I->canSeeInCurrentUrl(\Page\LandingForTier::URL_BusLogin());
    }
    
    public function Business6_CompleteMeasure1_NA_Answer(AcceptanceTester $I) {
        $measDesc = $this->measure1Desc;
                
        $I->comment("Complete Measure1 for business: $this->business6");
        $I->amOnPage(\Page\RegistrationStarted::URL_AuditGroup($this->id_audSubgroup1_Energy));
        $I->makeElementVisible(["[data-measure-id=$this->idMeasure1]"], $style = 'visibility');
        $I->wait(2);
        $I->scrollTo("[data-measure-id='$this->idMeasure1']");
        $I->wait(1);
        $I->selectOption(\Page\RegistrationStarted::MeasureToggleButton2_ByDesc($measDesc), 'na');
        $I->wait(1);
        $I->scrollTo(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(1);
        $I->click(\Page\RegistrationStarted::$SaveButton_Footer);
        $I->wait(3);
        $I->waitPageLoad();
    }
    
    public function Business6_AddGoogleLink(AcceptanceTester $I) {
        $googleLink = $this->bus6_googleLink = 'https://www.google.com/maps/place/Adidas+Employee+Store/@45.534506,-122.7013845,15.39z/data=!4m13!1m7!3m6!1s0x549509fe9a521055:0x61aab299a2ffb440!2sPortland,+OR+97209,+USA!3b1!8m2!3d45.5266975!4d-122.6880503!3m4!1s0x41aacd0335242dfd:0x7094e9aee9ac4383!8m2!3d45.5376195!4d-122.7080369';
        $yelpLink   = $this->bus6_yelpLink = 'https://www.yelp.com/biz/adidas-employee-store-portland-4';
        
        $I->amOnPage(\Page\CompanyProfile::$URL);
        $I->fillField(Page\CompanyProfile::$GoogleLinkField_BusinessProfileTab, $googleLink);
        $I->fillField(Page\CompanyProfile::$YelpLinkField_BusinessProfileTab, $yelpLink);
        $I->click(Page\CompanyProfile::$SaveButtonFooter_BusinessProfileTab);
        $I->wait(2);
        $I->waitPageLoad();
        $I->cantSee('Error');
        $I->cantSee('Warning');
        $I->cantSee('PHP');
        $I->cantSee('Database');
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeInField(Page\CompanyProfile::$GoogleLinkField_BusinessProfileTab, $googleLink);
        $I->canSeeInField(Page\CompanyProfile::$YelpLinkField_BusinessProfileTab, $yelpLink);
    }
    
    public function Business6_AddAddress(AcceptanceTester $I) {
        $address = $this->bus6_address = '1320 NW 19th Ave';
        
        $I->amOnPage(\Page\CompanyProfile::$URL);
        $I->fillField(Page\CompanyProfile::$AddressField_BusinessProfileTab, $address);
        $I->click(Page\CompanyProfile::$SaveButtonFooter_BusinessProfileTab);
        $I->wait(2);
        $I->waitPageLoad();
        $I->cantSee('Error');
        $I->cantSee('Warning');
        $I->cantSee('PHP');
        $I->cantSee('Database');
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeInField(Page\CompanyProfile::$AddressField_BusinessProfileTab, $address);
    }
   
    public function Business6_Add_About_Info(AcceptanceTester $I) {
        $about = $this->bus6_about = $I->GenerateNameOf("About field text");
        
        $I->amOnPage(\Page\CompanyProfile::$URL);
        $I->fillField(Page\CompanyProfile::$BusinessDescriptionField_BusinessProfileTab, $about);
//        $I->fillField(Page\CompanyProfile::$DescribeHowBusinessIsGreenField_BusinessProfileTab, $whyWeAreGreen);
//        $I->fillField(Page\CompanyProfile::$TestimonialsField_BusinessProfileTab, $testimonials);
        $I->click(Page\CompanyProfile::$SaveButtonFooter_BusinessProfileTab);
        $I->wait(2);
        $I->waitPageLoad();
        $I->cantSee('Error');
        $I->cantSee('Warning');
        $I->cantSee('PHP');
        $I->cantSee('Database');
        $I->reloadPage();
        $I->waitPageLoad();
        $I->canSeeInField(Page\CompanyProfile::$BusinessDescriptionField_BusinessProfileTab, $about);
    }
    
    public function Help1_18_LogOutFromBusiness4(AcceptanceTester $I){
        $I->LogIn_TRUEorFALSE($I);
        $I->Logout($I);
        $I->LoginAsAdmin($I);
    }
    
    public function Help1_18_Dashboard_GetBusinessID1(AcceptanceTester $I){
        $I->amOnPage(\Page\Dashboard::URL());
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business1));
        $url1 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business1), 'href');
        $I->comment("Url1: $url1");
        $u1 = explode('=', $url1);
        $this->busId1 = $u1[1];
        $I->comment("Business1 id: $this->busId1.");
    }
    
    public function Help1_18_Dashboard_GetBusinessID2(AcceptanceTester $I){
        $I->amOnPage(\Page\Dashboard::URL());
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business2));
        $url2 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business2), 'href');
        $I->comment("Url2: $url2");
        $u2 = explode('=', $url2);
        $this->busId2 = $u2[1];
        $I->comment("Business2 id: $this->busId2.");
    }
    
    public function Help1_18_Dashboard_GetBusinessID3(AcceptanceTester $I){
        $I->amOnPage(\Page\Dashboard::URL());
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business3));
        $url3 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business3), 'href');
        $I->comment("Url3: $url3");
        $u3 = explode('=', $url3);
        $this->busId3 = $u3[1];
        $I->comment("Business3 id: $this->busId3.");
    }
    
    public function Help1_18_Dashboard_GetBusinessID4(AcceptanceTester $I){
        $I->amOnPage(\Page\Dashboard::URL());
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business4));
        $url3 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business4), 'href');
        $I->comment("Url3: $url3");
        $u3 = explode('=', $url3);
        $this->busId4 = $u3[1];
        $I->comment("Business3 id: $this->busId4.");
    }
    
    public function Help1_18_Dashboard_GetBusinessID5(AcceptanceTester $I){
        $I->amOnPage(\Page\Dashboard::URL());
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business5));
        $url3 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business5), 'href');
        $I->comment("Url3: $url3");
        $u3 = explode('=', $url3);
        $this->busId5 = $u3[1];
        $I->comment("Business3 id: $this->busId5.");
    }

    public function Help1_18_Dashboard_GetBusinessID6(AcceptanceTester $I){
        $I->amOnPage(\Page\Dashboard::URL());
        $I->canSeeElement(\Page\Dashboard::BusinessLink_ByBusName($this->business6));
        $url3 = $I->grabAttributeFrom(\Page\Dashboard::BusinessLink_ByBusName($this->business6), 'href');
        $I->comment("Url3: $url3");
        $u3 = explode('=', $url3);
        $this->busId6 = $u3[1];
        $I->comment("Business3 id: $this->busId6.");
    }

    public function Business1_AddBusinessType(AcceptanceTester $I){
        $type = \Page\BusinessCategoriesList::HealthAndWellness;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessProfile($this->busId1));
        $I->selectOption(Page\ApplicationDetails::$BusinessTypeSelect_BusinessProfileTab, $type);
        $I->wait(2);
        $I->click(Page\ApplicationDetails::$SaveButtonHeader_BusinessProfileTab);
        $I->wait(2);
    }
    
    public function FindGB_CheckBusinesses_SearchResults_1(\Step\Acceptance\FindGB $I){
        $I->amOnPage(Page\FindGB_SearchResults::$URL);
        $I->fillField(Page\FindGB_SearchResults::$FindField, 'fgb');
        $I->wait(1);
        $I->click(Page\FindGB_SearchResults::$SearchButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->cantSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business1));
        $I->cantSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business2));
        $I->cantSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business3));
        $I->cantSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business4));
        $I->cantSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business5));
        $I->cantSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business6));
    }
    
    public function Business1_ChangeStatusToRecognized(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::RecognizedStatus;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId1));
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(7);
        $I->waitForElement(Page\CommunicationCreatePopup::SendMessagePopup, 120);
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_CloseButton);
        $I->wait(1);
    }
    
    public function FindGB_CheckBusinesses_SearchResults_2(\Step\Acceptance\FindGB $I){
        $I->amOnPage(Page\FindGB_SearchResults::$URL);
        $I->fillField(Page\FindGB_SearchResults::$FindField, 'fgb');
        $I->wait(1);
        $I->click(Page\FindGB_SearchResults::$SearchButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business1));
        $I->cantSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business2));
        $I->cantSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business3));
        $I->cantSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business4));
        $I->cantSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business5));
        $I->cantSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business6));
    }
    
    public function Business2_ChangeStatusToRecognized(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::RecognizedStatus;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId2));
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(7);
        $I->waitForElement(Page\CommunicationCreatePopup::SendMessagePopup, 120);
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_CloseButton);
        $I->wait(1);
    }
    
    public function FindGB_CheckBusinesses_SearchResults_3(\Step\Acceptance\FindGB $I){
        $I->amOnPage(Page\FindGB_SearchResults::$URL);
        $I->fillField(Page\FindGB_SearchResults::$FindField, 'fgb');
        $I->wait(1);
        $I->click(Page\FindGB_SearchResults::$SearchButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business1));
        $I->canSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business2));
        $I->cantSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business3));
        $I->cantSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business4));
        $I->cantSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business5));
        $I->cantSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business6));
    }
    
    public function Business3_ChangeStatusToRecognized(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::RecognizedStatus;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId3));
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(7);
        $I->waitForElement(Page\CommunicationCreatePopup::SendMessagePopup, 120);
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_CloseButton);
        $I->wait(1);
    }
    
    public function Business3_AddBusinessTypeAndCategory(AcceptanceTester $I){
        $type     = \Page\BusinessCategoriesList::ShoppingAndRetail;
        $category = \Page\BusinessSubCategoriesList::ShoppingAndRetail_Florists;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessProfile($this->busId3));
        $I->selectOption(Page\ApplicationDetails::$BusinessTypeSelect_BusinessProfileTab, $type);
        $I->wait(4);
        $I->selectOption(Page\ApplicationDetails::$BusinessCategorySelect_BusinessProfileTab, $category);
        $I->wait(2);
        $I->click(Page\ApplicationDetails::$SaveButtonHeader_BusinessProfileTab);
        $I->wait(2);
    }
    
    public function FindGB_CheckBusinesses_SearchResults_4(\Step\Acceptance\FindGB $I){
        $I->amOnPage(Page\FindGB_SearchResults::$URL);
        $I->fillField(Page\FindGB_SearchResults::$FindField, 'fgb');
        $I->wait(1);
        $I->click(Page\FindGB_SearchResults::$SearchButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business1));
        $I->canSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business2));
        $I->canSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business3));
        $I->cantSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business4));
        $I->cantSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business5));
        $I->cantSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business6));
    }
    
    public function Business4_ChangeStatusToRecognized(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::RecognizedStatus;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId4));
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(7);
        $I->waitForElement(Page\CommunicationCreatePopup::SendMessagePopup, 120);
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_CloseButton);
        $I->wait(1);
    }
    
    public function FindGB_CheckBusinesses_SearchResults_5(\Step\Acceptance\FindGB $I){
        $I->amOnPage(Page\FindGB_SearchResults::$URL);
        $I->fillField(Page\FindGB_SearchResults::$FindField, 'fgb');
        $I->wait(1);
        $I->click(Page\FindGB_SearchResults::$SearchButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business1));
        $I->canSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business2));
        $I->canSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business3));
        $I->canSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business4));
        $I->cantSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business5));
        $I->cantSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business6));
    }
    
    public function Business4_AddBusinessTypeAndCategory(AcceptanceTester $I){
        $type     = \Page\BusinessCategoriesList::HealthAndWellness;
        $category = \Page\BusinessSubCategoriesList::HealthAndWellness_Clinics;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessProfile($this->busId4));
        $I->selectOption(Page\ApplicationDetails::$BusinessTypeSelect_BusinessProfileTab, $type);
        $I->wait(4);
        $I->selectOption(Page\ApplicationDetails::$BusinessCategorySelect_BusinessProfileTab, $category);
        $I->wait(2);
        $I->click(Page\ApplicationDetails::$SaveButtonHeader_BusinessProfileTab);
        $I->wait(2);
    }
    
    public function Business5_AddBusinessTypeAndCategory(AcceptanceTester $I){
        $type     = \Page\BusinessCategoriesList::HealthAndWellness;
        $category = \Page\BusinessSubCategoriesList::HealthAndWellness_Clinics;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessProfile($this->busId5));
        $I->selectOption(Page\ApplicationDetails::$BusinessTypeSelect_BusinessProfileTab, $type);
        $I->wait(4);
        $I->selectOption(Page\ApplicationDetails::$BusinessCategorySelect_BusinessProfileTab, $category);
        $I->wait(2);
        $I->click(Page\ApplicationDetails::$SaveButtonHeader_BusinessProfileTab);
        $I->wait(2);
    }
    
    public function Business5_ChangeStatusToRecognized(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::RecognizedStatus;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId5));
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(7);
        $I->waitForElement(Page\CommunicationCreatePopup::SendMessagePopup, 120);
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_CloseButton);
        $I->wait(1);
    }
    
    public function FindGB_CheckBusinesses_SearchResults_6(\Step\Acceptance\FindGB $I){
        $I->amOnPage(Page\FindGB_SearchResults::$URL);
        $I->fillField(Page\FindGB_SearchResults::$FindField, 'fgb');
        $I->wait(1);
        $I->click(Page\FindGB_SearchResults::$SearchButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business1));
        $I->canSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business2));
        $I->canSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business3));
        $I->canSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business4));
        $I->canSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business5));
        $I->cantSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business6));
    }
    
    public function Business6_ChangeStatusToRecognized(AcceptanceTester $I){
        $status = \Page\BusinessChecklistView::RecognizedStatus;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessInfo($this->busId6));
        $I->selectOption(\Page\BusinessChecklistView::$StatusSelect_BusinessInfoTab, $status);
        $I->wait(7);
        $I->waitForElement(Page\CommunicationCreatePopup::SendMessagePopup, 120);
        $I->wait(1);
        $I->click(Page\CommunicationCreatePopup::$SendMessagePopup_CloseButton);
        $I->wait(1);
    }
    
    public function Business6_AddBusinessTypeAndCategory(AcceptanceTester $I){
        $type     = \Page\BusinessCategoriesList::HealthAndWellness;
        $category = \Page\BusinessSubCategoriesList::HealthAndWellness_MassageTherapists;
        
        $I->amOnPage(\Page\BusinessChecklistView::URL_BusinessProfile($this->busId6));
        $I->selectOption(Page\ApplicationDetails::$BusinessTypeSelect_BusinessProfileTab, $type);
        $I->wait(4);
        $I->selectOption(Page\ApplicationDetails::$BusinessCategorySelect_BusinessProfileTab, $category);
        $I->wait(2);
        $I->click(Page\ApplicationDetails::$SaveButtonHeader_BusinessProfileTab);
        $I->wait(2);
    }
    
    public function FindGB_CheckBusinesses_SearchResults_7(\Step\Acceptance\FindGB $I){
        $I->amOnPage(Page\FindGB_SearchResults::$URL);
        $I->fillField(Page\FindGB_SearchResults::$FindField, 'fgb');
        $I->wait(1);
        $I->click(Page\FindGB_SearchResults::$SearchButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->canSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business1));
        $I->canSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business2));
        $I->canSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business3));
        $I->canSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business4));
        $I->canSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business5));
        $I->canSeeElement(\Page\FindGB_SearchResults::BusinessName_ByBusName($this->business6));
    }
    
    
    
    public function Help_Business2_GetGoogleInfo(AcceptanceTester $I){
        $I->amOnUrl($this->bus2_googleLink);
        $I->wait(6);
        $url = $I->getCurrentUrl();
        $I->comment("Current url: $url");
        $I->amOnUrl("https://www.google.com/");
        $I->wait(3);
        $I->amOnPage("$url?hl=en");
        $I->wait(5);
        $this->bus2_openStatus = $I->grabTextFrom(".section-info-hour-text>span:nth-of-type(1)");
        $this->bus2_rating = $I->grabTextFrom(".section-star-display");
        $this->bus2_openStatus = str_replace('.', "", $this->bus2_openStatus);
        $I->comment("Google Data:");
        $I->comment("Open Status: $this->bus2_openStatus");
        $I->comment("Rating: $this->bus2_rating");
    }
    
    public function Help_Business2_GetGoogleInfo_Hours(AcceptanceTester $I){
        $I->amOnUrl($this->bus2_googleLink);
        $I->wait(6);
        $url = $I->getCurrentUrl();
        $I->comment("Current url: $url");
        $I->amOnUrl("https://www.google.com/");
        $I->wait(3);
        $I->amOnPage("$url?hl=en");
        $I->wait(5);
//        $monCount = $I->getAmount($I, $css);
        $I->click("span.section-open-hours-button");
        $this->bus2_MondayHours    = $I->grabTextFrom("//tr[contains(th/div/text(), 'Monday')]/td[1]/ul");
        $this->bus2_TuesdayHours   = $I->grabTextFrom("//tr[contains(th/div/text(), 'Tuesday')]/td[1]/ul");
        $this->bus2_WednesdayHours = $I->grabTextFrom("//tr[contains(th/div/text(), 'Wednesday')]/td[1]/ul");
        $this->bus2_ThursdayHours  = $I->grabTextFrom("//tr[contains(th/div/text(), 'Thursday')]/td[1]/ul");
        $this->bus2_FridayHours    = $I->grabTextFrom("//tr[contains(th/div/text(), 'Friday')]/td[1]/ul");
        $this->bus2_SaturdayHours  = $I->grabTextFrom("//tr[contains(th/div/text(), 'Saturday')]/td[1]/ul");
        $this->bus2_SundayHours    = $I->grabTextFrom("//tr[contains(th/div/text(), 'Sunday')]/td[1]/ul");
        $I->comment("Monday: $this->bus2_MondayHours");
        $I->comment("Tuesday: $this->bus2_TuesdayHours");
        $I->comment("Wednesday: $this->bus2_WednesdayHours");
        $I->comment("Thursday: $this->bus2_ThursdayHours");
        $I->comment("Friday: $this->bus2_FridayHours");
        $I->comment("Saturday: $this->bus2_SaturdayHours");
        $I->comment("Sunday: $this->bus2_SundayHours");
    }
    
    public function Business2_FindGB_CheckBusinessProfilePage(\Step\Acceptance\FindGB $I){
        $rating_openStatus_distance = "$this->bus2_rating | $this->bus2_openStatus";
        $openStatus = $this->bus2_openStatus;
        $logo = $this->bus2_logo;
        $photo = $this->bus2_photo;
        $fullAddress = "$this->bus2_address, $this->city, $this->state";
        $yelpLink = null;
        
        $I->CheckOnBusinessProfile($this->city, $this->business2, $rating_openStatus_distance, $openStatus, $logo, $photo, $this->bus2_about, 
                    $this->bus2_whyWereGreen, $this->bus2_testimonials, $this->bus2_phone, $this->bus2_website, $fullAddress, $this->bus2_googleLink, $yelpLink);
    }
    
    public function Business2_FindGB_CheckHours_BusinessProfilePage(\Step\Acceptance\FindGB $I){
        $mondayHours    = $this->bus2_MondayHours;
        $tuesdayHours   = $this->bus2_TuesdayHours;
        $wednesdayHours = $this->bus2_WednesdayHours;
        $thursdayHours  = $this->bus2_ThursdayHours;
        $fridayHours    = $this->bus2_FridayHours;
        $saturdayHours  = $this->bus2_SaturdayHours;
        $sundayHours    = $this->bus2_SundayHours;
        
        $I->CheckHours_OnBusinessProfile($this->city, $this->business2, $mondayHours, $tuesdayHours, $wednesdayHours, $thursdayHours, $fridayHours, $saturdayHours, $sundayHours);
    }
    
    public function Business3_FindGB_CheckBusinessProfilePage(\Step\Acceptance\FindGB $I){
        $rating_openStatus_distance = null;
        $openStatus = null;
        $logo = null;
        $photo = $this->bus3_photo;
        $fullAddress = "$this->bus3_address, $this->city, $this->state";
        $yelpLink = null;
        $googleLink = null;
        $busType = \Page\BusinessCategoriesList::ShoppingAndRetail;
        $busCategory = \Page\BusinessSubCategoriesList::ShoppingAndRetail_Florists;
        
        $I->CheckOnBusinessProfile($this->city, $this->business3, $rating_openStatus_distance, $openStatus, $logo, $photo, $this->bus3_about, 
                    null, $this->bus3_testimonials, $this->bus3_phone, $this->bus3_website, $fullAddress, $googleLink, $yelpLink, $busType, $busCategory);
    }
    
    public function Help_Business4_GetGoogleInfo(AcceptanceTester $I){
        $I->amOnUrl($this->bus4_googleLink);
        $I->wait(6);
        $url = $I->getCurrentUrl();
        $I->comment("Current url: $url");
        $I->amOnUrl("https://www.google.com/");
        $I->wait(3);
        $I->amOnPage("$url?hl=en");
        $I->wait(5);
        $this->bus4_openStatus = $I->grabTextFrom(".section-info-hour-text>span:nth-of-type(1)");
        $this->bus4_rating = $I->grabTextFrom(".section-star-display");
        $this->bus4_openStatus = str_replace('.', "", $this->bus4_openStatus);
        $I->comment("Google Data:");
        $I->comment("Open Status: $this->bus4_openStatus");
        $I->comment("Rating: $this->bus4_rating");
    }
    
    public function Help_Business4_GetGoogleInfo_Hours(AcceptanceTester $I){
        $I->amOnUrl($this->bus4_googleLink);
        $I->wait(6);
        $url = $I->getCurrentUrl();
        $I->comment("Current url: $url");
        $I->amOnUrl("https://www.google.com/");
        $I->wait(3);
        $I->amOnPage("$url?hl=en");
        $I->wait(5);
//        $monCount = $I->getAmount($I, $css);
        $I->click("span.section-open-hours-button");
        $this->bus4_MondayHours    = $I->grabTextFrom("//tr[contains(th/div/text(), 'Monday')]/td[1]/ul");
        $this->bus4_TuesdayHours   = $I->grabTextFrom("//tr[contains(th/div/text(), 'Tuesday')]/td[1]/ul");
        $this->bus4_WednesdayHours = $I->grabTextFrom("//tr[contains(th/div/text(), 'Wednesday')]/td[1]/ul");
        $this->bus4_ThursdayHours  = $I->grabTextFrom("//tr[contains(th/div/text(), 'Thursday')]/td[1]/ul");
        $this->bus4_FridayHours    = $I->grabTextFrom("//tr[contains(th/div/text(), 'Friday')]/td[1]/ul");
        $this->bus4_SaturdayHours  = $I->grabTextFrom("//tr[contains(th/div/text(), 'Saturday')]/td[1]/ul");
        $this->bus4_SundayHours    = $I->grabTextFrom("//tr[contains(th/div/text(), 'Sunday')]/td[1]/ul");
        $I->comment("Monday: $this->bus4_MondayHours");
        $I->comment("Tuesday: $this->bus4_TuesdayHours");
        $I->comment("Wednesday: $this->bus4_WednesdayHours");
        $I->comment("Thursday: $this->bus4_ThursdayHours");
        $I->comment("Friday: $this->bus4_FridayHours");
        $I->comment("Saturday: $this->bus4_SaturdayHours");
        $I->comment("Sunday: $this->bus4_SundayHours");
    }
    
    public function Business4_FindGB_CheckBusinessProfilePage(\Step\Acceptance\FindGB $I){
        $rating_openStatus_distance = "$this->bus4_rating | $this->bus4_openStatus";
        $openStatus = $this->bus4_openStatus;
        $logo = $this->bus4_logo;
        $photo = null;
        $fullAddress = "$this->bus4_address, $this->city, $this->state";
        $yelpLink = null;
        $busType = \Page\BusinessCategoriesList::HealthAndWellness;
        $busCategory = \Page\BusinessSubCategoriesList::HealthAndWellness_Clinics;
        
        $I->CheckOnBusinessProfile($this->city, $this->business4, $rating_openStatus_distance, $openStatus, $logo, $photo, null, 
                    $this->bus4_whyWereGreen, $this->bus4_testimonials, $this->bus4_phone, $this->bus4_website, $fullAddress, $this->bus4_googleLink, $yelpLink, $busType, $busCategory);
    }
    
    public function Business4_FindGB_CheckHours_BusinessProfilePage(\Step\Acceptance\FindGB $I){
        $mondayHours    = $this->bus4_MondayHours;
        $tuesdayHours   = $this->bus4_TuesdayHours;
        $wednesdayHours = $this->bus4_WednesdayHours;
        $thursdayHours  = $this->bus4_ThursdayHours;
        $fridayHours    = $this->bus4_FridayHours;
        $saturdayHours  = $this->bus4_SaturdayHours;
        $sundayHours    = $this->bus4_SundayHours;
        
        $I->CheckHours_OnBusinessProfile($this->city, $this->business4, $mondayHours, $tuesdayHours, $wednesdayHours, $thursdayHours, $fridayHours, $saturdayHours, $sundayHours);
    }
    
    public function Help_Business5_GetGoogleInfo(AcceptanceTester $I){
        $I->amOnUrl($this->bus5_googleLink);
        $I->wait(6);
        $url = $I->getCurrentUrl();
        $I->comment("Current url: $url");
        $I->amOnUrl("https://www.google.com/");
        $I->wait(3);
        $I->amOnPage("$url?hl=en");
        $I->wait(5);
        $this->bus5_openStatus = $I->grabTextFrom(".section-info-hour-text>span:nth-of-type(1)");
        $this->bus5_rating = $I->grabTextFrom(".section-star-display");
        $this->bus5_openStatus = str_replace('.', "", $this->bus5_openStatus);
        $I->comment("Google Data:");
        $I->comment("Open Status: $this->bus5_openStatus");
        $I->comment("Rating: $this->bus5_rating");
    }
    
    public function Help_Business5_GetGoogleInfo_Hours(AcceptanceTester $I){
        $I->amOnUrl($this->bus5_googleLink);
        $I->wait(6);
        $url = $I->getCurrentUrl();
        $I->comment("Current url: $url");
        $I->amOnUrl("https://www.google.com/");
        $I->wait(3);
        $I->amOnPage("$url?hl=en");
        $I->wait(5);
//        $monCount = $I->getAmount($I, $css);
        $I->click("span.section-open-hours-button");
        $this->bus5_MondayHours    = $I->grabTextFrom("//tr[contains(th/div/text(), 'Monday')]/td[1]/ul");
        $this->bus5_TuesdayHours   = $I->grabTextFrom("//tr[contains(th/div/text(), 'Tuesday')]/td[1]/ul");
        $this->bus5_WednesdayHours = $I->grabTextFrom("//tr[contains(th/div/text(), 'Wednesday')]/td[1]/ul");
        $this->bus5_ThursdayHours  = $I->grabTextFrom("//tr[contains(th/div/text(), 'Thursday')]/td[1]/ul");
        $this->bus5_FridayHours    = $I->grabTextFrom("//tr[contains(th/div/text(), 'Friday')]/td[1]/ul");
        $this->bus5_SaturdayHours  = $I->grabTextFrom("//tr[contains(th/div/text(), 'Saturday')]/td[1]/ul");
        $this->bus5_SundayHours    = $I->grabTextFrom("//tr[contains(th/div/text(), 'Sunday')]/td[1]/ul");
        $I->comment("Monday: $this->bus5_MondayHours");
        $I->comment("Tuesday: $this->bus5_TuesdayHours");
        $I->comment("Wednesday: $this->bus5_WednesdayHours");
        $I->comment("Thursday: $this->bus5_ThursdayHours");
        $I->comment("Friday: $this->bus5_FridayHours");
        $I->comment("Saturday: $this->bus5_SaturdayHours");
        $I->comment("Sunday: $this->bus5_SundayHours");
    }
    
    public function Business5_FindGB_CheckBusinessProfilePage(\Step\Acceptance\FindGB $I){
        $rating_openStatus_distance = "$this->bus5_rating | $this->bus5_openStatus";
        $openStatus = $this->bus5_openStatus;
        $logo = $this->bus5_logo = null;
        $photo = null;
        $fullAddress = "$this->city, $this->state";
        $yelpLink = $this->bus5_yelpLink;
        $about = $this->bus5_about;
        $busType = \Page\BusinessCategoriesList::HealthAndWellness;
        $busCategory = \Page\BusinessSubCategoriesList::HealthAndWellness_Clinics;
        
        $I->CheckOnBusinessProfile($this->city, $this->business5, $rating_openStatus_distance, $openStatus, $logo, $photo, $about, 
                    $this->bus5_whyWereGreen, $this->bus5_testimonials, $this->bus5_phone, $this->bus5_website, $fullAddress, $this->bus5_googleLink, $yelpLink, $busType, $busCategory);
    }
    
    public function Business5_FindGB_CheckHours_BusinessProfilePage(\Step\Acceptance\FindGB $I){
        $mondayHours    = $this->bus5_MondayHours;
        $tuesdayHours   = $this->bus5_TuesdayHours;
        $wednesdayHours = $this->bus5_WednesdayHours;
        $thursdayHours  = $this->bus5_ThursdayHours;
        $fridayHours    = $this->bus5_FridayHours;
        $saturdayHours  = $this->bus5_SaturdayHours;
        $sundayHours    = $this->bus5_SundayHours;
        
        $I->CheckHours_OnBusinessProfile($this->city, $this->business5, $mondayHours, $tuesdayHours, $wednesdayHours, $thursdayHours, $fridayHours, $saturdayHours, $sundayHours);
    }
    
    public function Help_Business6_GetGoogleInfo(AcceptanceTester $I){
        $I->amOnUrl($this->bus6_googleLink);
        $I->wait(6);
        $I->click("#searchboxinput");
        $I->wait(5);
        $I->click(".suggestions ul>li:nth-of-type(1)");
//        $I->click("#searchbox-searchbutton");
        $I->wait(15);
        $url = $I->getCurrentUrl();
        $I->comment("Current url: $url");
        $I->amOnUrl("https://www.google.com/");
        $I->wait(3);
        $I->amOnPage("$url?hl=en");
        $I->wait(5);
        $this->bus6_openStatus = $I->grabTextFrom(".section-info-hour-text>span:nth-of-type(1)");
        $this->bus6_rating = $I->grabTextFrom(".section-star-display");
        $this->bus6_openStatus = str_replace('.', "", $this->bus6_openStatus);
        $I->comment("Google Data:");
        $I->comment("Open Status: $this->bus6_openStatus");
        $I->comment("Rating: $this->bus6_rating");
    }
    
    public function Business6_FindGB_CheckBusinessProfilePage(\Step\Acceptance\FindGB $I){
        $rating_openStatus_distance = "$this->bus6_rating | $this->bus6_openStatus";
        $openStatus = $this->bus6_openStatus;
        $logo = $this->bus6_logo = null;
        $photo = null;
        $about = $this->bus6_about; 
        $whyWereGreen = $this->bus6_whyWereGreen = null;
        $testimonials = $this->bus6_testimonials = null;
        $fullAddress = "$this->bus6_address, $this->city, $this->state";
        $yelpLink = null;
        $busType = \Page\BusinessCategoriesList::HealthAndWellness;
        $busCategory = \Page\BusinessSubCategoriesList::HealthAndWellness_MassageTherapists;
        
        $I->CheckOnBusinessProfile($this->city, $this->business6, $rating_openStatus_distance, $openStatus, $logo, $photo, $about, 
                    $whyWereGreen, $testimonials, $this->bus6_phone, $this->bus6_website, $fullAddress, $this->bus6_googleLink, $yelpLink, $busType, $busCategory);
    }
    
    public function Business2_FindGB_CheckBusinessInfo_SearchResults(\Step\Acceptance\FindGB $I){
        $businessName   = $this->business2;
        $rating         = $this->bus2_rating;
        $openStatus     = $this->bus2_openStatus;
        $logo           = $this->bus2_logo;
        $address        = $this->bus2_address;
        $city           = $this->city;
        $state_zip      = "$this->state $this->zips";
        $phone          = $this->bus2_phone;
        $website        = $this->bus2_website;
        $googleLink     = $this->bus2_googleLink;
        $yelpLink       = null;
        
        $I->amOnPage(Page\FindGB_SearchResults::$URL);
        $I->fillField(Page\FindGB_SearchResults::$FindField, 'fgb');
        $I->wait(1);
        $I->click(Page\FindGB_SearchResults::$SearchButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckOnBusinessInfo_OnSearchResultsPage($city, $state_zip, $businessName, $rating, $openStatus, $logo, $phone, $website, $address, $googleLink, $yelpLink);
    }
    
    public function Business3_FindGB_CheckBusinessInfo_SearchResults(\Step\Acceptance\FindGB $I){
        $businessName   = $this->business3;
        $rating         = $this->bus3_rating = null;
        $openStatus     = $this->bus3_openStatus = null;
        $logo           = $this->bus3_logo = null;
        $address        = $this->bus3_address;
        $city           = $this->city;
        $state_zip      = "$this->state $this->zips";
        $phone          = $this->bus3_phone;
        $website        = $this->bus3_website;
        $googleLink     = $this->bus3_googleLink = null;
        $yelpLink       = null;
        $busType = \Page\BusinessCategoriesList::ShoppingAndRetail;
        $busCategory = \Page\BusinessSubCategoriesList::ShoppingAndRetail_Florists;
        
        $I->amOnPage(Page\FindGB_SearchResults::$URL);
        $I->fillField(Page\FindGB_SearchResults::$FindField, 'fgb');
        $I->wait(1);
        $I->click(Page\FindGB_SearchResults::$SearchButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckOnBusinessInfo_OnSearchResultsPage($city, $state_zip, $businessName, $rating, $openStatus, $logo, $phone, $website, $address, $googleLink, $yelpLink, $busType, $busCategory);
    }
    
    public function Business4_FindGB_CheckBusinessInfo_SearchResults(\Step\Acceptance\FindGB $I){
        $businessName   = $this->business4;
        $rating         = $this->bus4_rating;
        $openStatus     = $this->bus4_openStatus;
        $logo           = $this->bus4_logo;
        $address        = $this->bus4_address;
        $city           = $this->city;
        $state_zip      = "$this->state $this->zips";
        $phone          = $this->bus4_phone;
        $website        = $this->bus4_website;
        $googleLink     = $this->bus4_googleLink;
        $yelpLink       = null;
        $busType = \Page\BusinessCategoriesList::HealthAndWellness;
        $busCategory = \Page\BusinessSubCategoriesList::HealthAndWellness_Clinics;
        
        $I->amOnPage(Page\FindGB_SearchResults::$URL);
        $I->fillField(Page\FindGB_SearchResults::$FindField, 'fgb');
        $I->wait(1);
        $I->click(Page\FindGB_SearchResults::$SearchButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckOnBusinessInfo_OnSearchResultsPage($city, $state_zip, $businessName, $rating, $openStatus, $logo, $phone, $website, $address, $googleLink, $yelpLink, $busType, $busCategory);
    }
    
    public function Business5_FindGB_CheckBusinessInfo_SearchResults(\Step\Acceptance\FindGB $I){
        $businessName   = $this->business5;
        $rating         = $this->bus5_rating;
        $openStatus     = $this->bus5_openStatus;
        $logo           = $this->bus5_logo;
        $address        = $this->bus5_address;
        $city           = $this->city;
        $state_zip      = "$this->state $this->zips";
        $phone          = $this->bus5_phone;
        $website        = $this->bus5_website;
        $googleLink     = $this->bus5_googleLink;
        $yelpLink       = $this->bus5_yelpLink;
        $busType = \Page\BusinessCategoriesList::HealthAndWellness;
        $busCategory = \Page\BusinessSubCategoriesList::HealthAndWellness_Clinics;
        
        $I->amOnPage(Page\FindGB_SearchResults::$URL);
        $I->fillField(Page\FindGB_SearchResults::$FindField, 'fgb');
        $I->wait(1);
        $I->click(Page\FindGB_SearchResults::$SearchButton);
        $I->wait(1);
        $I->waitPageLoad();
        $I->CheckOnBusinessInfo_OnSearchResultsPage($city, $state_zip, $businessName, $rating, $openStatus, $logo, $phone, $website, $address, $googleLink, $yelpLink, $busType, $busCategory);
    }
    
}
