<?php defined('IN_MET') or exit('No permission'); ?>
<div class="main $uicss" m-id='<?php echo $ui['mid'];?>'>
	<div class="container">
		<div class="row">
			<div class="mainbox ">
				<div class="col-lg-3 col-md-4 col-xs-12">
					<aside class="$uicss panel-body m-b-0">
						<h2 class="sidebar-tile head-bg bgcolor">
							<em><?php echo $ui['title'];?> / </em>
							<span class="desc"><?php echo $ui['desc'];?></span>
						</h2>
						<ul class="sidebar-column list-icons panel-group" id="accordion" role="tablist" aria-multiselectable="true">
							<?php
    $type=strtolower(trim('son'));
    $cid=$ui['id'];
    $column = load::sys_class('label', 'new')->get('column');

    unset($result);
    switch ($type) {
            case 'son':
                $result = $column->get_column_son($cid);
                break;
            case 'current':
                $result[0] = $column->get_column_id($cid);
                break;
            case 'head':
                $result = $column->get_column_head();
                break;
            case 'foot':
                $result = $column->get_column_foot();
                break;
            default:
                $result[0] = $column->get_column_id($cid);
                break;
        }
    $sub = count($result);
    foreach($result as $index=>$m):
        $hides = 1;
        $hide = explode("|",$hides);
        $m['_index']= $index;
        if($data['classnow']==$m['id'] || $data['class1']==$m['id'] || $data['class2']==$m['id']){
            $m['class']="";
        }else{
            $m['class'] = '';
        }
        if(in_array($m['name'],$hide)){
            unset($m['id']);
            unset($m['class']);
            $m['hide'] = $hide;
            $m['sub'] = 0;
        }


        if(substr(trim($m['icon']),0,1) == 'm' || substr(trim($m['icon']),0,1) == ''){
            $m['icon'] = 'icon fa-pencil-square-o '.$m['icon'];
        }
        $m['urlnew'] = $m['new_windows'] ? "target='_blank'" :"target='_self'";
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?>
							<?php $first = $m['_index'] == 0?'in':'' ?>
								<li class="panel panel-default">
									    <?php if($m['sub'] && $ui['sidebar_column3_ok']){ ?>
											<a title="<?php echo $m['name'];?>" class='bars <?php echo $m['class'];?>' <?php echo $m['urlnew'];?>
											role="button" data-toggle="collapse" data-parent="#accordion" href="#list_<?php echo $m['id'];?>" aria-expanded="true" aria-controls="#list_<?php echo $m['id'];?>"
											>
												<?php echo $m['name'];?>
												<i class="wb-chevron-right-mini"></i>
											</a>
								        <div class="collapse <?php echo $first;?>" id="list_<?php echo $m['id'];?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
								            <ul class="">
								                <li>

									                <a href="<?php echo $m['url'];?>" <?php echo $m['urlnew'];?> title="<?php echo $ui['all'];?>" class="<?php echo $m['class'];?>">
									                	<i class="wb-chevron-right-mini"></i><?php echo $ui['all'];?>
									                </a>
								                </li>
												<?php
    $type=strtolower(trim('son'));
    $cid=$m['id'];
    $column = load::sys_class('label', 'new')->get('column');

    unset($result);
    switch ($type) {
            case 'son':
                $result = $column->get_column_son($cid);
                break;
            case 'current':
                $result[0] = $column->get_column_id($cid);
                break;
            case 'head':
                $result = $column->get_column_head();
                break;
            case 'foot':
                $result = $column->get_column_foot();
                break;
            default:
                $result[0] = $column->get_column_id($cid);
                break;
        }
    $sub = count($result);
    foreach($result as $index=>$m):
        $hides = 1;
        $hide = explode("|",$hides);
        $m['_index']= $index;
        if($data['classnow']==$m['id'] || $data['class1']==$m['id'] || $data['class2']==$m['id']){
            $m['class']="active";
        }else{
            $m['class'] = '';
        }
        if(in_array($m['name'],$hide)){
            unset($m['id']);
            unset($m['class']);
            $m['hide'] = $hide;
            $m['sub'] = 0;
        }


        if(substr(trim($m['icon']),0,1) == 'm' || substr(trim($m['icon']),0,1) == ''){
            $m['icon'] = 'icon fa-pencil-square-o '.$m['icon'];
        }
        $m['urlnew'] = $m['new_windows'] ? "target='_blank'" :"target='_self'";
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?>
								                	<li>
								                		<a href="<?php echo $m['url'];?>" <?php echo $m['urlnew'];?> title="<?php echo $m['name'];?>" class='<?php echo $m['class'];?>'>
								                			<i class="wb-chevron-right-mini"></i><?php echo $m['name'];?>
								                		</a>
								                	</li>
												<?php endforeach;?>
								            </ul>
								        </div>
									<?php }else{ ?>
										<a href="<?php echo $m['url'];?>" title="<?php echo $m['name'];?>" class='bars <?php echo $m['class'];?>'><?php echo $m['name'];?></a>
							        <?php } ?>
								</li>
							<?php endforeach;?>
						</ul>
						<div class="wd clearfix     <?php if($ui[ifbg]){ ?>bt_bgcolor<?php }else{ ?>bgimg<?php } ?>">
							<img src="<?php echo $ui['phoneimg'];?>" alt="">
				          	<div class="tel1 s">
				          		<p><?php echo $ui['phonetitle'];?></p>
				            	<b><?php echo $ui['phonenum'];?></b>
				          	</div>
				         </div>
					</aside>
				</div>
				<div class="col-lg-9 col-md-8 col-xs-12 right">
					<div class="ihead">
						<h2 class="s"><?php echo $ui['listtitle'];?></h2>
						<?php
    $type=strtolower(trim('current'));
    $cid=$ui['id'];
    $column = load::sys_class('label', 'new')->get('column');

    unset($result);
    switch ($type) {
            case 'son':
                $result = $column->get_column_son($cid);
                break;
            case 'current':
                $result[0] = $column->get_column_id($cid);
                break;
            case 'head':
                $result = $column->get_column_head();
                break;
            case 'foot':
                $result = $column->get_column_foot();
                break;
            default:
                $result[0] = $column->get_column_id($cid);
                break;
        }
    $sub = count($result);
    foreach($result as $index=>$m):
        $hides = 1;
        $hide = explode("|",$hides);
        $m['_index']= $index;
        if($data['classnow']==$m['id'] || $data['class1']==$m['id'] || $data['class2']==$m['id']){
            $m['class']="";
        }else{
            $m['class'] = '';
        }
        if(in_array($m['name'],$hide)){
            unset($m['id']);
            unset($m['class']);
            $m['hide'] = $hide;
            $m['sub'] = 0;
        }


        if(substr(trim($m['icon']),0,1) == 'm' || substr(trim($m['icon']),0,1) == ''){
            $m['icon'] = 'icon fa-pencil-square-o '.$m['icon'];
        }
        $m['urlnew'] = $m['new_windows'] ? "target='_blank'" :"target='_self'";
        $m['urlnew'] = $m['nofollow'] ? $m['urlnew']." rel='nofollow'" :$m['urlnew'];
        $m['_first']=$index==0 ? true:false;
        $m['_last']=$index==(count($result)-1)?true:false;
        $$m = $m;
?><?php endforeach;?>
						<a href="<?php echo $m['url'];?>" class="mo"><?php echo $ui['listmor'];?>+</a>
					</div>
					<ul class="twoboxelse blocks-md-<?php echo $ui['column_md'];?> blocks-lg-<?php echo $ui['column_lg'];?> blocks-xxl-<?php echo $ui['column_xxl'];?> blocks-xs-<?php echo $ui['column_xs'];?> met-product-list met-grid imagesize">
		            <?php
    $cid=$ui['id'];

    $num = $ui['num'];
    $module = "";
    $type = $ui['type'];
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
		                <li class="shown" >
		                    <div class="card">
		                        <figure class="card-header cover">
		                            <a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" name="<?php echo $v['title'];?>">
		                                <img class="cover-image" src="<?php echo thumb($v['imgurl'],$ui['img_x'],$ui['img_y']);?>" alt="<?php echo $v['title'];?>">
		                            </a>
		                        </figure>
		                        <h4 class="card-title m-0 p-x-10 font-size-16 text-xs-center">
		                            <a href="<?php echo $v['url'];?>" title="<?php echo $v['title'];?>" name="<?php echo $v['title'];?>" class="block editable-click"  met-field="title"><?php echo $v['title'];?></a>
		                        </h4>
		                    </div>
		                </li>
		            <?php endforeach;?>
            		</ul>
				</div>
			</div>
		</div>
	</div>
</div>
