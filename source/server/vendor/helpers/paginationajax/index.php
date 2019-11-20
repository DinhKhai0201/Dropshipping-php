 <div class="pager">

     <div class="pages">
         <ol>
             <li class="page previous " id="table_previous" style="cursor:pointer">
                 <span style="display:<?php echo ($curp == 1) ? 'none' : 'block'; ?>" tabindex="" data-dt-idx="<?= ($curp - 1); ?>"><i class="fas fa-chevron-left"></i></span>
             </li>

             <!-- First -->
             <?php $start = 1;
                if ($curp > 2 && $nopages > 3) { ?>
                 <li class="page" style="cursor:pointer">
                     <span tabindex="0">1</span>
                 </li>
                 <li class="page disabled" style="cursor:pointer">
                     <span href="javascript:void(0);">...</span>
                 </li>
             <?php } ?>

             <!-- center -->
             <?php $start = ($curp - 1) < 1 ? 1 : ($curp - 1);
                $end = ($curp + 1) > $nopages ? $nopages : ($curp + 1);
                for ($i = $start; $i <= $end; $i++) { ?>
                 <li class="page <?php if ($i == $curp) echo ('current') ?>" style="cursor:pointer">
                     <span data-dt-idx="<?php echo ($i); ?>" tabindex="0"><?php echo ($i); ?></span>
                 </li>
             <?php } ?>

             <!-- Last -->
             <?php $end = $nopages;
                if ($end - $curp > 1 && $nopages > 3) { ?>
                 <li class="page disabled">
                     <span href="javascript:void(0);">...</span>
                 </li>
                 <li class="page" style="cursor:pointer">
                     <span tabindex="0" data-dt-idx="<?php echo ($nopages); ?>"><?= $nopages; ?></span>
                 </li>
             <?php } ?>

             <li class="page next " id="table_next" style="cursor:pointer">
                 <span style="display:<?php echo ($curp == $nopages) ? 'none' : 'block'; ?>" aria-controls="example1" data-dt-idx="<?= ($curp + 1); ?>" tabindex="0"><i class="fas fa-chevron-right"></i>
                 </span>
             </li>

         </ol>
     </div>

 </div>