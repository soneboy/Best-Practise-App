<?php require_once 'database.php'; ?>
<?php

class Showusers{


    public function __construct(){

        $database = new Database();
        $sql = 'SELECT  * FROM users WHERE status="approved"';
        $result = $database -> DB -> query($sql);
        $output = $result -> fetchAll(PDO::FETCH_OBJ);

        echo json_encode($output);
   }
}

$test = new Showusers();

?>
