<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Acceptance extends \Codeception\Module
{
    
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
    
    public function assertEquals($expected, $actual, $message = '') {
        parent::assertEquals($expected, $actual, $message);
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
        $required = $I->grabAttributeFrom($field, 'required');
        $I->assertEquals($required, 'true');
    }
    
    /**     
     * @param \AcceptanceTester $I           
     */
    public function seePageNotFound($I) {
        $I->wait(1);
        $I->canSee("Page not found");
        $I->canSeeInTitle("Not Found (#404)");
    }
    
    /**     
     * @param \AcceptanceTester $I           
     */
    public function seePageForbiddenAccess($I) {
        $I->wait(1);
        $I->canSee("You are not allowed to perform this action.");
        $I->canSeeInTitle("Forbidden (#403)");
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
    
}
