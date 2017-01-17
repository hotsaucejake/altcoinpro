<?php

$start = 0; // from starting point in DB
$limit = 10; // show only X number of ProTrade Ideas

$altsql = "SELECT DISTINCT ti_coin
            FROM trade_ideas
            ORDER BY ti_coin";
$altcoins = $bba->query($altsql);

// if a single page is selected then display only that ProTrade Idea
if(isset($_GET["id"])){
   $sql = "SELECT *
            FROM trade_ideas
            WHERE ti_id = " . $_GET["id"];
   $trade_idea = $bba->query($sql);

   // if a page count is set and it's not the first page
} elseif(isset($_GET["count"]) && ($_GET["count"] != 1)) {
   $count = $_GET["count"]; // get the page number
   $start = ($count-1) * $limit; // get the corresponding ProTrade Ideas

   if (isset($_GET["author"]) && !empty($_GET["author"])) {
      $sql = 'SELECT *
               FROM trade_ideas
               WHERE ti_user = \'' . $_GET["author"] . '\'
               ORDER BY ti_id DESC';
   } elseif(isset($_GET["coin"]) && !empty($_GET["coin"])) {
      $sql = 'SELECT *
               FROM trade_ideas
               WHERE ti_coin = \'' . $_GET["coin"] . '\'
               ORDER BY ti_id DESC';
   } else {
      $sql = "SELECT *
               FROM trade_ideas
               ORDER BY ti_id DESC";
   }

   $result = $bba->query($sql);
   // limit the DB result to smaller array for pagination
   $bba_trade_ideas = array_slice($result, $start, $limit, true);

   // get count of DB rows
   $rows = count($result);
   // calculate total page number for the given array in the database
   $total = ceil($rows / $limit);

   // otherwise, display the first page of ProTrade Ideas
} else {
   $count = 1; // first page of results

   if (isset($_GET["author"]) && !empty($_GET["author"])) {
      $sql = 'SELECT *
               FROM trade_ideas
               WHERE ti_user = \'' . $_GET["author"] . '\'
               ORDER BY ti_id DESC';
   } elseif(isset($_GET["coin"]) && !empty($_GET["coin"])) {
      $sql = 'SELECT *
               FROM trade_ideas
               WHERE ti_coin = \'' . $_GET["coin"] . '\'
               ORDER BY ti_id DESC';
   } else {
      $sql = "SELECT *
               FROM trade_ideas
               ORDER BY ti_id DESC";
   }



   $result = $bba->query($sql);
   // limit the DB result to smaller array for pagination
   $bba_trade_ideas = array_slice($result, $start, $limit, true);

   // get count of DB rows
   $rows = count($result);
   // calculate total page number for the given array in the database
   $total = ceil($rows / $limit);
}