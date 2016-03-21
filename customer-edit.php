<?php

include('header.php');
include('functions.php');

$getID = $_GET['id'];

// Connect to the database
$mysqli = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME);

// output any connection error
if ($mysqli->connect_error) {
	die('Error : ('.$mysqli->connect_errno .') '. $mysqli->connect_error);
}

// the query
$query = "SELECT * FROM tbl_buyer WHERE byr_id = '" . $mysqli->real_escape_string($getID) . "'";

$result = mysqli_query($mysqli, $query);

// mysqli select query
if($result) {
	$row = mysqli_fetch_assoc($result);
}

/* close connection */
$mysqli->close();

?>

<h1>Edit Customer</h1>
<hr>

<div id="response" class="alert alert-success" style="display:none;">
	<a href="#" class="close" data-dismiss="alert">&times;</a>
	<div class="message"></div>
</div>

<form method="post" id="update_customer">
	<input type="hidden" name="action" value="update_customer">
	<input type="hidden" name="id" value="<?php echo $getID; ?>">
	<div class="row">
		<div class="col-xs-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Editing Customer (<?php echo $getID; ?>)</h4>
					<div class="clear"></div>
				</div>
				<div class="panel-body form-group form-group-sm">
					<div class="row">
						<div class="col-xs-6" >
							<div class="form-group">
							<input type="text" name="companame" id="companame" value="<?php echo $row['byr_companyname'];?>" placeholder="company name" class="form-control margin-bottom copy-input required">
							</div>
                            <div class="form-group">
								<input type="text" placeholder="contact name" id="cantactname" name="cantactname" class="form-control margin-bottom copy-input required" value="<?php echo $row['byr_contactname'];?>">
							</div>
							<div class="form-group">
								<input type="text" placeholder="contact Number" name="phone" id="phone" value="<?php echo $row['byr_phone'];?>" class="form-control margin-bottom ">	
							</div>
							<div class="form-group">
								<input type="text" value="<?php echo $row['byr_alter_phone'];?>" name="phone1" id="phone1" placeholder="alternative Contact Number" class="form-control margin-bottom ">		
							</div>
							<div class="input-group float-right margin-bottom">
								<span class="input-group-addon">@</span>
								<input type="text" value="<?php echo $row['byr_email'];?>" name="email" id="email" placeholder="Enter email Id" class="form-control margin-bottom">
							</div>
                           
                            <div class="form-group">
								<textarea name="note" id="note" placeholder="Note" class="form-control margin-bottom "><?php echo $row['byr_note'];?></textarea>		
							</div>
                            
                             <div class="form-group">
						    	<input type="text" value="<?php echo $row['byr_tin_number'];?>" id="tinno" placeholder="Tinnumber" name="tinno" class="form-control margin-bottom ">
						    </div>
                            
						</div>
                        <div class="col-xs-6">
							
						    <div class="form-group">
						    	<input type="text"  value="<?php echo $row['byr_address'];?>" id="address" placeholder="Address" name="address" class="form-control margin-bottom ">
						    </div>
                            <div class="form-group">
						    	<input type="text" value="<?php echo $row['byr_address1'];?>" name="address1" id="address1" placeholder="Address1" class="form-control margin-bottom ">
						    </div>
                            
                            
						    <div class="form-group">
						    	<input type="text" value="<?php echo $row['byr_city'];?>" placeholder="City" name="city" id="city" class="form-control margin-bottom ">
						    </div>
                            <div class="form-group">
						    	<input type="text" value="<?php echo $row['byr_zip'];?>" name="byr_zip" id="byr_zip" placeholder="Zip Code" class="form-control margin-bottom ">
						    </div>
                            <div class="form-group">
						    	<input type="text" value="<?php echo $row['byr_state'];?>" name="state" id="state" placeholder="state" class="form-control margin-bottom ">
						    </div>
						    <div class="form-group no-margin-bottom">
						    	<input type="text" value="<?php echo $row['byr_country'];?>" name="country" id="country" placeholder="country" class="form-control margin-bottom ">
							</div>
                            <div class="form-group no-margin-bottom">
						    	<input value="<?php echo $row['byr_registration_no'];?>" type="text" name="regino" id="regino" placeholder="Registration No" class="form-control margin-bottom ">
							</div>
                            
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<!--<div class="col-xs-6 text-right">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>Shipping Information</h4>
				</div>
				<div class="panel-body form-group form-group-sm">
					<div class="row">
						<div class="col-xs-6">
							<div class="form-group">
								<input type="text" class="form-control margin-bottom required" name="customer_name_ship" id="customer_name_ship" placeholder="Enter name" tabindex="9" value="<?php echo $customer_name_ship; ?>">
							</div>
							<div class="form-group">
								<input type="text" class="form-control margin-bottom" name="customer_address_2_ship" id="customer_address_2_ship" placeholder="Address 2" tabindex="11" value="<?php echo $customer_address_2_ship; ?>">	
							</div>
							<div class="form-group no-margin-bottom">
								<input type="text" class="form-control required" name="customer_county_ship" id="customer_county_ship" placeholder="County" tabindex="13" value="<?php echo $customer_county_ship; ?>">
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
						    	<input type="text" class="form-control margin-bottom required" name="customer_address_1_ship" id="customer_address_1_ship" placeholder="Address 1" tabindex="10" value="<?php echo $customer_address_1_ship; ?>">
							</div>
							<div class="form-group">
								<input type="text" class="form-control margin-bottom required" name="customer_town_ship" id="customer_town_ship" placeholder="Town" tabindex="12" value="<?php echo $customer_town_ship; ?>">							
						    </div>
						    <div class="form-group no-margin-bottom">
						    	<input type="text" class="form-control required" name="customer_postcode_ship" id="customer_postcode_ship" placeholder="Postcode" tabindex="14" value="<?php echo $customer_postcode_ship; ?>">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>-->
	</div>
	<div class="row">
		<div class="col-xs-12 margin-top btn-group">
			<input type="submit" id="action_update_customer" class="btn btn-success float-right" value="Update Customer" data-loading-text="Updating...">
		</div>
	</div>
</form>

<?php
	include('footer.php');
?>