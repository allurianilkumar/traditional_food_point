<?php
define('DBCONNECTION', 'mysql:host=localhost;dbname=traditional_food_point');
define('DBUSER', 'root');
define('DBPASS', 'password');
?>

<?php
  //// Data Base part
  function setConnectionInfo() {
    try {
      $pdo = new PDO(DBCONNECTION, DBUSER, DBPASS);
    }catch(PDOException $e) {
      echo $e->getMessage();
    }
    return $pdo; 
  }

  function runQuery($pdo, $sql, $parameters)     {
    try {
      if($parameters == ''){
        $statement = $pdo->query("$sql");
      }else{
        //$sqlTemp = $sql . " WHERE `` like '$parameters%' order by  ``";
        //$statement = $pdo->query("$sqlTemp");
      }

    }catch(PDOException $exception) {
      echo $exception->getMessage();
    }
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    return $statement;
  }

  function readAllTablets(){
    $pdo = setConnectionInfo();
    $sql = 'SELECT `Id`, `FirstName`, `LastName`, `Gender`, `Phone`, `ItemName`, `OrderLocation`, `OrderDate`, `OrderTime`, `Cost`, `Quantity`, `Message`, `CreatedDate` FROM `CustomerOrder`';
    $statement = runQuery($pdo, $sql, '');
    return $statement;
  }

  function readSelectTablets($lastName) {
    $pdo = setConnectionInfo();
    $sql = 'SELECT `Id`, `FirstName`, `LastName`, `Gender`, `Phone`, `ItemName`, `OrderLocation`, `OrderDate`, `OrderTime`, `Cost`, `Quantity`, `Message`, `CreatedDate` FROM `CustomerOrder`';
    $statement = runQuery($pdo, $sql, $lastName);
    return $statement;
  }
  // if we have search string search for customer matches
  if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['search']) ) {
     $tablets = readSelectTablets($_GET['search']);
  }
  else {
     // otherwise get all customers
    $tablets = readAllTablets();  
  }
?>
<html>
    <head>
        <title>T Food Point</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../lib/css/bootstrap-3.3.6.min.css">
        <link rel="stylesheet" href="../lib/css/bootstrap-theme-3.3.6.min.css">
        <link rel="stylesheet" href="../css/home.css">
        <link rel="stylesheet" href="../css/admin.css">
        <link rel="stylesheet" href="../css/footer.css">

        <link href="../fonts/glyphicons-halflings-regular.svg" rel="stylesheet">
        <link href="../fonts/glyphicons-halflings-regular.ttf" rel="stylesheet">
        <link href="../fonts/glyphicons-halflings-regular.woff" rel="stylesheet">
        <link href="../fonts/glyphicons-halflings-regular.woff2" rel="stylesheet">
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
            <li></li>
             </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="../services.php">Services</a></li>
          <li><a href="../about_us.php">About Us</a></li>
          <li><a href="../contact.php">Contact Us</a></li>
          <li><a href="./logout.php">Logout</a></li>
        </ul>
      </div>
</div>
</nav>
</section>
<section class="admin_info">
  <div class="container">
   <div class="row">
      <div class="col-md-2">
      </div>
      <div class="">
         <div class="panel panel-info spaceabove">           
           <div class="panel-heading text-center"><h3><i>Customer Order List</i></h3></div>
           <table class="table">
             <tr>
               <th>Id</th>
               <th>First Name</th>
               <th> Last Name</th>
               <th>Gender</th>
               <th>Phone</th>
               <th>Item Name</th>
               <th>Order Location</th>
               <th>Order Date</th>
               <th>Order Time</th>
               <th>Cost</th>
               <th>Quantity</th>
               
               <th>Message</th>
               <th>Created Date</th>
             </tr>
                <?php
                while($row = $tablets->fetch()) {
                  echo "<tr>";
                    echo "<td>".$row['Id']."</td>";
                    echo "<td>".$row['FirstName']."</td>";
                    echo "<td>".$row['LastName']."</td>";
                    echo "<td>".$row['Gender']."</td>";
                    echo "<td>".$row['Phone']."</td>";
                    echo "<td>".$row['ItemName']."</td>";
                    echo "<td>".$row['OrderLocation']."</td>";
                    echo "<td>".$row['OrderDate']."</td>";
                    echo "<td>".$row['OrderTime']."</td>";
                    echo "<td>".$row['Cost']."</td>";
                    echo "<td>".$row['Quantity']."</td>";
                    
                    echo "<td>".$row['Message']."</td>";
                    echo "<td>".$row['CreatedDate']."</td>";
                  echo "</tr>";
                }
              ?>
           </table>
         </div>           
      </div>
      </div>  <!-- end main content column -->
   </div>  <!-- end main content row -->
  </section><br><br><br>
<section>
<?php include '../_footer/_footer.php';?>    
</section>
	<!-- javascript -->
    <script src="../lib/js/jquery-1.11.3.min.js"></script>
    <script src="../lib/js/bootstrap-3.3.6.min.js"></script>
</body>
</html>
