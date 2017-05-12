<?php


class StateListCest
{
    public $idState, $firstStateName, $firstShortName, $stateName;


    public function Help1_LogInAsAdmin(AcceptanceTester $I)
    {
        $I->LoginAsAdmin($I);
    }
    
    //--------------------------------------------------------------------------Page Title------------------------------------------------------------------------------------------
    
    public function StateList2_1_1_Title(\Step\Acceptance\State $I)
    {
        $I->amOnPage(\Page\StateList::URL());
        $I->wait(1);
        $I->see('States', \Page\StateUpdate::$Title);
    }
    
    public function StateList2_1_2_CountInListTitle(\Step\Acceptance\State $I)
    {
//        $I->amOnPage(\Page\StateList::UrlPageNumber('last()'));
//        $I->wait(2);
//        $I->see('States', \Page\StateUpdate::$Title);
    }
    
    
    //--------------------------------------------------------------------------ID Column------------------------------------------------------------------------------------------
    
    public function StateList2_1_1_IdColumnHead(\Step\Acceptance\State $I)
    {
        $I->amOnPage(\Page\StateList::URL());
        $I->wait(1);
        $I->see("ID", \Page\StateList::$IdHead);
    }
    
    //--------------------------------------------------------------------------Name Column------------------------------------------------------------------------------------------
    
    public function StateList2_1_1_NameColumnHead(\Step\Acceptance\State $I)
    {
        $I->amOnPage(\Page\StateList::URL());
        $I->wait(1);
        $I->see("Name", \Page\StateList::$NameLinkHead);
    }
    
    //--------------------------------------------------------------------------Short Name Column------------------------------------------------------------------------------------------
    
    public function StateList2_1_1_ShortNameColumnHead(\Step\Acceptance\State $I)
    {
        $I->amOnPage(\Page\StateList::URL());
        $I->wait(1);
        $I->see("Short Name", \Page\StateList::$ShortNameLinkHead);
    }
    
    //--------------------------------------------------------------------------Created Column------------------------------------------------------------------------------------------
    
    public function StateList2_1_1_CreatedColumnHead(\Step\Acceptance\State $I)
    {
        $I->amOnPage(\Page\StateList::URL());
        $I->wait(1);
        $I->see("Created", \Page\StateList::$CreatedLinkHead);
    }
    
    //--------------------------------------------------------------------------Updated Column------------------------------------------------------------------------------------------
    
    public function StateList2_1_1_UpdatedColumnHead(\Step\Acceptance\State $I)
    {
        $I->amOnPage(\Page\StateList::URL());
        $I->wait(1);
        $I->see("Updated", \Page\StateList::$UpdatedLinkHead);
    }
    
    //--------------------------------------------------------------------------Status Column------------------------------------------------------------------------------------------
    
    public function StateList2_1_1_IdColumnHead(\Step\Acceptance\State $I)
    {
        $I->amOnPage(\Page\StateList::URL());
        $I->wait(1);
        $I->see("Status", \Page\StateList::$StatusLinkHead);
    }
    
    //--------------------------------------------------------------------------Actions Column------------------------------------------------------------------------------------------
    
    //--------------------------------------------------------------------------Create New State Button------------------------------------------------------------------------------------------
    
    public function StateList2_1_1_CheckCreateNewStateButtonPresent(\Step\Acceptance\State $I)
    {
        $I->amOnPage(\Page\StateList::URL());
        $I->wait(1);
        $I->seeElement(\Page\StateList::$CreateStateButton);
        $I->see("Create new state", \Page\StateList::$CreateStateButton);
    }
    
    public function StateList2_1_1_CheckCreateNewStateButtonFunction(\Step\Acceptance\State $I)
    {
        $I->amOnPage(\Page\StateList::URL());
        $I->wait(1);
        $I->click(\Page\StateList::$CreateStateButton);
        $I->wait(1);
        $I->seeInCurrentUrl(\Page\StateList::URL());
    }
}
