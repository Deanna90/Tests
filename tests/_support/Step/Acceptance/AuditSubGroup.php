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

}