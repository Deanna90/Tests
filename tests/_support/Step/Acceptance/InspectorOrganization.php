<?php
namespace Step\Acceptance;

class InspectorOrganization extends \AcceptanceTester
{
    public function CreateInspectorOrganization($name = null, $state = null, $contact = null, $title = null, $email = null, $phone = null, $fax = null, $mobile = null, 
                                                $address = null, $city = null, $zip = null)
    {
        $I = $this;
        $I->amOnPage(\Page\InspectorOrganizationCreate::URL());
        if (isset($name)){
            $I->fillField(\Page\InspectorOrganizationCreate::$NameField, $name);
        }
        if (isset($state)){
            $I->selectOption(\Page\InspectorOrganizationCreate::$StateSelect, $state);
        }
        if (isset($contact)){
            $I->fillField(\Page\InspectorOrganizationCreate::$ContactField, $contact);
        }
        if (isset($title)){
            $I->fillField(\Page\InspectorOrganizationCreate::$TitleField, $title);
        }
        if (isset($email)){
            $I->fillField(\Page\InspectorOrganizationCreate::$EmailField, $email);
        }
        if (isset($phone)){
            $I->fillField(\Page\InspectorOrganizationCreate::$PhoneField, $phone);
        }
        if (isset($fax)){
            $I->fillField(\Page\InspectorOrganizationCreate::$FaxField, $fax);
        }
        if (isset($mobile)){
            $I->fillField(\Page\InspectorOrganizationCreate::$MobileField, $mobile);
        }
        if (isset($address)){
            $I->fillField(\Page\InspectorOrganizationCreate::$AddressField, $address);
        }
        if (isset($city)){
            $I->fillField(\Page\InspectorOrganizationCreate::$CityField, $city);
        }
        if (isset($zip)){
            $I->fillField(\Page\InspectorOrganizationCreate::$ZipCodeField, $zip);
        }
        $I->scrollTo(\Page\InspectorOrganizationCreate::$CreateButton);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationCreate::$CreateButton);
        $I->wait(1);
        $I->waitPageLoad();
    }  

    public function UpdateInspectorOrganization($row, $name = null, $status = null)
    {
        $I = $this;
        $I->amOnPage(\Page\InspectorOrganizationList::URL());
//        $I->wait(3);
        $I->click(\Page\InspectorOrganizationList::UpdateButtonLine($row));
        $I->wait(3);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$NameField);
        if (isset($name)){
            $I->fillField(\Page\InspectorOrganizationUpdate::$NameField, $name);
        }
        if (isset($status)){
            $I->selectOption(\Page\InspectorOrganizationUpdate::$StatusSelect, $status);
        }
        $I->click(\Page\InspectorOrganizationUpdate::$UpdateButton);
        $I->waitPageLoad();
    }
    
    public function CheckInFieldsOnInspectorOrganizationUpdatePage($name = null, $state=null, $status = null)
    {
        $I = $this;
        $I->wait(1);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$UpdateButton);
        if (isset($name)){
            $I->canSeeInField(\Page\InspectorOrganizationUpdate::$NameField, $name);
        }
        if (isset($state)){
            $I->canSeeOptionIsSelected(\Page\InspectorOrganizationUpdate::$StateSelect, $state);
        }
        if (isset($status)){
            $I->canSeeOptionIsSelected(\Page\InspectorOrganizationUpdate::$StatusSelect, $status);
        }
    }
    
    public function GetInspectorOrganizationRowNumber($name)
    {
        $I = $this;
        $I->amOnPage(\Page\InspectorOrganizationList::URL());
//        $I->wait(1);
        $count = $I->getAmount($I, \Page\InspectorOrganizationList::$InspectorOrganizationRow);
        for($i=1; $i<=$count; $i++){
            if($I->grabTextFrom(\Page\InspectorOrganizationList::NameLine($i)) == $name){
                break;
            }
        }
        $I->comment("Inspector Organization: $name is on $i row");
        return $i;
    }
    
    public function GetOrganizationIDFromUrl($I)
    {
        $I = $this;
        $urlUpdatePage = $I->grabFromCurrentUrl();
        $I->comment("Url: $urlUpdatePage");
        $u = explode('=', $urlUpdatePage);
        $orgID = $u[1];
        $I->comment("Organization ID: $orgID.");
        return $orgID;
    }
    
    public function CheckValuesOnInspectorOrganizationListPage($row, $name = null, $state=null, $status = null, $createdDate = null, $updatedDate = null)
    {
        $I = $this;
        $I->amOnPage(\Page\InspectorOrganizationList::URL());
        if (isset($name)){
            $I->canSee($name, \Page\InspectorOrganizationList::NameLine($row));
        }
        if (isset($state)){
            $I->canSee($state, \Page\InspectorOrganizationList::StateLine($row));
        }
        if (isset($createdDate)){
            $I->canSee($createdDate, \Page\InspectorOrganizationList::CreatedLine($row));
        }
        if (isset($updatedDate)){
            $I->canSee($updatedDate, \Page\InspectorOrganizationList::UpdatedLine($row));
        }
        if (isset($status)){
            $I->canSee($status, \Page\InspectorOrganizationList::StatusLine($row));
        }
    }
}