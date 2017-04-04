<?php
use DingTalk\Message\Message;
use DingTalk\Message\MessageBody;

class MessageTest extends PHPUnit_Framework_TestCase
{
    public function testSendToUser()
    {
        $message        = new Message();
        
        $body              = new MessageBody();
        $content          = $body->text("hello".time());
        $userids           = "0822076137-1352357577";
        $agentid           = "24958455";
        $result              = $message->send_to_users($userids, $content, $agentid);
        $this->assertEquals($result['errmsg'], 'ok');
    }
}
?>