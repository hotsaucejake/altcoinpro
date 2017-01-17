<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Feedback </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <?php
        if(isset($_POST["newFeedback"])){ ?>
        <div class="note note-info">
            <?php echo json_encode($msg); ?>
        </div>

        <?php } else { ?>
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-comments-o font-dark"></i>
                    <span class="caption-subject font-dark bold">AltcoinPro Feedback</span>
                </div>
            </div>
            <div class="portlet-body">
               <div class="row">
                   <div class="col-md-offset-2 col-md-10">
                      <p class="lead">Do you have questions, comments, suggestions, or general feedback?  Leave them here.</p>
                   </div>
                </div>
                <form method="post" action="index.php?page=feedback" class="form-horizontal" name="feedbackForm" onsubmit="">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-2">Feedback
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-10">
                                <textarea class="form-control"  name="feedback_input" rows="6" required> </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-10">
                                <button type="submit" name="newFeedback" class="btn blue">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php } ?>

        <?php if($_SESSION['user_role'] == "super" || $_SESSION['user_role'] == "admin") { ?>

           <?php if(isset($_GET["delete_feedback"])) { ?>
             <div class="note note-info">
                 <?php echo json_encode($delmsg); ?>
             </div>

           <?php } ?>


         <div class="row">

            <?php foreach ($comments as $comment) { ?>
            <div class="col-md-4">
               <div class="portlet box blue-hoki">
                   <div class="portlet-title">
                       <div class="caption">
                           <i class="fa fa-comments-o"></i><?php echo $comment->f_user; ?></div>
                       <div class="actions">
                           <a href="index.php?page=feedback&delete_feedback=<?php echo $comment->f_id; ?>" class="btn btn-default btn-sm" onclick="return confirm('Are you sure you wish to delete this record?');">
                               <i class="fa fa-trash"></i> Delete </a>
                       </div>
                   </div>
                   <div class="portlet-body">
                       <div class="scroller" style="height:200px" data-rail-visible="1" data-rail-color="blue" data-handle-color="#a1b2ff">
                          <p><?php echo $comment->f_feedback; ?></p>
                           <p><strong><?php echo substr($comment->f_datetime, 0, 16); ?> GMT</strong></p>
                        </div>
                   </div>
               </div>
            </div>
            <?php } ?>


         </div>

         <div class="row">
           <div class="col-md-12">

             <nav aria-label="Page navigation">
                <ul class="pagination">
                   <?php
                   if($count > 1){
                      // go to previous page, inactive on page 1 ?>
                      <li><a href="index.php?page=feedback&count=<?php echo ($count-1); ?>" aria-label="Previous">
                         <span aria-hidden="true">PREVIOUS</span></a></li>
             <?php }
                   // list how many possible pages
                   for ($i=1; $i <= $total; $i++) { ?>
                      <li><a href="index.php?page=feedback&count=<?php echo $i; ?>"><?php echo $i; ?></a></li>
             <?php }

                   if($count != $total){
                      // go to next page, inactive on last page ?>
                   <li><a href="index.php?page=feedback&count=<?php echo ($count+1); ?>" aria-label="Next">
                         <span aria-hidden="true">NEXT</span></a></li>
             <?php } ?>
                </ul>
             </nav>

           </div>
        </div>

        <?php } ?>

    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->