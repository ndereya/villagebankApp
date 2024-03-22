<?php
session_start(); // Start the session
if(isset($_SESSION['status'])){
    ?>

     <h2 style="color:blue;"><?php echo $_SESSION['status']; ?></h2>

     <?php
     unset($_SESSION['status']);
}
?>
