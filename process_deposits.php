<?php
include('includes/dbconfig.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve account number and amount from the form
    $account_number = $_POST["account_number"];
    $deposit_amount = $_POST["deposit_amount"];

    // Check if account exists
    $check_account_query = "SELECT balance FROM users WHERE account_number = ?";
    $check_account_stmt = $conn->prepare($check_account_query);
    $check_account_stmt->bind_param("s", $account_number);
    $check_account_stmt->execute();
    $check_account_result = $check_account_stmt->get_result();

    if ($check_account_result->num_rows > 0) {
        $row = $check_account_result->fetch_assoc();
        $balance = $row["balance"];

        // Add deposit amount to balance
        $new_balance = $balance + $deposit_amount;

        // Update balance in accounts table
        $update_balance_query = "UPDATE users SET balance = ? WHERE account_number = ?";
        $update_balance_stmt = $conn->prepare($update_balance_query);
        $update_balance_stmt->bind_param("ds", $new_balance, $account_number);
        $update_balance_stmt->execute();

        // Record deposit transaction in transactions table
        $deposit_date = date("Y-m-d H:i:s");
        $deposit_type = "Deposit";
        $insert_deposit_query = "INSERT INTO transactions (account_number, transaction_date, amount, transaction_type) VALUES (?, ?, ?, ?)";
        $insert_deposit_stmt = $conn->prepare($insert_deposit_query);
        $insert_deposit_stmt->bind_param("ssds", $account_number, $deposit_date, $deposit_amount, $deposit_type);
        $insert_deposit_stmt->execute();

        header("Location:index.php");
    } else {
        echo "Account not found.";
    }

    // Close prepared statements
    $check_account_stmt->close();
    $update_balance_stmt->close();
    $insert_deposit_stmt->close();
}

// Close connection
$conn->close();
?>
