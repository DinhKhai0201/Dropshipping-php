 <div class="pager">
                       
    <div class="pages">
        <ol>
            <li class="paginate_button previous <?php echo ($curp==1)? 'disabled':'';?>" id="table_previous">
				<a href="<?php global $app;
					echo ($curp==1)? 'javascript:void(0);' : vendor_app_util::purl(['ctl'=>$app['ctl'], 'act'=>$app['act']], ($curp-1)); ?>" aria-controls="example1" data-dt-idx="<?=($curp-1); ?>" tabindex="0">Previous</a>
			</li>
			
			<!-- First -->
			<?php $start=1; if($curp>2 && $nopages>3){ ?>
			<li class="page">
				<a href="<?php global $app;
					echo ($curp==$start)? 'javascript:void(0);' : vendor_app_util::purl(['ctl'=>$app['ctl'], 'act'=>$app['act']], $start); ?>" tabindex="0">First</a>
			</li>
			<li class="page disabled">
				<a href="javascript:void(0);">...</a>
			</li>
			<?php } ?>

			<!-- center -->
			<?php $start=($curp-1)<1?1:($curp-1);$end=($curp+1)>$nopages?$nopages:($curp+1);for($i=$start; $i <= $end; $i++){ ?>
			<li class="page <?php if($i==$curp) echo('active') ?>">
				<a href="<?php global $app;
					echo ($curp==$i)? 'javascript:void(0);' : vendor_app_util::purl(['ctl'=>$app['ctl'], 'act'=>$app['act']], $i); ?>" data-dt-idx="<?php echo($i); ?>" tabindex="0"><?php echo($i); ?></a>
			</li>
			<?php } ?>

			<!-- Last -->
			<?php $end=$nopages; if($end-$curp>1 && $nopages>3){ ?>
			<li class="page disabled">
				<a href="javascript:void(0);">...</a>
			</li>
			<li class="page">
				<a href="<?php global $app;
					echo ($curp==$end)? 'javascript:void(0);' : vendor_app_util::purl(['ctl'=>$app['ctl'], 'act'=>$app['act']], $end); ?>" tabindex="0">Last (<?=$nopages.')';?></a>
			</li>
			<?php } ?>

			<li class="page next <?php echo ($curp==$nopages)? 'disabled':'';?>" id="table_next">
				<a href="<?php global $app;
					echo ($curp==$nopages)? 'javascript:void(0);' : vendor_app_util::purl(['ctl'=>$app['ctl'], 'act'=>$app['act']], ($curp+1));?>" aria-controls="example1" data-dt-idx="<?=($curp+1); ?>" tabindex="0">Next
				</a>
			</li>
            <!--  -->
            <!-- <li>
                <span id="prev" class="precious i-precious" value="<?php echo (intval($this->orders['curp']) - 1); ?>" title="Precious">
                    <i class="fas fa-chevron-left"></i>
                </span>
            </li>
            <?php for ($i = 1; $i <= ceil($this->orders['norecords'] / $this->orders['nopp']); $i++) {  ?>
                <?php if ($this->orders['curp'] == $i) { ?>
                    <li class="current"><?php echo $this->orders['curp']; ?></li>
                <?php } else { ?>
                    <li value="<?php echo $i; ?>" class="page page-<?php echo $i ?>"><?php echo $i; ?>
                    </li>
            <?php }
            } ?>

            <li>
                <span id="next" class="next i-next" value="<?php echo (intval($this->orders['curp']) + 1); ?>" title="Next">
                    <i class="fas fa-chevron-right"></i>
                </span>
            </li> -->
        </ol>
    </div>

</div>