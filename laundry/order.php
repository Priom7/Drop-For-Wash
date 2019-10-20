<?php 
include'header.php';

if(isset($_POST['deliverytime'])){
	$city=$_POST['city'];
	$pick=$_POST['pack'];
	$date=$_POST['date'];
    $time=$_POST['time'];
    $delivery_date=$_POST['delivery_date'];
	$delivery_time=$_POST['delivery_time'];
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
			<h2>Select your order</h2>
			<form action="preview.php" method="post" name="order">
				<input type="hidden" name="city" value="<?php echo $city; ?>">
				<input type="hidden" name="pack" value="<?php echo $pick; ?>">
				<input type="hidden" name="date" value="<?php echo $date; ?>">
				<input type="hidden" name="time" value="<?php echo $time; ?>">
				<input type="hidden" name="delivery_date" value="<?php echo $delivery_date; ?>">
    			<input type="hidden" name="delivery_time" value="<?php echo $delivery_time; ?>">

				<fieldset>
					<table width="100%">
						<tr>
							<th>Product Name</th>
							<th>Price (RM)</th>
							<th>Qty</th>
						</tr>
<?php
$stmt=$conn->prepare("SELECT `pdctid`, `pdctname`, `pdctprice`, `pdctimg` FROM `product`");
$stmt->execute();
$stmt_data = $stmt->fetchAll();
foreach ($stmt_data as $key => $data) {
	$pdctid=$data['pdctid'];
	$pdctname=$data['pdctname'];
	$pdctprice=$data['pdctprice'];

	echo'<tr>
			<td>'.$pdctname.'
			<input type="hidden" value="'.$pdctname.'" name="pdctname[]">
			</td>
			<td>'.$pdctprice.'
			<input type="hidden" value="'.$pdctprice.'" name="pdctprice[]">
			</td>
			<td>
			
			<input type="number" min="0" value="0" name="qty[]"></td>
		</tr>';
}

?>

					</table>
					<input type="submit" name="order" class="btn btn-info" value="Order">
				</fieldset>
<br>
<br>


			</form>
		</div>
	</div>
</div>
                           		                            
<?php 
include'footer.php';
?>