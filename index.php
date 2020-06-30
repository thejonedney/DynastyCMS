<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap - Prebuilt Layout</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
	  <link href="css/ratings.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

  </head>
  <body>
	<?php include("db-conn.php");
	$conn = mysqli_connect($host, $user, $pass, $db);
	if($conn == false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	$sql = "SELECT * FROM cms_nav";
		if($result = mysqli_query($conn, $sql)) {
			if(mysqli_num_rows($result) > 0) {
				echo "<nav class=\"navbar navbar-expand-lg navbar-light bg-light\">";
				   echo "<a class=\"navbar-brand\" href=\"#\">DynastyCMS</a>";
				   echo "<button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarSupportedContent\" aria-controls=\"navbarSupportedContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">";
				   echo "<span class=\"navbar-toggler-icon\"></span>";
				   echo "</button>";
				   echo "<div class=\"collapse navbar-collapse\" id=\"navbarSupportedContent\">";
					  echo "<ul class=\"navbar-nav mr-auto\">";
						 echo "<li class=\"nav-item active\">";
							while($row = mysqli_fetch_array($result)){
							echo "<span class=\"nav-item\">" . $row['text'] . "&nbsp;&nbsp;&nbsp;</span>";
						 echo "</li>";
						 	}
					  echo "</ul>";
					  mysqli_free_result($result);
					  } else {
					  	echo "<td class=\"small\">No records found.</td>";
					  }
					  } else {
					  	echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
					  }
					  mysqli_close($conn);				
			echo "</div>";
    echo "</nav>"; ?>
    <div class="container">
       <div class="row text-center">
          <div class="col-lg-6 offset-lg-3"><br>
           Welcome to <span class="text-40">DynastyCMS</span>, an online database for the Total Extreme Wrestling 2020 dynasty game world. This site is quite incomplete, so if you come across an issue,<a href="https://github.com/thejonedney/DynastyCMS/issues" target="_blank">please submit a bug</a>.</div>
       </div>
       <br>
       <hr>
       <br>
       <div class="row">
          <div class="col-md-12 text-center">
             <div class="card">
                <div class="card-body">
                   <h3>Recent <strong>Events</strong></h3>
				   <?php
					$conn = mysqli_connect($host, $user, $pass, $db);
					if($conn == false){
						die("ERROR: Could not connect. " . mysqli_connect_error());
					}
					$sql = "SELECT * FROM previous_shows";
					if($result = mysqli_query($conn, $sql)) {
						if(mysqli_num_rows($result) > 0) {
							echo "<table id=\"events\" class=\"table table-dark table-bordered table-sm text-left\">";
							   echo "<thead class=\"thead-dark\">";
								echo "<tr>";
								  echo "<th scope=\"col\" class=\"small\">Date</th>";
								  echo "<th scope=\"col\" class=\"small\">Promotion</th>";
								  echo "<th scope=\"col\" class=\"small\">Event</th>";
								  echo "<th scope=\"col\" class=\"small\">Location</th>";
								  echo "<th scope=\"col\" class=\"small\">Rating</th>";
								echo "</tr>";
							  echo "</thead>";
							while($row = mysqli_fetch_array($result)){
							  $rating = substr($row['Overall_Rating'], 0, 2);
							  echo "<tr>";
							    echo "<td class=\"small\">" . $row['Held_Day'] . ", Week " . $row['Held_Week'] . ", " . $row['Held_Month'] . ", " . $row['Held_Year'] . "</td>";
								echo "<td class=\"small\"><a href='companies.php?id=$row[CompanyName]'>".$row['CompanyName']."</a></td>";
							    echo "<td class=\"small\"><a href='events.php?id=$row[UID]'>".$row['ShowName']."</a></td>";
							    echo "<td class=\"small\"><a href='events.php?region=$row[Region]'>".$row['Region']."</a></td>";
							    echo "<td class=\"small text-$rating\"><strong>$rating</strong></td>";
							  echo "</tr>";
							}
							echo "</table>";
							mysqli_free_result($result);
						} else {
							echo "<td class=\"small\">No records found.</td>";
						}
					} else {
						echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
					}
					mysqli_close($conn);
				   ?>

                </div>
             </div>
          </div>
		  <div>&nbsp;</div>
          <div class="text-center col-md-12">
             <div class="card">
                <div class="card-body">
                   <h3>Recent <strong>Events</strong></h3>
				   <?php
					$conn = mysqli_connect($host, $user, $pass, $db);
					if($conn == false){
						die("ERROR: Could not connect. " . mysqli_connect_error());
					}
					$sql = "SELECT previous_shows.Held_Year, previous_shows.ShowName, match_histories.Match_Description, match_histories.Rating FROM previous_shows INNER JOIN match_histories ON previous_shows.UID = match_histories.PreviousShowUID";
					if($result = mysqli_query($conn, $sql)) {
						if(mysqli_num_rows($result) > 0) {
							echo "<table id=\"events\" class=\"table table-dark table-bordered table-sm text-left\">";
							   echo "<thead class=\"thead-dark\">";
								echo "<tr>";
								  echo "<th scope=\"col\" class=\"small\">Date</th>";
								  echo "<th scope=\"col\" class=\"small\">Match</th>";
								  echo "<th scope=\"col\" class=\"small\">Event</th>";
								  echo "<th scope=\"col\" class=\"small\">Rating</th>";
								echo "</tr>";
							  echo "</thead>";
							while($row = mysqli_fetch_array($result)){
							  $rating = substr($row['Rating'], 0, 2);
							  echo "<tr>";
							    echo "<td class=\"small\">Week " . $row['Held_Year'] . "</td>";
							    echo "<td class=\"small\">" . $row['Match_Description'] . "</td>";
							    echo "<td class=\"small\">" . $row['ShowName'] . "</td>";
							    echo "<td class=\"small text-$rating\"><strong>$rating</strong></td>";
							  echo "</tr>";
							}
							echo "</table>";
							mysqli_free_result($result);
						} else {
							echo "<td class=\"small\">No records found.</td>";
						}
					} else {
						echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
					}
					mysqli_close($conn);
				   ?>

                </div>
             </div>
          </div>
       </div>
       <br>
       <hr>
       <div class="row">
          <div class="small text-muted text-center col-lg-6 offset-lg-3">
<p>2020 WCW Legacy<br>This site has no affiliation with any wrestling promotion or other entity.<br>Terms &middot; Disclaimer &middot; Privacy &middot; Contact</p>
          </div>
       </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="js/jquery-3.4.1.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
	<script>
	  $(document).ready(function() {
		$('table.table').DataTable();
	  } );
	  </script>

    <!-- Include all compiled plugins (below), or include individual files as needed --> 
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap-4.4.1.js"></script>
  </body>
</html>
