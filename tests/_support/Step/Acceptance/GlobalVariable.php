<?php
namespace Step\Acceptance;

class GlobalVariable extends \AcceptanceTester
{
    public function CreateGlobalVariable($title = null, $name = null, $value = null, $description = null, $units = 'USD')
    {
        $I = $this;
        $I->amOnPage(\Page\GlobalVariableCreate::URL());
//        $I->wait(1);
        $I->waitForElement(\Page\GlobalVariableCreate::$TitleField);
        if (isset($title)){
            $I->fillField(\Page\GlobalVariableCreate::$TitleField, $title);
        }
        if (isset($name)){
            $I->fillField(\Page\GlobalVariableCreate::$NameField, $name);
        }
        if (isset($value)){
            $I->fillField(\Page\GlobalVariableCreate::$ValueField, $value);
        }
        if (isset($units)){
            $I->selectOption(\Page\GlobalVariableCreate::$UnitsSelect, $units);
        }
        if (isset($description)){
            $I->fillField(\Page\GlobalVariableCreate::$DescriptionField, $description);
        }
        $I->click(\Page\GlobalVariableCreate::$CreateButton);
        $I->wait(1);
        $I->waitPageLoad('60');
//        $I->wait(3);
    }  
    
    public function UpdateGlobalVariable($id, $title = null, $name = null, $value = null, $description = null, $units = null)
    {
        $I = $this;
        $I->wait(1);
        $I->amOnPage(\Page\GlobalVariableUpdate::URL($id));
//        $I->wait(1);
        $I->waitForElement(\Page\GlobalVariableUpdate::$UpdateButton);
        if (isset($title)){
            $I->fillField(\Page\GlobalVariableUpdate::$TitleField, $title);
        }
        if (isset($name)){
            $I->fillField(\Page\GlobalVariableUpdate::$NameField, $name);
        }
        if (isset($value)){
            $I->fillField(\Page\GlobalVariableUpdate::$ValueField, $value);
        }
        if (isset($units)){
            $I->selectOption(\Page\GlobalVariableUpdate::$UnitsSelect, $units);
        }
        if (isset($description)){
            $I->fillField(\Page\GlobalVariableUpdate::$DescriptionField, $description);
        }
        $I->click(\Page\GlobalVariableUpdate::$UpdateButton);
        $I->waitPageLoad();
//        $I->wait(3);
    }  
    
    public function OverrideGlobalVariable($title = null, $name = null, $value = null, $targetType = null, $targetId = null, $units = null)
    {
        $I = $this;
        $I->wait(4);
        if (isset($title)){
            $I->fillField(\Page\GlobalVariableOverride::$TitleField, $title);
        }
        if (isset($name)){
            $I->fillField(\Page\GlobalVariableOverride::$NameField, $name);
        }
        if (isset($value)){
            $I->fillField(\Page\GlobalVariableOverride::$ValueField, $value);
        }
        if (isset($units)){
            $I->selectOption(\Page\GlobalVariableOverride::$UnitsSelect, $units);
        }
        if (isset($targetType)){
            $I->click(\Page\GlobalVariableOverride::$TargetTypeSelect);
            $I->wait(2);
            $I->selectOption(\Page\GlobalVariableOverride::$TargetTypeSelect, $targetType);
        }
        if (isset($targetId)){
            $I->click(\Page\GlobalVariableOverride::$TargetIdSelect);
            $I->wait(2);
            $I->selectOption(\Page\GlobalVariableOverride::$TargetIdSelect, $targetId);
        }
        $I->click(\Page\GlobalVariableOverride::$CreateButton);
        $I->wait(1);
        $I->waitPageLoad();
    }
    
    public function GetGlobalVariableIdFromUrl($I)
    {
        $Url = $I->grabFromCurrentUrl();
        $I->comment("Url: $Url");
        $u1 = explode('=', $Url);
        $id = $u1[1];
        $I->comment("Variable id: $id");
        return $id;
    }
    
    public function GetGlobalVariableOnPageInList($title, $type = 'Global', $typeValue = '(not set)')
    {
        $I = $this;
        $I->amOnPage(\Page\GlobalVariableList::URL());
//        $I->wait(1);
        $count = $I->grabTextFrom(\Page\GlobalVariableList::$SummaryCount);
        $pageCount = ceil($count/20);
        $I->comment("Page count = $pageCount");
        for($i=1; $i<=$pageCount; $i++){
            $I->amOnPage(\Page\GlobalVariableList::UrlPageNumber($i));
//            $I->wait(1);
            $rows = $I->getAmount($I, \Page\GlobalVariableList::$GlobalVariableRow);
            $I->comment("Count of rows = $rows");
            for($j=1; $j<=$rows; $j++){
                if($I->grabTextFrom(\Page\GlobalVariableList::TitleLine($j)) == $title && $I->grabTextFrom(\Page\GlobalVariableList::TargetTypeLine($j)) == $type && $I->grabTextFrom(\Page\GlobalVariableList::TargetIDLine($j)) == $typeValue){
                    $I->comment("I find global variable: $title at row: $j on page: $i");
                    break 2;
                }
            }
        }
        $variable['id']   = $I->grabTextFrom(\Page\GlobalVariableList::IdLine($j));
        $variable['page'] = $i;
        $variable['row']  = $j;
        return $variable;
    }
}