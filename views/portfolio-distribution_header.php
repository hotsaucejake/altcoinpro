<?php // link for documentation
// https://google-developers.appspot.com/chart/interactive/docs/gallery/piechart
   $coinigy = new Coinigy();
   $balances = $coinigy->get_exchangeBalances("8463,8464,8465,8466");
   $total_btc = 0;
   foreach ($balances["data"] as $balance) { // total btc value of all coins
      $total_btc += $balance["btc_balance"];
   }
   
   $altcoin_balance = array();
   $altcoin = array();
   $altcoin_p = array();
   $altcoin_data = '[[\'Coin\',\'Hedge\']';
   foreach ($balances["data"] as $balance) {
     $altcoin_data .= ',[\'' . $balance["balance_curr_code"] . '\', ' . $balance["btc_balance"] . ']';
     $altcoin_balance[] = $balance["btc_balance"];
     $altcoin[] = $balance["balance_curr_code"];
     $altcoin_p[] = round($balance["btc_balance"] / $total_btc * 100, 2);
   }
   $altcoin_data .= ']';
   
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        
        var data = google.visualization.arrayToDataTable(<?php echo $altcoin_data; ?>);

        var options = {
           tooltip: { text: 'percentage' },
           is3D: true,
           chartArea: { width:'100%', height:500 }	
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>