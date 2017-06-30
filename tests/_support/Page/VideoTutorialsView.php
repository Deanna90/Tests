<?php
namespace Page;

class VideoTutorialsView extends \AcceptanceTester
{
    public static function URL($id)       {  return parent::$URL_UserAccess."/video/view?id=$id";}
    public static $Title                  = 'h1';
    
    public static $Description            = '.video-view p';
    
    public static $UploadedVideo          = 'video';
    
}
