<!DOCTYPE html>
<html>
<head>
	  <title>Product</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 

   <link href="https://fonts.googleapis.com/css?family=Cormorant+Unicase" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Cormorant+Unicase|Eater" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Anton|Cormorant+Unicase" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="style.css">

  
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Admin</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="admin.php">Home</a></li>
        <li><a href="Users.php">Users</a></li>
        <li class="active"><a href="Product.php">Products</a></li>
        <li><a href="manager.php">Manager</a></li>
        <li><a href="Salesperson.php">Salesperson</a></li>
        <li><a href="index.php">Customer</a></li>
        <li><a href="table1.php">Order</a></li>
        <li><a href="about.php">About Us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>


	<div class="container">
		
		<div class="d-flex justify-content-end">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" >Add Product</button>	
		</div>

				<h2 class="text-danger"> Products</h2>

				<div id="Records_contant">  
				</div>


<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Product Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        	<div class="form-group">
        		<!-- <label> ID:</label>
        		<input type="text" name="" id="pcode" class="form-control"> -->

        		<label>Product name</label>
        		<input type="text" name="" id="pname" class="form-control">

        		<label>Brand:</label>
        		<input type="text" name="" id="brand" class="form-control">

        		<label> Type:</label>
        		<input type="text" name="" id="ptype" class="form-control">

        		<label> Shade:</label>
        		<input type="text" name="" id="shade" class="form-control">

            <label> Size:</label>
            <input type="text" name="" id="psize" class="form-control">

            <label> Selling Price:</label>
            <input type="text" name="" id="sellingprice" class="form-control">            



        		
        	</div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      	<button type="button" class="btn btn-danger" data-dismiss="modal" onclick="addRecord()">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>




<div class="modal fade" id="update_user_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Update Product</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-group">
            
            <!-- <label> ID:</label>
            <input type="text" name="" id="update_pcode" class="form-control"> -->

            <label>Product name</label>
            <input type="text" name="" id="update_pname" class="form-control">

            <label>Brand:</label>
            <input type="text" name="" id="update_brand" class="form-control">

            <label> Type:</label>
            <input type="text" name="" id="update_ptype" class="form-control">

            <label> Shade:</label>
            <input type="text" name="" id="update_shade" class="form-control">

            <label> Size:</label>
            <input type="text" name="" id="update_psize" class="form-control">

            <label> Selling Price:</label>
            <input type="text" name="" id="update_sellingprice" class="form-control">  
       

      </div>
    </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="UpdateUserDetails()">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <input type="hidden" id="hidden_user_id">
      </div>
       
      

    </div>
  </div>
</div>
</div>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

  <script>
$(document).ready(function () {
    readRecords(); 
  });
    
  	function readRecords(){
  		var readrecord = "readrecord";
  		$.ajax({
  			url:"ProductBackend.php",
  			type:"post",
  			data:{ readrecord:readrecord},
  			success:function(data, status){
  				$('#Records_contant').html(data);
  			},
  		});

  	}
  	function addRecord(){
  		//var pcode = $('#pcode').val();
  		var pname = $('#pname').val();
  		var brand = $('#brand').val();
  		var ptype = $('#ptype').val();
  		var shade = $('#shade').val();
      var psize = $('#psize').val();
      var sellingprice = $('#sellingprice').val();

  		$.ajax({
  			url:"ProductBackend.php",
  			type:"post",
  			data:{
          //pcode : pcode,
  				pname : pname,
          brand : brand,
  				ptype : ptype,
  				shade : shade,
          psize : psize,
          sellingprice : sellingprice

  			},
  			success:function(data,status){
          //$('#pcode').val("");
          $('#pname').val("");
          $('#brand').val("");
          $('#ptype').val("");
          $('#shade').val("");
          $('#psize').val("");
          $('#sellingprice').val("");
  				readRecords("");
  			}

  		});
  	}

function DeleteUser(deleteid){

  var conf = confirm("Are you sure?");
  if(conf == true) {
  $.ajax({
    url:"ProductBackend.php",
    type:"post",
    data: {  deleteid : deleteid},

    success:function(data, status){
      readRecords();
    }
  });
  }
}


    function GetUserDetails(userid){
   $("#hidden_user_id").val(userid);
   
    $.post("ProductBackend.php", {
            userid: userid
        },
        function (data, status) {
          
            var user = JSON.parse(data);

            //$("#update_pcode").val(user.pcode);
            $("#update_pname").val(user.pname);
            $("#update_brand").val(user.brand);
            $("#update_ptype").val(user.ptype);
            $("#update_shade").val(user.shade);
            $("#update_psize").val(user.psize);
            $("#update_sellingprice").val(user.sellingprice);
            
        }
    );
    jQuery.noConflict(); 
    $('#update_user_modal').modal('show');
}


function UpdateUserDetails() {
    //var pcode = $('#update_pcode').val();
    var pname = $('#update_pname').val();
    var brand = $('#update_brand').val();
    var ptype = $('#update_ptype').val();
    var shade = $('#update_shade').val();
    var psize = $('#update_psize').val();
    var sellingprice = $('#update_sellingprice').val();
   var hidden_user_id = $('#hidden_user_id').val();
    $.post("ProductBackend.php", {
            hidden_user_id: hidden_user_id,
            //pcode: pcode,
            pname: pname,
            brand: brand,
            ptype: ptype,
            shade: shade,
            psize: psize,
            sellingprice: sellingprice
        },
        function (data, status) {
          //alert(data);
            $("#update_user_modal").modal("hide");
            readRecords();
        }
    );
}

  </script>

</body>
</html>