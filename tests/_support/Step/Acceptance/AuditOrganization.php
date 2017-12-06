<?php
namespace Step\Acceptance;

class AuditOrganization extends \AcceptanceTester
{
    public function CreateAuditOrganization($name = null, $state = null, $contact = null, $title = null, $email = null, $phone = null, $fax = null, $mobile = null, 
                                                $address = null, $city = null, $zip = null)
    {
        $I = $this;
        $I->amOnPage(\Page\AuditOrganizationCreate::URL());
        $I->wait(1);
        $I->waitForElement(\Page\AuditOrganizationCreate::$NameField);
        if (isset($name)){
            $I->fillField(\Page\AuditOrganizationCreate::$NameField, $name);
        }
        if (isset($state)){
            $I->selectOption(\Page\AuditOrganizationCreate::$StateSelect, $state);
        }
        if (isset($contact)){
            $I->fillField(\Page\AuditOrganizationCreate::$ContactField, $contact);
        }
        if (isset($title)){
            $I->fillField(\Page\AuditOrganizationCreate::$TitleField, $title);
        }
        if (isset($email)){
            $I->fillField(\Page\AuditOrganizationCreate::$EmailField, $email);
        }
        if (isset($phone)){
            $I->fillField(\Page\AuditOrganizationCreate::$PhoneField, $phone);
        }
        if (isset($fax)){
            $I->fillField(\Page\AuditOrganizationCreate::$FaxField, $fax);
        }
        if (isset($mobile)){
            $I->fillField(\Page\AuditOrganizationCreate::$MobileField, $mobile);
        }
        if (isset($address)){
            $I->fillField(\Page\AuditOrganizationCreate::$AddressField, $address);
        }
        if (isset($city)){
            $I->fillField(\Page\AuditOrganizationCreate::$CityField, $city);
        }
        if (isset($zip)){
            $I->fillField(\Page\AuditOrganizationCreate::$ZipCodeField, $zip);
        }
        $I->scrollTo(\Page\AuditOrganizationCreate::$CreateButton);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationCreate::$CreateButton);
        $I->wait(5);
    }
    
    public function UpdateAuditOrganization($row, $name = null, $status = null)
    {
        $I = $this;
        $I->amOnPage(\Page\AuditOrganizationList::$URL);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationList::UpdateButtonLine($row));
        $I->wait(1);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$NameField);
        if (isset($name)){
            $I->fillField(\Page\AuditOrganizationUpdate::$NameField, $name);
        }
        if (isset($status)){
            $I->selectOption(\Page\AuditOrganizationUpdate::$StatusSelect, $status);
        }
        $I->scrollTo(\Page\AuditOrganizationUpdate::$UpdateButton);
        $I->wait(1);
        $I->click(\Page\AuditOrganizationUpdate::$UpdateButton);
        $I->wait(2);
    }
    
    public function CheckInFieldsOnAuditOrganizationUpdatePage($name = null, $state=null, $status = null)
    {
        $I = $this;
        $I->wait(1);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$UpdateButton);
        if (isset($name)){
            $I->canSeeInField(\Page\AuditOrganizationUpdate::$NameField, $name);
        }
        if (isset($state)){
            $I->canSeeOptionIsSelected(\Page\AuditOrganizationUpdate::$StateSelect, $state);
        }
        if (isset($status)){
            $I->canSeeOptionIsSelected(\Page\AuditOrganizationUpdate::$StatusSelect, $status);
        }
    }
    
    public function GetAuditOrganizationRowNumber($name)
    {
        $I = $this;
        $I->amOnPage(\Page\AuditOrganizationList::$URL);
        $I->wait(1);
        $count = $I->getAmount($I, \Page\AuditOrganizationList::$AuditOrganizationRow);
        for($i=1; $i<=$count; $i++){
            if($I->grabTextFrom(\Page\AuditOrganizationList::NameLine($i)) == $name){
                break;
            }
        }
        $I->comment("Compliance Check Type $name is on $i row");
        return $i;
    }
    
    public function CheckValuesOnAuditOrganizationListPage($row, $name = null, $state=null, $status = null, $createdDate = null, $updatedDate = null)
    {
        $I = $this;
        $I->amOnPage(\Page\AuditOrganizationList::$URL);
        $I->wait(1);
        $I->waitForElement(\Page\AuditOrganizationList::$CreateAuditOrganizationButton);
        if (isset($name)){
            $I->canSee($name, \Page\AuditOrganizationList::NameLine($row));
        }
        if (isset($state)){
            $I->canSee($state, \Page\AuditOrganizationList::StateLine($row));
        }
        if (isset($createdDate)){
            $I->canSee($createdDate, \Page\AuditOrganizationList::CreatedLine($row));
        }
        if (isset($updatedDate)){
            $I->canSee($updatedDate, \Page\AuditOrganizationList::UpdatedLine($row));
        }
        if (isset($status)){
            $I->canSee($status, \Page\AuditOrganizationList::StatusLine($row));
        }
    }
}