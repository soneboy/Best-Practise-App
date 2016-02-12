<?php

class Database{

    public $DB;

    public function __construct(){

        try{

             $db = new PDO('mysql:host=localhost;dbname=bestpractise','root','');
        }

        catch(Exception $e){
            $error= $e ->getMessage();

        }
        if(isset($error)){
            echo $error;
        }

        $this -> DB = $db;

    }

}
