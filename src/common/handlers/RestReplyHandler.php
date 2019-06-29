<?php
namespace zacksleo\yii2\wechat\common\handles;

use yii;
use EasyWeChat\Kernel\Contracts\EventHandlerInterface;

class RestReplyHandler implements EventHandlerInterface
{
    public function handle($payload = [])
    {
        $content = Yii::$app->settings->get('content', 'AutoReplay');
        if (!empty($content)) {
            return $content;
        }
        return null;
    }
}
