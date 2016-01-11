angular.module('starter.controllers', [])

.controller('AppCtrl', function($scope, $rootScope, $ionicModal, $timeout) {

  $rootScope.pedido = [];
  $rootScope.precioTotal = 0;
  $rootScope.numeroPlatos = 0;
  $scope.selection = {};
  $scope.loginData = {};

  // Create the login modal that we will use later
  $ionicModal.fromTemplateUrl('templates/login.html', {
    scope: $scope
  }).then(function(modal) {
    $scope.modal = modal;
  });

  $scope.gestion = function(plato) {
    var bandera = false;
    for (var i = 0; i < $rootScope.pedido.length; i++){
      if (plato.ID_PLATO == $rootScope.pedido[i].ID_PLATO){
        bandera = true;
        alert("iguales");
        $scope.removePlato(plato,i);
      }
    }
    if (bandera){

    }else{
      $scope.addPlato(plato);
    }
  }

  $scope.addPlato = function(plato){
    $rootScope.pedido.push(plato);
    alert(JSON.stringify($rootScope.pedido));
    alert("agregado");

    $http({
      method: 'GET',
      url: "http://172.18.82.245/demo/platosCarta.php?tipo='"+$stateParams.tipo+"'"
    }).success(function(data, status, headers, config) {
      $scope.platos=data;
    }).error(function(data, status, headers, config) {
      alert("Error here. Estado HTTP:"+status);
    });


  }

  $scope.removePlato = function(plato,i){
    $rootScope.pedido.splice(i,1);
    alert(JSON.stringify($rootScope.pedido));
    alert("Eliminado");
  }

  $scope.destroyPedido = function(){
    $rootScope.pedido = [];
    $rootScope.precioTotal = 0;
    $rootScope.numeroPlatos = 0;
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
    url: "http://172.18.82.245/demo/platosCarta.php?tipo='"+$stateParams.tipo+"'"
  }).success(function(data, status, headers, config) {
    $scope.platos=data;
  }).error(function(data, status, headers, config) {
    alert("Error here. Estado HTTP:"+status);
  });
})
