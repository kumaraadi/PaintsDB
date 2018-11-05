<html>
 <head>
  <title>Customer Order Table</title>
  

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
  <style>

  body
  {
   margin:0;
   padding:0;
   background-color:#f1f1f1;
  }
  .box
  {
   width:1270px;
   padding:20px;
   background-color:#fff;
   border:1px solid #ccc;
   border-radius:5px;
   margin-top:25px;
   box-sizing:border-box;
  }
  </style>
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
        <li><a href="#">Home</a></li>
        <li><a href="Users.php">Users</a></li>
        <li><a href="Product.php">Products</a></li>
        <li><a href="manager.php">Manager</a></li>
        <li><a href="Salesperson.php">Salesperson</a></li>
        <li><a href="index.php">Customer</a></li>
        <li class="active"><a href="table1.php">Order</a></li>
        <li><a href="about.php">About Us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>




  <div class="container box">
   <h1 align="center">Customer Orders</h1>
   <br />

  <select class="form-control" id="select1" onchange='SelectedCust(this.value)'>
        <option disabled="" selected="" value="">Select Customer</option> 
                         <?php
                       include 'conn.php';
                       
                        $result2 = mysqli_query($conn, "SELECT * FROM Customer_13156");
                        while($row2 = mysqli_fetch_array($result2)) 
                        {
                          echo "<option value = '{$row2['cid'] }'";
                          echo ">{$row2['cid'] } - {$row2['custname'] }</option>";
                        }
                        // CloseCon($conn);
                      ?>
  </select> 
  <br /> 

  <select class="form-control" id="select2" onchange='SelectedSname(this.value)'>
        <option disabled="" selected="" value="">Select Salesperson</option> 
                         <?php
                       include 'conn.php';
                       
                        $result2 = mysqli_query($conn, "SELECT * FROM Salesperson_13156");
                        while($row2 = mysqli_fetch_array($result2)) 
                        {
                          echo "<option value = '{$row2['userid'] }'";
                          echo ">{$row2['userid'] } - {$row2['sname'] }</option>";
                        }
                        // CloseCon($conn);
                      ?>
  </select> 
  <br />

  <select class="form-control" id="select3" onchange='SelectedProduct(this.value)'>
        <option disabled="" selected="" value="">Select Product</option> 
                         <?php
                       include 'conn.php';
                       
                        $result2 = mysqli_query($conn, "SELECT * FROM Product_13156");
                        while($row2 = mysqli_fetch_array($result2)) 
                        {
                          echo "<option value = '{$row2['pcode'] }'";
                          echo ">{$row2['pcode'] } - {$row2['pname'] } - {$row2['shade'] } - {$row2['psize'] }</option>";
                        }
                        // CloseCon($conn);
                      ?>
  </select> 
  <br />
  
  <input type="text" name="" id="quant" class="form-control" placeholder="Insert Quantity">



   <div class="table-responsive">
   <br />
    <div align="left">
     <button type="button" name="add" id="add" class="btn btn-info">Add Order</button>
    </div>
    <br />
    <div id="alert_message"></div>
    <table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>Order No</th>
       <th>Customer ID</th>
       <th>Date</th>
       <th>Salesperson ID</th>
       <th>Product ID</th>
       <th>Quantity</th>
       <th>Rate</th>
       <th>Amount</th>
       <th></th>
      </tr>
     </thead>
    </table>
   </div>
  </div>
 </body>
</html>

<script type="text/javascript" language="javascript" >
 
 var s_pcode;
 var s_cust;
 var s_sname;
 var s_product;

 $(document).ready(function(){
  
  fetch_data();

  function fetch_data()
  {
   var dataTable = $('#user_data').DataTable({
    "processing" : true,
    "serverSide" : true,
    "order" : [],
    "ajax" : {
     url:"fetch.php",
     type:"POST"
     
    }
   });
  }
  
  
  
  function update_data(id, column_name, value)
  {
   $.ajax({
    url:"update.php",
    method:"POST",
    data:{id:id, column_name:column_name, value:value},
    success:function(data)
    {
     $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
     $('#user_data').DataTable().destroy();
     fetch_data();
    }
   });
   setInterval(function(){
    $('#alert_message').html('');
   }, 5000);
  }

  $(document).on('blur', '.update', function(){
   var id = $(this).data("id");
   var column_name = $(this).data("column");
   var value = $(this).text();
   update_data(id, column_name, value);
  });
  
 
  




  $(document).on('click', '#add', function(){
    if(s_sname == ""){
      alert("Please Select All Options")
    }

   $.post("getRate.php", {
            s_pcode: s_pcode
        },
        function (data, status) {
          
            var user = JSON.parse(data);
            var rate = user.sellingprice;

            // var cid = $('#data2').text();
    var date = new Date();
    var date = new Date(date).toISOString().split('T')[0];
    var quantity = $('#quant').val();

 if(s_cust != '' && date != '' && s_sname != '' && s_pcode != '' && quantity != '' && rate != '')
   {
    $.ajax({
     url:"insert.php",
     method:"POST",
     data:{
      cid:s_cust,
      date:date, 
      salesperson: s_sname, 
      product: s_pcode, 
      quantity:quantity, 
      rate:rate},
     success:function(data)
     {
      //$('#select1').prop('selectedIndex',-1);
      $('#select1').val("");
      $('#select2').val("");
      $('#select3').val("");
      $('#quant').val("");
      s_product = "";
      s_pcode = "";
      s_sname = "";
      quantity = "";
      date = "";      

      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();

      
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
   else
   {
    alert("Incomplete data");
   }


        }
    );


    
    

   

  
  });
  
  $(document).on('click', '.delete', function(){
   var id = $(this).attr("id");
   if(confirm("Are you sure you want to remove this?"))
   {
    $.ajax({
     url:"delete.php",
     method:"POST",
     data:{id:id},
     success:function(data){
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
      $('#user_data').DataTable().destroy();
      fetch_data();
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
  });
 });

  
function SelectedCust(value){
  s_cust = value;
}
function SelectedProduct(value){
  s_pcode = value;

}
function SelectedSname(value){
  s_sname = value;
}

</script>