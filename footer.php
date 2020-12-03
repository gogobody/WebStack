<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
?>

<footer class="main-footer sticky footer-type-1">
    <div class="footer-inner">
        <div class="footer-text">
            <!--今日诗词-->
            <span id="jinrishici-sentence">正在加载今日诗词....</span>
            <script src="https://sdk.jinrishici.com/v2/browser/jinrishici.js" charset="utf-8"></script>
        </div>

        <!--友情链接-->
        <?php if ($this->options->zmki_footer_links == 1): ?>
            <div class="links_zmki zmki_footer_mar">
                <span>友情链接:</span>
                <?php WebStack_Plugin::output(); ?>
            </div>
            <br>
        <?php endif; ?>

        <div class="zmki_footer_mar">
            <!--底部修改开始-->
            &copy; <?php echo date('Y'); ?>&nbsp;Theme:
            <a href="https://bbs.geekscholar.net/" target="_blank"><strong> Gogobody</strong></a>&nbsp; Design BY <a
                    href="http://webstack.cc" target="_blank"><strong>Webstack</strong></a>&nbsp; Modify BY <a
                    href="https://www.zmki.cn/5366.html" target="_blank"><strong>ZMKI</strong></a>
            &nbsp;&nbsp;版权所有:<b><?php $this->options->zmki_r(); ?></b>
            &nbsp;&nbsp;&nbsp;<a href="http://beian.miit.gov.cn/"
                                 target="_blank"><strong> <?php $this->options->zmki_icp(); ?> </strong></a>
        </div>

        <!--站点运行时间开始-->
        <div class="zmki_footer_mar">
            <script>
                (function () {
                    var bp = document.createElement('script');
                    var curProtocol = window.location.protocol.split(':')[0];
                    if (curProtocol === 'https') {
                        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
                    } else {
                        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
                    }
                    var s = document.getElementsByTagName("script")[0];
                    s.parentNode.insertBefore(bp, s);
                })();
                <?php if($this->options->zmki_time_no == '1'): ?>
            </script>
            站点已稳定运行：<SPAN id=span_dt_dt style="color: #2F889A;"></SPAN>
            <script language='javascript'>function show_date_time() {
                    window.setTimeout("show_date_time()", 1000);
                    BirthDay = new Date("<?php $this->options->zmki_time(); ?> ");
                    today = new Date();
                    timeold = (today.getTime() - BirthDay.getTime());
                    sectimeold = timeold / 1000
                    secondsold = Math.floor(sectimeold);
                    msPerDay = 24 * 60 * 60 * 1000
                    e_daysold = timeold / msPerDay
                    daysold = Math.floor(e_daysold);
                    e_hrsold = (e_daysold - daysold) * 24;
                    hrsold = Math.floor(e_hrsold);
                    e_minsold = (e_hrsold - hrsold) * 60;
                    minsold = Math.floor((e_hrsold - hrsold) * 60);
                    seconds = Math.floor((e_minsold - minsold) * 60);
                    span_dt_dt.innerHTML = '<font style=color:#C40000>' + daysold + '</font> 天 <font style=color:#C40000>' + hrsold + '</font> 时 <font style=color:#C40000>' + minsold + '</font> 分 <font style=color:#C40000>' + seconds + '</font> 秒';
                }

                show_date_time();</script>
            <?php endif; ?>
            <!--站点运行时间结束-->
        </div>
    </div>
</footer>
</div>
</div>
<script crossorigin="anonymous" integrity="sha384-rY/jv8mMhqDabXSo+UCggqKtdmBfd3qC2/KvyTDNQ6PcUJXaxK1tMepoQda4g5vB" src="//lib.baomitu.com/jquery/2.2.4/jquery.min.js"></script>
<?php if ($this->is('index')): ?>
    <script type="text/javascript">
        var href = "";
        var pos = 0;
        $("a.smooth").click(function (e) {
            $("#main-menu li").each(function () {
                $(this).removeClass("active");
            });
            $(this).parent("li").addClass("active");
            e.preventDefault();
            href = $(this).attr("href");
            pos = $(href).position().top - 30;
            $("html,body").animate({
                scrollTop: pos
            }, 500);
        });
    </script>
<?php endif; ?>
<script src="<?php $this->options->themeUrl('js/bootstrap.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/TweenMax.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/resizeable.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/joinable.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/xenon-api.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/xenon-toggles.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/xenon-custom.js'); ?>"></script>

<script src="<?php $this->options->themeUrl('js/webstack.min.js'); ?>"></script>

<script type="text/javascript">
    $(document).ready(function (){
        $('.user-info-menu .hidden-sm').click(function(){
            if($('.sidebar-menu').hasClass('collapsed')) {
                $('.has-sub.expanded > ul').attr("style","")
            } else {
                $('.has-sub.expanded > ul').show()
            }
        })
        WebStackInit()
    })

    <?php if($this->options->zmki_ah == '1'): ?>
        webStack.nightModeInit()
    <?php endif; ?>
</script>
<!--统计代码-->
<?php $this->options->zmki_tongji(); ?>
<script>
    // var _hmt = _hmt || [];
    // (function() {
    //   var hm = document.createElement("script");
    //   hm.src = "https://hm.baidu.com/hm.js?ce24fad4121e4d296c3f05d016ae4c64";
    //   var s = document.getElementsByTagName("script")[0];
    //   s.parentNode.insertBefore(hm, s);
    // })();
</script>

</body>
</html>