<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container">
    <!-- Registration Form -->
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Register a client Here!</h1>
                                </div>

                                <form action="process_register.php" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Full Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="name" class="form-control" placeholder="Enter Full Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" name="email" class="form-control" placeholder="Enter Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" name="password" class="form-control" placeholder="Enter Password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Date of Birth</label>
                                            <div class="col-sm-9">
                                                <input type="date" name="dob" class="form-control" placeholder="Date of Birth">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 <!-- Content Row -->
     <!-- list of registers customers -->
     <div class="container card">
   <?php
include('includes/dbconfig.php');

// Fetch transactions from the database
$transactions_query = "SELECT * FROM users";
$transactions_result = $conn->query($transactions_query);

// Check if there are transactions
if ($transactions_result->num_rows > 0) {
    ?>
    <table class="table">
        <tr>
            <td>#</td>
            <td>Account Number</td>
            <td>Amount</td>
            <td>Date</td>
            <td>Type</td>
        </tr>
    <?php
    $count = 1;
    while ($row = $transactions_result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $count++; ?></td>
            <td><?php echo $row["account_number"]; ?></td>
            <td><?php echo $row["full_name"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><?php echo $row["job"]; ?></td>
        </tr>
        <?php
    }
    ?>
    </table>
    <?php
} else {
    echo "No transactions found.";
}

// Close connection
$conn->close();
?>
  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>