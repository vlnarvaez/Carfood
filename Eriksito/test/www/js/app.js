angular.module('starter', ['ionic', 'starter.controllers'])

.value("sesion", "Ingrese en el sistema")

.run(function($ionicPlatform, $rootScope) {

  $rootScope.sesion = "NO";
  $ionicPlatform.ready(function() {
    // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
    // for form inputs)
    if (window.cordova && window.cordova.plugins.Keyboard) {
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
      cordova.plugins.Keyboard.disableScroll(true);
    }
    if (window.StatusBar) {
      // org.apache.cordova.statusbar required
      StatusBar.styleDefault();
    }
  });




})

.config(function($stateProvider, $urlRouterProvider) {
  $stateProvider

  .state('app', {
    url: '/app',
    abstract: true,
    templateUrl: 'templates/menu.html',
    controller: 'AppCtrl'
  })

  .state('app.almuerzos', {
    url: '/almuerzos/:tipo',
    views: {
      'menuContent': {
        templateUrl: 'templates/almuerzos.html',
        controller: 'PlatosCartaCtrl'
      }
    }
  })

  .state('app.bebidas', {
    url: '/bebidas/:tipo',
    views: {
      'menuContent': {
        templateUrl: 'templates/bebidas.html',
        controller: 'PlatosCartaCtrl'
      }
    }
  })

  .state('app.desayunos', {
    url: '/desayunos/:tipo',
    views: {
      'menuContent': {
        templateUrl: 'templates/desayunos.html',
        controller: 'MenuesCtrl'
      }
    }
  })

  .state('app.meriendas', {
    url: '/meriendas/:tipo',
    views: {
      'menuContent': {
        templateUrl: 'templates/meriendas.html',
        controller: 'MenuesCtrl'
      }
    }
  })

  .state('app.platosCarta', {
    url: '/platosCarta/:tipo',
    views: {
      'menuContent': {
        templateUrl: 'templates/platosCarta.html',
        controller: 'PlatosCartaCtrl'
      }
    }
  })

  .state('app.postres', {
    url: '/postres/:tipo',
    views: {
      'menuContent': {
        templateUrl: 'templates/postres.html',
        controller: 'PlatosCartaCtrl'
      }
    }
  })

  .state('app.principal', {
    url: '/principal',
    views: {
      'menuContent': {
        templateUrl: 'templates/principal.html',
        controller: ''
      }
    }
  });
  // if none of the above states are matched, use this as the fallback
  $urlRouterProvider.otherwise('/app/principal');
});
