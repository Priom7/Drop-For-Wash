<?php 
include'header.php';

?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
       <h2>All ORDER HISTORY:</h2>
      
       <style type="text/css">
           td,tr,th{border: 1px solid;
            padding: 5px}
       </style>
       <table width="100%" style="margin: 100px 0px; ">
                <tr>
                    <th>Order Id</th>
                    <th>Branch</th>
                    <th>Package</th>
                    <th>Pickup Date</th>
                    <th>Pickup Time</th>
                    <th>Delivery Date</th>
                    <th>Total</th>
                </tr>
              <?php
                $stmt=$conn->prepare("SELECT * FROM `laundry_order` ");
                
$stmt->execute();
$stmt_data = $stmt->fetchAll();
foreach ($stmt_data as $key => $data) {
   $order_id=$data['0'];
   $branch=$data['2'];
   $package=$data['3'];
   $pickup_date=$data['4'];
   $pickup_time=$data['5'];
   $total=$data['7'];

   if($package=="Ordinary"){
    $delivery_time = date('m/d/Y', strtotime($pickup_date. ' + 5 days')); 
  }
  else if($package=="Urgent"){
   $delivery_time = date('m/d/Y', strtotime($pickup_date. ' + 2 days')); 
 }
   
    echo'<tr>
                    <td>'.$order_id.'</td>
                    <td>'.$branch.'</td>
                    <td>'.$package.'</td>
                    <td>'.$pickup_date.'</td>
                    <td>'.$pickup_time.'</td>
                    <td>'.$delivery_time.'</td>
                    <td>'.$total.'</td>
                    

                </tr>';
}
              ?>
            </table>
</div>
</div>
<?php 
include'footer.php';
?>
    
