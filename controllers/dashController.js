bestApp.controller('dashController', function($scope, calls, $location, $route) {

  $scope.back = function() {

  $route.reload();

  }

  calls.get('dashPractises.php').then(function(response){

  $scope.dashPractises = response.data;

  });

  $scope.practiseBy = [];

  $scope.showBy = function(user, test) {

  $scope.a = false;
  $scope.b = false;
  $scope.c = true;


    if (test === 'user') {

       calls.post('getByUser.php', {
        action: user
      }).then(function(response) {
        $scope.practiseBy = response.data;
        $scope.heading = user;
        //  console.log($scope.practiseBy);
      });
}
      if  (test === 'category') {

        calls.post('getByCategory.php', {
          action: user
        }).then(function(response) {
          $scope.practiseBy = response.data;
          $scope.heading = user;
          //  console.log($scope.practiseBy);
        });
      }
    }

  function showPendingUsers() {

    calls.get('pendingUsers.php').then(function(response) {

      $scope.pendingUsers = response.data;

      $scope.showMessage = true;

      var element = angular.element(document.querySelector('#panelColor'));
      if($scope.pendingUsers.length === 0){

      element.attr('class', 'panel panel-primary');
    }
    else{
      element.attr('class', 'panel panel-red');
    }

    });
  }

  $scope.approveUser = function(username) {

    calls.post('approveUser.php', {
      user: username
    }).then(function(response) {

      showPendingUsers();
    });
  };

  $scope.passIndex = function(deletedUser) {

    $scope.username = deletedUser;
  }

  $scope.deleteRequest = function() {

    $scope.passIndex($scope.username);

    calls.post('upUser.php', {
      user: $scope.username
    }).then(function(response) {

      showPendingUsers();

    });

  }

  showPendingUsers();

});
