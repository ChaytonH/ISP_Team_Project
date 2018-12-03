<!DOCTYPE html>

<link rel = "stylesheet"  type = "text/css"
         	 href = "styles.css" />
<html lang = "en">
  <head>
    <title> Video Storage </title>
    <meta charset = "utf-8" />
  </head>
  <body style =" background-color:lightgrey;">
	<div style = " z-index : 1; text-align:center; background-color:white; position: -webkit-sticky; position: sticky; top: 0; ">

		<img width = "100" src = "Page Essentials\logo.jpg"></img>
        <form method="get" action="resultex.php">
            <input size = "50" name = "searchbar" />
    		<input type="submit" > <!-- Make this point to a function that takes the input and finds it from our database -->
        </form>
		<a href = "instructions.html">Online Help</a>
		<a href = "technical doc.html">Technical Docs</a>
	</div>

	
	<div><!--just for example. Get rid of this once the function for search results is done -->


	<h2 style = "text-align:center">Upload Yourself!</h2>
	<div style = "text-align:center"><button onclick="window.location.href='submission.php'" >Let's Go!</button></div>

	<h2 style = "text-align:center">Browse Uploads</h2>

	<table border="1" style="width:100%"> <!--Main page contents could be here, gathered from the database of course -->
    <tr>
        <th>Video Preview</th>
        <th>Name</th>
        <th>Description</th>
    </tr>
		<?php

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

		$qu = "SELECT * FROM Videos";
		$result = mysqli_query($db, $qu);

		echo "<table border='1' style='width:100%'>";

		while($row = mysqli_fetch_array($result))
		{
			echo "<tr><td><video width ='320' height ='200' controls='controls'><source src='upload/".$row['Name']."'> Your browser does not support the video element</audio></td><td>".$row['Name']."</td><td>".$row['Descript']."</td></tr>";
		}
		echo "</table>";
		?>
  </body>
</html>
