var bestApp = angular.module('BestApp', ['ngRoute',]);

bestApp.config(function ($routeProvider){

    $routeProvider
            .when('/',{

                templateUrl: 'dash.html',
                controller: 'dashController'
    })
           .when('/tables', {

                templateUrl: 'tables.html',
                controller: 'tableController'
    })
           .when('/add', {

                templateUrl: 'add.html',
                controller: 'addController'
     })
           .when('/users', {

                templateUrl: 'users.html',
                controller: 'usersController'
     })
           .when('/search', {

                templateUrl: 'search.html',
                controller: 'searchController'
     })
            .otherwise({redirectTo:'/'});

});

bestApp.directive('prism', function($timeout) {
  return {
    restrict: 'A',
    link: function ($scope, element, attrs) {
       $timeout(function(){
          Prism.highlightElement(element[0]);
       }, 200);
    }
  };
});


bestApp.directive('alertMessage', function(){
    return {
          restrict:'A',
          template: '<div class={{alertclass}} ng-show="showMessageBox" ng-init="showMessageBox=false">{{message}}</div>'
    };
});
