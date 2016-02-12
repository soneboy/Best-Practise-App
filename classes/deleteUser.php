<?php require_once 'database.php'; ?>
<?php

class Deleteuser{


    public function __construct(){

        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);


        $database = new Database();

        $sql = 'DELETE FROM users WHERE username="'.$request -> action.'"';
        $result = $database -> DB -> query($sql);
        $deleteMessage = new stdClass();

        if($result -> execute()){

          $deleteMessage -> message = "User ".$request -> action." successfuly deleted!";
          $deleteMessage -> error = false;
          echo json_encode($deleteMessage);
        }
        else
        {
          $deleteMessage -> message = 'Errorcina!';
          $deleteMessage -> error = true;
          echo json_encode($deleteMessage);
        }

   }
}

$test = new Deleteuser();

?>
