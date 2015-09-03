var app = angular.module('exela', ['ngRoute','ngSanitize']);

app.config(function($routeProvider, $locationProvider) {
	$locationProvider.html5Mode(true);

	$routeProvider
	.when('/', {
		templateUrl: myLocalized.partials + 'home.html',
		controller: 'homeCtrl'
	})
	.when('/category/:portfolio', {
		templateUrl: myLocalized.partials + 'portfolio.html',
		controller: 'portfolioCtrl'
	})
	.when('/:slug', {
		templateUrl: myLocalized.partials + 'page.html',
		controller: 'pageCtrl'
	});
});


app.controller('mainCtrl', function($scope, $http, $routeParams, dataService,$location) {
	$scope.page={
		 parent:'Home',
		 subpage:'',
		 type:'',
		 title:''
	}
	$scope.mainmenu  = '';
	$scope.topMenu = '';

	$scope.currentLocation = {
		url: $location.absUrl()+'/'
	}

	$scope.cssLoader = {
		show: true
	}

	/*var exelaMainMenu = localStorage.getItem('exelaMainMenu');
	if(exelaMainMenu && exelaMainMenu.length>0){
		$scope.mainmenu  = JSON.parse(exelaMainMenu);
	}else{
		$http.get('wp-json/menu-locations/primary').success(function(res){
			$scope.mainmenu =  res;
			setStorage('exelaMainMenu', JSON.stringify($scope.mainmenu)); 
		});
		
	}*/

	$scope.mainmenu = dataService.mainmenu(function(data){
		$scope.mainmenu =  data;
		setStorage('exelaMainMenu', JSON.stringify($scope.mainmenu));
		$scope.cssLoader.show = false;  
	});

	$scope.topMenu = dataService.topmenu(function(data){
		$scope.topMenu =  data;
		setStorage('exelaTopMenu', JSON.stringify($scope.topMenu));
		$scope.cssLoader.show = false;  
	});
	

});

app.controller('homeCtrl', function($scope, $http, $routeParams,$location) {
	$scope.page.title = 'Home';
	$scope.currentLocation.url = $location.absUrl()+'/';
	$scope.cssLoader.show = false; 

	/*$http.get(myLocalized.ajaxurl+'?action=get-theme-option-data').success(function(res){
		console.log(res)
	});*/

});

app.controller('pageCtrl', function($scope, $http, $routeParams,$location) {
	$scope.pageData = {};
	$scope.currentLocation.url = $location.absUrl()+'/';
	$scope.cssLoader.show = true; 
	$http.get('wp-json/pages/' + $routeParams.slug).success(function(res, status, headers){
		$scope.page.title = res.title;
		$scope.pageData.title = res.title;
		$scope.pageData.content = res.content;
		$scope.cssLoader.show = false;
	});
	
});

app.controller('portfolioCtrl', function($scope, $http, $routeParams,$filter,$location,$window) {
	$scope.page.title = 'Portfolio';
	$scope.currentLocation.url = $location.absUrl()+'/';
	$scope.cssLoader.show = true; 
	$scope.portfolioList = [];
	$scope.tagList = [];
	$scope.offset = 0;
	$scope.posts_per_page = 6;
	$scope.callLoadMore = true;
	$scope.filterItem = {};

	$http.get('wp-json/posts?type[]=portfolio&filter[posts_per_page]='+$scope.posts_per_page+'&filter[orderby]=menu_order&filter[order]=ASC&filter[offset]='+$scope.offset).success(function(res, status, headers){
		$scope.portfolioList =  $filter("toArray")(res);
		$scope.cssLoader.show = false;
		//console.log($scope.portfolioList);
	});

	$http.get('wp-json/taxonomies/post_tag/terms').success(function(res, status, headers){
		$scope.tagList =  $filter("toArray")(res);
	});

	$scope.loadMore = function(){
		if($scope.callLoadMore){
			$scope.cssLoader.show = true;
	       	$scope.offset = $scope.offset+$scope.posts_per_page;
	       	$http.get('wp-json/posts?type[]=portfolio&filter[posts_per_page]='+$scope.posts_per_page+'&filter[orderby]=menu_order&filter[order]=ASC&filter[offset]='+$scope.offset).success(function(res, status, headers){
				var newRes =  $filter("toArray")(res);
				if(newRes.length > 0){
					newRes.forEach(function(item){
						$scope.portfolioList.push(item);
					});
				}else{
					$scope.callLoadMore = false;
					$scope.offset = $scope.offset-$scope.posts_per_page;
				}
				
				$scope.cssLoader.show = false;
			});
		}	
	}

	var whenScrlBottom = function() {
    
	    var win_h = (self.innerHeight) ? self.innerHeight : document.body.clientHeight;    // gets window height
	    var scrl_pos = $window.pageYOffset ? $window.pageYOffset : document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop;
	    
	    if (document.body.scrollHeight <= (scrl_pos + win_h)) {
	       	jQuery('#load-more-portfolio').click();
		}
	}
	
	$window.onscroll = whenScrlBottom;
	
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

app.service('dataService', function($http) {
	this.mainmenu=function(callback){
		var data = localStorage.getItem('exelaMainMenu');
		if(data && data.length>0){
			data = JSON.parse(data);
			return data;
		}else{
		  	return $http.get('wp-json/menu-locations/primary').success(callback);			
		}
			
	};

	this.topmenu=function(callback){
		var data = localStorage.getItem('exelaTopMenu');
		if(data && data.length>0){
			data = JSON.parse(data);
			return data;
		}else{
		  	return $http.get('wp-json/menu-locations/secondary').success(callback);			
		}
			
	};
});

app.filter("toArray", function(){
  return function(obj) {
      var result = [];
      angular.forEach(obj, function(val, key) {
          result.push(val);
      });
      return result;
  };
});
