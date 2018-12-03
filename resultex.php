<!DOCTYPE html>
<link rel = "stylesheet"  type = "text/css"
         	 href = "styles.css" />
<html lang = "en">
  <head>
    <title> Search Results </title>
    <meta charset = "utf-8" />
  </head>
  <body style =" background-color:lightgrey;">
  	<div style = " z-index : 1; text-align:center; background-color:white; position: -webkit-sticky; position: sticky; top: 0; ">
		<img width = "100" src = "Page Essentials\logo.jpg"></img>
		<input size = "50" name = "searchbar" />
		<button onclick="">Search</button>
		<a href = "instructions.html">Online Help</a><!-- Make this point to a function that takes the input and finds it from our database -->
	</div>
	<p> Make this a table like the homepage, but showing the results</p>

	  		<div style = "text-align:center"><button onclick="window.location.href='video storage.php'" >Return to Homepage</button></div>
            <br />
            <table border="1" style="width:100%"> <!--Main page contents could be here, gathered from the database of course -->
            <tr>
                <th>Video Preview</th>
                <th>Name</th>
                <th>Description</th>
            </tr>
            <?php
                $UserInput = "%" . $_GET["searchbar"] . "%";
                $db = mysqli_connect("db1.cs.uakron.edu:3306", "dlc190", "passwordlol");
                $qu = "SELECT * FROM Videos WHERE Name LIKE " . $UserInput;
                // print $qu;
                $result = mysqli_query($db, $qu);

                echo "<table border='1' style='width:100%'>";

                $row = mysqli_fetch_array($result);
                if ($row) {
                    while($row)
                    {
                        echo "<tr><td><video width ='320' height ='200' controls='controls'><source src='upload/".$row['Name']."'> Your browser does not support the video element</audio></td><td>".$row['Name']."</td><td>".$row['Descript']."</td></tr>";
                    }
                    echo "</table>";
                }
                else {
                    print "No videos found";
                }



            ?>

  </body>
</html>
