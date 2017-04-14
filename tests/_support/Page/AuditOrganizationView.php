<?php
namespace Page;

class AuditOrganizationView
{
    public static function URL($id)                             { return "/master-admin/audit-organization/view?id=$id";}
    public static function AddMemberUserForm_URL($id)           { return "/master-admin/audit-organization/add-user?organization_id=$id";}
    public static function AddProgramForm_URL($id)              { return "/master-admin/audit-organization/add-program?organization_id=$id";}
    public static function AddComplianceCheckTypeForm_URL($id)  { return "/master-admin/audit-organization/add-group?organization_id=$id";}
    public static $Title                                 = 'h1';
    
    public static $UpdateButton                          = 'p .btn-primary';
    public static $DeleteButton                          = 'p .btn-danger';
    //-----Table-----
    public static $IdTh                                  = '#w0>tbody>tr:nth-of-type(1) th';
    public static $NameTh                                = '#w0>tbody>tr:nth-of-type(2) th';
    public static $StateTh                               = '#w0>tbody>tr:nth-of-type(3) th';
    public static $StatusTh                              = '#w0>tbody>tr:nth-of-type(4) th';
    public static $CreatedTh                             = '#w0>tbody>tr:nth-of-type(5) th';
    public static $UpdatedTh                             = '#w0>tbody>tr:nth-of-type(6) th';
    
    public static $IdValue                               = '#w0>tbody>tr:nth-of-type(1) td';
    public static $NameValue                             = '#w0>tbody>tr:nth-of-type(2) td';
    public static $StateValue                            = '#w0>tbody>tr:nth-of-type(3) td';
    public static $StatusValue                           = '#w0>tbody>tr:nth-of-type(4) td';
    public static $CreatedValue                          = '#w0>tbody>tr:nth-of-type(5) td';
    public static $UpdatedValue                          = '#w0>tbody>tr:nth-of-type(6) td';
    
    
    //-----Members head-----
    public static $MembersHead                           = '.row>div:first-of-type .panel-heading';
    public static $AddMemberButton                       = '.row>div:first-of-type .panel-heading a';
    public static $MemberRow                             = '.row>div:first-of-type li';
    public static function MemberUserLine($row)          { return ".row>div:first-of-type li:nth-of-type($row)";}
    public static function DeleteMemberButtonLine($row)  { return ".row>div:first-of-type li:nth-of-type($row) .btn-danger";}
    public static $AddMemberUserForm_UserSelect          = '[name=user_id]';
    public static $AddMemberUserForm_AddButton           = '[type=submit].btn-success';
    
    //-----Programs head-----
    public static $ProgramsHead                          = '.row>div:nth-of-type(2) .panel-heading';
    public static $AddProgramButton                      = '.row>div:nth-of-type(2) .panel-heading a';
    public static $ProgramRow                            = '.row>div:nth-of-type(2) li';
    public static function ProgramLine($row)             { return ".row>div:nth-of-type(2) li:nth-of-type($row)";}
    public static function DeleteProgramButtonLine($row) { return ".row>div:nth-of-type(2) li:nth-of-type($row) .btn-danger";}
    public static $AddProgramForm_ProgramSelect          = '[name=related_id]';
    public static $AddProgramForm_AddButton              = '[type=submit].btn-success';
    
    //-----Audit groups head-----
    public static $AuditGroupsHead                       = '.row>div:last-of-type .panel-heading';
    public static $AddAuditGroupButton                   = '.row>div:last-of-type .panel-heading a';
    public static $AuditGroupRow                         = '.row>div:last-of-type li';
    public static function AuditGroupLine($row)             { return ".row>div:last-of-type li:nth-of-type($row)";}
    public static function DeleteAuditGroupButtonLine($row) { return ".row>div:last-of-type li:nth-of-type($row) .btn-danger";}
    public static $AddAuditGroupForm_AuditGroupSelect    = '[name=group_id]';
    public static $AddAuditGroupForm_AddButton           = '[type=submit].btn-success';


}
