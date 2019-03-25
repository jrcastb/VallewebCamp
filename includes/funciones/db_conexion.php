<?php 
$conn = new mysqli('localhost','root','', 'vallewebcamp');
//$conn->set_charset("utf-8");

if ($conn->connect_error) {
    echo $error -> $conn->connect_error;
}

?>