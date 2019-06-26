<?php
namespace zacksleo\yii2\wechat\common\handles;

use EasyWeChat\Kernel\Contracts\EventHandlerInterface;
use zacksleo\yii2\wechat\common\models\WechatReplay;

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
                if (empty($replay)) {
                    return Yii::$app->settings->get('content', 'AutoReplay');
                    break;
                }
                return $replay->content;
                break;

            default:
                return null;
                break;
        }
    }
}
