<!DOCTYPE html>
<html>
<head>
  <title>Manager</title>
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
        <li><a href="Product.php">Products</a></li>
        <li class="active"><a href="manager.php">Manager</a></li>
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
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" >Add Manager</button>	
		</div>

				<h2 class="text-danger"> Managers </h2>

				<div id="Records_contant">  
				</div>


<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Manager Info</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        	<div class="form-group">
        		
        		<label> Name:</label>
        		<input type="text" name="" id="mname" class="form-control">

        		<label> Contact:</label>
        		<input type="number" name="" id="contactno" class="form-control" >

        		<label> Email:</label>
        		<input type="text" name="" id="email" class="form-control" >

        		<label> Address:</label>
        		<input type="text" name="" id="address" class="form-control" >


        		
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
        <h4 class="modal-title">Update Manager Info</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
            <div class="form-group">
            <label> ID:</label>
            <input type="text" name="mid" id="update_mid" class="form-control" >
          </div>

            <div class="form-group">
            <label> Name:</label>
            <input type="text" name="name" id="update_name" class="form-control">
            </div>

            <div class="form-group">
            <label> Contact:</label>
            <input type="number" name="contactno" id="update_contactno" class="form-control">
            </div>

            <div class="form-group">
            <label> Email:</label>
            <input type="text" name="email" id="update_email" class="form-control">
            </div>

            <div class="form-group">
            <label> Address:</label>
            <input type="text" name="address" id="update_address" class="form-control">
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
  			url:"managerbackend.php",
  			type:"post",
  			data:{ readrecord:readrecord},
  			success:function(data, status){
  				$('#Records_contant').html(data);
  			},
  		});

  	}
  	function addRecord(){
  		//var mid = $('#mid').val();
  		var mname = $('#mname').val();
  		var contactno = $('#contactno').val();
  		var email = $('#email').val();
  		var address = $('#address').val();

  		$.ajax({
  			url:"managerbackend.php",
  			type:"post",
  			data:{
  				mname : mname,
  				contactno : contactno,
  				email : email,
  				address : address
  			},
  			success:function(data,status){
         $('#mname').val('');
         $('#contactno').val('');
         $('#email').val('');
         $('#address').val('');
  				readRecords();
  			}

  		});
  	}

function DeleteUser(deleteid){

  var conf = confirm("Are you sure?");
  if(conf == true) {
  $.ajax({
    url:"managerbackend.php",
    type:"post",
    data: {  deleteid : deleteid},

    success:function(data, status){
      readRecords();
    }
  });
  }
}


    function GetUserDetails(mid){
   $("#hidden_user_id").val(mid);
   
    $.post("managerbackend.php", {
            mid: mid
        },
        function (data, status) {
            var user = JSON.parse(data);

            $("#update_mid").val(user.mid);
            $("#update_name").val(user.mname);
            $("#update_contactno").val(user.contactno);
            $("#update_email").val(user.email);
            $("#update_address").val(user.address);
            
            
        }
    );

        jQuery.noConflict(); 
    $("#update_user_modal").modal("show");
}


function UpdateUserDetails() {
    var mid = $('#update_mid').val();
    var mname = $('#update_name').val();
    var contactno = $('#update_contactno').val();
    var email = $('#update_email').val();
    var address = $('#update_address').val();
    

   var hidden_user_id = $('#hidden_user_id').val();
    $.post("managerbackend.php", {
            hidden_user_id: hidden_user_id,
            mname: mname,
            contactno: contactno,
            email: email,
            address: address
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