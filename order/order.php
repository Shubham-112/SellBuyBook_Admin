<?php
/**
 * Created by PhpStorm.
 * User: shubh
 * Date: 19-06-2018
 * Time: 00:58
 */
?>

<html>
<?php
include "../authencity.php";
include "../include/head.php";
include "../include/mysqli_connect.php";
?>

<body>
<div class="wrapper">
    <?php include "../include/sidebar.php"; ?>
    <div id="content">
        <?php include "../include/nav.php"?>

        <h3>Order ID <?php $ord_id = $_GET['id']; echo $ord_id; ?></h3>
        <?php

            $sql = "SELECT * FROM orders where `id`=$ord_id;";
            $result = mysqli_query($conn, $sql);
            $order = mysqli_fetch_assoc($result);

        ?>

        <p>Details</p>

        <p><b>User: </b> <?php
            $u_id = $order['user_id'];
            $user_q = "select `name` from `users` where `id`=$u_id";
            $u_res = mysqli_query($conn, $user_q);
            $user_name = mysqli_fetch_assoc($u_res);
            echo $user_name['name'];
            ?></p>
        <p><b>Address: </b> <?php
            $a_id = $order['address_id'];
            $add_q = "select * from `addresses` where `id`=$a_id";
            $a_res = mysqli_query($conn, $add_q);
            $add = mysqli_fetch_assoc($a_res);
            echo $add['first_name'].' '.$add['last_name'].', '.$add['street'].', <b>City:</b> '.$add['city'].' <b>State:</b> '.$add['state'].' - '.$add['zip'].' <b>Phone:</b> '.$add['phone'].' <b>Email ID:</b> '.$add['email'];
            ?></p>
        <p><b>Amount: &#8377;</b> <?php echo $order['amount']; ?></p>
        <p><b>Request ID: </b> <?php if($order['request_id'] != ''){echo $order['request_id'];}else{echo '<b>Payment NOT COMPLETED !</b>'; }; ?></p>
        <p><b>Payment Method: </b> <?php echo $order['payment_method']; ?></p>
        <p>
            <b>State: </b>
            <?php
            $status = $order['state'];
            if($status == -1){
                echo "Payment Failed";
            }elseif ($status == 0){
                echo "Not Paid";
            }elseif ($status == 1){
                echo "Processing";
            }elseif ($status == 2){
                echo "On Hold";
            }elseif ($status == 3){
                echo "Dispatched";
            }elseif ($status == 4){
                echo "Delivered";
            }elseif ($status == 5){
                echo "Completed";
            }
            ?>
            <form action="/order/change_status.php" method="post">
                <input type="hidden" value="<?php echo $ord_id; ?>" name="o_id">
                <select name="status" id="status">
                    <option value="processing">Processing</option>
                    <option value="hold">On Hold</option>
                    <option value="dispatched">Dispatched</option>
                    <option value="delivered">Delivered</option>
                    <option value="completed">Completed</option>
                </select>
                <button type="submit">Save</button>
            </form>
        </p>
        <br>
    </div>
</div>

<?php include "../include/script.php"; ?>

</body>
</html>


