<?php
/**
 * Created by PhpStorm.
 * User: shubh
 * Date: 26-06-2018
 * Time: 19:36
 */

session_start();

if(isset($_SESSION['a_id'])){
    unset($_SESSION['a_id']);
}

header("Location: /index.html");