<!DOCTYPE html>
 <html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <title><?php echo isset($data['title']) ? $data['title'] : ''?> - Payroll System</title>

        <?php include 'partials/head.php' ?>
    </head>
    <body>
    <div class="wrapper ">
        <?php include 'partials/sidebar.php' ?>
        <div class="main-panel">
            <?php include 'partials/navbar.php'?>
            <div class="content">
                <?php include 'partials/report.php'?>

                <?php include $data['view'].'.php'?>
            </div>
            <?php include 'partials/footer.php'?>
        </div>
    </div>
        <?php include 'partials/scripts.php' ?>
    </body>
</html>
