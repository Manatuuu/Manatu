
<?php
  $url = "https://api.hypixel.net/player?key=12755d3c-51c6-4926-bb41-2baeb72d4c0c&name=skquery";
  $conn = curl_init();
  curl_setopt($conn, CURLOPT_URL, $url);
  curl_setopt($conn, CURLOPT_RETURNTRANSFER, true);
  $res =  curl_exec($conn);
  var_dump($res);
  curl_close($conn);
?>
