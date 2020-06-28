<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap - Prebuilt Layout</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

  </head>
  <body>
	<?php include("db-conn.php"); ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
       <a class="navbar-brand" href="#">WCW Legacy</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
             <li class="nav-item active">
                <a class="nav-link" href="index.html">Home</a>
             </li>
             <li class="nav-item">
                <a class="nav-link" href="wrestlers.php">Wrestlers</a>
             </li>
			 <li class="nav-item">
                <a class="nav-link" href="events.php">Events</a>
             </li>
			 <li class="nav-item">
                <a class="nav-link" href="titles.php">Titles</a>
             </li>
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Database
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item" href="#">Tag Teams</a>
                   <a class="dropdown-item" href="#">Stables</a>
                   <a class="dropdown-item" href="#">Storylines</a>
				   <a class="dropdown-item" href="#">Tournaments</a>
				   <a class="dropdown-item" href="#">EOY Awards</a>
				   <a class="dropdown-item" href="#">WCW Hall of Fame</a>
				   <a class="dropdown-item" href="#">Hall of Immortals</a>
                </div>
             </li>
             <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Info
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item" href="#">About</a>
                   <a class="dropdown-item" href="#">Terms of Service</a>
                   <a class="dropdown-item" href="#">Disclaimers</a>
				   <a class="dropdown-item" href="#">Privacy Policy</a>
				   <a class="dropdown-item" href="#">Facebook</a>
				   <a class="dropdown-item" href="#">Twitter</a>
				   <a class="dropdown-item" href="#">WCW Legacy on GDS</a>
                </div>
             </li>
          </ul>
</div>
    </nav>
    <div class="container">
       <div class="row text-center">
          <div class="col-lg-6 offset-lg-3"><br>Welcome to WCW Legacy, an online database for the Total Extreme Wrestling 2020 dynasty of the same name. This site is quite incomplete, so if you come across an issue, <a href="https://github.com/thejonedney/WCW-Legacy/issues" target="_blank">please submit a bug</a>.</div>
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
							echo "<table id=\"events\" class=\"table table-striped table-bordered table-hover table-sm text-left\">";
							   echo "<thead class=\"thead-dark\">";
								echo "<tr>";
								  echo "<th scope=\"col\" class=\"small\">Date</th>";
								  echo "<th scope=\"col\" class=\"small\">Event</th>";
								  echo "<th scope=\"col\" class=\"small\">Location</th>";
								  echo "<th scope=\"col\" class=\"small\">Rating</th>";
								echo "</tr>";
							  echo "</thead>";
							while($row = mysqli_fetch_array($result)){
							  echo "<tr>";
							    echo "<td class=\"small\">Week " . $row['Held_Week'] . "</td>";
							    echo "<td class=\"small\">" . $row['ShowName'] . "</td>";
							    echo "<td class=\"small\">" . $row['Region'] . "</td>";
							    echo "<td class=\"small\">" . $row['Overall_Rating'] . "</td>";
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
                   <h3>Recent <strong>Matches</strong></h3>
                   <table id="matches" class="table table-striped table-bordered table-hover table-sm">
					  <thead class="thead-dark">
						<tr>
						  <th scope="col" class="small">Date</th>
						  <th scope="col" class="small">Match</th>
						  <th scope="col" class="small">Event</th>
						  <th scope="col" class="small">Rating</th>
						</tr>
					  </thead>
					  <tbody>
						<tr>
						  <td class="small">Sat Wk 1 Jan 1991</td>
						  <td class="small">Sting vs. Ric Flair</td>
						  <td class="small">WCW World Championship Wrestling</td>
						  <td>92&nbsp;</td>
						</tr>
						<tr>
						  <td class="small">Sat Wk 2 Jan 1991</td>
						  <td class="small">Jacob</td>
						  <td class="small">Thornton</td>
						  <td>@fat</td>
						</tr>
						<tr>
						  <td class="small">Sat Wk 3 Jan 1991</td>
						  <td class="small">Larry</td>
						  <td class="small">the Bird</td>
						  <td>@twitter</td>
						</tr>
					  </tbody>
					</table>
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
