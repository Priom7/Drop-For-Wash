<?php 
include'header.php';
?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
<form action="package.php" method="post" name="branch">


			<fieldset>
                <h2 class="fs-title">Select branch</h2>
                <h3 class="fs-subtitle">Select your nearest Branch</h3>


<select class="form-control" name="city">

<?php
$stmt=$conn->prepare("SELECT `bid`, `bname` FROM `branch`");
$stmt->execute();
$stmt_data = $stmt->fetchAll();
foreach ($stmt_data as $key => $data) {
	$barch_id=$data['bid'];
	$barch_name=$data['bname'];
	echo'<option value="'.$barch_name.'" selected="">'.$barch_name.'</option>';
}

?>
</select>
</fieldset>
<br>
 <input type="submit" name="branch" class="next action-button btn btn-info" value="Next"/>
 <br>
 <br>
 <br>
</div>
</form>
<br>

               

</div>



<?php 
include'footer.php';
?>
	