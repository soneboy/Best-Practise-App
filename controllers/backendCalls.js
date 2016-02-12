(function(){

    var calls = function($http){


     var getCalls = function(className){

        return $http.get('classes/' + className);
     };

    var postCalls = function(className,data){

            return $http({

                    method: 'POST',
                    url: 'classes/' + className,
                    data: data
              });
            };

    return {

        get: getCalls,
        post: postCalls
         };
     };

bestApp.factory('calls', calls);

})();
