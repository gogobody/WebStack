<?php
/**
 * 基于开源项目<a href="https://github.com/WebStackPage/WebStackPage.github.io" rel="nofollow" target="_blank">WebStack</a>的一个主题，请尊重劳动成果 <ul><li>由<a href="https://bbs.geekscholar.net" rel="nofollow" target="_blank">gogobody</a>二次修改。</li> <li>适配全新暗黑模式，支持cookie保存。</li><li>设置参数已整合至后台，无需手动修改HTML。</li><li>基于钻芒二开修改</li><ul>
 *
 * @package WebStack
 * @author gogobody
 * @version 1.0 gogobody 优化版
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

$this->need('header.php');
global $categories,$hidecategries,$explore_categories; // in sidebar.php

?>

<div class="main-content">
    <div class="top-module">
        <?php if ($this->options->isSearch == 1): ?>
            <?php $this->need('search.php'); ?>
        <?php endif; ?>
        <!--顶部新增模块开始	-->
        <?php if ($this->options->one_top_main == 1): ?>
            <div class="one_top_main">
                <div class="col-lg-3 col-md-3 color-m">
                    <a class="colorful-card one_top_one" target="_blank"
                       href="<?php $this->options->one_top_main_one_url(); ?>">
                        <i class="<?php $this->options->one_top_main_one_icon(); ?>"></i><?php $this->options->one_top_main_one_name(); ?>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 color-m">
                    <a class="colorful-card one_top_two" target="_blank"
                       href="<?php $this->options->one_top_main_two_url(); ?>">
                        <i class="<?php $this->options->one_top_main_two_icon(); ?>"></i><?php $this->options->one_top_main_two_name(); ?>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 color-m">
                    <a class="colorful-card one_top_three" target="_blank"
                       href="<?php $this->options->one_top_main_three_url(); ?>">
                        <i class="<?php $this->options->one_top_main_three_icon(); ?>"></i><?php $this->options->one_top_main_three_name(); ?>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 color-m">
                    <a class="colorful-card one_top_four" target="_blank"
                       href="<?php $this->options->one_top_main_four_url(); ?>">
                        <i class="<?php $this->options->one_top_main_four_icon(); ?>"></i><?php $this->options->one_top_main_four_name(); ?>
                    </a>
                </div>
            </div>
        <?php endif; ?>

    </div>

    <?php $this->need('components/index.banner.php'); ?>

    <?php if ($this->options->use_explore) $this->need('components/explore.php'); ?>

    <?php while ($categories->next()):

        if ($hidecategries and (in_array($categories->mid,$hidecategries) or ($categories->parent and in_array($categories->parent,$hidecategries)))){continue;}
        ?>
        <?php if (count($categories->children) === 0): ?>
            <?php $this->widget('Widget_Archive@category-' . $categories->mid, 'order=order&pageSize=1000&type=navigation', 'mid=' . $categories->mid)->to($posts); ?>
            <h5 class="text-gray"><i class="fa fa-bookmark-o" id="<?php $categories->name(); ?>"></i><?php $categories->name(); ?></h5>
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


    <?php $this->need('footer.php'); ?>

