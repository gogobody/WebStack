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
                    <img src="http://webstack.cc/assets/images/logo-collapsed@2x.png" width="40" alt="">
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
            <?php $this->widget('Widget_Metas_Category_List')->to($categorys); ?>
            <?php while ($categorys->next()): ?>
                <?php if ($categorys->levels === 0): ?>
                    <?php $children = $categorys->getAllChildren($categorys->mid); ?>
                    <?php if (empty($children)) { ?>
                        <li>
                            <a href="<?php echo '#'.$categorys->name; ?>"
                               class="smooth">
                                <i class="fa fa-<?php $categorys->slug(); ?>"></i>
                                <span class="title"><?php $categorys->name(); ?></span>
                            </a>
                        </li>
                    <?php } else { ?>
                        <li>
                            <a>
                                <i class="fa fa-<?php $categorys->slug(); ?>"></i>
                                <span class="title"><?php $categorys->name(); ?></span>
                            </a>
                            <ul>
                                <?php foreach ($children as $mid) { ?>
                                    <?php $child = $categorys->getCategory($mid); ?>
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