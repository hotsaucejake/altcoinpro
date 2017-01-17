<?php

// time constraints
$today = new DateTime("today");
$start_date = new DateTime('2016-08-19');
$interval = new DateInterval('P7D');

$coinigy = new Coinigy();

// coindesk API for BTC price calculations
$apiURL = 'http://api.coindesk.com/v1/bpi/historical/close.json?start=2016-07-29&end=' . $today->format("Y-m-d");
$jsonData = file_get_contents($apiURL);
$postData = json_decode($jsonData, true);


$chartArray = '[[\'Date\',\'Tracker\',\'BTC\']';
$chartArray .= ',[\'2016-07-29\', 0, 0]';
$chartArray .= ',[\'2016-08-05\', 2.04, -12.44]';
$chartArray .= ',[\'2016-08-12\', 5.11, -10.76]';
while ($start_date < $today) {
   $chartArray .= ',[\'' . $start_date->format('Y-m-d') . '\', ' . btcValueHistory($coinigy, $start_date) . ', ' . btcPrice($postData, $start_date) . ']';
   $start_date->add($interval);
}
$chartArray .= ']';


function btcValueHistory($coinigy, $given_date) {
   $btcValue = 0;
   $timeframe = (string) $given_date->format('Y-m-d');
   $balanceHistory = $coinigy->get_balanceHistory($timeframe);
   foreach ($balanceHistory["data"]["balance_history"] as $bHistory) {
      if ($bHistory["auth_id"] == 8463 || $bHistory["auth_id"] == 8464 || $bHistory["auth_id"] == 8465 || $bHistory["auth_id"] == 8466) {
         $btcValue += $bHistory["btc_value"];
      }
   }
   $btcValue = (($btcValue - 2)/2) * 100;

   return $btcValue;
}

function btcPrice($postData, $given_date) {
   $timeframe = (string) $given_date->format('Y-m-d');
   $btcPerc = (($postData["bpi"][$timeframe] - $postData["bpi"]["2016-07-29"]) / $postData["bpi"]["2016-07-29"]) * 100;
   return $btcPerc;
}

?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawCurveTypes);

function drawCurveTypes() {
   var data = google.visualization.arrayToDataTable(<?php echo $chartArray; ?>);


    var options = {
      height: 500,
      timeline: {
          groupByRowLabel: true
       },
     hAxis: {
        slantedText: true,
        slantedTextAngle: 45 // here you can even use 180
     },
     vAxis: {
        title: '%',
        gridlines: { count: 20 }
     },
     series: {
        1: {curveType: 'function'}
     },
     legend: { position: 'top' },
     pointSize: 10

    };

    var chart = new google.visualization.LineChart(document.getElementById('line_chart'));
    chart.draw(data, options);
 }
  </script>