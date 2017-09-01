<?php
namespace Step\Acceptance;

class Notification extends \AcceptanceTester
{
    public function CreateApplicantEmailText($subject = null, $body = null, $programArray = null, $trigger = 'Getting Started message', $state = null)
    {
        $I = $this;
        $I->amOnPage(\Page\ApplicantEmailTextCreate::URL());
        $I->wait(1);
        $I->waitForElement(\Page\ApplicantEmailTextCreate::$SubjectField);
        if (isset($subject)){
            $I->fillField(\Page\ApplicantEmailTextCreate::$SubjectField, $subject);
        }
        if (isset($body)){
            $I->fillCkEditorTextarea(\Page\ApplicantEmailTextCreate::$BodyField, $body);
        }
        if (isset($trigger)){
            $I->selectOption(\Page\ApplicantEmailTextCreate::$TriggerSelect, $trigger);
            $I->wait(2);
        }
        if (isset($programArray)){
            for ($i=1, $c= count($programArray); $i<=$c; $i++){
                $k = $i-1;
                $I->comment("i = $i. k = $k");
                $I->click(\Page\ApplicantEmailTextCreate::$ProgramSelect);
                $I->wait(1);
                $I->click(\Page\ApplicantEmailTextCreate::selectProgramByName($programArray[$k]));
            }
        }
        if (isset($state)){
            $I->canSeeOptionIsSelected(\Page\ApplicantEmailTextCreate::$StateSelect, $state);
        }
        $I->click(\Page\ApplicantEmailTextCreate::$SaveButton);
        $I->wait(2);
    }  
    
    public function GetApplicantEmailTextOnPageInList($trigger, $program)
    {
        $I = $this;
        $I->amOnPage(\Page\ApplicantEmailTextList::URL());
        $I->wait(1);
        $count = $I->grabTextFrom(\Page\ApplicantEmailTextList::$SummaryCount);
        $pageCount = ceil($count/20);
        $I->comment("Page count = $pageCount");
        for($i=1; $i<=$pageCount; $i++){
            $I->amOnPage(\Page\ApplicantEmailTextList::UrlPageNumber($i));
            $I->wait(1);
            $rows = $I->getAmount($I, \Page\ApplicantEmailTextList::$EmailRow);
            $I->comment("Count of rows = $rows");
            for($j=1; $j<=$rows; $j++){
                if($I->grabTextFrom(\Page\ApplicantEmailTextList::EmailTitleLine($j)) == $trigger and $I->grabTextFrom(\Page\ApplicantEmailTextList::ProgramLine($j)) == $program){
                    $I->comment("I find applicant email: $trigger for programs: $program at row: $j on page: $i");
                    break 2;
                }
            }
        }
        $app['id']   = $I->grabTextFrom(\Page\ApplicantEmailTextList::IdLine($j));
        $app['page'] = $i;
        $app['row']  = $j;
        return $app;
    }
    
    public function ManageApplicantEmailText($applicantId, $subject = null, $body = null)
    {
        $I = $this;
        $I->amOnPage(\Page\ApplicantEmailTextManage::URL($applicantId));
        $I->wait(2);
        $I->waitForElement(\Page\ApplicantEmailTextManage::$SubjectField);
        if (isset($subject)){
            $I->fillField(\Page\ApplicantEmailTextManage::$SubjectField, $subject);
        }
        if (isset($body)){
            $I->fillCkEditorTextarea(\Page\ApplicantEmailTextManage::$BodyField, $body);
        }
        $I->click(\Page\ApplicantEmailTextManage::$SaveButton);
        $I->wait(2);
    }  
    
    public function GetApplicationDirectionOnPageInList($key, $state)
    {
        $I = $this;
        $I->amOnPage(\Page\ApplicationDirectionsList::URL());
        $I->wait(1);
        $count = $I->grabTextFrom(\Page\ApplicationDirectionsList::$SummaryCount);
        $pageCount = ceil($count/20);
        $I->comment("Page count = $pageCount");
        for($i=1; $i<=$pageCount; $i++){
            $I->amOnPage(\Page\ApplicationDirectionsList::UrlPageNumber($i));
            $I->wait(1);
            $rows = $I->getAmount($I, \Page\ApplicationDirectionsList::$ApplicationDirectionRow);
            $I->comment("Count of rows = $rows");
            for($j=1; $j<=$rows; $j++){
                if($I->grabTextFrom(\Page\ApplicationDirectionsList::StateLine($j)) == $state and $I->grabTextFrom(\Page\ApplicationDirectionsList::KeyLine($j)) == $key){
                    $I->comment("I find application direction: $key for state: $state at row: $j on page: $i");
                    break 2;
                }
            }
        }
        $app['id']   = $I->grabTextFrom(\Page\ApplicationDirectionsList::IdLine($j));
        $app['page'] = $i;
        $app['row']  = $j;
        return $app;
    }
}