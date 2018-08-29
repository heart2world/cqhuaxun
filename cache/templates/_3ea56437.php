<?php defined('IN_MET') or exit('No permission'); ?>
<section class="$uicss" m-id='<?php echo $ui['mid'];?>'>
    <div class="animsition">
                <?php if($c[met_product_page]==1 && $data['sub']){ ?>
<!--展示下级栏目-->
            <?php
    $type=strtolower(trim('son'));
    $cid=$data['classnow'];
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
            <div class='item' >
                <div class="left clearfix">
                    <div class="content">
                        <h3 class="title invisible" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
                            <?php echo $m['name'];?>
                        <span class="keywords invisible" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
                            <?php echo $m['keywords'];?>
                        </span>
                        </h3>
                        <span class="line"></span>
                        <div class="desc invisible" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
                            <?php echo $m['description'];?>
                        </div>
                        <a href="<?php echo $m['url'];?>" class="more invisible" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
                            <span data-title="<?php echo $ui['more'];?>">
                                <?php echo $ui['more'];?>
                            </span>
                        </a>
                    </div>
                </div>
                    <div class="right" style="background-image:url(<?php echo $m['columnimg'];?>);"></div>
            </div>
            <?php endforeach;?>
<!--展示下级栏目-->
                <?php }else{ ?>
                    <?php
    $cid = $data['classnow'];
    if($cid == 0){
        $cid = $data['classnow'];
    }
    $num = $c['met_product_list'];
    $order = "no_order";
    $result = load::sys_class('label', 'new')->get('product')->get_list_page($cid, $data['page']);
    $sub = count($result);
     foreach($result as $index=>$v):
        $v['sub']      = $sub;
        $v['_index']   = $index;
        $v['_first']   = $index == 0 ? true:false;
        $v['_last']    = $index == (count($result)-1) ? true : false;
?><?php endforeach;?>
                        <?php if($sub){ ?>
    <!--展示内容-->
                            <?php
            $sub = count($result);
            $num = 30;
            if(!is_array($result)){
                $result = explode('|',$result);
            }
            foreach ($result as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($result)-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $p = $val;
            ?>
                        <div class='item' >
                            <div class="left clearfix">
                                <div class="content">
                                    <h3 class="title invisible" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
                                        <?php echo $p['title'];?>
                                    <span class="keywords invisible" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
                                        <?php echo $p['keywords'];?>
                                    </span>
                                    </h3>
                                    <span class="line"></span>
                                    <div class="desc invisible" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
                                        <?php echo $p['description'];?>
                                    </div>
                                    <a href="<?php echo $p['url'];?>" class="more invisible" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
                                        <span data-title="<?php echo $ui['more'];?>">
                                            <?php echo $ui['more'];?>
                                        </span>
                                    </a>
                                </div>
                            </div>
                                <div class="right" style="background-image:url(<?php echo thumb($p['imgurl'],$c['met_productimg_x'],$c['met_productimg_y']);?>);"></div>
                        </div>
                    <?php }?>
<!--展示内容-->
                <?php }else{ ?>
                <div class='h-100 text-xs-center font-size-20 vertical-align' m-id='<?php echo $ui['mid'];?>'><?php echo $ui['nodata'];?></div>
                <?php } ?>
                <?php } ?>
                <?php if($c[met_product_page]==1 && $data['sub']){ ?>
                <?php }else{ ?>
<!--分页-->
        <div class='m-t-20 text-xs-center hidden-sm-down'  m-type='noset'>
                 <?php
     if(!$data['classnow']){
        $data['classnow'] = 2;
     }

     if(!$data['page']){
        $data['page'] = 1;
     }
      $result = load::sys_class('label', 'new')->get('tag')->get_page_html($data['classnow'],$data['page']);

       echo $result;

     ?>
        </div>
        <div class="met-pager-ajax-link hidden-md-up" data-plugin="appear" data-animate="slide-bottom" data-repeat="false" m-id='<?php echo $ui['mid'];?>'>
            <button type="button" class="btn btn-primary btn-block btn-squared ladda-button" id="met-pager-btn" data-plugin="ladda" data-style="slide-left">
                <i class="icon wb-chevron-down m-r-5" aria-hidden="true"></i>
                <?php echo $ui['page_ajax_next'];?>
            </button>
        </div>
<!--分页-->
        <?php } ?>
</div>
</section>
