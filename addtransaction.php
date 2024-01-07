<?php
session_start();
if (!isset($_GET['account'])) {
    
    header("Location: dashboard.php");
    exit;
}

$accountNumber = $_GET['account'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Transaction</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('background.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: top;
            align-items: center;
            height: 0vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
            padding: 500px;
        }
       
        .container {
            max-width: 500px;
            margin: auto;
            overflow: hidden;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        h1 {
            
            color: black;
            background-color : white

        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: black;
            background-color : white
        }

        input[type="number"],
        input[type="datetime-local"],
        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    
    <form action="processtransaction.php" method="post">
        <h1>Add Transaction</h1>
        
        <input type="hidden" name="accountNumber" value="<?php echo $accountNumber; ?>">


        <label for="dateHour"><b>Date and Time:</b></label>
        <input type="datetime-local" id="dateHour" name="dateHour" required><br><br>

        <label for="amount"><b>Amount:</b></label>
        <input type="number" id="amount" name="amount" step="0.01" required><br><br>

        <label for="type"><b>Type:</b></label>
        <select id="type" name="type">
            <option value="Deposit"><b>Deposit</b></option>
            <option value="Withdrawal">Withdrawal</option>
        </select><br><br>

        <label for="uniqCode"><b>Unique Code:</b></label>
        <input type="text" id="uniqCode" name="uniqCode" required><br><br>

        <input type="submit" value="Submit">
        
    </form>
</body>
</html>