<?php
  require_once("./phpQuery-onefile.php");
  $name = $_GET["name"];
  $html = file_get_contents("https://api.hypixel.net/player?key=12755d3c-51c6-4926-bb41-2baeb72d4c0c&name=$name");
  header("Content-Type: text/javascript; charset=utf-8");
  echo phpQuery::newDocument($html)->text();
?>
