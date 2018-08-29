<?php defined('IN_MET') or exit('No permission'); ?>
<?php $sidebar=strlen($ui[has][sidebar]);?>
<main class="$uicss met-news">
    <div class="container">
        <div class="row">
            <tag action='news.list' num="$c['met_news_list']" cid="$data['classnow']"></tag>
            <if value="$sub">
                <if value="$_M['form']['pageset']">
                    <if value="$sidebar">
                        <div class="col-md-9 met-news-body <if value='$ui[boxposition]'>fl_left<else/>fl_right</if>">
                            <div class="row <if value='$sidebar && $ui[boxposition]'>paddingR<else/>paddingL</if>">
                    </if>
                <else/>
                    <if value="$ui[has][sidebar]">
                        <div class="col-md-9 met-news-body <if value='$ui[boxposition]'>fl_left<else/>fl_right</if>">
                            <div class="row <if value='$sidebar && $ui[boxposition]'>paddingR<else/>paddingL</if>">
                    </if>
                </if>
                <div class="met-news-list">
    	            <ul class="ulstyle met-pager-ajax imagesize" data-scale='{$c.met_newsimg_y}x{$c.met_newsimg_x}' m-id='{$ui.mid}'>
    	                <include file='ui_ajax/news'/>
    	            </ul>
    	            <div class='m-t-20 text-xs-center hidden-sm-down' m-type="nosysdata">
    				    <pager/>
    				</div>
    				<div class="met_pager met-pager-ajax-link hidden-md-up" data-plugin="appear" data-animate="slide-bottom" data-repeat="false" m-type="nosysdata">
    				    <button type="button" class="btn btn-primary btn-block btn-squared ladda-button" id="met-pager-btn" data-plugin="ladda" data-style="slide-left" data-url="" data-page="1">
    				        <i class="icon wb-chevron-down m-r-5" aria-hidden="true"></i>

    				    </button>
    				</div>
    			</div>
            <else/>
                        <div class='h-100 text-xs-center font-size-20 vertical-align' m-id='{$ui.mid}'>{$ui.nodata}</div>
            </if>
<if value="$_M['form']['pageset']">
    <if value="$sidebar">
            </div>
        </div>
    <else/>
                </div>
            </div>
        </main>
    </if>
<else/>
    <if value="$ui[has][sidebar]">
            </div>
        </div>
    <else/>
            </div>
        </div>
    </main>
    </if>
</if>
