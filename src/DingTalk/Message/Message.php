<?php
namespace DingTalk\Message;
use DingTalk\Token\AccessToken;
use DingTalk\Util\Config;
use DingTalk\Util\Curl;

/**
 * 钉钉企业会话消息接口
 * @author jokechat
 * @date 2016年12月26日14:47:14
 */
class Message
{
    /**
     * 向员工发送企业会话消息
     * @param string|array $userids 员工id 多个id以|分隔
     * @param array $content
     * @param string $agentid 企业应用id
     * @return boolean|mixed
     */
    public function send_to_users($userids,$content,$agentid)
    {
        if (is_array($userids)) {
            $userids    = implode("|", $userids);
        }
        $ddconfig          = Config::getConfig();
        $access_token   = AccessToken::getAccessToken();        
        $queryUrl           = $ddconfig['message_send'].'?access_token='.$access_token;
        $params            = array();
        $params['touser']                  = $userids;
        $params['agentid']                = $agentid;
        $params['msgtype']               = $content['type'];
        $params[$content['type']]      = $content; 
        // 设置请求头信息
        $headers[CURLOPT_HTTPHEADER]  	= ["Content-type: application/json;charset='utf-8'","Accept: application/json"];
        Curl::setOption($headers);
        $result         = Curl::callWebServer($queryUrl,json_encode($params),"post");
        return $result;
    }
    
    /**
     * 向部门发送企业会话消息
     * @param string| array $toparty 部门id,多个id以|分隔
     * @param array $content
     * @param string $agentid 企业应用id
     * @return boolean|mixed
     */
    public function message_send_toparty($toparty,$content,$agentid)
    {
        if (is_array($toparty)) {
            $toparty    = implode("|", $toparty);
        }
        $ddconfig                           = Config::getConfig();
        $access_token                   = AccessToken::getAccessToken();
        $queryUrl                           = $ddconfig['message_send']."access_token=".$access_token;
        $params                            = array();
        $params['toparty']               = $toparty;
        $params['agentid']              = $agentid;
        $params['msgtype']             = $content['type'];
        $params[$content['type']]['content']      = $content['content'];
        // 设置请求头信息
        $headers[CURLOPT_HTTPHEADER]  	= ["Content-type: application/json;charset='utf-8'","Accept: application/json"];
        Curl::setOption($headers);
        $result             = Curl::callWebServer($queryUrl,json_encode($params),"post");
        return $result;
    }
}
?>