<?php require_once 'database.php'; ?>
<?php

class Pendingusers{


    public function __construct(){

        $database = new Database();
        $sql = 'SELECT  users.full_name, practices.name, practices.category, practices.created FROM practices JOIN users ON practices.users_id=users.id';
        $result = $database -> DB -> query($sql);
        $output = $result -> fetchAll(PDO::FETCH_OBJ);

        echo json_encode($output);
   }
}

$test = new Pendingusers();

?>
