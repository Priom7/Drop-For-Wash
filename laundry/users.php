<?php 
include'header.php';

?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
       <h2>All Members of GoodWash Laundry System:</h2>
      
       <style type="text/css">
           td,tr,th{border: 1px solid;
            padding: 5px}
       </style>
       <table width="100%" style="margin: 100px 0px; ">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Username </th>
                    <th>Email</th>
                    <th>Mobile No</th>
                    <th>Gender</th>
                    <th>City</th>
                    <th>Address</th>
                </tr>
              <?php
                $stmt=$conn->prepare("SELECT * FROM `users` ");
                
$stmt->execute();
$stmt_data = $stmt->fetchAll();
foreach ($stmt_data as $key => $data) {
   $user_id=$data['0'];
   $name=$data['1'];
   $username=$data['2'];
   $email=$data['3'];
   $phone=$data['5'];
   $gender=$data['6'];
   $city=$data['7'];
   $address=$data['8'];
   
   
   
    echo'<tr>
                    <td>'.$user_id.'</td>
                    <td>'.$name.'</td>
                    <td>'.$username.'</td>
                    <td>'.$email.'</td>
                    <td>'.$phone.'</td>
                    <td>'.$gender.'</td>
                    <td>'.$city.'</td>
                    <td>'.$address.'</td>
                   
                    

                </tr>';
}
              ?>
            </table>
</div>
</div>
<?php 
include'footer.php';
?>
    
