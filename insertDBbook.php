<?php
    require 'database.php';
 
    if ( !empty($_POST)) {
        // keep track post values
		$id = $_POST['id'];
        $name = $_POST['name'];
        $author = $_POST['author'];
        $isbn = $_POST['isbn'];
        
		// insert data
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO books (id,name,author,isbn) values(?, ?, ?, ?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($id,$name,$author,$isbn));
		Database::disconnect();
		header("Location: home.php");
    }
?>