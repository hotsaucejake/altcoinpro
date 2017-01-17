<?php
   $msg = 'Nothing to see here.  Move along...';
   if(isset($_GET["id"])){
      $sql = 'DELETE FROM `trade_ideas`
               WHERE ((`ti_id` = \'' . $_GET["id"] . '\'))';
      $delete_idea = $bba->db_query($sql);
      if($delete_idea){
         $msg = '<h3>This entry has been deleted.</h3>';
      } else {
       $msg = "<h3>You alread deleted this or this entry does not exist.</h3>";
      }
   } 
?>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Delete ProTrade Idea </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="note note-info">
            <?php echo $msg; ?>
        </div>
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->