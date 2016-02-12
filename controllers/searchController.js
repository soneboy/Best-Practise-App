bestApp.controller('searchController', function($scope, $location, calls) {

  var searchName = {
    search: $location.search().id
  };

  calls.post('search.php', searchName).then(function(response) {

    $scope.searchResults = response.data;

    if(typeof $scope.searchResults[0] === 'undefined') {

      $scope.showDiv = false;
      $scope.showMessage = true;

    }
    else{

      $scope.showDiv = true;
      $scope.showMessage = false;
    }

  });

  if ($location.search().hasOwnProperty('name')) {

    console.log($location.search().name);
    calls.post('showUniqueSearch.php', $location.search().name).then(function(response) {

      console.log(response.data);
    });

  }

});
