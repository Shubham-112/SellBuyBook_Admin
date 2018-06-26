<?php
/**
 * Created by PhpStorm.
 * User: shubh
 * Date: 19-06-2018
 * Time: 01:46
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

        <button class="btn btn-info" onclick="window.location.href='/book/new_book.php'">Add New Book</button>


        <h3>Search Book</h3>
        <form action="search_book.php" method="get">
            <div class="form-group">
                <label for="title"><b>Title</b></label>
                <input type="text" id="title" name="title" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        
        
        <h3>Books on site</h3>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Book ID</th>
                <th>Title</th>
                <th>Class</th>
                <th>Price (&#8377;)</th>
                <th>ISBN</th>
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
            $sql = "SELECT * FROM books LIMIT $start, $rows";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['class']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['isbn']; ?></td>
                        <td style="color: #7386d5;"><a href="/book/book.php?id=<?php echo $row['id']; ?>">View Book</a></td>
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
            $row_q = "select count(*) as `rows` from `books`";
            $row_c = mysqli_fetch_assoc(mysqli_query($conn, $row_q));
            $row_c = $row_c['rows'];
            $page = 1;
            do{
                ?>
                <a style="padding:10px 20px; background: #6d7fcc; color: #fff; margin: 0px 10px;" href="/book/view_books.php?page=<?php echo $page; ?>"><?php echo $page; ?></a>
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


