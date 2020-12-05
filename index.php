<?php
/**
 * 基于开源项目<a href="https://github.com/WebStackPage/WebStackPage.github.io" rel="nofollow" target="_blank">WebStack</a>的一个主题，请尊重劳动成果 <ul><li>由<a href="https://bbs.geekscholar.net" rel="nofollow" target="_blank">gogobody</a>二次,内容包括新增顶栏和优化底栏及悬浮窗等N项。</li> <li>适配全新暗黑模式，支持cookie保存。</li><li>设置参数已整合至后台，无需手动修改HTML。</li><li>基于钻芒二开修改</li><ul>
 *
 * @package WebStack
 * @author gogobody 改自钻芒二开优化版V0.7.19
 * @version 1.0 gogobody 优化版
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

$this->need('header.php');
?>
<?php $this->need('sidebar.php'); ?>

<div class="main-content">
    <div class="fixpad"></div>
    <!--顶部新增模块开始	-->
    <?php if ($this->options->one_top_main == 1): ?>
        <div class="wapnone one_top_main">
            <div class="col-lg-4 wapnone">
                <a class="colorful-card one_top_one" target="_blank"
                   href="<?php $this->options->one_top_main_one_url(); ?>">
                    <i class="<?php $this->options->one_top_main_one_icon(); ?>"></i><?php $this->options->one_top_main_one_name(); ?>
                </a>
            </div>
            <div class="col-lg-4 wapnone">
                <a class="colorful-card one_top_two" target="_blank"
                   href="<?php $this->options->one_top_main_two_url(); ?>">
                    <i class="<?php $this->options->one_top_main_two_icon(); ?>"></i><?php $this->options->one_top_main_two_name(); ?>
                </a>
            </div>
            <div class="col-lg-4 wapnone">
                <a class="colorful-card one_top_three" target="_blank"
                   href="<?php $this->options->one_top_main_three_url(); ?>">
                    <i class="<?php $this->options->one_top_main_three_icon(); ?>"></i><?php $this->options->one_top_main_three_name(); ?>
                </a>
            </div>
            <div class="col-lg-4 wapnone">
                <a class="colorful-card one_top_four" target="_blank"
                   href="<?php $this->options->one_top_main_four_url(); ?>">
                    <i class="<?php $this->options->one_top_main_four_icon(); ?>"></i><?php $this->options->one_top_main_four_name(); ?>
                </a>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($this->options->isSearch == 1): ?>
        <?php $this->need('search.php'); ?>
    <?php endif; ?>
    <?php $categories = null;
    $this->widget('Widget_Metas_Category_List')->to($categories); ?>
    <?php while ($categories->next()): ?>
        <?php if (count($categories->children) === 0): ?>
            <?php $this->widget('Widget_Archive@category-' . $categories->mid, 'order=order&pageSize=1000&type=category', 'mid=' . $categories->mid)->to($posts); ?>
            <h4 class="text-gray"><i class="linecons-tag" style="margin-right: 7px;" id="<?php $categories->name(); ?>"></i><?php $categories->name(); ?></h4>
            <div class="row">
                <?php while ($posts->next()): ?>
                    <div class="col-sm-3">
                        <?php if ($this->options->isLink == 1): ?>
                            <div class="xe-widget xe-conversations box2 label-info"
                                 onclick="window.open('<?php echo $posts->fields->url; ?>', '_blank')"
                                 data-toggle="tooltip" data-placement="bottom" title=""
                                 data-original-title="<?php echo $posts->fields->url; ?>">
                                <div class="xe-comment-entry">
                                    <a class="xe-user-img">
                                        <img src="<?php $this->options->themeUrl('images/loading.gif')?>" data-src="<?php echo $posts->fields->logo; ?>" class="img-circle lazyload" width="32">
                                    </a>
                                    <div class="xe-comment">
                                        <a href="#" class="xe-user-name overflowClip_1">
                                            <strong><?php $posts->title(); ?></strong>
                                        </a>
                                        <p class="overflowClip_2"><?php echo $posts->fields->text; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="xe-widget xe-conversations box2 label-info">
                                <div class="xe-user-img">
                                    <div class="xe-comment-entry">
                                        <a href="<?php $posts->permalink() ?>"><img
                                                    src="<?php echo $posts->fields->logo; ?>" class="img-circle"
                                                    width="40">
                                            <div class="xe-comment" data-toggle="tooltip" data-placement="bottom"
                                                 title="" data-original-title="<?php echo $posts->fields->url; ?>">
                                                <strong><?php $posts->title(); ?></strong>
                                                <p class="overflowClip_2"><?php echo $posts->fields->text; ?></p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
            <br/>
        <?php else: ?>
        <?php endif; ?>
    <?php endwhile; ?>
    <?php if ($this->options->fk_zmki == 1): ?>
        <div class="wapnone fk_service">
            <ul>
                <?php if ($this->options->one_ah == 1): ?>
                    <li class="fk_service_box fk_service_zmkiah"
                        onclick="window.location.href='javascript:switchNightMode()'">
                        <div class="fk_service_zmkiah_cont"><span class="fk_service_triangle"></span>全新暗黑模式，夜间使用保护眼睛</div>
                    </li>
                <?php endif; ?>
                <li>
                    <div class="fk_service_consult_cont1" style="display: none;"><span class="fk_service_triangle"></span>
                        在线咨询
                    </div>
                </li>
                <li class="fk_service_box fk_service_consult">
                    <div class="fk_service_consult_cont"><span class="fk_service_triangle"></span>
                        <div class="fk_service_consult_cont_top"> <span class="fk_service_hint"> <span
                                        class="fk_service_icon"></span>
						<span> 如遇问题，请联系站长 </span> </span> <span class="fk_service_button"
                                                                onclick="window.open('https://wpa.qq.com/msgrd?v=3&uin=<?php $this->options->fk_one_qq(); ?>&site=qq&menu=yes')">QQ联系</span>
                            <span class="fk_service_button"
                                  onclick="window.open('https://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=<?php $this->options->fk_one_email(); ?>')">在线邮件</span>
                        </div>
                        <span class="fk_service_phone"><?php $this->options->fk_one_qq(); ?></span> <span
                                class="fk_service_check_site"> <span class="fk_service_icon"></span>
					<span onclick="window.open('<?php $this->options->fk_one_url(); ?>')">更多：<?php $this->options->fk_one_name(); ?></span> </span>
                    </div>
                </li>
                <li class="fk_service_box fk_service_qr">
                    <div class="fk_service_qr_cont"><span class="fk_service_triangle"></span>
                        <div class="fk_service_qrimg"><span class="fk_service_qrimg_site"></span> 微信扫一扫关注</div>
                        <div class="fk_service_qrtext"><span><?php $this->options->fk_one_gzhtext(); ?></span></div>
                    </div>
                </li>
                <li class="fk_service_box fk_service_feedback"
                    onclick="window.location.href='<?php $this->options->one_links(); ?>'">
                    <div class="fk_service_feedback_cont"><span class="fk_service_triangle"></span> 提交收录，站长收到留言后即刻处理！</div>
                </li>
                <li class="fk_service_box fk_service_upward " onclick="javascript:document.getElementById('01').click();"
                    style="display: block;">
                    <a id="01" href="/#" rel="go-top" class="fk_service_box fk_service_upward ">1</a>
                    <div class="fk_service_upward_cont"><span class="fk_service_triangle"></span> <span> 返回顶部 </span></div>
                    <a class="to-top" style="cursor: pointer; position: fixed; right: 38px; bottom: 38px;"
                       id="d41d8cd98f00b204e9800998ecf8427e" "><i class="icon-up-small"></i></a>
                </li>
            </ul>
        </div>
    <?php endif; ?>

    <?php $this->need('footer.php'); ?>

