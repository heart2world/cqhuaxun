<?php defined('IN_MET') or exit('No permission'); ?>
<tag action="category" type="current" cid="$data[classnow]"></tag>
<if value="$data[classnow] eq 10001||!$ui[bgcolumn]||strstr('|'.strip_tags($ui[bgcolumn]).'|','|'.strip_tags($m[name]).'|')">
<section class="$uicss lazy {$ui.bgfull}" m-id="{$ui.mid}" data-title="{$ui.bgtitle}" 
  <if value='$ui[bgimg] && !strstr($ui[bgimg],$c[met_agents_img])'>data-background="{$ui.bgimg}"</if>>
  <div class="info-box">
	<div class="container">
	  <div class="title-box">
		<div class="title-name">
		  <h3  data-plugin="appear" data-animate="slide-bottom" data-repeat="false">{$ui.newstitle}</h3>
      <p class="desc" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">{$ui.newsdesc}</p>
		</div>
        <if value="$ui[newsmoreok]">
		<div class="title-move">
		  <i class="fa fa-chevron-left"></i>
		  <i class="fa fa-chevron-right"></i>
		</div>
        </if>
	  </div>
	  <div class="info-cut index">
		<ul class="info-cut-wraper" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
          <tag action="list" type="$ui[newscom]" cid="$ui[newscolumn]" num="$ui[newsnumber]">
          <li class="info-cut-slide" >
             <a href="{$v.url}" title="{$v.title}" {$v.urlnew}>
               <img class="info-lazy" data-src="{$v.imgurl|thumb:$ui[newswidth],$ui[newsheight]}" alt="{$v.title}">
               <span>
                 <p>{$v.description}</p>
                 <i>{$word.AddDate}<em>{$v.updatetime|strtotime|date:'Y.m.d',@@}</em> <i class="icon wb-eye"><span  class="readnum">{$v.hits}</span></i></i>
                
                 <b>{$v.title}</b>
               </span>
             </a>
          </li>
          </tag>
		</div>
	  </ul>
	</div>
  </div>  
</section>
<elseif value="$_GET[pageset]" />
<section class="$uicss not-slide" m-id="{$ui.mid}" m-type="nocontent" 
  style="background:#263238;max-height:40px;text-align:center;color:#fff;line-height:40px;display:block;border-bottom:1px solid #888;">
  该栏目设置了限制显示，可在“区块显示的栏目”中添加显示（该文字仅“可视化”模式下可见）
</section>
</if>