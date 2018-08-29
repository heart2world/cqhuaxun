<?php defined('IN_MET') or exit('No permission'); ?>
<div class="$uicss met-index-body" m-id="{$ui.mid}">
	<div class="container">
		<div class="hd-title">
            <if value="$ui[title]">
              <?php $img=strstr($ui['icon'],"upload"); ?>
		      <if value="$img">
		      	<img src="{$ui.icon}" alt="{$ui.title}" class="hd-title-icon" />
		      </if>
            	<h2 class="iconfont hd-title-h2">{$ui.title}</h2>
            	<span class="hd-title-line"></span>
            	<tag action="category" type="current" cid="$ui[id]">
		            <if value="$ui[more]">
		            	<a href="{$m.url}" {$m.urlnew} class="hd-title-more">
		            	{$ui.more}
		            	<i class="icon pe-angle-right-circle"></i>
		            	</a>
		            </if>
		            <?php 
		                $md=$m[module];
		                $x;
		                $y;
		                if($md==3){
		                    $x=$c[met_productimg_x];
		                    $y=$c[met_productimg_y];
		                }
		                if($md==2){
		                    $x=$c[met_newsimg_x];
		                    $y=$c[met_newsimg_y];
		                }
		                if($md==5){
		                    $x=$c[met_imgs_x];
		                    $y=$c[met_imgs_y];
		                }
		             ?>
	            </tag>
            </if>
        </div>
        <div class="hd-new-con clearfix list-mv01">
            <div class="newsList hd-newsList col-lg-{$ui.lw}">
                <ul class="ulstyle imagesize">
	                <tag action="list" type="$ui[type]" cid="$ui[id]" num="$ui[lnum]">
	                 	<li class="media media-lg clearfix">
	                        <a href="{$v.url}" title="{$v.title}" {$g.urlnew} class="newsList-cover media-left">
	                        	<img class="lazy media-object" data-original="{$v.imgurl|thumb:$x,$y}"  alt="{$v.title}" />
	                        </a>
	                        <div class="newsList-des media-body">
	                            <h3 class="clearfix">
	                            	<a href="{$v.url}" title="{$v.title}" {$g.urlnew}>{$v.title}</a>
	                            </h3>
	                            <p>{$v.description}</p>
	                            <div class="newsList-des-note clearfix">
	                            	<if value="$v[tag]">
		                            	<list data="$v[tag]" name="$t">
			                            	<if value="$t">
				                            	<span class="newsList-des-noteTags">
				                            		<a href="javascript:;">{$t}</a>
				                            	</span>
			                            	</if>
		                            	</list>
	                            	</if>
	                                <span class="newsList-des-noteDate">{$ui.time}：{$v.updatetime}</span>
	                                <span>{$ui.hits}：{$v.hits}</span>
	                            </div>
	                        </div>
	                    </li>
	                </tag>
                </ul>
            </div>
            <div class="newsList02 hd-newsList02 col-lg-{$ui.rw}">
                <ul class="ulstyle">
	                <tag action="list" type="$ui[type]" cid="$ui[id]" num="$ui[rnum]">
	                	<if value="$v['_index'] egt $ui['lnum']">
	                		<li>
		                        <i class="newsList02-icon icon wb-triangle-right"></i>
		                        <h3><a href="{$v.url}" title="{$v.title}" {$g.urlnew}>{$v.title}</a></h3>
		                        <div class="newsList02-des-note clearfix">
		                            <span class="newsList-des-noteDate">{$ui.time}：{$v.updatetime}</span>
		                            <span>{$ui.hits}：{$v.hits}</span>
		                        </div>
		                    </li>
	                	</if>
	                </tag>
                </ul>
            </div>
        </div>
	</div>
</div>