<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<!-- customer form here -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-8">
    <h3 class="h3 mb-0 text-gray-800 text-center">Withdraw details</h3>
  
  </div>

  <!-- Content Row -->
  <div class="row">

    <div class="col-xl-12 col-md-12 mb-8">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <form method="post" action="process_deposits.php">
            <div class="form-group">
                <input type="text"name="account_number" placeholder="account number" class="form-control">
            </div>
            <div class="form-group">
                <input type="number" name="deposit_amount" placeholder="amount to depositraw";
class="form-control">
            </div>
            </div>
            <button class="btn btn-success">Withdraw funds</button>
        </div>
</form>
     
    </div>
   
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>