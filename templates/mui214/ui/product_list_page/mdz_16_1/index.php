<?php defined('IN_MET') or exit('No permission'); ?>
<section class="$uicss" m-id='{$ui.mid}'>
    <div class="animsition">
            <if value="$c[met_product_page] eq 1 && $data['sub']">
<!--展示下级栏目-->
            <tag action="category" type="son" cid="$data['classnow']"> 
            <div class='item' >
                <div class="left clearfix">
                    <div class="content">
                        <h3 class="title invisible" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
                            {$m.name}
                        <span class="keywords invisible" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
                            {$m.keywords}
                        </span>
                        </h3>
                        <span class="line"></span>
                        <div class="desc invisible" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
                            {$m.description}
                        </div>
                        <a href="{$m.url}" class="more invisible" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
                            <span data-title="{$ui.more}">
                                {$ui.more}
                            </span>
                        </a>
                    </div>
                </div>
                    <div class="right" style="background-image:url({$m.columnimg});"></div>
            </div>
            </tag>
<!--展示下级栏目-->
                <else/>
                    <tag action='product.list' num="$c['met_product_list']" cid="$data['classnow']"></tag>
                    <if value="$sub">
    <!--展示内容-->
                    <list data="$result" name="$p">
                        <div class='item' >
                            <div class="left clearfix">
                                <div class="content">
                                    <h3 class="title invisible" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
                                        {$p.title}
                                    <span class="keywords invisible" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
                                        {$p.keywords}
                                    </span>
                                    </h3>
                                    <span class="line"></span>
                                    <div class="desc invisible" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
                                        {$p.description}
                                    </div>
                                    <a href="{$p.url}" class="more invisible" data-plugin="appear" data-animate="slide-bottom" data-repeat="false">
                                        <span data-title="{$ui.more}">
                                            {$ui.more}
                                        </span>
                                    </a>
                                </div>
                            </div>
                                <div class="right" style="background-image:url({$p.imgurl|thumb:$c['met_productimg_x'],$c['met_productimg_y']});"></div>
                        </div>
                    </list>
<!--展示内容-->
                <else/>
                <div class='h-100 text-xs-center font-size-20 vertical-align' m-id='{$ui.mid}'>{$ui.nodata}</div>
                </if>
                </if>
            <if value="$c[met_product_page] eq 1 && $data['sub']">
                <else/>
<!--分页-->
        <div class='m-t-20 text-xs-center hidden-sm-down'  m-type='noset'>
            <pager/>
        </div>
        <div class="met-pager-ajax-link hidden-md-up" data-plugin="appear" data-animate="slide-bottom" data-repeat="false" m-id='{$ui.mid}'>
            <button type="button" class="btn btn-primary btn-block btn-squared ladda-button" id="met-pager-btn" data-plugin="ladda" data-style="slide-left">
                <i class="icon wb-chevron-down m-r-5" aria-hidden="true"></i>
                {$ui.page_ajax_next}
            </button>
        </div>
<!--分页-->
        </if>
</div>
</section>
