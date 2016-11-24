<?php
    include 'dbconfig.php';
    
    header('Access-Control-Allow-Origin: *');

    $fingerPrint = $_REQUEST["fingerprint"];
    $key = $_REQUEST["key"];
    $value = $_REQUEST["value"];
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("IF EXISTS (SELECT * FROM Prints WHERE fingerprint=? AND key=?)
                                UPDATE Prints SET value=? WHERE fingerprint=? AND key=?
                            ELSE
                                INSERT INTO Prints (fingerprint, key, value) VALUES (?,?,?)");
    $stmt->bind_param("ssssssss", $fingerPrint, $key, $value, $fingerPrint, $key, $fingerPrint, $key, $value);
    
    $stmt->execute();
?>