<?php
/**
 * Created by PhpStorm.
 * User: shubh
 * Date: 18-06-2018
 * Time: 19:46
 */

$dbhost = 'ftp.sgp-21.host-webserver.com';
$dbuser = 'sellbb_school';
$dbpass = 'r6KnZEQrWA';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'sellbb_school');

if(! $conn ){
    die('Could not connect: ' . mysqli_error($conn));
}