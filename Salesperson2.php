<!DOCTYPE html>
<html>
<head>
	  <title>Salesperson</title>
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
      <a class="navbar-brand" href="#">Salesperson</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="Salesperson2.php">Home</a></li>
        
        <li class="active"><a href="Salesperson2.php">Salesperson</a></li>
        <li><a href="table.php">Order</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>


	<div class="container">
		
		<div class="d-flex justify-content-end">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" >Add Salesperson</button>	
		</div>

				<h2 class="text-danger"> Salespersons</h2>

				<div id="Records_contant">  
				</div>


<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Salesperson Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        	<div class="form-group">
        		<label> ID:</label>
        		<input type="text" name="" id="userid" class="form-control">

        		<label>Name</label>
        		<input type="text" name="" id="sname" class="form-control">

        		<label>Contact no:</label>
        		<input type="text" name="" id="contactno" class="form-control">

        		<label> email:</label>
        		<input type="text" name="" id="email" class="form-control">

        		<label> Manager ID:</label>
        		<input type="text" name="" id="mid" class="form-control">



        		
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
        <h4 class="modal-title">Update Salesperson</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-group">
            <label> ID:</label>
            <input type="text" name="userid" id="update_userid" class="form-control" >
          

            
            <label> Name:</label>
            <input type="text" name="name" id="update_name" class="form-control">
           


            <label> Contact No:</label>
            <input type="text" name="contactno" id="update_contactno" class="form-control" >
          

            <label> Email:</label>
            <input type="text" name="email" id="update_email" class="form-control">
       

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
  		var userid = $('#userid').val();
  		var sname = $('#sname').val();
  		var contactno = $('#contactno').val();
  		var email = $('#email').val();
  		var mid = $('#mid').val();

  		$.ajax({
  			url:"salespersonbackend.php",
  			type:"post",
  			data:{
          userid : userid,
  				sname : sname,
          contactno : contactno,
  				email : email,
  				mid : mid

  			},
  			success:function(data,status){
          $('#userid').val("");
          $('#sname').val("");
          $('#contactno').val("");
          $('#email').val("");
          $('#mid').val("");
  				readRecords("");
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


    function GetUserDetails(userid){
   $("#hidden_user_id").val(userid);
   
    $.post("salespersonbackend.php", {
            userid: userid
        },
        function (data, status) {
          
            var user = JSON.parse(data);

            $("#update_userid").val(user.userid);
            $("#update_name").val(user.sname);
            $("#update_contactno").val(user.contactno);
            $("#update_email").val(user.email);
            $("#update_mid").val(user.mid);
            
        }
    );
    jQuery.noConflict(); 
    $('#update_user_modal').modal('show');
}


function UpdateUserDetails() {
    var userid = $('#update_userid').val();
    var sname = $('#update_name').val();
    var contactno = $('#update_contactno').val();
    var email = $('#update_email').val();
    var mid = $('#update_mid').val();
   var hidden_user_id = $('#hidden_user_id').val();
    $.post("salespersonbackend.php", {
            hidden_user_id: hidden_user_id,
            userid: userid,
            sname: sname,
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