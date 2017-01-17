<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">Videos</h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="row">
           
           <?php foreach ($videos as $video) { ?>
           <div class="col-md-6">
              <div class="portlet light bordered">
                  <div class="portlet-title">
                      <div class="caption">
                          <i class="fa fa-youtube-play font-dark"></i>
                          <span class="caption-subject font-dark bold uppercase">
                          <?php echo $video->v_title; ?>
                          </span>
                      </div>
                  </div>
                  <div class="portlet-body">
                     <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="//www.youtube.com/embed/<?php echo $video->v_videoID; ?>" allowfullscreen></iframe>
                     </div>
                  </div>
              </div>
           </div>
           <?php } ?>
           
       </div> <!-- end row -->
       
       <div class="row">
          <div class="col-md-12">

            <nav aria-label="Page navigation">
               <ul class="pagination">
                  <?php
                  if($count > 1){
                     // go to previous page, inactive on page 1 ?>
                     <li><a href="index.php?page=videos&count=<?php echo ($count-1); ?>" aria-label="Previous">
                        <span aria-hidden="true">PREVIOUS</span></a></li>
            <?php }
                  // list how many possible pages
                  for ($i=1; $i <= $total; $i++) { ?>
                     <li><a href="index.php?page=videos&count=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php }

                  if($count != $total){
                     // go to next page, inactive on last page ?>
                  <li><a href="index.php?page=videos&count=<?php echo ($count+1); ?>" aria-label="Next">
                        <span aria-hidden="true">NEXT</span></a></li>
            <?php } ?>
               </ul>
            </nav>
            
          </div>
       </div>
       
       
    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->