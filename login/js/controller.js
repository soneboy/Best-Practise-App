var loginModule = angular.module('loginModule', ['ngRoute']);
loginModule.controller('loginController', function($scope, $q, $http, $location, $route, $window){

$scope.register = {};

$scope.isWatched = true;


var testRegister = function(){

  if($scope.register.password === $scope.register.confirmPassword){

     $scope.isWatched = false;
  }

  else{

     $scope.isWatched = true;
  }
}

$scope.$watch('register.password', function(){

   testRegister();

});

$scope.$watch('register.confirmPassword', function(){

   testRegister();

});


$scope.login = function(){

console.log($scope.register);
  $http({
    method: 'POST',
    url: 'http://localhost/bestpractise/classes/login.php',
    data: $scope.user
  })
  .then(function(response){

  //  window.session = response.data.sessionId;
    if(response.data.location){

    $window.location.href = response.data.location;
   }
   else{

    $scope.userNotFount = true;
  }
     });
}

  $scope.registerCall = function(){


    $http({
      method: 'POST',
      url: 'http://localhost/bestpractise/classes/register.php',
      data: $scope.register
    })
    .then(function(response){
     console.log(response.data);
     var getData = response.data;
     var angEl = angular.element(document.querySelector('#messageBox'));

     if(getData.sucess === true){

       angEl.attr('class', 'alert alert-success');
       $scope.showMessage = true;
       $scope.a = false;
       $scope.message = getData.message;

     }
     else{

       angEl.attr('class', 'alert alert-danger');
       $scope.message = getData.message;
       $scope.showMessage = true;

     }
   });
  }
});
