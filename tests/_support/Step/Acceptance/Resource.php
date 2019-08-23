<?php
namespace Step\Acceptance;

class Resource extends \AcceptanceTester
{
    public function CreateResource($title = null, $shortDescription = null, $content = null, $attachment = null, $attachmentName = null)
    {
        $I = $this;
        $I->amOnPage(\Page\ResourceCreate::URL());
//        $I->wait(1);
        $I->waitForElement(\Page\ResourceCreate::$TitleField);
        if (isset($title)){
            $I->fillField(\Page\ResourceCreate::$TitleField, $title);
        }
        if (isset($shortDescription)){
            $I->fillField(\Page\ResourceCreate::$ShortDescriptionField, $shortDescription);
        }
        if (isset($content)){
            $I->fillField(\Page\ResourceCreate::$ContentField, $content);
        }
        if (isset($attachment)){
            $I->attachFile(\Page\ResourceCreate::$AttachmentUpload, $attachment);
        }
        if (isset($attachmentName)){
            $I->fillField(\Page\ResourceCreate::$AttachmentTitleField, $attachmentName);
        }
        $I->click(\Page\ResourceCreate::$CreateButton);
        $I->waitPageLoad('60');
//        $I->wait(1);
    }  
    
    public function GetResourceOnPageInList($title)
    {
        $I = $this;
        $I->amOnPage(\Page\ResourceList::URL());
//        $I->wait(1);
        $count = $I->grabTextFrom(\Page\ResourceList::$SummaryCount);
        $pageCount = ceil($count/20);
        $I->comment("Page count = $pageCount");
        for($i=1; $i<=$pageCount; $i++){
            $I->amOnPage(\Page\ResourceList::UrlPageNumber($i));
//            $I->wait(1);
            $rows = $I->getAmount($I, \Page\ResourceList::$ResourceRow);
            $I->comment("Count of rows = $rows");
            for($j=1; $j<=$rows; $j++){
                if($I->grabTextFrom(\Page\ResourceList::TitleLine($j)) == $title){
                    $I->comment("I find resource: $title at row: $j on page: $i");
                    break 2;
                }
            }
        }
        $resource['id']   = $I->grabTextFrom(\Page\ResourceList::IdLine($j));
        $resource['page'] = $i;
        $resource['row']  = $j;
        return $resource;
    }
}