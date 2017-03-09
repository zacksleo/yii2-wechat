<?php
use yii\helpers\Html;
use yii\helpers\Url;
use zacksleo\yii2\wechat\assets\Asset;
use zacksleo\yii2\wechat\assets\FontAwesomeAsset;

/* @var \yii\web\View $this */
/* @var string $content */

Asset::register($this);
FontAwesomeAsset::register($this);
$array = [
    [
        'label' => '基本功能',
        'children' => [
            [
                'label' => '自动回复',
                'url' => '/wechat/replay'
            ],
            [
                'label' => '自定义菜单',
                'url' => '/wechat/menu'
            ]
        ],
    ],
    [
        'label' => '支付',
        'children' => [
            [
                'label' => '微信支付',
                'url' => '/wechat/config/wechat-pay'
            ]
        ]
    ],
    [
        'label' => '开发',
        'children' => [
            [
                'label' => '基本配置',
                'url' => '/wechat/config/wechat-basic'
            ]
        ]
    ]
];
$this->beginContent('@vendor/zacksleo/yii2-wechat/src/views/layouts/main.php');
?>
    <div class="col_side">
        <div class="menu_box" id="menuBar">
            <?php foreach ($array as $key => $vo): ?>
                <dl class="menu no_extra">
                    <dt class="menu_title" data-toggle="collapse" href="#frame_<?= $key; ?>">
                        <i class="icon_menu"
                           style="background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAASCAYAAABWzo5XAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA2ZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpBNUI5MEJDNTVCRjFFMzExOTg4QkNBRjhFMzQ3NTI1RCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo1MjdGMkMxMEYyM0UxMUUzQUMxRkZCMzNCMEJGRUFGMSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo1MjdGMkMwRkYyM0UxMUUzQUMxRkZCMzNCMEJGRUFGMSIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M2IChXaW5kb3dzKSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjIyRDFGQUM5M0JGMkUzMTE4NEFFREZDMEE3ODQ0MTIxIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkE1QjkwQkM1NUJGMUUzMTE5ODhCQ0FGOEUzNDc1MjVEIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+mrxx9gAAADdJREFUeNpi/P//PwM1AAuI2Lx5M07TfH19GYlRw8RAJTBqEB0NYqRWOqKai0YT5GiCpAYACDAAMBgZHYhuHF4AAAAASUVORK5CYII=) no-repeat;"></i>
                        <i class="access"
                           style="background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAQCAMAAAD+iNU2AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyBpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkMwODM3QTg0OEUwMjExRTU4QzM5REEyQjg1NjkwOTU4IiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOkMwODM3QTg1OEUwMjExRTU4QzM5REEyQjg1NjkwOTU4Ij4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6QzA4MzdBODI4RTAyMTFFNThDMzlEQTJCODU2OTA5NTgiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6QzA4MzdBODM4RTAyMTFFNThDMzlEQTJCODU2OTA5NTgiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz6ZG2n+AAAAJFBMVEW+vr75+fn4+PjHx8fOzs7IyMj39/fJycnGxsb19fX09PT///8nfe8OAAAADHRSTlP//////////////wAS387OAAAAT0lEQVR42qyOMQ7AMAgDDQGSNP//bx05Q7t1KBN3EjZY78HvPMPObjHJgZSwRJC9SRDT9z1Ft2UdzZW3xSVUfg1AePooRj37K+rbf7cAAwB08AiWrKDehwAAAABJRU5ErkJggg==)  no-repeat;"></i>
                        <?= $vo['label']; ?>
                    </dt>
                    <div id="frame_<?= $key; ?>" class="collapse in">
                        <?php foreach ($vo['children'] as $vo2): ?>
                            <dd class="menu_item <?= $vo2['url'] == $_SERVER['REQUEST_URI'] ? 'active' : ''; ?>">
                                <a href="<?= $vo2['url']; ?>"><?= $vo2['label']; ?></a>
                            </dd>
                        <?php endforeach; ?>
                    </div>
                </dl>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="col_main">
        <?= $content; ?>
    </div>

<?php $this->endContent() ?>