<?php
session_start();
include('connect.php');

if (!isset($_GET['account'])) {
    header("Location: dashboard.php");
    exit;
}


$accountNumber = intval($_GET['account']);

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
            padding: 60px;
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
    <section class="loan-info">
        
        <?php
            
            $query = "SELECT Loan_Number, Amount, Monthly_Repayment FROM LOAN WHERE Account_Number = ?";
           
            if ($stmt = $con->prepare($query)) {
                $stmt->bind_param('i', $accountNumber); 
                $stmt->execute();
                $result = $stmt->get_result();


                if ($result->num_rows > 0) {
                    echo "<h2>Loan Information for Account Number: $accountNumber</h2>";
                    echo "<h2></h2>";
                    echo "<table border='1'>";
                    echo "<tr><th>Loan Number  </th><th>Amount</th><th>Monthly Repayment</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['Loan_Number']) . "</td>";
                        echo "<td>$" . number_format($row['Amount'], 2) . "</td>";
                        echo "<td>$" . number_format($row['Monthly_Repayment'], 2) . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No loans found for this account.</p>";
                }
                $stmt->close();
            } else {
                
                echo "Error preparing statement: " . htmlspecialchars($con->error);
            }
            $con->close();
        ?>
    </section>
</body>
</html>