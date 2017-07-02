<?php
use DingTalk\Message\RobotMessage;
class RobotMessageTest extends PHPUnit_Framework_TestCase
{
  public function testRobotSendText()
  {
    $message  = new RobotMessage();
    $content  = "hello, this is text message";
    $atMobiles= ['17600205225','15003945225'];
    $result   = $message->send_text($content,$atMobiles,false);
    $this->assertEquals($result['errmsg'], 'ok');
  }

  public function  testSendLink()
  {
    $message  = new RobotMessage();
    $text     = "link类型";
    $title    = "title";
    $picUrl   = "https://ss0.bdstatic.com/5aV1bjqh_Q23odCf/static/superman/img/logo/logo_white.png";
    $messageUrl= "http://www.baidu.com";
    $result   = $message->link($text,$title,$picUrl,$messageUrl);
    $this->assertEquals($result['errmsg'], 'ok');
  }

  public function testSendMarkdown()
  {
    $message  = new RobotMessage();
    $text     = "
              
              标题
              # 一级标题
              ## 二级标题
              ### 三级标题
              #### 四级标题
              ##### 五级标题
              ###### 六级标题
              
              引用
              > A man who stands for nothing will fall for anything.
              
              文字加粗、斜体
              **bold**
              *italic*
              
              链接
              [this is a link](http://name.com)
              
              图片
              ![](http://name.com/pic.jpg)
              
              无序列表
              - item1
              - item2
              
              有序列表
              1. item1
              2. item2
              ";
    $title    = "title";
    $result   = $message->markdown($title,$text);
    $this->assertEquals($result['errmsg'], 'ok');
  }

  public function testActionCardOne()
  {
    $message  = new RobotMessage();
    $title    = "标题";
    $text     = "文本信息";
    $singleTitle = "查看全文";
    $singleURL   = "http://www.baidu.com";
    $result   = $message->single_actioncard($title,$text,$singleTitle,$singleURL) ;
    $this->assertEquals($result['errmsg'], 'ok');
  }

  public function testActionCard()
  {
    $message  = new RobotMessage();
    $title    = "标题";
    $text     = "文本信息";
    $btns[0]['title']     = "title1";
    $btns[0]['actionURL'] = "http://www.baidu.com";
    $btns[1]['title']     = "title2";
    $btns[1]['actionURL'] = "http://www.baidu.com";
    $result   = $message->actioncard($title,$text,$btns,0,1) ;
    $this->assertEquals($result['errmsg'], 'ok');
  }

}
?>  
