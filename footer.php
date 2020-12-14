<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('components/floatBar.php')
?>

<footer class="main-footer sticky footer-type-1">
    <div class="footer-inner">
        <div class="footer-text">
            <!--今日诗词-->
            <span id="jinrishici-sentence">正在加载今日诗词....</span>
            <script src="https://sdk.jinrishici.com/v2/browser/jinrishici.js" charset="utf-8"></script>
        </div>

        <!--友情链接-->
        <?php if ($this->options->one_footer_links == 1): ?>
            <div class="links_zmki one_footer_mar">
                <span>友情链接:</span>
                <?php WebStack_Plugin::output(); ?>
            </div>
            <br>
        <?php endif; ?>

        <div class="one_footer_mar">
            <!--底部修改开始-->
            &copy; <?php echo date('Y'); ?>&nbsp;Theme:
            <a href="https://github.com/gogobody/WebStack" target="_blank"><strong> WebStack</strong></a>&nbsp; Design BY <a
                    href="http://webstack.cc" target="_blank"><strong>Webstack</strong></a>&nbsp; Modify BY <a
                    href="https://bbs.geekscholar.net/d/35-webstack" target="_blank"><strong>GOGOBODY</strong></a>
            &nbsp;&nbsp;版权所有:<b><?php $this->options->one_r(); ?></b>
            &nbsp;&nbsp;&nbsp;<a href="http://beian.miit.gov.cn/"
                                 target="_blank"><strong> <?php $this->options->one_icp(); ?> </strong></a>
        </div>

        <!--站点运行时间开始-->
        <div class="one_footer_mar">
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
                <?php if($this->options->one_time_no == 1): ?>
            </script>
            站点已稳定运行：<SPAN id=span_dt_dt style="color: #2F889A;"></SPAN>
            <script>
                function show_date_time() {
                    window.setTimeout("show_date_time()", 1000);
                    var BirthDay = new Date("<?php $this->options->one_time(); ?> ");
                    var today = new Date();
                    var timeold = (today.getTime() - BirthDay.getTime());
                    var sectimeold = timeold / 1000
                    var secondsold = Math.floor(sectimeold);
                    var msPerDay = 24 * 60 * 60 * 1000
                    var e_daysold = timeold / msPerDay
                    var daysold = Math.floor(e_daysold);
                    var e_hrsold = (e_daysold - daysold) * 24;
                    var hrsold = Math.floor(e_hrsold);
                    var e_minsold = (e_hrsold - hrsold) * 60;
                    var minsold = Math.floor((e_hrsold - hrsold) * 60);
                    var seconds = Math.floor((e_minsold - minsold) * 60);
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
</div>
<?php $nowpage = null;
if ($this->is('index')) $nowpage = 'index'; else $nowpage = 'page';
echo '<script>npage="' . $nowpage . '";siteUrl="'.$this->options->siteUrl.'";gindex="'.$this->options->index.'"</script>' ?>
<script src="https://cdn.bootcdn.net/ajax/libs/lazysizes/1.1.3/lazysizes.min.js" async=""></script>
<!--<script src="https://cdn.bootcdn.net/ajax/libs/jquery/2.2.4/jquery.min.js"></script>-->
<script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--<script src="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js"></script>
<script src="https://cdn.bootcdn.net/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<?php if ($this->options->usecdn):?>
<script src="https://cdn.jsdelivr.net/gh/gogobody/WebStack/js/webstack.min.js"></script>
<?php else:?>
<script src="<?php $this->options->themeUrl('js/webstack.min.js'); ?>"></script>
<?php endif ?>
<script type="text/javascript">
    WebStackInit();<?php if($this->options->one_ah == 1): ?>webStack.nightModeInit()<?php endif; ?>
</script>
<!--统计代码-->
<?php $this->options->one_tongji(); ?>

</body>
</html>