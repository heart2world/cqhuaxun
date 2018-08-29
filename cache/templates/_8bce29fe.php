<?php defined('IN_MET') or exit('No permission'); ?>
<div class="$uicss" m-id="<?php echo $ui['mid'];?>">
	<div class="
		    <?php if($ui[is_full]==1){ ?>
			container-fiuled full
		<?php }else{ ?>
			container
		<?php } ?>
	 ">
		
		<div class="portfolio-masonry-wrapper" data-col="3" data-gutter="30">
			<?php
    $cid = $data[classnow];
    if($cid == 0){
        $cid = $data['classnow'];
    }
    $num = $c[met_img_list];
    $order = "no_order";
    $result = load::sys_class('label', 'new')->get('img')->get_list_page($cid,$data['page']);
    $sub = count($result);
     foreach($result as $index=>$v):
        $v['sub']      = $sub;
        $v['_index']   = $index;
        $v['_first']   = $index == 0 ? true:false;
        $v['_last']    = $index == (count($result)-1) ? true : false;
?>
			<?php endforeach;?>
			<ul id="met-grid" class="$uicss-list fngallery portfolio-list no-space met-pager-ajax imagesize met-img-list     <?php if($ui[mobile_img_num]==1){ ?>
			blocks-100
			<?php }else{ ?>
			blocks-xs-<?php echo $ui['mobile_img_num'];?>
			<?php } ?>
			blocks-md-<?php echo $ui['ipad_img_num'];?> blocks-lg-<?php echo $ui['img_num'];?> blocks-xxl-<?php echo $ui['lg_img_num'];?>" data-scale='<?php echo $c['met_imgs_y'];?>x<?php echo $c['met_imgs_x'];?>' m-id='<?php echo $ui['mid'];?>'>
				    <?php if($c['met_img_page'] && $data['sub']){ ?>
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

                $z = $val;
            ?>
						<li class="portfolio-item-wrap col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="portfolio-item">
								<div class="portfolio-img">
									<figure class="lg-item-box slick-slide" data-src='<?php echo $z['imgurl'];?>' data-exthumbimage="<?php echo thumb($z['imgurl'],60,60);?>" data-sub-html='<?php echo $z['title'];?>'>
										<img src="<?php echo $z['imgurl'];?>" class="para-img" alt="<?php echo $z['title'];?>">
										<figcaption>
											<a href="<?php echo $z['url'];?>"><p><?php echo $z['title'];?></p></a>
										</figcaption>
									</figure>
								</div>
							</div>
						</li>
					<?php }?>
				<?php }else{ ?>
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

                $x = $val;
            ?>
						<li class="portfolio-item-wrap">
							<div class="portfolio-item">
								<div class="portfolio-img">
									    <?php if($ui['is_find']==0){ ?>
										<figure class="lg-item-box slick-slide" data-src='<?php echo $x['imgurl'];?>' data-exthumbimage="<?php echo thumb($x['imgurl'],60,60);?>" data-sub-html='<?php echo $x['title'];?>'>
											<img src="<?php echo $x['imgurl'];?>" alt="<?php echo $x['title'];?>">
											<figcaption>
												<a href="<?php echo $x['url'];?>"><p><?php echo $x['title'];?></p></a>
											</figcaption>
										</figure>
									<?php }else{ ?>
										<a href="<?php echo $x['url'];?>" title="<?php echo $x['title'];?>" <?php echo $g['urlnew'];?> >
											<figure>
												<img src="<?php echo $x['imgurl'];?>" alt="<?php echo $x['title'];?>">
												<figcaption>
													<a href="<?php echo $x['url'];?>"><p><?php echo $x['title'];?></p></a>
												</figcaption>
											</figure>
										</a>
									<?php } ?>
									
								</div>
							</div>
						</li>
					<?php }?>
				<?php } ?>
			</ul>
		</div>


		<!-- 按钮 -->
		<div class='m-t-20 text-xs-center hidden-sm-down' m-type="nosysdata">
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
        <div class="met_pager met-pager-ajax-link hidden-md-up" data-plugin="appear" data-animate="slide-bottom" data-repeat="false" m-type="nosysdata">
            <button type="button" class="btn btn-primary btn-block btn-squared ladda-button" id="met-pager-btn" data-plugin="ladda" data-style="slide-left" data-url="" data-page="1">
                <i class="icon wb-chevron-down m-r-5" aria-hidden="true"></i>
            </button>
        </div>
        <!-- /按钮 -->
        
	</div>
</div>