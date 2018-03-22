	<head>
        <meta charset="utf-8">
        <meta name="robots" content="noindex">
        <title>Angularjs Login Script using PHP MySQL and Bootstrap</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!--		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.16/af-2.2.2/b-1.4.2/datatables.min.css"/>-->
		
        <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>		
<!--		<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/af-2.2.2/b-1.4.2/datatables.min.js"></script>-->
		<script src="//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-2.0.2.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/dirPagination.js"></script>
		
    </head>
    <body ng-app="Supplier" ng-controller="SupplierController as supCtrl">
        <div class="container" ng-init="getSupplier()">
			<div class="form-group col-md-8">
				<label for="exampleFormControlSelect2">Select supplier</label>
				<select class="form-control" id="exampleFormControlSelect2" ng-model="data" ng-options="v as v.supplier_name for v in selectVals" ng-change="getVal()">
				</select>
			</div>
			<div class="form-group col-md-4">
				<button class="btn btn-primary btn-lg" data-title="Show All" ng-click="showAllSupplier()">Show all supplier</button>
			</div>
        </div>
		<div class="container">
			<table class="table" id="suplier_table">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Supplier Code</th>
						<th scope="col">Supplier Name</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<tr dir-paginate="sup in sups|filter:search|itemsPerPage:15">
						<th scope="row">{{ sup.auto_id }}</th>
						<td>{{ sup.supplier_code }}</td>
						<td>{{ sup.supplier_name }}</td>
						<td>
							<button class="btn btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button>
							<button class="btn btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button>
						</td>
					</tr>
				</tbody>
			</table>
			<dir-pagination-controls max-size="5" direction-links="true" boundary-links="true" ></dir-pagination-controls>
		</div>
    </body>
<script type="text/javascript">
	angular.module('Supplier', ['angularUtils.directives.dirPagination']).controller('SupplierController', ['$scope', '$http', function($scope, $http){
		$scope.getSupplier = function(){
			var host = '<?php echo base_url(); ?>';
			$http({
				method: 'POST',
				url: host+'Supplier/getSupplier',
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			}).success(function(data) {
				if(data.length != 0){
					$scope.selectVals = data;
				}
			});
		};

		$scope.getVal = function(){
			//alert($scope.data.supplier_code);
			var host = '<?php echo base_url(); ?>';
			var code = $scope.data.supplier_code;
			var user_data='sup_code=' +code;
			$http({
				method: 'POST',
				url: host+'Supplier/getSupplierDetails',
				data: user_data,
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			}).success(function(data) {
				//console.log(data);
				if(data.length != 0){
					//var tableID = document.querySelector('.table').id;
					//alert(tableID);
					//$('#'+tableID).DataTable();
					$scope.sups = data;
				}
			});
		};

		$scope.showAllSupplier = function(){
			//angular.element('.modal').fadeIn('slow');
			var host = '<?php echo base_url(); ?>';
			$http({
				method: 'POST',
				url: host+'Supplier/getSupplier',
				headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			}).success(function(data) {
				//console.log(data);
				if(data.length != 0){
					//var tableID = document.querySelector('.table').id;
					//alert(tableID);
					//$('#'+tableID).DataTable();
					$scope.sups = data;
				}
			});
		};
	}]);
</script>