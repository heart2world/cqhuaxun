<?php defined('IN_MET') or exit('No permission'); ?>
<footer class='$uicss met-foot p-y-20 border-top1' m-id='<?php echo $ui['mid'];?>' m-type='foot'>
	<div class="container text-xs-center">
		<div class="footnav">
			    <?php if($ui[homeok]){ ?>
				<a href="<?php echo $c['index_url'];?>" title="<?php echo $word['home'];?>"><?php echo $word['home'];?></a>
			<?php } ?>
			<?php
    $type=strtolower(trim('foot'));
    $cid=0;
    $column = load::sys_class('label', 'new')->get('column');

    unset($result);
    switch ($type) {
            case 'son':
                $result = $column->get_column_son($cid);
                break;
            case 'current':
                $result[0] = $column->get_column_id($cid);
                break;
            case 'head':
                $result = $column->get_column_head();
                break;
            case 'foot':
                $result = $column->get_column_foot();
                break;
            default:
                $result[0] = $column->get_column_id($cid);
                break;
        }
    $sub = count($result);
    foreach($result as $index=>$m):
        $hides = 1;
        $hide = explode("|",$hides);
        $m['_index']= $index;
        if($data['classnow']==$m['id'] || $data['class1']==$m['id'] || $data['class2']==$m['id']){
            $m['class']="";
        }else{
            $m['class'] = '';
        }
        if(in_array($m['name'],$hide)){
            unset($m['id']);
            unset($m['class']);
            $m['hide'] = $hide;
            $m['sub'] = 0;
        }


        if(substr(trim($m['icon']),0,1) == 'm' || substr(trim($m['icon']),0,1) == ''){
            $m['icon'] = 'icon fa-pencil-square-o '.$m['icon'];
        }
        $m['urlnew'] = $m['new_windows'] ? "target='_blank'" :"target='_self'";
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?>
				<a href="<?php echo $m['url'];?>" title="<?php echo $m['name'];?>" <?php echo $m['urlnew'];?>><?php echo $m['name'];?></a>
			<?php endforeach;?>
		</div>
		<div class="footinfo">
			    <?php if($c['met_footright'] || $c['met_footstat']){ ?>
			<span><?php echo $c['met_footright'];?></span>
			<?php } ?>
			    <?php if($c['met_footaddress']){ ?>
			<span><?php echo $c['met_footaddress'];?></span>
			<?php } ?>
			    <?php if($c['met_foottel']){ ?>
			<span><?php echo $c['met_foottel'];?></span>
			<?php } ?>
			    <?php if($c['met_footother']){ ?>
				<span><?php echo $c['met_footother'];?></span>
			<?php } ?>
			<!--<span class="powered_by_metinfo"><?php echo $c['met_agents_copyright_foot'];?></span>-->
		</div>
		<ul class="met-langlist p-0 m-y-0">
		    <?php if($c['met_lang_mark'] && $ui[langlist_ok]){ ?>
		<li class="vertical-align m-x-5 m-t-15" m-id='lang' m-type='lang'>
			<div class="inline-block dropup">
				<?php
    $language = load::sys_class('label', 'new')->get('language')->get_lang();
    $sub = count($language);
    $i = 0;
    foreach($language as $index=>$v):

        $v['_index']   = $index;
        $v['_first']   = $i == 0 ? true:false;

        $v['_last']    = $index == (count($language)-1) ? true : false;
        $v['sub'] = $sub;
        $i++;
?>
				    <?php if($data['lang']==$v['mark']){ ?>
				<button type="button" data-toggle="dropdown" class="btn btn-outline btn-default btn-squared dropdown-toggle btn-lang">
					    <?php if($ui['langlist_icon_ok']){ ?>
					<span class="flag-icon flag-icon-<?php echo $v['iconname'];?>"></span>
					<?php } ?>
					<span ><?php echo $v['name'];?></span>
				</button>
				<?php } ?>
				<?php endforeach;?>
				<ul class="dropdown-menu dropdown-menu-right animate animate-reverse" id="met-langlist-dropdown" role="menu">
					<?php
    $language = load::sys_class('label', 'new')->get('language')->get_lang();
    $sub = count($language);
    $i = 0;
    foreach($language as $index=>$v):

        $v['_index']   = $index;
        $v['_first']   = $i == 0 ? true:false;

        $v['_last']    = $index == (count($language)-1) ? true : false;
        $v['sub'] = $sub;
        $i++;
?>
					<a href="<?php echo $v['met_weburl'];?>" title="<?php echo $v['name'];?>" class='dropdown-item'>
						    <?php if($ui['langlist_icon_ok']){ ?>
						<img src="<?php echo $v['flag'];?>" alt="<?php echo $v['name'];?>" style="max-width:100%;">
						<?php } ?>
						<?php echo $v['name'];?>
					</a>
					<?php endforeach;?>
				</ul>
			</div>
		</li>
		<?php } ?>
		    <?php if($c['met_ch_lang'] && $ui['simplified']){ ?>
	            <?php if($data[lang]==cn){ ?>
	            <li class="met-s2t  vertical-align nav-item m-x-5 m-t-15" m-id="lang" m-type="lang">
	            <div class="inline-block">
		            <button type="button" class="btn btn-outline btn-default btn-squared btn-lang btn-cntotc" data-tolang='tc'>繁体</button>
		            <?php }else if($data[lang]==tc){ ?>
		            <button type="button" class="btn btn-outline btn-default btn-squared btn-lang btn-cntotc" data-tolang='cn'>简体</button>
	            </div>
	        </li>
	        <?php } ?>
	    <?php } ?>
	    </ul>
	</div>
</footer>