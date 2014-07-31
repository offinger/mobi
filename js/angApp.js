var test = angular.module('test', ['infinite-scroll']); 

	test.controller("temp", ['$scope','$http', function($scope, $http){ 

		// setting beggining page. 
		$scope.num = 1; 

		// loading initial posts 
		$http.get('http://mobi.local:8888/index.php/comments/json?num=1').success(function (data){ 
			$scope.posts = data; 
	}); 

	$(window).scroll(function() {
		// alert(($(window).scrollTop()+30)+','+$(window).height()+', '+$(document).height());
   if($(window).scrollTop()+100 + $(window).height() >= $(document).height()) {
       $scope.num += 1; 
		$http.get('http://mobi.local:8888/index.php/comments/json?num='+$scope.num).success(function (data){ 
			$scope.posts = $scope.posts.concat(data); 
		}); 
   }
});

	$scope.dzoni = function(){ 
		// incrementing page counter for loading "next" page 
		
	}; 
}]);