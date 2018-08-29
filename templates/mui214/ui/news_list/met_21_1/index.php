<?php defined('IN_MET') or exit('No permission'); ?>
<div class="$uicss met-index-body met-index-news <if value="$ui['bg_type']">bgcolor<else/>bgpic</if>" m-id='{$ui.mid}'>
    <div class="container">
        <div class="invisible clearfix " data-plugin="appear" data-animate="slide-top" data-repeat="false">
            <h2 class="pull-md-left pull-xs-left">
                {$ui.title}
                <span class="desc">{$ui.desc}</span>
            </h2>
                <tag action="category" cid="$ui['id']" type="current">
                    <a href="{$m.url}" title="{$m.name}" class="more pull-right">{$ui.more}</a>
                </tag>
        </div>
        <div class="row">
<?php
    $scale=520/344;
?>
            <ul class="slider  col-md-5 newsad" id="newsad" data-scale='{$scale}'>
                <tag action="list" cid="$ui['id']" num="$ui['imgnewsnum']">
                    <li>
                    <a href="{$v.url}" target="_blank" title="{$v.title}">
                        <img class="cover-image" 
                             src="{$v.imgurl|thumb:$ui[left_img_width],$ui[left_img_right]}" 
                             srcset='{$v.imgurl|thumb:$ui[left_img_width],$ui[left_img_right]} 767w,{$v.imgurl|thumb:$ui[left_img_width],$ui[left_img_right]}' 
                             sizes="(max-width: 767px) 767px" 
                             alt="{$v.alt}">
                    </a>
                    <h4 class="news_name">
                        <a href="{$v.url}" target="_blank" title="{$v.title}">
                        {$v.title}
                        </a>
                    </h4>
                    </li>
                </tag>
            </ul>
            <ul class="newslist content col-md-7">
                <tag action="list" cid="$ui['id']" num="$ui['num']">
                    <if value="$v['_index'] egt $ui['imgnewsnum']">
                       <li>
<?php
    $description = mb_substr($v['description'],0,$ui['desclen'],'utf-8').'...';
?>
                            <div class="media media-lg">
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="{$v.url}" title="{$v.title}" {$metblank}>
                                            {$v.title}
                                        </a>
                                    </h4>
                                    <p class="des">{$description}</p>
                                </div>
                            </div>
                        </li>
                    </if>
                </tag>
            </ul>
        </div>
    </div>
</div>