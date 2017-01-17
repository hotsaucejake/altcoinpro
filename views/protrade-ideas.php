<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> ProTrade Ideas </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <?php
        if(isset($_GET["id"])){ ?>
        <div class="row">
            <div class="col-md-10">

              <div class="portlet light bordered">
                  <div class="portlet-title">
                     <div class="caption">
                          <i class="fa fa-lightbulb-o font-yellow"></i>
                          <span class="caption-subject bold"><a href="index.php?page=protrade-ideas&id=<?php echo $trade_idea[0]->ti_id; ?>"><?php echo $trade_idea[0]->ti_title; ?></a></span>
                     </div>
                     <div class="actions">
                         <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""> </a>

                         <?php if($_SESSION['user_role'] == "super" || $_SESSION['user_role'] == "admin") { ?>
                             <a class="btn btn-circle btn-icon-only btn-default" href="index.php?admin=update-idea&id=<?php echo $trade_idea[0]->ti_id; ?>">
                                 <i class="icon-wrench"></i>
                             </a>

                             <a class="btn btn-circle btn-icon-only btn-default" href="index.php?admin=delete-idea&id=<?php echo $trade_idea[0]->ti_id; ?>" onclick="return confirm('Are you sure you wish to delete this record?');">
                                 <i class="icon-trash"></i>
                          </a>
                          <?php } ?>
                     </div>
                  </div>
                  <div class="portlet-body">
                     <div class="row">
                        <div class="col-md-9">
                           <div class="pull-left">
                              <p>
                                 <a href="index.php?page=protrade-ideas&author=<?php echo $trade_idea[0]->ti_user; ?>">
                                   <span style="margin-right:9px;" class="font-blue">
                                      <i class="icon-user font-blue"></i>
                                      <?php echo $trade_idea[0]->ti_user; ?>
                                   </span></a>
                             <span class="font-blue">
                                <i class="icon-calendar font-blue"></i>
                                <?php echo substr($trade_idea[0]->ti_datetime, 0, 16); ?> GMT
                             </span>
                          </p>
                          </div>
                        </div>
                        <div class="col-md-3">
                           <div class="pull-right">
                              <p>
                                 <a href="index.php?page=protrade-ideas&coin=<?php echo $trade_idea[0]->ti_coin; ?>">
                                   <span style="margin-right:9px;" class="font-blue">
                                      <i class="fa fa-bitcoin font-blue"></i>
                                      <?php echo $trade_idea[0]->ti_coin; ?>
                                   </span></a>
                          </p>
                          </div>
                        </div>
                     </div>
                     <div class="row">
                         <div class="col-md-12">
                            <?php echo $trade_idea[0]->ti_notes; ?>
                         </div>
                      </div>
                      <div class="row">
                         <div class="col-md-12">
                            <p><a href="<?php echo $trade_idea[0]->ti_chart_url; ?>" target="_blank"><img src="<?php echo $trade_idea[0]->ti_chart_url; ?>" class="img-thumbnail img-responsive"></a></p>
                         </div>
                     </div>
                  </div>
              </div>
           </div>

           <div class="col-md-2">
              <div class="portlet light bordered">
                  <div class="portlet-title">
                      <div class="caption">
                          <i class="fa fa-bitcoin font-blue-sharp"></i>
                          <span class="caption-subject font-blue-sharp bold uppercase">Altcoins</span>
                      </div>
                  </div>
                  <div class="portlet-body">
                     <ul class="list-group text-center">

                       <?php foreach ($altcoins as $altcoin) {
                          if(empty($altcoin->ti_coin)){
                             // do nothing if coin is empty
                          } else { ?>
                            <li class="list-group-item">
                               <a href="index.php?page=protrade-ideas&coin=<?php echo $altcoin->ti_coin; ?>">
                               <strong><?php echo $altcoin->ti_coin; ?></strong></a>
                            </li>
                       <?php }
                       } ?>

                     </ul>
                  </div>
              </div>
           </div>
        </div>
     </div>

        <?php } else { ?>
           <div class="row">
               <div class="col-md-10">
                 <?php foreach ($bba_trade_ideas as $trade_idea) { ?>

                          <div class="portlet light bordered">
                              <div class="portlet-title">
                                  <div class="caption">
                                      <i class="fa fa-lightbulb-o font-yellow"></i>
                                      <span class="caption-subject bold"><a href="index.php?page=protrade-ideas&id=<?php echo $trade_idea->ti_id; ?>"><?php echo $trade_idea->ti_title; ?></a></span>
                                  </div>
                                  <div class="actions">
                                     <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""> </a>

                                     <?php if($_SESSION['user_role'] == "super" || $_SESSION['user_role'] == "admin") { ?>
                                         <a class="btn btn-circle btn-icon-only btn-default" href="index.php?admin=update-idea&id=<?php echo $trade_idea->ti_id; ?>">
                                             <i class="icon-wrench"></i></a>

                                         <a class="btn btn-circle btn-icon-only btn-default" href="index.php?admin=delete-idea&id=<?php echo $trade_idea->ti_id; ?>" onclick="return confirm('Are you sure you wish to delete this record?');">
                                             <i class="icon-trash"></i></a>
                                      <?php } ?>
                                  </div>
                              </div>
                              <div class="portlet-body">
                                  <div class="row">
                                     <div class="col-md-6">
                                        <?php echo $trade_idea->ti_notes; ?>
                                     </div>
                                     <div class="col-md-6">
                                        <p><a href="<?php echo $trade_idea->ti_chart_url; ?>" target="_blank"><img src="<?php echo $trade_idea->ti_chart_url; ?>" class="img-thumbnail img-responsive"></a></p>
                                     </div>
                                  </div>
                                  <div class="row">
                                     <div class="col-md-3">
                                        <div class="pull-left">
                                          <a href="index.php?page=protrade-ideas&coin=<?php echo $trade_idea->ti_coin; ?>">
                                             <span class="font-blue">
                                                <i class="fa fa-bitcoin font-blue"></i>
                                                <?php echo $trade_idea->ti_coin; ?>
                                             </span>
                                          </a>
                                       </div>
                                     </div>
                                     <div class="col-md-9">
                                        <div class="pull-right">
                                          <a href="index.php?page=protrade-ideas&author=<?php echo $trade_idea->ti_user; ?>">
                                             <span style="margin-right:9px;" class="font-blue">
                                                <i class="icon-user font-blue"></i>
                                                <?php echo $trade_idea->ti_user; ?>
                                             </span>
                                          </a>
                                          <span class="font-blue">
                                             <i class="icon-calendar font-blue"></i>
                                             <?php echo substr($trade_idea->ti_datetime, 0, 16); ?> GMT
                                          </span>
                                       </div>
                                     </div>
                                  </div>
                              </div>
                          </div>
               <?php } // end foreach ?>
                        </div>

            <div class="col-md-2">
               <div class="portlet light bordered">
                   <div class="portlet-title">
                       <div class="caption">
                           <i class="fa fa-bitcoin font-blue-sharp"></i>
                           <span class="caption-subject font-blue-sharp bold uppercase">Altcoins</span>
                       </div>
                   </div>
                   <div class="portlet-body">
                      <ul class="list-group text-center">

                        <?php foreach ($altcoins as $altcoin) {
                           if(empty($altcoin->ti_coin)){
                              // do nothing if coin is empty
                           } else { ?>
                             <li class="list-group-item">
                                <a href="index.php?page=protrade-ideas&coin=<?php echo $altcoin->ti_coin; ?>">
                                <strong><?php echo $altcoin->ti_coin; ?></strong></a>
                             </li>
                        <?php }
                        } ?>

                      </ul>
                   </div>
               </div>
            </div>
         </div>


         <nav aria-label="Page navigation">
            <ul class="pagination">
               <?php
               if($count > 1){
                  // go to previous page, inactive on page 1 ?>
                  <li><a href="index.php?page=protrade-ideas<?php if(isset($_GET["author"]) && !empty($_GET["author"])) {
                                                                     echo '&author=' . $_GET["author"];
                                                                  } elseif(isset($_GET["coin"]) && !empty($_GET["coin"])) {
                                                                     echo '&coin=' . $_GET["coin"];
                                                                  } ?>&count=<?php echo ($count-1); ?>" aria-label="Previous">
                     <span aria-hidden="true">PREVIOUS</span></a></li>
         <?php }
               // list how many possible pages
               for ($i=1; $i <= $total; $i++) { ?>
                  <li><a href="index.php?page=protrade-ideas<?php if(isset($_GET["author"]) && !empty($_GET["author"])) {
                                                                     echo '&author=' . $_GET["author"];
                                                                  } elseif(isset($_GET["coin"]) && !empty($_GET["coin"])) {
                                                                     echo '&coin=' . $_GET["coin"];
                                                                  } ?>&count=<?php echo $i; ?>"><?php echo $i; ?></a></li>
         <?php }

               if($count != $total){
                  // go to next page, inactive on last page
                  // echo "<a href='index.php?page=protrade-ideas&count=".($count+1)."' class='button'>NEXT</a>";
               ?>
               <li><a href="index.php?page=protrade-ideas<?php if(isset($_GET["author"]) && !empty($_GET["author"])) {
                                                                  echo '&author=' . $_GET["author"];
                                                               } elseif(isset($_GET["coin"]) && !empty($_GET["coin"])) {
                                                                  echo '&coin=' . $_GET["coin"];
                                                               } ?>&count=<?php echo ($count+1); ?>" aria-label="Next">
                     <span aria-hidden="true">NEXT</span></a></li>
         <?php } ?>
            </ul>
         </nav>


      <?php } // end else ?>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->