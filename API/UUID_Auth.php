<?php
    function br() {
        echo nl2br("\n");
    }
    function raw_json_encode($array, $flags = 0) {
        return preg_replace_callback('/\\\\u([0-9a-zA-Z]{4})/', function ($m) {
            return html_entity_decode("&#x$m[1];", 0, 'UTF-8');
        }, json_encode($array, $flags));
    }
    if (strlen($_GET["uuid"]) >= 1){
        if ($_GET["uuid"] == "5b222858-24d4-4060-ab61-55132d8042bc"){
            $array = array('success' => true);
            $raw_json = raw_json_encode($array);
            echo $raw_json;
            return;
        }
        $array = array('success' => false);
        $raw_json = raw_json_encode($array);
        echo $raw_json;
        return;
    }
    $array = array('success' => false);
    $raw_json = raw_json_encode($array);
    echo $raw_json;
?>
