<?php
namespace DingTalk\Message;

/**
 * @desc 机器人消息主题
 * @author jokechat
 * @time 2017年 7月 2日 星期日 10时50分48秒 CST
 */
class RobotMessageBody
{
  public function text($content,$atMobiles,$isAtAll=false)
  {
    $msg  = [];
    $msg['msgtype']           = 'text';
    $msg['text']['content']   = $content;
    $msg['at']['atMobiles']   = $atMobiles;
    $msg['at']['isAtAll']     = $isAtAll;
    return $msg;
  }

  public function link($text,$title,$picUrl,$messageUrl)
  {
    $msg                  = [];
    $msg['msgtype']       = "link"; 
    $msg['link']['text']  = $text;
    $msg['link']['title'] = $title;
    $msg['link']['picUrl'] = $picUrl;
    $msg['link']['messageUrl'] = $messageUrl;
    return $msg;
  }                   

  public function markdown($title,$text)
  {
    $msg                  = [];
    $msg['msgtype']       = "markdown"; 
    $msg['markdown']['text']  = $text;
    $msg['markdown']['title'] = $title;
    return $msg;
  }

  public function single_actioncard($title,$text,$singleTitle,$singleURL,$hideAvatar = 0,$btnOrientation = 0) 
  {
    $msg                  = [];
    $msg['msgtype']       = "actionCard";
    $msg['actionCard']['title']       = $title;
    $msg['actionCard']['text']        = $text;
    $msg['actionCard']['singleTitle'] = $singleTitle;
    $msg['actionCard']['singleURL']   = $singleURL;
    $msg['actionCard']['hideAvatar']  =  $hideAvatar;
    $msg['actionCard']['btnOrientation'] = $btnOrientation;
    return $msg;
  }

  public function actioncard($title,$text,$btns,$hideAvatar = 0,$btnOrientation = 0) 
  {
    $msg                  = [];
    $msg['msgtype']       = "actionCard";
    $msg['actionCard']['title']       = $title;
    $msg['actionCard']['text']        = $text;
    $msg['actionCard']['btns']        = $btns;
    $msg['actionCard']['hideAvatar']  =  $hideAvatar;
    $msg['actionCard']['btnOrientation'] = $btnOrientation;
    return $msg;
  }
}


?>
