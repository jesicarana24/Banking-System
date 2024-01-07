<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
    
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-image: url('background.jpg');
            background-size: cover;
            background-position: center;
            font-family: 'Arial', sans-serif;
            background-color: #f0f2f5;
            color: #333;
            line-height: 1.6;
        }

        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            background-color:   #80bfff;
            color: #ffffff;
            text-align: center;
            padding: 10px 0;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        header h1 {
            margin: 0;
            font-size: 2em;
        }

        section {
            background: #ffffff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .user-info h2, .transaction-history h2 {
            margin-bottom: 15px;
            background-color: rgba(255, 255, 255, 0.5);
            
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid #dddddd;
        }

        th {
            background-color: #80bfff;
            color: #ffffff;
            text-align: left;
            padding: 10px;
        }

        td {
            padding: 10px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        footer {
            text-align: center;
            padding: 20px 0;
            margin-top: 30px;
            background-color: #80bfff;
            color: #ffffff;
            border-radius: 8px;
        }
        .logout-button {
            display: left-block;
            padding: 8px 15px;
            background-color: #3366ff;
            color: white;
            border-radius: 4px;
            text-decoration: none;
            margin-top: 10px;
        }

        .logout-button:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
    <div class="dashboard-container">
        <header>
            <h1>Welcome to Your Dashboard</h1>
            <a href="login.php" class="logout-button">Logout</a>
            <a href="loan.php?account=<?php echo $_SESSION['accountNumber']; ?>  "  class="logout-button">Loans</a>
            <a href="addtransaction.php?account=<?php echo $_SESSION['accountNumber']; ?>  " class="logout-button">Add Transaction</a>
        </header>

        <section class="user-info">
            <h2>User Information</h2>
            <?php
                if (!isset($_SESSION['customerSSN'])) {
                    header("Location: login.php");
                    exit;
                }
                include('connect.php');
                
                $customerName = $_SESSION['customerName'] ?? 'Unknown';
                $accountNumber = $_SESSION['accountNumber'] ?? 0;

                echo "<p>Name: " . htmlspecialchars($customerName) . "</p>";
                echo "<p>Account Number: " . htmlspecialchars($accountNumber) . "</p>";
                
            ?>
        </section>

        <section class="transaction-history">
            <h2>Transaction History</h2>
            <?php
                $query = "SELECT DateHour, Amount, Type, Uniq_Code FROM TRANSACTIONS WHERE Account_Number = ?";
                if ($stmt = $con->prepare($query)) {
                    $stmt->bind_param('i', $accountNumber);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        echo "<table border='1'>";
                        echo "<tr><th>Date and Time</th><th>Amount</th><th>Type</th><th>Unique Code</th></tr>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['DateHour']) . "</td>";
                            echo "<td>$" . number_format($row['Amount'], 2) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Type']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['Uniq_Code']) . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<p>No transactions found for this account.</p>";
                    }
                    $stmt->close();
                } else {
                    echo "Error: " . htmlspecialchars($con->error);
                }
            
                $con->close();
            ?>
        </section>

        <footer>
            <p>Simple Bank System Dashboard</p>
        </footer>
    </div>
    </div>
</body>
</html>

