<?php require_once 'database.php'; ?>
<?php

class Getnames{


    public function __construct(){

        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);

        $database = new Database();
        $sql = 'SELECT category FROM practices';
        $result = $database -> DB -> query($sql);
        $result -> execute();

        $categories = new stdClass();
        $categoryArray = [];
        while($row = $result -> fetch(PDO::FETCH_ASSOC)){

          array_push($categoryArray, strtolower($row['category']));
        }

        $categories -> categories = array_unique($categoryArray);


        echo json_encode($categories);

   }

}

$test = new Getnames();

?>
