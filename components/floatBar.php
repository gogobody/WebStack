<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * float bar
 */
?>
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
                <a id="01" href="javascript:void(0)" rel="go-top" class="fk_service_box fk_service_upward" onclick="$('html,body').animate({scrollTop:'0px'},{duration:400,easing: 'swing'});">1</a>
                <div class="fk_service_upward_cont"><span class="fk_service_triangle"></span> <span> 返回顶部 </span></div>
                <a class="to-top" style="cursor: pointer; position: fixed; right: 38px; bottom: 38px;"
                   id="d41d8cd98f00b204e9800998ecf8427e" "><i class="icon-up-small"></i></a>
            </li>
        </ul>
    </div>
<?php endif; ?>