<html>
<title>
	TEST
</title>
<body>
	
		<select class="form-control">
        <option disabled="" selected="" value="">ID</option> 
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
	
	

</body>
</html>