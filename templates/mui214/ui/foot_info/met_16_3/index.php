<?php defined('IN_MET') or exit('No permission'); ?>
<footer class='$uicss met-foot p-y-20 border-top1' m-id='{$ui.mid}' m-type='foot'>
	<div class="container text-xs-center">
		<div class="footnav">
			<if value="$ui[homeok]">
				<a href="{$c.index_url}" title="{$word.home}">{$word.home}</a>
			</if>
			<tag action="category" type="foot">
				<a href="{$m.url}" title="{$m.name}" {$m.urlnew}>{$m.name}</a>
			</tag>
		</div>
		<div class="footinfo">
			<if value="$c['met_footright'] || $c['met_footstat']">
			<span>{$c.met_footright}</span>
			</if>
			<if value="$c['met_footaddress']">
			<span>{$c.met_footaddress}</span>
			</if>
			<if value="$c['met_foottel']">
			<span>{$c.met_foottel}</span>
			</if>
			<if value="$c['met_footother']">
				<span>{$c.met_footother}</span>
			</if>
			<!--<span class="powered_by_metinfo">{$c.met_agents_copyright_foot}</span>-->
		</div>
		<ul class="met-langlist p-0 m-y-0">
		<if value="$c['met_lang_mark'] && $ui[langlist_ok]">
		<li class="vertical-align m-x-5 m-t-15" m-id='lang' m-type='lang'>
			<div class="inline-block dropup">
				<lang>
				<if value="$data['lang'] eq $v['mark']">
				<button type="button" data-toggle="dropdown" class="btn btn-outline btn-default btn-squared dropdown-toggle btn-lang">
					<if value="$ui['langlist_icon_ok']">
					<span class="flag-icon flag-icon-{$v.iconname}"></span>
					</if>
					<span >{$v.name}</span>
				</button>
				</if>
				</lang>
				<ul class="dropdown-menu dropdown-menu-right animate animate-reverse" id="met-langlist-dropdown" role="menu">
					<lang>
					<a href="{$v.met_weburl}" title="{$v.name}" class='dropdown-item'>
						<if value="$ui['langlist_icon_ok']">
						<img src="{$v.flag}" alt="{$v.name}" style="max-width:100%;">
						</if>
						{$v.name}
					</a>
					</lang>
				</ul>
			</div>
		</li>
		</if>
		<if value="$c['met_ch_lang'] && $ui['simplified']">
	        <if value="$data[lang] eq cn">
	            <li class="met-s2t  vertical-align nav-item m-x-5 m-t-15" m-id="lang" m-type="lang">
	            <div class="inline-block">
		            <button type="button" class="btn btn-outline btn-default btn-squared btn-lang btn-cntotc" data-tolang='tc'>繁体</button>
		            <elseif value="$data[lang] eq tc"/>
		            <button type="button" class="btn btn-outline btn-default btn-squared btn-lang btn-cntotc" data-tolang='cn'>简体</button>
	            </div>
	        </li>
	        </if>
	    </if>
	    </ul>
	</div>
</footer>