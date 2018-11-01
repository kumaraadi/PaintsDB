<!DOCTYPE html>
<html>
<head>
	
	
  <title>Customer</title>
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
        <li><a href="manager.php">Manager</a></li>
        <li><a href="Salesperson.php">Salesperson</a></li>
        <li class="active"><a href="index.php">Customer</a></li>
        <li><a href="about.php">About Us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>



	<div class="container">
		<!--<h1 class="text-center text-uppercase display-4 font-weight-bold" style="background-color: #74B3CE; color: white; font-family: 'Cormorant Unicase', serif;">Customer Data Base</h1> -->
		
		<div class="d-flex justify-content-end">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" >Create</button>	
		</div>

				<h2 class="text-danger"> All Records </h2>

				<div id="Records_contant">  
				</div>


<div class="modal fade" id="myModal">
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
        		<input type="text" name="" id="cid" class="form-control" placeholder="Customer ID">

        		<label> Shop Name:</label>
        		<input type="text" name="" id="shopname" class="form-control" placeholder="Shop Name">

        		<label> Customer Name:</label>
        		<input type="text" name="" id="custname" class="form-control" placeholder="Customer Name">

        		<label> Contact No:</label>
        		<input type="text" name="" id="contactno" class="form-control" placeholder="Contact Number">

        		<label> Address:</label>
        		<input type="text" name="" id="address" class="form-control" placeholder="Address">

        		<label> Area:</label>
        		<input type="text" name="" id="area" class="form-control" placeholder="Area">

        		<label> City:</label>
        		<input type="text" name="" id="city" class="form-control" placeholder="City">

        		
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
  			url:"backend.php",
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
  			url:"backend.php",
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
    url:"backend.php",
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
   
    $.post("backend.php", {
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
    $.post("backend.php", {
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