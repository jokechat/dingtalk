<?php
namespace DingTalk\Token;
use DingTalk\Util\Config;
use Unirest\Request;

/**
 * d钉钉token令牌的获取与过期检查
 * @author jokechat
 * @date 2017年2月9日
 */
class AccessToken
{
    /**
     * 获取钉钉access_token
     * @return mixed|boolean
     */
	public static function getAccessToken()
	{
	    $accessToken    = self::_checkAccessToken();
	    if ($accessToken === false ) {
	        $accessToken = self::_getAccessToken();
	    }
	    return $accessToken;
	}
	
	/**
	 * 缓存中token
	 * @return mixed|boolean
	 */
	private static function _checkAccessToken()
	{
	    // 此处通常从database / redis /memcached 获取
	    $data = file_get_contents('access_token');
        $access_token = json_decode($data,true);
	    if(!empty($access_token))
	    {
	        if((time() - $access_token['time']) < 3500 )
	        {
	            return $access_token['access_token'];
	        }
	    }
	    return false;
	}
	
	/**
	 * 从钉钉服务器获取token令牌
	 * @return boolean
	 */
	private static function _getAccessToken()
	{
	    $ddconfig                  = Config::getConfig();
	    $queryUrl 				    = $ddconfig['gettoken_url'];
	    $param["corpid"] 	    = $ddconfig['corpid'];
	    $param["corpsecret"] 	= $ddconfig['corpsecret'];
	    $headers                   = array('Accept' => 'application/json');
	    $response                  = Request::get($queryUrl,$headers,$param);
	    $result                       = $response->body;
	    $result->time             = time();
	    if (property_exists($result, "access_token")) 
	    {
	        $accessToken   = $result->access_token;
	        // 此处通常会存入database / redis /memcached
	        $f = fopen('access_token', 'w+');
	        fwrite($f, json_encode($result));
	        fclose($f);
	    }else
	    {
	        $accessToken   = false;
	    }
	    return $accessToken;
	}
}
?>
