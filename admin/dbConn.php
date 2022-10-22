<?php

$db = mysqli_connect("localhost","root","","de_bug");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>