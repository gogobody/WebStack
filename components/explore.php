<?php
/**
 * index explore component
 */
global $explore_categories;
$categs = $this->widget("Widget_Metas_Category_List")->getCategories($explore_categories);
?>

<div class="explore-container">
    <div class="explore-content">
        <div class="title"><p>探索发现</p></div>
        <div class="tabs">
            <?php foreach ($categs as $key => $val): ?>
            <a class="<?php if ($key == 0) _e('active');?>" data-mid="<?php _e($val["mid"]); ?>"><?php _e($val["name"]);?></a>
            <?php endforeach;?>
        </div>
        <div class="separate"></div>
        <div class="details">
            <?php if (!empty($explore_categories)): ?>
            <?php $this->widget('Widget_Archive@excategory' , 'order=order&pageSize=5&type=catrgory', 'mid=' . $explore_categories[0])->to($posts); ?>
                <div class="explore-item">
                    <div class="expolre-detail">
                        <div class="detail-publish-time">
                            <div class="time">
                                <img src="<?php $this->options->themeUrl('images/adminAvatar.png')?>">
                                <div class="time-detail">
                                    <?php _e(date('Y-m-d G:i', $posts->created));?>
                                </div>
                            </div>
                            <div class="category">
                                <span>网站推荐</span>
                            </div>

                        </div>
                        <div class="detail-content">
                            <?php $posts->next();$posts->excerpt(500,'');?>
                        </div>
                        <div class="explore-images">
                            <div class="el-image">
                                <?php if ($posts->fields->pic1):?>
                                    <img src="<?php $this->options->themeUrl('images/loading.gif')?>" data-src="<?php echo $posts->fields->pic1 ?>" class="lazyload">
                                <?php endif; ?>
                            </div>
                            <div class="el-image">
                                <?php if ($posts->fields->pic2):?>
                                    <img src="<?php $this->options->themeUrl('images/loading.gif')?>" data-src="<?php echo $posts->fields->pic2 ?>" class="lazyload">
                                <?php endif; ?>
                            </div>
                            <div class="el-image">
                                <?php if ($posts->fields->pic3):?>
                                    <img src="<?php $this->options->themeUrl('images/loading.gif')?>" data-src="<?php echo $posts->fields->pic3 ?>" class="lazyload">
                                <?php endif; ?>
                            </div>

                        </div>
                        <div class="explore-sites-container">
                            <?php
                            $relatedSites = str_replace(" ", "", $posts->fields->relatedSites);
                            $relatedSites = explode("||",$relatedSites);
                            $len = min(3,count($relatedSites));
                            $link = null;
                            for ($i = 0;$i < $len;$i++):
                                $this->widget('Widget_Archive@link_' . $relatedSites[$i], 'pageSize=1&type=navigation', 'cid='.$relatedSites[$i])->to($link);
                                ?>
                                <div class="explore-sites">
                                    <a href="<?php _e($link->fields->url);?>" target="_blank" class="site">
                                        <div class="el-image">
                                            <img src="<?php $this->options->themeUrl('images/loading.gif')?>" data-src="<?php echo $link->fields->logo ?>" class="lazyload el-image__inner">
                                        </div>
                                        <span class="el-tooltip name text-ellip"><?php _e($link->title);?></span>
                                    </a>
                                    <div class="divide"></div>
                                    <p class="site-describe text-ellip"><?php echo $link->fields->text ?></p>
                                    <span class="add-to-diy"><i class="fa fa-plus-circle" aria-hidden="true"></i> </span>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            <?php else: ?>

            <?php endif;?>
        </div>
        <div class="loadmore"><button>加载更多</button></div>
    </div>
    <div class="explore-side">
        <div class="to-login">
            <a href="<?php $this->options->loginUrl()?>">
                <img src="<?php $this->options->themeUrl('images/login.png')?>" alt="登录">
                <p>登录/注册</p>
            </a>
            <a class="register" title="自定义网站" href="javascript:$.message({title:'通知',message:'开发中',type:'success'});">
                <img src="<?php $this->options->themeUrl('images/diysite.png')?>" alt="注册">
                <p>自定义网站</p>
            </a>
        </div>
        <div class="hot-rec">
            <div class="title-container">
                <img src="<?php $this->options->themeUrl('images/hot_sites.png')?>" class="title-icon">
                <p class="title">热门网站</p>
            </div>
            <div class="rec-content">
                <?php
                $sites_arr = explode("\r\n", $this->options->explore_hot_sites);
                $long = count($sites_arr);
                for ($j = 0; $j < $long; $j++):
                    $url = trim(explode("||", $sites_arr[$j])[0]);
                    $name = trim(explode("||", $sites_arr[$j])[1]);
                ?>
                <a href="<?php _e($url);?>" target="_blank" rel="noopener" class="text-ellip"><?php _e($name);?></a>
                <?php endfor;?>
            </div>
        </div>
        <div class="explore-side-banner">
            <a href="<?php $this->options->explore_help_href()?>" target="_blank" rel="noopener">
                <img class="lazyload img-fluid" src="<?php $this->options->themeUrl('images/loading.gif')?>" data-src="<?php $this->options->themeUrl('images/help.jpg')?>" alt="导航使用技巧">
            </a>
        </div>
    </div>
</div>