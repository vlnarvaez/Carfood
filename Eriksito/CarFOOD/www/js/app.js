

var app = angular.module('starter', ['ionic'])



.run(function($ionicPlatform) {
  $ionicPlatform.ready(function() {
    // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
    // for form inputs)
    if(window.cordova && window.cordova.plugins.Keyboard) {
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
    }
    if(window.StatusBar) {
      StatusBar.styleDefault();
    }
  });
})

var MainController = function($scope, $ionicSideMenuDelegate){
  $scope.toggleLeft = function () {
    $ionicSideMenuDelegate.toggleLeft()
  }
}
app.controller("MainCtrl", MainController)

var PlatosController = function($scope){
  $scope.platos=[
    {nombre: "Alitas picantes", precio: "2.50"},
    {nombre: "Hamburguesa Doble", precio: "3.00"}
  ]
}
app.controller("PlatosCtrl", PlatosController)

app.controller('BdCtrl', ['$scope','$http', function($scope, $http){

  $http({
    method: 'GET',
    url: "http://192.168.0.103/demo/persisirPlatos.php"
  }).success(function(data, status, headers, config) {
    $scope.platos=data;
  }).error(function(data, status, headers, config) {
    alert("Ha fallado la petición. Estado HTTP:"+status);
  });

}])


app.controller('GuardarPlatosCtrl',['$scope','$http', '$sce', function($scope, $http, $sce){

  $scope.guardarPlato = function() {
    var FormData = {
      'nombre' : $scope.plato.nuevoNombre,
      'precio' : $scope.plato.nuevoPrecio
    };
    FormData = JSON.stringify(FormData);

    $http({
      method: 'POST',
      url: 'http://192.168.0.103/demo/guardarPlatos.php',
      data: FormData,
      headers: {'Content-Type': 'application/x-www-form-urlencoded'},

    }).
    success(function(data, status, headrs, config) {
    }).
    error(function(data, status, headrs, config) {
    });
    return false;
  };


}])
