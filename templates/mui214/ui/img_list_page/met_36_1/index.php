<?php defined('IN_MET') or exit('No permission'); ?>
<div class="$uicss" m-id="{$ui.mid}">
	<div class="
		<if value='$ui[is_full] eq 1'>
			container-fiuled full
		<else/>
			container
		</if>
	 ">
		
		<div class="portfolio-masonry-wrapper" data-col="3" data-gutter="30">
			<tag action='img.list' num="$c[met_img_list]" cid="$data[classnow]">
			</tag>
			<ul id="met-grid" class="$uicss-list fngallery portfolio-list no-space met-pager-ajax imagesize met-img-list <if value='$ui[mobile_img_num] eq 1'>
			blocks-100
			<else/>
			blocks-xs-{$ui.mobile_img_num}
			</if>
			blocks-md-{$ui.ipad_img_num} blocks-lg-{$ui.img_num} blocks-xxl-{$ui.lg_img_num}" data-scale='{$c.met_imgs_y}x{$c.met_imgs_x}' m-id='{$ui.mid}'>
				<if value="$c['met_img_page'] && $data['sub']">
					<list data="$result" name="$z">
						<li class="portfolio-item-wrap col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="portfolio-item">
								<div class="portfolio-img">
									<figure class="lg-item-box slick-slide" data-src='{$z.imgurl}' data-exthumbimage="{$z.imgurl|thumb:60,60}" data-sub-html='{$z.title}'>
										<img src="{$z.imgurl}" class="para-img" alt="{$z.title}">
										<figcaption>
											<a href="{$z.url}"><p>{$z.title}</p></a>
										</figcaption>
									</figure>
								</div>
							</div>
						</li>
					</list>
				<else/>
					<list data="$result" name="$x">
						<li class="portfolio-item-wrap">
							<div class="portfolio-item">
								<div class="portfolio-img">
									<if value="$ui['is_find'] eq 0">
										<figure class="lg-item-box slick-slide" data-src='{$x.imgurl}' data-exthumbimage="{$x.imgurl|thumb:60,60}" data-sub-html='{$x.title}'>
											<img src="{$x.imgurl}" alt="{$x.title}">
											<figcaption>
												<a href="{$x.url}"><p>{$x.title}</p></a>
											</figcaption>
										</figure>
									<else/>
										<a href="{$x.url}" title="{$x.title}" {$g.urlnew} >
											<figure>
												<img src="{$x.imgurl}" alt="{$x.title}">
												<figcaption>
													<a href="{$x.url}"><p>{$x.title}</p></a>
												</figcaption>
											</figure>
										</a>
									</if>
									
								</div>
							</div>
						</li>
					</list>
				</if>
			</ul>
		</div>


		<!-- 按钮 -->
		<div class='m-t-20 text-xs-center hidden-sm-down' m-type="nosysdata">
            <pager/>
        </div>
        <div class="met_pager met-pager-ajax-link hidden-md-up" data-plugin="appear" data-animate="slide-bottom" data-repeat="false" m-type="nosysdata">
            <button type="button" class="btn btn-primary btn-block btn-squared ladda-button" id="met-pager-btn" data-plugin="ladda" data-style="slide-left" data-url="" data-page="1">
                <i class="icon wb-chevron-down m-r-5" aria-hidden="true"></i>
            </button>
        </div>
        <!-- /按钮 -->
        
	</div>
</div>