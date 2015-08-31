var app = angular.module('exela', ['ngRoute','ngSanitize']);

app.config(function($routeProvider, $locationProvider) {
	$locationProvider.html5Mode(true);

	$routeProvider
	.when('/', {
		templateUrl: myLocalized.partials + 'main.html',
		controller: 'Main'
	})
	.when('/:slug', {
		templateUrl: myLocalized.partials + 'content.html',
		controller: 'Content'
	});
})

app.controller('Main', function($scope, $http, $routeParams) {
	$http.get('wp-json/posts/').success(function(res){
		$scope.posts = res;
	});

	$http.get(myLocalized.ajaxurl+'?action=get-theme-option-data').success(function(res){
		console.log(res)
	});
	//console.log(myLocalized.ajaxurl);
});

app.controller('Content', function($scope, $http, $routeParams) {
	$http.get('wp-json/posts/?filter[name]=' + $routeParams.slug).success(function(res){
		$scope.post = res[0];
	});
	
});

//searchForm Directive
app.directive('searchForm', function() {
	return {
		restrict: 'EA',
		template: 'Search Keyword: <input type="text" name="s" ng-model="filter.s" ng-change="search()">',
		controller: ['$scope', '$http', function ( $scope, $http ) {
			$scope.filter = {
				s: ''
			};
			$scope.search = function() {
				$http.get('wp-json/posts/?filter[s]=' + $scope.filter.s).success(function(res){
					$scope.posts = res;
				});
			};
		}]
	};
});