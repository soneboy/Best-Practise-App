<?php

class Logout{


      public function __construct(){
      $location = new stdClass();
      session_start();

      if(isset($_SESSION['username'])){

      unset($_SESSION['username']);
      $location -> location = 'http://localhost/bestpractise';
      echo json_encode($location);
   }
  }
}

$test = new Logout();










 ?>
