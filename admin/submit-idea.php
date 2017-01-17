<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Submit a New ProTrade Idea </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <?php
        if(isset($_POST["newIdea"])){ ?>
        <div class="note note-info">
            <?php echo json_encode($msg); ?>
        </div>

        <?php } else { ?>
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-lightbulb-o font-dark"></i>
                    <span class="caption-subject font-dark sbold uppercase">New Trade Alert</span>
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form method="post" action="index.php?admin=submit-idea" class="form-horizontal" name="ideaForm" onsubmit="return postForm()">
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
                                <input id="idea_input_title" class="form-control" type="text" name="idea_title" placeholder="Shitcoin Update" required /> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Altcoin</label>
                            <div class="col-md-4">
                                    <input id="idea_input_coin" class="form-control" type="text" name="idea_coin" placeholder="XMR" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Chart URL</label>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="icon-link"></i>
                                    </span>
                                    <input id="idea_input_chart" class="form-control" type="text" name="idea_url" placeholder="https://www.coinigy.com/assets/img/charts/57b7dec9.png" /> </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Notes</label>
                            <div class="col-md-9">
                               <div id="summernote" class="form-control"> </div>
                               <input type="hidden" name="idea_notes" value="" >
                               <!--
                                <textarea id="summernote" class="form-control" rows="6" name="idea_notes" enctype="multipart/form-data" placeholder="Buy Low / Sell High"></textarea>
                             -->
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" name="newIdea" class="btn blue">Submit</button>
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
