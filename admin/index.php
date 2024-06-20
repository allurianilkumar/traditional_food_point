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
 <?php
if(isset($_POST['login_submit'])) {
    session_start();
    $uname=$_POST['username'];
    $pwd=MD5($_POST['password']);
    $con=mysql_connect("localhost","root","password");
    mysql_select_db("traditional_food_point");
    $res=mysql_query("SELECT  `username`, `pwd` FROM `login` WHERE username like '$uname' AND pwd like '$pwd'");
    while($row=mysql_fetch_array($res))
    {
    if($row[0]==$uname && $row[1]==$pwd)
    {
        $_SESSION["username"] = $row[0];
        $_SESSION["pwd"] = $row[1];
        header('Location:../admin/admin.php');
    }
    else
        $flag ="false";
    }
    if($flag ="false")  {
        echo "<h1 class='text-center'>Invalid Login !!! Please enter valid details</h1>";
    }
    mysql_close($con);
}
?>
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
              </li>
             </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="./services.php">Services</a></li>
          <li><a href="./about_us.php">About Us</a></li>
          <li><a href="./contact.php">Contact Us</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>
</section>
<section class="login-section">
<div class="row">
  <div class="col-md-6">
  <div class="login-form">
    <h2>Login</h2>
    <form class="form-horizontal" id="login_form" action="./index.php" method="post">
    <div class="form-group">
      <label for="username" class="col-sm-2 control-label">User Name</label>
      <div class="col-sm-10">
        <input type="text" name="username" class="form-control"/>
      </div>
    </div>
    <div class="form-group">
      <label for="password" class="col-sm-2 control-label">Password</label>
      <div class="col-sm-10">
        <input type="password" name="password" class="form-control"/>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" name="login_submit" class="btn btn-success" value="Login">
        <input type="reset" class="btn btn-default" onclick="goBack()" value="Back"/>
      </div>
    </div>
    </form>
  </div>
  <div>
</div>
</div>
</section>
<section>
<?php include '../_footer/_footer.php';?>    
</section>

     <?php
        $servername = "localhost";
        $username = "root";
        $password = "password";
        $dbname = "traditional_food_point";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        if($conn) {
            if(isset($_POST['submit_useralert']))
            {
    
                $User_name = $_POST["User_name"];
                $Email = $_POST["Email"];
                $Mobile = $_POST["Mobile"];
                $Location = $_POST["Location"];

                $result = "INSERT INTO `useralert`(`User_name`, `Email`, `Mobile`, `Location`) VALUES ('$User_name', '$Email', '$Mobile', '$Location')";
                if ($conn->query($result) === TRUE) {
                    /*echo "<h1><center>Submited Successfully</center></h1>";*/
                } else {
                    echo "<h1><center>Error: " . $result . "<br>" . $conn->error . "<center></h1>";
                }
                $conn->close();
            }
        }else{
            die('Something went wrong while connecting to MySQL');
        }
    ?>  
	<!-- javascript -->
    <script src="../lib/js/jquery-1.11.3.min.js"></script>
    <script src="../lib/js/bootstrap-3.3.6.min.js"></script>
</body>
</html>
