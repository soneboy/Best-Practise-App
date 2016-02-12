<?php require_once 'database.php'; ?>
<?php

class Approveuser{


    public function __construct(){

        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $database = new Database();
        $sql = 'UPDATE users SET status="approved" WHERE username="'.$request -> user.'"';
        $result = $database -> DB -> query($sql);

   }
}

$test = new Approveuser();

?>
