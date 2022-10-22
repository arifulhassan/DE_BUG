<?php require_once('includes/db.php');

if(isset($mysqli,$_POST['submit'])){
    $username = mysqli_real_escape_string($mysqli,$_POST['username']);
    $password = mysqli_real_escape_string($mysqli,$_POST['password']);
    $password=md5($password);
    $query1=mysqli_query($mysqli,"SELECT username,password,type,permission,name,surname FROM users");
	while($row=mysqli_fetch_array($query1))
	{
        $db_name=$row["name"];
		$db_surname=$row["surname"];
		$db_username=$row["username"];
		$db_password=$row["password"];
		$db_type=$row["type"];
        $db_per=$row["permission"];
		
		if($username==$db_username && $password==$db_password){
			session_start();
			$_SESSION["username"]=$db_username;
			$_SESSION["type"]=$db_type;
            $_SESSION["permission"]=$db_per;
            $_SESSION["name"]=$db_name;
            $_SESSION["surname"]=$db_surname;
			
			if($_SESSION["type"]=='user'){
               
				header("Location:admin/dashboard.php");
			}
		}
		
	
    }
}
?>


<!--Writing HTML Code here from bootstrap templates-->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="icon" type="image/png" href="images/favicon.png"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Login | Bug</title>
  </head>
  <body>
    <!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php" style="font-size:30px;"><strong>Bug'Tracking System</strong></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"></a>
          <a class="dropdown-item" href="#"></a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"></a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#"></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a href="register.php"class="btn btn-success my-2 my-sm-0" type="submit">Create Account</a>
    </form>
  </div>
</nav> -->

<br><br><br><br><br><br><br><br>

    <div class="container my-4">

    <div class="card mx-auto" style="width: 30rem;"><br>
  <img class="card-img-top mx-auto" src="images/de.png" style="width: 60%; " alt="Card image cap">
  <div class="card-body">

        <form action="index.php" method="post">
        <div class="form-group <?php echo (!empty($username)) ? 'has-error' : ''; ?>">

                <label>Username</label>
                <input type="text" name="username" class="form-control">
                <span class="help-block"></span>

            </div>

            <div class="form-group <?php echo (!empty($password)) ? 'has-error' : ''; ?>">

                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"></span>

            </div>

 <button type="submit" name="submit" class="btn btn-warning"><i class="fa fa-lock">&nbsp;</i> Login</button> &nbsp; &nbsp;
  <a href="reg.php"><button type="button" class="btn btn-success"><i class="fa fa-plus">&nbsp;</i> Create an account</button></a>


        </form>
  </div>
  <div class="card-footer"><a href="reg.php">Forget Password </a></div>
</div>
    </div>

    <!--footer section-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
