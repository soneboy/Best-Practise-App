bestApp.controller('tableController', function($scope, $location, calls) {



  if ($location.search().hasOwnProperty('name')) {

    $scope.showAll = false;
    $scope.showYour = false;
    $scope.selectBox = false;
    $scope.singleBox = true;

    calls.post('singlePractice.php', {
      action: $location.search().name
    }).then(function(response) {

      $scope.singlePractise = response.data;

    });
  } else {
    $scope.selectBox = true;
    $scope.showAll = true;
  }

    $scope.changeBox = function(value) {


    if (value === 'all') {

      $scope.showAll = true;
      $scope.showYour = false;
    }
    if (value === 'your') {
      $scope.showAll = false;
      $scope.showYour = true;

      calls.get('yourPractices.php').then(function(response){

          $scope.yourBestPractises = response.data;

      });

    }
  };

calls.get('dashPractises.php').then(function(response){

    $scope.bestPractises = response.data;

     });



});
