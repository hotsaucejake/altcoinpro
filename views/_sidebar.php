<!-- BEGIN CONTAINER -->
<div class="page-container">
   <!-- BEGIN SIDEBAR -->
   <div class="page-sidebar-wrapper">
        <!-- BEGIN SIDEBAR -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <div class="page-sidebar navbar-collapse collapse">
            <!-- BEGIN SIDEBAR MENU -->
            <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
            <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
            <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
            <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-light " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <li class="sidebar-toggler-wrapper hide">
                    <div class="sidebar-toggler">
                        <span></span>
                    </div>
                </li>
                <!-- END SIDEBAR TOGGLER BUTTON -->

                <li class="heading">
                    <h3 class="uppercase">Trading</h3>
                </li>
                <li class="nav-item start ">
                   <a href="index.php?page=protrade-ideas" class="nav-link ">
                      <i class="fa fa-lightbulb-o"></i>
                      <span class="title">ProTrade Ideas</span>
                   </a>
                </li>
                <li class="nav-item start ">
                   <a href="index.php?page=trades" class="nav-link ">
                      <i class="fa fa-exchange"></i>
                      <span class="title">Trades</span>
                   </a>
                </li>


                <li class="heading">
                    <h3 class="uppercase">Metrics</h3>
                </li>
                <li class="nav-item start ">
                   <a href="index.php?page=tracker-performance" class="nav-link ">
                      <i class="fa fa-line-chart"></i>
                      <span class="title">Tracker Performance</span>
                   </a>
                </li>
                <li class="nav-item start ">
                   <a href="index.php?page=portfolio-distribution" class="nav-link ">
                      <i class="fa fa-pie-chart"></i>
                      <span class="title">Portfolio Distribution</span>
                   </a>
                </li>


                <li class="heading">
                    <h3 class="uppercase">Resources</h3>
                </li>
                <li class="nav-item start ">
                   <a href="index.php?page=trading-plan" class="nav-link ">
                      <i class="fa fa-list-alt"></i>
                      <span class="title">Trading Plan</span>
                   </a>
                </li>
                <li class="nav-item start ">
                   <a href="index.php?page=videos" class="nav-link ">
                      <i class="fa fa-youtube-play"></i>
                      <span class="title">Videos</span>
                   </a>
                </li>
                <?php
                // Checks to see if user has permission to view
                if($_SESSION['user_role'] == "super" || $_SESSION['user_role'] == "admin") { ?>
                <li class="nav-item start ">
                   <a href="index.php?page=FAQ" class="nav-link ">
                      <i class="fa fa-question-circle"></i>
                      <span class="title">FAQs</span>
                   </a>
                </li>
                <?php } ?>
                <li class="nav-item start ">
                   <a href="index.php?page=feedback" class="nav-link ">
                      <i class="fa fa-comments-o"></i>
                      <span class="title">Feedback</span>
                   </a>
                </li>


                <?php
                // Checks to see if user has permission to view
                if($_SESSION['user_role'] == "super" || $_SESSION['user_role'] == "admin") { ?>
                <li class="heading">
                    <h3 class="uppercase">Admin</h3>
                </li>
                <li class="nav-item start ">
                   <a href="index.php?admin=activate-user" class="nav-link ">
                      <i class="fa fa-user-plus"></i>
                      <span class="title">Activate Users</span>
                   </a>
                </li>
                <li class="nav-item start ">
                   <a href="index.php?admin=open-orders" class="nav-link ">
                      <i class="fa fa-folder-open-o"></i>
                      <span class="title">Open Orders</span>
                   </a>
                </li>
                <?php } ?>

                <?php if($_SESSION['user_role'] == "super") { ?>
                <li class="nav-item start ">
                   <a href="index.php?admin=data-dump" class="nav-link ">
                      <i class="fa fa-cloud-download"></i>
                      <span class="title">Data Dump</span>
                   </a>
                </li>
                <li class="nav-item start ">
                   <a href="index.php?admin=test" class="nav-link ">
                      <i class="fa fa-code"></i>
                      <span class="title">Test</span>
                   </a>
                </li>
                <?php } ?>

            </ul>
            <!-- END SIDEBAR MENU -->
            <!-- END SIDEBAR MENU -->
        </div>
        <!-- END SIDEBAR -->
   </div>
   <!-- END SIDEBAR -->