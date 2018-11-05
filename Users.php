<!DOCTYPE html>
<html>
<head>
	  <title>Users</title>
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
        <li class="active"><a href="Users.php">Users</a></li>
        <li><a href="Product.php">Products</a></li>
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
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" >Add User</button>	
		</div>

				<h2 class="text-danger"> Users</h2>

				<div id="Records_contant">  
				</div>


<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">User Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        	<div class="form-group">

        		<label>Password</label>
        		<input type="text" name="" id="passwd" class="form-control">

        		<label>User Type:</label>
        		<select class="form-control" id="select1" onchange="selectType(this.value)">
                <option disabled="" selected="" value="">Select</option>
                <option value="admin">Admin</option> 
                <option value="manager">Manager</option>
                <option value="salesperson">Salesperson</option>
                         
            </select>

        		<label> Active:</label>
        		<select class="form-control" id="select2" onchange="selectActive(this.value)">
                <option disabled="" selected="" value="">Select</option>
                <option value="Yes">Yes</option> 
                <option value="No">No</option>
                         
            </select>

        		
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
        <h4 class="modal-title">Update User</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-group">
            <label>User ID:</label>
            <input type="text" name="userid" id="update_userid" class="form-control" readonly="">
          

            
            <label> Password:</label>
            <input type="text" name="name" id="update_passwd" class="form-control">
           


            <label> user Type:</label>
            <select class="form-control" id="select1" onchange="selectType(this.value)">
                <option disabled="" selected="" value="">Select</option>
               <option disabled="" selected="" value="">Select</option>
                <option value="admin">Admin</option> 
                <option value="manager">Manager</option>
                <option value="salesperson">Salesperson</option>
                         
            </select>
          

            <label> Active:</label>
            <select class="form-control" id="select2" onchange="selectActive(this.value)">
                <option disabled="" selected="" value="">Select</option>
                <option value="Yes">Yes</option> 
                <option value="No">No</option>
                         
            </select>
       

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
    
var s_type="";
var s_active="";

$(document).ready(function () {
    readRecords(); 
  });
    
  	function readRecords(){
  		var readrecord = "readrecord";
  		$.ajax({
  			url:"UsersBackend.php",
  			type:"post",
  			data:{ readrecord:readrecord},
  			success:function(data, status){
  				$('#Records_contant').html(data);
  			},
  		});

  	}
  	function addRecord(){
  		
  		var passwd = $('#passwd').val();
  		

  		$.ajax({
  			url:"UsersBackend.php",
  			type:"post",
  			data:{
          password: passwd,
          userRole: s_type,
          active: s_active

  			},
  			success:function(data,status){
          $('#passwd').val("");
  				readRecords("");
  			}

  		});
  	}

function DeleteUser(deleteid){

  var conf = confirm("Are you sure?");
  if(conf == true) {
  $.ajax({
    url:"UsersBackend.php",
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
   
    $.post("UsersBackend.php", {
            userid: userid
        },
        function (data, status) {
            var user = JSON.parse(data);

            $("#update_userid").val(user.userid);
            $("#update_passwd").val(user.password);
            // var role = user.userRole;
            // var act = user.active;
            // if(role.equals("admin")){
            //   alert("admin");
            //   setSelectedIndex(document.getElementById("select1"),0);
            // }else if(role.equals("Salesperson")){
            //   setSelectedIndex(document.getElementById("select1"),1);
            //   alert("sales");
            // }
            // else{
            //   setSelectedIndex(document.getElementById("select1"),2);
            //   alert("Manager")
            // }
        }
    );
    jQuery.noConflict(); 
    $('#update_user_modal').modal('show');
}


function UpdateUserDetails() {
    
    var passwd = $('#update_passwd').val();
    if(passwd=='' || s_type==''|| s_active==''){
      alert("Incomplete data, try again!");
    }
    else
  {
    
   var hidden_user_id = $('#hidden_user_id').val();
    $.post("UsersBackend.php", {
            hidden_user_id: hidden_user_id,
            password:passwd,
            userRole:s_type,
            active:s_active
        },
        function (data, status) {
          $('#update_userid').val("");
          $('#update_passwd').val("");
            $("#update_user_modal").modal("hide");
            s_active = "";
            s_type = "";
            readRecords();
        }
    );
  }
}

function selectType(value){
  s_type = value;
}
function selectActive(value){
  s_active = value;
}

  </script>

</body>
</html>