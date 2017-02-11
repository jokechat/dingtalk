<?php 
use DingTalk\Contacts\User;

class UserTest extends PHPUnit_Framework_TestCase
{
    public function testSimpleList()
    {
        $user       = new User();
        $list         = $user->simplelist("1");
       $this->assertArrayHasKey("name", $list['userlist'][0]);
    }
    
    public function testlist()
    {
        $user       = new User();
        $list         = $user->list('1');
        $this->assertArrayHasKey("name", $list['userlist'][0]);
    }
    
    public function testGetUserInfo()
    {
        $user       = new User();
        $userid     = "17163158779264";
        $userinfo  = $user->getUserInfo($userid);
        $this->assertEquals($userinfo['userid'], $userid);
    }
    
    public function testGetAdmin()
    {
        $user       = new User();
        $list    = $user->getAdmin();
        $this->assertEquals($list['errmsg'], "ok");
    }
    
    public function testCount()
    {
        $user       = new User();
        $result     = $user->getOrgUserCount();
        $this->assertArrayHasKey("count", $result);
    }
    
}
?>