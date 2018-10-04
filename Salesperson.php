<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

   <link href="https://fonts.googleapis.com/css?family=Cormorant+Unicase" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Cormorant+Unicase|Eater" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Anton|Cormorant+Unicase" rel="stylesheet">

  
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Salesperson</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="admin.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Customer</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Product</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About Us</a>
      </li>

      
  <!--    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> 
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>  -->
    </ul>
    <li class="nav-item">
        <a class="nav-link" href="login.php">Logout</a>
      </li>
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
        		<label> ID:</label>
        		<input type="text" name="" id="pcode" class="form-control">

        		<label>:</label>
        		<input type="text" name="" id="brand" class="form-control">

        		<label>Type:</label>
        		<input type="text" name="" id="type" class="form-control">

        		<label> Shade:</label>
        		<input type="text" name="" id="type" class="form-control">

        		<label> Size:</label>
        		<input type="text" name="" id="size" class="form-control">

        		<label> Sales Price:</label>
        		<input type="text" name="" id="salesprice" class="form-control">


        		
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
        <h4 class="modal-title">Customer Data Base</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <div class="form-group">
            <label> ID:</label>
            <input type="text" name="cid" id="update_cid" class="form-control" >
          </div>

            <div class="form-group">
            <label> Shop Name:</label>
            <input type="text" name="shopname" id="update_shopname" class="form-control">
            </div>

            <div class="form-group">
            <label> Customer Name:</label>
            <input type="text" name="custname" id="update_custname" class="form-control">
            </div>

            <div class="form-group">
            <label> Contact No:</label>
            <input type="text" name="contactno" id="update_contactno" class="form-control">
            </div>

            <div class="form-group">
            <label> Address:</label>
            <input type="text" name="address" id="update_address" class="form-control">
            </div>

            <div class="form-group">
            <label> Area:</label>
            <input type="text" name="area" id="update_area" class="form-control">
            </div>

            <div class="form-group">
            <label> City:</label>
            <input type="text" name="city" id="update_city" class="form-control">           
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
  			url:"salespersonbackend.php",
  			type:"post",
  			data:{ readrecord:readrecord},
  			success:function(data, status){
  				$('#Records_contant').html(data);
  			},
  		});

  	}
  	function addRecord(){
  		var cid = $('#cid').val();
  		var shopname = $('#shopname').val();
  		var custname = $('#custname').val();
  		var contactno = $('#contactno').val();
  		var address = $('#address').val();
  		var area = $('#area').val();
  		var city = $('#city').val();

  		$.ajax({
  			url:"salespersonbackend.php",
  			type:"post",
  			data:{cid : cid,
  				shopname : shopname,
  				custname : custname,
  				contactno : contactno,
  				address : address,
  				area : area,
  				city : city

  			},
  			success:function(data,status){
  				readRecords();
  			}

  		});
  	}

function DeleteUser(deleteid){

  var conf = confirm("Are you sure?");
  if(conf == true) {
  $.ajax({
    url:"salespersonbackend.php",
    type:"post",
    data: {  deleteid : deleteid},

    success:function(data, status){
      readRecords();
    }
  });
  }
}


    function GetUserDetails(cid){
   $("#hidden_user_id").val(cid);
   
    $.post("salespersonbackend.php", {
            cid: cid
        },
        function (data, status) {
            alert(data);
      
            var user = JSON.parse(data);
           

            $("#update_cid").val(user.cid);
            $("#update_shopname").val(user.shopname);
            $("#update_custname").val(user.custname);
            $("#update_contactno").val(user.contactno);
            $("#update_address").val(user.address);
            $("#update_area").val(user.area);
            $("#update_city").val(user.city);
            
        }
    );
    $("#update_user_modal").modal("show");
}


function UpdateUserDetails() {
    var cid = $('#update_cid').val();
    var shopname = $('#update_shopname').val();
    var custname = $('#update_custname').val();
    var contactno = $('#update_contactno').val();
    var address = $('#update_address').val();
    var area = $('#update_area').val();
    var city = $('#update_city').val();

   var hidden_user_id = $('#hidden_user_id').val();
    $.post("salespersonbackend.php", {
            hidden_user_id: hidden_user_id,
            cid: cid,
            shopname: shopname,
            custname: custname,
            contactno: contactno,
            address: address,
            area: area,
            city: city
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