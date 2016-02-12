<?php require_once 'database.php'; ?>
<?php

class Pendingusers{


    public function __construct(){

        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $database = new Database();
        $sql = 'SELECT * FROM practices WHERE category="'.$request -> action.'"';
        $result = $database -> DB -> query($sql);
        $output = $result -> fetchAll(PDO::FETCH_OBJ);

        echo json_encode($output);
   }
}

$test = new Pendingusers();

?>
