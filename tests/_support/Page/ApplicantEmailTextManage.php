<?php
namespace Page;

class ApplicantEmailTextManage extends \AcceptanceTester
{
    public static function URL($id)   {  return parent::$URL_UserAccess."/notification/manage?id=$id";}
    public static $Title              = 'h2';
    
    public static $EmailTitle         = '[action*=manage] p';
    public static $SaveButton         = '[action*=manage] [type=submit]';
    
    public static $SubjectField       = '#notificationtemplate-subject';
    public static $BodyField          = '#notificationtemplate-body';
    
    public static $SubjectLabel       = '[for=notificationtemplate-subject]';
    public static $BodyLabel          = '[for=notificationtemplate-body]';
}
