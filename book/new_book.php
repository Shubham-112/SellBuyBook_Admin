<?php
/**
 * Created by PhpStorm.
 * User: shubh
 * Date: 26-06-2018
 * Time: 18:20
 */

?>


<html>

<?php
include "../include/head.php";
include "../include/mysqli_connect.php";
?>

<body>
<div class="wrapper">
    <?php include "../include/sidebar.php"; ?>
    <div id="content">
        <?php include "../include/nav.php"?>

        <h3>Add New Book</h3>

        <form action="/book/proc_book.php" method="post">
            <input type="hidden" name="action" value="new">
            <div class="form-group">
                <label for="title"><b>Title</b></label>
                <input type="text" id="title" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="class"><b>Class</b></label>
                <input type="text" id="class" name="class" class="form-control">
            </div>
            <div class="form-group">
                <label for="price"><b>Price (&#8377;)</b></label>
                <input type="text" id="price" name="price" class="form-control">
            </div>
            <div class="form-group">
                <label for="isbn"><b>ISBN</b></label>
                <input type="text" id="isbn" name="isbn" class="form-control">
            </div>
            <button class="btn btn-primary btn-block" type="submit">Add New Book</button>
        </form>
        <br>
    </div>
</div>

<?php include "../include/script.php"; ?>

</body>
</html>