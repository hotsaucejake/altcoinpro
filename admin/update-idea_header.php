<link href="assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />


<?php
$msg = array();
if(isset($_POST["updateIdea"]) && isset($_GET["update-id"])){

   $update_idea = $bba->updateIdea($_GET["update-id"], $_POST['idea_title'], $_POST['idea_coin'], $_POST['idea_url'], $_POST['idea_notes']);

   if($update_idea){
    $msg = 'ProTrade Idea updated!';
   } else {
    $msg['error'] = 'Did not execute!';
    $msg['username'] = $_SESSION["user_name"];
    $msg['title'] = $_POST['idea_title'];
    $msg['coin'] = $_POST['idea_coin'];
    $msg['url'] = $_POST['idea_url'];
    $msg['notes'] = $_POST['idea_notes'];
   }
} elseif(isset($_GET["id"])){
   $sql = "SELECT *
            FROM trade_ideas
            WHERE ti_id = " . $_GET["id"];
   $pt_idea = $bba->query($sql);
} else {
   $msg['error'] = 'Did not execute!';
}