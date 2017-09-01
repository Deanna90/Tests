<?php
namespace Step\Acceptance;

class AuditSubGroup extends \AcceptanceTester
{
    public function CreateAuditSubgroup($name = null, $auditGroup = null, $state = null)
    {
        $I = $this;
        $I->amOnPage(\Page\AuditSubgroupCreate::URL());
        $I->wait(1);
        $I->waitForElement(\Page\AuditSubgroupCreate::$NameField);
        if (isset($name)){
            $I->fillField(\Page\AuditSubgroupCreate::$NameField, $name);
        }
        if (isset($auditGroup)){
            $I->selectOption(\Page\AuditSubgroupCreate::$AuditGroupSelect, $auditGroup);
        }
        if (isset($state)){
            $I->selectOption(\Page\AuditSubgroupCreate::$StateSelect, $state);
        }
        $I->click(\Page\AuditSubgroupCreate::$CreateButton);
        $I->wait(2);
    } 

    public function GetAuditSubgroupOnPageInList($name)
    {
        $I = $this;
        $I->amOnPage(\Page\AuditSubgroupList::URL());
        $I->wait(1);
        $count = $I->grabTextFrom(\Page\AuditSubgroupList::$SummaryCount);
        $pageCount = ceil($count/20);
        $I->comment("Page count = $pageCount");
        for($i=1; $i<=$pageCount; $i++){
            $I->amOnPage(\Page\AuditSubgroupList::UrlPageNumber($i));
            $I->wait(2);
            $rows = $I->getAmount($I, \Page\AuditSubgroupList::$AuditSubgroupRow);
            $I->comment("Count of rows = $rows");
            for($j=1; $j<=$rows; $j++){
                if($I->grabTextFrom(\Page\AuditSubgroupList::NameLine($j)) == $name){
                    $I->comment("I find subgroup: $name at row: $j on page: $i");
                    break 2;
                }
            }
        }
        $subGr['id']   = $I->grabTextFrom(\Page\AuditSubgroupList::IdLine($j));
        $subGr['page'] = $i;
        $subGr['row']  = $j;
        return $subGr;
    }
}