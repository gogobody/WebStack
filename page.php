<?php
/**
 * 关于
 * 
 * @package custom
 *
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php'); ?>
         <div class="main-content">
             <div class="">
                <div class="panel panel-default">
                    <!-- 关于网站 -->
                    <h4 class="text-gray">关于网站</h4>
                    <div class="panel-body">
                        <div class="">
                            <div class="content col-sm-12">
                                <!--<blockquote>-->
                                    <?php $this->content(); ?>
                                </blockquote>
                            </div>
                            <div class="comments">
                             <?php $this->need('comments.php'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <!-- Main Footer -->
 <?php $this->need('footer.php'); ?>
   