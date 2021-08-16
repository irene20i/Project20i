<?php
	 require 'database.php';
    
        
	 if(isset($_POST["UIDresult"])) 
	 {

		
	 $UIDresult=$_POST["UIDresult"];
	 $pdo = Database::connect();
	 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 $sql = "(select book_id from borrowed where book_id='$UIDresult' limit 1) union (select id from students where id='$UIDresult' limit 1);";
	 $res = $pdo->query($sql);
	 $data=$res->fetchAll();
	 $count=$res->rowCount();
	
	
	//$Write="<?php $" . "UIDresult='" .$UIDresult . "'; " . "echo $" . "UIDresult;" . " ? >";
	file_put_contents('UIDContainer.php',$UIDresult);
    //var_dump($count);
    

	if($count==1)
	{

	}else
	{
        http_response_code(404);
	
	}

}
 
if(isset($_POST['getId']))
{
	
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
	
	
}
	
?>
	
