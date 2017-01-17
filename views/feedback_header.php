<?php
$msg = array();
if(isset($_POST["newFeedback"])){

   $insert_feedback = $bba->submitFeedback($_SESSION["user_name"], $_POST['feedback_input']);

   if($insert_feedback){
    $msg = 'Thank you, your feedback has been submitted!';
   } else {
    $msg['error'] = 'Did not execute!';
    $msg['user'] = $_SESSION["user_name"];
    $msg['feedback'] = $_POST['feedback_input'];
   }
}

if($_SESSION['user_role'] == "super" || $_SESSION['user_role'] == "admin") {

   if(isset($_GET["delete_feedback"])) {
      $sql = 'DELETE FROM feedback
               WHERE f_id = \'' . $_GET['delete_feedback'] . '\'';
      $delete_feedback = $bba->db_query($sql);
      if($delete_feedback){
         $delmsg = "Feedback was deleted!";
      } else {
         $delmsg = "ERROR!";
      }
   }



   $start = 0; // from starting point in DB
   $limit = 10; // show only X number of feedback comments

   if(isset($_GET["count"]) && ($_GET["count"] != 1)) { // pagination
      $count = $_GET["count"]; // get the page number
      $start = ($count-1) * $limit; // get the corresponding comments

      $sql = "SELECT *
               FROM feedback
               ORDER BY f_id DESC";

   } else {
      $count = 1;

      $sql = "SELECT *
               FROM feedback
               ORDER BY f_id DESC";
   }

   $result = $bba->query($sql);
   // limit the DB result to smaller array for pagination
   $comments = array_slice($result, $start, $limit, true);

   // get count of DB rows
   $rows = count($result);
   // calculate total page number for the given array in the database
   $total = ceil($rows / $limit);
}