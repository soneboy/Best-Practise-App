<?php require_once 'database.php'; ?>
<?php

class Pendingusers{


    public function __construct(){

        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        session_start();
        
        $database = new Database();
        $sql = 'SELECT practices.name, users.full_name, practices.category, practices.created FROM practices  JOIN users ON practices.users_id=users.id WHERE users.username="'.$_SESSION["username"].'"';
        $result = $database -> DB -> query($sql);
        $output = $result -> fetchAll(PDO::FETCH_OBJ);

        echo json_encode($output);
   }
}

$test = new Pendingusers();

?>
