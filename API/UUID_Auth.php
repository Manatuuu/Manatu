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
        if ($_GET["uuid"] == ("5b222858-24d4-4060-ab61-55132d8042bc" or "6af1557e-3003-48ca-9989-fe703f9729c7" or "6dcaaf9a-1c13-4e2c-b840-683532e96a50")){
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
