<?php
/**
 * Created by PhpStorm.
 * User: shubh
 * Date: 26-06-2018
 * Time: 17:34
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

        <h3>Book ID <?php $b_id = $_GET['id']; echo $b_id; ?></h3>
        <?php

            $sql = "SELECT * FROM books where `id`=$b_id;";
            $result = mysqli_query($conn, $sql);
            $book = mysqli_fetch_assoc($result);

        ?>

        <p>Details</p>

        <form action="/book/proc_book.php" method="post">
            <input type="hidden" name="id" value="<?php echo $book['id']; ?>">
            <input type="hidden" name="action" value="update">
            <div class="form-group">
                <label for="title"><b>Title</b></label>
                <input type="text" id="title" name="title" class="form-control" value="<?php echo $book['title']; ?>">
            </div>
            <div class="form-group">
                <label for="class"><b>Class</b></label>
                <input type="text" id="class" name="class" class="form-control" value="<?php echo $book['class']; ?>">
            </div>
            <div class="form-group">
                <label for="price"><b>Price (&#8377;)</b></label>
                <input type="text" id="price" name="price" class="form-control" value="<?php echo $book['price']; ?>">
            </div>
            <div class="form-group">
                <label for="isbn"><b>ISBN</b></label>
                <input type="text" id="isbn" name="isbn" class="form-control" value="<?php echo $book['isbn']; ?>">
            </div>
            <button class="btn btn-primary btn-block" type="submit">Save Changes</button>
        </form>
        <br>
    </div>
</div>

<?php include "../include/script.php"; ?>

</body>
</html>


