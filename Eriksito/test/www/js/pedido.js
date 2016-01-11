'use strict';

var shop = angular.module('ng-Shop', []);

shop.factory('$shop', ['$rootScope', function ($rootScope)
{

	$rootScope.udpShopContent = [],
	$rootScope.udpShopTotalPrice = 0,
	$rootScope.udpShopTotalProducts = 0;

	return{
		minimRequeriments: function(product)
		{
			if(!product.qty || !product.price || !product.id)
			{
				throw new Error("Los campos qty, price y id son necesarios");
			}
			if(isNaN(product.qty) || isNaN(product.price) || isNaN(product.id))
			{
				throw new Error("Los campos qty, price y id deben ser númericos");
			}
			if(product.qty <= 0)
			{
				throw new Error("La cantidad añadida debe ser mayor de 0");
			}
			if(this.isInteger(product.qty) === false)
			{
				throw new Error("La cantidad del producto debe ser un número entero");
			}
		},

		isInteger: function(n)
		{
		    if(n % 1 === 0)
		    	return true;
		    else
		    	return false;
		},

		add: function(producto)
		{
			try{
				//comprobamos si el producto cumple los requisitos
				this.minimRequeriments(producto);

				//si el producto existe le actualizamos la cantidad
				if(this.checkExistsProduct(producto,$rootScope.udpShopContent) === true)
				{
					$rootScope.udpShopTotalPrice += parseFloat(producto.price * producto.qty,10);
					$rootScope.udpShopTotalProducts += producto.qty;
					return {"msg":"updated"};
				}
				//en otro caso, lo añadimos al carrito
				else
				{
					$rootScope.udpShopTotalPrice += parseFloat(producto.price * producto.qty,10);
					$rootScope.udpShopTotalProducts += producto.qty;
					$rootScope.udpShopContent.push(producto);
					return {"msg":"insert"};
				}
			}
			catch(error)
			{
				alert("Error " + error);
			}
		},

		checkExistsProduct: function(product, products)
		{
		    var i, len;
		    for (i = 0, len = products.length; i < len; i++)
		    {
		        if (products[i].id === product.id)
		        {
		        	products[i].qty += product.qty;
		            return true;
		        }
		    }
		    return false;
		},

		remove: function(id)
		{
			try{
				var i, len;
				for (i = 0, len = $rootScope.udpShopContent.length; i < len; i++)
			    {
			        if ($rootScope.udpShopContent[i].id === id)
			        {
			        	$rootScope.udpShopTotalPrice -= parseFloat($rootScope.udpShopContent[i].price * $rootScope.udpShopContent[i].qty,10);
			        	$rootScope.udpShopTotalProducts -= $rootScope.udpShopContent[i].qty;
			        	$rootScope.udpShopContent.splice(i, 1);
			        	if(isNaN($rootScope.udpShopTotalPrice))
			        	{
			        		$rootScope.udpShopTotalPrice = 0;
			        	}
			        	return {"msg":"deleted"};
			        }
			    }
			}
			catch(error)
			{
				alert("Error " + error);
			}
		},

		destroy: function()
		{
			try{
				$rootScope.udpShopContent = [];
				$rootScope.udpShopTotalPrice = 0;
				$rootScope.udpShopTotalProducts = 0;
			}
			catch(error)
			{
				alert("Error " + error);
			}
		},


	};
}]);
