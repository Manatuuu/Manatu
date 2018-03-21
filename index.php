<style type="text/css">
#d_background1 {
	background:#ff6699 url(/BGAwCbV-.jpg) repeat 0 0;
	padding:20px;
	color:#fff;
	font-weight:bold;
	text-align:center;
}
</style>

<div id="d_background1">
	background:#ff6699 url(/content/img/pattern.jpg) repeat 0 0;
</div>
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
