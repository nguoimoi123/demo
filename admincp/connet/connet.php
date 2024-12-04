<?php
$mysqli = new mysqli("localhost","root","","buonbanthietbithongminh");

if($mysqli->connect_errno){
    echo "Connect that bai" . $mysqli->connect_error;
    exit();
}