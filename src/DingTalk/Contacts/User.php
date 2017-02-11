<?php
namespace DingTalk\Contacts;;
use DingTalk\Token\AccessToken;
use DingTalk\Util\Config;
use Unirest\Request;

/**
 * @desc 主要是对钉钉通讯录的管理
 * @author jokechat
 * @date 2016年12月25日23:08:27
 */
class User
{
    /**
     * 获取部门成员列表
     * @param number $department_id
     * @param number $offset 支持分页查询，与size参数同时设置时才生效，此参数代表偏移量
     * @param number $size 支持分页查询，与offset参数同时设置时才生效，此参数代表分页大小，最大100
     * @param string $order 支持分页查询，部门成员的排序规则，默认不传是按自定义排序；
     *                                  <li>entry_asc代表按照进入部门的时间升序，entry_desc代表按照进入部门的时间降序，</li>
     *                                 <li> modify_asc代表按照部门信息修改时间升序，modify_desc代表按照部门信息修改时间降序，</li>
     *                                 <li> custom代表用户定义(未定义时按照拼音)排序</li>
     * @return boolean|mixed
     */
    public function simplelist($department_id,$offset = 0,$size = 20,$order = "entry_asc")
    {
        $ddconfig              = Config::getConfig();
        $access_token       = AccessToken::getAccessToken();
        
        $queryUrl               = $ddconfig['user_simplelist'];
        $params                = array();
        $params['department_id']        = $department_id;
        $params['off']                        = $offset;
        $params['size']                       = $size;
        $params['order']                     = $order;
        $params["access_token"]       = $access_token;
        $headers                               = array('Accept' => 'application/json');
        $response                             = Request::get($queryUrl,$headers,$params);
        $result                                  = $response->raw_body;
        $result                                  = json_decode($result,true);
        return $result;
    }
    
    /**
     * 获取部门成员带详情
     * @param number $department_id
     * @param number $offset 支持分页查询，与size参数同时设置时才生效，此参数代表偏移量
     * @param number $size 支持分页查询，与offset参数同时设置时才生效，此参数代表分页大小，最大100
     * @param string $order 支持分页查询，部门成员的排序规则，默认不传是按自定义排序；
     *                                  <li>entry_asc代表按照进入部门的时间升序，entry_desc代表按照进入部门的时间降序，</li>
     *                                 <li> modify_asc代表按照部门信息修改时间升序，modify_desc代表按照部门信息修改时间降序，</li>
     *                                 <li> custom代表用户定义(未定义时按照拼音)排序</li>
     * @return boolean|mixed
     */
    public function list($department_id,$offset = 0,$size = 20,$order = "entry_asc")
    {
        $ddconfig              = Config::getConfig();
        $access_token       = AccessToken::getAccessToken();
    
        $queryUrl               = $ddconfig['user_list'];
        $params                = array();
        $params['department_id']        = $department_id;
        $params['off']                        = $offset;
        $params['size']                       = $size;
        $params['order']                     = $order;
        $params["access_token"]       = $access_token;
        $headers                   = array('Accept' => 'application/json');
        $response                  = Request::get($queryUrl,$headers,$params);
        $result                       = json_decode($response->raw_body,true);
        return $result;
    }
    
    /**
     * 通过unionid 获取用户userid
     * @param string $unionid
     * @return boolean|mixed
     */
    public function getUseridByUnionid($unionid)
    {
        $ddconfig                          = Config::getConfig();
        $access_token                   = AccessToken::getAccessToken();
        $queryUrl                           = $ddconfig['get_userid_by_unionid'];
        $params                            = array();
        $params['access_token']     = $access_token;
        $params['unionid']              = $unionid;
        $params["access_token"]    = $access_token;
        $headers                   = array('Accept' => 'application/json');
        $response                  = Request::get($queryUrl,$headers,$params);
        $result                       = json_decode($response->raw_body,true);
        return $result;
    }
    
    /**
     * 通过userid获取用户信息
     * @param string $userid
     * @return boolean|mixed
     */
    public function getUserInfo($userid)
    {
        $ddconfig              = Config::getConfig();
        $access_token       = AccessToken::getAccessToken();
        
        $queryUrl               = $ddconfig['user_getinfo'];
        $params                = array();
        $params['access_token']   = $access_token;
        $params['userid']              = $userid;;
        
        $headers                       = array('Accept' => 'application/json');
        $response                      = Request::get($queryUrl,$headers,$params);
        $result                           = json_decode($response->raw_body,true);
        return $result;
    }
    
    /**
     * 获取管理员列表
     * @return boolean|mixed
     */
    public function getAdmin()
    {
        $ddconfig              = Config::getConfig();
        $access_token       = AccessToken::getAccessToken();
        
        $queryUrl               = $ddconfig['get_admin'];
        $params                = array();
        $params['access_token']     = $access_token;
        
        $headers                   = array('Accept' => 'application/json');
        $response                  = Request::get($queryUrl,$headers,$params);
        $result                       = json_decode($response->raw_body,true);
        return $result;
    }
    
    /**
     * 获取企业员工人数
     * @param number $onlyActive 0:非激活人员数量，1:已经激活人员数量
     * @return boolean|mixed
     */
    public function getOrgUserCount($onlyActive = 1)
    {
        $access_token                   = AccessToken::getAccessToken();
        $queryUrl                           = "https://oapi.dingtalk.com/user/get_org_user_count";
        $params                            = array();
        $params['access_token']     = $access_token;
        $params['onlyActive']          = $onlyActive;
        $headers                            = array('Accept' => 'application/json');
        $response                           = Request::get($queryUrl,$headers,$params);
        $result                                = json_decode($response->raw_body,true);
        return $result;
    }
}
?>