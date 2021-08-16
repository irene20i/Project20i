<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/global.css" type="text/css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>
		<script src="jquery.min.js"></script>
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

		.rudi {
			margin-left: 25px;
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
		
		td.lf {
			padding-left: 15px;
			padding-top: 12px;
			padding-bottom: 12px;
		}
		</style>
		
	</head>
	
	<body class="bg">
	<ul class="topnav">
			<li><a href="home.php">Home</a></li>
			<li><a href="user data.php">Students</a></li>
			<li><a href="registration.php">New Student Account</a></li>
            <li><a href="registerbook.php">Register New Book</a></li>
            <li><a href="kuazima.php">Borrow The Book</a></li>
            <li><a class="active" href="kurudisha.php">Return The Book</a></li>
			<li><a href="borrowed.php">Borrowed</a></li>
	</ul>
	<div class="container-fluid" style="margin: 0 auto; width:40%;">
        <form class="form-container form-horizontal" action="kurudisha1.php" method="post" >
			<div class="control-group">
				<label class="control-label">ID</label>
				<div class="controls">
					<textarea name="id" id="getUID" placeholder="Please Tag your Card / Key Chain to display ID" rows="1" cols="1" required></textarea>
				</div>
			</div>
				<button type="submit" class="btn btn-success rudi">Return</button>
        </form>
    </div>
	</body>
</html>