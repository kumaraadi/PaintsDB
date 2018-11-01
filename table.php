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
      <a class="navbar-brand" href="#">Order</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="Salesperson2.php">Home</a></li>
        <li><a href="Salesperson2.php">Salesperson</a></li>
        <li class="active"><a href="table.php">Order</a></li>
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
   <div class="table-responsive">
   <br />
    <div align="right">
     <button type="button" name="add" id="add" class="btn btn-info">Add</button>
    </div>
    <br />
    <div id="alert_message"></div>
    <table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th>Order No</th>
       <th>Customer ID</th>
       <th>Date</th>
       <th>Salesperson</th>
       <th>Product</th>
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
 var select_s;
 var select_p;

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
  
  $('#add').click(function(){
   var html = '<tr>';

   html += '<td contenteditable id="data1"></td>';
   html += '<td contenteditable id="data2"></td>';
   html += '<td contenteditable id="data3"></td>';
   html += '<td><select class="form-control" id="select_salesperson" onclick="getOptions(this.value)"><option>Salesperson </option><option> Anand </option><option> Abdul Karim </option><option> Uzair </option><option> Ali </option></select></td>';
   html += '<td><select class="form-control"  onclick="getProduct(this.value)"><option>Product </option><option> Toshiba </option><option> Sony </option><option> Huawei </option><option> Hitachi </option></select></td>';
   html += '<td contenteditable id="data6"></td>';
   html += '<td contenteditable id="data7"></td>';
   html += '<td contenteditable id="data8"></td>';
   html += '<td><button type="button" name="insert" id="insert" class="btn btn-success btn-xs">Insert</button></td>';
   html += '</tr>';
   $('#user_data tbody').prepend(html);
  });
  




  $(document).on('click', '#insert', function(){
   var cid = $('#data2').text();
   var date = $('#data3').text();
   //var salesperson = $('#data4').text();
   //var product = $('#data5').text();
   var quantity = $('#data6').text();
   var rate = $('#data7').text();
   //var amount = $('#data8').text();

   if(cid != '' && date != '' && select_s != '' && select_p != '' && quantity != '' && rate != '')
   {
    $.ajax({
     url:"insert.php",
     method:"POST",
     data:{cid:cid, date:date, salesperson:select_s, product:select_p, quantity:quantity, rate:rate},
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
   else
   {
    alert("Incomplete data");
   }
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
  // $("#select_salesperson").on("click",function() 
  // {
  //   var combobox_salesperson = $('#select_salesperson');
  //   $.ajax({
  //    url:"options.php",
  //    method:"GET",
  //    success:function(data)
  //    {      
  //     alert(data);

  //    }
  //   });
  // });
  function getOptions(opt){
  // var combobox_salesperson = $('#select_salesperson');
  //   $.ajax({
  //    url:"options.php",
  //    method:"GET",
  //    success:function(data)
  //    {      
  //     alert(data);

  //    }
  //   });
  select_s = opt;
}
function getProduct(opt){
  select_p = opt;
}
</script>