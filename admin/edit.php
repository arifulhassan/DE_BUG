<?php

include "dbConn.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($db,"select * from files where id='$id'"); // select query

$data = mysqli_fetch_array($qry); // fetch data

if(isset($_POST['update'])) // when click on Update button
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $version = $_POST['version'];

	
    $edit = mysqli_query($db,"update files set id='$id', name='$name', title='$title', description='$description', status='$status', version='$version' where id='$id'");
	
    if($edit)
    {
        mysqli_close($db); // Close connection
        header("location:bug.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Edit!</title>
  </head>
  <body>

<br><br><br>  
  
    <div class="container">
        <div class="row">
            <div class="col-md-3">
              <a class= "btn btn-info" href="bug.php">< Back</a>

            </div>
            <div class="col-md-9">
            <h2>Update Data</h2>
              <hr>  


<form method="POST">


<div class="form-group">
    <label for="ID">ID : </label>
<input type="text" class="form-control" name="id" value="<?php echo $data['id'] ?>" placeholder="Enter Full Name">
</div>

<div class="form-group">
    <label for="name">Name : </label>
  <input type="text" class="form-control" name="name" value="<?php echo $data['name'] ?>" placeholder="Enter File name">
</div>

<div class="form-group">
    <label for="ID">Title : </label>
  <input type="text" class="form-control" name="title" value="<?php echo $data['title'] ?>" placeholder="Enter  title">
</div>

<div class="form-group">
    <label for="description">Description : </label>

  <input type="texarea" class="form-control" name="description" value="  <?php echo $data['description'] ?>" placeholder="Enter description">

  <!-- <textarea id="w3review" class="form-control" name="description" rows="4" cols="50" value="<?php echo $data['description'] ?>" >
</textarea> -->

</div>


<div class="form-group">
			<label for="type">Status</label>
			<select name="status" id="status" class="custom-select"><?php echo $data['status'] ?>

				<option value="close" >Close</option>
                <option value="process"><span class="grey_color">In Processing</span> </option>

			</select>
		</div>

<div class="form-group">
    <label for="version">Version : </label>
  <input type="text" class="form-control" name="version" value="<?php echo $data['version'] ?>" placeholder="Enter Project version">
</div>
  <input type="submit"  class="btn btn-primary" name="update" value="Update">

  <!-- <button type="submit"  name="update" value="Update" class="btn btn-primary">Submit</button> -->

</form>