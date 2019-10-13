<?php 
include'header.php';

?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
       <h2>All Guests query:</h2>
      
       <style type="text/css">
           td,tr,th{border: 1px solid;
            padding: 5px}
       </style>
       <table width="100%" style="margin: 100px 0px; ">
                <tr>
                    <th>Id</th>
                    <th>name</th>
                    <th>Mobile No</th>
                    <th>Email</th>
                    <th>Message</th>
                </tr>
              <?php
                $stmt=$conn->prepare("SELECT * FROM `contact` ");
                
$stmt->execute();
$stmt_data = $stmt->fetchAll();
foreach ($stmt_data as $key => $data) {
   $cntctid=$data['0'];
   $name=$data['1'];
   $phone=$data['2'];
   $email=$data['3'];
   $message=$data['4'];
   
   
    echo'<tr>
                    <td>'.$cntctid.'</td>
                    <td>'.$name.'</td>
                    <td>'.$phone.'</td>
                    <td>'.$email.'</td>
                    <td>'.$message.'</td>
                   
                    

                </tr>';
}
              ?>
            </table>
</div>
</div>
<?php 
include'footer.php';
?>
    
