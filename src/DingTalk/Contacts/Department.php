<?php
namespace DingTalk\Contacts;;
use DingTalk\Token\AccessToken;
use DingTalk\Util\Config;
use Unirest\Request;

class Department
{
    /**
     * 获取部门列表
     * @param string $id 部门id
     * @return boolean|mixed
     * 查询成功时 返回数据如下
     * {"department":[{"autoAddUser":false,"createDeptGroup":false,"id":16175771,"name":"1231","parentid":1}],"errcode":0,"errmsg":"ok"}
     */
    public function list($id)
    {
        $ddconfig              = Config::getConfig();
        $access_token       = AccessToken::getAccessToken();
        $queryUrl               = $ddconfig['department_list'];
        $params                 = array();
        $params['access_token']         = $access_token;
        $params['id']                          = $id;
        $headers                   = array('Accept' => 'application/json');
        $response                  = Request::get($queryUrl,$headers,$params);
        $result                       = json_decode($response->raw_body,true);
        return $result;
    }
    
    /**
     * 获取部门列表详情
     * @param string $id 部门id
     * @return boolean|mixed
     */
    public function list_detail($id)
    {
        $ddconfig              = Config::getConfig();
        $access_token       = AccessToken::getAccessToken();
        $queryUrl               = $ddconfig['department_list_detail']."access_token=".$access_token;
        $params                = array();
        $params['access_token']         = $access_token;
        $params['id']                          = $id;
        $headers                   = array('Accept' => 'application/json');
        $response                  = Request::get($queryUrl,$headers,$params);
        $result                       = json_decode($response->raw_body,true);
        return $result;
    }
    
    
}
?>