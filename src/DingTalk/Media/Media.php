<?php
namespace DingTalk\Media;
use DingTalk\Token\AccessToken;
use DingTalk\Util\Config;
use Unirest\Request\Body;
use Unirest\Request;

class Media
{
    /**
     * 上传媒体文件
     * @param string $media_type 媒体文件类型 分别有image,voice,file
     * @param string $media_path
     * @return boolean|mixed
     * 成功数据如下
     * array(5) {
     *     ["created_at"] => int(1482738460913)
     *     ["errcode"] => int(0)
     *     ["errmsg"] => string(2) "ok"
     *     ["media_id"] => string(17) "@lALOld1l6MzyzQJr"
     *     ["type"] => string(5) "image"
     *   }
     */
    public static function media_upload($media_type,$media_path)
    {
        $ddconfig                      = Config::getConfig();
        $access_token               = AccessToken::getAccessToken();
        $queryUrl 						= $ddconfig['media_upload'];
        $param["access_token"] = AccessToken::getAccessToken();
        $param['type'] 				= $media_type;

        $headers                      = array('Accept' => 'application/json');
        $files                           = array('media' => realpath($media_path));
        $body                          = Body::Multipart($param,$files);
        $response                    = Request::post($queryUrl, $headers, $body);
        $result                         = json_decode($response->raw_body,true);
        return $result;
    }
}
?>