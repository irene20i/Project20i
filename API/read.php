<?php
require_once __DIR__ . '/config.php';

class API{
    function Select(){
        $db = new Connect;
        $borrowed = array();
        $data = $db->prepare('SELECT * FROM borrowed');
        $data->execute();
        while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
            $borrowed[$OutputData['book_id']] = array(
                'book_id'    => $OutputData['book_id'],
                'student_id' => $OutputData['student_id']
            );
        }
        return json_encode($borrowed);
    }
}

$API = new API;
header('Content-Type: application/json');
echo $API->Select();
?>