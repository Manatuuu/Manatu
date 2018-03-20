<?php
    function br() {
        echo nl2br("\n");
    }
    function unicode_sequence_decode($string)
    {
        return json_decode('"'.$string.'"');
    }
    function raw_json_encode($array, $flags = 0) {
        return preg_replace_callback('/\\\\u([0-9a-zA-Z]{4})/', function ($m) {
            return html_entity_decode("&#x$m[1];", 0, 'UTF-8');
        }, json_encode($array, $flags));
    }
    if (strlen($_GET["unicode"]) >= 1){
        $array = array('conv' => unicode_sequence_decode($_GET["unicode"]));
        $raw_json = raw_json_encode($array);
        echo $raw_json;
        return;
    }
    $json_array = array(
        'conv' => false,
    );
    header("Content-Type: text/javascript; charset=utf-8");
    echo json_encode($json_array);
?>
