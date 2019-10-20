<?php 
include'header.php';

if(isset($_POST['picktime'])){
	$city=$_POST['city'];
    $package=$_POST['pack'];
	$date=$_POST['date'];
    $delivery_date=$_POST['delivery_date'];
}

?>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
<form action="order.php" method="post" name="deliverytime">
    <input type="hidden" name="city" value="<?php echo $city; ?>">
    <input type="hidden" name="pack" value="<?php echo $package; ?>">
    <input type="hidden" name="date" value="<?php echo $date; ?>">
    <input type="hidden" name="delivery_date" value="<?php echo $delivery_date; ?>">
			<fieldset style="margin: 100px 0px;">
                <h2 class="fs-title">Picl Up and Delivery time</h2>
                <h3 class="fs-subtitle">Select Pick up and Delivery time</h3>
                <br>
                <div id="sandbox-container" style="margin: 20px;">
                
                    <label>Pick Up Time:</label>
                    <small class="form-text text-danger"><?php echo $date; ?></small>
                     <input class="form-control time" type="text" id="time" name="time" autocomplete="off" placeholder="Give your preferable time. ">

                <label>Delivery Time:</label>
                    <small class="form-text text-danger"><?php echo $delivery_date; ?></small>
                     <input class="form-control time" type="text" id="delivery_time" name="delivery_time" autocomplete="off" placeholder="Give your preferable time. ">
                </div>
                <input type="submit" name="deliverytime" class="submit action-button btn btn-info" value="Next"/>
                
            </fieldset>
           
</form>
<br>
                <br>
                <br>

</div>
</div>


<script>
$('#time').timepicker({
    timeFormat: 'h:mm p',
    interval: 60,
    minTime: '10',
    maxTime: '6:00pm',
    defaultTime: '10',
    startTime: '10:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});

$('#delivery_time').timepicker({
    timeFormat: 'h:mm p',
    interval: 60,
    minTime: '10',
    maxTime: '6:00pm',
    defaultTime: '10',
    startTime: '10:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});
                                           
</script>
<?php 
include'footer.php';
?>
	