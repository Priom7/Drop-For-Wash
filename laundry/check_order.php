<?php 
include'header.php';

?>


<style type="text/css">
           td,tr,th{border: 1px solid;
            padding: 5px}
       </style>


<style>

.search-table{
    padding: 10%;
    margin-top: -6%;
}
.search-box{
    background: #c1c1c1;
    border: 1px solid #ababab;
    padding: 3%;
}
.search-box input:focus{
  align : center;
    box-shadow:none;
    border:2px solid #eeeeee;
}
.search-list{
    background: #fff;
    border: 1px solid #ababab;
    border-top: none;
}
.search-list h3{
    background: #eee;
    padding: 3%;
    margin-bottom: 0%;
}
</style>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="./css/font-awesome.min.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->
<h1 align="center">All Order History:</h1>
<div class="search-box">
                <div class="row">
                    <div class="col-md-3">
                        <h5><i class="fas fa-search"></i>Search All Fields</h5>
                    </div>
                    <div class="col-md-9">
                        <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Search all fields e.g. HTML">
                        <script>
                            $(document).ready(function () {
                                $("#myInput").on("keyup", function () {
                                    var value = $(this).val().toLowerCase();
                                    $("#myTable tr").filter(function () {
                                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                    });
                                });
                            });
                        </script>
                    </div> 
                </div>
            </div>







       <table id="myTable" class="table" width="100%"  style="margin: 100px 0px; ">
       <thead class="thead-dark">
                <tr>
                    <th>Order Id</th>
                    <th>Branch</th>
                    <th>Package</th>
                    <th>Pickup Date</th>
                    <th>Pickup Time</th>
                    <th>Delivery Date</th>
                    <th>Total</th>
                </tr>
                </thead>
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
    
