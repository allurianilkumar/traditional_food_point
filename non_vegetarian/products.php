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
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../services.php">Food</a></li>
          <li><a href="../services.php">Services</a></li>
          <li><a href="../about_us.php">About Us</a></li>
          <li><a href="../contact.php">Contact Us</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>   
</section>
<?php
// Retriving the single cutomer based on customer id
  if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ( isset($_GET['name']) ) {  
      $name = $_GET['name'];
    }
  }
?>
<div id="home_li">
    <ul class="list-unstyled">
        <li><b><a href="/traditional_food_point/">Home</a>&nbsp;<span>&gt;&gt;</span>&nbsp;<a href="/traditional_food_point/non_vegetarian/index.php">Non Vegetatrian</a>&nbsp;<span>&gt;&gt;</span>&nbsp; <?php echo $name;?></b></li>
    </ul>
</div>
    <div class="container">
        <?php
      // Create connectio
      $conn = new mysqli("localhost", "root", "password", "traditional_food_point");
      // Check connection
      if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
      }
      $sql = "SELECT `Id`, `ItemName`, `ItemCategories`, `Cost`, `Quantity`, `TotalPrice` FROM `orders` WHERE `ItemName` like '$name'";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo '
            <div class="panel panel-info" id="product_pag">
              <div class="panel-body" id="panelbody">
                <center><h4>'.$row['ItemName'].'( Each One '.$row['Cost'].'Rs/-)</h4></center>
                  <div class="col-sm-4">
                  <h5><b>About</b></h5>
                  <p>Good Product<br>
                  </p>
                </div>
                <div class="col-sm-4">
                  <h5><b>Our Service Deatails</b></h5>
                  <label for="text">Name : </label>Sreekanth <br/>
                  <label for="text">Mobile : +91 1234567898</label><br/>
                </div>
                <div class="col-md-4">
                  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Order '.$row['ItemName'].'</button>
                 
                  <!-- Modal -->
                                    <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog">
                                          <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                  <h4 class="modal-title">Order '.$row['ItemName'].'( Each One '.$row['Cost'].'Rs/-)</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="bs-example">
                                                        <form class="form-horizontal" action="/traditional_food_point/non_vegetarian/index.php" method="post">
                                                            <div class="form-group">
                                                                <label class="control-label col-xs-3" for="firstName">First Name:</label>
                                                                <div class="col-xs-8">
                                                                    <input type="text" class="form-control" name="first_name" placeholder="First Name">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-xs-3" for="lastName">Last Name:</label>
                                                                <div class="col-xs-8">
                                                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-xs-3">Gender:</label>
                                                                <div class="col-xs-2">
                                                                    <label class="radio-inline">
                                                                        <input type="radio" name="gender" value="Male"> Male
                                                                    </label>
                                                                </div>
                                                                <div class="col-xs-2">
                                                                    <label class="radio-inline">
                                                                        <input type="radio" name="gender" value="Female"> Female
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-xs-3" for="phoneNumber">Phone:</label>
                                                                <div class="col-xs-8">
                                                                    <input type="tel" class="form-control" name="phone" placeholder="Phone Number">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-xs-3" for="quantity">Quantity:</label>
                                                                <div class="col-xs-8">
                                                                    <input type="text" class="form-control" name="quantity" placeholder="Quantity">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-xs-3" for="Order Location">Order Location:</label>
                                                                <div class="col-xs-8">
                                                                    <input type="text" class="form-control"  name="order_location" placeholder="Order Location">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-xs-3" for="Order Date">Order Date:</label>
                                                                <div class="col-xs-8">
                                                                    <input type="text" class="form-control"  name="order_date" placeholder="Order Date">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-xs-3" for="Order Time">Order Time:</label>
                                                                <div class="col-xs-8">
                                                                    <input type="text" class="form-control"  name="order_time" placeholder="Order Time">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label col-xs-3" for="Message">Message:</label>
                                                                <div class="col-xs-8">
                                                                    <textarea rows="3" class="form-control" name="message" placeholder="Message"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <center>
                                                                    <input type="hidden" name="order_item_name" class="btn btn-default" value='.$name.'>
                                                                    <input type="hidden" name="order_item_cost" class="btn btn-default" value='.$row['Cost'].'>
                                                                    <input type="submit" name="submit_order" class="btn btn-success" value="Submit Order">
                                                                    <input type="reset" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                                </center>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End-Modal -->
                                   
                </div>
              </div>
            </div>
          ';
        }
      } else {
        echo "NO Records Found !!!";
      }
      $conn->close();
    ?>
  </div>
<section>
    <?php include '../_footer/_footer.php';?>        
</section>
<script src="../lib/js/jquery-1.11.3.min.js"></script>
    <script src="../lib/js/formValidation.js"></script>
    <script src="../lib/js/bootstrap-3.3.6.min.js"></script>
    <script type="text/javascript" src="../lib/js/form_validation_bootstrap.js">
    </script>
</body>
</html>
