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
  <a class="navbar-brand" href="#">Manager</a>
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
        <a class="nav-link" href="Salesperson.php">Sales Person</a>
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
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" >Add Salesperson</button>	
		</div>

				<h2 class="text-danger"> All Sales Persons </h2>

				<div id="Records_contant">  
				</div>


<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Sales Person info</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        	<div class="form-group">
        		<label> User ID:</label>
        		<input type="text" name="" id="userid" class="form-control">

        		<label> Name:</label>
        		<input type="text" name="" id="name" class="form-control">

        		<label> Contact:</label>
        		<input type="text" name="" id="contactno" class="form-control" >

        		<label> Email:</label>
        		<input type="text" name="" id="Email" class="form-control" >

        		<label> User ID of Manager:</label>
        		<input type="text" name="" id="mid" class="form-control">

        		<label> Password:</label>
        		<input type="text" name="" id="area" class="form-control" >


        		
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
            <label>  User ID:</label>
            <input type="text" name="userid" id="update_userid" class="form-control" >
          </div>

            <div class="form-group">
            <label> Name:</label>
            <input type="text" name="name" id="update_name" class="form-control">
            </div>

            <div class="form-group">
            <label> Contact:</label>
            <input type="text" name="contactno" id="update_contactno" class="form-control">
            </div>

            <div class="form-group">
            <label> Email:</label>
            <input type="text" name="email" id="update_email" class="form-control">
            </div>

            <div class="form-group">
            <label> Manager ID:</label>
            <input type="text" name="mid" id="update_mid" class="form-control">
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
  		var userid = $('#userid').val();
  		var name = $('#name').val();
  		var contactno = $('#contactno').val();
  		var email = $('#email').val();
  		var mid = $('#mid').val();
  		var password = $('#password').val();

  		$.ajax({
  			url:"managerbackend.php",
  			type:"post",
  			data:{userid : userid,
  				name : name,
  				contactno : contactno,
  				email : email,
  				mid : mid,
  				password : password

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
    url:"managerbackend.php",
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
   
    $.post("managerbackend.php", {
            userid: userid
        },
        function (data, status) {
            alert(data);
      
            var user = JSON.parse(data);
           

            $("#update_userid").val(user.userid);
            $("#update_name").val(user.name);
            $("#update_contactno").val(user.contactno);
            $("#update_email").val(user.email);
            $("#update_mid").val(user.mid);
            
            
        }
    );
    $("#update_user_modal").modal("show");
}


function UpdateUserDetails() {
    var userid = $('#update_userid').val();
    var name = $('#update_name').val();
    var contactno = $('#update_contactno').val();
    var email = $('#update_email').val();
    var mid = $('#update_mid').val();
    

   var hidden_user_id = $('#hidden_user_id').val();
    $.post("managerbackend.php", {
            hidden_user_id: hidden_user_id,
            userid: userid,
            name: name,
            contactno: contactno,
            email: email,
            mid: mid
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