<?php
// Remove any whitespace or output before session_start()
session_start();

// Include necessary files
include('includes/header.php');
include('includes/navbar.php'); 

// Redirect to login page if user is not logged in
if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit();
}

// Retrieve user name from session
$user_name = $_SESSION['user_name'];
?>

<!-- Content Row -->
<div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Registered savers</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">
<?php
include('includes/dbconfig.php');

// SQL query to count registered users
$sql = "SELECT COUNT(*) AS total_users FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
$total_users = $row["total_users"];
echo '<h5 class="text-center">'.$total_users.'</h5>';
} else {
echo "No registered users found.";
}
$conn->close();
?>

          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-calendar fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Available  balance</div>

          <?php
include('includes/dbconfig.php');

// SQL query to count registered users
$sql = "SELECT sum(balance) AS total_deposits FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
$total_deposits = $row["total_deposits"];
echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>UGX $total_deposits</div>";
} else {
echo "No registered users found.";
}
$conn->close();
?>
         
        </div>
        <div class="col-auto">
          <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Deposits</div>
          <div class="row no-gutters align-items-center">
            <div class="col-auto">

            <?php
include('includes/dbconfig.php');

// SQL query to count registered users
$sql = "SELECT sum(amount) AS total_deposits FROM transactions WHERE transaction_type ='Deposit'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
$total_deposits = $row["total_deposits"];
echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>UGX $total_deposits</div>";
} else {
echo "No registered users found.";
}
$conn->close();
?>
                         </div>
            <div class="col">
            
            </div>
          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Withdraws</div>
          <?php
include('includes/dbconfig.php');

// SQL query to count registered users
$sql = "SELECT sum(amount) AS total_deposits FROM transactions WHERE transaction_type ='Withdrawal' OR transaction_type ='Withdrawal Charge'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
$total_deposits = $row["total_deposits"];
echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>UGX $total_deposits</div>";
} else {
echo "No registered users found.";
}
$conn->close();
?>            </div>
        <div class="col-auto">
          <i class="fas fa-comments fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
    <div class="container card">
        <?php
        include('includes/dbconfig.php');
        $transactions_query = "SELECT * FROM transactions WHERE transaction_type = 'Deposit' OR transaction_type = 'Withdrawal'";
        $transactions_result = $conn->query($transactions_query);
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
                        <td><?php echo $row["amount"]; ?></td>
                        <td><?php echo $row["transaction_date"]; ?></td>
                        <td><?php echo $row["transaction_type"]; ?></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
            <?php
        } else {
            echo "No transactions found.";
        }
        $conn->close();
        ?>
    </div>

    <?php
    // Include necessary scripts and footer
    include('includes/scripts.php');
    include('includes/footer.php');
    ?>
</div>
