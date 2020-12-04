<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <title><?php $this->archiveTitle(array(
            'category' => _t('分类 %s 下的文章'),
            'search' => _t('包含关键字 %s 的文章'),
            'tag' => _t('标签 %s 下的文章'),
            'author' => _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?><?php if ($this->is('index')): ?><?php endif; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="copyright" content="webstack_gogobody_1.0_bbs.geekscholar.net">
    <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/webstack.min.css'); ?>">
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="apple-touch-icon" href="/icon.png">
    <?php $this->header(); ?>
    <!--仿凡科 右侧悬浮窗-->
    <style>
        .fk_service_qrimg_site {
            background-image: url(<?php $this->options->fk_zmki_gzhimg(); ?>);
        }
        <?php /*单栏*/if($this->options->zmki_pcsl == 0): ?>
        .col-sm-3 {
            width: 100%;
        }
        <?php /*双栏*/elseif($this->options->zmki_pcsl == 1): ?>
        .col-sm-3 {
            width: 50%;
        }
        <?php /*三栏*/elseif($this->options->zmki_pcsl == '2'): ?>
        .col-sm-3 {
            width: 33%;
        }
        <?php /*四栏*/elseif($this->options->zmki_pcsl == '3'): ?>
        .col-sm-3 {
            width: 25%;
        }
        <?php /*五栏*/elseif($this->options->zmki_pcsl == '4'): ?>
        .col-sm-3 {
            width: 20%;
        }
        <?php /*六栏*/elseif($this->options->zmki_pcsl == '5'): ?>
        .col-sm-3 {
            width: 16.6%;
        }
        <?php /*七栏*/elseif($this->options->zmki_pcsl == '6'): ?>
        .col-sm-3 {
            width: 14.2%;
        }
        <?php /*八栏*/elseif($this->options->zmki_pcsl == '7'): ?>
        .col-sm-3 {
            width: 12.5%;
        }
        <?php endif; ?>
        @media (max-width: 768px) {
        <?php /*手机端双栏显示 常规尺寸*/if($this->options->zmki_wapsl == 0): ?>
            .col-sm-3 {
                width: 100%;
            }
        <?php elseif($this->options->zmki_wapsl == 1): ?>
            .col-sm-3 {
                width: 50%;
                float: left;
            }
            .xe-widget.xe-conversations {
                position: relative;
                background: #fff;
                margin-bottom: 0px;
            }
        <?php elseif($this->options->zmki_wapsl == '2'): ?>
            .col-sm-3 {
                width: 33%;
                float: left;
                position: relative;
                min-height: 1px;
                padding-left: 1px !important;
                padding-right: 1px !important;
            }

        <?php endif; ?>
        }
    </style>
</head>
<body class="page-body <?php echo($_COOKIE['night'] == 1 ? 'night' : ''); ?>">
<!-- skin-white -->
<div class="page-container">