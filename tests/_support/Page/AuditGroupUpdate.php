<?php
namespace Page;

class AuditGroupUpdate extends \AcceptanceTester
{
    public static function URL($id)     { return parent::$URL_UserAccess."/audit-group/update?id=$id";}


}
