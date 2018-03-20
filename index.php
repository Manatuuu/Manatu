<?php
    function br() {
        echo nl2br("\n");
    }
    function unicode_unescape($str) {
      $callback = function ($matches) {
        if (empty($matches[2])) {
          $code = hexdec($matches[3]);
          return mb_convert_encoding(pack("N*", $code), "UTF-8", "UTF-32BE");
        } else {
          $code = hexdec($matches[2]);
          return mb_convert_encoding(pack("n*", $code), "UTF-8", "UTF-16BE");
        }
      };
      return preg_replace_callback("/(\\\\u([0-9a-zA-Z]{4})|\\\\U([0-9a-zA-Z]{8}))/", $callback, $str);
    }
    define (URL, (empty($_SERVER['HTTPS']) ? 'http://' : 'https://').$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    
    if (strlen($_GET["unicode"]) >= 1){
        $json_array = array(
            'conv' => unicode_unescape($_GET["unicode"]),
        );
        header("Content-Type: text/javascript; charset=utf-8");
        echo json_encode($json_array);
        return;
    }
    $json_array = array(
        'conv' => false,
    );
    header("Content-Type: text/javascript; charset=utf-8");
    echo json_encode($json_array);
?>
