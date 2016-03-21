
<?php
include_once("includes/config.php");
	// Connect to the database
	$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

	// output any connection error
	if ($mysqli->connect_error) {
	    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}
if(isset($_POST['catlog_id']))
{
	// the query ORDER BY product_name ASC
	$c_id = $_POST['catlog_id'];
	$query = "SELECT * FROM tbl_product_details where sp_ctlg_code='$c_id' ";

	// mysqli select query
	$results = $mysqli->query($query);

	if($results) {
		//echo '<select class="form-control item-select">';
		echo '<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th></th>
                <th>product Name</th>
               
            </tr>
        </thead>
        <tbody>
            ';
		$as = 1;
		while($row = $results->fetch_assoc()) {

		    //print '<option value="'.$row['product_price'].'">'.$row["product_name"].' - '.$row["product_desc"].'</option>';'.$as.'
			
			  echo '<tr><td><input type="checkbox" class="messageCheckbox" name="prodsel" value="'.$row['prod_name'].':'.$row['byr_price'].'"></td><td>'.$row["prod_name"].'</td></tr>';
	 $as ++;
		}
		echo '<tr><td><a id="checkallll"> Select All</a></td><td></td></tr>';
		 echo'</tbody></table>';
		//echo '</select>';

	} 
	
else {

		echo "<p>There are no products, please add a product.</p>";

	}

	// Frees the memory associated with a result
	$results->free();
}

	// close connection 
	$mysqli->close();
	?>

	
	<script>
	$("#checkallll").click(function(){

     
       if ($("input[type='checkbox']").prop("checked"))
       {
           $(':checkbox').prop('checked', false);
           $(this).text('Check all');
        }
     else{
         $(':checkbox').prop('checked', true);
          $(this).text('Uncheck all');
     }    

 });

</script>
	 