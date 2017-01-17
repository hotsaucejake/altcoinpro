<link href="assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />

<?php
if(isset($_GET['activate']) && isset($_GET['user_id'])){
   if($_GET['activate'] == 1){
      $msg2 = "activated!";
      $sql = 'UPDATE users
               SET user_active = 1
               WHERE user_id = \'' . $_GET['user_id'] . '\'';
   } else {
      $msg2 = "deactivated!";
      $sql = 'UPDATE users
               SET user_active = 0
               WHERE user_id = \'' . $_GET['user_id'] . '\'';
   }
   $active_status = $bba->db_query($sql);
   if($active_status){
      $msg = "User was successfully " . $msg2;
   } else {
      $msg = "ERROR!";
   }
} elseif(isset($_GET['delete'])) {
   $sql = 'DELETE FROM users
            WHERE user_id = \'' . $_GET['delete'] . '\'';
   $delete_user = $bba->db_query($sql);
   if($delete_user){
      $msg = "User was deleted!";
   } else {
      $msg = "ERROR!";
   }
}




$sql = 'SELECT user_id, user_name, user_email, user_active, user_role
         FROM users
         ORDER BY user_id DESC';

$users = $bba->query($sql);