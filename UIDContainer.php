<?php
 require 'database.php';

    $pdo = Database::connect();
	 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 $sql = "(select id from updater limit 1);";
	 $res = $pdo->query($sql);
	 $data=$res->fetch(PDO::FETCH_OBJ);
	 
      
       if(isset($data->id))
       {
        $id=$data->id;
        echo $id;
        $sql = " UPDATE updater SET id ='noid'";
        $res = $pdo->query($sql);
       }else{
       
        echo false;
       }
   



?>