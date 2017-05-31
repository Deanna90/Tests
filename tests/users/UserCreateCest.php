<?php


class UserCreateCest
{
    public $defaultPassword                = "Qq!1111111";
    public $emailAlreadyCreated;
    public $requiredErrorEmail             = "Email cannot be blank.";
    public $validationErrorEmail           = "Email is not a valid email address.";
    public $alreadyCreatedErrorEmail       = "This email address has already been taken.";
    public $requiredErrorFirstName         = "First Name cannot be blank.";
    public $requiredErrorLastName          = "Last Name cannot be blank.";
    public $requiredErrorPassword          = "Password cannot be blank.";
    public $requiredErrorConfirmPassword   = "Confirm Password cannot be blank.";
    public $validationErrorConfirmPassword = "Password and Confirm password don't match";
    public $requiredErrorPhone             = "Phone cannot be blank.";
    public $validationErrorPhone           = "A phone number should contain 10 digit.";
    public $userEmail, $password;
    
    public function Help1_LogInAsAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    //--------------------------------------------------------------------------Page Title-----------------------------------------------------------------------------------------
    
    public function UserCreate2_1_1_Title(\Step\Acceptance\User $I)
    {
        $I->amOnPage(\Page\UserCreate::URL(Page\UserCreate::stateAdminType));
        $I->wait(1);
        $I->see('Create User', \Page\UserCreate::$Title);
    }
    
    public function UserCreate2_1_2_Title(\Step\Acceptance\User $I)
    {
        $I->amOnPage(\Page\UserCreate::URL(Page\UserCreate::coordinatorType));
        $I->wait(1);
        $I->see('Create User', \Page\UserCreate::$Title);
    }
    
    public function UserCreate2_1_3_Title(\Step\Acceptance\User $I)
    {
        $I->amOnPage(\Page\UserCreate::URL(Page\UserCreate::auditorType));
        $I->wait(1);
        $I->see('Create User', \Page\UserCreate::$Title);
    }
    
    public function UserCreate2_1_4_Title(\Step\Acceptance\User $I)
    {
        $I->amOnPage(\Page\UserCreate::URL(Page\UserCreate::inspectorType));
        $I->wait(1);
        $I->see('Create User', \Page\UserCreate::$Title);
    }
    
    //--------------------------------------------------------------------------Email Field----------------------------------------------------------------------------------------
    
    public function UserCreate3_1_1_EmailFieldAndLabel(\Step\Acceptance\User $I)
    {
        $I->amOnPage(\Page\UserCreate::URL(Page\UserCreate::stateAdminType));
        $I->wait(1);
        $I->canSeeElement(\Page\UserCreate::$EmailField);
        $I->see('Email', \Page\UserCreate::$EmailLabel);
    }
    
    public function UserCreate3_1_2_EmailFieldRequired(\Step\Acceptance\User $I)
    {
        $email     = '';
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf('FirNam');
        $lastName  = $I->GenerateNameOf("LastNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->canSee($this->requiredErrorEmail, \Page\UserCreate::$EmailErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\UserCreate::URL($userType));
    }
    
    public function UserCreate3_1_3_EmailField_InvalidValue(\Step\Acceptance\User $I)
    {
        $email     = 'd';
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf('FirNam');
        $lastName  = $I->GenerateNameOf("LastNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->canSee($this->validationErrorEmail, \Page\UserCreate::$EmailErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\UserCreate::URL($userType));
    }
    
    public function UserCreate3_1_4_EmailField_InvalidValue(\Step\Acceptance\User $I)
    {
        $email     = 'dtttttyyyyy';
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf('FirNam');
        $lastName  = $I->GenerateNameOf("LastNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->canSee($this->validationErrorEmail, \Page\UserCreate::$EmailErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\UserCreate::URL($userType));
    }
    
    public function UserCreate3_1_5_EmailField_InvalidValue(\Step\Acceptance\User $I)
    {
        $email     = 'dfgfg@';
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf('FirNam');
        $lastName  = $I->GenerateNameOf("LastNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->canSee($this->validationErrorEmail, \Page\UserCreate::$EmailErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\UserCreate::URL($userType));
    }
    
    public function UserCreate3_1_6_EmailField_InvalidValue(\Step\Acceptance\User $I)
    {
        $email     = 'de@ff';
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf('FirNam');
        $lastName  = $I->GenerateNameOf("LastNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->canSee($this->validationErrorEmail, \Page\UserCreate::$EmailErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\UserCreate::URL($userType));
    }
    
    public function UserCreate3_1_7_EmailField_InvalidValue(\Step\Acceptance\User $I)
    {
        $email     = 'dgd.ff';
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf('FirNam');
        $lastName  = $I->GenerateNameOf("LastNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->canSee($this->validationErrorEmail, \Page\UserCreate::$EmailErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\UserCreate::URL($userType));
    }
    
    public function UserCreate3_1_8_EmailField_InvalidValue(\Step\Acceptance\User $I)
    {
        $email     = 'fgfg.hh.hh';
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf('FirNam');
        $lastName  = $I->GenerateNameOf("LastNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->canSee($this->validationErrorEmail, \Page\UserCreate::$EmailErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\UserCreate::URL($userType));
    }
    
    public function UserCreate3_1_9_EmailField_InvalidValue(\Step\Acceptance\User $I)
    {
        $email     = 'ddd@dfgdg@dgdg.dg';
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf('FirNam');
        $lastName  = $I->GenerateNameOf("LastNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->canSee($this->validationErrorEmail, \Page\UserCreate::$EmailErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\UserCreate::URL($userType));
    }
    
    public function UserCreate3_1_10_EmailField_InvalidValue(\Step\Acceptance\User $I)
    {
        $email     = '.dfhf@gg';
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf('FirNam');
        $lastName  = $I->GenerateNameOf("LastNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->canSee($this->validationErrorEmail, \Page\UserCreate::$EmailErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\UserCreate::URL($userType));
    }
    
    public function UserCreate3_1_11_EmailField_InvalidValue(\Step\Acceptance\User $I)
    {
        $email     = '@gg.gg';
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf('FirNam');
        $lastName  = $I->GenerateNameOf("LastNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->canSee($this->validationErrorEmail, \Page\UserCreate::$EmailErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\UserCreate::URL($userType));
    }
    
    public function UserCreate3_1_12_EmailField_InvalidValue(\Step\Acceptance\User $I)
    {
        $email     = 'ffg@@ff.fg';
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf('FirNam');
        $lastName  = $I->GenerateNameOf("LastNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->canSee($this->validationErrorEmail, \Page\UserCreate::$EmailErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\UserCreate::URL($userType));
    }
    
    public function UserCreate3_1_13_EmailField_InvalidValue(\Step\Acceptance\User $I)
    {
        $email     = 'sgffh@dgf..gfh';
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf('FirNam');
        $lastName  = $I->GenerateNameOf("LastNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->canSee($this->validationErrorEmail, \Page\UserCreate::$EmailErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\UserCreate::URL($userType));
    }
    
    public function UserCreate3_1_14_EmailField_InvalidValue(\Step\Acceptance\User $I)
    {
        $email     = 'ff@dgeg.--';
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf('FirNam');
        $lastName  = $I->GenerateNameOf("LastNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->canSee($this->validationErrorEmail, \Page\UserCreate::$EmailErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\UserCreate::URL($userType));
    }
    
    public function UserCreate3_1_15_EmailField_InvalidValue(\Step\Acceptance\User $I)
    {
        $email     = 'erty$rt.gg';
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf('FirNam');
        $lastName  = $I->GenerateNameOf("LastNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->canSee($this->validationErrorEmail, \Page\UserCreate::$EmailErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\UserCreate::URL($userType));
    }
    
    public function UserCreate3_1_16_EmailField_InvalidValue(\Step\Acceptance\User $I)
    {
        $email     = 'etg@fgg,ff';
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf('FirNam');
        $lastName  = $I->GenerateNameOf("LastNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->canSee($this->validationErrorEmail, \Page\UserCreate::$EmailErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\UserCreate::URL($userType));
    }
    
    public function UserCreate3_1_17_EmailField_ValidValue(\Step\Acceptance\User $I)
    {
        $email     = $I->GenerateNameOf('er44@55.444');
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf('FirNam');
        $lastName  = $I->GenerateNameOf("LastNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);        
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage($email);
        $this->emailAlreadyCreated = $email;
        $I->SearchUserByEmailOnPageInList($userType, $email);
    }
    
    public function UserCreate3_1_18_EmailField_ValidValue(\Step\Acceptance\User $I)
    {
        $email     = $I->GenerateNameOf('dsd.dfhf@gg.');
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf('FirNam');
        $lastName  = $I->GenerateNameOf("LastNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage($email);
        $this->emailAlreadyCreated = $email;
        $I->SearchUserByEmailOnPageInList($userType, $email);
    }
    
    public function UserCreate3_1_19_EmailField_ValidValue(\Step\Acceptance\User $I)
    {
        $email     = $I->GenerateNameOf('Sfhf@gD.D');
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf('FirNam');
        $lastName  = $I->GenerateNameOf("LastNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage($email);
        $this->emailAlreadyCreated = $email;
        $I->SearchUserByEmailOnPageInList($userType, $email);
    }
    
    public function UserCreate3_1_20_EmailField_ValidValue(\Step\Acceptance\User $I)
    {
        $email     = $I->GenerateNameOf('44@d5hf.6');
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf('FirNam');
        $lastName  = $I->GenerateNameOf("LastNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage($email);
        $this->emailAlreadyCreated = $email;
        $I->SearchUserByEmailOnPageInList($userType, $email);
    }
    
    public function UserCreate3_1_21_EmailField_ValidValue(\Step\Acceptance\User $I)
    {
        $email     = $I->GenerateNameOf('df-ff_g.fgf@df.d');
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf('FirNam');
        $lastName  = $I->GenerateNameOf("LastNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage($email);
        $this->emailAlreadyCreated = $email;
        $I->SearchUserByEmailOnPageInList($userType, $email);
    }
    
    public function UserCreate3_1_22_EmailField_ValidValue(\Step\Acceptance\User $I)
    {
        $email     = $I->GenerateNameOf('dsfgdfhhdhsfghhfghfhfgghfdf@dgregerggrdfgdfgdf.trty');
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf('FirNam');
        $lastName  = $I->GenerateNameOf("LastNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage($email);
        $this->emailAlreadyCreated = $email;
        $I->SearchUserByEmailOnPageInList($userType, $email);
    }
    
    public function UserCreate3_1_23_EmailField_ValidValue(\Step\Acceptance\User $I)
    {
        $email     = $I->GenerateNameOf('dsf@gdf.tk.');
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf('FirNam');
        $lastName  = $I->GenerateNameOf("LastNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage($email);
        $this->emailAlreadyCreated = $email;
        $I->SearchUserByEmailOnPageInList($userType, $email);
    }
    
    public function UserCreate3_1_24_EmailField_InvalidValue_EmailAlreadyCreated(\Step\Acceptance\User $I)
    {
        $email     = $this->emailAlreadyCreated;
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf('FirNam');
        $lastName  = $I->GenerateNameOf("LastNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->canSee($this->alreadyCreatedErrorEmail, \Page\UserCreate::$EmailErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\UserCreate::URL($userType));
    }
    
    //--------------------------------------------------------------------------First Name Field---------------------------------------------------------------------------------------
    
    public function UserCreate3_1_1_FirstNameFieldAndLabel(\Step\Acceptance\User $I)
    {
        $I->amOnPage(\Page\UserCreate::URL(Page\UserCreate::stateAdminType));
        $I->wait(1);
        $I->canSeeElement(\Page\UserCreate::$FirstNameField);
        $I->see('First Name', \Page\UserCreate::$FirstNameLabel);
    }
    
    public function UserCreate3_1_2_FirstNameFieldRequired(\Step\Acceptance\User $I)
    {
        $email     = $I->GenerateEmail();
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = '';
        $lastName  = $I->GenerateNameOf("LastNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->canSee($this->requiredErrorFirstName, \Page\UserCreate::$FirstNameErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\UserCreate::URL($userType));
    }
    
    public function UserCreate3_1_3_FirstNameField1Symbol(\Step\Acceptance\User $I)
    {
        $email     = $I->GenerateEmail();
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = 'f';
        $lastName  = $I->GenerateNameOf("LastNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage(null, $firstName);
        $I->SearchUserByEmailOnPageInList($userType, $email, $firstName);
    }
    
    public function UserCreate3_1_4_FirstNameField128Symbol(\Step\Acceptance\User $I)
    {
        $email     = $I->GenerateEmail();
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = 'Php-webdriver 128symbols library is PHP language binding for Selenium WebDriver, which allows you to control web browsers from P';
        $lastName  = $I->GenerateNameOf("LastNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage(null, $firstName);
        $I->SearchUserByEmailOnPageInList($userType, $email, $firstName);
    }
    
    public function UserCreate3_1_5_FirstNameField255Symbol(\Step\Acceptance\User $I)
    {
        $email     = $I->GenerateEmail();
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = 'Php-webdriver 255symbols library is PHP language binding for Selenium WebDriver, which allows you to control web browsers from PHP. This library is compatible with Selenium server version 2.x and 3.x. It implements the JsonWireProtocol, which is currently';
        $lastName  = $I->GenerateNameOf("LastNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage(null, $firstName);
        $I->SearchUserByEmailOnPageInList($userType, $email, $firstName);
    }
    
    public function UserCreate3_1_6_ValidationFirstNameField256Symbol(\Step\Acceptance\User $I)
    {
        $firstName1     = "Php-webdriver 256 symbols library is PHP language binding for Selenium WebDriver, which allows you to control web browsers from PHP. This library is compatible with Selenium server version 2.x and 3.x. It implements the JsonWireProtocol, which is currently";
        $firstName      = "Php-webdriver 256 symbols library is PHP language binding for Selenium WebDriver, which allows you to control web browsers from PHP. This library is compatible with Selenium server version 2.x and 3.x. It implements the JsonWireProtocol, which is currentl";
        $I->amOnPage(\Page\UserCreate::URL(Page\UserCreate::stateAdminType));
        $I->wait(1);
        $I->fillField(\Page\UserCreate::$FirstNameField, $firstName1);
        $I->wait(1);
        $I->seeInField(\Page\UserCreate::$FirstNameField, $firstName);
    }
    
    public function UserCreate3_1_7_FirstNameFieldNumberSymbols(\Step\Acceptance\User $I)
    {
        $email     = $I->GenerateEmail();
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = '45739';
        $lastName  = $I->GenerateNameOf("LastNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage(null, $firstName);
        $I->SearchUserByEmailOnPageInList($userType, $email, $firstName);
    }
    
    public function UserCreate3_1_8_FirstNameFieldPunctuationSymbols(\Step\Acceptance\User $I)
    {
        $email     = $I->GenerateEmail();
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = "'~!@#$%^&*()_+{}:|?><,./;'[]{}|`f\-";
        $lastName  = $I->GenerateNameOf("LastNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage(null, $firstName);
        $I->SearchUserByEmailOnPageInList($userType, $email, $firstName);
    }
    
    public function UserCreate3_1_9_FirstNameFieldPunctuationSymbols(\Step\Acceptance\User $I)
    {
        $email     = $I->GenerateEmail();
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = 'fdf"ff';
        $lastName  = $I->GenerateNameOf("LastNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage(null, $firstName);
        $I->SearchUserByEmailOnPageInList($userType, $email, $firstName);
    }
    
    //--------------------------------------------------------------------------Last Name Field---------------------------------------------------------------------------------------
    
    public function UserCreate3_1_1_LastNameFieldAndLabel(\Step\Acceptance\User $I)
    {
        $I->amOnPage(\Page\UserCreate::URL(Page\UserCreate::stateAdminType));
        $I->wait(1);
        $I->canSeeElement(\Page\UserCreate::$LastNameField);
        $I->see('Last Name', \Page\UserCreate::$LastNameLabel);
    }
    
    public function UserCreate3_1_2_LastNameFieldRequired(\Step\Acceptance\User $I)
    {
        $email     = $I->GenerateEmail();
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf("FirNam");
        $lastName  = '';
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->canSee($this->requiredErrorLastName, \Page\UserCreate::$LastNameErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\UserCreate::URL($userType));
    }
    
    public function UserCreate3_1_3_LastNameField1Symbol(\Step\Acceptance\User $I)
    {
        $email     = $I->GenerateEmail();
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf("FirNam");;
        $lastName  = 'u';
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage(null, null, $lastName);
        $I->SearchUserByEmailOnPageInList($userType, $email, null, $lastName);
    }
    
    public function UserCreate3_1_4_LastNameField128Symbol(\Step\Acceptance\User $I)
    {
        $email     = $I->GenerateEmail();
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf("FirNam");
        $lastName  = 'Php-webdriver 128symbols library is PHP language binding for Selenium WebDriver, which allows you to control web browsers from P';
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage(null, null, $lastName);
        $I->SearchUserByEmailOnPageInList($userType, $email, null, $lastName);
    }
    
    public function UserCreate3_1_5_LastNameField255Symbol(\Step\Acceptance\User $I)
    {
        $email     = $I->GenerateEmail();
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf("FirNam");
        $lastName  = 'Php-webdriver 255symbols library is PHP language binding for Selenium WebDriver, which allows you to control web browsers from PHP. This library is compatible with Selenium server version 2.x and 3.x. It implements the JsonWireProtocol, which is currently';
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage(null, null, $lastName);
        $I->SearchUserByEmailOnPageInList($userType, $email, null, $lastName);
    }
    
    public function UserCreate3_1_6_ValidationLastNameField256Symbol(\Step\Acceptance\User $I)
    {
        $lastName1     = "Php-webdriver 256 symbols library is PHP language binding for Selenium WebDriver, which allows you to control web browsers from PHP. This library is compatible with Selenium server version 2.x and 3.x. It implements the JsonWireProtocol, which is currently";
        $lastName      = "Php-webdriver 256 symbols library is PHP language binding for Selenium WebDriver, which allows you to control web browsers from PHP. This library is compatible with Selenium server version 2.x and 3.x. It implements the JsonWireProtocol, which is currentl";
        $I->amOnPage(\Page\UserCreate::URL(Page\UserCreate::stateAdminType));
        $I->wait(1);
        $I->fillField(\Page\UserCreate::$LastNameField, $lastName1);
        $I->wait(1);
        $I->seeInField(\Page\UserCreate::$LastNameField, $lastName);
    }
    
    public function UserCreate3_1_7_LastNameFieldNumberSymbols(\Step\Acceptance\User $I)
    {
        $email     = $I->GenerateEmail();
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf("FirNam");
        $lastName  = '45739';
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage(null, null, $lastName);
        $I->SearchUserByEmailOnPageInList($userType, $email, null, $lastName);
    }
    
    public function UserCreate3_1_8_LastNameFieldPunctuationSymbols(\Step\Acceptance\User $I)
    {
        $email     = $I->GenerateEmail();
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf("FirNam");
        $lastName  = "'~!@#$%^&*()_+{}:|?><,./;'[]{}|`f\-";
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage(null, null, $lastName);
        $I->SearchUserByEmailOnPageInList($userType, $email, null, $lastName);
    }
    
    public function UserCreate3_1_9_LastNameFieldPunctuationSymbols(\Step\Acceptance\User $I)
    {
        $email     = $I->GenerateEmail();
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf("FirNam");
        $lastName  = 'ttf"ff';
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage(null, null, $lastName);
        $I->SearchUserByEmailOnPageInList($userType, $email, null, $lastName);
    }
    
    //--------------------------------------------------------------------------Password Field & Confirm Password-------------------------------------------------------------------------------------
    
    public function UserCreate3_1_1_PasswordFieldAndLabel(\Step\Acceptance\User $I)
    {
        $I->amOnPage(\Page\UserCreate::URL(Page\UserCreate::stateAdminType));
        $I->wait(1);
        $I->canSeeElement(\Page\UserCreate::$PasswordField);
        $I->see('Password', \Page\UserCreate::$PasswordLabel);
    }
    
    public function UserCreate3_1_1_ConfirmPasswordFieldAndLabel(\Step\Acceptance\User $I)
    {
        $I->amOnPage(\Page\UserCreate::URL(Page\UserCreate::stateAdminType));
        $I->wait(1);
        $I->canSeeElement(\Page\UserCreate::$ConfirmPasswordField);
        $I->see('Confirm Password', \Page\UserCreate::$ConfirmPasswordLabel);
    }
    
    public function UserCreate3_1_2_PasswordFieldRequired_ConfirmPasswordValidationError(\Step\Acceptance\User $I)
    {
        $email           = $I->GenerateEmail();
        $userType        = Page\UserCreate::stateAdminType;
        $firstName       = $I->GenerateNameOf("FirNam");
        $lastName        = $I->GenerateNameOf("LastNam");
        $password        = '';
        $confirmPassword = $this->defaultPassword;
        $phone           = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->canSee($this->requiredErrorPassword, \Page\UserCreate::$PasswordErrorHelpBlock);
        $I->canSee($this->validationErrorConfirmPassword, \Page\UserCreate::$ConfirmPasswordErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\UserCreate::URL($userType));
    }
    
    public function UserCreate3_1_2_PasswordFieldRequired_ConfirmPasswordFieldRequired(\Step\Acceptance\User $I)
    {
        $email           = $I->GenerateEmail();
        $userType        = Page\UserCreate::stateAdminType;
        $firstName       = $I->GenerateNameOf("FirNam");
        $lastName        = $I->GenerateNameOf("LastNam");
        $password        = '';
        $confirmPassword = '';
        $phone           = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->canSee($this->requiredErrorPassword, \Page\UserCreate::$PasswordErrorHelpBlock);
        $I->canSee($this->requiredErrorConfirmPassword, \Page\UserCreate::$ConfirmPasswordErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\UserCreate::URL($userType));
    }
    
    public function UserCreate3_1_2_ConfirmPasswordFieldRequired(\Step\Acceptance\User $I)
    {
        $email           = $I->GenerateEmail();
        $userType        = Page\UserCreate::stateAdminType;
        $firstName       = $I->GenerateNameOf("FirNam");
        $lastName        = $I->GenerateNameOf("LastNam");
        $password        = $this->defaultPassword;
        $confirmPassword = '';
        $phone           = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->canSee($this->requiredErrorConfirmPassword, \Page\UserCreate::$ConfirmPasswordErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\UserCreate::URL($userType));
    }
    
    public function UserCreate3_1_2_PasswordField_ConfirmPassword_DifferentValuesValidation(\Step\Acceptance\User $I)
    {
        $email           = $I->GenerateEmail();
        $userType        = Page\UserCreate::stateAdminType;
        $firstName       = $I->GenerateNameOf("FirNam");
        $lastName        = $I->GenerateNameOf("LastNam");
        $password        = $this->defaultPassword;
        $confirmPassword = '1234567890';
        $phone           = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->canSee($this->validationErrorConfirmPassword, \Page\UserCreate::$ConfirmPasswordErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\UserCreate::URL($userType));
    }
    
    public function UserCreate3_1_2_PasswordField_ConfirmPassword_DifferentPartOfValueValidation(\Step\Acceptance\User $I)
    {
        $email           = $I->GenerateEmail();
        $userType        = Page\UserCreate::stateAdminType;
        $firstName       = $I->GenerateNameOf("FirNam");
        $lastName        = $I->GenerateNameOf("LastNam");
        $password        = $this->defaultPassword."1";
        $confirmPassword = $this->defaultPassword;
        $phone           = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->canSee($this->validationErrorConfirmPassword, \Page\UserCreate::$ConfirmPasswordErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\UserCreate::URL($userType));
    }
    
    public function UserCreate3_1_2_PasswordField_ConfirmPassword_CorrectValues_Numbers(\Step\Acceptance\User $I)
    {
        $this->userEmail = $email           = $I->GenerateEmail();
        $userType        = Page\UserCreate::stateAdminType;
        $firstName       = $I->GenerateNameOf("FirNam");
        $lastName        = $I->GenerateNameOf("LastNam");
        $this->password  = $password        = "1122334455";
        $confirmPassword = $password;
        $passwordUpd     = '';
        $phone           = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage(null, null, null, $passwordUpd, $passwordUpd);
    }
    
    public function UserCreate3_1_2_SuccessLoginWithCorrectPassword_CorrectValues_Numbers(\Step\Acceptance\User $I)
    {
        $I->Logout($I);
        $I->LoginAsUser($this->userEmail, $this->password, $I, 'state admin');
        $I->wait(2);
        $I->canSeeElement(\Page\Header::$LogoutButton);
        $I->Logout($I);
    }
    
    public function LoginAsAdmin(\Step\Acceptance\User $I)
    {
        $I->LoginAsAdmin($I);
        $I->wait(1);
    }
    
    public function UserCreate3_1_2_PasswordField_ConfirmPassword_CorrectValues_LatinSymbols(\Step\Acceptance\User $I)
    {
        $this->userEmail = $email           = $I->GenerateEmail();
        $userType        = Page\UserCreate::stateAdminType;
        $firstName       = $I->GenerateNameOf("FirNam");
        $lastName        = $I->GenerateNameOf("LastNam");
        $this->password  = $password        = "password";
        $confirmPassword = $password;
        $passwordUpd     = '';
        $phone           = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage(null, null, null, $passwordUpd, $passwordUpd);
    }
    
    public function UserCreate3_1_2_SuccessLoginWithCorrectPassword_CorrectValues_LatinSymbols(\Step\Acceptance\User $I)
    {
        $I->Logout($I);
        $I->LoginAsUser($this->userEmail, $this->password, $I, 'state admin');
        $I->wait(2);
        $I->canSeeElement(\Page\Header::$LogoutButton);
        $I->Logout($I);
    }
    
    public function LoginAsAdmin2(\Step\Acceptance\User $I)
    {
        $I->LoginAsAdmin($I);
        $I->wait(1);
    }
    
    public function UserCreate3_1_2_PasswordField_ConfirmPassword_CorrectValues_PunctuationSymbols(\Step\Acceptance\User $I)
    {
        $this->userEmail = $email           = $I->GenerateEmail();
        $userType        = Page\UserCreate::stateAdminType;
        $firstName       = $I->GenerateNameOf("FirNam");
        $lastName        = $I->GenerateNameOf("LastNam");
        $this->password  = $password        = "~!@$^&()yt";
        $confirmPassword = $password;
        $passwordUpd     = '';
        $phone           = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage(null, null, null, $passwordUpd, $passwordUpd);
    }
    
    public function UserCreate3_1_2_SuccessLoginWithCorrectPassword_CorrectValues_PunctuationSymbols(\Step\Acceptance\User $I)
    {
        $I->Logout($I);
        $I->LoginAsUser($this->userEmail, $this->password, $I, 'state admin');
        $I->wait(2);
        $I->canSeeElement(\Page\Header::$LogoutButton);
        $I->Logout($I);
    }
    
    public function LoginAsAdmin3(\Step\Acceptance\User $I)
    {
        $I->LoginAsAdmin($I);
        $I->wait(1);
    }
    
    public function UserCreate3_1_2_PasswordField_ConfirmPassword_CorrectValues_1Symbol(\Step\Acceptance\User $I)
    {
        $this->userEmail = $email           = $I->GenerateEmail();
        $userType        = Page\UserCreate::stateAdminType;
        $firstName       = $I->GenerateNameOf("FirNam");
        $lastName        = $I->GenerateNameOf("LastNam");
        $this->password  = $password        = "R";
        $confirmPassword = $password;
        $passwordUpd     = '';
        $phone           = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage(null, null, null, $passwordUpd, $passwordUpd);
    }
    
    public function UserCreate3_1_2_SuccessLoginWithCorrectPassword_CorrectValues_1Symbol(\Step\Acceptance\User $I)
    {
        $I->Logout($I);
        $I->LoginAsUser($this->userEmail, $this->password, $I, 'state admin');
        $I->wait(2);
        $I->canSeeElement(\Page\Header::$LogoutButton);
        $I->Logout($I);
    }
    
    public function LoginAsAdmin4(\Step\Acceptance\User $I)
    {
        $I->LoginAsAdmin($I);
        $I->wait(1);
    }
    
    public function UserCreate3_1_2_PasswordField_ConfirmPassword_CorrectValues_5Symbols(\Step\Acceptance\User $I)
    {
        $this->userEmail = $email           = $I->GenerateEmail();
        $userType        = Page\UserCreate::stateAdminType;
        $firstName       = $I->GenerateNameOf("FirNam");
        $lastName        = $I->GenerateNameOf("LastNam");
        $this->password  = $password        = "edc4%";
        $confirmPassword = $password;
        $passwordUpd     = '';
        $phone           = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage(null, null, null, $passwordUpd, $passwordUpd);
    }
    
    public function UserCreate3_1_2_SuccessLoginWithCorrectPassword_CorrectValues_5Symbols(\Step\Acceptance\User $I)
    {
        $I->Logout($I);
        $I->LoginAsUser($this->userEmail, $this->password, $I, 'state admin');
        $I->wait(3);
        $I->canSeeElement(\Page\Header::$LogoutButton);
        $I->Logout($I);
    }
    
    public function LoginAsAdmin5(\Step\Acceptance\User $I)
    {
        $I->LoginAsAdmin($I);
        $I->wait(1);
    }
    
    public function UserCreate3_1_2_PasswordField_ConfirmPassword_CorrectValues_10Symbols_Coordinator(\Step\Acceptance\User $I)
    {
        $this->userEmail = $email           = $I->GenerateEmail();
        $userType        = Page\UserCreate::coordinatorType;
        $firstName       = $I->GenerateNameOf("FirNam");
        $lastName        = $I->GenerateNameOf("LastNam");
        $this->password  = $password        = "qazwsx1234";
        $confirmPassword = $password;
        $passwordUpd     = '';
        $phone           = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage(null, null, null, $passwordUpd, $passwordUpd);
    }
    
    public function UserCreate3_1_2_SuccessLoginWithCorrectPassword_CorrectValues_10Symbols_Coordinator(\Step\Acceptance\User $I)
    {
        $I->Logout($I);
        $I->LoginAsUser($this->userEmail, $this->password, $I, 'coordinator');
        $I->wait(3);
        $I->canSeeElement(\Page\Header::$LogoutButton);
        $I->Logout($I);
    }
    
    public function LoginAsAdmin6(\Step\Acceptance\User $I)
    {
        $I->LoginAsAdmin($I);
        $I->wait(1);
    }
    
    public function UserCreate3_1_2_PasswordField_ConfirmPassword_CorrectValues_15Symbols_Auditor(\Step\Acceptance\User $I)
    {
        $this->userEmail = $email           = $I->GenerateEmail();
        $userType        = Page\UserCreate::auditorType;
        $firstName       = $I->GenerateNameOf("FirNam");
        $lastName        = $I->GenerateNameOf("LastNam");
        $this->password  = $password        = "1234qwertfsdfgh";
        $confirmPassword = $password;
        $passwordUpd     = '';
        $phone           = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage(null, null, null, $passwordUpd, $passwordUpd);
    }
    
    public function UserCreate3_1_2_SuccessLoginWithCorrectPassword_CorrectValues_15Symbols_Auditor(\Step\Acceptance\User $I)
    {
        $I->Logout($I);
        $I->LoginAsUser($this->userEmail, $this->password, $I, 'auditor');
        $I->wait(3);
        $I->canSeeElement(\Page\Header::$LogoutButton);
        $I->Logout($I);
    }
    
    public function LoginAsAdmin7(\Step\Acceptance\User $I)
    {
        $I->LoginAsAdmin($I);
        $I->wait(1);
    }
    
    public function UserCreate3_1_2_PasswordField_ConfirmPassword_CorrectValues_20Symbol_Inspector(\Step\Acceptance\User $I)
    {
        $this->userEmail = $email           = $I->GenerateEmail();
        $userType        = Page\UserCreate::stateAdminType;
        $firstName       = $I->GenerateNameOf("FirNam");
        $lastName        = $I->GenerateNameOf("LastNam");
        $this->password  = $password        = "12435qwert12345!qwer";
        $confirmPassword = $password;
        $passwordUpd     = '';
        $phone           = $I->GeneratePhoneNumber();
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage(null, null, null, $passwordUpd, $passwordUpd);
    }
    
    public function UserCreate3_1_2_SuccessLoginWithCorrectPassword_CorrectValues_20Symbol_Inspector(\Step\Acceptance\User $I)
    {
        $I->Logout($I);
        $I->LoginAsUser($this->userEmail, $this->password, $I, 'inspector');
        $I->wait(3);
        $I->canSeeElement(\Page\Header::$LogoutButton);
        $I->Logout($I);
    }
    
    public function LoginAsAdmin8(\Step\Acceptance\User $I)
    {
        $I->LoginAsAdmin($I);
        $I->wait(1);
    }
    
    //--------------------------------------------------------------------------Phone Field---------------------------------------------------------------------------------------
    
    public function UserCreate3_1_1_PhoneFieldAndLabel(\Step\Acceptance\User $I)
    {
        $I->amOnPage(\Page\UserCreate::URL(Page\UserCreate::stateAdminType));
        $I->wait(1);
        $I->canSeeElement(\Page\UserCreate::$PhoneField);
        $I->see('Phone', \Page\UserCreate::$PhoneLabel);
    }
    
    public function UserCreate3_1_2_PhoneFieldRequired(\Step\Acceptance\User $I)
    {
        $email     = $I->GenerateEmail();
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf("FirNam");
        $lastName  = $I->GenerateNameOf("LasNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = '';
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->canSee($this->requiredErrorPhone, \Page\UserCreate::$PhoneErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\UserCreate::URL($userType));
    }
    
    public function UserCreate3_1_2_PhoneFieldValidation_1Symbol(\Step\Acceptance\User $I)
    {
        $email     = $I->GenerateEmail();
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf("FirNam");
        $lastName  = $I->GenerateNameOf("LasNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = '2';
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->canSeeInField(Page\UserCreate::$PhoneField, "(2__) ___-____");
        $I->canSee($this->validationErrorPhone, \Page\UserCreate::$PhoneErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\UserCreate::URL($userType));
    }
    
    public function UserCreate3_1_2_PhoneFieldValidation_5Symbols(\Step\Acceptance\User $I)
    {
        $email     = $I->GenerateEmail();
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf("FirNam");
        $lastName  = $I->GenerateNameOf("LasNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = '23243';
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->canSeeInField(Page\UserCreate::$PhoneField, "(232) 43_-____");
        $I->canSee($this->validationErrorPhone, \Page\UserCreate::$PhoneErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\UserCreate::URL($userType));
    }
    
    public function UserCreate3_1_2_PhoneFieldValidation_9Symbols(\Step\Acceptance\User $I)
    {
        $email     = $I->GenerateEmail();
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf("FirNam");
        $lastName  = $I->GenerateNameOf("LasNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = '232432223';
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->canSeeInField(Page\UserCreate::$PhoneField, "(232) 432-223_");
        $I->canSee($this->validationErrorPhone, \Page\UserCreate::$PhoneErrorHelpBlock);
        $I->seeInCurrentUrl(\Page\UserCreate::URL($userType));
    }
    
    public function UserCreate3_1_2_PhoneFieldValidation_10Symbols(\Step\Acceptance\User $I)
    {
        $email     = $I->GenerateEmail();
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf("FirNam");
        $lastName  = $I->GenerateNameOf("LasNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = '2324322239';
        $phoneUpd  = '(232) 432-2239';
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage(null, null, null, null, null, $phoneUpd);
    }
    
    public function UserCreate3_1_2_PhoneFieldValidation_PunctuationAndLatinSymbols(\Step\Acceptance\User $I)
    {
        $phone1     = "'~!@#$%^&&*())_+{}|:<>?,./;'[]\=-`123rwgTgr";
        $phone      = "(123) ___-____";
        
        $I->amOnPage(Page\UserCreate::URL(Page\UserCreate::stateAdminType));
        $I->wait(1);
        $I->fillField(Page\UserCreate::$PhoneField, $phone1);
        $I->wait(1);
        $I->seeInField(Page\UserCreate::$PhoneField, $phone);
    }
    
    //--------------------------------------------------------------------------Type Disabled Select---------------------------------------------------------------------------------------
    
    public function UserCreate3_1_1_TypeFieldAndLabel(\Step\Acceptance\User $I)
    {
        $I->amOnPage(\Page\UserCreate::URL(Page\UserCreate::stateAdminType));
        $I->wait(1);
        $I->canSeeElement(\Page\UserCreate::$TypeDisabledSelect);
        $I->see('Type', \Page\UserCreate::$TypeSelectLabel);
    }
    
    public function UserCreate3_1_1_TypeField_StateAdminOption(\Step\Acceptance\User $I)
    {
        $this->userEmail = $email     = $I->GenerateEmail();
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf("FirNam");
        $lastName  = $I->GenerateNameOf("LasNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        $type      = 'state admin';
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone, $type);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage(null, null, null, null, null, null, $type);
        $I->SearchUserByEmailOnPageInList($userType, $email, null, null, null, $type);
    }
    
    public function UserCreate3_1_2_SuccessLoginWithCorrectPassword_CorrectValues_StateAdminOption(\Step\Acceptance\User $I)
    {
        $I->reloadPage();
        $I->Logout($I);
        $I->LoginAsUser($this->userEmail, $this->defaultPassword, $I, 'state admin');
        $I->wait(3);
        $I->canSeeElement(\Page\Header::$LogoutButton);
        $I->Logout($I);
    }
    
    public function LoginAsAdmin9(\Step\Acceptance\User $I)
    {
        $I->LoginAsAdmin($I);
        $I->wait(1);
    }
    
    public function UserCreate3_1_1_TypeField_CoordinatorOption(\Step\Acceptance\User $I)
    {
        $this->userEmail = $email     = $I->GenerateEmail();
        $userType  = Page\UserCreate::coordinatorType;
        $firstName = $I->GenerateNameOf("FirNam");
        $lastName  = $I->GenerateNameOf("LasNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        $type      = 'coordinator';
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone, $type);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage(null, null, null, null, null, null, $type);
        $I->SearchUserByEmailOnPageInList($userType, $email, null, null, null, $type);
    }
    
    public function UserCreate3_1_2_SuccessLoginWithCorrectPassword_CorrectValues_CoordinatorOption(\Step\Acceptance\User $I)
    {
        $I->reloadPage();
        $I->Logout($I);
        $I->LoginAsUser($this->userEmail, $this->defaultPassword, $I, 'coordinator');
        $I->wait(3);
        $I->canSeeElement(\Page\Header::$LogoutButton);
        $I->Logout($I);
    }
    
    public function LoginAsAdmin10(\Step\Acceptance\User $I)
    {
        $I->LoginAsAdmin($I);
        $I->wait(1);
    }
    
    public function UserCreate3_1_1_TypeField_AuditorOption(\Step\Acceptance\User $I)
    {
        $this->userEmail = $email     = $I->GenerateEmail();
        $userType  = Page\UserCreate::auditorType;
        $firstName = $I->GenerateNameOf("FirNam");
        $lastName  = $I->GenerateNameOf("LasNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        $type      = 'auditor';
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone, $type);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage(null, null, null, null, null, null, $type);
        $I->SearchUserByEmailOnPageInList($userType, $email, null, null, null, $type);
    }
    
    public function UserCreate3_1_2_SuccessLoginWithCorrectPassword_CorrectValues_AuditorOption(\Step\Acceptance\User $I)
    {
        $I->reloadPage();
        $I->Logout($I);
        $I->LoginAsUser($this->userEmail, $this->defaultPassword, $I, 'auditor');
        $I->wait(3);
        $I->canSeeElement(\Page\Header::$LogoutButton);
        $I->Logout($I);
    }
    
    public function LoginAsAdmin11(\Step\Acceptance\User $I)
    {
        $I->LoginAsAdmin($I);
        $I->wait(1);
    }
    
    public function UserCreate3_1_1_TypeField_InspectorOption(\Step\Acceptance\User $I)
    {
        $this->userEmail = $email     = $I->GenerateEmail();
        $userType  = Page\UserCreate::inspectorType;
        $firstName = $I->GenerateNameOf("FirNam");
        $lastName  = $I->GenerateNameOf("LasNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        $type      = 'inspector';
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone, $type);
        $I->wait(1);
        $I->reloadPage();
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage(null, null, null, null, null, null, $type);
        $I->SearchUserByEmailOnPageInList($userType, $email, null, null, null, $type);
    }
    
    public function UserCreate3_1_2_SuccessLoginWithCorrectPassword_CorrectValues_InspectorOption(\Step\Acceptance\User $I)
    {
        $I->reloadPage();
        $I->Logout($I);
        $I->LoginAsUser($this->userEmail, $this->defaultPassword, $I, 'inspector');
        $I->wait(3);
        $I->canSeeElement(\Page\Header::$LogoutButton);
        $I->Logout($I);
    }
    
    public function LoginAsAdmin12(\Step\Acceptance\User $I)
    {
        $I->LoginAsAdmin($I);
        $I->wait(1);
    }
    
    //--------------------------------------------------------------------------Create Button---------------------------------------------------------------------------------

    public function UserCreate5_1_1_CreateButtonPresent(\Step\Acceptance\User $I)
    {
        $I->amOnPage(\Page\UserCreate::URL(Page\UserCreate::stateAdminType));
        $I->wait(1);
        $I->canSeeElement(\Page\UserCreate::$CreateButton);
        $I->see("Create", \Page\UserCreate::$CreateButton);
    }
    
    public function UserCreate5_1_2_CreateButtonFunction_StateAdmin(\Step\Acceptance\User $I)
    {
        $email     = $I->GenerateEmail();
        $userType  = Page\UserCreate::stateAdminType;
        $firstName = $I->GenerateNameOf("FirNam");
        $lastName  = $I->GenerateNameOf("LasNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        $type      = 'state admin';
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone, $type);
        $I->wait(3);
        $I->canSee("State admin was successfully created!", ".sweet-alert.visible h2");
        $I->click('.confirm');
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage($email, $firstName, $lastName, null, null, $phone, $type);
    }
    
    public function UserCreate5_1_4_CreateButtonFunction_Coordinator(\Step\Acceptance\User $I)
    {
        $email     = $I->GenerateEmail();
        $userType  = Page\UserCreate::coordinatorType;
        $firstName = $I->GenerateNameOf("FirNam");
        $lastName  = $I->GenerateNameOf("LasNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        $type      = 'coordinator';
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone, $type);
        $I->wait(3);
        $I->canSee("Coordinator was successfully created!", ".sweet-alert.visible h2");
        $I->click('.confirm');
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage($email, $firstName, $lastName, null, null, $phone, $type);
    }
    
    public function UserCreate5_1_4_CreateButtonFunction_Auditor(\Step\Acceptance\User $I)
    {
        $email     = $I->GenerateEmail();
        $userType  = Page\UserCreate::auditorType;
        $firstName = $I->GenerateNameOf("FirNam");
        $lastName  = $I->GenerateNameOf("LasNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        $type      = 'auditor';
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone, $type);
        $I->wait(3);
        $I->canSee("Auditor was successfully created!", ".sweet-alert.visible h2");
        $I->click('.confirm');
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage($email, $firstName, $lastName, null, null, $phone, $type);
    }
    
    public function UserCreate5_1_4_CreateButtonFunction_Inspector(\Step\Acceptance\User $I)
    {
        $email     = $I->GenerateEmail();
        $userType  = Page\UserCreate::inspectorType;
        $firstName = $I->GenerateNameOf("FirNam");
        $lastName  = $I->GenerateNameOf("LasNam");
        $password  = $confirmPassword = $this->defaultPassword;
        $phone     = $I->GeneratePhoneNumber();
        $type      = 'inspector';
        
        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone, $type);
        $I->wait(3);
        $I->canSee("Inspector was successfully created!", ".sweet-alert.visible h2");
        $I->click('.confirm');
        $I->wait(1);
        $I->CheckInFieldsOnUserUpdatePage($email, $firstName, $lastName, null, null, $phone, $type);
    }
}
