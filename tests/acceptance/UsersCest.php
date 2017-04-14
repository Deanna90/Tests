<?php

class UsersCest
{
    public function BusinessRegister(Step\Acceptance\Business $I)
    {
        $firstName        = $I->GenerateNameOf("firnam");
        $lastName         = $I->GenerateNameOf("lasnam");;
        $phoneNumber      = '(235) 456-3466';
        $email            = "dffd@dff.df";
        $password         = $confirmPassword = 'Qq!1111111';
        $busName          = $I->GenerateNameOf("busnam");;
        $busPhone         = '(777) 456-3456';
        $address          = $I->GenerateNameOf("addr");;
        $zip              = '55555';
        $city             = 'city test';
        $website          = 'fgfh.fh';
        $busType          = '1';
//        $busType          = 'Office / Retail';
        $employees        = '455';
        $busFootage       = '4566';
        $landscapeFootage = '12345';
        $I->RegisterBusiness($firstName, $lastName, $phoneNumber, $email, $password, $confirmPassword, $busName, $busPhone, $address, $zip, $city, $website, $busType, 
                $employees, $busFootage, $landscapeFootage);
        $I->wait(10);
    }
    
//    public function tryToTest(AcceptanceTester $I)
//    {
//        $I->Login($I);
//    }
//    
//    public function CreateCoordinatorUser(Step\Acceptance\User $I)
//    {
//        $userType  = Page\UserCreate::coordinatorType;
//        $email     = 'qrrwdd@sdfs.df';
//        $firstName = $I->GenerateNameOf('firnam');
//        $lastName  = $I->GenerateNameOf('lastnam');
//        $password  = $confirmPassword = 'Qq!1111111';
//        $phone     = '(675) 455-4333';
//        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
//    }
//    
//    public function CreateStateAdminUser(Step\Acceptance\User $I)
//    {
//        $userType  = Page\UserCreate::stateAdminType;
//        $email     = 'qwderd@sdfs.df';
//        $firstName = $I->GenerateNameOf('firnam');
//        $lastName  = $I->GenerateNameOf('lastnam');
//        $password  = $confirmPassword = 'Qq!1111111';
//        $phone     = '(675) 455-4333';
//        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
//    }
//    
//    public function CreateInspectorUser(Step\Acceptance\User $I)
//    {
//        $userType  = Page\UserCreate::inspectorType;
//        $email     = 'qwdd@wetsdfs.df';
//        $firstName = $I->GenerateNameOf('firnam');
//        $lastName  = $I->GenerateNameOf('lastnam');
//        $password  = $confirmPassword = 'Qq!1111111';
//        $phone     = '(675) 455-4333';
//        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
//    }
//    
//    public function CreateAuditorUser(Step\Acceptance\User $I)
//    {
//        $userType  = Page\UserCreate::auditorType;
//        $email     = 'qewwdd@sdfs.df';
//        $firstName = $I->GenerateNameOf('firnam');
//        $lastName  = $I->GenerateNameOf('lastnam');
//        $password  = $confirmPassword = 'Qq!1111111';
//        $phone     = '(675) 455-4333';
//        $I->CreateUser($userType, $email, $firstName, $lastName, $password, $confirmPassword, $phone);
//    }
}
