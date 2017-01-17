<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> Activate Users </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
         <?php if((isset($_GET['activate']) && isset($_GET['user_id'])) || isset($_GET['delete'])){ ?>
            <div class="note note-info">
               <p><?php echo $msg; ?></p>
            </div>
         <?php } ?>

        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-users font-dark"></i>
                    <span class="caption-subject font-dark bold uppercase">User List</span>
                </div>
            </div>
            <div class="portlet-body">
               <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="user_list">
                  <thead>
                      <tr>
                          <th class="min-desktop">ID</th>
                          <th class="all">Username</th>
                          <th class="all">Email</th>
                          <th class="all">Status</th>
                          <th class="all">Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                     <?php
                     foreach ($users as $user) {
                       $user_state = $user->user_active;
                       echo '<tr>';
                       echo '<td>' . $user->user_id . '</td>';
                       echo '<td>' . $user->user_name . '</td>';
                       echo '<td>' . $user->user_email . '</td>';
                       if($user_state == '1'){
                          echo '<td>Activated</td>';
                       } else {
                          echo '<td><strong>Deactivated</strong></td>';
                       }
                       echo '<td>'; ?>
                                <div class="actions">
                                       <a class="btn btn-circle btn-icon-only btn-success font-dark bold"
                                             href="index.php?admin=activate-user&activate=1&user_id=<?php echo $user->user_id; ?>">
                                            <i class="icon-check"></i>
                                       </a>
                                       <a class="btn btn-circle btn-icon-only btn-danger font-dark bold"
                                             href="index.php?admin=activate-user&activate=0&user_id=<?php echo $user->user_id; ?>">
                                            <i class="icon-close"></i>
                                       </a>
                                       <?php if($_SESSION['user_role'] == "super") { ?>
                                       <a class="btn btn-circle btn-icon-only btn-info font-dark bold"
                                             href="index.php?admin=activate-user&delete=<?php echo $user->user_id; ?>"
                                             onclick="return confirm('Are you sure you wish to delete user <?php echo $user->user_name; ?>?');">
                                            <i class="icon-trash"></i>
                                       </a>
                                       <?php } ?>
                                </div>
                       <?php
                       echo '</td>';
                       echo '</tr>';
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