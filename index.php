<html>
    <head>
        <title>Traditional Food Point</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./lib/css/bootstrap-3.3.6.min.css">
        <link rel="stylesheet" href="./lib/css/bootstrap-theme-3.3.6.min.css">
        <link rel="stylesheet" href="./css/home.css">
        <link rel="stylesheet" href="./css/footer.css">

        <link href="./fonts/glyphicons-halflings-regular.svg" rel="stylesheet">
        <link href="./fonts/glyphicons-halflings-regular.ttf" rel="stylesheet">
        <link href="./fonts/glyphicons-halflings-regular.woff" rel="stylesheet">
        <link href="./fonts/glyphicons-halflings-regular.woff2" rel="stylesheet">
    </head>
 <body>
<section>
    <?php require './_navbar/_nav_bar.php';?>
</section>

<section>
    <div id="home_li">
          <ul class="list-unstyled" id="home_li_li">
            <li><b><a href="./index.php">Home</a>&nbsp;<span>&gt;&gt;</span></b></li>
          <div class="clearfix"></div>
    </div>
        
    <div id="grid">
        <div id="home_gride"><br>
            <div class="home-gride-container"><br>
                <div class="home-gride-data">
                    <?php
                        $mysqli = new mysqli('localhost','root','password','traditional_food_point');
                        $sql = "SELECT `product_id`, `name`, `glyphicons_class`, `path` FROM `product_title`";
                        $res = $mysqli->query($sql);
                        $cnt = $res->num_rows;
                        if ($cnt>0) {           
                        ?>      
                        <?php while ($fetch = $res->fetch_assoc()) { ?>
                            <li class="col-md-6">
                                <ul>
                                    <li>
                <form action="<?php echo $fetch['path']?>" method="POST">
                  <input class="center" name="grid_name" type="hidden" value="<?php echo $fetch['name']?>" />
                  <input width="175" height="100" name="submit_grid" type="image" src="<?php echo $fetch['glyphicons_class']?>" />
                </form><?php echo $fetch['name']?>
                                    </li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php 
                        }else{
                            echo "<br><br>No records Found";
                        }
                    ?>
                </div><br>
            </div><br>
        </div>
    </div>
</section>
<section>
<?php include './_footer/_footer.php';?>    
</section>
	<!-- javascript -->
    <script src="./lib/js/jquery-1.11.3.min.js"></script>
    <script src="./lib/js/formValidation.js"></script>
    <script src="./lib/js/bootstrap-3.3.6.min.js"></script>
    <script type="text/javascript" src="./lib/js/form_validation_bootstrap.js"></script>
</body>
</html>
