<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
global $categories,$hidecategries;
if (!$categories or !$hidecategries){
    $hidecategries = $this->options->hidecategories;
    $hidecategries = str_replace(" ", "", $hidecategries);
    $hidecategries = explode("||",$hidecategries);
    $categories = null;
    $this->widget('Widget_Metas_Category_List')->to($categories);
}
?>

<div class="sidebar-menu toggle-others fixed">
    <div class="sidebar-menu-inner">
        <header class="logo-env">
            <!-- logo -->
            <div class="logo">
                <a href="<?php $this->options->siteUrl(); ?>" class="logo-expanded">
                    <img class="logo_size" src="<?php $this->options->Biglogo(); ?>" width="100%"
                         alt="<?php $this->options->IndexName(); ?>"/>
                </a>
                <a href="<?php $this->options->siteUrl(); ?>" class="logo-collapsed">
                    <img src="<?php $this->options->smalllogo(); ?>" width="40" alt="<?php $this->options->IndexName(); ?>">
                </a>
            </div>
            <div class="mobile-menu-toggle hidden-less-ipad">
                <a href="#" data-toggle="user-info-menu">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                </a>
                <a data-toggle="mobile-menu" href="#">
                    <i class="fa-bars"></i>
                </a>
            </div>
        </header>
        <ul id="main-menu" class="main-menu">

            <?php while ($categories->next()):
                if ($hidecategries and in_array($categories->mid,$hidecategries)){continue;}
                ?>
                <?php if ($categories->levels === 0): ?>
                    <?php $children = $categories->getAllChildren($categories->mid); ?>
                    <?php if (empty($children)) { ?>
                        <li>
                            <a href="<?php echo '#'.$categories->name; ?>"
                               class="smooth">
                                <i class="fa fa-<?php $categories->slug(); ?>"></i>
                                <span class="title"><?php $categories->name(); ?></span>
                            </a>
                        </li>
                    <?php } else { ?>
                        <li>
                            <a>
                                <i class="fa fa-<?php $categories->slug(); ?>"></i>
                                <span class="title"><?php $categories->name(); ?></span>
                            </a>
                            <ul>
                                <?php foreach ($children as $mid) { ?>
                                    <?php $child = $categories->getCategory($mid); ?>
                                    <li>
                                        <a href="<?php echo '#'.$child['name']; ?>"
                                           class="smooth"><?php echo $child['name']; ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php } ?>
                <?php endif; ?>
            <?php endwhile; ?>
            <li class="submit-tag">
                <a href="<?php $this->options->Isabout(); ?>">
                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                    <span class="smooth">关于本站</span>
                    <span class="label label-Primary pull-right hidden-collapsed">♥</span>
                </a>
            </li>
        </ul>
    </div>
</div>