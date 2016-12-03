<?php
    include 'dbconfig.php';
    
    header('Access-Control-Allow-Origin: *');

    $fingerPrint = $_REQUEST["fingerprint"];
    
    //mysqli_report(MYSQLI_REPORT_ALL);

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check for an existing print key pair
    $stmt = $conn->prepare("DELETE FROM Prints WHERE fingerprint=?");
    $stmt->bind_param("s", $fingerPrint);    
    $stmt->execute();

    echo("Fingerprint Cleared!");
?>