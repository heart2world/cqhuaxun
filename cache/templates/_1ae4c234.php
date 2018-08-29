<?php defined('IN_MET') or exit('No permission'); ?>
<section class="$uicss " m-id='<?php echo $ui['mid'];?>' m-type="foot_nav">
    <div class="container">
        <div class="title-box text-xs-center">
            <div class="head">
                <h2 class="title"><?php echo $ui['title'];?></h2>
                <p class="desc"><?php echo $ui['desc'];?></p>
            </div>
        </div>
        <div class="foot-box clearfix">
            <div class="foot-input col-md-8 text-xs-left">
                <div class="met-foot-feedback clearfix">
                    <?php
    $cid= $ui[id];
    $cid= $cid ? $cid : $data['classnow'];
    $fdtitle=$data['name'];
    $result = load::sys_class('label', 'new')->get('feedback')->get_module_form_html($cid,$fdtitle);
    echo $result;
?>
                </div>
            </div>
            <div class="foot-info col-md-4">
                <div class="foot-img">
                    <img data-original="<?php echo $ui[foot_img];?>" alt="">
                </div>
                <div class="foot-tel">
                    <span><?php echo $ui['foot_teltext'];?></span>
                    <a href="tel:<?php echo $ui['foot_telnum'];?>"><?php echo $ui['foot_telnum'];?></a>
                    <p><?php echo $ui['foot_info'];?></p>
                    <p class="more-info"><?php echo $ui['foot_moreinfo'];?></p>
                </div>
            </div>
        </div>
        <!--友情链接-->    
            <?php
    $result = load::sys_class('label', 'new')->get('link')->get_link_list();
    $sub = count($result);
     foreach($result as $index=>$v):
        $v['sub']      = $sub;
        $v['_index']   = $index;
        $v['_first']   = $index == 0 ? true:false;
        $v['_last']    = $index == (count($result)-1) ? true : false;
        $v['nofollow'] = $v['nofollow'] ? "rel='nofollow'" : '';
?><?php endforeach;?>
                    <?php if($ui[foot_links]){ ?>
                <div class="links text-xs-center" m-id='<?php echo $ui['mid'];?>' m-type="link">
                    <ul class="breadcrumb p-0 link-img m-0">
                        <li class='breadcrumb-item'><?php echo $ui['link_title'];?></li>
                        <?php
    $result = load::sys_class('label', 'new')->get('link')->get_link_list();
    $sub = count($result);
     foreach($result as $index=>$v):
        $v['sub']      = $sub;
        $v['_index']   = $index;
        $v['_first']   = $index == 0 ? true:false;
        $v['_last']    = $index == (count($result)-1) ? true : false;
        $v['nofollow'] = $v['nofollow'] ? "rel='nofollow'" : '';
?>
                            <li class='breadcrumb-item'>
                                <a href="<?php echo $v['weburl'];?>" title="<?php echo $v['webname'];?>" target="_blank">
                                    <?php if($v['link_type']==1){ ?>
                                    <img data-original="<?php echo $v['weblogo'];?>" alt="<?php echo $v['webname'];?>" height='40'>
                                <?php }else{ ?>
                                    <span><?php echo $v['webname'];?></span>
                                <?php } ?>
                                </a>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </div>
                <?php } ?>
<!--友情链接-->
    </div>

</section>