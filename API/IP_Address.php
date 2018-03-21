<?php
    function raw_json_encode($array, $flags = 0) {
        return preg_replace_callback('/\\\\u([0-9a-zA-Z]{4})/', function ($m) {
            return html_entity_decode("&#x$m[1];", 0, 'UTF-8');
        }, json_encode($array, $flags));
    }
    $array = array('ip' => '$_SERVER['HTTP_X_FORWARDED_FOR']');
    $raw_json = raw_json_encode($array);
    echo $raw_json;
?>
