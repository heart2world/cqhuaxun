<?php defined('IN_MET') or exit('No permission'); ?>
<div class="$uicss met-index-body" m-id="{$ui.mid}">
		<div class="container">
			
			<if value="$ui['title']">
				<h3 class="animated wow zoomIn" data-plugin="appear" data-animate="slide-top" data-repeat="false">{$ui.title}</h3>
		    </if>
			<if value="$ui['subtitle']">
				<p class="qui animated wow zoomIn" data-wow-delay=".5s">{$ui.subtitle}</p>
			</if>
			<div class="about-grids">
				<div class="col-md-6 about-grids-left">
					<!-- 折叠面板 -->
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						<tag action="category" type="son" cid="$ui['select']">
								
							<div class="panel panel-default">

									<div class="panel-header panel-heading-sub" role="tab" >
									  <a class="panel-link"  data-toggle="collapse"  href="#list_{$m.id}">

										  <h4 class="panel-title asd 
										  		<if value='$m[sub] eq 0'>
										  			add
										  		</if>
										  ">
											  {$m.name}
										  </h4>
									  </a>
									</div>
									
										<div id="list_{$m.id}" class="panel-collapse collapse" role="tabpanel" data-parent="#container" aria-labelledby="headingOne">
									
										  <div class="panel-body panel_text ">
												{$m.content}
										  </div>
										</div>
									
							</div>

						</tag>

					</div>

				</div>
				<div class="col-md-6 about-grids-right animated wow slideInRight" data-wow-delay=".5s">
					<!-- image -->
					<a class="thumbnail">
						<img src="{$ui.image|thumb:$ui[img_x],$ui[img_y]}" alt=" " class="img-responsive" />
					</a>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
</div>
