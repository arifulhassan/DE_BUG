
<?php 
      // require_once('includes/session.php');
      require_once('includes/conn.php');
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>De-Bug | Sign Up</title>

         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/awesome/font-awesome.css">
        <link rel="stylesheet" href="assets/css/animate.css">
    </head>
    <body>



       

            <!-- Page Content Holder -->
            <!-- <div id="content">
             
                <div clas="col-md-12 sammacmedia">
                    <img src="assets/image/ssm.jpg" class="img-thumbnail">
                    </div>
         
                
                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header" id="sams">
                            <button type="button" id="sidebarCollapse" id="makota" class="btn btn-sam animated tada navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Menu</span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right  makotasamuel">
                                <li><a href="#"><?php require_once('includes/name.php');?></a></li>
                                <li ><a href="logout.php"><i class="fa fa-power-off"> Logout</i></a></li>
           
                            </ul>
                        </div>
                    </div>
                </nav> -->
<br><br><br><br><br>
                <div class="text-center">
                <h2>Sign Up</h2>
                </div>

                <div class="line"></div>
                                            <?php
                            if(isset($mysqli,$_POST['submit'])){
                            $name = mysqli_real_escape_string($mysqli,$_POST['name']);
                            $surname = mysqli_real_escape_string($mysqli,$_POST['surname']);
                            $email = mysqli_real_escape_string($mysqli,$_POST['email']);
                            $phon = mysqli_real_escape_string($mysqli,$_POST['phone']); 
                            $username = mysqli_real_escape_string($mysqli,$_POST['username']); 
                            $password = mysqli_real_escape_string($mysqli,$_POST['password']);
                            $cpassword = mysqli_real_escape_string($mysqli,$_POST['cpassword']);     
                            $permission = mysqli_real_escape_string($mysqli,$_POST['permission']); 
                            $gender = mysqli_real_escape_string($mysqli,$_POST['gender']);     
                            $joined = date(" d M Y ");
                        
                            $phone = '.'.$phon;    
                           if($password != $cpassword){
                               echo 'error';
                           }
                            
                              else{ 
                            $password=md5($cpassword);
                            $sql_n = "SELECT * FROM users WHERE phone ='$phone'";
                            $res_n = mysqli_query($mysqli, $sql_n);    
                            $sql_e = "SELECT * FROM users WHERE email ='$email'";
                            $res_e = mysqli_query($mysqli, $sql_e);
                            if(mysqli_num_rows($res_e) > 0){
                            ?>
                             <div class="alert alert-danger samuel animated shake" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Danger! </strong><?php echo'sorry the email is already allocated to someone';?></div>
                        <?php    
                       }elseif(mysqli_num_rows($res_n) > 0){
                        ?>
                        <div class="alert alert-danger samuel animated shake" id="sams1">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Danger! </strong><?php echo'sorry the phone is already allocated to someone';?></div>
                        <?php    
                        }
                    else{      
                  
                $sql = "INSERT INTO users(name,surname,username,email,joined,type,permission,gender,phone,password)VALUES('$name','$surname','$username','$email','$joined','user','$permission','$gender','$phone','$password')";
                $results = mysqli_query($mysqli,$sql);
                        
                        
                        
                        if($results==1){
                              ?>
                        <div class="alert alert-success strover animated bounce" id="sams1">
                        <a href="" class="close" data-dismiss="alert">&times;</a>
                        <strong> Successfully! </strong><?php echo'Thank you for creating account';?></div>
                        <?php

                          }else{
                                ?>
                         <div id="sams1" class="sufee-alert alert with-close alert-danger alert-dismissible fade show col-lg-12">
											<span class="badge badge-pill badge-danger">Error</span>
											OOPS something went wrong
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
                        <?php    
                          }      
                      }
                 }
            }
                
                ?>
		<div class="panel panel-default sammacmedia">
            <!-- <div class="panel-heading">CAAZ SMS Add Users</div> -->
        <div class="panel-body">
            <form method="post" action="reg.php">
        <div class="row form-group">
          <div class="col-lg-6">
            <label>Name</label>
              <input type="text" class="form-control" name="name" pattern="[A-Za-z]{3,}" required>
            </div>  
             <div class="col-lg-6">
            <label>Surname</label>
              <input type="text" class="form-control" name="surname" pattern="[A-Za-z]{3,}" required>
            </div>  
        </div>
            <div class="row form-group">
          <div class="col-lg-6">
            <label>Email</label>
              <input type="email" class="form-control" name="email" required>
            </div>  
             <div class="col-lg-6">
            <label>Phone</label>
              <input type="text" class="form-control" name="phone"  placeholder="01*********">
            </div>  
        </div>   
         <div class="row form-group">
          <div class="col-lg-6">
            <label>Access Level</label>
              <select class="form-control" name="permission">
              <option>Management</option>
              <option>Developer</option> 
             <option>Tester</option> 
              </select>
            </div>  
             <div class="col-lg-6">
            <label>Gender</label>
             <select class="form-control" name="gender">
              <option>Female</option>
              <option>Male</option>      
              </select>
            </div>  
        </div>
         <div class="row form-group">
          <div class="col-lg-6">
            <label>Username</label>
              <input type="text" class="form-control" name="username" pattern="[A-Za-z]{3,}">
            </div>  
             <div class="col-lg-3">
            <label>Password</label>
              <input type="password" class="form-control" name="password">
            </div> 
              <div class="col-lg-3">
            <label>Confirm Password</label>
              <input type="password" class="form-control" name="cpassword">
            </div> 
        </div>
                <div class="row">
                <div class="col-md-6">
                  <button type="submit" name="submit" class="btn btn-suc btn-block"><span class="fa fa-plus"></span> Submit</button>  
                </div>
                     <div class="col-md-6">
                  <button type="reset" class="btn btn-dan btn-block"><span class="fa fa-refresh"></span> Reset</button>  
                </div>
                </div> <br><br>
                <div class="text-center">

                <h4>Already have an account? <a style="color:green; text-style:bold"  href="index.php">Login here</a>.</h4>

                </div>

            </form>

            </div>
                </div>
                <div class="line"></div>
                <footer>
            <p class="text-center">
            <!-- De-Bug Tracking System &copy;<?php echo date("Y ");?>Copyright. All Rights Reserved, Powered By Ariful Hassan    -->
            </p>
            </footer>
            </div>
            
        </div>





        <!-- jQuery CDN -->
         <script src="assets/js/jquery-1.10.2.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="assets/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
             $('sams').on('click', function(){
                 $('makota').addClass('animated tada');
             });
         </script>
         <script type="text/javascript">

        $(document).ready(function () {
 
            window.setTimeout(function() {
        $("#sams1").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
        });
            }, 5000);
 
        });
    </script>
    </body>
</html>