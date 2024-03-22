
<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?><?php
include('includes/dbconfig.php');


$deposit_count = 0;
$withdrawal_count = 0;

$deposit_query = "SELECT COUNT(*) as deposit_count FROM transactions WHERE transaction_type = 'Deposit'";
$deposit_result = $conn->query($deposit_query);

if ($deposit_result) {
    $deposit_count_row = $deposit_result->fetch_assoc();
    $deposit_count = $deposit_count_row['deposit_count'];
} else {
    echo "Error fetching deposit count: " . $conn->error;
}

$withdrawal_query = "SELECT COUNT(*) as withdrawal_count FROM transactions WHERE transaction_type = 'Withdrawal'";
$withdrawal_result = $conn->query($withdrawal_query);

if ($withdrawal_result) {
    $withdrawal_count_row = $withdrawal_result->fetch_assoc();
    $withdrawal_count = $withdrawal_count_row['withdrawal_count'];
} else {
    echo "Error fetching withdrawal count: " . $conn->error;
}

$conn->close();
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container card">
<button onclick="printChart()">Print report</button>

    <canvas id="transactionChart" width="50" height="50"></canvas>
    
     <div class="container card">
   <?php
include('includes/dbconfig.php');

$transactions_query = "SELECT * FROM transactions WHERE transaction_type = 'Deposit' OR transaction_type = 'Withdrawal' ORDER BY transaction_date DESC";
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
  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>
</div>
</div>
<script>
    var depositCount = <?php echo $deposit_count; ?>;
    var withdrawalCount = <?php echo $withdrawal_count; ?>;

    // Create a pie chart
    var ctx = document.getElementById('transactionChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Deposits', 'Withdrawals'],
            datasets: [{
                label: 'Transaction Type',
                data: [depositCount, withdrawalCount],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 99, 132, 0.6)',
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true, 
            aspectRatio: 4, 
            legend: {
                display: true,
                position: 'bottom' 
            },
            layout: {
                padding: {
                    left: 10,
                    right: 10,
                    top: 10,
                    bottom: 10
                }
            }
        }
    });

    function printChart() {
        window.print(); 
    }
</script>
