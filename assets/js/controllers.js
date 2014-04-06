'use strict';

/* Controllers */
var uid=1;
var myApp = angular.module('myApp',[]);
var base_url="http://localhost/cl3/index.php";

myApp.controller('ContactController', ['$scope','$http',function($scope,$http) {
   $scope.contacts = [];
  // $scope.contacts.push()
  /* [
        {  id:0,
          'name': 'Narasappa',
          'email':'narasulondave@gmail.com',
          'phone': '8095685974'
        },
         {  id:1,
          'name': 'Sagar',
          'email':'sagar.nawati@gmail.com',
          'phone': '8095685974'
        }



    ];
    */

    $scope.errors = [];
    $scope.msgs = [];

/*
    $scope.saveContact= function(){
     if ($scope.newcontact.id == null){
        $scope.newcontact.id=++uid;
     	$scope.contacts.push($scope.newcontact);
     	 }else {
     	 	var i=0;
         for(i in $scope.contacts) {
            if($scope.contacts[i].id == $scope.newcontact.id) {
            $scope.contacts[i] = $scope.newcontact;
            }
        }
        }
        $scope.newcontact = {};
   }
   */

   $scope.saveContact=function(){
    console.log($scope.newcontact);
     if ($scope.newcontact.id == null){
    $http({
    url: base_url + '/contact/save_contact',
    method: "POST",
    data:{'name':$scope.newcontact.name,'phone':$scope.newcontact.phone,'email':$scope.newcontact.email}
   }).success(function(data, status) {
                        if (data)
                        {
                           // $scope.msgs.push(data.msg);

                            $scope.contacts.push(data);
                            $scope.newcontact = {};
                        }
                        else
                        {
                            $scope.errors.push(data.error);
                        }
                    }).error(function(data, status) { // called asynchronously if an error occurs
// or server returns response with an error status.
                        console.log("error"+status);
                        $scope.errors.push(status);
                    });}
                    else
                    {
                       console.log("inside new edit method")
                      $http({
                      url: base_url + '/contact/edit_contact',
                     method: "POST",
                     data:{'id': $scope.newcontact.id ,'name':$scope.newcontact.name,'phone':$scope.newcontact.phone,'email':$scope.newcontact.email}
                   }).success(function(data, status) {
                        if (data.status)
                        {
                               var i=0;
                   for(i in $scope.contacts) {

                         if($scope.contacts[i].id == $scope.newcontact.id) {
                //we use angular.copy() method to create
                //copy of original object
                 //$scope.newcontact = angular.copy($scope.contacts[i]);
                 $scope.contacts[i].name= $scope.newcontact.name;
                  $scope.contacts[i].phone= $scope.newcontact.phone;
                   $scope.contacts[i].email= $scope.newcontact.email;
                          }
                               }

                            $scope.newcontact = {};
                        }
                        else
                        {
                            $scope.errors.push(data.error);
                        }
                    }).error(function(data, status) { // called asynchronously if an error occurs
// or server returns response with an error status.
                        console.log("error"+status);
                        $scope.errors.push(status);
                    });


                    }

   }

   $scope.getAllConatct=function(){
    $http({
    url: base_url + '/contact/get_all_conatcts',
    method: "GET",
    }).success(function (data) {
    $scope.contacts= data;
     }).error(function(data, status) { // called asynchronously if an error occurs
// or server returns response with an error status.
                        console.log("error"+status);
                        $scope.errors.push(status);
                    });

   }



   $scope.edit = function(id) {
   	     console.log("inside edit methods");
          var i=0;
        for(i in $scope.contacts) {

            if($scope.contacts[i].id == id) {
                //we use angular.copy() method to create
                //copy of original object
                $scope.newcontact = angular.copy($scope.contacts[i]);
            }
        }
    }


    $scope.delete = function(id) {
    $http({
    url: base_url + '/contact/delete',
    method: "DELETE",
    data:{'id': id}
    }).success(function (data) {
      var i=0
         if (data.status){
          for(i in $scope.contacts) {
            if($scope.contacts[i].id == id) {
                $scope.contacts.splice(i,1);
                $scope.newcontact = {};
            }
        }
         }
     }).error(function(data, status) { // called asynchronously if an error occurs
// or server returns response with an error status.
                        console.log("error"+status);
                        $scope.errors.push(status);
                    });

    }

}]);






























myApp.controller('CarController',['$scope',function($scope){
    $scope.name = 'Car';
    $scope.type = 'Car';

}]);

myApp.controller('BMWController',['$scope',function($scope){
    $scope.name = 'BMWCar';
    $scope.type = 'BMWCar';
}]);


myApp.controller('BMWMotorcycleController',['$scope',function($scope){
    $scope.name = 'BMWMotorade';
    $scope.type = 'Motorcycle';
}]);



