bestApp.controller('addController', function($scope, calls){


  calls.get('getCategory.php').then(function(response){

      $scope.categories = response.data.categories;

  });


    $scope.addNew = function(){

      if($scope.practise.category === 'newCategory'){

         $scope.showCategory = false;
      }
    }

    $scope.checkName = function(){

      calls.post('getName.php', $scope.practise).then(function(response){

          $scope.nameFound = response.data.exists;
          $scope.categories = response.data.categories;

      });
    }

    $scope.addPractise = function(){

         calls.post('insertPractise.php', $scope.practise).then(function(response){

           $scope.addResponse = response.data;
           $scope.showMessage = true;

         });
    };

});
