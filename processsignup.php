<?php
session_start();

include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $ssn = $_POST['ssn'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $streetNumber = $_POST['streetNumber'];
    $zipCode = $_POST['zipCode'];
    $apartmentNumber = $_POST['apartmentNumber'];
    
    $query = "INSERT INTO CUSTOMER (Name, SSN, State, City, StreetNumber, ZipCode, ApartmentNumber) VALUES (?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $con->prepare($query)) {
      
        $stmt->bind_param('sssssss', $name, $ssn, $state, $city, $streetNumber, $zipCode, $apartmentNumber);
        if ($stmt->execute()) {
            header("Location: login.php"); 
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