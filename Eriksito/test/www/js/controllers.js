angular.module('starter.controllers', [])

.controller('AppCtrl', function($scope, $rootScope, $ionicModal, $timeout, $ionicPopup, $http, $sce) {

  $rootScope.pedido = [];
  $rootScope.detallePedido = [];
  $rootScope.precioTotal = 0;
  $rootScope.idMesa = 9;
  $rootScope.cliente = {};
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
      if (plato.ID_PLATOS == $rootScope.pedido[i].ID_PLATOS){
        if (plato.NOMBRE == $rootScope.pedido[i].NOMBRE){
          bandera = true;
          alert("iguales");
          $scope.removePlato(plato,i);
        }
      }
    }
    if (bandera){

    }else{
      $scope.addPlato(plato);
    }
  }

  $scope.guardarPedido = function(){
    var datos = {
      'id_mesa' : $rootScope.idMesa,
      'cedula' : $rootScope.cliente.cedula,
      'total' : $rootScope.precioTotal,
      'observaciones' : "Insercion Aplicacion"
    };

    datos = JSON.stringify(datos);

    var datosDetalle = $rootScope.detallePedido;

    datosDetalle = JSON.stringify(datosDetalle);

    $http({
      method: 'POST',
      url: 'http://192.168.1.4/demo/addPedido.php',
      data: datos,
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},

    }).
    success(function(data, status, headers, config) {

      $http({
        method: 'GET',
        url: "http://192.168.1.4/demo/getIdPedido.php?cedula='1103460026'&total='"+$rootScope.precioTotal+"''"
      }).success(function(data, status, headers, config) {
        $scope.UltimoID = data[0].ID;
        alert("LAST:"+JSON.stringify(data[0].ID));

        $http({
          method: 'POST',
          url: 'http://192.168.1.4/demo/addDetallePedido.php',
          data: datosDetalle,
          headers: {'Content-Type': 'application/x-www-form-urlencoded'},

        }).
        success(function(data, status, headers, config) {
          console.log("Dtos envio"+datosDetalle);
          alert("TodoInsertado");
        }).
        error(function(data, status, headers, config) {
          alert("NOP");
        });


      }).error(function(data, status, headers, config) {
        alert("Error here. Estado HTTP:"+status);
      });


    }).
    error(function(data, status, headers, config) {
      alert("NOP");
    });




    return false;
  }

  $scope.alerta = function(){
    $scope.data={};

    var myPopUp = $ionicPopup.show({
      template: '<table><tr><th WIDTH="78%">Plato</th><th WIDTH="20%">Precio</th></tr><tr ng-repeat="item in pedido"><td>{{item.NOMBRE}}</td><td>$ {{item.PRECIO}}</td></tr><tr><td>TOTAL: </td><td>$ {{precioTotal}}</td></tr></table>',
      title: 'PreFactura',
      subTitle: 'Revise bien su pedido',
      scope: $scope,

      buttons:[
        {text: 'Volver'},
        {
          text: '<b>Save</b>',
          type: 'button-positive',
          onTap: function(e){
            $scope.guardarPedido();
          }
        }
      ]
    });

    myPopUp.then(function(res){
      console.log('Presionado', res);
    });

  }


  $scope.addPlato = function(plato){
    $rootScope.pedido.push(plato);
    alert(JSON.stringify($rootScope.pedido));

    $rootScope.precioTotal += parseFloat(plato.PRECIO)*parseFloat(plato.CANT);
    var item = {
      "ID_DETALLE": plato.ID_PLATOS,
      "CANTIDAD": plato.CANT
    };

    $rootScope.detallePedido.push(item);
    //$rootScope.detallePedido.push(plato.ID_PLATOS);
    alert(JSON.stringify($rootScope.detallePedido));
  }

  $scope.removePlato = function(plato,i){
    $rootScope.pedido.splice(i,1);
    $rootScope.detallePedido.splice(i,1);
    alert(JSON.stringify($rootScope.pedido));

    $rootScope.precioTotal -= parseFloat(plato.PRECIO);
    alert("TOTAL: "+$rootScope.precioTotal);
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

    var datosCliente = JSON.stringify($scope.loginData);

    alert(datosCliente);

    $http({
      method: 'POST',
      url: 'http://192.168.1.4/demo/addCliente.php',
      data: datosCliente,
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},

    }).
    success(function(data, status, headers, config) {
      console.log("Dtos envio"+datosCliente);
      $rootScope.cliente.cedula = $scope.loginData.cedula;
      $rootScope.cliente.nombres = $scope.loginData.nombres;
      $rootScope.cliente.apellidos = $scope.loginData.apellidos;
      $rootScope.cliente.telefono = $scope.loginData.telefono;
      $rootScope.cliente.email = $scope.loginData.email;
    }).
    error(function(data, status, headers, config) {
      alert("NOP");
    });

    alert($rootScope.cliente.cedula);
  }

  // Open the login modal
  $scope.login = function() {
    $scope.modal.show();
  };

  $scope.loginCliente = function(){

    var myPopUp = $ionicPopup.show({
      template: '<form ng-submit="doLogin()">'+
      '<label class="item item-input">'+
      '<span class="input-label">E-mail</span>'+
      '<input type="email" ng-model="loginData.email" required>'+
      '</label>'+
      '<label class="item item-input">'+
      '<span class="input-label">Cedula</span>'+
      '<input type="number" ng-model="loginData.cedula" required>'+
      '</label>'+
      '<label class="item">'+
      //'<button class="button button-block button-balanced" type="submit">Ingresar</button>'+
      //'<button class="button button-block button-assertive">Volver</button>'+
      '</label>'+
      '</form>',
      title: 'Bienvenido !',
      subTitle: 'Por favor, ingrese sus datos',
      scope: $scope,

      buttons:[
        {text: 'Volver'},
        {
          text: '<b>Save</b>',
          type: 'button-positive',
          onTap: function(e){
            $scope.doLogin();
          }
        }
      ]
    });

    myPopUp.then(function(res){
      console.log('Presionado', res);
    });



  }


  // Perform the login action when the user submits the login form
  $scope.doLogin = function() {
    console.log('Doing login', $scope.loginData);

    alert($scope.loginData.email);

    $http({
      method: 'GET',
      url: "http://192.168.1.4/demo/loginCliente.php?email='"+$scope.loginData.email+"'&cedula='"+$scope.loginData.cedula+"'"
    }).success(function(data, status, headers, config) {
      //$rootScope.cliente = $data;
      if (parseFloat(JSON.stringify(data.length)) > 0){

        $scope.loginData = data;

        $rootScope.cliente.cedula = $scope.loginData[0].CEDULA;
        $rootScope.cliente.nombres = $scope.loginData[0].NOMBRES;
        $rootScope.cliente.apellidos = $scope.loginData[0].APELLIDOS;
        $rootScope.cliente.telefono = $scope.loginData[0].TELEFONO;
        $rootScope.cliente.email = $scope.loginData[0].EMAIL;

      }else{
        alert(JSON.stringify($scope.loginData.length));
      }

    }).error(function(data, status, headers, config) {
      alert("Error here. Estado HTTP:"+status);
    });

    alert("paso");

    // Simulate a login delay. Remove this and replace with your login
    // code if using a login system
    $timeout(function() {
      $scope.closeLogin();
    }, 1000);
  };
})


.controller('PlatosCartaCtrl', function($scope, $rootScope, $http, $stateParams, sesion) {
  $scope.platos=[];
  $http({
    method: 'GET',
    url: "http://192.168.1.4/demo/platosCarta.php?tipo='"+$stateParams.tipo+"'"
  }).success(function(data, status, headers, config) {
    $scope.platos=data;
  }).error(function(data, status, headers, config) {
    alert("Error here. Estado HTTP:"+status);
  });



})
