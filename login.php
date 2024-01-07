<?php

session_start();

include('connect.php');

function getCustomerDetails($con, $customerSSN) {

    $query = "SELECT Account_Number, Name FROM CUSTOMER WHERE SSN = ? LIMIT 1";

    if ($stmt = $con->prepare($query)) {

        $stmt->bind_param('s', $customerSSN);
  
        $stmt->execute();
    
        $stmt->bind_result($accountNumber, $name);
 
        if ($stmt->fetch()) {
            return ['accountNumber' => $accountNumber, 'name' => $name];
        }
    
        $stmt->close();
    }
    
    return false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['pswd'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['pswd']);

    $query = "SELECT CUSTOMER_SSN FROM USER WHERE Username = ? AND PasswordHash = ?";

    if ($stmt = $con->prepare($query)) {
 
        $stmt->bind_param('ss', $username, $password);
        

        $stmt->execute();
        
        $stmt->bind_result($customerSSN);
        
        if ($stmt->fetch()) {
            $stmt->close();
        
            $details = getCustomerDetails($con, $customerSSN);
            
           
            if ($details !== false) {

                $_SESSION['customerSSN'] = $customerSSN;
                $_SESSION['accountNumber'] = $details['accountNumber'];
                $_SESSION['customerName'] = $details['name'];
                
               
                header("Location: dashboard.php");
                exit;
            } else {
                
                $error_message = "Invalid SSN. Please try again.";
            }
        } else {
            $error_message = "Invalid username or password. Please try again.";
        }
        $stmt->close();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('background.jpg');
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 2em;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="password"],
        button[type = "submit"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 5px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }
        input[type="submit"] {
            margin-top: 10px;
            background-color: #5c67ec;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #6c78fc;
        }
        .error-message {
            color: #e74c3c;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="login-container">
        <h1>SIMPLE BANK LOGIN</h1>
        <form action="login.php" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="pswd">Password</label>
            <input type="password" id="pswd" name="pswd" required>
            <input type="submit" value="Login">
            <button type="submit" onclick="window.location.href='signup.php'">Sign Up</button>
        </form>
    </div>
</body>
</html