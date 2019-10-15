<?php 
include'header.php';

if(isset($_POST['package'])){
    $city=$_POST['city'];
    $package=$_POST['pack'];
}


?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
<form action="order.php" method="post" name="picktime">
    <input type="hidden" name="city" value="<?php echo $city; ?>">
    <input type="hidden" name="pack" value="<?php echo $package; ?>">
			<fieldset style="margin: 100px 0px;">
                <h2 class="fs-title">Pick Up time</h2>
                <h3 class="fs-subtitle">Select a Pick Up time</h3>
                <br>
                <div id="sandbox-container" style="margin: 20px;">
                    <label>Date:</label>
                    <input class="form-control date" type="text" name="date" data-date-format='yyyy-mm-dd' autocomplete="off">
                    <label>Time:</label>
                    <small class="form-text text-danger">Please enter time in 24 hours format.</small>
                     <input class="form-control time" type="text" name="time" autocomplete="off" placeholder="Give your preferable time. ">
                </div>
                <input type="submit" name="picktime" class="submit action-button btn btn-info" value="Next"/>
                
            </fieldset>
</form>
<br>
                <br>
                <br>

</div>
</div>


<script>
 $('#sandbox-container input.date').datepicker({
    // changeMonth: true,
    // changeYear: true,
    dateFormat: 'dd/mm/yy',
    minDate: 0

});

</script>
<?php 
include'footer.php';
?>
	