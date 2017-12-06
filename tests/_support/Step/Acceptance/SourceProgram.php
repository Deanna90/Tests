<?php
namespace Step\Acceptance;

class SourceProgram extends \AcceptanceTester
{
    public function CreateSourceProgram($title = null, $content = null, $file = 'null', $color = '#0b0749', $subdomain = null)
    {
        $I = $this;
        $I->comment("Create Source Program:");
        $I->amOnPage(\Page\SourceProgramCreate::URL());
        $I->wait(1);
        $I->waitForElement(\Page\SourceProgramCreate::$TitleField);
        if (isset($title)){
            $I->fillField(\Page\SourceProgramCreate::$TitleField, $title);
        }
        if (isset($content)){
            $I->fillCkEditorTextarea(\Page\SourceProgramCreate::$ContentField, $content);
        }
        if (isset($color)){
            $I->fillField(\Page\SourceProgramCreate::$ColorField, $color);
        }
        if (isset($file)){
            $I->attachFile(\Page\SourceProgramCreate::$FileUpload, $file);
        }
        if (isset($subdomain)){
            $I->selectOption(\Page\SourceProgramCreate::$SubdomainSelect, $subdomain);
        }
        $I->click(\Page\SourceProgramCreate::$CreateButton);
        $I->wait(1);
    }  
    
    public function GetSourceProgramOnPageInList($title)
    {
        $I = $this;
        $I->comment("Get Source Program on list. Get id, page number and row:");
        $I->amOnPage(\Page\SourceProgramList::URL());
        $I->wait(1);
        $count = $I->grabTextFrom(\Page\SourceProgramList::$SummaryCount);
        $pageCount = ceil($count/20);
        $I->comment("Page count = $pageCount");
        for($i=1; $i<=$pageCount; $i++){
            $I->amOnPage(\Page\SourceProgramList::UrlPageNumber($i));
            $I->wait(1);
            $rows = $I->getAmount($I, \Page\SourceProgramList::$SourceProgramRow);
            $I->comment("Count of rows = $rows");
            for($j=1; $j<=$rows; $j++){
                if($I->grabTextFrom(\Page\SourceProgramList::TitleLine($j)) == $title){
                    $I->comment("I find source program: $title at row: $j on page: $i");
                    break 2;
                }
            }
        }
        $source['id']   = $I->grabTextFrom(\Page\SourceProgramList::IdLine($j));
        $source['page'] = $i;
        $source['row']  = $j;
        return $source;
    }

}