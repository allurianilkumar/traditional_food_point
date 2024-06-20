<?php
        $servername = "localhost";
        $username = "root";
        $password = "password";
        $dbname = "traditional_food_point";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        if($conn) {
            if(isset($_POST['submit_order']))
            {
    
                $FirstName = $_POST["first_name"];
                $LastName =  $_POST["last_name"];
                $Gender = $_POST["gender"];
                $Phone = $_POST["phone"];
                $Quantity = $_POST["quantity"];
                $OrderLocation = $_POST["order_location"];
                $OrderDate = $_POST["order_date"];
                $OrderTime = $_POST["order_time"];
                $Cost = $_POST["order_item_cost"];
                $Message = $_POST["message"];
                $ItemName = $_POST["order_item_name"];
                $Total = 0;

                $result = "INSERT INTO `CustomerOrder`(`FirstName`, `LastName`, `Gender`, `Phone`, `ItemName`, `OrderDate`, `OrderTime`, `Cost`, `Quantity`, `Message`, `CreatedDate`) VALUES 
                ('$FirstName','$LastName', '$Gender', '$Phone', '$ItemName', '$OrderDate', '$OrderTime', '$Cost', '$Quantity', '$Message', sysdate())";
                if ($conn->query($result) === TRUE) {
                    /*echo "<h1><center>Submited Successfully</center></h1>";*/
                } else {
                 echo "<h1><center>Error: " . $result . "<br>" . $conn->error . "<center></h1>";
                }
                $conn->close();
            }
        }
    ?>

<html>
    <head>
        <title>Traditional Food Point</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../lib/css/bootstrap-3.3.6.min.css">
        <link rel="stylesheet" href="../lib/css/bootstrap-theme-3.3.6.min.css">
        <link rel="stylesheet" href="../css/home.css">
        <link rel="stylesheet" href="../css/footer.css">
        <link href="./fonts/glyphicons-halflings-regular.svg" rel="stylesheet">
        <link href="./fonts/glyphicons-halflings-regular.ttf" rel="stylesheet">
        <link href="./fonts/glyphicons-halflings-regular.woff" rel="stylesheet">
        <link href="./fonts/glyphicons-halflings-regular.woff2" rel="stylesheet">
    </head>
 <body>
<section>
    <nav class="navbar navbar-success navbar-fixed-top" role="navigation" id="nav_col" style="background-color:lavender;">
    <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/traditional_food_point/">Traditional Food Point</a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="dropdown dropdown-large">
                <li></li>
              </li>
             </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../services.php">Services</a></li>
          <li><a href="../about_us.php">About Us</a></li>
          <li><a href="../contact.php">Contact Us</a></li>
        </ul>
      </div>
</div>
</nav>   
</section>
<div id="home_li">
    <ul class="list-unstyled">
        <li><b><a href="/traditional_food_point/">Home</a>&nbsp;<span>&gt;&gt;</span>&nbsp;<?php echo $_POST['grid_name'];?></b></li>
    </ul>
</div>
    <div class="col-sm-8" id="grid">
       <div class="panel panel-default">
            <div class="panel-heading">
                <center><h4><span class="glyphicon">Non Vegetarian</span></h4></center>
            </div>
            <div class="panel-body">
                <ul class="text-center">
                            <?php
                            $mysqli = new mysqli('localhost','root','password','traditional_food_point');
                             $sql = "select * from non_vegetarian";
                             $res = $mysqli->query($sql);
                            $cnt = $res->num_rows;
                            if ($cnt>0) {
                                        
                            ?>
                            <table border="2px">
                                   <?php while ($fetch = $res->fetch_assoc()) { ?>
                                    <tr>
                                        <a name="link" href="../non_vegetarian/products.php?name=<?php echo $fetch['Names']?>"><?php echo $fetch['Names']?><br></a></td>
                                    </tr><?php } ?>
                            </table>
                            <?php 
                            }   else
                                {
                                    echo "<br><br>No records Found";
                                }
                            ?>
                </ul>
            </div>
        </div>
    </div>
<section>
    <?php include '../_footer/_footer.php';?>        
</section>
<script src="../lib/js/jquery-1.11.3.min.js"></script>
    <script src="../lib/js/formValidation.js"></script>
    <script src="../lib/js/bootstrap-3.3.6.min.js"></script>
    <script type="text/javascript" src="../lib/js/form_validation_bootstrap.js"></script>
</body>
</html>
