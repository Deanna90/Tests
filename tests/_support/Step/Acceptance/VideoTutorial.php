<?php
namespace Step\Acceptance;

class VideoTutorial extends \AcceptanceTester
{
    public function CreateVideo($title = null, $description = null, $userTypes = null, $state =null, $videoFile = 'videoo.mp4', $category = null)
    {
        $I = $this;
        $I->comment("Create Video Tutorial:");
        $I->amOnPage(\Page\VideoTutorialsCreate::URL());
//        $I->wait(1);
//        $I->waitForElement(\Page\VideoTutorialsCreate::$TitleField);
        if (isset($title)){
            $I->fillField(\Page\VideoTutorialsCreate::$TitleField, $title);
        }
        if (isset($description)){
            $I->fillField(\Page\VideoTutorialsCreate::$DescriptionField, $description);
            $I->wait(2);
        }
        if (isset($state)){
            for ($i=1, $c= count($state); $i<=$c; $i++){
                $k = $i-1;
                $I->click(\Page\VideoTutorialsCreate::$StateSelect);
                $I->wait(2);
                $I->click(\Page\VideoTutorialsCreate::selectStateByName($state[$k]));
            }
        }
        if (isset($userTypes)){
            for ($i=1, $c= count($userTypes); $i<=$c; $i++){
                $k = $i-1;
                $I->click(\Page\VideoTutorialsCreate::$UserTypesSelect);
                $I->wait(2);
                $I->click(\Page\VideoTutorialsCreate::selectUserTypesByName($userTypes[$k]));
            }
        }
        if (isset($videoFile)){
            $I->attachFile(\Page\VideoTutorialsCreate::$VideoFileUpload, $videoFile);
        }
        if (isset($category)){
            $I->fillField(\Page\VideoTutorialsCreate::$CategorySelect, $category);
        }
        $I->click(\Page\VideoTutorialsCreate::$CreateButton);
        $I->wait(130);
    }  
    
    public function GetVideoTutorialOnPageInList($title)
    {
        $I = $this;
        $I->comment("Get Video on list. Get id, page number and row:");
        $I->amOnPage(\Page\VideoTutorialsList::URL());
//        $I->wait(1);
        $count = $I->grabTextFrom(\Page\VideoTutorialsList::$SummaryCount);
        $pageCount = ceil($count/20);
        $I->comment("Page count = $pageCount");
        for($i=1; $i<=$pageCount; $i++){
            $I->amOnPage(\Page\VideoTutorialsList::UrlPageNumber($i));
//            $I->wait(1);
            $rows = $I->getAmount($I, \Page\VideoTutorialsList::$VideoRow);
            $I->comment("Count of rows = $rows");
            for($j=1; $j<=$rows; $j++){
                if($I->grabTextFrom(\Page\VideoTutorialsList::TitleLine($j)) == $title){
                    $I->comment("I find video tutorial: $title at row: $j on page: $i");
                    break 2;
                }
            }
        }
        $video['id']   = $I->grabTextFrom(\Page\ResourceList::IdLine($j));
        $video['page'] = $i;
        $video['row']  = $j;
        return $video;
    }
}