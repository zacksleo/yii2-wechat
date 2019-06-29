<?php
/** *
 * @var $trips $trip[] 线路详情
 * @var $trip['title'] string 标题
 * @var $trip['unit'] string 价格单位
 * @var $trip['price'] string 价格
 * @var $trip['url'] string 链接
 */
?>
<section style="font-size: 14px;line-height: 1.75em;border-width: 0px;border-style: none;border-color: initial;box-sizing: border-box;">
    <section style="text-align: center;">
        <section style="width:6em;display: inline-block;">
            <img class=" __bg_gif" style="display: block; width: 100% !important; height: auto !important; visibility: visible !important;" src="https://mmbiz.qpic.cn/mmbiz_gif/UuO6H0OvJ2j2ucvvglQUeCUribiaAAhHI1M9pBL3ZzIwL1j8xkqpfldY8ROdlz2KVcNtk9bDVnZyice0BzTr5fibCQ/640?wx_fmt=gif&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1">
        </section>
    </section>
</section>

<p style="font-size: 14px;line-height: 1.75em;text-align: center;">
    <span style="font-size: 20px;">快</span>
    <span style="font-size: 13px;">开启您的旅程吧！</span>
    <span style="font-size: 12px;"></span>
</p>
<?php foreach ($trips as $trip) : ?>
    <section style="border-width: 0px;border-style: none;border-color: initial;box-sizing: border-box;">
        <section style="width: 100%;background-image: initial;background-attachment: initial;background-color: #b3d9dd;background-size: initial;background-origin: initial;background-clip: initial;background-position: initial;background-repeat: initial;" data-width="100%">
            <section style="padding: 1em;box-sizing: border-box;">
                <section style="box-shadow: rgba(0, 0, 0, 0.772549) 0px 2px 10px;border-radius: 10px;box-sizing: border-box;background-image: initial;background-attachment: initial;background-color: rgb(254, 254, 254);background-size: initial;background-origin: initial;background-clip: initial;background-position: initial;background-repeat: initial;">
                    <section style="border-radius: 10px;box-sizing: border-box;background-image: url(&quot;https://mmbiz.qpic.cn/mmbiz_png/UuO6H0OvJ2j2ucvvglQUeCUribiaAAhHI1DD5ojIdWnnBAhJwzv8o8wFC644nKOHOn9j6gZH8Cx8DZarLYicB7aWQ/640?wx_fmt=png&quot;);background-attachment: initial;background-color: initial;background-size: 8em;background-origin: initial;background-clip: initial;background-position: 0% 0%;background-repeat: no-repeat;">
                        <section class="" data-brushtype="text" style="color: rgb(255, 255, 255);font-size: 14px;line-height: 1.75em;text-align: left;padding-top: 2px;padding-left: 10px;box-sizing: border-box;">
                            <span style="color: #262626;">出行推荐</span>
                        </section>
                        <section data-autoskip="1" class="" style="padding: 1em;box-sizing: border-box;">
                            <p style="color: rgba(0, 0, 0, 0.709804);font-size: 14px;line-height: 1.75em;">
                                <span style="color: #333333;font-size: 20px;"><?= $trip['title']; ?></span>
                            </p>
                            <p style="text-align: center;"><span style="font-family: 'Microsoft YaHei';line-height: 32px;">
                                    <span style="font-size: 20px;"><?= $trip['unit']; ?></span>
                                    <span style="font-size: 24px;"><?= $trip['price']; ?></span>
                                </span>
                            </p>
                            <p style="text-align: right;">
                                <span style="line-height: 32px;font-family: 'Microsoft YaHei';font-size: 12px;background-color: initial;">发团日期：<?= $trip['depart_date']; ?></span>
                            </p>
                            <section style="border-width: 0px;border-style: none;border-color: initial;box-sizing: border-box;">
                                <section style="text-align: center;">
                                    <section style="display: inline-block;">
                                        <section data-bgless="spin" data-bglessp="80" style="margin-bottom: -24px;margin-left: -6px;height: 0px;width: 0px;border-top:8px solid transparent;border-right:12px solid rgba(0, 0, 0, 0.76);border-bottom:12px solid transparent;transform: rotate(-15deg);-webkit-transform: rotate(-15deg);-moz-transform: rotate(-15deg);-ms-transform: rotate(-15deg);-o-transform: rotate(-15deg);">
                                        </section>
                                        <section style="width: 10px;height: 5px;border-radius: 50px 50px 0px 0px;float: right;box-sizing: border-box;background-color: rgba(0, 0, 0, 0.658824);">
                                        </section>
                                        <section style="clear: both;border-width: 1px;border-style: solid;border-color: rgba(0, 0, 0, 0.64);padding: 1px 5px;transform: rotate(0deg);">
                                            <section class="" data-brushtype="text" style="border-width: 1px;border-style: solid;border-color: rgba(0, 0, 0, 0.64);padding: 4px 1em;box-sizing: border-box;">
                                                <?php if (isset($trip['appid'])) : ?>
                                                    <a data-miniprogram-appid="<?= $trip['appid']; ?>" data-miniprogram-path="<?= $trip['url']; ?>" href="<?= $trip['url']; ?>">点我了解详情</a>
                                                <?php else : ?>
                                                    <a href="<?= $trip['url']; ?>" data-linktype="2">点我了解详情</a>
                                                <?php endif ?>
                                            </section>
                                        </section>
                                        <section data-bgless="spin" data-bglessp="20" style="width:1.2em;height: 6px;background: #7edcdc;float: right;margin-right: 20px;margin-top: -4px;transform: skew(-15deg);-webkit-transform: skew(-15deg);-moz-transform: skew(-15deg);-ms-transform: skew(-15deg);-o-transform: skew(-15deg);">
                                        </section>
                                    </section>
                                </section>
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
<?php endforeach; ?>