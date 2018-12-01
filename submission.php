<?php

if(isset($_POST['Upload']))
{	
	$db = mysqli_connect("db1.cs.uakron.edu:3306", "dlc190", "passwordlol");

	if (!$db) 
	{
     		print "Error - Could not connect to MySQL";
     		exit;
	}

	$er = mysqli_select_db($db,"ISP_dlc190");
	if (!$er) 
	{
    		print "Error - Could not select the database";
    		exit;
	}

	$video = $_FILES['video']['name'];
	$descript = $_POST['description'];
	$target = "upload/";
	$target = $target . basename($_FILES['video']['name']);
	
	move_uploaded_file($_FILES['video']['tmp_name'], $target); 

	$qu = "INSERT INTO Videos values('$video', '$descript')";

	if (mysqli_query($db, $qu))
	{
		echo "Submitted";
	}
	else
	{
		echo "Not submitted";
	}
}
?>

<!DOCTYPE html>

<link rel = "stylesheet"  type = "text/css"
         	 href = "styles.css" />

<html lang = "en">
  <head>
    <title> Upload Page </title>
    <meta charset = "utf-8" />
  </head>
  <body style =" background-color:lightgrey;">
  	<div style = " z-index : 1; text-align:center; background-color:white; position: -webkit-sticky; position: sticky; top: 0; ">
		<img width = "100" src = "Page Essentials\logo.jpg"></img>
		<input size = "50" id = "search bar" />
		<button onclick="">Search</button> <!-- Make this point to a function that takes the input and finds it from our database -->
	</div>
	
	<h2 style = "text-align:center"> Upload A Video </h2>
		
	<h3> File </h3>
	
	<form action="submission.php" method="post" enctype="multipart/form-data">
			
		<input type="file" name="video" /><br/>
		
		<h3> Description </h3>
		
		<input name="description" /><br/><br/>
	
	<input type="submit" name="Upload" id="Upload" value="Upload" />
	
	</form>
	
		<div style = "text-align:center"><button onclick="window.location.href='video storage.php'" >Return to Homepage</button></div>	
  </body>
</html>