<?php
include('includes/dbconfig.php');

// Retrieve account number and amount from the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account_number = $_POST["account_number"];
    $deposit_amount = $_POST["deposit_amount"];

    // Check if account exists
    $check_account_query = "SELECT balance FROM users WHERE account_number = '$account_number'";
    $check_account_result = $conn->query($check_account_query);

    if ($check_account_result->num_rows > 0) {
        $row = $check_account_result->fetch_assoc();
        $balance = $row["balance"];

        // Add deposit amount to balance
        $new_balance = $balance + $deposit_amount;

        // Update balance in accounts table
        $update_balance_query = "UPDATE users SET balance = '$new_balance' WHERE account_number = '$account_number'";
        $conn->query($update_balance_query);

        // Record deposit transaction in transactions table
        $deposit_date = date("Y-m-d H:i:s");
        $deposit_type = "Deposit";
        $insert_deposit_query = "INSERT INTO transactions (account_number, transaction_date, amount, transaction_type) VALUES ('$account_number', '$deposit_date', '$deposit_amount', '$deposit_type')";
        $conn->query($insert_deposit_query);

        echo "Deposit successful. New balance: $new_balance";
    } else {
        echo "Account not found.";
    }
}

// Close connection
$conn->close();
?>