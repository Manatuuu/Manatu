<?php
    function br() {
        echo nl2br("\n");
    }
    function json_xencode($value, $options = 0, $unescapee_unicode = true)
    {
      $v = json_encode($value, $options);
      if ($unescapee_unicode) {
        $v = unicode_encode($v);
        $v = preg_replace('/\\\\\//', '/', $v);
      }
      return $v;
    }
    define (URL, (empty($_SERVER['HTTPS']) ? 'http://' : 'https://').$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    
    if (strlen($_GET["unicode"]) >= 1){
        $json_array = array(
            'conv' => json_xencode($_GET["unicode"]),
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
