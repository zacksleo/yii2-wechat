<?php
/**
 * 左右结构，一边是图片，一边是标题，正文在下
 * @example https://mp.weixin.qq.com/s?__biz=MjM5MTQzMTk2MA==&mid=2652161109&idx=2&sn=380dca4ef9ca15f1573df1a3086b43fe&chksm=bd55c8228a2241345514a54fd9846006fdd811128a93fd29e1aee144bf618323b2e8a983df26&mpshare=1&scene=24&srcid=0421SyVTSE4Ij2KYPnrsYIgq#rd 飞扬旅游网
 * @example https://ws1.sinaimg.cn/large/675eb504ly1g2cmtko4cqj21200sm1kx.jpg 单数
 * @example https://ws1.sinaimg.cn/large/675eb504ly1g2cmu6uaiaj212a0q01jk.jpg 偶数
 * @var $number number 序号
 * @var $title string 标题
 * @var $image string 图片地址
 * @var $content string 内容
 */
?>
<?php if ($number % 2 == 1) : ?>
    <section style="border-width: 0px;border-style: none;border-color: initial;box-sizing: border-box;">
        <section>
            <section style="display: flex;justify-content: center;align-items: flex-start;padding-top: 1em;padding-bottom: 1em;box-sizing: border-box;">
                <section style="width: 70%;">
                    <section style="display: flex;justify-content:flex-start;">
                        <section>
                            <section style="width: 8em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #333333;margin-bottom: -1.6em;padding-top: 1.6em;box-sizing: border-box;"></section>
                            <section style="width: 1em;">
                                <img style="display: block; width: 100% !important; height: auto !important; visibility: visible !important;" src="https://mmbiz.qpic.cn/mmbiz_png/UuO6H0OvJ2j2ucvvglQUeCUribiaAAhHI18OhlcGTibKZiavCQMvZqS0ibje3rtGl7t6icTdV0gXia8A5TacPMAKYMNPw/640?wx_fmt=png&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1&amp;wx_co=1" crossorigin="anonymous" data-fail="0">
                                <section style="height: 7em;width: 1px;margin-right: auto;margin-left: auto;margin-top: -2px;background: rgb(51, 51, 51);"></section>
                            </section>
                        </section>
                        <section style="margin-left:-7em;margin-top: 2.2em;">
                            <section style="width: 90%;height: 7px;background: #efeeee;"></section>
                            <section style="width: 100%;display: flex;justify-content: center;">
                                <section style="width: 100%;">
                                    <img class="" data-ratio="0.604251012145749" style="display: block; width: 677px !important; height: auto !important; visibility: visible !important;" title="<?= $title; ?>" src="<?= $image; ?>" crossorigin="anonymous" data-fail="0"></section>
                            </section>
                            <section style="width: 90%;height: 7px;background: #efeeee;"></section>
                        </section>
                    </section>
                </section>
                <section style="width: 30%;margin-top: 2em;margin-left:2em;">
                    <section style="display: inline-block;border-width: 2px;border-style: solid;border-color: rgb(51, 51, 51);box-sizing: border-box;">
                        <section style="padding: 6px 10px;text-align: center;font-size: 24px;font-weight: bold;letter-spacing: 2px;box-sizing: border-box;">
                            <span style="color: #262626;"><?= $number < 10 ? '0' . $number : $number; ?></span>
                        </section>
                    </section>
                    <section class="" data-brushtype="text" style="font-size:18px;font-weight: bold;text-align: left;line-height: 1.75em;margin-top: 10px;">
                        <p><span style="color: #262626;"><?= $title; ?></span></p>
                    </section>
                </section>
            </section>
            <section data-autoskip="1" class="" style="padding-left: 1em;width: 100%;letter-spacing: 1.5px;line-height: 1.75em;box-sizing: border-box;">
                <p style="color: rgb(38, 38, 38);font-size: 13px;line-height: 24px;text-indent: 28px;">
                    <?= $content; ?>
                </p>
                <p style="font-size: 14px;"><br></p>
            </section>
        </section>
    </section>
<?php else : ?>
    <section style="border-width: 0px;border-style: none;border-color: initial;box-sizing: border-box;">
        <section>
            <section style="display: flex;justify-content: center;align-items: flex-start;padding-top: 1em;padding-bottom: 1em;box-sizing: border-box;">
                <section style="width: 30%;margin-top: 2em;">
                    <section style="display: inline-block;border-width: 2px;border-style: solid;border-color: rgb(51, 51, 51);box-sizing: border-box;">
                        <section style="padding: 6px 10px;text-align: center;font-size: 24px;font-weight: bold;letter-spacing: 2px;box-sizing: border-box;">
                            <span style="color: #262626;"><?= $number < 10 ? '0' . $number : $number; ?></span>
                        </section>
                    </section>
                    <section class="" data-brushtype="text" style="font-size:18px;font-weight: bold;text-align: left;line-height: 1.75em;margin-top: 10px;">
                        <p><span style="color: #262626;"><?= $title; ?></span></p>
                    </section>
                </section>
                <section style="width: 70%;">
                    <section style="display: flex;justify-content:flex-end;">
                        <section style="margin-right:-6.8em;margin-top: 2.2em;">
                            <section style="width: 90%;height: 7px;background: #efeeee;float: right;"></section>
                            <section style="width: 100%;display: flex;justify-content: center;">
                                <section style="width: 100%;">
                                    <img style="display: block; width: 677px !important; height: auto !important; visibility: visible !important;" title="<?= $title; ?>" src="<?= $image; ?>" crossorigin="anonymous" data-fail="0">
                                </section>
                                <section style="width: 7px;background: #efeeee;"></section>
                            </section>
                            <section style="width: 90%;height: 7px;background: #efeeee;float: right;"></section>
                        </section>
                        <section>
                            <section style="width: 8em;border-bottom-width: 1px;border-bottom-style: solid;border-bottom-color: #333333;margin-bottom: -1.6em;padding-top: 1.6em;box-sizing: border-box;"></section>
                            <section style="width: 1em;float: right;"><img style="display: block; width: 100% !important; height: auto !important; visibility: visible !important;" _width="100%" src="https://mmbiz.qpic.cn/mmbiz_png/UuO6H0OvJ2j2ucvvglQUeCUribiaAAhHI18OhlcGTibKZiavCQMvZqS0ibje3rtGl7t6icTdV0gXia8A5TacPMAKYMNPw/640?wx_fmt=png&amp;tp=webp&amp;wxfrom=5&amp;wx_lazy=1&amp;wx_co=1" crossorigin="anonymous" data-fail="0">
                                <section style="height: 7em;width: 1px;margin-right: auto;margin-left: auto;margin-top: -2px;background: rgb(51, 51, 51);"></section>
                            </section>
                        </section>
                    </section>
                </section>
            </section>
            <section data-autoskip="1" class="" style="width: 100%;">
                <p style="color: rgb(38, 38, 38);font-size: 13px;line-height: 24px;text-indent: 28px;">
                    <?= $content; ?>
                </p>
            </section>
        </section>
    </section>
<?php endif; ?>