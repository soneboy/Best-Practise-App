bestApp.controller('globalController', function($scope, $location, calls, $route, $window){


    $scope.logout = function(){
      calls.get('logout.php').then(function(redirect){

        $window.location.href = redirect.data.location;

      });
    };
    $scope.searchPractice = function(search){

      $location.path('/search').search('id', search);
       // $location.url = 'http://localhost/bestpractise/#/add';
    };
});
