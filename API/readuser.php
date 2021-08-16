<?php
require_once __DIR__ . '/config.php';

class API{
    function Select(){
        $db = new Connect;
        $students = array();
        $data = $db->prepare('SELECT * FROM students');
        $data->execute();
        while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
            $students[$OutputData['id']] = array(
                'id'    => $OutputData['id'],
                'name' => $OutputData['name']
            );
        }
        return json_encode($students);
    }
}

$API = new API;
header('Content-Type: application/json');
echo $API->Select();
?>