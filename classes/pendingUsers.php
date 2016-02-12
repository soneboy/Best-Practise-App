<?php require_once 'database.php'; ?>
<?php

class Pendingusers{


    public function __construct(){

        $database = new Database();
        $sql = 'SELECT * FROM users WHERE status="pending"';
        $result = $database -> DB -> query($sql);
        $output = $result -> fetchAll(PDO::FETCH_OBJ);

        echo json_encode($output);
   }
}

$test = new Pendingusers();

?>
