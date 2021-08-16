<?php
    require 'database.php';
 
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $name = $_POST['name'];
		$id = $_POST['id'];
		$author = $_POST['author'];
        $isbn = $_POST['isbn'];
         
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE books  set name = ?, author =?, isbn =? WHERE id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($name,$author,$isbn,$id));
		Database::disconnect();
		header("Location: home.php");
    }
?>