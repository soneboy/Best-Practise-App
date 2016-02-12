<?php require_once 'database.php'; ?>
<?php

class Getcategories{


    public function __construct(){

        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $database = new Database();
        $sql = 'SELECT name FROM practices';
        $result = $database -> DB -> query($sql);
        $result -> execute();

        $categories = new stdClass();
        $nameArray = [];
        while($row = $result -> fetch(PDO::FETCH_ASSOC)){

          array_push($nameArray, $row['name']);
        }

        $categories -> categories = $nameArray;



        $categories -> exists = false;

      for($i=0; $i < sizeof($nameArray); $i++){

        if($nameArray[$i] === $request -> name){

          $categories -> exists = true;
        }

      }

        echo json_encode($categories);

   }

}

$test = new Getcategories();

?>
