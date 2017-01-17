<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Portfolio Distribution </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
            <div class="col-md-9">
               <div class="portlet light bordered">
                   <div class="portlet-title">
                       <div class="caption">
                           <i class="fa fa-pie-chart font-blue-sharp"></i>
                           <span class="caption-subject font-blue-sharp bold uppercase">Altcoin Distribution</span>
                       </div>
                   </div>
                   <div class="portlet-body">
                      <div id="piechart" style="min-height:500px;"></div>
                   </div>
               </div>
            </div>
            
            <div class="col-md-3">
               <div class="portlet light bordered">
                   <div class="portlet-title">
                       <div class="caption">
                           <i class="fa fa-money font-blue-sharp"></i>
                           <span class="caption-subject font-blue-sharp bold uppercase">Altcoins</span>
                       </div>
                   </div>
                   <div class="portlet-body">
                      <ul class="list-group">
                        <?php
                       foreach ($balances["data"] as $balance) {
                       $perc = $balance["btc_balance"] / $total_btc * 100; ?>
                       <li class="list-group-item">
                          <span class="badge badge-info"><?php echo round($perc, 1) . '%'; ?></span>
                          <strong><?php echo $balance["balance_curr_code"]; ?></strong>
                       </li>
                        <?php } ?>
                      </ul>
                   </div>
               </div>
            </div>
            
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->