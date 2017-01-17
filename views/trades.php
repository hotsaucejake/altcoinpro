<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Trades </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        
        <div class="row">
            <div class="col-md-12">
               <!-- BEGIN EXAMPLE TABLE PORTLET-->
               <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                           <i class="fa fa-exchange font-dark"></i>
                           <span class="caption-subject bold uppercase">Triggered Trades</span>
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                           <thead>
                                <tr>
                                   <th class="all">Exchange</th>
                                   <th class="all">Pair</th>
                                   <th class="all">Position</th>
                                   <th class="all">Price</th>
                                   <th class="min-tablet">Date</th>
                                </tr>
                           </thead>
                           <tbody>
                              <?php
                              foreach ($userOrders["data"]["order_history"] as $order) {
                                    if (($order["auth_id"] == 8463 || $order["auth_id"] == 8464 || $order["auth_id"] == 8465 || $order["auth_id"] == 8466) && $order["order_status"] == "Executed") {
                                      echo '<tr>';
                                      echo '<td>' . $order["exch_name"] . '</td>';
                                      echo '<td>' . $order["mkt_name"] . '</td>';
                                      echo '<td>' . $order["order_type"] . '</td>';
                                      echo '<td>' . $order["executed_price"] . '</td>';
                                      echo '<td>' . substr($order["order_time"], 0, 10) . '</td>';
                                      echo '</tr>';
                                    }
                              }
                               ?>
                           </tbody>
                        </table>
                    </div>
               </div>
               <!-- END EXAMPLE TABLE PORTLET-->
            </div>
         
       </div>
        
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->