<?php require_once 'database.php'; ?>
<?php

class Insertpractise{


    public function __construct(){

        session_start();
        $sql = 'SELECT id FROM users WHERE username="'.$_SESSION['username'].'"';
        $database = new Database();
        $db = $database -> DB -> prepare($sql);
        $db -> execute();

        $result = $db -> fetch(PDO::FETCH_ASSOC);

        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $userId = $result['id'];
        $sql2 = 'INSERT INTO practices(users_id, name, description, code, category, created, edited) ';
        $sql2.= 'VALUES ('.$userId.', "'.$request -> name.'" ,"'.$request -> description.'", "'.$request -> code.'","'.$request -> category.'", NOW(), NOW())';
        //  echo $sql2;

        $resultQuery = $database -> DB -> prepare($sql2);
        $responseObject = new stdClass();

        if($resultQuery -> execute()){

          $responseObject -> isAdded = true;
          $responseObject -> message = 'Sucessfully added Best Practise!';

        }
        
        else{

          $responseObject -> isAdded = false;
          $responseObject -> message = 'Something wen wrong!';
        }
          echo json_encode($responseObject);
   }
}

$test = new Insertpractise();

?>
