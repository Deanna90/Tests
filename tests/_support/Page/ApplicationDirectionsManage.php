<?php
namespace Page;

class ApplicationDirectionsManage extends \AcceptanceTester
{
    public static function URL($id)   {  return parent::$URL_UserAccess."/cms/manage?id=$id";}
    public static $Title              = 'h2';
    
    public static $KeyTitle           = '[action*=manage] p';
    public static $SaveButton         = '[action*=manage] [type=submit]';
    
    public static $ContentField       = '#cms-content';
    
    public static $ContentLabel       = '[for=cms-content]';

}
