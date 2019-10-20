<?php 
include'header.php';

if(isset($_POST['package'])){
    $city=$_POST['city'];
    $package=$_POST['pack'];
}
?>


<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <link
      rel="stylesheet"
      href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"
    />
    <link rel="stylesheet" href="/resources/demos/style.css" />
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script type="text/javascript">
var pkg = "<?php echo $package ?>";
      $(function() {
        
if(pkg=="Ordinary"){
            var dateFormat = "mm/dd/yy",
          from = $("#date")
            .datepicker({
              defaultDate: "+1w",
              changeMonth: true,
              numberOfMonths: 1,
              minDate: 0
              
            })
            .on("change", function() {
              to.datepicker("option", "minDate", getDate(this));
            }),
          to = $("#delivery_date")
            .datepicker({
               defaultDate: "+1w",
              changeMonth: true,
              numberOfMonths: 1,
              minDate: "+5D"
            })
            .on("change", function() {
              from.datepicker("option", "maxDate", getDate(this));
            });

        }

        else{
            var dateFormat = "mm/dd/yy",
          from = $("#date")
            .datepicker({
             defaultDate: "+1w",
              changeMonth: true,
              numberOfMonths: 1,
              minDate: 0
            })
            .on("change", function() {
              to.datepicker("option", "minDate", getDate(this));
            }),
          to = $("#delivery_date")
            .datepicker({
            //   defaultDate: "+1w",
              changeMonth: true,
              numberOfMonths: 1,
              minDate: "+2D"
            })
            .on("change", function() {
              from.datepicker("option", "maxDate", getDate(this));
            });
            
        }
        function getDate(element) {
          var date;
          if(pkg=="Ordinary"){
            try {
            date = $.datepicker.parseDate(dateFormat, element.value);
            date.setDate(date.getDate() + 6);
          } catch (error) {
            date = null;
          }
          return date;
        }
        else{
          try {
            date = $.datepicker.parseDate(dateFormat, element.value);
            date.setDate(date.getDate() + 2);
          } catch (error) {
            date = null;
          }
          return date;
        }

          // return date;
        }
      });


    </script>
 


<div class="row">
  <div class="col-md-6 col-md-offset-3">
    <form action="deliverytime.php" method="post" name="picktime">
      <input type="hidden" name="city" value="<?php echo $city; ?>" />
      <input type="hidden" name="pack" value="<?php echo $package; ?>" />
      <fieldset style="margin: 100px 0px;">
        <h2 class="fs-title">Pick Up and Delivery time</h2>
        <h3 class="fs-subtitle">Select Pick Up and Delivery Date (Month/Date/Year)</h3>
        <br />
        <div id="sandbox-container" style="margin: 20px;">
          <label for="date">Pick Up Date:</label>
          <input
            class="form-control date"
            type="text"
            name="date"
            id="date"
            autocomplete="off"
          />
          <label for="delivery_date">Delivery Date:</label>
          <input
            class="form-control date"
            type="text"
            name="delivery_date"
            id="delivery_date"
            autocomplete="off"
          />
        </div>
        <input
          type="submit"
          name="picktime"
          class="submit action-button btn btn-info"
          value="Next"
        />
      </fieldset>
    </form>
    <br />
    <br />
    <br />
  </div>
</div>


