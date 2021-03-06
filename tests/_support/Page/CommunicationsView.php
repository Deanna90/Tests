<?php
namespace Page;

class CommunicationsView extends \AcceptanceTester
{
    public static function URL($id)                           {  return parent::$URL_UserAccess."/communication/view?id=$id";}
    public static function URL_BusinessView($id, $businessId) {  return parent::$URL_UserAccess."/communication/business-view?id=$id&business_id=$businessId";}
    public static $Title              = 'h2';
    
    public static $BackButton         = 'h2+a';
    public static $SendButton         = '[type=submit][class*=success]';
   
    public static $MessageField       = '#message-body';
    
    public static $MessageLabel       = '[for=message-body]';
    
    public static function PreviousMessage($rowFromDown)       {  $a=$rowFromDown-1; return "//*[@class='col-md-12']/div[last()-$a][@class='row']/div[contains(@class,'col-md-6')]/div/div/p[normalize-space()][not(@class='message-time')]";}
    public static function PreviousMessageSender($rowFromDown) {  return ".col-md-12>div:nth-last-of-type($rowFromDown).row>div.col-md-6 .stick .message-time";}
    public static function PreviousMessageTime($rowFromDown)   {  return ".col-md-12>div:nth-last-of-type($rowFromDown).row>div.col-md-6 .stick .message-time span";}
}
