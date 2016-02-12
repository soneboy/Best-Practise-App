<?php require_once 'database.php'; ?>
<?php

class Login{


    public function __construct(){

        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $database = new Database();
        $sql = 'SELECT * FROM users WHERE username = "'.$request -> username.'" AND password="'.$request -> password.'"';

        $del = $database -> DB -> prepare($sql);
        $del -> execute();
        $loginObject = new stdClass();

          if($del -> rowCount() >= 1){
          session_start();
          $_SESSION['username'] = $request -> username;
          $loginObject -> username = $_SESSION['username'];
          $loginObject -> sessionId = session_id();
          $loginObject -> location = 'http://localhost/bestpractise/#/?user='.$_SESSION['username'];
          echo json_encode($loginObject);

        }
   }
 }

$test = new Login();

?>
