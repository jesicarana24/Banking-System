<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('connect.php'); 

    $accountNumber = filter_input(INPUT_POST, 'accountNumber', FILTER_SANITIZE_NUMBER_INT);
    $dateHour = filter_input(INPUT_POST, 'dateHour', FILTER_SANITIZE_STRING);
    $amount = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
    $uniqCode = filter_input(INPUT_POST, 'uniqCode', FILTER_SANITIZE_STRING);

    $query = "INSERT INTO TRANSACTIONS (Account_Number, DateHour, Amount, Type, Uniq_Code) VALUES (?, ?, ?, ?, ?)";

    if ($stmt = $con->prepare($query)) {
        $stmt->bind_param("issss", $accountNumber, $dateHour, $amount, $type, $uniqCode);
        
        if ($stmt->execute()) {
            header("Location: dashboard.php");
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $con->error;
    }

    $con->close();
}
?>