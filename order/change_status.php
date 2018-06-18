<?php
/**
 * Created by PhpStorm.
 * User: shubh
 * Date: 19-06-2018
 * Time: 01:19
 */

include "../include/mysqli_connect.php";

echo $_POST['o_id'];
echo $_POST['status'];

$o_id = $_POST['o_id'];
$status = $_POST['status'];
$s_id = 0;
if($status == "processing"){
    $s_id = 1;
}elseif ($status == "hold"){
    $s_id = 2;
}elseif ($status == "dispatched"){
    $s_id = 3;
}elseif ($status == "delivered"){
    $s_id = 4;
}elseif ($status == "completed"){
    $s_id = 5;
}else{
    ?>
    <script>
        window.history.go(-1);
    </script>
    <?php
}

$q = "UPDATE `orders` SET `state`=$s_id where `id`=$o_id";
if(mysqli_query($conn, $q)){
    header("Location: /order/order.php?id=".$o_id);
}else{
    echo 'An error occured. '.mysqli_error($conn);
    echo '<br>Please try again later.';
}
