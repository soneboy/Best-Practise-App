<?php require_once 'database.php'; ?>
<?php

class Updateuser{


    public function __construct(){

        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $database = new Database();
        $sql = 'UPDATE users SET status="denied" WHERE username="'.$request -> user.'"';
        $result = $database -> DB -> query($sql);
   }
}

$test = new Updateuser();

?>
