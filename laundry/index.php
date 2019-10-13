<?php 
include'header.php';
?>
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 33.33%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
}

.logo {
  vertical-align: middle;
  width: 200px;
  height: 200px;
  border-radius: 50%;
}
</style>
 <div>
        <div class="container">
            <div class="row">
                <div class="col-md-16">
                   <!-- <img src="img/logo.png" alt="Avatar" class="logo"> -->
                    <h1 class="text-center text-muted">SERVICES WE OFFER</h1>
                </div>
            </div>


<div class="row">
  <div class="column">
    <div class="card">
    <img src="img/c700x420.jpg" width="285" height="250" class="card-img-top" alt="...">
      <h3>Dry Cleaning & Laundry</h3>
      <p></p>
      <p></p>
    </div>
  </div>

  <div class="column">
    <div class="card">
    <img src="img/download.jpg" class="card-img-top" alt="..." width="285" height="250">
      <h3>Wash & Fold</h3>
      <p></p>
      <p></p>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
    <img src="img/shutterstock_121173946.jpg" class="card-img-top" alt="..." width="285" height="250">
      <h3>Wash and Iron</h3>
      <p></p>
      <p></p>
    </div>
  </div>
  
</div>

<br><br>
            </div>
        </div>
    </div>
    
<?php 
include'footer.php';
?>
