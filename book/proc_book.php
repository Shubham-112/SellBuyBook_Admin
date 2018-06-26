<?php
/**
 * Created by PhpStorm.
 * User: shubh
 * Date: 26-06-2018
 * Time: 17:43
 */

if(isset($_POST['title']) && $_POST['class'] && $_POST['isbn'] && $_POST['price'] && $_POST['action']){
    if(($_POST['price'] != "") && ($_POST['title'] != "") && ($_POST['isbn'] != "") && ($_POST['class'] != "") && ($_POST['action'])){
        include "../include/mysqli_connect.php";



        $id = $_POST['id'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $isbn = $_POST['isbn'];
        $class = $_POST['class'];

        if($_POST['action'] == "update"){
            if(isset($_POST['id'])) {
                if ($_POST['id'] != "") {
                    if (mysqli_query($conn, "UPDATE `books` SET `title`='$title', `isbn`='$isbn', `class`=$class, `price`='$price' WHERE `id`=$id")) {
                        header("Location: /book/book.php?id=$id");
                        exit();
                    } else {
                        ?>
                        <script>window.history.go(-1);</script>
                        <?php
                    }
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
        }elseif ($_POST['action'] == "new"){
            $sql = "INSERT INTO `books`(`title`, `class`, `price`, `isbn`) VALUES ('$title', $class, '$price', '$isbn') ";
            if(mysqli_query($conn, $sql)){
                header("Location: /book/view_books.php");
                exit();
            }else{
                ?>
                <script>window.history.go(-1);</script>
                <?php
            }
        }

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