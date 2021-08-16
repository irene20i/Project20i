<?php
	
?>

<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/global.css" type="text/css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
			
                    

				 
				setInterval(function() {
					$.get( "UIDContainer.php", function( data ) {
  							

						  if(typeof data !='undefined')
							  if(data==='noid')
							  {
								
							  }else{
								$( "#getUID" ).val( data );
							  }
  						
						});
				
				}, 500);
			});
			
		</script>
		
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
			margin-bottom:0px;
			margin-top: 20px;
			padding: 0;
			overflow: hidden;
			background-color: #4CAF50;
			width: 70%;
		}
		
		.row1{width: 100%;}

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
		
		.table {
			margin: auto;
			width: 100%; 
		}
		
		thead {
			color: #FFFFFF;
		}
		</style>
		
	</head>
	
	<body class="bg">

		<ul class="topnav">
			<li><a href="home.php">Home</a></li>
			<li><a href="user data.php">Students</a></li>
			<li><a class="active" href="registration.php">New Student Account</a></li>
            <li><a href="registerbook.php">Register New Book</a></li>
            <li><a href="kuazima.php">Borrow The Book</a></li>
            <li><a href="kurudisha.php">Return The Book</a></li>
			<li><a href="borrowed.php">Borrowed</a></li>
		</ul>

		<div class="container-fluid">
			<div class="center" style="margin: 0 auto; width:70%;">
				<div class="row">
					<h3 align="center">Register New Student</h3>
				</div>
				<br>
				<div class="row">
					<table class="table form-container1">
						<tbody>	
							<form class="form-horizontal" action="insertDB.php" method="post" >
								<tr>
									<td>ID</td>
									<td><textarea rows="1" name="id" cols="20" id="getUID" placeholder="Please Tag your Card / Key Chain to display ID" rows="1" cols="1" required></textarea></td>
								</tr>
								
								<tr>
									<td>Name</td>
									<td><input id="div_refresh" name="name" type="text"  placeholder="Type the Name of The Student" required></td>
								</tr>
								
								<tr>
									<td>Gender</td>
									<td>
										<select name="gender">
											<option value="Male">Male</option>
											<option value="Female">Female</option>
										</select>
									</td>
								</tr>
								
								<tr>
									<td>Email Address</td>
									<td><input name="email" type="text" placeholder="Type the Email of The Student" required></td>
								</tr>
								
								<tr>
									<td>Mobile Number</td>
									<td><input name="mobile" type="text"  placeholder="Type the Phone Number of The Student" required></td>
								</tr>
								<tr>
									<td></td>
									<td><button type="submit" class="btn btn-success">Save</button></td>
								</tr>
							</form>
						</tbody>
					</table>
				</div>
			</div>               
		</div> <!-- /container -->	
	</body>
</html>