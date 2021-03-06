sharedModule
	.factory('InventoryReport', ['$http', function($http){
		var urlBase = '/inventory-report';

		return {
			index: function(){
				return $http.get(urlBase);
			},
			store: function(data){
				return $http.post(urlBase, data);
			},
			show: function(id){
				return $http.get(urlBase + '/' + id);
			},
			update: function(id, data){
				return $http.put(urlBase + '/' + id, data);
			},
			delete: function(id){
				return $http.delete(urlBase + '/' + id);
			},
			dashboard: function(){
				return $http.get(urlBase + '-dashboard');
			},
			chartWeekly: function(data){
				return $http.post(urlBase + '-chart-weekly', data);
			},
		};
	}]);