<html>
    <?php include "include/head.php"; ?>

    <body>
        <div class="wrapper">
            <?php include "include/sidebar.php"; ?>
            <div id="content">
                <?php include "include/nav.php"?>
                <h2>Site Status</h2>
                <?php
                $host = 'schools.sellbuybook.in';
                if($socket =@ fsockopen($host, 80, $errno, $errstr, 30)) {
                    ?>
                    <div class="alert alert-success" role="alert"><h3>Hooray !</h3> Schools sellbuybook is running !!</div>
                    <?php
                    fclose($socket);
                } else {
                    ?>
                    <div class="alert alert-warning" role="alert"><h3>Blah !</h3> Schools sellbuybook is down !!</div>
                    <?php
                }
                ?>
            </div>
        </div>

        <?php include "include/script.php"; ?>

    </body>
</html>
