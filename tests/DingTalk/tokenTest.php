<?php 
use DingTalk\Token\AccessToken;

class TokenTest extends PHPUnit_Framework_TestCase
{
    public  function testToken()
    {
        $token              = new AccessToken();
        $access_token   = $token->getAccessToken();
        $this->expectOutputString($access_token);
        print_r($access_token);
    }
    
    public function testDemo()
    {
        $this->assertTrue(true);
    }
}
?>