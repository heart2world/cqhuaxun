<?php defined('IN_MET') or exit('No permission'); ?>
<!-- 标准模式 -->
<if value="$ui['show_style']">
<main class="$uicss met-showproduct pagetype1" m-id='{$ui.mid}'>
    <div class="met-showproduct-head">
        <div class="container grey-box">
            <div class="row">
                <div class="col-lg-6">
                    <list data="$data['displayimgs']" name="$s"></list>
                    <div class='met-showproduct-list slick-slider fngallery  text-xs-center <if value="$s['_index'] gt 1">slick-dotted</if>' id='met-imgs-slick1' m-id='noset' m-type="displayimgs">
                        <!--fngallery：启用lightGallery插件的类名-->
                        <list data="$data['displayimgs']" name="$s">
                        <div class='slick-slide'>
                            <span>
                                <a href='{$s.img}' data-size='{$s.x}x{$s.y}' data-med='{$s.img}' data-med-size='{$s.x}x{$s.y}' class='lg-item-box ' data-src='{$s.img}' data-exthumbimage="{$s.img|thumb:160,180}" data-sub-html='{$s.title}'>
                                    <!--类名lg-item-box之前为initPhotoSwipeFromDOM插件所用参数；之后为lightGallery插件所用参数，lg-item-box：lightGallery插件对应的类名-->
                                    <img
                                    src="{$s.img|thumb:$c['met_productdetail_x'],$c['met_productdetail_y']}" data-src='{$s.img|thumb:$c['met_productdetail_x'],$c['met_productdetail_y']}' class='img-fluid cloudzoom' alt='{$s.title}' data-cloudzoom="zoomSizeMode: 'image',autoInside:750,maxMagnification:4"/>
                                </a>
                            </span>
                        </div>
                    </list>
                    </div>
                </div>
                <div class="col-lg-6">
                        <div class="product-intro">
                            <h1 class='m-t-0 font-size-24'>{$data.title}</h1>
                            <if value="$data['description']">
                            <p class='description'>{$data.description}</p>
                            </if>
                            <include file='ui_v2/module/shop/shop_option_ui.php'/>
                            <if value="$data['para_url']">
                                <div class='m-y-10'>
                                    <list data="$data['para_url']" name="$para_url" num='100'>
                                    <if value="$para_url['value']">
                                    <a href="{$para_url.value}" class="btn btn-danger m-r-20 linkbtn" target="_blank">{$para_url.name}</a>
                                    </if>
                                    </list>
                                </div>
                            </if>
                        </div>
                        <div class="product-detail panel-group panel-group-continuous " id="product-detail">
                            <list data="$data['contents']" name="$s">
                                <div class="panel">
                                    <div class="panel-heading" role="tab">
                                        <a class="panel-title collapsed <if value="$s['_first']">active</if>"
                                            data-parent="#product-detail"
                                            data-toggle="collapse"
                                            href="#pd{$s._index}"
                                            aria-controls="pd-0" aria-expanded="false">
                                            {$s.title}
                                        </a>
                                    </div>
                                    <div class="panel-collapse collapse" id="pd{$s._index}">
                                        <div class="panel-body">
                                            <div class="met-editor lazyload clearfix  active" id="product-details">
                                            <if value="$s[_index] eq 0">
                                                <if value="$data['para']">
                                                <ul class="product-para paralist blocks-100 blocks-sm-2 blocks-md-3 blocks-lg-2 m-x-0">
                                                    <list data="$data['para']" name="$para">
                                                        <if value="$para[value]">
                                                            <li class="p-x-0 p-r-15 m-b-15">
                                                                <span>{$para.name}：</span>
                                                                {$para.value}
                                                            </li>
                                                        </if>
                                                    </list>
                                                </ul>
                                                </if>
                                            </if>
                                                {$s.content}
                                                <if value="$ui['tag_ok']&& $s[_index] eq 0">
                                                <div class="tag">
                                                    <span>{$data.tagname}</span>
                                                    <list data="$data[taglist]" name="$tag">
                                                        <if value="$tag[_index] lt $ui[tag_num]">
                                                        <a href="{$tag.url}" title="{$tag.name}">{$tag.name}</a>
                                                        </if>
                                                    </list>
                                                </div>
                                                </if>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </list>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="met-showproduct-body">
        <div class="container">
            <div class="row no-space">
                <div class=" product-hot">
                        <h2 class="margin-bottom-30 font-size-28 font-weight-300">{$ui.hot_text}</h2>
                        <ul class=" blocks-{$ui.phone_size} blocks-sm-{$ui.ipad_size} blocks-md-{$ui.common_size} blocks-xlg-{$ui.big_size} mob-masonry" data-scale='1'>
                        <tag action="list" cid="$data['class1']" type="$ui.call_type" num="$ui.call_num">
                            <li>
                                <a href="{$v['url']}" target="_blank" class="img" title="{$v['title']}">
                                    <img src="{$v.imgurl|thumb:$c['met_productdetail_x'],$c['met_productdetail_y']}" data-original="{$v.imgurl|thumb:$c['met_productdetail_x'],$c['met_productdetail_y']}" class="cover-image" alt="{$v.title}">
                                </a>
                                <a href="{$v['url']}" target="_blank" class="txt" title="{$v['title']}">{$v.title}</a>
                                <p>{$v.price_str}</p>
                            </li>
                        </tag>
                        </ul>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- 时尚模式 -->
<else/>
<div class="$uicss met-showproduct pagetype2 animsition" id="content-1" m-id="{$ui.mid}">
<div class="modal fade modal-primary" id="shop-fashion-option" aria-hidden="true" aria-labelledby="shop-fashion-option"
role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">{$ui.shop_modal_title}</h4>
            </div>
            <div class="modal-body">
                <div class="product-intro">
                    <h1 class='m-t-0 font-size-24'>{$data.title}</h1>
                    <if value="$data['description']">
                    <p class='description'>{$data.description}</p>
                    </if>
                    <include file='ui_v2/module/shop/shop_option_ui.php'/>
                </div>
                <if value="$data['para_url']">
                    <div class='m-y-10'>
                        <list data="$data['para_url']" name="$para_url" num='100'>
                        <if value="$para_url['value']">
                        <a href="{$para_url.value}" class="btn btn-danger m-r-20 linkbtn" target="_blank">{$para_url.name}</a>
                        </if>
                        </list>
                    </div>
                </if>
            </div>
        </div>
    </div>
</div>
<div>   
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <ul class="nav navbar-toolbar pull-xs-right shop-btn-body">
                <li>
                    <div class="h-50 vertical-align">
                        <div class="vertical-align-middle">
                            <button 
                                type="button" 
                                class="btn btn-block btn-danger btn-squared shop-btn"
                                data-target="#shop-fashion-option" 
                                data-toggle="modal"
                            >{$word.app_shop_buyimmediately}</button>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-target="#navbar-showproduct-pagetype2"
                data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="icon wb-chevron-down" aria-hidden="true"></i>
                </button>
                <h1 class="navbar-brand">{$data.title}</h1>
            </div>
            <div class="collapse navbar-collapse navbar-collapse-toolbar" id="navbar-showproduct-pagetype2">
                <ul class="nav navbar-toolbar navbar-right met-showproduct-navtabs">
                    <list data="$data['contents']" name="$s">
                        <if value="$s[content]">
                            <li class="nav-item">
                                <a class='nav-link' href="#content{$s._index}" data-get="product-details">{$s.title}</a>
                            </li>
                        </if>
                    </list>
                    <if value="$data['para']">
                        <li class="nav-item"><a class='nav-link' href="#contenti">{$ui.specpara}</a></li>
                    </if>
                </ul>
            </div>
        </div>
    </nav>
    </div>
    <div class="section">
        <list data="$data['displayimgs']" name="$s"></list>
        <div class='met-showproduct-list text-center fngallery <if value="$v['sub'] gt 1">slick-dotted</if>' id='met-imgs-slick1' m-id="noset" m-type="displayimgs"><!--兼容商城V3-->
                <list data="$data['displayimgs']" name="$s">
                <div class='slick-slide'>
                    <a href='{$s.img}' data-size='{$s.x}x{$s.y}' data-med='{$s.img}' data-med-size='{$s.x}x{$s.y}' class='lg-item-box' data-src='{$s.img}' data-exthumbimage="{$s.img|thumb:60,60}" data-sub-html='{$s.title}'>
                        <!--类名lg-item-box之前为initPhotoSwipeFromDOM插件所用参数；之后为lightGallery插件所用参数，lg-item-box：lightGallery插件对应的类名-->
                        <img
                        <if value="$s['sub'] gt 1">data-lazy<else/>src</if>
                        ="{$s.img|thumb:$c['met_productdetail_x'],$c['met_productdetail_y']}" class='img-fluid' alt='{$s.title}' />
                    </a>
                </div>
                </list>
        </div>
    </div>
    <list data="$data['contents']" name="$s">
        <if value="$s[content]">
            <div class="content content{$s._index}" id="content{$s._index}">
                <div class="container">
                    <div class="row">
                        <div class="met-editor lazyload clearfix">
                            {$s.content}
                        </div>
                    </div>
                </div>
            </div>
        </if>
    </list>
    <if value="$data['para']">
        <div class="content contenti" id="contenti">
        <div class="container">
            <ul class="product-para paralist blocks-100 blocks-sm-2 blocks-md-3 blocks-lg-2">
                <list data="$data['para']" name="$s">
                <li class="p-x-0 m-b-15">
                    <span>{$s.name}：</span>
                    {$s.value}
                </li>
                </list>
            </ul>
        </div>
    </div>
    </if>
    <if value="$ui['tag_ok']">
     <div class="content">
        <div class="container">
                <div class="tag">
                    <span>{$data.tagname}</span>
                    <list data="$data[taglist]" name="$tag" num="$ui[tag_num]">
                        <a href="{$tag.url}" title="{$tag.name}">{$tag.name}</a>
                    </list>
                </div>
        </div>
    </div>
    </if>
</div>
</if>