<?php defined('IN_MET') or exit('No permission'); ?>
<section class="$uicss " m-id='{$ui.mid}' m-type="foot_nav">
    <div class="container">
        <div class="title-box text-xs-center">
            <div class="head">
                <h2 class="title">{$ui.title}</h2>
                <p class="desc">{$ui.desc}</p>
            </div>
        </div>
        <div class="foot-box clearfix">
            <div class="foot-input col-md-8 text-xs-left">
                <div class="met-foot-feedback clearfix">
                    <tag action="feedback.form" cid="$ui[id]"></tag>
                </div>
            </div>
            <div class="foot-info col-md-4">
                <div class="foot-img">
                    <img data-original="{$ui[foot_img]}" alt="">
                </div>
                <div class="foot-tel">
                    <span>{$ui.foot_teltext}</span>
                    <a href="tel:{$ui.foot_telnum}">{$ui.foot_telnum}</a>
                    <p>{$ui.foot_info}</p>
                    <p class="more-info">{$ui.foot_moreinfo}</p>
                </div>
            </div>
        </div>
        <!--友情链接-->    
            <tag action='link.list'></tag>
                <if value="$ui[foot_links]">
                <div class="links text-xs-center" m-id='{$ui.mid}' m-type="link">
                    <ul class="breadcrumb p-0 link-img m-0">
                        <li class='breadcrumb-item'>{$ui.link_title}</li>
                        <tag action='link.list'>
                            <li class='breadcrumb-item'>
                                <a href="{$v.weburl}" title="{$v.webname}" target="_blank">
                                <if value="$v.link_type eq 1">
                                    <img data-original="{$v.weblogo}" alt="{$v.webname}" height='40'>
                                <else/>
                                    <span>{$v.webname}</span>
                                </if>
                                </a>
                            </li>
                        </tag>
                    </ul>
                </div>
                </if>
<!--友情链接-->
    </div>

</section>