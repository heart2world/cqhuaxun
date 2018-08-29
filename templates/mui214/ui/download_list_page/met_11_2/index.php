<?php defined('IN_MET') or exit('No permission'); ?>
<?php $sidebar=strlen($ui[has][sidebar]);?>
<main class="$uicss met-download animsition" m-id='{$ui.mid}'>
    <div class="container">
        <div class="row">
<tag action='download.list' num="$c['met_download_list']" cid="$data[classnow]"></tag>
<if value="$sub">
             <!-- sidebar开始 -->
                <if value="$_M['form']['pageset']">
                    <if value="$sidebar">
                        <div class="col-md-9 met-download-list" style="float:{$ui.polr};{$lrp}">
                            <div class="row"  m-id='{$ui.mid}'>
                   
                    </if>
                <else/>
                    <if value="$ui[has][sidebar]">
                        <div class="col-md-9 met-download-list" style="float:{$ui.polr};{$lrp}">
                            <div class="row" m-id='{$ui.mid}'>
               
                    </if>
                </if>
                <!-- sidebar结束 -->
        <!-- /sidebar -->
                <ul class="list-group list-group-dividered list-group-full met-pager-ajax ">
                    <include file='ui_ajax/download'/>
                </ul>
                <div class='m-t-20 text-xs-center hidden-sm-down' m-type="nosysdata">
                    <pager/>
                </div>
                <div class="met_pager met-pager-ajax-link hidden-md-up" data-plugin="appear" data-animate="slide-bottom" data-repeat="false" m-type="nosysdata">
                    <button type="button" class="btn btn-primary btn-block btn-squared ladda-button" id="met-pager-btn" data-plugin="ladda" data-style="slide-left" data-url="" data-page="1">
                        <i class="icon wb-chevron-down m-r-5" aria-hidden="true"></i>
                        {$ui.btn_pagetext}
                    </button>
                </div>
            </div>
            </div>
            <else/>
            <div class='h-100 text-xs-center font-size-20 vertical-align' m-id='{$ui.mid}'>{$g.nodata}</div>
</if>
<!-- sidebar -->
               <if value="$_M['form']['pageset']">
    <if value="!$sidebar">
                </div>
            </div>
        </main>
    </if>
<else/>
    <if value="!$ui[has][sidebar]">
                </div>
            </div>
        </main>
    </if>
</if>

        <!-- /sidebar -->