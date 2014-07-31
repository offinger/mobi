var test = angular.module('test', []); 

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
})

	$scope.dzoni = function(){ 
		//alert($scope.textbox);
       $http({
           method: 'POST',
           url: 'http://mobi.local:8888/index.php/comments/koment',
           data: {"ime":$scope.ime, "komentar":$scope.komentar}
       }).success(function(data){
               
               $scope.posts.unshift({"ime":$scope.ime, "komentar":$scope.komentar});
               $scope.ime = "";
               $scope.komentar = "";

           }).error(function(data, status, header, config){
               alert('njet ok');
           });
	} 
}]);