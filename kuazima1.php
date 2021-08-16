<?php
    require 'database.php';
 
    if ( !empty($_POST)) {
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if(isset($_POST['data']['newId']))
	{
		
				$id = $_POST['data']['newId'];
				// echo $id;
				// $id = preg_replace("/\s+/", "", $id);
				// echo $id;
                $id=trim($id);			
				$sql = "select id,name from students where id='$id' limit 1 ";
				$query = $pdo->query($sql);
				$count = $query->rowCount();
				$student='';
				$studentOut='';
				//echo $count;

				if($count)
				{
					$studentOut= $query->fetch(PDO::FETCH_ASSOC);
					Database::disconnect();
					$student=array("type"=>"student","id"=>$studentOut['id'],"name"=>$studentOut['name']);
					//var_dump($student);
					$student=json_encode($student);
					echo $student;

					
				}
				else
				{

					$sql = "select id,name,author from books where id='$id' limit 1 ";
					$query = $pdo->query($sql);
					$count = $query->rowCount();
					$book='';
					$bookOut='';
					if($count)
						{
							$bookOut= $query->fetch(PDO::FETCH_ASSOC);
							Database::disconnect();
							$book=array("type"=>"book","id"=>$bookOut['id'],"name"=>$bookOut['name'],"author"=>$bookOut["author"]);
							//var_dump($student);
							$book=json_encode($book);
							echo $book;

					
						}else
						{
							echo "NOT FOUND";
						}

				}
				

	}


  
	if(isset($_POST['borrow']))
	{
		 $borrows=$_POST['borrow'];
            
		var_dump($borrows);
	
		  foreach ($borrows as $key=>$borrow) {
        $sql = "insert into borrowed(book_name,student_id,book_id)  value('".$borrow['bookName']."','".$borrow['studentId']."','".$borrow['bookId']."'); ";
     // echo $sql;
	  $query = $pdo->query($sql);
	//   $query->execute();
	 //var_dump($borrow['studentId']);
	// var_dump($borrow['studentId']);
		 }
 

					// $query = $pdo->query($sql);
	}
    
	
	}
?>