<?php

/**
 *
 *
 *
 * @author Koinster
 * @link http://koinster.com
 */

// include the configs / constants for the database connection
require_once("config/config.php");

// load the login class
require_once("classes/Login.php");
// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process. in consequence, you can simply ...
$login = new Login();

// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == true) {
   require_once('classes/BBA.php');
   $bba = new BBA(DB_USER, DB_PASS, DB_NAME, DB_HOST);
   // Is this the ONLY call to the DB that I need?

   require_once('classes/Coinigy.php');

   include('views/_header.php');
   include('views/_sidebar.php');

   if(isset($_GET["page"])){ // if a page is set in URL
      if(file_exists("views/" . $_GET["page"] . ".php")){ // checks to make sure file exists
         include("views/" . $_GET["page"] . ".php");
      } else { // if the file doesn't exist create 404 page
         include("views/404.php");
      }
   } elseif(isset($_GET["admin"])) { // if admin is set in URL
      if(($_SESSION['user_role'] == "super" || $_SESSION['user_role'] == "admin") && file_exists("admin/" . $_GET["admin"] . ".php")) { // if they're an admin and page exists
         include("admin/" . $_GET["admin"] . ".php");
      } else { // if user is not admin or page does not exist
         include("admin/404.php");
      }

   } else { // include a default page for index.php if user is logged in
      include("views/dashboard.php");
   }

   include('views/_quick-sidebar.php');
   include('views/_footer.php');

} else { // the user is not logged in
   // load the registration class
   require_once("classes/Registration.php");
   // create the registration object. when this object is created, it will do all registration stuff automatically
   // so this single line handles the entire registration process.
   $registration = new Registration();
   include("login.php");
}