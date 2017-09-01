<?php
namespace Step\Acceptance;

class ComplianceCheckType extends \AcceptanceTester
{
    public function CreateComplianceCheckType($name = null)
    {
        $I = $this;
        $I->amOnPage(\Page\ComplianceCheckTypeCreate::URL());
        $I->wait(1);
        $I->waitForElement(\Page\ComplianceCheckTypeCreate::$NameField);
        if (isset($name)){
            $I->fillField(\Page\ComplianceCheckTypeCreate::$NameField, $name);
        }
        $I->click(\Page\ComplianceCheckTypeCreate::$CreateButton);
        $I->wait(2);
    }
    
    public function UpdateComplianceCheckType($row, $name = null)
    {
        $I = $this;
        $I->amOnPage(\Page\ComplianceCheckTypeList::URL());
        $I->wait(1);
        $I->click(\Page\ComplianceCheckTypeList::UpdateButtonLine($row));
        $I->wait(1);
        $I->waitForElement(\Page\ComplianceCheckTypeUpdate::$NameField);
        if (isset($name)){
            $I->fillField(\Page\ComplianceCheckTypeUpdate::$NameField, $name);
        }
        $I->click(\Page\ComplianceCheckTypeUpdate::$UpdateButton);
        $I->wait(2);
    }
    
    public function CheckInFieldsOnComplianceCheckTypeUpdatePage($name = null)
    {
        $I = $this;
        $I->wait(1);
        $I->waitForElement(\Page\ComplianceCheckTypeUpdate::$UpdateButton);
        if (isset($name)){
            $I->canSeeInField(\Page\ComplianceCheckTypeUpdate::$NameField, $name);
        }
    }
    
    public function GetComplianceCheckTypeOnPageInList($name)
    {
        $I = $this;
        $I->amOnPage(\Page\ComplianceCheckTypeList::URL());
        $I->wait(1);
        $count = $I->grabTextFrom(\Page\ComplianceCheckTypeList::$SummaryCount);
        $pageCount = ceil($count/20);
        $I->comment("Page count = $pageCount");
        for($i=1; $i<=$pageCount; $i++){
            $I->amOnPage(\Page\ComplianceCheckTypeList::UrlPageNumber($i));
            $I->wait(1);
            $rows = $I->getAmount($I, \Page\ComplianceCheckTypeList::$ComplianceCheckTypeRow);
            $I->comment("Count of rows = $rows");
            for($j=1; $j<=$rows; $j++){
                if($I->grabTextFrom(\Page\ComplianceCheckTypeList::NameLine($j)) == $name){
                    $I->comment("I find compliance check type: $name at row: $j on page: $i");
                    break 2;
                }
            }
        }
        $comp['id']   = $I->grabTextFrom(\Page\ComplianceCheckTypeList::IdLine($j));
        $comp['page'] = $i;
        $comp['row']  = $j;
        return $comp;
    }
    
    public function CheckValuesOnComplianceCheckTypeListPage($row, $name = null, $status = null, $createdDate = null, $updatedDate = null)
    {
        $I = $this;
        $I->amOnPage(\Page\ComplianceCheckTypeList::URL());
        $I->wait(1);
        $I->waitForElement(\Page\ComplianceCheckTypeList::$CreateComplianceCheckTypeButton);
        if (isset($name)){
            $I->canSee($name, \Page\ComplianceCheckTypeList::NameLine($row));
        }
        if (isset($createdDate)){
            $I->canSee($createdDate, \Page\ComplianceCheckTypeList::CreatedLine($row));
        }
        if (isset($updatedDate)){
            $I->canSee($updatedDate, \Page\ComplianceCheckTypeList::UpdatedLine($row));
        }
        if (isset($status)){
            $I->canSee($status, \Page\ComplianceCheckTypeList::StatusLine($row));
        }
    }
}