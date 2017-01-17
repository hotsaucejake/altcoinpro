</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
   <div class="page-footer-inner"> 2016 &copy;
        <a target="_blank" href="https://www.bullbearanalytics.com/">BullBear Analytics</a> &nbsp;|&nbsp;
        <a target="_blank" href="https://www.bullbearanalytics.com/legal.html">Terms of Use</a> &nbsp;|&nbsp;
        Developed By <a href="http://koinster.com" title="Koinster" target="_blank">Koinster</a>
   </div>
   <div class="scroll-to-top">
        <i class="icon-arrow-up"></i>
   </div>
</div>
<!-- END FOOTER -->
</div>
<!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
<script src="assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
<script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
<!-- BEGIN PAGE-SPECIFIC FOOTERS -->
<?php
 if(isset($_GET["page"]) && file_exists("views/" . $_GET["page"] . "_footer.php")){
    include("views/" . $_GET["page"] . "_footer.php");
} elseif(isset($_GET["admin"]) && file_exists("admin/" . $_GET["admin"] . "_footer.php")){
    include("admin/" . $_GET["admin"] . "_footer.php");
 }
 ?>
<!-- END PAGE-SPECIFIC FOOTERS -->
</body>