<html>
    <?php
    ini_set("display_errors", 1);
    include "../include/head.php";
    include "../include/mysqli_connect.php";
    ?>

    <body>
        <div class="wrapper">
            <?php include "../include/sidebar.php"; ?>
            <div id="content">
                <?php include "../include/nav.php"?>

                <h3>Orders on site</h3>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>Amount</th>
                            <th>Request ID</th>
                            <th>Payment Method</th>
                            <th>State</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(isset($_GET['page'])){
                                $page = $_GET['page'];
                            }else{
                                $page = 1;
                            }
                            $rows = 20;
                            $start = 20 * ($page -1 );
                            $sql = "SELECT * FROM orders LIMIT $start, $rows";
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['user_id']; ?></td>
                                            <td><?php
                                                    $u_id = $row['user_id'];
                                                    $user_q = "select `name` from `users` where `id`=$u_id";
                                                    $u_res = mysqli_query($conn, $user_q);
                                                    $user_name = mysqli_fetch_assoc($u_res);
                                                    echo $user_name['name'];
                                                    ?></td>
                                            <td><?php echo $row['amount']; ?></td>
                                            <td><?php echo $row['request_id']; ?></td>
                                            <td><?php echo $row['payment_method']; ?></td>
                                            <td><?php echo $row['state']; ?></td>
                                            <td style="color: #7386d5;"><a href="/order/order.php?id=<?php echo $row['id']; ?>">View Order</a></td>
                                        </tr>
                                    <?php
                                }
                            }else{
                                header('Location: /order/orders.php?page=1');
                            }
                        ?>
                    </tbody>
                </table>
                <br>
                <p>Pages: </p>
                <p>
                    <?php
                        $row_q = "select count(*) as `rows` from `orders`";
                        $row_c = mysqli_fetch_assoc(mysqli_query($conn, $row_q));
                        $row_c = $row_c['rows'];
                        $page = 1;
                        do{
                            ?>
                            <a style="padding:10px 20px; background: #6d7fcc; color: #fff; margin: 0px 10px;" href="/order/orders.php?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                            <?php
                            $row_c = $row_c - 20;
                            $page++;
                        }while($row_c > 0)
                    ?>
                </p>
            </div>
        </div>

        <?php include "../include/script.php"; ?>

    </body>
</html>
