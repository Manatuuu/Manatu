<?php
function init_background_process(){
    ob_end_clean();
    header("Connection: close\r\n");
    header("Content-Encoding: none\r\n");
    ignore_user_abort(true);
    ob_start();
}

function start_background_process(){
    $size = ob_get_length();
    header("Content-Length: $size");
    ob_end_flush();
    flush();
    ob_end_clean();
}

init_background_process();

echo 'test';

start_background_process();
?>
