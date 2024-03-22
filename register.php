<?php
$page_title = "Register";
include('includes/header.php'); 
?>
<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-6 col-lg-6 col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Register a client Here!</h1>
                <?php
                    include('status.php');
                  
                ?>
              </div>

<form action="process_register.php" method="POST">

<div class="modal-body">

    <div class="form-group">
        <label> full name </label>
        <input type="text" name="name" class="form-control" placeholder="Enter Username">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" placeholder="Enter Email">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter Password">
    </div>
    <div class="form-group">
        <label>date of birth</label>
        <input type="date" name="dob" class="form-control" placeholder="Confirm Password">
    </div>

</div>
<div class="modal-footer">
    <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
</div>
        <input type="text" id="latitude" name="latitude" class="d-none" readonly><br><br>
        <input type="text" id="longitude" name="longitude" class="d-none" readonly><br><br>



</form>


</div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>



<script>
        // Get location using HTML5 Geolocation API
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        // Display position
        function showPosition(position) {
            document.getElementById("latitude").value = position.coords.latitude;
            document.getElementById("longitude").value = position.coords.longitude;
        }

        // Call getLocation() when the page is loaded
        window.onload = getLocation;
    </script>
