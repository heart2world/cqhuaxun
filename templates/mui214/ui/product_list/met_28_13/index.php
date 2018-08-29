<?php defined('IN_MET') or exit('No permission'); ?>
<div class="main $uicss" m-id='{$ui.mid}'>
	<div class="container">
		<div class="row">
			<div class="mainbox ">
				<div class="col-lg-3 col-md-4 col-xs-12">
					<aside class="$uicss panel-body m-b-0">
						<h2 class="sidebar-tile head-bg bgcolor">
							<em>{$ui.title} / </em>
							<span class="desc">{$ui.desc}</span>
						</h2>
						<ul class="sidebar-column list-icons panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<tag action='category' cid="$ui['id']" type='son'>
							<?php $first = $m['_index'] == 0?'in':'' ?>
								<li class="panel panel-default">
									<if value="$m['sub'] && $ui['sidebar_column3_ok']">
											<a title="{$m.name}" class='bars {$m.class}' {$m.urlnew}
											role="button" data-toggle="collapse" data-parent="#accordion" href="#list_{$m['id']}" aria-expanded="true" aria-controls="#list_{$m['id']}"
											>
												{$m.name}
												<i class="wb-chevron-right-mini"></i>
											</a>
								        <div class="collapse {$first}" id="list_{$m['id']}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
								            <ul class="">
								                <li>

									                <a href="{$m.url}" {$m.urlnew} title="{$ui.all}" class="{$m.class}">
									                	<i class="wb-chevron-right-mini"></i>{$ui.all}
									                </a>
								                </li>
												<tag action='category' cid="$m['id']" type='son' class='active'>
								                	<li>
								                		<a href="{$m.url}" {$m.urlnew} title="{$m.name}" class='{$m.class}'>
								                			<i class="wb-chevron-right-mini"></i>{$m.name}
								                		</a>
								                	</li>
												</tag>
								            </ul>
								        </div>
									<else/>
										<a href="{$m.url}" title="{$m.name}" class='bars {$m.class}'>{$m.name}</a>
							        </if>
								</li>
							</tag>
						</ul>
						<div class="wd clearfix <if value='$ui[ifbg]'>bt_bgcolor<else/>bgimg</if>">
							<img src="{$ui['phoneimg']}" alt="">
				          	<div class="tel1 s">
				          		<p>{$ui.phonetitle}</p>
				            	<b>{$ui.phonenum}</b>
				          	</div>
				         </div>
					</aside>
				</div>
				<div class="col-lg-9 col-md-8 col-xs-12 right">
					<div class="ihead">
						<h2 class="s">{$ui.listtitle}</h2>
						<tag action='category' cid="$ui['id']"></tag>
						<a href="{$m.url}" class="mo">{$ui.listmor}+</a>
					</div>
					<ul class="twoboxelse blocks-md-{$ui.column_md} blocks-lg-{$ui.column_lg} blocks-xxl-{$ui.column_xxl} blocks-xs-{$ui.column_xs} met-product-list met-grid imagesize">
		            <tag action='list' cid="$ui['id']" type="$ui['type']" num="$ui['num']">
		                <li class="shown" >
		                    <div class="card">
		                        <figure class="card-header cover">
		                            <a href="{$v['url']}" title="{$v['title']}" name="{$v['title']}">
		                                <img class="cover-image" src="{$v.imgurl|thumb:$ui['img_x'],$ui['img_y']}" alt="{$v['title']}">
		                            </a>
		                        </figure>
		                        <h4 class="card-title m-0 p-x-10 font-size-16 text-xs-center">
		                            <a href="{$v['url']}" title="{$v['title']}" name="{$v['title']}" class="block editable-click"  met-field="title">{$v.title}</a>
		                        </h4>
		                    </div>
		                </li>
		            </tag>
            		</ul>
				</div>
			</div>
		</div>
	</div>
</div>
