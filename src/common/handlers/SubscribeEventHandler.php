<?php
namespace zacksleo\yii2\wechat\common\handles;

use yii;
use EasyWeChat\Kernel\Contracts\EventHandlerInterface;

class SubscribeEventHandler implements EventHandlerInterface
{
    public function handle($payload = [])
    {
        if ($payload['Event'] == 'subscribe') {
            $content = Yii::$app->settings->get('content', 'BeAddedReplay');
            if (!empty($content)) {
                return $content;
            }
        }
        return null;
    }
}
