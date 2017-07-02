<?php
namespace DingTalk\Message;
use DingTalk\Message\RobotMessageBody;
use DingTalk\Util\Curl;
class RobotMessage
{
  public static $queryUrl = "https://oapi.dingtalk.com/robot/send?access_token=70fc6cfc671edeb380e6d6e71acfe01b545bcdc60081bfd1b62573033b26c741";

  /**
   * 发送文本消息
   * @param MessageBody $messageBody
   * @param array $atMobiles 被@人的手机号 
   * @param boolean $isAtAll 是够@所有人
   * @return boolean|mixed
   */
  public function send_text($messageBody,$atMobiles,$isAtAll = false)
  {
    $body     = new RobotMessageBody();  
    $content  = $body->text($messageBody,$atMobiles,$isAtAll);
            // 设置请求头信息
    $headers[CURLOPT_HTTPHEADER]   = ["Content-type: application/json;charset='utf-8'","Accept: application/json"];
    Curl::setOption($headers);
    $result   = Curl::callWebServer(self::$queryUrl,json_encode($content),"post",true);
    return $result;
  }

  /**
   * 发送链接消息
   * @param string $text
   * @param string $title
   * @param string $picUrl
   * @param string $messageUrl
   * @return boolean|mixed
   */
  public function link($text,$title,$picUrl,$messageUrl)
  { 
    $body     = new RobotMessageBody();  
    $content  = $body->link($text,$title,$picUrl,$messageUrl);
    $headers[CURLOPT_HTTPHEADER]   = ["Content-type: application/json;charset='utf-8'","Accept: application/json"];
    Curl::setOption($headers);
    $result   = Curl::callWebServer(self::$queryUrl,json_encode($content),"post",true);
    return $result;
  }

  /**
   * 发送markdown消息
   * @param string $title
   * @param string $text
   * @return boolean|mixed
   */
  public function markdown($title,$text)
  { 
    $body     = new RobotMessageBody();  
    $content  = $body->markdown($title,$text);
    $headers[CURLOPT_HTTPHEADER]   = ["Content-type: application/json;charset='utf-8'","Accept: application/json"];
    Curl::setOption($headers);
    $result   = Curl::callWebServer(self::$queryUrl,json_encode($content),"post",true);
    return $result;
  }

  /**
   * 发送 整体跳转ActionCard类型消息
   * @param string $title
   * @param string $text
   * @param string $singleTitle
   * @param string $singleURL
   * @param number $hideAvatar
   * @param number $btnOrientation
   * @return boolean|mixed
   */
  public function single_actioncard($title,$text,$singleTitle,$singleURL,$hideAvatar = 0,$btnOrientation = 0) 
  {
    
    $body     = new RobotMessageBody();  
    $content  = $body->single_actioncard($title,$text,$singleTitle,$singleURL,$hideAvatar ,$btnOrientation) ;
    $headers[CURLOPT_HTTPHEADER]   = ["Content-type: application/json;charset='utf-8'","Accept: application/json"];
    Curl::setOption($headers);
    $result   = Curl::callWebServer(self::$queryUrl,json_encode($content),"post",true);
    return $result;
  }


  /**
   * 发送独立跳转ActionCard类型消息
   * @param string $title
   * @param string $text
   * @param array $btns
   * @param number $hideAvatar
   * @param number $btnOrientation
   * @return boolean|mixed
   */
  public function actioncard($title,$text,$btns,$hideAvatar = 0,$btnOrientation = 0) 
  {
    $body     = new RobotMessageBody();  
    $content  = $body->actioncard($title,$text,$btns,$hideAvatar ,$btnOrientation) ;
    $headers[CURLOPT_HTTPHEADER]   = ["Content-type: application/json;charset='utf-8'","Accept: application/json"];
    Curl::setOption($headers);
    $result   = Curl::callWebServer(self::$queryUrl,json_encode($content),"post",true);
    return $result;
  }
}

?>
