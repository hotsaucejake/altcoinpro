<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Submit a New Video </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <?php
        if(isset($_POST["newVideo"])){ ?>
        <div class="note note-info">
            <?php echo json_encode($msg); ?>
        </div>

        <?php } else { ?>
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-youtube-play font-dark"></i>
                    <span class="caption-subject font-dark sbold uppercase">New Video</span>
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form method="post" action="index.php?admin=submit-video" class="form-horizontal" name="videoForm" onsubmit="">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Title
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input id="video_input_title" class="form-control" type="text" name="video_title" placeholder="Video Title" required /> </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Video ID
                                <span class="required"> * </span>
                            </label>
                            <div class="col-md-4">
                                <input id="video_input_ID" class="form-control" type="text" name="video_ID" placeholder="Um63OQz3bjo" required /> </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" name="newVideo" class="btn blue">Submit</button>
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
