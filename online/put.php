<?php
    include 'dbconfig.php';
    
    header('Access-Control-Allow-Origin: *');

    $fingerPrint = $_REQUEST["fingerprint"];
    $key = $_REQUEST["key"];
    $value = $_REQUEST["value"];
    
    //mysqli_report(MYSQLI_REPORT_ALL);

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check for an existing print key pair
    $stmt = $conn->prepare("SELECT * FROM Prints WHERE fingerprint=? AND partnerkey=?");
    $stmt->bind_param("ss", $fingerPrint, $key);    
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows == 0)
    {
        // Insert the key and value into the database
        $stmt = $conn->prepare("INSERT INTO Prints (fingerprint, partnerkey, kvalue) VALUES (?,?,?)");

        if(!$stmt)
        {
            echo 'Error message ' . $mysqli->error;
        }
            

        $stmt->bind_param("sss", $fingerPrint, $key, $value);    
        $stmt->execute();
    }
    else
    {
        // Updating an already existing key-value pair
        $stmt = $conn->prepare("UPDATE Prints SET kvalue=? WHERE fingerprint=? AND partnerkey=?");
        $stmt->bind_param("sss", $value, $fingerPrint, $key); 
        $stmt->execute();
    }
?>