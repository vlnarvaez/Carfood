angular.module('starter.controllers', [])

.controller('AppCtrl', function($scope, $ionicModal, $timeout) {

  $scope.loginData = {};

  // Create the login modal that we will use later
  $ionicModal.fromTemplateUrl('templates/login.html', {
    scope: $scope
  }).then(function(modal) {
    $scope.modal = modal;
  });

  // Triggered in the login modal to close it
  $scope.closeLogin = function() {
    $scope.modal.hide();
  };

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

.controller('PlaylistsCtrl', function($scope, $rootScope, $http, sesion) {
  $rootScope.sesion = "SI";
  alert($rootScope.sesion);

  $http({
    method: 'GET',
    url: "http://192.168.1.14/demo/platosCarta.php"
  }).success(function(data, status, headers, config) {
    $scope.playlists=data;
  }).error(function(data, status, headers, config) {
    alert("Error. Estado HTTP:"+status);
  });
})

.controller('PlaylistCtrl', function($scope, $stateParams, sesion) {
  sesion = "N";
});
