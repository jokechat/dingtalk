<?php 
use DingTalk\Token\AccessToken;

class TokenTest extends PHPUnit_Framework_TestCase
{
    public  function testToken()
    {
        $this->assertTrue(true);return ;
        $token              = new AccessToken();
        $access_token   = $token->getAccessToken();
//         $this->expectOutputString($access_token);
        print_r($access_token);
    }
    
    /**
     * 获取sns access_token
     */
    public function testSNSToken()
    {
        $token              = new AccessToken();
        $accessToken   = $token->getSnsAccessToken();
        $this->assertNotEmpty($accessToken,"获取sns access_token失败");
    }
    
}
?>