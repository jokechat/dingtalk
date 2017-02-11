<?php
use DingTalk\Media\Media;

class MediaTest extends PHPUnit_Framework_TestCase
{
    public function testUpload()
    {
        $media            = new Media();
        $media_path    = "/Users/jokechat/Desktop/logo.png";
        $result             = $media->media_upload("image", $media_path);
        $this->assertArrayHasKey("media_id", $result);
    }
}

?>