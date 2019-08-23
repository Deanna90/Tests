<?php

use Helper\Acceptance;
use Codeception\Module\WebDriver;
use Codeception\Module\Cli;
use Codeception\SuiteManager;
use Codeception\Lib\Interfaces\Web as WebInterface;

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
    public static $LoggedIn, $URL_UserAccess, $AddTagA, $additColumnForAuditor;
    
    use _generated\AcceptanceTesterActions;

   /**
    * Define custom actions here
    */
    
    public static function LoginAsAdmin($I)
    {
        if (!self::$LoggedIn) {
            $I->wantTo("Log in as admin");
            $I->amOnPage("/site/login");
//            $I->wait(1);
            $I->fillField('#loginform-email', USER_EMAIL);
            $I->fillField('#loginform-password', USER_PASSWORD);
            $I->wait(1);
            $I->click('[name=login-button]');
            $I->wait(1);
            $I->waitPageLoad();
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
//            $I->wait(1);
            $I->fillField('#loginform-email', $user_email);
            $I->fillField('#loginform-password', $user_password);
            $I->wait(1);
            $I->click('[name=login-button]');
            $I->wait(1);
            $I->waitPageLoad();
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
                    self::$additColumnForAuditor = '1';
                    break;
                case 'inspector':
                    self::$URL_UserAccess = '/inspector';
                    self::$AddTagA = '';
                    self::$additColumnForAuditor = '0';
                    break;
                case 'user':
                    self::$URL_UserAccess = '/user';
                    break;
            }
        }
    }
    
    public static function Logout($I) {
        if (self::$LoggedIn) {
            $I->wait(3);
            $I->click(Page\Header::$LogoutButton);
            $I->waitPageLoad();
        }
        self::$LoggedIn = FALSE;
    }
    
    public static function LogIn_TRUEorFALSE($I) {
        $I->amOnPage("/");
//        $I->wait(2);
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
//        $I->wait(8);
        $I->waitPageLoad();
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

    /**
     * Work out which browser module is in use.
     *
     * @return null|string
     *   Returns PhpBrowser if that module is detected. Otherwise, returns WebDriver. If neither of these are detected,
     *   return null.
     */
    public function getBrowserModuleName()
    {
        if (isset(SuiteManager::$actions['seeInTitle'])) {
            return SuiteManager::$actions['seeInTitle'];
        }
        return null;
    }
    /**
     * @return WebInterface
     * @throws \Codeception\Exception\Module
     * @param \Webdriver        $webdriver 
     */
    protected function getBrowserModule()
    {
        return $this->getModule('WebDriver');
    }

    
    public function fillCkEditorTextarea($textarea_selector, $content) {
        $this->fillRteEditor(
            \Facebook\WebDriver\WebDriverBy::cssSelector(
            $textarea_selector.' + .cke .cke_wysiwyg_frame'
            ),
            $content
        );
//        $this->switchToWindow();
        $this->wait(1);
//        $this->click('.cke_reset_all');
                $this->click(".cke_contents.cke_reset");
        $this->wait(1);
//        $this->click("iframe.cke_reset");
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
//                $webDriver->switchTo()->window($parentwindow);
                $webDriver->switchTo()->defaultContent();
            });
    }
    
    /**
     * Retrieve the contents of a CKEditor field.
     *
     * @see http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-getData
     *
     * @param string $instance_id
     *   The CKEditor instance id.
     *
     * @return string
     *   The CKEditor data (raw HTML).
     *
     * @throws ElementNotFound
     *   If CKEditor text area could not be found.
     *
     */
    public function grabCkEditorValue($instance_id)
    {
        $this->checkCkEditorInstanceId($instance_id);
        return $this->getBrowserModule()->executeJs("return CKEDITOR.instances['$instance_id'].getData()");
    }
    /**
     * @param string $instance_id
     *   The CKEditor instance id.
     *
     * @throws ElementNotFound
     *   If CKEditor instance could not be located.
     */
    protected function checkCkEditorInstanceId($instance_id)
    {
        if ($this->getBrowserModule()->executeJs("return typeof CKEDITOR == 'undefined'")) {
            throw new ElementNotFound("CKEditor");
        }
        if ($this->getBrowserModule()->executeJs("return typeof CKEDITOR.instances['$instance_id'] == 'undefined'")) {
            throw new ElementNotFound($instance_id, "CKEditor instance");
        }
    }
    /**
     * See text within a CK Editor iframe.
     *
     * @param string $value
     *   The value to check.
     * @param string $instance_id
     *   The CKEditor instance id.
     */
    public function seeInCkEditor($value, $instance_id)
    {
        $this->assert($this->proceedSeeInCkEditor($value, $instance_id));
    }
    /**
     * Don't see text within a CK Editor iframe.
     *
     * @param string $value
     *   The value that should not be there.
     * @param string $instance_id
     *   The CKEditor instance id.
     */
    public function dontSeeInCkEditor($value, $instance_id)
    {
        $this->assertNot($this->proceedSeeInCkEditor($value, $instance_id));
    }
    /**
     * Helper method for checking text in a ckeditor iframe.
     *
     * @param string $value
     *   The string to check.
     * @param string $instance_id
     *   The CKEditor instance id.
     *
     * @return array
     *
     * @throws \LogicException
     *   If attempting to call function when WebDriver not in use.
     */
    protected function proceedSeeInCkEditor($value, $instance_id)
    {
        $content = $this->grabCkEditorValue($instance_id);
        return array("True", strpos($content, $value) !== false);
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
