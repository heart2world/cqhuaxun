<?php defined('IN_MET') or exit('No permission'); ?>
<div class="$uicss met-index-body" m-id="<?php echo $ui['mid'];?>">
	<div class="container">
		<div class="hd-title">
                <?php if($ui[title]){ ?>
              <?php $img=strstr($ui['icon'],"upload"); ?>
		          <?php if($img){ ?>
		      	<img src="<?php echo $ui['icon'];?>" alt="<?php echo $ui['title'];?>" class="hd-title-icon" />
		      <?php } ?>
            	<h2 class="iconfont hd-title-h2"><?php echo $ui['title'];?></h2>
            	<span class="hd-title-line"></span>
            	<?php
    $type=strtolower(trim('current'));
    $cid=$ui[id];
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
		                <?php if($ui[more]){ ?>
		            	<a href="<?php echo $m['url'];?>" <?php echo $m['urlnew'];?> class="hd-title-more">
		            	<?php echo $ui['more'];?>
		            	<i class="icon pe-angle-right-circle"></i>
		            	</a>
		            <?php } ?>
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
	            <?php endforeach;?>
            <?php } ?>
        </div>
        <div class="hd-new-con clearfix list-mv01">
            <div class="newsList hd-newsList col-lg-<?php echo $ui['lw'];?>">
                <ul class="ulstyle imagesize">
	                <?php
    $cid=$ui[id];

    $num = $ui[lnum];
    $module = "";
    $type = $ui[type];
    $order = 'no_order asc';
    $para = "";
    if(!$module){
        if(!$cid){
            $value = $m['classnow'];
        }else{
            $value = $cid;
        }
    }else{
        $value = $module;
    }

    $result = load::sys_class('label', 'new')->get('tag')->get_list($value, $num, $type, $order, $para);
    $sub = count($result);
    foreach($result as $index=>$v):
        $id = $v['id'];
        $v['sub'] = $sub;
        $v['_index']= $index;
        $v['_first']= $index==0 ? true:false;
        $v['_last']=$index==(count($result)-1)?true:false;
        $$v = $v;
?>
	                 	<li class="media media-lg clearfix">
	                        <a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" <?php echo $g['urlnew'];?> class="newsList-cover media-left">
	                        	<img class="lazy media-object" data-original="<?php echo thumb($v['imgurl'],$x,$y);?>"  alt="<?php echo $v['title'];?>" />
	                        </a>
	                        <div class="newsList-des media-body">
	                            <h3 class="clearfix">
	                            	<a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" <?php echo $g['urlnew'];?>><?php echo $v['title'];?></a>
	                            </h3>
	                            <p><?php echo $v['description'];?></p>
	                            <div class="newsList-des-note clearfix">
	                            	    <?php if($v[tag]){ ?>
		                            	        <?php
            $sub = count($v[tag]);
            $num = 30;
            if(!is_array($v[tag])){
                $v[tag] = explode('|',$v[tag]);
            }
            foreach ($v[tag] as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($v[tag])-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $t = $val;
            ?>
			                            	    <?php if($t){ ?>
				                            	<span class="newsList-des-noteTags">
				                            		<a href="javascript:;"><?php echo $t;?></a>
				                            	</span>
			                            	<?php } ?>
		                            	<?php }?>
	                            	<?php } ?>
	                                <span class="newsList-des-noteDate"><?php echo $ui['time'];?>：<?php echo $v['updatetime'];?></span>
	                                <span><?php echo $ui['hits'];?>：<?php echo $v['hits'];?></span>
	                            </div>
	                        </div>
	                    </li>
	                <?php endforeach;?>
                </ul>
            </div>
            <div class="newsList02 hd-newsList02 col-lg-<?php echo $ui['rw'];?>">
                <ul class="ulstyle">
	                <?php
    $cid=$ui[id];

    $num = $ui[rnum];
    $module = "";
    $type = $ui[type];
    $order = 'no_order asc';
    $para = "";
    if(!$module){
        if(!$cid){
            $value = $m['classnow'];
        }else{
            $value = $cid;
        }
    }else{
        $value = $module;
    }

    $result = load::sys_class('label', 'new')->get('tag')->get_list($value, $num, $type, $order, $para);
    $sub = count($result);
    foreach($result as $index=>$v):
        $id = $v['id'];
        $v['sub'] = $sub;
        $v['_index']= $index;
        $v['_first']= $index==0 ? true:false;
        $v['_last']=$index==(count($result)-1)?true:false;
        $$v = $v;
?>
	                	    <?php if($v['_index']>=$ui['lnum']){ ?>
	                		<li>
		                        <i class="newsList02-icon icon wb-triangle-right"></i>
		                        <h3><a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" <?php echo $g['urlnew'];?>><?php echo $v['title'];?></a></h3>
		                        <div class="newsList02-des-note clearfix">
		                            <span class="newsList-des-noteDate"><?php echo $ui['time'];?>：<?php echo $v['updatetime'];?></span>
		                            <span><?php echo $ui['hits'];?>：<?php echo $v['hits'];?></span>
		                        </div>
		                    </li>
	                	<?php } ?>
	                <?php endforeach;?>
                </ul>
            </div>
        </div>
	</div>
</div>