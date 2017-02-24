<ul class="nav nav-tabs">
    <li class="active">
        <a href="">被添加自动回复</a>
    </li>
    <li>
        <a href="">消息自动回复</a>
    </li>
    <li>
        <a href="">关键词自动回复</a>
    </li>
</ul>
<div class="clearfix">
    <form class="form form-horizontal" action="" method="post">
        <input type="hidden" name="id" value="">
        <div class="panel panel-default">
            <div class="panel-heading">
                自动回复
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-sm-12 col-lg-12 col-xs-12">
                        <div class="btn-group">
                            <a href="" class="btn btn-primary">文字</a>
                            <a href="" class="btn btn-default">图片</a>
                            <a href="" class="btn btn-default">语音</a>
                            <a href="" class="btn btn-default">视频</a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 col-xs-12" style="position:relative">
                        <textarea name="" class="form-control" cols="30" rows="10"></textarea>
                        <div class="help-block">
                            指定用户添加公众帐号好友时，发送的欢迎信息, 你可以在这里输入关键字, 那么用户添加公众号好友时就相当于发送这个内容至微擎系统<br>
                            这个过程是程序模拟的, 比如这里添加关键字: 欢迎关注, 那么用户添加公众号好友时, 系统相当于接受了粉丝用户的消息, 内容为"欢迎关注"
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <input name="submit" type="submit" value="提交" class="btn btn-primary col-lg-1">
                <input type="hidden" name="token" value="f20c4119">
            </div>
        </div>
    </form>
</div>
<script>
    util.emotion($("#default"), $("#defaultinput")[0]);
    util.emotion($("#welcome"), $("#welcomeinput")[0]);
    function select_keyword(clickid, menuid, inputid) {
        $(clickid).click(function () {
            var search_value = $(inputid).val();
            $('body').append('<div class="layer_bg"></div>');
            $('.layer_bg').height($(document).height());
            $('.layer_bg').css({width: '100%', position: 'absolute', top: '0', left: '0', 'z-index': '0'});
            $.post("./index.php?c=platform&a=special&do=search_key&", {'key_word': search_value}, function (data) {
                var data = $.parseJSON(data);
                var total = data.length;
                var html = '';
                if (total > 0) {
                    for (var i = 0; i < total; i++) {
                        html += '<li><a href="javascript:;">' + data[i] + '</a></li>';
                    }
                } else {
                    html += '<li><a href="javascript:;" class="no-result">没有匹配到您输入的关键字</a></li>';
                }
                $(menuid + ' ul').html(html);
                $(menuid + ' ul li a[class!="no-result"]').click(function () {
                    $('.layer_bg').remove();
                    $(inputid).val($(this).html());
                    $(menuid).hide();
                });
                $(menuid).show();
            });
            $('.layer_bg').click(function () {
                $(menuid).hide();
                $(this).remove();
            });

        });
        $(inputid).keydown(function (event) {
            if (event.keyCode == 13) {
                $(clickid).click();
                return false;
            }
        });
    }
    select_keyword('#welcome_search', '#welcome_menu', '#welcomeinput');
    select_keyword('#default_search', '#default_menu', '#defaultinput');
</script>
