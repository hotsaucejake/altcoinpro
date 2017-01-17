<?php 
$start = 0; // from starting point in DB
$limit = 10; // show only X number of videos

if(isset($_GET["count"]) && ($_GET["count"] != 1)) { // pagination
   $count = $_GET["count"]; // get the page number
   $start = ($count-1) * $limit; // get the corresponding videos
   
   $sql = "SELECT *
            FROM videos
            ORDER BY v_id DESC";
   
} else {
   $count = 1;
   
   $sql = "SELECT *
            FROM videos
            ORDER BY v_id DESC";
}

$result = $bba->query($sql);
// limit the DB result to smaller array for pagination
$videos = array_slice($result, $start, $limit, true);

// get count of DB rows
$rows = count($result);
// calculate total page number for the given array in the database
$total = ceil($rows / $limit);