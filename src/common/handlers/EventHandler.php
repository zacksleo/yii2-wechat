<?php
namespace zacksleo\yii2\wechat\common\handles;

use EasyWeChat\Kernel\Contracts\EventHandlerInterface;
use zacksleo\yii2\wechat\common\models\WechatReplay;
use yii;

class EventHandler implements EventHandlerInterface
{
    public function handle($payload = [])
    {
        switch ($payload['MsgType']) {
            case 'event':
            if ($payload['Event'] == 'subscribe') {
                $content = Yii::$app->settings->get('content', 'BeAddedReplay');
                return $content;
            }
                return null;
                break;
            case 'text':

                $replay = WechatReplay::find()->where(['like','keyword',$payload['Content']])->one();
                if (!empty($replay)) {
                    return $replay->content;
                }
                $content = Yii::$app->settings->get('content', 'AutoReplay');
                if (!empty($content)) {
                    return $content;
                }
                return null;
                break;

            default:
                return null;
                break;
        }
    }
}
