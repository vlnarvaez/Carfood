angular.module('starter.controllers', [])

.controller('AppCtrl', function($scope, $ionicModal, $timeout) {
  $scope.selection = {};
  $scope.loginData = {};

  // Create the login modal that we will use later
  $ionicModal.fromTemplateUrl('templates/login.html', {
    scope: $scope
  }).then(function(modal) {
    $scope.modal = modal;
  });

  $scope.agregar = function(plato){
    var idPlato = plato.IDPLATO;

    $scope.selection[idPlato].cantidad = 1;
    $scope.selection[idPlato].nombrePlato = plato.NOMBRE;
  }

  // Triggered in the login modal to close it
  $scope.closeLogin = function() {
    $scope.modal.hide();
  };

  $scope.datos = function() {
    alert($scope.loginData.Fritada)
  }

  // Open the login modal
  $scope.login = function() {
    $scope.modal.show();
  };

  // Perform the login action when the user submits the login form
  $scope.doLogin = function() {
    console.log('Doing login', $scope.loginData);

    // Simulate a login delay. Remove this and replace with your login
    // code if using a login system
    $timeout(function() {
      $scope.closeLogin();
    }, 1000);
  };
})

.controller('PlatosCartaCtrl', function($scope, $rootScope, $http, $stateParams, sesion) {
  $http({
    method: 'GET',
    url: "http://172.18.82.250/demo/platosCarta.php?tipo='"+$stateParams.tipo+"'"
  }).success(function(data, status, headers, config) {
    $scope.platos=data;
  }).error(function(data, status, headers, config) {
    alert("Error. Estado HTTP:"+status);
  });
})

.controller('MenuesCtrl', function($scope, $rootScope, $http, $stateParams, sesion) {
  $http({
    method: 'GET',
    url: "http://192.168.1.14/demo/menuesCarta.php?tipo="+$stateParams.tipo
  }).success(function(data, status, headers, config) {
    $scope.menues=data;
  }).error(function(data, status, headers, config) {
    alert("Error. Estado HTTP:"+status);
  });
})
