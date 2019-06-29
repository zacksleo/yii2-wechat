<?php
namespace zacksleo\yii2\wechat\common\handles;

use yii;
use EasyWeChat\Kernel\Contracts\EventHandlerInterface;
use zacksleo\yii2\wechat\common\models\WechatReplay;

class KeywordReplyHandler implements EventHandlerInterface
{
    public function handle($payload = [])
    {
        $contents = WechatReplay::find()->select('content')->where(['like','keyword',$payload['Content']])->orderBy('id desc')->column();
        if (!empty($contents)) {
            return implode("\n\n", $contents);
        }
        return null;
    }
}
