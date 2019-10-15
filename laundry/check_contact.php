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
<div class="row">
<div class="col-md-6 col-md-offset-3">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="./css/font-awesome.min.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->
<h1 align="center">All Guests query:</h1>
<div class="search-box">
<div class="row">
                    <div class="col-md-12 col-md-offset-3">
                        <h5><i class="fas fa-search"></i>Search</h5>
                    </div>
                    <div class="col-md-12">
                        <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Search all fields...">
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












    
       <table width="100%" class="table" id="myTable" style="margin: 100px 0px; ">
       <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>name</th>
                    <th>Mobile No</th>
                    <th>Email</th>
                    <th>Message</th>
                </tr>
                </thead>
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
    
