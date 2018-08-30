<?php defined('IN_MET') or exit('No permission'); ?>
    <?php if($ui['product_pagetype']==1){ ?>
<!-- 标准模式 -->
<main class="$uicss page met-showproduct pagetype1" m-id='<?php echo $ui['mid'];?>'>
    <div class="met-showproduct-head page-content block-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                                <?php
            $sub = count($data['displayimgs']);
            $num = 30;
            if(!is_array($data['displayimgs'])){
                $data['displayimgs'] = explode('|',$data['displayimgs']);
            }
            foreach ($data['displayimgs'] as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($data['displayimgs'])-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $s = $val;
            ?><?php }?>
                        <div class='met-showproduct-list fngallery cover text-xs-center    <?php if($s[_index]>1){ ?>slick-dotted<?php } ?>' id='met-imgs-slick' m-id='noset' m-type="displayimgs">
                            <!--fngallery：启用lightGallery插件的类名-->
                                    <?php
            $sub = count($data['displayimgs']);
            $num = 30;
            if(!is_array($data['displayimgs'])){
                $data['displayimgs'] = explode('|',$data['displayimgs']);
            }
            foreach ($data['displayimgs'] as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($data['displayimgs'])-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $s = $val;
            ?>
                            <div class='slick-slide'>
                                <a href='<?php echo $s['img'];?>' data-size='<?php echo $s['x'];?>x<?php echo $s['y'];?>' data-med='<?php echo $s['img'];?>' data-med-size='<?php echo $s['x'];?>x<?php echo $s['y'];?>' class='lg-item-box' data-src='<?php echo $s['img'];?>' data-exthumbimage="<?php echo thumb($s['img'],60,60);?>" data-sub-html='<?php echo $s['title'];?>'>
                                    <!--类名lg-item-box之前为initPhotoSwipeFromDOM插件所用参数；之后为lightGallery插件所用参数，lg-item-box：lightGallery插件对应的类名-->
                                    <img
                                        <?php if($s['_index']>0){ ?>data-lazy<?php }else{ ?>src<?php } ?>
                                    ="<?php echo thumb($s['img'],$c['met_productdetail_x'],$c['met_productdetail_y']);?>" class='img-fluid' alt='<?php echo $s['title'];?>' />
                                </a>
                            </div>
                            <?php }?>
                        </div>
                </div>
                <div class="col-lg-5">
                        <div class="product-intro">
                            <h1 class='m-t-0 font-size-24'><?php echo $data['title'];?></h1>
                                <?php if($data['description']){ ?>
                            <p class='description'><?php echo $data['description'];?></p>
                            <?php } ?>
                                <?php if($data['para']){ ?>
                            <ul class="product-para paralist blocks-100 blocks-sm-2 blocks-md-3 blocks-lg-2 m-x-0 p-y-5">
                                        <?php
            $sub = count($data['para']);
            $num = 30;
            if(!is_array($data['para'])){
                $data['para'] = explode('|',$data['para']);
            }
            foreach ($data['para'] as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($data['para'])-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $s = $val;
            ?>
                                        <?php if($s[value] && $s[_index]>=$ui['para_num']){ ?>
                                        <li class="p-x-0 p-r-15">
                                            <span><?php echo $s['name'];?>：</span>
                                            <?php echo $s['value'];?>
                                        </li>
                                    <?php } ?>
                                <?php }?>
                            </ul>
                            <?php } ?>
                                <?php if($data['para_url']){ ?>
                            <div class='m-t-10'>
                                        <?php
            $sub = count($data['para_url']);
            $num = 100;
            if(!is_array($data['para_url'])){
                $data['para_url'] = explode('|',$data['para_url']);
            }
            foreach ($data['para_url'] as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($data['para_url'])-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $s = $val;
            ?>
                                    <?php if($s['value']){ ?>
                                <a href="<?php echo $s['value'];?>" class="btn btn-danger linkbtn m-r-20" target="_blank"><?php echo $s['name'];?></a>
                                <?php } ?>
                                <?php }?>
                            </div>
                            <?php } ?>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="met-showproduct-body page-content">
        <div class="container">
            <div class="row">

                    <?php if($ui[product_sidebar_piclist_ok]){ ?>
<!-- 内容选项卡 -->
                <div class="col-lg-9     <?php if($ui[compos]==1){ ?>pull-lg-right<?php } ?>">
                    <?php }else{ ?>
                <div class="col-lg-12">
                    <?php } ?>    
                    <div class="row">
                        <div class="panel panel-body m-b-0 product-detail" boxmh-mh >
                            <ul class="nav nav-tabs nav-tabs-line m-b-20 met-showproduct-navtabs">
                                        <?php
            $sub = count($data['contents']);
            $num = 30;
            if(!is_array($data['contents'])){
                $data['contents'] = explode('|',$data['contents']);
            }
            foreach ($data['contents'] as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($data['contents'])-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $s = $val;
            ?>
                                <li class="nav-item">
                                    <a
                                    class='nav-link
                                        <?php if($s['_first']){ ?>
                                    active
                                    <?php } ?>
                                    ' data-toggle="tab" href="#product-content<?php echo $s['_index'];?>" data-get="product-details"><?php echo $s['title'];?></a>
                                </li>
                                <?php }?>
                            </ul>
                            <article class="tab-content">
                            
                                        <?php
            $sub = count($data['contents']);
            $num = 30;
            if(!is_array($data['contents'])){
                $data['contents'] = explode('|',$data['contents']);
            }
            foreach ($data['contents'] as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($data['contents'])-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $s = $val;
            ?>

                                <section class="tab-pane met-editor clearfix animation-fade
                                        <?php if($s['_first']){ ?>
                                    active
                                    <?php } ?>
                                    " id="product-content<?php echo $s['_index'];?>">
                                    <?php echo $s['content'];?>
                                </section>
                                <?php }?>
                                    <?php if($ui['tag_ok']){ ?>
                                    <div class="tag">
                                        <span><?php echo $data['tagname'];?></span>
                                                <?php
            $sub = count($data[taglist]);
            $num = $ui[tag_num];
            if(!is_array($data[taglist])){
                $data[taglist] = explode('|',$data[taglist]);
            }
            foreach ($data[taglist] as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($data[taglist])-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $tag = $val;
            ?>
                                            <a href="<?php echo $tag['url'];?>" title="<?php echo $tag['name'];?>"><?php echo $tag['name'];?></a>
                                        <?php }?>
                                    </div>
                                <?php } ?>
                            </article>
                        </div>
                    </div>
                </div>
<!-- 内容选项卡 -->

                    <?php if($ui[product_sidebar_piclist_ok]){ ?> 
<!-- 产品侧栏 -->
                <div class="col-lg-3     <?php if($ui[compos]==0){ ?>pull-lg-right<?php } ?>">
                    <div class="row">
                        <aside class="panel panel-body m-b-0 product-hot met-sidebar     <?php if($ui[compos]==1){ ?>leftsidebar<?php }else{ ?>rightsidebar<?php } ?>" boxmh-h>
                            <div class='sidebar-piclist'>
                                <h3 class='m-0 font-size-16 font-weight-300'><?php echo $ui['product_sidebar_piclist_title'];?></h3>
                                <ul class='blocks-2 blocks-md-3 blocks-lg-100 m-t-20 text-xs-center imagesize sidebar-piclist-ul' data-scale='<?php echo $c['met_productdetail_y'];?>x<?php echo $c['met_productdetail_x'];?>'>
                                    <?php
    $cid=$data['class1'];

    $num = $ui['product_sidebar_piclist_num'];
    $module = "";
    $type = $ui['product_sidebar_piclist_type'];
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
                                    <li class='masonry-child'>
                                        <a href='<?php echo $v['url'];?>' title='<?php echo $v['title'];?>' class='block m-b-0' target='_blank'>
                                            <img src="<?php echo thumb($v['imgurl'],$c['met_productdetail_x'],$c['met_productdetail_y']);?>" class='cover-image' alt='<?php echo $v['title'];?>' height='100'></a>
                                        <h4 class='m-t-10 m-b-0 font-size-14 text-md-center'>
                                            <a href='<?php echo $v['url'];?>' title='<?php echo $v['title'];?>' target='_blank'><?php echo $v['title'];?></a>
                                        </h4>
                                    </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        </aside>
                    </div>
                </div>
<!-- 产品侧栏 -->
            <?php } ?>

            </div>
        </div>
    </div>
</main>
<!-- 标准模式 -->
<?php }else{ ?>
<!-- 时尚模式 -->
<div class="$uicss met-showproduct pagetype2 animsition" id="content-1" m-id="<?php echo $ui['mid'];?>">
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-target="#navbar-showproduct-pagetype2"
                data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="icon wb-chevron-down" aria-hidden="true"></i>
                </button>
                <h1 class="navbar-brand"><?php echo $data['title'];?></h1>
            </div>
            <div class="collapse navbar-collapse navbar-collapse-toolbar" id="navbar-showproduct-pagetype2">
                <ul class="nav navbar-toolbar navbar-right met-showproduct-navtabs">
                            <?php
            $sub = count($data['contents']);
            $num = 30;
            if(!is_array($data['contents'])){
                $data['contents'] = explode('|',$data['contents']);
            }
            foreach ($data['contents'] as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($data['contents'])-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $s = $val;
            ?>
                        <li class="nav-item">
                            <a class='nav-link' href="#content<?php echo $s['_index'];?>" data-get="product-details"><?php echo $s['title'];?></a>
                        </li>
                    <?php }?>
                        <?php if($data['para']){ ?>
                        <li class="nav-item"><a class='nav-link' href="#contenti"><?php echo $ui['specpara'];?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="section">
                <?php
            $sub = count($data['displayimgs']);
            $num = 30;
            if(!is_array($data['displayimgs'])){
                $data['displayimgs'] = explode('|',$data['displayimgs']);
            }
            foreach ($data['displayimgs'] as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($data['displayimgs'])-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $s = $val;
            ?><?php }?>
        <div class='met-showproduct-list text-center fngallery     <?php if($s['_index']>1){ ?>slick-dotted<?php } ?>' id='met-imgs-slick' m-id="noset" m-type="displayimgs"><!--兼容商城V3-->
                        <?php
            $sub = count($data['displayimgs']);
            $num = 30;
            if(!is_array($data['displayimgs'])){
                $data['displayimgs'] = explode('|',$data['displayimgs']);
            }
            foreach ($data['displayimgs'] as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($data['displayimgs'])-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $s = $val;
            ?>
                <div class='slick-slide'>
                    <a href='<?php echo $s['img'];?>' data-size='<?php echo $s['x'];?>x<?php echo $s['y'];?>' data-med='<?php echo $s['img'];?>' data-med-size='<?php echo $s['x'];?>x<?php echo $s['y'];?>' class='lg-item-box' data-src='<?php echo $s['img'];?>' data-exthumbimage="<?php echo thumb($s['img'],60,60);?>" data-sub-html='<?php echo $s['title'];?>'>
                        <!--类名lg-item-box之前为initPhotoSwipeFromDOM插件所用参数；之后为lightGallery插件所用参数，lg-item-box：lightGallery插件对应的类名-->
                        <img
                            <?php if($s['_index']>0){ ?>data-lazy<?php }else{ ?>src<?php } ?>
                        ="<?php echo $s['img'];?>" class='img-fluid' alt='<?php echo $s['title'];?>' />
                    </a>
                </div>
                <?php }?>
        </div>
    </div>
            <?php
            $sub = count($data['contents']);
            $num = 30;
            if(!is_array($data['contents'])){
                $data['contents'] = explode('|',$data['contents']);
            }
            foreach ($data['contents'] as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($data['contents'])-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $s = $val;
            ?>
        <div class="content content<?php echo $s['_index'];?>" id="content<?php echo $s['_index'];?>">
            <div class="container">
                <div class="row">
                    <div class="met-editor lazyload clearfix">
                        <?php echo $s['content'];?>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>
    <div class="content contenti" id="contenti">
        <div class="container">
            <?php if($data['para']){ ?>
            <ul class="product-para paralist blocks-100 blocks-sm-2 blocks-md-3 blocks-lg-2">
                        <?php
            $sub = count($data['para']);
            $num = 30;
            if(!is_array($data['para'])){
                $data['para'] = explode('|',$data['para']);
            }
            foreach ($data['para'] as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($data['para'])-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $s = $val;
            ?>
                <li class="p-x-0 m-b-15">
                    <span><?php echo $s['name'];?>：</span>
                    <?php echo $s['value'];?>
                </li>
                <?php }?>
            </ul>
        <?php } ?>
                <?php if($data['para_url']){ ?>
                <div class='m-t-10'>
                            <?php
            $sub = count($data['para_url']);
            $num = 100;
            if(!is_array($data['para_url'])){
                $data['para_url'] = explode('|',$data['para_url']);
            }
            foreach ($data['para_url'] as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($data['para_url'])-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $s = $val;
            ?>
                        <?php if($s['value']){ ?>
                    <a href="<?php echo $s['value'];?>" class="btn btn-danger m-r-20 linkbtn" target="_blank"><?php echo $s['name'];?></a>
                    <?php } ?>
                    <?php }?>
                </div>
            <?php } ?>
        </div>
    </div>
        <?php if($data[taglist]){ ?>
         <div class="content">
            <div class="container">
                    <?php if($ui['tag_ok']){ ?>
                    <div class="tag">
                        <span><?php echo $data['tagname'];?></span>
                                <?php
            $sub = count($data[taglist]);
            $num = $ui[tag_num];
            if(!is_array($data[taglist])){
                $data[taglist] = explode('|',$data[taglist]);
            }
            foreach ($data[taglist] as $index => $val) {
                if($index >= $num){
                    break;
                }
                if($sub <=0){
                    continue;
                }
                if(is_array($val)){
                    $val['_index'] = $index;
                    $val['_first'] = $index == 0 ? true : false;
                    $val['_last']  = $index == (count($data[taglist])-1) ? true : false;
                    $val['sub']    = $sub;
                }

                $tag = $val;
            ?>
                            <a href="<?php echo $tag['url'];?>" title="<?php echo $tag['name'];?>"><?php echo $tag['name'];?></a>
                        <?php }?>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</div>
<!-- 时尚模式 -->
<?php } ?>