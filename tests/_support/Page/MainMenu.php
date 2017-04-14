<?php
namespace Page;

class MainMenu
{
    // include url of current page
    public static $URL = '';

    public static $StateSelect            = '.navbar-default>li:last-of-type';
    public static $SelectedStateOption    = '.navbar-default>li:last-of-type a>span';
    public static $StateOption            = '.navbar-default>li:last-of-type ul>li';

    public static function selectStateOption($number)           { return ".navbar-default>li:last-of-type ul>li:nth-of-type($number)>a";}
    public static function selectStateOptionByName($stateName)  { return "//*[@class='nav-pills navbar-default menu1 nav']/li[last()]/ul/li/a[text()='$stateName']";}
}
