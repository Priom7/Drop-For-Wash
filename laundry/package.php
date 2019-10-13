<?php 
include'header.php';


$city='';
if(isset($_POST['branch'])){
	$city=$_POST['city'];

}




?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">

<form action="picktime.php" name="package" method="post">
	<input type="hidden" name="city" value="<?php echo $city ?>">
			<fieldset>
                <h2 class="fs-title">Package</h2>
                <h3 class="fs-subtitle">Select a Package</h3>

<select class="form-control" name="pack">

<?php
$stmt=$conn->prepare("SELECT `pkgid`, `pkgname`, `pckprice` FROM `package`");
$stmt->execute();
$stmt_data = $stmt->fetchAll();
foreach ($stmt_data as $key => $data) {
	$pkgid=$data['pkgid'];
	$pkgname=$data['pkgname'];
	$pckprice=$data['pckprice'];
	echo'<option value="'.$pkgname.'" selected="">'.$pkgname.'-RM '.$pckprice.'</option>';
}

?>
</select>
<br>
<br>
                <input type="button" name="previous" class="previous action-button-previous btn btn-success" value="Previous"/>
                <input type="submit" name="package" class="next action-button btn btn-info" value="Next"/>

                <br>
                <br>
            </fieldset>

        </form>
</div>
</div>

<?php 
include'footer.php';
?>
	