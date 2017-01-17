<link href="assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />


<?php
$msg = array();
if(isset($_POST["newIdea"])){

   $insert_idea = $bba->submitIdea($_SESSION["user_name"], $_POST['idea_title'], $_POST['idea_coin'], $_POST['idea_url'], $_POST['idea_notes']);

   if($insert_idea){
    $msg = 'New Trade Idea added!';
   } else {
    $msg['error'] = 'Did not execute!';
    $msg['username'] = $_SESSION["user_name"];
    $msg['title'] = $_POST['idea_title'];
    $msg['coin'] = $_POST['idea_coin'];
    $msg['url'] = $_POST['idea_url'];
    $msg['notes'] = $_POST['idea_notes'];
   }
}