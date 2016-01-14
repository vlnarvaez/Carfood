angular.module('starter.controllers', [])

.controller('AppCtrl', function($scope, $rootScope, $ionicModal, $timeout, $ionicPopup, $http, $sce, $window) {

  $rootScope.pedido = [];
  $rootScope.detallePedido = [];
  $rootScope.precioTotal = 0;
  $rootScope.idMesa = 1;
  $rootScope.cliente = {};
  $scope.loginData = {};
  $rootScope.sesion = "NO";

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
      'observaciones' : "Pedido Cliente"
    };

    datos = JSON.stringify(datos);

    var datosDetalle = $rootScope.detallePedido;

    datosDetalle = JSON.stringify(datosDetalle);

    $http({
      method: 'POST',
      url: 'http://10.42.0.1/demo/addPedido.php',
      data: datos,
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},

    }).
    success(function(data, status, headers, config) {

      $http({
        method: 'GET',
        url: "http://10.42.0.1/demo/getIdPedido.php?cedula='1103460026'&total='"+$rootScope.precioTotal+"''"
      }).success(function(data, status, headers, config) {
        $scope.UltimoID = data[0].ID;
        console.log("Ultimo Pedido: "+JSON.stringify(data[0].ID));

        $http({
          method: 'POST',
          url: 'http://10.42.0.1/demo/addDetallePedido.php',
          data: datosDetalle,
          headers: {'Content-Type': 'application/x-www-form-urlencoded'},

        }).
        success(function(data, status, headers, config) {
          console.log("Datos detallePedido : "+datosDetalle);
          //$window.location.reload();

          $scope.logout();


        }).
        error(function(data, status, headers, config) {
          console.log("NOP");
        });


      }).error(function(data, status, headers, config) {
        console.log("Error here. Estado HTTP:"+status);
      });


    }).
    error(function(data, status, headers, config) {
      console.log("NOP");
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
          text: '<b>Enviar</b>',
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
    console.log(JSON.stringify($rootScope.pedido));

    $rootScope.precioTotal += parseFloat(plato.PRECIO)*parseFloat(plato.CANT);
    var item = {
      "ID_DETALLE": plato.ID_PLATO,
      "CANTIDAD": plato.CANT
    };

    $rootScope.detallePedido.push(item);
    //$rootScope.detallePedido.push(plato.ID_PLATO);
    console.log(" DETALLE DE PEDIDO : "+JSON.stringify($rootScope.detallePedido));
  }

  $scope.removePlato = function(plato,i){
    $rootScope.pedido.splice(i,1);
    $rootScope.detallePedido.splice(i,1);
    console.log(JSON.stringify($rootScope.pedido));


    $rootScope.precioTotal -= parseFloat(plato.PRECIO)*parseFloat(plato.CANT);
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

    console.log(datosCliente);

    $http({
      method: 'POST',
      url: 'http://10.42.0.1/demo/addCliente.php',
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
      $rootScope.sesion = "YES";
      $scope.modal.hide();

    }).
    error(function(data, status, headers, config) {
      console.log("NOP");
    });

    console.log($rootScope.cliente.cedula);
  }

  // Open the login modal
  $scope.login = function() {
    $scope.modal.show();
  };

  $scope.loginCliente = function(){

    var myPopUp = $ionicPopup.show({
      template: '<form ng-submit="doLogin()">'+
      '<label class="item item-input">'+
      '<span class="input-label">E-mail:</span>'+
      '<input type="email" ng-model="loginData.email" required>'+
      '</label>'+
      '<label class="item item-input">'+
      '<span class="input-label">Cedula:</span>'+
      '<input type="number" ng-model="loginData.cedula" required>'+
      '</label>'+
      //'<button class="button button-block button-balanced" type="submit">Ingresar</button>'+
      //'<button class="button button-block button-assertive">Volver</button>'+
      '</form>',
      title: 'Bienvenido !',
      subTitle: 'Por favor, ingrese sus datos',
      scope: $scope,

      buttons:[
        {text: 'Cancelar'},
        {
          text: '<b>Ingresar</b>',
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


  $scope.logout = function(){

    var myPopUp = $ionicPopup.show({
      template: '',
      title: 'Hasta pronto !',
      subTitle: '',
      scope: $scope,

      buttons:[

      ]
    });

    myPopUp.then(function(res){
      console.log('Presionado', res);
    });

    $timeout(function() {
      myPopUp.close(); //close the popup after 3 seconds for some reason
    }, 1000);
    $rootScope.cliente.cedula = "";
    $rootScope.cliente.nombres = "";
    $rootScope.cliente.apellidos = "";
    $rootScope.cliente.telefono = "";
    $rootScope.cliente.email = "";
    $rootScope.sesion = "NO";

  }


  // Perform the login action when the user submits the login form
  $scope.doLogin = function() {
    console.log('Doing login', $scope.loginData);

    console.log($scope.loginData.email);

    $http({
      method: 'GET',
      url: "http://10.42.0.1/demo/loginCliente.php?email='"+$scope.loginData.email+"'&cedula='"+$scope.loginData.cedula+"'"
    }).success(function(data, status, headers, config) {
      //$rootScope.cliente = $data;
      if (parseFloat(JSON.stringify(data.length)) > 0){

        $scope.loginData = data;

        $rootScope.cliente.cedula = $scope.loginData[0].CEDULA;
        $rootScope.cliente.nombres = $scope.loginData[0].NOMBRES;
        $rootScope.cliente.apellidos = $scope.loginData[0].APELLIDOS;
        $rootScope.cliente.telefono = $scope.loginData[0].TELEFONO;
        $rootScope.cliente.email = $scope.loginData[0].EMAIL;
        $rootScope.sesion = "YES";


        var myPopUp = $ionicPopup.show({
          template: '',
          title: 'Bienvenido !',
          subTitle: '',
          scope: $scope,

          buttons:[

          ]
        });

        myPopUp.then(function(res){
          console.log('Presionado 2', res);
        });

        $timeout(function() {
          myPopUp.close(); //close the popup after 3 seconds for some reason
        }, 1000);





      }else{
        console.log(JSON.stringify($scope.loginData.length));
      }

    }).error(function(data, status, headers, config) {
      console.log("Error here. Estado HTTP:"+status);
    });

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
    url: "http://10.42.0.1/demo/platosCarta.php?tipo='"+$stateParams.tipo+"'"
  }).success(function(data, status, headers, config) {
    $scope.platos=data;
  }).error(function(data, status, headers, config) {
    console.log("Error here. Estado HTTP:"+status);
  });

  $scope.masUno = function(index){
    $scope.platos[index].CANT += 1;
  }
  $scope.menosUno = function(index){
    if ($scope.platos[index].CANT > 1){
      $scope.platos[index].CANT -= 1;
    }
  }



})
