<?php
namespace Step\Acceptance;

class ComplianceCheckType extends \AcceptanceTester
{
    public function CreateComplianceCheckType($name = null, $status = null)
    {
        $I = $this;
        $I->amOnPage(\Page\ComplianceCheckTypeCreate::$URL);
        $I->wait(1);
        $I->waitForElement(\Page\ComplianceCheckTypeCreate::$NameField);
        if (isset($name)){
            $I->fillField(\Page\ComplianceCheckTypeCreate::$NameField, $name);
        }
        if (isset($status)){
            $I->selectOption(\Page\ComplianceCheckTypeCreate::$StatusSelect, $status);
        }
        $I->click(\Page\ComplianceCheckTypeCreate::$CreateButton);
        $I->wait(2);
    }
    
    public function UpdateComplianceCheckType($row, $name = null, $status = null)
    {
        $I = $this;
        $I->amOnPage(\Page\ComplianceCheckTypeList::$URL);
        $I->wait(1);
        $I->click(\Page\ComplianceCheckTypeList::UpdateButtonLine($row));
        $I->wait(1);
        $I->waitForElement(\Page\ComplianceCheckTypeUpdate::$NameField);
        if (isset($name)){
            $I->fillField(\Page\ComplianceCheckTypeUpdate::$NameField, $name);
        }
        if (isset($status)){
            $I->selectOption(\Page\ComplianceCheckTypeUpdate::$StatusSelect, $status);
        }
        $I->click(\Page\ComplianceCheckTypeUpdate::$UpdateButton);
        $I->wait(2);
    }
    
    public function CheckInFieldsOnComplianceCheckTypeUpdatePage($name = null, $status = null)
    {
        $I = $this;
        $I->wait(1);
        $I->waitForElement(\Page\ComplianceCheckTypeUpdate::$UpdateButton);
        if (isset($name)){
            $I->seeInField(\Page\ComplianceCheckTypeUpdate::$NameField, $name);
        }
        if (isset($status)){
            $I->seeOptionIsSelected(\Page\ComplianceCheckTypeUpdate::$StatusSelect, $status);
        }
    }
    
    public function GetComplianceCheckTypeRowNumber($name)
    {
        $I = $this;
        $I->amOnPage(\Page\ComplianceCheckTypeList::$URL);
        $I->wait(1);
        $count = $I->getAmount($I, \Page\ComplianceCheckTypeList::$ComplianceCheckTypeRow);
        for($i=1; $i<=$count; $i++){
            if($I->grabTextFrom(\Page\ComplianceCheckTypeList::NameLine($i)) == $name){
                break;
            }
        }
        $I->comment("Compliance Check Type $name is on $i row");
        return $i;
    }
    
    public function CheckValuesOnComplianceCheckTypeListPage($row, $name = null, $status = null, $createdDate = null, $updatedDate = null)
    {
        $I = $this;
        $I->amOnPage(\Page\ComplianceCheckTypeList::$URL);
        $I->wait(1);
        $I->waitForElement(\Page\ComplianceCheckTypeList::$CreateComplianceCheckTypeButton);
        if (isset($name)){
            $I->see($name, \Page\ComplianceCheckTypeList::NameLine($row));
        }
        if (isset($createdDate)){
            $I->see($createdDate, \Page\ComplianceCheckTypeList::CreatedLine($row));
        }
        if (isset($updatedDate)){
            $I->see($updatedDate, \Page\ComplianceCheckTypeList::UpdatedLine($row));
        }
        if (isset($status)){
            $I->see($status, \Page\ComplianceCheckTypeList::StatusLine($row));
        }
    }
}