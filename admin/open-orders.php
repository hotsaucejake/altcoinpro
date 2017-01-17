<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Open Orders </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="portlet light bordered">
             <div class="portlet-title">
                 <div class="caption font-dark">
                    <i class="fa fa-exchange font-dark"></i>
                    <span class="caption-subject bold uppercase">Open Orders</span>
                 </div>
                 <div class="tools"> </div>
             </div>
             <div class="portlet-body">
                 <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="openOrders">
                    <thead>
                        <tr>
                           <th class="all">Exchange</th>
                           <th class="all">Pair</th>
                           <th class="all">Position</th>
                           <th class="all">Price</th>
                           <th class="all">User</th>
                           <th class="none">Order ID</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
                       foreach ($openOrders["data"]["order_history"] as $order) {
                             if ($order["auth_id"] == 8463 || $order["auth_id"] == 8464 || $order["auth_id"] == 8465 || $order["auth_id"] == 8466) {
                                $user_api = 'Koinster';
                                if ($order["auth_id"] == 8463 || $order["auth_id"] == 8464) {
                                   $user_api = 'JC';
                                } elseif ($order["auth_id"] == 8465 || $order["auth_id"] == 8466) {
                                   $user_api = 'Jonathan';
                                }
                              echo '<tr>';
                              echo '<td>' . $order["exch_name"] . '</td>';
                              echo '<td>' . $order["mkt_name"] . '</td>';
                              echo '<td>' . $order["order_type"] . '</td>';
                              echo '<td>' . $order["limit_price"] . '</td>';
                              echo '<td>' . $user_api . '</td>';
                              echo '<td>' . $order["order_id"] . '</td>';
                              echo '</tr>';
                             }
                       }
                        ?>
                    </tbody>
                 </table>
             </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->