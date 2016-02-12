<?php require_once 'database.php'; ?>
<?php

class Search{


    public function __construct(){

        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $database = new Database();
        $sql = "SELECT  description,code FROM practices WHERE name='{$request -> name}'";
        $result = $database -> DB -> query($sql);
        $output = $result -> fetch(PDO::FETCH_ASSOC);

        echo json_encode($output);
   }
}

$test = new Search();

?>
