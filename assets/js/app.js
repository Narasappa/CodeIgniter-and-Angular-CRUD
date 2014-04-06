'use strict';

/* App Module */

var myApp = angular.module('myApp',['ngRoute']);

myApp.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/AddNewOrder', {
        templateUrl: 'partials/add_orders.html',
        controller: 'AddOrderController'
    }).
      when('/ShowOrders', {
        templateUrl: 'partials/show_orders.html',
        controller: 'ShowOrdersController'
      }).
      when('/ShowIdOrders/:orderId', {
        templateUrl: 'partials/show_id_orders.html',
        controller: 'ShowOrdersIdController'
      }).
      otherwise({
        redirectTo: '/AddNewOrder'
      });
}]);
 
 
myApp.controller('AddOrderController', function($scope) {
     console.log("Inside Order Contoller");
    $scope.message2 = 'This is Add new order screen';
     
});
 
 
myApp.controller('ShowOrdersController', function($scope) {
     console.log("Inside ShowOrdersController ");
    $scope.message = 'This is Show orders screen';
 
});

myApp.controller('ShowOrdersIdController',function($scope, $routeParams) {
    console.log("Inside ShowOrdersController ");
    $scope.order_id = $routeParams.orderId;
 
});