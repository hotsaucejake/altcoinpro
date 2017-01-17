<?php

class Coinigy {

  //private class vars set in constructor
  private $coinigy_api_key;
  private $coinigy_api_secret;
  private $endpoint;

  function __construct() {
    //see API docs for more info
    $this->coinigy_api_key = COINIGY_KEY;
    $this->coinigy_api_secret = COINIGY_SECRET;
    $this->endpoint = 'https://www.coinigy.com/api/v1/'; //with trailing slash
  }

  private function doWebRequest($method, $post_arr) {
      $url = $this->endpoint.$method;
      $headers = array('X-API-KEY: ' . $this->coinigy_api_key,
                       'X-API-SECRET: ' . $this->coinigy_api_secret);

      // curl handle (initialize if required)
      static $ch = null;
      if (is_null($ch)) {
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_USERAGENT,
            'Mozilla/4.0 (compatible; Coinigy App Client; '.php_uname('s').
            '; PHP/'.phpversion().')');
      }

      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post_arr);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, TRUE);
      $res = curl_exec($ch);

      if ($res === false)  {
          echo "CURL Failed - Check URL";
          return false;
      }

      $dec = json_decode($res, true);

      if (!$dec) {
          echo "Invalid JSON returned - Redirect to Login";
          return false;
      }

      return $dec;
  }

  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////
  ////// Account Data
  ///////// Gather information about your Coinigy account
  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////

  /////////////////////////////////////////////////////////////////////////////////
  //////////// Account Info
  /////////////// Returns your account information and preferences
  /////////////////////////////////////////////////////////////////////////////////
  public function get_userInfo() {
    $post_arr = array();
    return $this->doWebRequest('userInfo', $post_arr);
  } // [error] => This API key does not have access to the requested method.

  /////////////////////////////////////////////////////////////////////////////////
  //////////// Activity Log
  /////////////// Returns a list of your recent account activity
  /////////////////////////////////////////////////////////////////////////////////
  public function get_activity() {
      $post_arr = array();
      return $this->doWebRequest('activity', $post_arr);
  }

  /////////////////////////////////////////////////////////////////////////////////
  //////////// Notifications
  /////////////// List any unshown alerts or trade notifications
  /////////////////////////////////////////////////////////////////////////////////
  public function get_pushNotifications() {
      $post_arr = array();
      return $this->doWebRequest('pushNotifications', $post_arr);
  }

  /////////////////////////////////////////////////////////////////////////////////
  //////////// List Accounts
  /////////////// Returns a list of your attached exchange accounts and wallets,
  /////////////// each with a unique auth_id.
  /////////////////////////////////////////////////////////////////////////////////
  public function get_accounts() {
    $post_arr = array();
    return $this->doWebRequest('accounts', $post_arr);
  }

  /////////////////////////////////////////////////////////////////////////////////
  //////////// List Balances
  /////////////// Returns a combined list of balances for all accounts, or
  /////////////// specificied auth_ids
  /////////////////////////////////////////////////////////////////////////////////
  public function get_balances() {
      $post_arr = array();
      return $this->doWebRequest('balances', $post_arr);
  }

  public function get_exchangeBalances($auth_ids) {
      $post_arr = array();
      $post_arr["auth_ids"] = $auth_ids;
      return $this->doWebRequest('balances', $post_arr);
  }

  /////////////////////////////////////////////////////////////////////////////////
  //////////// Balance History
  /////////////// Returns balances for your entire account on given date
  /////////////////////////////////////////////////////////////////////////////////
  public function get_balanceHistory($yearmonthday) {
      $post_arr = array();
      $post_arr["date"] = $yearmonthday; // Datetime ("2016-07-01")
      return $this->doWebRequest('balanceHistory', $post_arr);
  }

  /////////////////////////////////////////////////////////////////////////////////
  //////////// List Orders
  /////////////// Returns a list of all open orders and recent order history
  /////////////////////////////////////////////////////////////////////////////////
  public function get_userOrders() {
      $post_arr = array();
      return $this->doWebRequest('orders', $post_arr);
  }

  /////////////////////////////////////////////////////////////////////////////////
  //////////// List Alerts
  /////////////// Returns a list of all open alerts and recent alert history
  /////////////////////////////////////////////////////////////////////////////////
  public function get_alerts() {
      $post_arr = array();
      return $this->doWebRequest('alerts', $post_arr);
  }

  /////////////////////////////////////////////////////////////////////////////////
  //////////// Watch List
  /////////////// Returns ticker data on your favorite markets
  /////////////////////////////////////////////////////////////////////////////////
  public function get_userWatchList() {
      $post_arr = array();
      return $this->doWebRequest('userWatchList', $post_arr);
  }

  /////////////////////////////////////////////////////////////////////////////////
  //////////// List News Articles
  /////////////// Returns a list of the latest items from newsfeed sources
  /////////////////////////////////////////////////////////////////////////////////
  public function get_newsFeed() {
      $post_arr = array();
      return $this->doWebRequest('newsFeed', $post_arr);
  }


  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////
  ////// Account Functions
  ///////// Private account methods - place alerts, orders, refresh balances
  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////

  /////////////////////////////////////////////////////////////////////////////////
  //////////// Update User Data
  /////////////// Update your account information on record
  /////////////////////////////////////////////////////////////////////////////////
  public function updateUser($first_name, $last_name, $company, $phone, $street1,
                              $street2, $city, $state, $zip, $country) {
     $post_arr = array();
     $post_arr["first_name"] = $first_name; // String
     $post_arr["last_name"] = $last_name; // String
     $post_arr["company"] = $company; // String
     $post_arr["phone"] = $phone; // String
     $post_arr["street1"] = $street1; // String
     $post_arr["street2"] =  $street2; // String
     $post_arr["city"] = $city; // String
     $post_arr["state"] = $state; // String
     $post_arr["zip"] = $zip; // String
     $post_arr["country"] = $country; // String
     return $this->doWebRequest('updateUser', $post_arr);
 }

  /////////////////////////////////////////////////////////////////////////////////
  //////////// Save Notification Preferences
  /////////////// Update your notification preferences (alerts, trades, balances)
  /////////////// via (email, sms)
  /////////////////////////////////////////////////////////////////////////////////
  public function savePrefs($alert_email, $alert_sms, $trade_email, $trade_sms,
                              $balance_email) {
      $post_arr = array();
      $post_arr["alert_email"] = $alert_email; // Boolean
      $post_arr["alert_sms"] = $alert_sms; // Boolean
      $post_arr["trade_email"] = $trade_email; // Boolean
      $post_arr["trade_sms"] = $trade_sms; // Boolean
      $post_arr["balance_email"] = $balance_email; // Boolean
      return $this->doWebRequest('savePrefs', $post_arr);
 }

  /////////////////////////////////////////////////////////////////////////////////
  //////////// Update Tickers
  /////////////// Update your favorite markets/tickers based on exch_mkt_id
  /////////////// updateTickers("7435,3401,3373,3385,6748,132,1146,363")
  /////////////////////////////////////////////////////////////////////////////////
  public function updateTickers($exch_mkt_ids) {
     $post_arr = array();
     $post_arr["exch_mkt_ids"] = $exch_mkt_ids; // String
     return $this->doWebRequest('updateTickers', $post_arr);
 }

  /////////////////////////////////////////////////////////////////////////////////
  //////////// List Order Types
  /////////////// Returns a list of supported order and price types
  /////////////////////////////////////////////////////////////////////////////////
  public function get_orderTypes() {
      $post_arr = array();
      return $this->doWebRequest('orderTypes', $post_arr);
  }

  /////////////////////////////////////////////////////////////////////////////////
  //////////// Refresh Balance
  /////////////// Refresh balances on specified auth_id
  /////////////////////////////////////////////////////////////////////////////////
  public function refreshBalance($auth_id) {
      $post_arr = array();
      $post_arr["auth_id"] = $auth_id; // Int
      return $this->doWebRequest('refreshBalance', $post_arr);
  }

  /////////////////////////////////////////////////////////////////////////////////
  //////////// Add Alert
  /////////////// Add a new price alert
  /////////////////////////////////////////////////////////////////////////////////
  public function addAlert($exchange_code, $exchange_market, $alert_price,
                           $alert_note) {
      $post_arr = array();
      $post_arr["exch_code"] = $exchange_code; // String
      $post_arr["market_name"] = $exchange_market; // String
      $post_arr["alert_price"] = $alert_price; // Float
      $post_arr["alert_note"] = $alert_note; // String
      return $this->doWebRequest('addAlert', $post_arr);
  }

  /////////////////////////////////////////////////////////////////////////////////
  //////////// Delete Alert
  /////////////// Delete existing price alert
  /////////////////////////////////////////////////////////////////////////////////
  public function deleteAlert($delete_alert_id) {
      $post_arr = array();
      $post_arr["alert_id"] = $delete_alert_id; // Int
      return $this->doWebRequest('deleteAlert', $post_arr);
  }

  /////////////////////////////////////////////////////////////////////////////////
  //////////// Add API Key
  /////////////// Add a new Exchange API Key to your account. Returns
  /////////////// newly-generated auth_id in "data" block. After adding a new key,
  /////////////// it must still be both activated (/activateApiKey) and activated
  /////////////// for trading (/activateTradingKey).
  /////////////////////////////////////////////////////////////////////////////////
  public function addApiKey($add_api_key, $add_api_secret, $add_api_exch_id,
                              $add_api_nickname) {
      $post_arr = array();
      $post_arr["api_key"] = $add_api_key; // String
      $post_arr["api_secret"] = $add_api_secret; // String
      $post_arr["api_exch_id"] = $add_api_exch_id; // Int
      $post_arr["api_nickname"] = $add_api_nickname; // String
      return $this->doWebRequest('addApiKey', $post_arr);
  }

  /////////////////////////////////////////////////////////////////////////////////
  //////////// Delete API Key
  /////////////// Delete specified Exchange API Account
  /////////////////////////////////////////////////////////////////////////////////
  public function deleteApiKey($auth_id) {
      $post_arr = array();
      $post_arr["auth_id"] = $auth_id; // Int
      return $this->doWebRequest('deleteApiKey', $post_arr);
  }

  /////////////////////////////////////////////////////////////////////////////////
  //////////// Activate API Key
  /////////////// Activate/Enable API Key usage (enables automatic balance monitoring)
  /////////////////////////////////////////////////////////////////////////////////
  public function activateApiKey($auth_id, $auth_active) {
      $post_arr = array();
      $post_arr["auth_id"] = $auth_id; // Int
      $post_arr["auth_active"] = $auth_active; // Boolean
      return $this->doWebRequest('activateApiKey', $post_arr);
  }

  /////////////////////////////////////////////////////////////////////////////////
  //////////// Activate Trading Key
  /////////////// Activate/Enable Trading on specified API key
  /////////////////////////////////////////////////////////////////////////////////
  public function activateTradingKey($auth_id, $auth_trade) {
      $post_arr = array();
      $post_arr["auth_id"] = $auth_id; // Int
      $post_arr["auth_trade"] = $auth_trade; // Boolean
      return $this->doWebRequest('activateTradingKey', $post_arr);
  }

  /////////////////////////////////////////////////////////////////////////////////
  //////////// Add Order
  /////////////// Create a new exchange order
  /////////////////////////////////////////////////////////////////////////////////
  public function addOrder($order_auth_id, $order_exch_id, $order_mkt_id,
                           $order_type_id, $price_type_id, $limit_price,
                           $order_quantity) {
      $post_arr = array();
      $post_arr["auth_id"] = $order_auth_id; // Int
      $post_arr["exch_id"] = $order_exch_id; // Int
      $post_arr["mkt_id"] = $order_mkt_id; // Int
      $post_arr["order_type_id"] = $order_type_id; // Int
      $post_arr["price_type_id"] = $price_type_id; // Int
      $post_arr["limit_price"] =$limit_price; // Float
      $post_arr["order_quantity"] = $order_quantity; // Float
      return $this->doWebRequest('addOrder', $post_arr);
  }

  /////////////////////////////////////////////////////////////////////////////////
  //////////// Cancel Order
  /////////////// Cancel an outstanding exchange order
  /////////////////////////////////////////////////////////////////////////////////
  public function cancelOrder($cancel_order_id) {
      $post_arr = array();
      $post_arr["internal_order_id"] = $cancel_order_id; // Int
      return $this->doWebRequest('cancelOrder', $post_arr);
  }


  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////
  ////// Market Data
  ///////// Access exchange and market data
  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////
  /////////////////////////////////////////////////////////////////////////////////

  /////////////////////////////////////////////////////////////////////////////////
  //////////// List Exchanges
  /////////////// Returns a list of all supported exchanges
  /////////////////////////////////////////////////////////////////////////////////
  public function get_exchanges() {
      $post_arr = array();
      return $this->doWebRequest('exchanges', $post_arr);
  }

  /////////////////////////////////////////////////////////////////////////////////
  //////////// List Markets
  /////////////// Returns a list of markets on specified exchange
  /////////////////////////////////////////////////////////////////////////////////
  public function get_markets($exchange_code) {
      $post_arr = array();
      $post_arr["exchange_code"] = $exchange_code; // String
      return $this->doWebRequest('markets', $post_arr);
  }

  /////////////////////////////////////////////////////////////////////////////////
  //////////// Market Data
  /////////////// Trade history, asks and bids for any supported exchange/market.
  /////////////////////////////////////////////////////////////////////////////////
  // data {type:history}
  public function get_history($exchange_code, $exchange_market) {
      $post_arr = array();
      $post_arr["exchange_code"] = $exchange_code; // String
      $post_arr["exchange_market"] = $exchange_market; // String
      $post_arr["type"] = "history";
      return $this->doWebRequest('data', $post_arr);
  }
  // data {type:asks}
  public function get_asks($exchange_code, $exchange_market) {
      $post_arr = array();
      $post_arr["exchange_code"] = $exchange_code; // String
      $post_arr["exchange_market"] = $exchange_market; // String
      $post_arr["type"] = "asks";
      return $this->doWebRequest('data', $post_arr);
  }
  // data {type:bids}
  public function get_bids($exchange_code, $exchange_market) {
      $post_arr = array();
      $post_arr["exchange_code"] = $exchange_code; // String
      $post_arr["exchange_market"] = $exchange_market; // String
      $post_arr["type"] = "bids";
      return $this->doWebRequest('data', $post_arr);
  }
  // data {type:orders} // asks + bids
  public function get_orders($exchange_code, $exchange_market) {
      $post_arr = array();
      $post_arr["exchange_code"] = $exchange_code; // String
      $post_arr["exchange_market"] = $exchange_market; // String
      $post_arr["type"] = "orders";
      return $this->doWebRequest('data', $post_arr);
  }
  // data {type:all} // asks + bids + history
  public function get_data($exchange_code, $exchange_market) {
      $post_arr = array();
      $post_arr["exchange_code"] = $exchange_code; // String
      $post_arr["exchange_market"] = $exchange_market; // String
      $post_arr["type"] = "all";
      return $this->doWebRequest('data', $post_arr);
  }

  /////////////////////////////////////////////////////////////////////////////////
  //////////// Price Ticker
  /////////////// Returns last, high (24h), low (24h), ask, bid for specified market
  /////////////////////////////////////////////////////////////////////////////////
  public function get_ticker($exchange_code, $exchange_market) {
      $post_arr = array();
      $post_arr["exchange_code"] = $exchange_code; // String
      $post_arr["exchange_market"] = $exchange_market; // String
      return $this->doWebRequest('ticker', $post_arr);
  }

}
