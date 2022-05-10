<?php
$DIR = $_SERVER['DOCUMENT_ROOT']."/doc/";
$file = $DIR.htmlspecialchars($_GET['q']);
 
if(file_exists($file)) {
    header('Content-Type: audio/mpeg');
    header('Content-Disposition: filename="'.htmlspecialchars($_GET['q']).'"');
    header('Content-length: '.filesize($file));
    header('Cache-Control: no-cache');
    header("Content-Transfer-Encoding: chunked"); 
 
    readfile($file);
} else {
    header("HTTP/1.0 404 Not Found");
}
?>