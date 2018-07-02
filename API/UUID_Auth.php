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
        if ($_GET["uuid"] == "5b222858-24d4-4060-ab61-55132d8042bc" or $_GET["uuid"] == "6af1557e-3003-48ca-9989-fe703f9729c7" or $_GET["uuid"] == "6dcaaf9a-1c13-4e2c-b840-683532e96a50" or $_GET["uuid"] == "00bc6377-e569-441f-bf59-a83f550aa6d4" or $_GET["uuid"] == "16622f97-9740-42e7-9205-d7f971f63629" or $_GET["uuid"] == "dbf9517f-999d-479d-9fd5-dd6973f6af37" or $_GET["uuid"] == "9a1743fa-38f6-421b-ba02-be898c0e47a4"){
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
