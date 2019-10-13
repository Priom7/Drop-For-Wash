<?php include'header.php'?>
<?php
$message = "";

$deleteMessage="";

$conn=DB();

//PHP topic Delete Action Code
if (isset($_GET['order_id'])) { 
    $id = $_GET['order_id']; 
} 
else { 
    $id = null; 
} 

try {
  $stmt = $conn->prepare("DELETE FROM `laundry_order`WHERE `order_id`= $id");
   $stmt->execute();
        if ($stmt->execute()) {
          $deleteMessage='<div class="alert alert-success"><strong>Success: </strong> Your Order Has been deleted Successfully.</div>';
        }
}
catch(PDOException $e) {
  echo $e->getMessage();
}


?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">

<br>
<br>
<br>
<br>
  <div class="col-md-8 panel">
      <?php
            if ($deleteMessage != "") {
                echo $deleteMessage;
            }
            ?>

</div>
</div>
</div>
<br>
<br>
<br>

<?php include'footer.php'?>

