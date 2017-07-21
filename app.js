var app = angular.module("myApp",[]);

app.controller("usercontroller", function($scope,$http){
	$scope.btnName = "Insert";
	$scope.insertData = function(){ 

		if($scope.fName == null){
			sweetAlert("FirstName Require","Error","warning");
			return false;
		}

		if($scope.lName == null){
			sweetAlert("LastName Require","Error","warning");
			return false;
		}else{

			$http.post("insert.php",
			{ 'fName':$scope.fName, 'lName':$scope.lName, 'id':$scope.id,'btnName':$scope.btnName}
			).then(function(data){
			sweetAlert("Data Complete","Insert Complete Form","success");
			$scope.fName = null;
			$scope.lName = null;
			$scope.btnName = "Insert";
			$scope.displayData();
		});
		
		}
	}

	$scope.displayData = function(){
		$http.get("select.php").then(function(response){
			$scope.names = response.data.records;
		});
	}
	$scope.updateData = function(id,fname,lname){
		$scope.id = id;
		$scope.fName = fname;
		$scope.lName = lname;
		$scope.btnName = "Update";
	}
	$scope.deleteData = function(id){
		$scope.id = id;
		swal({
			title:"Are you sure?",
			text:"Comfirm  Delete Record!",
			type:"warning",
			showCancelButton:true,
			confirmButtonColor:"#DD6B55",
			confirmButtonText:"Yes, Delete it!",
			closeOnConfirm:false
		},
		function(){
			$http.post('delete.php',{'id':$scope.id}).then(function(data){
				swal("Deleted!", "You record has been deleted.", "success");
				$scope.displayData();
			});
		});
	}

});

