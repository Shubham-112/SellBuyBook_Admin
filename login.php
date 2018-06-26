<?php
/**
 * Created by PhpStorm.
 * User: shubh
 * Date: 26-06-2018
 * Time: 19:24
 */

if(isset($_POST['email']) && isset($_POST['pass'])){
    $username = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['pass']));

    include "include/mysqli_connect.php";
    $result = mysqli_query($conn, "SELECT * FROM `admin` WHERE `user`='$username' AND `password`='$password'");
    if(mysqli_num_rows($result) > 0){
        session_start();
        $user = mysqli_fetch_assoc($result);
        $_SESSION['a_id'] = $user['id'];
        header("Location: main.php");
    }else{
        ?>
        <script>window.history.go(-1);</script>
        <?php
    }
}else{
    ?>
    <script>window.history.go(-1);</script>
    <?php
}