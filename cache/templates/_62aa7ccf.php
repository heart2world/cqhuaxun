<?php defined('IN_MET') or exit('No permission'); ?>
<div class="$uicss met-index-body met-index-news     <?php if($ui['bg_type']){ ?>bgcolor<?php }else{ ?>bgpic<?php } ?>" m-id='<?php echo $ui['mid'];?>'>
    <div class="container">
        <div class="invisible clearfix " data-plugin="appear" data-animate="slide-top" data-repeat="false">
            <h2 class="pull-md-left pull-xs-left">
                <?php echo $ui['title'];?>
                <span class="desc"><?php echo $ui['desc'];?></span>
            </h2>
                <?php
    $type=strtolower(trim('current'));
    $cid=$ui['id'];
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
                    <a href="<?php echo $m['url'];?>" title="<?php echo $m['name'];?>" class="more pull-right"><?php echo $ui['more'];?></a>
                <?php endforeach;?>
        </div>
        <div class="row">
<?php
    $scale=520/344;
?>
            <ul class="slider  col-md-5 newsad" id="newsad" data-scale='<?php echo $scale;?>'>
                <?php
    $cid=$ui['id'];

    $num = $ui['imgnewsnum'];
    $module = "";
    $type = all;
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
                    <li>
                    <a href="<?php echo $v['url'];?>" target="_blank" title="<?php echo $v['title'];?>">
                        <img class="cover-image" 
                             src="<?php echo thumb($v['imgurl'],$ui[left_img_width],$ui[left_img_right]);?>" 
                             srcset='<?php echo thumb($v['imgurl'],$ui[left_img_width],$ui[left_img_right]);?> 767w,<?php echo thumb($v['imgurl'],$ui[left_img_width],$ui[left_img_right]);?>' 
                             sizes="(max-width: 767px) 767px" 
                             alt="<?php echo $v['alt'];?>">
                    </a>
                    <h4 class="news_name">
                        <a href="<?php echo $v['url'];?>" target="_blank" title="<?php echo $v['title'];?>">
                        <?php echo $v['title'];?>
                        </a>
                    </h4>
                    </li>
                <?php endforeach;?>
            </ul>
            <ul class="newslist content col-md-7">
                <?php
    $cid=$ui['id'];

    $num = $ui['num'];
    $module = "";
    $type = all;
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
                        <?php if($v['_index']>=$ui['imgnewsnum']){ ?>
                       <li>
<?php
    $description = mb_substr($v['description'],0,$ui['desclen'],'utf-8').'...';
?>
                            <div class="media media-lg">
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" <?php echo $metblank;?>>
                                            <?php echo $v['title'];?>
                                        </a>
                                    </h4>
                                    <p class="des"><?php echo $description;?></p>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>