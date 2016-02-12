<?php require_once 'database.php'; ?>
<?php

class Search{
    
    
    public function __construct(){
        
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        $database = new Database();
        $sql = 'SELECT name FROM practices WHERE name LIKE "%'.$request -> search.'%"';
        $result = $database -> DB -> query($sql);
        $output = $result -> fetchAll(PDO::FETCH_COLUMN);

        echo json_encode($output);
   }
}

$test = new Search();

?>



