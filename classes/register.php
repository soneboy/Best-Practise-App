<?php require_once 'database.php'; ?>
<?php

class Register{

public function __construct(){

    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    $database = new Database();

    $sql = 'SELECT * FROM users WHERE username = "'.$request -> email.'"';

    $del = $database -> DB -> prepare($sql);
    $del -> execute();
    $registerObject = new stdClass();

      if($del -> rowCount() >= 1){

              $registerObject -> message = 'User with '.$request -> email.' email adress already exists!';
              $registerObject -> sucess = false;
              echo json_encode($registerObject);

    }else{
              $sql2 = 'INSERT INTO users(username,password,full_name,status,role,requested_at)';
              $sql2.=' VALUES ("'.$request -> email.'","'.$request -> password.'","'.$request -> fullname.'","pending","user", NOW())';
              $del = $database -> DB -> prepare($sql2);
            //  $del -> execute();

              if($del -> execute()){

                  $registerObject -> message = 'Registration sucessfully completed! You will recieve mail when admin aprrove you!';
                  $registerObject -> sucess = true;
                  echo json_encode($registerObject);
              }
              else{

                  $registerObject -> message = 'Querry failed!';
                  $registerObject -> sucess = false;
                  echo json_encode($registerObject);
        }
      }
    }
  }


$test = new Register();

?>
