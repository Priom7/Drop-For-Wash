<?php 
include'header.php';

$msg='';
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $message=$_POST['message'];

     $stmt = $conn->prepare("INSERT INTO `contact`(`name`, `phone`, `email`, `message`) VALUES (:name,:phone,:email,:message)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone );
        $stmt->bindParam(':email', $email );
        $stmt->bindParam(':message', $message );
        
        if ($stmt->execute()) { 

            $msg='Your Query Has Been Received';
        }
        else{
           $msg="Somthing was wrong!!";
        }
}
?>

<div class="contact-clean">
        <form method="post" action="">
            <h2 class="text-center">Contact us</h2>
           <?php if($msg !==''){echo $msg;}?>
            <div class="form-group"><input class="form-control" type="text" name="name" required="" placeholder="Name"></div>
             <div class="form-group"><input class="form-control" type="tel" name="phone" required="" placeholder="phone number "></div>

            <div class="form-group"><input class="form-control is-invalid" type="email" name="email" required="" placeholder="Email"><small class="form-text text-danger">Please enter a correct email address.</small></div>
            <div class="form-group"><textarea class="form-control" rows="14" name="message" required="" placeholder="Message"></textarea></div>
            <div class="form-group"><button class="btn btn-primary" name="submit" type="submit">send </button></div>
        </form>
    </div>

<?php 
include'footer.php';
?>