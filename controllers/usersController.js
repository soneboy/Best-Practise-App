bestApp.controller('usersController', function($scope, calls, $timeout){

   $scope.catchUsername = '';


function callsUsers(){

   calls.get('showUsers.php').then(function(response){

     $scope.users = response.data;


   });
}
     $scope.passUsername = function(username){
     $scope.catchUsername = username;
   }

   $scope.deleteUser = function(user){

     calls.post('deleteUser.php', {action : user}).then(function(response){

       $scope.usersResponse = response.data;
       $scope.alertclass = 'alert alert-success';
       $scope.message = response.data.message;
       $scope.showMessageBox = true;
       callsUsers();

       $timeout(function(){
         $scope.showMessageBox = false;
       }, 2000);

     });
   }

   callsUsers();
});
