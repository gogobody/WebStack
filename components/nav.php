<?php
/**
 * nav bar
 */
?>
<nav class="navbar user-info-navbar" role="navigation">
    <ul class="user-info-menu left-links list-inline list-unstyled">
        <li class="hidden-xs">
            <a href="#" data-toggle="sidebar">
                <i class="fa-bars"></i>
            </a>
        </li>
        <li class="hover-line"><a href="<?php $this->options->siteUrl(); ?>"><i class="fa fa-home  "></i> 首页</a></li>
        <li class="hover-line"><a href="<?php $this->options->zmki_links(); ?>"><i class="fa fa-plus-square  "></i> 收录提交</a></li>
        <li class="hover-line"><a href="<?php $this->options->zmki_url(); ?>" target="_blank"><i class="fa fa-heart xiaotubiao" style="color: #fb5962;"></i>&nbsp;<?php $this->options->zmki_name(); ?></a></li>
        <?php if ($this->options->zmki_ah == 1): ?>
            <li class="zmki_yldh">
                <a href="javascript:switchNightMode()" target="_self" title="切换模式">
                    <svg width="15px" height="15px" viewBox="0 0 1029 1024"><path d="M574.049837 1023.363002C833.211234 1000.689318 1027.89473 780.852556 1027.759754 525.275556c-2.170885-24.813325-25.91564-42.182903-50.728965-40.012018-13.785181 1.206047-27.087943 7.926166-34.394213 19.677939-50.075325 62.721947-123.895405 108.074316-209.363526 115.551808-168.179204 14.713774-315.334445-111.318772-330.048219-279.497977-7.718701-88.225156 21.368905-168.557891 77.199512-229.00522 7.54748-8.994737 11.855505-23.262336 10.649458-37.047517-2.170885-24.813325-23.158603-42.424112-48.213138-43.010264-251.717649 44.247555-431.409918 276.663451-408.495024 538.581884 23.638522 270.189541 266.73762 476.728543 539.684198 452.848811z" fill="#FFB948"></path></svg>
                </a>
            </li>
        <?php endif; ?>
        <?php if ($this->options->weather):?>
        <!--心知天气开始-->
        <!--由于默认调用的免费版每分钟20次API调用限制，如有需求可前往知心天气官网购买服务配置-->
        <li class="hidden-sm hidden-xs weather">
            <div id="tp-weather-widget">
        </li>
        <?php endif; ?>

    </ul>
    <ul class="user-info-menu right-links list-inline list-unstyled">
        <li class="hidden-sm hidden-xs" style="min-height: 75px;">
            <a href="https://github.com/gogobody/WebStack" target="_blank">
                <i class="fa-github"></i>  GitHub
            </a>
        </li>
    </ul>
</nav>

