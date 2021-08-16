<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/global.css" type="text/css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
		<style>
		html {
			font-family: Arial;
			display: inline-block;
			margin: 0px auto;
			text-align: center;
		}

		ul.topnav {
			list-style-type: none;
			margin-right: auto;
			margin-left: auto;
			margin-top: 20px;
			margin-bottom:0px;
			padding: 0;
			overflow: hidden;
			background-color: #4CAF50;
			width: 70%;
		}

		ul.topnav li {float: left;}

		ul.topnav li a {
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		ul.topnav li a:hover:not(.active) {background-color: #3e8e41;}

		ul.topnav li a.active {background-color: #333;}

		ul.topnav li.right {float: right;}

		@media screen and (max-width: 600px) {
			ul.topnav li.right, 
			ul.topnav li {float: none;}
		}
		
		img {
			display: block;
			margin-left: auto;
			margin-right: auto;
		}
		</style>
		
		
	</head>
	
	<body class="bg">
	<ul class="topnav">
			<li><a class="active" href="home.php">Home</a></li>
			<li><a href="user data.php">Students</a></li>
			<li><a href="registration.php">New Student Account</a></li>
            <li><a href="registerbook.php">Register New Book</a></li>
            <li><a href="kuazima.php">Borrow The Book</a></li>
            <li><a href="kurudisha.php">Return The Book</a></li>
			<li><a href="borrowed.php">Borrowed</a></li>
		</ul>
		<div class="container-fluid" style="margin: 0 auto; width:70%;">
            <div class="row">
                <h3>All Books</h3>
            </div>
            <div class="row">
                <table class="table form-container2">
                  <thead>
                    <tr bgcolor="#10a0c5" color="#FFFFFF">
                      <th>Name</th>
                      <th>ID</th>
					  <th>Author</th>
					  <th>ISBN</th>
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                   include 'database.php';
                   $pdo = Database::connect();
                   $sql = 'SELECT * FROM books ORDER BY name ASC';
                   foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>'. $row['name'] . '</td>';
                            echo '<td>'. $row['id'] . '</td>';
                            echo '<td>'. $row['author'] . '</td>';
							echo '<td>'. $row['isbn'] . '</td>';
							echo '<td><a class="btn btn-success" href="book data edit page.php?id='.$row['id'].'">Edit</a>';
							echo ' ';
							echo '<a class="btn btn-danger" href="book data delete page.php?id='.$row['id'].'">Delete</a>';
							echo '</td>';
                            echo '</tr>';
                   }
                   Database::disconnect();
                  ?>
                  </tbody>
				</table>
			</div>
		</div> <!-- /container -->
		
	</body>
</html>