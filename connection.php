<?php
ob_start();
session_start();
defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);
defined("IMG_DIRECTORY") ? null : define("IMG_DIRECTORY", _DIR_  . DS . "img");
/* LIVE */
//defined("DB_HOST") ? null : define("DB_HOST", "mysqlcluster18");
//defined("DB_ROOT") ? null : define("DB_ROOT", "liquid_barrier1");
//defined("DB_PASS") ? null : define("DB_PASS", "Liquid_barrier1");
//defined("DB_NAME") ? null : define("DB_NAME", "liquid_barrier");

/* Local */
//defined("DB_HOST") ? null : define("DB_HOST", "localhost");
//defined("DB_ROOT") ? null : define("DB_ROOT", "root");
//defined("DB_PASS") ? null : define("DB_PASS", "");
//defined("DB_NAME") ? null : define("DB_NAME", "liquidbarriersolutions");

/* Staging */
/*defined("DB_HOST") ? null : define("DB_HOST", "localhost");
defined("DB_ROOT") ? null : define("DB_ROOT", "projects_lbs");
defined("DB_PASS") ? null : define("DB_PASS", "j%fG9dNT++oJ");
defined("DB_NAME") ? null : define("DB_NAME", "projects_lbs");
*/
$con = mysqli_connect(DB_HOST,DB_ROOT,DB_PASS,DB_NAME);
//require_once("insert.php");
require_once("function.php");
//require_once("cart.php");

// Check connection
// if (mysqli_connect_errno())
//   {
//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
//   }
// else
// {
//          echo "Connection Successful";
// }
?>
