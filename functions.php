<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
require_once("core/core.php");
function themeConfig($form) {
    ?>
    <div class="j-setting-contain">
    <link href="<?php $options = Helper::options();
    $options->themeUrl('css/one.setting.min.css');?>" rel="stylesheet" type="text/css" />
    <div>
        <div class="j-aside">
            <div class="logo">Webstack <?php echo OneVersion() ?><br><small>by gogobody</small></div>
            <ul class="j-setting-tab">
                <li data-current="j-setting-notice">最新公告</li>
                <li data-current="j-setting-global">公共设置</li>
                <li data-current="j-setting-image">图片设置</li>
                <li data-current="j-setting-module">模块设置</li>
                <li data-current="j-setting-color">色彩设置</li>
                <li data-current="j-setting-other">其他设置</li>
            </ul>
            <?php require_once("core/backup.php"); ?>
        </div>
    </div>
    <span id="j-version" style="display: none;"><?php echo OneVersion() ?></span>
    <div class="j-setting-notice">
        <iframe width="100%" height="100%" frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="yes" allowtransparency="yes" src="https://bbs.geekscholar.net/d/35-webstack"></iframe>
    </div>
    <script src="<?php $options->themeUrl('js/one.setting.min.js');?>"></script>
    <?php

    $options = Helper::options();
    /**
     * 全局设置
     */
    $weatheropen = new Typecho_Widget_Helper_Form_Element_Radio('weather', array(0 => _t('禁用'), 1 => _t('启用')), 1, _t('天气开关'), _t("是否开启天气"));
    $weatheropen->setAttribute('class', 'j-setting-content j-setting-global');
    $form->addInput($weatheropen);

    $usecdn = new Typecho_Widget_Helper_Form_Element_Radio('usecdn', array(0 => _t('禁用'), 1 => _t('启用')), 0, _t('使用CDN'), _t("是否开启CDN，js和css 会直接从cdn加载"));
    $usecdn->setAttribute('class', 'j-setting-content j-setting-global');
    $form->addInput($usecdn);


    // 手机端每行显示数量
    $one_wapsl = new Typecho_Widget_Helper_Form_Element_Radio('one_wapsl', array(0 => _t('单栏'), 1 => _t('双栏'), 2 => _t('三栏')), 0, _t('手机端栏目数量'), _t("选择相应的栏目数量,手机端每行将显示不同数量的布局。此功能可避免页面过于庸长，默认单栏，推荐双栏显示 <br>注意：如调整失效，请刷新请浏览器缓存"));
    $one_wapsl->setAttribute('class', 'j-setting-content j-setting-global');
    $form->addInput($one_wapsl);

    // PC端每行显示数量
    $one_pcsl = new Typecho_Widget_Helper_Form_Element_Radio('one_pcsl', array(0 => _t('单栏'), 1 => _t('双栏'), 2 => _t('三栏'), 3 => _t('四栏'), 4 => _t('五栏'), 5 => _t('六栏'), 6 => _t('七栏'), 7 => _t('八栏')), 3, _t('PC端栏目数量'), _t("选择相应的栏目数量,PC每行将显示不同数量的布局。默认4栏，为美观考虑推荐设置4-6栏<br>注意：如调整失效，请刷新请浏览器缓存"));
    $one_pcsl->setAttribute('class', 'j-setting-content j-setting-global');
    $form->addInput($one_pcsl);

    // 暗黑开关
    $one_ah = new Typecho_Widget_Helper_Form_Element_Radio('one_ah', array(0 => _t('禁用'), 1 => _t('启用')), 1, _t('暗黑模式开关'), _t("是否开启前台暗黑模式开关，开启后网站会在晚22点-早6点夜间自动开启黑暗模式; 请放心，此功能会保存cooke方便使用"));
    $one_ah->setAttribute('class', 'j-setting-content j-setting-global');
    $form->addInput($one_ah);

    // IPC备案号
    $one_icp = new Typecho_Widget_Helper_Form_Element_Text('one_icp', NULL, '豫ICP备12222222号', _t('ICP备案号'), _t('如果在国内已进行备案，可在此处填写icp备案号;如:豫ICP备12222222号。备案号超链接将会被跳转至工信部网站 '));
    $one_icp->setAttribute('class', 'j-setting-content j-setting-global');
    $form->addInput($one_icp);

    // 是否开启网站运算时间
    $one_time_no = new Typecho_Widget_Helper_Form_Element_Radio('one_time_no', array(0 => _t('禁用'), 1 => _t('启用')), 1, _t('是否开启网站运算时间'), _t("选择开启即会在网站底部栏显示网站已运行时间。如开启请不要忘记设置下边的创建时间"));
    $one_time_no->setAttribute('class', 'j-setting-content j-setting-global');
    $form->addInput($one_time_no);

    // 网站运行时间
    $one_time = new Typecho_Widget_Helper_Form_Element_Text('one_time', NULL, '5/12/2020 11:13:14', _t('网站运行时间'), _t('默认: 1/1/2019 11:13:14  请按照前边的实例按格式填写创建时间，分别是月/日/年 时:分:秒 '));
    $one_time->setAttribute('class', 'j-setting-content j-setting-global');
    $form->addInput($one_time);

    // 统计代码
    $one_tongji = new Typecho_Widget_Helper_Form_Element_Text('one_tongji', NULL, ' ', _t('统计代码'), _t('body标签内，请放入CNZZ或百度统计代码'));
    $one_tongji->setAttribute('class', 'j-setting-content j-setting-global');
    $form->addInput($one_tongji);

    // 底部版权
    $one_r = new Typecho_Widget_Helper_Form_Element_Text('one_r', NULL, 'GOGOBODY', _t('网站底部版权'), _t('V0.4.3已新增自定义底部版权，请保留前方作者链接。谢谢！默认 GOGOBODY'));
    $one_r->setAttribute('class', 'j-setting-content j-setting-global');
    $form->addInput($one_r);


    /**
     * 图片设置
     */
    $JLazyLoad = new Typecho_Widget_Helper_Form_Element_Text(
        'JLazyLoad',
        NULL,
        NULL,
        '全局懒加载图（非必填）',
        '介绍：用于修改全局懒加载图片 <br />
         格式：base64 或者 图片url'
    );
    $JLazyLoad->setAttribute('class', 'j-setting-content j-setting-image');
    $form->addInput($JLazyLoad);

    // 大logo
    $Biglogo = new Typecho_Widget_Helper_Form_Element_Text('Biglogo', NULL, '/usr/themes/WebStack/images/logo.png', _t('大LOGO地址'), _t('大logo地址，尺寸178*40'));
    $Biglogo->setAttribute('class', 'j-setting-content j-setting-image');
    $form->addInput($Biglogo);

    // 小logo
    $smalllogo = new Typecho_Widget_Helper_Form_Element_Text('smalllogo', NULL, '/usr/themes/WebStack/images/logo-collapsed@2x.png', _t('小LOGO地址'), _t('收缩后的小logo地址，尺寸80*80'));
    $smalllogo->setAttribute('class', 'j-setting-content j-setting-image');
    $form->addInput($smalllogo);
    /**
     * 模块设置
     */
    // nav
    $navrightUrl = new Typecho_Widget_Helper_Form_Element_Text('navrightUrl', NULL, 'https://github.com/gogobody/WebStack', _t('顶部导航栏右侧链接'), _t('输入你的顶部导航栏右侧自定义链接，默认 https://github.com/gogobody/WebStack'));
    $navrightUrl->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($navrightUrl);

    $navrightText = new Typecho_Widget_Helper_Form_Element_Text('navrightText', NULL, 'Github', _t('顶部导航栏右侧文字'), _t('输入你的首页导航栏右侧自定义文字，默认 Github'));
    $navrightText->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($navrightText);

    $navrightIcon = new Typecho_Widget_Helper_Form_Element_Text('navrightIcon', NULL, 'fa-github', _t('顶部导航栏右侧图标'), _t('输入你的首页导航栏右侧自定义 fontawesome v 4.7 的图标，默认 fa-github'));
    $navrightIcon->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($navrightIcon);

    // 顶栏 文字自定义
    $one_name = new Typecho_Widget_Helper_Form_Element_Text('one_name', NULL, '即刻学术', _t('顶栏AD文字'), _t('输入你的首页顶栏收录提交右侧自定义文字，默认 即刻学术'));
    $one_name->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($one_name);

    // 顶栏 链接自定义
    $one_url = new Typecho_Widget_Helper_Form_Element_Text('one_url', NULL, 'https://bbs.geekscholar.net/', _t('顶栏AD链接'), _t('输入你的首页顶栏收录提交右侧文字调整的url，默认 https://bbs.geekscholar.net/'));
    $one_url->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($one_url);

    $one_links = new Typecho_Widget_Helper_Form_Element_Text('one_links', NULL, _t(Typecho_Common::url('/links.html',$options->index)), _t('收录提交URL链接'), _t('默认访问/links.html  请前往管理-独立页面设置页面并填入内容，开启评论用做收录提交页，并返回此处填写链接'));
    $one_links->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($one_links);

    $Isabout = new Typecho_Widget_Helper_Form_Element_Text('Isabout', NULL, _t(Typecho_Common::url('/about.html',$options->index)), _t('关于我们URL链接'), _t('默认访问/about.html  与上一条同理'));
    $Isabout->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($Isabout);

    // 轮播
    $JIndexCarousel = new Typecho_Widget_Helper_Form_Element_Textarea(
        'JIndexCarousel',
        NULL,
        NULL,
        '轮播图（非必填）',
        '介绍：用于显示轮播图，请务必填写正确的格式 <br />
         格式：图片地址 || 跳转链接 || 标题 （中间使用两个竖杠分隔）<br />
         其他：一行一个，一行代表一个轮播图 <br />
         例如：<br />
            https://puui.qpic.cn/media_img/lena/PICykqaoi_580_1680/0 || http://baidu.com || 百度一下 <br />
            https://puui.qpic.cn/tv/0/1223447268_1680580/0 || http://v.qq.com || 腾讯视频
         '
    );
    $JIndexCarousel->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($JIndexCarousel);
    // 推荐文章
    $JIndexRecommend = new Typecho_Widget_Helper_Form_Element_Textarea(
        'JIndexRecommend',
        NULL,
        NULL,
        '推荐（非必填，填写时请填写2个，否则不显示！）',
        '介绍：用于显示推荐文章，也可用于广告，请务必填写正确的格式 <br/>
         格式：图片地址 || 跳转链接 || 标题（中间使用两个竖杠分隔）<br />
         一行一个 <br />
         注意：如果填写的不是 4 个，将不会显示
         '
    );
    $JIndexRecommend->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($JIndexRecommend);


    // 友情链接
    $one_footer_links = new Typecho_Widget_Helper_Form_Element_Radio('one_footer_links', array(0 => _t('禁用'), 1 => _t('启用')), 1, _t('底部友情链接'), _t('是否开启底部友情链接'));
    $one_footer_links->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($one_footer_links);

    // 顶部模块
    $one_top_main = new Typecho_Widget_Helper_Form_Element_Radio('one_top_main', array(0 => _t('禁用'), 1 => _t('启用')), 1, _t('<span style="color: #608cee; margin-right:0px;">顶部</span><span style="color: #fb5962;margin-right:0px;">多色</span><span style="color: #fbb359;margin-right:0px;">模块</span><span style="color: #53bf6b;margin-right:0px;">开关</span>'), _t("是否开启网站顶部四项多色小模块"));
    $one_top_main->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($one_top_main);
    // 顶部模块 蓝色 文字自定义
    $one_top_main_one_name = new Typecho_Widget_Helper_Form_Element_Text('one_top_main_one_name', NULL, '配置手册', _t('<span style="color: #608cee; margin-right:0px;">蓝色模块文字</span>'), _t('输入顶部蓝色模块内的文字，默认 配置手册'));
    $one_top_main_one_name->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($one_top_main_one_name);

    $one_top_main_one_icon = new Typecho_Widget_Helper_Form_Element_Text('one_top_main_one_icon', NULL, 'fa fa-safari', _t('<span style="color: #608cee; margin-right:0px;">蓝色模块</span>图标'), _t('可自定义蓝色模块内文字前的fontawesome图标，使用帮助请查看:<a href="https://bbs.geekscholar.net/d/35-webstack">https://bbs.geekscholar.net/d/35-webstack</a>，蓝色默认 fa fa-safari'));
    $one_top_main_one_icon->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($one_top_main_one_icon);

    $one_top_main_one_url = new Typecho_Widget_Helper_Form_Element_Text('one_top_main_one_url', NULL, 'https://bbs.geekscholar.net/', _t('<span style="color: #608cee; margin-right:0px;">蓝色模块</span>跳转链接'), _t('输入蓝色模块跳转的链接,'));
    $one_top_main_one_url->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($one_top_main_one_url);

    // 顶部模块 红色 文字自定义
    $one_top_main_two_name = new Typecho_Widget_Helper_Form_Element_Text('one_top_main_two_name', NULL, '即刻学术', _t('<span style="color: #fb5962; margin-right:0px;">红色模块文字</span>'), _t('输入顶部红色模块内的文字，默认 向日葵全家桶'));
    $one_top_main_two_name->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($one_top_main_two_name);

    $one_top_main_two_icon = new Typecho_Widget_Helper_Form_Element_Text('one_top_main_two_icon', NULL, 'fa fa-star', _t('<span style="color: #fb5962; margin-right:0px;">红色模块</span>图标'), _t('可自定义红色模块内文字前的fontawesome图标，使用帮助请查看:<a href="https://bbs.geekscholar.net/d/35-webstack">https://bbs.geekscholar.net/d/35-webstack</a>，红色默认 fa fa-star'));
    $one_top_main_two_icon->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($one_top_main_two_icon);

    $one_top_main_two_url = new Typecho_Widget_Helper_Form_Element_Text('one_top_main_two_url', NULL, 'https://bbs.geekscholar.net', _t('<span style="color: #fb5962; margin-right:0px;">红色模块</span>跳转链接'), _t('输入红色模块跳转的链接,'));
    $one_top_main_two_url->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($one_top_main_two_url);

    // 顶部模块 黄色 文字自定义
    $one_top_main_three_name = new Typecho_Widget_Helper_Form_Element_Text('one_top_main_three_name', NULL, '关于导航', _t('<span style="color: #fbb359; margin-right:0px;">黄色模块文字</span>'), _t('输入顶部黄色模块内的文字，默认 关于导航'));
    $one_top_main_three_name->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($one_top_main_three_name);

    $one_top_main_three_icon = new Typecho_Widget_Helper_Form_Element_Text('one_top_main_three_icon', NULL, 'fa fa-registered', _t('<span style="color: #fbb359; margin-right:0px;">黄色模块</span>图标'), _t('可自定义黄色模块内文字前的fontawesome图标，使用帮助请查看:<a href="https://bbs.geekscholar.net/d/35-webstack">https://bbs.geekscholar.net/d/35-webstack</a>，黄色默认 fa fa-registered'));
    $one_top_main_three_icon->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($one_top_main_three_icon);

    $one_top_main_three_url = new Typecho_Widget_Helper_Form_Element_Text('one_top_main_three_url', NULL, 'https://bbs.geekscholar.net/d/35-webstack', _t('<span style="color: #fbb359; margin-right:0px;">黄色模块</span>跳转链接'), _t('输入黄色模块跳转的链接,'));
    $one_top_main_three_url->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($one_top_main_three_url);

    // 顶部模块 绿色 文字自定义
    $one_top_main_four_name = new Typecho_Widget_Helper_Form_Element_Text('one_top_main_four_name', NULL, '更多主题', _t('<span style="color: #53bf6b; margin-right:0px;">绿色模块文字</span>'), _t('输入顶部绿色模块内的文字，默认 更多主题'));
    $one_top_main_four_name->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($one_top_main_four_name);

    $one_top_main_four_icon = new Typecho_Widget_Helper_Form_Element_Text('one_top_main_four_icon', NULL, 'fa fa-diamond', _t('<span style="color: #53bf6b; margin-right:0px;">绿色模块</span>图标'), _t('可自定义绿色模块内文字前的fontawesome图标，使用帮助请查看:<a href="https://bbs.geekscholar.net/d/35-webstack">https://bbs.geekscholar.net/d/35-webstack</a>，绿色默认 fa fa-diamond'));
    $one_top_main_four_icon->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($one_top_main_four_icon);

    $one_top_main_four_url = new Typecho_Widget_Helper_Form_Element_Text('one_top_main_four_url', NULL, 'https://bbs.geekscholar.net', _t('<span style="color: #53bf6b; margin-right:0px;">绿色模块</span>跳转链接'), _t('输入绿色模块跳转的链接,'));
    $one_top_main_four_url->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($one_top_main_four_url);

    $isSearch = new Typecho_Widget_Helper_Form_Element_Radio('isSearch', array(0 => _t('禁用'), 1 => _t('启用')), 1, _t('<svg  class="icon one_aliico" aria-hidden="true"><use xlink:href="#icon-battery"></use></svg> 搜索功能'), _t("是否启用搜索"));
    $isSearch->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($isSearch);

    $isLink = new Typecho_Widget_Helper_Form_Element_Radio('isLink', array(0 => _t('禁用'), 1 => _t('启用')), 1, _t('跳转功能'), _t("是否启用直接跳转"));
    $isLink->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($isLink);

    // 右侧悬浮窗开启
    $fk_zmki = new Typecho_Widget_Helper_Form_Element_Radio('fk_zmki', array(0 => _t('禁用'), 1 => _t('启用')), 1, _t('<svg  class="icon one_aliico" aria-hidden="true"><use xlink:href="#icon-position"></use></svg> 右侧悬浮窗'), _t("是否开启右侧悬浮窗"));
    $fk_zmki->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($fk_zmki);

    //悬浮窗公众号
    $fk_one_gzhimg = new Typecho_Widget_Helper_Form_Element_Text('fk_one_gzhimg', NULL, '/usr/themes/WebStack/images/gzhimg.png', _t('悬浮窗内公众号图片url'), _t('悬浮窗内公众号图片，默认:/usr/themes/WebStack/images/gzhimg.png 正方形即可大小自适应，此功能需开启悬浮窗才会显示'));
    $fk_one_gzhimg->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($fk_one_gzhimg);

    //悬浮窗公众号 描述
    $fk_one_gzhtext = new Typecho_Widget_Helper_Form_Element_Text('fk_one_gzhtext', NULL, '极客导航-很有范的导航站', _t('悬浮窗内公众号下描述自定义'), _t('悬浮窗内公众号图片下方自定义文字，默认极客导航-很有范的导航站，此功能需开启悬浮窗才会显示'));
    $fk_one_gzhtext->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($fk_one_gzhtext);

    // 悬浮窗QQ
    $fk_one_qq = new Typecho_Widget_Helper_Form_Element_Text('fk_one_qq', NULL, '123456789', _t('悬浮窗QQ'), _t('输入右下角悬浮窗内的qq，默认 123456789 ，此功能需开启悬浮窗才会显示'));
    $fk_one_qq->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($fk_one_qq);

    // 悬浮窗email
    $fk_one_email = new Typecho_Widget_Helper_Form_Element_Text('fk_one_email', NULL, 'a@zmki.cn', _t('悬浮窗在线邮件'), _t('输入右下角悬浮窗内的qq，默认 a@zmki.cn ，此功能需开启悬浮窗才会显示'));
    $fk_one_email->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($fk_one_email);

    // 悬浮窗链接名称
    $fk_one_name = new Typecho_Widget_Helper_Form_Element_Text('fk_one_name', NULL, '即刻学术', _t('悬浮窗AD 更多 名称'), _t('输入右下角悬浮窗内的更多 后的自定义文字，默认 即刻学术 ，此功能需开启悬浮窗才会显示'));
    $fk_one_name->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($fk_one_name);

    // 悬浮窗链接
    $fk_one_url = new Typecho_Widget_Helper_Form_Element_Text('fk_one_url', NULL, 'https://bbs.geekscholar.net/', _t('悬浮窗AD 更多 名称 超链接'), _t('输入右下角悬浮窗内AD的url，默认 https://bbs.geekscholar.net/，此功能需开启悬浮窗才会显示'));
    $fk_one_url->setAttribute('class', 'j-setting-content j-setting-module');
    $form->addInput($fk_one_url);

    /**
     * 色彩设置
     */
    $bgcolor = new Typecho_Widget_Helper_Form_Element_Text('bgcolor', NULL, '#f1f5f8', _t('白天模式 背景色'), _t('白天模式 背景色，默认#f1f5f8'));
    $bgcolor->setAttribute('class', 'j-setting-content j-setting-color');
    $form->addInput($bgcolor);

    $nbgcolor = new Typecho_Widget_Helper_Form_Element_Text('nbgcolor', NULL, '#2c2e2f', _t('黑夜模式 背景色'), _t('黑夜模式 背景色，默认#2c2e2f'));
    $nbgcolor->setAttribute('class', 'j-setting-content j-setting-color');
    $form->addInput($nbgcolor);

    /**
     * 其他设置
     */
    $hidecategories = new Typecho_Widget_Helper_Form_Element_Text('hidecategories', NULL, null, _t('隐藏分类'), _t('隐藏某些分类，分类 mid 用||分割，比如 1||2||3'));
    $hidecategories->setAttribute('class', 'j-setting-content j-setting-other');
    $form->addInput($hidecategories);

    $use_explore = new Typecho_Widget_Helper_Form_Element_Radio('use_explore', array(0 => _t('禁用'), 1 => _t('启用')), 1, _t('是否开启主页的探索发现功能'), _t("是否开启主页的探索发现功能"));
    $use_explore->setAttribute('class', 'j-setting-content j-setting-other');
    $form->addInput($use_explore);

    $explore_categories = new Typecho_Widget_Helper_Form_Element_Text('explore_categories', NULL, null, _t('主页探索发现分类'), _t('主页探索发现显示的分类，分类 mid 用||分割，比如 1||2||3'));
    $explore_categories->setAttribute('class', 'j-setting-content j-setting-other');
    $form->addInput($explore_categories);
}
//输出导航
function themeFields($layout) {
    $url = new Typecho_Widget_Helper_Form_Element_Text('url', NULL, NULL, _t('跳转链接'), _t('请输入跳转URL'));
    $text = new Typecho_Widget_Helper_Form_Element_Text('text', NULL, NULL, _t('链接描述'), _t('请输入链接描述'));
    $logo = new Typecho_Widget_Helper_Form_Element_Text('logo', NULL, NULL, _t('链接logo'), _t('请输入Logo URL链接'));
    // 首页探索发现
    $pic1 = new Typecho_Widget_Helper_Form_Element_Text('pic1', NULL, NULL, _t('附图1'), _t('请输入图片链接'));
    $pic2 = new Typecho_Widget_Helper_Form_Element_Text('pic2', NULL, NULL, _t('附图2'), _t('请输入图片链接'));
    $pic3 = new Typecho_Widget_Helper_Form_Element_Text('pic3', NULL, NULL, _t('附图3'), _t('请输入图片链接'));
    $relatedSites = new Typecho_Widget_Helper_Form_Element_Text(
        'relatedSites',
        NULL,
        NULL,
        '推荐网址（非必填，最多填写3个！）',
        '介绍：用于与文章相关联的网址，最多填写三个 。填写导航链接对应的mid，用 || 分隔<br/>
         格式：1||2||3<br />
         '
    );

    $layout->addItem($url);
    $layout->addItem($text);
    $layout->addItem($logo);
    $layout->addItem($pic1);
    $layout->addItem($pic2);
    $layout->addItem($pic3);
    $layout->addItem($relatedSites);
}
