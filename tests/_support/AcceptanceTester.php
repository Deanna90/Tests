<?php

use Helper\Acceptance;
use Codeception\Module\WebDriver;
use Codeception\Module\Cli;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
*/
class AcceptanceTester extends \Codeception\Actor
{
    protected static $LoggedIn, $URL_UserAccess, $AddTagA;
    
    use _generated\AcceptanceTesterActions;

   /**
    * Define custom actions here
    */
    
    public static function LoginAsAdmin($I)
    {
        if (!self::$LoggedIn) {
            $I->wantTo("Log in as admin");
            $I->amOnPage("/site/login");
            $I->wait(1);
            $I->fillField('#loginform-email', USER_EMAIL);
            $I->fillField('#loginform-password', USER_PASSWORD);
            $I->wait(1);
            $I->click('[name=login-button]');
            $I->wait(1);
        }
        self::$LoggedIn = TRUE;
        self::$URL_UserAccess = '/master-admin';
    }
    
    /**
     * @param string $user_email
     * @param string $user_password
     */
    public static function LoginAsUser($user_email, $user_password, $I, $type) {
        if (!self::$LoggedIn) {
            $I->amOnPage("/site/login");
            $I->wait(1);
            $I->fillField('#loginform-email', $user_email);
            $I->fillField('#loginform-password', $user_password);
            $I->wait(1);
            $I->click('[name=login-button]');
            $I->wait(1);
        }
        self::$LoggedIn = TRUE;
        if (isset($type)){
            switch ($type){
                case 'state admin':
                    self::$URL_UserAccess = '/state-admin';
                    break;
                case 'coordinator':
                    self::$URL_UserAccess = '/coordinator';
                    break;
                case 'auditor':
                    self::$URL_UserAccess = '/auditor';
                    self::$AddTagA = '/a';
                    break;
                case 'inspector':
                    self::$URL_UserAccess = '/inspector';
                    self::$AddTagA = '';
                    break;
                case 'user':
                    break;
            }
        }
    }
    
    public static function Logout($I) {
        if (self::$LoggedIn) {
            $I->wait(3);
            $I->click(Page\Header::$LogoutButton);
            $I->wait(4);
        }
        self::$LoggedIn = FALSE;
    }
    
    public static function LogIn_TRUEorFALSE($I) {
        $I->amOnPage("/");
        $I->wait(2);
        if($I->getAmount($I, \Page\Header::$LogoutButton) == 0){
            self::$LoggedIn = FALSE;
        }
        else {
            self::$LoggedIn = TRUE;
        }
    }
    
    public static function SelectDefaultState($I, $name)
    {
        $I->comment("Select $name state as default for system:");
        $I->click(\Page\MainMenu::$StateSelect);
        $I->wait(5);
        $I->click(\Page\MainMenu::selectStateOptionByName($name));
        $I->wait(8);
    }
    
    ////////////////////////////////////////////////////////////////////////////
//    public function fillCkEditorById($element_id, $content) {
//        $this->fillRteEditor(
//            \Facebook\WebDriver\WebDriverBy::cssSelector(
//                '#cke_' . $element_id . ' .cke_wysiwyg_frame'
//            ),
//            $content
//        );
//    }

    public function fillCkEditorTextarea($textarea_selector, $content) {
        $this->fillRteEditor(
            \Facebook\WebDriver\WebDriverBy::cssSelector(
            $textarea_selector.' + .cke .cke_wysiwyg_frame'
            ),
            $content
        );
        $this->switchToWindow();
        $this->wait(2);
    }


    private function fillRteEditor($selector, $content) {
        $this->executeInSelenium(
            function (\Facebook\WebDriver\Remote\RemoteWebDriver $webDriver)
            use ($selector, $content) {
                $parentwindow = $webDriver->getWindowHandle();
                
                $webDriver->switchTo()->frame(
                    $webDriver->findElement($selector)
                );

                $webDriver->executeScript(
                    'arguments[0].innerHTML = "' . addslashes($content) . '"',
                    [$webDriver->findElement(\Facebook\WebDriver\WebDriverBy::tagName('body'))]
                );
                $webDriver->switchTo()->window($parentwindow);
//                $webDriver->switchTo()->defaultContent();
            });
    }
    
    public function makeElementVisible($cssSelector, $style = 'visibility'){
	$I = $this;
        switch ($style){
            case 'visibility':
                $value = 'visibility: visible';
                break;
            case 'display':
                $value = 'display: inline';
                break;
        }
            foreach ($cssSelector as $key) {
                $I->executeJS('$(\''.$key.'\').attr("style","'.$value.'");');
            }
    } 
    
    public function makeElementNotVisible($cssSelector, $style = 'position'){
	$I = $this;
        switch ($style){
            case 'position':
                $value = 'position: inherit';
                break;
        }
            foreach ($cssSelector as $key) {
                $I->executeJS('$(\''.$key.'\').attr("style","'.$value.'");');
            }
    } 
   
}
