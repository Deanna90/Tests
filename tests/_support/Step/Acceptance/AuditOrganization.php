<?php
namespace Step\Acceptance;

class AuditOrganization extends \AcceptanceTester
{
    public function CreateAuditOrganization($name = null, $state = null, $status = null)
    {
        $I = $this;
        $I->amOnPage(\Page\AuditOrganizationCreate::$URL);
        $I->wait(1);
        $I->waitForElement(\Page\AuditOrganizationCreate::$NameField);
        if (isset($name)){
            $I->fillField(\Page\AuditOrganizationCreate::$NameField, $name);
        }
        if (isset($state)){
            $I->selectOption(\Page\AuditOrganizationCreate::$StateSelect, $state);
        }
        if (isset($status)){
            $I->selectOption(\Page\AuditOrganizationCreate::$StatusSelect, $status);
        }
        $I->click(\Page\AuditOrganizationCreate::$CreateButton);
        $I->wait(2);
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
        $I->click(\Page\AuditOrganizationUpdate::$UpdateButton);
        $I->wait(2);
    }
    
    public function CheckInFieldsOnAuditOrganizationUpdatePage($name = null, $state=null, $status = null)
    {
        $I = $this;
        $I->wait(1);
        $I->waitForElement(\Page\AuditOrganizationUpdate::$UpdateButton);
        if (isset($name)){
            $I->seeInField(\Page\AuditOrganizationUpdate::$NameField, $name);
        }
        if (isset($state)){
            $I->seeOptionIsSelected(\Page\AuditOrganizationUpdate::$StateSelect, $state);
        }
        if (isset($status)){
            $I->seeOptionIsSelected(\Page\AuditOrganizationUpdate::$StatusSelect, $status);
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
            $I->see($name, \Page\AuditOrganizationList::NameLine($row));
        }
        if (isset($state)){
            $I->see($state, \Page\AuditOrganizationList::StateLine($row));
        }
        if (isset($createdDate)){
            $I->see($createdDate, \Page\AuditOrganizationList::CreatedLine($row));
        }
        if (isset($updatedDate)){
            $I->see($updatedDate, \Page\AuditOrganizationList::UpdatedLine($row));
        }
        if (isset($status)){
            $I->see($status, \Page\AuditOrganizationList::StatusLine($row));
        }
    }
}