<?php
namespace Helper;

use Codeception\Exception\ModuleException;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Acceptance extends \Codeception\Module
{
    private $webDriver = null;
    private $webDriverModule = null;
    
    /**
     * Event hook before a test starts.
     *
     * @param \Codeception\TestCase $test
     *
     * @throws \Exception
     */
    public function _before(\Codeception\TestCase $test)
    {
        if (!$this->hasModule('WebDriver') && !$this->hasModule('Selenium2')) {
            throw new \Exception('PageWait uses the WebDriver. Please be sure that this module is activated.');
        }
        // Use WebDriver
        if ($this->hasModule('WebDriver')) {
            $this->webDriverModule = $this->getModule('WebDriver');
            $this->webDriver = $this->webDriverModule->webDriver;
        }
    }
    
    
    /**     
     * Generation Test Data
     * @param string          $typeName State|City|Program etc
     */
    public function GenerateNameOf($typeName)
    {
        $I = $this;
        $set="abcdefghijklmnopqrstuvwxyz"; 
        $size = strlen($set)-1;       
        $end = null;
        $max = 4;
            while($max--)
            $end.=$set[rand(0,$size)]; 
        $name = $typeName.$end;
        echo $name;
        return $name;
    }
    
    public function GenerateEmail()
    {
        $I = $this;
        $set="abcdefghijklmnopqrstuvwxyz"; 
        $size = strlen($set)-1;  
        $domain = '@test.qa';
        $login = null;
        $max = 6;
            while($max--)
            $login.=$set[rand(0,$size)]; 
        $email = $login.$domain;
        echo $email;
        return $email;
    }
    
    public function GenerateZipCode()
    {
        $I = $this;
        $set = "1234567890"; 
        $size = strlen($set)-1;       
        $number = null;
        $max = 5;
            while($max--)
            $number.=$set[rand(0,$size)]; 
        echo $number;
        return $number;
    }
    
    public function GeneratePhoneNumber()
    {
        $I = $this;
        $set = "1234567890"; 
        $size = strlen($set)-1;       
        $code1 = null;
        $code2 = null;
        $code3 = null;
        $max1 = 3;
            while($max1--)
            $code1.=$set[rand(0,$size)]; 
        $max2 = 3;
            while($max2--)
            $code2.=$set[rand(0,$size)];
        $max3 = 4;
            while($max3--)
            $code3.=$set[rand(0,$size)];
        $number = '('.$code1.') '.$code2.'-'.$code3;
        echo $number;
        return $number;
    }
    
    /**
     * Checks that two variables are equal.
     *
     * @param        $expected
     * @param        $actual
     * @param string $message
     * @param float  $delta
     */
    
    public function assertEquals($expected, $actual, $message = '', $delta = null) {
        parent::assertEquals($expected, $actual, $message, $delta);
    }

    public function fail($message) {
        parent::fail($message);
    }

    /**
     * Counting Specified Tags
     * @param [Some]Tester $I
     * @param str $css
     * @return int
     */
    public function getAmount($I, $css) {
        return $I->executeJS("return $('$css').length");
    }

    /**     
     * Scrolling  page to specified element
     * @param \AcceptanceTester $I          controller
     * @param string            $CSSelement CSS selector
     */
    public function scrollToElement($I, $CSSelement) {
        $I->executeJS("$('html,body').animate({scrollTop:$('$CSSelement').offset().top});");
    }

       
    /**
     * Grab text from all elements selected with JQUERY
     * and write them to array
     * 
     * @todo normalize 
     * 
     * @param   AcceptanceTester    $I                  controller
     * @param   string              $JQuerySelector     JQueryCssSelector     
     * @return  array               Texts from elements
     * 
     * div.body_category div.row-category div.share_alt a.pjax
     */
    public function grabTextFromAllElements($I, $JQuerySelector) {
        $delimiter = '--D_E_L--';
        $script = <<<HERE
            element = $('$JQuerySelector');
            var tex = [];
            for(i=0;i<element.length;i++){
                tex += '$delimiter'+element.eq(i).text();
            };
            $('<p id="GRABTEXTFROMALL"></p>').text(tex).appendTo('body');
HERE;
        $I->executeJS($script);
        $text = explode($delimiter, $I->grabTextFrom('#GRABTEXTFROMALL'));
        array_shift($text);
        return $text;
    }

    /**
     * click all finded buttons together
     * can click n times if passed $clicktimes
     * can set the wait between clicks
     * 
     * @param AcceptanceTester  $I              controller
     * @param string            $JQeryElements  JQ_CSS_Selector  
     * @param int               $clickTimes     times
     * @param int               $deelay         pause between clicks
     * @return null null
     * 
     * .btn.expandButton
     */
    public function clickAllElements($I, $JQeryElements, $clickTimes = 1, $deelay = 3) {
        $script = <<<SCRIPT
          $('$JQeryElements:visible').click();
SCRIPT;
        for ($j = 0; $j < $clickTimes; ++$j) {
            $I->executeJS($script);
            $I->wait($deelay);
        }
    }

    /**
     * @param string $type            type of alert success|error
     * @param string $message         message of alert
     * @param string|int  $times           one time = 1 milliseconds && 1000 microseconds
     */
    public function exactlySeeMessage($I, $message = null, $times = '30') {
        
        for ($j = 1; $j <= $times; ++$j) {
            usleep(100000);
            try {
                $see = $I->see($message, \Page\GlobalElements::Message);
                if (!isset($see)) {
                    $see = true;
                    break;
                }
            } catch (\Exception $exc) {
                
            }
        }
        if ($see) {
            $I->comment("I see message $message");
        } else {
            $I->fail("Sorry, I couldn't see message");
        }
    }
    
    /**
     * @param string $type            type of alert success|error
     * @param string $message         message of alert
     * @param string|int  $times           one time = 1 milliseconds && 1000 microseconds
     */
    public function exactlySeeAlert($I, $type = 'success', $message = null, $times = '30') {

        //define element
        if ($type == 'success') {
            $element = '.alert.in.fade.alert-success';
        } elseif ($type == 'error') {
            $element = '.alert.in.fade.alert-error';
        } else {
            $I->fail('unknown type of message, pass "success" or "error" string');
        }
        for ($j = 1; $j <= $times; ++$j) {

            usleep(100000);

            try {
                $see = $I->see($message, $element);
                if (!isset($see)) {
                    $see = true;
                    break;
                }
            } catch (\Exception $exc) {
                
            }
        }
        if ($see) {
            $I->comment("I see message");
        } else {
            $I->fail("Sorry I couldn't see alert message");
        }
    }
    
    /**     
     * @param \AcceptanceTester $I          
     * @param                   $field      
     */
    public function seeFieldIsRequired($I, $field) {
        $required = $I->grabAttributeFrom($field, 'aria-required');
        $I->assertEquals($required, 'true');
    }
    
    /**     
     * @param \AcceptanceTester $I          
     * @param                   $field      
     */
    public function dontSeeFieldIsRequired($I, $field) {
        $required = $I->grabAttributeFrom($field, 'aria-required');
        $I->assertEquals($required, NULL);
    }
    
    /**     
     * @param \AcceptanceTester $I           
     */
    public function canSeePageNotFound($I, $text = 'Page') {
        $I->wait(1);
        $I->canSeeInTitle("Not Found (#404)");
        switch ($text) {
            case "Page":
                $I->canSee("Page not found");
                break;
            case "Business":
                $I->canSee("Business not found");
                break;
            case "User":
                $I->canSee("Unknown user type");
                break;
        }
    }
    
    /**     
     * @param \AcceptanceTester $I           
     */
    public function cantSeePageNotFound($I) {
        $I->wait(1);
        $I->cantSee("Page not found");
        $I->cantSee("Business not found");
        $I->cantSeeInTitle("Not Found (#404)");
    }
    
    /**     
     * @param \AcceptanceTester $I           
     */
    public function canSeePageForbiddenAccess($I, $text = 'Not allowed') {
        $I->wait(1);
//        $I->canSee("You are not allowed to perform this action.")||$I->canSee("Access Denied!");
        $I->canSeeInTitle("Forbidden (#403)");
        switch ($text) {
            case "Not allowed":
                $I->canSee("You are not allowed to perform this action.");
                break;
            case "Access denied":
                $I->canSee("Access Denied!");
                break;
            default:
                $I->canSee("$text");
                break;
        }
    }
    
    /**     
     * @param \AcceptanceTester $I           
     */
    public function cantSeePopupIsOpened($I) {
        $I->canSeeElementInDOM("#popup[style='display: none;']");
    }
    
    /**     
     * @param \AcceptanceTester $I           
     */
    public function canSeePopupIsOpened($I) {
        $I->canSeeElementInDOM("#popup[style*='display: block;']");
    }
    
    /**     
     * @param \AcceptanceTester $I           
     */
    public function cantSeePageForbiddenAccess($I) {
        $I->wait(1);
//        $I->cantSee("You are not allowed to perform this action.")||$I->cantSee("Access Denied!");
        $I->cantSeeInTitle("Forbidden (#403)");
    }
    
    /**     
     * @param \AcceptanceTester $I  
     * @param \Webdriver        $webdriver          
     */
    public function switchToLastTab($I) {
        $I->executeInSelenium(function (\Webdriver $webdriver) {
            $handles = $webdriver->getWindowHandles();
            $last_window = end($handles);
            $webdriver->switchTo()->window($last_window);
        });
    }
    
    /**      
     * @param \Webdriver        $webdriver          
     */
    public function getConfUrl() {
//	return(preg_replace("/(.*).$/", "\`", $this->getModule('WebDriver')->_getUrl()));
        return($this->getModule('WebDriver')->_getUrl());
    } 
    
    /**
     * @param \Webdriver        $webdriver
     */
    public function getCurrentUrl()
    {
        return $this->getModule('WebDriver')->_getCurrentUri();
    }
        
    /**     
     * @param \AcceptanceTester $I           
     */
    public function canSeeElementIsDisabled($I, $element, $selector='css') {
        $I->wait(1);
        $selector == 'xpath' ? $symb = '@' : $symb = '';
        $I->canSeeElementInDOM($element."[".$symb."disabled]");
    }
    
    /**     
     * @param \AcceptanceTester $I           
     */
    public function cantSeeElementIsDisabled($I, $element, $selector='css') {
        $I->wait(1);
        $selector == 'xpath' ? $symb = '@' : $symb = '';
        $I->cantSeeElementInDOM($element."[".$symb."disabled]");
    }
    
    /**     
     * @param \Webdriver        $webdriver            
     */
    public function pressEscapeButton()
    {
        $escapeKey = \Facebook\WebDriver\WebDriverKeys::ESCAPE;
        $this->getModule('WebDriver')->webDriver->getKeyboard()->sendKeys([$escapeKey]);
    }
    
    
    
    
    /**
     * Wait for ajax load.
     *
     * @param $timeout
     */
    public function waitAjaxLoad($timeout = 30)
    {
        $this->webDriverModule->waitForJS('return !!window.jQuery && window.jQuery.active == 0;', $timeout);
        $this->webDriverModule->wait(1);
//        $this->dontSeeJsError();
    }
    /**
     * Wait for page is fully load.
     *
     * @param $timeout
     */
    public function waitPageLoad($timeout = 200)
    {
        $this->webDriverModule->waitForJs('return document.readyState == "complete"', $timeout);
        $this->waitAjaxLoad($timeout);
//        $this->dontSeeJsError();
    }
    /**
     * Go on page
     *
     * @param $link
     * @param $timeout
     */
    public function amOnPage($link, $timeout = 200)
    {
        $this->webDriverModule->amOnPage($link);
        $this->waitPageLoad($timeout);
    }
    /**
     * @param $identifier
     * @param $elementID
     * @param $excludeElements
     * @param $element
     */
    public function dontSeeVisualChanges($identifier, $elementID = null, $excludeElements = null, $element = false)
    {
        if ($element !== false) {
            $this->webDriverModule->moveMouseOver($element);
        }
        $this->getModule('VisualCeption')->dontSeeVisualChanges($identifier, $elementID, $excludeElements);
        $this->dontSeeJsError();
    }
    /**
     * Check errors in console.
     */
    public function dontSeeJsError()
    {
        $logs = $this->getModule('WebDriver')->webDriver->manage()->getLog('browser');
        foreach ($logs as $log) {
            if ($log['level'] == 'SEVERE') {
                throw new ModuleException($this, 'Some error in JavaScript: ' . json_encode($log));
            }
        }
    }

}
