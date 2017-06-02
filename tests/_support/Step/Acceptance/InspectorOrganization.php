<?php
namespace Step\Acceptance;

class InspectorOrganization extends \AcceptanceTester
{
    public function CreateInspectorOrganization($name = null, $state = null, $status = null)
    {
        $I = $this;
        $I->amOnPage(\Page\InspectorOrganizationCreate::$URL);
        $I->wait(1);
        $I->waitForElement(\Page\InspectorOrganizationCreate::$NameField);
        if (isset($name)){
            $I->fillField(\Page\InspectorOrganizationCreate::$NameField, $name);
        }
        if (isset($state)){
            $I->selectOption(\Page\InspectorOrganizationCreate::$StateSelect, $state);
        }
        if (isset($status)){
            $I->selectOption(\Page\InspectorOrganizationCreate::$StatusSelect, $status);
        }
        $I->click(\Page\InspectorOrganizationCreate::$CreateButton);
        $I->wait(2);
    }  

    public function UpdateInspectorOrganization($row, $name = null, $status = null)
    {
        $I = $this;
        $I->amOnPage(\Page\InspectorOrganizationList::$URL);
        $I->wait(1);
        $I->click(\Page\InspectorOrganizationList::UpdateButtonLine($row));
        $I->wait(1);
        $I->waitForElement(\Page\InspectorOrganizationUpdate::$NameField);
        if (isset($name)){
            $I->fillField(\Page\InspectorOrganizationUpdate::$NameField, $name);
        }
        if (isset($status)){
            $I->selectOption(\Page\InspectorOrganizationUpdate::$StatusSelect, $status);
        }
        $I->click(\Page\InspectorOrganizationUpdate::$UpdateButton);
        $I->wait(2);
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
        $I->amOnPage(\Page\InspectorOrganizationList::$URL);
        $I->wait(1);
        $count = $I->getAmount($I, \Page\InspectorOrganizationList::$InspectorOrganizationRow);
        for($i=1; $i<=$count; $i++){
            if($I->grabTextFrom(\Page\InspectorOrganizationList::NameLine($i)) == $name){
                break;
            }
        }
        $I->comment("Compliance Check Type $name is on $i row");
        return $i;
    }
    
    public function CheckValuesOnInspectorOrganizationListPage($row, $name = null, $state=null, $status = null, $createdDate = null, $updatedDate = null)
    {
        $I = $this;
        $I->amOnPage(\Page\InspectorOrganizationList::$URL);
        $I->wait(1);
        $I->waitForElement(\Page\InspectorOrganizationList::$CreateInspectorOrganizationButton);
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