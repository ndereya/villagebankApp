<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<?php
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

<?php
include('includes/dbconfig.php');

$job_query = "SELECT job, COUNT(*) AS count FROM users GROUP BY job";
$job_result = $conn->query($job_query);

$job_counts = [];

if ($job_result) {
    while ($row = $job_result->fetch_assoc()) {
        $job_counts[$row['job']] = $row['count'];
    }
} else {
    echo "Error fetching job counts: " . $conn->error;
}

$conn->close();
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container card">
    <div class="row">
        <div class="col-md-6">
            <canvas id="transactionChart" width="300" height="300"></canvas>
            <button onclick="printChart()">Print Chart</button>
        </div>
        <div class="col-md-6">
            <canvas id="jobChart" width="300" height="300"></canvas>
        </div>
    </div>

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
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>

<script>
    var ctx1 = document.getElementById('transactionChart').getContext('2d');
    var transactionChart = new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: ['Deposits', 'Withdrawals'],
            datasets: [{
                label: 'Transaction Type',
                data: [<?php echo $deposit_count; ?>, <?php echo $withdrawal_count; ?>],
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
            aspectRatio: 1,
            legend: {
                display: true,
                position: 'bottom'
            }
        }
    });

    var ctx2 = document.getElementById('jobChart').getContext('2d');
    var jobChart = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode(array_keys($job_counts)); ?>,
            datasets: [{
                label: 'Job Types',
                data: <?php echo json_encode(array_values($job_counts)); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            aspectRatio: 1,
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    function printChart() {
        window.print();
    }
</script>
