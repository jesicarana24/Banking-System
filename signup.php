<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: url('background.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: top;
            align-items: center;
            height: 30vh;
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
    <form action="processsignup.php" method="post">
        <h1>Sign Up</h1>
 
        <label for="name"><b>Name:</b></label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="ssn"><b>SSN:</b></label>
        <input type="text" id="ssn" name="ssn" required><br><br>

        <label for="Username"><b>UserName:</b></label>
        <input type="text" id="Username" name="Username" required><br><br>

        <label for="Password"><b>Password</b></label>
        <input type="text" id="Password" name="Password" required><br><br>

        <label for="state"><b>State:</b></label>
        <input type="text" id="state" name="state" required><br><br>

        <label for="city"><b>City:</b></label>
        <input type="text" id="city" name="city" required><br><br>

        <label for="streetNumber"><b>Street Number:</b></label>
        <input type="text" id="streetNumber" name="streetNumber" required><br><br>

        <label for="zipCode"><b>Zip Code:</b></label>
        <input type="text" id="zipCode" name="zipCode" required><br><br>

        <label for="apartmentNumber"><b>Apartment Number:</b></label>
        <input type="text" id="apartmentNumber" name="apartmentNumber"><br><br>

        <input type="submit" value="Sign Up">
    </form>
</body>
</html>
