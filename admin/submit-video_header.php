<?php
$msg = array();
if(isset($_POST["newVideo"])){

   $insert_video = $bba->submitVideo($_POST['video_title'], $_POST['video_ID']);

   if($insert_video){
    $msg = 'New video added!';
   } else {
    $msg['error'] = 'Did not execute!';
    $msg['title'] = $_POST['video_title'];
    $msg['video'] = $_POST['video_ID'];
   }
}