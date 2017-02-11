<?php
namespace DingTalk\Message;
/**
 * 
 * @author jokechat
 * @date 2016年12月26日12:26:45
 */
class MessageBody
{
    /**
     * 文本消息
     * @param  $text
     * @return array
     */
    public function text($text)
    {
        $content  			= array();
        $content['content'] = $text;
        $content['type']	= "text";
        return $content;
    }
   
    /**
     * 图片消息
     * @param string $media_id
     * @return array
     */
    public function image($media_id)
    {
        $content  			= array();
        $content['media_id'] = $media_id;
        $content['type']	= "image";
        return $content;
    }
    

    /**
     * voice 消息
     * @param string $media_id 语音媒体文件id
     * @param string $duration 正整数 小于60,表示音频的时长
     * @return array
     */
    public function voice($media_id,$duration)
    {
        $content  			       = array();
        $content['media_id']  = $media_id;
        $content['type']	       = "voice";
        $content['duration']    = $duration; 
        return $content;
    }   
    
    /**
     * file消息
     * @param string $media_id 文件媒体id
     * @return array
     */
    public function file($media_id)
    {
        $content  			= array();
        $content['media_id'] = $media_id;
        $content['type']	= "file";
        return $content;
    }
    
    /**
     * link 消息
     * @param string $url 消息点击链接地址
     * @param string $picUrl 图片媒体文件id
     * @param string $title 消息标题
     * @param string $text 消息描述
     * @return array
     */
    public function link($url,$picUrl,$title,$text)
    {
        $content  			       = array();
        $content['messageUrl']  = $url;
        $content['type']	       = "link";
        $content['picUrl']    = $picUrl;
        $content['title']       = $title;
        $content['text']       = $text;
        return $content;
    }
    
    
    /**
     * @desc oa 消息格式
     * @param string $messageUrl  消息点击url
     * @param string $head_text 跳转网页标题头
     * @param string $body_title oa消息体 标题
     * @param array  $body_form oa form内容例如 $body_form 	= ['0'=>['key'=>'商品名','value'=>'恰恰瓜子 500g/包'],];
     * @param string $body_content 内容
     * @param string $body_author 作者
     * @param string $body_image 缩略图
     * @param string $body_file_count 文件个数
     * @param string $rich_num 富文本信息数目
     * @param string $rich_unit  富文本信息单位
     * @return array  返回 oa 消息格式
     */
    public static function oaMessage($messageUrl,$head_text,$body_title,$body_form,$body_content,$body_author,$body_image = null,$body_file_count = null,$rich_num = null,$rich_unit = null)
    {
        $content  						= array();
        $content['type']				= "oa";
        $content['message_url']			= $messageUrl;
        $content['head']['bgcolor']		= "FFBBBBBB";
        $content['head']['text']		= $head_text;
    
    
        $content['body']['title'] 		= $body_title;
        $content['body']['form'] 		= $body_form;
    
        $content['body']['content'] 	= $body_content;
        $content['body']['image'] 		= $body_image;
        $content['body']['file_count'] 	= $body_file_count;
        $content['body']['author'] 		= $body_author;
        $content['body']['rich']['num'] = $rich_num;
        $content['body']['rich']['unit'] 	= $rich_unit;
    
        return $content;
    }
    
}
?>