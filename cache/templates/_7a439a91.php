<?php defined('IN_MET') or exit('No permission'); ?>
<?php
    $type=strtolower(trim('current'));
    $cid=$data[classnow];
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
?><?php endforeach;?>
    <?php if($data[classnow]==10001||!$ui[bgcolumn]||strstr('|'.strip_tags($ui[bgcolumn]).'|','|'.strip_tags($m[name]).'|')){ ?>
<section class="$uicss lazy <?php echo $ui['bgfull'];?>" m-id="<?php echo $ui['mid'];?>" data-title="<?php echo $ui['bgtitle'];?>" 
      <?php if($ui[bgimg] && !strstr($ui[bgimg],$c[met_agents_img])){ ?>data-background="<?php echo $ui['bgimg'];?>"<?php } ?>>
  <div class="info-box">
	<div class="container">
	  <div class="title-box">
		<div class="title-name">
		  <h3  data-plugin="appear" data-animate="slide-bottom" data-repeat="false"><?php echo $ui['newstitle'];?></h3>
      <p class="desc" data-plugin="appear" data-animate="slide-bottom" data-repeat="false"><?php echo $ui['newsdesc'];?></p>
		</div>
            <?php if($ui[newsmoreok]){ ?>
		<div class="title-move">
		  <i class="fa fa-chevron-left"></i>
		  <i class="fa fa-chevron-right"></i>
		</div>
        <?php } ?>
	  </div>
	  <div class="info-cut index">
		<ul class="info-cut-wraper" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
          <?php
    $cid=$ui[newscolumn];

    $num = $ui[newsnumber];
    $module = "";
    $type = $ui[newscom];
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
          <li class="info-cut-slide" >
             <a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" <?php echo $v['urlnew'];?>>
               <img class="info-lazy" data-src="<?php echo thumb($v['imgurl'],$ui[newswidth],$ui[newsheight]);?>" alt="<?php echo $v['title'];?>">
               <span>
                 <p><?php echo $v['description'];?></p>
                 <i><?php echo $word['AddDate'];?><em><?php echo date('Y.m.d',strtotime($v['updatetime']));?></em> <i class="icon wb-eye"><span  class="readnum"><?php echo $v['hits'];?></span></i></i>
                
                 <b><?php echo $v['title'];?></b>
               </span>
             </a>
          </li>
          <?php endforeach;?>
		</div>
	  </ul>
	</div>
  </div>  
</section>
<?php }else if($_GET[pageset]){ ?>
<section class="$uicss not-slide" m-id="<?php echo $ui['mid'];?>" m-type="nocontent" 
  style="background:#263238;max-height:40px;text-align:center;color:#fff;line-height:40px;display:block;border-bottom:1px solid #888;">
  该栏目设置了限制显示，可在“区块显示的栏目”中添加显示（该文字仅“可视化”模式下可见）
</section>
<?php } ?>