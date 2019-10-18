<?php
    global $mediaFiles;
    array_push($mediaFiles['css'], RootREL."media/owlcarousel/assets/owl.carousel.min.css");
    array_push($mediaFiles['css'], RootREL."media/owlcarousel/assets/owl.theme.default.min.css");
    array_push($mediaFiles['css'], RootREL."media/css/popup.css");

    include_once 'views/layout/'.$this->layout.'header.php';
    global $app;
?>
<div class="wrapper">
    <div class="iw-overlay"></div>
    <div class="iw-header-version3 iw-header-version6">
        <div class="header header-default header-style-default v3 v6 header-sticky no-header-sticky-mobile ">
            <?php include_once 'views/layout/'.$this->layout.'navbar.php'; ?>
        </div>
    </div>
    <div class="contents-main clearfix" id="contents-main">
        <div class="entry-content">
            <div style="padding-top:6px;">
                <div class="container">
                    <div id="box-jobs" class="row box-jobs">
                        <div class="col-lg-12 col-md-12">
                            <div class="box_general">
                                <h2 class="text_ellipsis uppercase">
                                <i class="fa fa-briefcase"></i>
                                Việc làm tuyển gấp
                                </h2>
                                <div class="mw-container urgent-job-container" style="padding:5px;">
                                    <div class="el1 vb vb-visible job-hot-min-height" style="position: relative; overflow: hidden;">
                                        <div class="owl-carousel owl-theme owl-them-work" id="slider-center">
                                
                                        <?php if($this->urgentJob) { ?>
                                                <?php $rowcount = mysqli_num_rows($this->urgentJob); ?>
                                                        <?php foreach($this->urgentJob as $key2 => $item2){
                                                            if($key2%15==0) { ?>
                                                                <div class="item">
                                                            <?php } ?>
                                                            <div class="col-md-4 col-lg-4 job-over-item job-over-item-h" data-v-6fce03f1="">
                                                                <div class="job-item" data-v-0e092c0b="" data-v-6fce03f1="">
                                                                    <div class="col-md-12 col-lg-12 job_info" data-v-0e092c0b="">
                                                                    
                                                                        <?php if(!$this->isMobile){ ?>
                                                                            <div class="company_logo" data-v-0e092c0b="">
                                                                                <a href="<?=vendor_app_util::url(['area'=>'0',"ctl"=>$item2['companies_slug'].'.html'])?>" title="<?=$item2['companies_name']?>" data-v-0e092c0b="" class="">
                                                                                    <div class="logo_box" data-v-0e092c0b="">
                                                                                        <img class="lazy-load" data-v-0e092c0b="" src="<?php $first = '';
                                                                                            list($first) = explode('://', $item2['companies_logo']);
                                                                                                if($first == 'http' || $first == 'https'){ echo $item2['companies_logo'];
                                                                                                }else {echo vendor_app_util::getUrlAws($item2['companies_logo']? $item2['companies_logo']: 'no_picture.png', 'companies');}
                                                                                        ?>" lazy="loaded"></div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="company_name" data-v-0e092c0b="">
                                                                                <p class="j_title text_ellipsis" data-v-0e092c0b="">
                                                                                    <a href="<?=vendor_app_util::url(['area'=>'0',"ctl"=>"tuyen-dung-viec-lam/".$item2['job_slug'].'-'.$item2['job_id'].'.html'])?>" title="<?=$item2['title']?>" class="el-tooltip item <?=($item2['job_hot']==1)?'text-vip':''?>" data-v-0e092c0b="">
                                                                                        <span  data-v-0e092c0b=""><strong data-v-0e092c0b=""><?php if(strlen($item2['title']) > 35)  echo mb_substr($item2['title'], 0, 35).'...'; else echo $item2['title'] ; ?><?=($item2['job_hot']==1)?'<img class="icon-vip" src="media/img/hot_new.png"/>':''?></strong>
                                                                                        
                                                                                        </span>
                                                                                    </a>
                                                                                    
                                                                                </p>
                                                                                <p class="j_company text_ellipsis" data-v-0e092c0b="">
                                                                                    <a href="<?=vendor_app_util::url(['area'=>'0',"ctl"=>$item2['companies_slug'].'.html'])?>"  title="<?=$item2['companies_name']?>" data-v-0e092c0b=""><span class="color_2a2a2a" data-v-0e092c0b=""><?php if(strlen($item2['companies_name']) > 25)  echo mb_substr($item2['companies_name'], 0, 25).'...'; else echo $item2['companies_name'] ; ?></span></a>
                                                                                </p>
                                                                                <div class="table-item" data-v-0e092c0b="">
                                                                                    <div class="dollar" data-v-0e092c0b=""><i class="fa fa-money"></i>
                                                                                        <?php if($item2['salary']==1) echo "Thương lượng"; else if($item2['salary']==0) echo $item2['salary_from']." - ".$item2['salary_to']." Triệu "; else echo $item2['salary']." Triệu "?>
                                                                                    </div><?=($this->isMobile)?'<br/>':'' ?>
                                                                                    <div data-v-0e092c0b="" style="float:<?=(!$this->isMobile)?'right':'left'?>"><i class="ion-clock"></i> <?=date_format(date_create($item2['deadline']),"d/m/Y");?></div>
                                                                                </div>
                                                                            </div>
                                                                        <?php }else{ ?>
                                                                            <a href="<?=vendor_app_util::url(['area'=>'0',"ctl"=>"tuyen-dung-viec-lam/".$item2['job_slug'].'-'.$item2['job_id'].'.html'])?>" title="<?=$item2['title']?>"  class="el-tooltip item <?=($item2['job_hot']==1)?'text-vip':''?>" data-v-0e092c0b="">
                                                                                <div class="company_name" data-v-0e092c0b="">
                                                                                    <p class="j_title text_ellipsis text_ellipsis_job" data-v-0e092c0b="">
                                                                                        <span  data-v-0e092c0b=""><strong data-v-0e092c0b=""><?php if(strlen($item2['title']) > 35)  echo mb_substr($item2['title'], 0, 35).'...'; else echo $item2['title'] ; ?><?=($item2['job_hot']==1)?'<img class="icon-vip" src="media/img/hot_new.png"/>':''?></strong>
                                                                                        </span>
                                                                                    </p>
                                                                                    <p class="j_company text_ellipsis" data-v-0e092c0b="">
                                                                                        <span class="color_2a2a2a" data-v-0e092c0b=""><?php if(strlen($item2['companies_name']) > 25)  echo mb_substr($item2['companies_name'], 0, 25).'...'; else echo $item2['companies_name'] ; ?></span>
                                                                                    </p>
                                                                                    <div class="table-item" data-v-0e092c0b="">
                                                                                        <div class="dollar" data-v-0e092c0b=""><i class="fa fa-money"></i>
                                                                                            <?php if($item2['salary']==1) echo "Thương lượng"; else if($item2['salary']==0) echo $item2['salary_from']." - ".$item2['salary_to']." Triệu "; else echo $item2['salary']." Triệu "?>
                                                                                        </div><?=($this->isMobile)?'<br/>':'' ?>
                                                                                        <div data-v-0e092c0b="" class="text-deadline" style="float:<?=(!$this->isMobile)?'right':'left'?>"><i class="ion-clock"></i> <?=date_format(date_create($item2['deadline']),"d/m/Y");?></div>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <?php if(($key2+1)%15==0) { ?>
                                                                </div>
                                                            <?php } ?>
                                                        <?php } ?>

                                                        <?php 
                                                        $i=0;
                                                        foreach($this->urgentJob as $key => $item){
                                                            $i++;
                                                            if($rowcount < 30 && $rowcount > 15) {
                                                                $addItem = 30 - $rowcount;
                                                            }elseif ($rowcount < 15) {
                                                                $addItem = 15 - $rowcount;
                                                            }else{
                                                                $addItem = 0;
                                                            }
                                                        ?>
                                                            <?php if($i == $addItem || $addItem == 0) break;?>

                                                            <div class="col-md-4 col-lg-4 job-over-item job-over-item-h" data-v-6fce03f1="">
                                                                <div class="job-item" data-v-0e092c0b="" data-v-6fce03f1="">
                                                                    <div class="col-md-12 col-lg-12 job_info" data-v-0e092c0b="">
                                                    
                                                                        <?php if(!$this->isMobile){ ?>
                                                                            <div class="company_logo" data-v-0e092c0b="">
                                                                                <a href="<?=vendor_app_util::url(['area'=>'0',"ctl"=>$item['companies_slug'].'.html'])?>" title="<?=$item['companies_name']?>"  data-v-0e092c0b="" class="">
                                                                                    <div class="logo_box" data-v-0e092c0b="">
                                                                                        <img class="lazy-load" data-v-0e092c0b="" src="<?php $first = '';
                                                                                            list($first) = explode('://', $item['companies_logo']);
                                                                                                if($first == 'http' || $first == 'https'){ echo $item['companies_logo'];
                                                                                                }else {echo vendor_app_util::getUrlAws($item['companies_logo']? $item['companies_logo']: 'no_picture.png', 'companies');}
                                                                                        ?>" lazy="loaded"></div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="company_name" data-v-0e092c0b="">
                                                                                <p class="j_title text_ellipsis" data-v-0e092c0b="">
                                                                                    <a href="<?=vendor_app_util::url(['area'=>'0',"ctl"=>"tuyen-dung-viec-lam/".$item['job_slug'].'-'.$item['job_id'].'.html'])?>" title="<?=$item['title']?>"  class="el-tooltip item <?=($item['job_hot']==1)?'text-vip':''?>" data-v-0e092c0b="">
                                                                                        <span  data-v-0e092c0b=""><strong data-v-0e092c0b=""><?php if(strlen($item['title']) > 35)  echo mb_substr($item['title'], 0, 35).'...'; else echo $item['title'] ; ?><?=($item['job_hot']==1)?'<img class="icon-vip" src="media/img/hot_new.png"/>':''?></strong>
                                                                                        
                                                                                        </span>
                                                                                    </a>
                                                                                    
                                                                                </p>
                                                                                <p class="j_company text_ellipsis" data-v-0e092c0b="">
                                                                                    <a href="<?=vendor_app_util::url(['area'=>'0',"ctl"=>$item['companies_slug'].'.html'])?>"  title="<?=$item['companies_name']?>" data-v-0e092c0b=""><span class="color_2a2a2a" data-v-0e092c0b=""><?php if(strlen($item['companies_name']) > 25)  echo mb_substr($item['companies_name'], 0, 25).'...'; else echo $item['companies_name'] ; ?></span></a>
                                                                                </p>
                                                                                <div class="table-item" data-v-0e092c0b="">
                                                                                    <div class="dollar" data-v-0e092c0b=""><i class="fa fa-money"></i>
                                                                                        <?php if($item['salary']==1) echo "Thương lượng"; else if($item['salary']==0) echo $item['salary_from']." - ".$item['salary_to']." Triệu "; else echo $item['salary']." Triệu "?>
                                                                                    </div><?=($this->isMobile)?'<br/>':'' ?>
                                                                                    <div data-v-0e092c0b="" style="float:<?=(!$this->isMobile)?'right':'left'?>"><i class="ion-clock"></i> <?=date_format(date_create($item['deadline']),"d/m/Y");?></div>
                                                                                </div>
                                                                            </div>
                                                                        <?php }else{ ?>
                                                                            <a href="<?=vendor_app_util::url(['area'=>'0',"ctl"=>"tuyen-dung-viec-lam/".$item['job_slug'].'-'.$item['job_id'].'.html'])?>" title="<?=$item['title']?>"  class="el-tooltip item <?=($item['job_hot']==1)?'text-vip':''?>" data-v-0e092c0b="">
                                                                                <div class="company_name" data-v-0e092c0b="">
                                                                                    <p class="j_title text_ellipsis text_ellipsis_job" data-v-0e092c0b="">
                                                                                        <span  data-v-0e092c0b=""><strong data-v-0e092c0b=""><?php if(strlen($item['title']) > 35)  echo mb_substr($item['title'], 0, 35).'...'; else echo $item['title'] ; ?><?=($item['job_hot']==1)?'<img class="icon-vip" src="media/img/hot_new.png"/>':''?></strong>
                                                                                        </span>
                                                                                    </p>
                                                                                    <p class="j_company text_ellipsis" data-v-0e092c0b="">
                                                                                        <span class="color_2a2a2a" data-v-0e092c0b=""><?php if(strlen($item['companies_name']) > 25)  echo mb_substr($item['companies_name'], 0, 25).'...'; else echo $item['companies_name'] ; ?></span>
                                                                                    </p>
                                                                                    <div class="table-item" data-v-0e092c0b="">
                                                                                        <div class="dollar" data-v-0e092c0b=""><i class="fa fa-money"></i>
                                                                                            <?php if($item['salary']==1) echo "Thương lượng"; else if($item['salary']==0) echo $item['salary_from']." - ".$item['salary_to']." Triệu "; else echo $item['salary']." Triệu "?>
                                                                                        </div><?=($this->isMobile)?'<br/>':'' ?>
                                                                                        <div data-v-0e092c0b="" class="text-deadline" style="float:<?=(!$this->isMobile)?'right':'left'?>"><i class="ion-clock"></i> <?=date_format(date_create($item  ['deadline']),"d/m/Y");?></div>
                                                                                    </div>
                                                                                </div>
                                                                            </a>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                        
                                            <?php } else { ?>
                                                <p> Empty data </p>
                                            <?php } ?>

                                        </div>
                                    </div>
                                    <div class="link-readmore">
                                        <a href="<?=vendor_app_util::url(['area'=>'0',"ctl"=>'viec-lam-tuyen-gap'])?>"><i class="fa fa-plus"></i> XEM TẤT CẢ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div id="box-jobs" class="row box-jobs">
                    <div class="col-lg-8 col-md-8">
                        <div class="box_general">
                            <h2 class="text_ellipsis uppercase">
                            <i class="fa fa-briefcase"></i>
                            Việc làm hấp dẫn
                            </h2>
                            <div class="mw-container" style="padding:5px;">
                                <div class="el1 vb vb-visible job-hot-min-height" style="position: relative; overflow: hidden;">
                                    <div class="owl-carousel owl-theme owl-them-work" id="slider-center">
                                    <?php if($this->fascinatingJob) { ?>
                                        <?php foreach($this->fascinatingJob as $key => $item){
                                            if($key%12==0){ ?>
                                                <div class="item">
                                                <?php foreach($this->fascinatingJob2 as $key2 => $item2){
                                                    if($key2 >= $key && $key2 < ($key+12)){ ?>
                                                        <div class="col-md-6 col-lg-6 job-over-item job-over-item-h">
                                                            <div class="job-item">
                                                                <div class="col-md-12 col-lg-12 job_info" data-v-e4e3bf2e="">
                                                            <?php if(!$this->isMobile){ ?>
                                                                <div class="company_logo" data-v-e4e3bf2e="">
                                                                    <a href="<?=vendor_app_util::url(['area'=>'0',"ctl"=>$item2['companies_slug'].'.html'])?>"  data-v-e4e3bf2e="" class="" title="<?=$item2['companies_name']?>">
                                                                    <div class="logo_box" data-v-e4e3bf2e=""><img class="lazy-load" data-v-e4e3bf2e="" src="<?php $first = '';
                                                                                list($first) = explode('://', $item2['companies_logo']);
                                                                                    if($first == 'http' || $first == 'https'){ echo $item2['companies_logo'];
                                                                                    }else {echo vendor_app_util::getUrlAws($item2['companies_logo']? $item2['companies_logo']: 'no_picture.png', 'companies');}
                                                                            ?>" lazy="loaded"></div>
                                                                    </a>
                                                                </div>

                                                                <div class="company_name" data-v-e4e3bf2e="">
                                                                    <p class="j_title text_ellipsis" data-v-e4e3bf2e="">
                                                                    <a href="<?=vendor_app_util::url(['area'=>'0',"ctl"=>"tuyen-dung-viec-lam/".$item2['job_slug'].'-'.$item2['job_id'].'.html'])?>"  class="el-tooltip item" data-v-e4e3bf2e="" title="<?=$item2['title']?>">
                                                                        <span><strong class="<?=($item2['job_hot']==1)?'text-vip':''?>" data-v-e4e3bf2e=""><?php if(strlen($item2['title']) > 35)  echo mb_substr($item2['title'], 0, 35).'...'; else echo $item2['title'] ; ?><?=($item2['job_hot']==1)?'<img class="icon-vip" src="media/img/hot_new.png"/>':''?></strong></span>
                                                                    </a>
                                                                    </p>
                                                                    <p class="j_company text_ellipsis" data-v-e4e3bf2e="">
                                                                    <a href="<?=vendor_app_util::url(['area'=>'0',"ctl"=>$item2['companies_slug'].'.html'])?>"  title="<?=$item2['companies_name']?> tuyển dụng">
                                                                        <span class="color_2a2a2a"><?php if(strlen($item2['companies_name']) > 25)  echo mb_substr($item2['companies_name'], 0, 25).'...'; else echo $item2['companies_name'] ; ?></span>
                                                                    </a>
                                                                    </p>
                                                                    <div class="table-item" data-v-e4e3bf2e="">
                                                                        <div class="dollar" data-v-0e092c0b=""><i class="fa fa-money"></i>
                                                                            <?php if($item2['salary']==1) echo "Thương lượng"; else if($item2['salary']==0) echo $item2['salary_from']." - ".$item2['salary_to']." Triệu "; else echo $item2['salary']." Triệu "?>
                                                                        </div>
                                                                        <div title="<?=$item2['companies_address']?>" class="location text_ellipsis  text_ellipsis_2" style="float: right;width: 60%;">
                                                                            <i class="li-map-marker" data-v-e4e3bf2e=""></i>&nbsp;<i class="ion-clock"></i> <?=date_format(date_create($item2['deadline']),"d/m/Y");?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } else { ?>
                                                                <a href="<?=vendor_app_util::url(['area'=>'0',"ctl"=>"tuyen-dung-viec-lam/".$item2['job_slug'].'-'.$item2['job_id'].'.html'])?>" class="el-tooltip item clearfix" data-v-e4e3bf2e="" title="<?=$item2['title']?>"  style="display:block;">
                                                                    <div class="company_name clearfix" data-v-e4e3bf2e="">
                                                                        <p class="j_title text_ellipsis text_ellipsis_job" data-v-e4e3bf2e="">
                                                                            <span><strong class="<?=($item2['job_hot']==1)?'text-vip':''?>" data-v-e4e3bf2e=""><?php if(strlen($item2['title']) > 35)  echo mb_substr($item2['title'], 0, 35).'...'; else echo $item2['title'] ; ?><?=($item2['job_hot']==1)?'<img class="icon-vip" src="media/img/hot_new.png"/>':''?></strong></span>
                                                                        </p>
                                                                        <p class="j_company text_ellipsis" data-v-e4e3bf2e="">
                                                                            <span class="color_2a2a2a"><?php if(strlen($item2['companies_name']) > 25)  echo mb_substr($item2['companies_name'], 0, 25).'...'; else echo $item2['companies_name'] ; ?></span>
                                                                        </p>
                                                                        <div class="table-item" data-v-e4e3bf2e="">
                                                                            <div class="dollar" data-v-0e092c0b=""><i class="fa fa-money"></i>
                                                                                <?php if($item2['salary']==1) echo "Thương lượng"; else if($item2['salary']==0) echo $item2['salary_from']." - ".$item2['salary_to']." Triệu "; else echo $item2['salary']." Triệu "?>
                                                                            </div>
                                                                            <div title="<?=$item2['companies_address']?>" class="location text_ellipsis  text_ellipsis_2 text-deadline" style="float: right;width: 60%;">
                                                                                <i class="li-map-marker" data-v-e4e3bf2e=""></i>&nbsp;<i class="ion-clock"></i> <?=date_format(date_create($item2['deadline']),"d/m/Y");?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            <?php } ?>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <?php }
                                                } ?>
                                                </div>
                                            <?php }
                                        } ?>
                                    <?php } else { ?>
                                        <p> Empty data </p>
                                    <?php } ?>
                                    </div>
                                </div>
                                <div class="link-readmore">
                                    <a href="<?=vendor_app_util::url(array('area'=> 0, 'ctl'=>'viec-lam-hap-dan'));?>"><i class="fa fa-plus"></i> XEM TẤT CẢ</a>
                                </div>
                            </div>
                        </div>

                        <div class="box_general">
                            <h2 class="text_ellipsis uppercase">
                            <i class="fa fa-briefcase"></i>
                            Việc làm lương cao
                            </h2>
                            <div class="mw-container" style="padding:5px;">
                                <div class="el1 vb vb-visible" style="position: relative; overflow: hidden;">
                                    <div class="owl-carousel owl-theme owl-them-work-salary" id="slider-center">
                                        <?php foreach($this->highSalaryJobs as $key => $item){
                                            if($key%10==0){ ?>
                                                <div class="item">
                                                    <div class="mw_scroll mw_scroll mw_scroll_end">
                                                    <?php foreach($this->highSalaryJobs2 as $key2 => $item2){ if($key2 >= $key && $key2 < ($key+10)){ ?>
                                                        <div class="job-item job-item-narrow job-over-item-h">
                                                            <div class="col-md-12 col-lg-12 job_info job_info_narrow">

                                                                <?php if(!$this->isMobile){ ?>
                                                                    <div class="company_logo">
                                                                        <a href="<?=vendor_app_util::url(['area'=>'0',"ctl"=>$item2['companies_slug'].'.html'])?>" title="<?=$item2['companies_name']?>"  class="">
                                                                            <div class="logo_box"><img class="lazy-load" src="<?php $first = '';
                                                                                        list($first) = explode('://', $item2['companies_logo']);
                                                                                            if($first == 'http' || $first == 'https'){ echo $item2['companies_logo'];
                                                                                            }else {echo vendor_app_util::getUrlAws($item2['companies_logo']? $item2['companies_logo']: 'no_picture.png', 'companies');}
                                                                                    ?>" lazy="loaded">
                                                                            </div>
                                                                        </a>
                                                                    </div>

                                                                    <div class="company_name company_name_high_salary">
                                                                        <div class="content">
                                                                            <p class="j_title text_ellipsis">
                                                                                <a href="<?=vendor_app_util::url(['area'=>'0',"ctl"=>"tuyen-dung-viec-lam/".$item2['job_slug'].'-'.$item2['job_id'].'.html'])?>" title="<?=$item2['title']?>"  class="el-tooltip item">
                                                                                <span><strong class="<?=($item2['job_hot']==1)?'text-vip':''?>" ><?php if(strlen($item2['title']) > 35)  echo mb_substr($item2['title'], 0, 35).'...'; else echo $item2['title'] ; ?><?=($item2['job_hot']==1)?'<img class="icon-vip" src="media/img/hot_new.png"/>':''?></strong></span>
                                                                                </a>
                                                                            </p>
                                                                            <p class="j_company text_ellipsis"><a href="<?=vendor_app_util::url(['area'=>'0',"ctl"=>$item2['companies_slug'].'.html'])?>"  title="<?=$item2['companies_name']?> tuyển dụng"><span class="color_2a2a2a"><?=$item2['companies_name']?></span></a>
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="extra-info extra-info_high">
                                                                        <div class="table-item">
                                                                            <div class="dollar"><i class="fa fa-money"></i>
                                                                                <?php if($item2['salary']==1) echo "Thương lượng"; else if($item2['salary']==0) echo $item2['salary_from']." - ".$item2['salary_to']." Triệu "; else echo $item2['salary']." Triệu "?>
                                                                            </div>
                                                                            <div class="time"><i class="ion-clock"></i> <?=date_format(date_create($item2['deadline']),"d/m/Y");?></div>
                                                                        </div>
                                                                    </div>
                                                                <?php } else { ?>
                                                                    <a href="<?=vendor_app_util::url(['area'=>'0',"ctl"=>"tuyen-dung-viec-lam/".$item2['job_slug'].'-'.$item2['job_id'].'.html'])?>" title="<?=$item2['title']?>" class="el-tooltip item">
                                                                        <div class="company_name company_name_high_salary">
                                                                            <div class="content">
                                                                                <p class="j_title text_ellipsis text_ellipsis_job">
                                                                                    <span><strong class="<?=($item2['job_hot']==1)?'text-vip':''?>" ><?php if(strlen($item2['title']) > 35)  echo mb_substr($item2['title'], 0, 35).'...'; else echo $item2['title'] ; ?><?=($item2['job_hot']==1)?'<img class="icon-vip" src="media/img/hot_new.png"/>':''?></strong></span>
                                                                                </p>
                                                                                <p class="j_company text_ellipsis"><span class="color_2a2a2a"><?=$item2['companies_name']?></span>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="extra-info extra-info_high">
                                                                            <div class="table-item">
                                                                                <div class="dollar"><i class="fa fa-money"></i>
                                                                                    <?php if($item2['salary']==1) echo "Thương lượng"; else if($item2['salary']==0) echo $item2['salary_from']." - ".$item2['salary_to']." Triệu "; else echo $item2['salary']." Triệu "?>
                                                                                </div>
                                                                                <div class="time"><i class="ion-clock"></i> <?=date_format(date_create($item2['deadline']),"d/m/Y");?></div>
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                <?php } ?>

                                                            </div>
                                                        </div>

                                                    <?php } } ?>
                                                    </div>
                                                </div>

                                        <?php } } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div id="list-box-left" data-v-6fce03f1="">

                            <div class="row recent-update-job" data-v-245e7459="" data-v-6fce03f1="">
                                <div class="col-lg-12 col-md-12 box-category-con" data-v-245e7459="">
                                    <div class="box_general" data-v-245e7459="">
                                        <h2 class="text_ellipsis uppercase" data-v-245e7459=""><i class="fa fa-briefcase"></i> &nbsp;Việc làm mới cập nhật</h2>
                                        <?php foreach($this->recentUpdate as $key => $item){ ?>
                                        <div class="col-md-12 col-lg-12 job-over-item job-over-item-h">
                                            <div class="job-item">
                                                <div class="col-md-12 col-lg-12 job_info" data-v-e4e3bf2e="">
                                                <?php if(!$this->isMobile){ ?>
                                                    <div class="company_logo" data-v-e4e3bf2e="">
                                                        <a href="<?=vendor_app_util::url(['area'=>'0',"ctl"=>$item['companies_slug'].'.html'])?>"  data-v-e4e3bf2e="" class="" title="<?=$item['companies_name']?>">
                                                            <div class="logo_box" data-v-e4e3bf2e=""><img class="lazy-load" data-v-e4e3bf2e="" src="<?php $first = '';
                                                            list($first) = explode('://', $item['companies_logo']);
                                                                if($first == 'http' || $first == 'https'){ echo $item['companies_logo'];
                                                                }else {echo vendor_app_util::getUrlAws($item['companies_logo']? $item['companies_logo']: 'no_picture.png', 'companies');} ?>" lazy="loaded"></div>
                                                        </a>
                                                    </div>
                                                    <div class="company_name" data-v-e4e3bf2e="">
                                                        <p class="j_title text_ellipsis" data-v-e4e3bf2e="">
                                                            <a href="<?=vendor_app_util::url(['area'=>'0',"ctl"=>"tuyen-dung-viec-lam/".$item['job_slug'].'-'.$item['job_id'].'.html'])?>"  class="el-tooltip item" data-v-e4e3bf2e="" title="<?=$item['title']?>">
                                                                <span><strong class="<?=($item['job_hot']==1)?'text-vip':''?>" ><?php if(strlen($item['title']) > 35)  echo mb_substr($item['title'], 0, 35).'...'; else echo $item['title'] ; ?><?=($item['job_hot']==1)?'<img class="icon-vip" src="media/img/hot_new.png"/>':''?></strong></span>
                                                            </a>
                                                        </p>
                                                        <p class="j_company text_ellipsis" data-v-e4e3bf2e="">
                                                            <a href="<?=vendor_app_util::url(['area'=>'0',"ctl"=>$item['companies_slug'].'.html'])?>"  title="<?=$item['companies_name']?> tuyển dụng">
                                                                <span class="color_2a2a2a"><?=$item['companies_name']?></span>
                                                            </a>
                                                        </p>
                                                        <div class="table-item" data-v-e4e3bf2e="">
                                                            <div class="dollar" data-v-0e092c0b=""><i class="fa fa-money"></i> <?php if($item['salary']==1) echo "Thương lượng"; else if($item['salary']==0) echo $item['salary_from']." - ".$item['salary_to']." Triệu "; else echo $item['salary']." Triệu "?></div>
                                                            <div class="location text_ellipsis  text_ellipsis_2" style="float: right;width: 60%;">
                                                                <i class="ion-clock"></i> <?=date_format(date_create($item['deadline']),"d/m/Y");?></div>
                                                        </div>
                                                    </div>
                                                    <?php } else { ?>
                                                        <a href="<?=vendor_app_util::url(['area'=>'0',"ctl"=>"tuyen-dung-viec-lam/".$item['job_slug'].'-'.$item['job_id'].'.html'])?>" class="el-tooltip item clearfix" data-v-e4e3bf2e="" title="<?=$item['title']?>" style="display:block;">
                                                            <div class="company_name clearfix" data-v-e4e3bf2e="">
                                                                <p class="j_title text_ellipsis text_ellipsis_job" data-v-e4e3bf2e="">
                                                                    <span><strong class="<?=($item['job_hot']==1)?'text-vip':''?>" ><?php if(strlen($item['title']) > 35)  echo mb_substr($item['title'], 0, 35).'...'; else echo $item['title'] ; ?><?=($item['job_hot']==1)?'<img class="icon-vip" src="media/img/hot_new.png"/>':''?></strong></span>
                                                                </p>
                                                                <p class="j_company text_ellipsis" data-v-e4e3bf2e="">
                                                                    <span class="color_2a2a2a"><?=$item['companies_name']?></span>
                                                                </p>
                                                                <div class="table-item" data-v-e4e3bf2e="">
                                                                    <div class="dollar" data-v-0e092c0b=""><i class="fa fa-money"></i> <?php if($item['salary']==1) echo "Thương lượng"; else if($item['salary']==0) echo $item['salary_from']." - ".$item['salary_to']." Triệu "; else echo $item['salary']." Triệu "?></div>
                                                                    <div class="location text_ellipsis  text_ellipsis_2 text-deadline" style="float: right;width: 60%;"> <i class="ion-clock"></i>  <?=date_format(date_create($item['deadline']),"d/m/Y");?> </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="link-readmore">
                                            <a href="<?=vendor_app_util::url(['area'=>'0',"ctl"=>'moi-nhat-hot-nhat'])?>"><i class="fa fa-plus"></i> XEM TẤT CẢ</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row" data-v-245e7459="" data-v-6fce03f1="">
                                <div class="col-lg-12 col-md-12 box-category-con" data-v-245e7459="">
                                    <div class="box_general" data-v-245e7459="">
                                        <h2 class="text_ellipsis uppercase" data-v-245e7459=""><i class="li-hammer-wrench" data-v-245e7459=""></i><i class="fa fa-wrench"></i> &nbsp;Việc làm theo ngành nghề</h2>
                                        <div class="input-search-cat" data-v-245e7459=""><input type="text" placeholder="Tìm ngành nghề" value="" class="form-control" data-v-245e7459="" id="myInput"></div>
                                        <div class="el1 vb vb-visible" style="position: relative; overflow: hidden;" data-v-245e7459="">
                                                <div class="el2 vb-content" data-v-245e7459="" style="display: block; overflow: hidden scroll; height: 100%; width: 100%; box-sizing: content-box; padding-right: 20px;">
                                                    <div class="box-category-search" data-v-245e7459="">
                                                        <ul data-v-245e7459="" id="myUl">
                                                        <?php foreach ($this->categories['data'] as $key => $value): ?>
                                                            <li data-v-245e7459=""><a href="<?php echo (vendor_app_util::url(["ctl"=>"tuyen-dung/".$value['slug'].'-'.$value['id']]))?>" data-v-245e7459="" class="">
                                                                Việc làm <?=$value['name']?>
                                                                  </a>
                                                            </li>
                                                        <?php endforeach ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="vb-dragger" style="position: absolute; height: 36px; top: 0px;">
                                                    <div class="vb-dragger-styler"></div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" data-v-245e7459="" data-v-6fce03f1="">
                                <div class="col-lg-12 col-md-12 box-category-con" data-v-245e7459="">
                                    <div class="box_general" data-v-245e7459="">
                                        <h2 class="text_ellipsis uppercase" data-v-245e7459=""><i class="li-hammer-wrench" data-v-245e7459=""></i><i class="fa fa-map-marker"></i> &nbsp;Việc làm theo khu vực</h2>
                                        <div class="el1 vb vb-visible" style="position: relative; overflow: hidden;padding-bottom: 2px;" data-v-245e7459="">
                                                <div class="el2 vb-content" data-v-245e7459="" style="display: block; overflow: hidden scroll; height: 100%; width: 100%; box-sizing: content-box; padding-right: 20px;">
                                                    <div class="box-category-search" data-v-245e7459="">
                                                        <ul data-v-245e7459="" id="myUl-location">
                                                        <?php foreach ($app['districts'] as $key => $value): ?>
                                                            <li data-v-245e7459=""><a href="<?php echo (vendor_app_util::url(["ctl"=>"tuyen-dung/".str_replace(' ','-',$key)]))?>" data-v-245e7459="" class="">
                                                                <?=$value?>
                                                                  </a>
                                                            </li>
                                                        <?php endforeach ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="vb-dragger" style="position: absolute; height: 36px; top: 0px;">
                                                    <div class="vb-dragger-styler"></div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <button class="btn btn-primary scroll-top" data-scroll="up" type="button">
            <i class="fa fa-chevron-up"></i>
        </button>
        <button class="btn btn-danger link-new-jobs" data-scroll="up" type="button">
            <i class="fa fa-link" aria-hidden="true"></i>
            <a href="<?=vendor_app_util::url(array('area'=> 0, 'ctl'=>'moi-nhat-hot-nhat')); ?>">Bấm xem việc làm mới nhất</a>
        </button>
        <footer class="entry-footer "></footer>
    </div>
</div>

<script>
    var rootURL = "<?php echo RootREL;?>";
    var user_id = "<?php echo isset($_SESSION['user'])?$_SESSION['user']['id']:''?>";
    var uploadURI = "<?php echo UploadURI;?>";
    var noImg = "<?php echo NoImg;?>";
    var currentTab = 'new';
    var indexHurryJob = 1;
    var ads_count = <?=isset($i)?$i:0?>;
    var isMobile = window.matchMedia("only screen and (max-width: 480px)").matches;
</script>
<?php
    array_push($mediaFiles['js'], RootREL."media/owlcarousel/owl.carousel.min.js");
    array_push($mediaFiles['js'], RootREL."media/js/home.min.js");

    //array_push($mediaFiles['js'], RootREL."media/js/highlight.js");
    //array_push($mediaFiles['js'], RootREL."media/js/app.js");
    // array_push($mediaFiles['js'], RootREL."media/js/home_custom.js");    // Move to home.js
?>

<?php include_once 'views/layout/'.$this->layout.'footer.php'; ?>
