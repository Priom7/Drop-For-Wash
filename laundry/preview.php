<?php 
include'header.php';

if(isset($_POST['order'])){
	$city=$_POST['city'];
	$pack=$_POST['pack'];
	$date=$_POST['date'];
	$time=$_POST['time'];
	$delivery_date=$_POST['delivery_date'];
	$delivery_time=$_POST['delivery_time'];
	$Product_name=$_POST['pdctname'];
	$Product_price=$_POST['pdctprice'];
	$qty=$_POST['qty'];

}

?>
<style type="text/css">
	th{font-weight:600; }
	tr{height: 40px;}
</style>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h2>Your Order Details:</h2>

			<table width="100%">
				<tr>
					<th>Branch</th>
					<th>Package</th>
					<th>Pickup Date</th>
					<th>Pickup Time</th>
					<th>Delivery Date</th>
					<th>Delivery Time</th>
				</tr>
				<tr>
					<td><?php echo $city; ?></td>
					<td><?php echo $pack; ?></td>
					<td><?php echo $date; ?></td>
					<td><?php echo $time; ?></td>
					<td><?php echo $delivery_date; ?></td>
					<td><?php echo $delivery_time; ?></td>
				</tr>
			</table>
			<br>
			<h3>Your Product Details:</h3>

			<table width="100%">
				<tr>
					<th>Product Name</th>
					<th>Product Qty</th>
					<th>Product Price</th>
					<th>Total</th>
				</tr>
				
					
					<?php
					$i=0;
					$total=0;
					$sum = 0;
					foreach ($qty as $key => $value) {
						$total=$qty[$i]*$Product_price[$i];
					 echo '<tr><td>'.$Product_name[$i].'</td><td>'.$qty[$i].'</td><td>'.$Product_price[$i].'</td><td>'.$total.'</td></tr>';


					 $sum+= $total;


					 $i++;
					}
				
					
					?>

				<tr>
					<td></td>
					<td></td>
					<td><b>Pacakge Fees</td>
					<td>
						<?php
						$package_price=0;
						if($pack== "Urgent"){
							$package_price=20;
							echo $package_price;
						}else{
							$package_price=10;
							echo $package_price;
						}
						 ?>
						

					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><b>Grant Total</b></td>
					<td>
						<b>
						<?php
							$grant_total_amount=$sum+$package_price;
							if($grant_total_amount<=20){
								echo '<span style="color:	#FF0000;text-align:center;">(Quantity Not Selected Yet!)<br/></span>';
								
							}
							if($date==""){
								echo '<span style="color:	#FF0000;text-align:center;">(Pickup Date Not Selected Yet!)<br/></span>';
								
							}
							if($time==""){
								echo '<span style="color:	#FF0000;text-align:center;">(Pickup Time Not Selected Yet! Default time: 9.00am - 5.00pm)<br/></span>';
								
							}
							echo $grant_total_amount;
						 ?>
						
<b>
					</td>
				</tr>


			</table>	

			<form action="thankyou.php" method="post" name="confirm">
					<input type="hidden" name="city" value="<?php echo $city; ?>">
					<input type="hidden" name="pack" value="<?php echo $pack; ?>">
					<input type="hidden" name="date" value="<?php echo $date; ?>">
					<input type="hidden" name="time" value="<?php
					// if($time==""){
					// 	echo '<span style="color:	#FF0000;text-align:center;">(Pickup Time Not Selected Yet! Default time: 9.00am - 5.00pm)</span>';

					// }
					 echo $time; ?>">
					 <input type="hidden" name="delivery_time" value="<?php echo $delivery_time; ?>">
					<input type="hidden" name="delivery_date" value="<?php echo $delivery_date; ?>">
					<input type="hidden" name="Product_name[]" value="<?php echo $Product_name; ?>">
					<input type="hidden" name="Product_price[]" value="<?php echo $Product_price; ?>">
					<input type="hidden" name="qty[]" value="<?php echo $qty; ?>">
					<input type="hidden" name="grantTotal" value="<?php echo $grant_total_amount; ?>">
					<?php if (($grant_total_amount>20)&&($date!="")) { ?> 
					<input type="submit" name="confirm" value="Confirm Order" class="btn btn-info">
					
					<?php } ?>
				</form>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>

		</div>
	</div>
</div>
                           		                            
<?php 
include'footer.php';
?>