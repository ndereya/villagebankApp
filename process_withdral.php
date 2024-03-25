<?php 
//start_sessio();
include('includes/dbconfig.php');

// Retrieve account number and amount from the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account_number = $_POST["account_number"];
    $withdraw_amount = $_POST["withdraw_amount"];

    // Check if account exists
    $check_account_query = "SELECT balance FROM users WHERE account_number = '$account_number'";
    $check_account_result = $conn->query($check_account_query);

    if ($check_account_result->num_rows > 0) {
        $row = $check_account_result->fetch_assoc();
        $balance = $row["balance"];

        // Check if the balance is sufficient
        if ($balance >= $withdraw_amount) {
            // Deduct withdrawal amount from balance
            $new_balance = $balance - $withdraw_amount;

            // Update balance in accounts table
            $update_balance_query = "UPDATE users SET balance = '$new_balance' WHERE account_number = '$account_number'";
            $conn->query($update_balance_query);

            // Record withdrawal transaction in transactions table
            $withdrawal_date = date("Y-m-d H:i:s");
            $withdrawal_type = "Withdrawal";
            $insert_withdrawal_query = "INSERT INTO transactions (account_number, transaction_date, amount, transaction_type) VALUES ('$account_number', '$withdrawal_date', '$withdraw_amount', '$withdrawal_type')";
            $conn->query($insert_withdrawal_query);

            // Charge fee for withdrawal
            $charge_amount = 200;
            $new_balance -= $charge_amount;

            // Update balance after charging fee
            $update_balance_query = "UPDATE users SET balance = '$new_balance' WHERE account_number = '$account_number'";
            $conn->query($update_balance_query);

            // Record withdrawal fee transaction in transactions table
            $charge_date = date("Y-m-d H:i:s");
            $charge_type = "Withdrawal Charge";
            $insert_charge_query = "INSERT INTO transactions (account_number, transaction_date, amount, transaction_type) VALUES ('$account_number', '$charge_date', '$charge_amount', '$charge_type')";
            $conn->query($insert_charge_query);

            header("Location:index.php");
        } else {
            echo "Insufficient funds.";
        }
    } else {
        echo "Account not found.";
    }
}

// Close connection
$conn->close();
?>