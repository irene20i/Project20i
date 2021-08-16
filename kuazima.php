

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
				
				       let user={
								   id:"",
								   name:"",
								   books:[

								   ]
							   };
				setInterval(function() {
					$.post("getUID.php",{getId:'data'} ,function(newId, status){
						console.log(newId)
						newId=	unescape(newId)
						
					

                           if( newId  )
						   {
							  
							   
							   ////alert(newId)

							   if(user.id==newId)
							   {

							   }else{
                                        let check=true;
								  user.books.forEach(book => {
									   if(book.id==newId)
									   {
										   check=false
									   }
								   });
								
								   if(check){


									    //  console.log(newId)
											$.post("kuazima1.php",{data:{newId:newId}} ,function(responce, status){
												
												try {
													responce = JSON.parse(responce)
													} catch (e) {
														// Oh well, but whatever...
													}
												
												if(responce.type=="student")
												{
													user.id=responce.id
													user.name=responce.name
													$('#studentId').val(user.name)
													
											    }
												else if(responce.type=="book")
												{

													// console.log(user.books,responce)
													let checkIfBookExist=false

													for(let i=0;i<user.books.length ;i++)
													{
														//  console.log(user.book[i])
														if(user.books[i].id===responce.id)
														{
															checkIfBookExist=true
														}
													}
													if(checkIfBookExist===false)
													{
													let book={
														id:responce.id,
														name:responce.name,
														author:responce.author													

														
													}
													user.books.push(book)

													$('#bookList').append(`
													    <tr class='clear' id="${book.id}">
														<td>${book.id}</td>
														<td>${book.name}</td>
														<td>${book.author}</td>
														<td style="margin:auto" ><button class="delete btn btn-danger p-3 " id="${book.id}" >Delete</button></td>
							
														</tr>
													`)
													$(".delete").on("click",function(event){
														let id=event.target.id
														$(`#${id}`).remove()

														user.books=user.books.filter(book=>!(book.id==id))
														console.log(user)
													})}
												}
										}); 
								   }  
							   }
						   }
                   });
				   
				   console.log(user)

				},2000);

				$('#save_borrow').on('click',function(){

                   

					if(user.id !='' && user.books.length>0 )
					
					{ let borrow=user.books.map(book=>{
						 console.log('books',book)
						return  {
							 bookName:book.name,
							 bookId:book.id,
							 studentId:user.id
						 }
					 })

					

					 $.post("kuazima1.php",{borrow}, function(data, status){

					    console.log(data)
						user={
								   id:"",
								   name:"",
								   books:[

								   ]
							   }
							   $('#studentId').val('')
							   $('.clear').remove()
					 });}

					
				})
				
			});

			
		</script>
		
		<style>
		html {
			font-family: Arial;
			display: inline-block;
			margin: 0px auto;
		}
		
		textarea {
			resize: none;
		}
		.right1{
			margin-right: 50px;
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
		</style>
		
	</head>
	
	<body class="bg">

    <ul class="topnav">
			<li><a href="home.php">Home</a></li>
			<li><a href="user data.php">Students</a></li>
			<li><a href="registration.php">New Student Account</a></li>
            <li><a href="registerbook.php">Register New Book</a></li>
            <li><a class="active" href="kuazima.php">Borrow The Book</a></li>
            <li><a href="kurudisha.php">Return The Book</a></li>
			<li><a href="borrowed.php">Borrowed</a></li>
		</ul>

		<div class="container-fluid">
			<div class="center" style="margin: 0 auto; width:70%;">
				<div class="row">
					<h3 align="center">Borrowing the Book</h3>
				</div>
				<br>
				<div class="row form-container1">
                <table class="table">
				<thead>
                    <tr>
                      <th>
						<div class="control-group">
							<div class="controls">
								<textarea name="id"  id="studentId" placeholder="Student Id" rows="1" cols="1" required></textarea>
							</div>
						</div>
					  </th>
                    </tr>
                  </thead>
				</table>
				<div class="row">
                <table class="table form-container2">
                  <thead>
                    <tr bgcolor="#10a0c5" color="#FFFFFF">
				      <th>Book ID</th>
					  <th>Book Name</th>
					  <th>Author</th>
					  <th>ACTION </th>
                    </tr>
                  </thead>
                  <tbody id="bookList" color="#000000">
                    
                  </tbody>
				  
				</table>
				<div class = "form-group pull-right">	
					<button id = "save_borrow" class = "btn btn-primary right1"><span class = "glyphicon glyphicon-thumbs-up"></span> Borrow</button>
				</div>
			</div>
		</div> <!-- /container -->
				
			</div>               
		</div> <!-- /container -->	
	</body>
</html>