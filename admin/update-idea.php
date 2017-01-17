<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Update ProTrade Idea </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <?php
        if(isset($_POST["updateIdea"])){ ?>
        <div class="note note-info">
            <?php echo json_encode($msg); ?>
        </div>

        <?php } else { ?>
           <!-- BEGIN VALIDATION STATES-->
           <div class="portlet light portlet-fit portlet-form bordered">
               <div class="portlet-title">
                   <div class="caption">
                       <i class="fa fa-lightbulb-o font-dark"></i>
                       <span class="caption-subject font-dark sbold uppercase">Update ProTrade Idea</span>
                   </div>
               </div>
               <div class="portlet-body">
                   <!-- BEGIN FORM-->
                   <form method="post" action="index.php?admin=update-idea&update-id=<?php echo $_GET["id"] ?>" class="form-horizontal" name="updateIdeaForm" onsubmit="return postForm()">
                       <div class="form-body">
                           <div class="alert alert-danger display-hide">
                               <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                           <div class="alert alert-success display-hide">
                               <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                           <div class="form-group">
                               <label class="control-label col-md-3">Title
                                   <span class="required"> * </span>
                               </label>
                               <div class="col-md-4">
                                   <input id="idea_input_title" class="form-control" type="text" name="idea_title" value="<?php echo $pt_idea[0]->ti_title; ?>" required /> </div>
                           </div>
                           <div class="form-group">
                               <label class="col-md-3 control-label">Altcoin</label>
                               <div class="col-md-4">
                                       <input id="idea_input_coin" class="form-control" type="text" name="idea_coin" value="<?php echo $pt_idea[0]->ti_coin; ?>" />
                               </div>
                           </div>
                           <div class="form-group">
                               <label class="col-md-3 control-label">Chart URL</label>
                               <div class="col-md-4">
                                   <div class="input-group">
                                       <span class="input-group-addon">
                                           <i class="icon-link"></i>
                                       </span>
                                       <input id="idea_input_chart" class="form-control" type="text" name="idea_url" value="<?php echo $pt_idea[0]->ti_chart_url; ?>" /> </div>
                               </div>
                           </div>

                           <div class="form-group">
                               <label class="control-label col-md-3">Notes</label>
                               <div class="col-md-9">
                                  <div id="summernote" class="form-control"><?php echo $pt_idea[0]->ti_notes; ?></div>
                                  <input type="hidden" name="idea_notes" value="" >

                               </div>
                           </div>
                       </div>
                       <div class="form-actions">
                           <div class="row">
                               <div class="col-md-offset-3 col-md-9">
                                   <button type="submit" name="updateIdea" class="btn blue">Submit</button>
                               </div>
                           </div>
                       </div>
                   </form>
                   <!-- END FORM-->
               </div>
               <!-- END VALIDATION STATES-->
           </div>
           <?php } ?>


    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->